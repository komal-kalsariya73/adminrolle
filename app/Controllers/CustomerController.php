<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CustomerModel;

class CustomerController extends Controller
{
     public function index()
     {
        if (session()->get('role') != 1) {
            return redirect()->to('/admin');
        }
          return view('customer/customer');
     }
     public function view()
     {
       
          return view('customer/view');
     }

     public function getCustomers()
     {
        
         $model = new CustomerModel();
         
         $customers = $model->findAll();
         
         return $this->response->setJSON($customers);
     }
     public function fetchCustomer($id)
     {
         $customerModel = new \App\Models\CustomerModel();
         $customer = $customerModel->find($id);
 
         if ($customer) {
             return $this->response->setJSON([
                 'success' => true,
                 'data' => $customer
             ]);
         }
 
         return $this->response->setJSON([
             'success' => false,
             'message' => 'Customer not found.'
         ]);
     }

     public function insert()
     {
          $validation = \Config\Services::validation();
          $model = new CustomerModel();
          $rules = [
               'first_name'     => 'required|min_length[3]',
               'last_name' => 'required|min_length[3]',
               'email'     => 'required|valid_email|is_unique[customer.email]',
               'phone'    => 'required|numeric|min_length[10]|max_length[10]',
               'address'  => 'required',
               'gender'   => 'required|in_list[male,female]',
               'pincode'  => 'required|numeric',
               'city'     => 'required',
               'company_name'     => 'required',
               'image'    => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/png,image/jpg,image/jpeg]',
          ];

          if (!$this->validate($rules)) {
               return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $validation->getErrors(),
               ]);
          }

          $file = $this->request->getFile('image');
          $filePath = null;

          if ($file->isValid() && !$file->hasMoved()) {
               $filePath = 'uploads/' . $file->getRandomName();
               $file->move(FCPATH, $filePath);
          }

          $model = new CustomerModel();
          $data = [
               'first_name'     => $this->request->getPost('first_name'),
               'last_name' => $this->request->getPost('last_name'),
               'email'    => $this->request->getPost('email'),
               'address'  => $this->request->getPost('address'),
               'phone'    => $this->request->getPost('phone'),
               'company_name'    => $this->request->getPost('company_name'),

               'gender'   => $this->request->getPost('gender'),
               'pincode'  => $this->request->getPost('pincode'),
               'city'     => $this->request->getPost('city'),
               'image'    => $filePath,
          ];

          if ($model->insert($data)) {
               return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Customer added successfully!',
               ]);
          } else {
               return $this->response->setJSON([
                    'status'  => false,
                    'message' => 'Failed to add customer.',
               ]);
          }
     }
     public function update()
     {
         $id = $this->request->getPost('id');
 
         $validation = \Config\Services::validation();
 
         $rules = [
             'first_name'     => 'required|min_length[3]',
             'last_name' => 'required|min_length[3]',
             'email'    => 'required|valid_email',
             'phone'    => 'required|numeric|min_length[10]|max_length[10]',
             'address'  => 'required',
             'gender'   => 'required|in_list[male,female]',
             'pincode'  => 'required|numeric',
             'city'     => 'required',
             'company_name'     => 'required',
         ];
 
         if (!$this->validate($rules)) {
             return $this->response->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
         }
 
         $customerModel = new \App\Models\CustomerModel();
 
         $profileImage = $this->request->getFile('image');
         $profileImageName = null;
 
         if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
             $profileImageName = $profileImage->getRandomName();
             $profileImage->move(ROOTPATH , $profileImageName);
         } else {
             $profileImageName = $this->request->getPost('existing_profile_image');
         }
 
         $customerModel->update($id, [
             'first_name'     => $this->request->getPost('first_name'),
             'last_name' => $this->request->getPost('last_name'),
             'email'    => $this->request->getPost('email'),
             'phone'    => $this->request->getPost('phone'),
             'address'  => $this->request->getPost('address'),
             'gender'   => $this->request->getPost('gender'),
             'pincode'  => $this->request->getPost('pincode'),
             'city'     => $this->request->getPost('city'),
             'company_name'    => $this->request->getPost('company_name'),
             'image'    => $profileImageName,
         ]);
 
         return $this->response->setJSON(['success' => true, 'message' => 'Customer updated successfully.']);
     }
     public function display(){
          return view('customer/display');
     }
     public function details($id)
     {
         $customerModel = new \App\Models\CustomerModel();
         $customer = $customerModel->find($id);
     
         if ($customer) {
             // Ensure correct image path
             $customer['image_url'] = !empty($customer['image']) ? base_url('' . $customer['image']) : null;
     
             return $this->response->setJSON($customer);
         } else {
             return $this->response->setJSON(['error' => 'Customer not found'], 404);
         }
     }
 
     public function delete($id)
     {
         $customerModel = new \App\Models\CustomerModel();
     //     $orderModel = new OrderModel();
 
         $customer = $customerModel->find($id);
         if (!$customer) {
             return $this->response->setJSON(['success' => false, 'message' => 'Customer not found.']);
         }
 
     //     $order = $orderModel->where('customer_id', $id)->findAll();
     //     if (count($order) > 0) {
     //         return $this->response->setJSON(['success' => false, 'message' => 'Cannot delete Customer because there are order associated with it.']);
     //     }
 
         $customerModel->delete($id);
         return $this->response->setJSON(['success' => true, 'message' => 'Customer deleted successfully.']);
     }

}

<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\CustomerModel;
use App\Models\ProjectModel;

class ProjectController extends Controller
{
    public function index()
    {
        if (session()->get('role') != 1) {
            return redirect()->to('/admin');
        }
        $userModel = new UserModel();
        $username = $userModel->where('role', 2)->findAll();

        $customerModel = new CustomerModel();
        $customers = $customerModel->findAll();
        return view('project/project', ['username' => $username, 'customers' => $customers]);
        //   return view('project/project');
    }
    public function view()
    {
        return view('project/view');
    }
    public function fetchProject($id)
    {
        $model = new ProjectModel();
        $project = $model->find($id);

        if ($project) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $project
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'project not found.'
        ]);
    }
    public function getProject()
    {
        $session = session();
         $user_id = $session->get('user_id');
        $role = $session->get('role'); 

        $model = new ProjectModel();
        if($role == 1){
            $project = $model->select('project.id, customer.first_name as customer_name, userinfo.name as user_name, project.start_date , project.end_date,project.project_name')
            ->join('customer', 'project.customer_id = customer.id')
            ->join('userinfo', 'project.user_id = userinfo.id')
            ->findAll();
        }
        if($role == 2){
            $project = $model->select('project.id, customer.first_name as customer_name, userinfo.name as user_name, project.start_date , project.end_date,project.project_name')
            ->join('customer', 'project.customer_id = customer.id')
            ->join('userinfo', 'project.user_id = userinfo.id')
            ->where('project.user_id', $user_id)
            ->findAll();
        }

        // $project = $model->findAll();
        
        return $this->response->setJSON($project);
    }
    public function insert()
    {
        $validation = \Config\Services::validation();
        $model = new ProjectModel();
        $rules = [
            'customer_id' => 'required',
            'user_id' => 'required',
            'project_name'     => 'required|min_length[3]',
            'description' => 'required|min_length[3]',


            'message'  => 'required',
            'status'   => 'required|in_list[not_started, in_progress, completed]',
            'price'  => 'required|numeric',

            'start_date'     => 'required',
            'end_date'     => 'required',
            'image'    => 'uploaded[image]|max_size[image,2048]|ext_in[image,pdf,jpg,jpeg,png,txt,doc,docx,webp]',
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors(),
            ]);
        }

        $images = $this->request->getFileMultiple('image');
        $uploadedImages = [];

        foreach ($images as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move(FCPATH . 'uploads', $newName);
                $uploadedImages[] = $newName;
            }
        }

        $model = new ProjectModel();
        $data = [
            'customer_id'     => $this->request->getPost('customer_id'),
            'user_id' => $this->request->getPost('user_id'),
            'project_name'    => $this->request->getPost('project_name'),
            'description'  => $this->request->getPost('description'),
            'message'    => $this->request->getPost('message'),
            'status'    => $this->request->getPost('status'),

            'price'   => $this->request->getPost('price'),
            'start_date'  => $this->request->getPost('start_date'),
            'end_date'     => $this->request->getPost('end_date'),
           
        ];
        $data['image'] = json_encode($uploadedImages);
        if ($model->insert($data)) {
            return $this->response->setJSON([
                'success' => true,
                'message' => 'project added successfully!',
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
    
        // Validate the presence of an ID
        if (empty($id)) {
            return $this->response->setJSON(['success' => false, 'message' => 'Project ID is required.']);
        }
    
        // Validation rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'customer_id' => 'required',
            'user_id' => 'required',
            'project_name' => 'required|min_length[3]',
            'description' => 'required|min_length[3]',
            'message' => 'required',
            'status' => 'required|in_list[not_started,in_progress,completed]',
            'price' => 'required|numeric',
            'start_date' => 'required',
            'end_date' => 'required',
            'image' => 'if_exist|max_size[image,2048]|ext_in[image,pdf,jpg,jpeg,png,txt,doc,docx,webp]',
        ]);
    
        // Validate input
        if (!$this->validate($validation->getRules())) {
            return $this->response->setJSON(['success' => false, 'errors' => $validation->getErrors()]);
        }
    
        $model = new ProjectModel();
    
        // Ensure the project exists
        $project = $model->find($id);
        if (!$project) {
            return $this->response->setJSON(['success' => false, 'message' => 'Project not found.']);
        }
    
        // Handle multiple image uploads
        $images = $this->request->getFileMultiple('image');
        $uploadedImages = $project['image'] ? json_decode($project['image'], true) : [];
    
        if ($images) {
            foreach ($images as $image) {
                if ($image->isValid() && !$image->hasMoved()) {
                    $newName = $image->getRandomName();
                    $image->move(FCPATH . 'uploads', $newName);
                    $uploadedImages[] = $newName;
                }
            }
        }
    
        // Update the project
        $model->update($id, [
            'image' => json_encode($uploadedImages),
            'customer_id' => $this->request->getPost('customer_id'),
            'user_id' => $this->request->getPost('user_id'),
            'project_name' => $this->request->getPost('project_name'),
            'description' => $this->request->getPost('description'),
            'message' => $this->request->getPost('message'),
            'status' => $this->request->getPost('status'),
            'price' => $this->request->getPost('price'),
            'start_date' => $this->request->getPost('start_date'),
            'end_date' => $this->request->getPost('end_date'),
        ]);
    
        return $this->response->setJSON(['success' => true, 'message' => 'Project updated successfully.']);
    }
       
    public function delete($id)
    {
        $model = new ProjectModel();
    //     $orderModel = new OrderModel();

        $project = $model->find($id);
        if (!$project) {
            return $this->response->setJSON(['success' => false, 'message' => 'project not found.']);
        }

    //     $order = $orderModel->where('customer_id', $id)->findAll();
    //     if (count($order) > 0) {
    //         return $this->response->setJSON(['success' => false, 'message' => 'Cannot delete Customer because there are order associated with it.']);
    //     }

        $model->delete($id);
        return $this->response->setJSON(['success' => true, 'message' => 'project deleted successfully.']);
    }

    public function display(){
        return view('project/display');
   }
   public function details($id)
   {
    $model = new ProjectModel();
       $customerModel = new CustomerModel();
       $productModel = new UserModel();
   
       
       $project = $model->select('project.id, customer.first_name as customer_name, userinfo.name as user_name, project.start_date , project.end_date,project.project_name,project.description,project.status,project.message,project.price')
        ->join('customer', 'project.customer_id = customer.id')
        ->join('userinfo', 'project.user_id = userinfo.id')
           ->where('project.id', $id)
           ->first();
   
       if ($project) {
           return $this->response->setJSON(['success' => true, 'data' => $project]);
       } else {
           return $this->response->setJSON(['success' => false, 'message' => 'Project not found']);
       }
   }
   }




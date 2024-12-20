<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\FollowupModel;
use App\Models\CustomerModel;
use App\Models\ProjectModel;

class FollowController extends Controller
{
    public function index()
    {
        $customerModel = new CustomerModel();
        $customers = $customerModel->findAll();
        $projectModel = new ProjectModel();
        $projects = $projectModel->findAll();

        return view('followup/followup', ['projects' => $projects, 'customers' => $customers]);
    }

    public function view()
    {
        return view('followup/view');
    }

    public function getFollowup()
    {
        $session = session();
        $user_id = $session->get('user_id');
       $role = $session->get('role'); 

        $followupModel = new FollowupModel();
        if($role == 1){
            $followup = $followupModel->select('followup.id, customer.first_name as customer_name, followup.followup_date,project.project_name')
            ->join('customer', 'followup.customer_id = customer.id')
            ->join('project', 'followup.project_id = project.id')
            ->findAll();
        }
        if($role == 2){
            $followup = $followupModel->select('followup.id, customer.first_name as customer_name, followup.followup_date,project.project_name')
            ->join('customer', 'followup.customer_id = customer.id')
            ->join('project', 'followup.project_id = project.id')
            ->where('followup.user_id', $user_id)
            ->findAll();
        }

        // $project = $model->findAll();
        
        return $this->response->setJSON($followup);
    }
    public function fetchfollowup($id)
    {
        $followupModel = new FollowupModel();
        $followup = $followupModel->find($id);

        if ($followup) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $followup
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'followup not found.'
        ]);
    }

    public function insert()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'customer_id'    => 'required|numeric',
            'project_id'     => 'required|numeric',
            'followup_date'  => 'required|valid_date',
            'message'        => 'required|min_length[3]',
            'status'         => 'required|in_list[pending, completed]',
        ];
    
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors(),
            ]);
        }
    
    
        $session = session();
    
    
        if (!$session->has('user_id')) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User not logged in.',
            ]);
        }
    
        
        $user_id = $session->get('user_id');  
        $user_role = $session->get('role');   
    

        // if ($user_role != 1) {
        //     return $this->response->setJSON([
        //         'status' => 'error',
        //         'message' => 'You do not have permission to add follow-up.',
        //     ]);
        // }
    
        $project_id = $this->request->getPost('project_id');
    
        $projectModel = new ProjectModel();
        $project = $projectModel->find($project_id);
        if (!$project) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid project ID.',
            ]);
        }
    
        
        $followupModel = new FollowupModel();
        $data = [
            'customer_id'    => $this->request->getPost('customer_id'),
            'project_id'     => $this->request->getPost('project_id'),
            'followup_date'  => $this->request->getPost('followup_date'),
            'message'        => $this->request->getPost('message'),
            'status'         => $this->request->getPost('status'),
            'user_id'        => $user_id,  
        ];
    
        
        if ($followupModel->insert($data)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Follow-up added successfully!',
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to add follow-up.',
            ]);
        }
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $validation = \Config\Services::validation();
        $rules = [
            'customer_id'    => 'required|numeric',
            'project_id'     => 'required|numeric',
            'followup_date'  => 'required|valid_date',
            'message'        => 'required|min_length[3]',
            'status'         => 'required|in_list[pending, completed]',
        ];
    
        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors(),
            ]);
        }
    
      
    
        
        $followupModel = new FollowupModel();
     
        
        $followupModel->update($id, [
            'customer_id'    => $this->request->getPost('customer_id'),
            'project_id'     => $this->request->getPost('project_id'),
            'followup_date'  => $this->request->getPost('followup_date'),
            'message'        => $this->request->getPost('message'),
            'status'         => $this->request->getPost('status'),
        ]);

        return $this->response->setJSON(['status' => 'success', 'message' => 'followup updated successfully.']);
    }
    
    public function display(){
        return view('followup/display');
   }
   public function details($id)
   {
    $followupModel = new FollowupModel();
       $followup = $followupModel->find($id);
   
       $followup = $followupModel->select('followup.id, customer.first_name as customer_name, followup.followup_date,followup.message,followup.status,project.project_name')
        ->join('customer', 'followup.customer_id = customer.id')
        ->join('project', 'followup.project_id = project.id')
          ->where('followup.id', $id)
          ->first();
  
       if ($followup) {
         
        return $this->response->setJSON(['success' => true, 'data' => $followup]);
       } else {
        return $this->response->setJSON(['success' => false, 'error' => 'Followup not found'], 404);
    
       }
   }

    public function delete($id)
    {
        $followupModel = new FollowupModel();
    //     $orderModel = new OrderModel();

        $followup = $followupModel->find($id);
        if (!$followup) {
            return $this->response->setJSON(['success' => false, 'message' => 'folloup not found.']);
        }

    //     $order = $orderModel->where('customer_id', $id)->findAll();
    //     if (count($order) > 0) {
    //         return $this->response->setJSON(['success' => false, 'message' => 'Cannot delete Customer because there are order associated with it.']);
    //     }

        $followupModel->delete($id);
        return $this->response->setJSON(['success' => true, 'message' => 'folloup deleted successfully.']);
    }

}


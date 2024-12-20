<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\UserInfoModel;
use App\Models\CustomerModel;
use App\Models\ProjectModel;
use App\Models\FollowupModel;



class AdminController extends Controller
{
    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');
        $role = $session->get('role'); 

        if($role == 1 || $role == 2 || $userId == 2){

        
        $customerModel = new CustomerModel();
        $usersModel = new UserModel();
        $projectModel = new ProjectModel();
        $followupModel = new FollowupModel();
    
        $totalCustomers = $customerModel->countAllResults();
        $totalusers = $usersModel->where('role',2)->countAllResults();
        $totalprojects = $projectModel->countAllResults();
        $totalfollowups = $followupModel->where('user_id',2)->countAllResults();
    
        return view('admin/dashbord', [
            'totalCustomers' => $totalCustomers,
            'totalusers' => $totalusers,
            'totalprojects' => $totalprojects,
            'totalfollowups' => $totalfollowups,
          
            'title' => 'Dashboard',
        ]);
        //  return view('admin/dashbord', ['title' => 'Dashbord']);

        
    }

    }
    public function view()
    {
         return view('admin/profile');

    }

    public function fetchUserProfile()
    {
        if (!session()->get('is_logged_in')) {
            return redirect()->to(base_url('login'));
        }
    
        $userId = session()->get('user_id');
        $userModel = new UserModel();
        $userInfoModel = new UserInfoModel();
    
        $user = $userModel->find($userId);
        $userInfo = $userInfoModel->where('user_id', $userId)->first();
    
        // Construct the image path
        $imagePath = base_url('uploads/' . ($userInfo['image'] ?? 'default-avatar.jpg'));
    
        return $this->response->setJSON([
            'user' => $user,
            'userInfo' => $userInfo,
            'image' => $imagePath // Send the image URL
        ]);
    }
    

    public function editProfile()
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not logged in']);
        }
    
        $userModel = new UserModel();
        $userInfoModel = new UserInfoModel();
    
        $user = $userModel->find($userId);
        $userInfo = $userInfoModel->where('user_id', $userId)->first();
    
        if (!$user || !$userInfo) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'User not found']);
        }
    
        return $this->response->setJSON([
            'user' => $user,
            'userInfo' => $userInfo,
        ]);
    }
    

    
    
    // Method to handle the profile update
    public function update()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();
    
            $validation->setRules([
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'phone' => 'required|numeric',
                'address' => 'required',
                'profile_image' => 'permit_empty|uploaded[profile_image]|is_image[profile_image]|max_size[profile_image,2048]',
            ]);
    
            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $validation->getErrors(),
                ]);
            }
    
            $userId = session()->get('user_id');
            $userModel = new UserModel();
            $userInfoModel = new UserInfoModel();
    
            $data = [
                'name' => $this->request->getPost('name'),
                'phone' => $this->request->getPost('phone'),
                'address' => $this->request->getPost('address'),
            ];
    
            $file = $this->request->getFile('profile_image');
            if ($file && $file->isValid()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads', $newName); 
                $data['image'] = $newName; 
            }
    
            $userInfoModel->update($userId, $data);
            $userModel->update($userId, [
                'email' => $this->request->getPost('email'),
            ]);
    
            $imagePath = isset($data['image']) ? base_url('uploads/' . $data['image']) : null;
    
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Profile updated successfully!',
                'imagePath' => $imagePath,
            ]);
        }
    
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Page not found');
    }

    public function changePassword()
    {
        if ($this->request->isAJAX()) {
            
        
            $current_password = $this->request->getPost('currentPassword');
            $new_password = $this->request->getPost('newPassword');
            $confirm_password = $this->request->getPost('confirmPassword');

            $user_id = session()->get('user_id');  

            if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'All fields are required.'
                ]);
            }

            if ($new_password !== $confirm_password) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'New password and confirmation do not match.'
                ]);
            }

            $userModel = new UserModel();
            $user = $userModel->find($user_id);

            
            if (md5($current_password) !== $user['password']) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Current password is incorrect.'
                ]);
            }


            $update_success = $userModel->updatePassword($user_id, $new_password);

            if ($update_success) {
                return $this->response->setJSON([
                    'status' => 'success',
                    'message' => 'Password updated successfully.'
                ]);
            }

            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'An error occurred while updating the password.'
            ]);
        }

    
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Page not found');
    }



  
    
}



?>
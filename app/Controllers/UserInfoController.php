<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserInfoModel;
use App\Models\ProjectModel;
use CodeIgniter\Controller;

class UserInfoController extends Controller
{
    public function index()
    {
        return view('staff/staff');
    }

    public function view()
    {
        return view('staff/view');
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {
            $validation = \Config\Services::validation();

            $validation->setRules([
                'name' => 'required|min_length[3]|max_length[50]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[6]',
                'gender' => 'required|in_list[male,female]',
                'address' => 'required|min_length[10]',
                'city' => 'required',
                'phone' => 'required|numeric|exact_length[10]',
                'image' => 'uploaded[image]|max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/webp,image/png]'
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $validation->getErrors()
                ]);
            }

            $userModel = new UserModel();
            $userData = [
                'username' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => md5($this->request->getVar('password')),
                'role' => $this->request->getPost('role')
            ];
            $userModel->insert($userData);

            $userId = $userModel->getInsertID();

            $userInfoModel = new UserInfoModel();
            $image = $this->request->getFile('image');
            $imageName = $image->getRandomName();
            $image->move(FCPATH . 'uploads', $imageName);

            $userInfoData = [
                'user_id' => $userId,
                'name' => $this->request->getPost('name'),
                'gender' => $this->request->getPost('gender'),
                'address' => $this->request->getPost('address'),
                'city' => $this->request->getPost('city'),
                'phone' => $this->request->getPost('phone'),
                'image' => $imageName
            ];
            $userInfoModel->insert($userInfoData);

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Staff added successfully.'
            ]);
        }

        throw new \CodeIgniter\Exceptions\PageNotFoundException('Page not found');
    }

    public function fetchUsers($id)
    {
        $userInfoModel = new UserInfoModel();

        $user = $userInfoModel
            ->select('users.email, userinfo.image, userinfo.id, userinfo.name, userinfo.gender, userinfo.address, userinfo.city, userinfo.phone')
            ->join('users', 'users.id = userinfo.user_id')
            ->where('userinfo.id', $id)
            ->first();

        if ($user) {
            return $this->response->setJSON([
                'success' => true,
                'data' => $user
            ]);
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Staff not found.'
        ]);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        $validation = \Config\Services::validation();

        $rules = [
            'name' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|valid_email[users.email,id,' . $id . ']',
            'gender' => 'required|in_list[male,female]',
            'address' => 'required|min_length[10]',
            'city' => 'required',
            'phone' => 'required|numeric|exact_length[10]'
        ];

        if (!$validation->setRules($rules)->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $validation->getErrors()
            ]);
        }

        $userInfoModel = new UserInfoModel();
        $userModel = new UserModel();

        $userInfo = $userInfoModel->find($id);

        if (!$userInfo) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'User not found.'
            ]);
        }

        $userId = $userInfo['user_id'];

        $userModel->update($userId, [
            'email' => $this->request->getPost('email'),
            'password' => md5($this->request->getVar('password'))
        ]);

        $profileImage = $this->request->getFile('image');
        $profileImageName = $userInfo['image'];

        if ($profileImage && $profileImage->isValid() && !$profileImage->hasMoved()) {
            $profileImageName = $profileImage->getRandomName();
            $profileImage->move(FCPATH . 'uploads', $profileImageName);
        }

        $userInfoModel->update($id, [
            'name' => $this->request->getPost('name'),
            'gender' => $this->request->getPost('gender'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'phone' => $this->request->getPost('phone'),
            'image' => $profileImageName
        ]);

        $userModel->update($userId, [
            'username' => $this->request->getPost('name')
        ]);

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Staff updated successfully.'
        ]);
    }

    public function fetchAll()
    {
        $userModel = new UserModel();
        $userInfoModel = new UserInfoModel();

        $users = $userInfoModel
            ->select('users.email, userinfo.image, userinfo.id, userinfo.name, userinfo.gender, userinfo.address, userinfo.city, userinfo.phone')
            ->join('users', 'users.id = userinfo.user_id')
            ->where('users.role', 2)
            ->orderBy('userinfo.id', 'DESC')
            ->findAll();

        return $this->response->setJSON($users);
    }


    public function delete($id)
    {
        $userInfoModel = new UserInfoModel();
        $userModel = new UserModel();
        // $projectModel = new ProjectModel();

        $userInfo = $userInfoModel->find($id);

        if ($userInfo) {
            $userId = $userInfo['user_id'];

            // $projectCount = $projectModel->where('user_id', $userId)->countAllResults();

            // if ($projectCount > 0) {
            //     return $this->response->setJSON([
            //         'success' => false,
            //         'message' => 'Cannot delete staff because there are projects associated with it.'
            //     ]);
            // } else {
                $userInfoModel->delete($id);

                $userModel->delete($userId);

                return $this->response->setJSON([
                    'success' => true,
                    'message' => 'Staff deleted successfully.'
                ]);
            // }
        }

        return $this->response->setJSON([
            'success' => false,
            'message' => 'Staff not found.'
        ]);
    }

    public function display()
    {
        return view('staff/display');
    }

    public function details($id)
    {
        $userInfoModel = new UserInfoModel();

        $users = $userInfoModel
            ->select('users.email,users.username, userinfo.image, userinfo.id, userinfo.name, userinfo.gender, userinfo.address, userinfo.city, userinfo.phone')
            ->join('users', 'users.id = userinfo.user_id')
            ->where('userinfo.id', $id)
            ->first();

        if ($users) {
            $users['image_url'] = base_url('uploads/' . $users['image']);
            return $this->response->setJSON(['success' => true, 'data' => $users]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Staff not found']);
        }
    }
}

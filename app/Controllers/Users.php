<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class Users extends Controller
{

    public function index()
    {
        $session = session();
        $model = new UsersModel();
        $data['title'] = "E-Kliping | Diskominfo Malang";
        $data['session'] = $session;
        $data['users']  = $model->getUsers()->getResult();
        echo view('global/header', $data);
        echo view('global/sidebar');
        echo view('global/topbar', $data);
        echo view('admin/users', $data);
        echo view('global/footer');
    }

    public function save()
    {
        $model = new UsersModel();
        $data = array(
            'user_name'        => $this->request->getPost('user_name'),
            'user_email'        => $this->request->getPost('user_email'),
            'user_password'        => $this->request->getPost('user_password'),
        );
        $model->saveUsers($data);
        return redirect()->to('/users');
    }

    public function update()
    {
        $model = new UsersModel();
        $id = $this->request->getPost('user_id');
        if(!$this->request->getPost('user_new_password')) {
        $data = array(
            'user_name'        => $this->request->getPost('user_name'),
            'user_password'        => $this->request->getPost('user_new_password'),
        );
        } else {
            $data = array(
                'user_name'        => $this->request->getPost('user_name')
            );
        }
        $model->updateUsers($data, $id);
        return redirect()->to('/users');
    }

    public function delete()
    {
        $model = new UsersModel();
        $id = $this->request->getPost('user_id');
        $model->deleteUsers($id);
        return redirect()->to('/users');
    }

}
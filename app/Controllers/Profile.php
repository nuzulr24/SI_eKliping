<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NewsModel;

class Profile extends Controller
{

    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
    }

    public function index()
    {
        if (!$this->validate([]))
        {
            $data['validation'] = $this->validator;
        $session = session();
        $model = new NewsModel();
        $db = \Config\Database::connect();
        $data['title'] = "E-Kliping | Diskominfo Malang";
        $data['session'] = $session;
        $data['nama']  = $session->get('user_name');
        $data['id'] = $session->get('user_id');
        $name = $session->get('user_email');
        $query = $db->query("SELECT * FROM users WHERE user_email = '".$name."'");
        $rows = $query->getRow();
        $data['password'] = $rows->user_password;
        echo view('global/header', $data);
        echo view('global/sidebar');
        echo view('global/topbar', $data);
        echo view('admin/profile', $data);
        echo view('global/footer');
        }
    }

    public function save()
    {
        $model = new NewsModel();
        $data = array(
            'link_berita'        => $this->request->getPost('news_name'),
        );
        $model->saveNews($data);
        return redirect()->to('/news');
    }

    public function update()
    {
        $db = \Config\Database::connect();
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('profile'));
        }

        $validated = $this->validate([
            'nama' => 'required|trim',
            'password' => 'required|min_length[8]|max_length[20]',
            'new_password' => 'required|min_length[8]|max_length[20]',
            'retype_password' => 'required|min_length[8]|max_length[20]'
        ]);
 
        if ($validated == FALSE) {
            
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->index();
            session()->setFlashdata('errors', $this->form_validation->getErrors());
            session()->setFlashdata('inputs', $this->request->getPost());
        } else {

            $current_password = $this->request->getPost('password');
            $new_password = $this->request->getPost('new_password');
            $re_password = $this->request->getPost('retype_password');

            if($new_password == $re_password) {

                $data = [
                    'user_password' => $re_password
                ];
        
                $db->table('users')->update($data, array('user_id' => $this->request->getPost('id')));
                return redirect()->to(base_url('profile')); 
                session()->setFlashdata('success', 'Changed successfully');
            } else {
                return $this->index();
                session()->setFlashdata('inputs', $this->request->getPost());
                session()->setFlashdata('errors', $this->form_validation->getErrors());
            }
            
        }
    }

}
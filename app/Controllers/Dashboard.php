<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{

    public function index()
    {
        $session = session();
        $db      = \Config\Database::connect();
        $data['title'] = "E-Kliping | Diskominfo Malang";
        $data['session'] = $session;
        $data['media'] = $db->query("SELECT * FROM media ORDER BY id_media ASC")->getResult();
        echo view('global/header', $data);
        echo view('global/sidebar');
        echo view('global/topbar', $data);
        echo view('admin/dashboard', $data);
        echo view('global/footer');
    }
}

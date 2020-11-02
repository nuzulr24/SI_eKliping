<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NewsModel;

class News extends Controller
{

    public function index()
    {
        $session = session();
        $model = new NewsModel();
        $data['title'] = "E-Kliping | Diskominfo Malang";
        $data['session'] = $session;
        $data['product']  = $model->getBerita()->getResult();
        $data['category'] = $model->getCategory()->getResult();
        echo view('global/header', $data);
        echo view('global/sidebar');
        echo view('global/topbar', $data);
        echo view('admin/news', $data);
        echo view('global/footer');
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
        $model = new NewsModel();
        $id = $this->request->getPost('news_id');
        $data = array(
            'link_berita'        => $this->request->getPost('news_name'),
        );
        $model->updateNews($data, $id);
        return redirect()->to('/news');
    }

    public function delete()
    {
        $model = new NewsModel();
        $id = $this->request->getPost('news_id');
        $model->deleteNews($id);
        return redirect()->to('/news');
    }

}
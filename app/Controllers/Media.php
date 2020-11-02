<?php namespace App\Controllers;

// Tambahkan Upload Model di sini
use App\Models\MediaModel;

class Media extends BaseController
{

    protected $model_upload;

    public function __construct() {

        // Memanggil form helper
        helper('form');
        // Menyiapkan variabel untuk menampung upload model
        $this->model_upload = new MediaModel();
    }

	public function index()
    {
        if (!$this->validate([]))
        {
            $data['validation'] = $this->validator;
            $session = session();
            $data['title'] = "E-Kliping | Diskominfo Malang";
            $data['session'] = $session;
            $data['category'] = $this->model_upload->getCategory();
            $data['uploads'] = $this->model_upload->get_uploads();
            echo view('global/header', $data);
            echo view('global/sidebar');
            echo view('global/topbar', $data);
            echo view('admin/media', $data);
            echo view('global/footer');
        }
    }
 
    public function process()
    {

        if ($this->request->getMethod() !== 'post') {
            return redirect()->to(base_url('media'));
        }

        $validated = $this->validate([
            'file_upload' => 'uploaded[file_upload]|mime_in[file_upload,image/jpg,image/jpeg,image/gif,image/png]|max_size[file_upload,4096]'
        ]);
 
        if ($validated == FALSE) {
            
            // Kembali ke function index supaya membawa data uploads dan validasi
            return $this->index();

        } else {

            $avatar = $this->request->getFile('file_upload');
            $avatar->move(ROOTPATH . 'public/uploads');

            $data = [
                'nama_media' => $this->request->getPost('media_name'),
                'gambar' => $avatar->getName()
            ];
    
            $this->model_upload->insert_gambar($data);
            return redirect()->to(base_url('media')); 
        }

    }

    public function delete()
    {
        $id = $this->request->getPost('news_id');
        $this->model_upload->deleteImage($id);
        return redirect()->to('/media');
    }

    public function category()
    {
        $session = session();
        $data['title'] = "E-Kliping | Diskominfo Malang";
        $data['session'] = $session;
        $data['category'] = $this->model_upload->getCategory();
        echo view('global/header', $data);
        echo view('global/sidebar');
        echo view('global/topbar', $data);
        echo view('admin/category', $data);
        echo view('global/footer');
    }

    public function category_save()
    {
        $data = array(
            'nama_kategori'        => $this->request->getPost('media_name'),
        );
        $this->model_upload->saveCategory($data);
        return redirect()->to('/media/category');
    }

    public function category_update()
    {
        $id = $this->request->getPost('news_id');
        $data = array(
            'nama_kategori'        => $this->request->getPost('media_name'),
        );
        $this->model_upload->updateCategory($data, $id);
        return redirect()->to('/media/category');
    }

    public function category_delete()
    {
        $id = $this->request->getPost('news_id');
        $this->model_upload->deleteCategory($id);
        return redirect()->to('/media/category');
    }

}

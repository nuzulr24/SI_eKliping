<?php namespace App\Models;
use CodeIgniter\Model;
 
class MediaModel extends Model
{
    protected $table;

    public function __construct() {

        parent::__construct();
        $db = \Config\Database::connect();
        $this->table = $this->db->table('media');
        $this->qrs = $this->db->table('kategori');
    }
     
    public function get_uploads()
    {
        return $this->table->get()->getResultArray();
    }

    public function getCategory()
    {
        return $this->qrs->get()->getResultArray();
    }

    public function insert_gambar($data)
    {
        return $this->table->insert($data);
    }

    public function deleteImage($id)
    {
        return $this->table->delete(array('id_media' => $id));
    }

    public function saveCategory($data)
    {
        return $this->qrs->insert($data);
    }

    public function deleteCategory($id)
    {
        return $this->qrs->delete(array('id_kategori' => $id));
    }

    public function updateCategory($data, $id)
    {
        $query = $this->qrs->update($data, array('id_kategori' => $id));
        return $query;
    }

 }
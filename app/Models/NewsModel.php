<?php namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    
    public function getCategory()
    {
        $builder = $this->db->table('kategori_berita');
        return $builder->get();
    }

    public function getBerita()
    {
        $builder = $this->db->table('tb_berita');
        return $builder->get();
    }

    public function saveNews($data){
        $query = $this->db->table('tb_berita')->insert($data);
        return $query;
    }

    public function updateNews($data, $id)
    {
        $query = $this->db->table('tb_berita')->update($data, array('id_berita' => $id));
        return $query;
    }

    public function deleteNews($id)
    {
        $query = $this->db->table('tb_berita')->delete(array('id_berita' => $id));
        return $query;
    } 

  
}


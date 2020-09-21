<?php

class Berita_model extends CI_Model
{
    public function getBerita()
    {
        return $this->db->get('berita')->result_array();
    }
    public function getBeritaById($id)
    {
        return $this->db->get_where('berita', ['id' => $id])->row_array();
    }
}

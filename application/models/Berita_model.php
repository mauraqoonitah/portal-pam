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

    public function tambahBerita()
    {

        $data = [
            "publishedAt" => $this->input->post('publishedAt', true),
            "judul" => $this->input->post('judul', true),
            "konten" => $this->input->post('konten', true),
            "creator" => $this->input->post('creator', true)
        ];

        $this->db->insert('berita', $data);
    }
}

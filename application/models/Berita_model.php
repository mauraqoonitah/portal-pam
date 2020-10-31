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
            "creator" => $this->input->post('creator', true),
            "publishedAt" => $this->input->post('publishedAt', true),
            "judul" => $this->input->post('judul', true),
            "konten" => $this->input->post('konten', true)
        ];

        $this->db->insert('berita', $data);
    }

    public function hapusBerita($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('berita');
    }


    public function editBerita()
    {
        $data = [
            "creator" => $this->input->post('creator', true),
            "publishedAt" => $this->input->post('publishedAt', true),
            "judul" => $this->input->post('judul', true),
            "konten" => $this->input->post('konten', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('berita', $data);
        echo $this->db->last_query();
    }


    public function ubahkeDefaultImgApp()
    {
        $data = [
            "creator" => $this->input->post('creator', true),
            "publishedAt" => $this->input->post('publishedAt', true),
            "judul" => $this->input->post('judul', true),
            "konten" => $this->input->post('konten', true),
            "gambar" => 'item_default.png',
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('berita', $data);
    }


    public function tambahDefaultImgApp()
    {
        $data = [
            "creator" => $this->input->post('creator', true),
            "publishedAt" => $this->input->post('publishedAt', true),
            "judul" => $this->input->post('judul', true),
            "konten" => $this->input->post('konten', true),
            "gambar" => 'item_default.png',
        ];


        $this->db->insert('berita', $data);
    }
}

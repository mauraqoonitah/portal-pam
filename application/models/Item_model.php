<?php

class Item_model extends CI_Model
{
    public function getAllItem()
    {
        return $this->db->get('item')->result_array();
    }
    public function tambahAplikasi()
    {
        $data = [
            "nama" => $this->input->post('name', true),
            "link" => $this->input->post('link', true),
            "deskripsi" => $this->input->post('deskripsi', true)
        ];

        $this->db->insert('item', $data);
    }

    public function getItemById($id)
    {
        return $this->db->get_where('item', ['id' => $id])->row_array();
    }

    public function tambahDefaultImgApp()
    {
        $data = [
            "nama" => $this->input->post('name', true),
            "icon" => 'item_default.png',
            "link" => $this->input->post('link', true),
            "deskripsi" => $this->input->post('deskripsi', true)

        ];

        $this->db->insert('item', $data);
    }
    public function hapusAplikasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('item');
    }

    public function editAplikasi()
    {
        $data = [
            "nama" => $this->input->post('name', true),
            "link" => $this->input->post('link', true),
            "deskripsi" => $this->input->post('deskripsi', true)
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('item', $data);
    }


    public function ubahkeDefaultImgApp()
    {
        $data = [
            "nama" => $this->input->post('name', true),
            "icon" => 'item_default.png',
            "link" => $this->input->post('link', true),
            "deskripsi" => $this->input->post('deskripsi', true)

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('item', $data);
    }
}

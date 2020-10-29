<?php

class Admin_model extends CI_Model
{

    public function getAllAdmin()
    {
        return $this->db->get('admin')->result_array();
    }
    public function getAdminById($id)
    {
        return $this->db->get_where('admin', ['id' => $id])->row_array();
    }
    public function hapusAccount($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin');
    }
}

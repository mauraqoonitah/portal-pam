<?php

class Admin_model extends CI_Model
{

    public function getAllAdmin()
    {
        return $this->db->get('admin')->result_array();
    }
    public function getBeritaById($id)
    {
        return $this->db->get_where('admin', ['id' => $id])->row_array();
    }
}

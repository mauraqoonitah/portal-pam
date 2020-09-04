<?php

class Item_model extends CI_Model
{


    public function getAllItem()
    {
        return $this->db->get('item')->result_array();
    }
}

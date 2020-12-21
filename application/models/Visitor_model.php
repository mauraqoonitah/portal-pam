<?php

class Visitor_model extends CI_Model
{

    public function getVisitor()
    {
        return $this->db->get('visitorcount')->result_array();

    }

}

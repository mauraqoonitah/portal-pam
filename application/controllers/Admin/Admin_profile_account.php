<?php

class Admin_profile_account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'My Profile';

        $this->load->view('admin/admin_template/head', $data);
        $this->load->view('admin/admin_template/navbar', $data);
        $this->load->view('admin/admin_template/sidebar', $data);
        $this->load->view('admin/admin_account/profile_account', $data);
        $this->load->view('admin/admin_template/footer');
    }
}

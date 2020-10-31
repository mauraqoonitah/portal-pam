<?php
defined('BASEPATH') or exit('Nodirect script access allowed');

class Admin_home extends CI_Controller
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

        $data['title'] = 'Dashboard Admin | Portal PAM Jaya';

        $this->load->view('admin/admin_template/head', $data);
        $this->load->view('admin/admin_template/navbar', $data);
        $this->load->view('admin/admin_template/sidebar', $data);
        $this->load->view('admin/admin_home/dashboard',  $data);
        $this->load->view('admin/admin_template/footer');
    }
}

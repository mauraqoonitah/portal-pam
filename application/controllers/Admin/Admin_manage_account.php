<?php

class Admin_manage_account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Manage Akun';

        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['adminAkun'] = $this->Admin_model->getAllAdmin();


        if ($this->form_validation->run() == false) {
            $this->load->view('admin/admin_template/head', $data);
            $this->load->view('admin/admin_template/navbar', $data);
            $this->load->view('admin/admin_template/sidebar', $data);
            $this->load->view('admin/admin_account/manage_account', $data);
            $this->load->view('admin/admin_template/footer');
        } else {
            redirect(base_url('admin/admin_manage_account'));
        }
    }
}

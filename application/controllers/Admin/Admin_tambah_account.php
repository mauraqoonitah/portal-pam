<?php

class Admin_tambah_account extends CI_Controller
{

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Tambah Akun Admin | Admin Portal PAM Jaya';

        $this->load->view('admin/admin_template/head', $data);
        $this->load->view('admin/admin_template/navbar', $data);
        $this->load->view('admin/admin_template/sidebar', $data);
        $this->load->view('admin/admin_account/tambah_account');
        $this->load->view('admin/admin_template/footer');
    }
}

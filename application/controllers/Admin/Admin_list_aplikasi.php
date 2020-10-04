<?php

class Admin_list_Aplikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    }
    public function index()
    {
        $data['item'] = $this->Item_model->getAllItem();
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Daftar Aplikasi Portal | Admin Portal PAM Jaya';

        $this->load->view('admin/admin_template/head', $data);
        $this->load->view('admin/admin_template/navbar', $data);
        $this->load->view('admin/admin_template/sidebar', $data);
        $this->load->view('admin/admin_aplikasi/list_aplikasi', $data);
        $this->load->view('admin/admin_template/footer');
    }
    public function hapus($id)
    {
        $this->Item_model->hapusAplikasi($id);
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('admin/Admin_list_aplikasi');
    }
}

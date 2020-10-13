<?php

class Admin_tambah_berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        $this->load->helper('url');
        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Tambah Berita | Admin Portal PAM Jaya';

        $this->form_validation->set_rules('judul', 'Judul Berita', 'required');
        $this->form_validation->set_rules('konten', 'Konten Berita', 'required');
        $this->form_validation->set_rules('publishedAt', 'Tanggal Berita');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/admin_template/head', $data);
            $this->load->view('admin/admin_template/navbar', $data);
            $this->load->view('admin/admin_template/sidebar', $data);
            $this->load->view('admin/admin_berita/tambah_berita', $data);
            $this->load->view('admin/admin_template/footer');
        } else {
            $this->Berita_model->tambahBerita();
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect(base_url('admin/Admin_tambah_berita'));
        }
    }
}

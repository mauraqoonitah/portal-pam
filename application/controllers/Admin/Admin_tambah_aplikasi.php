<?php

class Admin_tambah_aplikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        if (!$this->session->userdata('email')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $this->load->helper('url');

        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['item'] = $this->Item_model->getAllItem();



        $data['title'] = 'Tambah Aplikasi Portal | Admin Portal PAM Jaya';

        $this->form_validation->set_rules('name', 'Nama Aplikasi', 'required');
        $this->form_validation->set_rules('link', 'Link Aplikasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Aplikasi', 'required');
        $this->form_validation->set_rules('icon', 'Logo Aplikasi');




        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/admin_template/head', $data);
            $this->load->view('admin/admin_template/navbar', $data);
            $this->load->view('admin/admin_template/sidebar', $data);
            $this->load->view('admin/admin_aplikasi/tambah_aplikasi', $data);
            $this->load->view('admin/admin_template/footer');
        } else {


            $upload_image = $_FILES['icon']['name'];

            if ($upload_image) {
                $config['allowed_types'] = "jpg|png|jpeg";
                $config['max-size'] = '2048';
                $config['upload_path'] = './assets/img/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('icon')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('icon', $new_image);
                }
            } else {
                // no image uploaded - set default image

                $this->Item_model->tambahDefaultImgApp();

                $this->session->set_flashdata('flash', 'ditambahkan!');
                redirect('admin/Admin_tambah_aplikasi');
            }
            $this->Item_model->tambahAplikasi();
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect('admin/Admin_tambah_aplikasi');
        }
    }
}

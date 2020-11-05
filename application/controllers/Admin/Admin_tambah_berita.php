<?php

class Admin_tambah_berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
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

        $data['berita'] = $this->Berita_model->getBerita();

        $data['title'] = 'Tambah Berita | Admin Portal PAM Jaya';

        $this->form_validation->set_rules('judul', 'Judul Berita', 'required');
        $this->form_validation->set_rules('konten', 'Konten Berita', 'required');
        $this->form_validation->set_rules('publishedAt', 'Tanggal Berita');
        $this->form_validation->set_rules('gambar', 'Gambar Berita');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/admin_template/head', $data);
            $this->load->view('admin/admin_template/navbar', $data);
            $this->load->view('admin/admin_template/sidebar', $data);
            $this->load->view('admin/admin_berita/tambah_berita', $data);
            $this->load->view('admin/admin_template/footer');
        } else {


            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = "jpg|png|jpeg";
                $config['max-size'] = '2048';
                $config['upload_path'] = './assets/img/berita/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                }
            } else {
                // no image uploaded - set default image

                $this->Berita_model->tambahDefaultImgApp();

                $this->session->set_flashdata('flash', 'ditambahkan!');
                redirect('Admin/Admin_tambah_berita');
            }
            $this->Berita_model->tambahBerita();
            $this->session->set_flashdata('flash', 'ditambahkan!');
            redirect(base_url('Admin/Admin_tambah_berita'));
        }
    }
}

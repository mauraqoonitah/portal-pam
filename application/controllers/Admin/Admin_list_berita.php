<?php
ob_start();

class Admin_list_berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
        if (!$this->session->userdata('email')) {
            redirect(base_url('login'));
        }
    }

    public function index()
    {
        $data['berita'] = $this->Berita_model->getBerita();

        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Daftar Berita Portal | Admin Portal PAM Jaya';

        $this->load->view('admin/admin_template/head', $data);
        $this->load->view('admin/admin_template/navbar', $data);
        $this->load->view('admin/admin_template/sidebar', $data);
        $this->load->view('admin/admin_berita/list_berita');
        $this->load->view('admin/admin_template/footer');
    }
    public function hapus($id)
    {
        $this->Berita_model->hapusBerita($id);
        $this->session->set_flashdata('flash', 'dihapus!');
        redirect('Admin/Admin_list_berita');
    }
    public function edit($id)
    {
        $this->load->helper('url');

        $data['admin'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->Berita_model->getBerita();
        $data['berita'] = $this->Berita_model->getBeritaById($id);



        $data['title'] = 'Edit Berita Portal | Admin Portal PAM Jaya';

        $this->form_validation->set_rules('creator', 'Creator', 'required');
        $this->form_validation->set_rules('publishedAt', 'Tgl Posting', 'required');
        $this->form_validation->set_rules('konten', 'Konten Berita', 'required');
        $this->form_validation->set_rules('gambar', 'Gambar');




        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/admin_template/head', $data);
            $this->load->view('admin/admin_template/navbar', $data);
            $this->load->view('admin/admin_template/sidebar', $data);
            $this->load->view('admin/admin_berita/edit_berita', $data);
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

                $this->Berita_model->ubahkeDefaultImgApp();

                $this->session->set_flashdata('flash', 'diubah!');
                redirect('Admin/Admin_list_berita');
            }
            $this->Berita_model->editBerita();
            $this->session->set_flashdata('flash', 'diubah!');
            redirect('Admin/Admin_list_berita/');
        }
    }
}

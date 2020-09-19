<?php

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Berita_model');
    }

    public function index()
    {

        $data['berita'] = $this->Berita_model->getBerita();
        $this->load->helper('url');

        $data['title'] = 'Berita Internal | PAM Jaya';
        $this->load->view('templates/header', $data);
        $this->load->view('berita/index');
        $this->load->view('templates/footer');
    }

    public function konten($id)
    {

        $data['title'] = 'Berita Internal | PAM Jaya';
        $data['berita'] = $this->Berita_model->getBeritaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('berita/konten',  $data);
        $this->load->view('templates/footer');
    }
}

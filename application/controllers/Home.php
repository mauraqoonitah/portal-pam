<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Item_model');
    }

    public function index()
    {
        $data['item'] = $this->Item_model->getAllItem();
        $this->load->helper('url');

        $data['title'] = 'Portal Aplikasi PAM Jaya';

        $this->load->view('templates/header', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/footer');

        // visitor counter
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); 
        date_default_timezone_set('Asia/Jakarta');
        $timeinsert = date("Y-m-d H:i:s");        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->db->query("SELECT * FROM visitorcount WHERE ip='".$ip."' AND date='".$date."'")->num_rows();
        $ss = isset($s)?($s):0;

        // Kalau belum ada, simpan data user tersebut ke database
        if($ss == 0){
            $this->db->query("INSERT INTO visitorcount(ip, date, hits,  time) VALUES('".$ip."','".$date."','1','".$timeinsert."')");
        }
 
    // Jika sudah ada, update
        else{
            $this->db->query("UPDATE visitorcount SET hits=hits+1  WHERE ip='".$ip."' AND date='".$date."'");
        }
    }
    public function ubahpassword()
    {
        $this->load->helper('url');

        $data['title'] = 'Ubah Password';

        $this->load->view('templates/header', $data);
        $this->load->view('home/ubahpassword', $data);
        $this->load->view('templates/footer');
    }
    public function aksesSIL()
    {
        $this->load->helper('url');

        $data['title'] = 'Sistem Informasi Laboratorium';

        $this->load->view('templates/header', $data);
        $this->load->view('home/aksesSIL', $data);
        $this->load->view('templates/footer');
    }
}

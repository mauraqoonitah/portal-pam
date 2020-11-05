<?php

class Admin_manage_account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('auth');
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
            redirect(base_url('Admin/Admin_manage_account'));
        }
    }
    public function hapusAccount($id)
    {
        $this->Admin_model->hapusAccount($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Delete success!</div>');
        redirect(base_url('Admin/Admin_manage_account'));
    }

    public function changeRole()
    {
        $role_id = $this->input->post('roleId');
        $id = $this->input->post('id');
        $data = [
            'role_id' => $role_id,
            'id' => $id
        ];

        if ($role_id == "1") {
            $this->session->set_flashdata('message', '<div class="alert alert-success  col-lg-4" role="alert">
            Status Super Admin: <b>OFF</b></div>');
            $data = [
                "role_id" => "2",
                'id' => $id
            ];
            $this->db->set('role_id', $data);
            $this->db->where('id', $id);
            $this->db->update('admin', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success col-lg-4" role="alert">
            Status Super Admin: <b>ON</b></div>');
            $data = [
                "role_id" => "1"
            ];
            $this->db->set('role_id', $data);
            $this->db->where('id', $id);
            $this->db->update('admin', $data);
        }
    }

    public function activeStatus()
    {
        $is_active = $this->input->post('activeId');
        $id = $this->input->post('id');
        $data = [
            'is_active' => $is_active,
            'id' => $id
        ];

        if ($is_active == "0") {
            $this->session->set_flashdata('message', '<div class="alert alert-success  col-lg-4" role="alert">
            Status Active: <b>ON</b></div>');

            $data = [
                "is_active" => "1",
                'id' => $id
            ];
            $this->db->set('is_active', $data);
            $this->db->where('id', $id);
            $this->db->update('admin', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success  col-lg-4" role="alert">
            Status Active: <b>OFF</b></div>');

            $data = [
                "is_active" => "0"
            ];
            $this->db->set('is_active', $data);
            $this->db->where('id', $id);
            $this->db->update('admin', $data);
        }
    }
}

<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect(base_url('login'));
    } else {

        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu'])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('login/blocked');
        }
    }
}

function check_access($is_active)
{
    $ci = get_instance();

    $ci->db->get_where('admin', [
        'is_active' => $is_active

    ]);
    // active account
    if ($is_active == '1') {
        return "checked='checked'";
        //account not active
    }
}


function check_status($role_id)
{
    $ci = get_instance();

    $ci->db->get_where('admin', [
        'role_id' => $role_id
    ]);
    //status as admin
    if ($role_id == '1') {
        return "checked='checked'";
    }
}

function admin_berita($role_id)
{
    $ci = get_instance();

    $ci->db->get_where('admin', [
        'role_id' => $role_id
    ]);
    //status as admin
    if ($role_id == '3') {
        return "checked='checked'";
    }
}

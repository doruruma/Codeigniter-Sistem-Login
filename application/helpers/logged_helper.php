<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('auth');
    } else {
        $role_id = $ci->session->userdata['role_id'];
        $menu = $ci->uri->segment(1);

        //SELECT * FROM user_menu WHERE menu = $menu;
        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        //SELECT * FROM user_access_menu WHERE role_id = $role_id AND menu_id = $menu_id
        $userAccess = $ci->db->get_where(
            'user_access_menu',
            [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ]
        );
        if ($userAccess->num_rows() < 1) {  //jika tidak ketemu atau tidak cocok
            redirect('auth/blocked');
        }
    }
}

function flashalert($param, $type)
{
    $ci = get_instance();
    $ci->session->set_flashdata('flash', $param);
    $ci->session->set_flashdata('type', $type);
}

function check_access($role_id, $menu_id)
{
    $ci = get_instance();
    $query = $ci->db->where('role_id', $role_id)->where('menu_id', $menu_id)->get('user_access_menu');
    if ($query->num_rows()) {
        return "checked='checked'";
    }
}
<?php

class Menu_model extends CI_Model
{
    public function tampilMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function addmenu()
    {
        $menu = $this->input->post('menu', true);
        $this->db->insert('user_menu', ['menu' => $menu]);
        flashalert('Input Successfull', 'success');
        redirect('menu');
    }

    public function getMenu($id)
    {
        return $this->db->where('id', $id)->get('user_menu')->row_array();
    }

    public function addsubmenu()
    {
        $data = [
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('menu_id', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('is_active', true)
        ];
        $this->db->insert('user_sub_menu', $data);
        flashalert('Input Succesfull', 'success');
        redirect('menu/submenu');
    }

    public function tampilSubmenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }

    public function getSubmenu($id)
    {
        return $this->db->where('id', $id)->get('user_sub_menu')->row_array();
    }
}

?>
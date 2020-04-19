<?php

class Admin extends CI_Controller
{
    public $data = [];

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // echo "selamat datang " . $data['user']['name'];
    }

    public function index()
    {
        $this->data['title'] = 'Dashboard';
        $this->data['users'] = $this->db->count_all('user');
        $this->data['menu'] = $this->db->count_all('user_menu');
        $this->data['submenu'] = $this->db->count_all('user_sub_menu');

        $this->load->view('templates/user/header', $this->data);
        $this->load->view('templates/user/sidebar', $this->data);
        $this->load->view('templates/user/topbar', $this->data);
        $this->load->view('admin/index', $this->data);
        $this->load->view('templates/user/footer');
    }

    public function editrole($id)
    {
        $this->Role_model->editrole($id);
    }

    public function hapusrole($id)
    {
        $this->Role_model->hapusrole($id);
    }

    public function ambilrole($id)
    {
        echo json_encode($this->Role_model->ambilrole($id));
    }

    public function role()
    {
        $this->data['title'] = 'Role Management';
        $this->data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header', $this->data);
            $this->load->view('templates/user/sidebar', $this->data);
            $this->load->view('templates/user/topbar', $this->data);
            $this->load->view('admin/role', $this->data);
            $this->load->view('templates/user/footer');
        } else {
            $data = [
                'role' => ucwords($this->input->post('role', true))
            ];
            $this->db->insert('user_role', $data);
            flashalert('Input Successfull', 'success');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $this->data['title'] = 'Role Access';
        $this->data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();
        $this->data['menu'] = $this->db->where('id !=', 1)->get('user_menu')->result_array();

        $this->load->view('templates/user/header', $this->data);
        $this->load->view('templates/user/sidebar', $this->data);
        $this->load->view('templates/user/topbar', $this->data);
        $this->load->view('admin/role-access', $this->data);
        $this->load->view('templates/user/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $query = $this->db->get_where('user_access_menu', $data);
        if ($query->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        flashalert('Access Change', 'success');
    }
}

?>

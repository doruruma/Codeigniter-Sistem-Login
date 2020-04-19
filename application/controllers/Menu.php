<?php 

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Menu_model->tampilMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header', $data);
            $this->load->view('templates/user/sidebar', $data);
            $this->load->view('templates/user/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/user/footer');
        } else {
            $this->Menu_model->addmenu();
        }
    }

    public function editMenu($id)
    {
        $data = [
            'menu' => $this->input->post('menu', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('user_menu', $data);
        flashalert('Data has been edited successfully', 'success');
        redirect('menu');
    }

    public function ambilMenu($id)
    {
        echo json_encode($this->Menu_model->getMenu($id));
    }

    public function hapusMenu($id)
    {
        $this->db->where('id', $id)->delete('user_menu');
        flashalert('data has been removed Successfully', 'success');
        redirect('menu');
    }

    public function ambilSubmenu($id)
    {
        echo json_encode($this->Menu_model->getSubmenu($id));
    }

    public function editSubmenu($id)
    {
        $data = [
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('menu_id', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('is_active', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu', $data);
        flashalert('Data has been edited Successfully', 'success');
        redirect('menu/submenu');
    }

    public function hapusSubmenu($id)
    {
        $this->db->where('id', $id)->delete('user_sub_menu');
        flashalert('data has been removed Successfully', 'success');    //fungsi dari helper bikin sendiri
        redirect('menu/submenu');
    }

    public function submenu()
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->Menu_model->tampilSubmenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header', $data);
            $this->load->view('templates/user/sidebar', $data);
            $this->load->view('templates/user/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/user/footer');
        } else {
            $this->Menu_model->addsubmenu();
        }

    }
}

?>
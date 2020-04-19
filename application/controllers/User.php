<?php

class User extends CI_Controller
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
        $this->data['title'] = "My Profile";
        $this->load->view('templates/user/header', $this->data);
        $this->load->view('templates/user/sidebar', $this->data);
        $this->load->view('templates/user/topbar', $this->data);
        $this->load->view('user/index', $this->data);
        $this->load->view('templates/user/footer');
    }

    public function changepassword()
    {
        $this->form_validation->set_rules('current_pass', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_pass1', 'New Password', 'required|trim|min_length[6]|matches[new_pass2]');
        $this->form_validation->set_rules('new_pass2', 'Confirm New Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->data['title'] = "Change Password";
            $this->load->view('templates/user/header', $this->data);
            $this->load->view('templates/user/sidebar', $this->data);
            $this->load->view('templates/user/topbar', $this->data);
            $this->load->view('user/changepassword', $this->data);
            $this->load->view('templates/user/footer');
        } else {
            $current_pass = $this->input->post('current_pass');
            $new_pass = $this->input->post('new_pass1');
            if (!password_verify($current_pass, $this->data['user']['password'])) {
                flashalert('Invalid Password', 'error');
                redirect('user/changepassword');
            } else {
                if ($new_pass == $current_pass) {
                    flashalert('The new password is still the same', 'error');
                    redirect('user/changepassword');
                } else {
                    $hash = password_hash($new_pass, PASSWORD_DEFAULT);
                    $this->db->set('password', $hash)->where('email', $this->session->userdata['email'])->update('user');
                    flashalert('Password successfully changed', 'success');
                    redirect('user');
                }
            }
        }
    }

    public function edit()
    {
        $this->data['title'] = "Edit Profile";
        $this->data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user/header', $this->data);
            $this->load->view('templates/user/sidebar', $this->data);
            $this->load->view('templates/user/topbar', $this->data);
            $this->load->view('user/edit', $this->data);
            $this->load->view('templates/user/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            // gambar
            $img = $_FILES['image']['name'];
            if ($img) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/profile/';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {

                    $old_img = $this->data['user']['image'];
                    if ($old_img != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_img);  //menghapus gambar lama jika bukan default.jpg
                    }
                    $new_img = $this->upload->data('file_name');
                    $this->db->set('image', $new_img);

                } else {
                    flashalert($this->upload->display_errors(), 'error');
                    redirect('user');
                }
            }
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
            flashalert('Profile has been successfully edited', 'success');
            redirect('user');
        }

    }
}

?>

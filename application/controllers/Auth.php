<?php

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'WPU Login Page';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth/footer');
        } else {
            $this->Auth_model->_login();
        }
    }

    public function regist()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This Email has already registered']);
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|matches[rep_password]', ['matches' => 'password dont match!', 'min_length' => 'Password is too short', 'required' => 'Password required']);
        $this->form_validation->set_rules('rep_password', 'Password', 'required|trim|matches[password]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'WPU User Registration';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/regist');
            $this->load->view('templates/auth/footer');
        } else {
            $this->Auth_model->registration();
            flashalert('Account has been created, now check and activate your email', 'success');
            redirect('auth/regist');
        }
    }

    public function verify()
    {
        $this->Auth_model->verify();
    }

    public function logout()
    {
        $this->session->unset_userdata('email');    //membersihkan session user data email
        $this->session->unset_userdata('role_id');
        flashalert('You have been logged out', 'success');
        redirect('auth');
    }

    public function blocked()
    {
        flashalert('Access Denied', 'error');
        redirect('user');
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth/footer');
        } else {
            $email = $this->input->post('email', true);
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();
            //select * from user where email = $email and  is_active  = 1
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->Auth_model->sendEmail($token, 'forgot');
                flashalert('Check your email to reset password', 'success');
                redirect('auth/forgotpassword');

            } else {
                flashalert('Email is not registered yet or activated', 'error');
                redirect('auth/forgotpassword');
            }
        }
    }

    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user_token = $this->db->where('token', $token)->get('user_token')->row_array();
        $user_email = $this->db->where('email', $email)->get('user')->row_array();
        if ($user_email) {
            if ($user_token) {
                if (time() - $user_token['date_created'] < 3600) {
                    $this->session->set_userdata('reset_email', $email);
                    redirect('auth/pass');
                } else {
                    flashalert('Token Expired', 'error');
                    redirect('auth');
                }

            } else {
                flashalert('Failed! Invalid Token', 'error');
                redirect('auth');
            }
        } else {
            flashalert('Failed! Invalid Email', 'error');
            redirect('auth');
        }
    }

    public function changepassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('passsword', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('passsword2', 'Repeat password', 'trim|required|min_length[6]|matches[password]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth/header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth/footer');
        } else {
            $password = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('password', $password)->where('email', $email)->update('user');
            $this->session->unset_userdata('reset_email');
            $this->db->where('email', $email)->delete('user_token');
            flashalert('Password changed successfully', 'success');
            redirect('auth');
        }
    }
}
?>

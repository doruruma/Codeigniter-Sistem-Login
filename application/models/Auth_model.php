<?php 

class Auth_model extends CI_Model
{

    public function registration()
    {
        $email = $this->input->post('email', true);
        $data = [
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($email),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'date_created' => time()
        ];
        //token
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
        $this->db->insert('user_token', $user_token);
        $this->sendEmail($token, 'verify');
    }

    public function sendEmail($token, $param)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'andra.yuda0308@gmail.com',
            'smtp_pass' => '089635594373',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->from('andra.yuda0308@gmail.com', 'Calciffer');
        $this->email->to($this->input->post('email', true));
        if ($param == 'verify') {
            $this->email->subject('Account Activation');
            $this->email->message('Click this link to activate your account : <a href="' . base_url('auth/verify?email=' . $this->input->post('email', true)) . '&token=' . urlencode($token) . '">Activate</a><br>Link will expired in 1 hour');
        } else if ($param == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->Message('Click this link to reset you password : <a href="' . base_url('auth/resetpassword?email=' . $this->input->post('email', true)) . '&token=' . urlencode($token) . '">Reset Password</a><br>Link will expired in 1 hour');
        }
        if ($this->email->send()) {
            return true;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user_email = $this->db->where('email', $email)->get('user')->row_array();
        $user_token = $this->db->where('token', $token)->get('user_token')->row_array();
        if ($user_email) {
            if ($user_token) {
                if (time() - $user_token['date_created'] < 3600) {
                    $this->db->where('email', $email)->update('user', ['is_active' => 1]);
                    $this->db->where('email', $email)->delete('user_token');
                    flashalert($email . ' has been activated, now you can proceed login', 'success');
                    redirect('auth');
                } else {
                    $this->db->where('email', $email)->delete('user');
                    $this->db->where('email', $email)->delete('user_token');
                    flashalert('Token Expired Please registry again', 'error');
                    redirect('auth/regist');
                }
            } else {
                flashalert('Failed! Invalid Token', 'error');
                redirect('auth');
            }
        } else {
            flashalert('Failed! Invalid email', 'error');
            redirect('auth');
        }
    }

    public function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $login = $this->db->get_where('user', ['email' => $email])->row_array();
        // select * from user where email = $email lalu difetch
        if ($login) {
            if ($login['is_active'] == 1) {
                if (password_verify($password, $login["password"])) {
                    $data = ['email' => $login['email'], 'role_id' => $login['role_id']];
                    $this->session->set_userdata($data);        //mengeset session akun
                    if ($login['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    flashalert('Invalid Password!', 'error');
                    redirect('auth');
                }
            } else {
                flashalert('Email has not been activated', 'warning');
                redirect('auth');
            }
        } else {
            flashalert('Email is not Registered', 'error');
            redirect('auth');
        }
    }

}

?>
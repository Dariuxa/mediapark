<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class user
 */
class user extends CI_Controller
{

    public function register()
    {
        if($this->session->userdata('logged_in')) redirect('');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]|matches[password_conf]');
        $this->form_validation->set_rules('password_conf', 'Password confirmation', 'trim');
        $this->form_validation->set_rules('name', 'Name', 'trim|required|alpha|max_length[50]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $header['head_title'] = 'Registration';
            $this->load->view('view_top',$header);
            $this->load->view('user/view_register');
            $this->load->view('view_bottom');
        } else {
            $user_data = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
            );
            $this->load->model('model_users');
            $this->model_users->register_user($user_data);
            $this->session->set_flashdata('message', array('success' => 'Successfully registered'));
            redirect('');
        }
    }
    public function login()
    {
        if($this->session->userdata('logged_in')) redirect('');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[50]|callback_check_login');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]');
        if ($this->form_validation->run() == FALSE)
        {
            $header['head_title'] = 'Login';
            $this->load->view('view_top',$header);
            $this->load->view('user/view_login');
            $this->load->view('view_bottom');
        }
        else
        {
            $this->session->set_flashdata('message',array('success'=>'Successfully loggedin'));
            redirect();
        }
    }
    function check_login($email)
    {
        $password = md5($this->input->post('password'));
        $this->load->model('model_users');
        $user = $this->model_users->check_login($email,$password);
        if(empty($user))
        {
            $this->form_validation->set_message('check_login','Incorrect username or password');
            return false;
        }
        $this->session->set_userdata('logged_in', TRUE);
        $this->session->set_userdata('id', $user['id']);
        $this->session->set_userdata('email', $email);
        return true;
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect('');
    }

}
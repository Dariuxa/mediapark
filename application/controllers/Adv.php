<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class adv
 */
class adv extends CI_Controller
{

    public function index()
    {
        $this->load->view('view_top');
        $this->load->view('view_bottom');
    }

    public function new_advertisement()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');

        $this->form_validation->set_rules('title', 'Title', 'max_length[50]|trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('view_top');
            $this->load->view('adv/view_new_adv');
            $this->load->view('view_bottom');
        }
        else
        {
            $this->load->model('model_advertisements');
            $adv_data = array(
                'user_id'       => $this->session->userdata('id'),
                'title'			=> $this->input->post('title'),
                'description'	=> $this->input->post('description')
            );
            $this->load->model('model_advertisements');
            $this->model_advertisements->create_advertisement($adv_data);
            
            $this->session->set_flashdata('message',array('success' => 'Advertisement created'));
            redirect();
        }
    }

}
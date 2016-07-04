<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class adv
 */
class adv extends CI_Controller
{

    public function index($page = 0)
    {
        $this->load->view('view_top');
        $this->show_ads_list($page);
        $this->load->view('view_bottom');
    }

    public function new_advertisement()
    {
        if(!$this->session->userdata('logged_in')) redirect();

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

    public function my_advertisements($page = 0)
    {
        if(!$this->session->userdata('logged_in')) redirect();
        $this->load->view('view_top');
        $this->show_ads_list($page,$this->session->userdata('id'),'my-advertisements');
        $this->load->view('view_bottom');
    }

    private function show_ads_list($page, $user = 0, $url = '')
    {
        $this->load->model('model_advertisements');

        $this->load->library('pagination');
        $config['base_url'] = base_url().$url;
        $config['total_rows'] = $this->model_advertisements->adv_count($user);
        $config['uri_segment'] = $url?2:1;
        $config['per_page'] = 10;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
        
        // bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $data['ads_list'] = $this->model_advertisements->adv_list($user,$config['per_page'],$data['page'] = $page);

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('adv/view_adv_list',$data);
    }

}
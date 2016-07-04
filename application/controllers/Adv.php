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

}
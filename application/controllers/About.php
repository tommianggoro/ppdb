<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller {

    public function index(){
        $this->data['contents'] = $this->load->view('pages/about', $this->data, TRUE);
        $this->load->view('layouts/main', $this->data);
    }
}
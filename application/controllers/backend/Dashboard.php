<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_login')){
            redirect('auth');
        }
    }

    public function index(){
        $this->data['contents'] = $this->load->view('backend/dashboard/index', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }
}
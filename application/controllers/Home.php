<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index(){
                $this->data['_js'] = $this->load->view('pages/_js', $this->data, TRUE);
                $this->data['_css'] = $this->load->view('pages/_css', $this->data, TRUE);
                $this->data['contents'] = $this->load->view('pages/home', $this->data, TRUE);
                $this->load->view('layouts/main', $this->data);
	}
}
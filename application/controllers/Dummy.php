<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dummy extends MY_Controller {
    public function __construct(){
        parent::__construct();
    }
	public function send_mail(){
            $this->load->model('Email_model');
            $send = $this->Email_model->send('sasuke.reapers77@gmail.com', 'Test Mail Register');
            var_dump($send);exit;
    }

    public function add_user_admin(){
    	$email = $this->input->get('email');
    	$pass = $this->input->get('pass');
    	$name = $this->input->get('name');

    	if(empty($email) || empty($pass) || empty($name)){
    		echo "Must set email, pass, and name";
    		exit;
    	}

    	$this->load->model('User_model', 'users');
        $this->load->model('Role_user_model', 'role_users');
        $this->load->model('Profile_model', 'profile');

    	$dataUsers = array(
            'email' => $email,
            'password' => password_hash($pass, PASSWORD_DEFAULT)
        );

        $userSave = $this->users->save($dataUsers);

        $dataProfile = array(
            'user_id' => $userSave,
            'name' => $name,
            'nik' => null,
            'birth_place' => null,
            'birth_date' => null,
            'parent_name' => null,
            'address' => null,
            'rt' => null,
            'rw' => null,
            'kecamatan' => null,
            'kelurahan' => null,
            'city' => null,
            'phone' => null,
        );
                
        $profileSave = $this->profile->save($dataProfile);

        $dataRoleUser = array(
            'role_id' => 1,
            'user_id' => $userSave
        );
        
        $this->role_users->save($userSave, $dataRoleUser);

        echo "User ".$email." save as Admin ";
        exit;
    }
}
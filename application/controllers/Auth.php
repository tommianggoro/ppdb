<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends MY_Controller {
    public function __construct(){
        parent::__construct();

        $this->load->model('User_model', 'users');
        $this->load->model('Profile_model', 'profile');
        $this->load->model('Role_user_model', 'role_user');

    }

    public function index(){
        redirect('auth/login');
    }

    public function login(){
        if($this->session->userdata('is_login')){
            redirect('backend/dashboard');
        }
        if($this->input->post('submit')){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            $this->form_validation->set_message('required', '%s harus diisi');
            $this->form_validation->set_error_delimiters('<span class="invalid-feedback" style="display:block;">', '</span>');

            if($this->form_validation->run()){
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $check = $this->users->getDataByEmail($email);

                if(!empty($check)){
                    if(password_verify($password, $check->password)){
                        $this->session->set_userdata('is_login', TRUE);
                        $this->session->set_userdata('id', $check->id);
                        $this->session->set_userdata('email', $check->email);
                        $getProfile = $this->profile->getDataByUserId($check->id);
                        $this->session->set_userdata('name', $getProfile->name);

                        $role = $this->role_user->getRolesByUserId($check->id);
                        if($role){
                            $this->session->set_userdata('role_id', $role->role_id);
                        }

                        redirect('backend/dashboard');
                    } else{
                        $this->session->set_flashdata('error', 'Password tidak sesuai');
                    }
                } else{
                    $this->session->set_flashdata('error', 'Email tidak ditemukan');
                }
            }
            
        }
        $this->data['title'] = 'Login';
        $this->load->view('auth/login', $this->data);
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login');
    }

}
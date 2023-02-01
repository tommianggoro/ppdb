<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_login')){
            redirect('auth');
        }

        $this->load->model('User_model', 'users');
        $this->load->model('Role_user_model', 'role_users');
        $this->load->model('Profile_model', 'profile');
    }

    public function index(){
        $this->data['title'] = 'Kelola Users';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Kelola User'
            )
        );
        $this->data['allUser'] = $this->users->getAllData();
        $this->data['contents'] = $this->load->view('backend/users/index', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }

    public function add(){
        $this->data['title'] = 'Kelola Users';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Kelola User',
                'link' => base_url('backend/users')
            ),
            array(
                'title' => 'Tambah User'
            )
        );
        $this->_store();
        $this->data['contents'] = $this->load->view('backend/users/form', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }

    private function _store($id = null){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('name', 'Nama', 'required');

            if(empty($id)){
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
            } else if($id && $this->input->post('email')) {
                $userData = $this->users->getDataById($id);
                if($this->input->post('email') != $userData->email){
                    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
                }
            }
            if(!$id || ($id && $this->input->post('password')) ){
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
                $this->form_validation->set_rules('retype_password', 'Re-Type Password', 'required|matches[password]');
            }

            $this->form_validation->set_message('is_unique', '%s sudah terdaftar. Mohon menggunakan E-mail yang lain');
            $this->form_validation->set_message('min_length', '%s minimal %s karakter');
            $this->form_validation->set_message('required', '%s harus diisi');
            $this->form_validation->set_message('matches', '%s tidak sesuai');

            $this->form_validation->set_error_delimiters('<div class="invalid-feedback" style="display:block;">', '</div>');
            
            if($this->form_validation->run()){
                $password = $this->input->post('password');
                $dataUsers = array(
                    'email' => $this->input->post('email')
                );
                if(!empty($password)){
                    $dataUsers['password'] = password_hash($password, PASSWORD_DEFAULT);
                }
                if(empty($id)){
                    $userSave = $this->users->save($dataUsers);
                } else {
                    $dataUsers['updated'] = date('Y-m-d H:is');
                    $userSave = $this->users->update($id, $dataUsers);
                    $userSave = $id;
                }

                $dataProfile = array(
                    'name' => $this->input->post('name'),
                );
                if(empty($id)){
                    $dataProfile['user_id'] = $id;
                    $profileSave = $this->profile->save($dataProfile);
                } else {
                    $dataProfile['updated'] = date('Y-m-d H:is');
                    $profileSave = $this->profile->updateByUserId($id, $dataProfile);
                }

                if(empty($id)){
                    $dataRoleUser = array(
                        'role_id' => ROLE_ADMINISTRATOR,
                        'user_id' => $userSave
                    );
                    
                    $this->role_users->save($id, $dataRoleUser);
                }
                
                if(empty($id))
                    $this->session->set_flashdata('success', 'Sukses menambah user');
                else
                    $this->session->set_flashdata('success', 'Sukses mengubah user');

                redirect('backend/users');
            }
        }
    }

    public function edit($id = null){
        if(empty($id)){
            $this->session->set_flashdata('failed', 'Akses dilarang');
            redirect('backend/users');
        }
        $this->data['title'] = 'Kelola Users';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Kelola User',
                'link' => base_url('backend/users')
            ),
            array(
                'title' => 'Ubah User'
            )
        );

        $this->_store($id);
        $this->data['userData'] = $this->users->getDataById($id);
        $this->data['contents'] = $this->load->view('backend/users/form', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }

    public function delete($id = null){
        if($id){
            $userData = $this->users->getDataById($id);
            if(!empty($userData)){
                $this->role_users->deleteByUserId($id);
                $this->profile->deleteByUserId($id);
                $this->users->delete($id);
            }
        }

        $this->session->set_flashdata('success', 'Sukses menghapus user');
        redirect('backend/users');
    }
}
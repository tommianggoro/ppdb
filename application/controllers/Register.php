<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {
        public function __construct(){
                parent::__construct();

                $this->load->model('User_model', 'users');
                $this->load->model('Profile_model', 'profile');
        }
	public function index(){
                $this->_store();
                $this->data['contents'] = $this->load->view('pages/register', $this->data, TRUE);
                $this->data['_js'] = $this->load->view('pages/_js', $this->data, TRUE);
                $this->data['_css'] = $this->load->view('pages/_css', $this->data, TRUE);
                $this->load->view('layouts/main', $this->data);
        }       

        private function _store(){
                if($this->input->post('submit')){
                        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
                        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

                        $this->form_validation->set_rules('name', 'Nama', 'required');
                        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
                        $this->form_validation->set_rules('birth_place', 'Tempat Lahir', 'required');
                        $this->form_validation->set_rules('birth_date', 'Tanggal Lahir', 'required');

                        $this->form_validation->set_rules('parent_name', 'Nama Orang Tua', 'required');
                        $this->form_validation->set_rules('address', 'Alamat', 'required');
                        $this->form_validation->set_rules('rt', 'RT', 'required|numeric');
                        $this->form_validation->set_rules('rw', 'RW', 'required|numeric');
                        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
                        $this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required');
                        $this->form_validation->set_rules('city', 'Kabupaten / Kota', 'required');
                        $this->form_validation->set_rules('phone', 'No. Telpon', 'required|numeric');

                        $this->form_validation->set_message('numeric', '%s harus angka');
                        $this->form_validation->set_message('is_unique', '%s sudah terdaftar. Mohon menggunakan E-mail yang lain');
                        $this->form_validation->set_message('min_length', '%s minimal %s karakter');
                        $this->form_validation->set_message('required', '%s harus diisi');

                        $this->form_validation->set_error_delimiters('<div class="invalid-feedback" style="display:block;">', '</div>');

                        if($this->form_validation->run()){
                                $inputUsers = array(
                                        'email' => $this->input->post('email'),
                                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                                );
                                
                                $userSave = $this->users->save($inputUsers);

                                $inputData = array(
                                        'user_id' => $userSave,
                                        'name' => $this->input->post('name'),
                                        'nik' => $this->input->post('nik'),
                                        'birth_place' => $this->input->post('birth_place'),
                                        'birth_date' => date('Y-m-d', strtotime($this->input->post('birth_date'))),
                                        'parent_name' => $this->input->post('parent_name'),
                                        'address' => $this->input->post('address'),
                                        'rt' => $this->input->post('rt'),
                                        'rw' => $this->input->post('rw'),
                                        'kecamatan' => $this->input->post('kecamatan'),
                                        'kelurahan' => $this->input->post('kelurahan'),
                                        'city' => $this->input->post('city'),
                                        'phone' => $this->input->post('phone'),
                                );
                                $save = $this->profile->save($inputData);
                                
                                $dataRoleUser = array(
                                        'role_id' => ROLE_CANDIDATE,
                                        'user_id' => $userSave
                                );
                                $this->load->model('Role_user_model', 'role_user');
                                $this->role_user->save($dataRoleUser, $userSave);
                                if($save){
                                        $this->load->model('Email_model');
                                        $sent = $this->Email_model->send($inputUsers['email'], 'Registrasi PPDB SMK Harapan Massa');
                                        // var_dump($sent);exit;
                                        $this->session->set_flashdata('success' , 'Data berhasil tersimpan');
                                        redirect('/register');
                                }

                        }
                }
        }
}
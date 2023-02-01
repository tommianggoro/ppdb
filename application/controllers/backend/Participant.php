<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participant extends MY_Controller {

    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_login')){
            redirect('auth');
        }

        $this->load->model('Participant_model', 'participants');
        $this->load->model('Profile_model', 'profile');
        $this->load->model('Role_model', 'roles');
        $this->load->model('Role_user_model', 'role_user');
    }

    public function index(){
        $this->data['title'] = 'Kelola Peserta Didik';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Kelola Peserta Didik'
            )
        );
        $this->data['allData'] = $this->participants->getParticipants();
        $this->data['contents'] = $this->load->view('backend/participant/index', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }

    public function edit($id = null){
        if(empty($id)){
            $this->session->set_flashdata('failed', 'Akses dilarang');
            redirect('backend/participant');
        }
        $this->data['title'] = 'Kelola Peserta Didik';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Kelola Peserta Didik',
                'link' => base_url('backend/participant')
            ),
            array(
                'title' => 'Ubah Peserta Didik'
            )
        );

        $this->data['participantData'] = $this->participants->getDataParticipant($id);
        if(empty($this->data['participantData'])){
            $this->session->set_flashdata('failed', 'Data tidak ditemukan');
            redirect('backend/participant');
        }

        if($this->input->post('submit')){
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
            $this->form_validation->set_message('required', '%s harus diisi');

            $this->form_validation->set_error_delimiters('<div class="invalid-feedback" style="display:block;">', '</div>');

            if($this->form_validation->run()){
                $inputData = array(
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
                $save = $this->profile->updateByUserId($id, $inputData);
                
                $oldRole = $this->data['participantData']->role_id;
                $newRole = $this->input->post('role');
                $dataRoleUser = array(
                    'role_id' => $newRole,
                    'user_id' => $id
                );
                $roleSave = $this->role_user->save($id, $dataRoleUser);
                $this->session->set_flashdata('success', 'Sukses mengubah data');

                if( ($oldRole != $newRole) && $newRole != ROLE_CANDIDATE ){
                    $email = $this->data['participantData']->email;
                    $this->load->model('Email_model');
                    $template = 2;
                    if($newRole == ROLE_NOT_PASS)
                        $template = 3;
                    $sent = $this->Email_model->send($email, 'Hasil Seleksi PPDB SMK Harapan Massa', $template);
                }
                redirect('backend/participant');
                
            }
        }
        $this->load->model('Documents_model', 'documents');
        $this->data['documents'] = $this->documents->getDataByUser($id);
        $this->data['roles'] = $this->roles->getAllData();
        $this->data['_js'] = $this->load->view('backend/participant/_js', $this->data, TRUE);
        $this->data['_css'] = $this->load->view('backend/participant/_css', $this->data, TRUE);
        $this->data['contents'] = $this->load->view('backend/participant/form', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }
}
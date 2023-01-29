<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends MY_Controller {

    public function __construct(){
        parent::__construct();

        if(!$this->session->userdata('is_login')){
            redirect('auth');
        }

        $this->load->model('Role_model', 'roles');
    }

    public function index(){
        $this->data['title'] = 'Kelola Role';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Kelola Role'
            )
        );
        $this->data['allRole'] = $this->roles->getAllData();
        $this->data['contents'] = $this->load->view('backend/role/index', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }

    public function add(){
        $this->data['title'] = 'Kelola Role';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Kelola Role',
                'link' => base_url('backend/role')
            ),
            array(
                'title' => 'Tambah Role'
            )
        );
        $this->_store();
        $this->data['contents'] = $this->load->view('backend/role/form', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }

    public function edit($id = null){
        if(empty($id)){
            $this->session->set_flashdata('failed', 'Akses dilarang');
            redirect('backend/role');
        }
        $this->data['title'] = 'Kelola Role';
        $this->data['breadcrumbs'] = array(
            array(
                'title' => 'Kelola Role',
                'link' => base_url('backend/role')
            ),
            array(
                'title' => 'Ubah Role'
            )
        );

        $this->_store($id);
        $this->data['roleData'] = $this->roles->getDataById($id);
        $this->data['contents'] = $this->load->view('backend/role/form', $this->data, true);
        $this->load->view('backend/layouts', $this->data);
    }

    public function delete($id = null){
        if($id){
            $userData = $this->roles->getDataById($id);
            if(!empty($userData)){
                $this->roles->delete($id);
            }
        }

        $this->session->set_flashdata('success', 'Sukses menghapus role');
        redirect('backend/role');
    }

    private function _store($id = null){
        if($this->input->post('submit')){
            $this->form_validation->set_rules('name', 'Nama', 'required');
            $this->form_validation->set_message('required', '%s harus diisi');

            $this->form_validation->set_error_delimiters('<div class="invalid-feedback" style="display:block;">', '</div>');

            if($this->form_validation->run()){
                $dataRole = array(
                    'name' => $this->input->post('name')
                );
                if(empty($id))
                    $this->roles->save($dataRole);
                else{
                    $dataRole['updated'] = date('Y-m-d H:is');
                    $this->roles->update($dataRole, $id);
                }

                if(!$id)
                    $this->session->set_flashdata('success', 'Sukses menambah role');
                else
                    $this->session->set_flashdata('success', 'Sukses mengubah role');

                redirect('backend/role');
            }
        }
    }
}
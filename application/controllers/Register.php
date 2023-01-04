<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {
	public function index(){
                $this->_store();
                $this->data['contents'] = $this->load->view('pages/register', $this->data, TRUE);
                $this->data['_js'] = $this->load->view('pages/_js', $this->data, TRUE);
                $this->data['_css'] = $this->load->view('pages/_css', $this->data, TRUE);
                $this->load->view('layouts/main', $this->data);
}

        private function _store(){
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

                                $this->load->model('Participant_model', 'participant');

                                $save = $this->participant->save($inputData);

                                if($save){
                                        $this->session->set_flashdata('success' , 'Data berhasil tersimpan');
                                        redirect('/register');
                                }

                        }
                }
        }
}
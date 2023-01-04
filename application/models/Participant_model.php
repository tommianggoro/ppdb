<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participant_model extends CI_Model{
    public function __construct(){
        parent::__construct();

        $this->load->database('default');
    }

    public function save($data = array()){
        $this->db->insert('participant', $data);

        return $this->db->insert_id();
    }
}
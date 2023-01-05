<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();

        $this->load->database('default');
    }

    public function save($data = array()){
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function getDataFromEmail($email = null){
        if($email){
            $this->db->where('email', $email);
            $query = $this->db->get('users');
            if($query->num_rows()){
                return $query->row();
            }
        }
        return false;
    }
}
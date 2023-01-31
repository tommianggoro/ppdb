<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile_model extends CI_Model{

	private $tableName = 'profile';
    public function __construct(){
        parent::__construct();

        $this->load->database('default');
    }

    public function save($data){
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data = array()){
        $this->db->where('id', $id);
        $this->db->update($this->tableName, $data);
        return $this->db->affected_rows();
    }

    public function updateByUserId($id, $data = array()){
        $this->db->where('user_id', $id);
        $this->db->update($this->tableName, $data);
        return $this->db->affected_rows();
    }

    public function deleteByUserId($id){
        $this->db->where('user_id', $id);
        $this->db->delete($this->tableName);
        return $this->db->affected_rows();
    }

    public function getDataByUserId($id = null){
        if($id){
            $this->db->where('user_id', $id);
            $query = $this->db->get($this->tableName);
            if($query->num_rows()){
                return $query->row();
            }
        }
        return false;
    }
}
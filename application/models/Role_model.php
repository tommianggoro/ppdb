<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_model extends CI_Model{

	private $tableName = 'role';
    public function __construct(){
        parent::__construct();

        $this->load->database('default');
    }

    public function save($data = array()){
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    public function getAllData(){
        $query = $this->db->get($this->tableName);
        if($query->num_rows()){
            return $query->result();
        }
        return null;
    }

    public function update($data, $id){
        $this->db->where('id', $id);
        $this->db->update($this->tableName, $data);
        return $this->db->affected_rows();
    }

    public function getDataById($id = null){
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get($this->tableName);
            if($query->num_rows()){
                return $query->row();
            }
        }
        return false;
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tableName);
        return $this->db->affected_rows();
    }
}
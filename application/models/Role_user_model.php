<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_user_model extends CI_Model{
    private $tableName = 'role_user';

    public function __construct(){
        parent::__construct();

        $this->load->database('default');
    }

    public function save($data = array(), $id){
    	if($id){
    		$this->deleteByUserId($id);
    	}
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    public function deleteByUserId($id){
    	$this->db->where('user_id', $id);
    	$this->db->delete($this->tableName);

    	return $this->db->affected_rows();
    }

    public function getRolesByUserId($id){
    	$this->db->where('user_id', $id);
    	$query = $this->db->get($this->tableName);

    	if($query->num_rows()){
    		return $query->row();
    	}
    	return false;
    }
}
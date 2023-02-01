<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
    private $tableName = 'users';

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

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->tableName);
        return $this->db->affected_rows();
    }

    public function getDataByEmail($email = null){
        if($email){
            $this->db->where('email', $email);
            $query = $this->db->get($this->tableName);
            if($query->num_rows()){
                return $query->row();
            }
        }
        return false;
    }

    public function getAllData(){
        $this->db->select('users.id, users.email, users.created, role.name as role_name');
        $this->db->join('role_user','user_id = users.id');
        $this->db->join('role','role.id = role_user.role_id');
        $query = $this->db->get($this->tableName);
        if($query->num_rows()){
            // var_dump($this->db->last_query());exit;
            return $query->result();
        }
        return null;
    }

    public function getDataById($id = null){
        if($id){
            $this->db->select('users.id as user_id, users.password, users.email, profile.name');
            $this->db->where('users.id', $id);
            $this->db->join('profile','users.id=profile.user_id');
            $query = $this->db->get($this->tableName);
            if($query->num_rows()){
                return $query->row();
            }
        }
        return false;
    }
}
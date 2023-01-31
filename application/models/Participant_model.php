<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Participant_model extends CI_Model{

	private $tableName = 'participant';
    public function __construct(){
        parent::__construct();

        $this->load->database('default');
    }

    public function getParticipants(){
        $this->db->select('users.id, users.created, profile.name, role.name as role_name');
        $this->db->join('role_user','role_user.user_id = users.id');
        $this->db->join('role','role_user.role_id = role.id');
        $this->db->join('profile','profile.user_id = users.id');
        $this->db->where('role_user.role_id IN ('.ROLE_CANDIDATE.','.ROLE_PASS.','.ROLE_NOT_PASS.')');
        $query = $this->db->get('users');
        // var_dump($this->db->last_query());exit;
        if($query->num_rows()){
            return $query->result();
        }
        return null;
    }

    public function getDataParticipant($id){
        if(empty($id)){
            return null;
        }
        $this->db->select('profile.*, role_user.role_id, users.email');
        $this->db->join('users', 'users.id = profile.user_id');
        $this->db->join('role_user', 'role_user.user_id = profile.user_id');
        $this->db->where('profile.user_id', $id);
        $query = $this->db->get('profile');
        if($query->num_rows()){
            return $query->row();
        }
        return null;
    }
}
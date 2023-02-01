<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documents_model extends CI_Model{

    public $tableName = 'documents';

    public function __construct(){
        parent::__construct();

        $this->load->database('default');
    }

    public function delDocs($userId){
        $this->db->where('user_id', $userId);
        // $this->db->like('file_name', $userId.'_documents_', 'after', true);
        $this->db->delete($this->tableName);
    }

    public function saveDocs($data){
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    public function getDataByUser($id){
        $this->db->where('user_id', $id);
        $query = $this->db->get($this->tableName);
        if($query->num_rows()){
            return $query->result();
        }
        return null;
    }
}
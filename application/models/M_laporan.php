<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_laporan extends CI_Model {
    
     public function __construct() {
        parent::__construct();
        
    }
   
    public function KueriData($kueri){
		return $this->db->query($kueri);
	}
	
	public function UpdateData($table, $data, $where){
		return $this->db->update($table, $data, $where);
	}
	
	public function DeleteData($table,$where){
		return $this->db->delete($table,$where);
    }
    
    public function InsertData($table_name,$data){
		return $this->db->insert($table_name, $data);
	}
}
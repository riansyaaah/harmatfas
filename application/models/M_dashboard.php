<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model {
    
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
}
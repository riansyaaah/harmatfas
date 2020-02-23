<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {
	function getCekLogin($where = ''){
		return $this->db->query("SELECT * FROM tbluser $where");
	}
	
	public function InsertData($table_name,$data){
		return $this->db->insert($table_name, $data);
	}
	
	public function UpdateData($table, $data, $where){
		return $this->db->update($table, $data, $where);
	}
	
	public function DeleteData($table,$where){
		return $this->db->delete($table,$where);
	}
}
?>
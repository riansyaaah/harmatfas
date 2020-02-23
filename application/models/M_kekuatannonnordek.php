<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kekuatannonnordek extends CI_Model {
    
     public function __construct() {
        parent::__construct();
        
    }
     function getData($where= '') 
    {
        return $this->db->query("SELECT * FROM tblharmatfastanpanordex $where");
    }
    public function KueriData($kueri){
		return $this->db->query($kueri);
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
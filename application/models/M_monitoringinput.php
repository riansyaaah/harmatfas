<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_monitoringinput extends CI_Model {
    
     public function __construct() {
        parent::__construct();
        
    }
     function getDataLog($where = ''){
		return $this->db->query("SELECT tbllog.id, tbllog.tanggal, tbllog.ip, tbllog.username, tbllog.uo, tblreferensi.uraian, tbllog.keterangan FROM tbllog left join tblreferensi on tbllog.uraian = tblreferensi.kodechild $where");
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
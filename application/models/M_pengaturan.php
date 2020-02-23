<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pengaturan extends CI_Model {
    
     public function __construct() {
        parent::__construct();
        
    }
    function getDatatandatangan($where= '') 
    {
        return $this->db->query("SELECT t.id, t.nrp, t.nama, t.pangkat, t.jabatan, t.status, t.uo, 
                                 tuo.uo as uo_id, tuo.uraianuo
                                 FROM tbltandatangan as t
                                 INNER JOIN tblunitorganisasi as tuo ON tuo.uo = t.uo
         $where");
    }
    
    function getTahunanggaran($where= '') 
    {
        return $this->db->query("SELECT * FROM tbltahunanggaran $where");
    }

    function getRegistrasi($where= '') 
    {
        return $this->db->query("SELECT * FROM tblregistrasi $where");
    }

    function getRegistrasiAll($where= '') 
    {
        return $this->db->query("SELECT r.id, r.nip, r.nama, r.uo, r.satker, r.email, r.nohp, r.password, r.verifikasi, tuo.uo as uo_id, tuo.uraianuo  FROM tblregistrasi as r
        INNER JOIN tblunitorganisasi as tuo ON tuo.uo = r.uo
        $where");
    }
    
    function getUO($where= '') 
    {
        return $this->db->query("SELECT * FROM tblunitorganisasi $where");
    }
    
    function getDatakursmatauang($where= '') 
    {
        return $this->db->query("SELECT * FROM tblmatauang $where");
    }
    
    public function KueriData($kueri){
		return $this->db->query($kueri);
	}
	
	public function UpdateData($table, $data, $where){
		return $this->db->update($table, $data, $where);
    }
    
    public function UpdateDataAll($table, $data){
		return $this->db->update($table, $data);
	}
	
	public function DeleteData($table,$where){
		return $this->db->delete($table,$where);
    }
    
    public function InsertData($table_name,$data){
		return $this->db->insert($table_name, $data);
	}
}
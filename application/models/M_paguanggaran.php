<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_paguanggaran extends CI_Model {
    
     public function __construct() {
        parent::__construct();
        
    }
     function getDatapaguanggaran($where= '') 
    {
         
	$sql  =	"select kodeparrent, kodechild as kode, uraian, satuan, matauang, paguanggaran,level from tblharmatfas $where order by kodechild";
		$a = 1;
            $b = 'A';
            $c = 1;
            $d = 'a';
            $e = '1';
            $f = 'a';
            $g = 1;
        $data=array();
        $result=$this->db->query($sql);
        foreach($result->result() as $row)
        {
            if($row->uraian == ''){
                
            }else{
            if($row->level == '1'){
                    $uraian = "&nbsp;".$a.". ".$row->uraian;
                    $b = 'A';
            $c = 1;
            $d = 'a';
            $e = '1';
            $f = 'a';
            $g = 1;
                    $a++;
                }
                if($row->level == '2'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;".$b.". ".$row->uraian; 
                    $c = 1;
            $d = 'a';
            $e = '1';
            $f = 'a';
            $g = 1;
                    $b++;
                }
                if($row->level == '3'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$c.". ".$row->uraian; 
                    $d = 'a';
            $e = '1';
            $f = 'a';
            $g = 1;
                    $c++;
                }
                if($row->level == '4'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$d.". ".$row->uraian; 
                    $e = '1';
            $f = 'a';
            $g = 1;
                    $d++;
                }
                if($row->level == '5'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$e.") ".$row->uraian; 
                    $f = 'a';
            $g = 1;
                    $e++;
                }
                if($row->level == '6'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$f.") ".$row->uraian; 
                    $g = 1;
                    $f++;
                }
                if($row->level == '7'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(".$g.")  ".$row->uraian; 
                    $g++;
                }
            
            $data[] = array(
            'kodeparrent'	    	=>$row->kodeparrent,
			'kode'	=>$row->kode,
			'uraian'	=>$uraian,
			'satuan' => $row->satuan,
            'matauang'	=>$row->matauang,
            'paguanggaran'	=>$row->paguanggaran,
            'level'	=>$row->level,
            );
                }
        }
        return $data;
    }
    function getDatapaguanggaranall($where= '') 
    {
         
	$sql  =	"select kodeparrent, kodechild as kode, uraian, satuan, matauang, sum(paguanggaran) as paguanggaran,level from tblharmatfas $where group by kodechild order by kodechild";
		$a = 1;
            $b = 'A';
            $c = 1;
            $d = 'a';
            $e = '1';
            $f = 'a';
            $g = 1;
        $data=array();
        $result=$this->db->query($sql);
        foreach($result->result() as $row)
        {
            if($row->uraian == ''){
                
            }else{
            if($row->level == '1'){
                    $uraian = "&nbsp;".$a.". ".$row->uraian;
                    $b = 'A';
            $c = 1;
            $d = 'a';
            $e = '1';
            $f = 'a';
            $g = 1;
                    $a++;
                }
                if($row->level == '2'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;".$b.". ".$row->uraian; 
                    $c = 1;
            $d = 'a';
            $e = '1';
            $f = 'a';
            $g = 1;
                    $b++;
                }
                if($row->level == '3'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$c.". ".$row->uraian; 
                    $d = 'a';
            $e = '1';
            $f = 'a';
            $g = 1;
                    $c++;
                }
                if($row->level == '4'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$d.". ".$row->uraian; 
                    $e = '1';
            $f = 'a';
            $g = 1;
                    $d++;
                }
                if($row->level == '5'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$e.") ".$row->uraian; 
                    $f = 'a';
            $g = 1;
                    $e++;
                }
                if($row->level == '6'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$f.") ".$row->uraian; 
                    $g = 1;
                    $f++;
                }
                if($row->level == '7'){
                    $uraian = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(".$g.")  ".$row->uraian; 
                    $g++;
                }
            
            $data[] = array(
            'kodeparrent'	    	=>$row->kodeparrent,
			'kode'	=>$row->kode,
			'uraian'	=>$uraian,
			'satuan' => $row->satuan,
            'matauang'	=>$row->matauang,
            'paguanggaran'	=>$row->paguanggaran,
            'level'	=>$row->level,
            );
                }
        }
        return $data;
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
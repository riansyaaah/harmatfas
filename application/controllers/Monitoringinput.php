<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoringinput extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_monitoringinput');
		$this->load->model('m_pengaturan');
		$this->load->library('session');
    }
	
	public function index()
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
		$tahun				= $session['thnaktif'];
		    $data = array(
		
		
				'Username' 		=> $Username,
				'Password' 		=> $Password,
				'Password'		=> $Password,
				'NamaLengkap' 	=> $NamaLengkap,
				'Level' 		=> $Level,
				'UO'			=> $UO,
				'tahun'			=> $tahun,
				'listuo'			=> $this->m_pengaturan->getUO()->result_array(),
		);
		$this->load->view('v_monitoringinput', $data);
	}
    
	function datamonitoring($id) {    
		foreach($this->m_monitoringinput->getDataLog(" where tbllog.id > $id ORDER BY tanggal asc")->result_array() as $row)
			{ 
		  $data[] = array(
		   'id' => $row['id'],
			  'tanggal' => $row['tanggal'],
		   'ip' => $row['ip'],
			  'username' => $row['username'],
			  'uo' => $row['uo'],
			  'uraian' => $row['uraian'],
			  'keterangan' => $row['keterangan'],
				  );    
			} 
		echo json_encode($data);  
	}
	
	public function printmonitoring($Tahun = '2017')
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$this->data['Tahun'] 	= $Tahun;
		 
		$this->data['Title'] 	= 'MONITORING INPUT DATA PEMELIHARAAN DAN PERAWATAN';
        $this->data['data'] 	= $this->m_monitoringinput->getDataLog(" where year(tanggal) = '$Tahun' ORDER BY tanggal asc")->result_array();
               
        $this->load->view('v_print_monitoring', $this->data);
    }
    
	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'login');
			exit(0);
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paguanggaran extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_paguanggaran');
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
        $where = " where (level = '1' or level = '2' or level = '3')";
        
        $tahuncari 	= $this->input->post('tahunanggaran');
        $uocari 	= $this->input->post('uo');
        
        if($tahuncari != ''){
            $where = $where." and tahunanggaran ='$tahuncari'";
            $tahuncari = $tahuncari;
        }else{
            $where = $where." and tahunanggaran ='$tahun'";
            $tahuncari = $tahun;
        }
        if($uocari != ''){
            if($uocari != 'RENPROGAR'){$where = $where." and uo ='$uocari'";}else{$where = $where."";}
        }else{
            if($UO != 'RENPROGAR'){$where = $where." and uo ='$UO'";}else{$where = $where."";}
        }
        
        if($Level == 'ADMINISTRATOR'){
            $paguanggaran = $this->m_paguanggaran->getDatapaguanggaranall($where);
        }else{
            $paguanggaran = $this->m_paguanggaran->getDatapaguanggaran($where);
        }
        
		    $data = array(
		
		
				'Username' 		=> $Username,
				'Password' 		=> $Password,
				'Password'		=> $Password,
				'NamaLengkap' 	=> $NamaLengkap,
				'Level' 		=> $Level,
				'UO'			=> $UO,
				'tahun'			=> $tahun,
                'uocari'			=> $uocari,
				'tahuncari'			=> $tahuncari,
				'listuo'			=> $this->m_pengaturan->getUO()->result_array(),
				'listtahunanggaran'			=> $this->m_pengaturan->getTahunanggaran()->result_array(),
				'paguanggaran'			=> $paguanggaran,
        );
           
            $this->load->view('v_paguanggaran', $data);
      
		
	}
	
     public function updatepaguanggaran()
	{
        $this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
        $tahun				= $session['thnaktif'];
         
		$createddate = date('Y-m-d H:i:s');
		$ip		     = $this->input->ip_address();
		
        $paguanggaran 	= $this->input->post('editval');
        $id 	= $this->input->post('id');
                
		$data=array( 
			'paguanggaran' 		=> $paguanggaran,
		);   
		$this->m_paguanggaran->UpdateData('tblharmatfas', $data, array('kodechild' => $id,'uo' =>$UO,'tahunanggaran' =>$tahun));
         
         $data1=array( 
			'tanggal' 			=> $createddate,
			'username' 		=> $Username,
			'ip'			=> $ip,
			'uo'			=> $UO,
			'uraian' 	=> $id,
			'keterangan' 	=> 'Edit/Input Data Pagu Anggaran',
			);
		$this->m_paguanggaran->InsertData('tbllog', $data1);	
		
		$res=array(
			'new_value'=>$paguanggaran,
			'msg'=> 'Data PAGU ANGGARAN Berhasil di Simpan'
		);
		echo json_encode($res);    
	}
    
	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'login');
			exit(0);
		}
	}
}

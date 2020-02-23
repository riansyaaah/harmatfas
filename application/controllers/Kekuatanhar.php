<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kekuatanhar extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_kekuatanhar');
		$this->load->model('m_pengaturan');
		$this->load->library('session');
    }
	
	public function data($id)
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
		$tahun				= $session['thnaktif'];
        $where = " where kodechild like '$id%'";
        
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
            $uocari = $uocari;
        }else{
            if($UO != 'RENPROGAR'){$where = $where." and uo ='$UO'";}else{$where = $where."";}
            $uocari = $UO;
        }
        
        if($Level == 'ADMINISTRATOR'){
            $kekuatan = $this->m_kekuatanhar->getDataKekuatanall($where);
        }else{
            $kekuatan = $this->m_kekuatanhar->getDataKekuatan($where);
        }
       
		    $data = array(
		
		
				'Username' 		=> $Username,
				'Password' 		=> $Password,
				'Password'		=> $Password,
				'NamaLengkap' 	=> $NamaLengkap,
				'Level' 		=> $Level,
				'UO'			=> $UO,
				'tahun'			=> $tahun,
				'id'			=> $id,
                'uocari'			=> $uocari,
				'tahuncari'			=> $tahuncari,
				'listuo'			=> $this->m_pengaturan->getUO()->result_array(),
				'listtahunanggaran'			=> $this->m_pengaturan->getTahunanggaran()->result_array(),
				'kekuatan'			=> $kekuatan,
        );
           
            $this->load->view('v_kekuatanhar', $data);
      
		
	}
    public function updatekekuatanhar()
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
		
        $kekuatanhar 	= $this->input->post('editval');
        $id 	= $this->input->post('id');
                
		$data=array( 
			'kekuatanhar' 		=> $kekuatanhar,
		);   
		$this->m_kekuatanhar->UpdateData('tblharmatfas', $data, array('kodechild' => $id,'uo' =>$UO,'tahunanggaran' =>$tahun));

		$data1=array( 
			'tanggal' 		=> $createddate,
			'username' 		=> $Username,
			'ip'			=> $ip,
			'uo'			=> $UO,
			'uraian' 		=> $id,
			'keterangan' 	=> 'Edit/Input Data Kekuatan Har',
			);
		$this->m_kekuatanhar->InsertData('tbllog', $data1);

		$res=array(
			'new_value'=>$kekuatanhar,
			'msg'=> 'Data HAR Berhasil di Simpan'
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

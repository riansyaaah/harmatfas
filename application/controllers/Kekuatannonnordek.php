<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kekuatannonnordek extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_kekuatannonnordek');
        $this->load->model('m_pengaturan');
		$this->load->library('session');
    }
    
    public function getkelompok($kodeparrent) { 
        $this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
        $tahun				= $session['thnaktif'];
        
       $this->db->where("kodeparrent",$kodeparrent);
       
           $result = $this->db->get("tblreferensi")->result();
       echo json_encode($result);
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
        
        $where = " where uo != ''";
        
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
				'data'			=> $this->m_kekuatannonnordek->getData($where)->result_array(),
        );
           
            $this->load->view('v_kekuatannonnordek', $data);
      
		
	}
    
    public function tambahdata()
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
				'listmatauang'			=> $this->m_pengaturan->getDatakursmatauang(" where tahunanggaran = '$tahun'")->result_array(),
        );
           
            $this->load->view('a_tambahkekuatannonnordek', $data);
      
		
	}
    
     public function simpandata()
	{
        $this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
        $tahun				= $session['thnaktif'];
        
		$data=array( 
            'kodepemeliharaan' => $this->input->post('pemeliharaan'), 
            'kodekelompok' => $this->input->post('kelompok'), 
            'uraian' => $this->input->post('uraian'),  
            'satuan' => $this->input->post('satuan'),  
            'matauang' => $this->input->post('matauang'),  
            'kekuatan' => $this->input->post('kekuatan'),  
            'tahunanggaran' => $this->input->post('tahunanggaran'),  
            'uo' => $this->input->post('uo'), 
		);   
		$this->m_kekuatannonnordek->InsertData('tblharmatfastanpanordex', $data);
         header('location:'.base_url().'kekuatannonnordek');
	}
    public function hapus($id)
	{
        $this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
        $tahun				= $session['thnaktif'];
       
		$this->m_kekuatannonnordek->DeleteData('tblharmatfastanpanordex', array('id'=>$id));
         header('location:'.base_url().'kekuatannonnordek');
	}
    
	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'login');
			exit(0);
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_login');
		$this->load->model('m_pengaturan');
		$this->load->library('session');
    }
	public function index()
	{	
			$data = array(
					'title' 	=> '',
					'message'	=> '',
				);
		$this->load->view('v_login', $data);
	}

	public function registrasi()
	{	
			$data = array(
					'title' 	=> '',
					'message'	=> '',
					'listuo'	=> $this->m_pengaturan->getUO()->result_array(),
				);
		$this->load->view('v_registrasi', $data);
	}

	public function check_nip()
	{
        $nip = $this->input->post('nip');
        $data = $this->m_pengaturan->getRegistrasi(" Where nip = '".$nip."' ")->result_array();
        if(COUNT($data) > 0){
            $res = false;
        }else{
            $res = true;
        }
        echo json_encode($res);
	}
    
    public function check_nohp()
	{
        $nohp = $this->input->post('nohp');
        $data = $this->m_pengaturan->getRegistrasi(" Where nohp = '".$nohp."' ")->result_array();
        if(COUNT($data) > 0){
            $res = false;
        }else{
            $res = true;
        }
        echo json_encode($res);
	}
    public function check_password()
	{
        $password = $this->input->post('password');
        $confirm_password = $this->input->post('confirm_password');
        
        if($password != $confirm_password){
            $res = false;
        }else{
            $res = true;
        }
        echo json_encode($res);
	}
	
	public function check_email()
	{
        $email = $this->input->post('email');
        $data = $this->m_pengaturan->getRegistrasi(" Where email = '".$email."' ")->result_array();
        if(COUNT($data) > 0){
            $res = false;
        }else{
            $res = true;
        }
        echo json_encode($res);
    }
	
	function proseslogin(){		
		if($_POST){
			$username	= addslashes($this->input->post('username'));
			$password 	= addslashes($this->input->post('password'));
			$pass	  	= $password;
			$date 	  	= date('Y-m-d H:i:s');
			$ip		  	= $this->input->ip_address(); 			
			$temp 		= $this->m_login->getCekLogin(" where Username = '$username' and Password = '$pass' ")->result_array();
			$thnaktif 		= $this->m_pengaturan->getTahunanggaran(" where status = '1' limit 1")->result_array();
			if($temp != NULL){
				$data = array(
					'ID' 			=> $temp[0]['ID'],
					'Username' 		=> $temp[0]['Username'],
					'Password' 		=> $temp[0]['Password'],
					'NamaLengkap' 	=> $temp[0]['NamaLengkap'],
					'Level' 		=> $temp[0]['Level'],
					'UO'	 		=> $temp[0]['UO'],
					'thnaktif'	 		=> $thnaktif[0]['tahunanggaran'],
				);
				$this->session->set_userdata('login', $data);			
				redirect(base_url().'dashboard');
			}else{
				$data = array(
					'title' 	=> '',
					'message'	=> '1',
				);
				$this->load->view('v_login', $data);
			}
		}
	}
    
    function regsukses(){
        $data = array(
					'title' 	=> '',
					'message'	=> '',
				);
		$this->load->view('v_regsukses', $data);
    }
	
	function prosesregistrasi(){
		$nip = $this->input->post('nip');
        $nama       = $this->input->post('nama');
        $uo 	    = $this->input->post('uo');
        $satker 	= $this->input->post('satker');
        $email 	= $this->input->post('email');
        $nohp 	= $this->input->post('nohp');
		$password 	= $this->input->post('password');
		$confirm_password 	= $this->input->post('confirm_password');
		
		$check_email = $this->m_pengaturan->getRegistrasi(" Where email = '".$email."' ")->result_array();
        $check_nip = $this->m_pengaturan->getRegistrasi(" Where nip = '".$nip."' ")->result_array();
        $check_nohp = $this->m_pengaturan->getRegistrasi(" Where nohp = '".$nohp."' ")->result_array();
			
		if(COUNT($check_email) > 0){
			$this->session->set_flashdata('msg_failed', 'Registrasi gagal, Enmail "'.$email.'" sudah terdaftar, harap gunakan email lain. ');
			redirect(base_url().'login/registrasi');
		}
		if(COUNT($check_nip) > 0){
			$this->session->set_flashdata('msg_failed', 'Registrasi gagal, NIP "'.$nip.'" ');
			redirect(base_url().'login/registrasi');
		}
        if(COUNT($check_nohp) > 0){
			$this->session->set_flashdata('msg_failed', 'Registrasi gagal, No HP "'.$nohp.'" ');
			redirect(base_url().'login/registrasi');
		}	

		$data=array( 
			'nip'		=> $nip,
			'nama'		=> $nama,
			'uo'		=> $uo,
			'satker'	=> $satker,
			'email'		=> $email,
			'nohp'		=> $nohp,
			'password'	=> $password,
			'verifikasi'=> 0
		);    
		$this->m_pengaturan->InsertData('tblregistrasi', $data);
		$this->session->set_flashdata('msg_success', 'Registrasi berhasil');
		redirect(base_url().'login/regsukses');
	}
	
	function cek_session(){
		if(!$this->session->userdata('login')){
			redirect(base_url().'login');
			exit(0);
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		session_start();
		session_destroy();
		redirect(base_url().'login');
	}
}
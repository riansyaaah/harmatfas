<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_laporan');
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
				'listtahunanggaran'			=> $this->m_pengaturan->getTahunanggaran()->result_array(),
        );
           
            $this->load->view('v_laporan', $data);
      
		
	}
    public function cetak()
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
        $tahun				= $session['thnaktif'];
        
        $uo 		= $this->input->post('uo');
        $ta 		= $this->input->post('ta');
        $pilihhasil 		= $this->input->post('pilihhasil');
        $namafile 		= "";
        
        if (isset($_POST['pdf'])){
            if($pilihhasil == 'a1'){    
    if(file_exists('pdf/'.$namafile.'.pdf')){
    unlink('pdf/'.$namafile.'.pdf');
    }
    $data = array(
   
     );
    $html = $this->load->view('v_daftarhasillab_pdf', $data, true);
    $this->mpdf = new mPDF();
	$this->mpdf->AddPage('L', '', '', '', '',10,10,30,50,10,10); // margin footer
    $this->mpdf->WriteHTML($html);
    $this->mpdf->Output("pdf/'.$namafile.'.pdf", 'I');
    }
            if($pilihhasil == 'a2'){    
    if(file_exists('pdf/'.$namafile.'.pdf')){
    unlink('pdf/'.$namafile.'.pdf');
    }
    $data = array(
   
     );
    $html = $this->load->view('v_daftarhasillab_pdf', $data, true);
    $this->mpdf = new mPDF();
	$this->mpdf->AddPage('L', '', '', '', '',10,10,30,50,10,10); // margin footer
    $this->mpdf->WriteHTML($html);
    $this->mpdf->Output("pdf/'.$namafile.'.pdf", 'I');
    }
            if($pilihhasil == 'a3'){    
    if(file_exists('pdf/'.$namafile.'.pdf')){
    unlink('pdf/'.$namafile.'.pdf');
    }
    $data = array(
   
     );
    $html = $this->load->view('v_daftarhasillab_pdf', $data, true);
    $this->mpdf = new mPDF();
	$this->mpdf->AddPage('L', '', '', '', '',10,10,30,50,10,10); // margin footer
    $this->mpdf->WriteHTML($html);
    $this->mpdf->Output("pdf/'.$namafile.'.pdf", 'I');
    }
            if($pilihhasil == 'a4'){    
    if(file_exists('pdf/'.$namafile.'.pdf')){
    unlink('pdf/'.$namafile.'.pdf');
    }
    $data = array(
   
     );
    $html = $this->load->view('v_daftarhasillab_pdf', $data, true);
    $this->mpdf = new mPDF();
	$this->mpdf->AddPage('L', '', '', '', '',10,10,30,50,10,10); // margin footer
    $this->mpdf->WriteHTML($html);
    $this->mpdf->Output("pdf/'.$namafile.'.pdf", 'I');
    }
            if($pilihhasil == 'a5'){    
    if(file_exists('pdf/'.$namafile.'.pdf')){
    unlink('pdf/'.$namafile.'.pdf');
    }
    $data = array(
   
     );
    $html = $this->load->view('v_daftarhasillab_pdf', $data, true);
    $this->mpdf = new mPDF();
	$this->mpdf->AddPage('L', '', '', '', '',10,10,30,50,10,10); // margin footer
    $this->mpdf->WriteHTML($html);
    $this->mpdf->Output("pdf/'.$namafile.'.pdf", 'I');
    }
            if($pilihhasil == 'a6'){    
    if(file_exists('pdf/'.$namafile.'.pdf')){
    unlink('pdf/'.$namafile.'.pdf');
    }
    $data = array(
   
     );
    $html = $this->load->view('v_daftarhasillab_pdf', $data, true);
    $this->mpdf = new mPDF();
	$this->mpdf->AddPage('L', '', '', '', '',10,10,30,50,10,10); // margin footer
    $this->mpdf->WriteHTML($html);
    $this->mpdf->Output("pdf/'.$namafile.'.pdf", 'I');
    }
            if($pilihhasil == 'a7'){    
    if(file_exists('pdf/'.$namafile.'.pdf')){
    unlink('pdf/'.$namafile.'.pdf');
    }
    $data = array(
   
     );
    $html = $this->load->view('v_daftarhasillab_pdf', $data, true);
    $this->mpdf = new mPDF();
	$this->mpdf->AddPage('L', '', '', '', '',10,10,30,50,10,10); // margin footer
    $this->mpdf->WriteHTML($html);
    $this->mpdf->Output("pdf/'.$namafile.'.pdf", 'I');
    }
        }else if (isset($_POST['excel'])){
            if($pilihhasil == 'a1'){    
     $data = array(
    
     );
    $this->load->view('v_daftarhasillab_excel', $data);
    }
            if($pilihhasil == 'a2'){    
     $data = array(
    
     );
    $this->load->view('v_daftarhasillab_excel', $data);
    }
            if($pilihhasil == 'a3'){    
     $data = array(
    
     );
    $this->load->view('v_daftarhasillab_excel', $data);
    }
            if($pilihhasil == 'a4'){    
     $data = array(
    
     );
    $this->load->view('v_daftarhasillab_excel', $data);
    }
            if($pilihhasil == 'a5'){    
     $data = array(
    
     );
    $this->load->view('v_daftarhasillab_excel', $data);
    }
            if($pilihhasil == 'a6'){    
     $data = array(
    
     );
    $this->load->view('v_daftarhasillab_excel', $data);
    }
            if($pilihhasil == 'a7'){    
     $data = array(
    
     );
    $this->load->view('v_daftarhasillab_excel', $data);
    }
        }
		    
      
		
	}
	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'login');
			exit(0);
		}
	}
}

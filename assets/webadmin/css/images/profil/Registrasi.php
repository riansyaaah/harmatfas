<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$now=date('Y-m-d H:i:s');
		$this->load->helper(array('form', 'url'));
		$this->load->helper('tgl_indo');
		$this->load->model('m_login');
		$this->load->model('m_polda');
		$this->load->model('m_inputupload');
        $this->load->model('m_registrasi');
		$this->load->model('m_master');
		$this->load->model('m_perkap');
		$this->load->model('m_hasilpemeriksaan');
		$this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
		$this->load->library('datatables');
        $this->load->library('image_lib');
		$this->load->model('m_masterdata');
    }
	
	public function index()
	{
		redirect(base_url().'registrasi/tambahrikkesla');
	}
    
    public function crop()
{
    $img_path = 'uploads\capsamples.jpg';
    $img_thumb = 'uploads\capsamples_thumb.jpg';

    $config['image_library'] = 'gd2';
    $config['source_image'] = $img_path;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = FALSE;

    $img = imagecreatefromjpeg($img_path);
    $_width = imagesx($img);
    $_height = imagesy($img);

    $img_type = '';
    $thumb_size = 100;

    if ($_width > $_height)
    {
        // wide image
        $config['width'] = intval(($_width / $_height) * $thumb_size);
        if ($config['width'] % 2 != 0)
        {
            $config['width']++;
        }
        $config['height'] = $thumb_size;
        $img_type = 'wide';
    }
    else if ($_width < $_height)
    {
        // landscape image
        $config['width'] = $thumb_size;
        $config['height'] = intval(($_height / $_width) * $thumb_size);
        if ($config['height'] % 2 != 0)
        {
            $config['height']++;
        }
        $img_type = 'landscape';
    }
    else
    {
        // square image
        $config['width'] = $thumb_size;
        $config['height'] = $thumb_size;
        $img_type = 'square';
    }

    $this->load->library('image_lib');
    $this->image_lib->initialize($config);
    $this->image_lib->resize();

    // reconfigure the image lib for cropping
    $conf_new = array(
        'image_library' => 'gd2',
        'source_image' => $img_thumb,
        'create_thumb' => FALSE,
        'maintain_ratio' => FALSE,
        'width' => $thumb_size,
        'height' => $thumb_size
    );

    if ($img_type == 'wide')
    {
        $conf_new['x_axis'] = ($config['width'] - $thumb_size) / 2 ;
        $conf_new['y_axis'] = 0;
    }
    else if($img_type == 'landscape')
    {
        $conf_new['x_axis'] = 0;
        $conf_new['y_axis'] = ($config['height'] - $thumb_size) / 2;
    }
    else
    {
        $conf_new['x_axis'] = 0;
        $conf_new['y_axis'] = 0;
    }

    $this->image_lib->initialize($conf_new);

    $this->image_lib->crop();
}
	public function prosesfoto($noregistrasi = '')
	{
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$profil2 	= $this->m_registrasi->getanggotaall("where noregistrasi = '$noregistrasi' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
       $data = array(
            	'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Anggota',
				'subtitle' 	 	=> 'Input Anggota',
				
                'nama'	         => $profil2[0]['nama'],
				'nrpnip'		=> $profil2[0]['nrpnip'],
                'jeniskelamin'		=> $profil2[0]['kelamin'],
                'noregistrasi'		=> $noregistrasi,
                'satker'		=> $profil2[0]['namasatker'],
				
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				
				'namapolda' 	=> $polda[0]['namapolda'],
				'logopolda' 	=> $polda[0]['logopolda'],
				'alamatpolda' 	=> $polda[0]['alamatpolda'],
				'nomortlppolda'	=> $polda[0]['nomortlp'],
				'emailpolda' 	=> $polda[0]['email'],
				'faxpolda' 		=> $polda[0]['fax'],
				'kodepospolda' => $polda[0]['kodepos'],
				'level'			=> $level,
			);
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_input_anggota_foto', $data);
		}else{
			redirect(base_url());
		}
	}
    public function uploadfoto($noregistrasi){
        $filename = $noregistrasi . '.jpeg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'assets/images/'.polda.'/profil/'.$filename) ){
 
    $img_path = 'assets/images/'.polda.'/profil/'.$filename;
    $img_thumb = 'assets/images/'.polda.'/profil/'.$filename;

    $config['image_library'] = 'imagemagick';
    $config['source_image'] = $img_path;
    $config['create_thumb'] = TRUE;
    $config['maintain_ratio'] = FALSE;
    $resize_width=200; 
    $resize_height=240;
     $img_size = getimagesize($config['source_image']);
      
      $t_ratio = $resize_width/$resize_height;
      $o_width = $img_size[0];
      $o_height = $img_size[1];
      if ($t_ratio > $o_width/$o_height)
      {
        $config['width'] = $resize_width;
        $config['height'] = round( $resize_width * ($o_height / $o_width));
        $y_axis = round(($config['height']/2) - ($resize_height/2));
        $x_axis = 0;
      }
      else
      {
        $config['width'] = round( $resize_height * ($o_width / $o_height));
        $config['height'] = $resize_height;
        $y_axis = 0;
        $x_axis = round(($config['width']/2) - ($resize_width/2));
      }


    $this->load->library('image_lib');
    $this->image_lib->initialize($config);
    $this->image_lib->resize();

    // reconfigure the image lib for cropping
    $conf_new = array(
        'image_library' => 'gd2',
        'source_image' => $img_thumb,
        'create_thumb' => FALSE,
        'maintain_ratio' => FALSE,
        'width' => $resize_width,
        'height' => $resize_height,
        'x_axis' => $x_axis,
        'y_axis' => $y_axis
    );
    

    $this->image_lib->initialize($conf_new);

    $this->image_lib->crop();
                        $data=array( 
                            'foto' 			=> $filename,
							);   
						$this->m_registrasi->UpdateData('tbl_personil', $data, array('noregistrasi' => $noregistrasi));
}
echo $url;
}
    public function batalregistrasi($id,$year){

                        $data=array( 
                            'statusproses' 			=> 2,
							);   
						$this->m_registrasi->UpdateData('tblregistrasionline', $data, array('id' => $id));
header('location:'.base_url().'registrasi/registrasionline/'.$year); 
}
    
    
    
    public function uploadfotoumum($noregistrasi){
        $filename = $noregistrasi . '.jpeg';

$url = '';
if( move_uploaded_file($_FILES['webcam']['tmp_name'],'assets/webcam/'.$filename) ){
 $url = 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['REQUEST_URI']) . '/assets/webcam/' . $filename;
    
                        $data=array( 
                            'foto' 			=> $filename,
							);   
						$this->m_registrasi->UpdateData('tblregistrasiumum', $data, array('noregistrasi' => $noregistrasi));
}
echo $url;
}
    public function tambahumumdariregonline($id)
	{
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
        $ceknoreg 	= $this->m_registrasi->getnoregumum(" order by id desc limit 1 ")->result_array();
        $dariregonline 	= $this->m_registrasi->getregonline(" where id = '$id'")->result_array();
        if(isset($ceknoreg[0]['noregistrasi'])){
					$noregistrasi2 = substr($ceknoreg[0]['noregistrasi'],17) + 1;
            $noregistrasi = 'ASALAB-UMUM-18-0000'.$noregistrasi2;
				}else{
                    $noregistrasi ='ASALAB-UMUM-18-00001';
                }
		$data = array(
                'itempemeriksaan' 	=> $this->m_registrasi->getitempemeriksaan("")->result_array(),
				'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Umum',
				'subtitle' 	 	=> 'Registrasi Peserta Umum Online',
				'status_data'	=> 'tambah',
				'nama'	=> $dariregonline[0]['nama'],
				'nik'	=> $dariregonline[0]['nik'],
				'tempatlahir'	=> $dariregonline[0]['tempatlahir'],
				'tanggallahir'	=> $dariregonline[0]['tanggallahir'],
				'kelamin'	=> $dariregonline[0]['jeniskelamin'],
                'alamat'			=> $dariregonline[0]['alamat'],
                'email'			=> $dariregonline[0]['email'],
                'nomorhp'			=> $dariregonline[0]['nohp'],
                'asalrujukan'			=> $dariregonline[0]['asalrujukan'],
                'diagnosa'			=> $dariregonline[0]['diagnosa'],
				'kodepangkat'	=> '',
				'kodejabatan'	=> '',
				'kodesatker'	=> '',
				'noregistrasi'		=> $noregistrasi,
				
				'getpangkat'	=> $this->m_master->getpangkatall("where jenis = '0' order by kodepangkat asc")->result_array(),
				'getpangkatpns'	=> $this->m_master->getpangkatall("where jenis = '1' order by kodepangkat asc")->result_array(),
				'getjabatan'	=> $this->m_master->getjabatanall("order by kodejabatan desc")->result_array(),
				'getsatker'		=> $this->m_master->getsatkerall("order by kodesatker asc")->result_array(),
				'getasalrujukan'		=> $this->m_registrasi->getasalrujukan()->result_array(),
				
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				'logcabang'	=> $profil[0]['cabang'],
				
				'namapolda' 	=> $polda[0]['namapolda'],
				'logopolda' 	=> $polda[0]['logopolda'],
				'alamatpolda' 	=> $polda[0]['alamatpolda'],
				'nomortlppolda'	=> $polda[0]['nomortlp'],
				'emailpolda' 	=> $polda[0]['email'],
				'faxpolda' 		=> $polda[0]['fax'],
				'kodepospolda' => $polda[0]['kodepos'],
				'level'			=> $level,
			);
         $update=array( 
                            'statusproses' 			=> 1,
							);   
						$this->m_registrasi->UpdateData('tblregistrasionline', $update, array('id' => $id));
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_registrasi_umum', $data);
		}else{
			redirect(base_url());
		}
	}
    
    
    public function prosesfotoumum($noregistrasi = '')
	{
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profilpeserta 	= $this->m_registrasi->getpesertaumum("where noregistrasi = '$noregistrasi' ")->result_array();
        $profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
        $ceknoinvoice 	= $this->m_registrasi->getnoinvoice(" order by id desc limit 1 ")->result_array();
        $getbiaya 	= $this->m_registrasi->getbiaya(" where tblpemeriksaanumum.noregistrasi = '$noregistrasi' ")->result_array();
        if(isset($ceknoinvoice[0]['noinvoice'])){
					$ceknoinvoice2 = substr($ceknoinvoice[0]['noinvoice'],16) + 1;
            $ceknoinvoice = 'ASALAB-INV-18-0000'.$ceknoinvoice2;
				}else{
                    $ceknoinvoice ='ASALAB-INV-18-00001';
                }
       $data = array(
            	'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Anggota',
				'subtitle' 	 	=> 'Input Anggota',
				
                'nama'	         => $profilpeserta[0]['nama'],
				'nik'		=> $profilpeserta[0]['nik'],
                'jeniskelamin'		=> $profilpeserta[0]['jeniskelamin'],
                'diskon'		=> $profilpeserta[0]['diskon'],
                'noregistrasi'		=> $noregistrasi,
                'asalrujukan'		=> $profilpeserta[0]['namadokter'],
                'feerujukan'		=> $profilpeserta[0]['feerujukan'],
                'biaya'		=> $getbiaya[0]['biaya'],
                'totalbiaya'		=> $getbiaya[0]['biaya'] - (($getbiaya[0]['biaya'] * $profilpeserta[0]['diskon'])/100),
                'noinvoice'		=> $ceknoinvoice,
				
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				'logcabang' 			=> $profil[0]['cabang'],
				
				'namapolda' 	=> $polda[0]['namapolda'],
				'logopolda' 	=> $polda[0]['logopolda'],
				'alamatpolda' 	=> $polda[0]['alamatpolda'],
				'nomortlppolda'	=> $polda[0]['nomortlp'],
				'emailpolda' 	=> $polda[0]['email'],
				'faxpolda' 		=> $polda[0]['fax'],
				'kodepospolda' => $polda[0]['kodepos'],
				'level'			=> $level,
			);
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_input_umum_foto', $data);
		}else{
			redirect(base_url());
		}
	}
    
    function json_pesertarikkesla() {
        header('Content-Type: application/json');
        echo $this->m_registrasi->jsonpesertarikkesla();
    }
    
    function json_pesertaumum() {
        header('Content-Type: application/json');
        echo $this->m_registrasi->jsonpesertaumum();
    }
    
	function json_registrasionline($tahun) {
        header('Content-Type: application/json');
        echo $this->m_registrasi->jsonregistrasionline($tahun);
    }
	
	public function registrasionline($newtahun='')
	{
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
        if(isset($tahun)){
            $tahun = $newtahun;
        }else{
            $tahun = '2018';
        }
		$data = array(
				'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Registrasi Online',
				'subtitle' 	 	=> 'Registrasi Online',
				'tahun1'		=> $tahun,
				
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				'logcabang'	=> $profil[0]['cabang'],
				
				'namapolda' 		=> $polda[0]['namapolda'],
				'logopolda' 		=> $polda[0]['logopolda'],
				'alamatpolda' 		=> $polda[0]['alamatpolda'],
				'nomortlppolda'		=> $polda[0]['nomortlp'],
				'emailpolda' 		=> $polda[0]['email'],
				'faxpolda' 			=> $polda[0]['fax'],
				'kodepospolda' 		=> $polda[0]['kodepos'],
				'level'			=> $level,
				'listregonline' =>$this->m_registrasi->getregonline()->result_array(),
			);
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_registrasionline', $data);
		}else{
			redirect(base_url());
		}
	}
    public function pesertarikkesla()
	{
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
		$data = array(
				'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Master Data Rikkes',
				'subtitle' 	 	=> 'Master Data Rikkes',
				
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				'logcabang'	=> $profil[0]['cabang'],
				
				'namapolda' 	=> $polda[0]['namapolda'],
				'logopolda' 	=> $polda[0]['logopolda'],
				'alamatpolda' 	=> $polda[0]['alamatpolda'],
				'nomortlppolda'	=> $polda[0]['nomortlp'],
				'emailpolda' 	=> $polda[0]['email'],
				'faxpolda' 		=> $polda[0]['fax'],
				'kodepospolda' => $polda[0]['kodepos'],
				'level'			=> $level,
			);
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_pesertarikkesla', $data);
		}else{
			redirect(base_url());
		}
	}
    
    public function pesertaumum()
	{
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
		$data = array(
                'pesertaumum' => $this->m_registrasi->getpesertaumum(" where trash != '1'")->result_array(),
				'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Master Data Anggota',
				'subtitle' 	 	=> 'Master Data Anggota',
				
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				'logcabang'	=> $profil[0]['cabang'],
				
				'namapolda' 	=> $polda[0]['namapolda'],
				'logopolda' 	=> $polda[0]['logopolda'],
				'alamatpolda' 	=> $polda[0]['alamatpolda'],
				'nomortlppolda'	=> $polda[0]['nomortlp'],
				'emailpolda' 	=> $polda[0]['email'],
				'faxpolda' 		=> $polda[0]['fax'],
				'kodepospolda' => $polda[0]['kodepos'],
				'level'			=> $level,
			);
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_pesertaumum', $data);
		}else{
			redirect(base_url());
		}
	}
    
    
    public function tambahrikkesla()
    {
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
        $ceknoreg 	= $this->m_registrasi->getnoreg(" order by id desc limit 1 ")->result_array();
        if(strlen($ceknoreg[0]['noregistrasi']) != 0){
					$noregistrasi2 = substr($ceknoreg[0]['noregistrasi'],16) + 1;
            $noregistrasi = 'ASALAB-RKS-2018-'.$noregistrasi2;
				}else{
                    $noregistrasi ='ASALAB-RKS-2018-1';
                }
		$data = array(
            'anggotaall' 	=> $this->m_master->getanggotaall("")->result_array(),
				'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Registrasi Rikkesla',
				'subtitle' 	 	=> 'Registrasi Rikkesla',
				'status_data'	=> 'tambah',
				'kodepangkat'	=> '',
				'kodejabatan'	=> '',
				'kodesatker'	=> '',
				'kelamin'		=> '',
            'noregistrasi'		=> $noregistrasi,
                'goldarah'		=> '',
				'agama'			=> '',
				'getpangkat'	=> $this->m_master->getpangkatall("where jenis = '0' order by kodepangkat asc")->result_array(),
				'getpangkatpns'	=> $this->m_master->getpangkatall("where jenis = '1' order by kodepangkat asc")->result_array(),
				'getjabatan'	=> $this->m_master->getjabatanall("order by kodejabatan desc")->result_array(),
				'getsatker'		=> $this->m_master->getsatkerall("order by kodesatker asc")->result_array(),
				
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				'logcabang'	=> $profil[0]['cabang'],
				
				'namapolda' 	=> $polda[0]['namapolda'],
				'logopolda' 	=> $polda[0]['logopolda'],
				'alamatpolda' 	=> $polda[0]['alamatpolda'],
				'nomortlppolda'	=> $polda[0]['nomortlp'],
				'emailpolda' 	=> $polda[0]['email'],
				'faxpolda' 		=> $polda[0]['fax'],
				'kodepospolda' => $polda[0]['kodepos'],
				'level'			=> $level,
			);
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_registrasi_rikkesla', $data);
		}else{
			redirect(base_url());
		}
	}
    public function rikeslainputact()
	{
		$config=array(  
            'upload_path' 	=> 'assets/images/'.polda.'/profil', //lokasi gambar akan di simpan  
            'allowed_types' => 'jpg|jpeg|png', //ekstensi gambar yang boleh di uanggah  
            'max_size' 		=> '2000', //batas maksimal ukuran gambar  
            'max_width' 	=> '2000', //batas maksimal lebar gambar  
            'max_height'	=> '2000', //batas maksimal tinggi gambar 
			'overwrite'		=> TRUE,
            'file_name' 	=> url_title($this->input->post('foto')) //nama gambar  
            );  
				$this->load->library('upload', $config); 
				$this->upload->initialize($config);
				$this->cek_session();
				$status_data 		= $this->input->post('status_data');
				
				$noregistrasi 			= $this->input->post('noregistrasi');
                $nrpnip 			= $this->input->post('nrpnip');
				$nrpnipedit			= $this->input->post('nrpnipedit');
				$nama 				= $this->input->post('nama');
				$kelamin 			= $this->input->post('kelamin');
                $goldarah			= $this->input->post('goldarah');
				$tempatlahir 		= $this->input->post('tempatlahir');
				$tanggallahir 		= date('Y-m-d', strtotime($this->input->post('tanggallahir')));
				$agama 				= $this->input->post('agama');
				$kodepangkat 		= $this->input->post('kodepangkat');
				$kodejabatan 		= $this->input->post('kodejabatan');
				$kodesatker 		= $this->input->post('kodesatker');
				$email	 			= $this->input->post('email');
				$alamat 			= $this->input->post('alamat');
				$nomorhp	 		= $this->input->post('nomorhp');
				
				$createddate = date('Y-m-d H:i:s');
				$createdby = $this->session->userdata('login');
				$modifieddate = date('Y-m-d H:i:s');
				$modifiedby = $this->session->userdata('login');
				$ip		  = $this->input->ip_address(); 
				
				
				if($status_data == 'tambah'){
							$data=array( 
									'noregistrasi'		=> $noregistrasi,
                                    'nrpnip'		=> $nrpnip,
									'nama' 			=> $nama,
									'kelamin' 		=> $kelamin,
                                    'goldarah' 		=> $goldarah,
									'tempatlahir'	=> $tempatlahir,
									'tanggallahir' 	=> $tanggallahir,
                                    'tanggalregistrasi' 	=> $createddate,
									'agama' 		=> $agama,
									'kodepangkat' 	=> $kodepangkat,
									'kodejabatan' 	=> $kodejabatan,
									'kodesatker'	=> $kodesatker,
									'email' 		=> $email,
									'alamat' 		=> $alamat,
									'nomorhp' 		=> $nomorhp,
									'jalur' 		=> 'polri',
									'createddate' 	=> $createddate,
									'createdby' 	=> $createdby['nrpnip']
									);    
							$this->m_registrasi->InsertData('tblregistrasirikkesla', $data);
                    $data=array( 
									'noregistrasi'		=> $noregistrasi,
                                    'nrpnip'		=> $nrpnip,
									'tahunanggaran' =>'2018',
									'createddate' 	=> $createddate,
									'createdby' 	=> $createdby['nrpnip']
									);  
							$this->m_registrasi->InsertData('tbl_rikkeslab_full', $data);
							
							header('location:'.base_url().'registrasi/prosesfoto/'.$noregistrasi); 
					
				}else{
						$data=array( 
                            'noregistrasi'		=> $noregistrasi,
							'nrpnip'		=> $nrpnip,
							'nama' 			=> $nama,
							'kelamin' 		=> $kelamin,
                            'goldarah' 		=> $goldarah,
							'tempatlahir'	=> $tempatlahir,
							'tanggallahir' 	=> $tanggallahir,
							'agama' 		=> $agama,
							'kodepangkat' 	=> $kodepangkat,
							'kodejabatan' 	=> $kodejabatan,
							'kodesatker'	=> $kodesatker,
							'alamat' 		=> $alamat,
							'email' 		=> $email,
							'nomorhp' 		=> $nomorhp,
									
							'modifieddate' 	=> $modifieddate,
							'modifiedby' 	=> $modifiedby['nrpnip']
							);   
					$this->m_registrasi->UpdateData('tblregistrasirikkesla', $data, array('nrpnip' => $nrpnip));				
				header('location:'.base_url().'registrasi/prosesfoto/'.$noregistrasi); 
				} 
	}
    public function tambahumum()
	{
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
        $ceknoreg 	= $this->m_registrasi->getnoregumum(" order by id desc limit 1 ")->result_array();
        if(isset($ceknoreg[0]['noregistrasi'])){
					$noregistrasi2 = substr($ceknoreg[0]['noregistrasi'],15) + 1;
            $noregistrasi = 'ASALAB-UMUM-18-0000'.$noregistrasi2;
				}else{
                    $noregistrasi ='ASALAB-UMUM-18-00001';
                }
		$data = array(
                'itempemeriksaan' 	=> $this->m_registrasi->getitempemeriksaan("")->result_array(),
				'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Umum',
				'subtitle' 	 	=> 'Registrasi Peserta Umum',
				'status_data'	=> 'tambah',
				'kodepangkat'	=> '',
				'kodejabatan'	=> '',
				'kodesatker'	=> '',
				'kelamin'		=> '',
                'noregistrasi'		=> $noregistrasi,
                'asalrujukan'		=> '',
                'diagnosa'		=> '',
                'goldarah'		=> '',
				'agama'			=> '',
				'getpangkat'	=> $this->m_master->getpangkatall("where jenis = '0' order by kodepangkat asc")->result_array(),
				'getpangkatpns'	=> $this->m_master->getpangkatall("where jenis = '1' order by kodepangkat asc")->result_array(),
				'getjabatan'	=> $this->m_master->getjabatanall("order by kodejabatan desc")->result_array(),
				'getsatker'		=> $this->m_master->getsatkerall("order by kodesatker asc")->result_array(),
				'getasalrujukan'		=> $this->m_registrasi->getasalrujukan()->result_array(),
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				'logcabang'	=> $profil[0]['cabang'],
				
				'namapolda' 	=> $polda[0]['namapolda'],
				'logopolda' 	=> $polda[0]['logopolda'],
				'alamatpolda' 	=> $polda[0]['alamatpolda'],
				'nomortlppolda'	=> $polda[0]['nomortlp'],
				'emailpolda' 	=> $polda[0]['email'],
				'faxpolda' 		=> $polda[0]['fax'],
				'kodepospolda' => $polda[0]['kodepos'],
				'level'			=> $level,
			);
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_registrasi_umum', $data);
		}else{
			redirect(base_url());
		}
	}
    function hapusitempemeriksaan($iditem = '',$noregistrasi = '')
	{
		$this->db->delete('tblpemeriksaanumum', array('id' => $iditem));
		header('location:'.base_url().'registrasi/pesertaumumedit/'.$noregistrasi); 
	}
    
    public function pesertaumumedit($noregistrasi)
	{
		$this->cek_session();
		$session 	= $this->session->userdata('login');
		$level		= $session['level'];
        $nrpnip		= $session['nrpnip'];
		$profil 	= $this->m_login->getuser("where tbl_user.nrpnip = '$nrpnip' ")->result_array();
		$polda 		= $this->m_polda->getpolda()->result_array();
        $pesertaumum 	= $this->m_registrasi->getpesertaumum(" where noregistrasi = '$noregistrasi'")->result_array();
    	$data = array(
                'itempemeriksaanpeserta' 	=> $this->m_registrasi->getitempemeriksaanpeserta(" where noregistrasi = '$noregistrasi' and trash != 1")->result_array(),
                'itempemeriksaan' 	=> $this->m_registrasi->getitempemeriksaan()->result_array(),
				'datenow'		=> nama_hari(date('Y-m-d')).', '.tgl_indo(date('Y-m-d')),
				'title' 	 	=> 'Umum',
				'subtitle' 	 	=> 'Registrasi Peserta Umum',
				'status_data'	=> 'edit',
				'kodepangkat'	=> '',
				'kodejabatan'	=> '',
				'kodesatker'	=> '',
				'diskon'		=> $pesertaumum[0]['diskon'],
									'noregistrasi'		=> $pesertaumum[0]['noregistrasi'],
                                    'nik'		=> $pesertaumum[0]['nik'],
									'nama' 			=> $pesertaumum[0]['nama'],
									'kelamin' 		=> $pesertaumum[0]['jeniskelamin'],
                                    'golongandarah' 		=> $pesertaumum[0]['golongandarah'],
									'tempatlahir'	=> $pesertaumum[0]['tempatlahir'],
									'tanggallahir' 	=> $pesertaumum[0]['tanggallahir'],
                                    'tanggalregistrasi' 	=> $pesertaumum[0]['tanggalregistrasi'],
									'agama' 		=> $pesertaumum[0]['agama'],
									'profesi' 	=> $pesertaumum[0]['profesi'],
									'asalrujukan' 	=> $pesertaumum[0]['asalrujukan'],
									'diagnosa' 	=> $pesertaumum[0]['diagnosa'],
									'email' 		=> $pesertaumum[0]['email'],
									'alamat' 		=> $pesertaumum[0]['alamat'],
									'nomorhp' 		=> $pesertaumum[0]['nomorhp'],
				'getpangkat'	=> $this->m_master->getpangkatall("where jenis = '0' order by kodepangkat asc")->result_array(),
				'getpangkatpns'	=> $this->m_master->getpangkatall("where jenis = '1' order by kodepangkat asc")->result_array(),
				'getjabatan'	=> $this->m_master->getjabatanall("order by kodejabatan desc")->result_array(),
				'getsatker'		=> $this->m_master->getsatkerall("order by kodesatker asc")->result_array(),
				'getasalrujukan'		=> $this->m_registrasi->getasalrujukan()->result_array(),
				'lognrpnip'			=> $profil[0]['nrpnip'],
				'lognama'			=> $profil[0]['nama'],
				'logkelamin'		=> $profil[0]['kelamin'],
				'loggoldarah'		=> $profil[0]['goldarah'],
				'logtempatlahir' 	=> $profil[0]['tempatlahir'],
				'logtanggallahir' 	=> nama_hari($profil[0]['tanggallahir']).', '.tgl_indo(($profil[0]['tanggallahir'])),
				'logagama' 			=> $profil[0]['agama'],
				'logalamat' 		=> $profil[0]['alamat'],
				'logfoto' 			=> $profil[0]['foto'],
				'logemail' 			=> $profil[0]['email'],
				'logcabang'	=> $profil[0]['cabang'],
				
				'namapolda' 	=> $polda[0]['namapolda'],
				'logopolda' 	=> $polda[0]['logopolda'],
				'alamatpolda' 	=> $polda[0]['alamatpolda'],
				'nomortlppolda'	=> $polda[0]['nomortlp'],
				'emailpolda' 	=> $polda[0]['email'],
				'faxpolda' 		=> $polda[0]['fax'],
				'kodepospolda' => $polda[0]['kodepos'],
				'level'			=> $level,
			);
		if($level == 'Admin' or $level == 'Dokter'){
			$this->load->view('v_registrasi_umum', $data);
		}else{
			redirect(base_url());
		}
	}
    
    public function pesertaumumhapus($noregistrasi)
	{
		$this->cek_session();
		$modifieddate = date('Y-m-d H:i:s');
		$modifiedby = $this->session->userdata('login');
		$ip		  = $this->input->ip_address(); 
			$data=array( 
				'trash' 		=> '1',
				'modifieddate' 	=> $modifieddate,
				'modifiedby' 	=> $modifiedby['nrpnip']
				);   
			$this->m_masterdata->UpdateData('tblregistrasiumum', $data, array('noregistrasi' => $noregistrasi));
			
			header('location:'.base_url().'registrasi/pesertaumum');
	}
   
	
	public function umuminputact()
	{
		$config=array(  
            'upload_path' 	=> 'assets/images/'.polda.'/profil', //lokasi gambar akan di simpan  
            'allowed_types' => 'jpg|jpeg|png', //ekstensi gambar yang boleh di uanggah  
            'max_size' 		=> '2000', //batas maksimal ukuran gambar  
            'max_width' 	=> '2000', //batas maksimal lebar gambar  
            'max_height'	=> '2000', //batas maksimal tinggi gambar 
			'overwrite'		=> TRUE,
            'file_name' 	=> url_title($this->input->post('foto')) //nama gambar  
            );  
				$this->load->library('upload', $config); 
				$this->upload->initialize($config);
				$this->cek_session();
				$status_data 		= $this->input->post('status_data');
				
				$noregistrasi 			= $this->input->post('noregistrasi');
				$diskon 			= $this->input->post('diskon');
                $nik 			= $this->input->post('nik');
				$nama 				= $this->input->post('nama');
				$kelamin 			= $this->input->post('kelamin');
                $goldarah			= $this->input->post('goldarah');
				$tempatlahir 		= $this->input->post('tempatlahir');
				$tanggallahir 		= date('Y-m-d', strtotime($this->input->post('tanggallahir')));
				$agama 				= $this->input->post('agama');
				$email	 			= $this->input->post('email');
				$alamat 			= $this->input->post('alamat');
        $itemindex	 		= $this->input->post('itemindex');
	           $item_count = count($this->input->post('itemindex'));
				$nomorhp	 		= $this->input->post('nomorhp');
                $profesi 			= $this->input->post('profesi');
				$asalrujukan	 		= $this->input->post('asalrujukan');
				$diagnosa	 		= $this->input->post('diagnosa');
                $createddate = date('Y-m-d H:i:s');
				$createdby = $this->session->userdata('login');
				$modifieddate = date('Y-m-d H:i:s');
				$modifiedby = $this->session->userdata('login');
				$ip		  = $this->input->ip_address(); 
				
				
				if($status_data == 'tambah'){
						if(!$this->upload->do_upload("foto")){
							$data=array( 
									'diskon'		=> $diskon,
									'noregistrasi'		=> $noregistrasi,
                                    'nik'		=> $nik,
									'nama' 			=> $nama,
									'jeniskelamin' 		=> $kelamin,
                                    'golongandarah' 		=> $goldarah,
									'tempatlahir'	=> $tempatlahir,
									'tanggallahir' 	=> $tanggallahir,
                                    'tanggalregistrasi' 	=> $createddate,
									'agama' 		=> $agama,
									'profesi' 	=> $profesi,
									'asalrujukan' 	=> $asalrujukan,
									'diagnosa' 	=> $diagnosa,
									'email' 		=> $email,
									'alamat' 		=> $alamat,
									'nomorhp' 		=> $nomorhp,
									'createddate' 	=> $createddate,
									'createdby' 	=> $createdby['nrpnip']
									);    
							$this->m_registrasi->InsertData('tblregistrasiumum', $data);
                            foreach($itemindex as $selected){
        $data = array(
            'noregistrasi'   => $noregistrasi,
            'iditem'  => $selected,
        );
        $this->m_registrasi->InsertData('tblpemeriksaanumum', $data);
        }
                            header('location:'.base_url().'registrasi/prosesfotoumum/'.$noregistrasi); 
        					}else{
								$file 	= $this->upload->file_name; 
								$data=array( 
                                    'diskon'		=> $diskon,
                                    'noregistrasi'		=> $noregistrasi,
                                    'nik'		=> $nik,
									'nama' 			=> $nama,
									'jeniskelamin' 		=> $kelamin,
                                    'golongandarah' 		=> $goldarah,
									'tempatlahir'	=> $tempatlahir,
									'tanggallahir' 	=> $tanggallahir,
                                    'tanggalregistrasi' 	=> $createddate,
									'agama' 		=> $agama,
									'profesi' 	=> $profesi,
									'asalrujukan' 	=> $asalrujukan,
                                    'diagnosa' 	=> $diagnosa,
									'email' 		=> $email,
									'alamat' 		=> $alamat,
									'nomorhp' 		=> $nomorhp,
									'createddate' 	=> $createddate,
									'createdby' 	=> $createdby['nrpnip']
										);    
								$this->m_registrasi->InsertData('tblregistrasiumum', $data);
							
                            foreach($itemindex as $selected){
        $data = array(
            'noregistrasi'   => $noregistrasi,
            'iditem'  => $selected,
        );
        $this->m_registrasi->InsertData('tblpemeriksaanumum', $data);
        }
                            header('location:'.base_url().'registrasi/prosesfotoumum/'.$noregistrasi); 
                        }
				}else{
					if(!$this->upload->do_upload("foto")){
						$data=array( 
                            'diskon'		=> $diskon,
                            'noregistrasi'		=> $noregistrasi,
                                    'nik'		=> $nik,
									'nama' 			=> $nama,
									'jeniskelamin' 		=> $kelamin,
                                    'golongandarah' 		=> $goldarah,
									'tempatlahir'	=> $tempatlahir,
									'tanggallahir' 	=> $tanggallahir,
                                    'tanggalregistrasi' 	=> $createddate,
									'agama' 		=> $agama,
									'profesi' 	=> $profesi,
									'asalrujukan' 	=> $asalrujukan,
                            'diagnosa' 	=> $diagnosa,
									'email' 		=> $email,
									'alamat' 		=> $alamat,
									'nomorhp' 		=> $nomorhp,
									'createddate' 	=> $createddate,
									'createdby' 	=> $createdby['nrpnip']
							);   
                        $this->m_registrasi->UpdateData('tblregistrasiumum', $data, array('noregistrasi'=> $noregistrasi));
                        foreach($itemindex as $selected){
        $data = array(
            'noregistrasi'   => $noregistrasi,
            'iditem'  => $selected,
        );
        $this->m_registrasi->InsertData('tblpemeriksaanumum', $data);
        }
                        header('location:'.base_url().'registrasi/prosesfotoumum/'.$noregistrasi); 
					}else{
					$file 			= $this->upload->file_name; 
						$data=array( 
                            'diskon'		=> $diskon,
                                   'noregistrasi'		=> $noregistrasi,
                                    'nik'		=> $nik,
									'nama' 			=> $nama,
									'jeniskelamin' 		=> $kelamin,
                                    'golongandarah' 		=> $goldarah,
									'tempatlahir'	=> $tempatlahir,
									'tanggallahir' 	=> $tanggallahir,
                                    'tanggalregistrasi' 	=> $createddate,
									'agama' 		=> $agama,
									'profesi' 	=> $profesi,
									'asalrujukan' 	=> $asalrujukan,
                            'diagnosa' 	=> $diagnosa,
									'email' 		=> $email,
									'alamat' 		=> $alamat,
									'nomorhp' 		=> $nomorhp,
									'createddate' 	=> $createddate,
									'createdby' 	=> $createdby['nrpnip']
							);   
						$this->m_registrasi->UpdateData('tblregistrasiumum', $data, array('noregistrasi'=> $noregistrasi));
                        foreach($itemindex as $selected){
        $data = array(
            'noregistrasi'   => $noregistrasi,
            'iditem'  => $selected,
        );
        $this->m_registrasi->InsertData('tblpemeriksaanumum', $data);
        }
					}				
				header('location:'.base_url().'registrasi/prosesfotoumum/'.$noregistrasi); 
				} 
	}
    
    
    
	
	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'login');
			exit(0);
		}
	}
}
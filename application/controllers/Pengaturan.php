<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
	function __Construct()
    {
        parent ::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(array('form', 'url'));
		$this->load->model('m_pengaturan');
		$this->load->library('session');
	}
	
	public function index(){
		redirect(base_url().'pengaturan/tandatangan');
	}
	
	#==== TANDA TANGAN =====#
	public function tandatangan()
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
		$tahun			= $session['thnaktif'];
		
		if($UO == 'RENPROGAR'){
			$uoid = $this->input->get('uo');
			if($uoid == ''){
				$where = '';
			}else{
				$where = " where t.uo = '$uoid' ORDER BY tuo.uo ASC";
			}
		}else{
			$where = " where t.uo = '$UO' ORDER BY tuo.uo ASC";
		}

		$data = array(
			'Username' 		=> $Username,
			'Password' 		=> $Password,
			'Password'		=> $Password,
			'NamaLengkap' 	=> $NamaLengkap,
			'Level' 		=> $Level,
			'UO'			=> $UO,
			'tahun'			=> $tahun,
			'listuo'		=> $this->m_pengaturan->getUO()->result_array(),
			'data'			=> $this->m_pengaturan->getDatatandatangan(" $where ")->result_array(),
		);
           
        $this->load->view('pengaturan/tandatangan/v_tandatangan', $data);
	}

	public function add_tandatangan()
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
        $tahun			= $session['thnaktif'];
		$data = array(
			'Username' 		=> $Username,
			'Password' 		=> $Password,
			'Password'		=> $Password,
			'NamaLengkap' 	=> $NamaLengkap,
			'Level' 		=> $Level,
			'UO'			=> $UO,
			'tahun'			=> $tahun,
			'listuo'		=> $this->m_pengaturan->getUO()->result_array(),

			'statusdata'		=> 'add',
			'edit_status'		=> '',
			'edit_uo'			=> '',
		);
           
        $this->load->view('pengaturan/tandatangan/v_form_tandatangan', $data);
	}

	public function edit_tandatangan($ID)
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
		$tahun			= $session['thnaktif'];
		
		$edit = $this->m_pengaturan->getDatatandatangan(" where t.id = '$ID' ")->result_array();
		$data = array(
			'Username' 		=> $Username,
			'Password' 		=> $Password,
			'Password'		=> $Password,
			'NamaLengkap' 	=> $NamaLengkap,
			'Level' 		=> $Level,
			'UO'			=> $UO,
			'tahun'			=> $tahun,
			'listuo'		=> $this->m_pengaturan->getUO()->result_array(),

			'statusdata'		=> 'edit',
			'edit_id'			=> $edit[0]['id'],
			'edit_nrp'			=> $edit[0]['nrp'],
			'edit_nama'			=> $edit[0]['nama'],
			'edit_pangkat'		=> $edit[0]['pangkat'],
			'edit_jabatan'		=> $edit[0]['jabatan'],
			'edit_status'		=> $edit[0]['status'],
			'edit_uo'			=> $edit[0]['uo'],
		);
           
        $this->load->view('pengaturan/tandatangan/v_form_tandatangan', $data);
	}

	public function action_tandatangan()
	{
		$statusdata = $this->input->post('statusdata');
        $id 		= $this->input->post('id');
        $nrp 	    = $this->input->post('nrp');
        $nama       = $this->input->post('nama');
        $pangkat 	= $this->input->post('pangkat');
        $jabatan 	= $this->input->post('jabatan');
        $status 	= $this->input->post('status');
        $uo 	    = $this->input->post('uo');
			
		if($statusdata == 'add'){
			$data=array( 
				'nrp'		=> $nrp,
				'nama'		=> $nama,
				'pangkat'	=> $pangkat,
				'jabatan'	=> $jabatan,
				'status'	=> $status,
				'uo'		=> $uo
			);    
			$this->m_pengaturan->InsertData('tbltandatangan', $data);

		}else{
			$data=array( 
				'nrp'		=> $nrp,
				'nama'		=> $nama,
				'pangkat'	=> $pangkat,
				'jabatan'	=> $jabatan,
				'status'	=> $status,
				'uo'		=> $uo
			);    
			$this->m_pengaturan->UpdateData('tbltandatangan', $data, array('id' => $id));
		} 
		$this->session->set_flashdata('msg_success', 'Data tanda tangan berhasil di simpan');
		redirect(base_url().'pengaturan/tandatangan');
    }


    #==== APLIKASI / KURS MATA UANG =====#
    public function aplikasi()
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
		$tahun			= $session['thnaktif'];
		
		$data = array(
			'Username' 		=> $Username,
			'Password' 		=> $Password,
			'Password'		=> $Password,
			'NamaLengkap' 	=> $NamaLengkap,
			'Level' 		=> $Level,
			'UO'			=> $UO,
			'tahun'			=> $tahun,
			'listtahunanggaran'			=> $this->m_pengaturan->getTahunanggaran()->result_array(),
			'data'			=> $this->m_pengaturan->getDatakursmatauang(" where tahunanggaran = '$tahun'")->result_array(),
        );
        $this->load->view('pengaturan/aplikasi/v_kursmatauang', $data);
	}

	public function add_aplikasi()
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
        $tahun			= $session['thnaktif'];
		$data = array(
			'Username' 		=> $Username,
			'Password' 		=> $Password,
			'Password'		=> $Password,
			'NamaLengkap' 	=> $NamaLengkap,
			'Level' 		=> $Level,
			'UO'			=> $UO,
			'tahun'			=> $tahun,
			'listtahunanggaran'			=> $this->m_pengaturan->getTahunanggaran()->result_array(),

			'statusdata'			=> 'add',
			'edit_tahunanggaran'	=> '',
		);
           
        $this->load->view('pengaturan/aplikasi/v_form_kursmatauang', $data);
	}

	public function edit_aplikasi($ID)
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
		$tahun			= $session['thnaktif'];
		
		$edit = $this->m_pengaturan->getDatakursmatauang(" where id = '$ID' ")->result_array();
		$data = array(
			'Username' 		=> $Username,
			'Password' 		=> $Password,
			'Password'		=> $Password,
			'NamaLengkap' 	=> $NamaLengkap,
			'Level' 		=> $Level,
			'UO'			=> $UO,
			'tahun'			=> $tahun,
			'listuo'		=> $this->m_pengaturan->getUO()->result_array(),
			'listtahunanggaran'			=> $this->m_pengaturan->getTahunanggaran()->result_array(),

			'statusdata'			=> 'edit',
			'edit_id'				=> $edit[0]['id'],
			'edit_kodematauang'		=> $edit[0]['kodematauang'],
			'edit_namamatauang'		=> $edit[0]['namamatauang'],
			'edit_nilaitukar'		=> $edit[0]['nilaitukar'],
			'edit_tahunanggaran'	=> $edit[0]['tahunanggaran'],
		);
           
        $this->load->view('pengaturan/aplikasi/v_form_kursmatauang', $data);
	}

	public function action_aplikasi()
	{
		$statusdata = $this->input->post('statusdata');
        $id 		= $this->input->post('id');
        $kodematauang 	= $this->input->post('kodematauang');
        $namamatauang   = $this->input->post('namamatauang');
        $nilaitukar 	= $this->input->post('nilaitukar');
        $tahunanggaran 	= $this->input->post('tahunanggaran');
			
		if($statusdata == 'add'){
			$checkKodeMataUang = $this->m_pengaturan->getDatakursmatauang(" Where tahunanggaran = '".$tahunanggaran."' AND kodematauang = '".$kodematauang."' ")->result_array();
			
			if(COUNT($checkKodeMataUang) == 0){
				$data=array( 
					'kodematauang'	=> $kodematauang,
					'namamatauang'	=> $namamatauang,
					'nilaitukar'	=> $nilaitukar,
					'tahunanggaran'	=> $tahunanggaran,
				);    
				$this->m_pengaturan->InsertData('tblmatauang', $data);
				$this->session->set_flashdata('msg_success', 'Data Kurs Mata Uang berhasil di simpan');
				redirect(base_url().'pengaturan/aplikasi');
			}else{
				$this->session->set_flashdata('msg_failed', 'Mata UANG '.$kodematauang.' di tahun '.$tahunanggaran.' sudah ada');
			}

		}else{
			$old_kodematauang 	= $this->input->post('old_kodematauang');
			$old_tahunanggaran 	= $this->input->post('old_tahunanggaran');

			if($old_kodematauang == $kodematauang AND $old_tahunanggaran == $tahunanggaran){
				$data=array( 
					'nilaitukar'	=> $nilaitukar,
					'tahunanggaran'	=> $tahunanggaran,
				);    
				$this->m_pengaturan->UpdateData('tblmatauang', $data, array('id' => $id));
				$this->session->set_flashdata('msg_success', 'Data Kurs Mata Uang berhasil di simpan');
				redirect(base_url().'pengaturan/aplikasi');
			}else{
				$checkKodeMataUang = $this->m_pengaturan->getDatakursmatauang(" Where tahunanggaran = '".$tahunanggaran."' AND kodematauang = '".$kodematauang."' ")->result_array();
				if(COUNT($checkKodeMataUang) == 0){
					$data=array( 
						'kodematauang'	=> $kodematauang,
						'namamatauang'	=> $namamatauang,
						'nilaitukar'	=> $nilaitukar,
						'tahunanggaran'	=> $tahunanggaran,
					);    
					$this->m_pengaturan->UpdateData('tblmatauang', $data, array('id' => $id));
					$this->session->set_flashdata('msg_success', 'Data Kurs Mata Uang berhasil di simpan');
					redirect(base_url().'pengaturan/aplikasi');
				}else{
					$this->session->set_flashdata('msg_failed', 'Mata UANG '.$kodematauang.' di tahun '.$tahunanggaran.' sudah ada');
				}
			}
		} 
		
	}

	public function action_tahunanggaran()
	{
        $tahunanggaran = $this->input->post('new_tahunanggaran');
        $data = $this->m_pengaturan->getTahunanggaran(" Where tahunanggaran = '".$tahunanggaran."' ")->result_array();
        if(COUNT($data) > 0){
            $res = false;
        }else{
			$data=array( 
				'tahunanggaran'		=> $tahunanggaran,
			);    
			$this->m_pengaturan->InsertData('tbltahunanggaran', $data);
            $res = true;
        }
        echo json_encode($res);
	}

	public function check_kodematauang()
	{
        $kodematauang = $this->input->post('kodematauang');
        $tahunanggaran = $this->input->post('tahunanggaran');
        $data = $this->m_pengaturan->getDatakursmatauang(" Where tahunanggaran = '".$tahunanggaran."' AND kodematauang = '".$kodematauang."' ")->result_array();
        if(COUNT($data) > 0){
            $res = false;
        }else{
            $res = true;
        }
        echo json_encode($res);
	}

	public function ganti_tahun()
	{
        $tahunanggaran = $this->input->post('tahunanggaran_value');
		$dataNonAktif=array( 
			'status'		=> '0',
		);    
        $dataAktif=array( 
			'status'		=> '1',
		);  
		$this->m_pengaturan->UpdateDataAll('tbltahunanggaran', $dataNonAktif);
		$this->m_pengaturan->UpdateData('tbltahunanggaran', $dataAktif, array('tahunanggaran' => $tahunanggaran));
		$this->session->set_flashdata('msg_success', 'Anda berhasil mengganti tahun aktif menjadi <b>'.$tahunanggaran.'</b>, silakan login kembali');
		redirect(base_url().'login');
	}
	

	#==== REGISTRASI =====#
	public function registrasi()
	{
		$this->cek_session();
		$session 		= $this->session->userdata('login');
		$Username		= $session['Username'];
        $Password		= $session['Password'];
		$NamaLengkap	= $session['NamaLengkap'];
        $Level			= $session['Level'];
		$UO				= $session['UO'];
		$tahun			= $session['thnaktif'];
		
		if($UO == 'RENPROGAR'){
			$uoid = $this->input->get('uo');
			if($uoid == ''){
				$where = ' ORDER BY verifikasi ASC';
			}else{
				$where = " where r.uo = '$uoid' ORDER BY verifikasi ASC";
			}
		}else{
			$where = " where r.uo = '$UO' ORDER BY verifikasi ASC";
		}

		$data = array(
			'Username' 		=> $Username,
			'Password' 		=> $Password,
			'Password'		=> $Password,
			'NamaLengkap' 	=> $NamaLengkap,
			'Level' 		=> $Level,
			'UO'			=> $UO,
			'tahun'			=> $tahun,
			'listuo'		=> $this->m_pengaturan->getUO()->result_array(),
			'data'			=> $this->m_pengaturan->getRegistrasiAll(" $where ")->result_array(),
		);
           
        $this->load->view('pengaturan/registrasi/v_registrasi', $data);
	}

	public function register_verfikasi($id)
	{
		$check = $this->m_pengaturan->getRegistrasi(" Where id = '".$id."' ")->result_array();

		if($id == ''){
			$this->session->set_flashdata('msg_success', 'Verifikasi gagal, ID Registrasi kosong');
			redirect(base_url().'pengaturan/tandatangan');
		}

		if(COUNT($check) == 0){
			$this->session->set_flashdata('msg_success', 'Verifikasi gagal, ID Registrasi tidak ada');
			redirect(base_url().'pengaturan/tandatangan');
		}

		$data=array( 
			'verifikasi' => 1,
		);    
		$this->m_pengaturan->UpdateData('tblregistrasi', $data, array('id' => $id));
        $this->db->query("insert into tbluser(`Username`, `Password`, `NamaLengkap`, `Level`, `UO`) SELECT email as username,password,nama as namalengkap, 'slog' as level, uo FROM `tblregistrasi` where verifikasi = 1 and id = '$id'");
		$this->session->set_flashdata('msg_success', 'Registrasi atas nama "'.$check[0]['nama'].'" berhasil ');
		redirect(base_url().'pengaturan/registrasi');
    }
    
	function cek_session(){
		if(!$this->session->userdata('login')){
			header('location:'.base_url().'login');
			exit(0);
		}
	}
}

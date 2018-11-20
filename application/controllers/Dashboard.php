<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DSEUSEUH_Model');
		if ($this->session->username == null) {
			redirect();
		}
		else if ($this->session->level == 'customer') {
			redirect();
		}
	}

	public function index()
	{	
		$data['title'] = "D'SEUSEUH Dashboard";
		$data['viewnya'] = 'layouts/dashboard_layout';
		$data['sidenav'] = 'auth/dashboard/dashboard';
		$data['jml_pesan'] = $this->DSEUSEUH_Model->read('feedback')->num_rows();
		$data['jml_manual'] = $this->DSEUSEUH_Model->read('manual')->num_rows();
		$data['jml_user'] = $this->DSEUSEUH_Model->read('user')->num_rows();
		$data['jml_laundry'] = $this->DSEUSEUH_Model->read('laundry')->num_rows();
		$data['web_info'] = $this->DSEUSEUH_Model->read('web_info')->result();		
		foreach ($data['web_info'] as $key => $web_info) {
			$data['nama'] = $web_info->nama;
			$data['deskripsi'] = $web_info->deskripsi;
			$data['kontak'] = $web_info->kontak;
			$data['alamat'] = $web_info->alamat;
			$data['tentang_kami'] = $web_info->tentang_kami;
		}
		$this->load->view('layouts/main_layout', $data);
	}

	public function testimoni()
	{		
		$feedbacks = $this->DSEUSEUH_Model->read('feedback');
		$data = array(
			'title' => 'Testimoni',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/feedback',
			'feedbacks' => $feedbacks->result()
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function laundry_masuk()
	{		
		$lndry = $this->DSEUSEUH_Model->read('laundry');
		$data = array(
			'title' => 'Laundry Masuk',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/laundry/laundryMasuk',
			'lndry' => $lndry->result()
			
		);
		$this->load->view('layouts/main_layout', $data);		
	}

	public function laundry_keluar()
	{		
		$lndry = $this->DSEUSEUH_Model->read('laundry');
		$data = array(
			'title' => 'Laundry Masuk',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/laundry/laundryKeluar',
			'lndry' => $lndry->result()
			
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function user_manual()
	{
		$manuals = $this->DSEUSEUH_Model->read('manual');
		$data = array(
			'title' => 'Paket Laundry | Tambah',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/webContent/changeManual',
			'manuals' => $manuals->result()
		);
		$this->load->view('layouts/main_layout', $data);		
	}

	public function member()
	{
		$users = $this->DSEUSEUH_Model->read('user');
		$data = array(
			'title' => 'Member',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/member/dataMember',
			'users' => $users->result()
			
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function paket()
	{
		$pakets = $this->DSEUSEUH_Model->read('paket');
		$data = array(
			'title' => 'Paket Laundry',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/paket/paketLaundry',
			'pakets' => $pakets->result()
			
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function profil_web()
	{		
		$manuals = $this->DSEUSEUH_Model->read('manual');
		$data = array(
			'title' => 'Paket Laundry | Informasi Web',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/webContent/changeInfo',
			'manuals' => $manuals->result()
		);
		$this->load->view('layouts/main_layout', $data);
	}
}
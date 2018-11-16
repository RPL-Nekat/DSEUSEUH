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
	}

	public function index()
	{		
		if ($this->session->username == null) {
			redirect('auth');
		} 
		else if ($this->session->level == 'costumer') {
			redirect();
		} else {	
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
	}
}
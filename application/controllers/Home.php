<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Home extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DSEUSEUH_Model');
	}

	public function index()
	{		
		$feedbacks = $this->DSEUSEUH_Model->read('feedback', 'status = 1');
		$pakets = $this->DSEUSEUH_Model->read('paket');
		$data['title'] = "D'Seuseuh Laundry";
		$data['viewnya'] = 'home';
		$data['feedbacks'] = $feedbacks->result();
		$data['pakets'] = $pakets->result();
		$data['manuals'] = $this->DSEUSEUH_Model->read('manual')->result();
		foreach ($data['manuals'] as $key => $manuals) {
			$data['nama'] = $manuals->header;
			$data['subheader'] = $manuals->subheader;
			$data['deskripsi'] = $manuals->deskripsi;
			$data['thumbnail_manual'] = $manuals->thumbnail;
		}
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

	public function about()
	{
		$data = array(
			'title' => "About Us",
			'viewnya' => 'about/index'
		);
		$this->load->view('layouts/main_layout', $data);
	}
}
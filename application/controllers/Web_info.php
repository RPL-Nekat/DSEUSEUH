<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Web_info extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DSEUSEUH_Model');
		if ($this->session->username == null) {
			redirect();
		}
		else if ($this->session->level == 'costumer') {
			redirect();
		}
	}

	public function index()
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

	public function dataWeb()
	{
		$data = $this->DSEUSEUH_Model->read('web_info')->result();
		echo json_encode($data);
	}

	public function simpanWeb()
	{
		$header = $this->input->post('header');
		$deskripsi = $this->input->post('deskripsi');
		$data = array(
			'header' => $header,
			'deskripsi' => $deskripsi
		);
		$id = $this->DSEUSEUH_Model->create('web_info', $data);
		echo json_encode($data);
	}	

	public function updateWeb()
	{
		$id_web = $this->input->post('id_web');		
		$where = array('id_web' => $id_web);
		$data = array(
			'nama' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'kontak' => $this->input->post('kontak'),
			'alamat' => $this->input->post('alamat'),
			'tentang_kami' => $this->input->post('tentang_kami')
		);
		$webs = $this->DSEUSEUH_Model->update($where, $data, 'web_info');
		echo json_encode($webs);
	}

	public function hapusWeb()
	{
		$id_web = $this->input->post('id_web');
		$where = array('id_web' => $id_web);
		$data = $this->DSEUSEUH_Model->delete('web_info', $where);
		echo json_encode($data);
	}

}
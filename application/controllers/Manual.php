<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Manual extends CI_Controller
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

	public function dataManual()
	{
		$data = $this->DSEUSEUH_Model->read('manual')->result();
		echo json_encode($data);
	}

	public function simpanManual()
	{		
		$data = array(
			'header' => $this->input->post('header'),
			'subheader' => $this->input->post('subheader'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$id = $this->DSEUSEUH_Model->create('manual', $data);
		echo json_encode($data);
	}	

	public function updateManual()
	{
		$id_manual = $this->input->post('id_manual');
		$where = array('id_manual' => $id_manual);
		$data = array(
			'header' => $this->input->post('header'),
			'subheader' => $this->input->post('subheader'),
			'deskripsi' => $this->input->post('deskripsi')
		);
		$manuals = $this->DSEUSEUH_Model->update($where, $data, 'manual');
		echo json_encode($data);
	}

	public function hapusManual()
	{
		$id_manual = $this->input->post('id_manual');
		$where = array('id_manual' => $id_manual);
		$data = $this->DSEUSEUH_Model->delete('manual', $where);
		echo json_encode($data);
	}

}
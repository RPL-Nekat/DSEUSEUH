<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class About extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DSEUSEUH_Model');
	}

	public function index()
	{
		$data = array(
			'title' => "About Us",
			'viewnya' => 'about/index'
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function feedback()
	{
		$subject = $this->input->post('subject');
		$message = $this->input->post('message');
		$data = array(
			'subjek' => $subject,
			'pesan' => $message
		);

		$id = $this->DSEUSEUH_Model->create('feedback', $data);
		redirect('home');
	}
}
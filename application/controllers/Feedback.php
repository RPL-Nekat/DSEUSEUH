<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Feedback extends CI_Controller
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
		$feedbacks = $this->DSEUSEUH_Model->read('feedback');
		$data = array(
			'title' => 'Testimoni',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/feedback',
			'feedbacks' => $feedbacks->result()
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function save()
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

	public function update($id_feedback)
	{		
		if ($this->input->post('type') == 'approve') {			
			$where = array('id_feedback' => $id_feedback);
			$data = array('status' => 1);						
			$this->DSEUSEUH_Model->update($where, $data, 'feedback');
		}
		else if ($this->input->post('type') == 'batal') {
			$where = array('id_feedback' => $id_feedback);
			$data = array('status' => 0);	
			$this->DSEUSEUH_Model->update($where, $data, 'feedback');
		}		
		redirect('feedback');
	}

	public function delete($id_feedback)
	{
		$where = array('id_feedback' => $id_feedback);
		$this->DSEUSEUH_Model->delete('feedback', $where);
		redirect('feedback');
	}
}
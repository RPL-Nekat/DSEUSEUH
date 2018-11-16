<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Auth extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DSEUSEUH_Model');
	}

	public function index()
	{
		if ($this->session->username != null) {
			redirect('dashboard');
		} else {
			$data = array(
				'title' => 'Login Member',
				'viewnya' => 'auth/login'
			);
			$this->load->view('layouts/main_layout', $data);
		}
	}

	public function hapus($id)
	{
		if ($this->session->username == null) {
			redirect('auth');
		} else {
			$where = array('id_user' => $id);
			$this->DSEUSEUH_Model->delete('user', $where);
			redirect('auth/akun');
		}
	}

	public function register()
	{
		if ($this->session->username != null) {
			redirect('auth');
		} else {
			$data = array(
				'title' => 'Register Member',
				'viewnya' => 'auth/register'
			);
			$this->load->view('layouts/main_layout', $data);
		}		
	}

	public function daftar()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$alamat = $this->input->post('alamat');
		$data = array(
			'username' => $username,
			'password' => md5($password),
			'nama_usr' => $nama,
			'email' => $email,
			'alamat' => $alamat,
			'level' => 'costumer'
		);
		$id = $this->DSEUSEUH_Model->create('user', $data);
		redirect('auth');
	}

	// public function changepass()
	// {
	// 	$pass = $this->input->post('password');
	// 	$old = $this->input->post('old_password');
	// 	$data = array(
	// 		'password' => md5($pass);
	// 	);
	// 	$where = array(
	// 		'password' => md5($old),
	// 		'email' => $this->input->post('email')
	// 	)
	// 	$this->DSEUSEUH_Model->update($where, $data, 'user');
	// 	redirect('home');
	// }

	// public function forgot_pass()
	// {
	// 	$data = array(
	// 		'title' => 'Reset Password',
	// 		'viewnya' => 'auth/reset'
	// 	);
	// 	$this->load->view('layouts/main_layout', $data);
	// }

	// public function force_reset()
	// {
	// 	$data = array(
	// 		'title' => 'Ganti Password',
	// 		'viewnya' => 'auth/change'
	// 	);
	// 	$this->load->view('layouts/main_layout', $data);
	// }

	public function login()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$where = "(username = '".$this->db->escape_str($username)."' OR email = '".$this->db->escape_str($username)."') AND password = '".$this->db->escape_str($password)."'";
		$cek = $this->DSEUSEUH_Model->read('user', $where);
		if ($cek->num_rows() > 0) {
			foreach ($cek->result() as $key => $res) {
				$nama = $res->nama_usr;
				$email = $res->email;
				$telp = $res->no_telp;
				$level = $res->level;
				$data_session = array(
					'username' => $username,
					'nama' => $nama,
					'email' => $email,
					'telp' => $telp,
					'level' => $level
				);
				$this->session->set_userdata($data_session);
				redirect('dashboard');
			}
		} else {
			redirect('auth?error=1');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}
}
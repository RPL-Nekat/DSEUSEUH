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
		$this->load->library('upload');		
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
				$data_session = array(
					'id_user' => $res->id_user,
					'username' => $username,
					'nama_usr' => $res->nama_usr,
					'email' => $res->email,
					'no_telp' => $res->no_telp,
					'alamat' => $res->alamat,
					'avatar' => $res->avatar,
					'level' => $res->level
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

	public function profil()
	{
		if ($this->session->username != null) {
			$data = array(
				'title' => 'Profil',
				'viewnya' => 'auth/profil'
			);
			$this->load->view('layouts/main_layout', $data);
		} else {
			redirect();
		}
	}

	public function updateProfil()
	{
		$id_user = $this->input->post('id_user');
		$where = array('id_user' => $id_user);
		$data = array(
			'nama_usr' => $this->input->post('nama_usr'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat')
		);
		$this->DSEUSEUH_Model->update($where, $data, 'user');
		$this->session->set_userdata(
			array(
				'nama_usr' => $this->input->post('nama_usr'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'no_telp' => $this->input->post('no_telp'),
				'alamat' => $this->input->post('alamat')		
			)
		);
		echo json_encode($data);
	}

	// public function updateAvatar()
	// {
	// 	$where = array('id_user' => $id_user = $this->input->post('id_user'));
	// 	if (!empty($_FILES["avatar"]["name"])) {			
	// 		$data = array('avatar' => $this->_uploadImage());
	// 	} else {
	// 		$data = array('avatar' => $this->input->post("old_avatar"));
	// 	}
	// 	$this->DSEUSEUH_Model->update($where, $data, 'user');
	// 	$this->session->set_userdata(array('avatar' => $this->_uploadImage()));
	// 	echo json_encode($data);
	// }

	public function tampilProfil()
	{
		$data = array(
			'id_user' => $this->session->id_user,
			'username' => $this->session->username,
			'nama_usr' => $this->session->nama_usr,
			'email' => $this->session->email,
			'no_telp' => $this->session->no_telp,
			'alamat' => $this->session->alamat,
			'avatar' => $this->session->avatar,
			'level' => $this->session->level
		);
		echo json_encode($data);
	}

	public function do_upload()
	{
		$config['upload_path'] = './assets/img/avatar';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
		$config['encrypt_name'] = true;		

		$this->upload->initialize($config);
		if (!empty($_FILES['filefoto']['name'])) {
			if ($this->upload->do_upload('filefoto')) {
				$data = $this->upload->data();
				$image = $data['file_name'];
				$this->DSEUSEUH_Model->upload_image('user', $image, array('id_user' => $this->session->id_user));
				$this->session->set_userdata(array('avatar' => $image));				
				echo "<script type='text/javascript'>alert('Berhasil Merubah Foto');</script>";
			} else {
				echo "<script type='text/javascript'>alert(Upload failed. Image file must be gif|jpg|png|jpeg|bmp);</script>";
			}
		} else {
			echo "<script type='text/javascript'>alert(Failed, image file is empty);</script>";
		}	
	}
}
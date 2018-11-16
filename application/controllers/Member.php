<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* 
	*/
	class Member extends CI_Controller
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
		$users = $this->DSEUSEUH_Model->read('user');
		$data = array(
			'title' => 'Member',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/member/dataMember',
			'users' => $users->result()
			
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function addMember()
	{	
		$data = array(
			'title' => 'Member',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/member/addMember'
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function data_admin()
		{
			$isi['kode'] = $this->DSEUSEUH_Model->get_no_user();
			$isi['content'] = 'admin/data_admin';
			$isi['id_user'] = '';
			$isi['nama_usr'] = '';
			$isi['username'] = '';
			$isi['password'] = '';
			$isi['no_telp'] = '';
			// $isi['alamat'] = '';
			$isi['level']="admin";
			$isi['data'] = $this->db->get('user');
			$this->load->view('admin/tampilan_admin',$isi);
		}

		public function tambahAdmin()
		{
			
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			
			$key = $this->input->post('id_user'); 	
			$data['id_user']    = $this->input->post('id_user');
			$data['nama_usr'] 	= $this->input->post('nama_usr');
			$data['username'] 		= $this->input->post('username');	
			$data['password'] 		= $this->input->post('password');	
			$data['no_telp'] 		= $this->input->post('no_telp');	
			// $data['alamat'] 		= $this->input->post('alamat');	
			$data['level']			= $this->input->post('level');

			$this->load->model('DSEUSEUH_Model');
			$query = $this->DSEUSEUH_Model->getdata($key);

			if($query->num_rows()>0)
			{
				$this->DSEUSEUH_Model->getupdate($key,$data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Update
						<br />
					</div>');
			}
			else
			{
				$this->DSEUSEUH_Model->getinsert($data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Simpan
						<br />
					</div>');
			}

			redirect('auth/member');
		}
		public function editAdmin(){
			$isi['invoice'] = $this->DSEUSEUH_Model->get_no_user();
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			$isi['title'] = 'Edit Member';
			$isi['viewnya'] = 'layouts/dashboard_layout';
			$isi['sidenav'] = 'auth/dashboard/member/editMember';
			$key = $this->uri->segment(3);
			$this->db->where('id_user',$key);
			$query = $this->db->get('user');
			if ($query->num_rows()>0) {
				# code...
				foreach ($query->result() as $row) {
					# code...
					$isi['id_user'] = $row->id_user;
					$isi['nama_usr'] = $row->nama_usr;
					$isi['username'] = $row->username;
					$isi['password'] = $row->password;
					$isi['no_telp'] = $row->no_telp;
					// $isi['alamat'] = $row->alamat;
					$isi['level'] = $row->level;
				}
			}
			else{
				$isi['id_user'] = '';
				$isi['nama_usr'] = '';
				$isi['username'] = '';
				$isi['password'] = '';
				$isi['no_telp'] = '';
				// $isi['alamat'] = '';
				$isi['level'] = '';
			}
			$this->load->view('layouts/main_layout',$isi);
		}

		public function simpanAdmin(){
			// $isi['invoice'] = $this->m_invoice->get_no_user();
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			$key=$this->input->post('id_user');
			$data['id_user'] = $this->input->post('id_user');
			$data['nama_usr'] = $this->input->post('nama_usr');
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');
			$data['no_telp'] = $this->input->post('no_telp');
			// $data['alamat'] = $this->input->post('alamat');
			$data['level'] = $this->input->post('level');

			$this->load->model('DSEUSEUH_Model');
			$query = $this->DSEUSEUH_Model->getdata($key);
			if ($query->num_rows()>0) {
				# code...
				$this->DSEUSEUH_Model->getupdate($key,$data);
				$this->session->set_flashdata('info','<div class="btn btn-success"> Data berhasil diupdate</div>');
			}
			else
			{
				$this->DSEUSEUH_Model->getinsert($data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Simpan
						<br />
					</div>');
			}
			redirect('member');
		}
		public function deleteadmin()
		{
			
			$this->load->model('DSEUSEUH_Model');

			$key = $this->uri->segment(3);
			$this->db->where('id_user',$key);
			$query =$this->db->get('user');
			if($query->num_rows()>0)
			{
				$this->DSEUSEUH_Model->getdelete($key);
			}
			redirect('member');
		}
}

 ?>
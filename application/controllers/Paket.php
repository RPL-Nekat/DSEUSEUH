<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Paket extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('DSEUSEUH_Model');
	}

	public function index()
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

	public function addPaket()
	{
		$data = array(
			'title' => 'Paket Laundry | Tambah',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/paket/addPaket'
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function paket()
		{
			
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			// $isi['content'] = 'admin/paket';
			$isi['id_paket']	='';
			$isi['nama_paket']='';
			$isi['harga']='';
			$isi['deskripsi_paket'] = '';
			$isi['data'] 		 = $this->db->get('paket');
			$this->load->view('layouts/main_layout',$isi);	
		}

	public function editpaket()
		{
			
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			$isi['title'] = 'Edit Paket';
			$isi['viewnya'] = 'layouts/dashboard_layout';
			$isi['sidenav'] = 'auth/dashboard/paket/editpaket';
			
			$key = $this->uri->segment(3);
			$this->db->where('id_paket',$key);
			$query =$this->db->get('paket');
			if ($query->num_rows()>0) {
				foreach ($query->result() as $row) {
					$isi['id_paket']	 =$row->id_paket;
					$isi['nama_paket'] =$row->nama_paket;
					$isi['harga'] =$row->harga;
					$isi['deskripsi_paket'] = $row->deskripsi_paket;
				}
			}
			else
			{
				$isi['id_paket']	='';
				$isi['nama_paket']='';
				$isi['harga']='';
				$isi['deskripsi_paket'] = '';
			}
			$this->load->view('layouts/main_layout',$isi);
		}
		public function simpanpaket()
		{
			
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			
			$key = $this->input->post('id_paket'); 	
			$data['id_paket']    = $this->input->post('id_paket');
			$data['nama_paket'] 	= $this->input->post('nama_paket');
			$data['harga'] 		= $this->input->post('harga');	
			$data['deskripsi_paket'] = $this->input->post('deskripsi_paket');

			$this->load->model('DSEUSEUH_Model');
			$query = $this->DSEUSEUH_Model->datapaket($key);

			if($query->num_rows()>0)
			{
				$this->DSEUSEUH_Model->updatepaket($key,$data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Update
						<br />
					</div>');
			}
			else
			{
				$this->DSEUSEUH_Model->insertpaket($data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Simpan
						<br />
					</div>');
			}
			redirect('paket');
		}
		public function deletepaket()
		{
			
			$this->load->model('DSEUSEUH_Model');

			$key = $this->uri->segment(3);
			$this->db->where('id_paket',$key);
			$query =$this->db->get('paket');
			if($query->num_rows()>0)
			{
				$this->DSEUSEUH_Model->deletepaket($key);
			}
			redirect('paket');
		}

		public function detailpaket()
		{

			
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			$isi['content'] = 'admin/paket';
			
			$key = $this->uri->segment(3);
			$this->db->where('id_paket',$key);
			$query =$this->db->get('paket');
			if ($query->num_rows()>0) {
				foreach ($query->result() as $row) {
					$isi['id_paket']	=$row->id_paket;
					$isi['nama_paket']=$row->nama_paket;
					$isi['harga']=$row->harga;
					$isi['deskripsi_paket'] = $row->deskripsi_paket;
				}
			}
			else
			{
				$isi['id_paket']	='';
				$isi['nama_paket']='';
				$isi['harga']='';
				$isi['deskripsi_paket']='';
			}
			$this->load->view('auth/paket/',$isi);

		}

	public function add()
	{
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
			
			$key = $this->input->post('id_paket'); 	
			$data['id_paket']    = $this->input->post('id_paket');
			$data['nama_paket'] 	= $this->input->post('nama_paket');
			$data['harga'] 		= $this->input->post('harga');	
			$data['deskripsi_paket'] = $this->input->post('deskripsi_paket');

			$this->load->model('DSEUSEUH_Model');
			$query = $this->DSEUSEUH_Model->datapaket($key);

			if($query->num_rows()>0)
			{
				$this->DSEUSEUH_Model->updatepaket($key,$data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Update
						<br />
					</div>');
			}
			else
			{
				$this->DSEUSEUH_Model->insertpaket($data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Simpan
						<br />
					</div>');
			}
			redirect('auth/paket/');
	}
}
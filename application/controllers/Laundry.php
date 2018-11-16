<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Laundry extends CI_Controller
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
		$lndry = $this->DSEUSEUH_Model->read('laundry');
		$data = array(
			'title' => 'Laundry Masuk',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/laundry/laundryMasuk',
			'lndry' => $lndry->result()
			
		);
		$this->load->view('layouts/main_layout', $data);		
	}

	public function addlaundry()
	{
		$data = array(
			'title' => 'Laundry Masuk | Tambah',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/laundry/form_masuk'
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function tambahlaundry()
		{		
			$isi['invoice'] = $this->DSEUSEUH_Model->get_no_invoice();
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			$isi['id_laundry']	='';
			$isi['nama_konsumen']	='';
			$isi['status']='';
			$isi['jrsn']='';
			$isi['brt']='';
			$isi['t']='';
			$isi['by']	= '';
			$isi['k']='';
			$isi['tgl_masuk']	='';
			$isi['tgl_keluar']	='';
			$isi['paket_id_paket']	='';
			$isi['data'] 		 = $this->db->get('laundry');
			redirect('laundry');

		}
		public function simpanlaundry()
		{

			
			$isi['nama_usr'] = $this->session->userdata('nama_usr');

			$key = $this->input->post('id_laundry'); 	
			$data['id_laundry']    = $this->input->post('id_laundry');
			$data['nama_konsumen'] 	= $this->input->post('nama_konsumen');
			$data['status'] 		= $this->input->post('status');
			$data['harga'] 		= $this->input->post('jrsn');
			$data['berat'] 	= $this->input->post('brt');
			$data['total'] 		= $this->input->post('t');
			$data['bayar'] 		= $this->input->post('by');
			$data['kembalian'] 		= $this->input->post('k');
			$data['tgl_masuk'] 	 	= $this->input->post('tgl_masuk');
			$data['tgl_keluar'] 	 	= $this->input->post('tgl_keluar');	
			$data['paket_id_paket'] 		= $this->input->post('id_paket');


			$this->load->model('DSEUSEUH_Model');
			$query = $this->DSEUSEUH_Model->getdatalaundry($key);

			if($query->num_rows()>0)
			{
				$this->DSEUSEUH_Model->getupdatelaundry($key,$data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Update
						<br />
					</div>');
			}
			else
			{
				$this->DSEUSEUH_Model->getinsertlaundry($data);
				$this->session->set_flashdata('info',
					'<div class="btn btn-success">
						Data Berhasil di Simpan
						<br />
					</div>');
			}
			redirect('Laporan/cetakstruk');
		}

		public function ambillaundry()
		{
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			$isi['title'] = 'Ambil Laundry';
			$isi['viewnya'] = 'layouts/dashboard_layout';
			$isi['sidenav'] = 'auth/dashboard/laundry/ambilLaundry';
			
			$key = $this->uri->segment(3);
			$this->db->where('id_laundry',$key);
			$query =$this->db->get('laundry');
			if ($query->num_rows()>0) {
				foreach ($query->result() as $row) {
					$isi['id_laundry']	 =$row->id_laundry;
					$isi['nama_konsumen'] =$row->nama_konsumen;
					$isi['status']	 =$row->status;
					$isi['jrsn']	 =$row->harga;
					$isi['brt'] =$row->berat;
					$isi['t']	 =$row->total;
					$isi['by'] =$row->bayar;
					$isi['k']	 =$row->kembalian;
					$isi['tgl_masuk'] =$row->tgl_masuk;
					$isi['tgl_keluar'] =$row->tgl_keluar;
					$isi['paket_id_paket'] =$row->paket_id_paket;
				
				}
			}
			else
			{
					$isi['id_laundry']	 ='';
					$isi['nama_konsumen'] ='';
					$isi['status']	 ='';
					$isi['jrsn']	 ='';
					$isi['brt'] ='';
					$isi['t']	 ='';
					$isi['by'] ='';
					$isi['k']	 ='';
					$isi['tgl_masuk'] ='';
					$isi['tgl_keluar'] ='';
					$isi['paket_id_paket'] ='';

			}
			$this->load->view('layouts/main_layout',$isi);
		}


		
		public function editlaundry()
		{
			
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			$isi['title'] = 'Ambil Laundry';
			$isi['viewnya'] = 'layouts/dashboard_layout';
			$isi['sidenav'] = 'auth/dashboard/laundry/ambilLaundry';
			
			$key = $this->uri->segment(3);
			$this->db->where('id_laundry',$key);
			$query =$this->db->get('laundry');
			if ($query->num_rows()>0) {
				foreach ($query->result() as $row) {
					$isi['id_laundry']	 =$row->id_laundry;
					$isi['nama_konsumen'] =$row->nama_konsumen;
					$isi['status']	 =$row->status;
					$isi['jrsn']	 =$row->harga;
					$isi['brt'] =$row->berat;
					$isi['t']	 =$row->total;
					$isi['by'] =$row->bayar;
					$isi['k']	 =$row->kembalian;
					$isi['tgl_masuk'] =$row->tgl_masuk;
					$isi['tgl_keluar'] =$row->tgl_keluar;
					$isi['paket_id_paket'] =$row->paket_id_paket;
				
				}
			}
			else
			{
					$isi['id_laundry']	 ='';
					$isi['nama_konsumen'] ='';
					$isi['status']	 ='';
					$isi['jrsn']	 ='';
					$isi['brt'] ='';
					$isi['t']	 ='';
					$isi['by'] ='';
					$isi['k']	 ='';
					$isi['tgl_masuk'] ='';
					$isi['tgl_keluar'] ='';
					$isi['paket_id_paket'] ='';

			}
			$this->load->view('layouts/main_layout',$isi);
		}

		public function deletelaundry()
		{
			
			$this->load->model('DSEUSEUH_Model');

			$key = $this->uri->segment(3);
			$this->db->where('id_laundry',$key);
			$query =$this->db->get('laundry');
			if($query->num_rows()>0)
			{
				$this->DSEUSEUH_Model->getdeletelaundry($key);
			}
			redirect('laundry');
		}

		// public function deletelaundry()
		// {
			
		// 	$this->load->model('DSEUSEUH_Model');

		// 	$key = $this->uri->segment(3);
		// 	$this->db->where('id_laundry',$key);
		// 	$query =$this->db->get('laundry');
		// 	if($query->num_rows()>0)
		// 	{
		// 		$this->DSEUSEUH_Model->getdeletelaundry($key);
		// 	}
		// 	redirect('admin/keluar');
		// }

		

		public function keluar()
		{
			
			$this->load->model('model_admin');
			$isi['nama_usr'] = $this->session->userdata('nama_usr');
			$isi['content'] = 'admin/keluar';
			$isi['data'] 		 = $this->model_admin->keluar();
			$this->load->view('admin/tampilan_admin',$isi);

				
		}
}
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
		else if ($this->session->level == 'customer') {
			redirect();
		}
	}

	public function dataLaundryMasuk()
	{
		$data = $this->DSEUSEUH_Model->read('laundry', array('status' => 'masuk'))->result();
		echo json_encode($data);
	}
	public function dataLaundryKeluar()
	{
		$data = $this->DSEUSEUH_Model->read('laundry', array('status' => 'keluar'))->result();
		echo json_encode($data);
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

	public function addlaundrykeluar()
	{
		$data = array(
			'title' => 'Laundry Masuk | Keluar',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/laundry/laundryKeluar'
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
		$data['id_laundry']	= $this->input->post('id_laundry');
		$data['nama_konsumen'] = $this->input->post('nama_konsumen');
		$data['status'] = $this->input->post('status');
		$data['harga'] = $this->input->post('jrsn');
		$data['berat'] = $this->input->post('brt');
		$data['total'] = $this->input->post('t');
		$data['bayar'] = $this->input->post('by');
		$data['kembalian'] = $this->input->post('k');
		$data['tgl_masuk'] = $this->input->post('tgl_masuk');
		$data['tgl_keluar']	= $this->input->post('tgl_keluar');	
		$data['paket_id_paket'] = $this->input->post('id_paket');

		$query = $this->DSEUSEUH_Model->getdatalaundry($key);

		if($query->num_rows()>0)
		{
			$this->DSEUSEUH_Model->getupdatelaundry($key,$data);
		}
		else
		{
			$this->DSEUSEUH_Model->getinsertlaundry($data);
			$this->session->set_flashdata('id_cetak', $key);
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


	
	// public function editlaundry()
	// {
		
	// 	$isi['nama_usr'] = $this->session->userdata('nama_usr');
	// 	$isi['title'] = 'Ambil Laundry';
	// 	$isi['viewnya'] = 'layouts/dashboard_layout';
	// 	$isi['sidenav'] = 'auth/dashboard/laundry/ambilLaundry';
		
	// 	$key = $this->uri->segment(3);
	// 	$this->db->where('id_laundry',$key);
	// 	$query =$this->db->get('laundry');
	// 	if ($query->num_rows()>0) {
	// 		foreach ($query->result() as $row) {
	// 			$isi['id_laundry']	 =$row->id_laundry;
	// 			$isi['nama_konsumen'] =$row->nama_konsumen;
	// 			$isi['status']	 =$row->status;
	// 			$isi['jrsn']	 =$row->harga;
	// 			$isi['brt'] =$row->berat;
	// 			$isi['t']	 =$row->total;
	// 			$isi['by'] =$row->bayar;
	// 			$isi['k']	 =$row->kembalian;
	// 			$isi['tgl_masuk'] =$row->tgl_masuk;
	// 			$isi['tgl_keluar'] =$row->tgl_keluar;
	// 			$isi['paket_id_paket'] =$row->paket_id_paket;
			
	// 		}
	// 	}
	// 	else
	// 	{
	// 			$isi['id_laundry']	 ='';
	// 			$isi['nama_konsumen'] ='';
	// 			$isi['status']	 ='';
	// 			$isi['jrsn']	 ='';
	// 			$isi['brt'] ='';
	// 			$isi['t']	 ='';
	// 			$isi['by'] ='';
	// 			$isi['k']	 ='';
	// 			$isi['tgl_masuk'] ='';
	// 			$isi['tgl_keluar'] ='';
	// 			$isi['paket_id_paket'] ='';

	// 	}
	// 	$this->load->view('layouts/main_layout',$isi);
	// }

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
		
		$this->load->model('DSEUSEUH_Model');
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['viewnya'] = 'layouts/dashboard_layout';
		$isi['sidenav'] = 'auth/dashboard/laundryKeluar';
		$isi['data'] 		 = $this->DSEUSEUH_Model->keluar();
		$this->load->view('layouts/main_layout',$isi);

			
	}
}
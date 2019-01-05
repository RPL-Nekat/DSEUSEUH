<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DSEUSEUH_Model');
	}

	public function index()
	{
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/laporan';
		$isi['data'] = $this->Model_admin->keluar();
		$this->load->view('admin/tampilan_admin',$isi);
	}

	public function laporan() {
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/laporan';
		$isi['data'] 	 = $this->DSEUSEUH_Model->getinsertlaundry();
		$this->load->view('admin/tampilan_admin',$isi);
	}

	function page_laporan() {
		$this->load->library('PDF');
		$data['data']=$this->DSEUSEUH_ModeL->getinsertlaundry();
		$this->load->view('Laporan/page_laporan', $data);
	}

	// public function cetak($id) {
	// 	$this->load->library('PDF');
	// 	$data['data']=$this->Model_admin->cetak();
	// 	$this->db->get_where('laundry',['id_laundry'=>$id])->row();
	// 	$key = $this->uri->segment(3);
	// 	$this->db->where('id_laundry',$key);
	// 	$query =$this->db->get('laundry');
	// 	$this->load->view('Laporan/cetak', $data);
	// }
	public function cetakstruk()
	{
		$this->load->library('PDF');
		$this->load->model('DSEUSEUH_Model');
		$isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'auth/dashboard/laundry/laundryMasuk';
		$isi['data'] 	 = $this->DSEUSEUH_Model->masuk();
		$this->db->get_where('laundry',['id_laundry'])->row();
		$key = $this->uri->segment(4);
		$this->db->where('id_laundry',$key);
		$this->load->view('Laporan/cetak',$isi);

			
	}

	public function cetaklaundry()
	{
		
		$this->load->library('PDF');
		$key = $this->uri->segment(3);
		$this->db->where('id_laundry',$key);
		$data =$this->db->get('laundry');
		if ($data->num_rows()>0) {
			foreach ($data->result() as $row) {
				$isi['id_laundry']	 =$row->id_laundry;
				$isi['nama_konsumen'] =$row->nama_konsumen;
				$isi['berat'] =$row->berat;
				$isi['status']	 =$row->status;
				$isi['bayar'] =$row->bayar;
				$isi['tgl_masuk'] =$row->tgl_masuk;
				$isi['tgl_keluar'] =$row->tgl_keluar;
				$isi['paket_id_paket'] =$row->paket_id_paket;
			
			}
		}
		else
		{
				$isi['id_laundry']	='';
				$isi['nama_konsumen']='';
				$isi['berat']='';
				$isi['status']	='';
				$isi['bayar']='';
				$isi['tgl_masuk']='';
				$isi['tgl_keluar']='';
				$isi['paket_id_paket']='';

		}
		$this->load->view('Laporan/cetak',$isi);
	}
}
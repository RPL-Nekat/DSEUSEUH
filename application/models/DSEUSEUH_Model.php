<?php 
defined('BASEPATH') OR exit('No direct script allowed');

/**
* 
*/
class DSEUSEUH_Model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function create($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	public function read($table, $where="")
	{
		if ($table=='user') {
			$this->db->select('*')->from('user');
			if (!empty($where)) {
				$this->db->where($where);
			}
			$query = $this->db->get();
			return $query;
		}
		elseif ($table=='feedback') {
			$this->db->select('*')->from('feedback')->order_by('created_at', 'DESC');
			if (!empty($where)) {
				$this->db->where($where);				
			}
			$query = $this->db->get();
			return $query;
		}
		elseif ($table=='manual') {
			$this->db->select('*')->from('manual');
			if (!empty($where)) {
				$this->db->where($where);
			}
			$query = $this->db->get();
			return $query;
		}

		elseif ($table=='web_info') {
			$this->db->select('*')->from('web_info');
			if (!empty($where)) {
				$this->db->where($where);
			}
			$query = $this->db->get();
			return $query;
		}

		else {
			if (!empty($where)) {
				return $this->db->get_where($table, $where);
			} else {
				return $this->db->get($table);
			}
		}
	}

	public function delete($table, $where)
	{
		$del = $this->db->delete($table, $where);
		if ($del) {
			return true;
		} else {
			return false;
		}		
	}

	public function update($where, $data, $table)
	{
		$this->db->where($where);
		return $this->db->update($table, $data);		
	}

	public function search($table, $data)
	{
		$this->db->like($data);
		return $this->db->get($table);
	}

	public function upload_image($table, $image, $where)
	{
		if ($table=="user") {
			$data = array('avatar' => $image);
			$this->db->where($where);
			return $this->db->update('user', $data);
		}
	}

	//paket
	public function AllDatapaket()
	{
		return $this->db->get('paket');
	}

	public function datapaket($key)
	{
		$this->db->where('id_paket',$key);
		$hasil = $this->db->get('paket');
		return $hasil;
	}
	
	public function updatepaket($key,$data)
	{
		$this->db->where('id_paket',$key);
		$this->db->update('paket', $data);
	}	

	public function insertpaket($data)
	{
		$this->db->insert('paket',$data);
	}	

	public function deletepaket($key)
	{
		$this->db->where('id_paket',$key);
		$this->db->delete('paket');
	}
	public function buat_kode(){
		$this->db->select('RIGHT(laundry.id_laundry,4) as kode ', FALSE);
		$this->db->order_by('id_laundry','DESC');
		$this->db->limit(1);

		$query=$this->db->get('laundry');

		if ($query->num_rows()<>0) {
			# code...
			$data=$query->row();
			$kode=intval($data->kode)+1;
		}else{
			$kode=1;
		}
		$kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
		$kode_jadi="LDS-123-".$kode_max;
		return $kode_jadi;
	}


	
	function get_no_invoice()
		{
			# code...
			$this->db->select('RIGHT(laundry.id_laundry,4) as kode ' , FALSE);
			$this->db->order_by('id_laundry','DESC');
			$this->db->limit(1);

			$query = $this->db->get('laundry');
			if ($query->num_rows()<>0) {
				# code...
				$data = $query->row();
				$kode = intval($data->kode)+1;
			}else{
				$kode=1;
			}
			$kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
			$kode_jadi = "LDS-123-".$kode_max;
			return $kode_jadi;
		}

		function get_no_user()
		{
			# code...
			$this->db->select('RIGHT(user.id_user,4) as kode ' , FALSE);
			$this->db->order_by('id_user','DESC');
			$this->db->limit(1);

			$query = $this->db->get('user');
			if ($query->num_rows()<>0) {
				# code...
				$data = $query->row();
				$kode = intval($data->kode)+1;
			}else{
				$kode=1;
			}
			$kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
			$kode_jadi = "LDS-USER-".$kode_max;
			return $kode_jadi;
		}

		function get_no_customer()
		{
			# code...
			$this->db->select('RIGHT(user.id_user,4) as kode ' , FALSE);
			$this->db->order_by('id_user','DESC');
			$this->db->limit(1);

			$query = $this->db->get('user');
			if ($query->num_rows()<>0) {
				# code...
				$data = $query->row();
				$kode = intval($data->kode)+1;
			}else{
				$kode=1;
			}
			$kode_max=str_pad($kode,4,"0",STR_PAD_LEFT);
			$kode_jadi = "LDS-CST-".$kode_max;
			return $kode_jadi;
		}

	//member
		public function getdata($key)
	{
		$this->db->where('id_user',$key);
		$hasil = $this->db->get('user');
		return $hasil;
	}
	public function getupdate($key,$data)
	{
		$this->db->where('id_user',$key);
		$this->db->update('user', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('user',$data);
	}	
	public function getdelete($key)
	{
		$this->db->where('id_user',$key);
		$this->db->delete('user');
	}	
	public function getKodeAdmin()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(id_user,3)) as kd_max from user");
		$kd = "";
		if ($q->num_rows()>0) {
			# code...
			foreach ($q->result() as $k) {
				# code...
				$tmp = ((int)$k->kd_max)+1;
				$kd  = sprintf("%03s",$tmp);
			}
		}
		else
		{
			$kd= "001";
		}
		return "0-".$kd;
	}

	//laundry
	public function getdatalaundry($key)
	{
		$this->db->where('id_laundry',$key);
		$hasil = $this->db->get('laundry');
		return $hasil;
	}
	public function getupdatelaundry($key,$data)
	{
		$this->db->where('id_laundry',$key);
		$this->db->update('laundry', $data);
	}	
		public function getinsertlaundry($data)
	{
		$this->db->insert('laundry',$data);
	}	
	public function getdeletelaundry($key)
	{
		$this->db->where('id_laundry',$key);
		$this->db->delete('laundry');
	}
		public function masuk()
	{
		$data = " SELECT
		laundry.id_laundry,
		laundry.nama_konsumen,
		laundry.harga,
		laundry.berat,
		laundry.`status`,
		laundry.tgl_masuk,
		laundry.bayar,
		laundry.total,
		laundry.kembalian,
		paket.nama_paket
		FROM
		laundry
		INNER JOIN paket ON laundry.paket_id_paket = paket.id_paket WHERE `status` = 'masuk'


		";
		
		return $this->db->query($data);
	}
}
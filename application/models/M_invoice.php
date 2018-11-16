<?php 

	/**
	* 
	*/
	class M_invoice extends CI_Model
	{
		
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
	}
 ?>
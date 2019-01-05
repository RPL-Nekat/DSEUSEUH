<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaporanMasukModel extends CI_Model {
	public function view_by_date($date){
        $this->db->where('DATE(tgl_masuk)', $date); // Tambahkan where tanggal nya
        
		return $this->db->get('laundry')->result();// Tampilkan data laundry sesuai tanggal yang diinput oleh user pada filter
	}
    
	public function view_by_month($month, $year){
        $this->db->where('MONTH(tgl_masuk)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_masuk)', $year); // Tambahkan where tahun
        
		return $this->db->get('laundry')->result(); // Tampilkan data laundry sesuai bulan dan tahun yang diinput oleh user pada filter
	}
    
	public function view_by_year($year){
        $this->db->where('YEAR(tgl_masuk)', $year); // Tambahkan where tahun
        
		return $this->db->get('laundry')->result(); // Tampilkan data laundry sesuai tahun yang diinput oleh user pada filter
	}
    
	public function view_all(){
		return $this->db->get('laundry')->result(); // Tampilkan semua data laundry
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_masuk) AS tahun'); // Ambil Tahun dari field tgl_masuk
        $this->db->from('laundry'); // select ke tabel laundry
        $this->db->order_by('YEAR(tgl_masuk)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_masuk)'); // Group berdasarkan tahun pada field tgl_masuk
        
        return $this->db->get()->result(); // Ambil data pada tabel laundry sesuai kondisi diatas
    }
}

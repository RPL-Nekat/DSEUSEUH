<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Dashboard extends CI_Controller
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

	public function index()
	{	
		$data['title'] = "D'SEUSEUH Dashboard";
		$data['viewnya'] = 'layouts/dashboard_layout';
		$data['sidenav'] = 'auth/dashboard/dashboard';
		$data['jml_pesan'] = $this->DSEUSEUH_Model->read('feedback')->num_rows();
		$data['jml_manual'] = $this->DSEUSEUH_Model->read('manual')->num_rows();
		$data['jml_user'] = $this->DSEUSEUH_Model->read('user')->num_rows();
		$data['jml_laundry'] = $this->DSEUSEUH_Model->read('laundry')->num_rows();
		$data['web_info'] = $this->DSEUSEUH_Model->read('web_info')->result();		
		foreach ($data['web_info'] as $key => $web_info) {
			$data['nama'] = $web_info->nama;
			$data['deskripsi'] = $web_info->deskripsi;
			$data['kontak'] = $web_info->kontak;
			$data['alamat'] = $web_info->alamat;
			$data['tentang_kami'] = $web_info->tentang_kami;
		}
		$this->load->view('layouts/main_layout', $data);
	}

	public function testimoni()
	{		
		$feedbacks = $this->DSEUSEUH_Model->read('feedback');
		$data = array(
			'title' => 'Testimoni',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/feedback',
			'feedbacks' => $feedbacks->result()
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function laundry_masuk()
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

	public function laundry_keluar()
	{		
		$lndry = $this->DSEUSEUH_Model->read('laundry');
		$data = array(
			'title' => 'Laundry Masuk',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/laundry/laundryKeluar',
			'lndry' => $lndry->result()
			
		);
		$this->load->view('layouts/main_layout', $data);
	}

	public function laporan()
	{
		$this->load->model('LaporanMasukModel');
		if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Semua Cucian Pada Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'Laporan_masuk/cetak?filter=1&tanggal='.$tgl;
                $transaksi = $this->LaporanMasukModel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di LaporanMasukModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Semua Cucian Pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'Laporan_masuk/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->LaporanMasukModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di LaporanMasukModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Semua Cucian Pada Tahun '.$tahun;
                $url_cetak = 'Laporan_masuk/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->LaporanMasukModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di LaporanMasukModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Cucian';
            $url_cetak = 'Laporan_masuk/cetak';
            $transaksi = $this->LaporanMasukModel->view_all(); // Panggil fungsi view_all yang ada di LaporanMasukModel
        }

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/'.$url_cetak);
        $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->LaporanMasukModel->option_tahun();
        $data['title'] = 'Laporan';
        $data['viewnya'] = 'layouts/dashboard_layout';
        $data['sidenav'] = 'laporan_periode/laporan_masuk';
        $this->load->view('layouts/main_layout', $data);
	}

	public function user_manual()
	{
		$manuals = $this->DSEUSEUH_Model->read('manual');
		$data = array(
			'title' => 'Paket Laundry | Tambah',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/webContent/changeManual',
			'manuals' => $manuals->result()
		);
		$this->load->view('layouts/main_layout', $data);		
	}

	public function member()
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

	public function paket()
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

	public function profil_web()
	{		
		$manuals = $this->DSEUSEUH_Model->read('manual');
		$data = array(
			'title' => 'Paket Laundry | Informasi Web',
			'viewnya' => 'layouts/dashboard_layout',
			'sidenav' => 'auth/dashboard/webContent/changeInfo',
			'manuals' => $manuals->result()
		);
		$this->load->view('layouts/main_layout', $data);
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan_masuk extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('LaporanMasukModel');
    }

    public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Cucian Masuk Pada Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->LaporanMasukModel->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di LaporanMasukModel
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Cucian Masuk Pada Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->LaporanMasukModel->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di LaporanMasukModel
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Cucian Masuk Pada Tahun '.$tahun;
                $transaksi = $this->LaporanMasukModel->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di LaporanMasukModel
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Cucian Masuk';
            $transaksi = $this->LaporanMasukModel->view_all(); // Panggil fungsi view_all yang ada di LaporanMasukModel
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        $data['ket'] = $ket;

        ob_start();
        $this->load->view('Laporan/cetak_periode', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Transaksi.pdf', 'D');
    }
}

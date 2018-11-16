<?php 
      

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'A5', true, 'UTF-8', false);
$tanggal = date ('d/m/Y'); 
 

//$row = $data->result();
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Kelompok 5');
$pdf->SetTitle('Struk');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);


// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING,'C');
//$pdf->SetHeaderData(250,7,'D SEUSEUH LAUNDRY',0,5);
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
      require_once(dirname(__FILE__).'/lang/eng.php');
      $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font

// $pdf->SetFont('dejavusans', '', 12, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();
//      $pdf->SetFont('dejavusans', '', 12, '', true);
        $pdf->Cell(120,7,'D SEUSEUH LAUNDRY',0,1,'C');
        $pdf->Cell(120,7,'JL.Terusan Kopo No.252, Katapang',0,1,'C');
        $pdf->Cell(120,7,'nmail@example.com',0,1,'C');
        $style=array('width' => 0.2, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0);
        $pdf->Line(15,40,130,40,$style);

        // Memberikan space kebawah agar tidak terlalu rapat
        //$pdf->Cell(10,7,'',0,1);
        
        
        $pdf->Ln();
        $pdf->Cell(120,7,$tanggal,0,1,'R');
        $pdf->SetFont('dejavusans', '', 10, '', true);
    //$pdf->Cell(130,7,$tanggal,0,1,'R');

    $pdf->Cell(110,7,'BUKTI PEMBAYARAN',0,1,'C');
    $pdf->Ln();
     
      
	$html = '';
	//$no=0;
      foreach ($data->result() as $row) {

	$html ='
      <p>Kode Transaksi   :'.$row->id_laundry.'</p>
      <p>Customer       :'.$row->nama_konsumen.'</p>

      <br>
      <br>
	<table cellspacing="0" cellpadding="1">
			<tr>
                  
	            <th width="30%">Paket</th>
              <th>Harga</th>
              <th width="20%">Berat(kg)</th>
              <th width="30%">Tanggal Masuk</th>
                  
                </tr>

           <tr>
            	<td>'.$row->nama_paket.'</td>
              <td>'.$row->harga.'</td>
            	<td>'.$row->berat.'</td>
            	<td>'.$row->tgl_masuk.'</td>
            	
                  
            	</tr>';
              //$pdf->Line();
            }


            
            // $pdf->Cell(130, 10, '-------------------------------------------------------------------------------------------', 0, 0, 'L');
            
            $html.='</table>';
            $pdf->writeHTML($html1);
            $pdf->Cell(120, 0, '-------------------------------------------------------------------------------------------', 0, 0, 'L');
            $pdf->writeHTML($html2);
          // $pdf->Cell(0, 0, 1, 1, 'L', 1, 0);
           //$pdf->Ln();
            $pdf->Cell(90, 0, '-------------------------------------------------------------------------------------------', 0, 0, 'L');
            
            $pdf->Cell(105, 5, 'Total Bayar', 0, 0, 'R');
            $pdf->Cell(25, 5, str_replace(',', '.', number_format($row->total)), 0, 0, 'L');
            $pdf->Ln();

            $pdf->Cell(105, 5, 'Tunai', 0, 0, 'R');
            $pdf->Cell(25, 5, str_replace(',', '.', number_format($row->bayar)), 0, 0, 'L');
            $pdf->Ln();

            $pdf->Cell(105, 5, 'Kembalian', 0, 0, 'R');
            $pdf->Cell(25, 5, str_replace(',', '.', number_format($row->kembalian) ), 0, 0, 'L');
            $pdf->Ln();
            $pdf->Cell(130, 5, '-------------------------------------------------------------------------------------------', 0, 0, 'L');
            $pdf->Ln();
            $pdf->Ln();
            $pdf->Cell(110, 5, "TERIMA KASIH", 0, 0, 'C');
            $pdf->Ln();
            $pdf->Cell(110, 5, "TELAH MENGGUNAKAN JASA LAUNDRY KAMI", 0, 0, 'C');
            $pdf->Ln();
            $pdf->SetFont('dejavusans', 'I', 10, '', true);
            $pdf->Cell(110, 5, "Harap Bawa Bukti Pembayaran ini", 0, 0, 'C');

           

            $pdf->Output('Laporann.pdf', 'I');
?>

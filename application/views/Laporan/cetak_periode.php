 
<html>
<head>
    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse:collapse;
            table-layout:fixed;width: 600px;
            table-layout:fixed;height: 200px;
            margin-left: 50px;
            margin-top: 30px;
        }
        table td {
            word-wrap:break-word;
            margin-top: 10px;
            margin-left: 10px;
            height: 20px;
            width: 60px;
            font-size: 14px; 
        }
        table th {
            word-wrap:break-word;
            margin-top: 10px;
            margin-left: 10px;
            height: 20px;
            
            font-size: 14px; 
        }

        h3{
            text-align: center;
            margin-top: 30px;
            padding-top: 30px;
            margin-bottom: 5px;
        }
        p{
            text-align: center;
            margin-top: 5px;
            width: 20px;
            
            margin-bottom: 5px;
        }
        b{
            
            margin-top: 40px;
            margin-left: 300px;
        }

    </style>
</head>
<body>
    <h3>D'SEUSEUH LAUNDRY</h3>
    <p>JL.Terusan Kopo No.252, Katapang</p>
    <p>nmail@example.com </p>
    <br>
    <hr>
    <b><?php echo $ket; ?></b><br /><br />
    
    <table border="1" cellpadding="10" cellspacing="5">
    <tr>
        <th width="7px">Id Laundry</th>
        <th>Nama Konsumen</th>
        <th width="10px">Berat</th>
        <th>Status</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Bayar</th>
        <th>Kembalian</th>
        <th width="2px">Tanggal Masuk</th>
       <!--  <th>Tanggal Keluar</th> -->
    </tr>

 <?php
    if( ! empty($transaksi)){
    	$no = 1;
    	foreach($transaksi as $data){
            $tgl_masuk = date('d-m-Y', strtotime($data->tgl_masuk));      
    		echo "<tr>";
    		echo "<td>".$data->id_laundry."</td>";
    		echo "<td>".$data->nama_konsumen."</td>";
    		echo "<td>".$data->berat."</td>";
    		echo "<td>".$data->status."</td>";
            echo "<td>".$data->harga."</td>";
            echo "<td>".$data->total."</td>";
            echo "<td>".$data->bayar."</td>";
            echo "<td>".$data->kembalian."</td>";
            echo "<td>".$tgl_masuk."</td>";
            // echo "<td>".$data->tgl_keluar."</td>";

    		echo "</tr>";
    		$no++;
    	}
    }
    ?>
    </table>
</body>
</html>
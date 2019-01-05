<div class="row">
    <div class="col offset-s1 s10">
        <h2 class="header">Data Transaksi</h2><hr>

        <form method="get" action="">
            <div class="row">
                <div class="input-field col s3">
                    <select name="filter" id="filter">
                        <option value="">Pilih</option>
                        <option value="1">Per Tanggal</option>
                        <option value="2">Per Bulan</option>
                        <option value="3">Per Tahun</option>
                    </select>
                    <label>Filter Berdasarkan</label>
                </div>
                <div class="input-field col s6" id="form-tanggal">
                    <input type="text" name="tanggal" class="datepicker" placeholder="Berdasarkan Tanggal">
                </div>
                <div class="input-field col s3" id="form-bulan">
                    <select name="bulan">
                        <option value="">Berdasarkan Bulan</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="input-field col s3" id="form-tahun">
                    <select name="tahun">
                        <option value="">Berdasarkan Tahun</option>
                        <?php foreach($option_tahun as $data) : ?>
                            <option value="<?= $data->tahun; ?>"><?= $data->tahun; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col s4">
                    <button type="submit" class="btn waves-effect waves-light">Tampilkan</button>
                    <button class="btn waves-effect waves-light pink" onclick="history.go(-1);">Reset Filter</button>
                </div>
            </div>

        </form>

        <hr>
        <div class="row">
            <div class="col s12">
                <p><b><?= $ket; ?> </b></p>
                <a href="<?= $url_cetak; ?>" class="btn waves-effect waves-light btn-large valign-wrapper"><i class="material-icons">print</i></a>
            </div>
        </div>

         <table class="table">
            <thead>
                <tr>
                    <th>Id Laundry</th>
                    <th>Nama Konsumen</th>
                    <th>Berat</th>
                    <th>Status</th>
                    <th>Bayar</th>
                    <th>Tanggal Masuk</th>
                </tr>
            </thead> 
            <tbody>
                <?php if (count($transaksi) > 0): ?>
                    <?php foreach($transaksi as $data) : $tgl_masuk = date('d-m-Y', strtotime($data->tgl_masuk)); ?>
                    <tr>
                        <td><?= $data->id_laundry; ?></td>
                        <td><?= $data->nama_konsumen; ?></td>
                        <td><?= $data->berat; ?></td>
                        <td><?= $data->status; ?></td>
                        <td><?= $data->bayar; ?></td>
                        <td><?= $tgl_masuk; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="center-align">Tidak ada data</td>
                    </tr>
                <?php endif ?>                
            </tbody>       
        </table>
    </div>
</div>

<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.datepicker').datepicker({
          format:'yyyy-mm-dd'
        });
        $('select').formSelect();        

        $('#form-tanggal, #form-bulan, #form-tahun').hide();

        $('#filter').change(function(){
            if($(this).val() == '1') {
                $('#form-bulan, #form-tahun').hide();
                $('#form-tanggal').show();
            }
            else if($(this).val() == '2') {
                $('#form-tanggal, #form-tahun').hide();
                $('#form-bulan').show();
            } else {
                $('#form-tanggal, #form-bulan').hide();
                $('#form-tahun').show();
            }

            $('#form-tanggal, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        });
    });
</script>
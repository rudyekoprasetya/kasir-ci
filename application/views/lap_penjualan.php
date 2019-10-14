<div class="panel-heading">
	<h3 class="panel-title"><i class="fa fa-table"></i> <?php echo $judul; ?></h3>
</div>

<div class="panel-body">
<!-- untuk form cari -->
  <div class="row">
	<div class="col-lg-5">
		<label>Dari</label>
		<input type="date" name="tgl_awal" id="tgl_awal" class="form-control input-lg">
	</div>
	<div class="col-lg-5">
		<label>Sampai</label>
		<input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control input-lg">
	</div>
	<div class="col-lg-2">
		<label></label>
		<button type="button" class="btn btn-danger btn-lg btn-block" onclick="lihat_laporan()"><i class="fa fa-search"></i> Lihat</button>
	</div>
  </div>
<!-- untuk form cari -->
</div>

<!-- untuk tabel laporan -->
<div class="row">
  	<div class="col-lg-12">
  		<div class="table-responsive">
          <table class="table table-hover table-striped">
          	<thead>
          		<tr>
          			<th>ID Transaksi</th>
          			<th>ID Barang</th>
          			<th>Nama Barang</th>
          			<th>Harga</th>
          			<th>Jumlah</th>			
          			<th>Total</th>			
          			<th>Tanggal</th>		
          		</tr>
          	</thead>
          	<tbody id="tempat_data">
          		<tr>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          			<td>-</td>
          		</tr>
          	</tbody>
          </table>
        </div>
    </div>
    <div id="rekap">
	    <div class="col-lg-4">
	    	<h3>Total Penjualan</h3>
	    </div>
	    <div class="col-lg-4">
	    	<input type="text" name="total_semua" id="total_semua" class="form-control input-lg" readonly="readonly" style="text-align:right;">
	    </div>
	    <div class="col-lg-4">
	    	<button class="btn btn-success btn-lg">
	    		<i class="fa fa-file"></i> Cetak Excel
	    	</button>
	    </div>
    </div>
</div>
<!-- untuk tabel laporan -->

<script type="text/javascript">
	function lihat_laporan() {
		var tgl_awal=$('#tgl_awal').val();
		var tgl_akhir=$('#tgl_akhir').val();
		// console.log(tgl_awal);
		//untuk menyimpan total semua
		var total=0;
		
		//ajax untuk tampil laporan
		$.ajax({
			type: 'POST',
			url: '<?php echo site_url("laporan/ajax_penjualan"); ?>',
			data: 'tgl_awal='+tgl_awal+'&tgl_akhir='+tgl_akhir,
			dataType: 'json',
			success: function(data) {
				console.log(data);

				//kosongkan tabel
				$('#tempat_data').hide();			
				$('#tempat_data').html('');

				//memasukan data ke tabel
				$.each(data, function(i,field){
					$('#tempat_data').
					append($('<tr>').
						append($('<td>').append(field.id_transaksi)).
						append($('<td>').append(field.id_barang)).
						append($('<td>').append(field.nama_barang)).
						append($('<td align="right">').append(field.harga_barang)).
						append($('<td align="center">').append(field.jumlah)).
						append($('<td align="right">').append(field.total)).
						append($('<td>').append(field.tanggal))
					);
					//menjumlahkan total
					total=total+parseInt(field.total);

				});		
				// console.log(total);
				$('#tempat_data').show(1000);
				//tampilkan total semua
				$('#total_semua').val(total);
			}
		});

	}
</script>
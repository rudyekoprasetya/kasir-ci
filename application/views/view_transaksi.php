<div class="panel-heading">
	<h3 class="panel-title"><i class="fa fa-money"></i> <?php echo $judul; ?></h3>
</div>

<div class="panel-body">
  <div class="row">
	<div class="col-lg-12">
	  <label>Kode Barang</label>
<form method="POST" action="<?php echo site_url('transaksi/add_barang'); ?>"> 	
			<div class="form-group input-group">
		        <input type="text" class="form-control" placeholder="kode barang" name="id_barang">
		        <span class="input-group-btn">
		          <button class="btn btn-info" type="button"><i class="fa fa-search"></i></button>
		        </span>
		    </div>

</form>		
	</div>
  	<div class="col-lg-6">  	
	 <label>Nama Barang</label>
	 <!-- menampilkan id barang -->
	 <input type="hidden" id="id_barang"  value="<?php if(isset($id_barang)){echo $id_barang;} ?>">

	 <!-- menampilkan nama barang -->
	 <input type="text" class="form-control"  id="nama_barang" value="<?php if(isset($nama_barang)){echo $nama_barang;} ?>" readonly="readonly">

	 <label>Harga Barang</label>

	 <!-- menampilkan harga barang -->
	 <input type="text" class="form-control" " id="harga_barang" value="<?php if(isset($harga_barang)){echo $harga_barang;} ?>" readonly="readonly">

	 <label>Qty</label>
	 <input type="number" class="form-control"  id="qty" onkeyup="jumlah_beli()">
	 <label>Subtotal</label>
	 <input type="text" class="form-control"  id="subtotal" readonly="readonly">
	 <label></label>
	 <button class="btn btn-info btn-block" id="tambah" onclick="tambah_transaksi()"><i class="fa fa-plus"></i> Tambah</button>
  	</div>
  	<div class="col-lg-6">
		<label>Total</label>

		<input type="text" class="form-control input-lg" name="total_bayar" id="total_bayar" value="<?php if(!empty($this->cart->total())) {echo $this->cart->total();} ?>" readonly>

		<label>Bayar</label>
		<input type="text" class="form-control input-lg" name="bayar" id="bayar" onkeyup="kembali()">
		<label>Kembali</label>
		<input type="text" class="form-control input-lg" name="kembali" id="kembali" readonly="readonly">
  	</div>  
<div class="row">
  	<div class="col-lg-12">
  		<div class="table-responsive">
          <table class="table table-hover table-striped">
          	<thead>
          		<tr>
          			<th>Kode Barang</th>
          			<th>Nama Barang</th>
          			<th>Harga</th>
          			<th>Qty</th>
          			<th>Subtotal</th>
          			<th>Aksi</th>
          		</tr>
          	</thead>
          	<tbody>
<?php
//jika cart sudah diisi
if(!empty($this->cart->contents())) {
	//menampilkan data dalam cart
	foreach ($this->cart->contents() as $items) {
?>
          		<tr>
          			<td><?php echo $items['id']; ?></td>
          			<td><?php echo $items['name']; ?></td>
          			<td><?php echo $items['price']; ?></td>
          			<td><?php echo $items['qty']; ?></td>
          			<td><?php echo $items['subtotal']; ?></td>

					<td><a href="<?php echo site_url('transaksi/del_transaksi/'.$items['rowid']); ?>" class="btn btn-danger" onclick="return confirm('Yakin nih?');"><i class="fa fa-times"></i></a></td>

          		</tr>
<?php 
	} 
} 
?>
          	</tbody>
          </table>
        </div>
  	</div>
  	<div class="col-lg-6"></div>
  	<div class="col-lg-6">
  		<a href="<?php echo site_url('transaksi/transaksi_baru'); ?>" class="btn btn-warning btn-lg" onclick="return confirm('Mau Transaksi Baru ?');"><i class="fa fa-file"></i> Transaksi Baru</a>
  		<a href="<?php echo site_url('transaksi/cetak'); ?>" class="btn btn-success btn-lg"><i class="fa fa-print"></i> Cetak Transaksi</a>
  	</div>
</div>
  </div>
</div>
</div>

<script type="text/javascript">
//memunculkan subtotal
function jumlah_beli() {
	//ambil data dari id form
	var harga_barang=$('#harga_barang').val();
	var qty=$('#qty').val();
	//menampilkan subtotal
	$('#subtotal').val(harga_barang*qty);
}

//fungsi untuk tambah transaksi
function tambah_transaksi() {
	//ambil data dari form
	var id_barang=$('#id_barang').val();
	var nama_barang=$('#nama_barang').val();
	var harga_barang=$('#harga_barang').val();
	var qty=$('#qty').val();
	//dikirim dengan ajax ke controller
	$.ajax({
		type: "POST",
		url: "<?php echo site_url('transaksi/add_transaksi'); ?>",
		data: "id_barang="+id_barang+"&nama_barang="+nama_barang+"&harga_barang="+harga_barang+"&qty="+qty,
		success: function(data) {
			console.log(data);
			//untuk meload ulang halaman transaksi
			document.location.href="<?php echo site_url('transaksi'); ?>";
		}
	});
}

function kembali(){
	var total_bayar=$('#total_bayar').val();
	var bayar=$('#bayar').val();
	$('#kembali').val(bayar-total_bayar);
}

</script>
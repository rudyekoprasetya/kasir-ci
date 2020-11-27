<!DOCTYPE html>
<html>
<head>
	<title>Cetak</title>
</head>
<body onload="window.print();" onmouseover="kembali();">
	<center>
		<h2>Toko Shop</h2>
		<p>Jl. Kuburan Gang Mayit Nomor 01 Kediri</p>
	</center>
	<hr>
	<br>
<p><b>ID Transaksi <?php echo $id_transaksi; ?></b></p>
	<table border="1" align="center" width="80%" style="border-radius: 9px">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>Qty</th>
			<th>Subtotal</th>
		</tr>
<?php 
$total_semua=0;
foreach ($transaksi->result_array() as $row) { 
$total_semua=$total_semua+$row['total'];
?>
		<tr>
			<td><?php echo $row['id_barang']; ?></td>
			<td><?php echo $row['nama_barang']; ?></td>
			<td><?php echo $row['jumlah']; ?></td>
			<td align="right"><?php echo number_format($row['total'],0); ?></td>
		</tr>
<?php } ?>
		<tr>
			<td>Total</td>
			<td></td>
			<td></td>
			<td align="right"><?php echo number_format($total_semua,0); ?></td>
		</tr>
		<tr>
			<td>Bayar</td>
			<td></td>
			<td></td>
			<td align="right"><?php echo number_format($bayar,0); ?></td>
		</tr>
		<tr>
			<td>Total</td>
			<td></td>
			<td></td>
			<td align="right"><?php echo number_format($kembali,0); ?></td>
		</tr>
	</table>
<br><br>
<center>
	<h2>.:TERIMA KASIH SELAMAT BELANJA KEMBALI:.</h2>
</center>
</body>
</html>

<script type="text/javascript">
	function kembali() {
		document.location.href="<?php echo site_url('transaksi'); ?>";
	}
</script>
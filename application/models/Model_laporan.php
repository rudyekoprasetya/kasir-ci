<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_laporan extends CI_Model {

	public function __construct() {
			 parent:: __construct();
	}	


	//laporan penjualan dalam periode tertentu
	public function lap_penjualan($tgl_awal,$tgl_akhir) {
		$query="SELECT penjualan.id_transaksi, penjualan.id_barang,barang.nama_barang, penjualan.jumlah, barang.harga_barang, penjualan.total, penjualan.tanggal FROM barang, penjualan WHERE barang.id_barang=penjualan.id_barang AND DATE_FORMAT(penjualan.tanggal,'%Y-%m-%d')>='$tgl_awal' AND DATE_FORMAT(penjualan.tanggal,'%Y-%m-%d')<='$tgl_akhir'";
		$data=$this->db->query($query);
		return $data;
	}

	//laporan pembelian dalam periode tertentu
	public function lap_pembelian($tgl_awal,$tgl_akhir) {
		$query="SELECT pembelian.id_beli, pembelian.id_barang,barang.nama_barang, pembelian.jumlah, barang.harga_barang, pembelian.total, pembelian.tanggal FROM barang, pembelian WHERE barang.id_barang=pembelian.id_barang AND DATE_FORMAT(pembelian.tanggal,'%Y-%m-%d')>='$tgl_awal' AND DATE_FORMAT(pembelian.tanggal,'%Y-%m-%d')<='$tgl_akhir'";
		$data=$this->db->query($query);
		return $data;
	}
}
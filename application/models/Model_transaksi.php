<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_transaksi extends CI_Model {

	public function __construct() {
			 parent:: __construct();
		}	

	public function getByID($id_transaksi) {
		// $data=$this->db->where('id_transaksi',$id_transaksi);
		// $data=$this->db->get('penjualan');
		$query="SELECT penjualan.id_transaksi, penjualan.id_barang, barang.nama_barang, penjualan.jumlah, penjualan.total, penjualan.tanggal FROM barang, penjualan WHERE penjualan.id_barang=barang.id_barang AND penjualan.id_transaksi='$id_transaksi'";
		$data=$this->db->query($query);
		return $data;
	}

	public function simpan($id_transaksi,$id_barang,$jumlah,$total,$tanggal) {
		$data=array(
			'id_transaksi' => $id_transaksi,
			'id_barang' => $id_barang,
			'jumlah' => $jumlah,
			'total' => $total,
			'tanggal' => $tanggal
		);
		$simpan=$this->db->insert('penjualan',$data);
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//load model barang
		$this->load->model('Model_barang');
		$this->load->model('Model_transaksi');
		//load library cart
		$this->load->library('cart');
	}

	public function index() {
		$data['judul']="Transaksi Penjualan";
		$this->template->display('view_transaksi',$data);
	}

	public function add_barang() {
		//ambil data dari form
		$id_barang=$this->input->post('id_barang',true);
		//mencari barang berdasarkan ID
		$barang=$this->Model_barang->getByID($id_barang);
		//ambil hasil query
		$hasil=$barang->row();

		if(!empty($hasil)) {
		//ambil data id, nama dan harga saja
			$data['id_barang']=$hasil->id_barang;
			$data['nama_barang']=$hasil->nama_barang;
			$data['harga_barang']=$hasil->harga_barang;
		}

		$data['judul']="Transaksi Penjualan";
		//memasukan data kedalam view
		$this->template->display('view_transaksi',$data);
	}

	public function add_transaksi() {
		//memasukan data dari form transaksi
		$id_barang=$this->input->post('id_barang',true);
		$nama_barang=$this->input->post('nama_barang',true);
		$harga_barang=$this->input->post('harga_barang',true);
		$qty=$this->input->post('qty',true);
		//memasukan data ke dalam cart
		$data=array(
			'id' => $id_barang,
			'name' => $nama_barang,
			'price' => $harga_barang,
			'qty' => $qty
		);
		$tambah=$this->cart->insert($data);

		echo "berhasil";
	}

	//untuk hapus barang di cart
	public function del_transaksi() {
		$rowid=$this->uri->segment(3);
		$data=array(
			'rowid'=>$rowid,
			'qty'=>0
		);
		$update=$this->cart->update($data);
		redirect('transaksi');
	}
	//untuk transaksi baru
	public function transaksi_baru() {
		$this->cart->destroy();
		redirect('transaksi');
	}

	//untuk cetak dan simpan transaksi
	public function cetak() {

		//membuat kode transaksi dengan fomat yyyymmddhhiiss (Tahun Bulan Tanggal Jam Menit Detik)
		$waktu=date('Ymdhis');
		$id_transaksi="Shop-".$waktu;
		$tanggal_transaksi=date('Y-m-d H:i:s');

		//menyimpan transaksi kedalam database
		foreach ($this->cart->contents() as $items) {
			$simpan=$this->Model_transaksi->simpan($id_transaksi,$items['id'],$items['qty'],$items['subtotal'],$tanggal_transaksi);
		}

		//hapus data dari cart
		$this->cart->destroy();

		//ambil data transaksi yang sudah tersimpan
		$data['transaksi']=$this->Model_transaksi->getByID($id_transaksi);
		
		//untuk bayar dan kembali
		$data['bayar']=$this->uri->segment(3);
		$data['kembali']=$this->uri->segment(4);
		//untuk id transaksi
		$data['id_transaksi']=$id_transaksi;

		//cetak ke printer
		$this->load->view('cetak_transaksi',$data);
		
	}

}
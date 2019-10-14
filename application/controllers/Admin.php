<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}//user harus login
	}

	public function _crud_output($output = null)
	{
		$this->template->display('utama.php',$output);
	}

	public function barang() {
		$crud = new grocery_CRUD();
		//pilih tabel
		$crud->set_table('barang');
		$crud->set_subject('Barang');
		$crud->set_field_upload('gambar_barang','assets/uploads/gmbr_barang');
		//field yang harsu diisi
		$crud->required_fields('id_barang','nama_barang','jumlah');
		$data['judul']='Manajemen Barang';
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function pembelian() {
		$crud=new grocery_CRUD();
		$crud->set_table('pembelian');
		$crud->set_subject('Pembelian');
		$crud->set_relation('id_barang','barang','nama_barang');
		$crud->required_fields('id_beli');
		//disable tombol 
		$crud->unset_read();
		$data['judul']="Manajemen Pembelian";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function penjualan() {
		$crud=new grocery_CRUD();
		$crud->set_table('penjualan');
		$crud->set_relation('id_barang','barang','nama_barang');
		$crud->set_subject('Penjualan');
		//disable tombol
		$crud->unset_add();
		$crud->unset_edit();
		$data['judul']="Manajemen Penjualan";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

	public function admin() {
		$crud=new grocery_CRUD();
		$crud->set_table('admin');
		$crud->set_subject('Admin');
		$crud->required_fields('username','password');
		//merubah input type password
		$crud->change_field_type('password', 'password');
		$crud->columns('username');
		$data['judul']="Manajemen Admin Kasir";
		$data['output']=$crud->render();
		$this->_crud_output($data);
	}

}
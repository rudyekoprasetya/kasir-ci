<?php
class Laporan extends CI_controller {
	
	public function __construct(){
		parent::__construct();
		//load model laporan
		$this->load->model("Model_laporan"); 
	}

	//untuk laporan penjualan
	public function penjualan() {
		$data['judul']="Laporan Penjualan";
		$this->template->display('lap_penjualan',$data);
	}

	//ajax laporan penjualan
	public function ajax_penjualan() {
		$tgl_awal=$this->input->post('tgl_awal',true);
		$tgl_akhir=$this->input->post('tgl_akhir',true);
		$hasil=$this->Model_laporan->lap_penjualan($tgl_awal,$tgl_akhir);
		echo json_encode($hasil->result());
	}

	//untuk laporan pembelian
	public function pembelian() {
		$data['judul']="Laporan Pembelian";
		$this->template->display('lap_pembelian',$data);
	}

	//ajax laporan penjualan
	public function ajax_pembelian() {
		$tgl_awal=$this->input->post('tgl_awal',true);
		$tgl_akhir=$this->input->post('tgl_akhir',true);
		$hasil=$this->Model_laporan->lap_pembelian($tgl_awal,$tgl_akhir);
		echo json_encode($hasil->result());
	}


}
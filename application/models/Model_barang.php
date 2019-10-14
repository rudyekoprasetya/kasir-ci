<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_barang extends CI_Model {

	public function __construct() {
			 parent:: __construct();
		}	

	public function getByID($id_barang) {
		$data=$this->db->where('id_barang',$id_barang);
		$data=$this->db->get('barang');
		return $data;
	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cek_admin extends CI_Model {

	public function __construct() {
			 parent:: __construct();
		}		

	public function cek($user,$pass) { //fungsi Cek user apakah ada dalam tabel admin
		 $this->db->where('username',$user);
		 $this->db->where('password',$pass);
		 $data=$this->db->get('admin');
		 if ($data->num_rows() > 0) {
		 	return TRUE;		
		 	}
		 else {
			return FALSE;	 	
		 	}
		}
}
<?php
class Login extends CI_controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model("cek_admin"); 
		}
	
	public function index() {
		$data['judul']="Login Kasir";
		$this->load->view('view_login',$data);
		}
		
	public function cek() { 
		$username=$this->input->post('username',TRUE);
		$password=$this->input->post('password',TRUE);
		
		$cek=$this->cek_admin->cek($username,$password);
			if($cek==TRUE) {
			$data=array('username'=>$username,'logged_in'=>TRUE );
			$this->session->set_userdata($data);
			// var_dump($this->session->userdata());
			redirect('admin/barang');
				// echo "bisa";
			} else {			
			redirect('login','refresh');	
				// echo "tidak";
			}	
		
	}
		
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}
?>
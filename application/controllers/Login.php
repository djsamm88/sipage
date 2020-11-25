<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->helper('custom_func');
		date_default_timezone_set("Asia/jakarta");
	}

	public function index() {
		$data['title']="Login";
		$this->load->helper('url');
		$this->load->helper(array('form'));
		$this->load->view('template/login.php',$data);
	}

	public function cek_login() {
		
		$nip 	= $this->input->post('nip', TRUE);
		$password 	= md5($this->input->post('password', TRUE));
		
		
		/*
		if(strlen($nip)<8 || strlen($password)<6)
		{
			
			die('0');
		}
		*/
		
		
		
		
		$hasil = $this->db->query("SELECT * FROM tbl_admin WHERE nip='$nip' AND password='$password'");
		
		//die("SELECT * FROM tbl_admin WHERE nip='$nip' AND password='$password'");
		
		if ($hasil->num_rows() == 1) 
		{
			foreach ($hasil->result() as $sess) 
			{
				
					
					$sess_data['nip'] = $sess->nip;
					$sess_data['id_admin'] = $sess->id_admin;					
					$sess_data['level']= $sess->level;
					$this->session->set_userdata($sess_data);
					$data['info']= 1;
					
					
					
						//set log aktifitas
						$this->db->query("INSERT INTO tbl_log_admin SET id_admin='$sess->id_admin', referensi='$sess->id_admin',aktivitas='Login'");
								
			}
			
			
		}
		else {
			$data['info']= $hasil->num_rows();
		}
		//$this->load->view('form_login.php',$data);
		echo $data['info'];
		
	}
	
	public function logout() {
		
		//set log aktifitas
		//post_ke_firebase('https://pay-inm.firebaseio.com/tbl_admin_log.json',array("id_admin"=>$sess->id_admin,"nip"=>$sess->nip,"jam"=>date('Y-m-d H:i:s')));
		
		
		$id_admin = $this->session->userdata('id_admin');			
		$this->db->query("INSERT INTO tbl_log_admin SET id_admin='$id_admin', referensi='$id_admin',aktivitas='Logout'");


		
		$this->session->unset_userdata('id_admin');	
		session_destroy();
		redirect('index.php/show');
	}
	
	
	
	
	
	
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->library('grocery_CRUD');
		
		
		if ($this->session->userdata('id_admin')=="") 
		{
			redirect('login');
		}
		
	}

	

	public function index()
	{
		
		if ($this->session->userdata('id_admin')=="") {
			redirect('login');
		}
	
		
		$crud = new grocery_CRUD();

		
		$crud->set_table('tbl_log_admin');
		
		//$crud->set_field_upload('url_gambar','assets/uploads');
		//$crud->set_relation('id_admin','tbl_admin','username');
		//$crud->set_relation('referensi','tbl_admin','username');
		
		$crud->order_by('tgl','desc');

		$output = $crud->render();

		$this->load->view('template/part/log_admin.php',$output);
		
		
	}
	

}
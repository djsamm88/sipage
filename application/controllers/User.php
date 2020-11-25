<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_user');
		$this->load->helper('custom_func');
		
		if ($this->session->userdata('id_admin')=="") 
		{
			redirect('login');
		}
		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
	}
	
	public function index()
	{		
		$this->load->view('template/part/v_user');
	}
	
	public function ajax_list()
	{
		$list = $this->m_user->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_user) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $m_user->id_user;
			$row[] = $m_user->username;
			$row[] = $m_user->nama;
			$row[] = $m_user->saldo;
			$row[] = $m_user->email;
			$row[] = $m_user->reg_by;
			$row[] = $m_user->firebase_uid;
			$row[] = $m_user->tgl_update;
			

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_user->count_all(),
						"recordsFiltered" => $this->m_user->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
}

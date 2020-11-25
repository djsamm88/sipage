<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_admin_ss extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_log_admin_ss');
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
		$this->load->view('template/part/v_log_admin_ss');
	}
	
	public function ajax_list()
	{
		$list = $this->m_log_admin_ss->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_log_admin_ss) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $m_log_admin_ss->id_log;
			$row[] = $m_log_admin_ss->id_admin;
			$row[] = $m_log_admin_ss->tgl;
			$row[] = $m_log_admin_ss->referensi;
			$row[] = $m_log_admin_ss->aktivitas;
			

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_log_admin_ss->count_all(),
						"recordsFiltered" => $this->m_log_admin_ss->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_order extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_history_order');
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
		$this->load->view('template/part/v_history_order');
	}
	
	public function ajax_list()
	{
		$list = $this->m_history_order->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $m_history_order) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $m_history_order->id_antrian;
			$row[] = $m_history_order->id_user;
			$row[] = $m_history_order->username;
			$row[] = $m_history_order->no_pelanggan;			
			$row[] = $m_history_order->nama_pelanggan;
			$row[] = $m_history_order->periode;
			$row[] = $m_history_order->biaya_adm;
			$row[] = $m_history_order->tagihan;
			$row[] = $m_history_order->total_tagihan;
			$row[] = $m_history_order->tgl_mulai;
			$row[] = $m_history_order->tgl_proses;
			$row[] = $m_history_order->status_order;
			$row[] = $m_history_order->trx_from;
			$row[] = $m_history_order->nama_produk;
			$row[] = $m_history_order->kategori;
			$row[] = $m_history_order->keterangan.' '.$m_history_order->aliastanpakode.;
			$row[] = $m_history_order->referensi;
			

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_history_order->count_all(),
						"recordsFiltered" => $this->m_history_order->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	
}

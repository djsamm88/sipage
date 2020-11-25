<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_jadwal');
		$this->load->model('m_admin');
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
		$at = date("Y-m-d H:i:s");
		
		//kirim email...
		$q = $this->db->query("SELECT a.nama,a.email,b.kegiatan FROM tbl_admin a INNER JOIN tbl_jadwal b ON a.id_skpd=b.skpd_pelaksana");		
		$qq = $q->result();
		
		foreach($qq as $x)
		{
			$text 	= urlencode("Hi $x->nama ... pada $at, Status Jadwal - $x->kegiatan - anda telah disetujui. Thanks.");
			$go 	= "http://e-agenda.pakpakbharatkab.go.id/PHPMailer/coba.php?email=".urlencode($x->email)."&text=".$text;
			$a = httpsCurl($go);
			echo $a;
		}
		
		
		
	}
	
	
}

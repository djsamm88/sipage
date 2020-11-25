<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {


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


	public function notif_request()
	{
		$q = $this->db->query("SELECT COUNT(id_jadwal) AS jum FROM tbl_jadwal WHERE status='request' AND tanggal_kegiatan_mulai > NOW() ");
		$a = $q->result();
		
		echo $a[0]->jum;
		
	}
	
	
	public function notif_booking($id_skpd)
	{
		$q = $this->db->query("SELECT COUNT(id_jadwal) AS jum FROM tbl_jadwal WHERE status='booking' AND tanggal_kegiatan_mulai > NOW() AND skpd_pelaksana='$id_skpd'");
		$a = $q->result();
		
		echo $a[0]->jum;
		
	}
	
	public function notif_booking_approved($id_skpd)
	{
		$q = $this->db->query("SELECT COUNT(id_jadwal) AS jum FROM tbl_jadwal WHERE (status='booking' OR status='approved') AND tanggal_kegiatan_mulai > NOW() AND skpd_pelaksana='$id_skpd'");
		$a = $q->result();
		
		echo $a[0]->jum;
		
	}
	
	
	
	public function notif_approved($id_skpd)
	{
		$q = $this->db->query("SELECT COUNT(id_jadwal) AS jum FROM tbl_jadwal WHERE status='approved' AND tanggal_kegiatan_mulai > NOW() AND skpd_pelaksana='$id_skpd'");
		$a = $q->result();
		
		echo $a[0]->jum;
		
	}
	
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_jadwal_internal extends CI_Controller {


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
		$data['admin'] = $this->m_admin->data_session_user($this->session->userdata('id_admin'));
		$data['tbl_pejabat'] = $this->m_jadwal->m_tbl_pejabat();
		$data['tbl_fasilitas'] = $this->m_jadwal->m_tbl_fasilitas();
		$data['tbl_skpd'] = $this->m_jadwal->m_tbl_skpd();		
		
		$this->load->view('template/part/form_jadwal_internal.php',$data);
	}
	
	
	public function go_simpan_jadwal()
	{
			$serialize = array(
				'kegiatan' 						=> $this->input->post('kegiatan', TRUE),
				'tanggal_kegiatan_mulai'		=> $this->input->post('tanggal_kegiatan_mulai', TRUE),		
				'tanggal_kegiatan_selesai'		=> $this->input->post('tanggal_kegiatan_selesai', TRUE),
				'tempat_kegiatan'		=> $this->input->post('tempat_kegiatan', TRUE),
				'keterangan'			=> $this->input->post('keterangan', TRUE),
				'skpd_pelaksana'		=> $this->input->post('skpd_pelaksana', TRUE),				
				'peserta'				=> $this->input->post('peserta', TRUE)
			);
			
			$selesai 	= $this->input->post('tanggal_kegiatan_selesai', TRUE);
			$mulai		= $this->input->post('tanggal_kegiatan_mulai', TRUE);
			
			//echo strtotime($selesai)-strtotime($mulai);
			
			if(strtotime($selesai) < strtotime($mulai) )
			{
				die("3");
				
			}
			
			if(strtotime(date('Y-m-d H:i:s')) > strtotime($mulai) )
			{
				die("4");
			}
			
			
			//var_dump($serialize);
			
			$id_jadwal = $this->m_jadwal->m_go_simpan_jadwal_internal($serialize);
			
			
			
				//kominfo email
				$text 	= urlencode("Hi Lusiana .. Ada jadwal Internal OPD baru. Nama Kegiatan: ".$this->input->post('kegiatan', TRUE)." , Tanggal :".$this->input->post('tanggal_kegiatan_mulai', TRUE).", Tempat :".$this->input->post('tempat_kegiatan', TRUE).", OPD :".$this->input->post('skpd_pelaksana', TRUE));
				$judul 	= urlencode($this->input->post('kegiatan', TRUE));
				
				$go 	= "http://e-agenda.pakpakbharatkab.go.id/PHPMailer/email_kominfo_detail.php?email=".urlencode('lusianagintings@gmail.com')."&text=".$text."&judul=".$judul;
				$a = httpsCurl($go); 
				//echo $a;
			
		
		die("1");
			
	}
	
	
	
	public function table_jadwal()
	{
		$data['admin'] = $this->m_admin->data_session_user($this->session->userdata('id_admin'));
		
		$data['tbl_skpd'] = $this->m_jadwal->m_tbl_skpd();		
		$data['tbl_jadwal'] = $this->m_jadwal->m_tbl_jadwal_internal($data['admin']);		
		
		$this->load->view('template/part/table_jadwal_internal.php',$data);
				
	}
	
	
	
	public function kirim_email($id_tujuan,$text)
	{
		
		$q = $this->db->query("SELECT email FROM tbl_admin WHERE id_admin='$id_tujuan'");
		$d = $q->result();
		
		foreach($d as $z)
		{
			exec_url("http://e-agenda.pakpakbharatkab.go.id/PHPMailer/coba.php?email=".$z->email."&text=".$text);
		}
	}
	
	
	
	public function kirim_email_2()
	{
		
		$id_admin 	= $this->input->post('id_admin', TRUE);
		$text 		= $this->input->post('text', TRUE);
		
		$q = $this->db->query("SELECT email FROM tbl_admin WHERE id_admin='$id_admin'");
		$d = $q->result();
		
		foreach($d as $z)
		{
			exec_url("http://e-agenda.pakpakbharatkab.go.id/PHPMailer/coba.php?email=".$z->email."&text=".$text);
		}
	}
	
	
	
	
	
	public function setujui($id_jadwal)
	{
		$at = date("Y-m-d H:i:s");
		$this->db->query("UPDATE tbl_jadwal SET status='booking',tgl_update='$at' WHERE id_jadwal='$id_jadwal'");
		
		
		//kirim email...
		$q = $this->db->query("SELECT a.nama,a.email,b.kegiatan FROM tbl_admin a INNER JOIN tbl_jadwal b ON a.id_skpd=b.skpd_pelaksana WHERE b.id_jadwal='$id_jadwal'");		
		$qq = $q->result();
		
		foreach($qq as $x)
		{
			
			if($x->email != '')
			{
				$text 	= urlencode("Hi $x->nama ... Status Jadwal -$x->kegiatan- anda telah disetujui. Silahkan buat e-surat.");
				$go 	= "http://e-agenda.pakpakbharatkab.go.id/PHPMailer/coba.php?email=".urlencode($x->email)."&text=".$text;
				$a = httpsCurl($go);
				echo $a;
			}
			
		}

		
	}
	
	public function cancel($id_jadwal)
	{
		$at = date("Y-m-d H:i:s");
		$this->db->query("UPDATE tbl_jadwal SET status='cancel',tgl_update='$at' WHERE id_jadwal='$id_jadwal'");
		
		
		//kirim email...
		$q = $this->db->query("SELECT a.nama,a.email,b.kegiatan FROM tbl_admin a INNER JOIN tbl_jadwal b ON a.id_skpd=b.skpd_pelaksana WHERE b.id_jadwal='$id_jadwal'");		
		$qq = $q->result();
		
		foreach($qq as $x)
		{
			
			if($x->email != '')
			{
				$text 	= urlencode("Hi $x->nama ... Status Jadwal -$x->kegiatan- anda tidak disetujui. Silahkan ganti jadwal.");
				$go 	= "http://e-agenda.pakpakbharatkab.go.id/PHPMailer/coba.php?email=".urlencode($x->email)."&text=".$text;
				$a = httpsCurl($go);
				echo $a;
			}
			
		}
		
	}
	
	
	public function approved($id_jadwal)
	{
		$at = date("Y-m-d H:i:s");
		$this->db->query("UPDATE tbl_jadwal SET status='approved',tgl_update='$at' WHERE id_jadwal='$id_jadwal'");
		

		//kirim email...
		$q = $this->db->query("SELECT a.nama,a.email,b.kegiatan FROM tbl_admin a INNER JOIN tbl_jadwal b ON a.id_skpd=b.skpd_pelaksana WHERE b.id_jadwal='$id_jadwal'");		
		$qq = $q->result();
		
		foreach($qq as $x)
		{
			
			if($x->email != '')
			{
				$text 	= urlencode("Hi $x->nama ... Status Jadwal -$x->kegiatan- anda telah disetujui. Thanks.");
				$go 	= "http://e-agenda.pakpakbharatkab.go.id/PHPMailer/coba.php?email=".urlencode($x->email)."&text=".$text;
				$a = httpsCurl($go);
				echo $a;
			}
			
		}
		
		
		
	}
	
	
	public function hapus($id_jadwal)
	{
		
		$this->db->query("DELETE FROM tbl_jadwal_internal WHERE id_jadwal='$id_jadwal'");
		
		
	}
	
	
	public function go_simpan_penolakan()
	{
			$admin = $this->m_admin->data_session_user($this->session->userdata('id_admin'));
			$serialize = array(
				'id_jadwal' 				=> $this->input->post('id_jadwal', TRUE),
				'keterangan_penolakan'		=> $this->input->post('keterangan_penolakan', TRUE),		
				'id_admin'					=> $admin->id_admin,
				'tgl_penolakan'				=> date("Y-m-d H:i:s")
			);
			
			//mengatasi bug double double
			$id_jadwal 				= $serialize['id_jadwal'];
			$keterangan_penolakan 	= $serialize['keterangan_penolakan'];
			$q = $this->db->query("DELETE  FROM tbl_penolakan WHERE id_jadwal='$id_jadwal' AND keterangan_penolakan='$keterangan_penolakan'");
			
			$this->m_jadwal->m_go_simpan_penolakan($serialize);
	
	}
	
	public function lihat_ket_reject($id_jadwal)
	{
		$q = $this->m_jadwal->m_ket_penolakan($id_jadwal);
		//$ket_penolakan = $q[0];
		foreach($q as $ket_penolakan)
		{
			echo "<small>Tgl penolakan: ".$ket_penolakan->tgl_penolakan."; Oleh:".$ket_penolakan->nama." - ".$ket_penolakan->nama_skpd." </small><br><hr>";
			echo $ket_penolakan->keterangan_penolakan.'<br><hr><button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Close</button>';
		}
		
	}
	
	public function lihat_fasilitas($id_jadwal)
	{
		$data['fasilitas'] = $this->m_jadwal->m_lihat_fasilitas($id_jadwal);
		
		$this->load->view('template/part/lihat_fasilitas.php',$data);
	}
	
	
}

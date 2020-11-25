<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_jadwal extends CI_Model {
		
		function __construct() {
			parent::__construct();
		
			$this->load->helper('custom_func');
		}
		
	
		//model data user
		public function data_session_user($id_admin) {			
			$query = $this->db->query("SELECT a.*,b.* FROM tbl_admin a LEFT JOIN tbl_skpd b ON a.id_skpd=b.id_skpd WHERE a.id_admin='$id_admin'");
			$data 	= $query->result();			
			$row 	= $data[0];
			
			return $row;
		}
		
		
		public function data_skpd($id_skpd)
		{
			$query = $this->db->query("SELECT * FROM tbl_skpd WHERE id_skpd='$id_skpd'");
			$data 	= $query->result();			
			$row 	= $data[0];
			
			return $row;
		}
		
		public function m_tbl_skpd() {			
			$query = $this->db->query("SELECT * FROM tbl_skpd");
			$data 	= $query->result();						
			return $data;
		}
		
		
		public function m_tbl_pejabat() {			
			$query = $this->db->query("SELECT * FROM tbl_pejabat");
			$data 	= $query->result();						
			return $data;
		}
		
		public function m_tbl_fasilitas() {			
			$query = $this->db->query("SELECT * FROM `tbl_fasilitas`");
			$data 	= $query->result();						
			return $data;
		}
		
		public function m_ket_penolakan($id_jadwal) {			
			$query = $this->db->query("SELECT a.*,c.nama,b.nama_skpd FROM tbl_penolakan a LEFT JOIN tbl_admin c ON a.id_admin=c.id_admin LEFT JOIN tbl_skpd b ON b.id_skpd=c.id_skpd WHERE id_jadwal='$id_jadwal'");
			$data 	= $query->result();						
			return $data;
		}
		
		
		public function m_lihat_fasilitas($id_jadwal) {			
			$query = $this->db->query("SELECT a.jumlah,b.nama_fasilitas FROM tbl_pesanan_fasilitas a INNER JOIN tbl_fasilitas b ON a.id_fasilitas=b.id_fasilitas WHERE a.id_jadwal='$id_jadwal'");
			$data 	= $query->result();						
			return $data;
		}
		
		
		public function m_go_simpan_jadwal($serialize)
		{
			
			$this->db->insert('tbl_jadwal', $serialize);		
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			
		}
		
		public function m_go_simpan_jadwal_internal($serialize)
		{
			
			$this->db->insert('tbl_jadwal_internal', $serialize);		
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			
		}
		
		
		public function m_go_simpan_penolakan($serialize)
		{
			
			$this->db->insert('tbl_penolakan', $serialize);		
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			
		}
		
		
		public function m_properti_admin($id_admin)
		{
			$q = $this->db->query("SELECT a.*,b.nama_skpd,c.no_hp,c.email 
									FROM 
										tbl_admin a
									INNER JOIN 
										tbl_skpd b
									ON a.id_skpd=b.id_skpd
									INNER JOIN
										tbl_skpd_properti c
									ON b.id_skpd=c.id_skpd
									WHERE a.id_admin = '$id_admin'
								");
			$data 	= $query->result();						
			return $data;
		}
		
		
		
		public function m_go_simpan_id_fasilitas($id_fasilitas,$jumlah,$id_jadwal)
		{
			$this->db->query("INSERT INTO tbl_pesanan_fasilitas SET id_fasilitas='$id_fasilitas', jumlah='$jumlah', id_jadwal='$id_jadwal'");
			
		}
		
		
		public function m_tbl_jadwal($admin)
		{
			if($admin->level == 'skpd')
			{
				$q = $this->db->query("
										SELECT 	a.*, 
												b.nama_skpd,
												c.nama_pejabat
											FROM tbl_jadwal a 
											INNER JOIN tbl_skpd b 
												ON a.skpd_pelaksana=b.id_skpd
											INNER JOIN tbl_pejabat c
												ON a.id_pejabat=c.id_pejabat		
										WHERE b.id_skpd = '".$admin->id_skpd."'
										ORDER BY a.id_jadwal DESC
									");
			}else
			{
				$q = $this->db->query("
										SELECT 	a.*, 
												b.nama_skpd,
												c.nama_pejabat
											FROM tbl_jadwal a 
											LEFT JOIN tbl_skpd b 
												ON a.skpd_pelaksana=b.id_skpd
											LEFT JOIN tbl_pejabat c
												ON a.id_pejabat=c.id_pejabat
										WHERE (a.status = 'approved' OR a.status = 'booking' OR a.status = 'request')
										ORDER BY a.tanggal_kegiatan_mulai DESC		
									");
			}
			
			$data 	= $q->result();						
			return $data;
			
			
			
		}
		
		public function m_tbl_jadwal_internal($admin)
		{
			$q = $this->db->query("
										SELECT 	a.*, 
												b.nama_skpd
											FROM tbl_jadwal_internal a 
											INNER JOIN tbl_skpd b 
												ON a.skpd_pelaksana=b.id_skpd
											
										WHERE 
										a.tanggal_kegiatan_mulai > CURDATE() AND
										b.id_skpd = '".$admin->id_skpd."'
										
										ORDER BY a.id_jadwal DESC
									");									
			
			$data 	= $q->result();						
			return $data;
			
			
			
		}
		
	}
?>

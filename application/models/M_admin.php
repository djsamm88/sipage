<?php 
	if (!defined('BASEPATH'))exit('No direct script access allowed');

	class M_admin extends CI_Model {
		
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
		
		public function update_data_session_user($data_update,$id_admin) {			
			
			$this->db->where('id_admin', $id_admin);
			$this->db->update('tbl_admin', $data_update);           
			
		}
		
		
		
		public function m_tamba_admin($serialize)
		{	
			
			$this->db->insert('tbl_admin', $serialize);		
			$insert_id = $this->db->insert_id();
			return  $insert_id;
			
		}
		
		
		public function m_all_admin() {			
			$query = $this->db->query("
										SELECT a.*,b.nama_skpd FROM tbl_admin a LEFT JOIN tbl_skpd b ON a.id_skpd=b.id_skpd
									");
			$data 	= $query->result();						
			return $data;
		}
		
		public function m_admin_by_id($id_admin) {			
			$query = $this->db->query("SELECT a.*,b.nama_skpd FROM tbl_admin a LEFT JOIN tbl_skpd b ON a.id_skpd=b.id_skpd WHERE a.id_admin='$id_admin'
									");
			$data 	= $query->result();						
			
			return $data[0];
		}
		
		
		
	}
?>

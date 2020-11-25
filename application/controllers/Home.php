<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->model('m_admin');
		$this->load->helper('custom_func');
		
		if ($this->session->userdata('id_admin')=="") 
		{
			redirect('index.php/show');
		}
		$this->load->helper('text');
		date_default_timezone_set("Asia/jakarta");
	}


	public function index()
	{
		$data['admin'] = $this->m_admin->data_session_user($this->session->userdata('id_admin'));
		$this->load->view('template/index.php',$data);
	}
	
	
	public function profil_admin()
	{
		$data['admin'] = $this->m_admin->data_session_user($this->session->userdata('id_admin'));
		$this->load->view('template/part/profil_admin.php',$data);
	}
	
	
	public function go_profil_admin()
	{
		$data_update = array(
				'nip' 		=> $this->input->post('nip', TRUE),
				'password'		=> md5($this->input->post('password', TRUE)),			
				'nama' 			=> $this->input->post('nama', TRUE)
				
			);
			
		$id_admin = $this->session->userdata('id_admin');
		$this->m_admin->update_data_session_user($data_update,$id_admin);


		//set log aktifitas
		$this->set_log($id_admin,'UPDATE Profil');
	}
	
	
	public function admin_tambah()
	{		
		$data['all_skpd'] = $this->m_admin->m_tbl_skpd();
		$this->load->view('template/part/admin_tambah.php',$data);
		
	}
	
	
	public function go_tambah_admin()
	{
		$serialize = array(
				'nip' 		=> $this->input->post('nip', TRUE),
				'password'		=> md5($this->input->post('password', TRUE)),			
				'nama' 			=> $this->input->post('nama', TRUE),
				'jabatan' 		=> $this->input->post('jabatan', TRUE),
				'no_hp' 		=> $this->input->post('no_hp', TRUE),
				'email' 		=> $this->input->post('email', TRUE),
				'level' 		=> $this->input->post('level', TRUE),
				'bagian' 		=> $this->input->post('bagian', TRUE),
				'id_skpd' 		=> $this->input->post('id_skpd', TRUE)
				
			);
		
			
		//var_dump($serialize);
		$id_admin = $this->m_admin->m_tamba_admin($serialize);	
		
		
		//set log aktifitas
		$this->set_log($id_admin,'INSERT tbl_admin');
		
	}
	
	
	public function go_update_admin()
	{
		$data_update = array(
				'nip' 		=> $this->input->post('nip', TRUE),
				'password'		=> md5($this->input->post('password', TRUE)),			
				'nama' 			=> $this->input->post('nama', TRUE),
				'id_skpd' 		=> $this->input->post('id_skpd', TRUE),
				'jabatan' 		=> $this->input->post('jabatan', TRUE),
				'bagian' 		=> $this->input->post('bagian', TRUE),
				'level' 		=> $this->input->post('level', TRUE)
			);
		$id_admin 		= $this->input->post('id_admin');
		
		
		$this->m_admin->update_data_session_user($data_update,$id_admin);	
		
		
		
		//set log aktifitas
		$this->set_log($id_admin,'UPDATE tbl_admin');
		
	}
	
	
	
	
	public function periksa_nip($nip)
	{
		
		$hasil = $this->db->query("SELECT * FROM tbl_admin WHERE nip='$nip'");
		
		if ($hasil->num_rows() == 0) 
		{
			
			$data['info'] = '1';
		}
		else {
			$data['info']= '2';
		}
		
		echo $data['info'];
		
		
	}
	
	
	public function toogle_status_admin($id_admin)
	{
		
		$this->db->query("UPDATE tbl_admin SET aktif_by_nip =IF (aktif_by_nip='0', '1','0') WHERE id_admin='$id_admin'");
		
		//set log aktifitas
		$this->set_log($id_admin,'UPDATE tbl_admin');
		
	}
	
	
	
	public function delete_admin($id_admin)
	{
		
		$this->db->query("DELETE FROM tbl_admin WHERE id_admin='$id_admin'");
		
		//set log aktifitas
		$this->set_log($id_admin,'DELETE tbl_admin');
		
	}
	
	
	
	public function admin_data()
	{
		$data['all_admin'] = $this->m_admin->m_all_admin();
		$this->load->view('template/part/admin_data.php',$data);
	}
	
	
	
	public function edit_admin($id_admin)
	{
		
		$data['admin'] = $this->m_admin->m_admin_by_id($id_admin);
		$data['all_skpd'] = $this->m_admin->m_tbl_skpd();
		$this->load->view('template/part/edit_admin.php',$data);
	}
	
	
	public function set_log($referensi,$aktivitas)
	{
		$id_admin = $this->session->userdata('id_admin');
		$this->db->query("INSERT INTO tbl_log_admin SET id_admin='$id_admin', referensi='$referensi',aktivitas='$aktivitas'");
	}
	
	
	public function jq_set_log()
	{
		$referensi 		= $this->input->post('referensi');
		$aktivitas 		= $this->input->post('aktivitas');
		$id_admin = $this->session->userdata('id_admin');
		$this->db->query("INSERT INTO tbl_log_admin SET id_admin='$id_admin', referensi='$referensi',aktivitas='$aktivitas'");
	}
	
	
	
}

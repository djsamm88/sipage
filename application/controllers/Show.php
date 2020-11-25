<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Show extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');		
		$this->load->helper('custom_func');
		date_default_timezone_set("Asia/jakarta");
	}

	public function index() 
	{
		
		$this->load->view('template/show.php');
	}
	

	public function ambil_data() 
	{
		$data['title']="e-Agenda";		
		
		$qquery = $this->db->query("
		                            
                		                            SELECT * FROM 
                		                            (
                		                                SELECT  `a`.`id_jadwal`                AS `id_jadwal`, 
                                                                `a`.`kegiatan`                 AS `kegiatan`, 
                                                                `a`.`tanggal_kegiatan_mulai`   AS `tanggal_kegiatan_mulai`, 
                                                                `a`.`tanggal_kegiatan_selesai` AS `tanggal_kegiatan_selesai`, 
                                                                `a`.`tempat_kegiatan`          AS `tempat_kegiatan`, 
                                                                `a`.`skpd_pelaksana`           AS `skpd_pelaksana`, 
                                                                `a`.`id_pejabat`               AS `id_pejabat`, 
                                                                `a`.`peserta`                  AS `peserta`, 
                                                                `a`.`status`                   AS `status`, 
                                                                `a`.`tgl_update`               AS `tgl_update`, 
                                                                `b`.`nama_skpd`                AS `nama_skpd`, 
                                                                `c`.`nama_pejabat`             AS `nama_pejabat` 
                                                                FROM   ((`tbl_jadwal` `a` 
                                                                 LEFT JOIN `tbl_skpd` `b` 
                                                                        ON(( `a`.`skpd_pelaksana` = `b`.`id_skpd` ))) 
                                                                LEFT JOIN `tbl_pejabat` `c` 
                                                                       ON(( `a`.`id_pejabat` = `c`.`id_pejabat` ))) 
                                                                WHERE  ( 
                                                                ( 
                                                                ( `a`.`status` = 'booking' ) 
                                                                
                                                                OR ( `a`.`status` = 'approved' )
                                                                /*OR ( `a`.`status` = 'cancel' )*/
                                                                
                                                                )AND ( `a`.`tanggal_kegiatan_mulai` > Now() ) 
                                                                ) 
                                                                ORDER  BY `a`.`id_jadwal` DESC 
                		                            )x
                		                            
                		                            ORDER BY tanggal_kegiatan_mulai ASC
                		                            
		                            
		                          ");
		$qq 	= $qquery->result();						
		$data['v_jadwal_approved'] = $qq;
		
		
		$query = $this->db->query("SELECT * FROM v_jadwal_approved WHERE tanggal_kegiatan_mulai > NOW() ORDER BY tanggal_kegiatan_mulai ASC");
		$q 	= $query->result();						
		$data['terdekat'] = $q;
		
		$qberlangsung = $this->db->query("SELECT * FROM `tbl_jadwal` WHERE status='approved' AND tanggal_kegiatan_mulai < NOW() AND `tanggal_kegiatan_selesai` > NOW()");
		$qber 	= $qberlangsung->result();						
		$data['berlangsung'] = $qber;
		
		//internal 
		$q_internal = $this->db->query("
		                                SELECT * FROM
		                                (
										SELECT 	a.*, 
												b.nama_skpd
											FROM tbl_jadwal_internal a 
											INNER JOIN tbl_skpd b 
												ON a.skpd_pelaksana=b.id_skpd											
										WHERE 
										a.tanggal_kegiatan_mulai >= CURDATE()		
										ORDER BY a.tanggal_kegiatan_mulai ASC
										)x
										ORDER BY RAND() LIMIT 5
									");			
									
		$q_int 	= $q_internal->result();						
		$data['internal'] = $q_int;
		
		$this->load->view('template/part/show.php',$data);
	}
	
	

    public function jam()
    {
        
        echo date("H:i:s");
    }
	
}
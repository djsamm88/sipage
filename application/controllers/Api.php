<?php
class Api extends CI_controller{
    
    function dashboard()
    {
        
        $x = $this->db->query("SELECT a.*,b.*,c.*,d.*,e.*
                                FROM
                                (
                                	SELECT COUNT(*) AS request FROM tbl_jadwal WHERE status = 'request'
                                )a
                                JOIN 
                                (
                                	SELECT COUNT(*) AS booking FROM tbl_jadwal WHERE status = 'booking'	
                                )b
                                JOIN
                                (
                                	SELECT COUNT(*) AS approved FROM tbl_jadwal WHERE status = 'approved'
                                )c
                                JOIN 
                                (
                                	SELECT COUNT(*) AS cancel FROM tbl_jadwal WHERE status = 'cancel'
                                )d
                                JOIN 
                                (
                                	SELECT COUNT(*) AS reject FROM tbl_jadwal WHERE status = 'reject'
                                )e
                                
                            ");
        echo json_encode($x->result());
    }
    
    function dashboard_bulan()
    {
        $year=date('Y');
        $bln = array();
        for($x=1;$x<=12;$x++)
        {
            $bln[$x] = $this->db->query("SELECT * FROM tbl_jadwal WHERE MONTH(tgl_update)='$x' AND YEAR(tgl_update)='$year'")->num_rows();
            
        }
        
        echo json_encode($bln);
        
    }
}
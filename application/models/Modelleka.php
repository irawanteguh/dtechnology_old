<?php
    class Modelleka extends CI_Model{

        function insertdata($data){           
            $sql =   $this->db->insert("dt01_receivedata_data_leka",$data);
            return $sql;
        }

        function resultexamination($orgid,$transsaksiid){
            $query =
                    "
                        select a.*,  DATE_FORMAT(DATE_SUB(created_date, INTERVAL 7 HOUR), '%Y-%m-%dT%H:%i:%s') assessmentdate
                        from dt01_receivedata_data_leka a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   a.transaksi_id='".$transsaksiid."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function masterorganization($code){
            $query =
                    "
                        select a.org_id
                        from dt01_gen_organization_ms a
                        where a.active='1'
                        and   a.code='".$code."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }
        
        
    }
?>
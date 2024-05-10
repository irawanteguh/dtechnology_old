<?php
    class Modellogservice extends CI_Model{

        function datalog($orgid){
            $query =
                    "
                        select a.*, DATE_FORMAT(CREATED_DATE,'%d.%m.%Y %H:%i:%s')CREATEDDATE
                        from dt01_service_api_logs_out a
                        where a.org_id='".$orgid."'
                        order by request_id desc
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

    }
?>
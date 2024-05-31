<?php
    class Modelactivity extends CI_Model{

        function calender(){
            $query =
                    "
                        select a.trans_id, status,
                            DATE_FORMAT(a.start_date, '%Y-%m-%d') start_date,
                            DATE_FORMAT(DATE_ADD(a.end_date, INTERVAL 1 DAY), '%Y-%m-%d') end_date,
                            (select activity from dt01_hrd_activity_ms where active='1' and org_id=a.org_id and activity_id=a.activity_id)kegiatanutama
                        from dt01_hrd_activity_dt a
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function activity(){
            $query =
                    "
                        select a.activity_id, activity, durasi,
                            CONCAT(a.activity, ' Durasi ', a.durasi, ' Menit') keterangan
                        from dt01_hrd_activity_ms a
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
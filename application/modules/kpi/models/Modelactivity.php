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

        function activity($orgid,$durasi){
            $query =
                    "
                        select a.activity_id, activity, durasi,
                            CONCAT(a.activity, ' Durasi ', a.durasi, ' Menit') keterangan
                        from dt01_hrd_activity_ms a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   a.durasi <= '".$durasi."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function type(){
            $query =
                    "
                        select 1 vol
                        union
                        select 2 vol
                        union
                        select 3 vol
                        union
                        select 4 vol
                        union
                        select 5 vol
                        union
                        select 6 vol
                        union
                        select 7 vol
                        union
                        select 8 vol
                        union
                        select 9 vol
                        union
                        select 10 vol
                        union
                        select 11 vol
                        union
                        select 12 vol
                        union
                        select 13 vol
                        union
                        select 14 vol
                        union
                        select 15 vol
                        union
                        select 16 vol
                        union
                        select 17 vol
                        union
                        select 18 vol
                        union
                        select 19 vol
                        union
                        select 20 vol
                        union
                        select 21 vol
                        union
                        select 22 vol
                        union
                        select 23 vol
                        union
                        select 24 vol
                        union
                        select 25 vol
                        union
                        select 26 vol
                        union
                        select 27 vol
                        union
                        select 28 vol
                        union
                        select 29 vol
                        union
                        select 30 vol
                        order by type asc
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
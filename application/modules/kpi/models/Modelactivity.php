<?php
    class Modelactivity extends CI_Model{

        function calender(){
            $query =
                    "
                        select a.trans_id, status,
                            concat(DATE_FORMAT(a.start_date, '%Y-%m-%d'),'T',start_time_in,':00') start_date,
                            DATE_FORMAT(DATE_ADD(a.end_date, INTERVAL 1 DAY), '%Y-%m-%d') end_date,
                            (select activity from dt01_hrd_activity_ms where active='1' and org_id=a.org_id and activity_id=a.activity_id)kegiatanutama
                        from dt01_hrd_activity_dt a
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function cekklinisactivity($orgid,$activityid){
            $query =
                    "
                        select a.pk
                        from dt01_hrd_activity_ms a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   a.activity_id='".$activityid."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }

        function cekklinisid($orgid,$userid){
            $query =
                    "
                        select a.klinis_id
                        from dt01_gen_user_data a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   a.user_id='".$userid."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }

        function cekatasanid($orgid,$userid){
            $query =
                    "
                        select a.atasan_id
                        from dt01_hrd_position_dt a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   a.user_id='".$userid."'
                        and   a.position_primary='Y'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }

        function cekatasan($orgid,$userid,$activityid){
            $query =
                    "
                        select a.atasan_id, position_primary
                        from dt01_hrd_position_dt a
                        where a.org_id='".$orgid."'
                        and   a.active='1'
                        and   a.user_id='".$userid."'
                        and   a.position_id in (select position_id from dt01_hrd_mapping_activity where org_id=a.org_id and active='1' and activity_id='".$activityid."')
                        order by position_primary desc
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }

        function activity($orgid,$userid,$pk){
            $query =
                    "
                        select x.*
                        from(
                                select concat(a.activity_id,':',durasi)activity_id, concat(activity,' Durasi ',durasi,' Menit')activity, durasi,
                                    (select nomor from dt01_hrd_klinis_ms a where active='1' and klinis_id=a.pk)urut
                                from dt01_hrd_activity_ms a
                                where a.active='1'
                                and   a.org_id='".$orgid."'
                                and   a.activity_id in ( select activity_id from dt01_hrd_mapping_activity where org_id='".$orgid."' and active='1' and position_id in (select position_id from dt01_hrd_position_dt where org_id='".$orgid."' and active='1' and active='1' and status='1' and user_id='".$userid."'))

                                union

                                select concat(a.activity_id,':',durasi)activity_id, concat(' [ ',(select concat(name,' ',area)  from dt01_hrd_klinis_ms where active='1' and klinis_id=a.pk),' ] ',activity,' Durasi ',durasi,' Menit')activity, durasi,
                                     (select nomor from dt01_hrd_klinis_ms a where active='1' and klinis_id=a.pk)urut
                                from dt01_hrd_activity_ms a
                                where a.active='1'
                                and   a.org_id='".$orgid."'
                                and   a.pk in ( select sub_klinis_id from dt01_hrd_mapping_klinis where active='1' ".$pk.")
                        )x
                        order by x.urut desc, x.activity asc, x.durasi asc
                                                                    
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function volume($orgid,$activityid,$starttime,$endtime){
            $query =
                    "
                        select x.*
                        from (
                            select '1' as vol union all
                            select '2' union all
                            select '3' union all
                            select '4' union all
                            select '5' union all
                            select '6' union all
                            select '7' union all
                            select '8' union all
                            select '9' union all
                            select '10' union all
                            select '11' union all
                            select '12' union all
                            select '13' union all
                            select '14' union all
                            select '15' union all
                            select '16' union all
                            select '17' union all
                            select '18' union all
                            select '19' union all
                            select '20' union all
                            select '21' union all
                            select '22' union all
                            select '23' union all
                            select '24' union all
                            select '25' union all
                            select '26' union all
                            select '27' union all
                            select '28' union all
                            select '29' union all
                            select '30' union all
                            select '31' union all
                            select '32' union all
                            select '33' union all
                            select '34' union all
                            select '35' union all
                            select '36' union all
                            select '37' union all
                            select '38' union all
                            select '39' union all
                            select '40'
                        ) x
                        where cast(x.vol as unsigned) <= (
                            select 
                                ((time_to_sec(str_to_date('".$endtime."', '%H:%i')) - time_to_sec(str_to_date('".$starttime."', '%H:%i'))) / 60) / 
                                ( select durasi from dt01_hrd_activity_ms where active = '1' and org_id = '".$orgid."' and activity_id = '".$activityid."')
                        )
                        order by cast(x.vol as unsigned) desc;
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function insertactivity($data){           
            $sql =   $this->db->insert("dt01_hrd_activity_dt",$data);
            return $sql;
        }


    }
?>
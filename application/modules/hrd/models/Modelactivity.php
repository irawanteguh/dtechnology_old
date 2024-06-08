<?php
    class Modelactivity extends CI_Model{

        function masteractivity($orgid){
            $query =
                    "
                        select a.activity_id, activity, durasi, active
                        from dt01_hrd_activity_ms a
                        where a.org_id='".$orgid."'
                        order by activity asc, durasi asc
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function updatemasteactivity($activityid,$data){           
            $sql =   $this->db->update("dt01_hrd_activity_ms",$data,array("activity_id"=>$activityid));
            return $sql;
        }

    }
?>
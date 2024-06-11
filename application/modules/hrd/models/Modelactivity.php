<?php
    class Modelactivity extends CI_Model{

        function masteractivity($orgid){
            $query =
                    "
                        select x.*
                        from(
                            select a.activity_id, activity, durasi, active,
                                (select concat(name,' ',area) from dt01_hrd_klinis_ms where active='1' and org_id=a.org_id and klinis_id=a.pk)klinis,
                                (select nomor from dt01_hrd_klinis_ms where active='1' and org_id=a.org_id and klinis_id=a.pk)nomor
                            from dt01_hrd_activity_ms a
                            where a.org_id='".$orgid."'
                        )x
                        order by activity asc, durasi asc, nomor desc
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function insertmasteractivity($data){           
            $sql =   $this->db->insert("dt01_hrd_activity_ms",$data);
            return $sql;
        }

        function updatemasteactivity($activityid,$data){           
            $sql =   $this->db->update("dt01_hrd_activity_ms",$data,array("activity_id"=>$activityid));
            return $sql;
        }

    }
?>
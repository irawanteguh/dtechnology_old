<?php
    class Modelrole extends CI_Model{

        function masterrole($orgid){
            $query =
                    "
                        select a.role_id, role, DATE_FORMAT(CREATED_DATE,'%d.%m.%Y %H:%i:%s')createddate,
                            (select name from dt01_gen_user_data where user_id=a.created_by and active='1')createdby
                        from dt01_gen_role_ms a
                        where a.org_id='".$orgid."'
                        and   a.active='1'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
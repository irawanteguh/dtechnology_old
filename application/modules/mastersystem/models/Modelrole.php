<?php
    class Modelrole extends CI_Model{

        function masterrole($orgid){
            $query =
                    "
                        select a.role_id, role, date_format(created_date,'%d.%m.%Y')createddate,
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
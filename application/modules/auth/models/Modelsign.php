<?php
    class Modelsign extends CI_Model{

        function login($orgid,$username,$password){
            $query =
                    "
                        select a.user_id
                        from dt01_gen_user_data a
                        where a.org_id='".$orgid."'
                        and   a.active='1'
                        and   a.username='".$username."'
                        and   a.password='".$password."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }

        function datasession($orgid,$userid){
            $query =
                    "
                        select a.user_id, name, image_profile, org_id, username, suspended, upper(LEFT(a.name, 1)) initial, email, address,
                               (select org_name from dt01_gen_organization_ms where active='1' and org_id=a.org_id)hospitalname,
                               (select website  from dt01_gen_organization_ms where active='1' and org_id=a.org_id)website,
                               (select trial    from dt01_gen_organization_ms where active='1' and org_id=a.org_id)trial,
                               (select position from dt01_hrd_position_ms where active='1' and org_id='".$orgid."' and position_id=(select position_id from dt01_hrd_position_dt where active='1' and org_id='".$orgid."' and position_primary='Y' and status='1' and user_id=a.user_id))position

                        from dt01_gen_user_data a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   a.user_id='".$userid."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }

    }
?>
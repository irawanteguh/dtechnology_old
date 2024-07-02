<?php
    class Modelvalidation extends CI_Model{

        function liststaff($orgid,$userid){
            $query =
                    "
                        select x.*,
                            (select level from dt01_gen_level_fungsional_ms where org_id=x.org_id and active='1' and level_id=x.levelfungsionalprimaryid)fungsionalprimary,
                            (select concat(name,' ',area) from dt01_hrd_klinis_ms where active='1' and klinis_id=x.klinis_id)klinis
                        from(
                            select a.org_id, user_id, position_primary,
                                (select position from dt01_hrd_position_ms where active=a.active and org_id=a.org_id and position_id=a.position_id)position,
                                (select level_fungsional from dt01_hrd_position_ms where org_id=a.org_id and active='1' and position_id=a.position_id)levelfungsionalprimaryid,
                                (select name from dt01_gen_user_data where active=a.active and org_id=a.org_id and user_id=a.user_id)name,
                                (select upper(LEFT(name, 1)) from dt01_gen_user_data where active=a.active and org_id=a.org_id and user_id=a.user_id)initial,
                                (select image_profile from dt01_gen_user_data where active=a.active and org_id=a.org_id and user_id=a.user_id)image_profile,
                                (select email from dt01_gen_user_data where active=a.active and org_id=a.org_id and user_id=a.user_id)email,
                                (select kategori_id from dt01_gen_user_data where active=a.active and org_id=a.org_id and user_id=a.user_id)kategori_id,
                                (select klinis_id from dt01_gen_user_data where active=a.active and org_id=a.org_id and user_id=a.user_id)klinis_id,
                                (select hours_month from dt01_gen_user_data where active=a.active and org_id=a.org_id and user_id=a.user_id)hours_month


                            from dt01_hrd_position_dt a
                            where a.active='1'
                            and   a.status='1'
                            and   a.org_id='".$orgid."'
                            and   a.atasan_id='".$userid."'
                            order by name asc
                        )x
                                                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
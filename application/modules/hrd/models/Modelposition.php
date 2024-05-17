<?php
    class Modelposition extends CI_Model{

        function daftarjabatan($orgid,$parameter){
            $query =
                    "
                        select a.ORG_ID, POSITION_ID, POSITION, RVU, LEVEL, LEVEL_FUNGSIONAL, DATE_FORMAT(LAST_UPDATE_DATE,'%d.%m.%Y %H:%i:%s')LASTUPDATEDATE,
                        (select IFNULL(name, 'Unknown')  from  dt01_gen_user_data where active = '1' and org_id = a.org_id and user_id = IFNULL(a.CREATED_BY, a.LAST_UPDATE_BY)) LASTUPDATEDBY,
                        (select level from dt01_gen_level_fungsional_ms where active='1' and level_id=a.LEVEL_FUNGSIONAL)FUNCTIONAL,
                        (select GROUP_CONCAT(user_id,':',IMAGE_PROFILE,':',NAME, ':', upper(LEFT(name, 1)) SEPARATOR '; ') FROM dt01_gen_user_data WHERE active = '1' AND position_id = a.position_id) USERID
                        
                        from dt01_hrd_position_ms a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   upper(a.position) like upper('%".$parameter."%')
                        order by LEVEL DESC, POSITION asc, RVU DESC, POSITION ASC
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
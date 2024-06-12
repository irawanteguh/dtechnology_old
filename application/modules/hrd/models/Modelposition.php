<?php
    class Modelposition extends CI_Model{

        function cekdataprimary($orgid,$userid){
            $query =
                    "
                        select a.user_id, position_id,
                               (select name from dt01_gen_user_data where active='1' and org_id=a.org_id and user_id=a.user_id)name,
                               (select position from dt01_hrd_position_ms where active='1' and org_id=a.org_id and position_id=a.position_id)position

                        from dt01_hrd_position_dt a
                        where a.active='1'
                        and   a.position_primary='Y'
                        and   a.org_id='".$orgid."'
                        and   a.user_id='".$userid."'
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }

        function cekdataposisi($orgid,$userid,$positionid){
            $query =
                    "
                        select a.user_id, position_id,
                               (select name from dt01_gen_user_data where active='1' and org_id=a.org_id and user_id=a.user_id)name,
                               (select position from dt01_hrd_position_ms where active='1' and org_id=a.org_id and position_id=a.position_id)position

                        from dt01_hrd_position_dt a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   a.user_id='".$userid."'
                        and   a.position_id='".$positionid."'
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->row();
            return $recordset;
        }

        function daftarjabatan($orgid,$parameter){
            $query =
                    "
                        SELECT a.ORG_ID, a.POSITION_ID, a.POSITION, a.RVU, a.LEVEL, a.LEVEL_FUNGSIONAL, 
                                DATE_FORMAT(a.LAST_UPDATE_DATE, '%d.%m.%Y %H:%i:%s') LASTUPDATEDATE,
                                (SELECT IFNULL(name, 'Unknown')  FROM dt01_gen_user_data  WHERE active = '1'  AND org_id = a.org_id AND user_id = IFNULL(a.CREATED_BY, a.LAST_UPDATE_BY)) LASTUPDATEDBY,
                                (SELECT level FROM dt01_gen_level_fungsional_ms WHERE active = '1' AND level_id = a.LEVEL_FUNGSIONAL) FUNCTIONAL,
                                (
                                    SELECT GROUP_CONCAT(
                                            b.user_id, ':',
                                            (SELECT image_profile 
                                                FROM dt01_gen_user_data 
                                                WHERE active = '1' 
                                                AND org_id = a.org_id 
                                                AND user_id = b.user_id), ':',
                                            (SELECT name 
                                                FROM dt01_gen_user_data 
                                                WHERE active = '1' 
                                                AND org_id = a.org_id 
                                                AND user_id = b.user_id), ':',
                                            (SELECT UPPER(LEFT(name, 1)) 
                                                FROM dt01_gen_user_data 
                                                WHERE active = '1' 
                                                AND org_id = a.org_id 
                                                AND user_id = b.user_id)
                                        SEPARATOR '; ')
                                    FROM dt01_hrd_position_dt b
                                    WHERE b.active = '1'
                                    AND b.org_id = a.org_id
                                    AND b.position_primary = 'Y'
                                    AND b.position_id = a.position_id
                                ) memberprimary,
                                (
                                    SELECT GROUP_CONCAT(
                                            b.user_id, ':',
                                            (SELECT image_profile 
                                                FROM dt01_gen_user_data 
                                                WHERE active = '1' 
                                                AND org_id = a.org_id 
                                                AND user_id = b.user_id), ':',
                                            (SELECT name 
                                                FROM dt01_gen_user_data 
                                                WHERE active = '1' 
                                                AND org_id = a.org_id 
                                                AND user_id = b.user_id), ':',
                                            (SELECT UPPER(LEFT(name, 1)) 
                                                FROM dt01_gen_user_data 
                                                WHERE active = '1' 
                                                AND org_id = a.org_id 
                                                AND user_id = b.user_id)
                                        SEPARATOR '; ')
                                    FROM dt01_hrd_position_dt b
                                    WHERE b.active = '1'
                                    AND b.org_id = a.org_id
                                    AND b.position_primary = 'N'
                                    AND b.position_id = a.position_id
                                ) membersecondry
                        FROM dt01_hrd_position_ms a
                        WHERE a.active = '1'
                        AND a.org_id = '".$orgid."'
                        ORDER BY LEVEL DESC, POSITION ASC, RVU DESC, POSITION ASC
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function daftarkaryawan($orgid){
            $query =
                    "
                        select a.user_id, name
                        from dt01_gen_user_data a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        order by name asc
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function type(){
            $query =
                    "
                        select 'Y' id, 'Primary' type
                        union
                        select 'N' id, 'Secondary' type
                        order by type asc
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function insertpenempatan($data){           
            $sql =   $this->db->insert("dt01_hrd_position_dt",$data);
            return $sql;
        }

    }
?>
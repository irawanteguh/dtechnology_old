<?php
    class Modelemployee extends CI_Model{

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

        function daftarjabatan($orgid){
            $query =
                    "
                        select a.position_id, position,
                            (select level from dt01_gen_level_fungsional_ms where active='1' and level_id=a.LEVEL_FUNGSIONAL)fungsional

                        from dt01_hrd_position_ms a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        order by LEVEL DESC, POSITION asc, RVU DESC, POSITION ASC
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function daftarkaryawan($orgid,$parameter){
            $query =
                    "
                        select a.user_id, name
                        from dt01_gen_user_data a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        ".$parameter."
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

        function masteremployee($orgid){
            $query =
                    "
                        select y.*,
                            (select level from dt01_gen_level_fungsional_ms where org_id='".$orgid."' and active='1' and level_id=y.levelfungsionalprimary)funsgionalprimary
                        from(
                            select x.*,
                                (select name             from dt01_gen_user_data   where org_id='".$orgid."' and active='1' and user_id=x.atasanidprimary)atasanprimary,
                                (select position         from dt01_hrd_position_ms where org_id='".$orgid."' and active='1' and position_id=x.positioidprimary)positionprimary,
                                (select level_fungsional from dt01_hrd_position_ms where org_id='".$orgid."' and active='1' and position_id=x.positioidprimary)levelfungsionalprimary
                            from(
                                select a.user_id, name, email, nik, identity_no, image_profile, upper(LEFT(a.name, 1)) initial,
                                    (select atasan_id   from dt01_hrd_position_dt where org_id='".$orgid."' and active='1' and status='1' and position_primary='Y' and user_id=a.user_id)atasanidprimary,
                                    (select position_id from dt01_hrd_position_dt where org_id='".$orgid."' and active='1' and status='1' and position_primary='Y' and user_id=a.user_id)positioidprimary,
                                    (
                                        SELECT GROUP_CONCAT(
                                                b.position_id, ':',
                                                COALESCE(p.position, ''), ':',
                                                COALESCE(f.level, ''), ':',
                                                COALESCE(u.name, '')
                                            SEPARATOR ';')
                                        FROM dt01_hrd_position_dt b
                                        LEFT JOIN dt01_hrd_position_ms p ON p.position_id = b.position_id AND p.active = '1' AND p.org_id = a.org_id
                                        LEFT JOIN dt01_gen_level_fungsional_ms f ON f.level_id = p.level_fungsional AND f.active = '1' AND f.org_id = a.org_id
                                        LEFT JOIN dt01_gen_user_data u ON u.user_id = b.atasan_id AND u.active = '1' AND u.org_id = a.org_id
                                        WHERE b.active = '1'
                                        AND b.org_id = a.org_id
                                        AND b.position_primary = 'N'
                                        AND b.user_id = a.user_id
                                    )  membersecondry
                                from dt01_gen_user_data a
                                where a.active='1'
                                and   a.org_id='".$orgid."'
                            )X
                        )y

                        order by name asc
                
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
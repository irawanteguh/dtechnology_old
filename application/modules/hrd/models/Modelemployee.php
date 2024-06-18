<?php
    class Modelemployee extends CI_Model{

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
                                (select position from dt01_hrd_position_ms where org_id='".$orgid."' and active='1' and position_id=x.positioidprimary)positionprimary,
                                (select level_fungsional from dt01_hrd_position_ms where org_id='".$orgid."' and active='1' and position_id=x.positioidprimary)levelfungsionalprimary
                            from(
                                select a.user_id, name, email, nik, identity_no, image_profile, upper(LEFT(a.name, 1)) initial,
                                    (select position_id from dt01_hrd_position_dt where org_id='".$orgid."' and active='1' and status='1' and position_primary='Y' and user_id=a.user_id)positioidprimary
                                from dt01_gen_user_data a
                                where a.active='1'
                                and   a.org_id='".$orgid."'
                                order by name asc
                            )X
                        )y
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

    }
?>
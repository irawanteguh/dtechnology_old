<?php
    class Modelkunjunganyears extends CI_Model{

        function periode(){
            $query =
                    "
                        select distinct date_format(tgl_registrasi, '%Y')periode
                        from reg_periksa a
                        order by periode desc
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function kunjungan($periode){
            $query =
                    "
                        WITH monthly_data AS (
                            SELECT 
                                DATE_FORMAT(tgl_registrasi, '%m.%Y') AS periode,
                                COUNT(IF(status_lanjut = 'Ralan', 1, NULL)) AS jmlrj,
                                COUNT(IF(status_lanjut = 'Ranap', 1, NULL)) AS jmlri
                            FROM 
                                reg_periksa a
                            WHERE DATE_FORMAT(tgl_registrasi, '%Y') = '".$periode."'
                            GROUP BY 
                                DATE_FORMAT(tgl_registrasi, '%m.%Y')
                        ),
                        total_counts AS (
                            SELECT 
                                SUM(jmlrj) AS total_jmlrj,
                                SUM(jmlri) AS total_jmlri,
                                COUNT(*) AS months_passed
                            FROM 
                                monthly_data
                        )
                        SELECT 
                            md.*,
                            ROUND(tc.total_jmlrj / tc.months_passed, 0) AS avgrj,
                            ROUND(tc.total_jmlri / tc.months_passed, 0) AS avgri
                        FROM 
                            monthly_data md
                        JOIN 
                            total_counts tc
                        order by periode asc

                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function kunjunganpoli($periode){
            $query =
                    "
                        select date_format(tgl_registrasi, '%Y') periode, a.kd_poli,
                            count(no_rawat) AS jmltahunini,
                            (select count(no_rawat) from reg_periksa where status_lanjut=a.status_lanjut and kd_poli=a.kd_poli and year(tgl_registrasi)='".$periode."' - 1)jmlthnlalu,
                            (select upper(nm_poli) from poliklinik where kd_poli = a.kd_poli) AS namapoli
                                
                        from reg_periksa a
                        where a.status_lanjut = 'Ralan'
                        and a.kd_poli <>'-'
                        and date_format(tgl_registrasi, '%Y') = '".$periode."'
                        group by periode, a.kd_poli
                        order by jmltahunini desc;


                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

    }
?>
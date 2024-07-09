<?php
    class Modelkunjungandaily extends CI_Model{


        function totalkunjungan(){
            $query =
                    "
                        select date_format(tgl_registrasi,'%d.%m.%Y')periode, date_format(tgl_registrasi,'%d.%m')label,
                            count(IF(status_lanjut = 'Ralan', 1, NULL)) jmlrj,
                            count(IF(status_lanjut = 'Ranap', 1, NULL)) jmlri
                            
                        from reg_periksa a
                        group by date_format(tgl_registrasi,'%d.%m.%Y')
                        order by periode desc
                        limit 30;
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

    }
?>
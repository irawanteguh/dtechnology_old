<?php
    class Modelgrouper extends CI_Model{

        function listkunjungan(){
            $query =
                    "
                        select a.no_rawat, tgl_registrasi,no_rkm_medis, status_lanjut,
                            (select nm_dokter from dokter where kd_dokter=a.kd_dokter)namadokter,
                            (select upper(LEFT(nm_pasien, 1)) from pasien where no_rkm_medis=a.no_rkm_medis)initialpasien,
                            (select nm_pasien from pasien where no_rkm_medis=a.no_rkm_medis)namapasien,
                            (select no_ktp from pasien where no_rkm_medis=a.no_rkm_medis)noktp,
                            (select nm_poli from poliklinik where kd_poli=a.kd_poli)politujuan,
                            (select png_jawab from penjab where kd_pj=a.kd_pj)provider
                            
                        from reg_periksa a
                        where a.stts<>'Batal'
                        and   a.kd_pj='BPJ'
                        and   a.status_bayar='Sudah Bayar'
                        limit 10;
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
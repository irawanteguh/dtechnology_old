<?php
    class Modelrepodocument extends CI_Model{

        function dataupload($orgid){
            $query =
                    "
                        select x.*
                        from(
                            select a.NO_FILE, FILENAME, STATUS_SIGN, LINK, NOTE, DATE_FORMAT(CREATED_DATE,'%d.%m.%Y %H:%i:%s')tgljam, pasien_idx, transaksi_idx,
                                    (select USER_IDENTIFIER from dt01_gen_user_data where active='1' and nik=a.assign)useridentifier,
                                    (select NAME from dt01_gen_user_data where active='1' and nik=a.assign)assignname,
                                    (select DOCUMENT_NAME from dt01_gen_document_ms where active='1' and JENIS_DOC=a.JENIS_DOC)jenisdocumen
                            from dt01_gen_document_file_dt a
                            where a.active='1'
                            and   a.org_id='".$orgid."'
                            order by created_date desc
                        )x
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
<?php
    class Modelleka extends CI_Model{

        

        function listexamination(){
            $query =
                    "
                        select a.transaksi_id, name, photo, encounter_id, id_number, upper(LEFT(a.name, 1)) initial, sex, nation, bod, address, exam_id, date_format(created_date,'%d.%m.%Y')createddate,
                               ecg12_data_value
                        from dt01_receivedata_data_leka a
                        where a.active='1'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
<?php
    class Modelmasterclient extends CI_Model{

        function listclient(){
            $query =
                    "
                        select a.*
                        from dt01_gen_organization_ms a
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

    }
?>
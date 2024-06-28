<?php
    class Modelleka extends CI_Model{

        function insertdata($data){           
            $sql =   $this->db->insert("dt01_receivedata_data_leka",$data);
            return $sql;
        }

        
        
    }
?>
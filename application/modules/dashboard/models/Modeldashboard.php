<?php
    class Modeldashboard extends CI_Model{

        function todolist($orgid,$userid){
            $query =
                    "
                        SELECT a.*,
                            CASE
                                WHEN DATE(a.DUE_DATE) <= CURDATE() THEN 1
                                WHEN YEAR(a.DUE_DATE) = YEAR(CURDATE()) AND WEEK(a.DUE_DATE) = WEEK(CURDATE()) THEN 2
                                WHEN MONTH(a.DUE_DATE) = MONTH(CURDATE()) THEN 3
                                WHEN YEAR(a.DUE_DATE) = YEAR(CURDATE()) THEN 4
                                ELSE 0
                            END AS DUEDATE
                        FROM dt01_hrd_todo_dt a
                        WHERE a.active='1'
                        AND a.org_id='".$orgid."'
                        AND a.user_id='".$userid."'
                        ORDER BY created_date DESC;
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }


    }
?>
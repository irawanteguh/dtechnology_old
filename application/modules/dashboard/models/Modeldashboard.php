<?php
    class Modeldashboard extends CI_Model{

        function todolist($orgid,$userid){
            $query =
                    "
                        SELECT X.*,
                                CASE 
                                    when X.DUEDATE = '1' THEN 'Today'
                                    when X.DUEDATE = '2' then CONCAT('Due in ', X.DAYS_DIFF, ' Days')
                                    when X.DUEDATE = '3' then CONCAT('Due in ', X.DAYS_DIFF, ' Days')
                                    else CONCAT('Due in ', X.WEEKS_DIFF, ' Weeks')
                                END KETERANGAN
                                
                        FROM(
                            SELECT a.*,
                                CASE
                                    WHEN DATE(a.DUE_DATE) <= CURDATE() THEN 1
                                    WHEN YEAR(a.DUE_DATE) = YEAR(CURDATE()) AND WEEK(a.DUE_DATE) = WEEK(CURDATE()) THEN 2
                                    WHEN MONTH(a.DUE_DATE) = MONTH(CURDATE()) THEN 3
                                    WHEN YEAR(a.DUE_DATE) = YEAR(CURDATE()) THEN 4
                                    ELSE 0
                                END DUEDATE,
                                DATEDIFF(a.DUE_DATE, CURDATE()) AS DAYS_DIFF,
                                TIMESTAMPDIFF(WEEK, CURDATE(), a.DUE_DATE) AS WEEKS_DIFF,
                                (select name from dt01_gen_user_data where active='1' and org_id='".$orgid."' and user_id=a.created_by)dibuatoleh
                                
                            FROM dt01_hrd_todo_dt a
                            WHERE a.active='1'
                            AND a.org_id='".$orgid."'
                            AND a.user_id='".$userid."'
                        )X
                        order by DUEDATE asc,  DUE_DATE  ASC
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function charttodolist($orgid,$userid){
            $query =
                    "
                        select CASE WHEN a.status = '0' THEN 'Waiting' ELSE 'Done' end status, count(todo_id)jml
                        from dt01_hrd_todo_dt a
                        where a.active='1'
                        group by status
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function datastaff($orgid,$userid){
            $query =
                    "
                        select a.*, upper(LEFT(a.name, 1)) initial,
                               (select position from dt01_hrd_position_ms where active='1' and org_id='".$orgid."' and position_id=a.position_id )position
                        from dt01_gen_user_data a
                        WHERE a.active='1'
                        AND   a.org_id='".$orgid."'
                        AND   a.atasan_id='".$userid."'
                
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function prioritas(){
            $query =
                    "
                        select '0' id, 'Low' status
                        union
                        select '1' id, 'Medium Low' status
                        union
                        select '2' id, 'Medium High' status
                        union
                        select '3' id, 'High' status
                        order by id asc
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function inserttodolist($data){           
            $sql =   $this->db->insert("dt01_hrd_todo_dt",$data);
            return $sql;
        }

        function updatetodolist($data, $todoid){           
            $sql =   $this->db->update("dt01_hrd_todo_dt",$data,array("TODO_ID"=>$todoid));
            return $sql;
        }


    }
?>
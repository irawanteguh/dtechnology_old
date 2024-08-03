<?php
    class Modeltilakaservice extends CI_Model{

        function checkdataapprovalkyc($orgid){
            $query =
                    "
                        select a.*
                        from dt01_gen_user_data a
                        where a.active = '1'
                        and   a.org_id = '".$orgid."'
                        and   a.certificate = '1'
                        and   a.user_identifier<>''
                        and   a.register_id<>''
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function dataupload($orgid,$status){
            $query =
                    "
                        select x.*
                        from(
                            select a.NO_FILE, STATUS_SIGN, SOURCE_FILE,
                                    (select USER_IDENTIFIER from dt01_gen_user_data   where org_id=a.org_id and active='1' and nik=a.assign)useridentifier,
                                    (select NAME            from dt01_gen_user_data   where org_id=a.org_id and active='1' and nik=a.assign)assignname,
                                    (select DOCUMENT_NAME   from dt01_gen_document_ms where org_id=a.org_id and active='1' and JENIS_DOC=a.JENIS_DOC)jenisdocumen
                            from dt01_gen_document_file_dt a
                            where a.active      = '1'
                            and   a.status_file = '1'
                            and   a.org_id      = '".$orgid."'
                            and   a.status_sign = '".$status."'
                        )x
                        where x.useridentifier<>''
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function userrequestsign($orgid,$status){
            $query =
                    "
                        select x.*
                        from(
                            select distinct a.assign,
                                    (select USER_IDENTIFIER from dt01_gen_user_data   where org_id=a.org_id and active='1' and nik=a.assign)useridentifier
                            from dt01_gen_document_file_dt a
                            where a.active='1'
                            and   a.org_id='".$orgid."'
                            and   a.status_sign ='".$status."'
                        )x
                        where x.useridentifier<>''
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function filerequestsign($orgid,$status,$assign){
            $query =
                    "
                        select x.*
                        from(
                            select a.NO_FILE, FILENAME, STATUS_SIGN,
                                    (select USER_IDENTIFIER from dt01_gen_user_data   where org_id=a.org_id and active='1' and nik=a.assign)useridentifier,
                                    (select NAME            from dt01_gen_user_data   where org_id=a.org_id and active='1' and nik=a.assign)assignname,
                                    (select DOCUMENT_NAME   from dt01_gen_document_ms where org_id=a.org_id and active='1' and JENIS_DOC=a.JENIS_DOC)jenisdocumen
                            from dt01_gen_document_file_dt a
                            where a.active      = '1'
                            and   a.org_id      = '".$orgid."'
                            and   a.status_sign = '".$status."'
                            and   a.assign      = '".$assign."'
                        )x
                        where x.useridentifier<>''
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function dataexecutesign($orgid,$status){
            $query =
                    "
                        select a.*, DATE_FORMAT(CREATED_DATE,'%d.%m.%Y %H:%i:%s')tgljam,
                                (select NAME from dt01_gen_user_data where active='1' and USER_IDENTIFIER=A.USER_IDENTIFIER)name,
                                (select NIK from dt01_gen_user_data where active='1' and USER_IDENTIFIER=A.USER_IDENTIFIER)nik,
                                (select IDENTITY_NO from dt01_gen_user_data where active='1' and USER_IDENTIFIER=A.USER_IDENTIFIER)noktp,
                                (select EMAIL from dt01_gen_user_data where active='1' and USER_IDENTIFIER=A.USER_IDENTIFIER)email,
                                (Select distinct source_file from dt01_gen_document_file_dt where active='1' and source_file<>'' and org_id=a.org_id and request_id=a.request_id)sourcefile
                        from dt01_gen_auth_url_sign_dt a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        ".$status."
                        order by created_date desc
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function checknofile($filename){
            $query =
                    "
                        select a.NO_FILE
                        from dt01_gen_document_file_dt a
                        where a.active='1'
                        and   a.filename='".$filename."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function updatefile($data,$nofile){           
            $sql =   $this->db->update("dt01_gen_document_file_dt",$data,array("NO_FILE"=>$nofile));
            return $sql;
        }

        function updatelinkdownload($data,$nofile){           
            $sql =   $this->db->update("dt01_gen_document_file_dt",$data,array("FILENAME"=>$nofile));
            return $sql;
        }

        function updaterequestid($data,$requestid){           
            $sql =   $this->db->update("dt01_gen_document_file_dt",$data,array("REQUEST_ID"=>$requestid));
            return $sql;
        }

        function insertauthurl($data){           
            $sql =   $this->db->insert("dt01_gen_auth_url_sign_dt",$data);
            return $sql;
        }

        function updateauthurl($data,$urlid){           
            $sql =   $this->db->update("dt01_gen_auth_url_sign_dt",$data,array("URL_ID"=>$urlid));
            return $sql;
        }

        function updatedatauseridentifier($data, $useridentifier){           
            $sql =   $this->db->update("dt01_gen_user_data",$data,array("USER_IDENTIFIER"=>$useridentifier));
            return $sql;
        }

    }
?>
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Repodocument extends CI_Controller {

		public function __construct(){
            parent:: __construct();
            rootsystem::system();
			$this->load->model("Modelrepodocument","md");
        }

		public function index(){
            $data = $this->loadcombobox();
            $this->template->load("template/template-sidebar","v_repodocument",$data);
		}

        public function loadcombobox(){
            $resultmasterdocument = $this->md->masterdocument($_SESSION['orgid']);
            $resultuserassign     = $this->md->userassign($_SESSION['orgid']);

            $document="";
            foreach($resultmasterdocument as $a ){
                $document.="<option value='".$a->jenis_doc."'>".$a->document_name."</option>";
            }

            $assign="";
            foreach($resultuserassign as $a ){
                $assign.="<option value='".$a->nik."'>".$a->name."</option>";
            }


            $data['document'] = $document;
            $data['assign']   = $assign;
            return $data;
		}

		public function dataupload(){
            $resultcheckroleaccess = $this->md->checkroleaccess($_SESSION['orgid'],$_SESSION['userid']);

            if(!empty($resultcheckroleaccess)){
                $parameter ="and a.org_id='".$_SESSION['orgid']."'";
            }else{
                $parameter ="and a.org_id='".$_SESSION['orgid']."' and assign='".$_SESSION['username']."'";
            }

            $result = $this->md->dataupload($parameter);
            
			if(!empty($result)){
                $json["responCode"]="00";
                $json["responHead"]="success";
                $json["responDesc"]="Data Di Temukan";
				$json['responResult']=$result;
            }else{
                $json["responCode"]="01";
                $json["responHead"]="info";
                $json["responDesc"]="Data Tidak Di Temukan";
            }

            echo json_encode($json);
        }

        public function signdocument(){
            $type   = $this->input->post("modal_sign_add_document_type");
            $assign = $this->input->post("modal_sign_add_assign");
            $info1  = $this->input->post("modal_sign_add_informasi1");
            $info2  = $this->input->post("modal_sign_add_informasi2");

            $data['org_id']        = $_SESSION['orgid'];
            $data['no_file']       = generateuuid();
            $data['status_file']   = "0";
            $data['jenis_doc']     = $type;
            $data['assign']        = $assign;
            $data['pasien_idx']    = $info1;
            $data['transaksi_idx'] = $info2;
            $data['created_by']    = $_SESSION['userid'];

            if($this->md->insertsigndocument($data)){
                $json['responCode']="00";
                $json['responHead']="success";
                $json['responDesc']="Data Added Successfully";
            } else {
                $json['responCode']="01";
                $json['responHead']="info";
                $json['responDesc']="Data Failed to Add";
            }
            

            echo json_encode($json);
        }

	}

?>
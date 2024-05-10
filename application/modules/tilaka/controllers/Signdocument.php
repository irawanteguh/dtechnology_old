<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Signdocument extends CI_Controller {

		public function __construct(){
            parent:: __construct();
            rootsystem::system();
			$this->load->model("Modelsigndocument","md");
        }

		public function index(){
            if(isset($_GET['request_id']) && isset($_GET['status'])){

                if($_GET['status']==="Sukses"){
                    $datafile['STATUS_SIGN']="2";
                    $data['STATUS']="1";
                    
                }else{
                    $datafile['STATUS_SIGN']="3";   
                    $data['STATUS']="4";
                }

                $this->md->updatefile($datafile,$_GET['request_id']);
                $this->md->updateauthurl($data,$_GET['request_id']);
                redirect("tilaka/signdocument");
            }else{
                $this->template->load("template/template-sidebar","v_signdocument");
            }
		}

		public function dataexecutesign(){
            $result = $this->md->dataexecutesign(ORG_ID);
            
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


	}

?>
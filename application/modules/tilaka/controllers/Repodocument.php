<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Repodocument extends CI_Controller {

		public function __construct(){
            parent:: __construct();
            rootsystem::system();
			$this->load->model("Modelrepodocument","md");
        }

		public function index(){
            $this->template->load("template/template-sidebar","v_repodocument");
		}

		public function dataupload(){
            $result = $this->md->dataupload($_SESSION['orgid']);
            
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
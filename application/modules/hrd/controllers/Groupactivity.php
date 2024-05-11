<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Groupactivity extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
            $this->load->model("Modelgroupactivity","md");
        }

		public function index(){
			$this->template->load("template/template-sidebar","v_groupactivity");
		}

        public function daftarjabatan(){
			$search = $this->input->post("search");
            $result = $this->md->daftarjabatan(ORG_ID,$search);
            
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

        public function daftarkegiatan(){
            $search     = $this->input->post("search");
            $positionid = $this->input->post("positionid");
            $result     = $this->md->daftarkegiatan(ORG_ID,$positionid,$search);
            
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
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Grouper extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
			$this->load->model("Modelgrouper","md");
        }

		public function index(){
			$this->template->load("template/template-sidebar","v_grouper");
		}

		public function listkunjungan(){
            $result = $this->md->listkunjungan();
            
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
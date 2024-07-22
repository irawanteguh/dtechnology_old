<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Masterclient extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
			$this->load->model("Modelmasterclient","md");
        }

		public function index(){
			$this->template->load("template/template-sidebar","v_masterclient");
		}

        public function listclient(){ 
            $result = $this->md->listclient();
            
            if(!empty($result)){
                $json['responCode']="00";
                $json['responHead']="success";
                $json['responDesc']="We Get The Data You Want";
                $json['responResult']=$result;
            }else{
                $json['responCode']="01";
                $json['responHead']="info";
                $json['responDesc']="We Didn't Get The Data You Wanted";
            }

            echo json_encode($json);
        }

	}
?>
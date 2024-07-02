<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Validation extends CI_Controller{

	public function __construct(){
		parent::__construct();
		rootsystem::system();
		$this->load->model("Modelvalidation", "md");
	}

	public function index(){
		$this->template->load("template/template-sidebar", "v_validation");
	}

    public function liststaff(){
        $result = $this->md->liststaff(ORG_ID,$_SESSION['userid']);
        
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

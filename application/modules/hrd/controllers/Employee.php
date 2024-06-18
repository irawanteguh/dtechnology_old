<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Employee extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
			$this->load->model("Modelemployee","md");
        }

		public function index(){
            $data = $this->loadcombobox();
			$this->template->load("template/template-sidebar","v_employee",$data);
		}

        public function loadcombobox(){
            $parameter = "and a.user_id <> '".$_SESSION['userid']."'";

            $resultnamaatasan    = $this->md->daftarkaryawan(ORG_ID,$parameter);
            $resultdaftarjabatan = $this->md->daftarjabatan(ORG_ID);
            $resulttype          = $this->md->type();

            $daftarkaryawan="";
            foreach($resultnamaatasan as $a ){
                $daftarkaryawan.="<option value='".$a->user_id."'>".$a->name."</option>";
            }

            $position="";
            foreach($resultdaftarjabatan as $a ){
                $position.="<option value='".$a->position_id."'>".$a->position." ".$a->fungsional."</option>";
            }

            $type="";
            foreach($resulttype as $a ){
                $type.="<option value='".$a->id."'>".$a->type."</option>";
            }

            $data['namaatasan'] = $daftarkaryawan;
            $data['position']   = $position;
            $data['type']       = $type;
            return $data;
		}

        public function masteremployee(){
            $result = $this->md->masteremployee(ORG_ID);
            
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
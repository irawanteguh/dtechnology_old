<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Activity extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
			$this->load->model("Modelactivity","md");
        }

		public function index(){
			$this->template->load("template/template-sidebar","v_activity");
		}

		public function masteractivity(){
            $result = $this->md->masteractivity(ORG_ID);
            
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

        public function hapusactivity(){
            $activityid     = $this->input->post("data_activity_id_hapus");

            $data['active']           = '0';
            $data['last_update_by']   = $_SESSION['userid'];
            $data['last_update_date'] = date("Y-m-d H:i:s");

            if($this->md->updatemasteactivity($activityid,$data)){
                $json['responCode']="00";
                $json['responHead']="success";
                $json['responDesc']="Hapus Modules Berhasil";
            } else {
                $json['responCode']="01";
                $json['responHead']="info";
                $json['responDesc']="Hapus Modules Gagal";
            
            }

            echo json_encode($json);
        }

        public function aktifactivity(){
            $activityid     = $this->input->post("data_activity_id_aktif");

            $data['active']           = '1';
            $data['last_update_by']   = $_SESSION['userid'];
            $data['last_update_date'] = date("Y-m-d H:i:s");

            if($this->md->updatemasteactivity($activityid,$data)){
                $json['responCode']="00";
                $json['responHead']="success";
                $json['responDesc']="Hapus Modules Berhasil";
            } else {
                $json['responCode']="01";
                $json['responHead']="info";
                $json['responDesc']="Hapus Modules Gagal";
            
            }

            echo json_encode($json);
        }

	}
?>
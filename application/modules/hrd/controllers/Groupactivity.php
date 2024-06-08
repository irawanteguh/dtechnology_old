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
			$search = "";
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
            $search     = "";
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

        public function mappingactivity(){
            $switchId    = $this->input->post("switchId");
            $switchValue = $this->input->post("switchValue");
            $positionid  = $this->input->post("positionid");

            if($switchValue==="true"){
                $data['active']="1";
            }else{
                $data['active']="0";
            }

            
            $resultcheckdata =  $this->md->checkdata($_SESSION['orgid'],$positionid,$switchId);

            if(!empty($resultcheckdata)){
                $data['last_update_by']=$_SESSION['userid'];
                if($this->md->updatemapping($positionid,$switchId,$data)){
                    $json["responCode"]="00";
                    $json["responHead"]="success";
                    $json["responDesc"]="Activity Success";
                }else{
                    $json["responCode"]="01";
                    $json["responHead"]="info";
                    $json["responDesc"]="Activity Field";
                }
            }else{
                $data['ORG_ID']       = $_SESSION['orgid'];
                $data['TRANSAKSI_ID'] = generateuuid();
                $data['POSITION_ID']  = $positionid;
                $data['ACTIVITY_ID']  = $switchId;
                $data['CREATED_BY']   = $_SESSION['userid'];

                if($this->md->insertmapping($data)){
                    $json["responCode"]="00";
                    $json["responHead"]="success";
                    $json["responDesc"]="Activity Success";
                }else{
                    $json["responCode"]="01";
                    $json["responHead"]="info";
                    $json["responDesc"]="Activity Field";
                }
            }

            echo json_encode($json);
        }
	}
?>
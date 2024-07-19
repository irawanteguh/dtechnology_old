<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Leka extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
			$this->load->model("Modelleka","md");
        }

		public function index(){
			$this->template->load("template/template-sidebar","v_leka");
		}

		public function listexamination(){
            $result = $this->md->listexamination();
            
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

        public function result(){
            $transid =$this->input->post("transid");
            $result = $this->md->result(ORG_ID,$transid);
            
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

        public function JSON(){
            $result = $this->md->resultJSON();

            $data['patientInformation']['name']                  = $result[0]->NAME;
            $data['patientInformation']['idnumber']              = $result[0]->ID_NUMBER;
            $data['patientInformation']['sex']                   = "";
            $data['patientInformation']['birthday']              = "";
            $data['patientInformation']['age']                   = "";
            $data['patientInformation']['address']               = "";
            $data['patientInformation']['nation']                = "";
            $data['result']['height_weight']['height']['value']  = "";
            $data['result']['height_weight']['height']['normal'] = "";
            $data['result']['height_weight']['height']['note']   = "";
            $data['result']['height_weight']['weight']['value']  = "";
            $data['result']['height_weight']['weight']['normal'] = "";
            $data['result']['height_weight']['weight']['note']   = "";
            $data['result']['height_weight']['bmi']['value']     = "";
            $data['result']['height_weight']['bmi']['normal']    = "";
            $data['result']['height_weight']['bmi']['note']      = "";
            $data['result']['body_fat']                          = "";
            $data['result']['blood_pressure']                    = "";
            $data['result']['blood_oxygen']                      = "";
            $data['result']['body_temperature']                  = "";
            $data['result']['lung_function']                     = "";
            $data['result']['fast_ECG']                          = "";
            $data['result']['blood_sugar']                       = "";
            $data['result']['waist_hip_rate']                    = "";
            $data['result']['uric_acid']                         = "";
            $data['result']['cholesterol']                       = "";
            $data['result']['TCM_constitution_identification']   = "";
            $data['result']['vision']                            = "";
            $data['result']['color_blindness']                   = "";
            $data['result']['psychological_tests']               = "";
            $data['result']['12_lead_ECG']                       = "";


            $json_data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents(FCPATH."/assets/log/aktivo/leka/download/json/" . $result[0]->TRANSAKSI_ID . '.json', $json_data);

            $json["responCode"] = "00";
            $json["responHead"] = "success";
            $json["responDesc"] = "Data Di Temukan";
            
            echo json_encode($json);

        }
	}
?>
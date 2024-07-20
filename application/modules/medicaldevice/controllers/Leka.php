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

        public function updateencounter(){
            $transid     = $this->input->post("data_leka_transid_edit");
            $encounterid = $this->input->post("data_leka_encounter_edit");

            $data['encounter_id']=$encounterid;

            
            if($this->md->updateencounter($data,$transid)){
                $json["responCode"]="00";
                $json["responHead"]="success";
                $json["responDesc"]="Data Berhasil Di Perbaharui";
            }else{
                $json["responCode"]="01";
                $json["responHead"]="info";
                $json["responDesc"]="Data Berhasil Di Gagal";
            }

            echo json_encode($json);
        }

        public function Sendsatusehat(){
            $transid =$this->input->post("transid");
            $result = $this->md->result(ORG_ID,$transid);
            
            $bodyFHIR       = [];
            $identifier1    = [];
            $identifier2    = [];
            $subject        = [];
            $categorycoding = [];

            $imtscale                   = [];
            $imtscaleresourcecodecoding = [];

            $categorycoding['code']    = "vital-signs";
            $categorycoding['display'] = "Vital Signs";
            $categorycoding['system']  = "http://terminology.hl7.org/CodeSystem/observation-category";
            $identifier1['system']     = "http://sys-ids.kemkes.go.id/observation/".ORGID_SATUSEHAT;
            $identifier1['use']        = "official";
            $identifier1['value']      = $body['examNo'];
            $identifier2['system']     = "http://sys-ids.kemkes.go.id/observation/".ORGID_SATUSEHAT;
            $identifier2['use']        = "official";
            $identifier2['value']      = generateuuid();
            $subject['display']        = $body['sfz']['name'];
            $subject['reference']      = "Patient/".$body['sfz']['idnumber'];

            $imtscaleresourcecodecoding['code']    = "39156-5";
            $imtscaleresourcecodecoding['display'] = "Body mass index (BMI) [Ratio]";
            $imtscaleresourcecodecoding['system']  = "http://loinc.org";

            $imtscaleresource['category'][]['coding'][]  = $categorycoding;
            $imtscaleresource['code']['coding'][]        = $imtscaleresourcecodecoding;
            // $imtscaleresource['effectiveDateTime']       = $a->TRIAGE;
            // $imtscaleresource['encounter']               = $encounter;
            $imtscaleresource['identifier'][]            = $identifier1;
            $imtscaleresource['identifier'][]            = $identifier2;
            // $imtscaleresource['issued']                  = $a->TRIAGE;
            // $imtscaleresource['performer'][]             = $performer;
            $imtscaleresource['resourceType']            = "Observation";
            $imtscaleresource['status']                  = "final";
            $imtscaleresource['subject']                 = $subject;
            $imtscaleresource['valueQuantity']['code']   = "kg/m2";
            $imtscaleresource['valueQuantity']['system'] = "http://unitsofmeasure.org";
            $imtscaleresource['valueQuantity']['unit']   = "kg/m2";
            $imtscaleresource['valueQuantity']['value']  = $body['hw']['bmi'];

            $imtscale['fullUrl']           = "urn:uuid:".generateuuid();
            $imtscale['request']['method'] = "POST";
            $imtscale['request']['url']    = "Observation";
            $imtscale['resource']          = $imtscaleresource;

            $bodyFHIR['resourceType'] = "Bundle";
            $bodyFHIR['type']         = "transaction";
            $bodyFHIR['entry'][]      = $imtscale;

            $response = Satusehat::postbundle(json_encode($bodyFHIR));
            $this->response($response,200);
        }

        public function JSON(){
            

        }
	}
?>
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
            $result = $this->md->resultJSON();

            $data['patientInformation']['name']                  = $result[0]->NAME;
            $data['patientInformation']['idnumber']              = $result[0]->ID_NUMBER;
            $data['patientInformation']['sex']                   = "";
            $data['patientInformation']['birthday']              = "";
            $data['patientInformation']['age']                   = "";
            $data['patientInformation']['address']               = "";
            $data['patientInformation']['nation']                = "";

            $data['result']['height_weight']['height']['value']                                                    = "";
            $data['result']['height_weight']['height']['normal']                                                   = "";
            $data['result']['height_weight']['height']['note']                                                     = "";
            $data['result']['height_weight']['weight']['value']                                                    = "";
            $data['result']['height_weight']['weight']['normal']                                                   = "";
            $data['result']['height_weight']['weight']['note']                                                     = "";
            $data['result']['height_weight']['bmi']['value']                                                       = "";
            $data['result']['height_weight']['bmi']['normal']                                                      = "";
            $data['result']['height_weight']['bmi']['note']                                                        = "";
            $data['result']['body_fat']['body fat rate']                                                           = "";
            $data['result']['body_fat']['basal metabolism']                                                        = "";
            $data['result']['body_fat']['body water content']                                                      = "";
            $data['result']['body_fat']['body water rate']                                                         = "";
            $data['result']['body_fat']['body fat content']                                                        = "";
            $data['result']['body_fat']['body muscle conten']                                                      = "";
            $data['result']['body_fat']['body muscle rate']                                                        = "";
            $data['result']['body_fat']['bone salt']                                                               = "";
            $data['result']['body_fat']['fat free mass']                                                           = "";
            $data['result']['body_fat']['Protein rate']                                                            = "";
            $data['result']['body_fat']['Intracellular fluid volume']                                              = "";
            $data['result']['body_fat']['Extracellular fluid volume']                                              = "";
            $data['result']['body_fat']['Intracellular fluid rate']                                                = "";
            $data['result']['blood_pressure']['systolic blood pressure']                                           = "";
            $data['result']['blood_pressure']['diastolic blood pressure']                                          = "";
            $data['result']['blood_pressure']['heart rate']                                                        = "";
            $data['result']['blood_oxygen']['blood oxygen']                                                        = "";
            $data['result']['body_temperature']['body temperature']                                                = "";
            $data['result']['lung_function']['Peak expiratory flow']                                               = "";
            $data['result']['lung_function']['Forced expiratory volume in the first second']                       = "";
            $data['result']['lung_function']['forced vital capacity']                                              = "";
            $data['result']['lung_function']['Forced expiratory volume in the first second/forced vital capacity'] = "";
            $data['result']['fast_ECG']['ECG result']                                                              = "";
            $data['result']['fast_ECG']['ECG waveform picture data']                                               = "";
            $data['result']['fast_ECG']['ECG waveform picture data length']                                        = "";
            $data['result']['blood_sugar']['Types of blood glucose measurement']                                   = "";
            $data['result']['blood_sugar']['blood glucose level']                                                  = "";
            $data['result']['waist_hip_rate']['waistline']                                                         = "";
            $data['result']['waist_hip_rate']['hipline']                                                           = "";
            $data['result']['waist_hip_rate']['waist hip rate']                                                    = "";
            $data['result']['uric_acid']['Uric acid value']                                                        = "";
            $data['result']['cholesterol']['Cholesterol value']                                                    = "";
            $data['result']['TCM_constitution_identification']['TCM constitution type']                            = "";
            $data['result']['TCM_constitution_identification']['Yang deficiency quality score']                    = "";
            $data['result']['TCM_constitution_identification']['Yin deficiency quality score']                     = "";
            $data['result']['TCM_constitution_identification']['Qi deficiency quality score']                      = "";
            $data['result']['TCM_constitution_identification']['Phlegm-dampness score']                            = "";
            $data['result']['TCM_constitution_identification']['Humidity and heat quality score']                  = "";
            $data['result']['TCM_constitution_identification']['Blood stasis score']                               = "";
            $data['result']['TCM_constitution_identification']['Special quality score']                            = "";
            $data['result']['TCM_constitution_identification']['Qi stagnation quality score']                      = "";
            $data['result']['TCM_constitution_identification']['Peace and quality score']                          = "";
            $data['result']['vision']['left eye']                                                                  = "";
            $data['result']['vision']['Visual acuity of the left eye']                                             = "";
            $data['result']['vision']['Left eye visual cues']                                                      = "";
            $data['result']['vision']['right eye']                                                                 = "";
            $data['result']['vision']['Visual acuity of the right eye']                                            = "";
            $data['result']['vision']['Visual cues in right eye']                                                  = "";
            $data['result']['color_blindness']['Color blindness result']                                           = "";
            $data['result']['psychological_tests']['UCLA Loneliness scale score']                                  = "";
            $data['result']['psychological_tests']['Geriatric depression Scale score']                             = "";
            $data['result']['psychological_tests']['Self-rated depression scale score']                            = "";
            $data['result']['psychological_tests']['Hamilton Anxiety Scale score']                                 = "";
            $data['result']['psychological_tests']['Emotional health test scores']                                 = "";
            $data['result']['psychological_tests']['Self-measured health rating scale score']                      = "";
            $data['result']['psychological_tests']['Life satisfaction Scale scor']                                 = "";
            $data['result']['psychological_tests']['Personality disorder personality test score']                  = "";
            $data['result']['psychological_tests']['PSTR Adult stress test scores']                                = "";
            $data['result']['psychological_tests']['Harvard sexuality test score']                                 = "";
            $data['result']['psychological_tests']['Emotional intelligence (EQ) test score']                       = "";
            $data['result']['psychological_tests']['Sleep status assessment score']                                = "";
            $data['result']['12_lead_ECG']['Ecg report picture data']                                              = "";
            $data['result']['12_lead_ECG']['diagnosis result']                                                     = "";
            $data['result']['12_lead_ECG']['heart rate']                                                           = "";
            $data['result']['12_lead_ECG']['P axis']                                                               = "";
            $data['result']['12_lead_ECG']['QRS axis']                                                             = "";
            $data['result']['12_lead_ECG']['T axis']                                                               = "";
            $data['result']['12_lead_ECG']['PR interval']                                                          = "";
            $data['result']['12_lead_ECG']['QRS time limit']                                                       = "";
            $data['result']['12_lead_ECG']['QT interval']                                                          = "";
            $data['result']['12_lead_ECG']['QTc interval']                                                         = "";
            $data['result']['12_lead_ECG']['RV5 value']                                                            = "";
            $data['result']['12_lead_ECG']['SV1 value']                                                            = "";
            $data['result']['12_lead_ECG']['sampling frequency']                                                   = "";
            $data['result']['12_lead_ECG']['Sampling duration']                                                    = "";


            $json_data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents(FCPATH."/assets/log/aktivo/leka/download/json/" . $result[0]->TRANSAKSI_ID . '.json', $json_data);

            $json["responCode"] = "00";
            $json["responHead"] = "success";
            $json["responDesc"] = "Data Di Temukan";
            
            echo json_encode($json);

        }
	}
?>
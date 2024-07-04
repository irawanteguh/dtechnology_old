<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    date_default_timezone_set('Asia/Jakarta');
    use Restserver\Libraries\REST_Controller;
    require APPPATH . '/libraries/REST_Controller.php';
    include FCPATH."assets/vendors/phpqrcode/qrlib.php";

    class Leka extends REST_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model("Modelleka","md");
        }

        public function auth_GET(){
            $response = Satusehat::oauth();
            $this->response($response,REST_Controller::HTTP_OK);
        }

        public function ReceiveData_POST(){
            $body = json_decode($this->input->raw_input_stream, true);

            $data['transaksi_id']=generateuuid();
            
            $data['name']               = $body['sfz']['name'];
            $data['gender']             = $body['sfz']['sex'];
            $data['nation']             = $body['sfz']['nation'];
            $data['qr_code']            = $body['sfz']['qrCode'];
            $data['birth_date']         = $body['sfz']['birthday'];
            $data['id_number']          = $body['sfz']['idnumber'];
            $data['age']                = $body['sfz']['age'];
            $data['address']            = $body['sfz']['address'];
            $data['id_card_photo_data'] = $body['sfz']['data'];
        
            $data['height'] = $body['hw']['height'];
            $data['weight'] = $body['hw']['weight'];
            $data['bmi']    = $body['hw']['bmi'];
        
            $data['body_fat_rate']              = $body['fat']['zflv'];
            $data['basal_metabolism']           = $body['fat']['jcdx'];
            $data['body_water_content']         = $body['fat']['tsfl'];
            $data['body_water_rate']            = $body['fat']['tsflv'];
            $data['body_fat_content']           = $body['fat']['zfl'];
            $data['body_muscle_content']        = $body['fat']['jrl'];
            $data['body_muscle_rate']           = $body['fat']['jrlv'];
            $data['bone_salt']                  = $body['fat']['gy'];
            $data['fat_free_mass']              = $body['fat']['qztz'];
            $data['protein_rate']               = $body['fat']['dbzlv'];
            $data['intracellular_fluid_volume'] = $body['fat']['xbnyl'];
            $data['extracellular_fluid_volume'] = $body['fat']['xbwyl'];
            $data['intracellular_fluid_rate']   = $body['fat']['xbnylv'];
            $data['extracellular_fluid_rate']   = $body['fat']['xbwylv'];
            $data['protein']                    = $body['fat']['dbz'];
            $data['visceral_fat_grade']         = $body['fat']['nzzf'];
            $data['bone_mass']                  = $body['fat']['gl'];
        
            $data['systolic_blood_pressure']        = $body['blood']['high'];
            $data['diastolic_blood_pressure']       = $body['blood']['low'];
            $data['heart_rate']                     = $body['blood']['rate'];
            $data['systolic_blood_pressure_value']  = $body['blood']['rhigh'];
            $data['diastolic_blood_pressure_value'] = $body['blood']['rlow'];
        
            $data['blood_oxygen'] = $body['spo2']['sp'];
        
            $data['body_temperature'] = $body['tiwen'];
        
            $data['ecg_result']                       = $body['ecg']['result'];
            $data['ecg_waveform_picture_data']        = $body['ecg']['data'];
            $data['ecg_waveform_picture_data_length'] = $body['ecg']['len'];
        
            $data['ecg_report_picture_data'] = $body['ecg12']['data'];
            $data['ecg_diagnosis_result']    = $body['ecg12']['ecg_result'];
            $data['ecg_heart_rate']          = $body['ecg12']['heart_rate'];
            $data['ecg_p_axis']              = $body['ecg12']['p_axis'];
            $data['ecg_qrs_axis']            = $body['ecg12']['qrs_axis'];
            $data['ecg_t_axis']              = $body['ecg12']['t_axis'];
            $data['ecg_pr_interval']         = $body['ecg12']['pr'];
            $data['ecg_qrs_time_limit']      = $body['ecg12']['qrs'];
            $data['ecg_qt_interval']         = $body['ecg12']['qt'];
            $data['ecg_qtc_interval']        = $body['ecg12']['qtc'];
            $data['ecg_rv5_value']           = $body['ecg12']['rv5'];
            $data['ecg_sv1_value']           = $body['ecg12']['sv1'];
            $data['ecg_sample_rate']         = $body['ecg12']['sample_rate'];
            $data['ecg_sample_duration']     = $body['ecg12']['sample_time'];
        
            $data['blood_glucose_type']  = $body['xt']['type'];
            $data['blood_glucose_level'] = $body['xt']['value'];
        
            $data['waistline']      = $body['ytb']['waist'];
            $data['hipline']        = $body['ytb']['hip'];
            $data['waist_hip_rate'] = $body['ytb']['whr'];
        
            $data['peak_expiratory_flow']        = $body['fgn']['pef'];
            $data['forced_expiratory_volume_1s'] = $body['fgn']['fev1'];
            $data['forced_vital_capacity']       = $body['fgn']['fvc'];
            $data['fev1_fvc_ratio']              = $body['fgn']['bz'];
        
            $data['uric_acid_value'] = $body['ns'];
        
            $data['cholesterol_value'] = $body['dgc'];
        
            $data['tcm_constitution_type'] = $body['zybs'];
        
            $data['left_eye_visual_acuity']  = $body['shili']['left_eye'];
            $data['right_eye_visual_acuity'] = $body['shili']['right_eye'];
        
            $data['color_blindness_result'] = $body['semang'];
        
            $data['ucla_loneliness_scale_score']                 = $body['xlcp']['ucla'];
            $data['geriatric_depression_scale_score']            = $body['xlcp']['lnyy'];
            $data['self_rated_depression_scale_score']           = $body['xlcp']['zpyy'];
            $data['hamilton_anxiety_scale_score']                = $body['xlcp']['hmdjl'];
            $data['emotional_health_test_scores']                = $body['xlcp']['qxjkd'];
            $data['self_measured_health_rating_scale_score']     = $body['xlcp']['zcjkpd'];
            $data['life_satisfaction_scale_score']               = $body['xlcp']['shmyd'];
            $data['personality_disorder_personality_test_score'] = $body['xlcp']['rgza'];
            $data['pstr_adult_stress_test_scores']               = $body['xlcp']['pstr'];
            $data['harvard_sexuality_test_score']                = $body['xlcp']['hfxx'];
            $data['emotional_intelligence_test_score']           = $body['xlcp']['eq'];
            $data['sleep_status_assessment_score']               = $body['xlcp']['smzkpg'];
        
            $data['device_code']                 = $body['deviceID'];
            $data['physical_examination_number'] = $body['examNo'];

            $this->md->insertdata($data);
            $this->response($body,200);
        }

        public function ReceiveDataFHIR_POST(){
            $body = json_decode($this->input->raw_input_stream, true);

            $data['transaksi_id']                                = generateuuid();
            $data['name']                                        = $body['sfz']['name'];
            $data['gender']                                      = $body['sfz']['sex'];
            $data['nation']                                      = $body['sfz']['nation'];
            $data['qr_code']                                     = $body['sfz']['qrCode'];
            $data['birth_date']                                  = $body['sfz']['birthday'];
            $data['id_number']                                   = $body['sfz']['idnumber'];
            $data['age']                                         = $body['sfz']['age'];
            $data['address']                                     = $body['sfz']['address'];
            $data['id_card_photo_data']                          = $body['sfz']['data'];
            $data['height']                                      = $body['hw']['height'];
            $data['weight']                                      = $body['hw']['weight'];
            $data['bmi']                                         = $body['hw']['bmi'];
            $data['body_fat_rate']                               = $body['fat']['zflv'];
            $data['basal_metabolism']                            = $body['fat']['jcdx'];
            $data['body_water_content']                          = $body['fat']['tsfl'];
            $data['body_water_rate']                             = $body['fat']['tsflv'];
            $data['body_fat_content']                            = $body['fat']['zfl'];
            $data['body_muscle_content']                         = $body['fat']['jrl'];
            $data['body_muscle_rate']                            = $body['fat']['jrlv'];
            $data['bone_salt']                                   = $body['fat']['gy'];
            $data['fat_free_mass']                               = $body['fat']['qztz'];
            $data['protein_rate']                                = $body['fat']['dbzlv'];
            $data['intracellular_fluid_volume']                  = $body['fat']['xbnyl'];
            $data['extracellular_fluid_volume']                  = $body['fat']['xbwyl'];
            $data['intracellular_fluid_rate']                    = $body['fat']['xbnylv'];
            $data['extracellular_fluid_rate']                    = $body['fat']['xbwylv'];
            $data['protein']                                     = $body['fat']['dbz'];
            $data['visceral_fat_grade']                          = $body['fat']['nzzf'];
            $data['bone_mass']                                   = $body['fat']['gl'];
            $data['systolic_blood_pressure']                     = $body['blood']['high'];
            $data['diastolic_blood_pressure']                    = $body['blood']['low'];
            $data['heart_rate']                                  = $body['blood']['rate'];
            $data['systolic_blood_pressure_value']               = $body['blood']['rhigh'];
            $data['diastolic_blood_pressure_value']              = $body['blood']['rlow'];
            $data['blood_oxygen']                                = $body['spo2']['sp'];
            $data['body_temperature']                            = $body['tiwen'];
            $data['ecg_result']                                  = $body['ecg']['result'];
            $data['ecg_waveform_picture_data']                   = $body['ecg']['data'];
            $data['ecg_waveform_picture_data_length']            = $body['ecg']['len'];
            $data['ecg_report_picture_data']                     = $body['ecg12']['data'];
            $data['ecg_diagnosis_result']                        = $body['ecg12']['ecg_result'];
            $data['ecg_heart_rate']                              = $body['ecg12']['heart_rate'];
            $data['ecg_p_axis']                                  = $body['ecg12']['p_axis'];
            $data['ecg_qrs_axis']                                = $body['ecg12']['qrs_axis'];
            $data['ecg_t_axis']                                  = $body['ecg12']['t_axis'];
            $data['ecg_pr_interval']                             = $body['ecg12']['pr'];
            $data['ecg_qrs_time_limit']                          = $body['ecg12']['qrs'];
            $data['ecg_qt_interval']                             = $body['ecg12']['qt'];
            $data['ecg_qtc_interval']                            = $body['ecg12']['qtc'];
            $data['ecg_rv5_value']                               = $body['ecg12']['rv5'];
            $data['ecg_sv1_value']                               = $body['ecg12']['sv1'];
            $data['ecg_sample_rate']                             = $body['ecg12']['sample_rate'];
            $data['ecg_sample_duration']                         = $body['ecg12']['sample_time'];
            $data['blood_glucose_type']                          = $body['xt']['type'];
            $data['blood_glucose_level']                         = $body['xt']['value'];
            $data['waistline']                                   = $body['ytb']['waist'];
            $data['hipline']                                     = $body['ytb']['hip'];
            $data['waist_hip_rate']                              = $body['ytb']['whr'];
            $data['peak_expiratory_flow']                        = $body['fgn']['pef'];
            $data['forced_expiratory_volume_1s']                 = $body['fgn']['fev1'];
            $data['forced_vital_capacity']                       = $body['fgn']['fvc'];
            $data['fev1_fvc_ratio']                              = $body['fgn']['bz'];
            $data['uric_acid_value']                             = $body['ns'];
            $data['cholesterol_value']                           = $body['dgc'];
            $data['tcm_constitution_type']                       = $body['zybs'];
            $data['left_eye_visual_acuity']                      = $body['shili']['left_eye'];
            $data['right_eye_visual_acuity']                     = $body['shili']['right_eye'];
            $data['color_blindness_result']                      = $body['semang'];
            $data['ucla_loneliness_scale_score']                 = $body['xlcp']['ucla'];
            $data['geriatric_depression_scale_score']            = $body['xlcp']['lnyy'];
            $data['self_rated_depression_scale_score']           = $body['xlcp']['zpyy'];
            $data['hamilton_anxiety_scale_score']                = $body['xlcp']['hmdjl'];
            $data['emotional_health_test_scores']                = $body['xlcp']['qxjkd'];
            $data['self_measured_health_rating_scale_score']     = $body['xlcp']['zcjkpd'];
            $data['life_satisfaction_scale_score']               = $body['xlcp']['shmyd'];
            $data['personality_disorder_personality_test_score'] = $body['xlcp']['rgza'];
            $data['pstr_adult_stress_test_scores']               = $body['xlcp']['pstr'];
            $data['harvard_sexuality_test_score']                = $body['xlcp']['hfxx'];
            $data['emotional_intelligence_test_score']           = $body['xlcp']['eq'];
            $data['sleep_status_assessment_score']               = $body['xlcp']['smzkpg'];
            $data['device_code']                                 = $body['deviceID'];
            $data['physical_examination_number']                 = $body['examNo'];


            $this->md->insertdata($data);

            //!!!!!!!!Start FHIR
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

    }

?>
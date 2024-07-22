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
            $body    = json_decode($this->input->raw_input_stream, true);
            $transid = generateuuid();

            $json_data = json_encode($body, JSON_PRETTY_PRINT);
            file_put_contents(FCPATH."/assets/log/aktivo/leka/" . $transid . '.json', $json_data);

            $data['ORG_ID']                   = ORG_ID;
            $data['TRANSAKSI_ID']             = $transid;
            $data['DEVICE_ID']                = isset($body['deviceID']) ? $body['deviceID'] : '';
            $data['EXAM_ID']                  = isset($body['examNo']) ? $body['examNo'] : '';
            $data['ID_NUMBER']                = isset($body['sfz']['idnumber']) ? $body['sfz']['idnumber'] : '';
            $data['NAME']                     = isset($body['sfz']['name']) ? $body['sfz']['name'] : '';
            $data['SEX']                      = isset($body['sfz']['sex']) ? $body['sfz']['sex'] : '';
            $data['BOD']                      = isset($body['sfz']['birthday']) ? $body['sfz']['birthday'] : '';
            $data['AGE']                      = isset($body['sfz']['age']) ? $body['sfz']['age'] : '';
            $data['NATION']                   = isset($body['sfz']['nation']) ? $body['sfz']['nation'] : '';
            $data['ADDRESS']                  = isset($body['sfz']['address']) ? $body['sfz']['address'] : '';
            $data['PHOTO']                    = isset($body['sfz']['data']) ? $body['sfz']['data'] : '';
            $data['QRCODE']                   = isset($body['sfz']['qrCode']) ? $body['sfz']['qrCode'] : '';
            $data['HEIGHT_VALUE']             = isset($body['hw']['height']) ? explode('#', $body['hw']['height'])[0] : '';
            $data['HEIGHT_NOTE']              = isset($body['hw']['height']) ? explode('#', $body['hw']['height'])[1] : '';
            $data['HEIGHT_NORMAL']            = isset($body['hw']['height']) ? explode('#', $body['hw']['height'])[2] : '';
            $data['WEIGHT_VALUE']             = isset($body['hw']['weight']) ? explode('#', $body['hw']['weight'])[0] : '';
            $data['WEIGHT_NOTE']              = isset($body['hw']['weight']) ? explode('#', $body['hw']['weight'])[1] : '';
            $data['WEIGHT_NORMAL']            = isset($body['hw']['weight']) ? explode('#', $body['hw']['weight'])[2] : '';
            $data['BMI_VALUE']                = isset($body['hw']['bmi']) ? explode('#', $body['hw']['bmi'])[0] : '';
            $data['BMI_NOTE']                 = isset($body['hw']['bmi']) ? explode('#', $body['hw']['bmi'])[1] : '';
            $data['BMI_NORMAL']               = isset($body['hw']['bmi']) ? explode('#', $body['hw']['bmi'])[2] : '';
            $data['FAT_DBZ_VALUE']            = isset($body['fat']['dbz']) ? explode('#', $body['fat']['dbz'])[0] : '';
            $data['FAT_DBZ_NOTE']             = isset($body['fat']['dbz']) ? explode('#', $body['fat']['dbz'])[1] : '';
            $data['FAT_DBZ_NORMAL']           = isset($body['fat']['dbz']) ? explode('#', $body['fat']['dbz'])[2] : '';
            $data['FAT_DBZLV_VALUE']          = isset($body['fat']['dbzlv']) ? explode('#', $body['fat']['dbzlv'])[0] : '';
            $data['FAT_DBZLV_NOTE']           = isset($body['fat']['dbzlv']) ? explode('#', $body['fat']['dbzlv'])[1] : '';
            $data['FAT_DBZLV_NORMAL']         = isset($body['fat']['dbzlv']) ? explode('#', $body['fat']['dbzlv'])[2] : '';
            $data['FAT_GL_VALUE']             = isset($body['fat']['gl']) ? explode('#', $body['fat']['gl'])[0] : '';
            $data['FAT_GL_NOTE']              = isset($body['fat']['gl']) ? explode('#', $body['fat']['gl'])[1] : '';
            $data['FAT_GL_NORMAL']            = isset($body['fat']['gl']) ? explode('#', $body['fat']['gl'])[2] : '';
            $data['FAT_GY_VALUE']             = isset($body['fat']['gy']) ? explode('#', $body['fat']['gy'])[0] : '';
            $data['FAT_GY_NOTE']              = isset($body['fat']['gy']) ? explode('#', $body['fat']['gy'])[1] : '';
            $data['FAT_GY_NORMAL']            = isset($body['fat']['gy']) ? explode('#', $body['fat']['gy'])[2] : '';
            $data['FAT_JCDX_VALUE']           = isset($body['fat']['jcdx']) ? explode('#', $body['fat']['jcdx'])[0] : '';
            $data['FAT_JCDX_NOTE']            = isset($body['fat']['jcdx']) ? explode('#', $body['fat']['jcdx'])[1] : '';
            $data['FAT_JCDX_NORMAL']          = isset($body['fat']['jcdx']) ? explode('#', $body['fat']['jcdx'])[2] : '';
            $data['FAT_JRL_VALUE']            = isset($body['fat']['jrl']) ? explode('#', $body['fat']['jrl'])[0] : '';
            $data['FAT_JRL_NOTE']             = isset($body['fat']['jrl']) ? explode('#', $body['fat']['jrl'])[1] : '';
            $data['FAT_JRL_NORMAL']           = isset($body['fat']['jrl']) ? explode('#', $body['fat']['jrl'])[2] : '';
            $data['FAT_JRLV_VALUE']           = isset($body['fat']['jrlv']) ? explode('#', $body['fat']['jrlv'])[0] : '';
            $data['FAT_JRLV_NOTE']            = isset($body['fat']['jrlv']) ? explode('#', $body['fat']['jrlv'])[1] : '';
            $data['FAT_JRLV_NORMAL']          = isset($body['fat']['jrlv']) ? explode('#', $body['fat']['jrlv'])[2] : '';
            $data['FAT_NZZF_VALUE']           = isset($body['fat']['nzzf']) ? explode('#', $body['fat']['nzzf'])[0] : '';
            $data['FAT_NZZF_NOTE']            = isset($body['fat']['nzzf']) ? explode('#', $body['fat']['nzzf'])[1] : '';
            $data['FAT_NZZF_NORMAL']          = isset($body['fat']['nzzf']) ? explode('#', $body['fat']['nzzf'])[2] : '';
            $data['FAT_QZTZ_VALUE']           = isset($body['fat']['qztz']) ? explode('#', $body['fat']['qztz'])[0] : '';
            $data['FAT_QZTZ_NOTE']            = isset($body['fat']['qztz']) ? explode('#', $body['fat']['qztz'])[1] : '';
            $data['FAT_QZTZ_NORMAL']          = isset($body['fat']['qztz']) ? explode('#', $body['fat']['qztz'])[2] : '';
            $data['FAT_TSFL_VALUE']           = isset($body['fat']['tsfl']) ? explode('#', $body['fat']['tsfl'])[0] : '';
            $data['FAT_TSFL_NOTE']            = isset($body['fat']['tsfl']) ? explode('#', $body['fat']['tsfl'])[1] : '';
            $data['FAT_TSFL_NORMAL']          = isset($body['fat']['tsfl']) ? explode('#', $body['fat']['tsfl'])[2] : '';
            $data['FAT_TSFLV_VALUE']          = isset($body['fat']['tsflv']) ? explode('#', $body['fat']['tsflv'])[0] : '';
            $data['FAT_TSFLV_NOTE']           = isset($body['fat']['tsflv']) ? explode('#', $body['fat']['tsflv'])[1] : '';
            $data['FAT_TSFLV_NORMAL']         = isset($body['fat']['tsflv']) ? explode('#', $body['fat']['tsflv'])[2] : '';
            $data['FAT_XBNYL_VALUE']          = isset($body['fat']['xbnyl']) ? explode('#', $body['fat']['xbnyl'])[0] : '';
            $data['FAT_XBNYL_NOTE']           = isset($body['fat']['xbnyl']) ? explode('#', $body['fat']['xbnyl'])[1] : '';
            $data['FAT_XBNYL_NORMAL']         = isset($body['fat']['xbnyl']) ? explode('#', $body['fat']['xbnyl'])[2] : '';
            $data['FAT_XBNYLV_VALUE']         = isset($body['fat']['xbnylv']) ? explode('#', $body['fat']['xbnylv'])[0] : '';
            $data['FAT_XBNYLV_NOTE']          = isset($body['fat']['xbnylv']) ? explode('#', $body['fat']['xbnylv'])[1] : '';
            $data['FAT_XBNYLV_NORMAL']        = isset($body['fat']['xbnylv']) ? explode('#', $body['fat']['xbnylv'])[2] : '';
            $data['FAT_XBWYL_VALUE']          = isset($body['fat']['xbwyl']) ? explode('#', $body['fat']['xbwyl'])[0] : '';
            $data['FAT_XBWYL_NOTE']           = isset($body['fat']['xbwyl']) ? explode('#', $body['fat']['xbwyl'])[1] : '';
            $data['FAT_XBWYL_NORMAL']         = isset($body['fat']['xbwyl']) ? explode('#', $body['fat']['xbwyl'])[2] : '';
            $data['FAT_XBWYLV_VALUE']         = isset($body['fat']['xbwylv']) ? explode('#', $body['fat']['xbwylv'])[0] : '';
            $data['FAT_XBWYLV_NOTE']          = isset($body['fat']['xbwylv']) ? explode('#', $body['fat']['xbwylv'])[1] : '';
            $data['FAT_XBWYLV_NORMAL']        = isset($body['fat']['xbwylv']) ? explode('#', $body['fat']['xbwylv'])[2] : '';
            $data['FAT_ZFL_VALUE']            = isset($body['fat']['zfl']) ? explode('#', $body['fat']['zfl'])[0] : '';
            $data['FAT_ZFL_NOTE']             = isset($body['fat']['zfl']) ? explode('#', $body['fat']['zfl'])[1] : '';
            $data['FAT_ZFL_NORMAL']           = isset($body['fat']['zfl']) ? explode('#', $body['fat']['zfl'])[2] : '';
            $data['FAT_ZFLV_VALUE']           = isset($body['fat']['zflv']) ? explode('#', $body['fat']['zflv'])[0] : '';
            $data['FAT_ZFLV_NOTE']            = isset($body['fat']['zflv']) ? explode('#', $body['fat']['zflv'])[1] : '';
            $data['FAT_ZFLV_NORMAL']          = isset($body['fat']['zflv']) ? explode('#', $body['fat']['zflv'])[2] : '';
            $data['BLOOD_HIGH_VALUE']         = isset($body['blood']['high']) ? explode('#', $body['blood']['high'])[0] : '';
            $data['BLOOD_HIGH_NOTE']          = isset($body['blood']['high']) ? explode('#', $body['blood']['high'])[1] : '';
            $data['BLOOD_HIGH_NORMAL']        = isset($body['blood']['high']) ? explode('#', $body['blood']['high'])[2] : '';
            $data['BLOOD_LOW_VALUE']          = isset($body['blood']['low']) ? explode('#', $body['blood']['low'])[0] : '';
            $data['BLOOD_LOW_NOTE']           = isset($body['blood']['low']) ? explode('#', $body['blood']['low'])[1] : '';
            $data['BLOOD_LOW_NORMAL']         = isset($body['blood']['low']) ? explode('#', $body['blood']['low'])[2] : '';
            $data['BLOOD_RATE_VALUE']         = isset($body['blood']['rate']) ? explode('#', $body['blood']['rate'])[0] : '';
            $data['BLOOD_RATE_NOTE']          = isset($body['blood']['rate']) ? explode('#', $body['blood']['rate'])[1] : '';
            $data['BLOOD_RATE_NORMAL']        = isset($body['blood']['rate']) ? explode('#', $body['blood']['rate'])[2] : '';
            $data['SPO2_SP_VALUE']            = isset($body['spo2']['sp']) ? explode('#', $body['spo2']['sp'])[0] : '';
            $data['SPO2_SP_NOTE']             = isset($body['spo2']['sp']) ? explode('#', $body['spo2']['sp'])[1] : '';
            $data['SPO2_SP_NORMAL']           = isset($body['spo2']['sp']) ? explode('#', $body['spo2']['sp'])[2] : '';
            $data['TIWEN_VALUE']              = isset($body['tiwen']) ? explode('#', $body['tiwen'])[0] : '';
            $data['TIWEN_NOTE']               = isset($body['tiwen']) ? explode('#', $body['tiwen'])[1] : '';
            $data['TIWEN_NORMAL']             = isset($body['tiwen']) ? explode('#', $body['tiwen'])[2] : '';
            $data['ECG_DATA_VALUE']           = isset($body['ecg']['data']) ? explode('#', $body['ecg']['data'])[0] : '';
            $data['ECG_RESULT_VALUE']         = isset($body['ecg']['result']) ? explode('#', $body['ecg']['result'])[0] : '';
            $data['ECG_XINLV_VALUE']          = isset($body['ecg']['xinlv']) ? explode('#', $body['ecg']['xinlv'])[0] : '';
            $data['ECG12_DATA_VALUE']         = isset($body['ecg12']['data']) ? explode('#', $body['ecg12']['data'])[0] : '';
            $data['ECG12_RESULT_VALUE']       = isset($body['ecg12']['ecg_result']) ? explode('#', $body['ecg12']['ecg_result'])[0] : '';
            $data['ECG12_RESULT_NOTE']        = isset($body['ecg12']['ecg_result']) ? explode('#', $body['ecg12']['ecg_result'])[1] : '';
            $data['ECG12_RESULT_NORMAL']      = isset($body['ecg12']['ecg_result']) ? explode('#', $body['ecg12']['ecg_result'])[2] : '';
            $data['ECG12_HEART_RATE_VALUE']   = isset($body['ecg12']['heart_rate']) ? explode('#', $body['ecg12']['heart_rate'])[0] : '';
            $data['ECG12_HEART_RATE_NOTE']    = isset($body['ecg12']['heart_rate']) ? explode('#', $body['ecg12']['heart_rate'])[1] : '';
            $data['ECG12_HEART_RATE_NORMAL']  = isset($body['ecg12']['heart_rate']) ? explode('#', $body['ecg12']['heart_rate'])[2] : '';
            $data['ECG12_P_AXIS_VALUE']       = isset($body['ecg12']['p_axis']) ? explode('#', $body['ecg12']['p_axis'])[0] : '';
            $data['ECG12_P_AXIS_NOTE']        = isset($body['ecg12']['p_axis']) ? explode('#', $body['ecg12']['p_axis'])[1] : '';
            $data['ECG12_P_AXIS_NORMAL']      = isset($body['ecg12']['p_axis']) ? explode('#', $body['ecg12']['p_axis'])[2] : '';
            $data['ECG12_PR_VALUE']           = isset($body['ecg12']['pr']) ? explode('#', $body['ecg12']['pr'])[0] : '';
            $data['ECG12_PR_NOTE']            = isset($body['ecg12']['pr']) ? explode('#', $body['ecg12']['pr'])[1] : '';
            $data['ECG12_PR_NORMAL']          = isset($body['ecg12']['pr']) ? explode('#', $body['ecg12']['pr'])[2] : '';
            $data['ECG12_QRS_VALUE']          = isset($body['ecg12']['qrs']) ? explode('#', $body['ecg12']['qrs'])[0] : '';
            $data['ECG12_QRS_NOTE']           = isset($body['ecg12']['qrs']) ? explode('#', $body['ecg12']['qrs'])[1] : '';
            $data['ECG12_QRS_NORMAL']         = isset($body['ecg12']['qrs']) ? explode('#', $body['ecg12']['qrs'])[2] : '';
            $data['ECG12_QRS_AXIS_VALUE']     = isset($body['ecg12']['qrs_axis']) ? explode('#', $body['ecg12']['qrs_axis'])[0] : '';
            $data['ECG12_QRS_AXIS_NOTE']      = isset($body['ecg12']['qrs_axis']) ? explode('#', $body['ecg12']['qrs_axis'])[1] : '';
            $data['ECG12_QRS_AXIS_NORMAL']    = isset($body['ecg12']['qrs_axis']) ? explode('#', $body['ecg12']['qrs_axis'])[2] : '';
            $data['ECG12_QT_VALUE']           = isset($body['ecg12']['qt']) ? explode('#', $body['ecg12']['qt'])[0] : '';
            $data['ECG12_QT_NOTE']            = isset($body['ecg12']['qt']) ? explode('#', $body['ecg12']['qt'])[1] : '';
            $data['ECG12_QT_NORMAL']          = isset($body['ecg12']['qt']) ? explode('#', $body['ecg12']['qt'])[2] : '';
            $data['ECG12_QTC_VALUE']          = isset($body['ecg12']['qtc']) ? explode('#', $body['ecg12']['qtc'])[0] : '';
            $data['ECG12_QTC_NOTE']           = isset($body['ecg12']['qtc']) ? explode('#', $body['ecg12']['qtc'])[1] : '';
            $data['ECG12_QTC_NORMAL']         = isset($body['ecg12']['qtc']) ? explode('#', $body['ecg12']['qtc'])[2] : '';
            $data['ECG12_RV5_VALUE']          = isset($body['ecg12']['rv5']) ? explode('#', $body['ecg12']['rv5'])[0] : '';
            $data['ECG12_RV5_NOTE']           = isset($body['ecg12']['rv5']) ? explode('#', $body['ecg12']['rv5'])[1] : '';
            $data['ECG12_RV5_NORMAL']         = isset($body['ecg12']['rv5']) ? explode('#', $body['ecg12']['rv5'])[2] : '';
            $data['ECG12_SAMPLE_RATE_VALUE']  = isset($body['ecg12']['sample_rate']) ? explode('#', $body['ecg12']['sample_rate'])[0] : '';
            $data['ECG12_SAMPLE_RATE_NOTE']   = isset($body['ecg12']['sample_rate']) ? explode('#', $body['ecg12']['sample_rate'])[1] : '';
            $data['ECG12_SAMPLE_RATE_NORMAL'] = isset($body['ecg12']['sample_rate']) ? explode('#', $body['ecg12']['sample_rate'])[2] : '';
            $data['ECG12_SAMPLE_TIME_VALUE']  = isset($body['ecg12']['sample_time']) ? explode('#', $body['ecg12']['sample_time'])[0] : '';
            $data['ECG12_SAMPLE_TIME_NOTE']   = isset($body['ecg12']['sample_time']) ? explode('#', $body['ecg12']['sample_time'])[1] : '';
            $data['ECG12_SAMPLE_TIME_NORMAL'] = isset($body['ecg12']['sample_time']) ? explode('#', $body['ecg12']['sample_time'])[2] : '';
            $data['ECG12_SV1_VALUE']          = isset($body['ecg12']['sv1']) ? explode('#', $body['ecg12']['sv1'])[0] : '';
            $data['ECG12_SV1_NOTE']           = isset($body['ecg12']['sv1']) ? explode('#', $body['ecg12']['sv1'])[1] : '';
            $data['ECG12_SV1_NORMAL']         = isset($body['ecg12']['sv1']) ? explode('#', $body['ecg12']['sv1'])[2] : '';
            $data['ECG12_T_AXIS_VALUE']       = isset($body['ecg12']['t_axis']) ? explode('#', $body['ecg12']['t_axis'])[0] : '';
            $data['ECG12_T_AXIS_NOTE']        = isset($body['ecg12']['t_axis']) ? explode('#', $body['ecg12']['t_axis'])[1] : '';
            $data['ECG12_T_AXIS_NORMAL']      = isset($body['ecg12']['t_axis']) ? explode('#', $body['ecg12']['t_axis'])[2] : '';
            $data['XT_TYPE_VALUE']            = isset($body['xt']['type']) ? explode('#', $body['xt']['type'])[0] : '';
            $data['XT_TYPE_NOTE']             = isset($body['xt']['type']) ? explode('#', $body['xt']['type'])[1] : '';
            $data['XT_TYPE_NORMAL']           = isset($body['xt']['type']) ? explode('#', $body['xt']['type'])[2] : '';
            $data['XT_VALUE_VALUE']           = isset($body['xt']['value']) ? explode('#', $body['xt']['value'])[0] : '';
            $data['XT_VALUE_NOTE']            = isset($body['xt']['value']) ? explode('#', $body['xt']['value'])[1] : '';
            $data['XT_VALUE_NORMAL']          = isset($body['xt']['value']) ? explode('#', $body['xt']['value'])[2] : '';
            $data['NS_VALUE']                 = isset($body['ns']) ? explode('#', $body['ns'])[0] : '';
            $data['NS_NOTE']                  = isset($body['ns']) ? explode('#', $body['ns'])[1] : '';
            $data['NS_NORMAL']                = isset($body['ns']) ? explode('#', $body['ns'])[2] : '';
            $data['DGC_VALUE']                = isset($body['dgc']) ? explode('#', $body['dgc'])[0] : '';
            $data['DGC_NOTE']                 = isset($body['dgc']) ? explode('#', $body['dgc'])[1] : '';
            $data['DGC_NORMAL']               = isset($body['dgc']) ? explode('#', $body['dgc'])[2] : '';
            $data['XHDB_HXBYJ_VALUE']         = isset($body['xhdb']['hxbyj']) ? explode('#', $body['xhdb']['hxbyj'])[0] : '';
            $data['XHDB_HXBYJ_NOTE']          = isset($body['xhdb']['hxbyj']) ? explode('#', $body['xhdb']['hxbyj'])[1] : '';
            $data['XHDB_HXBYJ_NORMAL']        = isset($body['xhdb']['hxbyj']) ? explode('#', $body['xhdb']['hxbyj'])[2] : '';
            $data['XHDB_VALUE_VALUE']         = isset($body['xhdb']['value']) ? explode('#', $body['xhdb']['value'])[0] : '';
            $data['XHDB_VALUE_NOTE']          = isset($body['xhdb']['value']) ? explode('#', $body['xhdb']['value'])[1] : '';
            $data['XHDB_VALUE_NORMAL']        = isset($body['xhdb']['value']) ? explode('#', $body['xhdb']['value'])[2] : '';
            $data['XZSX_CHD_VALUE']           = isset($body['xzsx']['chd']) ? explode('#', $body['xzsx']['chd'])[0] : '';
            $data['XZSX_CHD_NOTE']            = isset($body['xzsx']['chd']) ? explode('#', $body['xzsx']['chd'])[1] : '';
            $data['XZSX_CHD_NORMAL']          = isset($body['xzsx']['chd']) ? explode('#', $body['xzsx']['chd'])[2] : '';
            $data['XZSX_CHOL_VALUE']          = isset($body['xzsx']['chol']) ? explode('#', $body['xzsx']['chol'])[0] : '';
            $data['XZSX_CHOL_NOTE']           = isset($body['xzsx']['chol']) ? explode('#', $body['xzsx']['chol'])[1] : '';
            $data['XZSX_CHOL_NORMAL']         = isset($body['xzsx']['chol']) ? explode('#', $body['xzsx']['chol'])[2] : '';
            $data['XZSX_HDL_VALUE']           = isset($body['xzsx']['hdl']) ? explode('#', $body['xzsx']['hdl'])[0] : '';
            $data['XZSX_HDL_NOTE']            = isset($body['xzsx']['hdl']) ? explode('#', $body['xzsx']['hdl'])[1] : '';
            $data['XZSX_HDL_NORMAL']          = isset($body['xzsx']['hdl']) ? explode('#', $body['xzsx']['hdl'])[2] : '';
            $data['XZSX_LDL_VALUE']           = isset($body['xzsx']['ldl']) ? explode('#', $body['xzsx']['ldl'])[0] : '';
            $data['XZSX_LDL_NOTE']            = isset($body['xzsx']['ldl']) ? explode('#', $body['xzsx']['ldl'])[1] : '';
            $data['XZSX_LDL_NORMAL']          = isset($body['xzsx']['ldl']) ? explode('#', $body['xzsx']['ldl'])[2] : '';
            $data['XZSX_TG_VALUE']            = isset($body['xzsx']['tg']) ? explode('#', $body['xzsx']['tg'])[0] : '';
            $data['XZSX_TG_NOTE']             = isset($body['xzsx']['tg']) ? explode('#', $body['xzsx']['tg'])[1] : '';
            $data['XZSX_TG_NORMAL']           = isset($body['xzsx']['tg']) ? explode('#', $body['xzsx']['tg'])[2] : '';
            $data['NYFX_BIL_VALUE']           = isset($body['nyfx']['bil']) ? explode('#', $body['nyfx']['bil'])[0] : '';
            $data['NYFX_BIL_NOTE']            = isset($body['nyfx']['bil']) ? explode('#', $body['nyfx']['bil'])[1] : '';
            $data['NYFX_BIL_NORMAL']          = isset($body['nyfx']['bil']) ? explode('#', $body['nyfx']['bil'])[2] : '';
            $data['NYFX_BLD_VALUE']           = isset($body['nyfx']['bld']) ? explode('#', $body['nyfx']['bld'])[0] : '';
            $data['NYFX_BLD_NOTE']            = isset($body['nyfx']['bld']) ? explode('#', $body['nyfx']['bld'])[1] : '';
            $data['NYFX_BLD_NORMAL']          = isset($body['nyfx']['bld']) ? explode('#', $body['nyfx']['bld'])[2] : '';
            $data['NYFX_CA_VALUE']            = isset($body['nyfx']['ca']) ? explode('#', $body['nyfx']['ca'])[0] : '';
            $data['NYFX_CA_NOTE']             = isset($body['nyfx']['ca']) ? explode('#', $body['nyfx']['ca'])[1] : '';
            $data['NYFX_CA_NORMAL']           = isset($body['nyfx']['ca']) ? explode('#', $body['nyfx']['ca'])[2] : '';
            $data['NYFX_CRE_VALUE']           = isset($body['nyfx']['cre']) ? explode('#', $body['nyfx']['cre'])[0] : '';
            $data['NYFX_CRE_NOTE']            = isset($body['nyfx']['cre']) ? explode('#', $body['nyfx']['cre'])[1] : '';
            $data['NYFX_CRE_NORMAL']          = isset($body['nyfx']['cre']) ? explode('#', $body['nyfx']['cre'])[2] : '';
            $data['NYFX_GLU_VALUE']           = isset($body['nyfx']['glu']) ? explode('#', $body['nyfx']['glu'])[0] : '';
            $data['NYFX_GLU_NOTE']            = isset($body['nyfx']['glu']) ? explode('#', $body['nyfx']['glu'])[1] : '';
            $data['NYFX_GLU_NORMAL']          = isset($body['nyfx']['glu']) ? explode('#', $body['nyfx']['glu'])[2] : '';
            $data['NYFX_KET_VALUE']           = isset($body['nyfx']['ket']) ? explode('#', $body['nyfx']['ket'])[0] : '';
            $data['NYFX_KET_NOTE']            = isset($body['nyfx']['ket']) ? explode('#', $body['nyfx']['ket'])[1] : '';
            $data['NYFX_KET_NORMAL']          = isset($body['nyfx']['ket']) ? explode('#', $body['nyfx']['ket'])[2] : '';
            $data['NYFX_LEU_VALUE']           = isset($body['nyfx']['leu']) ? explode('#', $body['nyfx']['leu'])[0] : '';
            $data['NYFX_LEU_NOTE']            = isset($body['nyfx']['leu']) ? explode('#', $body['nyfx']['leu'])[1] : '';
            $data['NYFX_LEU_NORMAL']          = isset($body['nyfx']['leu']) ? explode('#', $body['nyfx']['leu'])[2] : '';
            $data['NYFX_MA_VALUE']            = isset($body['nyfx']['ma']) ? explode('#', $body['nyfx']['ma'])[0] : '';
            $data['NYFX_MA_NOTE']             = isset($body['nyfx']['ma']) ? explode('#', $body['nyfx']['ma'])[1] : '';
            $data['NYFX_MA_NORMAL']           = isset($body['nyfx']['ma']) ? explode('#', $body['nyfx']['ma'])[2] : '';
            $data['NYFX_NIT_VALUE']           = isset($body['nyfx']['nit']) ? explode('#', $body['nyfx']['nit'])[0] : '';
            $data['NYFX_NIT_NOTE']            = isset($body['nyfx']['nit']) ? explode('#', $body['nyfx']['nit'])[1] : '';
            $data['NYFX_NIT_NORMAL']          = isset($body['nyfx']['nit']) ? explode('#', $body['nyfx']['nit'])[2] : '';
            $data['NYFX_PH_VALUE']            = isset($body['nyfx']['ph']) ? explode('#', $body['nyfx']['ph'])[0] : '';
            $data['NYFX_PH_NOTE']             = isset($body['nyfx']['ph']) ? explode('#', $body['nyfx']['ph'])[1] : '';
            $data['NYFX_PH_NORMAL']           = isset($body['nyfx']['ph']) ? explode('#', $body['nyfx']['ph'])[2] : '';
            $data['NYFX_PRO_VALUE']           = isset($body['nyfx']['pro']) ? explode('#', $body['nyfx']['pro'])[0] : '';
            $data['NYFX_PRO_NOTE']            = isset($body['nyfx']['pro']) ? explode('#', $body['nyfx']['pro'])[1] : '';
            $data['NYFX_PRO_NORMAL']          = isset($body['nyfx']['pro']) ? explode('#', $body['nyfx']['pro'])[2] : '';
            $data['NYFX_SG_VALUE']            = isset($body['nyfx']['sg']) ? explode('#', $body['nyfx']['sg'])[0] : '';
            $data['NYFX_SG_NOTE']             = isset($body['nyfx']['sg']) ? explode('#', $body['nyfx']['sg'])[1] : '';
            $data['NYFX_SG_NORMAL']           = isset($body['nyfx']['sg']) ? explode('#', $body['nyfx']['sg'])[2] : '';
            $data['NYFX_UBG_VALUE']           = isset($body['nyfx']['ubg']) ? explode('#', $body['nyfx']['ubg'])[0] : '';
            $data['NYFX_UBG_NOTE']            = isset($body['nyfx']['ubg']) ? explode('#', $body['nyfx']['ubg'])[1] : '';
            $data['NYFX_UBG_NORMAL']          = isset($body['nyfx']['ubg']) ? explode('#', $body['nyfx']['ubg'])[2] : '';
            $data['NYFX_VC_VALUE']            = isset($body['nyfx']['vc']) ? explode('#', $body['nyfx']['vc'])[0] : '';
            $data['NYFX_VC_NOTE']             = isset($body['nyfx']['vc']) ? explode('#', $body['nyfx']['vc'])[1] : '';
            $data['NYFX_VC_NORMAL']           = isset($body['nyfx']['vc']) ? explode('#', $body['nyfx']['vc'])[2] : '';
            $data['ZYBS_VALUE']               = isset($body['zybs']) ? explode('；', $body['zybs'])[0] : '';
            $data['ZYBS_1']                   = explode('#', explode('；', $body['zybs'])[1])[1];
            $data['ZYBS_2']                   = explode('#', explode('；', $body['zybs'])[1])[2];
            $data['ZYBS_3']                   = explode('#', explode('；', $body['zybs'])[1])[3];
            $data['ZYBS_4']                   = explode('#', explode('；', $body['zybs'])[1])[4];
            $data['ZYBS_5']                   = explode('#', explode('；', $body['zybs'])[1])[5];
            $data['ZYBS_6']                   = explode('#', explode('；', $body['zybs'])[1])[6];
            $data['ZYBS_7']                   = explode('#', explode('；', $body['zybs'])[1])[7];
            $data['ZYBS_8']                   = explode('#', explode('；', $body['zybs'])[1])[8];
            $data['ZYBS_9']                   = explode('#', explode('；', $body['zybs'])[1])[9];
            $data['YTB_HIP_VALUE']            = isset($body['ytb']['hip']) ? explode('#', $body['ytb']['hip'])[0] : '';
            $data['YTB_HIP_NOTE']             = isset($body['ytb']['hip']) ? explode('#', $body['ytb']['hip'])[1] : '';
            $data['YTB_HIP_NORMAL']           = isset($body['ytb']['hip']) ? explode('#', $body['ytb']['hip'])[2] : '';
            $data['YTB_WAIST_VALUE']          = isset($body['ytb']['waist']) ? explode('#', $body['ytb']['waist'])[0] : '';
            $data['YTB_WAIST_NOTE']           = isset($body['ytb']['waist']) ? explode('#', $body['ytb']['waist'])[1] : '';
            $data['YTB_WAIST_NORMAL']         = isset($body['ytb']['waist']) ? explode('#', $body['ytb']['waist'])[2] : '';
            $data['YTB_WHR_VALUE']            = isset($body['ytb']['whr']) ? explode('#', $body['ytb']['whr'])[0] : '';
            $data['YTB_WHR_NOTE']             = isset($body['ytb']['whr']) ? explode('#', $body['ytb']['whr'])[1] : '';
            $data['YTB_WHR_NORMAL']           = isset($body['ytb']['whr']) ? explode('#', $body['ytb']['whr'])[2] : '';
            $data['FGN_BZ_VALUE']             = isset($body['fgn']['bz']) ? explode('#', $body['fgn']['bz'])[0] : '';
            $data['FGN_BZ_NOTE']              = isset($body['fgn']['bz']) ? explode('#', $body['fgn']['bz'])[1] : '';
            $data['FGN_BZ_NORMAL']            = isset($body['fgn']['bz']) ? explode('#', $body['fgn']['bz'])[2] : '';
            $data['FGN_FEV1_VALUE']           = isset($body['fgn']['fev1']) ? explode('#', $body['fgn']['fev1'])[0] : '';
            $data['FGN_FEV1_NOTE']            = isset($body['fgn']['fev1']) ? explode('#', $body['fgn']['fev1'])[1] : '';
            $data['FGN_FEV1_NORMAL']          = isset($body['fgn']['fev1']) ? explode('#', $body['fgn']['fev1'])[2] : '';
            $data['FGN_FVC_VALUE']            = isset($body['fgn']['fvc']) ? explode('#', $body['fgn']['fvc'])[0] : '';
            $data['FGN_FVC_NOTE']             = isset($body['fgn']['fvc']) ? explode('#', $body['fgn']['fvc'])[1] : '';
            $data['FGN_FVC_NORMAL']           = isset($body['fgn']['fvc']) ? explode('#', $body['fgn']['fvc'])[2] : '';
            $data['FGN_PEF_VALUE']            = isset($body['fgn']['pef']) ? explode('#', $body['fgn']['pef'])[0] : '';
            $data['FGN_PEF_NOTE']             = isset($body['fgn']['pef']) ? explode('#', $body['fgn']['pef'])[1] : '';
            $data['FGN_PEF_NORMAL']           = isset($body['fgn']['pef']) ? explode('#', $body['fgn']['pef'])[2] : '';
            $data['SHILI_LEFT_EYE_VALUE']     = isset($body['shili']['left_eye']) ? explode('#', $body['shili']['left_eye'])[0] : '';
            $data['SHILI_LEFT_EYE_NOTE']      = isset($body['shili']['left_eye']) ? explode('#', $body['shili']['left_eye'])[1] : '';
            $data['SHILI_LEFT_EYE_NORMAL']    = isset($body['shili']['left_eye']) ? explode('#', $body['shili']['left_eye'])[2] : '';
            $data['SHILI_RIGHT_EYE_VALUE']    = isset($body['shili']['right_eye']) ? explode('#', $body['shili']['right_eye'])[0] : '';
            $data['SHILI_RIGHT_EYE_NOTE']     = isset($body['shili']['right_eye']) ? explode('#', $body['shili']['right_eye'])[1] : '';
            $data['SHILI_RIGHT_EYE_NORMAL']   = isset($body['shili']['right_eye']) ? explode('#', $body['shili']['right_eye'])[2] : '';
            $data['SEMANG_VALUE']             = isset($body['semang']) ? explode('#', $body['semang'])[0] : '';
            $data['SEMANG_NOTE']              = isset($body['semang']) ? explode('#', $body['semang'])[1] : '';
            $data['SEMANG_NORMAL']            = isset($body['semang']) ? explode('#', $body['semang'])[2] : '';
            $data['XLCP_HMDJL_VALUE']         = isset($body['xlcp']['hmdjl']) ? explode('#', $body['xlcp']['hmdjl'])[0] : '';
            $data['XLCP_HMDJL_NOTE']          = isset($body['xlcp']['hmdjl']) ? explode('#', $body['xlcp']['hmdjl'])[1] : '';
            $data['XLCP_HMDJL_NORMAL']        = isset($body['xlcp']['hmdjl']) ? explode('#', $body['xlcp']['hmdjl'])[2] : '';
            $data['XLCP_LNYY_VALUE']          = isset($body['xlcp']['lnyy']) ? explode('#', $body['xlcp']['lnyy'])[0] : '';
            $data['XLCP_LNYY_NOTE']           = isset($body['xlcp']['lnyy']) ? explode('#', $body['xlcp']['lnyy'])[1] : '';
            $data['XLCP_LNYY_NORMAL']         = isset($body['xlcp']['lnyy']) ? explode('#', $body['xlcp']['lnyy'])[2] : '';
            $data['XLCP_QXJKD_VALUE']         = isset($body['xlcp']['qxjkd']) ? explode('#', $body['xlcp']['qxjkd'])[0] : '';
            $data['XLCP_QXJKD_NOTE']          = isset($body['xlcp']['qxjkd']) ? explode('#', $body['xlcp']['qxjkd'])[1] : '';
            $data['XLCP_QXJKD_NORMAL']        = isset($body['xlcp']['qxjkd']) ? explode('#', $body['xlcp']['qxjkd'])[2] : '';
            $data['XLCP_RGZA_VALUE']          = isset($body['xlcp']['rgza']) ? explode('#', $body['xlcp']['rgza'])[0] : '';
            $data['XLCP_RGZA_NOTE']           = isset($body['xlcp']['rgza']) ? explode('#', $body['xlcp']['rgza'])[1] : '';
            $data['XLCP_RGZA_NORMAL']         = isset($body['xlcp']['rgza']) ? explode('#', $body['xlcp']['rgza'])[2] : '';
            $data['XLCP_SHMYD_VALUE']         = isset($body['xlcp']['shmyd']) ? explode('#', $body['xlcp']['shmyd'])[0] : '';
            $data['XLCP_SHMYD_NOTE']          = isset($body['xlcp']['shmyd']) ? explode('#', $body['xlcp']['shmyd'])[1] : '';
            $data['XLCP_SHMYD_NORMAL']        = isset($body['xlcp']['shmyd']) ? explode('#', $body['xlcp']['shmyd'])[2] : '';
            $data['XLCP_ZCJKPD_VALUE']        = isset($body['xlcp']['zcjkpd']) ? explode('#', $body['xlcp']['zcjkpd'])[0] : '';
            $data['XLCP_ZCJKPD_NOTE']         = isset($body['xlcp']['zcjkpd']) ? explode('#', $body['xlcp']['zcjkpd'])[1] : '';
            $data['XLCP_ZCJKPD_NORMAL']       = isset($body['xlcp']['zcjkpd']) ? explode('#', $body['xlcp']['zcjkpd'])[2] : '';
            $data['XLCP_EQ_VALUE']            = isset($body['xlcp']['eq']) ? explode('#', $body['xlcp']['eq'])[0] : '';
            $data['XLCP_EQ_NOTE']             = isset($body['xlcp']['eq']) ? explode('#', $body['xlcp']['eq'])[1] : '';
            $data['XLCP_EQ_NORMAL']           = isset($body['xlcp']['eq']) ? explode('#', $body['xlcp']['eq'])[2] : '';
            $data['XLCP_HFXX_VALUE']          = isset($body['xlcp']['hfxx']) ? explode('#', $body['xlcp']['hfxx'])[0] : '';
            $data['XLCP_HFXX_NOTE']           = isset($body['xlcp']['hfxx']) ? explode('#', $body['xlcp']['hfxx'])[1] : '';
            $data['XLCP_HFXX_NORMAL']         = isset($body['xlcp']['hfxx']) ? explode('#', $body['xlcp']['hfxx'])[2] : '';
            $data['XLCP_PSTR_VALUE']          = isset($body['xlcp']['pstr']) ? explode('#', $body['xlcp']['pstr'])[0] : '';
            $data['XLCP_PSTR_NOTE']           = isset($body['xlcp']['pstr']) ? explode('#', $body['xlcp']['pstr'])[1] : '';
            $data['XLCP_PSTR_NORMAL']         = isset($body['xlcp']['pstr']) ? explode('#', $body['xlcp']['pstr'])[2] : '';
            $data['XLCP_SMZKPG_VALUE']        = isset($body['xlcp']['smzkpg']) ? explode('#', $body['xlcp']['smzkpg'])[0] : '';
            $data['XLCP_SMZKPG_NOTE']         = isset($body['xlcp']['smzkpg']) ? explode('#', $body['xlcp']['smzkpg'])[1] : '';
            $data['XLCP_SMZKPG_NORMAL']       = isset($body['xlcp']['smzkpg']) ? explode('#', $body['xlcp']['smzkpg'])[2] : '';
            $data['XLCP_UCLA_VALUE']          = isset($body['xlcp']['ucla']) ? explode('#', $body['xlcp']['ucla'])[0] : '';
            $data['XLCP_UCLA_NOTE']           = isset($body['xlcp']['ucla']) ? explode('#', $body['xlcp']['ucla'])[1] : '';
            $data['XLCP_UCLA_NORMAL']         = isset($body['xlcp']['ucla']) ? explode('#', $body['xlcp']['ucla'])[2] : '';
            $data['XLCP_ZPYY_VALUE']          = isset($body['xlcp']['zpyy']) ? explode('#', $body['xlcp']['zpyy'])[0] : '';
            $data['XLCP_ZPYY_NOTE']           = isset($body['xlcp']['zpyy']) ? explode('#', $body['xlcp']['zpyy'])[1] : '';
            $data['XLCP_ZPYY_NORMAL']         = isset($body['xlcp']['zpyy']) ? explode('#', $body['xlcp']['zpyy'])[2] : '';

            if($this->md->insertdata($data)){
                $response['code'] = "1";
                $response['msg']  = "successful";
            }else{
                $response['code'] = "0";
                $response['msg']  = "Unsuccessful";
            }


            $this->response($response,200);
        }

        public function GetLeka_GET(){

            $result =$this->md->resultexamination();

            $data['patientInformation']['transaksiId'] = $result[0]->TRANSAKSI_ID;
            $data['patientInformation']['examId']      = $result[0]->EXAM_ID;
            $data['patientInformation']['nation']      = $result[0]->NATION;
            $data['patientInformation']['name']        = $result[0]->NAME;
            $data['patientInformation']['idnumber']    = $result[0]->ID_NUMBER;
            $data['patientInformation']['sex']         = $result[0]->SEX;
            $data['patientInformation']['birthday']    = $result[0]->BOD;
            $data['patientInformation']['age']         = $result[0]->AGE;
            $data['patientInformation']['address']     = $result[0]->ADDRESS;
            $data['patientInformation']['nation']      = $result[0]->NATION;

            $data['satuSehat']['Encounter_id']                = $result[0]->ENCOUNTER_ID;

            $data['result']['height_weight']['height']['value']  = $result[0]->HEIGHT_VALUE;
            $data['result']['height_weight']['height']['normal'] = $result[0]->HEIGHT_NORMAL;
            $data['result']['height_weight']['height']['note']   = $result[0]->HEIGHT_NOTE;
            $data['result']['height_weight']['height']['unit']   = "";
            $data['result']['height_weight']['weight']['value']  = $result[0]->WEIGHT_VALUE;
            $data['result']['height_weight']['weight']['normal'] = $result[0]->WEIGHT_NORMAL;
            $data['result']['height_weight']['weight']['note']   = $result[0]->WEIGHT_NOTE;
            $data['result']['height_weight']['weight']['unit']   = "";
            $data['result']['height_weight']['bmi']['value']     = $result[0]->BMI_VALUE;
            $data['result']['height_weight']['bmi']['normal']    = $result[0]->BMI_NORMAL;
            $data['result']['height_weight']['bmi']['note']      = $result[0]->BMI_NOTE;
            $data['result']['height_weight']['bmi']['unit']      = "";
            //    // $data['result']['height_weight']['height']['value']  = $result[0]->HEIGHT_VALUE;
            $data['result']['height_weight']['height']['normal'] = $result[0]->HEIGHT_NORMAL;
            $data['result']['height_weight']['height']['note']   = $result[0]->HEIGHT_NOTE;
            $data['result']['height_weight']['height']['unit']   = "";
            $data['result']['height_weight']['weight']['value']  = $result[0]->WEIGHT_VALUE;
            $data['result']['height_weight']['weight']['normal'] = $result[0]->WEIGHT_NORMAL;
            $data['result']['height_weight']['weight']['note']   = $result[0]->WEIGHT_NOTE;
            $data['result']['height_weight']['weight']['unit']   = "";
            $data['result']['height_weight']['bmi']['value']     = $result[0]->BMI_VALUE;
            $data['result']['height_weight']['bmi']['normal']    = $result[0]->BMI_NORMAL;
            $data['result']['height_weight']['bmi']['note']      = $result[0]->BMI_NOTE;
            $data['result']['height_weight']['bmi']['unit']      = "";

            $data['result']['body_fat']['body_fat_rate']['value']     = $result[0]->FAT_ZFLV_VALUE;
            $data['result']['body_fat']['body_fat_rate']['normal']    = $result[0]->FAT_ZFLV_NORMAL;
            $data['result']['body_fat']['body_fat_rate']['note']      = $result[0]->FAT_ZFLV_NOTE;
            $data['result']['body_fat']['body_fat_rate']['unit']      = "";
            $data['result']['body_fat']['basal_metabolism']['value']  = $result[0]->FAT_JCDX_VALUE;
            $data['result']['body_fat']['basal_metabolism']['normal'] = $result[0]->FAT_JCDX_NORMAL;
            $data['result']['body_fat']['basal_metabolism']['note']   = $result[0]->FAT_JCDX_NOTE;
            $data['result']['body_fat']['basal_metabolism']['unit']   = "";

            $data['result']['body_fat']['body_water_content']['value'] = "";
            $data['result']['body_fat']['body_water_content']['normal'] = "";
            $data['result']['body_fat']['body_water_content']['note'] = "";
            $data['result']['body_fat']['body_water_content']['unit'] = "";

            $data['result']['body_fat']['body_water_rate']['value'] = "";
            $data['result']['body_fat']['body_water_rate']['normal'] = "";
            $data['result']['body_fat']['body_water_rate']['note'] = "";
            $data['result']['body_fat']['body_water_rate']['unit'] = "";

            $data['result']['body_fat']['body_fat_content']['value'] = "";
            $data['result']['body_fat']['body_fat_content']['normal'] = "";
            $data['result']['body_fat']['body_fat_content']['note'] = "";
            $data['result']['body_fat']['body_fat_content']['unit'] = "";

            $data['result']['body_fat']['body_muscle_content']['value'] = "";
            $data['result']['body_fat']['body_muscle_content']['normal'] = "";
            $data['result']['body_fat']['body_muscle_content']['note'] = "";
            $data['result']['body_fat']['body_muscle_content']['unit'] = "";

            $data['result']['body_fat']['body_muscle_rate']['value'] = "";
            $data['result']['body_fat']['body_muscle_rate']['normal'] = "";
            $data['result']['body_fat']['body_muscle_rate']['note'] = "";
            $data['result']['body_fat']['body_muscle_rate']['unit'] = "";

            $data['result']['body_fat']['bone_salt']['value'] = "";
            $data['result']['body_fat']['bone_salt']['normal'] = "";
            $data['result']['body_fat']['bone_salt']['note'] = "";
            $data['result']['body_fat']['bone_salt']['unit'] = "";

            $data['result']['body_fat']['fat_free_mass']['value'] = "";
            $data['result']['body_fat']['fat_free_mass']['normal'] = "";
            $data['result']['body_fat']['fat_free_mass']['note'] = "";
            $data['result']['body_fat']['fat_free_mass']['unit'] = "";

            $data['result']['body_fat']['protein_rate']['value'] = "";
            $data['result']['body_fat']['protein_rate']['normal'] = "";
            $data['result']['body_fat']['protein_rate']['note'] = "";
            $data['result']['body_fat']['protein_rate']['unit'] = "";

            $data['result']['body_fat']['intracellular_fluid_volume']['value'] = "";
            $data['result']['body_fat']['intracellular_fluid_volume']['normal'] = "";
            $data['result']['body_fat']['intracellular_fluid_volume']['note'] = "";
            $data['result']['body_fat']['intracellular_fluid_volume']['unit'] = "";

            $data['result']['body_fat']['extracellular_fluid_volume']['value'] = "";
            $data['result']['body_fat']['extracellular_fluid_volume']['normal'] = "";
            $data['result']['body_fat']['extracellular_fluid_volume']['note'] = "";
            $data['result']['body_fat']['extracellular_fluid_volume']['unit'] = "";

            $data['result']['body_fat']['intracellular_fluid_rate']['value'] = "";
            $data['result']['body_fat']['intracellular_fluid_rate']['normal'] = "";
            $data['result']['body_fat']['intracellular_fluid_rate']['note'] = "";
            $data['result']['body_fat']['intracellular_fluid_rate']['unit'] = "";

            $data['result']['blood_pressure']['systolic_blood_pressure']['value']   = $result[0]->BLOOD_HIGH_VALUE;
            $data['result']['blood_pressure']['systolic_blood_pressure']['normal']  = $result[0]->BLOOD_HIGH_NORMAL;
            $data['result']['blood_pressure']['systolic_blood_pressure']['note']    = $result[0]->BLOOD_HIGH_NOTE;
            $data['result']['blood_pressure']['systolic_blood_pressure']['unit']    = "";
            $data['result']['blood_pressure']['diastolic_blood_pressure']['value']  = $result[0]->BLOOD_LOW_VALUE;
            $data['result']['blood_pressure']['diastolic_blood_pressure']['normal'] = $result[0]->BLOOD_LOW_NORMAL;
            $data['result']['blood_pressure']['diastolic_blood_pressure']['note']   = $result[0]->BLOOD_LOW_NOTE;
            $data['result']['blood_pressure']['diastolic_blood_pressure']['unit']   = "";
            $data['result']['blood_pressure']['heart_rate']['value']                = $result[0]->BLOOD_RATE_VALUE;
            $data['result']['blood_pressure']['heart_rate']['normal']               = $result[0]->BLOOD_RATE_NORMAL;
            $data['result']['blood_pressure']['heart_rate']['note']                 = $result[0]->BLOOD_RATE_NOTE;
            $data['result']['blood_pressure']['heart_rate']['unit']                 = "";

            $data['result']['blood_oxygen']['blood_oxygen']['value']  = $result[0]->SPO2_SP_VALUE;
            $data['result']['blood_oxygen']['blood_oxygen']['normal'] = $result[0]->SPO2_SP_NORMAL;
            $data['result']['blood_oxygen']['blood_oxygen']['note']   = $result[0]->SPO2_SP_NOTE;
            $data['result']['blood_oxygen']['blood_oxygen']['unit']   = "%";

            $data['result']['body_temperature']['body_temperature']['value']  = $result[0]->TIWEN_VALUE;
            $data['result']['body_temperature']['body_temperature']['normal'] = $result[0]->TIWEN_NORMAL;
            $data['result']['body_temperature']['body_temperature']['note']   = $result[0]->TIWEN_NOTE;
            $data['result']['body_temperature']['body_temperature']['unit']   = "";

            $data['result']['lung_function']['peak_expiratory_flow']['value'] = "";
            $data['result']['lung_function']['peak_expiratory_flow']['normal'] = "";
            $data['result']['lung_function']['peak_expiratory_flow']['note'] = "";
            $data['result']['lung_function']['peak_expiratory_flow']['unit'] = "";

            $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second']['value'] = "";
            $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second']['normal'] = "";
            $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second']['note'] = "";
            $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second']['unit'] = "";

            $data['result']['lung_function']['forced_vital_capacity']['value'] = "";
            $data['result']['lung_function']['forced_vital_capacity']['normal'] = "";
            $data['result']['lung_function']['forced_vital_capacity']['note'] = "";
            $data['result']['lung_function']['forced_vital_capacity']['unit'] = "";

            $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second/forced_vital_capacity']['value'] = "";
            $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second/forced_vital_capacity']['normal'] = "";
            $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second/forced_vital_capacity']['note'] = "";
            $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second/forced_vital_capacity']['unit'] = "";

            $data['result']['fast_ECG']['ECG_result']['value'] = "";
            $data['result']['fast_ECG']['ECG_result']['normal'] = "";
            $data['result']['fast_ECG']['ECG_result']['note'] = "";
            $data['result']['fast_ECG']['ECG_result']['unit'] = "";

            $data['result']['fast_ECG']['ECG_waveform_picture_data']['value'] = "";
            $data['result']['fast_ECG']['ECG_waveform_picture_data']['normal'] = "";
            $data['result']['fast_ECG']['ECG_waveform_picture_data']['note'] = "";
            $data['result']['fast_ECG']['ECG_waveform_picture_data']['unit'] = "";

            $data['result']['fast_ECG']['ECG_waveform_picture_data_length']['value'] = "";
            $data['result']['fast_ECG']['ECG_waveform_picture_data_length']['normal'] = "";
            $data['result']['fast_ECG']['ECG_waveform_picture_data_length']['note'] = "";
            $data['result']['fast_ECG']['ECG_waveform_picture_data_length']['unit'] = "";

            $data['result']['blood_sugar']['types_of_blood_glucose_measurement']['value'] = "";
            $data['result']['blood_sugar']['types_of_blood_glucose_measurement']['normal'] = "";
            $data['result']['blood_sugar']['types_of_blood_glucose_measurement']['note'] = "";
            $data['result']['blood_sugar']['types_of_blood_glucose_measurement']['unit'] = "";

            $data['result']['blood_sugar']['blood_glucose_level']['value'] = "";
            $data['result']['blood_sugar']['blood_glucose_level']['normal'] = "";
            $data['result']['blood_sugar']['blood_glucose_level']['note'] = "";
            $data['result']['blood_sugar']['blood_glucose_level']['unit'] = "";

            $data['result']['waist_hip_rate']['waistline']['value'] = "";
            $data['result']['waist_hip_rate']['waistline']['normal'] = "";
            $data['result']['waist_hip_rate']['waistline']['note'] = "";
            $data['result']['waist_hip_rate']['waistline']['unit'] = "";

            $data['result']['waist_hip_rate']['hipline']['value'] = "";
            $data['result']['waist_hip_rate']['hipline']['normal'] = "";
            $data['result']['waist_hip_rate']['hipline']['note'] = "";
            $data['result']['waist_hip_rate']['hipline']['unit'] = "";

            $data['result']['waist_hip_rate']['waist_hip_rate']['value'] = "";
            $data['result']['waist_hip_rate']['waist_hip_rate']['normal'] = "";
            $data['result']['waist_hip_rate']['waist_hip_rate']['note'] = "";
            $data['result']['waist_hip_rate']['waist_hip_rate']['unit'] = "";

            $data['result']['uric_acid']['uric_acid_value']['value'] = "";
            $data['result']['uric_acid']['uric_acid_value']['normal'] = "";
            $data['result']['uric_acid']['uric_acid_value']['note'] = "";
            $data['result']['uric_acid']['uric_acid_value']['unit'] = "";

            $data['result']['cholesterol']['cholesterol_value']['value'] = "";
            $data['result']['cholesterol']['cholesterol_value']['normal'] = "";
            $data['result']['cholesterol']['cholesterol_value']['note'] = "";
            $data['result']['cholesterol']['cholesterol_value']['unit'] = "";

            $data['result']['TCM_constitution_identification']['TCM_constitution_type']['value'] = "";
            $data['result']['TCM_constitution_identification']['TCM_constitution_type']['normal'] = "";
            $data['result']['TCM_constitution_identification']['TCM_constitution_type']['note'] = "";
            $data['result']['TCM_constitution_identification']['TCM_constitution_type']['unit'] = "";

            $data['result']['TCM_constitution_identification']['yang_deficiency_quality_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['yang_deficiency_quality_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['yang_deficiency_quality_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['yang_deficiency_quality_score']['unit'] = "";

            $data['result']['TCM_constitution_identification']['yin_deficiency_quality_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['yin_deficiency_quality_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['yin_deficiency_quality_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['yin_deficiency_quality_score']['unit'] = "";

            $data['result']['TCM_constitution_identification']['qi_deficiency_quality_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['qi_deficiency_quality_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['qi_deficiency_quality_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['qi_deficiency_quality_score']['unit'] = "";

            $data['result']['TCM_constitution_identification']['phlegm_dampness_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['phlegm_dampness_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['phlegm_dampness_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['phlegm_dampness_score']['unit'] = "";

            $data['result']['TCM_constitution_identification']['humidity_and_heat_quality_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['humidity_and_heat_quality_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['humidity_and_heat_quality_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['humidity_and_heat_quality_score']['unit'] = "";

            $data['result']['TCM_constitution_identification']['blood_stasis_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['blood_stasis_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['blood_stasis_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['blood_stasis_score']['unit'] = "";

            $data['result']['TCM_constitution_identification']['special_quality_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['special_quality_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['special_quality_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['special_quality_score']['unit'] = "";

            $data['result']['TCM_constitution_identification']['qi_stagnation_quality_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['qi_stagnation_quality_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['qi_stagnation_quality_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['qi_stagnation_quality_score']['unit'] = "";

            $data['result']['TCM_constitution_identification']['peace_and_quality_score']['value'] = "";
            $data['result']['TCM_constitution_identification']['peace_and_quality_score']['normal'] = "";
            $data['result']['TCM_constitution_identification']['peace_and_quality_score']['note'] = "";
            $data['result']['TCM_constitution_identification']['peace_and_quality_score']['unit'] = "";

            $data['result']['vision']['left_eye']['value'] = "";
            $data['result']['vision']['left_eye']['normal'] = "";
            $data['result']['vision']['left_eye']['note'] = "";
            $data['result']['vision']['left_eye']['unit'] = "";

            $data['result']['vision']['visual_acuity_of_the_left_eye']['value'] = "";
            $data['result']['vision']['visual_acuity_of_the_left_eye']['normal'] = "";
            $data['result']['vision']['visual_acuity_of_the_left_eye']['note'] = "";
            $data['result']['vision']['visual_acuity_of_the_left_eye']['unit'] = "";

            $data['result']['vision']['left_eye_visual_cues']['value'] = "";
            $data['result']['vision']['left_eye_visual_cues']['normal'] = "";
            $data['result']['vision']['left_eye_visual_cues']['note'] = "";
            $data['result']['vision']['left_eye_visual_cues']['unit'] = "";

            $data['result']['vision']['right_eye']['value'] = "";
            $data['result']['vision']['right_eye']['normal'] = "";
            $data['result']['vision']['right_eye']['note'] = "";
            $data['result']['vision']['right_eye']['unit'] = "";

            $data['result']['vision']['visual_acuity_of_the_right_eye']['value'] = "";
            $data['result']['vision']['visual_acuity_of_the_right_eye']['normal'] = "";
            $data['result']['vision']['visual_acuity_of_the_right_eye']['note'] = "";
            $data['result']['vision']['visual_acuity_of_the_right_eye']['unit'] = "";

            $data['result']['vision']['visual_cues_in_right_eye']['value'] = "";
            $data['result']['vision']['visual_cues_in_right_eye']['normal'] = "";
            $data['result']['vision']['visual_cues_in_right_eye']['note'] = "";
            $data['result']['vision']['visual_cues_in_right_eye']['unit'] = "";

            $data['result']['color_blindness']['color_blindness_result']['value'] = "";
            $data['result']['color_blindness']['color_blindness_result']['normal'] = "";
            $data['result']['color_blindness']['color_blindness_result']['note'] = "";
            $data['result']['color_blindness']['color_blindness_result']['unit'] = "";

            $data['result']['psychological_tests']['UCLA_loneliness_scale_score']['value'] = "";
            $data['result']['psychological_tests']['UCLA_loneliness_scale_score']['normal'] = "";
            $data['result']['psychological_tests']['UCLA_loneliness_scale_score']['note'] = "";
            $data['result']['psychological_tests']['UCLA_loneliness_scale_score']['unit'] = "";

            $data['result']['psychological_tests']['geriatric_depression_scale_score']['value'] = "";
            $data['result']['psychological_tests']['geriatric_depression_scale_score']['normal'] = "";
            $data['result']['psychological_tests']['geriatric_depression_scale_score']['note'] = "";
            $data['result']['psychological_tests']['geriatric_depression_scale_score']['unit'] = "";

            $data['result']['psychological_tests']['self_rated_depression_scale_score']['value'] = "";
            $data['result']['psychological_tests']['self_rated_depression_scale_score']['normal'] = "";
            $data['result']['psychological_tests']['self_rated_depression_scale_score']['note'] = "";
            $data['result']['psychological_tests']['self_rated_depression_scale_score']['unit'] = "";

            $data['result']['psychological_tests']['hamilton_anxiety_scale_score']['value'] = "";
            $data['result']['psychological_tests']['hamilton_anxiety_scale_score']['normal'] = "";
            $data['result']['psychological_tests']['hamilton_anxiety_scale_score']['note'] = "";
            $data['result']['psychological_tests']['hamilton_anxiety_scale_score']['unit'] = "";

            $data['result']['psychological_tests']['simple_coping_style_score']['value'] = "";
            $data['result']['psychological_tests']['simple_coping_style_score']['normal'] = "";
            $data['result']['psychological_tests']['simple_coping_style_score']['note'] = "";
            $data['result']['psychological_tests']['simple_coping_style_score']['unit'] = "";

            $data['result']['psychological_tests']['subjective_support_score']['value'] = "";
            $data['result']['psychological_tests']['subjective_support_score']['normal'] = "";
            $data['result']['psychological_tests']['subjective_support_score']['note'] = "";
            $data['result']['psychological_tests']['subjective_support_score']['unit'] = "";

            $data['result']['psychological_tests']['objective_support_score']['value'] = "";
            $data['result']['psychological_tests']['objective_support_score']['normal'] = "";
            $data['result']['psychological_tests']['objective_support_score']['note'] = "";
            $data['result']['psychological_tests']['objective_support_score']['unit'] = "";

            $data['result']['psychological_tests']['support_utilization_degree_score']['value'] = "";
            $data['result']['psychological_tests']['support_utilization_degree_score']['normal'] = "";
            $data['result']['psychological_tests']['support_utilization_degree_score']['note'] = "";
            $data['result']['psychological_tests']['support_utilization_degree_score']['unit'] = "";

            $data['result']['12_lead_ECG']['Ecg_report_picture_data']['value'] = "";
            $data['result']['12_lead_ECG']['Ecg_report_picture_data']['normal'] = "";
            $data['result']['12_lead_ECG']['Ecg_report_picture_data']['note'] = "";
            $data['result']['12_lead_ECG']['Ecg_report_picture_data']['unit'] = "";
            $data['result']['12_lead_ECG']['diagnosis_result']['value'] = "";
            $data['result']['12_lead_ECG']['diagnosis_result']['normal'] = "";
            $data['result']['12_lead_ECG']['diagnosis_result']['note'] = "";
            $data['result']['12_lead_ECG']['diagnosis_result']['unit'] = "";
            $data['result']['12_lead_ECG']['heart_rate']['value'] = "";
            $data['result']['12_lead_ECG']['heart_rate']['normal'] = "";
            $data['result']['12_lead_ECG']['heart_rate']['note'] = "";
            $data['result']['12_lead_ECG']['heart_rate']['unit'] = "";
            $data['result']['12_lead_ECG']['P_axis']['value'] = "";
            $data['result']['12_lead_ECG']['P_axis']['normal'] = "";
            $data['result']['12_lead_ECG']['P_axis']['note'] = "";
            $data['result']['12_lead_ECG']['P_axis']['unit'] = "";
            $data['result']['12_lead_ECG']['QRS_axis']['value'] = "";
            $data['result']['12_lead_ECG']['QRS_axis']['normal'] = "";
            $data['result']['12_lead_ECG']['QRS_axis']['note'] = "";
            $data['result']['12_lead_ECG']['QRS_axis']['unit'] = "";
            $data['result']['12_lead_ECG']['T_axis']['value'] = "";
            $data['result']['12_lead_ECG']['T_axis']['normal'] = "";
            $data['result']['12_lead_ECG']['T_axis']['note'] = "";
            $data['result']['12_lead_ECG']['T_axis']['unit'] = "";
            $data['result']['12_lead_ECG']['PR_interval']['value'] = "";
            $data['result']['12_lead_ECG']['PR_interval']['normal'] = "";
            $data['result']['12_lead_ECG']['PR_interval']['note'] = "";
            $data['result']['12_lead_ECG']['PR_interval']['unit'] = "";
            $data['result']['12_lead_ECG']['QRS_time_limit']['value'] = "";
            $data['result']['12_lead_ECG']['QRS_time_limit']['normal'] = "";
            $data['result']['12_lead_ECG']['QRS_time_limit']['note'] = "";
            $data['result']['12_lead_ECG']['QRS_time_limit']['unit'] = "";
            $data['result']['12_lead_ECG']['QT_interval']['value'] = "";
            $data['result']['12_lead_ECG']['QT_interval']['normal'] = "";
            $data['result']['12_lead_ECG']['QT_interval']['note'] = "";
            $data['result']['12_lead_ECG']['QT_interval']['unit'] = "";
            $data['result']['12_lead_ECG']['QTc_interval']['value'] = "";
            $data['result']['12_lead_ECG']['QTc_interval']['normal'] = "";
            $data['result']['12_lead_ECG']['QTc_interval']['note'] = "";
            $data['result']['12_lead_ECG']['QTc_interval']['unit'] = "";
            $data['result']['12_lead_ECG']['RV5_value']['value'] = "";
            $data['result']['12_lead_ECG']['RV5_value']['normal'] = "";
            $data['result']['12_lead_ECG']['RV5_value']['note'] = "";
            $data['result']['12_lead_ECG']['RV5_value']['unit'] = "";
            $data['result']['12_lead_ECG']['SV1_value']['value'] = "";
            $data['result']['12_lead_ECG']['SV1_value']['normal'] = "";
            $data['result']['12_lead_ECG']['SV1_value']['note'] = "";
            $data['result']['12_lead_ECG']['SV1_value']['unit'] = "";
            $data['result']['12_lead_ECG']['sampling_frequency']['value'] = "";
            $data['result']['12_lead_ECG']['sampling_frequency']['normal'] = "";
            $data['result']['12_lead_ECG']['sampling_frequency']['note'] = "";
            $data['result']['12_lead_ECG']['sampling_frequency']['unit'] = "";
            $data['result']['12_lead_ECG']['sampling_duration']['value'] = "";
            $data['result']['12_lead_ECG']['sampling_duration']['normal'] = "";
            $data['result']['12_lead_ECG']['sampling_duration']['note'] = "";
            $data['result']['12_lead_ECG']['sampling_duration']['unit'] = "";




        

        

            //     $data['result']['body_fat']['body water content']                                                      = "";
            //     $data['result']['body_fat']['body water rate']                                                         = "";
            //     $data['result']['body_fat']['body fat content']                                                        = "";
            //     $data['result']['body_fat']['body muscle conten']                                                      = "";
            //     $data['result']['body_fat']['body muscle rate']                                                        = "";
            //     $data['result']['body_fat']['bone salt']                                                               = "";
            //     $data['result']['body_fat']['fat free mass']                                                           = "";
            //     $data['result']['body_fat']['Protein rate']                                                            = "";
            //     $data['result']['body_fat']['Intracellular fluid volume']                                              = "";
            //     $data['result']['body_fat']['Extracellular fluid volume']                                              = "";
            //     $data['result']['body_fat']['Intracellular fluid rate']                                                = "";
            //     $data['result']['blood_pressure']['systolic blood pressure']                                           = "";
            //     $data['result']['blood_pressure']['diastolic blood pressure']                                          = "";
            //     $data['result']['blood_pressure']['heart rate']                                                        = "";
            //     $data['result']['blood_oxygen']['blood oxygen']                                                        = "";
            //     $data['result']['body_temperature']['body temperature']                                                = "";
            //     $data['result']['lung_function']['Peak expiratory flow']                                               = "";
            //     $data['result']['lung_function']['Forced expiratory volume in the first second']                       = "";
            //     $data['result']['lung_function']['forced vital capacity']                                              = "";
            //     $data['result']['lung_function']['Forced expiratory volume in the first second/forced vital capacity'] = "";
            //     $data['result']['fast_ECG']['ECG result']                                                              = "";
            //     $data['result']['fast_ECG']['ECG waveform picture data']                                               = "";
            //     $data['result']['fast_ECG']['ECG waveform picture data length']                                        = "";
            //     $data['result']['blood_sugar']['Types of blood glucose measurement']                                   = "";
            //     $data['result']['blood_sugar']['blood glucose level']                                                  = "";
            //     $data['result']['waist_hip_rate']['waistline']                                                         = "";
            //     $data['result']['waist_hip_rate']['hipline']                                                           = "";
            //     $data['result']['waist_hip_rate']['waist hip rate']                                                    = "";
            //     $data['result']['uric_acid']['Uric acid value']                                                        = "";
            //     $data['result']['cholesterol']['Cholesterol value']                                                    = "";
            //     $data['result']['TCM_constitution_identification']['TCM constitution type']                            = "";
            //     $data['result']['TCM_constitution_identification']['Yang deficiency quality score']                    = "";
            //     $data['result']['TCM_constitution_identification']['Yin deficiency quality score']                     = "";
            //     $data['result']['TCM_constitution_identification']['Qi deficiency quality score']                      = "";
            //     $data['result']['TCM_constitution_identification']['Phlegm-dampness score']                            = "";
            //     $data['result']['TCM_constitution_identification']['Humidity and heat quality score']                  = "";
            //     $data['result']['TCM_constitution_identification']['Blood stasis score']                               = "";
            //     $data['result']['TCM_constitution_identification']['Special quality score']                            = "";
            //     $data['result']['TCM_constitution_identification']['Qi stagnation quality score']                      = "";
            //     $data['result']['TCM_constitution_identification']['Peace and quality score']                          = "";
            //     $data['result']['vision']['left eye']                                                                  = "";
            //     $data['result']['vision']['Visual acuity of the left eye']                                             = "";
            //     $data['result']['vision']['Left eye visual cues']                                                      = "";
            //     $data['result']['vision']['right eye']                                                                 = "";
            //     $data['result']['vision']['Visual acuity of the right eye']                                            = "";
            //     $data['result']['vision']['Visual cues in right eye']                                                  = "";
            //     $data['result']['color_blindness']['Color blindness result']                                           = "";
            //     $data['result']['psychological_tests']['UCLA Loneliness scale score']                                  = "";
            //     $data['result']['psychological_tests']['Geriatric depression Scale score']                             = "";
            //     $data['result']['psychological_tests']['Self-rated depression scale score']                            = "";
            //     $data['result']['psychological_tests']['Hamilton Anxiety Scale score']                                 = "";
            //     $data['result']['psychological_tests']['Emotional health test scores']                                 = "";
            //     $data['result']['psychological_tests']['Self-measured health rating scale score']                      = "";
            //     $data['result']['psychological_tests']['Life satisfaction Scale scor']                                 = "";
            //     $data['result']['psychological_tests']['Personality disorder personality test score']                  = "";
            //     $data['result']['psychological_tests']['PSTR Adult stress test scores']                                = "";
            //     $data['result']['psychological_tests']['Harvard sexuality test score']                                 = "";
            //     $data['result']['psychological_tests']['Emotional intelligence (EQ) test score']                       = "";
            //     $data['result']['psychological_tests']['Sleep status assessment score']                                = "";
            //     $data['result']['12_lead_ECG']['Ecg report picture data']                                              = "";
            //     $data['result']['12_lead_ECG']['diagnosis result']                                                     = "";
            //     $data['result']['12_lead_ECG']['heart rate']                                                           = "";
            //     $data['result']['12_lead_ECG']['P axis']                                                               = "";
            //     $data['result']['12_lead_ECG']['QRS axis']                                                             = "";
            //     $data['result']['12_lead_ECG']['T axis']                                                               = "";
            //     $data['result']['12_lead_ECG']['PR interval']                                                          = "";
            //     $data['result']['12_lead_ECG']['QRS time limit']                                                       = "";
            //     $data['result']['12_lead_ECG']['QT interval']                                                          = "";
            //     $data['result']['12_lead_ECG']['QTc interval']                                                         = "";
            //     $data['result']['12_lead_ECG']['RV5 value']                                                            = "";
            //     $data['result']['12_lead_ECG']['SV1 value']                                                            = "";
            //     $data['result']['12_lead_ECG']['sampling frequency']                                                   = "";
            //     $data['result']['12_lead_ECG']['Sampling duration'] 

            

            

            

            // $data['result']['body_fat']['body_water_content']['value'] = "";
            // $data['result']['body_fat']['body_water_content']['normal'] = "";
            // $data['result']['body_fat']['body_water_content']['note'] = "";
            // $data['result']['body_fat']['body_water_content']['unit'] = "";

            // $data['result']['body_fat']['body_water_rate']['value'] = "";
            // $data['result']['body_fat']['body_water_rate']['normal'] = "";
            // $data['result']['body_fat']['body_water_rate']['note'] = "";
            // $data['result']['body_fat']['body_water_rate']['unit'] = "";

            // $data['result']['body_fat']['body_fat_content']['value'] = "";
            // $data['result']['body_fat']['body_fat_content']['normal'] = "";
            // $data['result']['body_fat']['body_fat_content']['note'] = "";
            // $data['result']['body_fat']['body_fat_content']['unit'] = "";

            // $data['result']['body_fat']['body_muscle_content']['value'] = "";
            // $data['result']['body_fat']['body_muscle_content']['normal'] = "";
            // $data['result']['body_fat']['body_muscle_content']['note'] = "";
            // $data['result']['body_fat']['body_muscle_content']['unit'] = "";

            // $data['result']['body_fat']['body_muscle_rate']['value'] = "";
            // $data['result']['body_fat']['body_muscle_rate']['normal'] = "";
            // $data['result']['body_fat']['body_muscle_rate']['note'] = "";
            // $data['result']['body_fat']['body_muscle_rate']['unit'] = "";

            // $data['result']['body_fat']['bone_salt']['value'] = "";
            // $data['result']['body_fat']['bone_salt']['normal'] = "";
            // $data['result']['body_fat']['bone_salt']['note'] = "";
            // $data['result']['body_fat']['bone_salt']['unit'] = "";

            // $data['result']['body_fat']['fat_free_mass']['value'] = "";
            // $data['result']['body_fat']['fat_free_mass']['normal'] = "";
            // $data['result']['body_fat']['fat_free_mass']['note'] = "";
            // $data['result']['body_fat']['fat_free_mass']['unit'] = "";

            // $data['result']['body_fat']['protein_rate']['value'] = "";
            // $data['result']['body_fat']['protein_rate']['normal'] = "";
            // $data['result']['body_fat']['protein_rate']['note'] = "";
            // $data['result']['body_fat']['protein_rate']['unit'] = "";

            // $data['result']['body_fat']['intracellular_fluid_volume']['value'] = "";
            // $data['result']['body_fat']['intracellular_fluid_volume']['normal'] = "";
            // $data['result']['body_fat']['intracellular_fluid_volume']['note'] = "";
            // $data['result']['body_fat']['intracellular_fluid_volume']['unit'] = "";

            // $data['result']['body_fat']['extracellular_fluid_volume']['value'] = "";
            // $data['result']['body_fat']['extracellular_fluid_volume']['normal'] = "";
            // $data['result']['body_fat']['extracellular_fluid_volume']['note'] = "";
            // $data['result']['body_fat']['extracellular_fluid_volume']['unit'] = "";

            // $data['result']['body_fat']['intracellular_fluid_rate']['value'] = "";
            // $data['result']['body_fat']['intracellular_fluid_rate']['normal'] = "";
            // $data['result']['body_fat']['intracellular_fluid_rate']['note'] = "";
            // $data['result']['body_fat']['intracellular_fluid_rate']['unit'] = "";

            // $data['result']['blood_pressure']['systolic_blood_pressure']['value'] = "";
            // $data['result']['blood_pressure']['systolic_blood_pressure']['normal'] = "";
            // $data['result']['blood_pressure']['systolic_blood_pressure']['note'] = "";
            // $data['result']['blood_pressure']['systolic_blood_pressure']['unit'] = "";

            // $data['result']['blood_pressure']['diastolic_blood_pressure']['value'] = "";
            // $data['result']['blood_pressure']['diastolic_blood_pressure']['normal'] = "";
            // $data['result']['blood_pressure']['diastolic_blood_pressure']['note'] = "";
            // $data['result']['blood_pressure']['diastolic_blood_pressure']['unit'] = "";

            // $data['result']['blood_pressure']['heart_rate']['value'] = "";
            // $data['result']['blood_pressure']['heart_rate']['normal'] = "";
            // $data['result']['blood_pressure']['heart_rate']['note'] = "";
            // $data['result']['blood_pressure']['heart_rate']['unit'] = "";

            // $data['result']['blood_oxygen']['blood_oxygen']['value'] = "";
            // $data['result']['blood_oxygen']['blood_oxygen']['normal'] = "";
            // $data['result']['blood_oxygen']['blood_oxygen']['note'] = "";
            // $data['result']['blood_oxygen']['blood_oxygen']['unit'] = "";

            // $data['result']['body_temperature']['body_temperature']['value'] = "";
            // $data['result']['body_temperature']['body_temperature']['normal'] = "";
            // $data['result']['body_temperature']['body_temperature']['note'] = "";
            // $data['result']['body_temperature']['body_temperature']['unit'] = "";

            // $data['result']['lung_function']['peak_expiratory_flow']['value'] = "";
            // $data['result']['lung_function']['peak_expiratory_flow']['normal'] = "";
            // $data['result']['lung_function']['peak_expiratory_flow']['note'] = "";
            // $data['result']['lung_function']['peak_expiratory_flow']['unit'] = "";

            // $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second']['value'] = "";
            // $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second']['normal'] = "";
            // $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second']['note'] = "";
            // $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second']['unit'] = "";

            // $data['result']['lung_function']['forced_vital_capacity']['value'] = "";
            // $data['result']['lung_function']['forced_vital_capacity']['normal'] = "";
            // $data['result']['lung_function']['forced_vital_capacity']['note'] = "";
            // $data['result']['lung_function']['forced_vital_capacity']['unit'] = "";

            // $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second_forced_vital_capacity']['value'] = "";
            // $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second_forced_vital_capacity']['normal'] = "";
            // $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second_forced_vital_capacity']['note'] = "";
            // $data['result']['lung_function']['forced_expiratory_volume_in_the_first_second_forced_vital_capacity']['unit'] = "";

            // $data['result']['fast_ECG']['ECG_result']['value'] = "";
            // $data['result']['fast_ECG']['ECG_result']['normal'] = "";
            // $data['result']['fast_ECG']['ECG_result']['note'] = "";
            // $data['result']['fast_ECG']['ECG_result']['unit'] = "";

            // $data['result']['fast_ECG']['ECG_waveform_picture_data']['value'] = "";
            // $data['result']['fast_ECG']['ECG_waveform_picture_data']['normal'] = "";
            // $data['result']['fast_ECG']['ECG_waveform_picture_data']['note'] = "";
            // $data['result']['fast_ECG']['ECG_waveform_picture_data']['unit'] = "";

            // $data['result']['fast_ECG']['ECG_waveform_picture_data_length']['value'] = "";
            // $data['result']['fast_ECG']['ECG_waveform_picture_data_length']['normal'] = "";
            // $data['result']['fast_ECG']['ECG_waveform_picture_data_length']['note'] = "";
            // $data['result']['fast_ECG']['ECG_waveform_picture_data_length']['unit'] = "";

            // $data['result']['blood_sugar']['types_of_blood_glucose_measurement']['value'] = "";
            // $data['result']['blood_sugar']['types_of_blood_glucose_measurement']['normal'] = "";
            // $data['result']['blood_sugar']['types_of_blood_glucose_measurement']['note'] = "";
            // $data['result']['blood_sugar']['types_of_blood_glucose_measurement']['unit'] = "";

            // $data['result']['blood_sugar']['blood_glucose_level']['value'] = "";
            // $data['result']['blood_sugar']['blood_glucose_level']['normal'] = "";
            // $data['result']['blood_sugar']['blood_glucose_level']['note'] = "";
            // $data['result']['blood_sugar']['blood_glucose_level']['unit'] = "";

            // $data['result']['waist_hip_rate']['waistline']['value'] = "";
            // $data['result']['waist_hip_rate']['waistline']['normal'] = "";
            // $data['result']['waist_hip_rate']['waistline']['note'] = "";
            // $data['result']['waist_hip_rate']['waistline']['unit'] = "";

            // $data['result']['waist_hip_rate']['hipline']['value'] = "";
            // $data['result']['waist_hip_rate']['hipline']['normal'] = "";
            // $data['result']['waist_hip_rate']['hipline']['note'] = "";
            // $data['result']['waist_hip_rate']['hipline']['unit'] = "";

            // $data['result']['waist_hip_rate']['waist_hip_rate']['value'] = "";
            // $data['result']['waist_hip_rate']['waist_hip_rate']['normal'] = "";
            // $data['result']['waist_hip_rate']['waist_hip_rate']['note'] = "";
            // $data['result']['waist_hip_rate']['waist_hip_rate']['unit'] = "";

            // $data['result']['uric_acid']['uric_acid_value']['value'] = "";
            // $data['result']['uric_acid']['uric_acid_value']['normal'] = "";
            // $data['result']['uric_acid']['uric_acid_value']['note'] = "";
            // $data['result']['uric_acid']['uric_acid_value']['unit'] = "";

            // $data['result']['cholesterol']['cholesterol_value']['value'] = "";
            // $data['result']['cholesterol']['cholesterol_value']['normal'] = "";
            // $data['result']['cholesterol']['cholesterol_value']['note'] = "";
            // $data['result']['cholesterol']['cholesterol_value']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['TCM_constitution_type']['value'] = "";
            // $data['result']['TCM_constitution_identification']['TCM_constitution_type']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['TCM_constitution_type']['note'] = "";
            // $data['result']['TCM_constitution_identification']['TCM_constitution_type']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['yang_deficiency_quality_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['yang_deficiency_quality_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['yang_deficiency_quality_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['yang_deficiency_quality_score']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['yin_deficiency_quality_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['yin_deficiency_quality_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['yin_deficiency_quality_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['yin_deficiency_quality_score']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['qi_deficiency_quality_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['qi_deficiency_quality_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['qi_deficiency_quality_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['qi_deficiency_quality_score']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['phlegm_dampness_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['phlegm_dampness_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['phlegm_dampness_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['phlegm_dampness_score']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['humidity_and_heat_quality_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['humidity_and_heat_quality_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['humidity_and_heat_quality_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['humidity_and_heat_quality_score']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['blood_stasis_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['blood_stasis_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['blood_stasis_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['blood_stasis_score']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['special_quality_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['special_quality_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['special_quality_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['special_quality_score']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['qi_stagnation_quality_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['qi_stagnation_quality_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['qi_stagnation_quality_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['qi_stagnation_quality_score']['unit'] = "";

            // $data['result']['TCM_constitution_identification']['peace_and_quality_score']['value'] = "";
            // $data['result']['TCM_constitution_identification']['peace_and_quality_score']['normal'] = "";
            // $data['result']['TCM_constitution_identification']['peace_and_quality_score']['note'] = "";
            // $data['result']['TCM_constitution_identification']['peace_and_quality_score']['unit'] = "";

            // $data['result']['vision']['left_eye']['value'] = "";
            // $data['result']['vision']['left_eye']['normal'] = "";
            // $data['result']['vision']['left_eye']['note'] = "";
            // $data['result']['vision']['left_eye']['unit'] = "";

            // $data['result']['vision']['visual_acuity_of_the_left_eye']['value'] = "";
            // $data['result']['vision']['visual_acuity_of_the_left_eye']['normal'] = "";
            // $data['result']['vision']['visual_acuity_of_the_left_eye']['note'] = "";
            // $data['result']['vision']['visual_acuity_of_the_left_eye']['unit'] = "";

            // $data['result']['vision']['left_eye_visual_cues']['value'] = "";
            // $data['result']['vision']['left_eye_visual_cues']['normal'] = "";
            // $data['result']['vision']['left_eye_visual_cues']['note'] = "";
            // $data['result']['vision']['left_eye_visual_cues']['unit'] = "";

            // $data['result']['vision']['right_eye']['value'] = "";
            // $data['result']['vision']['right_eye']['normal'] = "";
            // $data['result']['vision']['right_eye']['note'] = "";
            // $data['result']['vision']['right_eye']['unit'] = "";

            // $data['result']['vision']['visual_acuity_of_the_right_eye']['value'] = "";
            // $data['result']['vision']['visual_acuity_of_the_right_eye']['normal'] = "";
            // $data['result']['vision']['visual_acuity_of_the_right_eye']['note'] = "";
            // $data['result']['vision']['visual_acuity_of_the_right_eye']['unit'] = "";

            // $data['result']['vision']['visual_cues_in_right_eye']['value'] = "";
            // $data['result']['vision']['visual_cues_in_right_eye']['normal'] = "";
            // $data['result']['vision']['visual_cues_in_right_eye']['note'] = "";
            // $data['result']['vision']['visual_cues_in_right_eye']['unit'] = "";

            // $data['result']['color_blindness']['color_blindness_result']['value'] = "";
            // $data['result']['color_blindness']['color_blindness_result']['normal'] = "";
            // $data['result']['color_blindness']['color_blindness_result']['note'] = "";
            // $data['result']['color_blindness']['color_blindness_result']['unit'] = "";

            // $data['result']['psychological_tests']['UCLA_loneliness_scale_score']['value'] = "";
            // $data['result']['psychological_tests']['UCLA_loneliness_scale_score']['normal'] = "";
            // $data['result']['psychological_tests']['UCLA_loneliness_scale_score']['note'] = "";
            // $data['result']['psychological_tests']['UCLA_loneliness_scale_score']['unit'] = "";

            // $data['result']['psychological_tests']['geriatric_depression_scale_score']['value'] = "";
            // $data['result']['psychological_tests']['geriatric_depression_scale_score']['normal'] = "";
            // $data['result']['psychological_tests']['geriatric_depression_scale_score']['note'] = "";
            // $data['result']['psychological_tests']['geriatric_depression_scale_score']['unit'] = "";

            // $data['result']['psychological_tests']['self_rated_depression_scale_score']['value'] = "";
            // $data['result']['psychological_tests']['self_rated_depression_scale_score']['normal'] = "";
            // $data['result']['psychological_tests']['self_rated_depression_scale_score']['note'] = "";
            // $data['result']['psychological_tests']['self_rated_depression_scale_score']['unit'] = "";

            // $data['result']['psychological_tests']['hamilton_anxiety_scale_score']['value'] = "";
            // $data['result']['psychological_tests']['hamilton_anxiety_scale_score']['normal'] = "";
            // $data['result']['psychological_tests']['hamilton_anxiety_scale_score']['note'] = "";
            // $data['result']['psychological_tests']['hamilton_anxiety_scale_score']['unit'] = "";

            // $data['result']['psychological_tests']['simple_coping_style_score']['value'] = "";
            // $data['result']['psychological_tests']['simple_coping_style_score']['normal'] = "";
            // $data['result']['psychological_tests']['simple_coping_style_score']['note'] = "";
            // $data['result']['psychological_tests']['simple_coping_style_score']['unit'] = "";

            // $data['result']['psychological_tests']['subjective_support_score']['value'] = "";
            // $data['result']['psychological_tests']['subjective_support_score']['normal'] = "";
            // $data['result']['psychological_tests']['subjective_support_score']['note'] = "";
            // $data['result']['psychological_tests']['subjective_support_score']['unit'] = "";

            // $data['result']['psychological_tests']['objective_support_score']['value'] = "";
            // $data['result']['psychological_tests']['objective_support_score']['normal'] = "";
            // $data['result']['psychological_tests']['objective_support_score']['note'] = "";
            // $data['result']['psychological_tests']['objective_support_score']['unit'] = "";

            // $data['result']['psychological_tests']['support_utilization_degree_score']['value'] = "";
            // $data['result']['psychological_tests']['support_utilization_degree_score']['normal'] = "";
            // $data['result']['psychological_tests']['support_utilization_degree_score']['note'] = "";
            // $data['result']['psychological_tests']['support_utilization_degree_score']['unit'] = "";

            // $data['result']['hearing']['hearing_result']['value'] = "";
            // $data['result']['hearing']['hearing_result']['normal'] = "";
            // $data['result']['hearing']['hearing_result']['note'] = "";
            // $data['result']['hearing']['hearing_result']['unit'] = "";

            // $data['result']['hearing']['listening']['value'] = "";
            // $data['result']['hearing']['listening']['normal'] = "";
            // $data['result']['hearing']['listening']['note'] = "";
            // $data['result']['hearing']['listening']['unit'] = "";

            // $data['result']['osteoporosis']['osteoporosis_result']['value'] = "";
            // $data['result']['osteoporosis']['osteoporosis_result']['normal'] = "";
            // $data['result']['osteoporosis']['osteoporosis_result']['note'] = "";
            // $data['result']['osteoporosis']['osteoporosis_result']['unit'] = "";

            // $data['result']['blood_routine']['red_blood_cell_count']['value'] = "";
            // $data['result']['blood_routine']['red_blood_cell_count']['normal'] = "";
            // $data['result']['blood_routine']['red_blood_cell_count']['note'] = "";
            // $data['result']['blood_routine']['red_blood_cell_count']['unit'] = "";

            // $data['result']['blood_routine']['hemoglobin']['value'] = "";
            // $data['result']['blood_routine']['hemoglobin']['normal'] = "";
            // $data['result']['blood_routine']['hemoglobin']['note'] = "";
            // $data['result']['blood_routine']['hemoglobin']['unit'] = "";

            // $data['result']['blood_routine']['hematocrit']['value'] = "";
            // $data['result']['blood_routine']['hematocrit']['normal'] = "";
            // $data['result']['blood_routine']['hematocrit']['note'] = "";
            // $data['result']['blood_routine']['hematocrit']['unit'] = "";

            // $data['result']['blood_routine']['mean_corpuscular_volume']['value'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_volume']['normal'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_volume']['note'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_volume']['unit'] = "";

            // $data['result']['blood_routine']['mean_corpuscular_hemoglobin']['value'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_hemoglobin']['normal'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_hemoglobin']['note'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_hemoglobin']['unit'] = "";

            // $data['result']['blood_routine']['mean_corpuscular_hemoglobin_concentration']['value'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_hemoglobin_concentration']['normal'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_hemoglobin_concentration']['note'] = "";
            // $data['result']['blood_routine']['mean_corpuscular_hemoglobin_concentration']['unit'] = "";

            // $data['result']['blood_routine']['platelet_distribution_width']['value'] = "";
            // $data['result']['blood_routine']['platelet_distribution_width']['normal'] = "";
            // $data['result']['blood_routine']['platelet_distribution_width']['note'] = "";
            // $data['result']['blood_routine']['platelet_distribution_width']['unit'] = "";

            // $data['result']['blood_routine']['red_blood_cell_distribution_width']['value'] = "";
            // $data['result']['blood_routine']['red_blood_cell_distribution_width']['normal'] = "";
            // $data['result']['blood_routine']['red_blood_cell_distribution_width']['note'] = "";
            // $data['result']['blood_routine']['red_blood_cell_distribution_width']['unit'] = "";

            // $data['result']['blood_routine']['average_red_blood_cell_volume_coefficient_of_variation']['value'] = "";
            // $data['result']['blood_routine']['average_red_blood_cell_volume_coefficient_of_variation']['normal'] = "";
            // $data['result']['blood_routine']['average_red_blood_cell_volume_coefficient_of_variation']['note'] = "";
            // $data['result']['blood_routine']['average_red_blood_cell_volume_coefficient_of_variation']['unit'] = "";

            // $data['result']['blood_routine']['red_blood_cell_distribution_width_stand_deviation']['value'] = "";
            // $data['result']['blood_routine']['red_blood_cell_distribution_width_stand_deviation']['normal'] = "";
            // $data['result']['blood_routine']['red_blood_cell_distribution_width_stand_deviation']['note'] = "";
            // $data['result']['blood_routine']['red_blood_cell_distribution_width_stand_deviation']['unit'] = "";

            // $data['result']['blood_routine']['platelet_count']['value'] = "";
            // $data['result']['blood_routine']['platelet_count']['normal'] = "";
            // $data['result']['blood_routine']['platelet_count']['note'] = "";
            // $data['result']['blood_routine']['platelet_count']['unit'] = "";

            // $data['result']['blood_routine']['leukocyte_count']['value'] = "";
            // $data['result']['blood_routine']['leukocyte_count']['normal'] = "";
            // $data['result']['blood_routine']['leukocyte_count']['note'] = "";
            // $data['result']['blood_routine']['leukocyte_count']['unit'] = "";

            // $data['result']['blood_routine']['neutrophil_count']['value'] = "";
            // $data['result']['blood_routine']['neutrophil_count']['normal'] = "";
            // $data['result']['blood_routine']['neutrophil_count']['note'] = "";
            // $data['result']['blood_routine']['neutrophil_count']['unit'] = "";

            // $data['result']['blood_routine']['lymphocyte_count']['value'] = "";
            // $data['result']['blood_routine']['lymphocyte_count']['normal'] = "";
            // $data['result']['blood_routine']['lymphocyte_count']['note'] = "";
            // $data['result']['blood_routine']['lymphocyte_count']['unit'] = "";

            // $data['result']['blood_routine']['eosinophil_count']['value'] = "";
            // $data['result']['blood_routine']['eosinophil_count']['normal'] = "";
            // $data['result']['blood_routine']['eosinophil_count']['note'] = "";
            // $data['result']['blood_routine']['eosinophil_count']['unit'] = "";

            // $data['result']['blood_routine']['monocyte_count']['value'] = "";
            // $data['result']['blood_routine']['monocyte_count']['normal'] = "";
            // $data['result']['blood_routine']['monocyte_count']['note'] = "";
            // $data['result']['blood_routine']['monocyte_count']['unit'] = "";

            // $data['result']['blood_routine']['basophil_count']['value'] = "";
            // $data['result']['blood_routine']['basophil_count']['normal'] = "";
            // $data['result']['blood_routine']['basophil_count']['note'] = "";
            // $data['result']['blood_routine']['basophil_count']['unit'] = "";

            // $data['result']['blood_routine']['neutrophil_ratio']['value'] = "";
            // $data['result']['blood_routine']['neutrophil_ratio']['normal'] = "";
            // $data['result']['blood_routine']['neutrophil_ratio']['note'] = "";
            // $data['result']['blood_routine']['neutrophil_ratio']['unit'] = "";

            // $data['result']['blood_routine']['lymphocyte_ratio']['value'] = "";
            // $data['result']['blood_routine']['lymphocyte_ratio']['normal'] = "";
            // $data['result']['blood_routine']['lymphocyte_ratio']['note'] = "";
            // $data['result']['blood_routine']['lymphocyte_ratio']['unit'] = "";

            // $data['result']['blood_routine']['eosinophil_ratio']['value'] = "";
            // $data['result']['blood_routine']['eosinophil_ratio']['normal'] = "";
            // $data['result']['blood_routine']['eosinophil_ratio']['note'] = "";
            // $data['result']['blood_routine']['eosinophil_ratio']['unit'] = "";

            // $data['result']['blood_routine']['monocyte_ratio']['value'] = "";
            // $data['result']['blood_routine']['monocyte_ratio']['normal'] = "";
            // $data['result']['blood_routine']['monocyte_ratio']['note'] = "";
            // $data['result']['blood_routine']['monocyte_ratio']['unit'] = "";

            // $data['result']['blood_routine']['basophil_ratio']['value'] = "";
            // $data['result']['blood_routine']['basophil_ratio']['normal'] = "";
            // $data['result']['blood_routine']['basophil_ratio']['note'] = "";
            // $data['result']['blood_routine']['basophil_ratio']['unit'] = "";

            $this->response($data,REST_Controller::HTTP_OK);
        }

        // public function ReceiveDataFHIR_POST(){
        //     $body = json_decode($this->input->raw_input_stream, true);

        //     $data['transaksi_id']                                = generateuuid();
        //     $data['name']                                        = $body['sfz']['name'];
        //     $data['gender']                                      = $body['sfz']['sex'];
        //     $data['nation']                                      = $body['sfz']['nation'];
        //     $data['qr_code']                                     = $body['sfz']['qrCode'];
        //     $data['birth_date']                                  = $body['sfz']['birthday'];
        //     $data['id_number']                                   = $body['sfz']['idnumber'];
        //     $data['age']                                         = $body['sfz']['age'];
        //     $data['address']                                     = $body['sfz']['address'];
        //     $data['id_card_photo_data']                          = $body['sfz']['data'];
        //     $data['height']                                      = $body['hw']['height'];
        //     $data['weight']                                      = $body['hw']['weight'];
        //     $data['bmi']                                         = $body['hw']['bmi'];
        //     $data['body_fat_rate']                               = $body['fat']['zflv'];
        //     $data['basal_metabolism']                            = $body['fat']['jcdx'];
        //     $data['body_water_content']                          = $body['fat']['tsfl'];
        //     $data['body_water_rate']                             = $body['fat']['tsflv'];
        //     $data['body_fat_content']                            = $body['fat']['zfl'];
        //     $data['body_muscle_content']                         = $body['fat']['jrl'];
        //     $data['body_muscle_rate']                            = $body['fat']['jrlv'];
        //     $data['bone_salt']                                   = $body['fat']['gy'];
        //     $data['fat_free_mass']                               = $body['fat']['qztz'];
        //     $data['protein_rate']                                = $body['fat']['dbzlv'];
        //     $data['intracellular_fluid_volume']                  = $body['fat']['xbnyl'];
        //     $data['extracellular_fluid_volume']                  = $body['fat']['xbwyl'];
        //     $data['intracellular_fluid_rate']                    = $body['fat']['xbnylv'];
        //     $data['extracellular_fluid_rate']                    = $body['fat']['xbwylv'];
        //     $data['protein']                                     = $body['fat']['dbz'];
        //     $data['visceral_fat_grade']                          = $body['fat']['nzzf'];
        //     $data['bone_mass']                                   = $body['fat']['gl'];
        //     $data['systolic_blood_pressure']                     = $body['blood']['high'];
        //     $data['diastolic_blood_pressure']                    = $body['blood']['low'];
        //     $data['heart_rate']                                  = $body['blood']['rate'];
        //     $data['systolic_blood_pressure_value']               = $body['blood']['rhigh'];
        //     $data['diastolic_blood_pressure_value']              = $body['blood']['rlow'];
        //     $data['blood_oxygen']                                = $body['spo2']['sp'];
        //     $data['body_temperature']                            = $body['tiwen'];
        //     $data['ecg_result']                                  = $body['ecg']['result'];
        //     $data['ecg_waveform_picture_data']                   = $body['ecg']['data'];
        //     $data['ecg_waveform_picture_data_length']            = $body['ecg']['len'];
        //     $data['ecg_report_picture_data']                     = $body['ecg12']['data'];
        //     $data['ecg_diagnosis_result']                        = $body['ecg12']['ecg_result'];
        //     $data['ecg_heart_rate']                              = $body['ecg12']['heart_rate'];
        //     $data['ecg_p_axis']                                  = $body['ecg12']['p_axis'];
        //     $data['ecg_qrs_axis']                                = $body['ecg12']['qrs_axis'];
        //     $data['ecg_t_axis']                                  = $body['ecg12']['t_axis'];
        //     $data['ecg_pr_interval']                             = $body['ecg12']['pr'];
        //     $data['ecg_qrs_time_limit']                          = $body['ecg12']['qrs'];
        //     $data['ecg_qt_interval']                             = $body['ecg12']['qt'];
        //     $data['ecg_qtc_interval']                            = $body['ecg12']['qtc'];
        //     $data['ecg_rv5_value']                               = $body['ecg12']['rv5'];
        //     $data['ecg_sv1_value']                               = $body['ecg12']['sv1'];
        //     $data['ecg_sample_rate']                             = $body['ecg12']['sample_rate'];
        //     $data['ecg_sample_duration']                         = $body['ecg12']['sample_time'];
        //     $data['blood_glucose_type']                          = $body['xt']['type'];
        //     $data['blood_glucose_level']                         = $body['xt']['value'];
        //     $data['waistline']                                   = $body['ytb']['waist'];
        //     $data['hipline']                                     = $body['ytb']['hip'];
        //     $data['waist_hip_rate']                              = $body['ytb']['whr'];
        //     $data['peak_expiratory_flow']                        = $body['fgn']['pef'];
        //     $data['forced_expiratory_volume_1s']                 = $body['fgn']['fev1'];
        //     $data['forced_vital_capacity']                       = $body['fgn']['fvc'];
        //     $data['fev1_fvc_ratio']                              = $body['fgn']['bz'];
        //     $data['uric_acid_value']                             = $body['ns'];
        //     $data['cholesterol_value']                           = $body['dgc'];
        //     $data['tcm_constitution_type']                       = $body['zybs'];
        //     $data['left_eye_visual_acuity']                      = $body['shili']['left_eye'];
        //     $data['right_eye_visual_acuity']                     = $body['shili']['right_eye'];
        //     $data['color_blindness_result']                      = $body['semang'];
        //     $data['ucla_loneliness_scale_score']                 = $body['xlcp']['ucla'];
        //     $data['geriatric_depression_scale_score']            = $body['xlcp']['lnyy'];
        //     $data['self_rated_depression_scale_score']           = $body['xlcp']['zpyy'];
        //     $data['hamilton_anxiety_scale_score']                = $body['xlcp']['hmdjl'];
        //     $data['emotional_health_test_scores']                = $body['xlcp']['qxjkd'];
        //     $data['self_measured_health_rating_scale_score']     = $body['xlcp']['zcjkpd'];
        //     $data['life_satisfaction_scale_score']               = $body['xlcp']['shmyd'];
        //     $data['personality_disorder_personality_test_score'] = $body['xlcp']['rgza'];
        //     $data['pstr_adult_stress_test_scores']               = $body['xlcp']['pstr'];
        //     $data['harvard_sexuality_test_score']                = $body['xlcp']['hfxx'];
        //     $data['emotional_intelligence_test_score']           = $body['xlcp']['eq'];
        //     $data['sleep_status_assessment_score']               = $body['xlcp']['smzkpg'];
        //     $data['device_code']                                 = $body['deviceID'];
        //     $data['physical_examination_number']                 = $body['examNo'];


        //     $this->md->insertdata($data);

        //     //!!!!!!!!Start FHIR
        //     $bodyFHIR       = [];
        //     $identifier1    = [];
        //     $identifier2    = [];
        //     $performer = [];
        //     $subject        = [];
        //     $categorycoding = [];

        //     $imtscale                   = [];
        //     $imtscaleresourcecodecoding = [];

        //     $categorycoding['code']    = "vital-signs";
        //     $categorycoding['display'] = "Vital Signs";
        //     $categorycoding['system']  = "http://terminology.hl7.org/CodeSystem/observation-category";
        //     $identifier1['system']     = "http://sys-ids.kemkes.go.id/observation/".ORGID_SATUSEHAT;
        //     $identifier1['use']        = "official";
        //     $identifier1['value']      = $body['examNo'];
        //     $identifier2['system']     = "http://sys-ids.kemkes.go.id/observation/".ORGID_SATUSEHAT;
        //     $identifier2['use']        = "official";
        //     $identifier2['value']      = generateuuid();
            
        //     $subject['display']        = $body['sfz']['name'];
        //     $subject['reference']      = "Patient/".$body['sfz']['idnumber'];

        //     $imtscaleresourcecodecoding['code']    = "39156-5";
        //     $imtscaleresourcecodecoding['display'] = "Body mass index (BMI) [Ratio]";
        //     $imtscaleresourcecodecoding['system']  = "http://loinc.org";

        //     $imtscaleresource['category'][]['coding'][]  = $categorycoding;
        //     $imtscaleresource['code']['coding'][]        = $imtscaleresourcecodecoding;
        //     // $imtscaleresource['effectiveDateTime']       = $a->TRIAGE;
        //     // $imtscaleresource['encounter']               = $encounter;
        //     $imtscaleresource['identifier'][]            = $identifier1;
        //     $imtscaleresource['identifier'][]            = $identifier2;
        //     // $imtscaleresource['issued']                  = $a->TRIAGE;
        //     // $imtscaleresource['performer'][]             = $performer;
        //     $imtscaleresource['resourceType']            = "Observation";
        //     $imtscaleresource['status']                  = "final";
        //     $imtscaleresource['subject']                 = $subject;
        //     $imtscaleresource['valueQuantity']['code']   = "kg/m2";
        //     $imtscaleresource['valueQuantity']['system'] = "http://unitsofmeasure.org";
        //     $imtscaleresource['valueQuantity']['unit']   = "kg/m2";
        //     $imtscaleresource['valueQuantity']['value']  = $body['hw']['bmi'];

        //     $imtscale['fullUrl']           = "urn:uuid:".generateuuid();
        //     $imtscale['request']['method'] = "POST";
        //     $imtscale['request']['url']    = "Observation";
        //     $imtscale['resource']          = $imtscaleresource;

        //     $bodyFHIR['resourceType'] = "Bundle";
        //     $bodyFHIR['type']         = "transaction";
        //     $bodyFHIR['entry'][]      = $imtscale;

        //     $response = Satusehat::postbundle(json_encode($bodyFHIR));
        //     $this->response($response,200);
        // }

        public function SatuSehat_POST(){
            $transsaksiid="9ee99380-a6f6-4707-87fb-ba3e4183810c";
            $resultexamination = $this->md->resultexamination(ORG_ID,$transsaksiid);

            if(!empty($resultexamination)){
                $responsegetencounter = Satusehat::getencounter($resultexamination[0]->ENCOUNTER_ID);
             
                $bodyFHIR                   = [];
                $categorycoding             = [];
                $encounter                  = [];
                $identifier1                = [];
                $identifier2                = [];
                $performer                  = [];
                $subject                    = [];
                
                $imtscale                   = [];
                $imtscaleresource           = [];
                $imtscaleresourcecodecoding = [];

                $height                   = [];
                $heightresource           = [];
                $heightresourcecodecoding = [];

                $weight                   = [];
                $weightresource           = [];
                $weightresourcecodecoding = [];

                $systol                   = [];
                $systolresource           = [];
                $systolresourcecodecoding = [];

                $diastol                   = [];
                $diastolresource           = [];
                $diastolresourcecodecoding = [];

                $temp                   = [];
                $tempresource           = [];
                $tempresourcecodecoding = [];

                $categorycoding['code']    = "vital-signs";
                $categorycoding['display'] = "Vital Signs";
                $categorycoding['system']  = "http://terminology.hl7.org/CodeSystem/observation-category";
                $encounter['display']      = "Kunjungan Rawat Jalan";
                $encounter['reference']    = "Encounter/".$resultexamination[0]->ENCOUNTER_ID;
                $identifier1['system']     = "http://sys-ids.kemkes.go.id/observation/".ORGID_SATUSEHAT;
                $identifier1['use']        = "official";
                $identifier1['value']      = $resultexamination[0]->EXAM_ID;
                $identifier2['system']     = "http://sys-ids.kemkes.go.id/observation/".ORGID_SATUSEHAT;
                $identifier2['use']        = "official";
                $identifier2['value']      = generateuuid();
                $performer['display']      = $responsegetencounter['participant'][0]['individual']['display'];
                $performer['reference']    = $responsegetencounter['participant'][0]['individual']['reference'];
                $subject['display']        = $responsegetencounter['subject']['display'];
                $subject['reference']      = $responsegetencounter['subject']['reference'];

                $imtscaleresourcecodecoding['code']    = "39156-5";
                $imtscaleresourcecodecoding['display'] = "Body mass index (BMI) [Ratio]";
                $imtscaleresourcecodecoding['system']  = "http://loinc.org";

                $heightresourcecodecoding['code']    = "8302-2";
                $heightresourcecodecoding['display'] = "Body height";
                $heightresourcecodecoding['system']  = "http://loinc.org";

                $weightresourcecodecoding['code']    = "29463-7";
                $weightresourcecodecoding['display'] = "Body weight";
                $weightresourcecodecoding['system']  = "http://loinc.org";

                $systolresourcecodecoding['code']    = "8480-6";
                $systolresourcecodecoding['display'] = "Systolic blood pressure";
                $systolresourcecodecoding['system']  = "http://loinc.org";

                $diastolresourcecodecoding['code']    = "8462-4";
                $diastolresourcecodecoding['display'] = "Diastolic blood pressure";
                $diastolresourcecodecoding['system']  = "http://loinc.org";

                $tempresourcecodecoding['code']    = "8310-5";
                $tempresourcecodecoding['display'] = "Body temperature";
                $tempresourcecodecoding['system']  = "http://loinc.org";

                $imtscaleresource['category'][]['coding'][]  = $categorycoding;
                $imtscaleresource['code']['coding'][]        = $imtscaleresourcecodecoding;
                $imtscaleresource['effectiveDateTime']       = $resultexamination[0]->assessmentdate."+00:00";
                $imtscaleresource['encounter']               = $encounter;
                $imtscaleresource['identifier'][]            = $identifier1;
                $imtscaleresource['identifier'][]            = $identifier2;
                $imtscaleresource['issued']                  = $resultexamination[0]->assessmentdate."+00:00";
                $imtscaleresource['performer'][]             = $performer;
                $imtscaleresource['resourceType']            = "Observation";
                $imtscaleresource['status']                  = "final";
                $imtscaleresource['subject']                 = $subject;
                $imtscaleresource['valueQuantity']['code']   = "kg/m2";
                $imtscaleresource['valueQuantity']['system'] = "http://unitsofmeasure.org";
                $imtscaleresource['valueQuantity']['unit']   = "kg/m2";
                $imtscaleresource['valueQuantity']['value']  = floatval($resultexamination[0]->BMI_VALUE);

                $heightresource['category'][]['coding'][]  = $categorycoding;
                $heightresource['code']['coding'][]        = $heightresourcecodecoding;
                $heightresource['effectiveDateTime']       = $resultexamination[0]->assessmentdate."+00:00";
                $heightresource['encounter']               = $encounter;
                $heightresource['identifier'][]            = $identifier1;
                $heightresource['identifier'][]            = $identifier2;
                $heightresource['issued']                  = $resultexamination[0]->assessmentdate."+00:00";
                $heightresource['performer'][]             = $performer;
                $heightresource['resourceType']            = "Observation";
                $heightresource['status']                  = "final";
                $heightresource['subject']                 = $subject;
                $heightresource['valueQuantity']['code']   = "cm";
                $heightresource['valueQuantity']['system'] = "http://unitsofmeasure.org";
                $heightresource['valueQuantity']['unit']   = "cm";
                $heightresource['valueQuantity']['value']  = floatval($resultexamination[0]->HEIGHT_VALUE);

                $weightresource['category'][]['coding'][]  = $categorycoding;
                $weightresource['code']['coding'][]        = $weightresourcecodecoding;
                $weightresource['effectiveDateTime']       = $resultexamination[0]->assessmentdate."+00:00";
                $weightresource['encounter']               = $encounter;
                $weightresource['identifier'][]            = $identifier1;
                $weightresource['identifier'][]            = $identifier2;
                $weightresource['issued']                  = $resultexamination[0]->assessmentdate."+00:00";
                $weightresource['performer'][]             = $performer;
                $weightresource['resourceType']            = "Observation";
                $weightresource['status']                  = "final";
                $weightresource['subject']                 = $subject;
                $weightresource['valueQuantity']['code']   = "kg";
                $weightresource['valueQuantity']['system'] = "http://unitsofmeasure.org";
                $weightresource['valueQuantity']['unit']   = "kg";
                $weightresource['valueQuantity']['value']  = floatval($resultexamination[0]->WEIGHT_VALUE);

                $systolresource['category'][]['coding'][]  = $categorycoding;
                $systolresource['code']['coding'][]        = $systolresourcecodecoding;
                $systolresource['effectiveDateTime']       = $resultexamination[0]->assessmentdate."+00:00";
                $systolresource['encounter']               = $encounter;
                $systolresource['identifier'][]            = $identifier1;
                $systolresource['identifier'][]            = $identifier2;
                $systolresource['issued']                  = $resultexamination[0]->assessmentdate."+00:00";
                $systolresource['performer'][]             = $performer;
                $systolresource['resourceType']            = "Observation";
                $systolresource['status']                  = "final";
                $systolresource['subject']                 = $subject;
                $systolresource['valueQuantity']['code']   = "mm[Hg]";
                $systolresource['valueQuantity']['system'] = "http://unitsofmeasure.org";
                $systolresource['valueQuantity']['unit']   = "mm[Hg]";
                $systolresource['valueQuantity']['value']  = floatval($resultexamination[0]->BLOOD_HIGH_VALUE);

                $diastolresource['category'][]['coding'][]  = $categorycoding;
                $diastolresource['code']['coding'][]        = $diastolresourcecodecoding;
                $diastolresource['effectiveDateTime']       = $resultexamination[0]->assessmentdate."+00:00";
                $diastolresource['encounter']               = $encounter;
                $diastolresource['identifier'][]            = $identifier1;
                $diastolresource['identifier'][]            = $identifier2;
                $diastolresource['issued']                  = $resultexamination[0]->assessmentdate."+00:00";
                $diastolresource['performer'][]             = $performer;
                $diastolresource['resourceType']            = "Observation";
                $diastolresource['status']                  = "final";
                $diastolresource['subject']                 = $subject;
                $diastolresource['valueQuantity']['code']   = "mm[Hg]";
                $diastolresource['valueQuantity']['system'] = "http://unitsofmeasure.org";
                $diastolresource['valueQuantity']['unit']   = "mm[Hg]";
                $diastolresource['valueQuantity']['value']  = floatval($resultexamination[0]->BLOOD_LOW_NOTE);

                $tempresource['category'][]['coding'][]  = $categorycoding;
                $tempresource['code']['coding'][]        = $tempresourcecodecoding;
                $tempresource['effectiveDateTime']       = $resultexamination[0]->assessmentdate."+00:00";
                $tempresource['encounter']               = $encounter;
                $tempresource['identifier'][]            = $identifier1;
                $tempresource['identifier'][]            = $identifier2;
                $tempresource['issued']                  = $resultexamination[0]->assessmentdate."+00:00";
                $tempresource['performer'][]             = $performer;
                $tempresource['resourceType']            = "Observation";
                $tempresource['status']                  = "final";
                $tempresource['subject']                 = $subject;
                $tempresource['valueQuantity']['code']   = "Cel";
                $tempresource['valueQuantity']['system'] = "http://unitsofmeasure.org";
                $tempresource['valueQuantity']['unit']   = "C";
                $tempresource['valueQuantity']['value']  = floatval($resultexamination[0]->TIWEN_VALUE);

                $imtscale['fullUrl']           = "urn:uuid:".generateuuid();
                $imtscale['request']['method'] = "POST";
                $imtscale['request']['url']    = "Observation";
                $imtscale['resource']          = $imtscaleresource;
                $height['fullUrl']             = "urn:uuid:".generateuuid();
                $height['request']['method']   = "POST";
                $height['request']['url']      = "Observation";
                $height['resource']            = $heightresource;
                $weight['fullUrl']             = "urn:uuid:".generateuuid();
                $weight['request']['method']   = "POST";
                $weight['request']['url']      = "Observation";
                $weight['resource']            = $weightresource;
                $systol['fullUrl']             = "urn:uuid:".generateuuid();
                $systol['request']['method']   = "POST";
                $systol['request']['url']      = "Observation";
                $systol['resource']            = $systolresource;
                $diastol['fullUrl']            = "urn:uuid:".generateuuid();
                $diastol['request']['method']  = "POST";
                $diastol['request']['url']     = "Observation";
                $diastol['resource']           = $diastolresource;
                $temp['fullUrl']               = "urn:uuid:".generateuuid();
                $temp['request']['method']     = "POST";
                $temp['request']['url']        = "Observation";
                $temp['resource']              = $tempresource;
                
                $bodyFHIR['resourceType'] = "Bundle";
                $bodyFHIR['type']         = "transaction";
                $bodyFHIR['entry'][]      = $imtscale;
                $bodyFHIR['entry'][]      = $height;
                $bodyFHIR['entry'][]      = $weight;
                $bodyFHIR['entry'][]      = $systol;
                $bodyFHIR['entry'][]      = $diastol;
                $bodyFHIR['entry'][]      = $temp;

                $response = Satusehat::postbundle(json_encode($bodyFHIR));
                $this->response($response,200);
            }

            
        }

    }

?>
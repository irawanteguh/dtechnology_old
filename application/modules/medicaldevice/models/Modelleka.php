<?php
    class Modelleka extends CI_Model{

        function result($orgid,$transid){
            $query =
                    "
                        select x.*,
                        (
                            select
                                    case
                                        when x.id='001' and x.header_id='001' then GROUP_CONCAT(height_value, ';', height_normal, ';', height_note, ';')
                                        when x.id='002' and x.header_id='001' then GROUP_CONCAT(weight_value, ';', weight_normal, ';', weight_note, ';')
                                        when x.id='003' and x.header_id='001' then GROUP_CONCAT(bmi_value, ';', bmi_normal, ';', bmi_note, ';')

                                        when x.id='001' and x.header_id='002' then GROUP_CONCAT(fat_zflv_value, ';', fat_zflv_normal, ';', fat_zflv_note, ';')
                                        when x.id='002' and x.header_id='002' then GROUP_CONCAT(fat_jcdx_value, ';', fat_jcdx_normal, ';', fat_jcdx_note, ';')
                                        when x.id='003' and x.header_id='002' then GROUP_CONCAT(fat_tsfl_value, ';', fat_tsfl_normal, ';', fat_tsfl_note, ';')
                                        when x.id='004' and x.header_id='002' then GROUP_CONCAT(fat_tsflv_value, ';', fat_tsflv_normal, ';', fat_tsflv_note, ';')
                                        when x.id='005' and x.header_id='002' then GROUP_CONCAT(fat_zfl_value, ';', fat_zfl_normal, ';', fat_zfl_note, ';')
                                        when x.id='006' and x.header_id='002' then GROUP_CONCAT(fat_jrl_value, ';', fat_jrl_normal, ';', fat_jrl_note, ';')
                                        when x.id='007' and x.header_id='002' then GROUP_CONCAT(fat_jrlv_value, ';', fat_jrlv_normal, ';', fat_jrlv_note, ';')
                                        when x.id='008' and x.header_id='002' then GROUP_CONCAT(fat_gy_value, ';', fat_gy_normal, ';', fat_gy_note, ';')
                                        when x.id='009' and x.header_id='002' then GROUP_CONCAT(fat_qztz_value, ';', fat_qztz_normal, ';', fat_qztz_note, ';')
                                        when x.id='010' and x.header_id='002' then GROUP_CONCAT(fat_dbzlv_value, ';', fat_dbzlv_normal, ';', fat_dbzlv_note, ';')
                                        when x.id='011' and x.header_id='002' then GROUP_CONCAT(fat_xbnyl_value, ';', fat_xbnyl_normal, ';', fat_xbnyl_note, ';')
                                        when x.id='012' and x.header_id='002' then GROUP_CONCAT(fat_xbnylv_value, ';', fat_xbnylv_normal, ';', fat_xbnylv_note, ';')
                                        when x.id='013' and x.header_id='002' then GROUP_CONCAT(fat_xbwyl_value, ';', fat_xbwyl_normal, ';', fat_xbwyl_note, ';')
                                        when x.id='014' and x.header_id='002' then GROUP_CONCAT(fat_xbwylv_value, ';', fat_xbwylv_normal, ';', fat_xbwylv_note, ';')

                                        when x.id='001' and x.header_id='003' then GROUP_CONCAT(blood_high_value, ';', blood_high_normal, ';', blood_high_note, ';')
                                        when x.id='002' and x.header_id='003' then GROUP_CONCAT(blood_low_value, ';', blood_low_normal, ';', blood_low_note, ';')
                                        when x.id='003' and x.header_id='003' then GROUP_CONCAT(blood_rate_value, ';', blood_rate_normal, ';', blood_rate_note, ';')

                                        when x.id='001' and x.header_id='004' then GROUP_CONCAT(spo2_sp_value, ';', spo2_sp_normal, ';', spo2_sp_note, ';')

                                        when x.id='001' and x.header_id='005' then GROUP_CONCAT(tiwen_value, ';', tiwen_normal, ';', tiwen_note, ';')

                                        when x.id='001' and x.header_id='006' then GROUP_CONCAT(fgn_bz_value, ';', fgn_bz_normal, ';', fgn_bz_note, ';')
                                        when x.id='002' and x.header_id='006' then GROUP_CONCAT(fgn_fev1_value, ';', fgn_fev1_normal, ';', fgn_fev1_note, ';')
                                        when x.id='003' and x.header_id='006' then GROUP_CONCAT(fgn_fvc_value, ';', fgn_fvc_normal, ';', fgn_fvc_note, ';')
                                        when x.id='004' and x.header_id='006' then GROUP_CONCAT(fgn_bz_value, ';', fgn_bz_normal, ';', fgn_bz_note, ';')

                                        when x.id='001' and x.header_id='007' then GROUP_CONCAT(ecg_data_value, ';','',';',''';')
                                        when x.id='002' and x.header_id='007' then GROUP_CONCAT(ecg_result_value, ';','',';',''';')
                                        when x.id='003' and x.header_id='007' then GROUP_CONCAT(ecg_xinlv_value, ';','',';',''';')

                                        when x.id='001' and x.header_id='008' then GROUP_CONCAT(xt_type_value, ';', xt_type_normal, ';', xt_type_note, ';')
                                        when x.id='002' and x.header_id='008' then GROUP_CONCAT(xt_value_value, ';', xt_value_normal, ';', xt_value_note, ';')
                                        
                                        when x.id='001' and x.header_id='009' then GROUP_CONCAT(ytb_waist_value, ';', ytb_waist_normal, ';', ytb_waist_note, ';')
                                        when x.id='002' and x.header_id='009' then GROUP_CONCAT(ytb_hip_value, ';', ytb_hip_normal, ';', ytb_hip_note, ';')
                                        when x.id='003' and x.header_id='009' then GROUP_CONCAT(ytb_whr_value, ';', ytb_whr_normal, ';', ytb_whr_note, ';')
                                        
                                        when x.id='001' and x.header_id='010' then GROUP_CONCAT(ns_value, ';', ns_normal, ';', ns_note, ';')
                                        
                                        when x.id='001' and x.header_id='011' then GROUP_CONCAT(dgc_value, ';', dgc_normal, ';', dgc_note, ';')
                                        
                                        when x.id='001' and x.header_id='012' then GROUP_CONCAT(zybs_value, ';', '', ';', '', ';')
                                        when x.id='002' and x.header_id='012' then GROUP_CONCAT(zybs_1, ';', '', ';', '', ';')
                                        when x.id='003' and x.header_id='012' then GROUP_CONCAT(zybs_2, ';', '', ';', '', ';')
                                        when x.id='004' and x.header_id='012' then GROUP_CONCAT(zybs_3, ';', '', ';', '', ';')
                                        when x.id='005' and x.header_id='012' then GROUP_CONCAT(zybs_4, ';', '', ';', '', ';')
                                        when x.id='006' and x.header_id='012' then GROUP_CONCAT(zybs_5, ';', '', ';', '', ';')
                                        when x.id='007' and x.header_id='012' then GROUP_CONCAT(zybs_6, ';', '', ';', '', ';')
                                        when x.id='008' and x.header_id='012' then GROUP_CONCAT(zybs_7, ';', '', ';', '', ';')
                                        when x.id='009' and x.header_id='012' then GROUP_CONCAT(zybs_8, ';', '', ';', '', ';')
                                        when x.id='010' and x.header_id='012' then GROUP_CONCAT(zybs_9, ';', '', ';', '', ';')
                                        
                                        when x.id='001' and x.header_id='013' then GROUP_CONCAT(shili_left_eye_value, ';', shili_left_eye_normal, ';', shili_left_eye_note, ';')
                                        when x.id='002' and x.header_id='013' then GROUP_CONCAT(shili_right_eye_value, ';', shili_right_eye_normal, ';', shili_right_eye_note, ';')
                                        
                                        when x.id='001' and x.header_id='014' then GROUP_CONCAT(semang_value, ';', semang_normal, ';', semang_note, ';')
                                        
                                        when x.id='001' and x.header_id='015' then GROUP_CONCAT(xlcp_ucla_value, ';', xlcp_ucla_normal, ';', xlcp_ucla_note, ';')
                                        when x.id='002' and x.header_id='015' then GROUP_CONCAT(xlcp_lnyy_value, ';', xlcp_lnyy_normal, ';', xlcp_lnyy_note, ';')
                                        when x.id='003' and x.header_id='015' then GROUP_CONCAT(xlcp_zpyy_value, ';', xlcp_zpyy_normal, ';', xlcp_zpyy_note, ';')
                                        when x.id='004' and x.header_id='015' then GROUP_CONCAT(xlcp_hmdjl_value, ';', xlcp_hmdjl_normal, ';', xlcp_hmdjl_note, ';')
                                        when x.id='005' and x.header_id='015' then GROUP_CONCAT(xlcp_qxjkd_value, ';', xlcp_qxjkd_normal, ';', xlcp_qxjkd_note, ';')
                                        when x.id='006' and x.header_id='015' then GROUP_CONCAT(xlcp_zcjkpd_value, ';', xlcp_zcjkpd_normal, ';', xlcp_zcjkpd_note, ';')
                                        when x.id='007' and x.header_id='015' then GROUP_CONCAT(xlcp_shmyd_value, ';', xlcp_shmyd_normal, ';', xlcp_shmyd_note, ';')
                                        when x.id='008' and x.header_id='015' then GROUP_CONCAT(xlcp_rgza_value, ';', xlcp_rgza_normal, ';', xlcp_rgza_note, ';')
                                        when x.id='009' and x.header_id='015' then GROUP_CONCAT(xlcp_pstr_value, ';', xlcp_pstr_normal, ';', xlcp_pstr_note, ';')
                                        when x.id='010' and x.header_id='015' then GROUP_CONCAT(xlcp_hfxx_value, ';', xlcp_hfxx_normal, ';', xlcp_hfxx_note, ';')
                                        when x.id='011' and x.header_id='015' then GROUP_CONCAT(xlcp_eq_value, ';', xlcp_eq_normal, ';', xlcp_eq_note, ';')
                                        when x.id='012' and x.header_id='015' then GROUP_CONCAT(xlcp_smzkpg_value, ';', xlcp_smzkpg_normal, ';', xlcp_smzkpg_note, ';')

                                        when x.id='001' and x.header_id='016' then GROUP_CONCAT(ecg12_data_value, ';', '', ';', '', ';')
                                        when x.id='002' and x.header_id='016' then GROUP_CONCAT(ecg12_result_value, ';', ecg12_result_normal, ';', ecg12_result_note, ';')
                                        when x.id='003' and x.header_id='016' then GROUP_CONCAT(ecg12_heart_rate_value, ';', ecg12_heart_rate_normal, ';', ecg12_heart_rate_note, ';')
                                        when x.id='004' and x.header_id='016' then GROUP_CONCAT(ecg12_p_axis_value, ';', ecg12_p_axis_normal, ';', ecg12_p_axis_note, ';')
                                        when x.id='005' and x.header_id='016' then GROUP_CONCAT(ecg12_qrs_axis_value, ';', ecg12_qrs_axis_normal, ';', ecg12_qrs_axis_note, ';')
                                        when x.id='006' and x.header_id='016' then GROUP_CONCAT(ecg12_t_axis_value, ';', ecg12_t_axis_normal, ';', ecg12_t_axis_note, ';')
                                        when x.id='007' and x.header_id='016' then GROUP_CONCAT(ecg12_pr_value, ';', ecg12_pr_normal, ';', ecg12_pr_note, ';')
                                        when x.id='008' and x.header_id='016' then GROUP_CONCAT(ecg12_qrs_value, ';', ecg12_qrs_normal, ';', ecg12_qrs_note, ';')
                                        when x.id='009' and x.header_id='016' then GROUP_CONCAT(ecg12_qt_value, ';', ecg12_qt_normal, ';', ecg12_qt_note, ';')
                                        when x.id='010' and x.header_id='016' then GROUP_CONCAT(ecg12_qtc_value, ';', ecg12_qtc_normal, ';', ecg12_qtc_note, ';')
                                        when x.id='011' and x.header_id='016' then GROUP_CONCAT(ecg12_rv5_value, ';', ecg12_rv5_normal, ';', ecg12_rv5_note, ';')
                                        when x.id='012' and x.header_id='016' then GROUP_CONCAT(ecg12_sv1_value, ';', ecg12_sv1_normal, ';', ecg12_sv1_note, ';')
                                        when x.id='013' and x.header_id='016' then GROUP_CONCAT(ecg12_sample_rate_value, ';', ecg12_sample_rate_normal, ';', ecg12_sample_rate_note, ';')
                                        when x.id='014' and x.header_id='016' then GROUP_CONCAT(ecg12_sample_time_value, ';', ecg12_sample_time_normal, ';', ecg12_sample_time_note, ';')

                                        else
                                        ';;;;'
                                    end
                            from dt01_receivedata_data_leka
                            where org_id='".$orgid."'
                            and   transaksi_id='".$transid."'
                            )resultdata
                        from(
                            select '001' as id, 'H' as jenis, '' as header_id, 'height weight' as examination, '' as unit union
                            select '002' as id, 'H' as jenis, '' as header_id, 'body fat' as examination, '' as unit union
                            select '003' as id, 'H' as jenis, '' as header_id, 'blood pressure' as examination, '' as unit union
                            select '004' as id, 'H' as jenis, '' as header_id, 'blood oxygen' as examination, '' as unit union
                            select '005' as id, 'H' as jenis, '' as header_id, 'body temperature' as examination, '' as unit union
                            select '006' as id, 'H' as jenis, '' as header_id, 'lung function' as examination, '' as unit union
                            select '007' as id, 'H' as jenis, '' as header_id, 'fast ECG' as examination, '' as unit union
                            select '008' as id, 'H' as jenis, '' as header_id, 'blood sugar' as examination, '' as unit union
                            select '009' as id, 'H' as jenis, '' as header_id, 'waist hip rate' as examination, '' as unit union
                            select '010' as id, 'H' as jenis, '' as header_id, 'uric acid' as examination, '' as unit union
                            select '011' as id, 'H' as jenis, '' as header_id, 'cholesterol' as examination, '' as unit union
                            select '012' as id, 'H' as jenis, '' as header_id, 'TCM constitution identification' as examination, '' as unit union
                            select '013' as id, 'H' as jenis, '' as header_id, 'vision' as examination, '' as unit union
                            select '014' as id, 'H' as jenis, '' as header_id, 'color blindness' as examination, '' as unit union
                            select '015' as id, 'H' as jenis, '' as header_id, 'psychological tests' as examination, '' as unit union
                            select '016' as id, 'H' as jenis, '' as header_id, '12 lead ECG' as examination, '' as unit union
                            
                            select '001' as id, 'D' as jenis, '001' as header_id, 'height' as examination, 'cm' as unit union
                            select '002' as id, 'D' as jenis, '001' as header_id, 'weight' as examination, 'kg' as unit union
                            select '003' as id, 'D' as jenis, '001' as header_id, 'bmi' as examination, 'kg/m2' as unit union
                            
                            -- Detailed Parameters for Fat Examination
                            select '001' as id, 'D' as jenis, '002' as header_id, 'body fat rate' as examination, '%' as unit union
                            select '002' as id, 'D' as jenis, '002' as header_id, 'basal metabolism' as examination, 'kcal' as unit union
                            select '003' as id, 'D' as jenis, '002' as header_id, 'body water content' as examination, 'kg' as unit union
                            select '004' as id, 'D' as jenis, '002' as header_id, 'body water rate' as examination, '%' as unit union
                            select '005' as id, 'D' as jenis, '002' as header_id, 'body fat content' as examination, 'kg' as unit union
                            select '006' as id, 'D' as jenis, '002' as header_id, 'body muscle content' as examination, 'kg' as unit union
                            select '007' as id, 'D' as jenis, '002' as header_id, 'body muscle rate' as examination, '%' as unit union
                            select '008' as id, 'D' as jenis, '002' as header_id, 'bone salt' as examination, 'kg' as unit union
                            select '009' as id, 'D' as jenis, '002' as header_id, 'fat free mass' as examination, 'kg' as unit union
                            select '010' as id, 'D' as jenis, '002' as header_id, 'Protein rate' as examination, '%' as unit union
                            select '011' as id, 'D' as jenis, '002' as header_id, 'Intracellular fluid volume' as examination, 'L' as unit union
                            select '012' as id, 'D' as jenis, '002' as header_id, 'Extracellular fluid volume' as examination, 'L' as unit union
                            select '013' as id, 'D' as jenis, '002' as header_id, 'Intracellular fluid rate' as examination, '%' as unit union
                            
                            -- Detailed Parameters for Blood Pressure Examination
                            select '001' as id, 'D' as jenis, '003' as header_id, 'systolic blood pressure' as examination, 'mmHg' as unit union
                            select '002' as id, 'D' as jenis, '003' as header_id, 'diastolic blood pressure' as examination, 'mmHg' as unit union
                            select '003' as id, 'D' as jenis, '003' as header_id, 'heart rate' as examination, 'bpm' as unit union
                            -- select '004' as id, 'D' as jenis, '003' as header_id, 'systolic blood pressure value' as examination, 'mmHg' as unit union
                            -- select '005' as id, 'D' as jenis, '003' as header_id, 'diastolic blood pressure value' as examination, 'mmHg' as unit union
                            
                            -- Detailed Parameters for Blood Oxygen Examination
                            select '001' as id, 'D' as jenis, '004' as header_id, 'blood oxygen' as examination, '%' as unit union
                            
                            -- Detailed Parameters for Body Temperature Examination
                            select '001' as id, 'D' as jenis, '005' as header_id, 'body temperature' as examination, '°C' as unit union
                            
                            -- Detailed Parameters for Lung Function Examination
                            select '001' as id, 'D' as jenis, '006' as header_id, 'Peak expiratory flow' as examination, 'L/min' as unit union
                            select '002' as id, 'D' as jenis, '006' as header_id, 'Forced expiratory volume in the first second' as examination, 'L' as unit union
                            select '003' as id, 'D' as jenis, '006' as header_id, 'forced vital capacity' as examination, 'L' as unit union
                            select '004' as id, 'D' as jenis, '006' as header_id, 'Forced expiratory volume in the first second/forced vital capacity' as examination, '%' as unit union
                            
                            -- Detailed Parameters for ECG Examination
                            select '001' as id, 'D' as jenis, '007' as header_id, 'ECG result' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '007' as header_id, 'ECG waveform picture data' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '007' as header_id, 'ECG waveform picture data length' as examination, 'ms' as unit union
                            
                            -- Detailed Parameters for Blood Glucose Examination
                            select '001' as id, 'D' as jenis, '008' as header_id, 'Types of blood glucose measurement' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '008' as header_id, 'blood glucose level' as examination, 'mg/dL' as unit union
                            
                            -- Detailed Parameters for Waist Hip Rate Examination
                            select '001' as id, 'D' as jenis, '009' as header_id, 'waistline' as examination, 'cm' as unit union
                            select '002' as id, 'D' as jenis, '009' as header_id, 'hipline' as examination, 'cm' as unit union
                            select '003' as id, 'D' as jenis, '009' as header_id, 'waist hip rate' as examination, '' as unit union
                            
                            -- Detailed Parameters for Uric Acid Examination
                            select '001' as id, 'D' as jenis, '010' as header_id, 'Uric acid value' as examination, 'mg/dL' as unit union
                            
                            -- Detailed Parameters for Cholesterol Examination
                            select '001' as id, 'D' as jenis, '011' as header_id, 'Cholesterol value' as examination, 'mg/dL' as unit union
                            
                            -- Detailed Parameters for TCM Constitution Identification Examination
                            select '001' as id, 'D' as jenis, '012' as header_id, 'TCM constitution type' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '012' as header_id, 'Yang deficiency quality score' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '012' as header_id, 'Yin deficiency quality score' as examination, '' as unit union
                            select '004' as id, 'D' as jenis, '012' as header_id, 'Qi deficiency quality score' as examination, '' as unit union
                            select '005' as id, 'D' as jenis, '012' as header_id, 'Phlegm-dampness score' as examination, '' as unit union
                            select '006' as id, 'D' as jenis, '012' as header_id, 'Humidity and heat quality score' as examination, '' as unit union
                            select '007' as id, 'D' as jenis, '012' as header_id, 'Blood stasis score' as examination, '' as unit union
                            select '008' as id, 'D' as jenis, '012' as header_id, 'Special quality score' as examination, '' as unit union
                            select '009' as id, 'D' as jenis, '012' as header_id, 'Qi stagnation quality score' as examination, '' as unit union
                            select '010' as id, 'D' as jenis, '012' as header_id, 'Peace and quality score' as examination, '' as unit union
                            
                            -- Detailed Parameters for Vision Examination
                            select '001' as id, 'D' as jenis, '013' as header_id, 'left eye' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '013' as header_id, 'Visual acuity of the left eye' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '013' as header_id, 'Left eye visual cues' as examination, '' as unit union
                            select '004' as id, 'D' as jenis, '013' as header_id, 'right eye' as examination, '' as unit union
                            select '005' as id, 'D' as jenis, '013' as header_id, 'Visual acuity of the right eye' as examination, '' as unit union
                            select '006' as id, 'D' as jenis, '013' as header_id, 'Visual cues in right eye' as examination, '' as unit union
                            
                            -- Detailed Parameters for Color Blindness Examination
                            select '001' as id, 'D' as jenis, '014' as header_id, 'Color blindness result' as examination, '' as unit union
                            
                            -- Detailed Parameters for Psychological Tests Examination
                            select '001' as id, 'D' as jenis, '015' as header_id, 'UCLA Loneliness scale score' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '015' as header_id, 'Geriatric depression Scale score' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '015' as header_id, 'Self-rated depression scale score' as examination, '' as unit union
                            select '004' as id, 'D' as jenis, '015' as header_id, 'Hamilton Anxiety Scale score' as examination, '' as unit union
                            select '005' as id, 'D' as jenis, '015' as header_id, 'Emotional health test scores' as examination, '' as unit union
                            select '006' as id, 'D' as jenis, '015' as header_id, 'Self-measured health rating scale score' as examination, '' as unit union
                            select '007' as id, 'D' as jenis, '015' as header_id, 'Life satisfaction Scale score' as examination, '' as unit union
                            select '008' as id, 'D' as jenis, '015' as header_id, 'Personality disorder personality test score' as examination, '' as unit union
                            select '009' as id, 'D' as jenis, '015' as header_id, 'PSTR Adult stress test scores' as examination, '' as unit union
                            select '010' as id, 'D' as jenis, '015' as header_id, 'Harvard sexuality test score' as examination, '' as unit union
                            select '011' as id, 'D' as jenis, '015' as header_id, 'Emotional intelligence (EQ) test score' as examination, '' as unit union
                            select '012' as id, 'D' as jenis, '015' as header_id, 'Sleep status assessment score' as examination, '' as unit union
                            
                            -- Detailed Parameters for 12 Lead ECG Examination
                            select '001' as id, 'D' as jenis, '016' as header_id, 'Ecg report picture data' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '016' as header_id, 'diagnosis result' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '016' as header_id, 'heart rate' as examination, 'bpm' as unit union
                            select '004' as id, 'D' as jenis, '016' as header_id, 'P axis' as examination, 'degrees' as unit union
                            select '005' as id, 'D' as jenis, '016' as header_id, 'QRS axis' as examination, 'degrees' as unit union
                            select '006' as id, 'D' as jenis, '016' as header_id, 'T axis' as examination, 'degrees' as unit union
                            select '007' as id, 'D' as jenis, '016' as header_id, 'PR interval' as examination, 'ms' as unit union
                            select '008' as id, 'D' as jenis, '016' as header_id, 'QRS time limit' as examination, 'ms' as unit union
                            select '009' as id, 'D' as jenis, '016' as header_id, 'QT interval' as examination, 'ms' as unit union
                            select '010' as id, 'D' as jenis, '016' as header_id, 'QTc interval' as examination, 'ms' as unit union
                            select '011' as id, 'D' as jenis, '016' as header_id, 'RV5 value' as examination, 'mV' as unit union
                            select '012' as id, 'D' as jenis, '016' as header_id, 'SV1 value' as examination, 'mV' as unit union
                            select '013' as id, 'D' as jenis, '016' as header_id, 'sampling frequency' as examination, 'Hz' as unit union
                            select '014' as id, 'D' as jenis, '016' as header_id, 'Sampling duration' as examination, 's' as unit
                            
                        )x

                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function listexamination(){
            $query =
                    "
                        select a.transaksi_id, name, photo, encounter_id, id_number, upper(LEFT(a.name, 1)) initial, sex, nation, bod, address, exam_id, date_format(created_date,'%d.%m.%Y')createddate,
                               ecg12_data_value
                        from dt01_receivedata_data_leka a
                        where a.active='1'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function resultJSON(){
            $query =
                    "
                        select a.*
                        from dt01_receivedata_data_leka a
                        where a.active='1'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function updateencounter($data, $transid){           
            $sql =   $this->db->update("dt01_receivedata_data_leka",$data,array("transaksi_id"=>$transid));
            return $sql;
        }


    }
?>
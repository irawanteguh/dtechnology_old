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
                                            when x.id='012' and x.header_id='002' then GROUP_CONCAT(fat_xbwyl_value, ';', fat_xbwyl_normal, ';', fat_xbwyl_note, ';')
                                            when x.id='013' and x.header_id='002' then GROUP_CONCAT(fat_xbnylv_value, ';', fat_xbnylv_normal, ';', fat_xbnylv_note, ';')
                                            when x.id='014' and x.header_id='002' then GROUP_CONCAT(fat_xbwylv_value, ';', fat_xbwylv_normal, ';', fat_xbwylv_note, ';')
                                            when x.id='015' and x.header_id='002' then GROUP_CONCAT(fat_dbz_value, ';', fat_dbz_normal, ';', fat_dbz_note, ';')
                                            when x.id='016' and x.header_id='002' then GROUP_CONCAT(fat_nzzf_value, ';', fat_nzzf_normal, ';', fat_nzzf_note, ';')
                                            when x.id='017' and x.header_id='002' then GROUP_CONCAT(fat_gl_value, ';', fat_gl_normal, ';', fat_gl_note, ';')

                                            when x.id='001' and x.header_id='003' then GROUP_CONCAT(tiwen_value, ';', tiwen_normal, ';', tiwen_note, ';')

                                            when x.id='001' and x.header_id='004' then GROUP_CONCAT(spo2_sp_value, ';', spo2_sp_normal, ';', spo2_sp_note, ';')

                                            when x.id='001' and x.header_id='005' then GROUP_CONCAT(blood_high_value, ';', blood_high_normal, ';', blood_high_note, ';')
                                            when x.id='002' and x.header_id='005' then GROUP_CONCAT(blood_low_value, ';', blood_low_normal, ';', blood_low_note, ';')
                                            when x.id='003' and x.header_id='005' then GROUP_CONCAT(blood_rate_value, ';', blood_rate_normal, ';', blood_rate_note, ';')

                                            when x.id='001' and x.header_id='006' then GROUP_CONCAT(xt_type_value, ';', xt_type_normal, ';', xt_type_note, ';')
                                            when x.id='002' and x.header_id='006' then GROUP_CONCAT(xt_value_value, ';', xt_value_normal, ';', xt_value_note, ';')

                                            when x.id='001' and x.header_id='007' then GROUP_CONCAT(xhdb_value_value, ';', xhdb_value_normal, ';', xhdb_value_note, ';')
                                            when x.id='002' and x.header_id='007' then GROUP_CONCAT(xzsx_chd_value, ';', xzsx_chd_normal, ';', xzsx_chd_note, ';')
                                            when x.id='003' and x.header_id='007' then GROUP_CONCAT(xzsx_chol_value, ';', xzsx_chol_normal, ';', xzsx_chol_note, ';')
                                            when x.id='004' and x.header_id='007' then GROUP_CONCAT(xzsx_hdl_value, ';', xzsx_hdl_normal, ';', xzsx_hdl_note, ';')
                                            when x.id='005' and x.header_id='007' then GROUP_CONCAT(xzsx_ldl_value, ';', xzsx_ldl_normal, ';', xzsx_ldl_note, ';')
                                            when x.id='006' and x.header_id='007' then GROUP_CONCAT(xzsx_tg_value, ';', xzsx_tg_normal, ';', xzsx_tg_note, ';')

                                            when x.id='001' and x.header_id='008' then GROUP_CONCAT(dgc_value, ';', dgc_normal, ';', dgc_note, ';')

                                            when x.id='001' and x.header_id='009' then GROUP_CONCAT(ns_value, ';', ns_normal, ';', ns_note, ';')

                                            when x.id='001' and x.header_id='010' then GROUP_CONCAT(nyfx_bil_value, ';', nyfx_bil_normal, ';', nyfx_bil_note, ';')
                                            when x.id='002' and x.header_id='010' then GROUP_CONCAT(nyfx_bld_value, ';', nyfx_bld_normal, ';', nyfx_bld_note, ';')
                                            when x.id='003' and x.header_id='010' then GROUP_CONCAT(nyfx_ca_value, ';', nyfx_ca_normal, ';', nyfx_ca_note, ';')
                                            when x.id='004' and x.header_id='010' then GROUP_CONCAT(nyfx_cre_value, ';', nyfx_cre_normal, ';', nyfx_cre_note, ';')
                                            when x.id='005' and x.header_id='010' then GROUP_CONCAT(nyfx_glu_value, ';', nyfx_glu_normal, ';', nyfx_glu_note, ';')
                                            when x.id='006' and x.header_id='010' then GROUP_CONCAT(nyfx_ket_value, ';', nyfx_ket_normal, ';', nyfx_ket_note, ';')
                                            when x.id='007' and x.header_id='010' then GROUP_CONCAT(nyfx_leu_value, ';', nyfx_leu_normal, ';', nyfx_leu_note, ';')
                                            when x.id='008' and x.header_id='010' then GROUP_CONCAT(nyfx_ma_value, ';', nyfx_ma_normal, ';', nyfx_ma_note, ';')
                                            when x.id='009' and x.header_id='010' then GROUP_CONCAT(nyfx_nit_value, ';', nyfx_nit_normal, ';', nyfx_nit_note, ';')
                                            when x.id='010' and x.header_id='010' then GROUP_CONCAT(nyfx_ph_value, ';', nyfx_ph_normal, ';', nyfx_ph_note, ';')
                                            when x.id='011' and x.header_id='010' then GROUP_CONCAT(nyfx_pro_value, ';', nyfx_pro_normal, ';', nyfx_pro_note, ';')
                                            when x.id='012' and x.header_id='010' then GROUP_CONCAT(nyfx_sg_value, ';', nyfx_sg_normal, ';', nyfx_sg_note, ';')
                                            when x.id='013' and x.header_id='010' then GROUP_CONCAT(nyfx_ubg_value, ';', nyfx_ubg_normal, ';', nyfx_ubg_note, ';')
                                            when x.id='014' and x.header_id='010' then GROUP_CONCAT(nyfx_vc_value, ';', nyfx_vc_normal, ';', nyfx_vc_note, ';')

                                            when x.id='001' and x.header_id='011' then GROUP_CONCAT(fgn_bz_value, ';', fgn_bz_normal, ';', fgn_bz_note, ';')
                                            when x.id='002' and x.header_id='011' then GROUP_CONCAT(fgn_fev1_value, ';', fgn_fev1_normal, ';', fgn_fev1_note, ';')
                                            when x.id='003' and x.header_id='011' then GROUP_CONCAT(fgn_fvc_value, ';', fgn_fvc_normal, ';', fgn_fvc_note, ';')
                                            when x.id='004' and x.header_id='011' then GROUP_CONCAT(fgn_bz_value, ';', fgn_bz_normal, ';', fgn_bz_note, ';')

                                            when x.id='001' and x.header_id='012' then GROUP_CONCAT(ecg_data_value, ';','',';',''';')
                                            when x.id='002' and x.header_id='012' then GROUP_CONCAT(ecg_result_value, ';','',';',''';')
                                            when x.id='003' and x.header_id='012' then GROUP_CONCAT(ecg_xinlv_value, ';','',';',''';')

                                            when x.id='001' and x.header_id='013' then GROUP_CONCAT(ecg12_data_value, ';', '', ';', '', ';')
                                            when x.id='002' and x.header_id='013' then GROUP_CONCAT(ecg12_result_value, ';', ecg12_result_normal, ';', ecg12_result_note, ';')
                                            when x.id='003' and x.header_id='013' then GROUP_CONCAT(ecg12_heart_rate_value, ';', ecg12_heart_rate_normal, ';', ecg12_heart_rate_note, ';')
                                            when x.id='004' and x.header_id='013' then GROUP_CONCAT(ecg12_p_axis_value, ';', ecg12_p_axis_normal, ';', ecg12_p_axis_note, ';')
                                            when x.id='005' and x.header_id='013' then GROUP_CONCAT(ecg12_qrs_axis_value, ';', ecg12_qrs_axis_normal, ';', ecg12_qrs_axis_note, ';')
                                            when x.id='006' and x.header_id='013' then GROUP_CONCAT(ecg12_t_axis_value, ';', ecg12_t_axis_normal, ';', ecg12_t_axis_note, ';')
                                            when x.id='007' and x.header_id='013' then GROUP_CONCAT(ecg12_pr_value, ';', ecg12_pr_normal, ';', ecg12_pr_note, ';')
                                            when x.id='008' and x.header_id='013' then GROUP_CONCAT(ecg12_qrs_value, ';', ecg12_qrs_normal, ';', ecg12_qrs_note, ';')
                                            when x.id='009' and x.header_id='013' then GROUP_CONCAT(ecg12_qt_value, ';', ecg12_qt_normal, ';', ecg12_qt_note, ';')
                                            when x.id='010' and x.header_id='013' then GROUP_CONCAT(ecg12_qtc_value, ';', ecg12_qtc_normal, ';', ecg12_qtc_note, ';')
                                            when x.id='011' and x.header_id='013' then GROUP_CONCAT(ecg12_rv5_value, ';', ecg12_rv5_normal, ';', ecg12_rv5_note, ';')
                                            when x.id='012' and x.header_id='013' then GROUP_CONCAT(ecg12_sv1_value, ';', ecg12_sv1_normal, ';', ecg12_sv1_note, ';')
                                            when x.id='013' and x.header_id='013' then GROUP_CONCAT(ecg12_sample_rate_value, ';', ecg12_sample_rate_normal, ';', ecg12_sample_rate_note, ';')
                                            when x.id='014' and x.header_id='013' then GROUP_CONCAT(ecg12_sample_time_value, ';', ecg12_sample_time_normal, ';', ecg12_sample_time_note, ';')

                                            when x.id='001' and x.header_id='014' then GROUP_CONCAT(ytb_waist_value, ';', ytb_waist_normal, ';', ytb_waist_note, ';')
                                            when x.id='002' and x.header_id='014' then GROUP_CONCAT(ytb_hip_value, ';', ytb_hip_normal, ';', ytb_hip_note, ';')
                                            when x.id='003' and x.header_id='014' then GROUP_CONCAT(ytb_whr_value, ';', ytb_whr_normal, ';', ytb_whr_note, ';')

                                            when x.id='001' and x.header_id='015' then GROUP_CONCAT(shili_left_eye_value, ';', shili_left_eye_normal, ';', shili_left_eye_note, ';')
                                            when x.id='002' and x.header_id='015' then GROUP_CONCAT(shili_right_eye_value, ';', shili_right_eye_normal, ';', shili_right_eye_note, ';')

                                            when x.id='001' and x.header_id='016' then GROUP_CONCAT(semang_value, ';', semang_normal, ';', semang_note, ';')

                                            when x.id='001' and x.header_id='017' then GROUP_CONCAT(xlcp_ucla_value, ';', xlcp_ucla_normal, ';', xlcp_ucla_note, ';')
                                            when x.id='002' and x.header_id='017' then GROUP_CONCAT(xlcp_lnyy_value, ';', xlcp_lnyy_normal, ';', xlcp_lnyy_note, ';')
                                            when x.id='003' and x.header_id='017' then GROUP_CONCAT(xlcp_zpyy_value, ';', xlcp_zpyy_normal, ';', xlcp_zpyy_note, ';')
                                            when x.id='004' and x.header_id='017' then GROUP_CONCAT(xlcp_hmdjl_value, ';', xlcp_hmdjl_normal, ';', xlcp_hmdjl_note, ';')
                                            when x.id='005' and x.header_id='017' then GROUP_CONCAT(xlcp_qxjkd_value, ';', xlcp_qxjkd_normal, ';', xlcp_qxjkd_note, ';')
                                            when x.id='006' and x.header_id='017' then GROUP_CONCAT(xlcp_zcjkpd_value, ';', xlcp_zcjkpd_normal, ';', xlcp_zcjkpd_note, ';')
                                            when x.id='007' and x.header_id='017' then GROUP_CONCAT(xlcp_shmyd_value, ';', xlcp_shmyd_normal, ';', xlcp_shmyd_note, ';')
                                            when x.id='008' and x.header_id='017' then GROUP_CONCAT(xlcp_rgza_value, ';', xlcp_rgza_normal, ';', xlcp_rgza_note, ';')
                                            when x.id='009' and x.header_id='017' then GROUP_CONCAT(xlcp_pstr_value, ';', xlcp_pstr_normal, ';', xlcp_pstr_note, ';')
                                            when x.id='010' and x.header_id='017' then GROUP_CONCAT(xlcp_hfxx_value, ';', xlcp_hfxx_normal, ';', xlcp_hfxx_note, ';')
                                            when x.id='011' and x.header_id='017' then GROUP_CONCAT(xlcp_eq_value, ';', xlcp_eq_normal, ';', xlcp_eq_note, ';')
                                            when x.id='012' and x.header_id='017' then GROUP_CONCAT(xlcp_smzkpg_value, ';', xlcp_smzkpg_normal, ';', xlcp_smzkpg_note, ';')

                                            when x.id='001' and x.header_id='018' then GROUP_CONCAT(zybs_value, ';', '', ';', '', ';')
                                            when x.id='002' and x.header_id='018' then GROUP_CONCAT(zybs_1, ';', '', ';', '', ';')
                                            when x.id='003' and x.header_id='018' then GROUP_CONCAT(zybs_2, ';', '', ';', '', ';')
                                            when x.id='004' and x.header_id='018' then GROUP_CONCAT(zybs_3, ';', '', ';', '', ';')
                                            when x.id='005' and x.header_id='018' then GROUP_CONCAT(zybs_4, ';', '', ';', '', ';')
                                            when x.id='006' and x.header_id='018' then GROUP_CONCAT(zybs_5, ';', '', ';', '', ';')
                                            when x.id='007' and x.header_id='018' then GROUP_CONCAT(zybs_6, ';', '', ';', '', ';')
                                            when x.id='008' and x.header_id='018' then GROUP_CONCAT(zybs_7, ';', '', ';', '', ';')
                                            when x.id='009' and x.header_id='018' then GROUP_CONCAT(zybs_8, ';', '', ';', '', ';')
                                            when x.id='010' and x.header_id='018' then GROUP_CONCAT(zybs_9, ';', '', ';', '', ';')

                                            else
                                            ';;;'
                                        end
                                from dt01_receivedata_data_leka
                                where org_id='".$orgid."'
                                and   transaksi_id='".$transid."'
                            )resultdata
                        from(
                            select '001' as id, 'H' as jenis, '' as header_id, 'Height Weight and BMI' as examination, '' as unit union
                            select '002' as id, 'H' as jenis, '' as header_id, 'Body Fat' as examination, '' as unit union
                            select '003' as id, 'H' as jenis, '' as header_id, 'Body Temperature' as examination, '' as unit union
                            select '004' as id, 'H' as jenis, '' as header_id, 'Blood Oxygen' as examination, '' as unit union
                            select '005' as id, 'H' as jenis, '' as header_id, 'Blood Pressure' as examination, '' as unit union
                            select '006' as id, 'H' as jenis, '' as header_id, 'Blood Sugar' as examination, '' as unit union
                            select '007' as id, 'H' as jenis, '' as header_id, 'Blood Test' as examination, '' as unit union
                            select '008' as id, 'H' as jenis, '' as header_id, 'Cholesterol' as examination, '' as unit union
                            select '009' as id, 'H' as jenis, '' as header_id, 'Uric Acid' as examination, '' as unit union
                            select '010' as id, 'H' as jenis, '' as header_id, 'Urine Test' as examination, '' as unit union
                            select '011' as id, 'H' as jenis, '' as header_id, 'Lung Function' as examination, '' as unit union
                            select '012' as id, 'H' as jenis, '' as header_id, 'Fast ECG' as examination, '' as unit union
                            select '013' as id, 'H' as jenis, '' as header_id, '12 Lead ECG' as examination, '' as unit union
                            select '014' as id, 'H' as jenis, '' as header_id, 'Waist Hip Rate' as examination, '' as unit union
                            select '015' as id, 'H' as jenis, '' as header_id, 'Vision' as examination, '' as unit union
                            select '016' as id, 'H' as jenis, '' as header_id, 'Color Blindness' as examination, '' as unit union
                            select '017' as id, 'H' as jenis, '' as header_id, 'Psychological Tests' as examination, '' as unit union
                            select '018' as id, 'H' as jenis, '' as header_id, 'TCM Constitution Identification' as examination, '' as unit union
                            
                            select '001' as id, 'D' as jenis, '001' as header_id, 'Height' as examination, 'cm' as unit union
                            select '002' as id, 'D' as jenis, '001' as header_id, 'Weight' as examination, 'kg' as unit union
                            select '003' as id, 'D' as jenis, '001' as header_id, 'Body Mass Index (BMI) [Ratio]' as examination, 'kg/m2' as unit union

                            select '001' as id, 'D' as jenis, '002' as header_id, 'Fat Rate' as examination, '%' as unit union
                            select '002' as id, 'D' as jenis, '002' as header_id, 'Basal metabolism' as examination, 'kcal' as unit union
                            select '003' as id, 'D' as jenis, '002' as header_id, 'Water Content' as examination, 'kg' as unit union
                            select '004' as id, 'D' as jenis, '002' as header_id, 'Water Rate' as examination, '%' as unit union
                            select '005' as id, 'D' as jenis, '002' as header_id, 'Fat Content' as examination, 'kg' as unit union
                            select '006' as id, 'D' as jenis, '002' as header_id, 'Muscle Content' as examination, 'kg' as unit union
                            select '007' as id, 'D' as jenis, '002' as header_id, 'Muscle Rate' as examination, '%' as unit union
                            select '008' as id, 'D' as jenis, '002' as header_id, 'Bone Salt' as examination, 'kg' as unit union
                            select '009' as id, 'D' as jenis, '002' as header_id, 'Fat Free Mass' as examination, 'kg' as unit union
                            select '010' as id, 'D' as jenis, '002' as header_id, 'Protein Rate' as examination, '%' as unit union
                            select '011' as id, 'D' as jenis, '002' as header_id, 'Intracellular Fluid Volume' as examination, 'L' as unit union
                            select '012' as id, 'D' as jenis, '002' as header_id, 'Extracellular Fluid Volume' as examination, 'L' as unit union
                            select '013' as id, 'D' as jenis, '002' as header_id, 'Intracellular Fluid Rate' as examination, '%' as unit union
                            select '014' as id, 'D' as jenis, '002' as header_id, 'Extracellular fluid rate' as examination, 'L' as unit union
                            select '015' as id, 'D' as jenis, '002' as header_id, 'protein' as examination, 'L' as unit union
                            select '016' as id, 'D' as jenis, '002' as header_id, 'Visceral' as examination, 'L' as unit union
                            select '017' as id, 'D' as jenis, '002' as header_id, 'bone mass' as examination, 'L' as unit union

                            select '001' as id, 'D' as jenis, '003' as header_id, 'Temperature' as examination, '°C' as unit union
                            select '001' as id, 'D' as jenis, '004' as header_id, 'Blood Oxygen' as examination, '%' as unit union
                            select '001' as id, 'D' as jenis, '005' as header_id, 'Systolic Blood Pressure' as examination, 'mmHg' as unit union
                            select '002' as id, 'D' as jenis, '005' as header_id, 'Diastolic Blood Pressure' as examination, 'mmHg' as unit union
                            select '003' as id, 'D' as jenis, '005' as header_id, 'Heart Rate' as examination, 'bpm' as unit union
                            select '001' as id, 'D' as jenis, '006' as header_id, 'Types of Blood Glucose Measurement' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '006' as header_id, 'Blood Glucose Level' as examination, 'mg/dL' as unit union
                            select '001' as id, 'D' as jenis, '007' as header_id, 'Hemoglobin' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '007' as header_id, 'Cholesterol Ratio' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '007' as header_id, 'Total Cholesterol' as examination, '' as unit union
                            select '004' as id, 'D' as jenis, '007' as header_id, 'High Density Lipoprotein' as examination, '' as unit union
                            select '005' as id, 'D' as jenis, '007' as header_id, 'Lipo Density Lipoprotein' as examination, '' as unit union
                            select '006' as id, 'D' as jenis, '007' as header_id, 'Tryglyceride' as examination, '' as unit union

                            select '001' as id, 'D' as jenis, '008' as header_id, 'Cholesterol value' as examination, 'mg/dL' as unit union

                            select '001' as id, 'D' as jenis, '009' as header_id, 'Uric acid value' as examination, 'mg/dL' as unit union
                            
                            select '001' as id, 'D' as jenis, '010' as header_id, 'Billirubin' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '010' as header_id, 'Billirubin ratio' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '010' as header_id, 'Calsium' as examination, '' as unit union
                            select '004' as id, 'D' as jenis, '010' as header_id, 'Creatinin' as examination, '' as unit union
                            select '005' as id, 'D' as jenis, '010' as header_id, 'Glucose' as examination, '' as unit union
                            select '006' as id, 'D' as jenis, '010' as header_id, 'Keton' as examination, '' as unit union
                            select '007' as id, 'D' as jenis, '010' as header_id, 'Leucocyte' as examination, '' as unit union
                            select '008' as id, 'D' as jenis, '010' as header_id, 'Magnesium' as examination, '' as unit union
                            select '009' as id, 'D' as jenis, '010' as header_id, 'Nitrogen' as examination, '' as unit union
                            select '010' as id, 'D' as jenis, '010' as header_id, 'Acidity measurement' as examination, '' as unit union
                            select '011' as id, 'D' as jenis, '010' as header_id, 'Protein' as examination, '' as unit union
                            select '012' as id, 'D' as jenis, '010' as header_id, 'Urinary specific gravity' as examination, '' as unit union
                            select '013' as id, 'D' as jenis, '010' as header_id, 'Urobilinogen' as examination, '' as unit union
                            select '014' as id, 'D' as jenis, '010' as header_id, 'Vitamin C' as examination, '' as unit union

                            select '001' as id, 'D' as jenis, '011' as header_id, 'Peak expiratory flow' as examination, 'L/min' as unit union
                            select '002' as id, 'D' as jenis, '011' as header_id, 'Forced expiratory volume in the first second' as examination, 'L' as unit union
                            select '003' as id, 'D' as jenis, '011' as header_id, 'forced vital capacity' as examination, 'L' as unit union
                            select '004' as id, 'D' as jenis, '011' as header_id, 'Forced expiratory volume in the first second / forced vital capacity' as examination, '%' as unit union

                            select '001' as id, 'D' as jenis, '012' as header_id, 'ECG result' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '012' as header_id, 'ECG waveform picture data' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '012' as header_id, 'ECG waveform picture data length' as examination, 'ms' as unit union
                            select '001' as id, 'D' as jenis, '013' as header_id, 'Ecg report picture data' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '013' as header_id, 'diagnosis result' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '013' as header_id, 'heart rate' as examination, 'bpm' as unit union
                            select '004' as id, 'D' as jenis, '013' as header_id, 'P axis' as examination, 'degrees' as unit union
                            select '005' as id, 'D' as jenis, '013' as header_id, 'QRS axis' as examination, 'degrees' as unit union
                            select '006' as id, 'D' as jenis, '013' as header_id, 'T axis' as examination, 'degrees' as unit union
                            select '007' as id, 'D' as jenis, '013' as header_id, 'PR interval' as examination, 'ms' as unit union
                            select '008' as id, 'D' as jenis, '013' as header_id, 'QRS time limit' as examination, 'ms' as unit union
                            select '009' as id, 'D' as jenis, '013' as header_id, 'QT interval' as examination, 'ms' as unit union
                            select '010' as id, 'D' as jenis, '013' as header_id, 'QTc interval' as examination, 'ms' as unit union
                            select '011' as id, 'D' as jenis, '013' as header_id, 'RV5 value' as examination, 'mV' as unit union
                            select '012' as id, 'D' as jenis, '013' as header_id, 'SV1 value' as examination, 'mV' as unit union
                            select '013' as id, 'D' as jenis, '013' as header_id, 'sampling frequency' as examination, 'Hz' as unit union
                            select '014' as id, 'D' as jenis, '013' as header_id, 'Sampling duration' as examination, 's' as unit union
                            select '001' as id, 'D' as jenis, '014' as header_id, 'waistline' as examination, 'cm' as unit union
                            select '002' as id, 'D' as jenis, '014' as header_id, 'hipline' as examination, 'cm' as unit union
                            select '003' as id, 'D' as jenis, '014' as header_id, 'waist hip rate' as examination, '' as unit union
                            select '001' as id, 'D' as jenis, '015' as header_id, 'left eye' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '015' as header_id, 'Visual acuity of the left eye' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '015' as header_id, 'Left eye visual cues' as examination, '' as unit union
                            select '004' as id, 'D' as jenis, '015' as header_id, 'right eye' as examination, '' as unit union
                            select '005' as id, 'D' as jenis, '015' as header_id, 'Visual acuity of the right eye' as examination, '' as unit union
                            select '006' as id, 'D' as jenis, '015' as header_id, 'Visual cues in right eye' as examination, '' as unit union
                            select '001' as id, 'D' as jenis, '016' as header_id, 'Color blindness result' as examination, '' as unit union
                            select '001' as id, 'D' as jenis, '017' as header_id, 'UCLA Loneliness scale score' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '017' as header_id, 'Geriatric depression Scale score' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '017' as header_id, 'Self-rated depression scale score' as examination, '' as unit union
                            select '004' as id, 'D' as jenis, '017' as header_id, 'Hamilton Anxiety Scale score' as examination, '' as unit union
                            select '005' as id, 'D' as jenis, '017' as header_id, 'Emotional health test scores' as examination, '' as unit union
                            select '006' as id, 'D' as jenis, '017' as header_id, 'Self-measured health rating scale score' as examination, '' as unit union
                            select '007' as id, 'D' as jenis, '017' as header_id, 'Life satisfaction Scale score' as examination, '' as unit union
                            select '008' as id, 'D' as jenis, '017' as header_id, 'Personality disorder personality test score' as examination, '' as unit union
                            select '009' as id, 'D' as jenis, '017' as header_id, 'PSTR Adult stress test scores' as examination, '' as unit union
                            select '010' as id, 'D' as jenis, '017' as header_id, 'Harvard sexuality test score' as examination, '' as unit union
                            select '011' as id, 'D' as jenis, '017' as header_id, 'Emotional intelligence (EQ) test score' as examination, '' as unit union
                            select '012' as id, 'D' as jenis, '017' as header_id, 'Sleep status assessment score' as examination, '' as unit union
                            select '001' as id, 'D' as jenis, '018' as header_id, 'TCM constitution type' as examination, '' as unit union
                            select '002' as id, 'D' as jenis, '018' as header_id, 'Yang deficiency quality score' as examination, '' as unit union
                            select '003' as id, 'D' as jenis, '018' as header_id, 'Yin deficiency quality score' as examination, '' as unit union
                            select '004' as id, 'D' as jenis, '018' as header_id, 'Qi deficiency quality score' as examination, '' as unit union
                            select '005' as id, 'D' as jenis, '018' as header_id, 'Phlegm-dampness score' as examination, '' as unit union
                            select '006' as id, 'D' as jenis, '018' as header_id, 'Humidity and heat quality score' as examination, '' as unit union
                            select '007' as id, 'D' as jenis, '018' as header_id, 'Blood stasis score' as examination, '' as unit union
                            select '008' as id, 'D' as jenis, '018' as header_id, 'Special quality score' as examination, '' as unit union
                            select '009' as id, 'D' as jenis, '018' as header_id, 'Qi stagnation quality score' as examination, '' as unit union
                            select '010' as id, 'D' as jenis, '018' as header_id, 'Peace and quality score' as examination, '' as unit

                        )x

                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function listexamination($orgid){
            $query =
                    "
                        select a.transaksi_id, name, photo, encounter_id, id_number, upper(LEFT(a.name, 1)) initial, sex, nation, bod, address, exam_id, date_format(created_date,'%d.%m.%Y')createddate,
                               ecg12_data_value
                        from dt01_receivedata_data_leka a
                        where a.org_id='".$orgid."'
                        and   a.active='1'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function resultexaminationsatusehat($orgid,$transsaksiid){
            $query =
                    "
                        select a.*,  DATE_FORMAT(DATE_SUB(created_date, INTERVAL 7 HOUR), '%Y-%m-%dT%H:%i:%s') assessmentdate
                        from dt01_receivedata_data_leka a
                        where a.active='1'
                        and   a.org_id='".$orgid."'
                        and   a.transaksi_id='".$transsaksiid."'
                    ";

            $recordset = $this->db->query($query);
            $recordset = $recordset->result();
            return $recordset;
        }

        function updateencounter($data, $transid){           
            $sql =   $this->db->update("dt01_receivedata_data_leka",$data,array("transaksi_id"=>$transid));
            return $sql;
        }

        function insertlogsatusehat($data){           
            $sql =   $this->db->insert("dt01_satusehat_bundle",$data);
            return $sql;
        }

    }
?>
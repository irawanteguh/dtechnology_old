<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    date_default_timezone_set('Asia/Jakarta');
    use Restserver\Libraries\REST_Controller;
    require APPPATH . '/libraries/REST_Controller.php';
    include FCPATH."assets/vendors/phpqrcode/qrlib.php";

    class Khanza extends REST_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->model("Modelkhanza","md");
        }

        public function pegawai_GET(){
            $result = $this->md->datapegawai();
            if(!empty($result)){
                foreach($result as $a){
                    $resultcheckdata = $this->md->checkdata($a->nik);

                    $data['ORG_ID']      = ORG_ID;
                    $data['NIK']         = $a->nik;
                    $data['USERNAME']    = $a->nik;
                    $data['NAME']        = $a->nama;
                    $data['IDENTITY_NO'] = $a->no_ktp;
                    $data['SEX_ID']      = $a->sexid;
                    $data['ADDRESS']     = $a->alamat;
                    $data['SUSPENDED']   = $a->susspended;
                    $data['CREATED_BY']  = "ab24ee31-f74c-4f86-a07b-27196b57e7a6";

                    if(empty($resultcheckdata)){
                        $data['USER_ID']     = generateuuid();
                        $this->md->insertdatauser($data);
                    }
                }
            }
        }

    }

?>
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Position extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
			$this->load->model("Modelposition","md");
        }

		public function index(){
            $data = $this->loadcombobox();
			$this->template->load("template/template-sidebar","v_position",$data);
		}

        public function loadcombobox(){
            $resultdaftarkaryawan= $this->md->daftarkaryawan(ORG_ID);
            $daftarkaryawan="";
            foreach($resultdaftarkaryawan as $a ){
                $daftarkaryawan.="<option value='".$a->user_id."'>".$a->name."</option>";
            }

            $resulttype= $this->md->type();
            $type="";
            foreach($resulttype as $a ){
                $type.="<option value='".$a->id."'>".$a->type."</option>";
            }

            $data['daftarkaryawan'] = $daftarkaryawan;
            $data['namaatasan']     = $daftarkaryawan;
            $data['type']           = $type;
            return $data;
		}

		public function daftarjabatan(){
			$search = $this->input->post("search");
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

        public function insertpenempatan(){
            $cekdataposisi  = $this->md->cekdataposisi(ORG_ID,$this->input->post("data_position_userid_registration"),$this->input->post("data_position_id_registration"));
           

            if(empty($cekdataposisi)){
                if($this->input->post("data_position_type_registration") === "Y"){
                    $cekdataprimary = $this->md->cekdataprimary(ORG_ID,$this->input->post("data_position_userid_registration"));

                    if(empty($cekdataprimary)){
                        $data['org_id']           = $_SESSION['orgid'];
                        $data['trans_id']         = generateuuid();
                        $data['user_id']          = $this->input->post("data_position_userid_registration");
                        $data['position_id']      = $this->input->post("data_position_id_registration");
                        $data['atasan_id']        = $this->input->post("data_position_atasan_registration");
                        $data['start_date']       = DateTime::createFromFormat("d.m.Y", $this->input->post("data_position_tanggal_registration"))->format("Y-m-d");
                        $data['position_primary'] = $this->input->post("data_position_type_registration");
                        $data['created_by']       = $_SESSION['userid'];
                        
                        if($this->md->insertpenempatan($data)){
                            $json['responCode']="00";
                            $json['responHead']="success";
                            $json['responDesc']="Tambah Todo List Berhasil";
                        }else{
                            $json['responCode']="01";
                            $json['responHead']="info";
                            $json['responDesc']="Tambah Todo List Gagal";
                        }
                    }else{
                        $json['responCode']="01";
                        $json['responHead']="info";
                        $json['responDesc']="Karyawan Sudah Mempunyai Penempatan Primary <br>".$cekdataprimary->position;
                        $json['responResult']=$cekdataprimary;
                    }
                }else{
                    $data['org_id']           = $_SESSION['orgid'];
                    $data['trans_id']         = generateuuid();
                    $data['user_id']          = $this->input->post("data_position_userid_registration");
                    $data['position_id']      = $this->input->post("data_position_id_registration");
                    $data['atasan_id']        = $this->input->post("data_position_atasan_registration");
                    $data['start_date']       = DateTime::createFromFormat("d.m.Y", $this->input->post("data_position_tanggal_registration"))->format("Y-m-d");
                    $data['position_primary'] = $this->input->post("data_position_type_registration");
                    $data['created_by']       = $_SESSION['userid'];
                    
                    if($this->md->insertpenempatan($data)){
                        $json['responCode']="00";
                        $json['responHead']="success";
                        $json['responDesc']="Tambah Todo List Berhasil";
                    }else{
                        $json['responCode']="01";
                        $json['responHead']="info";
                        $json['responDesc']="Tambah Todo List Gagal";
                    }
                }
                
            }else{
                $json['responCode']   = "01";
                $json['responHead']   = "info";
                $json['responDesc']   = "Karyawan Sudah Di Tempatkan <br>".$cekdataposisi->position;
            }
            
            

            echo json_encode($json);
        }

	}
?>
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Employee extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
			$this->load->model("Modelemployee","md");
        }

		public function index(){
            $data = $this->loadcombobox();
			$this->template->load("template/template-sidebar","v_employee",$data);
		}

        public function loadcombobox(){
            $resultdaftarjabatan = $this->md->daftarjabatan(ORG_ID);
            $resulttype          = $this->md->type();

            $position="";
            foreach($resultdaftarjabatan as $a ){
                $position.="<option value='".$a->position_id."'>".$a->position." ".$a->fungsional."</option>";
            }

            $type="";
            foreach($resulttype as $a ){
                $type.="<option value='".$a->id."'>".$a->type."</option>";
            }

            $data['position']   = $position;
            $data['type']       = $type;
            return $data;
		}

        public function namaatasan(){
            $userid               = $this->input->post('userid');
            $parameter            = "and a.user_id <> '".$userid."'";
            $resultdaftarkaryawan = $this->md->daftarkaryawan(ORG_ID,$parameter);
            
            $namaatasan   = "";
            foreach($resultdaftarkaryawan as $a ){
                $namaatasan.="<option value='".$a->user_id."'>".$a->name."</option>";
            }

            echo $namaatasan;
        }

        public function masteremployee(){
            $result = $this->md->masteremployee(ORG_ID);
            
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
            $cekdataposisi  = $this->md->cekdataposisi(ORG_ID,$this->input->post("data_position_userid_registration"),$this->input->post("data_position_posisitionid_registration"));

            if(empty($cekdataposisi)){
                if($this->input->post("data_position_type_registration") === "Y"){
                    $cekdataprimary = $this->md->cekdataprimary(ORG_ID,$this->input->post("data_position_userid_registration"));

                    if(empty($cekdataprimary)){
                        $data['org_id']           = $_SESSION['orgid'];
                        $data['trans_id']         = generateuuid();
                        $data['user_id']          = $this->input->post("data_position_userid_registration");
                        $data['position_id']      = $this->input->post("data_position_posisitionid_registration");
                        $data['atasan_id']        = $this->input->post("data_position_atasanid_registration");
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
                    $data['position_id']      = $this->input->post("data_position_posisitionid_registration");
                    $data['atasan_id']        = $this->input->post("data_position_atasanid_registration");
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
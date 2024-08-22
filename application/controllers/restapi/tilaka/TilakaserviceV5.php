<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    date_default_timezone_set('Asia/Jakarta');
    use Restserver\Libraries\REST_Controller;
    require APPPATH . '/libraries/REST_Controller.php';
    include FCPATH."assets/vendors/phpqrcode/qrlib.php";
    include FCPATH."assets/vendors/pdfparse/Pdfparse.php";

    class TilakaserviceV5 extends REST_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model("Modeltilakaservice","md");
        }

        public function auth_GET(){
            $response = Tilaka::oauth();
            $this->response($response,REST_Controller::HTTP_OK);
        }

        public function uploadallfile_POST(){
            $summaryresponse = [];
            $responseservice = [];

            $status ="and a.status_sign ='0'";
            $result = $this->md->dataupload(ORG_ID,$status);
            
            if(!empty($result)){
                foreach($result as $a){
                    $response    = [];
                    $responseall = [];
                    $data        = [];
                    $location    = "";

                    $responseall['NoFile']                   = $a->NO_FILE;
                    $responseall['Type']                     = $a->jenisdocumen;
                    $responseall['Directory']                = $location;
                    $responseall['Source']                   = $a->SOURCE_FILE;
                    $responseall['Assign']['UserIdentifier'] = $a->useridentifier;
                    $responseall['Assign']['Name']           = $a->assignname;

                    if($a->SOURCE_FILE==="DTECHNOLOGY"){
                        $location = FCPATH."/assets/document/".$a->NO_FILE.".pdf";
                    }else{
                        $location = PATHFILE_GET_TILAKA."/".$a->NO_FILE.".pdf";
                    }

                    if(file_exists($location)){
                        $fileSize = 0;
                        $fileSize = filesize($location);

                        if($fileSize!=0){
                            $response = Tilaka::uploadfile($location);
                            if($response['success']){
                                $data['NOTE']            = "";
                                $data['FILENAME']        = $response['filename'];
                                $data['USER_IDENTIFIER'] = $a->useridentifier;
                                $data['STATUS_SIGN']     = "1"; //File Berhasil Upload Ke Tilaka Lite
                            }
                            $responseall['ResponseTilaka'] = $response;
                        }else{
                            $data['NOTE'] = "File Corrupted, File Size : ".$fileSize;
                            $responseall['ResponseDTechnology'] = "File Corrupted, File Size : ".$fileSize;
                        }
                    }else{
                        $data['NOTE'] = "File Tidak Di Temukan";
                        $responseall['ResponseDTechnology'] = "File Tidak Di Temukan";
                    }

                    $this->md->updatefile($data,$a->NO_FILE);
                }

                $responseservice[]=$responseall;
            }else{
                $responseservice['ResponseDTechnology'] = "Tidak Ada List File Untuk Di Upload Ke Tilaka Lite";
            }

            $summaryresponse[]=$responseservice;
            $this->response($summaryresponse,REST_Controller::HTTP_OK);
        }

        public function requestsign_POST(){
            $summaryresponse = [];
            $responseservice = [];

            $status ="and a.status_sign ='1'";
            $result = $this->md->userrequestsign(ORG_ID,$status);

            if(!empty($result)){
                foreach($result as $a){
                    $requestid      = "";
                    $signatureimage = "";
                    $response       = [];
                    $responseall    = [];
                    $data           = [];
                    $body           = [];
                    $signatures     = [];
                    $nofile         = [];

                    $requestid   = generateuuid();

                    $speciment      = FCPATH."assets/speciment/signmutiasari.png";
                    $qrcode         = file_get_contents($speciment);
                    $signatureimage = "data:image/png;base64,".base64_encode($qrcode);

                    $signatures['user_identifier'] = $a->user_identifier;
                    $signatures['signature_image'] = $signatureimage;

                    $body['request_id']   = $requestid;
                    $body['signatures'][] = $signatures;

                    $listfile = $this->md->filerequestsign(ORG_ID,$status,$a->assign);
                    foreach($listfile as $files){
                        $listpdf           = [];
                        $listpdfsignatures = [];

                        $nofile[]          = $files->no_file;

                        $filename          = FCPATH."assets/document/".$files->no_file.".pdf";
                        $pdfParse          = new Pdfparse($filename);
                        $specimentposition = $pdfParse->findText('$');

                        if(isset($specimentposition['content']['$'][0]['x']) && isset($specimentposition['content']['$'][0]['y']) && isset($specimentposition['content']['$'][0]['page'])){
                            $coordinatex = floatval($specimentposition['content']['$'][0]['x']);
                            $coordinatey = floatval($specimentposition['content']['$'][0]['y']);
                            $page        = floatval($specimentposition['content']['$'][0]['page']);
                        }else{
                            $coordinatex = floatval(COORDINATE_X);
                            $coordinatey = floatval(COORDINATE_Y);
                            $page        = floatval(PAGE);
                        }

                        $listpdfsignatures['user_identifier'] = $a->user_identifier;
                        $listpdfsignatures['reason']          = "Assign By ".$a->assignname;
                        $listpdfsignatures['width']           = floatval(WIDTH);
                        $listpdfsignatures['height']          = floatval(HEIGHT);
                        $listpdfsignatures['coordinate_x']    = $coordinatex;
                        $listpdfsignatures['coordinate_y']    = $coordinatey;
                        $listpdfsignatures['page_number']     = $page;
                        $listpdfsignatures['qrcombine']       = "QRONLY";

                        $listpdf['filename']     = $files->filename;
                        $listpdf['signatures'][] = $listpdfsignatures;

                        $body['list_pdf'][]=$listpdf;
                    }

                    $response = Tilaka::requestsign(json_encode($body));

                    if($response['success']){
                        foreach($response['auth_urls'] as $authurls){
                            $data['REQUEST_ID']  = $requestid;
                            $data['STATUS_SIGN'] = "2";
                            $data['URL']         = $authurls['url'];   
                        }
                    }else{
                        foreach($listfile as $a){
                            $data['REQUEST_ID']  = $requestid;
                            $data['NOTE']        = $response['message'];
                        }
                    }

                    foreach($nofile as $a){
                        $this->md->updatefile($data,$a);
                    }                    

                    $responseall['ResponseTilaka']           = $response;
                    $responseservice[]=$responseall;
                }
            }else{
                $responseservice['ResponseDTechnology'] = "Tidak Ada List Untuk Di Lakukan Request Sign";
            }

            $summaryresponse[]=$responseservice;
            $this->response($summaryresponse,REST_Controller::HTTP_OK);
        }

        public function excutesign_POST(){
            $summaryresponse = [];
            $responseservice = [];

            $status ="and a.status_sign ='3'";
            $result = $this->md->dataexecute(ORG_ID,$status);

            if(!empty($result)){
                foreach($result as $a){
                    $response    = [];
                    $responseall = [];
                    $data        = [];
                    $body        = [];
                   
                    $body['request_id']      = $a->request_id;
                    $body['user_identifier'] = $a->user_identifier;

                    $response = Tilaka::excutesign(json_encode($body));

                    if($response['status']==="DONE"){
                        $data['STATUS_SIGN']="4";
                        $this->md->updatefile($data,$a->no_file);
                    }

                    if($response['status']==="FAILED"){
                        $data['STATUS_SIGN']     = "0";
                        $data['STATUS_FILE']     = "1";
                        $data['REQUEST_ID']      = "";
                        $data['LINK']            = "";
                        $data['NOTE']            = "";
                        $data['USER_IDENTIFIER'] = "";
                        $data['URL']             = "";
                        $this->md->updatefile($data,$a->no_file);
                    }

                    

                    $responseall['Assign']['UserIdentifier'] = $a->user_identifier;
                    $responseall['Assign']['Name']           = $a->assignname;
                    $responseall['File']['Filename']         = $a->no_file;
                    $responseall['File']['RequestId']        = $a->request_id;
                    $responseall['Response']                 = $response;
                    $responseservice[]=$responseall;
                }
            }else{
                $responseservice['ResponseDTechnology'] = "Tidak Ada List Untuk Di Execute";
            }

            $summaryresponse[]=$responseservice;
            $this->response($summaryresponse,REST_Controller::HTTP_OK);
        }

        public function statussign_POST(){
            $summaryresponse = [];
            $responseservice = [];

            $status ="and a.status_sign ='4'";
            $result = $this->md->dataexecute(ORG_ID,$status);

            if(!empty($result)){
                foreach($result as $a){
                    $responseall = [];
                    $response    = [];
                    $body        = [];

                    $body['request_id'] = $a->request_id;
                    $response = Tilaka::excutesignstatus(json_encode($body));

                    if($response['success']){
                        foreach($response['list_pdf'] as $listpdfs){
                            if($listpdfs['error']===false){
                                $data = [];
                                $filename    = $listpdfs['filename'];
                                $fileContent = file_get_contents(htmlspecialchars_decode($listpdfs['presigned_url']));

                                if($fileContent !== false){
                                    $resultchecknofile = $this->md->checknofile($filename);
                                    
                                    if(!empty($resultchecknofile)){
                                        $resultchecknofile = $resultchecknofile[0]->NO_FILE;

                                        if($a->source_file==="DTECHNOLOGY"){
                                            $destinationPath = FCPATH."/assets/document/".$resultchecknofile.".pdf";
                                        }else{
                                            $destinationPath = PATHFILE_POST_TILAKA.DIRECTORY_SEPARATOR.$resultchecknofile.".pdf";
                                        }
    
                                        if(file_put_contents($destinationPath,$fileContent)){
                                            $data['STATUS_SIGN'] = "5";
                                            $data['LINK']        = $listpdfs['presigned_url'];
                                            
                                            $this->md->updatefile($data,$resultchecknofile);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    $responseall['Assign']['UserIdentifier'] = $a->user_identifier;
                    $responseall['Assign']['Name']           = $a->assignname;
                    $responseall['ResponseTilaka']           = $response;
                    $responseservice[]                       = $responseall;
                }
            }else{
                $responseservice['ResponseDTechnology'] = "Tidak File Yang Sudah Selesai";
            }

            $summaryresponse[]=$responseservice;
            $this->response($summaryresponse,REST_Controller::HTTP_OK);
        }
    }

?>
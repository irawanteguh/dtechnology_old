<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    date_default_timezone_set('Asia/Jakarta');
    use Restserver\Libraries\REST_Controller;
    require APPPATH . '/libraries/REST_Controller.php';
    include FCPATH."assets/vendors/phpqrcode/qrlib.php";

    class Tilakaservice extends REST_Controller{
        
        public function __construct(){
            parent::__construct();
            $this->load->model("Modeltilakaservice","md");
        }

        public function auth_GET(){
            $response = Tilaka::oauth();
            $this->response($response,REST_Controller::HTTP_OK);
        }

        public function uploadallfile_POST(){
            $result = $this->md->dataupload(ORG_ID,"0");
            if(!empty($result)){
                foreach($result as $a){
                    $location = PATHFILE_GET_TILAKA."/".$a->NO_FILE.".pdf";
                    if(file_exists($location)){
                        $response = Tilaka::uploadfile($location);
                        if($response['success']){
                            $data['FILENAME']    = $response['filename'];
                            $data['STATUS_SIGN'] = "1";
                            $this->md->updatefile($data,$a->NO_FILE);
                        }
                        $this->response($response,REST_Controller::HTTP_OK);
                    }
                }
            }
        }

        public function requestsign_POST(){
            $summaryresponsepost = [];
            $result = $this->md->userrequestsign(ORG_ID,"1");

            if(!empty($result)){
                foreach($result as $a){
                    $requestid       = "";
                    $body            = [];
                    $signatures      = [];
                    $response        = [];
                    $summaryresponse = [];

                    // $filename             = "Assign by : ".$a->assignname;
                    // $errorCorrectionLevel = "H";
                    // $matrixPointSize      = 10;
                    // $tempdir              = FCPATH."assets/fileapps/qrcode/";
                    // $filename             = $tempdir.base64_encode($filename).'.png';
                    // $pngAbsoluteFilePath  = $filename;

                    // if(!file_exists($pngAbsoluteFilePath)){
                    //     QRcode:: png("https://xxxxx/dtechnology/index.php/verification?token=".base64_encode($nik."|".$phass)."|".$timestamp,$filename,$errorCorrectionLevel,$matrixPointSize,2);
                    //     QRcode:: png("Assign by : ".$a->assignname,$filename,$errorCorrectionLevel,$matrixPointSize,2);
                    // };

                    $filename = FCPATH."assets/speciment/signmutiasari.png";

                    $qrcode        = file_get_contents($filename);
                    $qrcode_encode = base64_encode($qrcode);

                    $signatures['sequence']        = 1;
                    $signatures['signature_image'] = "data:image/png;base64,".$qrcode_encode;
                    $signatures['user_identifier'] = $a->useridentifier;

                    $requestid = generateuuid();
                    $body['request_id']   = $requestid;
                    $body['signatures'][] = $signatures;

                    $listfile = $this->md->filerequestsign(ORG_ID,"1",$a->assign);
                    foreach($listfile as $a){
                        $listpdf           = [];
                        $listpdfsignatures = [];

                        $listpdfsignatures['coordinate_x']    = floatval(COORDINATE_X);
                        $listpdfsignatures['coordinate_y']    = floatval(COORDINATE_Y);
                        $listpdfsignatures['height']          = floatval(HEIGHT);
                        $listpdfsignatures['width']           = floatval(WIDTH);
                        $listpdfsignatures['page_number']     = floatval(PAGE);
                        $listpdfsignatures['user_identifier'] = $a->useridentifier;

                        $listpdf['filename']     = $a->FILENAME;
                        $listpdf['signatures'][] = $listpdfsignatures;

                        $body['list_pdf'][]=$listpdf;
                    }

                    $response = Tilaka::requestsign(json_encode($body));
                    
                    if($response['success']){
                        foreach($listfile as $a){
                            $data['REQUEST_ID']  = $requestid;
                            $data['STATUS_SIGN'] = "2";
                            $this->md->updatefile($data,$a->NO_FILE);
                        }
                        foreach($response['auth_urls'] as $rest){
                            $dataurl['ORG_ID']          = ORG_ID;
                            $dataurl['URL_ID']          = generateuuid();
                            $dataurl['REQUEST_ID']      = $requestid;
                            $dataurl['USER_IDENTIFIER'] = $rest['user_identifier'];
                            $dataurl['URL']             = $rest['url'];
                            $this->md->insertauthurl($dataurl);
                        }
                    }else{
                        foreach($listfile as $a){
                            $data['REQUEST_ID']  = $requestid;
                            $data['STATUS_SIGN'] = "3";
                            $data['NOTE']        = $response['message'];
                            $this->md->updatefile($data,$a->NO_FILE);
                        }
                    }

                    $summaryresponse['useridentifier'] = $a->useridentifier;
                    $summaryresponse['message']        = $response['message'];
                    $summaryresponse['success']        = $response['success'];
                    foreach($listfile as $a){
                        $summaryresponse['filename'][] = $a->NO_FILE.".pdf";
                    }

                    $summaryresponsepost[]=$summaryresponse;
                }

                $this->response($summaryresponsepost,REST_Controller::HTTP_OK);
            }
        }

        public function excutesign_POST(){
            $result = $this->md->dataexecutesign(ORG_ID,"1");
            if(!empty($result)){
                foreach($result as $a){
                    $body['request_id']      = $a->REQUEST_ID;
                    $body['user_identifier'] = $a->USER_IDENTIFIER;
                    $body['hmac_nonce']      = "";
                    $response = Tilaka::excutesign(json_encode($body));

                    if($response['status']==="DONE"){
                        $dataupdate['STATUS']="2";
                        $this->md->updateauthurl($dataupdate,$a->URL_ID);
                    }

                    if($response['status']==="FAILED"){
                        $dataupdate['ACTIVE']="0";
                        $this->md->updateauthurl($dataupdate,$a->URL_ID);

                        $dataupdatefile['FILENAME']    = "";
                        $dataupdatefile['STATUS_SIGN'] = "0";
                        $dataupdatefile['LINK']        = "";
                        $dataupdatefile['REQUEST_ID']  = "";
                        $dataupdatefile['NOTE']        = "TTE FAILED, REPROSESS";
                        $this->md->updaterequestid($dataupdatefile,$a->REQUEST_ID);
                    }
                }
            }
        }

        public function statussign_POST(){
            $result = $this->md->dataexecutesign(ORG_ID,"2");
            if(!empty($result)){
                foreach($result as $a){
                    $body['request_id'] = $a->REQUEST_ID;
                    $response = Tilaka::excutesignstatus(json_encode($body));
    
                    if($response['success']){
                        $dataupdate['STATUS']="3";
                        $this->md->updateauthurl($dataupdate,$a->URL_ID);
    
                        foreach($response['list_pdf'] as $a){
                            $filename           = $a['filename'];

                            $updatefile['STATUS_SIGN'] = "4";
                            $updatefile['LINK']        = $a['presigned_url'];
                            $this->md->updatelinkdownload($updatefile,$filename);

                            $fileContent = file_get_contents(htmlspecialchars_decode($a['presigned_url']));
                            if ($fileContent !== false) {
                                $resultchecknofile = $this->md->checknofile($filename);
                                $destinationPath   = PATHFILE_POST_TILAKA.DIRECTORY_SEPARATOR.$resultchecknofile[0]->NO_FILE.".pdf";
                                file_put_contents($destinationPath, $fileContent);
                            }
                        }
                    }
                }

                $this->response($response,REST_Controller::HTTP_OK);
            }
        }

        public function checkdataapprovalkyc_POST(){
            $resultcheckdataapprovalkyc = $this->md->checkdataapprovalkyc(ORG_ID);

            if(!empty($resultcheckdataapprovalkyc)){
                foreach($resultcheckdataapprovalkyc as $a){
                    $body['user_identifier']=$a->USER_IDENTIFIER;
                    $response = Tilaka::checkcertificateuser(json_encode($body));
                    
                    if($response['success']){
                        $data['CERTIFICATE']=$response['status'];
                        if($response['status']==="2"){
                            $data['REVOKE_ID'] = "";
                            $data['ISSUE_ID']  = "";
                        }
                        
                        $this->md->updatedatauseridentifier($data,$a->USER_IDENTIFIER);
                    }
                }
            }

        }


    }

?>
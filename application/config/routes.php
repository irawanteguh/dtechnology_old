<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $route['default_controller'] = 'Landingpage/landingpage';
    $route['authtilaka']         = 'restapi/Tilakaservice/auth';
    $route['uploadallfile']      = 'restapi/Tilakaservice/uploadallfile';
    $route['requestsign']        = 'restapi/Tilakaservice/requestsign';
    $route['excutesign']         = 'restapi/Tilakaservice/excutesign';
    $route['statussign']         = 'restapi/Tilakaservice/statussign';
    $route['appkyc']             = 'restapi/Tilakaservice/checkdataapprovalkyc';
    $route['pegawai']            = 'restapi/Khanza/pegawai';
    $route['masterDomisili']     = 'restapi/satusehat/MasterDomisili/domisili';

    $route['authsatusehat']   = 'restapi/Leka/auth';
    $route['ReceiveData']     = 'restapi/aktivo/Leka/ReceiveData';
    $route['ReceiveDataFHIR'] = 'restapi/aktivo/Leka/ReceiveDataFHIR';

    $route['404_override']         = '';
    $route['translate_uri_dashes'] = FALSE;
?>
<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $route['default_controller'] = 'landingpage/landingpage';
    $route['authtilaka']         = 'restapi/Tilakaservice/auth';
    $route['uploadallfile']      = 'restapi/Tilakaservice/uploadallfile';
    $route['requestsign']        = 'restapi/Tilakaservice/requestsign';
    $route['excutesign']         = 'restapi/Tilakaservice/excutesign';
    $route['statussign']         = 'restapi/Tilakaservice/statussign';
    $route['appkyc']             = 'restapi/Tilakaservice/checkdataapprovalkyc';

    $route['pegawai']            = 'restapi/Khanza/pegawai';
    
    $route['masterDomisili']     = 'restapi/satusehat/MasterDomisili/domisili';

    $route['ReceiveData/(:any)']          = 'restapi/aktivo/Leka/ReceiveData/$1';
    $route['ListExamination/(:any)']      = 'restapi/aktivo/Leka/ListExamination/$1';
    $route['GetResultLeka/(:any)/(:any)'] = 'restapi/aktivo/Leka/GetResultLeka/$1/$2';

    $route['404_override']         = '';
    $route['translate_uri_dashes'] = FALSE;
?>
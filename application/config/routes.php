<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    $route['default_controller']   = 'Landingpage/landingpage';
    // $route['default_controller']   = 'welcome';
    $route['404_override']         = '';
    $route['translate_uri_dashes'] = FALSE;
    $route['uploadallfile']        = 'restapi/Tilakaservice/uploadallfile';
    $route['requestsign']          = 'restapi/Tilakaservice/requestsign';
    $route['excutesign']           = 'restapi/Tilakaservice/excutesign';
    $route['statussign']           = 'restapi/Tilakaservice/statussign';
    $route['appkyc']               = 'restapi/Tilakaservice/checkdataapprovalkyc';

    $route['pegawai']              = 'restapi/Khanza/pegawai';

    $route['masterDomisili'] = 'restapi/satusehat/MasterDomisili/domisili';
?>
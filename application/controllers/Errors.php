<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
    public function error_403() {
        $this->output->set_status_header('403');
        $this->load->view('errors/custom/error_403');
    }
}
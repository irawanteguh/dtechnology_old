<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Activity extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
        }

		public function index(){
			$this->template->load("template/template-profile","v_activity");
		}
        

	}
?>
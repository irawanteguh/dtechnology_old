<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Education extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
            // $this->load->model("Modeleducation","md");
        }

		public function index(){
			$this->template->load("template/template-profile","v_education");
		}
        

	}
?>
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
        }

		public function index(){
			$this->template->load("template/template-sidebar","v_user");
		}
	}
?>
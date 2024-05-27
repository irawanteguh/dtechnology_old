<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Activity extends CI_Controller {

		public function __construct(){
            parent:: __construct();
			rootsystem::system();
            $this->load->model("Modelactivity","md");
        }

		public function index(){
			$this->template->load("template/template-sidebar","v_activity");
		}
        

		public function calender(){
            $result        = $this->md->calender();  
            
            $events = array();

            foreach($result as $a ){

				$data['title']     = $a->kegiatanutama;
				$data['start']     = $a->start_date;

				if (!empty($a->end_date)) {
					$data['end'] = $a->end_date;
				} else {
					$data['end'] = $a->start_date;
				}

				if($a->status === "0"){
					$data['color']     = '#0d6efd';
				}

				if($a->status === "1"){
					$data['color']     = '#00a65a';
				}

				if($a->status === "2"){
					$data['color']     = '#ffc107';
				}


				if($a->status === "9"){
					$data['color']     = '#dc3545';
				}
				
					
				$events[] =$data;
            };

            echo json_encode($events);
        }

	}
?>
<?php
    if($this->uri->total_segments() === 0){
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/jquery/jquery-3.7.1.min.js')."'></script>".PHP_EOL; 
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/bootstrap-4.1.3/dist/js/bootstrap.bundle.min.js')."'></script>".PHP_EOL; 
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/aos/aos.js')."'></script>".PHP_EOL; 
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/glightbox/js/glightbox.min.js')."'></script>".PHP_EOL; 
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/isotope-layout/isotope.pkgd.min.js')."'></script>".PHP_EOL; 
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/swiper/swiper-bundle.min.js')."'></script>".PHP_EOL; 
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/waypoints/noframework.waypoints.js')."'></script>".PHP_EOL; 
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/waypoints/noframework.waypoints.js')."'></script>".PHP_EOL;
        echo "\t\t<script type='text/javascript' src='".base_url('assets/js/landingpage/landingpage.js')."'></script>".PHP_EOL;
    }else{
        $jspathroot = FCPATH.'assets/js/core/';
        if (is_dir($jspathroot)) {
            $jsFiles = glob($jspathroot . '*.js');
            echo PHP_EOL.'<!-- Load Js Core System -->'.PHP_EOL;
            foreach ($jsFiles as $jsFile) {
                $jsFilename = basename($jsFile);
                echo "\t\t<script type='text/javascript' src='".base_url('assets/js/core/'.$jsFilename)."'></script>".PHP_EOL; // Menyertakan file JavaScript
            }
        };

        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/bootstrap-session-timeout/bootstrap-session-timeout.js')."'></script>".PHP_EOL;
        echo "\t\t<script type='text/javascript' src='".base_url('assets/vendors/fullcalendar/fullcalendar.bundle.js')."'></script>".PHP_EOL;
        
        $jspathroot = FCPATH.'assets/js/root/';
        if (is_dir($jspathroot)) {
            $jsFiles = glob($jspathroot . '*.js');
            echo PHP_EOL.'<!-- Load Js Root System -->'.PHP_EOL;
            foreach ($jsFiles as $jsFile) {
                $jsFilename = basename($jsFile);
                echo "\t\t<script type='text/javascript' src='".base_url('assets/js/root/'.$jsFilename)."'></script>".PHP_EOL; // Menyertakan file JavaScript
            }
        };

        

        if(file_exists(FCPATH."assets/js/".$this->uri->segment(1)."/".$this->uri->segment(2).".js")){
            echo PHP_EOL.'<!-- Load JS Files Folder '.$this->uri->segment(1).'/'.$this->uri->segment(2).' -->'.PHP_EOL;
            echo "\t\t<script type='text/javascript' src='".base_url('assets/js/'.$this->uri->segment(1)."/".$this->uri->segment(2).".js")."'></script>".PHP_EOL;
        }
    }
?>
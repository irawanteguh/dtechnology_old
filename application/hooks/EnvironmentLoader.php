<?php

    class EnvironmentLoader {
        protected static $appInstance;
        public static $environmentSettings;

        public static function loadEnvironment() {
            self::$appInstance = get_instance();
            self::$appInstance->load->model("ModelRoot");

            $dtechClientId = "10c84edd-500b-49e3-93a5-a2c8cd2c8524";
            $server        = "DEV";

            self::$environmentSettings = self::$appInstance->ModelRoot->environment($dtechClientId);

            if (!empty(self::$environmentSettings)) {
                foreach (self::$environmentSettings as $setting) {
                    if (!defined($setting['ENVIRONMENT_NAME'])) {
                        if($server==="DEV"){
                            define($setting['ENVIRONMENT_NAME'], $setting['DEV']);
                        }else{
                            define($setting['ENVIRONMENT_NAME'], $setting['PROD']);
                        }
                    }
                }
            } else {
                log_message('error', 'No environment settings found for the specified parameters.');
            }
        }
    }

?>

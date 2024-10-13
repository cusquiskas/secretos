<?php
    class claseRuteo {
        private $error = false;
        private $host = null;
        private $ip = null;
        private $llave = null;
        
        public function __construct() {
            $this->host = $_SERVER["HTTP_HOST"];
            $this->ip   = $_SERVER["REMOTE_ADDR"];
            $this->llave = str_replace('\"', '"', $_SERVER["HTTP_SEC_CH_UA_PLATFORM"]);

            $url = explode('/', strtolower($_SERVER["REDIRECT_URL"]));
            
            if ($url[1] != "secretos") { $this->error = true; return; }
            
        }

        public function getError() { return $this->error; }
        public function getHost()  { return $this->host;  }
        public function getLlave() { return $this->llave; }
        public function getIp()    { return $this->ip;    }
        public function getAll()   { return $this;        }
    }

?>
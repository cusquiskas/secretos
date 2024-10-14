<?php
    class claseRuteo {
        private $error = false;
        private $ip = null;
        private $llave = null;
        
        public function __construct() {
            if ($_SERVER["REQUEST_SCHEME"] != "https") { $this->error = true; return; }
            
            $this->ip   = $_SERVER["REMOTE_ADDR"];
            
            $url = explode('/', strtolower($_SERVER["REDIRECT_URL"]));
            
            if ($url[1] != "secretos") { $this->error = true; return; }
            
            
            $this->recuperaLlave();

        }

        private function recuperaLlave() {
            // Verificar si la cabecera Authorization está presente
            if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
                $this->llave = $_SERVER['HTTP_AUTHORIZATION'];
            } elseif (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
                // Algunos servidores pueden usar esta variable en su lugar
                $this->llave = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
            } else {
                $this->llave = null;
            }
                
            if ($this->llave) {
                // Extraer el token del encabezado
                if (preg_match('/Bearer\s(\S+)/', $this->llave, $matches)) {
                    $this->llave = $matches[1];
                } else {
                    $this->error = true;
                }
            } else {
                $this->error = true;
            }
        }

        public function getError() { return $this->error; }
        public function getLlave() { return $this->llave; }
        public function getIp()    { return $this->ip;    }
        
    }

?>
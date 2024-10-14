<?php

class ConfiguracionSistema
{
    private $host = 'localhost';
    private $user = 'u164639268_confesor';
    private $pass = 'xE.aJejbW/5ky(Dk';
    private $apli = 'u164639268_secretos';

    private $home = '/opt/lampp/htdocs/secretos/';

    public function getHost()
    {
        return $this->host;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function getApli()
    {
        return $this->apli;
    }

    public function getHome()
    {
        return $this->home;
    }
}

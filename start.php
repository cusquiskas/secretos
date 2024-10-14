<?php
    require_once "router.php";
    require_once "conf.php";
    require_once "dao.php";
    require_once "controller.php";
    
    header('Content-Type: application/json');
/*
    $peticion = new claseRuteo();
    
    if ($peticion->getError()) {
        unset($peticion);
        http_response_code(501);
        die ('{"cod":501, "txt":"No way for you"}');
    }
    $llave = $peticion->getLlave();
    unset($peticion);

    $HOST = ControladorDinamicoTabla::set('HOST');
    $host = ["hos_llave"=>$llave];
    $HOST->give($host);
    $host = $HOST->getArray();
    unset($HOST);
    if (count($host) != 1) {
        http_response_code(501);
        die ('{"cod":501, "txt":"No way for you"}');
    }
    $host = $host[0];
    
    $SECRETO = ControladorDinamicoTabla::set('SECRETO');
    $secreto = ["sec_idGrupo" => $host["hos_idGrupo"]];
    $SECRETO->give($secreto);
    $secreto = $SECRETO->getArray();
    unset($SECRETO);
    

    echo json_encode($secreto);
 */
 
 $clave = json_decode(file_get_contents('/opt/lampp/claves.json'), true);
 $clave = $clave["comunidad"];
 
 $url = "https://cusquiskas.com/secretos";
 $options = array(
     'http' => array(
         'method'  => 'GET',
         'header'  => "Authorization: Bearer $clave\r\n" .
         "Content-Type: application/json\r\n"
     )
 );
 $context = stream_context_create($options);
 
 $config  = json_decode(file_get_contents($url, false, $context), true);

 echo var_export($config, true);

?>
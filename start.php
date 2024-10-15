<?php
    require_once "router.php";
    require_once "conf.php";
    require_once "dao.php";
    require_once "controller.php";
    
    header('Content-Type: application/json');
    http_response_code(200);

    $peticion = new claseRuteo();
    
    if ($peticion->getError()) {
        unset($peticion);
        http_response_code(404);
        die ('{"cod":404, "txt":"No way for you"}');
    }
    $llave = $peticion->getLlave();
    unset($peticion);

    $HOST = ControladorDinamicoTabla::set('HOST');
    $host = ["hos_llave"=>$llave];
    $HOST->give($host);
    $host = $HOST->getArray();
    unset($HOST);
    if (count($host) != 1) {
        http_response_code(404);
        die ('{"cod":404, "txt":"No way for you"}');
    }
    $host = $host[0];
    
    $SECRETO = ControladorDinamicoTabla::set('SECRETO');
    $secreto = ["sec_idGrupo" => $host["hos_idGrupo"]];
    $SECRETO->give($secreto);
    $secreto = $SECRETO->getArray();
    unset($SECRETO);
    
    if (count($secreto) == 0) {
        http_response_code(404);
        die ('{"cod":404, "txt":"No way for you"}');
    }
    $host = [];
    for ($i = 0; $i < count($secreto); $i++) {
        $host[$secreto[$i]["sec_clave"]] = $secreto[$i]["sec_valor"];
    }
    
    echo json_encode($host);
 
?>
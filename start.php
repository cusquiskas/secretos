<?php
    require_once "router.php";
    require_once "conf.php";
    require_once "dao.php";
    require_once "controller.php";
    
    header('Content-Type: application/json');

    #$con = new ConexionSistema();

    $peticion = new claseRuteo();
    if ($peticion->getError()) {
        unset($peticion);
        http_response_code(501);
        #die (json_encode($peticion));
        die ('{"cod":501, "txt":"No way for you"}');
    }
    
    echo json_encode(var_export($peticion, true));

    $datos = [
        "host" => 'localhost',
        "user" => 'confesor',
        "pass" => '************',
        "apli" => 'secretos'
    ];

    #echo json_encode ($datos);
    unset($peticion);
    #unset($con);
?>
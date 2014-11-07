<?php
    require_once './Clases.php';
    require_once './FuncionesComunes.php';
    require_once './Funciones.php';
    
    $stmtResult = queryStatement('SELECT * FROM tp1_usuario');
    var_dump($stmtResult);
    $usuario = parseUsuario($stmtResult);
    var_dump($usuario);
    var_dump(json_encode($usuario));
    
?>
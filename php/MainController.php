<?php
    require_once './Clases.php';
    require_once './Constantes.php';
    require_once './FuncionesComunes.php';
    require_once './Funciones.php';
    
    $stmtResult = queryStatement('SELECT * FROM tp1_usuario');
    var_dump($stmtResult);
    $usuario = parseUsuario($stmtResult);
    var_dump($usuario);
    var_dump(json_encode($usuario));
    
    switch ($_POST['action']) {
        case SQLStatement::$traerSemanasProducto:
            break;
        case SQLStatement::$traerProductosDeSemana:
            break;
        case SQLStatement::$traerUnProductoDeSemana:
            break;
        case SQLStatement::$traerComentarios:
            break;
        case SQLStatement::$traerNombreProducto:
            break;
        case SQLStatement::$traerProductos:
            break;
        case SQLStatement::$traerUsuario:
            break;
        case SQLStatement::$insertarComentario:
            break;
        case SQLStatement::$insertarPrecioProducto:
            break;
        case SQLStatement::$insertarProducto:
            break;
        case SQLStatement::$insertarUsuario:
            break;
        case SQLStatement::$actualizaPrecioProducto:
            break;
    }
    
?>
<?php
    require_once './Clases.php';
    require_once './Constantes.php';
    require_once './FuncionesComunes.php';
    require_once './Funciones.php';
    
    /*$stmtResult = queryStatement('SELECT * FROM tp1_usuario');
    var_dump($stmtResult);
    $usuario = parseUsuario($stmtResult);
    var_dump($usuario);
    var_dump(json_encode($usuario));*/
    
    $result = null;
    
    switch ($_GET['action']) {
        case AccionControlador::$traerSemanasProducto:
            $stmtResult = queryStatement(SQLStatement::$traerSemanasProducto);
            $result = parseSemanas($stmtResult);
            break;
        case AccionControlador::$traerProductosDeSemana:
            $paramArray[] = $_GET['semana'];
            $stmtResult = queryStatement(SQLStatement::$traerProductosDeSemana, $paramArray);
            $result = parseResultadoSemanaProducto($stmtResult);
            break;
        case AccionControlador::$traerUnProductoDeSemana:
            $stmtResult = queryStatement(SQLStatement::$traerUnProductoDeSemana);
            $result = parseProducto($stmtResult);
            break;
        case AccionControlador::$traerComentarios:
            $stmtResult = queryStatement(SQLStatement::$traerComentarios);
            $result = parseComentario($stmtResult);
            break;
        case AccionControlador::$traerNombreProducto:
            $stmtResult = queryStatement(SQLStatement::$traerNombreProducto);
            $result = parseProducto($stmtResult);
            break;
        case AccionControlador::$traerProductos:
            $stmtResult = queryStatement(SQLStatement::$traerProductos);
            $result = parseProducto($stmtResult);
            break;
        case AccionControlador::$traerUsuario:
            $stmtResult = queryStatement(SQLStatement::$traerUsuario);
            $result = parseUsuario($stmtResult);
            break;
        case AccionControlador::$insertarComentario:
            $stmtResult = queryStatement(SQLStatement::$insertarComentario);
            $result = parseResult($stmtResult);
            break;
        case AccionControlador::$insertarPrecioProducto:
            $stmtResult = queryStatement(SQLStatement::$insertarPrecioProducto);
            $result = parseResult($stmtResult);
            break;
        case AccionControlador::$insertarProducto:
            $stmtResult = queryStatement(SQLStatement::$insertarProducto);
            $result = parseResult($stmtResult);
            break;
        case AccionControlador::$insertarUsuario:
            $stmtResult = queryStatement(SQLStatement::$insertarUsuario);
            $result = parseResult($stmtResult);
            break;
        case AccionControlador::$actualizaPrecioProducto:
            $stmtResult = queryStatement(SQLStatement::$actualizaPrecioProducto);
            $result = parseResult($stmtResult);
            break;
    }
    
    echo json_encode($result);
    
?>
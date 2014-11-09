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
	!empty($_GET['action']) ? $action = $_GET['action'] : $action = $_POST['action'];

    
    switch ($action) {
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
        case AccionControlador::$traerUnProducto:
            $paramArray[] = $_GET['idProd'];
            
            $stmtResult = queryStatement(SQLStatement::$traerUnProducto, $paramArray);
            $result = parseProducto($stmtResult);
            break;
        case AccionControlador::$traerUsuario:
            $paramArray[] = $_GET['email'];
            $paramArray[] = $_GET['password_us'];
            
            $stmtResult = queryStatement(SQLStatement::$traerUsuario, $paramArray);
            $result = parseUsuario($stmtResult);
            break;
        case AccionControlador::$insertarComentario:
            $stmtResult = executeStatement(SQLStatement::$insertarComentario);
            $result = parseResponse($stmtResult);
            break;
        case AccionControlador::$insertarPrecioProducto:
            $date = new DateTime();
            $semana = $date->format("W");
            
            $paramArray[] = $_GET['producto'];
            $paramArray[] = 1;
            $paramArray[] = $semana;
            $existePrecio = queryStatement(SQLStatement::$traerPrecioProducto, $paramArray);
            $paramArray[] = $_GET['precio'];
            
            if (empty($existePrecio)) {
                $stmtResult = executeStatement(SQLStatement::$insertarPrecioProducto, $paramArray);
                $result = parseResponse($stmtResult);
            } else {
                array_pop($paramArray);
                array_unshift($paramArray, $_GET['precio']);
                $stmtResult = executeStatement(SQLStatement::$actualizaPrecioProducto, $paramArray);
                $result = parseResponse($stmtResult);
            }
            break;
        case AccionControlador::$insertarProducto:            
            $paramArray[] = $_GET['nombre_producto'];
            $stmtResult = queryStatement(SQLStatement::$buscarProducto,$paramArray);
            $paramArray[] = $_GET['descripcion'];
            
            if(empty($stmtResult)) {
                $stmtResult = executeStatement(SQLStatement::$insertarProducto,$paramArray);
                $result = parseResponse($stmtResult);
            } else {
                $result = array('errorMessage' => 'Imposible registrar nuevo producto. El producto ya existe.');
            }
            break;
        case AccionControlador::$insertarUsuario:
            $paramArray[] = $_GET['nombre_usuario'];
            $paramArray[] = $_GET['nombre'];
            $paramArray[] = $_GET['apellido'];
            $paramArray[] = $_GET['email'];
            $paramArray[] = $_GET['password_us'];
            $paramArray[] = 1;
            
            $stmtResult = executeStatement(SQLStatement::$insertarUsuario, $paramArray);
            $result = parseResponse($stmtResult);
            break;
        case AccionControlador::$actualizarProducto:            
            $paramArray[] = $_GET['idProd'];
            $stmtResult = queryStatement(SQLStatement::$traerUnProducto,$paramArray);
            
            if(!empty($stmtResult)) {
                $paramArray = null;
                $paramArray[] = $_GET['nombre_producto'];
                $paramArray[] = $_GET['descripcion'];
                $paramArray[] = $_GET['idProd'];
                $stmtResult = executeStatement(SQLStatement::$actualizarProducto,$paramArray);
                $result = parseResponse($stmtResult);
            } else {
                $result = array('errorMessage' => 'Imposible actualizar los datos. No se encuentra el producto.');
            }
            break;
    }
    
    echo json_encode($result);
    
?>
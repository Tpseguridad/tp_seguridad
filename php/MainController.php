<?php
    require_once './Clases.php';
    require_once './Constantes.php';
    require_once './FuncionesComunes.php';
    require_once './Funciones.php';
    
    session_start();
    
    $result = null;
    !empty($_GET['action']) ? $action = $_GET['action'] : $action = $_POST['action'];
    
    switch ($action) {
        case AccionControlador::$verificarSesionUsuario:
            if (isset($_SESSION['idUsuarioConectado'])) {
                $usuarioConectado = verificarUsuario();
                if (!empty($usuarioConectado)) {
                    $result = generarResponseUsuarioConectado($usuarioConectado);
                } else {
                    $result = array('estaConectado' => '0');
                }
            } else {
                $result = array('estaConectado' => '0');
            }
            
            if ($result['estaConectado'] === '0') {
                session_unset();
            }
            
            break;
        case AccionControlador::$conectarUsuario:
            $paramArray[] = $_GET['email'];
            $paramArray[] = $_GET['password_us'];
                
            $existeUsuario = queryStatement(SQLStatement::$traerUsuario, $paramArray);
            if (!empty($existeUsuario)) {
                if ($existeUsuario[0]['session_us'] == session_id()) {
                    session_regenerate_id();
                }
                
                $paramArray = null;
                $paramArray[] = session_id();
                $paramArray[] = $existeUsuario[0]['id_usuario'];

                $stmtResult = executeStatement(SQLStatement::$conectarUsuario, $paramArray);
                $result = parseResponse($stmtResult);
                
                if ($result['cantidadFilas'] == true) {
                    $_SESSION['idUsuarioConectado'] = $existeUsuario[0]['id_usuario'];
                    
                    $paramArray = null;
                    $usuarioConectado = verificarUsuario();
                    
                    $result = generarResponseUsuarioConectado($usuarioConectado);
                }
            } else {
                $result = array('errorMessage' => 'Usuario y/o contraseña incorrectos.');
            }
            
            break;
        case AccionControlador::$desconectarUsuario:
            if (isset($_SESSION['idUsuarioConectado'])) {
                $usuarioConectado = verificarUsuario();
                if (!empty($usuarioConectado)) {
                    $paramArray = null;
                    $paramArray[] = $_SESSION['idUsuarioConectado'];

                    $usuarioDesconectado = executeStatement(SQLStatement::$desconectarUsuario, $paramArray);
                    $result = parseResponse($usuarioDesconectado);

                    if ($result['cantidadFilas'] == true) {
                        session_unset();
                        $result = array('estaConectado' => '0');
                    }
                } else {
                    $result = array('errorMessage' => 'Error!');
                }
            }
            break;
            
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
            $stmtResult = executeStatement(SQLStatement::$traerUnProducto,$paramArray);
            
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
        case AccionControlador::$borrarProducto:
            $paramArray[] = $_GET['idProd'];
            
            $stmtResult = executeStatement(SQLStatement::$borrarProducto, $paramArray);
            $result = parseResponse($stmtResult);
            break;
    }
    
    echo json_encode($result);
    
?>
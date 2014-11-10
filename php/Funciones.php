<?php
    require_once './Clases.php';
    require_once './Constantes.php';
    
    function parseSemanas ($stmtResult) {
        $semanas = null;
         foreach ($stmtResult as $fila) {
            $semanas[] = array('semana' => $fila['semana']);
        }
        return $semanas;
    }
    
    function parseUsuario ($stmtResult) {
        $usuarios = null;
        foreach ($stmtResult as $fila) {
            $usuarios[] = new Usuario(
                    isset($fila[tp1_usuario::id]) ? $fila[tp1_usuario::id] : null,
                    isset($fila[tp1_usuario::idRol]) ? $fila[tp1_usuario::idRol] : null,
                    isset($fila[tp1_usuario::nombre]) ? $fila[tp1_usuario::nombre] : null,
                    isset($fila[tp1_usuario::apellido]) ? $fila[tp1_usuario::apellido] : null,
                    isset($fila[tp1_usuario::email]) ? $fila[tp1_usuario::email] : null,
                    isset($fila[tp1_usuario::usuario]) ? $fila[tp1_usuario::usuario] : null,
                    isset($fila[tp1_usuario::password]) ? $fila[tp1_usuario::password] : null
            );
        }
        return $usuarios;
    }
    
    function parseProducto ($stmtResult) {
        $productos = null;
        foreach ($stmtResult as $fila) {
            $productos[] = new Producto(
                    isset($fila[tp1_producto::id]) ? $fila[tp1_producto::id] : null,
                    isset($fila[tp1_producto::nombre]) ? $fila[tp1_producto::nombre] : null,
                    isset($fila[tp1_producto::descripcion]) ? $fila[tp1_producto::descripcion] : null
            );
        }
        return $productos;
    }
    
    function parseComentario ($stmtResult) {
        $comentarios = null;
        foreach ($stmtResult as $fila) {
            $comentarios[] = new ComentarioUsuarioProducto(
                    isset($fila[tp1_comentario_usuario_producto::id]) ? $fila[tp1_comentario_usuario_producto::id] : null,
                    isset($fila[tp1_comentario_usuario_producto::idProducto]) ? $fila[tp1_comentario_usuario_producto::idProducto] : null,
                    isset($fila[tp1_comentario_usuario_producto::idUsuario]) ? $fila[tp1_comentario_usuario_producto::idUsuario] : null,
                    isset($fila[tp1_comentario_usuario_producto::comentario]) ? $fila[tp1_comentario_usuario_producto::comentario] : null,
                    isset($fila[tp1_comentario_usuario_producto::titulo]) ? $fila[tp1_comentario_usuario_producto::titulo] : null,
                    isset($fila[tp1_usuario::apellido]) ? $fila[tp1_usuario::apellido] : null,
                    isset($fila[tp1_usuario::nombre]) ? $fila[tp1_usuario::nombre] : null
            );
        }
        return $comentarios;
    }
    
    function parsePrecioProductoUsuario ($stmtResult) {
        $ppus = null;
        foreach ($stmtResult as $fila) {
            $ppus[] = new PrecioProductoUsuario(
                    isset($fila[tp1_precio_producto_usuario::id]) ? $fila[tp1_precio_producto_usuario::id] : null,
                    isset($fila[tp1_precio_producto_usuario::idProducto]) ? $fila[tp1_precio_producto_usuario::idProducto] : null,
                    isset($fila[tp1_precio_producto_usuario::idUsuario]) ? $fila[tp1_precio_producto_usuario::idUsuario] : null,
                    isset($fila[tp1_precio_producto_usuario::precio]) ? $fila[tp1_precio_producto_usuario::precio] : null,
                    isset($fila[tp1_precio_producto_usuario::semana]) ? $fila[tp1_precio_producto_usuario::semana] : null
            );
        }
        return $ppus;
    }
    
    function parseComentarioUsuarioProducto ($stmtResult) {
        $cups = null;
        foreach ($stmtResult as $fila) {
            $cups[] = new ComentarioUsuarioProducto (
                    isset($fila[tp1_comentario_usuario_producto::id]) ? $fila[tp1_comentario_usuario_producto::id] : null,
                    isset($fila[tp1_comentario_usuario_producto::idProducto]) ? $fila[tp1_comentario_usuario_producto::idProducto] : null,
                    isset($fila[tp1_comentario_usuario_producto::idUsuario]) ? $fila[tp1_comentario_usuario_producto::idUsuario] : null,
                    isset($fila[tp1_comentario_usuario_producto::comentario]) ? $fila[tp1_comentario_usuario_producto::comentario] : null,
                    isset($fila[tp1_comentario_usuario_producto::titulo]) ? $fila[tp1_comentario_usuario_producto::titulo] : null
            );
        }
        return $cups;
    }
    
    function parseResultadoSemanaProducto ($stmtResult) {
        $rsps = null;
        
        foreach ($stmtResult as $fila) {
            $rsps[] = new ResultadoSemanaProducto (
                    isset($fila[tp1_resultado_semana_producto::id]) ? $fila[tp1_resultado_semana_producto::id] : null,
                    isset($fila[tp1_resultado_semana_producto::nombreProducto]) ? $fila[tp1_resultado_semana_producto::nombreProducto] : null,
                    isset($fila[tp1_resultado_semana_producto::semana]) ? $fila[tp1_resultado_semana_producto::semana] : null,
                    isset($fila[tp1_resultado_semana_producto::promedio]) ? $fila[tp1_resultado_semana_producto::promedio] : null,
                    isset($fila[tp1_resultado_semana_producto::minimo]) ? $fila[tp1_resultado_semana_producto::minimo] : null,
                    isset($fila[tp1_resultado_semana_producto::maximo]) ? $fila[tp1_resultado_semana_producto::maximo] : null
            );
        }
        
        return $rsps;
    }
    
    function parseIdProducto ($stmtResult) {
        return $stmtResult[0]['id_producto'];
    }
    
    function parseResponse ($stmtResult) {
        return array('cantidadFilas' => $stmtResult);
    }
    
    function verificarUsuario () {
        $paramArray[] = $_SESSION['idUsuarioConectado'];
        $paramArray[] = session_id();

        $usuarioConectado = queryStatement(SQLStatement::verificarSesionUsuario, $paramArray);
        
        return $usuarioConectado;
    }
    
    function generarResponseUsuarioConectado ($usuarioConectado) {
        return array(
            'estaConectado' => '1', 
            'nombre' => $usuarioConectado[0]['nombre'],
            'apellido' => $usuarioConectado[0]['apellido']
        );
    }
?>
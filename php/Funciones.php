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
                    $fila[tp1_usuario::$id],
                    $fila[tp1_usuario::$idRol],
                    $fila[tp1_usuario::$nombre],
                    $fila[tp1_usuario::$apellido],
                    $fila[tp1_usuario::$email],
                    $fila[tp1_usuario::$usuario],
                    $fila[tp1_usuario::$password]
            );
        }
        return $usuarios;
    }
    
    function parseProducto ($stmtResult) {
        $productos = null;
        foreach ($stmtResult as $fila) {
            $productos[] = new Producto(
                    $fila[tp1_producto::$id],
                    $fila[tp1_producto::$nombre],
                    $fila[tp1_producto::$descripcion]
            );
        }
        return $productos;
    }
    
    function parsePrecioProductoUsuario ($stmtResult) {
        $ppus = null;
        foreach ($stmtResult as $fila) {
            $ppus[] = new PrecioProductoUsuario(
                    $fila[tp1_precio_producto_usuario::$id],
                    $fila[tp1_precio_producto_usuario::$idProducto],
                    $fila[tp1_precio_producto_usuario::$idUsuario],
                    $fila[tp1_precio_producto_usuario::$precio],
                    $fila[tp1_precio_producto_usuario::$semana]
            );
        }
        return $ppus;
    }
    
    function parseComentarioUsuarioProducto ($stmtResult) {
        $cups = null;
        foreach ($stmtResult as $fila) {
            $cups[] = new ComentarioUsuarioProducto (
                    $fila[tp1_comentario_usuario_producto::$id],
                    $fila[tp1_comentario_usuario_producto::$idProducto],
                    $fila[tp1_comentario_usuario_producto::$idUsuario],
                    $fila[tp1_comentario_usuario_producto::$comentario],
                    $fila[tp1_comentario_usuario_producto::$titulo]
            );
        }
        return $cups;
    }
    
    function parseResultadoSemanaProducto ($stmtResult) {
        $rsps = null;
        
        foreach ($stmtResult as $fila) {
            $rsps[] = new ResultadoSemanaProducto (
                    $fila[tp1_resultado_semana_producto::$nombreProducto],
                    $fila[tp1_resultado_semana_producto::$semana],
                    $fila[tp1_resultado_semana_producto::$promedio],
                    $fila[tp1_resultado_semana_producto::$minimo],
                    $fila[tp1_resultado_semana_producto::$maximo]
            );
        }
        
        return $rsps;
    }
    
    function parseResponse ($stmtResult) {
        return array('cantidadFilas' => $stmtResult);
    }
?>
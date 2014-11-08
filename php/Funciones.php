<?php
    require_once './Clases.php';
    require_once './Constantes.php';
    
    function parseUsuario ($stmtResult) {
        $usuario = new Usuario(
                $stmtResult[tp1_usuario::$id],
                $stmtResult[tp1_usuario::$idRol],
                $stmtResult[tp1_usuario::$nombre],
                $stmtResult[tp1_usuario::$apellido],
                $stmtResult[tp1_usuario::$email],
                $stmtResult[tp1_usuario::$usuario],
                $stmtResult[tp1_usuario::$password]
        );
        
        return $usuario;
    }
    
    function parseProducto ($stmtResult) {
        $producto = new Producto(
                $stmtResult[tp1_producto::$id],
                $stmtResult[tp1_producto::$nombre],
                $stmtResult[tp1_producto::$descripcion]
        );
        
        return $producto;
    }
    
    function parsePrecioProductoUsuario ($stmtResult) {
        $ppu = new PrecioProductoUsuario(
                $stmtResult[tp1_precio_producto_usuario::$id],
                $stmtResult[tp1_precio_producto_usuario::$idProducto],
                $stmtResult[tp1_precio_producto_usuario::$idUsuario],
                $stmtResult[tp1_precio_producto_usuario::$precio],
                $stmtResult[tp1_precio_producto_usuario::$semana]
        );
        
        return $ppu;
    }
    
    function parseComentarioUsuarioProducto ($stmtResult) {
        $cup = new ComentarioUsuarioProducto (
                $stmtResult[tp1_comentario_usuario_producto::$id],
                $stmtResult[tp1_comentario_usuario_producto::$idProducto],
                $stmtResult[tp1_comentario_usuario_producto::$idUsuario],
                $stmtResult[tp1_comentario_usuario_producto::$comentario],
                $stmtResult[tp1_comentario_usuario_producto::$titulo]
        );
        
        return $cup;
    }
?>
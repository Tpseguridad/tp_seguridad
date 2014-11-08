<?php
//    class Columna {
//        public $nombre;
//        public $valor;
//        
//        function __construct ($nombre = null, $valor = null) {
//            $this->nombre = $nombre;
//            $this->valor = $valor;
//        }
//    }
//    
//    class SQLStatement {
//        public $tipo;
//        public $nombreTabla;
//        public $paramArray;
//        
//        function __construct ($tipo, $nombreTabla, $paramArray) {
//            $this->tipo = $tipo;
//            $this->nombreTabla = $nombreTabla;
//            $this->paramArray = $paramArray;
//        }
//    }
    
    abstract class AccionControlador {
        static $traerSemanasProducto = 'semanasProd';
        static $traerProductosDeSemana = 'traerProdsDeSemana';
        
        static $traerUnProductoDeSemana = 'traerUnProdDeSemana';
        static $traerComentarios = 'traerCommments';
        static $insertarComentario = 'insComment';
        
        static $traerNombreProducto = 'traerNomProd';
        static $insertarPrecioProducto = 'insPPU';
        static $actualizaPrecioProducto = 'updPPU';
        
        static $insertarProducto = 'insProd';
        static $traerProductos = 'traerProds';
        
        static $insertarUsuario = 'insUsu';
        static $traerUsuario = 'traerUsu';
        
    }
    
    abstract class SQLStatement {
        static $traerSemanasProducto = 
                'SELECT distinct semana FROM tp1_resultado_semana_producto rsp';
        static $traerProductosDeSemana = 
                'SELECT prod.nombre_producto, rsp.semana, rsp.promedio, rsp.maximo, rsp.minimo FROM tp1_resultado_semana_producto rsp 
                INNER JOIN tp1_producto prod ON rsp.id_prod = prod.id_producto WHERE rsp.semana = ?'; //guarda!
        
        static $traerUnProductoDeSemana = 
                'SELECT prod.nombre_producto, rsp.promedio, rsp.maximo, rsp.minimo FROM tp1_resultado_semana_producto rsp 
                INNER JOIN tp1_producto prod ON rsp.id_prod = prod.id_producto WHERE rsp.id_prod = ? AND rsp.semana = ?';
        static $traerComentarios = 
                'SELECT cup.comentario, cup.titulo, usu.apellido, usu.nombre FROM tp1_comentario_usuario_producto cup 
                INNER JOIN tp1_usuario usu ON cup.id_usu = usu.id_usuario WHERE cup.id_produ = ?';
        static $insertarComentario = 
                'INSERT INTO tp1_comentario_usuario_producto (comentario, id_produ, id_usu, titulo) VALUES (?, ?, ?, ?)';
        
        static $traerNombreProducto = 
                'SELECT prod.nombre_producto FROM tp1_producto prod WHERE prod.id_producto = ?';
        static $insertarPrecioProducto = 
                'INSERT INTO tp1_precio_producto_usuario (id_prod, id_us, precio, semana) VALUES (?, ?, ?, ?)';
        static $actualizaPrecioProducto = 
                'UPDATE tp1_precio_producto_usuario SET precio = ? WHERE id_prod = ? AND id_us = ? AND semana = ?';
        
        static $insertarProducto = 
                'INSERT INTO tp1_producto (nombre_producto, descripcion) VALUES (?, ?)';
        static $traerProductos = 
                'SELECT prod.nombre_producto, prod.descripcion FROM tp1_producto prod';
        
        static $insertarUsuario = 
                'INSERT INTO tp1_usuario (nombre_usuario, nombre, apellido, email, password_us, usuario_rol) VALUES (?, ?, ?, ?, ?, ?)';
        static $traerUsuario = 
                'SELECT usu.nombre, usu.apellido FROM tp1_usuario usu WHERE prod.nombre_usuario = ? AND prod.password_us = ?';
    }

    abstract class tp1_usuario {
        static $nombreTabla = 'tp1_usuario';
        static $id = 'id_usuario';
        static $idRol = 'usuario_rol';
        static $nombre = 'nombre';
        static $apellido = 'apellido';
        static $email = 'email';
        static $usuario = 'nombre_usuario';
        static $password = 'password_us';
    }
    
    abstract class tp1_producto {
        static $nombreTabla = 'tp1_producto';
        static $id = 'id_producto';
        static $nombre = 'nombre_producto';
        static $descripcion = 'descripcion';
    }
    
    abstract class tp1_usuario_rol {
        static $nombreTabla = 'tp1_usuario_rol';
        static $id = 'id_rol';
        static $nombre = 'nombre_rol';
    }
    
    abstract class tp1_comentario_usuario_producto {
        static $nombreTabla = 'tp1_comentario_usuario_producto';
        static $id = 'id_comentario_producto';
        static $idProducto = 'id_produ';
        static $idUsuario = 'id_usu';
        static $comentario = 'comentario';
        static $titulo = 'titulo';
    }
    
    abstract class tp1_precio_producto_usuario {
        static $nombreTabla = 'tp1_precio_producto_usuario';
        static $id = 'id_ppu';
        static $idProducto = 'id_prod';
        static $idUsuario = 'id_us';
        static $precio = 'precio';
        static $semana = 'semana';
    }
    
    abstract class tp1_resultado_semana_producto {
        static $nombreTabla = 'tp1_resultado_semana_producto';
        static $nombreProducto = 'nombre_producto';
        static $semana = 'semana';
        static $promedio = 'promedio';
        static $minimo = 'minimo';
        static $maximo = 'maximo';
    }
    
    abstract class ConstantesBD {
        static $insert = 'INSERT INTO ';
        static $select = 'SELECT ';
        static $update = 'UPDATE ';
        static $delete = 'DELETE FROM ';
    }
?>
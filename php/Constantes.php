<?php
    class Columna {
        public $nombre;
        public $valor;
        
        function __construct ($nombre = null, $valor = null) {
            $this->nombre = $nombre;
            $this->valor = $valor;
        }
    }
    
    class SQLStatement {
        public $tipo;
        public $nombreTabla;
        public $paramArray;
        
        function __construct ($tipo, $nombreTabla, $paramArray) {
            $this->tipo = $tipo;
            $this->nombreTabla = $nombreTabla;
            $this->paramArray = $paramArray;
        }
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
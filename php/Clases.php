<?php
    class Usuario {
        public $id;
        public $idRol;
        public $nombre;
        public $apellido;
        public $email;
        public $usuario;
        public $password;
        
        function __construct ($id, $idRol, $nombre, $apellido, $email, $usuario, $password) {
            $this->id = $id;
            $this->idRol = $idRol;
            $this->nombre = $nombre;
            $this->apellido = $apellido;
            $this->email = $email;
            $this->usuario = $usuario;
            $this->password = $password;
        }
    }
    
    class Producto {
        public $id;
        public $nombre;
        public $descripcion;
        
        function __construct ($id, $nombre, $descripcion) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
        }
    }
    
    class PrecioProductoUsuario {
        public $id;
        public $idProducto;
        public $idUsuario;
        public $precio;
        public $semana;
        
        function __construct ($id, $idProducto, $idUsuario, $precio, $semana) {
            $this->id = $id;
            $this->idProducto = $idProducto;
            $this->idUsuario = $idUsuario;
            $this->precio = $precio;
            $this->semana = $semana;
        }
    }
    
    class ComentarioUsuarioProducto {
        public $id;
        public $idProducto;
        public $idUsuario;
        public $comentario;
        public $titulo;
        public $apellido;
        public $nombre;
        
        function __construct ($id, $idProducto, $idUsuario, $comentario, $titulo, $apellido, $nombre) {
            $this->id = $id;
            $this->idProducto = $idProducto;
            $this->idUsuario = $idUsuario;
            $this->comentario = $comentario;
            $this->titulo = $titulo;
            $this->apellido = $apellido;
            $this->nombre = $nombre;
        }
    }
    
    class ResultadoSemanaProducto {
        public $id;
        public $nombreProducto;
        public $semana;
        public $promedio;
        public $minimo;
        public $maximo;
        
        function __construct ($id, $nombreProducto, $semana, $promedio, $minimo, $maximo) {
            $this->id = $id;
            $this->nombreProducto = $nombreProducto;
            $this->semana = $semana;
            $this->promedio = $promedio;
            $this->minimo = $minimo;
            $this->maximo = $maximo;
        }
    }
?>
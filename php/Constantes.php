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
        static $buscarProducto = 'busProd';
        static $traerProductos = 'traerProds';
        static $traerUnProducto = 'traerUnProd';
        static $actualizarProducto = 'actProd';
        static $borrarProducto = 'delProd';
        
        static $insertarUsuario = 'insUsu';
        static $traerUsuario = 'traerUsu';
        
        static $verificarSesionUsuario = 'checkUser';
        static $conectarUsuario = 'logInUser';
        static $desconectarUsuario = 'logOutUser';
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
                'INSERT INTO tp1_precio_producto_usuario (id_prod, id_us, semana, precio) VALUES (?, ?, ?, ?)';
        static $traerPrecioProducto = 
                'SELECT 1 FROM tp1_precio_producto_usuario WHERE id_prod = ? AND id_us = ? AND semana = ?';
        static $actualizaPrecioProducto = 
                'UPDATE tp1_precio_producto_usuario SET precio = ? WHERE id_prod = ? AND id_us = ? AND semana = ?';
        
        static $insertarProducto = 
                'INSERT INTO tp1_producto (nombre_producto, descripcion) VALUES (?, ?)';
        static $traerUnProducto =
                'SELECT prod.id_producto, prod.nombre_producto, prod.descripcion FROM tp1_producto prod WHERE prod.id_producto = ?';
        static $traerProductos = 
                'SELECT prod.id_producto, prod.nombre_producto, prod.descripcion FROM tp1_producto prod';
        
        static $insertarUsuario = 
                'INSERT INTO tp1_usuario (nombre_usuario, nombre, apellido, email, password_us, usuario_rol) VALUES (?, ?, ?, ?, ?, ?)';
        static $traerUsuario = 
                'SELECT usu.id_usuario, rol.nombre_rol, usu.session_us FROM tp1_usuario usu
                INNER JOIN tp1_usuario_rol rol ON usu.usuario_rol = rol.id_rol WHERE usu.email = ? AND usu.password_us = ?';
        
        static $buscarProducto = 
                'SELECT prod.id_producto FROM tp1_producto prod WHERE prod.nombre_producto = ?';
        
        static $actualizarProducto = 
                'UPDATE tp1_producto SET nombre_producto = ?, descripcion = ? WHERE id_producto = ?';
        
        static $borrarProducto =
                'DELETE FROM tp1_producto WHERE id_producto = ?';
        
        static $verificarSesionUsuario = 
                'SELECT usu.nombre, usu.apellido, usu.id_usuario, usu.session_us FROM tp1_usuario usu WHERE usu.id_usuario = ? AND usu.session_us = ?';
        static $conectarUsuario = 
                'UPDATE tp1_usuario SET session_us = ? WHERE id_usuario = ?';
        static $desconectarUsuario = 
                'UPDATE tp1_usuario SET session_us = null WHERE id_usuario = ?';
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
    
    /*
     ** index.php :
     * SELECT distinct semana FROM tp1_resultado_semana_producto rsp //Trae semanas disponibles con precios productos
     * 
     * SELECT prod.nombre_producto, rsp.promedio, rsp.maximo, rsp.minimo FROM tp1_resultado_semana_producto rsp 
     *  INNER JOIN tp1_producto prod ON rsp.id_prod = prod.id_producto WHERE rsp.semana = ? //Trae valores de productos de una semana especifica
     * 
     ** producto.php
     * SELECT prod.nombre_producto, rsp.promedio, rsp.maximo, rsp.minimo FROM tp1_resultado_semana_producto rsp 
     *  INNER JOIN tp1_producto prod ON rsp.id_prod = prod.id_producto WHERE rsp.id_prod = ? AND rsp.semana = ? //Trae un producto y sus valores de una semana especifica
     * 
     * SELECT cup.comentario, cup.titulo, usu.apellido, usu.nombre FROM tp1_comentario_usuario_producto cup 
     *  INNER JOIN tp1_usuario usu ON cup.id_usu = usu.id_usuario WHERE cup.id_produ = ? //Trae comentarios de un producto
     * 
     * INSERT INTO tp1_comentario_usuario_producto (comentario, id_produ, id_usu, titulo) VALUES (?, ?, ?, ?) //Inserta nuevo comentario 
     * 
     ** subirprecios.php :
     * SELECT prod.nombre_producto FROM tp1_producto prod WHERE prod.id_producto = ? //Trae nombre del producto
     * 
     * INSERT INTO tp1_precio_producto_usuario (id_prod, id_us, precio, semana) VALUES (?, ?, ?, ?) //Inserta nuevo precio para un usuario y un prod determinado
     * 
     * UPDATE tp1_precio_producto_usuario SET precio = ? WHERE id_prod = ? AND id_us = ? AND semana = ? //Renueva precio de un usuario para un prod determinado
     * 
     ** subirproductos.php :
     * INSERT INTO tp1_producto (nombre_producto, descripcion) VALUES (?, ?) //Inserta producto
     * 
     * SELECT prod.nombre_producto, prod.descripcion FROM tp1_producto prod //Trae todos los productos disponibles
     * 
     ** registrousuario.php :
     * INSERT INTO tp1_usuario (nombre_usuario, nombre, apellido, email, password_us, usuario_rol) VALUES (?, ?, ?, ?, ?, ?) //Inserta nuevo usuario
     * 
     ** login.php :
     * SELECT usu.nombre, usu.apellido FROM tp1_usuario usu WHERE prod.nombre_usuario = ? AND prod.password_us = ? //Trae info de usuario
     */
?>
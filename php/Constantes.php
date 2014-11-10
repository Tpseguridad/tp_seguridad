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

    abstract class ListaRoles {
        static $roles = array(RolesUsuario::administrador, RolesUsuario::registrado);
    }
    
    abstract class PermisosRol {
        static $permisosAdministrador = array(
            'rol' => array(RolesUsuario::administrador),
            'paginas' => array(Paginas::subirPrecios, Paginas::subirProductos),
            'controles' => array(Controles::menuItemPrecios, Controles::menuItemProductos),
            'statements' => array(SQLStatement::actualizaPrecioProducto, SQLStatement::actualizarProducto,
                SQLStatement::borrarProducto, SQLStatement::buscarProducto, SQLStatement::conectarUsuario,
                SQLStatement::desconectarUsuario, SQLStatement::insertarComentario, SQLStatement::insertarPrecioProducto,
                SQLStatement::insertarProducto, SQLStatement::insertarUsuario, SQLStatement::traerComentarios,
                SQLStatement::traerNombreProducto, SQLStatement::traerPrecioProducto, SQLStatement::traerProductos,
                SQLStatement::traerProductosDeSemana, SQLStatement::traerSemanasProducto, SQLStatement::traerUnProducto,
                SQLStatement::traerUnProductoDeSemana, SQLStatement::traerUsuario, SQLStatement::verificarSesionUsuario
            )
        );
        
        static $permisosRegistrado = array(
            'rol' => array(RolesUsuario::registrado),
            'paginas' => array(Paginas::subirPrecios),
            'controles' => array(Controles::menuItemPrecios),
            'statements' => array(SQLStatement::actualizaPrecioProducto,
                SQLStatement::buscarProducto, SQLStatement::conectarUsuario,
                SQLStatement::desconectarUsuario, SQLStatement::insertarComentario, SQLStatement::insertarPrecioProducto,
                SQLStatement::insertarUsuario, SQLStatement::traerComentarios,
                SQLStatement::traerNombreProducto, SQLStatement::traerPrecioProducto, SQLStatement::traerProductos,
                SQLStatement::traerProductosDeSemana, SQLStatement::traerSemanasProducto, SQLStatement::traerUnProducto,
                SQLStatement::traerUnProductoDeSemana, SQLStatement::traerUsuario, SQLStatement::verificarSesionUsuario
            )
        );
    }
    
    abstract class RolesUsuario {
        const administrador = 'administrador';
        const registrado = 'usuario';
        const anonimo = 'anonimo';
    }
    
    abstract class Paginas {
        const verPrecios = 'precioProductos.php';
        const verProducto = 'producto.php';
        const subirPrecios = 'subirprecios.php';
        const subirProductos = 'subirproductos.php';
    }
    
    abstract class Controles {
        const menuItemPrecios = 'subirPrecios';
        const menuItemProductos = 'subirProductos';
    }
    
    abstract class AccionControlador {
        const traerSemanasProducto = 'semanasProd';
        const traerProductosDeSemana = 'traerProdsDeSemana';
        
        const traerUnProductoDeSemana = 'traerUnProdDeSemana';
        const traerComentarios = 'traerCommments';
        const insertarComentario = 'insComment';
        
        const traerNombreProducto = 'traerNomProd';
        const insertarPrecioProducto = 'insPPU';
        const actualizaPrecioProducto = 'updPPU';
        
        const insertarProducto = 'insProd';
        const buscarProducto = 'busProd';
        const traerProductos = 'traerProds';
        const traerUnProducto = 'traerUnProd';
        const actualizarProducto = 'actProd';
        const borrarProducto = 'delProd';
        
        const insertarUsuario = 'insUsu';
        const traerUsuario = 'traerUsu';
        
        const verificarSesionUsuario = 'checkUser';
        const conectarUsuario = 'logInUser';
        const desconectarUsuario = 'logOutUser';
        
        const verificarPermisosPagina = 'checkPermission';
        const verificarPermisosControles = 'checkCtrlPermission';
        
        const verProducto = 'verProducto';
        const traerDatosProducto = 'datosProd';
    }
    
    abstract class SQLStatement {
        const traerSemanasProducto = 
                'SELECT distinct semana FROM tp1_resultado_semana_producto rsp ORDER BY semana ASC';
        const traerProductosDeSemana = 
                'SELECT prod.id_producto, prod.nombre_producto, rsp.semana, rsp.promedio, rsp.maximo, rsp.minimo FROM tp1_resultado_semana_producto rsp 
                INNER JOIN tp1_producto prod ON rsp.id_prod = prod.id_producto WHERE rsp.semana = ?'; //guarda!
        
        const traerUnProductoDeSemana = 
                'SELECT prod.nombre_producto, rsp.promedio, rsp.maximo, rsp.minimo FROM tp1_resultado_semana_producto rsp 
                INNER JOIN tp1_producto prod ON rsp.id_prod = prod.id_producto WHERE rsp.id_prod = ? AND rsp.semana = ?';
        const traerComentarios = 
                'SELECT cup.comentario, cup.titulo, usu.apellido, usu.nombre FROM tp1_comentario_usuario_producto cup 
                INNER JOIN tp1_usuario usu ON cup.id_usu = usu.id_usuario WHERE cup.id_produ = ?';
        const insertarComentario = 
                'INSERT INTO tp1_comentario_usuario_producto (comentario, id_produ, id_usu, titulo) VALUES (?, ?, ?, ?)';
        
        const traerNombreProducto = 
                'SELECT prod.nombre_producto FROM tp1_producto prod WHERE prod.id_producto = ?';
        const insertarPrecioProducto = 
                'INSERT INTO tp1_precio_producto_usuario (id_prod, id_us, semana, precio) VALUES (?, ?, ?, ?)';
        const traerPrecioProducto = 
                'SELECT 1 FROM tp1_precio_producto_usuario WHERE id_prod = ? AND id_us = ? AND semana = ?';
        const actualizaPrecioProducto = 
                'UPDATE tp1_precio_producto_usuario SET precio = ? WHERE id_prod = ? AND id_us = ? AND semana = ?';
        
        const insertarProducto = 
                'INSERT INTO tp1_producto (nombre_producto, descripcion) VALUES (?, ?)';
        const traerUnProducto =
                'SELECT prod.id_producto, prod.nombre_producto, prod.descripcion FROM tp1_producto prod WHERE prod.id_producto = ?';
        const traerProductos = 
                'SELECT prod.id_producto, prod.nombre_producto, prod.descripcion FROM tp1_producto prod';
        
        const insertarUsuario = 
                'INSERT INTO tp1_usuario (nombre_usuario, nombre, apellido, email, password_us, usuario_rol) VALUES (?, ?, ?, ?, ?, ?)';
        const traerUsuario = 
                'SELECT usu.id_usuario, rol.nombre_rol, usu.session_us FROM tp1_usuario usu
                INNER JOIN tp1_usuario_rol rol ON usu.usuario_rol = rol.id_rol WHERE usu.email = ? AND usu.password_us = ?';
        
        const buscarProducto = 
                'SELECT prod.id_producto FROM tp1_producto prod WHERE prod.nombre_producto = ?';
        
        const actualizarProducto = 
                'UPDATE tp1_producto SET nombre_producto = ?, descripcion = ? WHERE id_producto = ?';
        
        const borrarProducto =
                'DELETE FROM tp1_producto WHERE id_producto = ?';
        
        const verificarSesionUsuario = 
                'SELECT usu.nombre, usu.apellido, usu.id_usuario, usu.session_us FROM tp1_usuario usu WHERE usu.id_usuario = ? AND usu.session_us = ?';
        const conectarUsuario = 
                'UPDATE tp1_usuario SET session_us = ? WHERE id_usuario = ?';
        const desconectarUsuario = 
                'UPDATE tp1_usuario SET session_us = null WHERE id_usuario = ?';
        
        const traerDatosProducto = 
                'SELECT prod.id_producto, prod.nombre_producto, rsp.semana, rsp.promedio, rsp.maximo, rsp.minimo FROM tp1_resultado_semana_producto rsp 
                INNER JOIN tp1_producto prod ON rsp.id_prod = prod.id_producto WHERE rsp.id_prod = ? AND rsp.semana = ?';
    }

    abstract class tp1_usuario {
        const nombreTabla = 'tp1_usuario';
        const id = 'id_usuario';
        const idRol = 'usuario_rol';
        const nombre = 'nombre';
        const apellido = 'apellido';
        const email = 'email';
        const usuario = 'nombre_usuario';
        const password = 'password_us';
    }
    
    abstract class tp1_producto {
        const nombreTabla = 'tp1_producto';
        const id = 'id_producto';
        const nombre = 'nombre_producto';
        const descripcion = 'descripcion';
    }
    
    abstract class tp1_usuario_rol {
        const nombreTabla = 'tp1_usuario_rol';
        const id = 'id_rol';
        const nombre = 'nombre_rol';
    }
    
    abstract class tp1_comentario_usuario_producto {
        const nombreTabla = 'tp1_comentario_usuario_producto';
        const id = 'id_comentario_producto';
        const idProducto = 'id_produ';
        const idUsuario = 'id_usu';
        const comentario = 'comentario';
        const titulo = 'titulo';
    }
    
    abstract class tp1_precio_producto_usuario {
        const nombreTabla = 'tp1_precio_producto_usuario';
        const id = 'id_ppu';
        const idProducto = 'id_prod';
        const idUsuario = 'id_us';
        const precio = 'precio';
        const semana = 'semana';
    }
    
    abstract class tp1_resultado_semana_producto {
        const nombreTabla = 'tp1_resultado_semana_producto';
        const id = 'id_producto';
        const nombreProducto = 'nombre_producto';
        const semana = 'semana';
        const promedio = 'promedio';
        const minimo = 'minimo';
        const maximo = 'maximo';
    }
    
    abstract class ConstantesBD {
        const insert = 'INSERT INTO ';
        const select = 'SELECT ';
        const update = 'UPDATE ';
        const delete = 'DELETE FROM ';
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
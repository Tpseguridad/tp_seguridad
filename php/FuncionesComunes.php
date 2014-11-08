<?php    
    function executeStatement ($sql, $paramArray) {
        $count = 0;
        
        try {
            $dbConnection = createConnection();
            $stmt = prepareStatement($dbConnection, $sql, $paramArray);
            $count = $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            closeConnection($dbConnection);
        }
        
        return $count;
    }
    
    function queryStatement ($sql, $paramArray = null) {
        try {
            $dbConnection = createConnection();
            $stmt = prepareStatement($dbConnection, $sql, $paramArray);
            $stmt->execute();
        } catch (PDOException $e) {
            $stmt = null;
            echo $e->getMessage();
        } finally {
            closeConnection($dbConnection);
        }
        
        if ($stmt !== null) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
    
    //--------------------------------------------------------------------------
    
    function createConnection () {
        $username = 'root';
        $password = '';
        $hostname = 'localhost';
        $dbname = 'productos';
        $dbConnection = null;
        
        try {
            $dbConnection = new PDO("mysql:host=$hostname; dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
            $dbConnection = null;
        }
        
        return $dbConnection;
    }
    
    function closeConnection (PDO &$dbConnection) {
        $dbConnection = null;
    }
    
    function prepareStatement (PDO &$dbConnection, $sql, $paramArray) {
        $stmt = $dbConnection->prepare($sql);
        
        for ($i = 1; $i <= count($paramArray); $i ++) {
            $stmt->bindParam($i, $paramArray[$i]);
        }
        
        return $stmt;
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
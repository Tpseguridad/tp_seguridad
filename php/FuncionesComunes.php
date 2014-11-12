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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
    
    //--------------------------------------------------------------------------
    
    function createConnection () {
        $username = 'root';
        $password = ''; //A fines practicos se mantienen usuario y contraseñas por defecto.
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
        
        for ($i = 0; $i < count($paramArray); $i++) {
            $stmt->bindParam(($i+1), $paramArray[$i]);
            if (end($paramArray) == null) {
                array_pop($paramArray);
            }
        }
        
        return $stmt;
    }
    
    function verificarPermisosStatements ($statementRequerido) {
        $idRolUsuario = isset($_SESSION['rolUsuario']) ? $_SESSION['rolUsuario'] : 'anonimo';
        if (in_array($idRolUsuario, ListaRoles::$roles)) {
            switch ($idRolUsuario) {
                case RolesUsuario::administrador:
                    $tienePermisos = in_array($statementRequerido, PermisosRol::$permisosAdministrador['statements']);
                    break;
                case RolesUsuario::registrado:
                    $tienePermisos = in_array($statementRequerido, PermisosRol::$permisosRegistrado['statements']);
                    break;
                case RolesUsuario::anonimo:
                    $tienePermisos = in_array($statementRequerido, PermisosRol::$permisosAnonimo['statements']);
                    break;
                default:
                    $tienePermisos = false;
                    break;
            }
        } else {
            $tienePermisos = false;
        }
        
        return $tienePermisos;
    }
?>
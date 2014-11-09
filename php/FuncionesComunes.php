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
        
        for ($i = 0; $i < count($paramArray); $i++) {
            $stmt->bindParam(($i+1), $paramArray[$i]);
            if (end($paramArray) == null) {
                array_pop($paramArray);
            }
        }
        
        return $stmt;
    }
?>
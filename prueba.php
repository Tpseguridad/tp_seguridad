<?php
    //Inicia sesion
    session_start();
    
    //Almacena la fecha actual y la fecha de expiracion del delay
    $datetimeAhora = new DateTime();
    $datetimeDesps = isset($_SESSION['delays']['insertarComentario']) ? $_SESSION['delays']['insertarComentario'] : new DateTime();
    
    //Si la fecha actual es mayor o igual que la fecha de expiracion, se borra la variable de sesion y se permite agregar el comentario.
    //Posteriormente se coloca un nuevo delay
    if ($datetimeAhora >= $datetimeDesps) {
        echo 'Da permiso y genera el delay';
        colocarDelay();
    } else {
        $diffSecs = date_timestamp_get($datetimeDesps) - date_timestamp_get($datetimeAhora);
        echo 'No permitido, faltan '.$diffSecs.' segundos.';
    }
    
    function colocarDelay () {
        //El delay es de 5 segundos
        $_SESSION['delays']['insertarComentario'] = date_add(new DateTime(), new DateInterval('PT5S'));
    }
?>
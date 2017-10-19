<?php
    session_start();
    // comprobamos que se haya iniciado la sesi�n
    if(isset($_SESSION['usuario'])) {
        session_destroy();
        header('Location: ../index.php');
		
    }else {
        echo "Operaci�n incorrecta.";
    }
?>
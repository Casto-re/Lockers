<?php
    session_start(); /* Iniciamos la sesion */

    session_unset(); /* Eliminar la sesion */

    session_destroy(); /* Destruimos la sesion */

    header('Location:/Login/login.php')
?>
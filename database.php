<?php
    /* Nombre del servidor */
    $server = 'localhost';
    /* Usuario de la base de datos */
    $username = 'root';
    /* Contraseña de la base de datos */
    $password = '';
    /* Nombre de la base de datos */
    $database = 'Login';

    try {
        /* Parametros de conexion con los valores establecidos */
        $conn = new PDO("mysql:host=$server;dbname=$database;",$username, $password);
    } catch (PDOException $e) { /* Si no se ejecuta la conexion guardar el error en una variable */
        die("Conexion fallida: ".$e->getMessage()); /* Matar el proceso de la conexion y mostar un mensaje con los parametros */
    }
?>
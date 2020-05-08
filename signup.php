<?php
    require 'database.php';

    $message = ''; /* Variable global */

    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['user_name']) && !empty($_POST['direcc']) && !empty($_POST['telf'])) { /* Si los campos de texto no estan vacios ejecutar */
        $sql = "INSERT INTO users (email, password, user_name, direccion, telefono) VALUES (:email, :password, :user_name, :direcc, :telf)"; /* Consulta sql que inserta los datos ingresados en la base de datos */
        $stmt = $conn->prepare($sql); /* Ejecutar la consulta sql */
        $stmt->bindParam(':user_name',$_POST['user_name']); /* Vincular valor con el campo de la base de datos */
        $stmt->bindParam(':direcc',$_POST['direcc']);
        $stmt->bindParam(':telf',$_POST['telf']);
        $stmt->bindParam(':email',$_POST['email']); /* Vincular valor con el campo de la base de datos */
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); /* Encriptar la contraseña */
        $stmt->bindParam(':password',$password); /* Vincular valor con el campo de la base de datos */

        if ($stmt->execute()) { /* Si la consulta se ejecuta correctamente ejecutar */
            $message = 'Su usuario ha sido creado';
        } else { /* En caso de no ejecutarse realizar */
            $message = 'No se pudo crear su usuario';
        }
        
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Alumnos del CBTis 37">
    <title>SignUp</title>
    <!-- Llamando los estilos globales -->
    <?php require "partials/styles.php"?>

    <!-- Llamando codigo JS -->
    <script src="js/captacha.js"></script>

    <!-- Llamando estilos exclusivos de la página -->
    <link rel="stylesheet" href="assets/css/signup.css">

</head>
<body>
    <!-- Llamando código de la cabecera -->
    <?php require "partials/header.php"?>

    <?php if(!empty($message)):?> <!-- En caso de no estar vacia la variable ejecutar -->
    <p><?= $message ?></p> <!-- Mostrar valor de la variable -->
    <?php endif ?> <!-- Terminar condicional -->

    <h1>SignUp</h1>
    <span> or <a href="login.php">Login</a></span>
    <form action="signup.php" method="post" name="Login">
        <input type="text" name="user_name" placeholder="Nombre de usuario">
        <input type="text" name="email" placeholder="Correo electronico">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="text" name="direcc" placeholder="Direccion">
        <input type="text" name="telf" placeholder="Telefono">
        <!-- Boton que ejecuta una función de JS -->
            <h5>Confirma que eres humano</h5>
            <input type="button" onclick="captacha()" value="Captacha"/> <!-- Boton que permite verificar si se es un humano -->
            <input type="button" onclick="requiredLogin()" value="Registrarse"> <!-- Boton que envia los datos a la conexion de la BD -->
    </form>
</body>
</html>
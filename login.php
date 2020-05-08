<?php 

    session_start(); /* Inicio de sesion */

    require 'database.php'; /* Llamando conexion a la base de datos */

    if (!empty($_POST['email']) && !empty($_POST['password'])) { /* Si los campos no estan vacios ejecutar */
        /* Consulta sql para recibir los datos registrados en la base de datos y compararlos con los ingresados */
        $records = $conn->prepare('SELECT id, email, password  FROM users WHERE email=:email');
        $records->bindParam(':email', $_POST['email']); /* Vincular valor ingresado */
        $records->execute(); /* Ejecutar la consulta */
        $results = $records->fetch(PDO::FETCH_ASSOC); /* Creación de arreglo asociativo */

        $message = '';

        if (!empty($results) && password_verify($_POST['password'], $results['password'])) { /* Validar que se tengan datos ingresados y comparar la contraseña ingresada con la de la base de datos */
            $_SESSION['user_id'] = $results['id']; /* Obtener el id del usuario */
            header('Location:/Login/main.php'); /* Redireccionar a index */
        }else{ /* En caso contrario ejecutae */
            $message='No se a podido comprobar su identidad';
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Alumnos del CBTis 37">
    <title>Login</title>
    <!-- Llamando los codigos de estilo --> 
    <?php require "partials/styles.php" ?>

</head>
<body>
    <!-- Llamando el código de la cabecera -->
    <?php require "partials/header.php" ?>

    <?php if(!empty($message)):?> <!-- En caso de no estar vacia la variable ejecutar -->
    <p><?= $message ?></p> <!-- Mostrar valor de la variable -->
    <?php endif; ?> <!-- Terminar condicional -->

    <h1>Login</h1>
    <span> or <a href="signup.php">SignUp</a></span>
    <form action="login.php" method="post">
        <!-- Campo de texto de caracteres unicode uft8 -->
        <input type="text" name="email" placeholder="Correo electronico">
        <!-- Campo de texto cifrado para la contrasea -->
        <input type="password" name="password" placeholder="Contraseña">
        <!-- Boton con la acción de enviar los datos -->
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
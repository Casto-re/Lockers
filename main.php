<?php 
    session_start(); /* Iniciar la sesión */

    require 'database.php';

    if (isset($_SESSION['user_id'])) { /* Si la sesion existe ejecutar */
        /* Obtener los valores a partir de una consulta sql */
        $records = $conn->prepare('SELECT id, user_name, email, password FROM users WHERE id = :id');
        /* Vincular valor obtenido de la sesion con el de la base de datos */
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute(); /* Ejecutar consulta */
        $results = $records->fetch(PDO::FETCH_ASSOC); /* Obtener los resultados de la consulta */

        $user = null;

        if (!empty($results)) { /* Si tenemos los datos ejecutar */
            $user = $results; /* Almacenar los datos  */
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Alumnos del CBTis 37">
    <title>Main</title>
    <!-- Alerta indicando que se ha iniciado sesión -->
    <script type="text/javascript">
        alert("Has iniciado sesión satisfactoriamente")
    </script>
</head>
<body>
    <?php if (!empty($user)): ?> <!-- Si los datos no estan vacios ejecutar -->
    <br> Bienvenido: <?= $user['user_name']; ?>  <!-- Mostrar el nombre del usuario -->
    <?php endif ?>
    <a href="logout.php">Logout</a>
</body>
</html>
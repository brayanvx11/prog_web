<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
// con las lineas anteriores va a entrar aqui solo si hay sesion
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienvenido</title>
    <style>
        body {
            background-color: green;
            color: white;
        }
    </style>
  </head>
  <body>
    <h1>Bienvenido <?php echo $_SESSION['usuario'] ?></h1>
    <br />
    <a href="logout.php">Cerrar Sesión</a>
  </body>
</html>

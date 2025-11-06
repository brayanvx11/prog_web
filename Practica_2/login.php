<?php
session_start();
if (isset($_SESSION["usuario"])) {
  header("Location: inicio.php");
  exit();
}
if (isset($_COOKIE["usuario_recordado"])) {
  $usuario_guardado = $_COOKIE["usuario_recordado"];
} else {
  $usuario_guardado = "";
}
if (isset($_COOKIE["password_recordada"])) {
  $password_guardada = $_COOKIE["password_recordada"];
} else {
  $password_guardada = "";
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Caso Practico 2</title>
  </head>
  <body>
    <h2>Inicia sesión</h2>
    <form action="validar.php" method="POST">
        <label>Usuario </label><input name="user" value="<?php echo $usuario_guardado ?>"/>
        <br><br>
        <label>Contraseña </label><input name="password" value="<?php echo $password_guardada?>"/>
        <br><br>
        <label>Recuérdame </label><input type="checkbox" name="recordar"/>
        <br><br>
        <input type="submit">
    </form>
  </body>
</html>

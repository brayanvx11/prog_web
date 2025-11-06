<?php
session_start();
if (isset($_SESSION["usuario"])) {
  header("Location: inicio_editar.php");
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
<html lang="es" data-theme="light">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - Caso Practico 2</title>
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bulma@1.0.4/css/bulma.min.css">
  <!-- Importamos Font Awesome para los iconos (muy común en formularios) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>


  <section class="section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-two-thirds">
          <div class="box has-text-centered">
            <h2 class="title">Inicia sesión</h2>
            <div class="field is-grouped is-grouped-centered">
              <form action="validar.php" method="POST">
                <label class="label">Usuario </label>
                <div class="control">
                  <input class="input" name="user" value="<?php echo $usuario_guardado ?>" />
                </div> <br>

                <label class="label">Contraseña </label>
                <div class="control">
                  <input class="input" name="password" value="<?php echo $password_guardada ?>" />
                </div>
                      <br>
                <label class="label">Recuérdame </label><input type="checkbox" name="recordar" />
                <br><br>
                <input class="button is-primary" type="submit">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>

</body>

</html>
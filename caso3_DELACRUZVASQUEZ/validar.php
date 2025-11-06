<?php
session_start();
// definimos usuarios y contraseñas
$usuario_valido = "admin";
$password_valida = "123";

//recuperamos datos recibidos
$user_form = $_REQUEST["user"];
$password_form = $_REQUEST["password"];
$recordar_form = isset($_REQUEST["recordar"]);

// logica pa validar los datos recibidos
if ($usuario_valido==$user_form && $password_valida==$password_form) {
    // los datos son validos
    // 1. actualizamos sesión
    // primero se guardan los datos del usuario en la sesion
    $_SESSION["usuario"] = $usuario_valido;

    // 2. logica cookie
    if ($recordar_form) {
        setcookie("usuario_recordado", $usuario_valido, time()+(60*60*24*30)); // lo recordará un mes
        setcookie("password_recordada", $password_form, time()+(60*60*24*30));
    } else {
        setcookie("usuario_recordado", "", time()-1); // se pone tiempo pasado para destruir
        setcookie("password_recordada", "", time()-1);
    }
    header("Location: inicio_insertar.php");
    exit();
} else {
    // entra aquí si los datos están mal
    // redirigimos a la pantalla de error
     header("Location: error.php");
    exit();
}

?>
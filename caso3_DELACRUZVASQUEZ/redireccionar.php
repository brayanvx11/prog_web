<?php
$seleccion= $_GET["opcion"];

if ($seleccion == "eliminar") {
header("Location: inicio_eliminar.php");
  exit();
} elseif ($seleccion== "agregar") {
header("Location: inicio_insertar.php");
  exit();
} elseif ($seleccion== "editar") {
header("Location: inicio_editar.php");
  exit();
}
?>
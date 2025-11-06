<?php
    include "mysqlaux.php";

    if (isset($_POST["nombre"], $_POST["costo"], $_POST["precio"], $_POST["stock"]) &&
    $_POST["nombre"] !== "" && $_POST["costo"] !== "" && $_POST["precio"] !== "" && $_POST["stock"] !== "") {
      //Sigo con la inserción
      $nombre = $_POST["nombre"];
      $costo = $_POST["costo"];
      $precio = $_POST["precio"];
      $stock = $_POST["stock"];


      $query = "INSERT into productos (nombre, costo, precio_venta, stock) 
      values ('$nombre', '$costo', '$precio','$stock')";
      $id = insertar(["localhost", "root", "admin", "tiendita"], $query);

      if ($id !=0) {
        echo "<h1>Exito. Registro insertado correctamente</h1>";
        echo "<a href='inicio_insertar.php'>Regresar</a>";
      } else {
        echo "<h1>Error. Contacta con el admon</h1>";
        echo "<a href='inicio_insertar.php'>Regresar</a>";
      }

    } else {
      echo "<h1>Error en la consistencia de datos</h1>";
      echo "<a href='inicio_insertar.php'>Regresar</a>";
    }
?>
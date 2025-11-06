<?php
    include "mysqlaux.php";

    if (!empty($_POST["id_producto"])) {
      //eliminamos
      $id_prod = $_POST["id_producto"];



      $query = "DELETE from productos where id_producto=$id_prod";
      $id = eliminar(["localhost", "root", "admin", "tiendita"], $query);

      if ($id ==true) {
        echo "<h1>Exito. Registro eliminado correctamente</h1>";
        echo "<a href='inicio_eliminar.php'>Regresar</a>";
      } else {
        echo "<h1>Error. Contacta con el admon</h1>";
        echo "<a href='inicio_eliminar.php'>Regresar</a>";
      }

    } else {
      echo "<h1>Error en la consistencia de datos</h1>";
      echo "<a href='inicio_eliminar.php'>Regresar</a>";
    }
?>
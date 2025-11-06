<?php
    include "mysqlaux.php";
    $creds = ["localhost", "root", "admin", "tiendita"];

    

    if (!empty($_POST["id_producto"])) {
      //recuperamos el registro completo
      $idprod = $_POST["id_producto"];
      $query = "SELECT * from productos where id_producto = '$idprod'";

      $datos = seleccionar($creds, $query);
       if(empty($_POST["nombre"])){
        $new_nombre = $datos[0][1];
       } else {
        $new_nombre = $_POST["nombre"];
       }

        if($_POST["costo"] == ""){
        $new_costo = $datos[0][2];
       } else {
        $new_costo = $_POST["costo"];
       }

       if($_POST["precio"] == ""){
        $new_precio = $datos[0][3];
       } else {
        $new_precio = $_POST["precio"];
       }

        if($_POST["stock"] == ""){
        $new_stock = $datos[0][4];
       } else {
        $new_stock = $_POST["stock"];
       }



      $query = "UPDATE productos set nombre = '$new_nombre', costo = '$new_costo', precio_venta = '$new_precio', stock= '$new_stock'
where id_producto = '$idprod';";
      $id = actualizar($creds, $query);

      if ($id ==true) {
        echo "<h1>Exito. Registro editado correctamente</h1>";
        echo "<a href='inicio_editar.php'>Regresar</a>";
      } else {
        echo "<h1>Error. Contacta con el admon</h1>";
        echo "<a href='inicio_editar.php'>Regresar</a>";
      }

    } else {
      echo "<h1>Error en la consistencia de datos</h1>";
      echo "<a href='inicio_insertar.php'>Regresar</a>";
    }
?>
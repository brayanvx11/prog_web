<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.php");
    exit();
}
// con las lineas anteriores va a entrar aqui solo si hay sesion
	include "mysqlaux.php";
	
	$datos = seleccionar(["localhost", "root", "admin", "tiendita"], "SELECT * FROM productos");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
        }

        #inventario {
            padding-right: 60px;
        }
                #baner {
          background-color: #B9BEA3;
          padding-top: 10px;
          padding-bottom: 10px;
        }
    </style>

  </head>
  <body>
    <div id="baner">
    <h1>Bienvenido <?php echo $_SESSION['usuario'] ?></h1>
    </div>
    <table>
      <tr>
        <td id="inventario">
    <h2>¿Que deseas hacer con tu inventario?</h2>
    <form method="get" action="redireccionar.php">
      <select name="opcion">
        <option value="agregar">Agregar</option>
        <option value="editar">Editar</option>
        <option value="eliminar">Eliminar</option>
      </select>
      <input type="submit" value="Seleccionar">
    
    </form>
    <h1>Productos existentes</h1>
    <table id="tablaProductos" class="table table-striped" style="width:100%">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
        <th>Costo</th>
				<th>Precio</th>
        <th>Stock</th>
			</tr>
		</thead>
		<tbody>
		  <?php foreach($datos as $dato):?>
			<tr>
				<td><?php echo $dato[0] ?></td>
				<td><?php echo $dato[1] ?></td>
				<td><?php echo $dato[2] ?></td>
				<td><?php echo $dato[3] ?></td>
        <td><?php echo $dato[4] ?></td>
			</tr>
		  <?php endforeach ?>
		</tbody>
    </table>
      </td>

      <td>

    <h1>Nuevo Registro</h1>
    <form action="nuevo.php" method="post">
      <label>Nombre</label>
      <input name="nombre"><br>
      <label>Costo</label>
      <input name="costo"><br>
      <label>Precio</label>
      <input name="precio"><br>
      <label>Stock</label>
      <input name="stock" type="number"><br>
      <input type="submit" value="Agregar articulo">

    </form>
    <a href="logout.php">Cerrar Sesión</a>
      </td>
      </tr>
      </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

    <script>
        $(document).ready(function() {
            new DataTable('#tablaProductos');
        });
    </script>
  </body>
</html>


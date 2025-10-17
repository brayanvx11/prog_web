<?php
$alumnos= ["Juan", "Tilin", "Adolfo", "Soobin", "Brayan", "Alejandra", "Eduardo", "Josue", "María", "Luis"];
$calificaciones = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "NP"];


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <style>
        table, th, td {
            border-collapse: collapse;
            border: 1px solid black;
        
        }
        table{
            margin-bottom: 15px;
        }
        tr:nth-child(odd) {
            background-color: rgba(220, 167, 201, 0.381);
        }
        th{
            background-color: rgba(211, 82, 244, 0.19);
        }
        td {
            font-family:Arial, Helvetica, sans-serif
        }
    </style>
</head>
<body>
    <h1>Mis alumnos</h1>
        <form method="POST" action="estadisticas.php">
            <table border>
                <tr>
                    <th>Nombre</th>
                    <th>Calificación</th>
                </tr>
                <?php foreach($alumnos as $alumno): ?>
                <tr>
                    <td>
                        <label><?php echo $alumno?></label></td>
                    <td>
                        <select name="cbo<?php echo $alumno ?>">
                            <?php foreach($calificaciones as $calif): ?>
                            <option><?php echo $calif?></option>
                            <?php endforeach ?>
                        </select>
                    </td>
                </tr>
                <?php endforeach ?>

            </table>
            <input type="submit"/>
        </form>
    
</body>
</html>



<?php
$calint_alum = [];
$np_alum=[];
$suma_cal =0;
$num_aprobados = 0;
$num_reprobados = 0;
$promedio=0.0;
$total_alum_con_cal_num=0;

foreach ($_REQUEST as $nom_alumno=>$cal_alumno) {
  if(is_numeric($cal_alumno)) {
    $suma_cal+=$cal_alumno;
    $calint_alum[str_replace("cbo", "",$nom_alumno)]=$cal_alumno;
    if ($cal_alumno>=6) {
      $num_aprobados++;
    } else {
      $num_reprobados++;
    }
  } else {
    $np_alum[str_replace("cbo", "",$nom_alumno)]=$cal_alumno;
  }
}
echo "<h2>Estadísticas</h2>";
echo "Las calificaciones recibidas son: <br/>";
echo "
<table style='border-collapse:collapse;'>
<tr>
<th style='border: 1px solid black;'>Alumno</th> <th style='border: 1px solid black;'>Calificación</th>
</tr>";
foreach($_REQUEST as $nom_alumno=>$cal_alumno) {
  echo "<tr>";
  echo "<td style='border: 1px solid black;'>". str_replace("cbo", "", $nom_alumno) . "</td>" . "<td style='border: 1px solid black; text-align: center;'>".$cal_alumno . "</td>";
  echo "</tr>";
}
echo "</table>";
echo "<hr/>";
$promedio = $suma_cal / count($calint_alum);
$total_alum_con_cal_num= $num_aprobados + $num_reprobados;

// num(aprobados_o_reprobados)(100)/ total de datos
echo "Hay " . $num_aprobados ." alumnos aprobado, representa el " . ($num_aprobados)*(100)/$total_alum_con_cal_num ."%<br/>";
echo "Hay " . $num_reprobados ." alumnos reprobados, representa el ". ($num_reprobados)*(100)/$total_alum_con_cal_num ."%<br/>";
echo "Hay " . count($np_alum) ." alumnos con np<br/><br/>";
echo "El aprovechamiento general es de " . $promedio . "<br/>";
$cal_min = min($calint_alum);
// si hay valores duplicados, para obtener todas esas llaves usamos array_keys($arrayAsociativo, $valorAbuscar);
// esto nos va a devolver otro array 
//$valorMaximo = max($array_con_cal);
//$clavesMaximas = array_keys($array_con_cal, $valorMaximo);
$llaves_cal_min=array_keys($calint_alum, $cal_min);
echo "Peor calificación: ". $cal_min . " y los alumnos que la tienen son: ";
foreach($llaves_cal_min as $clave) {
  echo $clave . ", ";
}
// se repite para la maxima
$cal_max = max($calint_alum);
$llaves_cal_max = array_keys($calint_alum, $cal_max); // aquí va a contener solo los nombres (llaves)
echo "<br/>Mejor calificación: " . $cal_max . " obtenida por: ";
foreach ($llaves_cal_max as $nombres_claves) {
  echo $nombres_claves .  ", ";;
}

echo "<br/><br/>" . "Alumnos en area de aprovechamiento (reprobados):<br/>";
echo "<ul>";
foreach($calint_alum as $nom_alumno=>$cal) {
  if ($cal<6) {
    echo "<li>".$nom_alumno."</li>";
  }
}
echo "</ul>";



?>





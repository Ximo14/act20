<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>


<?php

	include 'dbNBA.php';
  $nba = new dbNBA();

	if ((isset($_POST['local'])) || (isset($_POST['visitante'])) || (isset($_POST['temporada']))) {

?>

	<table border=1>
	<tr>
	  <th> EQUIPO LOCAL </th>
	  <th> PUNTOS LOCAL </th>
	  <th> EQUIPO VISITANTE </th>
	  <th> PUNTOS VISITANTE</th>
	  <th> TEMPORADA </th>
	</tr>

<?php

	//DEVUELVE EQUIPO LOCAL
	$partidos=$nba->devolverEquipos($_POST['local'],$_POST['visitante'],$_POST['temporada']);
	while($fila1=$partidos->fetch_assoc()) {

		echo "<tr>";
		echo "<td>".$fila1['equipo_local']." </td>";
		echo "<td>".$fila1['puntos_local']." </td>";
		echo "<td>".$fila1['equipo_visitante']." </td>";
		echo "<td>".$fila1['puntos_visitante']." </td>";
		echo "<td>".$fila1['temporada']." </td>";
		echo "</tr>";
	}
}
else {
	echo "No hay nada";
}
?>
  </body>
</html>

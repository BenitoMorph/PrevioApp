<?php
header('Content-Type: text/html; charset=UTF-8');

$conexion = new mysqli("localhost","root","root","previo_app");
$sql = "SELECT * FROM previos;";

if($result = $conexion->query($sql))
{
	$campos = $result->fetch_fields();

	echo "<table border='1'>";
	echo "<tr>";
	echo "<th></th>";
	echo "<th>#</th>
		<th>Referencia</th>
		<th>Cliente</th>
		<th>Contenedor</th>
		<th>Peso</th>
		<th>Bultos</th>
		<th>Marcas</th>
		<th>Series</th>
		<th>Nombre de Ejecutivo</th>
		<th>Nombre de Tramitador</th>
		<th>Operadora</th>
		<th>Observaciones</th>";

	echo "</tr>";

	while( $fila = $result->fetch_row() )
	{
		echo "<tr>";
	    for($x = 0; $x < count($campos); $x++)
	    {
	        echo "<td>".$fila[$x]."</td>";
	    }
	    echo "</tr>";
	}

	echo "</table>";
	$result->close();
}
?>
<?php

	$referencia = $_POST['referencia'];
	$cliente = $_POST['cliente'];
	$contenedor = $_POST['contenedor'];
	$peso = $_POST['peso'];
	$bultos = $_POST['bultos'];
	$marcas = $_POST['marcas'];
	$series = $_POST['series'];
	$nom_ejecutivo = $_POST['nom_ejecutivo'];
	$nom_tramitador = $_POST['nom_tramitador'];
	$operadora = $_POST['operadora'];
	$observaciones = $_POST['observaciones'];

require_once __DIR__ . '/connect.php';

	$db = new DB_CONNECT();

	$result = "UPDATE previos SET cliente='$cliente',contenedor='$contenedor',peso='$peso',bultos='$bultos',marcas='$marcas',series='$series',nom_ejecutivo='$nom_ejecutivo',nom_tramitador='$nom_tramitador',operadora='$operadora',observaciones='$observaciones' WHERE referencia='$referencia';";

	mysql_query($result);

header('Location: index.php');
exit();
?>
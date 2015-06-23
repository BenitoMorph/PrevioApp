<?php 
require_once __DIR__ . '/connect.php';

$db = new DB_CONNECT();

$id = $_GET['id_previo'];

$consult = mysql_query("SELECT referencia FROM previos WHERE id_previo='".$id."';");

	while($row = mysql_fetch_array($consult))
	{
		$referencia = $row['referencia'];

	}
	
	$carpeta="fotos/".$referencia;

	function borrardir($carpeta){
		foreach (glob($carpeta . "/*") as $elemento) {
			if (is_dir($elemento)) {
				borrardir($elemento);
			} else {
				unlink($elemento);
			}
		}
		rmdir($carpeta);
	}

	if (is_dir($carpeta)) {
		borrardir($carpeta);
	}

	$result = "DELETE FROM previos Where id_previo='".$id."';";
	mysql_query($result);
	$result2 = "DELETE FROM imagenes Where id_previo='".$id."';";
	mysql_query($result2);

header('Location: index.php');
?>
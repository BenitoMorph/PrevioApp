<?php
require_once('classes/ZIPclass/funciones.inc.php');
$folder_solicitado = $_GET['folder'];
$raiz              = 'fotos';
$nombre_archivo    = $folder_solicitado.'.zip';
$reemplazos = array("'","\"");

if ( !isset($_GET['folder']) )
{
	die('No se especific&oacute; un folder');	
}

$folder_solicitado = trim(str_replace($reemplazos, '', $folder_solicitado));
$folder_solicitado = strip_tags(stripslashes($folder_solicitado));


if( strlen($folder_solicitado) == 0 ){
	die('El folder no es v&aacute;lido');
}


$ruta_solicitada = $raiz . '/' . $folder_solicitado;
$ruta_resuelta = basename(realpath($ruta_solicitada));


if($folder_solicitado != $ruta_resuelta){	

	die('La ruta del folder no es v&aacute;lida');
}	


if(!is_dir($ruta_solicitada))
{
	die('El directorio solicitado no existe o no es un directorio v&aacute;lido');	

}	

genera_archivo_comprimido($raiz, $folder_solicitado, $nombre_archivo);
?>
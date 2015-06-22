<?php

function obtener_carpetas($raiz)
{
	$ignorados = array('.', '..');
	$carpetas = array();

	$directorio_archivos = opendir($raiz);

	if($directorio_archivos)
	{
		while(FALSE !== ($directorio = readdir($directorio_archivos)))
		{

			/* incluir directorios solamente, excluyendo 
				el directorio actual y el directorio padre */
				
			if( is_dir($raiz . '/' . $directorio) &&
				!in_array($directorio, $ignorados) )
			{
				
				$carpetas[] = $directorio;

			}

		}

		closedir($directorio_archivos);
	}


	return $carpetas;

}


function genera_archivo_comprimido($raiz, $folder, $nombre_zip)
{
	require_once('pclzip/pclzip.lib.php');

	$ruta_completa = $raiz . '/' . $folder;

	$ruta_zip    = 'fotos/' . $nombre_zip;
	$archivo_zip = new PclZip($ruta_zip);
	$comprimido  = $archivo_zip->Create($ruta_completa, PCLZIP_OPT_REMOVE_PATH, $raiz);

	if($comprimido == 0)
	{
		die('Ocurri&oacute; un error al generar el archivo comprimido');
	}

	// Forzar la descarga del archivo comprimido 
	
	$tam = filesize($ruta_zip);
	header('Content-type: application/zip');
	header('Content-Length: ' . $tam);
	header('Content-Disposition: attachment; filename='.($nombre_zip));
	readfile($ruta_zip);

	if (file_exists($ruta_zip) &&
		is_writable($ruta_zip))
	{
		unlink($ruta_zip);
	}

	exit;

}

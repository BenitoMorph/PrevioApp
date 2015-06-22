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

	/*$fh = new DateTime();
	$fh->setTimezone(new DateTimeZone('America/Mexico_City'));
	$horactual = $fh->format("H:i:s");
	$nuevafecha = $fh->format("d-m-Y");*/

	$result = mysql_query("INSERT INTO previos VALUES(NULL,'$referencia','$cliente','$contenedor','$peso','$bultos','$marcas','$series','$nom_ejecutivo','$nom_tramitador','$operadora','$observaciones')");

	$last = mysql_insert_id();

if(isset($_FILES['files'])){
    $errors= array();
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
		$file_name = $_FILES['files']['name'][$key];
		$file_tmp =$_FILES['files']['tmp_name'][$key];
        $ruta_image="fotos/".$referencia."/";
        $ruta_foto = $ruta_image.''.$file_name;
        
        if(empty($errors)==true){
            if(is_dir($ruta_image)==false){
                mkdir("$ruta_image", 0700);
            }
            if(is_dir("$ruta_image/".$file_name)==false){
                move_uploaded_file($file_tmp,"$ruta_image/".$file_name);
            }else{
                $new_dir="$ruta_image/".$file_name;	
            }
            $result2 = "INSERT INTO imagenes VALUES(NULL,'$last','$referencia','$file_name','$ruta_foto')";
            mysql_query($result2);
        }else{
            print_r($errors);
        }
   }
    
}
header('Location: index.php');
exit();
?>
<?php

	$realname=$_POST['realname'];
	$empresa=$_POST['empresa'];
	$mail=$_POST['nick'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];
	$tusuario=$_POST['tipo_user'];
	$status='Activo';
	$bloqueo=sha1($pass);

require_once __DIR__ . '/connect.php';

		    		$db = new DB_CONNECT();

	$checkemail=mysql_query("SELECT * FROM usuarios WHERE correo='$mail'");
	$check_mail=mysql_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
				// echo "<script>location.href='index.php'</script>";
			}else{
				
				mysql_query("INSERT INTO usuarios VALUES('','$realname','$empresa','$mail','$bloqueo','$tusuario','$status')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				echo "<script>location.href='index.php'</script>";
				mysql_close($link);
			}
			
		}else{
			echo ' <script language="javascript">alert("Las contraseñas son incorrectas");</script>';
			//echo "<script>location.href='index.php'</script>";
		}

	

<?php
require_once __DIR__ . '/connect.php';

    $db = new DB_CONNECT();

$correo = $_POST["correo"]; 
$password = $_POST["contrasena"];
 
$result = mysql_query("SELECT * FROM usuarios WHERE correo = '$correo'");

if($row = mysql_fetch_array($result)) {
     if($row["password"] == $password) {
		 if($row["tipo"] == 'Ejecutivo') {
             session_start();  
             $_SESSION['correo'] = $correo;
             $_SESSION['nombre'] = $row['nombre'];
			 $_SESSION['tipo'] = $row['tipo'];
             $_SESSION['id_usuario'] = $row['id_usuario'];
             sleep(2);
             header("Location: index.php");  
            }
		 else {
		     session_start();  
             $_SESSION['correo'] = $correo;
             $_SESSION['nombre'] = $row['nombre'];
			 $_SESSION['tipo'] = $row['tipo'];
             $_SESSION['id_usuario'] = $row['id_usuario'];
             //header("Location: profesor/index.php");
             ?>
             <script>
                 alert("No puedes ingresar a este sitio, \n Tu usuario no cuenta con los privilegios necesarios.");
                 location.href = "login.php";
             </script>
             <?php
		    }
        }
         else {
             ?>
             <script>
                 alert("Datos incorrectos.\nPor favor intentelo de nuevo.\nVerifique si la tecla Bloq Mayus esta activada");
                 location.href = "login.php";
             </script>
             <?php
        }
    }
     else {
         ?>
         <script>
             alert("Datos incorrectos.\nPor favor intentelo de nuevo.\nVerifique si la tecla Bloq Mayus esta activada");
             location.href = "login.php";
         </script>
         <?php 
        }

mysql_free_result($result); 
 
mysql_close();
?>
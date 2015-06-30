<?php
session_start();
if(isset($_SESSION['correo'])) {
     
     
     header('Location: index.php'); 
     exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PrevioApp</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/code.css"/>
    <script>
    </script>
</head>
<body>
    <section class="page-section">
        <div id="login">
            <div class="body"></div>
            <div class="grad"></div>

            <div class="container">
                <div class="header">
                    <div><img src="img/logotipo.png" alt="" width="200"></div>
                    <div>Previo<span>App</span></div>
                </div>

                <div class="login">
                    <form action="valida.php" method="post"> 
                        <input type="email" placeholder="Usuario" name="correo" required><br>
                        <input type="password" placeholder="Contraseña" name="contrasena" required><br>
                        <input type="submit" name="iniciar" value="Iniciar Sesión">
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
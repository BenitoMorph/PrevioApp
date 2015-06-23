<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PrevioApp</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/code.css"/>
</head>
<body>
<div class="desenfoque"></div>
<section class="page-section">
    <div class="container">
        <div class="row">
          <div><img src="img/logotipo.png" alt="" width="200"></div>
          <div>Previo<span>App</span></div>
            <div class="col-md-12 text-center">

                <form action="valida.php" method="POST" autocomplete="off">
                    <input type="email" name="correo" placeholder="Correo" required="">
                    <input type="password" name="contrasena" placeholder="Contraseña" required="">
                    <a href="mailto:a20120994@utem.edu.mx">¿Ha olvidado sus datos?</a>
                    <input type="submit" name="iniciar" value="Iniciar Sesión">
                </form>

            </div>
        </div>
    </section> 

    <section class="copyright">
         <div class="container">
          <div class="row">
            <div class="col-sm-12">          
               <div class="pull-left copyRights">Copyright &copy; 2015 | MorphDesign</div>
            </div>
          </div>
        </div>
    </section>

    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
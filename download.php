<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>PrevioApp</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/styles.css"/>

	<!--[if gte IE 8]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->	
</head>

<body>
<header class="header">
	<div class="container">
		<nav class="navbar navbar-inverse" role="navigation">
        	<div class="navbar-header">
	            <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
	            </button>
	            <a href="#" class="navbar-brand scroll-top logo"><img src="img/logo_opt.png" alt="PrevioApp"></a>
        	</div>
	        <div id="main-nav" class="collapse navbar-collapse">
	            <ul class="nav navbar-nav" id="mainNav">
		            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Inicio</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-search"></span>&nbsp;Busqueda</a></li>
					<li class="active"><a href="download.php"><span class="glyphicon glyphicon-cloud-download"></span>&nbsp;Descargar Fotos</a></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Cerrar Sesión</a></li>
	            </ul>
	        </div>
	    </nav>
	</div>
</header>
<br><br>
<div id="#top"></div>
<section class="page-section">
	<div class="container">
	    <div class="heading text-left">
			<h3>Descarga Fotografías</h3>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-2"></div>
	    	<div class="col-md-8 text-center">
				<ul id="search_list">
				<?php
					require_once('classes/ZIPclass/funciones.inc.php');
					
					$carpetas = obtener_carpetas('fotos');

					foreach ($carpetas as $carpeta) {
					echo  '<a href="download_zip.php?folder=' .  $carpeta .  '" class="btn btn-block btn-primary btn-default">&nbsp;&nbsp;' . $carpeta . '&nbsp;&nbsp;</a>';

					}
				?>
				</ul>
			</div>
			<div class="col-md-2"></div>
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

    <a href="#top" class="topHome"><i class="fa fa-chevron-up fa-2x"></i></a>

<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>    
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

</body>
</html>
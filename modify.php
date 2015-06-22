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
	<script language="javascript">
		function msg(){
		 return confirm("¿Deseas modificar este reporte?")
		}
	</script>	
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
		            <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Inicio</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-search"></span>&nbsp;Busqueda</a></li>
					<li><a href="download.php"><span class="glyphicon glyphicon-cloud-download"></span>&nbsp;Descargar Fotos</a></li>
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
			<h3>Modificar de Previo</h3>
		</div>
		<hr>
		<div class="row">
			<div class="col-md-2"></div>
	    	<div class="col-md-8 text-center">
			<?php
				require_once __DIR__ . '/connect.php';

	    		$db = new DB_CONNECT();

	    		$id = $_GET['id_previo'];

				$result=mysql_query("SELECT * FROM previos WHERE id_previo=".$id.";") or die (mysql_error());

				if (mysql_num_rows($result) > 0) {
					while($row = mysql_fetch_array($result)) {
			?>
			 <form action="update.php" method="POST">
            	<label for="cliente">Cliente:</label>
            	<input type="text" id="cliente" name="cliente" class="form-control" value="<?php echo $row['cliente']; ?>">

                <label for="referencia">Referencia:</label>
                <input type="text" id="referencia" name="referencia" class="form-control" readonly="readonly" value="<?php echo $row['referencia']; ?>">

                <label for="contenedor">Contenedor:</label> 
                <input type="text" id="contenedor" name="contenedor" class="form-control" value="<?php echo $row['contenedor']; ?>">
                      
                <label for="peso">Peso:</label> 
                <input type="text" id="peso" name="peso" class="form-control" value="<?php echo $row['peso']; ?>">
                     
                <label for="bultos">Bultos:</label> 
                <input type="text" id="bultos" name="bultos" class="form-control" value="<?php echo $row['bultos']; ?>">

                <label for="marcas">Marcas:</label> 
                <input type="text" id="marcas" name="marcas" class="form-control" value="<?php echo $row['marcas']; ?>">
                  
                <label for="series">Series:</label> 
                <input type="text" id="series" name="series" class="form-control" value="<?php echo $row['series']; ?>">

                <label for="nom_ejecutivo">Nombre de Ejecutivo:</label>
                <input type="text" id="nom_ejecutivo" name="nom_ejecutivo" class="form-control" value="<?php echo $row['nom_ejecutivo']; ?>">

                <label for="nom_tramitador">Nombre de Tramitador:</label> 
                <input type="text" id="nom_tramitador" name="nom_tramitador" class="form-control" value="<?php echo $row['nom_tramitador']; ?>">

                <label for="operadora">Operadora:</label> 
                <input type="text" id="operadora" name="operadora" class="form-control" value="<?php echo $row['operadora']; ?>">

                <label for="observaciones">Observaciones:</label> 
                <textarea id="observaciones" name="observaciones" class="form-control"><?php echo $row['observaciones']; ?></textarea>
				
				<br/><br/>
                <button type="submit" onclick="return msg()" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;&nbsp;GUARDAR</button>
            </form>
            <?php
				}
			}
			?>
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
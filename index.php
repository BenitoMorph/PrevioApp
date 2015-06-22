<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> 
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE10" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>PrevioApp</title>
	<link rel="stylesheet" type="text/css" href="css/lightbox.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/styles.css"/>

	<!--[if gte IE 8]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script language="javascript">
		function msg(){
		 return confirm("¿Deseas eliminar este reporte?\nSe perdera el registro total de este reporte.")
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
			<h3>Lista de Previos</h3>
		</div>
		<hr>
		<div class="row">
	    	<div class="col-md-12 text-center">
	            <div class="table-responsive">
					<!--<input name="busqueda" type="search" id="txtBuscar" class="light-table-filter" data-table="order-table" placeholder="Buscar" />-->
					<?php
					require_once __DIR__ . '/connect.php';

		    		$db = new DB_CONNECT();

					$result=mysql_query("SELECT * FROM previos;") or die (mysql_error());

					if (mysql_num_rows($result) > 0) {

						echo "<table class='table table-hover'>";
						echo "<thead>";

						echo "<tr>";
						// #636363
						echo "<th>Referencia</th>
							<th>Cliente</th>
							<th>Contenedor</th>
							<th>Peso</th>
							<th>Bultos</th>
							<th>Marcas</th>
							<th>Series</th>
							<th>Nombre de Ejecutivo</th>
							<th>Nombre de Tramitador</th>
							<th>Operadora</th>
							<th>Observaciones</th>
							<th>Fotografias</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>";
						echo "</tr>";
						echo "</thead>";
						echo "<tbody>";

						while($row = mysql_fetch_array($result))
						{

							$id = $row['id_previo'];

							echo "<tr>";
						    echo "<td>" . $row['referencia'] . "</td>";
						    echo "<td>" . $row['cliente'] . "</td>";
						    echo "<td>" . $row['contenedor'] . "</td>";
						    echo "<td>" . $row['peso'] . "</td>";
						    echo "<td>" . $row['bultos'] . "</td>";
						    echo "<td>" . $row['marcas'] . "</td>";
						    echo "<td>" . $row['series'] . "</td>";
						    echo "<td>" . $row['nom_ejecutivo'] . "</td>";
						    echo "<td>" . $row['nom_tramitador'] . "</td>";
						    echo "<td>" . $row['operadora'] . "</td>";
						    echo "<td><div style='height: 50px; width: 300px; overflow: auto; text-align: left;'>".$row['observaciones']."</div></td>";
						    echo "<td><div style='height: 50px; width: 250px; overflow: auto; text-align: center;'>";
						    	/*Codigo de las fotografias*/
								$queryfoto = mysql_query("SELECT categ_image,ruta FROM imagenes WHERE categ_image=".$row['id_previo']."") or die(mysql_error());
						    		
								if (mysql_num_rows($queryfoto) > 0) {
								?>
									<?php
									$i = 1;
									while(($row = mysql_fetch_array($queryfoto)) AND ($i <= (mysql_num_rows($queryfoto)))) {
								    ?>
									<a href="<?php echo $row['ruta']; ?>" data-lightbox="example-set<?php echo $row['categ_image']; ?>"><button class="btn"> <?php echo $i++; ?> </button></a>
									<?php
										}
									}
						    echo "</div></td>";
						    //echo "<td><a href= './generar_pdf.php?id=$id'>Ver Reporte</a></td>";
						    echo "<td><a href= './modify.php?id_previo=$id'><span class='glyphicon glyphicon-edit'></span> &nbsp;&nbsp;Modificar</button></a></td>";
						    echo "<td><a href= './delete.php?id_previo=$id' onclick='return msg()'><span class='glyphicon glyphicon-trash'></span> &nbsp;&nbsp;Eliminar</a></td>";
						    //<img src='./img/edit.png' width='29px' height='29px' alt='Editar'> 
						    echo "</tr>";
						}
						echo "</tbody>";
						echo "</table>";
					}
					else {
						echo "No se han registrado previos.";
					}
				?>
			</div>
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

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>    
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

</body>
</html>
<?php
session_start();
if(!isset($_SESSION['correo'])) {
     
	 
	 header('Location: login.php'); 
     exit();
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset='UTF-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' /> 
<meta name='viewport' content='width=device-width, initial-scale=1.0' />
<title>Reporte</title>
<link rel='stylesheet' type='text/css' href='css/style_pdf.css' />
</head>
<body>
<br><img src="img/logo.jpg" alt="" align="left">
<br>
<h2>REPORTE DE RECONOCIMIENTO<br>PREVIO MAR&Iacute;TIMO</h2>
<br><br><br>

<?php
	require_once __DIR__ . '/connect.php';

	$db = new DB_CONNECT();

	$id = $_GET['id'];

	$result=mysql_query('SELECT * FROM previo_maritimo WHERE id="'.$id.'";') or die (mysql_error());

	if (mysql_num_rows($result) > 0) {
		while($row = mysql_fetch_array($result))
		{
			$date1 = $row['fecha'];
			$fecha1 = date('d/m/Y',strtotime($date1));

		echo"<div align='center'>
			<table border='0' align='center'>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='2' height='20' style='border: none; text-align:right;height:15.0pt'><b>Cliente:</b></td>
			  <td colspan='4' class='campo'>" . $row['cliente'] . "</td>
			  <td style='border: none;'>&nbsp;</td>
			  <td colspan='3' height='20' style='border: none; text-align:right;height:15.0pt'><b>Referencia:</b></td>
			  <td colspan='4' class='campo'>" . $row['referencia'] . "</td>
			  <td colspan='4' style='border: none;'>&nbsp;</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='18' height='20' style='border: none; height:15.0pt'>&nbsp;</td>
			 </tr>
			 <tr height='25' style='height:18.75pt'>
			  <td colspan='18' height='25' style='height:18.75pt' class='titulos'>A. Datos generales del embarque.</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' height='20' style='height:15.0pt' class='campo' id='remark'>CR Almac&eacute;n:</td>
			  <td colspan='5' class='campo'>" . $row['cr_almacen'] . "</td>
			  <td colspan='3' class='campo' id='remark'>Fecha:</td>
			  <td colspan='7' class='campo'>" . $fecha1 . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' height='20' style='height:15.0pt' class='campo' id='remark'>Gu&iacute;a M&aacute;ster/BL:</td>
			  <td colspan='5' class='campo'>" . $row['gmaster_bl'] . "</td>
			  <td colspan='3' class='campo' id='remark'>Bultos:</td>
			  <td colspan='7' class='campo'>" . $row['bultos'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' height='20' style='height:15.0pt' class='campo' id='remark'>Factura(s):</td>
			  <td colspan='5' class='campo'>" . $row['factura'] . "</td>
			  <td colspan='3' class='campo' id='remark'>Tipo de previo:</td>
			  <td colspan='7' class='campo'>" . $row['tip_previo'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='18' height='20'  style='border: none; height:15.0pt'>&nbsp;</td>
			 </tr>
			 <tr height='25' style='height:18.75pt'>
			  <td colspan='18' height='25'  style='height:18.75pt' class='titulos'>B. Conteo.</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='2' height='20'  style='height:15.0pt' class='campo' id='remark'>Faltante:</td>
			  <td class='campo'>" . $row['faltantes'] . "</td>
			  <td colspan='3' class='campo' id='remark'>Observaciones:</td>
			  <td colspan='12' class='campo'>" . $row['obs_falantes'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='2' height='20' style='height:15.0pt' class='campo' id='remark'>Sobrante:</td>
			  <td class='campo'>" . $row['sobrantes'] . "</td>
			  <td colspan='3' class='campo' id='remark'>Observaciones:</td>
			  <td colspan='12' class='campo'>".$row['obs_sobrantes']."</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='2' height='20' style='height:15.0pt' class='campo' id='remark'>Aver&iacute;as:</td>
			  <td class='campo'>" . $row['averias'] . "</td>
			  <td colspan='4' class='campo' id='remark'>&iquest;Afecta al producto?</td>
			  <td colspan='1' class='campo'>" . $row['afec_product'] . "</td>
			  <td colspan='3' class='campo' id='remark'>Observaciones:</td>
			  <td colspan='7' class='campo'>" . $row['obs_afec'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' class='borde' id='remark'>Total de bultos:</td>
			  <td class='borde'>" . $row['tot_bultos'] . "</td>
			  <td colspan='3' class='borde' id='remark'>Cajas por bultos:</td>
			  <td class='borde'>" . $row['caja_bultos'] . "</td>
			  <td colspan='3' class='borde' id='remark'>Total de cajas:</td>
			  <td colspan='2' class='borde'>&nbsp;&nbsp;" . $row['tot_cajas'] . "&nbsp;&nbsp;</td>
			  <td colspan='3' class='borde' id='remark'>Piezas por caja:</td>
			  <td colspan='2' class='borde'>&nbsp;&nbsp;&nbsp;" . $row['pieza_cajas'] . "&nbsp;&nbsp;&nbsp;</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='18' height='20'  style='border: none; height:15.0pt'>&nbsp;</td>
			 </tr>
			 <tr height='25' style='height:18.75pt'>
			  <td colspan='18' height='20' style='height:18.75pt' class='titulos'>C. &iquest;Cumple con NOMS?</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' class='campo' id='remark'>Etiquetado:</td>
			  <td colspan='2' class='campo'>" . $row['etiquetado'] . "</td>
			  <td colspan='4' class='campo' id='remark'>NOM que cumple:</td>
			  <td colspan='9' class='campo'>" . $row['nom_etiquetado'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' class='campo' id='remark'>&iquest;Es madera ?</td>
			  <td colspan='3' class='campo'>" . $row['madera'] . "</td>
			  <td colspan='8' class='borde' id='remark'>Madera certificada de acuerdo a NOM-144:</td>
			  <td colspan='4' class='borde'>" . $row['madera_cert'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' class='campo' id='remark'>&iquest;Qu&eacute; tipo de madera es?</td>
			  <td colspan='3' class='campo'>" . $row['tip_madera'] . "</td>
			  <td></td>
			  <td colspan='6' class='campo' id='remark'>&iquest;Coincide contra documentos?</td>
			  <td colspan='5' class='campo'>" . $row['origenes'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td></td>
			  <td colspan='3' height='20' style='height:15.0pt' class='campo' id='remark'>Pais(es) de Origen:</td>
			  <td colspan='3' class='campo'>" . $row['pais_origen'] . "</td>
			  <td colspan='7' class='campo' id='remark'>&iquest;Se revisaron datos de identificacion?</td>
			  <td colspan='4' class='campo'>" . $row['datos_identif'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='2' height='20' style='height:15.0pt' class='borde' id='remark'>Marca</td>
			  <td colspan='2' class='borde'>" . $row['marca'] . "</td>
			  <td colspan='3' class='borde' id='remark'>No. de serie:</td>
			  <td colspan='2' class='borde'>" . $row['n_serie'] . "</td>
			  <td class='borde' id='remark'>Lote</td>
			  <td colspan='3' class='borde'>" . $row['lote'] . "</td>
			  <td class='borde' id='remark'>Modelo</td>
			  <td colspan='4' class='borde'>" . $row['modelo'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='2' style='height:15.0pt'><b>Capacidad:</b></td>
			  <td class='borde' id='remark'>HP:</td>
			  <td class='borde'>" . $row['hp'] . "</td>
			  <td class='borde' id='remark'>PH:</td>
			  <td colspan='2' class='borde'>" . $row['ph'] . "</td>
			  <td class='borde' id='remark'>RPM:</td>
			  <td colspan='2' class='borde'>" . $row['rpm'] . "</td>
			  <td class='borde' id='remark'>HZ:</td>
			  <td colspan='2' class='borde'>&nbsp;&nbsp;&nbsp;" . $row['hz'] . "&nbsp;&nbsp;&nbsp;</td>
			  <td class='borde' id='remark'>VOLTS:</td>
			  <td colspan='4' class='borde'>" . $row['volts'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='18' height='20'  style='border: none; height:15.0pt'>&nbsp;</td>
			 </tr>
			 <tr height='25' style='height:18.75pt'>
			  <td colspan='18' height='20' style='height:18.75pt' class='titulos'>D. Mercancía.</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' height='20' style='height:15.0pt' id='remark'>Tipo de Mercancía</td>
			  <td colspan='15' class='titulos'>Condiciones generales</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='3' class='borde'>" . $row['mercancia'] . "</td>
			  <td colspan='2' class='borde' id='remark'>Dificil ident.</td>
			  <td colspan='2' class='borde'>" . $row['cg_identificac'] . "</td>
			  <td colspan='2' class='borde' id='remark'>Maltratado</td>
			  <td colspan='3' class='borde'>" . $row['cg_maltrato'] . "</td>
			  <td colspan='3' class='borde' id='remark'>Etiquetado</td>
			  <td colspan='3' class='borde'>" . $row['cg_etiquetado'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='5' height='40' style='height:15.0pt' class='borde' id='remark'>Fotografias de mercancía</td>
			  <td colspan='2' class='borde'>" . $row['fotografias'] . "</td>
			  <td colspan='3' class='borde' id='remark'>&iquest;Qu&eacute; Factura?</td>
			  <td colspan='5' class='borde'>" . $row['merc_factura'] . "</td>
			  <td colspan='3'></td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='5' height='40' style='height:15.0pt' class='borde' id='remark'>&iquest;Se identific&oacute; la mercancía?</td>
			  <td colspan='2' class='borde'>" . $row['merc_adecuado'] . "</td>
			  <td colspan='3' class='borde' id='remark'>&iquest;Qu&eacute; Partida?</td>
			  <td colspan='5' class='borde'>" . $row['merc_partida'] . "</td>
			  <td colspan='3'></td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='18' height='20' style='border: none; height:15.0pt'>&nbsp;</td>
			 </tr>
			 <tr height='25' style='height:18.75pt'>
			  <td colspan='18' height='25' style='height:18.75pt' class='titulos'>E. Contenedor / Sellos.</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='5' height='20' style='height:15.0pt' class='borde' id='remark'>No. Contenedor / tipo:</td>
			  <td colspan='4' class='borde'>" . $row['nconteo_tipo'] . "</td>
			  <td colspan='3' class='borde' id='remark'>Candado Final:</td>
			  <td colspan='6' class='borde'>" . $row['candado_final'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='5' height='20'  style='height:15.0pt' class='borde' id='remark'>Candado de Origen:</td>
			  <td colspan='4' class='borde'>" . $row['candado_origen'] . "</td>
			  <td colspan='3' class='borde' id='remark'>Verder / Rojo:</td>
			  <td colspan='6' class='borde'>" . $row['verde_rojo'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='18' height='20' style='border: none; height:15.0pt'>&nbsp;</td>
			 </tr>
			 <tr height='25' style='height:18.75pt'>
			  <td colspan='18' height='25' style='height:18.75pt' class='titulos'>F. Observaciones.</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='18' height='40' style='height:30.0pt' class='borde'>" . $row['observaciones'] . "</td>
			 </tr>
			 <tr height='25' style='height:15.0pt'>
			  <td colspan='18'height='40' style='border: none; height:15.0pt'>&nbsp;</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='4' rowspan='3' height='100' style='vertical-align:middle;text-align:center;height:75.0pt' class='titulos'>G. Realiz&oacute; previo.</td>
			  <td colspan='4' class='campo' id='remark'>Responsable:</td>
			  <td colspan='10' class='campo'>" . $row['responsable'] . "</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='4' height='20'  style='height:15.0pt' class='campo' id='remark'>Hora de inicio:</td>
			  <td colspan='10' class='campo'>" . $row['hora_inicio'] . " Hrs.</td>
			 </tr>
			 <tr height='20' style='height:15.0pt'>
			  <td colspan='4' height='20'  style='height:15.0pt' class='campo' id='remark'>Hora de Termino:</td>
			  <td colspan='10' class='campo'>" . $row['hora_final'] . " Hrs.</td>
			 </tr>
			 <tr height='20' style='page-break-before:always;height:15.0pt'>
			  <td height='20' style='border: 1 transparent; height:15.0pt'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			  <td style='border: 1 transparent'></td>
			 </tr>
			</table>
		</div>";
	}
}
?>
</body>

</html>

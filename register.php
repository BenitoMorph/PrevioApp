<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
  	<link rel="stylesheet" type="text/css" href="css/code2.css">
	<title>Registro</title>
    
  </head>

	<body>
		<div class="Ingreso">
		    <div class="body"></div>
			<div class="grad"></div>
			<div class="header">
				<div class="login">
					<div>Registro<br></div>
					<form method="POST" action="add.php">              
						<input type="text" required placeholder="Ingresa tu nombre..." name="realname"><br>
						<input type="text" required placeholder="Ingresa tu empresa..." name="empresa"><br>
						<input type="email" required placeholder="Ingresa tu email..." name="nick"><br>

						 <select required name="tipo_user">
							<option value="">Seleccione... </option>
							<option value="Tramitador">Tramitador</option>
							<option value="Ejecutivo">Ejecutivo</option>
						</select><br>

						<input minlength="6" type="password"required placeholder="Ingresa tu contraseña..." name="pass"><br>
						<input type="password"required placeholder="Repite tu contraseña..." name="rpass"><br>
						<input  class="btn btn-danger" type="submit" name="submit" value="Registrarse">
					</form>
				</div>
				<div class="logotipo">
					Previo<span>App</span><br>
					<img src="img/logotipo.png" alt="" width="200">
				</div>
			</div>
		</div>
	</body>
</html>
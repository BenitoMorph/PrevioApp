<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PrevioApp</title>
</head>
<body>
    <section class="container">
        <div class="login">
            <h1>Introduzca sus datos para iniciar sesión</h1>
            <form action="valida.php" method="POST" autocomplete="off">
                <p><input type="text" name="correo" value="" placeholder="Correo" autofocus required></p>
                <p><input type="password" name="contrasena" value="" placeholder="Contraseña" required></p>
                <p><a href="mailto:a20120994@utem.edu.mx">¿Ha olvidado sus datos?</a></p>
                <p class="submit"><input type="submit" name="iniciar" value="Iniciar Sesión"></p>
            </form>
        </div>
     </section>
</body>
</html>
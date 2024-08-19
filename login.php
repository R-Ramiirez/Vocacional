<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Inicio</title>
    <link rel="stylesheet" type="text/css" href="login6.css">
</head>

<body>
    <header class="header">
        <nav class="header__menu navbar navbar-expand-lg bg-opacity-10">
            <a class="header__menu__link" href="entrada.php">Salir</a>
        </nav>
    </header>
    <div class="container mt-4 pt-4" id="box">
        <form action="_functions.php" method="POST">
            
                <div class="abs-center">
                    <div id="login-row" class="row justify-content-center align-items-center">
                        <div id="login-column" class="col-md-6">
                            <div id="login-box" class="col-md-12">
                                <center>
                                    <div class="text-center">
                                        <img src="img/umag.jpeg" class="rounded-circle" alt="...">
                                    </div>
                                    <br>
                                    <h2 class="text-center">Iniciar Sesión</h2>
                                    <br>
                                    <div class="ingreso form-group">
                                        <h5 class="text-start">Usuario</h5>
                                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="ingreso form-group">
                                        <h5 class="text-start">Contraseña</h5>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        <input type="hidden" name="accion" value="acceso_user">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <input type="submit" class="btn btn-success" value="Ingresar" onclick="return verificarUsuario()">
                                    </div>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
        function verificarUsuario() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '_functions.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send('nombre=' + document.getElementById('nombre').value + '&password=' + document.getElementById('password').value + '&accion=acceso_user');

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var respuesta = JSON.parse(xhr.responseText);
                    if (respuesta.error) {
                        alert(respuesta.error);
                    } else if (respuesta.redirect) {
                        window.location.href = respuesta.redirect;
                    }
                }
            }
            return false; // Evitar que se envíe el formulario
        }
    </script>
</body>

</html>
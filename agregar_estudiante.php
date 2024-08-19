<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>

    <title>Inicio</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo16.css">
</head>

<body id="page-top">
    <header class="header">
        <nav class="header__menu navbar navbar-expand-lg bg-opacity-10">
            <a class="header__menu__link" href="login.php">Cerrar Sesion</a>
            <a class="header__menu__link" href="datos.php">Estudiantes</a>
        </nav>
    </header>
    <form action="validar.php" method="POST">
        <div id="login">
            <div class="container">
                <div class="row justify-content-center m-4">
                    <div class="col-md-8 transparent-box">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-12">
                                <div id="login-box" class="col-md-12">
                                    <h3 class="text-center mb-4 mt-4">Nuevo Estudiante</h3>
                                    <div class="form-group mb-3 w-75">
                                        <label for="nombre" class="form-label">Nombre completo *</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3 w-75">
                                        <label for="rut" class="form-label">Rut *</label><br>
                                        <input type="number" name="rut" id="rut" class="form-control" placeholder="Rut sin puntos ni Guion" required>
                                    </div>
                                    <div class="form-group mb-3 w-75">
                                        <label for="contacto" class="form-label">Contacto *</label>
                                        <input type="number" id="contacto" name="contacto" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3 w-75">
                                        <label for="nacimiento" class="form-label">Fecha de nacimiento *</label>
                                        <input type="date" id="nacimiento" name="nacimiento" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3 w-75">
                                        <label for="colegio" class="form-label">Colegio *</label>
                                        <input type="text" id="colegio" name="colegio" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-3 w-75">
                                        <label for="curso" class="form-label">Curso *</label>
                                        <input type="text" id="curso" name="curso" class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="form-group text-center mb-3">
                                        <button type="submit" value="Guardar" class="btn btn-success" name="reg_estudiante">Enviar</button>
                                        <a href="datos.php" class="btn btn-danger">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

</html>
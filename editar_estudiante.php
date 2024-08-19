<?php

include("conexion.php");

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" type="text/css" href="estilo16.css">
</head>

<body>
    <header class="header">
        <nav class="header__menu navbar navbar-expand-lg bg-opacity-10">
            <a class="header__menu__link" href="porcentajes.php">Datos</a>
            <a class="header__menu__link" href="datos.php">Estudiantes</a>
            <a class="header__menu__link" href="index.php">Salir</a>
        </nav>
    </header>

    <form action="_functions.php" method="POST">
        <div id="login">
            <div class="container">
                <div class="row justify-content-center m-4">
                    <div class="col-md-8 transparent-box">
                        <div id="login-row" class="row justify-content-center align-items-center">
                            <div id="login-column" class="col-md-12">
                                <div id="login-box" class="col-md-12">
                                    <h3 class="text-center mb-4 mt-4">Editar los Datos del Estudiante</h3>
                                    <?php
                                    // Captura el id seleccionado.
                                    $rut = $_GET['rut']; //Rut pasado con metodo get
                                    $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                                    $query = "SELECT * FROM estudiantes WHERE rut = '$rut'";
                                    $result = mysqli_query($conex, $query);

                                    // Verificamos si hay resultados
                                    if ($result->num_rows > 0) {
                                        $result = $result->fetch_assoc();
                                    ?>
                                        <div class="form-group mb-3 w-75">
                                            <label for="nombre" class="form-label">Nombre completo *</label>
                                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $result['nombre']; ?>" required>
                                        </div>
                                        <div class="form-group mb-3 w-75">
                                            <label for="rut" class="form-label">Rut *</label><br>
                                            <label class="form-control"><?php echo $result['rut']; ?></label>
                                        </div>
                                        <div class="form-group mb-3 w-75">
                                            <label for="contacto" class="form-label">Contacto *</label>
                                            <input type="number" id="contacto" name="contacto" class="form-control" value="<?php echo $result['contacto']; ?>" required>
                                        </div>
                                        <div class="form-group mb-3 w-75">
                                            <label for="nacimiento" class="form-label">Fecha de nacimiento *</label>
                                            <input type="date" id="nacimiento" name="nacimiento" class="form-control" value="<?php echo $result['nacimiento']; ?>" required>
                                        </div>
                                        <div class="form-group mb-3 w-75">
                                            <label for="colegio" class="form-label">Colegio *</label>
                                            <input type="text" id="colegio" name="colegio" class="form-control" value="<?php echo $result['colegio']; ?>" required>
                                        </div>
                                        <div class="form-group mb-3 w-75">
                                            <label for="curso" class="form-label">Curso *</label>
                                            <input type="text" id="curso" name="curso" class="form-control" value="<?php echo $result['curso']; ?>" required>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <hr>
                                    <div class="form-group">
                                        <input type="hidden" name="accion" value="editar_estudiantes">
                                        <input type="hidden" name="rut" value="<?php echo $rut; ?>">
                                    </div>
                                    <div class="form-group text-center mb-3">
                                        <button type="submit" class="btn btn-success">Editar</button>
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
    <script src="../js/nav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
<?php

include("conexion.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Perfil Estudiante</title>
    <link rel="stylesheet" type="text/css" href="estilo16.css">
</head>

<body>
    <header class="header">
        <nav class="header__menu navbar navbar-expand-lg bg-opacity-10">
            <a class="header__menu__link" href="login.php">Cerrar Sesion</a>
            <a class="header__menu__link" href="datos.php">Estudiantes</a>
            <a class="header__menu__link" href="actualizar.php">Agregar Datos</a>
            <a class="header__menu__link" href="porcentajes.php">Datos</a>
        </nav>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="display-4 text-center mb-3 mt-4">Test de Intereses Vocacionales</h1>

            <?php
            $rut = $_GET['rut']; //Rut pasado con metodo get
            $conn = mysqli_connect("$servername", "$username", "$password", "$database");
            $query = "SELECT * FROM test WHERE rut = '$rut'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 0) { // si no hay datos para el usuario con el RUT $rut
            ?>
                <div class="text-end">
                    <a class="btn btn-warning" href="registro_test.php?rut=<?php echo $rut ?>">Nuevo Test
                        <i class="fa fa-edit"></i></a>
                </div>
            <?php
            }
            ?>
            <?php

            // Capturamos el RUT ingresado
            $rut = $_GET['rut'];

            // Realizamos la consulta a la base de datos
            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
            $consulta = "SELECT * FROM estudiantes WHERE rut = $rut";
            $result = mysqli_query($conex, $consulta);

            // Verificamos si hay resultados
            if ($result->num_rows > 0) {
                $resultado = $result->fetch_assoc();
            ?>
                <div class="row g-3" id="vista">
                    <h4 class="text-start">Datos del estudiante</h4>
                    <div class="col">
                        <label for="nombre" class="form-label">Nombre Del Estudiante: </label>
                        <label class="form-control"><?php echo $resultado['nombre']; ?></label>
                    </div>
                    <div class="col">
                        <label for="rut" class="form-label col-md-3">Rut: </label>
                        <label class="form-control"><?php echo $resultado['rut']; ?></label>
                    </div>
                    <div class="col">
                        <label for="nacimiento" class="form-label">Fecha de Nacimiento: </label>
                        <label class="form-control"><?php echo date('d-m-Y', strtotime($resultado['nacimiento'])); ?></label>
                    </div>
                    <p>
                    <div class="col">
                        <label for="colegio" class="form-label">Establecimiento Educacional: </label>
                        <label class="form-control"><?php echo $resultado['colegio']; ?></label>
                    </div>
                    <div class="col">
                        <label for="curso" class="form-label">Curso: </label>
                        <label class="form-control"><?php echo $resultado['curso']; ?></label>
                    </div>
                    <div class="col">
                        <label for="contacto" class="form-label">Contacto: </label>
                        <label class="form-control"><?php echo $resultado['contacto']; ?></label>
                    </div>
                    <br>
                </div>
            <?php
            } else {
                echo "No se encontró ningún registro con el RUT ingresado";
            }
            ?>
        </div>
        <br>
        <hr>
        <br>
        <?php
        $rut = $_GET['rut']; //Rut pasado con metodo get
        $conn = mysqli_connect("$servername", "$username", "$password", "$database");

        $query = "SELECT * FROM resultados WHERE rut = '$rut'";
        $result2 = mysqli_query($conn, $query);

        // Verificamos si hay resultados
        if ($result2->num_rows > 0) {
            $resultado2 = $result2->fetch_assoc();
        ?>
            <h4 class="text-start">Puntajes en el Test Vocacional</h4>
            <br>
            <div class="row g-3" id="vista">
                <div class="col">
                    <label for="exterior" class="form-label">Exterior: </label>
                    <label class="form-control"><?php echo $resultado2['exterior']; ?></label>
                </div>
                <div class="col">
                    <label for="mecanica" class="form-label col-md-3">Mecanica: </label>
                    <label class="form-control"><?php echo $resultado2['mecanica']; ?></label>
                </div>
                <div class="col">
                    <label for="calculo" class="form-label">Calculo: </label>
                    <label class="form-control"><?php echo $resultado2['calculo']; ?></label>
                </div>
                <div class="col">
                    <label for="cientifica" class="form-label">Cientifica: </label>
                    <label class="form-control"><?php echo $resultado2['cientifica']; ?></label>
                </div>
                <div class="col">
                    <label for="persuasiva" class="form-label col-md-3">Persuasiva: </label>
                    <label class="form-control"><?php echo $resultado2['persuasiva']; ?></label>
                </div>
                <div class="col">
                    <label for="artistica" class="form-label">Artistica: </label>
                    <label class="form-control"><?php echo $resultado2['artistica']; ?></label>
                </div>
                <div class="col">
                    <label for="literaria" class="form-label">Literaria: </label>
                    <label class="form-control"><?php echo $resultado2['literaria']; ?></label>
                </div>
                <div class="col">
                    <label for="musical" class="form-label col-md-3">Musical: </label>
                    <label class="form-control"><?php echo $resultado2['musical']; ?></label>
                </div>
                <div class="col">
                    <label for="social" class="form-label">Servicio Social: </label>
                    <label class="form-control"><?php echo $resultado2['social']; ?></label>
                </div>
                <div class="col">
                    <label for="oficina" class="form-label">Oficina: </label>
                    <label class="form-control"><?php echo $resultado2['oficina']; ?></label>
                </div>

                <br>
            </div>
            <br>
            <hr>
            <br>
            <div>

            </div>
    </div>
    <div class="text-center mb-5">
        <input type="hidden" name="rut" id="rut" value="<?php echo $resultado['rut']; ?>">
        <a class="btn btn-success" target="_blank" href="./pdf/pdf.php?rut=<?php echo $resultado['rut']; ?>">Sacar Datos</a>
    </div>
<?php
        }
?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
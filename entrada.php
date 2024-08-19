<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Entrada</title>
    <link rel="stylesheet" type="text/css" href="estilo16.css">
</head>

<body>
    <?php
    include("conexion.php");
    ?>
    <div class="container mt-5 pt-5">
        <div class="container mt-4 pt-4" id="box">
            <div class="abs-center">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <div class="text-center">
                                <img src="img/umag.jpeg" class="rounded-circle" alt="...">
                            </div>
                            <br>
                            <h2 class="text-center">Selecciona una opcion:</h2>
                            <br>
                            <center>
                                <div class="form-group">
                                    <a class="btn btn-success w-50" href="index.php">Resultados por Rut</a>
                                </div>
                                <br>
                                <div>
                                    <a class="btn btn-success w-50" href="login.php">Entrada Institucional</a>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script src="../js/buscador.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
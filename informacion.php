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
    <title>Perfil Estudiante</title>
    <link rel="stylesheet" type="text/css" href="estilo16.css">
</head>

<body>
    <header class="header">
        <nav class="header__menu navbar navbar-expand-lg bg-opacity-10">
            <a class="header__menu__link" href="porcentajes.php">Datos</a>
            <a class="header__menu__link" href="index.php">Salir</a>
        </nav>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <hr>
            <h1 class="display-4 text-center mb-3 mt-4">Test de Intereses Vocacionales</h1>
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
                        <label for="colegio" class="form-label">Establecimiento Educacional: </label>
                        <label class="form-control"><?php echo $resultado['colegio']; ?></label>
                    </div>
                    <div class="col">
                        <label for="colegio" class="form-label">Curso: </label>
                        <label class="form-control"><?php echo $resultado['curso']; ?></label>
                    </div>
                    <p>
                        <hr>
                        <br>
                </div>
            <?php
            } else {
            ?>
                <div class="text-center">
                    <h1>No Existen datos del Estudiante</h1>
                </div>
            <?php
            }
            ?>
        </div>

        <?php
        $rut = $_GET['rut']; //Rut pasado con metodo get
        $conn = mysqli_connect("$servername", "$username", "$password", "$database");
        $query = "SELECT * FROM test WHERE rut = '$rut'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 0) { // si no hay datos para el usuario con el RUT $rut
        ?>
            <div class="text-center">
                <h1>Contactate para llenar el formulario</h1>
            </div>
        <?php
        }
        ?>

        <?php
        $rut = $_GET['rut']; //Rut pasado con metodo get
        $conn = mysqli_connect("$servername", "$username", "$password", "$database");

        $query = "SELECT * FROM resultados WHERE rut = '$rut'";
        $result2 = mysqli_query($conn, $query);

        // Verificamos si hay resultados
        if ($result2->num_rows > 0) {
            $resultado2 = $result2->fetch_assoc();
        ?>
            <br>
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
            <h4 class="text-start">Mayores Areas de Interes Identificadas</h4>
            <br>
            <br>
            <?php

            if ($resultado2['exterior'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM exterior";
                $result4 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result4->num_rows > 0) {
                    $resultado4 = $result4->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Exterior:</h5>
                        <div class="col">
                            <label for="exterior" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado4['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="exterior" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado4['carreras']; ?></label>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                <?php
                }
                ?>
            <?php
            }
            if ($resultado2['mecanica'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM mecanica";
                $result5 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result5->num_rows > 0) {
                    $resultado5 = $result5->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Mecanica:</h5>
                        <div class="col">
                            <label for="exterior" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado5['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="exterior" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100 texto-justificado"><?php echo $resultado5['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            }
            if ($resultado2['calculo'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM calculo";
                $result6 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result6->num_rows > 0) {
                    $resultado6 = $result6->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Calculo:</h5>
                        <div class="col">
                            <label for="exterior" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado6['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="exterior" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado6['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            }
            if ($resultado2['cientifica'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM cientifica";
                $result6 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result6->num_rows > 0) {
                    $resultado6 = $result6->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Cientifica:</h5>
                        <div class="col">
                            <label for="cientifica" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado6['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="cientifica" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado6['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            }
            if ($resultado2['persuasiva'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM persuasiva";
                $result7 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result7->num_rows > 0) {
                    $resultado7 = $result7->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Persuasiva:</h5>
                        <div class="col">
                            <label for="persuasiva" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado7['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="persuasiva" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado7['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            }
            if ($resultado2['artistica'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM artistica";
                $result8 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result8->num_rows > 0) {
                    $resultado8 = $result8->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Artistica:</h5>
                        <div class="col">
                            <label for="artistica" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado8['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="artistica" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado8['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            }
            if ($resultado2['literaria'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM literaria";
                $result9 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result9->num_rows > 0) {
                    $resultado9 = $result9->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Literaria:</h5>
                        <div class="col">
                            <label for="literaria" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado9['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="literaria" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado9['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            }
            if ($resultado2['musical'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM musical";
                $result10 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result10->num_rows > 0) {
                    $resultado10 = $result10->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Musical:</h5>
                        <div class="col">
                            <label for="musical" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado10['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="musical" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado10['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            }
            if ($resultado2['social'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM social";
                $result11 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result11->num_rows > 0) {
                    $resultado11 = $result11->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Servicio Social:</h5>
                        <div class="col">
                            <label for="social" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado11['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="social" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado11['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            }
            if ($resultado2['oficina'] >= 7) {
            ?>
                <?php

                // Realizamos la consulta a la base de datos
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $consulta = "SELECT * FROM oficina";
                $result12 = mysqli_query($conex, $consulta);

                // Verificamos si hay resultados
                if ($result12->num_rows > 0) {
                    $resultado12 = $result12->fetch_assoc();
                ?>
                    <div class="row g-3" id="vista">
                        <h5>Oficina:</h5>
                        <div class="col">
                            <label for="oficina" class="form-label">Descripcion de esta Area:</label>
                            <label class="form-control w-100 h-100"><?php echo $resultado12['descripcion']; ?></label>
                        </div>
                        <div class="col">
                            <label for="oficina" class="form-label">Carreras de Interes: </label>
                            <label class="form-control w-100 h-100"><?php echo $resultado12['carreras']; ?></label>
                        </div>
                    </div>
                <?php
                }
                ?>
                <br>
                <hr>
                <br>
            <?php
            } else {
            ?>
                <div class="row g-3" id="vista">
                    <div class=" text-center">
                        <h5>No encontramos areas con un alto puntaje de interes</h5>
                        <br>
                        <label for="texto" class="form-label w-75">Esto quiere decir que tu interes esta distribuido en varias areas por igual, por lo cual eres una persona con un gusto general y no te quedas solo en un area especifica sino que vas mas alla.</label>
                    </div>
                    <hr>
                    <div>
                        <h5>Estas son tus areas con mejor puntaje</h5>
                        <br>
                        <?php
                        if ($resultado2['exterior'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM exterior";
                            $result4 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result4->num_rows > 0) {
                                $resultado4 = $result4->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Exterior:</h5>
                                    <div class="col">
                                        <label for="exterior" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado4['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="exterior" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado4['carreras']; ?></label>
                                    </div>
                                </div>
                                <br>
                                <hr>
                                <br>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['mecanica'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM mecanica";
                            $result5 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result5->num_rows > 0) {
                                $resultado5 = $result5->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Mecanica:</h5>
                                    <div class="col">
                                        <label for="exterior" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado5['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="exterior" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado5['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        if ($resultado2['calculo'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM calculo";
                            $result6 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result6->num_rows > 0) {
                                $resultado6 = $result6->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Calculo:</h5>
                                    <div class="col">
                                        <label for="exterior" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado6['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="exterior" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado6['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        if ($resultado2['cientifica'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM cientifica";
                            $result6 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result6->num_rows > 0) {
                                $resultado6 = $result6->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Cientifica:</h5>
                                    <div class="col">
                                        <label for="cientifica" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado6['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="cientifica" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado6['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        if ($resultado2['persuasiva'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM persuasiva";
                            $result7 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result7->num_rows > 0) {
                                $resultado7 = $result7->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Persuasiva:</h5>
                                    <div class="col">
                                        <label for="persuasiva" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado7['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="persuasiva" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado7['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        if ($resultado2['artistica'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM artistica";
                            $result8 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result8->num_rows > 0) {
                                $resultado8 = $result8->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Artistica:</h5>
                                    <div class="col">
                                        <label for="artistica" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado8['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="artistica" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado8['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        if ($resultado2['literaria'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM literaria";
                            $result9 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result9->num_rows > 0) {
                                $resultado9 = $result9->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Literaria:</h5>
                                    <div class="col">
                                        <label for="literaria" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado9['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="literaria" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado9['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        if ($resultado2['musical'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM musical";
                            $result10 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result10->num_rows > 0) {
                                $resultado10 = $result10->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Musical:</h5>
                                    <div class="col">
                                        <label for="musical" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado10['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="musical" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado10['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        if ($resultado2['social'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM social";
                            $result11 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result11->num_rows > 0) {
                                $resultado11 = $result11->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Servicio Social:</h5>
                                    <div class="col">
                                        <label for="social" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado11['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="social" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado11['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        if ($resultado2['oficina'] == 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM oficina";
                            $result12 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result12->num_rows > 0) {
                                $resultado12 = $result12->fetch_assoc();
                            ?>
                                <div class="row g-3" id="vista">
                                    <h5>Oficina:</h5>
                                    <div class="col">
                                        <label for="oficina" class="form-label">Descripcion de esta Area:</label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado12['descripcion']; ?></label>
                                    </div>
                                    <div class="col">
                                        <label for="oficina" class="form-label">Carreras de Interes: </label>
                                        <label class="form-control w-100 h-100"><?php echo $resultado12['carreras']; ?></label>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                            <br>
                            <hr>
                            <br>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
            }
            ?>
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
<?php
include("conexion.php");
include("_functions.php");

// Procesamiento de eliminación
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rut'])) {
    $rut_eliminar = $_POST['rut'];
    $resultado = eliminar_estudiante($rut_eliminar);

    if ($resultado === true) {
        // Redirigir a la misma página para refrescar la tabla
        header("Location: datos.php?eliminado=1");
        exit();
    } else {
        $error_mensaje = $resultado;
    }
}

// Mostrar mensaje de éxito
if (isset($_GET['eliminado']) && $_GET['eliminado'] == 1) {
    $mensaje_exito = "Estudiante eliminado correctamente";
}
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
            <div class="col-md-10">
                <h1 class="display-4 text-center mb-3 mt-4">Datos de Pruebas de Estudiantes</h1>
                <hr class="bg-info">

                <?php if (isset($mensaje_exito)): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $mensaje_exito; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if (isset($error_mensaje)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $error_mensaje; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <p class="text-danger small pt-0 mt-0 mx-4">*Datos con proteccion sobre divulgacion.</p>
                <?php
                $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                $where = "";

                if (isset($_GET['enviar'])) {
                    $busqueda = $_GET['busqueda'];

                    if (isset($_GET['busqueda'])) {
                        $where = "WHERE estudiantes.RUT LIKE'%" . $busqueda . "%' OR nombre  LIKE'%" . $busqueda . "%'
                        OR carrera  LIKE'%" . $busqueda . "%' OR cohorte  LIKE'%" . $busqueda . "%'";
                    }
                }
                ?>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between align-items-center mx-4">
                            <input class="form-control me-2 light-table-filter w-75" data-table="table_id" type="text" placeholder="Buscador de estudiantes">
                            <a class="btn btn-success mx-2" href="agregar_estudiante.php">
                                Agregar <i class="fa fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <br>
                <table class="table_id table-larger-font">
                    <tr>
                        <th class="col-1 text-center">RUT</th>
                        <th class="col-3">NOMBRE</th>
                        <th class="col-1 text-center">CONTACTO</th>
                        <th class="col-1 text-center">FECHA DE NACIMIENTO</th>
                        <th class="col-2">COLEGIO</th>
                        <th class="col-1 text-center">CURSO</th>
                        <th class="col-1 text-center">ESTADO DEL TEST</th>
                        <th class="col-1 text-center">EDITAR</th>
                        <th class="col-1 text-center">VER</th>
                        <th class="col-1 text-center">ELIMINAR</th>
                    </tr>
                    <?php
                    $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                    $SQL = "SELECT * FROM estudiantes";
                    $dato = mysqli_query($conex, $SQL);

                    if ($dato->num_rows >= 1) {
                        while ($fila = mysqli_fetch_array($dato)) {
                            $rut_estudiante = $fila['rut'];
                    ?>
                            <tr class="data-row">
                                <td class="text-center"><?php echo $rut_estudiante; ?></td>
                                <td><?php echo $fila['nombre']; ?></td>
                                <td class="text-center"><?php echo $fila['contacto']; ?></td>
                                <td class="text-center"><?php echo date('d-m-Y', strtotime($fila['nacimiento'])); ?></td>
                                <td><?php echo $fila['colegio']; ?></td>
                                <td class="text-center"><?php echo $fila['curso']; ?></td>
                                <?php
                                // Verificar si el estudiante ha realizado el test
                                $query = "SELECT * FROM test WHERE rut = '$rut_estudiante'";
                                $result = mysqli_query($conex, $query);

                                if (mysqli_num_rows($result) > 0) {
                                    echo "<td class='text-center'>Realizado</td>";
                                } else {
                                    echo "<td class='text-center'>Sin Realizar</td>";
                                }
                                ?>
                                <td class="text-center">
                                    <a class="btn btn-warning" href="editar_estudiante.php?rut=<?php echo $rut_estudiante ?>"><i class="fa-solid fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-success" href="vistaUsuario.php?rut=<?php echo $rut_estudiante ?>"><i class="fa-solid fa-eye"></i></a>
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-rut="<?php echo $rut_estudiante; ?>">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr class="text-center">
                            <td colspan="16">No existen registros</td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <hr>
                <br>
                <div class="col text-center">
                    <!--Generamos el documento PDF en otra pagina-->
                    <a class="btn btn-success disabled" target="_blank" href="../pdf/pdf.php">Sacar Datos</a>
                </div>
            </div>
        </div>
        <br>
        <hr>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Eliminar Estudiante</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este estudiante?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <form id="deleteForm" method="POST" action="datos.php">
                        <input type="hidden" name="rut" id="rutToDelete">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var rut = button.getAttribute('data-rut');
                var rutInput = document.getElementById('rutToDelete');
                rutInput.value = rut;
            });
        });
    </script>
    <script src="buscador.js"></script>
</body>

</html>
<?php

require_once("conexion.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros

        case 'editar_estudiantes':
            editar_estudiantes();
            break;

        case 'eliminar_estudiante';
            eliminar_estudiante($rut);
            break;

        case 'acceso_user';
            acceso_user();
            break;
    }
}

function editar_estudiantes()
{
    $conex = mysqli_connect("localhost", "root", "", "testvocacional");
    extract($_POST);
    $rut = $_POST['rut'];

    // Saneamiento de datos
    $nombre = mysqli_real_escape_string($conex, $nombre);
    $rut = mysqli_real_escape_string($conex, $rut);
    $contacto = mysqli_real_escape_string($conex, $contacto);
    $nacimiento = mysqli_real_escape_string($conex, $nacimiento);
    $colegio = mysqli_real_escape_string($conex, $colegio);
    $curso = mysqli_real_escape_string($conex, $curso);

    // Consulta preparada
    $consulta = "UPDATE estudiantes SET nombre = ?, rut = ?, contacto = ?, nacimiento = ?, colegio = ?, curso = ? WHERE rut = ?";

    $stmt = mysqli_prepare($conex, $consulta);
    mysqli_stmt_bind_param($stmt, "sssssss", $nombre, $rut, $contacto, $nacimiento, $colegio, $curso, $rut);
    mysqli_stmt_execute($stmt);

    header('Location: datos.php');
}

function eliminar_estudiante($rut) {
    global $conex;

    // Eliminar registros relacionados en la tabla resultados
    $sql_eliminar_resultados = "DELETE FROM resultados WHERE rut = '$rut'";
    mysqli_query($conex, $sql_eliminar_resultados);
    
    // Eliminar registros relacionados en la tabla test
    $sql_eliminar_test = "DELETE FROM test WHERE rut = '$rut'";
    mysqli_query($conex, $sql_eliminar_test);

    // Luego eliminar el estudiante
    $sql_eliminar = "DELETE FROM estudiantes WHERE rut = '$rut'";
    $resultado = mysqli_query($conex, $sql_eliminar);

    if ($resultado) {
        return true;
    } else {
        return "Error al eliminar: " . mysqli_error($conex);
    }
}

function acceso_user()
{
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conex = mysqli_connect("localhost", "root", "", "testvocacional");
    $consulta = "SELECT * FROM user WHERE nombre='$nombre'";
    $resultado = mysqli_query($conex, $consulta);
    $filas = mysqli_fetch_array($resultado);

    if (mysqli_num_rows($resultado) == 0) {
        echo json_encode(['error' => 'Usuario o contraseña incorrectos']);
    } else {
        if ($password != $filas['password']) {
            echo json_encode(['error' => 'Contraseña incorrecta']);
        } else {
            if ($filas['rol'] == 1) {
                echo json_encode(['redirect' => 'datos.php']);
            } else {
                echo json_encode(['redirect' => 'entrada.php']);
            }
        }
    }
    exit();
}

<?php

require_once("conexion.php");

if (isset($_POST['accion'])) {
    switch ($_POST['accion']) {
            //casos de registros

        case 'editar_estudiantes':
            editar_estudiantes();
            break;

        case 'eliminar_estudiante';
            eliminar_estudiante();
            break;

        case 'acceso_user';
            acceso_user();
            break;
    }
}

function editar_estudiantes()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
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
    mysqli_stmt_bind_param($stmt, "sssssi", $nombre, $rut, $contacto, $nacimiento, $colegio, $curso);
    mysqli_stmt_execute($stmt);

    header('Location: datos.php');
}

function eliminar_estudiante()
{
    $conex = mysqli_connect("localhost", "root", "", "registro");
    extract($_POST);
    $id = $_POST['id'];
    $consulta = "DELETE FROM estudiantes WHERE id= $id";

    mysqli_query($conex, $consulta);

    header('Location: inicio.php');
}

function acceso_user()
{
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    session_start();
    $_SESSION['nombre'] = $nombre;

    $conex = mysqli_connect("localhost", "root", "", "registro");
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

<?php
require_once('conexion.php');

$mensaje = '';
$errores = [];

function validarRUT($rut)
{
    return preg_match('/^[0-9]{7,8}[0-9Kk]{1}$/', $rut);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["archivo_csv"])) {
    $archivo = $_FILES["archivo_csv"];

    if (pathinfo($archivo["name"], PATHINFO_EXTENSION) != "csv") {
        $mensaje = "Error: El archivo debe ser CSV.";
    } else {
        if (($handle = fopen($archivo["tmp_name"], "r")) !== FALSE) {
            fgetcsv($handle, 1000, ";"); // Saltar la primera línea si contiene encabezados

            $conex->begin_transaction();

            try {
                $fila = 2; // Empezamos en 2 porque la primera fila son los encabezados
                while (($datos = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    if (count($datos) != 16) {
                        throw new Exception("La fila $fila no tiene el número correcto de columnas.");
                    }

                    $rut = trim($datos[0]);
                    $exterior = trim($datos[1]);
                    $mecanica = trim($datos[2]);
                    $calculo = trim($datos[3]);
                    $cientifica = trim($datos[4]);
                    $persuasiva = trim($datos[5]);
                    $artistica = trim($datos[6]);
                    $literaria = trim($datos[7]);
                    $musical = trim($datos[8]);
                    $social = trim($datos[9]);
                    $oficina = trim($datos[10]);
                    $nombre = trim($datos[11]);
                    $contacto = trim($datos[12]);
                    $nacimiento = trim($datos[13]);
                    $colegio = trim($datos[14]);
                    $curso = trim($datos[15]);

                    // Validaciones
                    if (!validarRUT($rut)) {
                        $errores[] = "Fila $fila: El RUT '$rut' no es válido.";
                        $fila++;
                        continue;
                    }
                    if (!is_numeric($exterior) || $exterior < 0) {
                        $errores[] = "Fila $fila: El valor de exterior '$exterior' no es válido.";
                        $fila++;
                        continue;
                    }
                    // Repite las validaciones para las otras columnas si es necesario...

                    // Verificar si el RUT existe en la tabla test
                    $query_verificar_rut = "SELECT COUNT(*) FROM test WHERE rut = ?";
                    $stmt_verificar_rut = $conex->prepare($query_verificar_rut);
                    $stmt_verificar_rut->bind_param("s", $rut);
                    $stmt_verificar_rut->execute();
                    $stmt_verificar_rut->bind_result($rut_existe);
                    $stmt_verificar_rut->fetch();
                    $stmt_verificar_rut->close();

                    if ($rut_existe == 0) {
                        // Insertar el RUT en la tabla test si no existe
                        $query_insertar_rut = "INSERT INTO test (rut) VALUES (?)";
                        $stmt_insertar_rut = $conex->prepare($query_insertar_rut);
                        $stmt_insertar_rut->bind_param("s", $rut);
                        $stmt_insertar_rut->execute();
                        $stmt_insertar_rut->close();
                    }

                    // Insertar o actualizar en la tabla resultados
                    $query_resultados = "INSERT INTO resultados (rut, exterior, mecanica, calculo, cientifica, persuasiva, artistica, literaria, musical, social, oficina) 
                                         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
                                         ON DUPLICATE KEY UPDATE 
                                         exterior = VALUES(exterior), 
                                         mecanica = VALUES(mecanica), 
                                         calculo = VALUES(calculo), 
                                         cientifica = VALUES(cientifica), 
                                         persuasiva = VALUES(persuasiva), 
                                         artistica = VALUES(artistica), 
                                         literaria = VALUES(literaria), 
                                         musical = VALUES(musical), 
                                         social = VALUES(social), 
                                         oficina = VALUES(oficina)";

                    $stmt_resultados = $conex->prepare($query_resultados);
                    $stmt_resultados->bind_param("siiiiiiiiii", $rut, $exterior, $mecanica, $calculo, $cientifica, $persuasiva, $artistica, $literaria, $musical, $social, $oficina);
                    $stmt_resultados->execute();

                    // Insertar o actualizar en la tabla estudiantes
                    $query_estudiantes = "INSERT INTO estudiantes (rut, nombre, contacto, nacimiento, colegio, curso) 
                                          VALUES (?, ?, ?, ?, ?, ?) 
                                          ON DUPLICATE KEY UPDATE 
                                          nombre = VALUES(nombre), 
                                          contacto = VALUES(contacto), 
                                          nacimiento = VALUES(nacimiento), 
                                          colegio = VALUES(colegio), 
                                          curso = VALUES(curso)";

                    $stmt_estudiantes = $conex->prepare($query_estudiantes);
                    $stmt_estudiantes->bind_param("ssssss", $rut, $nombre, $contacto, $nacimiento, $colegio, $curso);
                    $stmt_estudiantes->execute();

                    $fila++;
                }

                if (empty($errores)) {
                    $conex->commit();
                    $mensaje = "Datos cargados y/o actualizados exitosamente.";
                } else {
                    $conex->rollback();
                    $mensaje = "Se encontraron errores en algunos datos. No se realizaron cambios en la base de datos.";
                }
            } catch (Exception $e) {
                $conex->rollback();
                $mensaje = "Error al cargar los datos: " . $e->getMessage();
            }

            fclose($handle);
        } else {
            $mensaje = "Error al abrir el archivo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Datos de Estudiantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="container mt-5">
        <h2>Subir Archivo CSV de Estudiantes</h2>
        <?php if ($mensaje): ?>
            <div class="alert alert-info" role="alert">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($errores)): ?>
            <div class="alert alert-danger" role="alert">
                <h4>Se encontraron los siguientes errores:</h4>
                <ul>
                    <?php foreach ($errores as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="archivo_csv" class="form-label">Seleccionar archivo CSV (separado por punto y coma, RUT sin guion):</label>
                <input type="file" class="form-control" id="archivo_csv" name="archivo_csv" accept=".csv" required>
            </div>
            <button type="submit" class="btn btn-primary">Subir y Procesar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
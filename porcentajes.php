<?php

include("conexion.php");

// Realizamos la consulta a la base de datos
$conex = mysqli_connect("$servername", "$username", "$password", "$database");
$sql = "SELECT rut, exterior, mecanica, calculo, cientifica, persuasiva, artistica, literaria, musical, social, oficina FROM resultados";
$result = mysqli_query($conex, $sql);

//colegios
$sql_colegios = "SELECT DISTINCT colegio FROM estudiantes";
$result_colegios = mysqli_query($conex, $sql_colegios);

$suma_exterior = $suma_mecanica = $suma_calculo = $suma_cientifica = $suma_persuasiva = 0;
$suma_artistica = $suma_literaria = $suma_musical = $suma_social = $suma_oficina = 0;
$total_registros = 0;

$puntaje_maximo = 9;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suma_exterior += $row['exterior'];
        $suma_mecanica += $row['mecanica'];
        $suma_calculo += $row['calculo'];
        $suma_cientifica += $row['cientifica'];
        $suma_persuasiva += $row['persuasiva'];
        $suma_artistica += $row['artistica'];
        $suma_literaria += $row['literaria'];
        $suma_musical += $row['musical'];
        $suma_social += $row['social'];
        $suma_oficina += $row['oficina'];
        $total_registros++;
    }
}

// Función para calcular el porcentaje de forma segura
function calcular_porcentaje($suma, $total_registros, $puntaje_maximo)
{
    $maximo_posible = $total_registros * $puntaje_maximo;
    return ($maximo_posible > 0) ? ($suma / $maximo_posible) * 100 : 0;
}

// Función para calcular el promedio de forma segura
function calcular_promedio($suma, $total_registros)
{
    return ($total_registros > 0) ? $suma / $total_registros : 0;
}

// Calcula los porcentajes
$maximo_posible = $total_registros * $puntaje_maximo;

$porcentaje_exterior = calcular_porcentaje($suma_exterior, $total_registros, $puntaje_maximo);
$porcentaje_mecanica = calcular_porcentaje($suma_mecanica, $total_registros, $puntaje_maximo);
$porcentaje_calculo = calcular_porcentaje($suma_calculo, $total_registros, $puntaje_maximo);
$porcentaje_cientifica = calcular_porcentaje($suma_cientifica, $total_registros, $puntaje_maximo);
$porcentaje_persuasiva = calcular_porcentaje($suma_persuasiva, $total_registros, $puntaje_maximo);
$porcentaje_artistica = calcular_porcentaje($suma_artistica, $total_registros, $puntaje_maximo);
$porcentaje_literaria = calcular_porcentaje($suma_literaria, $total_registros, $puntaje_maximo);
$porcentaje_musical = calcular_porcentaje($suma_musical, $total_registros, $puntaje_maximo);
$porcentaje_social = calcular_porcentaje($suma_social, $total_registros, $puntaje_maximo);
$porcentaje_oficina = calcular_porcentaje($suma_oficina, $total_registros, $puntaje_maximo);

// Calcula los promedios
$preferencia_promedio = calcular_promedio($suma_exterior, $total_registros);
$preferencia_promedio2 = calcular_promedio($suma_mecanica, $total_registros);
$preferencia_promedio3 = calcular_promedio($suma_calculo, $total_registros);
$preferencia_promedio4 = calcular_promedio($suma_cientifica, $total_registros);
$preferencia_promedio5 = calcular_promedio($suma_persuasiva, $total_registros);
$preferencia_promedio6 = calcular_promedio($suma_artistica, $total_registros);
$preferencia_promedio7 = calcular_promedio($suma_literaria, $total_registros);
$preferencia_promedio8 = calcular_promedio($suma_musical, $total_registros);
$preferencia_promedio9 = calcular_promedio($suma_social, $total_registros);
$preferencia_promedio10 = calcular_promedio($suma_oficina, $total_registros);

// Prepara los datos para el gráfico
$etiquetas = ['Exterior', 'Mecánica', 'Cálculo', 'Científica', 'Persuasiva', 'Artística', 'Literaria', 'Musical', 'Social', 'Oficina'];
$porcentajes = [
    $porcentaje_exterior,
    $porcentaje_mecanica,
    $porcentaje_calculo,
    $porcentaje_cientifica,
    $porcentaje_persuasiva,
    $porcentaje_artistica,
    $porcentaje_literaria,
    $porcentaje_musical,
    $porcentaje_social,
    $porcentaje_oficina
];

// Convierte los arrays a formato JSON para usar en JavaScript
$etiquetas_json = json_encode($etiquetas);
$porcentajes_json = json_encode($porcentajes);

?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>
    <!--Bootstrap CSS-->
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Datos del Test</title>
    <link rel="stylesheet" type="text/css" href="estilo16.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header class="header">
        <nav class="header__menu navbar navbar-expand-lg bg-opacity-10">
            <a class="header__menu__link" href="login.php">Cerrar Sesion</a>
            <a class="header__menu__link" href="datos.php">Estudiantes</a>
        </nav>
    </header>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Preferencias por parte de los Estudiantes</h2>
        <div class="container-calc mt-3 mb-3">
            <canvas id="myChart"></canvas>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var ctx = document.getElementById('myChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: <?php echo $etiquetas_json; ?>,
                            datasets: [{
                                label: 'Porcentajes por Área',
                                data: <?php echo $porcentajes_json; ?>,
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.4)',
                                    'rgba(54, 162, 235, 0.4)',
                                    'rgba(255, 206, 86, 0.4)',
                                    'rgba(75, 192, 192, 0.4)',
                                    'rgba(153, 102, 255, 0.4)',
                                    'rgba(255, 159, 64, 0.4)',
                                    'rgba(199, 199, 199, 0.4)',
                                    'rgba(83, 102, 255, 0.4)',
                                    'rgba(40, 159, 64, 0.4)',
                                    'rgba(210, 199, 199, 0.4)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(199, 199, 199, 1)',
                                    'rgba(83, 102, 255, 1)',
                                    'rgba(40, 159, 64, 1)',
                                    'rgba(210, 199, 199, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    max: 100,
                                    ticks: {
                                        color: 'rgba(0, 0, 0, 0.8)', // Eje Y más oscuro
                                        stepSize: 20 // Incrementos de 20 en 20
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: 'rgba(0, 0, 0, 0.8)' // Eje X más oscuro
                                    }
                                }
                            },
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                    labels: {
                                        color: 'rgba(0, 0, 0, 0.8)' // Leyenda más oscura
                                    }
                                },
                                title: {
                                    display: true,
                                    text: 'Porcentajes por Área de Interés',
                                    color: 'rgba(0, 0, 0, 0.9)' // Título más oscuro
                                }
                            }
                        }
                    });
                });
            </script>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
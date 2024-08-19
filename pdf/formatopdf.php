<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Resultados</title>
</head>
<header>
    <div class="imagen-placeholder"></div>
</header>

<body>
    <?php
    include("../conexion.php");
    ?>
    <style>
        h6,
        h5,
        h4,
        h3,
        h2,
        h1,
        strong {
            color: #700099;
        }

        h3 {
            margin-top: -16%;
        }

        h4 {
            margin-top: -3%;
        }

        .texto-justificado {
            text-align: justify !important;
            text-justify: inter-word !important;
            white-space: normal !important;
            /* Permite que el texto se envuelva */
            word-wrap: break-word !important;
            /* Rompe palabras largas si es necesario */
            margin: 10px;
            font-size: 10pt !important;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin-top: 0;
            margin-bottom: -7%;
            height: 10%;
            text-align: center;
            font-size: 9pt;
        }

        table {
            width: 100%;
            text-align: center;
        }

        th {
            border: #700099 1px solid;
        }

        .abajo {
            border-top: 0;
        }

        .page-break {
            page-break-after: always;
        }

        .titulo {
            width: 17%;
            margin: 0;
        }

        .titulo2,
        .titulo3 {
            width: 14em;
            margin: 0;
        }

        .area-interes {
            page-break-inside: avoid;
            break-inside: avoid-page;
        }

        p {
            orphans: 3;
            widows: 3;
            font-size: 10pt !important;
        }
    </style>
    <div class="container w-100">
        <div class="row">
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
                <div class="row">
                    <br>
                    <div class="imagen-placeholder1"></div>
                    <p class="position-absolute texto-justificado"><strong>El Test de Intereses Vocacionales de Kuder,</strong> creado por el psicólogo G. Frederic Kuder, es una herramienta psicométrica reconocida internacionalmente que ayuda a quienes están por elegir su futuro a <strong>identifcar sus intereses y preferencias en diversas áreas ocupacionales.</strong> Este test de autoinforme proporciona un perfil de intereses que muestra las áreas con mayores preferencias, facilitando la comparación con distintas ocupaciones y trayectorias profesionales.
                        <br>
                        El enfoque del test considera la elección vocacional como un factor estático, personalizado para cada individuo, pero no enfocado en el desarrollo continuo de la orientación vocacional, ya que esta puede variar dependiendo de en qué momento se aplique el test.
                    </p>
                    <br>
                    <h6 class="display-6 text-start mt-2"><strong>El modelo del test de Kuder se basa en los siguientes supuestos y principios:</strong></h6>
                    <br>
                    <h5 class="text-start"><strong>Supuestos Básicos:</strong></h5>
                    <ol class="texto-justificado">
                        <li>Las personas pueden ser categorizadas en diversos intereses ocupacionales que reflejan sus preferencias y motivaciones, influenciadas por factores genéticos y ambientales.</li>
                        <li>Las personas buscan entornos donde puedan manifestar sus destrezas, capacidades, actitudes y valores, asumiendo roles que le resultan satisfactorios.</li>
                        <li>La conducta humana resulta de la interacción entre los intereses personales y las características del ambiente.</li>
                    </ol>
                    <br>
                    <h5 class="text-start"><strong>Principios:</strong></h5>
                    <ol class="texto-justificado">
                        <li>La elección de una carrera es una expresión de los intereses personales.</li>
                        <li>Los estereotipos vocacionales tienen significados psicológicos y sociológicos confiables, ya que los miembros de una profesión tienden a tener intereses y trayectorias de desarrollo similares.</li>
                        <li>La satisfacción, estabilidad y logro ocupacional dependen de la congruencia entre los intereses personales y el ambiente laboral.</li>
                        <li>Los resultados del Test de Intereses Vocacionales de Kuder proporcionan una descripción detallada de las preferencias ocupacionales del individuo, mostrando el nivel de interés auto-percibido en diversas actividades.</li>
                    </ol>
                </div>
                <div class="imagen-placeholder2"></div>
        </div>
        <div class="row mt-5 pt-5">
            <br><br><br><br><br>
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
                }
            ?>
            <header>
                <div class="imagen-placeholder3"></div>
            </header>
            <h3><?php echo $resultado['nombre']; ?>, <?php echo $resultado['rut']; ?></h3>
            <br><br>
            <p class="texto-justificado">
                <?php
                $areas2 = [];
                if ($resultado2['exterior'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> esta asociada a lo <strong>Exterior</strong>, lo que revela una parte esencial de tu identidad: eres una persona intrépida y en constante búsqueda de conexión con la naturaleza. Encontrarás tu verdadera felicidad explorando las vastas maravillas al aire libre, ya sea en las alturas de las montañas, entre la exuberancia de los bosques o a la orilla de un sereno río. Te apasionan actividades como el senderismo, la escalada y el campismo, donde cada paso te acerca más a la esencia misma de la vida. Eres un alma práctica y activa, dotada de notables habilidades físicas y una aguda coordinación motora, lo que te permite abordar cada desafío con confianza y habilidad. Para ti, cada momento en la naturaleza es una oportunidad para descubrir nuevas perspectivas, superar límites y encontrar una profunda conexión con el mundo que te rodea.";
                }
                if ($resultado2['mecanica'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> esta asociado a la <strong>Mecánica</strong>, lo que indica que eres una persona práctica y orientada a la acción, con un fuerte interés en el funcionamiento y la reparación de equipos y maquinaria. Disfrutas trabajando con máquinas, herramientas, y equipos mecánicos o eléctricos, además de tener afinidad por las plantas y los animales, lo que puede implicar interés en jardinería, manejo de espacios verdes y cuidado animal. Te gusta estar al aire libre, participando en actividades como agricultura, construcción y conservación ambiental, y disfrutas creando cosas con tus manos, ya sea en carpintería, metalurgia u otras formas de artesanía. Eres práctico, activo, con buenas habilidades físicas y excelente coordinación motora, lo que te permite abordar tareas que requieren precisión y destreza.";
                }
                if ($resultado2['calculo'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> esta asociada al <strong>Cálculo</strong>, lo que indica que eres una persona altamente organizada y detallista, lo que te permite abordar problemas matemáticos con precisión y eficacia. Disfrutas inmensamente del análisis numérico y de la resolución de problemas, lo que te impulsa a sumergirte en la complejidad de números, fórmulas y datos para encontrar soluciones rigurosas. Esta dedicación meticulosa se refleja en tu capacidad para aplicar métodos matemáticos con rigor y resolver una amplia gama de problemas con eficiencia y precisión. Tu habilidad para el pensamiento lógico y crítico te permite descomponer problemas en componentes manejables y evaluar las soluciones con un enfoque analítico agudo. Eres un recurso valioso en cualquier contexto que demande un enfoque analítico y una resolución efectiva de problemas, lo que demuestra tu capacidad para contribuir de manera significativa en una variedad de campos.";
                }
                if ($resultado2['cientifica'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> es la <strong>Científica</strong>, lo que indica que eres una persona analítica y curiosa, con un fuerte interés en el descubrimiento y la investigación. Disfrutas trabajando con conceptos científicos y técnicos, realizando investigaciones, experimentando, analizando datos y resolviendo problemas complejos. Te gusta usar equipos especializados y tecnología avanzada, lo que subraya tu capacidad de adaptarte a herramientas modernas. Eres meticulosa y detallista, utilizando la lógica y el razonamiento avanzado en la toma de decisiones, lo que demuestra tus habilidades críticas y de razonamiento avanzado, haciéndote ideal para roles que requieren una gestión precisa y efectiva de tareas científicas.";
                }
                if ($resultado2['persuasiva'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> es la <strong>Persuasiva</strong>, tu personalidad revela un conjunto robusto de habilidades y rasgos que te distinguen en diversos contextos. Eres una persona con una firme determinación para alcanzar metas, lo que se refleja en tu ambición y orientación hacia el logro de objetivos. Disfrutas del desafío de liderar equipos, participar en actividades de ventas, debates y negociaciones, donde puedes aplicar tu capacidad para persuadir y motivar a otros hacia una dirección común. Esta inclinación hacia la persuasión está respaldada por tu energía contagiosa, tu confianza en ti misma y tu naturaleza extrovertida, que te permite establecer conexiones rápidamente y comunicar tus ideas de manera efectiva. Además, tu habilidad para tomar decisiones y tu liderazgo efectivo te convierten en un activo valioso en cualquier contexto donde se requiera influencia y dirección hacia el logro de resultados significativos.";
                }
                if ($resultado2['artistica'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> esta asociado a lo <strong>Artistico</strong>, se destaca tu profundo interés en el ámbito artístico, lo que revela una personalidad ingeniosa y contemplativa. Disfrutas inmensamente participando en proyectos que involucran expresión artística, como la pintura, la música, la escritura, el diseño y otras formas de arte, donde puedes canalizar tu creatividad de manera libre y fluida. Tu capacidad para innovar y crear cosas nuevas te impulsa a buscar constantemente nuevas ideas y enfoques originales. Eres una persona imaginativa, dotada de una sensibilidad intuitiva que te permite explorar nuevas perspectivas y encontrar soluciones creativas a los desafíos que se te presentan. Posees una apreciación estética aguda y buscas la autoexpresión como una forma de conexión con el mundo que te rodea y contigo misma. Tu habilidad para crear belleza y transmitir emociones a través de tus obras hace de ti un individuo valioso en cualquier contexto creativo, donde tu originalidad y sensibilidad pueden brillar de manera única.";
                }
                if ($resultado2['literaria'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> es la <strong>Literaria</strong>, lo que indica que eres una persona creativa y expresiva, con un profundo interés en las palabras y su poder para contar historias y transmitir ideas. Te encanta leer y escribir, explorando tanto mundos imaginarios como realidades complejas, y disfrutas analizando textos con una mirada crítica. Disfrutas trabajando con el lenguaje, jugando con la estructura y el estilo, experimentando con diferentes formas literarias y géneros. Te atrae la riqueza de las narrativas, la belleza de la expresión escrita y la capacidad de las palabras para evocar emociones y pensamientos profundos. Eres imaginativa y meticulosa, con una sensibilidad aguda para los matices del lenguaje y una habilidad especial para comunicarte de manera elocuente y persuasiva. Además, aprecias la literatura no solo como un medio de entretenimiento, sino también como una herramienta para el entendimiento cultural y la introspección personal.";
                }
                if ($resultado2['musical'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> es la <strong>Musical</strong>, lo que indica que eres una persona creativa y expresiva, con un fuerte interés en la interpretación, composición y apreciación musical. Disfrutas trabajando con una variedad de instrumentos, explorando diversos géneros y estilos, y colaborando con otros músicos en ensayos y presentaciones en vivo. Te entusiasma experimentar con nuevas técnicas y sonidos, y tienes excelentes habilidades auditivas y una buena coordinación rítmica. Tu pasión por la música se refleja en tu capacidad para comunicarte y expresarte a través de este arte, inspirando y conmoviendo a quienes te escuchan.";
                }
                if ($resultado2['social'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> esta asociado al <strong>Servicio Social</strong>, lo que indica que eres empática y orientada al servicio, con un fuerte deseo de ayudar a los demás. Te gustan las actividades que implican interacción con personas, como el trabajo comunitario, la asistencia social, y el voluntariado en diversas causas. Disfrutas ayudar, enseñar, cuidar y apoyar a otros en sus necesidades, ya sea a través de la educación, la salud, el asesoramiento o el acompañamiento en procesos difíciles. Eres comprensiva y cooperativa, con una capacidad notable para escuchar y entender a los demás. Además, eres responsable y posees habilidades interpersonales fuertes, lo que te permite trabajar eficazmente en equipo, mediar en conflictos y fomentar un ambiente de apoyo y colaboración. Tu naturaleza altruista y tu compromiso con el bienestar de los demás te convierten en una persona valiosa en cualquier ámbito de servicio social.";
                }
                if ($resultado2['oficina'] >= 7) {
                    $areas2[] = "de tus principales <strong>áreas de interés</strong> esta asociado a la <strong>Oficina</strong>, destaca que eres una persona extremadamente organizada y detallista, con una afinidad particular por la administración y la gestión de información. Disfrutas trabajando con documentos, datos, equipos de oficina y sistemas de organización, y te motivan actividades que implican la planificación y el mantenimiento de registros. Eres meticulosa en tu enfoque, asegurándote de que cada tarea se realice con precisión y eficiencia. Además, tu responsabilidad y confiabilidad son evidentes en tu capacidad para gestionar información confidencial y cumplir con tus obligaciones administrativas. Tus habilidades administrativas y de organización sobresalientes te permiten establecer y seguir procedimientos, coordinar actividades y mantener un entorno de trabajo ordenado y productivo, convirtiéndote en un recurso valioso para cualquier entorno que requiera una gestión precisa y efectiva de las operaciones diarias.";
                }

                // Si no es el ultimo resultado pone una , si es el ultimo lo separa por una y e un punto final .
                $count2 = count($areas2);
                for ($i = 0; $i < $count2; $i++) {
                    echo '<div class="area-interes texto-justificado">';
                    if ($i == 0) {
                        echo "<p>En base al análisis de los resultados, Una " . $areas2[$i] . "</p>";
                    } elseif ($i == 1) {
                        echo "<p>Otra " . $areas2[$i] . "</p>";
                    } elseif ($i == $count2 - 1) {
                        echo "<p>La ultima " . $areas2[$i] . "</p>";
                    } else {
                        echo "<p>Otra " . $areas2[$i] . "</p>";
                    }
                    echo '</div>';
                }
                ?>
            </p>
        </div>
        <div class="row">
            <h4 class="text-center" style="margin-top: 1px;">Mayores Areas de Interes Identificadas</h4>
            <?php
                if ($resultado2['exterior'] >= 7 || $resultado2['mecanica'] >= 7 || $resultado2['calculo'] >= 7 || $resultado2['cientifica'] >= 7 || $resultado2['persuasiva'] >= 7 || $resultado2['artistica'] >= 7 || $resultado2['literaria'] >= 7 || $resultado2['musical'] >= 7 || $resultado2['social'] >= 7 || $resultado2['oficina'] >= 7) {
            ?>
                <table>
                    <tr>
                        <th class="titulo">
                            <h6 class="text-center"><strong>Area de Interes</strong></h6>
                        </th>
                        <th class="titulo2">
                            <h6 class="text-center"><strong>Perfil del Area</strong></h6>
                        </th>
                        <th class="titulo3">
                            <h6 class="text-center"><strong>Carreras Asociadas</strong></h6>
                        </th>
                    </tr>
                </table>
            <?php
                }
            ?>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Exterior</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado4['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado4['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Mecanica</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado5['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado5['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Calculo</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado6['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado6['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
            <?php
                }
                if ($resultado2['cientifica'] >= 7) {
            ?>
                <?php

                    // Realizamos la consulta a la base de datos
                    $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                    $consulta = "SELECT * FROM cientifica";
                    $result7 = mysqli_query($conex, $consulta);

                    // Verificamos si hay resultados
                    if ($result7->num_rows > 0) {
                        $resultado7 = $result7->fetch_assoc();
                ?>
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Cientifica</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado7['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado7['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Persuasiva</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado7['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado7['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Artistica</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado8['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado8['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Literaria</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado9['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado9['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Musical</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado10['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado10['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Social</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado11['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado11['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
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
                    <table>
                        <tr>
                            <th class="titulo">
                                <h6><strong>Oficina</strong></h6>
                            </th>
                            <th class="titulo2">
                                <h6 class="texto-justificado"><strong><?php echo $resultado12['descripcion']; ?></strong></h6>
                            </th>
                            <th class="titulo3">
                                <h6 class="texto-justificado"><strong><?php echo $resultado12['carreras']; ?></strong></h6>
                            </th>
                        </tr>
                    </table>
                <?php
                    }
                ?>
            <?php
                } else {
            ?>
                <div class="row g-3" style="margin-top: 15px;" id="vista">
                    <div class="text-center">
                        <label for="texto" class="w-100 texto-justificado" style="margin-top: -5px;">Basado en el análisis de los resultados, no presentas un área de interés consolidada, lo que sugiere que eres una persona con una amplia variedad de intereses y una profunda curiosidad. Esta diversidad te abre muchas posibilidades para desarrollarte en diversas áreas profesionales. Sin embargo, hay campos con un notable potencial de desarrollo para ti, como el area
                            <?php
                            $areas = [];
                            if ($resultado2['exterior'] >= 6) {
                                $areas[] = "Exterior";
                            }
                            if ($resultado2['mecanica'] >= 6) {
                                $areas[] = "Mecanica";
                            }
                            if ($resultado2['calculo'] >= 6) {
                                $areas[] = "Calculo";
                            }
                            if ($resultado2['cientifica'] >= 6) {
                                $areas[] = "Cientifica";
                            }
                            if ($resultado2['persuasiva'] >= 6) {
                                $areas[] = "Persuasiva";
                            }
                            if ($resultado2['artistica'] >= 6) {
                                $areas[] = "Artistica";
                            }
                            if ($resultado2['literaria'] >= 6) {
                                $areas[] = "Literaria";
                            }
                            if ($resultado2['musical'] >= 6) {
                                $areas[] = "Musical";
                            }
                            if ($resultado2['social'] >= 6) {
                                $areas[] = "Social";
                            }
                            if ($resultado2['oficina'] >= 6) {
                                $areas[] = "Oficina";
                            }

                            // Si no es el ultimo resultado pone una , si es el ultimo lo separa por una y e un punto final .
                            $count = count($areas);
                            for ($i = 0; $i < $count; $i++) {
                                if ($i == 0) {
                                    echo $areas[$i];
                                } elseif ($i == $count - 1) {
                                    echo " y " . $areas[$i] . ".";
                                } else {
                                    echo ", " . $areas[$i];
                                }
                            }

                            ?>
                            <br>Para tomar una decisión vocacional, te recomendamos realizar un ejercicio de priorización de tus intereses, diferenciando entre los que consideras hobbies y aquellas actividades que podrías desempeñar profesionalmente. Imagínate cómo sería tu futuro en estas áreas y evalúa qué te brinda mayor satisfacción y realización personal. Esta reflexión te ayudará a identificar una carrera que no solo aproveche tus habilidades, sino que también te apasione y motive a largo plazo.
                        </label>
                    </div>
                    <div class="text-center" style="margin-top: 15px;">
                        <h5 style="margin-top: 1px;">Estas son tus areas con mejor puntaje</h5>
                        <?php

                        if ($resultado2['exterior'] >= 6 || $resultado2['mecanica'] >= 6 || $resultado2['calculo'] >= 6 || $resultado2['cientifica'] >= 6 || $resultado2['persuasiva'] >= 6 || $resultado2['artistica'] >= 6 || $resultado2['literaria'] >= 6 || $resultado2['musical'] >= 6 || $resultado2['social'] >= 6 || $resultado2['oficina'] >= 6) {
                        ?>
                            <table style="margin-top: 15px;">
                                <tr>
                                    <th class="titulo">
                                        <h6 class="text-center"><strong>Area de Interes</strong></h6>
                                    </th>
                                    <th class="titulo2">
                                        <h6 class="text-center"><strong>Perfil del Area</strong></h6>
                                    </th>
                                    <th class="titulo3">
                                        <h6 class="text-center"><strong>Carreras Asociadas</strong></h6>
                                    </th>
                                </tr>
                            </table>
                        <?php
                        }
                        ?>
                        <?php

                        if ($resultado2['exterior'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Exterior</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado4['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado4['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['mecanica'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Mecanica</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado5['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado5['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['calculo'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Calculo</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado6['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado6['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['cientifica'] >= 6) {
                        ?>
                            <?php

                            // Realizamos la consulta a la base de datos
                            $conex = mysqli_connect("$servername", "$username", "$password", "$database");
                            $consulta = "SELECT * FROM cientifica";
                            $result7 = mysqli_query($conex, $consulta);

                            // Verificamos si hay resultados
                            if ($result7->num_rows > 0) {
                                $resultado7 = $result7->fetch_assoc();
                            ?>
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Cientifica</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado7['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado7['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['persuasiva'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Persuasiva</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado7['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado7['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['artistica'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Artistica</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado8['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado8['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['literaria'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Literaria</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado9['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado9['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['musical'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Musical</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado10['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado10['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['social'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Social</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado11['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado11['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        if ($resultado2['oficina'] >= 6) {
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
                                <table>
                                    <tr>
                                        <th class="titulo">
                                            <h6><strong>Oficina</strong></h6>
                                        </th>
                                        <th class="titulo2">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado12['descripcion']; ?></strong></h6>
                                        </th>
                                        <th class="titulo3">
                                            <h6 class="texto-justificado"><strong><?php echo $resultado12['carreras']; ?></strong></h6>
                                        </th>
                                    </tr>
                                </table>
                            <?php
                            }
                            ?>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    <?php
            }
    ?>
    </div>
    <div class="footer text-center">
        <hr>
        Visítanos en <strong>José Nogueira 1332</strong> y contáctanos en el siguiente número: <strong>+569 74997771.</strong> <br>Para conocer más sobre estas carreras ingresa a <strong>admision.umag.cl.</strong>
    </div>
</body>

</html>
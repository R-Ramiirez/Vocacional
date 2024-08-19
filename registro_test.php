<?php
include("conexion.php");
?>

<!DOCTYPE html>
<html lang="es-MX">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/73b3fda649.js" crossorigin="anonymous"></script>

    <title>Registros</title>

    <!--Bootstrap CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="estilo16.css">
</head>

<body>
    <header class="header">
        <nav class="header__menu navbar navbar-expand-lg bg-opacity-10">
            <a class="header__menu__link" href="login.php">Cerrar Sesion</a>
            <a class="header__menu__link" href="datos.php">Estudiantes</a>
            <a class="header__menu__link" href="porcentajes.php">Datos</a>
        </nav>
    </header>
    <?php
    // Captura el id seleccionado.
    $rut = $_GET['rut'];

    // Realizamos la consulta a la base de datos
    $conex = mysqli_connect("$servername", "$username", "$password", "$database");
    $consulta = "SELECT * FROM estudiantes WHERE rut = $rut";
    $result = mysqli_query($conex, $consulta);

    // Verificamos si hay resultados
    if ($result->num_rows > 0) {
        $resultado = $result->fetch_assoc();
    ?>
        <div class="container text-center mt-5">
            <h1 class="mb-5"><?php echo $resultado['nombre']; ?></h1>
            <form action="validar.php" method="post">
                <div class="form-group" id="container" data-group="1">
                    <p class="text-center">Pregunta 1:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta1" id="pregunta1" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta1">Ser un(a) artista.</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta2" id="pregunta2" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta2">Dirigir la crianza de ganado.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="2">
                    <p class="text-center">Pregunta 2:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta3" id="pregunta3" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta3">Conocer datos útiles para navegar en internet.</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta4" id="pregunta4" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta4">Dar charlas sobre química.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="3">
                    <p>Pregunta 3:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta5" id="pregunta5" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta5">Trabajar en una agencia de publicidad.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta6" id="pregunta6" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta6">Estudiar métodos de regadío.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="4">
                    <p>Pregunta 4:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta7" id="pregunta7" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta7">Tomar clases de locución y expresión corporal.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta8" id="pregunta8" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta8">Realizar experimentos.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="5">
                    <p>Pregunta 5:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta9" id="pregunta9" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta9">Ilustrar cuentos infantiles.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta10" id="pregunta10" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta10">Ser protagonista de una obra de teatro.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="6">
                    <p>Pregunta 6:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta11" id="pregunta11" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta11">Animar un programa de televisión.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta12" id="pregunta12" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta12">Crear el vestuario para una obra de teatro.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="7">
                    <p>Pregunta 7:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta13" id="pregunta13" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta13">Ser guía de excursiones.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta14" id="pregunta14" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta14">Participar en campaña de ayuda a niños discapacitados.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="8">
                    <p>Pregunta 8:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta15" id="pregunta15" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta15">Aprender bailes folclóricos.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta16" id="pregunta16" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta16">Ser escultor(a).</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="9">
                    <p>Pregunta 9:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta17" id="pregunta17" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta17">Trabajar como soporte técnico computacional.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta18" id="pregunta18" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta18">Asistir a una conferencia sobre los derechos de los trabajadores.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="10">
                    <p>Pregunta 10:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta19" id="pregunta19" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta19">Enseñar cómo funciona un motor de avión.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta20" id="pregunta20" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta20">Dirigir la clasificación de fruta según su calidad.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="11">
                    <p>Pregunta 11:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta21" id="pregunta21" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta21">Participar en un comité de navidad recolectando juguetes para niños de escasos recursos.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta22" id="pregunta22" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta22">Componer la música para un poema.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="12">
                    <p>Pregunta 12:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta23" id="pregunta23" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta23">Crear afiches para una agencia de publicidad.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta24" id="pregunta24" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta24">Saber armar y desarmar computadores.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="13">
                    <p>Pregunta 13:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta25" id="pregunta25" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta25">Intervenir en un conflicto familiar ante tribunales de justicia.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta26" id="pregunta26" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta26">Ser relacionador(a) público(a) de una empresa.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="14">
                    <p>Pregunta 14:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta27" id="pregunta27" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta27">Dirigir una función teatral de aficionados.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta28" id="pregunta28" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta28">Investigar sobre los nuevos usos de las matemáticas.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="15">
                    <p>Pregunta 15:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta29" id="pregunta29" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta29">Aprender estadística.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta30" id="pregunta30" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta30">Ser conocido(a) como un(a) buen(a) escritor(a).</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="16">
                    <p>Pregunta 16:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta31" id="pregunta31" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta31">Ser programador(a) en computación.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta32" id="pregunta32" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta32">Manejar aparatos y maquinas industriales como prensas, tornos, etc.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="17">
                    <p>Pregunta 17:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta33" id="pregunta33" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta33">Efectuar análisis de muestra de sangre.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta34" id="pregunta34" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta34">Investigar las causas de enfermedades mentales.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="18">
                    <p>Pregunta 18:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta35" id="pregunta35" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta35">Pertenecer a una academia literaria.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta36" id="pregunta36" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta36">Tener a cargo el equipo agrícola en su fundo.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="19">
                    <p>Pregunta 19:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta37" id="pregunta37" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta37">Pertenecer a un grupo musical.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta38" id="pregunta38" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta38">Ser dentista.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="20">
                    <p>Pregunta 20:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta39" id="pregunta39" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta39">Ayudar a niños con dificultades de aprendizaje.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta40" id="pregunta40" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta40">Dirigir investigaciones sobre televisión.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="21">
                    <p>Pregunta 21:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta41" id="pregunta41" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta41">Realizar un estudio sobre el desarrollo económico en una empresa.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta42" id="pregunta42" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta42">Pintar loza.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="22">
                    <p>Pregunta 22:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta43" id="pregunta43" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta43">Ser gerente de ventas de una revista.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta44" id="pregunta44" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta44">Manejar bases de datos.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="23">
                    <p>Pregunta 23:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta45" id="pregunta45" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta45">Investigar los roles del hombre y de la mujer en algunas sociedades primitivas.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta46" id="pregunta46" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta46">Inventar nuevas formas de poesía.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="24">
                    <p>Pregunta 24:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta47" id="pregunta47" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta47">Trabajar en un laboratorio.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta48" id="pregunta48" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta48">Entrevistar aspirantes a un empleo.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="25">
                    <p>Pregunta 25:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta49" id="pregunta49" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta49">Ser químico(a).</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta50" id="pregunta50" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta50">Leer articulos acerca de los avances tecnológicos en computación.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="26">
                    <p>Pregunta 26:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta51" id="pregunta51" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta51">Seguir un curso de biologia.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta52" id="pregunta52" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta52">Escribir una obra de teatro.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="27">
                    <p>Pregunta 27:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta53" id="pregunta53" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta53">Dar una conferencia sobre literatura universal.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta54" id="pregunta54" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta54">Asistir a la ceremonia de entrega de los premios Oscar.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="28">
                    <p>Pregunta 28:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta55" id="pregunta55" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta55">Ser el (la) director(a) de una pelicula.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta56" id="pregunta56" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta56">Ser experto(a) en cuidar árboles.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="29">
                    <p>Pregunta 29:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta57" id="pregunta57" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta57">Mantener en buen estado y reparar calculadoras electrónicas.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta58" id="pregunta58" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta58">Componer música.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="30">
                    <p>Pregunta 30:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta59" id="pregunta59" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta59">Ayudar en un servicio de Asistencia Social.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta60" id="pregunta60" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta60">Arreglar un motor.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="31">
                    <p>Pregunta 31:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta61" id="pregunta61" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta61">Calcular el costo de producción de un articulo.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta62" id="pregunta62" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta62">Recolectar dinero para obras sociales.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="32">
                    <p>Pregunta 32:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta63" id="pregunta63" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta63">Solucionar conflictos interpersonales.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta64" id="pregunta64" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta64">Escribir un guión para una pelicula.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="33">
                    <p>Pregunta 33:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta65" id="pregunta65" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta65">Diseñar equipos para excursionistas.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta66" id="pregunta66" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta66">Confeccionar el presupuesto de materiales para una empresa.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="34">
                    <p>Pregunta 34:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta67" id="pregunta67" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta67">Ser el rostro de un producto recién lanzado al mercado.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta68" id="pregunta68" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta68">Dictar un curso sobre sistemas de rendimiento en las oficina.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="35">
                    <p>Pregunta 35:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta69" id="pregunta69" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta69">Analizar la calidad de la tierra para fines agrícolas.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta70" id="pregunta70" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta70">Instalar redes internas en diversas empresas.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="36">
                    <p>Pregunta 36:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta71" id="pregunta71" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta71">Asistir a una conferencia sobre nuevos métodos para aprovechar la madera.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta72" id="pregunta72" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta72">Realizar el balance anual de una empresa.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="37">
                    <p>Pregunta 37:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta73" id="pregunta73" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta73">Planificar campañas de publicidad.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta74" id="pregunta74" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta74">Estudiar ballet.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="38">
                    <p>Pregunta 38:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta75" id="pregunta75" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta75">Hacer análisis químicos de nuevos productos.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta76" id="pregunta76" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta76">Cultivar verduras para el mercado.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="39">
                    <p>Pregunta 39:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta77" id="pregunta77" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta77">Reparar fallas de artefactos electrónicos (planchas, jugueras, secadores de pelo, etc).</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta78" id="pregunta78" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta78">Escribir para una revista de arte.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="40">
                    <p>Pregunta 40:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta79" id="pregunta79" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta79">Arreglar música para una orquesta.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta80" id="pregunta80" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta80">Inventar problemas matemáticos.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="41">
                    <p>Pregunta 41:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta81" id="pregunta81" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta81">Recomendar sitios de veraneo.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta82" id="pregunta82" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta82">Ser el (la) autor(a) de un libro.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="42">
                    <p>Pregunta 42:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta83" id="pregunta83" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta83">Seguir un curso de literatura moderna.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta84" id="pregunta84" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta84">Calcular las ganancias y pérdidas de un producto.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="43">
                    <p>Pregunta 43:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta85" id="pregunta85" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta85">Diseñar joyas.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta86" id="pregunta86" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta86">Participar en una campaña contra el alcoholismo.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="44">
                    <p>Pregunta 44:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta87" id="pregunta87" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta87">Dirigir y supervisar a los empleados en una oficina.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta88" id="pregunta88" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta88">Ser secretario(a) de un científico famoso.</label>
                    </div>
                </div>
                <br>
                <div class="form-group" id="container" data-group="45">
                    <p>Pregunta 45:</p>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta89" id="pregunta89" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta89">Enseñar sobre los diferentes estilos literarios.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pregunta90" id="pregunta90" value="1" onclick="deseleccionarOtras(this)">
                        <label class="form-check-label" for="pregunta90">Cantar en un coro.</label>
                    </div>
                </div>
                <script>
                    function deseleccionarOtras(radio) {
                        var grupo = radio.parentNode.parentNode.getAttribute("data-group");
                        var radios = document.querySelectorAll(`[data-group="${grupo}"] input[type="radio"]`);
                        for (var i = 0; i < radios.length; i++) {
                            if (radios[i] != radio) {
                                radios[i].checked = false;
                            }
                        }
                    }
                </script>
                <br>

                <input type="hidden" name="rut" id="rut" value="<?php echo $resultado['rut']; ?>">
                <button type="submit" value="Guardar" class="btn btn-success" name="reg_test">Enviar</button>
                <a href="vistaUsuario.php?rut=<?php echo $rut ?>" class="btn btn-danger">Cancelar</a>
            </form>
            <hr>
        <?php
    } else {
        echo "No se encontró ningún registro con el RUT ingresado";
    }
        ?>
        </div>

        <!-- Una Opcion de Auto Generacion
        <//?php for ($i = 1; $i <= 45; $i++) {?>
            <div class="form-group" id="container">
                <p>Pregunta <//?php echo $i?>:</p>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta<//?php echo $i?>" id="pregunta<//?php echo $i?>A" value="1" required>
                    <label class="form-check-label" for="pregunta<//?php echo $i?>A"></label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pregunta<//?php echo $i?>" id="pregunta<//?php echo $i?>B" value="1" required>
                    <label class="form-check-label" for="pregunta<//?php echo $i?>B"></label>
                </div>
            </div>
            <//?php }?>
        -->
</body>

</html>
<?php
include("conexion.php");
$conex = mysqli_connect("$servername", "$username", "$password", "$database");


if (isset($_POST['reg_test'])) {

  if (strlen($_POST['rut']) >= 1) {

    // Recibir datos del formulario
    $rut = $_POST['rut'];
    $pregunta1 = isset($_POST['pregunta1']) ? $_POST['pregunta1'] : 0;
    $pregunta2 = isset($_POST['pregunta2']) ? $_POST['pregunta2'] : 0;
    $pregunta3 = isset($_POST['pregunta3']) ? $_POST['pregunta3'] : 0;
    $pregunta4 = isset($_POST['pregunta4']) ? $_POST['pregunta4'] : 0;
    $pregunta5 = isset($_POST['pregunta5']) ? $_POST['pregunta5'] : 0;
    $pregunta6 = isset($_POST['pregunta6']) ? $_POST['pregunta6'] : 0;
    $pregunta7 = isset($_POST['pregunta7']) ? $_POST['pregunta7'] : 0;
    $pregunta8 = isset($_POST['pregunta8']) ? $_POST['pregunta8'] : 0;
    $pregunta9 = isset($_POST['pregunta9']) ? $_POST['pregunta9'] : 0;
    $pregunta10 = isset($_POST['pregunta10']) ? $_POST['pregunta10'] : 0;
    $pregunta11 = isset($_POST['pregunta11']) ? $_POST['pregunta11'] : 0;
    $pregunta12 = isset($_POST['pregunta12']) ? $_POST['pregunta12'] : 0;
    $pregunta13 = isset($_POST['pregunta13']) ? $_POST['pregunta13'] : 0;
    $pregunta14 = isset($_POST['pregunta14']) ? $_POST['pregunta14'] : 0;
    $pregunta15 = isset($_POST['pregunta15']) ? $_POST['pregunta15'] : 0;
    $pregunta16 = isset($_POST['pregunta16']) ? $_POST['pregunta16'] : 0;
    $pregunta17 = isset($_POST['pregunta17']) ? $_POST['pregunta17'] : 0;
    $pregunta18 = isset($_POST['pregunta18']) ? $_POST['pregunta18'] : 0;
    $pregunta19 = isset($_POST['pregunta19']) ? $_POST['pregunta19'] : 0;
    $pregunta20 = isset($_POST['pregunta20']) ? $_POST['pregunta20'] : 0;
    $pregunta21 = isset($_POST['pregunta21']) ? $_POST['pregunta21'] : 0;
    $pregunta22 = isset($_POST['pregunta22']) ? $_POST['pregunta22'] : 0;
    $pregunta23 = isset($_POST['pregunta23']) ? $_POST['pregunta23'] : 0;
    $pregunta24 = isset($_POST['pregunta24']) ? $_POST['pregunta24'] : 0;
    $pregunta25 = isset($_POST['pregunta25']) ? $_POST['pregunta25'] : 0;
    $pregunta26 = isset($_POST['pregunta26']) ? $_POST['pregunta26'] : 0;
    $pregunta27 = isset($_POST['pregunta27']) ? $_POST['pregunta27'] : 0;
    $pregunta28 = isset($_POST['pregunta28']) ? $_POST['pregunta28'] : 0;
    $pregunta29 = isset($_POST['pregunta29']) ? $_POST['pregunta29'] : 0;
    $pregunta30 = isset($_POST['pregunta30']) ? $_POST['pregunta30'] : 0;
    $pregunta31 = isset($_POST['pregunta31']) ? $_POST['pregunta31'] : 0;
    $pregunta32 = isset($_POST['pregunta32']) ? $_POST['pregunta32'] : 0;
    $pregunta33 = isset($_POST['pregunta33']) ? $_POST['pregunta33'] : 0;
    $pregunta34 = isset($_POST['pregunta34']) ? $_POST['pregunta34'] : 0;
    $pregunta35 = isset($_POST['pregunta35']) ? $_POST['pregunta35'] : 0;
    $pregunta36 = isset($_POST['pregunta36']) ? $_POST['pregunta36'] : 0;
    $pregunta37 = isset($_POST['pregunta37']) ? $_POST['pregunta37'] : 0;
    $pregunta38 = isset($_POST['pregunta38']) ? $_POST['pregunta38'] : 0;
    $pregunta39 = isset($_POST['pregunta39']) ? $_POST['pregunta39'] : 0;
    $pregunta40 = isset($_POST['pregunta40']) ? $_POST['pregunta40'] : 0;
    $pregunta41 = isset($_POST['pregunta41']) ? $_POST['pregunta41'] : 0;
    $pregunta42 = isset($_POST['pregunta42']) ? $_POST['pregunta42'] : 0;
    $pregunta43 = isset($_POST['pregunta43']) ? $_POST['pregunta43'] : 0;
    $pregunta44 = isset($_POST['pregunta44']) ? $_POST['pregunta44'] : 0;
    $pregunta45 = isset($_POST['pregunta45']) ? $_POST['pregunta45'] : 0;
    $pregunta46 = isset($_POST['pregunta46']) ? $_POST['pregunta46'] : 0;
    $pregunta47 = isset($_POST['pregunta47']) ? $_POST['pregunta47'] : 0;
    $pregunta48 = isset($_POST['pregunta48']) ? $_POST['pregunta48'] : 0;
    $pregunta49 = isset($_POST['pregunta49']) ? $_POST['pregunta49'] : 0;
    $pregunta50 = isset($_POST['pregunta50']) ? $_POST['pregunta50'] : 0;
    $pregunta51 = isset($_POST['pregunta51']) ? $_POST['pregunta51'] : 0;
    $pregunta52 = isset($_POST['pregunta52']) ? $_POST['pregunta52'] : 0;
    $pregunta53 = isset($_POST['pregunta53']) ? $_POST['pregunta53'] : 0;
    $pregunta54 = isset($_POST['pregunta54']) ? $_POST['pregunta54'] : 0;
    $pregunta55 = isset($_POST['pregunta55']) ? $_POST['pregunta55'] : 0;
    $pregunta56 = isset($_POST['pregunta56']) ? $_POST['pregunta56'] : 0;
    $pregunta57 = isset($_POST['pregunta57']) ? $_POST['pregunta57'] : 0;
    $pregunta58 = isset($_POST['pregunta58']) ? $_POST['pregunta58'] : 0;
    $pregunta59 = isset($_POST['pregunta59']) ? $_POST['pregunta59'] : 0;
    $pregunta60 = isset($_POST['pregunta60']) ? $_POST['pregunta60'] : 0;
    $pregunta61 = isset($_POST['pregunta61']) ? $_POST['pregunta61'] : 0;
    $pregunta62 = isset($_POST['pregunta62']) ? $_POST['pregunta62'] : 0;
    $pregunta63 = isset($_POST['pregunta63']) ? $_POST['pregunta63'] : 0;
    $pregunta64 = isset($_POST['pregunta64']) ? $_POST['pregunta64'] : 0;
    $pregunta65 = isset($_POST['pregunta65']) ? $_POST['pregunta65'] : 0;
    $pregunta66 = isset($_POST['pregunta66']) ? $_POST['pregunta66'] : 0;
    $pregunta67 = isset($_POST['pregunta67']) ? $_POST['pregunta67'] : 0;
    $pregunta68 = isset($_POST['pregunta68']) ? $_POST['pregunta68'] : 0;
    $pregunta69 = isset($_POST['pregunta69']) ? $_POST['pregunta69'] : 0;
    $pregunta70 = isset($_POST['pregunta70']) ? $_POST['pregunta70'] : 0;
    $pregunta71 = isset($_POST['pregunta71']) ? $_POST['pregunta71'] : 0;
    $pregunta72 = isset($_POST['pregunta72']) ? $_POST['pregunta72'] : 0;
    $pregunta73 = isset($_POST['pregunta73']) ? $_POST['pregunta73'] : 0;
    $pregunta74 = isset($_POST['pregunta74']) ? $_POST['pregunta74'] : 0;
    $pregunta75 = isset($_POST['pregunta75']) ? $_POST['pregunta75'] : 0;
    $pregunta76 = isset($_POST['pregunta76']) ? $_POST['pregunta76'] : 0;
    $pregunta77 = isset($_POST['pregunta77']) ? $_POST['pregunta77'] : 0;
    $pregunta78 = isset($_POST['pregunta78']) ? $_POST['pregunta78'] : 0;
    $pregunta79 = isset($_POST['pregunta79']) ? $_POST['pregunta79'] : 0;
    $pregunta80 = isset($_POST['pregunta80']) ? $_POST['pregunta80'] : 0;
    $pregunta81 = isset($_POST['pregunta81']) ? $_POST['pregunta81'] : 0;
    $pregunta82 = isset($_POST['pregunta82']) ? $_POST['pregunta82'] : 0;
    $pregunta83 = isset($_POST['pregunta83']) ? $_POST['pregunta83'] : 0;
    $pregunta84 = isset($_POST['pregunta84']) ? $_POST['pregunta84'] : 0;
    $pregunta85 = isset($_POST['pregunta85']) ? $_POST['pregunta85'] : 0;
    $pregunta86 = isset($_POST['pregunta86']) ? $_POST['pregunta86'] : 0;
    $pregunta87 = isset($_POST['pregunta87']) ? $_POST['pregunta87'] : 0;
    $pregunta88 = isset($_POST['pregunta88']) ? $_POST['pregunta88'] : 0;
    $pregunta89 = isset($_POST['pregunta89']) ? $_POST['pregunta89'] : 0;
    $pregunta90 = isset($_POST['pregunta90']) ? $_POST['pregunta90'] : 0;

    // Insertar datos en la base de datos
    $query = "INSERT INTO test (rut, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, pregunta7, pregunta8, pregunta9, pregunta10, pregunta11, pregunta12, pregunta13, pregunta14, pregunta15, pregunta16, pregunta17, pregunta18, pregunta19, pregunta20, pregunta21, pregunta22, pregunta23, pregunta24, pregunta25, pregunta26, pregunta27, pregunta28, pregunta29, pregunta30, pregunta31, pregunta32, pregunta33, pregunta34, pregunta35, pregunta36, pregunta37, pregunta38, pregunta39, pregunta40, pregunta41, pregunta42, pregunta43, pregunta44, pregunta45, pregunta46, pregunta47, pregunta48, pregunta49, pregunta50, pregunta51, pregunta52, pregunta53, pregunta54, pregunta55, pregunta56, pregunta57, pregunta58, pregunta59, pregunta60, pregunta61, pregunta62, pregunta63, pregunta64, pregunta65, pregunta66, pregunta67, pregunta68, pregunta69, pregunta70, pregunta71, pregunta72, pregunta73, pregunta74, pregunta75, pregunta76, pregunta77, pregunta78, pregunta79, pregunta80, pregunta81, pregunta82, pregunta83, pregunta84, pregunta85, pregunta86, pregunta87, pregunta88, pregunta89, pregunta90) 
    VALUES ('$rut', '$pregunta1', '$pregunta2', '$pregunta3', '$pregunta4', '$pregunta5', '$pregunta6', '$pregunta7', '$pregunta8', '$pregunta9', '$pregunta10', '$pregunta11', '$pregunta12', '$pregunta13', '$pregunta14', '$pregunta15', '$pregunta16', '$pregunta17', '$pregunta18', '$pregunta19', '$pregunta20', '$pregunta21', '$pregunta22', '$pregunta23', '$pregunta24', '$pregunta25', '$pregunta26', '$pregunta27', '$pregunta28', '$pregunta29', '$pregunta30', '$pregunta31', '$pregunta32', '$pregunta33', '$pregunta34', '$pregunta35', '$pregunta36', '$pregunta37', '$pregunta38', '$pregunta39', '$pregunta40', '$pregunta41', '$pregunta42', '$pregunta43', '$pregunta44', '$pregunta45', '$pregunta46', '$pregunta47', '$pregunta48', '$pregunta49', '$pregunta50', '$pregunta51', '$pregunta52', '$pregunta53', '$pregunta54', '$pregunta55', '$pregunta56', '$pregunta57', '$pregunta58', '$pregunta59', '$pregunta60', '$pregunta61', '$pregunta62', '$pregunta63', '$pregunta64', '$pregunta65', '$pregunta66', '$pregunta67', '$pregunta68', '$pregunta69', '$pregunta70', '$pregunta71', '$pregunta72', '$pregunta73', '$pregunta74', '$pregunta75', '$pregunta76', '$pregunta77', '$pregunta78', '$pregunta79', '$pregunta80', '$pregunta81', '$pregunta82', '$pregunta83', '$pregunta84', '$pregunta85', '$pregunta86', '$pregunta87', '$pregunta88', '$pregunta89', '$pregunta90')";
    $result = mysqli_query($conex, $query);

    //Suma Exterior
    $exterior1 = "SELECT pregunta2 + pregunta6 + pregunta13 + pregunta20 + pregunta56 + pregunta69 + pregunta71 + pregunta76 + pregunta81 AS exterior FROM test WHERE rut = '$rut'";
    $result1 = mysqli_query($conex, $exterior1);

    if (mysqli_num_rows($result1) > 0) {
      $row = mysqli_fetch_assoc($result1);
      $exterior = $row['exterior'];
    }

    //Suma mecanica
    $mecanica1 = "SELECT pregunta3 + pregunta19 + pregunta24 + pregunta32 + pregunta36 + pregunta57 + pregunta60 + pregunta65 + pregunta77 AS mecanica FROM test WHERE rut = '$rut'";
    $result2 = mysqli_query($conex, $mecanica1);

    if (mysqli_num_rows($result2) > 0) {
      $row = mysqli_fetch_assoc($result2);
      $mecanica = $row['mecanica'];
    }

    //Suma calculo
    $calculo1 = "SELECT pregunta17 + pregunta28 + pregunta29 + pregunta31 + pregunta44 + pregunta50 + pregunta61 + pregunta70 + pregunta80 AS calculo FROM test WHERE rut = '$rut'";
    $result3 = mysqli_query($conex, $calculo1);

    if (mysqli_num_rows($result3) > 0) {
      $row = mysqli_fetch_assoc($result3);
      $calculo = $row['calculo'];
    }

    //Suma cientifica
    $cientifica1 = "SELECT pregunta4 + pregunta8 + pregunta33 + pregunta38 + pregunta47 + pregunta49 + pregunta51 + pregunta75 + pregunta88 AS cientifica FROM test WHERE rut = '$rut'";
    $result4 = mysqli_query($conex, $cientifica1);

    if (mysqli_num_rows($result4) > 0) {
      $row = mysqli_fetch_assoc($result4);
      $cientifica = $row['cientifica'];
    }

    //Suma persuasiva
    $persuasiva1 = "SELECT pregunta5 + pregunta11 + pregunta18 + pregunta23 + pregunta40 + pregunta45 + pregunta48 + pregunta54 + pregunta67 AS persuasiva FROM test WHERE rut = '$rut'";
    $result5 = mysqli_query($conex, $persuasiva1);

    if (mysqli_num_rows($result5) > 0) {
      $row = mysqli_fetch_assoc($result5);
      $persuasiva = $row['persuasiva'];
    }

    //Suma artistica
    $artistica1 = "SELECT pregunta7 + pregunta9 + pregunta12 + pregunta16 + pregunta27 + pregunta42 + pregunta55 + pregunta78 + pregunta85 AS artistica FROM test WHERE rut = '$rut'";
    $result6 = mysqli_query($conex, $artistica1);

    if (mysqli_num_rows($result6) > 0) {
      $row = mysqli_fetch_assoc($result6);
      $artistica = $row['artistica'];
    }

    //Suma literaria
    $literaria1 = "SELECT pregunta10 + pregunta30 + pregunta35 + pregunta52 + pregunta53 + pregunta64 + pregunta82 + pregunta83 + pregunta89 AS literaria FROM test WHERE rut = '$rut'";
    $result7 = mysqli_query($conex, $literaria1);

    if (mysqli_num_rows($result7) > 0) {
      $row = mysqli_fetch_assoc($result7);
      $literaria = $row['literaria'];
    }

    //Suma musical
    $musical1 = "SELECT pregunta1 + pregunta15 + pregunta22 + pregunta37 + pregunta46 + pregunta58 + pregunta74 + pregunta79 + pregunta90 AS musical FROM test WHERE rut = '$rut'";
    $result8 = mysqli_query($conex, $musical1);

    if (mysqli_num_rows($result8) > 0) {
      $row = mysqli_fetch_assoc($result8);
      $musical = $row['musical'];
    }

    //Suma servicio social
    $social1 = "SELECT pregunta14 + pregunta21 + pregunta25 + pregunta34 + pregunta39 + pregunta59 + pregunta62 + pregunta63 + pregunta86 AS social FROM test WHERE rut = '$rut'";
    $result9 = mysqli_query($conex, $social1);

    if (mysqli_num_rows($result9) > 0) {
      $row = mysqli_fetch_assoc($result9);
      $social = $row['social'];
    }

    //Suma oficina
    $oficina1 = "SELECT pregunta26 + pregunta41 + pregunta43 + pregunta66 + pregunta68 + pregunta72 + pregunta73 + pregunta84 + pregunta87 AS oficina FROM test WHERE rut = '$rut'";
    $result10 = mysqli_query($conex, $oficina1);

    if (mysqli_num_rows($result10) > 0) {
      $row = mysqli_fetch_assoc($result10);
      $oficina = $row['oficina'];
    }

    //Insertar datos en la base de datos
    $query1 = "INSERT INTO resultados (rut, exterior, mecanica, calculo, cientifica, persuasiva, artistica, literaria, musical, social, oficina) 
    VALUES ('$rut', '$exterior', '$mecanica', '$calculo', '$cientifica', '$persuasiva', '$artistica', '$literaria', '$musical', '$social', '$oficina')";
    $result1 = mysqli_query($conex, $query1);

    // Cierra la conexión
    mysqli_close($conex);

    // Redirige a una página de confirmación
    header("Location: vistaUsuario.php?rut=$rut");
    exit;
  }
}

if (isset($_POST['reg_estudiante'])) {
  if (
      strlen($_POST['nombre']) >= 1 &&
      strlen($_POST['rut']) >= 1 &&
      strlen($_POST['contacto']) >= 1 &&
      strlen($_POST['nacimiento']) >= 1 &&
      strlen($_POST['colegio']) >= 1 &&
      strlen($_POST['curso']) >= 1
  ) {
      $nombre = trim($_POST['nombre']);
      $rut = trim($_POST['rut']);
      $contacto = trim($_POST['contacto']);
      $nacimiento = trim($_POST['nacimiento']);
      $colegio = trim($_POST['colegio']);
      $curso = trim($_POST['curso']);

      // Agregar datos a la tabla estudiantes
      $consulta = "INSERT INTO estudiantes (nombre, rut, contacto, nacimiento, colegio, curso)
                   VALUES ('$nombre', '$rut', '$contacto', '$nacimiento', '$colegio', '$curso')";

      $resultado = mysqli_query($conex, $consulta);

      if ($resultado) {
          mysqli_close($conex);
          header('Location: datos.php');
          exit();
      } else {
          echo "Error al insertar datos: " . mysqli_error($conex);
      }
  } else {
      echo "Por favor, complete todos los campos.";
  }
}
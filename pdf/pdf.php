<?php
//Configuracion de documento en PDF
ob_start();

require('formatopdf.php');

$html = ob_get_clean();

$imagePath = __DIR__ . '/../img/imagen2.jpg';
$imagePath1 = __DIR__ . '/../img/imagen1.jpg';
$imagePath2 = __DIR__ . '/../img/imagen3.jpg';
$imagePath3 = __DIR__ . '/../img/imagen4.jpg';

if (!file_exists($imagePath)) {
    echo "El archivo de imagen no existe en: $imagePath";
    exit;
}

$imageInfo = getimagesize($imagePath);
if ($imageInfo === false) {
    echo "No se puede obtener información de la imagen";
    exit;
}

if (!file_exists($imagePath1)) {
    echo "El archivo de imagen no existe en: $imagePath1";
    exit;
}

$imageInfo = getimagesize($imagePath1);
if ($imageInfo === false) {
    echo "No se puede obtener información de la imagen";
    exit;
}

$src = 'data:' . $imageInfo['mime'] . ';base64,' . base64_encode(file_get_contents($imagePath));

// Insertar la imagen en el HTML
$html = str_replace(
    '<div class="imagen-placeholder"></div>', 
    '<img src="' . $src . '" style="margin:-7%; width: 114%; height: 10%; max-width: 150%;" alt="Imagen UMAG">', 
    $html
);

$src = 'data:' . $imageInfo['mime'] . ';base64,' . base64_encode(file_get_contents($imagePath1));

// Insertar la imagen en el HTML
$html = str_replace(
    '<div class="imagen-placeholder1"></div>', 
    '<img src="' . $src . '" style="width: 40%; height: 25%; margin-top:5%; margin-left:-10%; margin-right:3%" alt="Imagen UMAG">', 
    $html
);

$src = 'data:' . $imageInfo['mime'] . ';base64,' . base64_encode(file_get_contents($imagePath2));

// Insertar la imagen en el HTML
$html = str_replace(
    '<div class="imagen-placeholder2"></div>', 
    '<img src="' . $src . '" style="width: 80%; height: 10%; margin-left:22%; margin-top:4%; margin-bottom::0" alt="Imagen UMAG">', 
    $html
);

$src = 'data:' . $imageInfo['mime'] . ';base64,' . base64_encode(file_get_contents($imagePath3));

// Insertar la imagen en el HTML
$html = str_replace(
    '<div class="imagen-placeholder3"></div>', 
    '<img src="' . $src . '" style="margin-top:-9%; margin-left:-24%; width: 147%; height: 18%;" alt="Imagen UMAG">', 
    $html
);

require '../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$options->set('margin_left', 0);
$options->set('margin_right', 0);
$options->set('margin_top', 0);
$options->set('margin_bottom', 0);
$dompdf->setOptions($options);

ini_set('memory_limit', '256M');

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("documento.pdf", array("Attachment" => false));
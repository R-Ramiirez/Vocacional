<?php
//Configuracion de documento en PDF
ob_start();

require('formatopdf.php');

$html = ob_get_clean();

$imagePaths = [
    'imagen-placeholder' => __DIR__ . '/../img/imagen2.jpg',
    'imagen-placeholder1' => __DIR__ . '/../img/imagen1.jpg',
    'imagen-placeholder2' => __DIR__ . '/../img/imagen3.jpg',
    'imagen-placeholder3' => __DIR__ . '/../img/imagen4.jpg'
];

foreach ($imagePaths as $placeholder => $imagePath) {
    if (!file_exists($imagePath)) {
        echo "El archivo de imagen no existe en: $imagePath";
        exit;
    }

    $imageInfo = getimagesize($imagePath);
    if ($imageInfo === false) {
        echo "No se puede obtener información de la imagen en: $imagePath";
        exit;
    }

    $src = 'data:' . $imageInfo['mime'] . ';base64,' . base64_encode(file_get_contents($imagePath));

    switch ($placeholder) {
        case 'imagen-placeholder':
            $html = str_replace(
                '<div class="imagen-placeholder"></div>', 
                '<img src="' . $src . '" style="margin:-7%; width: 114%; height: 10%; max-width: 150%;" alt="Imagen UMAG">', 
                $html
            );
            break;
        case 'imagen-placeholder1':
            $html = str_replace(
                '<div class="imagen-placeholder1"></div>', 
                '<img src="' . $src . '" style="width: 40%; height: 25%; margin-top:5%; margin-left:-10%; margin-right:3%" alt="Imagen UMAG">', 
                $html
            );
            break;
        case 'imagen-placeholder2':
            $html = str_replace(
                '<div class="imagen-placeholder2"></div>', 
                '<img src="' . $src . '" style="width: 80%; height: 10%; margin-left:22%; margin-top:4%; margin-bottom:0" alt="Imagen UMAG">', 
                $html
            );
            break;
        case 'imagen-placeholder3':
            $html = str_replace(
                '<div class="imagen-placeholder3"></div>', 
                '<img src="' . $src . '" style="margin-top:-9%; margin-left:-24%; width: 147%; height: 18%;" alt="Imagen UMAG">', 
                $html
            );
            break;
    }
}

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
?>
<?php
require '../vendor/autoload.php';


use Dompdf\Dompdf;
use Dompdf\Options;

ob_start();

$id_facture= filter_input(INPUT_GET, 'idfacture', FILTER_SANITIZE_NUMBER_INT);
include '../front/devis_pdf.php';
$html = ob_get_clean();


$options = new Options();
$options->set('defaultFont', 'Arial');
$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream('devis.pdf', array('Attachment' => 0));

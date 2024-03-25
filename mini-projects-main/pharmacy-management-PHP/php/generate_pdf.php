<?php
// Include the mpdf library
require_once __DIR__ . '/vendor/autoload.php';
require('fpdf.php');
$filename = "mpdf.pdf";
if (file_exists($filename)) {
   header('Content-type: application/force-download');
   header('Content-Disposition: attachment; filename='.$filename);
   readfile($filename);
}
$mpdf = new \Mpdf\Mpdf();

// Get the HTML content to be printed as PDF
$html = file_get_contents("http://localhost/print-html-as-pdf");

// Add the HTML content to the PDF
$mpdf->WriteHTML($html);

// Output the generated PDF file
$mpdf->Output("output.pdf", "D");
?>
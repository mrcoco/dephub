<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function pdf_create($html, $filename, $stream=TRUE) {
    require_once(APPPATH."/third_party/pdf/dompdf_config.inc.php");
    require_once(APPPATH."/third_party/pdf/dompdf_config.custom.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper("A4", "portrait" );
    $dompdf->render();
    $dompdf->stream($filename . ".pdf");
}

function pdf_landscape($html, $filename, $stream=TRUE) {
    require_once(APPPATH."/third_party/pdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper("A4", "landscape" );
    $dompdf->render();
    $dompdf->stream($filename . ".pdf");
}
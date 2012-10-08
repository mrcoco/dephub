<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    
/*
* Subject          : Export pdf using dompdf
* Author           : Sanjay
* Version          : CodeIgniter_2.0.3
* Warning         : Any change in this file may cause abnormal behaviour of application.
*
*/

function pdf_create($html, $filename, $stream=TRUE) {
    require_once("/application/third_party/pdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper("A4", "portrait" );
    $dompdf->render();
    $dompdf->stream($filename . ".pdf");
}

function pdf_landscape($html, $filename, $stream=TRUE) {
    require_once("/application/third_party/pdf/dompdf_config.inc.php");
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper("A4", "landscape" );
    $dompdf->render();
    $dompdf->stream($filename . ".pdf");
}
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

function pdf_create($html, $filename, $stream=TRUE) 
{
    require_once("dompdf/dompdf_config.inc.php");

    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper("a4", "portrait" );
    $dompdf->render();
    $dompdf->stream($filename . ".pdf");
}

?>

<?php
          $HTML=ob_get_clean();
    require_once("../../libs/autoload.inc.php");
    use Dompdf\Dompdf;
    $dompdf= new Dompdf();

    ob_start(); //iniciamos un output buffer
    require_once('certificados1.php'); // llamamos el archivo que se supone contiene el html y dejamoso que se renderize
    $dompdf->load_html(ob_get_clean());//y ponemos todo lo que se capturo con ob_start() para que sea capturado por DOMPDF

    $dompdf->set_paper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream('Certificado_Labor_Social.pdf');
?>

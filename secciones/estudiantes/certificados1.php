<?php
include("../../bd.php");

if(isset( $_GET['txtID'] )){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT *,(SELECT nombredeltrabajo 
    FROM tbl_trabajo 
    WHERE tbl_trabajo.id=tbl_empleados.idtrabajo limit 1) as trabajo  
    FROM tbl_empleados WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $primernombre=$registro["primernombre"];
    $segundonombre=$registro["segundonombre"];
    $primerapellido=$registro["primerapellido"];
    $segundoapellido=$registro["segundoapellido"];

    $nombreCompleto=$primernombre." ".$segundonombre." ".$primerapellido." ".$segundoapellido;

    $identificacion=$registro["identificacion"];

    $idtrabajo=$registro["idtrabajo"];
    $trabajo=$registro["trabajo"];

    
    $grado=$registro["grado"];
    $horas=$registro["horas"];
    }
    ?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Certificado</title>
        
    </head>
    <body>
    <div>
    <div style="clear:both;">
        <table cellspacing="0" cellpadding="0" style="width:105.7%; border:0.75pt solid #000000; border-collapse:collapse;">
            <tbody>
                <tr style="height:26.6pt;">
                    <td rowspan="2" style="width:12.04%; border-right-style:solid; border-right-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:top;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:150%; font-size:10pt;"><span style="height:0pt; text-align:left; display:block; position:absolute; z-index:-65536;"><img src="data:image/jpeg;base64,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" width="58" height="50" alt="Descripción: escudo2 copia" style="margin: 0 0 0 auto; display: block; "></span><span style="font-family:Arial;">&nbsp;</span></p>
                    </td>
                    <td style="width:76.68%; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle; background-color:#d9d9d9;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; widows:0; orphans:0; font-size:16pt;"><strong><span style="font-family:'Berlin Sans FB Demi';">COLEGIO FILIPENSE</span></strong></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:6pt;"><strong><span style="font-family:'Berlin Sans FB Demi';">IPIALES &ndash; NARI&Ntilde;O</span></strong></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:7pt;"><span style="font-family:'Berlin Sans FB Demi';">Resoluci&oacute;n Oficial No. 1029 de Diciembre 19 de 2011</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:7pt;"><strong><span style="font-family:'Berlin Sans FB Demi';">NIT: 891380014-5</span></strong></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:6pt;"><strong><span style="font-family:'Berlin Sans FB Demi';">&nbsp;</span></strong></p>
                    </td>
                    <td rowspan="2" style="width:11.28%; border-left-style:solid; border-left-width:0.75pt; border-bottom-style:solid; border-bottom-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:5pt;"><span style="font-family:Arial;">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:5pt;"><span style="font-family:Arial;">&nbsp;</span></p>
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:5pt;"><span style="font-family:Arial;">VERSI&Oacute;N 2</span></p>
                        <p style="margin-top:0pt; margin-left:5.1pt; margin-bottom:0pt; text-align:right; font-size:5pt;"><span style="font-family:Arial;">P&aacute;gina 1 de 2</span></p>
                    </td>
                </tr>
                <tr style="height:13.05pt;">
                    <td style="width:76.68%; border-top-style:solid; border-top-width:0.75pt; border-right-style:solid; border-right-width:0.75pt; border-left-style:solid; border-left-width:0.75pt; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><strong><span style="font-family:'Berlin Sans FB Demi';">INFORMACION</span></strong></p>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    </div>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;"><strong><?php echo date('d M Y');?></strong></p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    
   
    <p style="margin-top:0pt; margin-bottom:0pt;">El(la) estudiante <strong><?php echo $nombreCompleto; ?></strong> del grado <strong><?php echo $grado; ?></strong>, entrega certificado de Trabajo Social, realizado en <strong><?php echo $trabajo; ?></strong> con una intensidad horaria de <strong><?php echo $horas; ?> horas</strong>, dicha acta reposa en los archivos de secretaria.</p>
   <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
     <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:7.5pt; text-align:justify; line-height:115%; background-color:#ffffff;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:7.5pt; text-align:justify; line-height:115%; background-color:#ffffff;">&nbsp;&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:7.5pt; text-align:justify; line-height:115%; background-color:#ffffff;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:7.5pt; text-align:justify; line-height:115%; background-color:#ffffff;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:7.5pt; text-align:justify; line-height:115%; background-color:#ffffff;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:7.5pt; text-align:justify; line-height:115%; background-color:#ffffff;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:7.5pt; text-align:justify; line-height:115%; background-color:#ffffff;">&nbsp;</p>
     <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    
    <p style="margin-top:0pt; margin-bottom:0pt;">Darlys Bedoya</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">Secretaria</p>
    <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; line-height:115%;">&nbsp;</p>
    <p style="margin-top:14pt; margin-left:36pt; margin-bottom:14pt; text-align:justify; line-height:115%;">&nbsp;</p>
        <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
        <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
   <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
        <div style="clear:both;">
        <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-family:'Berlin Sans FB Demi';">Carrera 4 No. 13-26.</span><span style="font-family:'Berlin Sans FB Demi';">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-family:'Berlin Sans FB Demi';">Telef</span><span style="font-family:'Berlin Sans FB Demi';">&nbsp;&nbsp;</span><span style="font-family:'Berlin Sans FB Demi';">77578074</span></p>
        <p style="margin-top:0pt; margin-bottom:0pt;">&nbsp;</p>
    </div>
</div>
    </body>
    </html>

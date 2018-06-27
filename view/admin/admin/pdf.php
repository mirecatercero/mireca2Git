<?php
  include_once('lib/pdf/mpdf.php');
  $html = '<p>Holaa<p>';
  $mpdf = new mPDF('c','A4');
  $mpdf->writeHTML($html);
  $mpdf->Output('reporte.pdf','I');
 ?>

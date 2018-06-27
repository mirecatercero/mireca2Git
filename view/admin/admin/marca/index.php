<?php
include("../../hotel.class.php");
include("../header.php");
$web= new Hotel;
$hoteles=$web->hoteles(); //Arreglo generado apartir de cualquier consulta
$tablafinal = $web->tablaDatos($hoteles);
print_r($tablafinal);
?>


<?php
include("../footer.php");
$mail = 'benjiilopez@gmail.com';
$credenciales = $web->credenciales($mail);
echo "<pre>";
print_r($credenciales);
?>
<a href="form.php"> Nuevo Hotel </a>

<?php
include("../../consultorio.class.php");
$mireca= new Consultorio;
$mireca -> conexion();

if(isset($_POST['idsubsecuente'])){
  $id=$_POST['idsubsecuente'];
  $consulta = "DELETE FROM `subsecuente` WHERE idsubsecuente = $id;)";
  $mireca->sqlArray($consulta);
  //echo json_encode($filas);



}else {
      echo "PROBLEMA CON POST";
  }
 ?>

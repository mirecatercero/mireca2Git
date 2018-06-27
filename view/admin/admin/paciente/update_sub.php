<?php
include("../../consultorio.class.php");
$mireca= new Consultorio;
$mireca -> conexion();

if(isset($_POST['idsubsecuente']) && isset($_POST['nota'])){
  $id=$_POST['idsubsecuente'];
  $nota = $_POST['nota'];

  $consulta = "UPDATE subsecuente SET nota ='$nota' WHERE idsubsecuente = $id;)";
  $mireca->sqlArray($consulta);
  //echo json_encode($filas);



}else {
      echo "PROBLEMA CON POST";
  }
 ?>

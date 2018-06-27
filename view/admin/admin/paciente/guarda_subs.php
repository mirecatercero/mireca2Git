<?php
include("../../consultorio.class.php");
$mireca= new Consultorio;
$mireca -> conexion();

if(isset($_POST['idpaciente']) && isset($_POST['nota'])){
  $id=$_POST['idpaciente'];
  $nota = $_POST['nota'];
  $fecha = date('Y-m-d H:i:s');

  $consulta = "INSERT INTO subsecuente(idpaciente, fecha, nota) VALUES ($id,'$fecha','$nota')";
  $array = $mireca -> sqlArray($consulta);
  echo json_encode($array);




}else {
    echo "no existe variable ID o nota";
  }
 ?>

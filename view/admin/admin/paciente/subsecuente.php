<?php
include("../../consultorio.class.php");
$mireca= new Consultorio;
$mireca -> conexion();

if(isset($_POST['id'])){
  $id=$_POST['id'];

    if(is_numeric($id)){
      $consulta = "SELECT s.idsubsecuente,s.idpaciente,s.nota,s.fecha,p.nombre FROM subsecuente s
      join paciente p on s.idpaciente = p.idpaciente where s.idpaciente = $id;";
      $array = $mireca -> sqlArray($consulta);
      echo json_encode($array);


    }else {
      echo "no es numerico";
    }

}else {
    echo "no existe variable ID";
  }
 ?>

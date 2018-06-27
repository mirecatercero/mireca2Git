<?php
  include("../../consultorio.class.php");
  $mireca=new Consultorio;
  $mireca->conexion();
  $salida="";
  $query="select idpaciente, nombre, fecha from paciente";

  if (isset($_POST['consulta'])) {
    $q = $_POST['consulta'];
    $query="select idpaciente,nombre, fecha from paciente where nombre like '%$q%'";
  }
  $array = $mireca->sqlArray($query);
  if (!Empty($array)) {
    $tabla=$mireca->tablaDatos($array);
    print_r($tabla);
  }else {
    echo "<div style='color:white;'>NO ENCONTRAMOS INFORMACIÓN AL RESPECTO :(</div>";
  }


 ?>

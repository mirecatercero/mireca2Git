<?php
  ob_start();
  include("../consultorio.class.php");
  $consultorio = new Consultorio;
  $nombre = $_POST['nombre'];
  $edad = $_POST['edad'];
  $genero = $_POST['genero'];
  $civil = $_POST['civil'];
  $domicilio = $_POST['direccion'];
  $tel = $_POST['telefono'];
  $email = $_POST['email'];
  $ocupacion = $_POST['ocupacion'];
  $diabetes = $_POST['diabetes'];
  $hiper = $_POST['hiper'];
  $convul = $_POST['convul'];
  $cirujias = $_POST['cirujias'];
  $cancer = $_POST['cancer'];
  $fracturas = $_POST['fracturas'];
  $coment_app = $_POST['comentario_app'];
  $alergicos = $_POST['alergicos'];
  $toxico = $_POST['toxico'];
  $ejer = $_POST['ejer'];
  $diabetesahf = $_POST['diabetesahf'];
  $hiperahf = $_POST['hiperahf'];
  $convulahf = $_POST['convulahf'];
  $malfcon = $_POST['malfcon'];
  $demencia = $_POST['demencia'];
  $cancerahf = $_POST['cancerahf'];
  $artritis = $_POST['artritis'];
  $cardio = $_POST['cardio'];
  $comentario_ahf = $_POST['comentario_ahf'];
  $tiempo_pa = $_POST['tiempo_pa'];
  $sintomas = $_POST['sintomas'];
  $diagnostico = $_POST['diagnostico'];
  $tratamiento = $_POST['tratamiento'];

  $palabra = "theppcdsalvckaszz";
  $idapp = strtoupper(substr(md5($palabra.rand(1,1000000)), 1,10));
  $idapnp = strtoupper(substr(md5($palabra.rand(1,1000000)), 1,10));
  $idahf = strtoupper(substr(md5($palabra.rand(1,1000000)), 1,10));
  $idpa = strtoupper(substr(md5($palabra.rand(1,1000000)), 1,10));
  $idsuperior = strtoupper(substr(md5($palabra.rand(1,1000000)), 1,10));
  $idinferior = strtoupper(substr(md5($palabra.rand(1,1000000)), 1,10));
  $idmarcha = strtoupper(substr(md5($palabra.rand(1,1000000)), 1,10));
  $idcolumna = strtoupper(substr(md5($palabra.rand(1,1000000)), 1,10));
  $sqlapp = "INSERT INTO `app`(`idapp`, `diabetes`, `hipertension`, `convulsiones`, `cirujias`, `cancer`, `fracturas`, `observacion_app`) VALUES ('$idapp','$diabetes','$hiper','$convul','$cirujias','$cancer','$fracturas','$coment_app')";
  $sqlapnp = "INSERT INTO `apnp`(`idapnp`, `alergicos`, `toxicomanias`, `ejercicios`) VALUES ('$idapnp','$alergicos','$toxico','$ejer')";
  $sqlpa = "INSERT INTO `pa`(`idpa`, `tiempo_pa`, `sintomas`) VALUES ('$idpa','$tiempo_pa','$sintomas')";
  $sqlahf = "INSERT INTO `ahf`(`idahf`, `diabetes`, `hipertension`, `convulsiones`, `malf_cong`, `demecia`, `cancer`, `artritis`, `cardiopatia`, `observacion_ahf`) VALUES ('$idahf','$diabetesahf','$hiperahf','$convulahf','$malfcon','$demencia','$cancerahf','$artritis','$cardio','$comentario_ahf')";

  $sqlmarcha = "INSERT INTO `marcha`(`idmarcha`, `normal`, `alterada`, `dependiente`, `espastica`, `ataxica`, `paretica`, `claudicante`) VALUES ('$idmarcha','".$_POST["marcha_normal"]."','".$_POST["marcha_alterada"]."','".$_POST["marcha_dependiente"]."','".$_POST["marcha_espastica"]."','".$_POST["marcha_ataxica"]."','".$_POST["marcha_paretica"]."','".$_POST["marcha_claudicante"]."')";

  $sqlsuperior = "INSERT INTO `superior`(`idsuperior`, `lado_hombro`, `movimiento_hombro`, `fuerza_hombro`, `reflejos_hombro`, `sensibilidad_hombro`, `deformidad_hombro`, `signos_hombro`, `lado_codo`, `movimiento_codo`, `fuerza_codo`, `reflejos_codo`, `sensibilidad_codo`, `deformidad_codo`, `signos_codo`, `lado_muneca`, `movimiento_muneca`, `fuerza_muneca`, `reflejos_muneca`, `sensibilidad_muneca`, `deformidad_muneca`, `signos_muneca`, `lado_manos`, `movimiento_manos`, `fuerza_manos`, `reflejos_manos`, `sensibilidad_manos`, `deformidad_manos`, `signos_manos`, `lado_dedos`,`movimiento_dedos`, `fuerza_dedos`, `reflejos_dedos`, `sensibilidad_dedos`, `deformidad_dedos`, `signos_dedos`) VALUES ('$idsuperior','".$_POST["lado_hombro"]."','".$_POST["movimiento_hombro"]."','".$_POST["fuerza_hombro"]."','".$_POST["reflejos_hombro"]."','".$_POST["sensibilidad_hombro"]."','".$_POST["deformidad_hombro"]."','".$_POST["signos_hombro"]."','".$_POST["lado_codo"]."','".$_POST["movimiento_codo"]."','".$_POST["fuerza_codo"]."','".$_POST["reflejos_codo"]."','".$_POST["sensibilidad_codo"]."','".$_POST["deformidad_codo"]."','".$_POST["signos_codo"]."','".$_POST["lado_muneca"]."','".$_POST["movimiento_muneca"]."','".$_POST["fuerza_muneca"]."','".$_POST["reflejos_muneca"]."','".$_POST["sensibilidad_muneca"]."','".$_POST["deformidad_muneca"]."','".$_POST["signos_muneca"]."','".$_POST["lado_manos"]."','".$_POST["movimiento_manos"]."','".$_POST["fuerza_manos"]."','".$_POST["reflejos_manos"]."','".$_POST["sensibilidad_manos"]."','".$_POST["deformidad_manos"]."','".$_POST["signos_manos"]."','".$_POST["lado_dedos"]."','".$_POST["movimiento_dedos"]."','".$_POST["fuerza_dedos"]."','".$_POST["reflejos_dedos"]."','".$_POST["sensibilidad_dedos"]."','".$_POST["deformidad_dedos"]."','".$_POST["signos_dedos"]."')";

  $sqlinferior = "INSERT INTO `inferior`(`idinferior`, `lado_cadera`,`movimiento_cadera`, `fuerza_cadera`, `reflejos_cadera`, `sensibilidad_cadera`, `deformidad_cadera`, `signos_cadera`, `lado_rodilla`, `movimiento_rodilla`, `fuerza_rodilla`, `reflejos_rodilla`, `sensibilidad_rodilla`, `deformidad_rodilla`, `signos_rodilla`, `lado_tobillo`, `movimiento_tobillo`, `fuerza_tobillo`, `reflejos_tobillo`, `sensibilidad_tobillo`, `deformidad_tobillo`, `signos_tobillo`, `lado_pies`, `movimiento_pies`, `fuerza_pies`, `reflejos_pies`, `sensibilidad_pies`, `deformidad_pies`, `signos_pies`) VALUES ('$idinferior','".$_POST["lado_cadera"]."','".$_POST["movimiento_cadera"]."','".$_POST["fuerza_cadera"]."','".$_POST["reflejos_cadera"]."','".$_POST["sensibilidad_cadera"]."','".$_POST["deformidad_cadera"]."','".$_POST["signos_cadera"]."','".$_POST["lado_rodilla"]."','".$_POST["movimiento_rodilla"]."','".$_POST["fuerza_rodilla"]."','".$_POST["reflejos_rodilla"]."','".$_POST["sensibilidad_rodilla"]."','".$_POST["deformidad_rodilla"]."','".$_POST["signos_rodilla"]."','".$_POST["lado_tobillo"]."','".$_POST["movimiento_tobillo"]."','".$_POST["fuerza_tobillo"]."','".$_POST["reflejos_tobillo"]."','".$_POST["sensibilidad_tobillo"]."','".$_POST["deformidad_tobillo"]."','".$_POST["signos_tobillo"]."','".$_POST["lado_pies"]."','".$_POST["movimiento_pies"]."','".$_POST["fuerza_pies"]."','".$_POST["reflejos_pies"]."','".$_POST["sensibilidad_pies"]."','".$_POST["deformidad_pies"]."','".$_POST["signos_pies"]."')";

  $sqlcolumna = "INSERT INTO `columna`(`idcolumna`, `tipo_cervical`, `hiper_cervical`, `xifo_cervical`, `esco_cervical`, `lio_dorsal`, `hiper_dorsal`, `esco_dorsal`, `tipo_lumbar`, `hiper_lumbar`, `xifo_lumbar`, `esco_lumbar`) VALUES ('$idcolumna','".$_POST["tipo_cervical"]."','".$_POST["hiper_cervical"]."','".$_POST["xifo_cervical"]."','".$_POST["esco_cervical"]."','".$_POST["lio_dorsal"]."','".$_POST["hiper_dorsal"]."','".$_POST["esco_dorsal"]."','".$_POST["tipo_lumbar"]."','".$_POST["hiper_lumbar"]."','".$_POST["xifo_lumbar"]."','".$_POST["esco_lumbar"]."')";


  $consultorio->sqlArray($sqlapp);
  $consultorio->sqlArray($sqlapnp);
  $consultorio->sqlArray($sqlpa);
  $consultorio->sqlArray($sqlahf);
  $consultorio->sqlArray($sqlmarcha);
  $consultorio->sqlArray($sqlsuperior);
  $consultorio->sqlArray($sqlinferior);
  $consultorio->sqlArray($sqlcolumna);
  $fecha = date('Y-m-d H:i:s');
  $sqlpaciente = "INSERT INTO `paciente`(`nombre`, `idgenero`, `edad`, `direccion`, `email`, `telefono`, `ocupacion`, `idcivil`, `fecha`, `idapnp`, `idapp`, `idahf`, `idpa`, `diagnostico`, `tratamiento`, `idmarcha`, `idsuperior`, `idinferior`, `idcolumna`) VALUES ('$nombre','$genero','$edad','$domicilio','$email','$tel','$ocupacion','$civil','$fecha','$idapnp','$idapp','$idahf','$idpa','$diagnostico','$tratamiento','$idmarcha','$idsuperior','$idinferior','$idcolumna')";
  $filas = $consultorio->db->exec($sqlpaciente);
  if($filas==1){
    header("Location:ver_pacientes.php"); //redirigir el flujo a este archivo
  }else{
    die("No se pudo eliminar el registro");
  }
  ob_end_flush();
 ?>

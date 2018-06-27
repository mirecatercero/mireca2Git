<?php
  ob_start();
 	include('../../consultorio.class.php');
  $consultorio = new Consultorio;

  $nombre = $_POST['nombre'];
  $edad = $_POST['edad'];
  $genero = $_POST['genero'];
  $civil = $_POST['civil'];
  $domicilio = $_POST['direccion'];
  $telefono = $_POST['telefono'];
  $email = $_POST['email'];
  $ocupacion = $_POST['ocupacion'];
  $diabetes = $_POST['diabetes'];
  $hiper = $_POST['hipertension'];
  $convul = $_POST['convulsiones'];
  $cirujias = $_POST['cirujias'];
  $cancer = $_POST['cancer'];
  $fracturas = $_POST['fracturas'];
  $coment_app = $_POST['comentario_app'];
  $alergicos = $_POST['alergicos'];
  $toxico = $_POST['toxico'];
  $ejer = $_POST['ejer'];
  $diabetesahf = $_POST['diabetes_ahf'];
  $hiperahf = $_POST['hipertension_ahf'];
  $convulahf = $_POST['convulsiones_ahf'];
  $malfcon = $_POST['malf_cong'];
  $demencia = $_POST['demencia'];
  $cancerahf = $_POST['cancer_ahf'];
  $artritis = $_POST['artritis_ahf'];
  $cardio = $_POST['cardiopatia'];
  $comentario_ahf = $_POST['comentario_ahf'];
  $tiempo_pa = $_POST['tiempo_pa'];
  $sintomas = $_POST['sintomas'];
  $diagnostico = $_POST['diagnostico'];
  $tratamiento = $_POST['tratamiento'];
  $idpaciente = $_POST['idpaciente'];
  $idapp = $_POST['idapp'];
  $idapnp = $_POST['idapnp'];
  $idahf = $_POST['idahf'];
  $idpa = $_POST['idpa'];
  //print_r($_POST);
  $app = "UPDATE `app` SET `diabetes`='$diabetes',`hipertension`='$hiper',`convulsiones`='$convul',`cirujias`='$cirujias',`cancer`='$cancer',`fracturas`='$fracturas',`observacion_app`='$coment_app' WHERE idapp = '$idapp'";
  $apnp = "UPDATE `apnp` SET `alergicos`='$alergicos',`toxicomanias`='$toxico',`ejercicios`='$ejer' WHERE idapnp = '$idapnp'";
  $ahf = "UPDATE `ahf` SET `diabetes`='$diabetesahf',`hipertension`='$hiperahf',`convulsiones`='$convulahf',`malf_cong`='$malfcon',`demecia`='$demencia',`cancer`='$cancerahf',`artritis`='$artritis',`cardiopatia`='$cardio',`observacion_ahf`='$comentario_ahf' WHERE idahf = '$idahf'";
  $pa = "UPDATE `pa` SET `tiempo_pa`='$tiempo_pa',`sintomas`='$sintomas' WHERE idpa = '$idpa'";

  $superior = "UPDATE `superior` SET `lado_hombro`='".$_POST["lado_hombro"]."',`movimiento_hombro`='".$_POST["movimiento_hombro"]."',`fuerza_hombro`='".$_POST["fuerza_hombro"]."',`reflejos_hombro`='".$_POST["reflejos_hombro"]."',`sensibilidad_hombro`='".$_POST["sensibilidad_hombro"]."',`deformidad_hombro`='".$_POST["deformidad_hombro"]."',`signos_hombro`='".$_POST["signos_hombro"]."',`lado_codo`='".$_POST["lado_codo"]."',`movimiento_codo`='".$_POST["movimiento_codo"]."',`fuerza_codo`='".$_POST["fuerza_codo"]."',`reflejos_codo`='".$_POST["reflejos_codo"]."',`sensibilidad_codo`='".$_POST["sensibilidad_codo"]."',`deformidad_codo`='".$_POST["deformidad_codo"]."',`signos_codo`='".$_POST["signos_codo"]."',`lado_muneca`='".$_POST["lado_muneca"]."',`movimiento_muneca`='".$_POST["movimiento_muneca"]."',`fuerza_muneca`='".$_POST["fuerza_muneca"]."',`reflejos_muneca`='".$_POST["reflejos_muneca"]."',`sensibilidad_muneca`='".$_POST["sensibilidad_muneca"]."',`deformidad_muneca`='".$_POST["deformidad_muneca"]."',`signos_muneca`='".$_POST["signos_muneca"]."',`lado_manos`='".$_POST["lado_manos"]."',`movimiento_manos`='".$_POST["movimiento_manos"]."',`fuerza_manos`='".$_POST["fuerza_manos"]."',`reflejos_manos`='".$_POST["reflejos_manos"]."',`sensibilidad_manos`='".$_POST["sensibilidad_manos"]."',`deformidad_manos`='".$_POST["deformidad_manos"]."',`signos_manos`='".$_POST["signos_manos"]."',`lado_dedos`='".$_POST["lado_dedos"]."',`movimiento_dedos`='".$_POST["movimiento_dedos"]."',`fuerza_dedos`='".$_POST["fuerza_dedos"]."',`reflejos_dedos`='".$_POST["reflejos_dedos"]."',`sensibilidad_dedos`='".$_POST["sensibilidad_dedos"]."',`deformidad_dedos`='".$_POST["deformidad_dedos"]."',`signos_dedos`='".$_POST["signos_dedos"]."' WHERE idsuperior = '".$_POST["idsuperior"]."'";

  $inferior = "UPDATE `inferior` SET `lado_cadera`='".$_POST["lado_cadera"]."',`movimiento_cadera`='".$_POST["movimiento_cadera"]."',`fuerza_cadera`='".$_POST["fuerza_cadera"]."',`reflejos_cadera`='".$_POST["reflejos_cadera"]."',`sensibilidad_cadera`='".$_POST["sensibilidad_cadera"]."',`deformidad_cadera`='".$_POST["deformidad_cadera"]."',`signos_cadera`='".$_POST["signos_cadera"]."',`lado_rodilla`='".$_POST["lado_rodilla"]."',`movimiento_rodilla`='".$_POST["movimiento_rodilla"]."',`fuerza_rodilla`='".$_POST["fuerza_rodilla"]."',`reflejos_rodilla`='".$_POST["reflejos_rodilla"]."',`sensibilidad_rodilla`='".$_POST["sensibilidad_rodilla"]."',`deformidad_rodilla`='".$_POST["deformidad_rodilla"]."',`signos_rodilla`='".$_POST["signos_rodilla"]."',`lado_tobillo`='".$_POST["lado_tobillo"]."',`movimiento_tobillo`='".$_POST["movimiento_tobillo"]."',`fuerza_tobillo`='".$_POST["fuerza_tobillo"]."',`reflejos_tobillo`='".$_POST["reflejos_tobillo"]."',`sensibilidad_tobillo`='".$_POST["sensibilidad_tobillo"]."',`deformidad_tobillo`='".$_POST["deformidad_tobillo"]."',`signos_tobillo`='".$_POST["signos_tobillo"]."',`lado_pies`='".$_POST["lado_pies"]."',`movimiento_pies`='".$_POST["movimiento_pies"]."',`fuerza_pies`='".$_POST["fuerza_pies"]."',`reflejos_pies`='".$_POST["reflejos_pies"]."',`sensibilidad_pies`='".$_POST["sensibilidad_pies"]."',`deformidad_pies`='".$_POST["deformidad_pies"]."',`signos_pies`='".$_POST["signos_pies"]."' WHERE idinferior = '".$_POST["idinferior"]."'";

  $marcha = "UPDATE `marcha` SET `normal`='".$_POST["normal"]."',`alterada`='".$_POST["marcha_alterada"]."',`dependiente`='".$_POST["marcha_dependiente"]."',`espastica`='".$_POST["marcha_espastica"]."',`ataxica`='".$_POST["marcha_ataxica"]."',`paretica`='".$_POST["marcha_paretica"]."',`claudicante`='".$_POST["marcha_claudicante"]."' WHERE idmarcha = '".$_POST["idmarcha"]."'";


  $columna = "UPDATE `columna` SET `tipo_cervical`='".$_POST["tipo_cervical"]."',`hiper_cervical`='".$_POST["hiper_cervical"]."',`xifo_cervical`='".$_POST["xifo_cervical"]."',`esco_cervical`='".$_POST["esco_cervical"]."',`lio_dorsal`='".$_POST["lio_dorsal"]."',`hiper_dorsal`='".$_POST["hiper_dorsal"]."',`esco_dorsal`='".$_POST["esco_dorsal"]."',`tipo_lumbar`='".$_POST["tipo_lumbar"]."',`hiper_lumbar`='".$_POST["hiper_lumbar"]."',`xifo_lumbar`='".$_POST["xifo_lumbar"]."',`esco_lumbar`='".$_POST["esco_lumbar"]."' WHERE idcolumna = '".$_POST["idcolumna"]."'";

  $sql = "UPDATE `paciente` SET `nombre`='$nombre',`idgenero`='$genero',`edad`='$edad',`direccion`='$domicilio',`email`='$email',`telefono`='$telefono',`ocupacion`='$ocupacion',`idcivil`='$civil',`diagnostico`='$diagnostico',`tratamiento`='$tratamiento' WHERE idpaciente = '$idpaciente'";
  //echo $app;echo "<br>";
  //echo $apnp;echo "<br>";
  //echo $ahf;echo "<br>";
  //echo $pa;echo "<br>";
  //echo $sql;echo "<br>";
  $consultorio->sqlArray($app);
  $consultorio->sqlArray($apnp);
  $consultorio->sqlArray($ahf);
  $consultorio->sqlArray($pa);
  $consultorio->sqlArray($columna);
  $consultorio->sqlArray($marcha);
  $consultorio->sqlArray($superior);
  $consultorio->sqlArray($inferior);
  $filas = $consultorio->db->exec($sql);

  if($filas==0 || $filas==1){
    header("Location: ../ver_pacientes.php"); //redirigir el flujo a este archivo
  }else{
    die("No se pudo ACTUALIZAR el registro");
  }
  ob_end_flush();
?>

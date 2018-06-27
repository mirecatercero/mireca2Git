<?php ob_start();
include("../../consultorio.class.php");
$consultorio= new Consultorio;
$consultorio->conexion();
if(isset($_GET['id'])){
  $id=$_GET['id'];
  if(is_numeric($id)){
    $sql="SELECT p.idpaciente,pp.idapp,pada.idpa,anhf.idahf,apnop.idapnp, p.nombre, g.genero, p.edad, p.direccion, p.email, p.telefono, p.ocupacion, c.estado_civil,p.fecha, apnop.alergicos, apnop.ejercicios, apnop.toxicomanias, pp.cancer, pp.cirujias, pp.convulsiones, pp.diabetes, pp.fracturas, pp.hipertension, pp.observacion_app,pada.sintomas, pada.tiempo_pa, anhf.artritis as 'artritis_ahf', anhf.cancer as 'cancer_ahf',anhf.cardiopatia,anhf.convulsiones as 'convulsiones_ahf', anhf.demecia, anhf.diabetes as 'diabetes_ahf', anhf.hipertension as 'hipertension_ahf', anhf.malf_cong, anhf.observacion_ahf,p.diagnostico, p.tratamiento from paciente as p join ahf as anhf on p.idahf = anhf.idahf join pa as pada on p.idpa = pada.idpa join app as pp on p.idapp = pp.idapp join apnp as apnop on p.idapnp = apnop.idapnp join genero as g on p.idgenero = g.idgenero join civil as c on p.idcivil = c.idcivil where p.idpaciente=$id";
      $dato= $consultorio->sqlArray($sql);
      //echo "<pre>";
      //print_r($dato);
      $extremidades = "
                        SELECT su.idsuperior, su.lado_hombro,su.marcha_hombro,su.movimiento_hombro,su.fuerza_hombro,su.reflejos_hombro,su.sensibilidad_hombro, su.deformidad_hombro, su.signos_hombro, su.lado_codo, su.marcha_codo,su.movimiento_codo,su.fuerza_codo,su.reflejos_codo, su.sensibilidad_codo,su.deformidad_codo, su.signos_codo, su.lado_muneca, su.marcha_muneca, su.movimiento_muneca, su.fuerza_muneca,su.reflejos_muneca,su.sensibilidad_muneca, su.deformidad_muneca, su.signos_muneca, su.lado_manos, su.marcha_manos, su.movimiento_manos, su.fuerza_manos, su.reflejos_manos,su.sensibilidad_manos, su.deformidad_manos,su.signos_manos,su.lado_dedos,su.marcha_dedos,su.movimiento_dedos,su.fuerza_dedos,su.reflejos_dedos,su.sensibilidad_dedos, su.deformidad_dedos,su.signos_dedos,inf.idinferior, inf.lado_cadera, inf.marcha_cadera, inf.movimiento_cadera, inf.fuerza_cadera, inf.reflejos_cadera, inf.sensibilidad_cadera, inf.deformidad_cadera, inf.signos_cadera, inf.lado_rodilla, inf.marcha_rodilla, inf.movimiento_rodilla, inf.fuerza_rodilla, inf.reflejos_rodilla, inf.sensibilidad_rodilla, inf.deformidad_rodilla, inf.signos_rodilla, inf.lado_tobillo, inf.marcha_tobillo, inf.movimiento_tobillo, inf.fuerza_tobillo, inf.reflejos_tobillo, inf.sensibilidad_tobillo, inf.deformidad_tobillo, inf.signos_tobillo, inf.lado_pies, inf.marcha_pies, inf.movimiento_pies, inf.fuerza_pies, inf.reflejos_pies, inf.sensibilidad_pies, inf.deformidad_pies, inf.signos_pies,col.idcolumna, col.tipo_cervical, col.hiper_cervical, col.xifo_cervical, col.esco_cervical, col.lio_dorsal, col.hiper_dorsal, col.esco_dorsal, col.tipo_lumbar, col.hiper_lumbar, col.xifo_lumbar, col.esco_lumbar,m.idmarcha, m.normal, m.alterada, m.dependiente, m.espastica, m.ataxica, m.paretica, m.claudicante from paciente as p
                        join superior as su on p.idsuperior = su.idsuperior
                        join inferior as inf on p.idinferior = inf.idinferior
                        join columna as col on p.idcolumna = col.idcolumna
                        join marcha as m on p.idmarcha = m.idmarcha  where p.idpaciente=$id";
    $datoext = $consultorio->sqlArray($extremidades);

  }
  else{ die("Se requiere que sea numero");}
}
else{ die("Se requiere que este puesto");
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PDF</title>
    <link rel="stylesheet" href="estilos_pdf.css">
  </head>
  <body id="imagen">
        <br><br><br><br>
        <table class="tabla">
          <tr>
            <td>Paciente: </td>
            <td> <?php echo $dato[0]['nombre']; ?></td>
          </tr>
          <tr>
            <td>Edad:</td>
            <td> <?php echo $dato[0]['edad']; ?></td>
          </tr>
          <tr>
              <td>Fecha:</td>
              <td> <?php echo $dato[0]['fecha']; ?></td>
            </tr>
            <tr>
            <td>Dirección: </td>
            <td><?php echo $dato[0]['direccion']; ?></td>
          </tr>
          <tr>
            <td>Telefono: </td>
            <td><?php echo $dato[0]['telefono']; ?></td>
          </tr>
          <tr>
            <td>Ocupación: </td>
            <td><?php echo $dato[0]['ocupacion']; ?></td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><?php echo $dato[0]['email']; ?></td>
          </tr>
        </table>

        <table class="tabla_diag">
          <tr>
            <th>Diagnóstico</th>
          </tr>
          <tr>
            <td><?php echo $dato[0]['diagnostico']; ?><br><br><br></td>
          </tr>
          <tr>
            <th>Tratamiento</th>
          </tr>
          <tr>
            <td><?php echo $dato[0]['tratamiento']; ?><br></td>
          </tr>
        </table>

  </body>
</html>

<?php
  require_once("dompdf/dompdf_config.inc.php");
  $dompdf = new DOMPDF();
  $dompdf->load_html(ob_get_clean());
  $dompdf->render();
  $pdf = $dompdf->output();
  $filename = 'nombre.pdf';
  $dompdf->stream($filename, array("Attachment" => 0));
 ?>

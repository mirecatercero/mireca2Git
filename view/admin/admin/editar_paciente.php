<?php
	include("header.php");
	include("../consultorio.class.php");
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
<form action="paciente/actualizar.php" method="post">
 <div class="container" style="margin:3em;background-color:#DCDCDC;margin:1em;padding:5em;">
	 <div class="row">

			 <div class="col-md-4" style=" background-color:	#D3D3D3;margin:1%;">
					 <h2 class="text-center">Ficha de Identificación</h2><br>
					 <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo" value="<?php echo $dato[0]['nombre'] ?>"><br>
					 <input type="text" name="edad" class="form-control" placeholder="Edad" value="<?php echo $dato[0]['edad'] ?>"><br>

					 <label>Seleccione el genero: </label>
						 <select name="genero" >
						 <?php
						 $campo="genero";
						 $id="idgenero";
						 $sql="select $id,$campo from genero";
						 $seleccion = $dato[0]['genero'];
						 $consultorio->recOpciones($sql,$campo,$id,$seleccion);
							?>
					 </select><br><br><br>

					 <label>Seleccione el estado civil: </label>
						 <select name="civil">
						 <?php
						 $campo="estado_civil";
						 $id="idcivil";
						 $sql="select $id,$campo from civil";
						 $seleccion = $dato[0]['estado_civil'];
						 $consultorio->recOpciones($sql,$campo,$id,$seleccion);
							?>
					 </select><br><br><br>
					 <input type="text" name="direccion" class="form-control" placeholder="Domicilio" value="<?php echo $dato[0]['direccion'] ?>"><br>
					 <input type="text" name="telefono" class="form-control" placeholder="Telefono de Contacto" value="<?php echo $dato[0]['telefono'] ?>"><br>
					 <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $dato[0]['email'] ?>"><br>
					 <input type="text" name="ocupacion" class="form-control" placeholder="Ocupación" value="<?php echo $dato[0]['ocupacion'] ?>"><br>
			 </div>

			 <div class="col-md-4"  style="margin:1%;background-color:#D3D3D3;">
				 <h5 class="text-center">Antescedentes Personales Patológicos</h5><br>
				 <table class="table">
					 <th>APP</th>
					 <th>  SÍ  </th>
					 <th>  NO  </th>
					 <tr>
						 <td>Diabetes</td>
							 <?php
							 $opcion = $dato[0]['diabetes'];
							 $padecimiento = "diabetes";
							 $consultorio->asigRadio($opcion, $padecimiento);
							 ?>
					 </tr>
					 <tr>
						 <td>Hipertensión</td>
						 <?php
						 $opcion = $dato[0]['hipertension'];
						 $padecimiento = "hipertension";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Convulsiones</td>
						 <?php
						 $opcion = $dato[0]['convulsiones'];
						 $padecimiento = "convulsiones";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Cirujias Previas</td>
						 <?php
						 $opcion = $dato[0]['cirujias'];
						 $padecimiento = "cirujias";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Cáncer</td>
						 <?php
						 $opcion = $dato[0]['cancer'];
						 $padecimiento = "cancer";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Fracturas</td>
						 <?php
						 $opcion = $dato[0]['fracturas'];
						 $padecimiento = "fracturas";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
				 </table>
				 <p class="text-center">C O M E N T A R I O S</p>
				 <textarea name="comentario_app" class="form-control"  rows="4" cols="80"><?php echo $dato[0]['observacion_app'] ?></textarea>
			 </div>

			 <div class="col-md-3"  style="background-color:	#D3D3D3;margin:1%;">
				 <h4 class="text-center">Antescedentes Personales no Patológicos</h4><br>
				 <div class="form-group">
				 <label for="comment">Alergicos:</label>
				 <textarea class="form-control" rows="5" id="comment" name="alergicos"><?php echo $dato[0]['alergicos'] ?></textarea>
				 <label for="comment">Toxicomanias:</label>
				 <textarea class="form-control" rows="5" id="comment" name="toxico"><?php echo $dato[0]['ejercicios'] ?></textarea>
				 <label for="comment">Ejercicios:</label>
				 <textarea class="form-control" rows="5" id="comment" name="ejer"><?php echo $dato[0]['toxicomanias'] ?></textarea>
				 </div>
				 </div>
			 <div class="col-md-4"  style="margin:1%;background-color:#D3D3D3;">
				 <h5 class="text-center">Antescedentes Heredo-Familiares</h5><br>
				 <table class="table">
					 <th>AHF</th>
					 <th>  SÍ  </th>
					 <th>  NO  </th>
					 <tr>
						 <td>Diabetes</td>
						 <?php
						 $opcion = $dato[0]['diabetes_ahf'];
						 $padecimiento = "diabetes_ahf";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Hipertensión Arterial</td>
						 <?php
						 $opcion = $dato[0]['hipertension_ahf'];
						 $padecimiento = "hipertension_ahf";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Convulsiones</td>
						 <?php
						 $opcion = $dato[0]['convulsiones_ahf'];
						 $padecimiento = "convulsiones_ahf";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Malformaciones Congenitas</td>
						 <?php
						 $opcion = $dato[0]['malf_cong'];
						 $padecimiento = "malf_cong";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Demencia</td>
						 <?php
						 $opcion = $dato[0]['demecia'];
						 $padecimiento = "demencia";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Cáncer</td>
						 <?php
						 $opcion = $dato[0]['cancer_ahf'];
						 $padecimiento = "cancer_ahf";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Artitis</td>
						 <?php
						 $opcion = $dato[0]['artritis_ahf'];
						 $padecimiento = "artritis_ahf";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
					 <tr>
						 <td>Cardiopatía</td>
						 <?php
						 $opcion = $dato[0]['cardiopatia'];
						 $padecimiento = "cardiopatia";
						 $consultorio->asigRadio($opcion, $padecimiento);
						 ?>
					 </tr>
				 </table>
				 <p class="text-center">C O M E N T A R I O S</p>
				 <textarea name="comentario_ahf" class="form-control"  rows="4" cols="80"><?php echo $dato[0]['observacion_ahf'] ?></textarea>
			 </div>
			 <div class="col-md-7"  style="background-color:	#D3D3D3;margin:1%;">
				 <h4 class="text-center">Padecimiento Actual: </h4><br><br><br>
				 <div class="form-group">
				 <label for="comment">Tiempo de Inicio:</label><br><br>
				 <input type="date" name="tiempo_pa" value="<?php echo $dato[0]['tiempo_pa'] ?>"><br><br><br><br>
				 <label for="comment">Sintomas:</label><br><br>
				 <textarea class="form-control" rows="10" id="comment" name="sintomas"><?php echo $dato[0]['sintomas'] ?></textarea>
				 </div>
				 </div>

				 <!--- EXTREMIDADES---------------------------------------------------------------------------------------------------------------------->
				 <div class="col-md-12"  style="background-color:#D3D3D3;margin:1%;margin-top:40px;">
					 <div class="form-group">
						 <h1 class="text-center">EXPLORACIÓN FISICA</h1>
						 <ul class="nav nav-pills nav-justified tabs">
							<li class=""><a href="#marcha" data-toggle="tab">MARCHA</a></li>
							<li><a href="#superior" data-toggle="tab">EXTREMIDAD SUPERIOR</a></li>
							<li><a href="#inferior" data-toggle="tab">EXTREMIDAD INFERIOR</a></li>
							 <li><a href="#columna" data-toggle="tab">COLUMNA</a></li>
						</ul>

						<div class="tab-content">
								<!-- EXTREMIDAD SUPERIOR ------------------------------------------------->
							<div class="tab-pane fade"  id="superior">
								<ul class="nav nav-pills nav-justified tabs2">
									<li class=""><a href="#hombro" data-toggle="tab">Hombro</a></li>
									<li><a href="#codo" data-toggle="tab">Codo</a></li>
									<li><a href="#muñeca" data-toggle="tab">Muñeca</a></li>
									<li><a href="#mano" data-toggle="tab">Manos</a></li>
									<li><a href="#dedo" data-toggle="tab">Dedos</a></li>
								</ul>

								<div class="tab-content secciones">
									<div class="tab-pane fade secciones"  id="hombro">
										 <h5 class="text-center">H O M B R O</h5>
										<article>
										<select class="" name="lado_hombro">
										<?php $campo = $datoext[0]['lado_hombro']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_hombro" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_hombro']; ?>"><br>
										<input type="text" name="fuerza_hombro" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_hombro']; ?>"><br>
										<input type="text" name="reflejos_hombro" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_hombro']; ?>"><br>
										<input type="text" name="sensibilidad_hombro" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_hombro']; ?>"><br>
										<input type="text" name="deformidad_hombro" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_hombro']; ?>"><br>
										<input type="text" name="signos_hombro" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_hombro']; ?>"><br>
										</article>
									</div>
									<div class="tab-pane fade secciones"  id="codo">
										 <h5 class="text-center">C O D O</h5>
										<article>
										<select class="" name="lado_codo">
											<?php $campo = $datoext[0]['lado_codo']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_codo" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_codo']; ?>"><br>
										<input type="text" name="fuerza_codo" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_codo']; ?>"><br>
										<input type="text" name="reflejos_codo" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_codo']; ?>"><br>
										<input type="text" name="sensibilidad_codo" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_codo']; ?>"><br>
										<input type="text" name="deformidad_codo" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_codo']; ?>"><br>
										<input type="text" name="signos_codo" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_codo']; ?>"><br>
										</article>
									</div>
									<div class="tab-pane fade secciones"  id="muñeca">
										 <h5 class="text-center">M U Ñ E C A</h5>
										<article>
										<select class="" name="lado_muneca">
										<?php $campo = $datoext[0]['lado_muneca']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_muneca" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_muneca']; ?>"><br>
										<input type="text" name="fuerza_muneca" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_muneca']; ?>"><br>
										<input type="text" name="reflejos_muneca" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_muneca']; ?>"><br>
										<input type="text" name="sensibilidad_muneca" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_muneca']; ?>"><br>
										<input type="text" name="deformidad_muneca" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_muneca']; ?>"><br>
										<input type="text" name="signos_muneca" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_muneca']; ?>"><br>
										</article>
									</div>
									<div class="tab-pane fade secciones"  id="mano">
										 <h5 class="text-center">M A N O</h5>
										<article>
										<select class="" name="lado_manos">
										<?php $campo = $datoext[0]['lado_manos']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_manos" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_manos']; ?>"><br>
										<input type="text" name="fuerza_manos" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_manos']; ?>"><br>
										<input type="text" name="reflejos_manos" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_manos']; ?>"><br>
										<input type="text" name="sensibilidad_manos" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_manos']; ?>"><br>
										<input type="text" name="deformidad_manos" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_manos']; ?>"><br>
										<input type="text" name="signos_manos" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_manos']; ?>"><br>
										</article>
									</div>
									<div class="tab-pane fade secciones"  id="dedo">
										 <h5 class="text-center">D E D O</h5>
										<article>
										<select class="" name="lado_dedos">
											<?php $campo = $datoext[0]['lado_dedos']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_dedos" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_dedos']; ?>"><br>
										<input type="text" name="fuerza_dedos" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_dedos']; ?>"><br>
										<input type="text" name="reflejos_dedos" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_dedos']; ?>"><br>
										<input type="text" name="sensibilidad_dedos" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_dedos']; ?>"><br>
										<input type="text" name="deformidad_dedos" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_dedos']; ?>"><br>
										<input type="text" name="signos_dedos" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_dedos']; ?>"><br>
										</article>
									</div>
								</div>
							</div>

				<!-- EXTREMIDAD INFERIOR ------------------------------------------------------------------------------------------------------------>
							<div class="tab-pane fade"  id="inferior">
								<ul class="nav nav-pills nav-justified tabs2">
									<li class=""><a href="#cadera" data-toggle="tab">Cadera</a></li>
									<li><a href="#rodilla" data-toggle="tab">Rodilla</a></li>
									<li><a href="#tobillo" data-toggle="tab">Tobillo</a></li>
									<li><a href="#pies" data-toggle="tab">Pies</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane fade secciones"  id="cadera">
										 <h5 class="text-center">C A D E R A</h5>
										<article>
										<select class="" name="lado_cadera">
											<?php $campo = $datoext[0]['lado_cadera']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_cadera" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_cadera']; ?>"><br>
										<input type="text" name="fuerza_cadera" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_cadera']; ?>"><br>
										<input type="text" name="reflejos_cadera" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_cadera']; ?>"><br>
										<input type="text" name="sensibilidad_cadera" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_cadera']; ?>"><br>
										<input type="text" name="deformidad_cadera" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_cadera']; ?>"><br>
										<input type="text" name="signos_cadera" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_cadera']; ?>"><br>
										</article>
									</div>
									<div class="tab-pane fade secciones"  id="rodilla">
										 <h5 class="text-center">R O D I L L A</h5>
										<article>
										<select class="" name="lado_rodilla">
											<?php $campo = $datoext[0]['lado_rodilla']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_rodilla" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_rodilla']; ?>"><br>
										<input type="text" name="fuerza_rodilla" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_rodilla']; ?>"><br>
										<input type="text" name="reflejos_rodilla" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_rodilla']; ?>"><br>
										<input type="text" name="sensibilidad_rodilla" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_rodilla']; ?>"><br>
										<input type="text" name="deformidad_rodilla" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_rodilla']; ?>"><br>
										<input type="text" name="signos_rodilla" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_rodilla']; ?>"><br>
										</article>
									</div>
									<div class="tab-pane fade secciones"  id="tobillo">
										 <h5 class="text-center">T O B I L L O</h5>
										<article>
										<select class="" name="lado_tobillo">
											<?php $campo = $datoext[0]['lado_tobillo']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_tobillo" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_tobillo']; ?>"><br>
										<input type="text" name="fuerza_tobillo" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_tobillo']; ?>"><br>
										<input type="text" name="reflejos_tobillo" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_tobillo']; ?>"><br>
										<input type="text" name="sensibilidad_tobillo" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_tobillo']; ?>"><br>
										<input type="text" name="deformidad_tobillo" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_tobillo']; ?>"><br>
										<input type="text" name="signos_tobillo" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_tobillo']; ?>"><br>
										</article>
									</div>
									<div class="tab-pane fade secciones"  id="pies">
										 <h5 class="text-center">P I E S</h5>
										<article>
										<select class="" name="lado_pies">
											<?php $campo = $datoext[0]['lado_pies']; $consultorio->recOpcionExtr($campo); ?>
										</select><br><br>
										<input type="text" name="movimiento_pies" class="form-control" placeholder="MOVIMIENTO" value="<?php echo $datoext[0]['movimiento_pies']; ?>"><br>
										<input type="text" name="fuerza_pies" class="form-control" placeholder="FUERZA" value="<?php echo $datoext[0]['fuerza_pies']; ?>"><br>
										<input type="text" name="reflejos_pies" class="form-control" placeholder="REFLEJOS" value="<?php echo $datoext[0]['reflejos_pies']; ?>"><br>
										<input type="text" name="sensibilidad_pies" class="form-control" placeholder="SENSIBILIDAD" value="<?php echo $datoext[0]['sensibilidad_pies']; ?>"><br>
										<input type="text" name="deformidad_pies" class="form-control" placeholder="DEFORMIDAD" value="<?php echo $datoext[0]['deformidad_pies']; ?>"><br>
										<input type="text" name="signos_pies" class="form-control" placeholder="SIGNOS ANORMALES" value="<?php echo $datoext[0]['signos_pies']; ?>"><br>
										</article>
									</div>
								</div>
							</div>
			 <!-- MARCHA PACIENTE --------------------------------------------------------------------------------------------------------------------------------->
							<div class="tab-pane fade secciones"  id="marcha"><br>
								<h5 class="text-center">M A R C H A</h5><br>
								<table class="table secciones">
									<th>Marcha</th>
									<th>  SÍ  </th>
									<th>  NO  </th>
									<tr>
										<td>Normal</td>
										<?php
		 							 $opcion = $datoext[0]['normal'];
		 							 $padecimiento = "normal";
		 							 $consultorio->asigRadio($opcion, $padecimiento);
		 							 ?>
									</tr>
									<tr>
										<td>Alterada</td>
										<?php
		 							 $opcion = $datoext[0]['alterada'];
		 							 $padecimiento = "marcha_alterada";
		 							 $consultorio->asigRadio($opcion, $padecimiento);
		 							 ?>
									</tr>
									<tr>
										<td>Dependiente</td>
										<?php
		 							 $opcion = $datoext[0]['dependiente'];
		 							 $padecimiento = "marcha_dependiente";
		 							 $consultorio->asigRadio($opcion, $padecimiento);
		 							 ?>
									</tr>
									<tr>
										<td>Espastica</td>
										<?php
		 							 $opcion = $datoext[0]['espastica'];
		 							 $padecimiento = "marcha_espastica";
		 							 $consultorio->asigRadio($opcion, $padecimiento);
		 							 ?>
									</tr>
									<tr>
										<td>Ataxica</td>
										<?php
		 							 $opcion = $datoext[0]['ataxica'];
		 							 $padecimiento = "marcha_ataxica";
		 							 $consultorio->asigRadio($opcion, $padecimiento);
		 							 ?>
									</tr>
									<tr>
										<td>Parética</td>
										<?php
		 							 $opcion = $datoext[0]['paretica'];
		 							 $padecimiento = "marcha_paretica";
		 							 $consultorio->asigRadio($opcion, $padecimiento);
		 							 ?>
									</tr>
									<tr>
										<td>Claudicante</td>
										<?php
		 							 $opcion = $datoext[0]['claudicante'];
		 							 $padecimiento = "marcha_claudicante";
		 							 $consultorio->asigRadio($opcion, $padecimiento);
		 							 ?>
									</tr>
								</table><br><br>
							</div>
							 <!-- C O L U M N A ------------------------------------------------------------------------------------------------------------>
										 <div class="tab-pane fade"  id="columna">
											 <ul class="nav nav-pills nav-justified tabs2">
												 <li class=""><a href="#cervical" data-toggle="tab">Cervical</a></li>
												 <li><a href="#dorsal" data-toggle="tab">Dorsal</a></li>
												 <li><a href="#lumbar" data-toggle="tab">Lumbar</a></li>
											 </ul>
											 <div class="tab-content">
												 <div class="tab-pane fade secciones"  id="cervical">
													 <h5 class="text-center">C E R V I C A L</h5>
													 <article>
														 <select class="" name="tipo_cervical">
															 <p>Mobilidad:</p>
															 <?php $campo = $datoext[0]['tipo_cervical']; $consultorio->recOpcionExtr($campo); ?>
														 </select><br><br>
														 <table class="table">
															 <th>DEFORMIDAD</th>
															 <th>  SÍ  </th>
															 <th>  NO  </th>
															 <tr>
																 <td>Hiperlordosis</td>
																 <?php
						 		 							 $opcion = $datoext[0]['hiper_cervical'];
						 		 							 $padecimiento = "hiper_cervical";
						 		 							 $consultorio->asigRadio($opcion, $padecimiento);
						 		 							 ?>
															 </tr>
															 <tr>
																 <td>Xifosis</td>
																 <?php
						 		 							 $opcion = $datoext[0]['xifo_cervical'];
						 		 							 $padecimiento = "xifo_cervical";
						 		 							 $consultorio->asigRadio($opcion, $padecimiento);
						 		 							 ?>
															 </tr>
															 <tr>
																 <td>Escoliosis</td>
																 <?php
						 		 							 $opcion = $datoext[0]['esco_cervical'];
						 		 							 $padecimiento = "esco_cervical";
						 		 							 $consultorio->asigRadio($opcion, $padecimiento);
						 		 							 ?>
															 </tr>
														 </table>
													 </article>
												 </div>
												 <div class="tab-pane fade secciones"  id="dorsal">
													 <h5 class="text-center">D O R S A L</h5>
													 <article id="tab11">
														 <table class="table">
															 <th>DEFORMIDAD</th>
															 <th>  SÍ  </th>
															 <th>  NO  </th>
															 <tr>
																 <td>Liordosis</td>
																 <?php
						 		 							 $opcion = $datoext[0]['lio_dorsal'];
						 		 							 $padecimiento = "lio_dorsal";
						 		 							 $consultorio->asigRadio($opcion, $padecimiento);
						 		 							 ?>
															 </tr>
															 <tr>
																 <td>Hiperxifosis</td>
																 <?php
																$opcion = $datoext[0]['hiper_dorsal'];
																$padecimiento = "hiper_dorsal";
																$consultorio->asigRadio($opcion, $padecimiento);
																?>
															 </tr>
															 <tr>
																 <td>Escoliosis</td>
																 <?php
						 		 							 $opcion = $datoext[0]['esco_dorsal'];
						 		 							 $padecimiento = "esco_dorsal";
						 		 							 $consultorio->asigRadio($opcion, $padecimiento);
						 		 							 ?>
															 </tr>
														 </table>
													 </article>
												 </div>
												 <div class="tab-pane fade secciones"  id="lumbar">
													 <h5 class="text-center">L U M B A R</h5>
													 <article id="tab12">
														 <select class="" name="tipo_lumbar">
															 <p>Mobilidad:</p>
															 <?php $campo = $datoext[0]['tipo_lumbar']; $consultorio->recOpcionExtr($campo); ?>
														 </select><br><br>
														 <table class="table">
															 <th>DEFORMIDAD</th>
															 <th>  SÍ  </th>
															 <th>  NO  </th>
															 <tr>
																 <td>Hiperlordosis</td>
																 <?php
						 		 							 $opcion = $datoext[0]['hiper_lumbar'];
						 		 							 $padecimiento = "hiper_lumbar";
						 		 							 $consultorio->asigRadio($opcion, $padecimiento);
						 		 							 ?>
															 </tr>
															 <tr>
																 <td>Xifosis</td>
																 <?php
						 		 							 $opcion = $datoext[0]['xifo_lumbar'];
						 		 							 $padecimiento = "xifo_lumbar";
						 		 							 $consultorio->asigRadio($opcion, $padecimiento);
						 		 							 ?>
															 </tr>
															 <tr>
																 <td>Escoliosis</td>
																 <?php
						 		 							 $opcion = $datoext[0]['esco_lumbar'];
						 		 							 $padecimiento = "esco_lumbar";
						 		 							 $consultorio->asigRadio($opcion, $padecimiento);
						 		 							 ?>
															 </tr>
														 </table>
													 </article>
												 </div>
											 </div>
										 </div>
						</div>
					 </div>
					 </div>

				 <div class="col-md-12"  style="background-color:	#D3D3D3;margin:1%;">
					 <div class="form-group">
					 <label for="comment">D I A G N Ó S T I C O:</label><br><br>
					 <textarea class="form-control" rows="5" id="comment" name="diagnostico"><?php echo $dato[0]['diagnostico'] ?></textarea><br><br>
					 <label for="comment">T R A T A M I E N T O:</label><br><br>
					 <textarea class="form-control" rows="5" id="comment" name="tratamiento"><?php echo $dato[0]['tratamiento'] ?></textarea>
					 </div>
					 </div>
					 <input type="hidden" name="idapp" value="<?php echo $dato[0]['idapp'] ?>">
					 <input type="hidden" name="idapnp" value="<?php echo $dato[0]['idapnp'] ?>">
					 <input type="hidden" name="idahf" value="<?php echo $dato[0]['idahf'] ?>">
					 <input type="hidden" name="idpa" value="<?php echo $dato[0]['idpa'] ?>">
					 <input type="hidden" name="idpaciente" value="<?php echo $dato[0]['idpaciente'] ?>">
					 <input type="hidden" name="idcolumna" value="<?php echo $datoext[0]['idcolumna'] ?>">
					 <input type="hidden" name="idsuperior" value="<?php echo $datoext[0]['idsuperior'] ?>">
					 <input type="hidden" name="idinferior" value="<?php echo $datoext[0]['idinferior'] ?>">
					 <input type="hidden" name="idmarcha" value="<?php echo $datoext[0]['idmarcha'] ?>">
				 <input type="submit" name="boton" value="R E G I S T R A R   P A C I E N T E" class="text-center" style="margin:auto;padding:1%;margin-top:3%;">

	 </div>
 </div>
</form>


	<?php include("footer.php"); ?>

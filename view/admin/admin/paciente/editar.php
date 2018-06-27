<?php
	include("header.php");
	include("../../consultorio.class.php");
	$consultorio= new Consultorio;
	$consultorio->conexion();
	if(isset($_GET['id'])){
		$idconsultorio=$_GET['id'];
		if(is_numeric($idconsultorio)){
			$sql="SELECT p.idpaciente, p.nombre, g.genero, p.edad, p.direccion, p.email, p.telefono, p.ocupacion, c.estado_civil,p.fecha, apnop.alergicos, apnop.ejercicios, apnop.toxicomanias, pp.cancer, pp.cirujias, pp.convulsiones, pp.diabetes, pp.fracturas, pp.hipertension, pp.observacion_app,pada.sintomas, pada.tiempo_pa, anhf.artritis as 'artritis_ahf', anhf.cancer as 'cancer_ahf',anhf.cardiopatia,anhf.convulsiones as 'convulsiones_ahf', anhf.demecia, anhf.diabetes as 'diabetes_ahf', anhf.hipertension as 'hipertension_ahf', anhf.malf_cong, anhf.observacion_ahf,p.diagnostico, p.tratamiento from paciente as p join ahf as anhf on p.idahf = anhf.idahf join pa as pada on p.idpa = pada.idpa join app as pp on p.idapp = pp.idapp join apnp as apnop on p.idapnp = apnop.idapnp join genero as g on p.idgenero = g.idgenero join civil as c on p.idcivil = c.idcivil";
		    $dato= $consultorio->sqlArray($sql);
				//echo "<pre>";
				//print_r($datos);

		}
		else{ die("Se requiere que sea numero");}
	}
	else{ die("Se requiere que este puesto");
	}


?>
<form action="registrar_paciente.php" method="post">
 <div class="container" style="margin:3em;background-color:#DCDCDC;margin:1em;padding:5em;">
	 <div class="row">

			 <div class="col-md-4" style=" background-color:	#D3D3D3;margin:1%;">
					 <h2 class="text-center">Ficha de Identificación</h2><br>
					 <input type="text" name="nombre" class="form-control" placeholder="Nombre Completo"><br>
					 <input type="text" name="edad" class="form-control" placeholder="Edad"><br>

					 <label>Seleccione el genero: </label>
						 <select name="genero">
						 <?php
						 $campo="genero";
						 $id="idgenero";
						 $sql="select $id,$campo from genero";
						 $consultorio->genOpciones($sql,$campo,$id);
							?>
					 </select><br><br><br>

					 <label>Seleccione el estado civil: </label>
						 <select name="civil">
						 <?php
						 $campo="estado_civil";
						 $id="idcivil";
						 $sql="select $id,$campo from civil";
						 $consultorio->genOpciones($sql,$campo,$id);
							?>
					 </select><br><br><br>
					 <input type="text" name="direccion" class="form-control" placeholder="Domicilio"><br>
					 <input type="text" name="telefono" class="form-control" placeholder="Telefono de Contacto"><br>
					 <input type="text" name="email" class="form-control" placeholder="Email"><br>
					 <input type="text" name="ocupacion" class="form-control" placeholder="Ocupación"><br>
			 </div>

			 <div class="col-md-4"  style="margin:1%;background-color:#D3D3D3;">
				 <h5 class="text-center">Antescedentes Personales Patológicos</h5><br>
				 <table class="table">
					 <th>APP</th>
					 <th>  SÍ  </th>
					 <th>  NO  </th>
					 <tr>
						 <td>Diabetes</td>
						 <td><input type="radio" name="diabetes" value="SI"></td>
						 <td><input type="radio" name="diabetes" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Hipertensión</td>
						 <td><input type="radio" name="hiper" value="SI"></td>
						 <td><input type="radio" name="hiper" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Convulsiones</td>
						 <td><input type="radio" name="convul" value="SI" required></td>
						 <td><input type="radio" name="convul" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Cirujias Previas</td>
						 <td><input type="radio" name="cirujias" value="SI"></td>
						 <td><input type="radio" name="cirujias" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Cáncer</td>
						 <td><input type="radio" name="cancer" value="SI"></td>
						 <td><input type="radio" name="cancer" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Fracturas</td>
						 <td><input type="radio" name="fracturas" value="SI"></td>
						 <td><input type="radio" name="fracturas" value="NO"></td>
					 </tr>
				 </table>
				 <p class="text-center">C O M E N T A R I O S</p>
				 <textarea name="comentario_app" class="form-control"  rows="4" cols="80"></textarea>
			 </div>

			 <div class="col-md-3"  style="background-color:	#D3D3D3;margin:1%;">
				 <h4 class="text-center">Antescedentes Personales no Patológicos</h4><br>
				 <div class="form-group">
				 <label for="comment">Alergicos:</label>
				 <textarea class="form-control" rows="5" id="comment" name="alergicos"></textarea>
				 <label for="comment">Toxicomanias:</label>
				 <textarea class="form-control" rows="5" id="comment" name="toxico"></textarea>
				 <label for="comment">Ejercicios:</label>
				 <textarea class="form-control" rows="5" id="comment" name="ejer"></textarea>
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
						 <td><input type="radio" name="diabetesahf" value="SI"></td>
						 <td><input type="radio" name="diabetesahf" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Hipertensión Arterial</td>
						 <td><input type="radio" name="hiperahf" value="SI"></td>
						 <td><input type="radio" name="hiperahf" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Convulsiones</td>
						 <td><input type="radio" name="convulahf" value="SI"></td>
						 <td><input type="radio" name="convulahf" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Malformaciones Congenitas</td>
						 <td><input type="radio" name="malfcon" value="SI"></td>
						 <td><input type="radio" name="malfcon" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Demencia</td>
						 <td><input type="radio" name="demencia" value="SI"></td>
						 <td><input type="radio" name="demencia" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Cáncer</td>
						 <td><input type="radio" name="cancerahf" value="SI"></td>
						 <td><input type="radio" name="cancerahf" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Artitis</td>
						 <td><input type="radio" name="artritis" value="SI"></td>
						 <td><input type="radio" name="artritis" value="NO"></td>
					 </tr>
					 <tr>
						 <td>Cardiopatía</td>
						 <td><input type="radio" name="cardio" value="SI"></td>
						 <td><input type="radio" name="cardio" value="NO"></td>
					 </tr>
				 </table>
				 <p class="text-center">C O M E N T A R I O S</p>
				 <textarea name="comentario_ahf" class="form-control"  rows="4" cols="80"></textarea>
			 </div>
			 <div class="col-md-3"  style="background-color:	#D3D3D3;margin:1%;">
				 <h4 class="text-center">Padecimiento Actual: </h4><br><br><br>
				 <div class="form-group">
				 <label for="comment">Tiempo de Inicio:</label><br><br>
				 <input type="date" name="tiempo_pa" value=""><br><br><br><br>
				 <label for="comment">Sintomas:</label><br><br>
				 <textarea class="form-control" rows="10" id="comment" name="sintomas"></textarea>
				 </div>
				 </div>
				 <div class="col-md-4"  style="background-color:	#D3D3D3;margin:1%;">
					 <div class="form-group">
					 <label for="comment">D I A G N Ó S T I C O:</label><br><br>
					 <textarea class="form-control" rows="10" id="comment" name="diagnostico"></textarea><br><br>
					 <label for="comment">T R A T A M I E N T O:</label><br><br>
					 <textarea class="form-control" rows="10" id="comment" name="tratamiento"><?php echo $dato[0]['tratamiento'] ?></textarea>
					 </div>
					 </div>
				 <input type="submit" name="boton" value="R E G I S T R A R   P A C I E N T E" class="text-center" style="margin:auto;padding:1%;margin-top:3%;">

	 </div>
 </div>
</form>


	<?php include("footer.php"); ?>

<?php
  // Se prendio esta mrd :v
  session_start();

  // Validamos que exista una session y ademas que el cargo que exista sea igual a 1 (Administrador)
  if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 1){
    /*
      Para redireccionar en php se utiliza header,
      pero al ser datos enviados por cabereza debe ejecutarse
      antes de mostrar cualquier informacion en el DOM es por eso que inserto este
      codigo antes de la estructura del html, espero haber sido claro
    */
    header('location: ../../../index.php');
  }

?>


      <?php include("header.php");
  include("../consultorio.class.php");
  $consultorio = new Consultorio;
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
                <td><input type="radio" name="convul" value="SI"></td>
                <td><input type="radio" name="convul" value="NO"></td>
              </tr>
              <tr>
                <td>Cirugias Previas</td>
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
                <td>Artritis</td>
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
          <div class="col-md-7"  style="background-color:	#D3D3D3;margin:1%;">
            <h4 class="text-center">Padecimiento Actual: </h4><br><br><br>
            <div class="form-group">
            <label for="comment">Tiempo de Inicio:</label><br><br>
            <input type="date" name="tiempo_pa" value=""><br><br><br><br>
            <label for="comment">Sintomas:</label><br><br>
            <textarea class="form-control" rows="10" id="comment" name="sintomas"></textarea>
            </div>
            </div>


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
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_hombro" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_hombro" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_hombro" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_hombro" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_hombro" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_hombro" class="form-control" placeholder="SIGNOS ANORMALES"><br>
          							</article>
          						</div>
          						<div class="tab-pane fade secciones"  id="codo">
                        <h5 class="text-center">C O D O</h5>
          							<article>
          							<select class="" name="lado_codo">
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_codo" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_codo" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_codo" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_codo" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_codo" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_codo" class="form-control" placeholder="SIGNOS ANORMALES"><br>
          							</article>
          						</div>
          						<div class="tab-pane fade secciones"  id="muñeca">
                        <h5 class="text-center">M U Ñ E C A</h5>
          							<article>
          							<select class="" name="lado_muneca">
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_muneca" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_muneca" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_muneca" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_muneca" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_muneca" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_muneca" class="form-control" placeholder="SIGNOS ANORMALES"><br>
          							</article>
          						</div>
          						<div class="tab-pane fade secciones"  id="mano">
                        <h5 class="text-center">M A N O</h5>
          							<article>
          							<select class="" name="lado_manos">
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_manos" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_manos" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_manos" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_manos" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_manos" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_manos" class="form-control" placeholder="SIGNOS ANORMALES"><br>
          							</article>
          						</div>
          						<div class="tab-pane fade secciones"  id="dedo">
                        <h5 class="text-center">D E D O</h5>
          							<article>
          							<select class="" name="lado_dedos">
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_dedos" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_dedos" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_dedos" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_dedos" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_dedos" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_dedos" class="form-control" placeholder="SIGNOS ANORMALES"><br>
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
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_cadera" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_cadera" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_cadera" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_cadera" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_cadera" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_cadera" class="form-control" placeholder="SIGNOS ANORMALES"><br>
          							</article>
          						</div>
          						<div class="tab-pane fade secciones"  id="rodilla">
                        <h5 class="text-center">R O D I L L A</h5>
          							<article>
          							<select class="" name="lado_rodilla">
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_rodilla" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_rodilla" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_rodilla" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_rodilla" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_rodilla" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_rodilla" class="form-control" placeholder="SIGNOS ANORMALES"><br>
          							</article>
          						</div>
          						<div class="tab-pane fade secciones"  id="tobillo">
                        <h5 class="text-center">T O B I L L O</h5>
          							<article>
          							<select class="" name="lado_tobillo">
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_tobillo" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_tobillo" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_tobillo" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_tobillo" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_tobillo" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_tobillo" class="form-control" placeholder="SIGNOS ANORMALES"><br>
          							</article>
          						</div>
          						<div class="tab-pane fade secciones"  id="pies">
                        <h5 class="text-center">P I E S</h5>
          							<article>
          							<select class="" name="lado_pies">
          								<option value="Izquierdo">Izquierdo</option>
          								<option value="Derecho">Derecho</option>
          							</select><br><br>
          							<input type="text" name="movimiento_pies" class="form-control" placeholder="MOVIMIENTO"><br>
          							<input type="text" name="fuerza_pies" class="form-control" placeholder="FUERZA"><br>
          							<input type="text" name="reflejos_pies" class="form-control" placeholder="REFLEJOS"><br>
          							<input type="text" name="sensibilidad_pies" class="form-control" placeholder="SENSIBILIDAD"><br>
          							<input type="text" name="deformidad_pies" class="form-control" placeholder="DEFORMIDAD"><br>
          							<input type="text" name="signos_pies" class="form-control" placeholder="SIGNOS ANORMALES"><br>
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
          							<td><input type="radio" name="marcha_normal" value="SI"></td>
          							<td><input type="radio" name="marcha_normal" value="NO"></td>
          						</tr>
          						<tr>
          							<td>Alterada</td>
          							<td><input type="radio" name="marcha_alterada" value="SI"></td>
          							<td><input type="radio" name="marcha_alterada" value="NO"></td>
          						</tr>
          						<tr>
          							<td>Dependiente</td>
          							<td><input type="radio" name="marcha_dependiente" value="SI"></td>
          							<td><input type="radio" name="marcha_dependiente" value="NO"></td>
          						</tr>
          						<tr>
          							<td>Espastica</td>
          							<td><input type="radio" name="marcha_espastica" value="SI"></td>
          							<td><input type="radio" name="marcha_espastica" value="NO"></td>
          						</tr>
          						<tr>
          							<td>Ataxica</td>
          							<td><input type="radio" name="marcha_ataxica" value="SI"></td>
          							<td><input type="radio" name="marcha_ataxica" value="NO"></td>
          						</tr>
          						<tr>
          							<td>Parética</td>
          							<td><input type="radio" name="marcha_paretica" value="SI"></td>
          							<td><input type="radio" name="marcha_paretica" value="NO"></td>
          						</tr>
          						<tr>
          							<td>Claudicante</td>
          							<td><input type="radio" name="marcha_claudicante" value="SI"></td>
          							<td><input type="radio" name="marcha_claudicante" value="NO"></td>
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
                                  <option value="Normal">Normal</option>
                                  <option value="Limitada">Limitada</option>
                                </select><br><br>
                                <table class="table">
                                  <th>DEFORMIDAD</th>
                                  <th>  SÍ  </th>
                                  <th>  NO  </th>
                                  <tr>
                                    <td>Hiperlordosis</td>
                                    <td><input type="radio" name="hiper_cervical" value="SI"></td>
                                    <td><input type="radio" name="hiper_cervical" value="NO"></td>
                                  </tr>
                                  <tr>
                                    <td>Xifosis</td>
                                    <td><input type="radio" name="xifo_cervical" value="SI"></td>
                                    <td><input type="radio" name="xifo_cervical" value="NO"></td>
                                  </tr>
                                  <tr>
                                    <td>Escoliosis</td>
                                    <td><input type="radio" name="esco_cervical" value="SI"></td>
                                    <td><input type="radio" name="esco_cervical" value="NO"></td>
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
                                    <td><input type="radio" name="lio_dorsal" value="SI"></td>
                                    <td><input type="radio" name="lio_dorsal" value="NO"></td>
                                  </tr>
                                  <tr>
                                    <td>Hiperxifosis</td>
                                    <td><input type="radio" name="hiper_dorsal" value="SI"></td>
                                    <td><input type="radio" name="hiper_dorsal" value="NO"></td>
                                  </tr>
                                  <tr>
                                    <td>Escoliosis</td>
                                    <td><input type="radio" name="esco_dorsal" value="SI"></td>
                                    <td><input type="radio" name="esco_dorsal" value="NO"></td>
                                  </tr>
                                </table>
                              </article>
                            </div>
                            <div class="tab-pane fade secciones"  id="lumbar">
                              <h5 class="text-center">L U M B A R</h5>
                              <article id="tab12">
                                <select class="" name="tipo_lumbar">
                                  <p>Mobilidad:</p>
                                  <option value="Normal">Normal</option>
                                  <option value="Limitada">Limitada</option>
                                </select><br><br>
                                <table class="table">
                                  <th>DEFORMIDAD</th>
                                  <th>  SÍ  </th>
                                  <th>  NO  </th>
                                  <tr>
                                    <td>Hiperlordosis</td>
                                    <td><input type="radio" name="hiper_lumbar" value="SI"></td>
                                    <td><input type="radio" name="hiper_lumbar" value="NO"></td>
                                  </tr>
                                  <tr>
                                    <td>Xifosis</td>
                                    <td><input type="radio" name="xifo_lumbar" value="SI"></td>
                                    <td><input type="radio" name="xifo_lumbar" value="NO"></td>
                                  </tr>
                                  <tr>
                                    <td>Escoliosis</td>
                                    <td><input type="radio" name="esco_lumbar" value="SI"></td>
                                    <td><input type="radio" name="esco_lumbar" value="NO"></td>
                                  </tr>
                                </table>
                              </article>
                            </div>
                          </div>
                        </div>
          			</div>
              </div>
              </div>

              <div class="col-md-12"  style="background-color:#D3D3D3;margin:4%;">
                <div class="form-group">
                <label for="comment" style="color:red;">D I A G N Ó S T I C O:</label><br><br>
                <textarea class="form-control" rows="5" id="comment" name="diagnostico"></textarea><br><br>
                <label for="comment" style="color:red;">T R A T A M I E N T O:</label><br><br>
                <textarea class="form-control" rows="5" id="comment" name="tratamiento"></textarea>
                </div>
                </div>
            <input type="submit" name="boton" value="R E G I S T R A R   P A C I E N T E" class="text-center" style="margin:auto;padding:1%;margin-top:3%;">

      </div>
    </div>
  </form>
  <?php include("footer.php"); ?>

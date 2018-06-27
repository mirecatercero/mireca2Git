
function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Está seguro de eliminar este registro?',
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se canceló')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"GET",
			url:"paciente/eliminar.php",
			data:cadena,
			success:function(r){
					alertify.success("Registro Borrado");
					location.href="ver_pacientes.php";

			}
		});
}

function vistaSub(datos){
 var valor = datos;

	 $.ajax({
		 type:"POST",
		 url:"paciente/subsecuente.php",
		 data:{id:valor},
 		}).done(function(info){
			var notas = JSON.parse(info);
			var html = '<div class="text-center"><button type="button" class="btn btn-primary" data-dismiss="modal" id="guardanota" onclick="abreModalNewSub('+valor+')">Nueva nota Subsecuente</button></div>';

			for (var i in notas) {
				html += '<div class="modal-dialog modal-xl" role="document"><div class="modal-content"><div class="modal-body text-center"><h4 class="modal-title text-center" id="myModalLabel">Paciente: '+notas[i].nombre+'</h4><h5>'+notas[i].fecha+'</h5><textarea class="form-control" rows="10" id="textsubUP">'+notas[i].nota+'</textarea><button type="button" class="btn btn-primary" data-dismiss="modal" id="updatenota" onclick="updateSub('+notas[i].idsubsecuente+')">Actualizar</button><button type="button" class="btn btn-primary" style="background:#800000;" data-dismiss="modal" id="deletenota" onclick="preguntarSiNoSub('+notas[i].idsubsecuente+','+valor+')">Eliminar</button></div></div></div></div>';
			}
			$('#modalSub').html(html);
			$('#modalSub').modal('show');


 			});
}

var idglobalP = 0;

function abreModalNewSub(idP) {
$('#modalNewSub').modal('show');
idglobalP = idP;
}

function nuevoSub(){
	newNota=$('#newNota').val();

	$.ajax({
			type:"POST",
			url:"paciente/guarda_subs.php",
			data:{idpaciente:idglobalP,nota:newNota},
	}).done(function(r){
	  	location.reload(true);

	});
}

function updateSub(idS){
	var updNota = "";
 updNota=$('#textsubUP').val();

 $.ajax({
		 type:"POST",
		 url:"paciente/update_sub.php",
		 data:{idsubsecuente:idS,nota:updNota},
 }).done(function(r){

	 alertify.success("Nota actualizada correctamente");

 });

}
function preguntarSiNoSub(idS,idP){
	alertify.confirm('Eliminar Datos', '¿Está seguro de eliminar esta nota subsecuente?',
					function(){ deleteSub(idS,idP) }
                , function(){ alertify.error('Se canceló')});
}
function deleteSub(idS,idP){
	$.ajax({
			type:"POST",
			url:"paciente/delete_sub.php",
			data:{idsubsecuente:idS},
	}).done(function(r){
		alertify.success("Nota eliminada correctamente");
		vistaSub(idP);

	});
}

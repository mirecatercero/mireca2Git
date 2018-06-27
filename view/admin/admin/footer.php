</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © MirecaStore 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">¿Estás seguro que deseas Cerrar Sesión?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="../../../controller/cerrarSesion.php">Cerrar Sesión</a>
          </div>
        </div>
      </div>
    </div>
<!-- modal para eliminar registro-->
    <div class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>


    <!-- Modal para registros SUBSECUENTES*************************************************************************************************** -->


<div id="div_subsecuente">

</div>

<div class="modal fade" id="modalSub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnota">Agregar nueva nota</button>
</div>

<div class="modal fade" id="modalNewSub" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Agregar nueva nota Subsecuente:</h5>
      </div>
      <div class="modal-body">
        <textarea class="form-control" rows="10" id="newNota"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardanota" onclick="nuevoSub()">
        Agregar
        </button>

      </div>
    </div>
  </div>
</div>


    <!-- Bootstrap core JavaScript-->
    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script src="lib/alertifyjs/alertify.js"></script>
    <script src="lib/select2/js/select2.js"></script>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <script src="js/funciones.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <script src="paciente/main.js"></script>
    <link href="css/pestanas.css" rel="stylesheet">


  </div>
</body>

</html>

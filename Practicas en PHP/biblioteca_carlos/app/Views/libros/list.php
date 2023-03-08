<?= $this->extend('template/admin'); ?>
<?= $this->section('content'); ?>


<script>

function eliminar(){

libro = document.getElementById('eliminarlibro').value;
alert(libro);

datos = {
    
    nombre: nombre,
    edicion: edicion,
    id: idlibro

}

$.ajax({
            url: '/libros/actualizar',
            type: 'POST',
            data: datos, 
            success: function(response) {

            console.log('Respuesta recibida: ' + response);         
        }

    });


}



</script>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listas de libros</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a class="btn btn-success" href="<?=site_url('libros/crear') ?>">Crear nuevo libro</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid">

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Libros disponibles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th>Fecha de publicacion</th>
                      <th style="width: 40px">Edicion</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($libros as $libro){ ?>

                    <tr>
                      <td><?php echo $libro['id']; ?>.</td>
                      <td><?php echo $libro['nombre']; ?></td>
                      <td><?php echo $libro['fechaPublicacion']; ?></td>
                      <td><?php echo $libro['edicion']; ?></td>
                      <td>
                        <a class="btn btn-primary" href="<?= base_url('/libros/verlibro/'. $libro['id']) ?>">Detalles</a>
                        <a class="btn btn-warning" href="<?= base_url('/libros/modificar/'. $libro['id']) ?>">modificar</a>
                        <a class="btn btn-danger" href="<?=base_url('/borrarlibro/'. $libro['id']) ?>" >Eliminar</a>
                      </td>
                    </tr>

                    <?php } ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->

          <!-- /.col -->
        </div>
        <!-- /.row -->
        
      </div><!-- /.container-fluid -->

      <div class="modal fade show" id="modal-danger" style="display: none; padding-right: 17px;" aria-modal="true" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Estas seguro que decea eliminar el libro?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
             <center><p>Esta accion no se puede revertir</p></center> 
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Regresar</button>
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      
<?= $this->endSection(); ?>
<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>

<script>

function modificar(){

nombre = document.getElementById('nombre').value;
edicion = document.getElementById('edicion').value;
idlibro = document.getElementById('idlibro').value;

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

    window.location.href = "/libros/lista";

}



</script>

<div class="container-fluid">
 
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Crear un libro</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a class="btn btn-danger" href="<?=site_url('libros/lista') ?>">Regresar</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <div class="card card-default">
            <div class="card-header">
            <h3 class="card-title">Favor llenar los datos correspondiente</h3>
        </div>
        
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Nombre del libro</label>
                <input type="text" name="nombre" id="nombre" value="<?= $libros['nombre']; ?>" class="form-control" >
            </div>

            <div class="form-group">
            <input type="hidden" name="id" id="idlibro" value="<?=$libros['id']; ?>">
            </div>
            
            <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Edicion</label>
                <input type="text" name="edicion" id="edicion" value="<?= $libros['edicion']; ?>" class="form-control" id="exampleInputEmail1">
            </div>

            <!-- /.form-group -->
            </div>


            <!-- /.col -->
            </div>
            <!-- /.row -->

            <center><button type="submit" onclick="modificar()" class="btn btn-success">Guardar</button></center>

            </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

<?= $this->endSection(); ?>

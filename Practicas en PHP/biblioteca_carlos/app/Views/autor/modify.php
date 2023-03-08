<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>

<script>

function modificar(){

nombre = document.getElementById('nombre').value;
apellido  = document.getElementById('apellido').value;
pais = document.getElementById('pais').value;
idautor = document.getElementById('idautor').value;
datos = {
    
    nombre: nombre,
    apellido:  apellido,
    pais: pais,
    id: idautor

}

$.ajax({
            url: '/autores/actualizar',
            type: 'POST',
            data: datos, 
            success: function(response) {

            console.log('Respuesta recibida: ' + response);         
        }

    });

    window.location.href = "/autores/lista";


}



</script>


<div class="container-fluid">
 
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Modificar autor <a class="text-danger"><?=$autor['nombre']; ?></a></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a class="btn btn-danger" href="<?=site_url('autores/lista') ?>">Regresar</a></li>
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
                <label>Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?=$autor['nombre'] ?>" class="form-control">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label>Pais</label>
                <input type="text" name="pais" id="pais" value="<?=$autor['pais']; ?>" class="form-control">
            </div>
            <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?=$autor['apellido']; ?>" class="form-control">
            </div>
            <!-- /.form-group -->
            </div>

            <input type="hidden" name="idautor" id="idautor" value="<?=$autor['id']; ?>">


            <!-- /.col -->
            </div>
            <!-- /.row -->

            <center><button type="submit" onclick="modificar()" class="btn btn-success">Guardar cambios</button></center>

            </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

<?= $this->endSection(); ?>

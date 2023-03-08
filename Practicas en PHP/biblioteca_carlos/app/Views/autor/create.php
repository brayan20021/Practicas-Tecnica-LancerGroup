<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>

<script>

function guardar(){

nombre = document.getElementById('nombre').value;
apellido  = document.getElementById('apellido').value;
pais = document.getElementById('pais').value;

datos = {
    
    nombre: nombre,
    apellido:  apellido,
    pais: pais

}

$.ajax({
            url: '/autores/guardar',
            type: 'POST',
            data: datos, 
            success: function(response) {
          var vResultado = JSON.parse(response);
            
            if (vResultado && vResultado.RES_CODE) {
                if (vResultado.RES_CODE = "00")
                {
                    alert(vResultado.RES_DESCRIPTION);
                } else {
                    alert(vResultado.RES_DESCRIPTION);
                }
            }

            console.log('Respuesta recibida: ' + response);      
        }

    });

    /* window.location.href = "/autores/lista"; */


}

</script>

<?php  if(session('mensaje')) { ?>

<div class="alert alert-danger" role="alert">
  <strong><?php echo session('mensaje') ?></strong>
</div>

<?php } ?>

<div class="container-fluid">
 
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Creacion de autor</h1>
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
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label>Pais</label>
                <input type="text" name="pais" id="pais" class="form-control">
            </div>
            <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" id="apellido" class="form-control">
            </div>
            <!-- /.form-group -->
            </div>


            <!-- /.col -->
            </div>
            <!-- /.row -->

            <center>
              <button type="submit" onclick="guardar()" class="btn btn-success">Guardar</button>
              <a class="btn btn-warning" href="<?=site_url('autores/lista') ?>">Cancelar</a>
            </center>

            </div>

            
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

<?= $this->endSection(); ?>

<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>

<script>

function guardar(){

nombre = document.getElementById('nombre').value;
autor  = document.getElementById('autor').value;
edicion = document.getElementById('edicion').value;
autorid = document.getElementById('autor').value;

datos = {
    
    nombre: nombre,
    autor:  autor,
    edicion: edicion,
    autor: autorid

}

$.ajax({
            url: '/libros/guardar',
            type: 'POST',
            data: datos, 
            success: function(response) {
            var vResultado = JSON.parse(response);
            
            if (vResultado && vResultado.RES_CODE) {
                if (vResultado.RES_CODE = "00" || vResultado.RES_CODE == "")
                {
                    alert(vResultado.RES_DESCRIPTION);
                } else {
                    alert(vResultado.RES_DESCRIPTION);
                }
            }

            console.log('Respuesta recibida: ' + response);         
        }

    });


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
            <h3 class="card-title">Todos los datos son requeridos</h3>
        </div>
        
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label>Nombre del libro</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Edicion</label>
                <input type="text" name="edicion" id="edicion" class="form-control" required>
            </div>
            <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Autor</label>
                <select name="autor" id="autor" class="form-control" style="width: 100%;">
                <option selected="selected" value="">Selecciona un autor</option>

                <?php foreach($autores as $autor) { ?>
                    
                <option value="<?php  echo $autor['id']; ?>"><?php echo $autor['nombre']; ?> <a><?php echo $autor['apellido']; ?></a></option>

                <?php } ?>

                </select>
            </div>

            <!-- /.form-group -->
            </div>


            <!-- /.col -->
            </div>
            <!-- /.row -->

            <center><button type="submit" onclick="guardar()" class="btn btn-success">Guardar</button></center>

            </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

<?= $this->endSection(); ?>

<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>


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
                <input type="text" name="nombre" class="form-control" id="nombre">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label>Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen"  aria-describedby="fileHelpId" required>
            </div>
            <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
            <div class="form-group">
                <label>Autor</label>
                <select name="autor" id="autor" class="form-control" style="width: 100%;">
                <option selected="selected">Selecciona un autor</option>

                <?php foreach($autores as $autor) { ?>
                    
                <option value="<?php  echo $autor['id']; ?>"><?php echo $autor['nombre']; ?></option>

                <?php } ?>

                </select>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
                <label>Edicion</label>
                <input type="text" class="form-control" id="exampleInputEmail1">
            </div>
            <!-- /.form-group -->
            </div>


            <!-- /.col -->
            </div>
            <!-- /.row -->

            <center><button type="submit" class="btn btn-success">Guardar</button></center>

            </div>
        <!-- /.card-body -->

    </div>
    <!-- /.card -->

    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

<?= $this->endSection(); ?>

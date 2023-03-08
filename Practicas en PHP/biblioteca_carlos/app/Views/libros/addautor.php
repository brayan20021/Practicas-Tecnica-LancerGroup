<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

<div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6 mx-auto">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Selecciona el autor que deseas agregar en el libro <a><strong><?php echo $libros['nombre']; ?></strong></a></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?=base_url('/libros/agregandoautor')?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                  <select name="autor" id="autor" class="form-control" style="width: 100%;">
                <option selected="selected" value="">Selecciona un autor</option>

                <?php foreach($autores as $autor) { ?>
                  
                  <option value="<?php echo $autor['id'] ?>"><?php echo $autor['nombre'] ?></option>

                <?php } ?>
                
                </select>
                  </div>
                  <input type="hidden" name="libro" value="<?=$libros['id']; ?>">
                </div>
                <div class="card-footer">
                  <center><button type="submit" class="btn btn-primary">Agregar</button></center>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

<?= $this->endSection(); ?>
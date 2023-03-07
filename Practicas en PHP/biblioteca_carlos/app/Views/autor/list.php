<?= $this->extend('template/admin'); ?>
<?= $this->section('content'); ?>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Listas autores</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a class="btn btn-success" href="<?=site_url('autores/crear') ?>">Agregar nuevo</a></li>
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
                <h3 class="card-title">Autores disponibles</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th>Pais</th>
                      <th >Accion</th>
                    </tr>
                  </thead>
                  <tbody>

                <?php foreach($autores as $autor) { ?>
                    <tr>
                      <td><?php echo $autor['id']; ?>.</td>
                      <td><?php echo $autor['nombre']; ?></td>
                      <td><?php echo $autor['pais']; ?></td>
                      <td><a class="btn btn-primary">detalles</a></td>
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

      
<?= $this->endSection(); ?>
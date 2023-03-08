<?= $this->extend('template/admin'); ?>

<?= $this->section('content'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detalles del libro</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"><a class="btn btn-danger">Regresar</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                <img class="profile-user-img img-fluid"
                    src="../../dist/img/libro-portada.png"
                    alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?=$libros['nombre']; ?></h3>
                <p class="text-muted text-center">Imagen generica (ejemplo)</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nombre:</b> <a class="float-right"><?=$libros['nombre']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Fecha de publicacion:</b> <a class="float-right"><?=$libros['fechaPublicacion']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Edicion:</b> <a class="float-right"><?=$libros['edicion'];?></a>
                  </li>
                </ul>

                <a href="<?=base_url('/libros/agregarautor/'.$libros['id']) ?>" class="btn btn-primary btn-block"><b>Añadir Nuevo autor</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b class="text-primary">Autor/es:</b>

                    <?php foreach($autores as $autor) { ?>
                     <p class="text-danger" style="margin-bottom: 5px;">
                     <?php echo $autor->nombre . " " .$autor->apellido ?></p>
                     <?php } ?>

                  </li>
                  <li class="list-group-item">
                    <b class="text-primary">Descripcion:</b> <a class="float-right">1,322</a>
                  </li>
                </ul>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

<?= $this->endSection(); ?>
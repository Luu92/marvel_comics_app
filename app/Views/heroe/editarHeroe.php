<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<div class="container">
    <div class="row">
        <h1 class="text-center">Editar Heroe</h1>
    </div>
    <form action="<?php echo base_url('heroes/actualizar/' . $heroe['id']); ?>" method="post" autocomplete="off">
        <input type="hidden" name="_method" value="PUT">
        <div class="mb-3 row text-center">
            <label for="nombre" class="col-sm-2">Nombre</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="nombre" value="<?php echo $heroe['nombre']; ?>">
            </div>
        </div>
        <div class="mb-3 row text-center">
            <label for="descripcion" class="col-sm-2">Descripción</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="descripcion" value="<?php echo $heroe['descripcion']; ?>">
            </div>
        </div>
        <div class="mb-3 row text-center">
            <label for="url_img" class="col-sm-2">URL imagen</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="url_img" value="<?php echo $heroe['url_img']; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-6 offset-md-2">
                <button type="submit" class="btn btn-success" value="PUT">Guardar cambios</button>
            </div>
        </div>
    </form>
</div>

<?php echo $this->endSection(); ?>
<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<div class="container">
    <div class="row mt-3">
        <form action="<?php echo base_url('heroes/guardar') ?>" method="post" autocomplete="off">
            <div class="mb-3 row text-center">
                <label for="nombre" class="col-sm-2">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo set_value('nombre') ?>">
                </div>
            </div>
            <div class="mb-3 row text-center">
                <label for="nombre" class="col-sm-2">Descripción</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="descripcion" value="<?php echo set_value('descripcion') ?>">
                </div>
            </div>
            <div class="mb-3 row text-center">
                <label for="nombre" class="col-sm-2">URL imagen</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="url_img" value="<?php echo set_value('url_img') ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-sm-6 offset-md-2">
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php echo $this->endSection(); ?>
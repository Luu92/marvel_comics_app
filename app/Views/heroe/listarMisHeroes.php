<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>
<div class="container">
    <div class="row">
        <h1 class="text-center mt-3"> <?php echo $titulo ?> </h1>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4">
            <div class="btn btn-success mb-3"><a class="text-light" href="/marvel_comics_app/public/heroes/crear">Agregar Heroe</a></div>
        </div>
    </div>
    <div class="row">
        <table class="table table-hover">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Acciones</th>
                    <th scope="col">Fotografia</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($heroes as $heroe) : ?>
                    <tr class="text-center">
                        <td> <?php echo $heroe['id'] ?> </td>
                        <td> <?php echo $heroe['nombre'] ?> </td>
                        <td> <?php echo $heroe['descripcion'] ?> </td>
                        <td>
                            <a href="<?php echo base_url('heroes/editar/' . $heroe['id']); ?>" class="btn btn-warning">Editar</a>
                            <form action="<?php echo base_url('heroes/eliminar/' . $heroe['id']); ?>" method="post" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este héroe?');">
                                 <input type="hidden" name="eliminar" value="1">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        <td><img width="100px" height="100px" src="<?php echo $heroe['url_img'] ?>" alt=" <?php echo $heroe['nombre'] ?> "></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php echo $this->endSection(); ?>
<?php echo $this->extend('plantilla/layout'); ?>

<?php echo $this->section('contenido'); ?>

<div class="container m-5">
    <div class="row">
        <h1 class="text-center mb-5"> <?php echo $titulo ?> </h1>
    </div>
    <!--Inicio: Tarjetas -->
    <div class="row">
        <?php
        $heroesPorPagina = 6;

        // Calcula el número total de páginas
        $totalHeroes = count($dataAPI['data']['results']);
        $totalPaginas = ceil($totalHeroes / $heroesPorPagina);

        // Página actual (comienza en 1)
        $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Índice inicial y final de héroes a mostrar en la página actual
        $inicio = ($paginaActual - 1) * $heroesPorPagina;
        $fin = $inicio + $heroesPorPagina;

        // Itera sobre los héroes y muestra solo los que están dentro del rango de la página actual
        for ($i = $inicio; $i < $fin; $i++) {
            if ($i < $totalHeroes) {
                $heroe = $dataAPI['data']['results'][$i];
        ?>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card mb-3">
                        <img src="<?php echo $heroe['thumbnail']['path'] . '.' . $heroe['thumbnail']['extension']; ?>" class="card-img-top" alt="<?php echo $heroe['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $heroe['name']; ?></h5>
                            <p class="card-text"><?php echo $heroe['description']; ?></p>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
        <!--Fin: Tarjetas -->

    <!--Inicio: paginación -->
    <div class="row">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                    <li class="page-item <?php echo $i == $paginaActual ? 'active' : ''; ?>"><a class="page-link" href="?pagina=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
    <!--Fin: paginación -->
<?php echo $this->endSection(); ?>
<main>
    <section class="corausel-section slide-width">
        <div id="carouselExampleIndicators" class="carousel slide slide-width" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 0; ?>
                <?php foreach ($slideshows as $slideshow): ?>
                    <?php $count++; ?>
                    <div class="carousel-item <?= $count == 1 ? 'active' : '' ?>">
                        <div class="overlay"></div> <!-- Add an overlay div -->
                        <div class="aspect-ratio-container r16">
                            <img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>"
                                 class="d-block w-100 aspect-ratio-img"
                                 alt="<?= $slideshow->getJudul() ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="title-corausel text-white w-100">
            <p>Galeri</p>
            <section class="hero-section x d-flex justify-content-center align-items-center" id="section_1">
                <form method="POST" class="custom-form x mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1"></span>
                        <input name="search" type="search" class="form-control" id="search"
                               placeholder="Apa yang ingin Anda cari?" aria-label="Search" value="<?=  $search ?>">
                        <button type="submit" class="form-control button-color">Cari</button>
                    </div>
                </form>
            </section>
        </div>
    </section>

    <section class="py-1 container">
        <div class="album  bg-light">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-4">
                <?php foreach ($galeriList as $galeri): ?>
                <div class="col hover-zoom">
                    <div class="card shadow-sm my-0">
                        <div class="aspect-ratio-container">
                            <!-- Gambar yang dapat diklik -->
                            <img src="/images/upload/galeri/<?= $galeri->getFoto() ?>" class="img-fluid aspect-ratio-img" alt="<?= $galeri->getJudulGaleri() ?>" data-bs-toggle="modal"
                                data-bs-target="#imageModal<?= $galeri->getIdGaleri() ?>">
                        </div>

                        <!-- Modal -->
                        <div class="modal fade " id="imageModal<?= $galeri->getIdGaleri() ?>" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="/images/upload/galeri/<?= $galeri->getFoto() ?>" class="img-fluid" alt="<?= $galeri->getJudulGaleri() ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom p-2">
                        <p class="card-text text-white px-2 text-center"><?= $galeri->getDeskripsi() ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <div class="col-lg-12 col-12 my-5">
        <nav aria-label="Halaman" class="d-flex justify-content-center">
            <ul class="pagination">
                <?php if ($model['pagination']['page'] > 1): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="/galeri?page=<?= $model['pagination']['page'] - 1 ?>"
                           aria-label="Sebelumnya">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Sebelumnya">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php
                $start = max($model['pagination']['page'] - 2, 1);
                $end = min($start + 4, $model['pagination']['totalPages']);
                $diff = $end - $start + 1;

                if ($diff < 5 && $start > 1) {
                    $start = max(1, $end - 4);
                }

                for ($i = $start; $i <= $end; $i++):
                    ?>
                    <?php if ($i == $model['pagination']['page']): ?>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#"><?= $i ?></a>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="/galeri?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endif; ?>
                <?php endfor; ?>

                <?php if ($model['pagination']['page'] < $model['pagination']['totalPages']): ?>
                    <li class="page-item">
                        <a class="page-link"
                           href="/galeri?page=<?= $model['pagination']['page'] + 1 ?>"
                           aria-label="Berikutnya">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Berikutnya">
                            <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>

</main>
<main>
    <section class="corausel-section slide-width">
        <div id="carouselExampleIndicators" class="carousel slide slide-width" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 0; ?>
                <?php foreach ($slideshows as $slideshow): ?>
                    <?php $count++; ?>
                    <div class="carousel-item <?= $count == 1 ? 'active' : '' ?>">
                        <div class="overlay"></div> <!-- Add an overlay div -->
                        <img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>" class="d-block w-100"
                             alt="<?= $slideshow->getJudul() ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="title-corausel text-white w-100">
            <p>Berita</p>
            <section class="hero-section x d-flex justify-content-center align-items-center" id="section_1">
                <form method="get" class="custom-form x mt-4 pt-2 mb-lg-0 mb-5" role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1"></span>
                        <input name="keyword" type="search" class="form-control" id="keyword"
                               placeholder="Apa yang ingin Anda cari?" aria-label="Search">
                        <button type="submit" class="form-control button-color">Cari</button>
                    </div>
                </form>
            </section>
        </div>
    </section>
    <section class="py-1 container">
        <div class="album bg-light">
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <?php
                $counter = 0; // Counter untuk menghitung jumlah item
                foreach ($beritaList as $berita):
                    if ($counter == 3) {
                        ?>
                        <div class="col-lg-8 col-12 mx-2 mt-70 d-flex flex-column flex-md-row">
                            <div class="col-12 col-lg-4 mb-4 mb-md-0 my-2 my-md-0 order-md-1">
                                <img class="img-fluid img-responsive" src="/images/upload/berita/<?= $berita->getFoto() ?>" alt="img">
                            </div>
                            <div class="col-12 col-lg-8 my-2 my-md-0 mx-md-2 order-md-2">
                                <h4 class="mb-0 text"><?= $berita->getJudulBerita(); ?></h4>
                                <div class="limit-text">
                                    <p class="card-text mb-auto my-3 "><?= $berita->getIsiBerita(); ?></p>
                                </div>
                                <a href="/berita/<?= $berita->getSlug(); ?>" class="btn custom-btn mt-3 mt-md-4 button-color">Baca Selengkapnya</a>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?>
                    <div class="col-12 col-xl-4">
                        <div class="card shadow-sm aspect-ratio-container">
                            <img src="/images/upload/berita/<?= $berita->getFoto() ?>"
                                 class="img-fluid aspect-ratio-img"
                                 alt="Image Alt Text" data-bs-toggle="modal" data-bs-target="#imageModal">
                        </div>
                        <a href="/berita/<?= $berita->getSlug(); ?>"
                           class="icon-link blink gap-1 icon-link-hover">
                            <div class="card-body rounded-bottom">
                                <h6 class="mb-0 my-3 text"><?= $berita->getJudulBerita(); ?></h6>
                                <div class="limit-text">
                                    <p class="card-text mb-auto my-3 "><?= $berita->getIsiBerita(); ?></p>
                                </div>
                                <p class="text-primary">Baca Selengkapnya >></p>
                            </div>
                        </a>
                    </div>
                    <?php
                    }
                    $counter++;
                endforeach;
                ?>
            </div>

        </div>

        </div>
    </section>

    <div class="col-lg-12 col-12 my-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mb-0">
                <!-- Tombol Previous -->
                <li class="page-item <?php echo ($currentPage === 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo($currentPage - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">Prev</span>
                    </a>
                </li>

                <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                    <!-- Link untuk setiap halaman -->
                    <li class="page-item <?php echo ($page === $currentPage) ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Tombol Next -->
                <li class="page-item <?php echo ($currentPage === $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo($currentPage + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
</main>
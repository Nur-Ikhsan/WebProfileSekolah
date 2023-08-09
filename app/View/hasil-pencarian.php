<main xmlns="http://www.w3.org/1999/html">
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
            <p>Hasil Pencarian</p>
            <section class="hero-section x d-flex justify-content-center align-items-center" id="section_1">
                <form action="/hasil-pencarian" method="POST" class="custom-form x mt-4 pt-2 mb-lg-0 mb-5"
                      role="search">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bi-search" id="basic-addon1"></span>
                        <input name="search" type="search" class="form-control" id="keyword"
                               placeholder="Apa yang ingin Anda cari?" aria-label="Search"
                               value="<?= $search ?>">
                        <button type="submit" class="form-control button-color">Cari</button>
                    </div>
                </form>
            </section>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-20 col-13 mt-4 mx-auto">
                    <div class="mb-5">
                        <div>
                            <?php foreach ($model['searchResult'] as $result) : ?>
                                <div class="col-xl-8 col-lg-10 col-md-12 mx-auto mt-5 hover-zoom">
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-4">
                                            <div class="aspect-ratio-container">
                                                <img class="img-fluid aspect-ratio-img" src="<?= $result['foto'] ?>"
                                                     alt="img">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="mb-0"><?= $result['judul'] ?></h6>
                                            <div class="limit-text">
                                                <p class="text-box text-black text-justify"><?= $result['deskripsi'] ?></p>
                                            </div>
                                            <a href="/kegiatan-sekolah/<?= $result['slug'] ?>" class="text-primary">Selengkapnya
                                                >></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<main xmlns="http://www.w3.org/1999/html">
    <section class="corausel-section slide-width">
        <div id="carouselExampleIndicators" class="carousel slide slide-width" data-bs-ride="carousel">

            <div class="carousel-inner">
                <?php $count = 0; ?>
                <?php foreach ($slideshows as $slideshow): ?>
                    <?php $count++; ?>
                    <div class="carousel-item <?= $count == 1 ? 'active' : '' ?>">
                        <img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>" class="d-block w-100" alt="<?= $slideshow->getJudul() ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="search">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="my-4 d-flex search">
                        <input type="text" class="form-control me-2" placeholder="Cari..." aria-label="Cari">
                        <button class="btn btn-primary" type="button">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-20 col-13 mt-4 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div>
                            <h5 class="mb-2 text-center">Kegiatan Sekolah</h5>
                            <div class="col-lg-10 col-12 mx-auto mt-2">
                                <div class="row">
                                    <div class="col-12 col-lg-4 mb-4">
                                        <img class="img-fluid" src="/images/upload/kegiatan/4324efe322fe32fcwr42_pembagian hadiah.png" alt="img" style="max-width: 200px; height: 200px;">
                                    </div>
                                    <div class="col-lg-8">
                                        <h6>Kegiatan Bulan Bahasa</h6>
                                        <p class="text-box text-black text-justify">Bulan Bahasa merupakan bagian kegiatan dari program kerja di SMPN 6 Lembang. Dengan melibatkan wakasek kesiswaan, dewan guru dan OSIS. Kegiatan ini diselenggarakan pada hari Rabu 26 Oktober 2022 sebagai salah satu bentuk memperingati hari lahirnya Sumpah Pemuda yaitu setiap tanggal 28 Oktober dalam ....</p>
                                        <a href="/ppdb" class="">Selengkapnya >>></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12 my-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">Prev</span>
                        </a>
                    </li>

                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">1</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">4</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#">5</a>
                    </li>

                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</main>

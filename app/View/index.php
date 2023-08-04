<main>
    <section class="corausel-section slide-width">
        <div id="carouselExampleIndicators" class="carousel slide slide-width" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 0; ?>
                <?php foreach ($slideshows as $slideshow): ?>
                    <?php $count++; ?>
                    <div class="carousel-item <?= $count == 1 ? 'active' : '' ?>">
                        <div class="aspect-ratio-container r16">
                            <img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>"
                                 class="d-block w-100 aspect-ratio-img"
                                 alt="<?= $slideshow->getJudul() ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h6 class="text-center">Selamat Datang</h6>
                    <h1 class="text-white text-center">MTS NEGERI 2 SAMBAS</h1>

                    <form action="/hasil-pencarian" method="POST" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bi-search" id="basic-addon1"></span>
                            <input name="search" type="search" class="form-control" id="keyword"
                                   placeholder="Apa yang ingin Anda cari?" aria-label="Search">
                            <button type="submit" class="form-control button-color">Cari</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-8 col-12 mx-auto mt-70 custom-block d-flex flex-column flex-md-row">
                    <div class="col-12 col-md-4 mb-4 mb-md-0 my-2 my-md-0">
                        <img class="rounded-4 img-fluid img-responsive" src="/images/ppdb1.png" alt="img">
                    </div>
                    <div class="col-12 col-md-8 my-2 my-md-0 mx-md-2">
                        <h6 class="text-white">PENDAFTARAN PESERTA DIDIK BARU</h6>
                        <p class="text-box">Berikut informasi mengenai Penerimaan Peserta Didik Baru (PPDB) MTs Negeri 2
                            Sambas T.P. 2023/2024. Untuk informasi lebih jelasnya ...</p>
                        <a href="/ppdb" class="btn custom-btn mt-3 mt-md-4 button-color">Baca Selengkapnya</a>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="py-1 container">
        <div class="row">

            <div class="col-12 text-center mt-5">
                <h1 class="mb-4">Berita Terbaru</h1>
            </div>

        </div>
        <div class="album  bg-light">
            <div class="row g-3 my-2">
                <?php
                $counter = 0; // Counter untuk menghitung jumlah item
                foreach ($beritaList as $berita):
                    if ($counter >= 6) {
                        break; // Hentikan perulangan jika sudah mencapai 6 item
                    }
                    ?>
                    <div class="col-12 col-md-4">
                        <div class="card shadow-sm aspect-ratio-container">
                            <img src="/images/upload/berita/<?= $berita->getFoto() ?>" class="img-fluid aspect-ratio-img"
                                 alt="Image Alt Text" data-bs-toggle="modal" data-bs-target="#imageModal">
                        </div>
                        <a href="/berita/<?= $berita->getSlug(); ?>"
                           class="icon-link blink gap-1 icon-link-hover">
                            <div class="card-body rounded-bottom">
                                <h6 class="mb-0 text"><?= $berita->getJudulBerita(); ?></h6>
                                <div class="limit-text">
                                    <p class="card-text mb-auto my-3 "><?= $berita->getIsiBerita(); ?></p>
                                </div>
                                <p class="text-primary">Baca Selengkapnya >></p>
                            </div>
                        </a>
                    </div>
                    <?php
                    $counter++;
                endforeach;
                ?>
            </div>
            <div class="text-center"> <!-- Wrap the button in a container with "text-center" class -->
                <button type="button" class="btn-custom mt-5" onclick="window.location.href='/berita'">Tampilkan Semua
                </button>
            </div>
    </section>


    <section id="ekstrakurikuler" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-20 col-13 mt-4 mx-auto">
                    <div class="custom-block bg-custome custom-block-topics-listing shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="custom-block-topics-listing-info d-flex">
                                <div class="col-12 text-center">
                                    <h1 class="text-white mb-4">Ekstrakurikuler</h1>
                                </div>
                                <div class="col-lg-10 col-12 mx-auto">
                                    <div class="timeline-container">
                                        <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                            <div class="list-progress">
                                                <div class="inner"></div>
                                            </div>

                                            <?php foreach ($ekstrakurikulerList as $ekstrakurikuler): ?>
                                                <li class="">
                                                    <h4 class="text-white mb-3"><?= $ekstrakurikuler->getNamaEkstrakurikuler() ?></h4>
                                                    <p class="text-white"><?= $ekstrakurikuler->getDeskripsi() ?></p>
                                                    <div class="icon-holder">
                                                        <img src="/images/upload/ekstrakurikuler/<?= $ekstrakurikuler->getIcon() ?>">
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="faq-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h2 class="mb-4 text-center">Prestasi</h2>
                </div>

                <div class="clearfix"></div>

                <div class="mb-4 col-lg-5 col-12 m-auto text-center">
                    <img src="images/prestasi.png" class="img-fluid mx-auto" alt="FAQs">
                </div>


                <div class="col-lg-6 col-12 m-auto">
                    <div class="accordion" id="accordionExample">
                        <?php
                        $kategoriList = [];
                        foreach ($prestasiList as $prestasi) {
                            $kategori = $prestasi->getKategori();
                            if (!array_key_exists($kategori, $kategoriList)) {
                                $kategoriList[$kategori] = [];
                            }
                            $kategoriList[$kategori][] = $prestasi->getNama();
                        }
                        ?>

                        <?php $index = 0; ?>
                        <?php foreach ($kategoriList as $kategori => $prestasiNames): ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?= $index ?>">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?= $index ?>" aria-expanded="false"
                                            aria-controls="collapse<?= $index ?>">
                                        <?= $kategori ?>
                                    </button>
                                </h2>

                                <div id="collapse<?= $index ?>" class="accordion-collapse collapse"
                                     aria-labelledby="heading<?= $index ?>"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?php foreach ($prestasiNames as $prestasiName): ?>
                                            <div class="accordion-body">
                                                <?= $prestasiName ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $index++; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <div class="tab-pane fade" id="education-tab-pane" role="tabpanel"
         aria-labelledby="education-tab" tabindex="0">
        <div class="row w-100">
            <div class="col-12 text-center">
                <h1 class="mb-4">Guru dan Staff</h1>
            </div>
            <div class="slider">
                <div class="owl-carousel">
                    <?php foreach ($guruStaffList as $guruStaff): ?>
                        <div class="slider-card">
                            <div class="d-flex justify-content-center align-items-center mb-4">
                                <img src="/images/upload/guru-staff/<?php echo $guruStaff->getFoto(); ?>" alt="">
                            </div>
                            <div class="text-container">
                                <p class="mb-0 text-center"><b><?php echo $guruStaff->getNamaGuru(); ?></b></p>
                                <p class="text-center mb-0"><?php echo $guruStaff->getJabatan(); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="text-center"> <!-- Wrap the button in a container with "text-center" class -->
                    <button type="button" class="btn-custom mt-5" onclick="window.location.href='/guru-staff'">Tampilkan
                        Semua
                    </button>
                </div>
            </div>
        </div>
    </div>


</main>

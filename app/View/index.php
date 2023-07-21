<main>
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


    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h6 class="text-center">Selamat Datang</h6>
                    <h1 class="text-white text-center">MTS NEGERI 2 SAMBAS</h1>

                    <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                                    <span class="input-group-text bi-search" id="basic-addon1">

                                    </span>

                            <input name="keyword" type="search" class="form-control" id="keyword"
                                   placeholder="Apa yang ingin Anda cari?" aria-label="Search">

                            <button type="submit" class="form-control button-color">Cari</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-8 col-12 mx-auto mt-70 custom-block d-flex justify-content-between flex-column flex-lg-row">
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0 my-2 my-lg-0">
                        <img class="rounded-4 img-fluid img-responsive" src="/images/ppdb1.png" alt="img">
                    </div>
                    <div class="col-12 col-lg-8 my-2 my-lg-0 mx-lg-2">
                        <h6>Pendaftaran Peserta Didik Baru</h6>
                        <p class="text-box">Berikut informasi mengenai Penerimaan Peserta Didik Baru (PPDB) MTs Negeri 2
                            Sambas T.P. 2023/2024. Untuk informasi lebih jelasnya ...</p>
                        <a href="/ppdb" class="btn custom-btn mt-3 mt-lg-4 button-color">Read More</a>
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
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <?php foreach ($beritaList as $berita): ?>
                    <div class="col-4 ">
                        <div class="card shadow-sm ">
                            <!-- Gambar yang dapat diklik -->

                            <img src="/images/upload/berita/<?= $berita->getFoto() ?>" class="img-fluid "
                                 alt="Image Alt Text" data-bs-toggle="modal" data-bs-target="#imageModal">

                            <!-- Modal -->
                            <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body rounded-bottom">
                            <h6 class="mb-0 my-3"><?= $berita->getJudulBerita(); ?></h6>
                            <div class="limit-text">
                                <p class="card-text mb-auto my-3 "><?= $berita->getIsiBerita(); ?></p>
                            </div>

                            <a href="/detail_berita?id=<?= $berita->getIdBerita(); ?>"
                               class="icon-link blink gap-1 icon-link-hover stretched-link">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>

                <?php endforeach;?>
                <div class="col ">
                    <div class="card shadow-sm ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="/public/images/person.jpg" class="img-fluid " alt="Image Alt Text"
                             data-bs-toggle="modal" data-bs-target="#imageModal">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body rounded-bottom">
                        <h6 class="mb-0 my-3">Featured post</h6>
                        <p class="card-text mb-auto my-3">This is a wider card with supporting text below as a
                            natural
                            lead-in to additional content.</p>
                        <a href="#" class="icon-link blink gap-1 icon-link-hover stretched-link">
                            Baca Selengkapnya

                        </a>
                    </div>
                </div>
                <div class="col ">
                    <div class="card shadow-sm ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="/public/images/person.jpg" class="img-fluid " alt="Image Alt Text"
                             data-bs-toggle="modal" data-bs-target="#imageModal">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                             aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body rounded-bottom">
                        <h6 class="mb-0 my-3">Featured post</h6>
                        <p class="card-text mb-auto my-3">This is a wider card with supporting text below as a
                            natural
                            lead-in to additional content Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Veniam, tempora?</p>
                        <a href="#" class="icon-link blink gap-1 icon-link-hover stretched-link">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                </div>
            <div class="text-center"> <!-- Wrap the button in a container with "text-center" class -->
                <button type="button" class="btn-custom mt-5" onclick="window.location.href='/berita'">Tampilkan Semua</button>
            </div>
            </div>
</section>


    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-20 col-13 mt-4 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="custom-block-topics-listing-info d-flex">
                <div class="col-12 text-center">
                    <h1 class="text-black mb-4">Ekstrakurikuler</h1>
                </div>
                <div class="col-lg-10 col-12 mx-auto">
                    <div class="timeline-container">
                        <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                            <div class="list-progress">
                                <div class="inner"></div>
                            </div>

                            <?php foreach ($ekstrakurikulerList as $ekstrakurikuler): ?>
                                <li>
                                    <h4 class="text-black mb-3"><?= $ekstrakurikuler->getNamaEkstrakurikuler() ?></h4>
                                    <p class="text-black"><?= $ekstrakurikuler->getDeskripsi() ?></p>
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

                <div class="col-lg-6 col-12">
                    <h2 class="mb-4">Prestasi</h2>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-5 col-12">
                    <img src="images/prestasi.png" class="img-fluid" alt="FAQs">
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
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">Guru dan Staff</h1>
            </div>
            <div class="slider">
                <div class="owl-carousel">
                    <?php foreach ($guruStaffList as $guruStaff): ?>
                        <?php if ($guruStaff->getJabatan() != 'ADMIN') { ?>
                            <div class="slider-card">
                                <div class="d-flex justify-content-center align-items-center mb-4">
                                    <img src="/images/upload/guru-staff/<?php echo $guruStaff->getFoto(); ?>" alt="">
                                </div>
                                <h5 class="mb-0 text-center"><b><?php echo $guruStaff->getNamaGuru(); ?></b></h5>
                                <p class="text-center p-4"><?php echo $guruStaff->getJabatan(); ?></p>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>



</main>

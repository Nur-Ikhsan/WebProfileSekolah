<main>

    <section class="corausel-section slide-width">
        <div id="carouselExampleIndicators" class="carousel slide slide-width" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 0; ?>
                <?php foreach ($slideshows as $slideshow): ?>
                    <?php $count++; ?>
                    <div class="carousel-item <?= $count == 1 ? 'active' : '' ?>">
                        <div class="overlay"></div> <!-- Add an overlay div -->
                        <img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>" class="d-block w-100" alt="<?= $slideshow->getJudul() ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="py-1 container">
        <div class="album  bg-light">
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-4">
                <div class="col ">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/64b59d4d581b5_slideshow1.jpg" class="img-fluid " alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

                        <!-- Modal -->
                        <div class="modal fade " id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/64b59d4d581b5_slideshow1.jpg" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom my-1">
                        <p class="card-text text-white px-2">Pelepasan siswa-siswi MTS N 02 Sambas Tahun 2020</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/slideshow/64a934069715b_slideshow3.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal1">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal1" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/slideshow/64a934069715b_slideshow3.jpg" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Kegiatan Sekolah</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/slideshow/64a934148891a_slideshow5.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal2">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal2" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/slideshow/64a934148891a_slideshow5.jpg" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Kegiatan Sekolah</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/75x56g9p964a2_kelas.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal3">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal3" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/75x56g9p964a2_kelas.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Ruang Kelas</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/75sr26n9p16la2_belajar.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal4">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal4" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/75sr26n9p16la2_belajar.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Ruang Pembelajaran</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_pembagian_hadiah.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal5">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal5" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_pembagian_hadiah.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Pembagian Hadiah</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_senam.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal6">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal6" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_senam.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Kegiatan Senam bagi guru dan staff</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_pbb.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal7">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal7" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_pbb.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Kegiatan Sekolah</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_pembagian_sertifikat.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal8">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal8" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_pembagian_sertifikat.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Pembagian Sertifikat kepada guru dan staff Sekolah</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_drumband.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal9">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal9" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_drumband.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Kegiatan Drumband di Luar Lingkungan Sekolah</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_drumband.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal0">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal0" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_drumband.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Kegiatan Outdor di Lingkungan Sekolah</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm my-0">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_covid.png" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal11">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal11" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/upload/galeri/unsplash_h6gCRTCxM7o_covid.png" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Kegiatan Penyemprotan Disinvektan di Ruang Kelas Pada Tahun 2020</p>
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
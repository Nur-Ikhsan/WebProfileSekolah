<main>
    <nav class="navbar navbar-expand-sm">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="logo" class="logo-img"/>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/index">Beranda</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Profil</a>

                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                            <li><a class="dropdown-item" href="/struktur-organisasi">Struktur Organisasi</a></li>

                            <li><a class="dropdown-item" href="/visi-misi">Visi dan Misi</a></li>

                            <li><a class="dropdown-item" href="/tujuan">Tujuan</a></li>
                        </ul>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="/kurikulum">Kurikulum</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/berita">berita</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/galeri">galeri</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/admin/login">login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Homepage</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Berita</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="bg-image" style="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="my-4 d-flex  search">
                        <input type="text" class="form-control me-2" placeholder="Cari..." aria-label="Cari">
                        <button class="btn btn-primary" type="button">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <section class="py-1 container">

        <div class="album  bg-light">
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <div class="col ">
                    <div class="card shadow-sm ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid " alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm  ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text" data-bs-toggle="modal"
                            data-bs-target="#imageModal">

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
                    <div class="card-body section-bg-dark rounded-bottom">
                        <p class="card-text text-white px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Id,
                            quia.</p>
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
<footer class="site-footer section-padding section-bg-dark">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-5 text-white">Hubungi Kami</h2>
            </div>

            <div class="row justify-content-around">
                <div class="col-lg-5 col-12 mb-4 mb-lg-0 ">
                    <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.832108930004!2d109.07498579932798!3d1.189849675765968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e49c2fbdf3d491%3A0x91e764f45793cc44!2sMTs.%20NEGERI%202%20SAMBAS!5e0!3m2!1sid!2sid!4v1686462693971!5m2!1sid!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-lg-7 col-md-4 col-6 mb-4 mb-lg-0 footer-box">
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Alamat :</h6>
                        <p class="text-white footer-text">
                            Jalan Pertasi Kencana Semparuk
                        </p>
                    </div>
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Telepon :</h6>
                        <p class="text-white footer-text">
                            ( 0562 ) 371457
                        </p>
                    </div>
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Email :</h6>
                        <p class="text-white footer-text">
                            fuad.adhik@gmail.com
                        </p>
                    </div>
                    <div>
                        <h6 class="site-footer-title mb-3 text-white footer-text">Website :</h6>
                        <p class="text-white footer-text">
                            <a href="http://mtsn2sambas.mysch.id/" class="site-footer-link text-white footer-text">
                                http://mtsn2sambas.mysch.id/
                            </a>
                        </p>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="mt-lg-5 mt-4 text-white">© 2023 - MTs Negeri 2 Sambas</p>
                </div>
            </div>
        </div>
    </div>
</footer>
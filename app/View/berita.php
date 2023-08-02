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

        </div>

        </div>
    </section>

    <section class="container">

        <div class="row mb-2 my-5">
            <div class="col-md-12">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="400" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>

                    </div>
                    <div class="col p-4 flex-column position-static">

                        <h6 class="mb-0 d-inline-block">Featured post</h6>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                            lead-in to additional content.</p>
                        <button type="button" class="btn-custom mt-5"
                            onclick="window.location.href='/detail_berita'">Tampilkan
                            Semua</button>


                        <div id="extwaiokist" style="display:none" v="fcoon" q="9d7335d7" c="451.1" i="315" u="18.98"
                            s="07052315" sg="svr_04262315-ga_07052315-bai_06162323" d="1" w="false" e="" a="2" m="BMe="
                            vn="3gtra">
                            <div id="extwaigglbit" style="display:none" v="fcoon" q="9d7335d7" c="451.1" i="315"
                                u="18.98" s="07052315" sg="svr_04262315-ga_07052315-bai_06162323" d="1" w="false" e=""
                                a="2" m="BMe="></div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
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
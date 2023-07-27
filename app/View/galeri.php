<main>


    <section class="py-1 container">

        <div class="album  bg-light">
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <?php foreach ($galeriList as $galeri): ?>
                <div class="col-4 ">
                    <div class="shadow-sm ">
                        <!-- Gambar yang dapat diklik -->
                        <img src="/images/upload/galeri/<?= $galeri->getFoto() ?>" class=" img-fluid rounded" alt=" Image Alt
                            Text" data-bs-toggle="modal" data-bs-target="#imageModal">

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
                        <p class="card-text text-white px-2"><?= $galeri->getJudulGaleri(); ?></p>
                    </div>
                </div>
                <?php endforeach;?>
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
                    <!-- Tombol Previous -->
                    <li class="page-item <?php echo ($currentPage === 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>" aria-label="Previous">
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
                        <a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>" aria-label="Next">
                            <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
</main>
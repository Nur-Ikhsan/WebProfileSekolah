<main>



    <section class="bg-image" style="background-image: url('images/img1.jpg');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 ">
                    <div class="d-flex  search">
                        <input type="text" class="form-control me-2" placeholder="Cari..." aria-label="Cari">
                        <button class="btn btn-primary" type="button">Cari</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="container">

        <div class="row row-cols-md-4 row-cols-lg-4 row-cols-sm-1 mt-40 justify-content-center mb-100">

            <div class="row col-lg-8">
                <?php foreach ($guruStaffList as $gurustaff): ?>
                <div class="card" style="max-width: 10rem;">
                    <img src="/images/upload/guru-staff/<?= $gurustaff->getFoto() ?>" class="img-fluid "
                        alt="Image Alt Text">
                    <div class="card-footer">
                        <p class="fs-6 text-center"><?= $gurustaff->getNamaGuru(); ?></p>
                        <small class="text-muted
                             "><?= $gurustaff->getJabatan(); ?></small>
                    </div>
                </div>
                <?php endforeach;?>
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
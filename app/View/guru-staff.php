<main>

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="a" href="#">Profil</a></li>

                            <li class="breadcrumb-item actived" aria-current="page">Guru dan Staff</li>
                        </ol>
                    </nav>
                    <h2 class="text-white">Guru dan Staff</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="container">
        <div class="row row-cols-md-4 row-cols-lg-4 row-cols-sm-1 justify-content-center">
            <form method="POST" class="custom-form x mt-4 pt-2 mb-lg-0 mb-5" role="search">
                <div class="search-container">
                    <div class="search-box">
                        <span class="bi-search"></span>
                        <input name="search" type="search" class="search-input" id="search" placeholder="Cari"
                               aria-label="Search" value="<?=  $search ?>">
                        <!--                    <button type="submit" class="search-button">Cari</button>-->
                    </div>
                </div>
            </form>
        </div>
        <div class="row row-cols-md-4 row-cols-lg-4 row-cols-sm-1 mt-120 justify-content-center mb-100">
            <?php foreach ($guruStaffList as $gurustaff): ?>
                <div class="mx-5 card-img-container mb-4" style="max-width: 15rem; max-height: 20rem;">
                    <div class="img-container d-flex justify-content-center align-items-center">
                        <img src="/images/upload/guru-staff/<?php echo $gurustaff->getFoto(); ?>"
                             class="img-fluid card-img-top same-size-img" alt="Image Alt Text">
                    </div>
                    <div class="card-text-overlay text-center">
                        <p class="fs-6 text-center"><b><?= $gurustaff->getNamaGuru(); ?></b></p>
                        <p class="text-muted"><?= $gurustaff->getJabatan(); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-12 col-12 my-5">
            <nav aria-label="Halaman" class="d-flex justify-content-center">
                <ul class="pagination">
                    <?php if ($model['pagination']['page'] > 1): ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="/guru-staff?page=<?= $model['pagination']['page'] - 1 ?>"
                               aria-label="Sebelumnya">
                                <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Sebelumnya">
                                <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                            </a>
                        </li>
                    <?php endif; ?>

                    <?php
                    $start = max($model['pagination']['page'] - 2, 1);
                    $end = min($start + 4, $model['pagination']['totalPages']);
                    $diff = $end - $start + 1;

                    if ($diff < 5 && $start > 1) {
                        $start = max(1, $end - 4);
                    }

                    for ($i = $start; $i <= $end; $i++):
                        ?>
                        <?php if ($i == $model['pagination']['page']): ?>
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#"><?= $i ?></a>
                        </li>
                    <?php else: ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="/guru-staff?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($model['pagination']['page'] < $model['pagination']['totalPages']): ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="/guru-staff?page=<?= $model['pagination']['page'] + 1 ?>"
                               aria-label="Berikutnya">
                                <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Berikutnya">
                                <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </section>
</main>
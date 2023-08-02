<main>



    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="a" href="#">Profil</a></li>

                            <li class="breadcrumb-item actived" aria-current="page">Fasilitas Sekolah</li>
                        </ol>
                    </nav>
                    <h2 class="text-white">Fasilitas Sekolah</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="container">

        <div class="album mx-70">
            <div class="row g-3 my-2">
                <?php foreach ($fasilitasList as $fasilitas): ?>
                    <div class="col-12 col-sm-6  col-md-4">
                        <div class="shadow-sm position-relative">
                            <!-- Gambar yang dapat diklik -->
                            <img src="/images/upload/fasilitas/<?= $fasilitas->getFoto() ?>" class="img-fluid rounded"
                                 alt="Image Alt Text" data-bs-toggle="modal" data-bs-target="#imageModal<?= $fasilitas->getId() ?>">
                            <div class="section-bg-soft position-absolute bottom-0 w-100">
                                <h6 class="card-text card-titles text-white px-2 text-center">
                                    <?= $fasilitas->getNama(); ?></h6>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="imageModal<?= $fasilitas->getId() ?>" tabindex="-1" aria-labelledby="imageModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <img src="/images/upload/fasilitas/<?= $fasilitas->getFoto() ?>" class="img-fluid" alt="Image Alt Text">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <p class="card-text px-2 text-muted"><?= $fasilitas->getDeskripsi(); ?></p>
                    </div>

                <?php endforeach?>
            </div>
            <nav aria-label="Halaman" class="d-flex justify-content-center">
                <ul class="pagination">
                    <?php if ($model['pagination']['page'] > 1): ?>
                        <li class="page-item">
                            <a class="page-link" href="/admin?page=<?= $model['pagination']['page'] - 1 ?>" aria-label="Sebelumnya">
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
                            <a class="page-link" href="/admin?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($model['pagination']['page'] < $model['pagination']['totalPages']): ?>
                        <li class="page-item">
                            <a class="page-link" href="/admin?page=<?= $model['pagination']['page'] + 1 ?>" aria-label="Berikutnya">
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
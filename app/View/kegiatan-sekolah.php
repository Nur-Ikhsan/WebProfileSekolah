<main xmlns="http://www.w3.org/1999/html">

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="a" href="/index">Home</a></li>
                            <li class="breadcrumb-item">Profil</li>
                            <li class="breadcrumb-item actived" aria-current="page">Kegiatan Sekolah</li>
                        </ol>
                    </nav>
                    <h2 class="text-white">Kegiatan Sekolah</h2>
                </div>

            </div>
        </div>
    </header>

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-20 col-13 mt-4 mx-auto">
                    <div class="mb-5">
                        <div>
                            <?php foreach ($model['kegiatanList'] as $kegiatan) : ?>
                                <div class="col-xl-8 col-lg-10 col-md-12 mx-auto mt-5 hover-zoom">
                                    <div class="row">
                                        <div class="col-12 col-md-4 mb-4">
                                            <div class="aspect-ratio-container">
                                                <img class="img-fluid aspect-ratio-img" src="/images/upload/kegiatan/<?= $kegiatan->getFoto() ?>" alt="img">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <h6 class="mb-0"><?= $kegiatan->getNamaKegiatan() ?></h6>
                                            <div class="limit-text">
                                                <p class="text-box text-black text-justify"><?= $kegiatan->getDeskripsi() ?></p>
                                            </div>
                                            <a href="/kegiatan-sekolah/<?= $kegiatan->getSlug() ?>" class="text-primary">Selengkapnya >></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-12 my-5">
            <nav aria-label="Halaman" class="d-flex justify-content-center">
                <ul class="pagination">
                    <?php if ($model['pagination']['page'] > 1): ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="/kegiatan-sekolah?page=<?= $model['pagination']['page'] - 1 ?>"
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
                               href="/kegiatan-sekolah?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endif; ?>
                    <?php endfor; ?>

                    <?php if ($model['pagination']['page'] < $model['pagination']['totalPages']): ?>
                        <li class="page-item">
                            <a class="page-link"
                               href="/kegiatan-sekolah?page=<?= $model['pagination']['page'] + 1 ?>"
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

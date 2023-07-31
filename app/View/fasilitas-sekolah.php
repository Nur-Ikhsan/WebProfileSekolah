<main>





    <section class="container">

        <div class="album mt-120">
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
        </div>

    </section>
</main>
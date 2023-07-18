<main>
    <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="custom-block-topics-listing-info d-flex">
                                <div>
                                    <h5 class="mb-2 text-center"><?php echo $kurikulum->getNamaKurikulum(); ?></h5>

                                    <p class="mb-0"><?php echo $kurikulum->getDekripsiKurikulum(); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href=""></a>

                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="custom-block-topics-listing-info d-flex">
                                <div>
                                    <h5 class="mb-2 text-center">Struktur Kurikulum</h5>
                                    <div class="accordion" id="accordionExample">
                                        <?php foreach ($kurikulumList as $kategori => $kurikulumItems) { ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading<?php echo $kategori; ?>">
                                                    <button class="accordion-button collapsed" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#collapse<?php echo $kategori; ?>"
                                                            aria-expanded="false"
                                                            aria-controls="collapse<?php echo $kategori; ?>">
                                                        <?php echo $kategori; ?>
                                                    </button>
                                                </h2>

                                                <div id="collapse<?php echo $kategori; ?>"
                                                     class="accordion-collapse collapse"
                                                     aria-labelledby="heading<?php echo $kategori; ?>"
                                                     data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <?php foreach ($kurikulumItems as $kurikulumItem) { ?>
                                                            <div class="accordion-item">
                                                                <h3 class="accordion-header"
                                                                    id="heading<?php echo $kurikulumItem->getId(); ?>">
                                                                    <button class="accordion-button collapsed"
                                                                            type="button"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#collapse<?php echo $kurikulumItem->getId(); ?>"
                                                                            aria-expanded="false"
                                                                            aria-controls="collapse<?php echo $kurikulumItem->getId(); ?>">
                                                                        <?php echo $kurikulumItem->getKomponen(); ?>
                                                                    </button>
                                                                </h3>

                                                                <div
                                                                        id="collapse<?php echo $kurikulumItem->getId(); ?>"
                                                                        class="accordion-collapse collapse"
                                                                        aria-labelledby="heading<?php echo $kurikulumItem->getId(); ?>"
                                                                        data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <?php echo $kurikulumItem->getSubKomponen(); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>
</main>
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
                                    <div class="accordion" id="accordionExample">
                                        <div class="accordion" id="accordionExample">
                                            <?php
                                            $currentCategory = null;
                                            foreach ($kurikulumList as $kurikulumItem) :
                                            if ($kurikulumItem->getKategori() !== $currentCategory) :
                                            // Start a new accordion item for a new category
                                            if ($currentCategory !== null) :
                                                // Close the previous accordion item if it exists
                                                echo '</div></div></div>';
                                            endif;
                                            ?>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading<?= $kurikulumItem->getId() ?>">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                            data-bs-target="#collapse<?= $kurikulumItem->getId() ?>" aria-expanded="false"
                                                            aria-controls="collapse<?= $kurikulumItem->getId() ?>">
                                                        <?= $kurikulumItem->getKategori() ?>
                                                    </button>
                                                </h2>
                                                <div id="collapse<?= $kurikulumItem->getId() ?>" class="accordion-collapse collapse"
                                                     aria-labelledby="heading<?= $kurikulumItem->getId() ?>" data-bs-parent="#accordionExample">
                                                    <div class="accordion-body">
                                                        <?php
                                                        endif;
                                                        // Display komponen and subKomponen under the current accordion item
                                                        ?>
                                                        <p><?= $kurikulumItem->getKomponen() ?></p>
                                                        <p><?= $kurikulumItem->getSubKomponen() ?></p>
                                                        <?php
                                                        $currentCategory = $kurikulumItem->getKategori();
                                                        endforeach;

                                                        // Close the last accordion item
                                                        if ($currentCategory !== null) :
                                                            echo '</div></div></div>';
                                                        endif;
                                                        ?>
                                                    </div>

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

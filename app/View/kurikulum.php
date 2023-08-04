<main>
    <section class="corausel-section slide-width">
        <div id="carouselExampleIndicators" class="carousel slide slide-width" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 0; ?>
                <?php foreach ($slideshows as $slideshow): ?>
                    <?php $count++; ?>
                    <div class="carousel-item <?= $count == 1 ? 'active' : '' ?>">
                        <div class="overlay"></div> <!-- Add an overlay div -->
                        <div class="aspect-ratio-container r16">
                            <img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>"
                                 class="d-block w-100 aspect-ratio-img"
                                 alt="<?= $slideshow->getJudul() ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="title-corausel text-white">
            <p>Kurikulum</p>
        </div>
    </section>



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
                            <div class="accordion" id="accordionExample">
                                <!-- Awal Perulangan -->
                                <?php
                                $previousCategory = null;
                                foreach ($kurikulumList as $index => $kurikulum):
                                $currentCategory = $kurikulum->getKategori();
                                $id = str_replace(' ', '_', $currentCategory);

                                if ($currentCategory !== $previousCategory):
                                ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?= $id ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?= $id ?>" aria-expanded="false"
                                            aria-controls="collapse<?= $id ?>">
                                        <?= $currentCategory ?>
                                    </button>
                                </h2>
                                <div id="collapse<?= $id ?>" class="accordion-collapse collapse <?= ($index === 0) ? 'show' : '' ?>"
                                     aria-labelledby="heading<?= $id ?>" data-bs-parent="#accordionExample">
                                <ol>
                                    <?php
                                    endif;
                                    // Tampilkan komponen
                                    ?>
                                <li class=" mx-4">
                                    <div class="accordion-body">
                                        <?= $kurikulum->getKomponen() ?>
                                    </div>
                                </li>
                                    <?php
                                    $previousCategory = $currentCategory;

                                    // Tutup accordion-collapse dan accordion-item setelah perulangan terakhir atau saat kategorinya berbeda
                                    $nextKurikulum = ($index + 1 < count($kurikulumList)) ? $kurikulumList[$index + 1] : null;
                                    if ($nextKurikulum === null || $nextKurikulum->getKategori() !== $currentCategory):
                                        ?>
                                        </ol>
                                </div>
                            </div>
                        <?php endif; endforeach; ?>
                            <!-- Akhir Perulangan -->
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

<main>

    <section style="height: 100vh" class="corausel-section slide-width">
        <div class="aspect-ratio-container r16">
            <img src="images/2d1k8d1tf85s_ppdb.jpg" class="d-block aspect-ratio-img w-100">
        </div>
    </section>

    <section class="container">
        <div class=" row align-items-md-stretch">
            <div class="col-lg-8 col-12 mx-auto my-5">
                <h1 class=" text-center" style="color: seagreen">Informasi PPDB</h1>
            </div>
            <div class="col-md-6 my-5">
                <section class="timeline-section section-padding">
                    <div style="background-color: white">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-12 mx-auto mw-100">
                                <div class="timeline-container">
                                    <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                        <div class="list-progress">
                                            <div class="inner"></div>
                                        </div>

                                        <?php foreach ($alurPPDBList as $alurPPDB) : ?>
                                        <li>
                                            <h4 class="text-black mb-3"><?= $alurPPDB->getJudul() ?></h4>
                                            <p class="text-black"><?= $alurPPDB->getTanggal() ?></p>
                                            <div class="icon-holder text-white">
                                                <p class="fw-bold fs-2"><?= $alurPPDB->getUrutan() ?></p>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            </div>
            <div class="col-md-6 my-5">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <img class="w-100" src="/images/upload/ppdb/<?= $ppdb->getBrosur() ?>" alt="Contoh Gambar" width="300">
                    <div class="mt-3 text-center">
                        <form action="/ppdb/downloadbrosur" method="post" target="_blank">
                            <button href="/download-gambar" type="submit" class="btn btn-custom">Download
                                Brosur</button>
                        </form>

                    </div>
                </div>
                </div>
            </div>
    </section>




</main>
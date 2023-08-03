<main>


    <section class="bg-image" style="height: 100vh; width: 100vw; display: flex;">
        <img src="images/ppdb.png" style="max-width: 100%; max-height: 100%;">
    </section>



    <section class="container">
        <div class=" row align-items-md-stretch">
            <div class="col-lg-8 col-12 mx-auto my-5">
                <h1 class=" text-center">Informasi PPDB</h1>


            </div>
            <div class="col-md-6 my-5">
                <section class="timeline-section section-padding">
                    <div class="section-overlay"></div>

                    <div class="container">
                        <div class="row">

                            <div class="col-lg-10 col-12 mx-auto mw-100">
                                <div class="timeline-container">
                                    <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                                        <div class="list-progress">
                                            <div class="inner"></div>
                                        </div>

                                        <li>
                                            <h4 class="text-black mb-3">Pendaftaran</h4>

                                            <p class="text-black">15 - 23 Juni</p>

                                            <div class="icon-holder">
                                                <i class="bi-search"></i>
                                            </div>
                                        </li>

                                        <li>
                                            <h4 class="text-black mb-3">Pengumuman Hasil</h4>

                                            <p class="text-black">Tanggal</p>

                                            <div class="icon-holder">
                                                <i class="bi-bookmark"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <h4 class="text-black mb-3">Daftar Ulang</h4>

                                            <p class="text-black">Tanggal</p>

                                            <div class="icon-holder">
                                                <i class="bi-bookmark"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <h4 class="text-black mb-3">Awal Tahun Ajaran Baru</h4>

                                            <p class="text-black">Tanggal</p>

                                            <div class="icon-holder">
                                                <img src="/images/Seni.png">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-6 my-5">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <img class="w-100 h-50" src="<?php echo $gambarPath; ?>" alt="Contoh Gambar" width="300"
                         height="200">
                    <div class="mt-3 text-center">
                        <form action="/download-gambar" method="post">
                            <button href="/download-gambar" type="submit" class="btn btn-custom">Download
                                Brosur</button>
                        </form>

                    </div>
                </div>
                </div>
            </div>
    </section>




</main>
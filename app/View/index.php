<main>
    <section class="corausel-section slide-width">
        <div id="carouselExampleIndicators" class="carousel slide slide-width" data-bs-ride="carousel">

            <div class="carousel-inner">
                <?php $count = 0; ?>
                <?php foreach ($slideshows as $slideshow): ?>
                    <?php $count++; ?>
                    <div class="carousel-item <?= $count == 1 ? 'active' : '' ?>">
                        <img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>" class="d-block w-100" alt="<?= $slideshow->getJudul() ?>">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>


    <section class="hero-section d-flex justify-content-center align-items-center" id="section_1">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mx-auto">
                    <h6 class="text-center">Selamat Datang</h6>
                    <h1 class="text-white text-center">MTS NEGERI 2 SAMBAS</h1>

                    <form method="get" class="custom-form mt-4 pt-2 mb-lg-0 mb-5" role="search">
                        <div class="input-group input-group-lg">
                                    <span class="input-group-text bi-search" id="basic-addon1">

                                    </span>

                            <input name="keyword" type="search" class="form-control" id="keyword"
                                   placeholder="Apa yang ingin Anda cari?" aria-label="Search">

                            <button type="submit" class="form-control button-color">Cari</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-8 col-12 mx-auto mt-70 custom-block d-flex justify-content-between flex-column flex-lg-row">
                    <div class="col-12 col-lg-4 mb-4 mb-lg-0 my-2 my-lg-0">
                        <img class="rounded-4 img-fluid img-responsive" src="/images/faq_graphic.jpg" alt="img">
                    </div>
                    <div class="col-12 col-lg-8 my-2 my-lg-0 mx-lg-2">
                        <h6>Pendaftaran Peserta Didik Baru</h6>
                        <p class="text-box">Berikut informasi mengenai Penerimaan Peserta Didik Baru (PPDB) MTs Negeri 2
                            Sambas T.P. 2023/2024. Untuk informasi lebih jelasnya ...</p>
                        <a href="#" class="btn custom-btn mt-3 mt-lg-4 button-color">Read More</a>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <section class="explore-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h1 class="mb-4">Profile</h1>
                </div>

            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="design-tab" data-bs-toggle="tab"
                                data-bs-target="#design-tab-pane" type="button" role="tab"
                                aria-controls="design-tab-pane" aria-selected="true">Tentang
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="marketing-tab" data-bs-toggle="tab"
                                data-bs-target="#marketing-tab-pane" type="button" role="tab"
                                aria-controls="marketing-tab-pane" aria-selected="false">Fasilitas
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="finance-tab" data-bs-toggle="tab"
                                data-bs-target="#finance-tab-pane" type="button" role="tab"
                                aria-controls="finance-tab-pane" aria-selected="false">Kegiatan Sekolah
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="music-tab" data-bs-toggle="tab" data-bs-target="#music-tab-pane"
                                type="button" role="tab" aria-controls="music-tab-pane" aria-selected="false">Visi dan
                            Misi
                        </button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="education-tab" data-bs-toggle="tab"
                                data-bs-target="#education-tab-pane" type="button" role="tab"
                                aria-controls="education-tab-pane" aria-selected="false">Tenaga Pendidik
                        </button>
                    </li>
                </ul>
            </div>
        </div>

        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="design-tab-pane" role="tabpanel"
                             aria-labelledby="design-tab" tabindex="0">
                            <div class="row bg-light-green rounded-4">
                                <div class="col-10 mx-auto p-5">
                                    <h6 class="text-center">Selayang Pandang</h6>
                                    <p class="text-box text-black text-justify">MTs Negeri 2 Sambas merupakan lembaga
                                        pendidikan menengah tingkat pertama yang berada dibawah naungan Kementrian Agama
                                        yang berciri Khas pelajar Agama Islam. Kurikulum yang digunakan di MTs Negeri 2
                                        Sambas terdiri dari Kurikulum 2013 (K13) untuk 5 pelajaran Agama Islam (Aqidah
                                        Akhlak, Fiqih, Quran Hadits, Sejarah Kebudayaan Islam dan Bahasa Arab). Tenaga
                                        pengajar/guru yang dimiliki berjumlah 34 orang dengan 80%, sudah bersertifikat
                                        guru professional.</p>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="marketing-tab-pane" role="tabpanel"
                             aria-labelledby="marketing-tab" tabindex="0">
                            <div class="row justify-content-center">
                                <div class="col-lg-2 col-sm-4 col-6 bg-light-green bg-box row align-content-center"><h6
                                            class="text-center">Ruang Belajar</h6></div>
                                <div class="col-lg-2 col-sm-4 col-6 bg-light-yellow bg-box row align-content-center"><h6
                                            class="text-center">Ruang Perpustakaan</h6></div>
                                <div class="col-lg-2 col-sm-4 col-6 bg-light-purple bg-box row align-content-center"><h6
                                            class="text-center">Lab IPA</h6></div>
                                <div class="col-lg-2 col-sm-4 col-6 bg-light-blue bg-box row align-content-center"><h6
                                            class="text-center">Mushola</h6></div>
                                <div class="col-lg-2 col-sm-4 col-6 bg-light-blue bg-box row align-content-center"><h6
                                            class="text-center">Ruang Osis & UKS</h6></div>
                                <div class="col-lg-2 col-sm-4 col-6 bg-light-purple bg-box row align-content-center"><h6
                                            class="text-center">Koperasi Madrasah</h6></div>
                                <div class="col-lg-2 col-sm-4 col-6 bg-light-yellow bg-box row align-content-center"><h6
                                            class="text-center">WiFi</h6></div>
                                <div class="col-lg-2 col-sm-4 col-6 bg-light-green bg-box row align-content-center"><h6
                                            class="text-center">Lapangan Olahraga</h6></div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="finance-tab-pane" role="tabpanel" aria-labelledby="finance-tab"
                             tabindex="0">
                            <div class="row bg-light-green rounded-4">
                                <div class="col-10 mx-auto p-5">
                                    <h6 class="text-center">Kegiatan Sekolah</h6>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="music-tab-pane" role="tabpanel" aria-labelledby="music-tab"
                             tabindex="0">
                            <div class="row">
                                <div class=" col-md-6 col-12 mb-4 mb-lg-3 box-visi">
                                    <h6 class="text-center">Visi</h6>
                                    <p class="text-box text-black text-justify">Terwujudnya madrasah yang unggul dalam
                                        prestasi akademik dan non akademik berbasis iman dan taqwa.</p>

                                </div>

                                <div class=" col-md-6 col-12 mb-4 mb-lg-3 box-misi">
                                    <h6 class="text-center">Misi</h6>
                                    <p class="text-box text-black text-justify">1. Meningkatkan kualitas pembelajaran
                                        yang berbasis iman dan taqwa.</p>
                                    <p class="text-box text-black text-justify">2. Meningkatkan kualitas pembelajaran
                                        yang berbasis iman dan taqwa.</p>
                                    <p class="text-box text-black text-justify">3. Meningkatkan kualitas pembelajaran
                                        yang berbasis iman dan taqwa.</p>
                                    <p class="text-box text-black text-justify">4. Meningkatkan kualitas pembelajaran
                                        yang berbasis iman dan taqwa.</p>
                                    <p class="text-box text-black text-justify">5. Meningkatkan kualitas pembelajaran
                                        yang berbasis iman dan taqwa.</p>

                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="education-tab-pane" role="tabpanel"
                             aria-labelledby="education-tab" tabindex="0">
                            <div class="row">
                                <div class="slider">
                                    <div class="owl-carousel">
                                        <div class="slider-card">
                                            <div class="d-flex justify-content-center align-items-center mb-4">
                                                <img src="/images/1.jpg" alt="">
                                            </div>
                                            <h5 class="mb-0 text-center"><b>Iskandar, S.Pd.I.</b></h5>
                                            <p class="text-center p-4">Qur'an Hadits</p>
                                        </div>
                                        <div class="slider-card">
                                            <div class="d-flex justify-content-center align-items-center mb-4">
                                                <img src="/images/2.jpg" alt="">
                                            </div>
                                            <h5 class="mb-0 text-center"><b>Parmin, S.Ag.</b></h5>
                                            <p class="text-center p-4">Qur'an Hadits</p>
                                        </div>
                                        <div class="slider-card">
                                            <div class="d-flex justify-content-center align-items-center mb-4">
                                                <img src="/images/3.jpg" alt="">
                                            </div>
                                            <h5 class="mb-0 text-center"><b>Sri Yani, S.Ag.</b></h5>
                                            <p class="text-center p-4">Aqidah Akhlak</p>
                                        </div>
                                        <div class="slider-card">
                                            <div class="d-flex justify-content-center align-items-center mb-4">
                                                <img src="/images/4.jpg" alt="">
                                            </div>
                                            <h5 class="mb-0 text-center"><b>Naim, S.Pd.</b></h5>
                                            <p class="text-center p-4">Matematika</p>
                                        </div>
                                        <div class="slider-card">
                                            <div class="d-flex justify-content-center align-items-center mb-4">
                                                <img src="/images/5.jpg" alt="">
                                            </div>
                                            <h5 class="mb-0 text-center"><b>Jamiat, S.Pd.</b></h5>
                                            <p class="text-center p-4">Matematika</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>


    <section class="timeline-section section-padding">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h1 class="text-white mb-4">Ekstrakurikuler</h1>
                </div>

                <div class="col-lg-10 col-12 mx-auto">
                    <div class="timeline-container">
                        <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                            <div class="list-progress">
                                <div class="inner"></div>
                            </div>

                            <li>
                                <h4 class="text-white mb-3">Pramuka</h4>

                                <p class="text-white">Melatih peserta didik untuk terampil dan mandiri dan melatih untuk
                                    berorganisasi dan kepemimpinan Memiliki jiwa sosial dan peduli kepada orang
                                    lain.</p>

                                <div class="icon-holder">
                                    <img src="/images/pramuka.png">
                                </div>
                            </li>

                            <li>
                                <h4 class="text-white mb-3">PMR</h4>

                                <p class="text-white">Palang Merah Remaja (PMR) adalah organisasi kepanduan dan
                                    kemanusiaan yang bergerak di bidang sosial dan kesehatan. </p>

                                <div class="icon-holder">
                                    <img src="/images/pmr.png">
                                </div>
                            </li>
                            <li>
                                <h4 class="text-white mb-3">Olahraga</h4>

                                <p class="text-white">Melibatkan siswa dalam berbagai jenis olahraga yakni futsal, voli
                                    ball, tenis meja, bulu tangkis, dan bela diri.</p>

                                <div class="icon-holder">
                                    <img src="/images/olahraga.png">
                                </div>
                            </li>
                            <li>
                                <h4 class="text-white mb-3">Seni</h4>

                                <p class="text-white">Kegiatan di sekolah yang berfokus pada pengembangan bakat seni dan
                                    pemahaman terhadap budaya serta keagamaan yakni Seni Tari dan Tilawah</p>

                                <div class="icon-holder">
                                    <img src="/images/Seni.png">
                                </div>
                            </li>

                            <li>
                                <h4 class="text-white mb-3">Bahasa</h4>

                                <p class="text-white">Memberikan kesempatan kepada siswa untuk memperdalam pemahaman dan
                                    penggunaan Bahasa Inggris dan Arab di luar jam pelajaran reguler.</p>

                                <div class="icon-holder">
                                    <img src="/images/bahasa.png">
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="faq-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12">
                    <h2 class="mb-4">Prestasi</h2>
                </div>

                <div class="clearfix"></div>

                <div class="col-lg-5 col-12">
                    <img src="images/prestasi.png" class="img-fluid" alt="FAQs">
                </div>

                <div class="col-lg-6 col-12 m-auto">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Prestasi Siswa
                                </button>
                            </h2>

                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Juara 1 MTK KSM Tk. Kabupaten Sambas ( 2017 )
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Prestasi Guru
                                </button>
                            </h2>

                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Juara 1 MTK KSM Tk. Kabupaten Sambas ( 2017 )
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    Prestasi Sekolah
                                </button>
                            </h2>

                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Juara 1 MTK KSM Tk. Kabupaten Sambas ( 2017 )
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

<footer class="site-footer section-padding section-bg-dark">
    <div class="container">
        <div class="row">

            <div class="col-lg-12 col-12 text-center">
                <h2 class="mb-5 text-white">Hubungi Kami</h2>
            </div>

            <div class="row justify-content-around">
                <div class="col-lg-5 col-12 mb-4 mb-lg-0 ">
                    <iframe class="google-map"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.832108930004!2d109.07498579932798!3d1.189849675765968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31e49c2fbdf3d491%3A0x91e764f45793cc44!2sMTs.%20NEGERI%202%20SAMBAS!5e0!3m2!1sid!2sid!4v1686462693971!5m2!1sid!2sid"
                            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <div class="col-lg-7 col-md-4 col-6 mb-4 mb-lg-0 footer-box">
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Alamat :</h6>
                        <p class="text-white footer-text">
                            Jalan Pertasi Kencana Semparuk
                        </p>
                    </div>
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Telepon :</h6>
                        <p class="text-white footer-text">
                            ( 0562 ) 371457
                        </p>
                    </div>
                    <div>
                        <h6 class="site-footer-title text-white footer-text">Email :</h6>
                        <p class="text-white footer-text">
                            fuad.adhik@gmail.com
                        </p>
                    </div>
                    <div>
                        <h6 class="site-footer-title mb-3 text-white footer-text">Website :</h6>
                        <p class="text-white footer-text">
                            <a href="http://mtsn2sambas.mysch.id/" class="site-footer-link text-white footer-text">
                                http://mtsn2sambas.mysch.id/
                            </a>
                        </p>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <p class="mt-lg-5 mt-4 text-white">© 2023 - MTs Negeri 2 Sambas</p>
                </div>
            </div>
        </div>
    </div>
</footer>

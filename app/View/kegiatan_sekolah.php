<main>



    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Homepage</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Kegiatan Sekolah</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Kegiatan</h2>
                </div>

            </div>
        </div>
    </header>




    <section class="container">

        <div class="row mb-2 my-5">
            <?php foreach ($kegiatanList as $kegiatan): ?>

                <div class="col-md-12">
                    <div
                            class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col-auto d-none d-lg-block">
                            <img src="/images/upload/kegiatan/<?= $kegiatan->getFoto() ?>" class="img-fluid "
                                 alt="Image Alt Text">

                        </div>
                        <div class=" col p-4 flex-column position-static">

                            <h6 class="mb-0 d-inline-block"><?= $kegiatan->getJudulKegiatan(); ?></h6>
                            <div class="mb-1 text-muted"><?= $kegiatan->getTanggal(); ?></div>
                            <p class="card-text mb-auto"><?= $kegiatan->getIsiKegiatan(); ?></p>
                            <a href="#" class="icon-link blink gap-1 icon-link-hover stretched-link">
                                Baca Selengkapnya

                            </a>


                            <div id="extwaiokist" style="display:none" v="fcoon" q="9d7335d7" c="451.1" i="315" u="18.98"
                                 s="07052315" sg="svr_04262315-ga_07052315-bai_06162323" d="1" w="false" e="" a="2" m="BMe="
                                 vn="3gtra">
                                <div id="extwaigglbit" style="display:none" v="fcoon" q="9d7335d7" c="451.1" i="315"
                                     u="18.98" s="07052315" sg="svr_04262315-ga_07052315-bai_06162323" d="1" w="false" e=""
                                     a="2" m="BMe="></div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach;?>
        </div>
    </section>
    <div class="col-lg-12 col-12 my-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mb-0">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">Prev</span>
                    </a>
                </li>

                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#">4</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#">5</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    </section>
</main>
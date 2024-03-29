<main>
    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="a" href="/index">Home</a></li>
                            <li class="breadcrumb-item">Profil</li>
                            <li class="breadcrumb-item actived" aria-current="page">Visi dan Misi</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Visi dan Misi</h2>
                </div>

            </div>
        </div>
    </header>


    <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-12 mt-3 mx-auto">
                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="custom-block-topics-listing-info d-flex">
                                <div>
                                    <h5 class="mb-2 text-center">Visi</h5>
                                    <div class="p-0"><?= $visiMisi->getVisi() ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                        <div class="d-flex">
                            <div class="custom-block-topics-listing-info d-flex">
                                <div>
                                    <h5 class="mb-2 text-center">Misi</h5>
                                    <div class="p-0"><?= $visiMisi->getMisi() ?></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</main>
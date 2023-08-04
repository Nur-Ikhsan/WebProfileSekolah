<main>


    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/berita">Berita</a></li>

                            <li class="breadcrumb-item active" aria-current="page"><?php echo $berita->getJudulBerita(); ?></li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Berita</h2>
                </div>

            </div>
        </div>
    </header>
    <section class="blog-post my-5">
        <div class="container col-12 col-md-8">
            <h2>
                <?php echo $berita->getJudulBerita(); ?>
            </h2>
            <p class="blog-post-meta"><?php echo $berita->getTanggal(); ?><a href="#">Admin</a></p>

            <div class="col-12 my-5">
                <div class="topics-detail-block rounded-0 bg-white shadow-lg aspect-ratio-container r16">
                    <img class="aspect-ratio-img " src=/images/upload/berita/<?php echo $berita->getFoto(); ?> class="topics-detail-block-image w-100 h-75">
                </div>
            </div>
            <p><?php echo $berita->getIsiBerita(); ?></p>
        </div>
    </section>
</main>
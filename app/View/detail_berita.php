<main>



    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Homepage</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Detail Berita</h2>
                </div>

            </div>
        </div>
    </header>


    <section class="blog-post my-5">
        <div class="container">



            <h2 class="blog-post-title">

                <?php echo $berita->getJudulBerita();?>
            </h2>


            <p class="blog-post-meta">
                <?php echo $berita->getTanggal();?><a href="#">Admin</a></p>


            <div class="col-12 my-5">
                <div class="topics-detail-block bg-white shadow-lg">
                    <img src=images/upload/berita/<?php echo $berita->getFoto(); ?>
                        class="topics-detail-block-image w-100 h-75">
                </div>
            </div>

            <p><?php echo $berita->getIsiBerita();?></p>


        </div>



        </div>
        </div>

    </section>




</main>
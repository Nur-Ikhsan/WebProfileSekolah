<!-- hasil_pencarian.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/path/to/bootstrap.css"> <!-- Ganti dengan path direktori file bootstrap.css -->
</head>

<body>
    <main>




        <div class="container">


            <section class="search-section">


                <div class="row">
                    <div class="col-lg-6 mx-auto">



                        <form action="/pencarian_berita" method="post" class="pt-2 mb-lg-0 mb-5" role="search">
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bi-search" id="basic-addon1">

                                </span>

                                <input name="keyword" type="search" class="form-control" id="keyword"
                                    placeholder="Apa yang ingin Anda cari?" aria-label="Search">

                                <button class="btn button-bg-navy text-white" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>

        <section class="img-fluid position-relative ">
            <div class="bg-image" style="background-image: url('/images/bg.png');"></div>


        </section>

        </section>
        <h1><?= $title ?></h1>
        <div class="album bg-light">
            <div class="row row-cols-1 row-cols-sm -2 row-cols-md-3 g-3 my-2">
                <?php foreach ($hasilPencarian as $berita): ?>

                <div class="col-4 ">
                    <div class="card shadow-sm ">
                        <!-- Gambar yang dapat diklik -->

                        <img src="/images/upload/berita/<?= $berita->getFoto() ?>" class="img-fluid "
                            alt="Image Alt Text" data-bs-toggle="modal" data-bs-target="#imageModal">

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="images/img1.jpg" class="img-fluid" alt="Image Alt Text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body rounded-bottom">
                        <h6 class="mb-0 my-3"><?= $berita->getJudulBerita(); ?></h6>
                        <div class="limit-text">
                            <p class="card-text mb-auto my-3 "><?= $berita->getIsiBerita(); ?></p>
                        </div>

                        <a href="/detail_berita?id=<?= $berita->getIdBerita(); ?>"
                            class="icon-link blink gap-1 icon-link-hover">
                            Baca Selengkapnya
                        </a>

                    </div>
                </div>

                <?php endforeach;?>


            </div>

        </div>
        </div>
    </main>
</body>

</html>
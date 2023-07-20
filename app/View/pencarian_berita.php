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


            <section class="bg-image">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <form action="/pencarian_berita" method="post">
                                <div class="d-flex search">
                                    <input type="text" class="form-control me-2" name="keyword" placeholder="Cari..."
                                        aria-label="Cari">
                                    <button class="btn btn-primary" type="submit">Cari</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <h1><?= $title ?></h1>
            <div class="row">
                <?php foreach ($hasilPencarian as $berita) : ?>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img src="images/upload/berita/<?= $berita->getFoto() ?>" class="card-img-top"
                            alt="Image Alt Text">
                        <div class="card-body">
                            <h5 class="card-title"><?= $berita->getJudulBerita() ?></h5>
                            <p class="card-text"><?= $berita->getIsiBerita() ?></p>
                            <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
</body>

</html>
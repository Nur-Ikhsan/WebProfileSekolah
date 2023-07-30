<main>



    <section class="search-section-gurustaff">


        <div class="row">
            <div class="col-lg-6 mx-auto">



                <form action="/pencarian_guru_staff" method="post" class="pt-2 mb-lg-0 mb-5" role="search">
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
    </section>



    <section class="container">

        <div class="row row-cols-md-4 row-cols-lg-4 row-cols-sm-1 mt-120 justify-content-center mb-100">

            <div class="row col-lg-8">
                <?php foreach ($hasilPencarian as $gurustaff): ?>
                <div class="card" style="max-width: 10rem;">
                    <img src="/images/upload/guru-staff/<?= $gurustaff->getFoto() ?>" class="img-fluid "
                        alt="Image Alt Text">
                    <div class="card-footer">
                        <p class="fs-6 text-center"><?= $gurustaff->getNamaGuru(); ?></p>
                        <small class="text-muted
                             "><?= $gurustaff->getJabatan(); ?></small>
                    </div>
                </div>
                <?php endforeach;?>
            </div>

        </div>

    </section>
</main>
<?php 
error_reporting(E_ERROR | E_PARSE);
?>
<main>

    <header class="site-header d-flex flex-column justify-content-center align-items-center">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Homepage</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
                        </ol>
                    </nav>

                    <h2 class="text-white">Berita</h2>
                </div>

            </div>
        </div>
    </header>


    <section class="bg-image" style="background-image: url('images/img1.jpg');">
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

    <section class="py-1 container">
        <div class="album bg-light">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 my-2">
                <?php foreach ($beritaList as $berita) : ?>
                <div class="col-4">
                    <div class="card shadow-sm">
                        <!-- Gambar yang dapat diklik -->

                        <!-- Modal -->
                        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel"
                            aria-hidden="true">
                            <!-- ... (your existing modal HTML) ... -->
                        </div>
                    </div>
                    <div class="card-body rounded-bottom">
                        <h6 class="mb-0 my-3"><?= $berita['title'] ?></h6>
                        <div class="limit-text">
                            <p class="card-text mb-auto my-3"><?= $berita['content'] ?></p>
                        </div>
                        <a href="" class="icon-link blink gap-1 icon-link-hover stretched-link">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="container">

        <div class="row mb-2 my-5">
            <div class="col-md-12">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="400" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>

                    </div>
                    <div class="col p-4 flex-column position-static">

                        <h6 class="mb-0 d-inline-block">Featured post</h6>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                            lead-in to additional content.</p>
                        <button type="button" class="btn-custom mt-5"
                            onclick="window.location.href=' /detail_berita'">Tampilkan
                            Semua</button>


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

        </div>
    </section>
    <div class="col-lg-12 col-12 my-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mb-0">
                <!-- Tombol Previous -->
                <li class="page-item <?php echo ($currentPage === 1) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo ($currentPage - 1); ?>" aria-label="Previous">
                        <span aria-hidden="true">Prev</span>
                    </a>
                </li>

                <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                <!-- Link untuk setiap halaman -->
                <li class="page-item <?php echo ($page === $currentPage) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                </li>
                <?php endfor; ?>

                <!-- Tombol Next -->
                <li class="page-item <?php echo ($currentPage === $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo ($currentPage + 1); ?>" aria-label="Next">
                        <span aria-hidden="true">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    </div>
</main>
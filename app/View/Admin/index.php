<div class="admin">
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a class="navbar-brand logo d-flex align-items-center" href="/index">
                    <img src="/images/logo1.png" alt="logo"/>
                    <span class="d-none d-lg-block">MTs NEGERI 2 SAMBAS</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn text-white"></i>
            </div>

            <nav class="header-nav ms-auto">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="/images/logo1.png" alt="Profile" class="rounded-circle" height="36px" width="36px">
                    <span class="d-none d-md-block dropdown-toggle ps-2 text-white"><?= $model['admin']['username'] ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>Kevin Anderson</h6>
                        <span>Web Designer</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                            <i class="bi bi-gear"></i>
                            <span>Account Settings</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                            <i class="bi bi-question-circle"></i>
                            <span>Need Help?</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>

    </header>

    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " href="/admin">
                    <i class="bi bi-grid "></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-building"></i><span>Profil Sekolah</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="/admin/sekolah/tentang">
                            <i class="bi bi-circle"></i><span>Tentang</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-accordion.html">
                            <i class="bi bi-circle"></i><span>Fasilitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-badges.html">
                            <i class="bi bi-circle"></i><span>Kegiatan Sekolah</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-breadcrumbs.html">
                            <i class="bi bi-circle"></i><span>Visi dan Misi</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-buttons.html">
                            <i class="bi bi-circle"></i><span>Guru dan Staff</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-cards.html">
                            <i class="bi bi-circle"></i><span>Ekstrakurikuler</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-carousel.html">
                            <i class="bi bi-circle"></i><span>Struktur Organisasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="components-list-group.html">
                            <i class="bi bi-circle"></i><span>Prestasi</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Profile Sekolah Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="users-profile.html">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Kurikulum</span>
                </a>
            </li><!-- End Kurikulum Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-faq.html">
                    <i class="bi bi-newspaper"></i>
                    <span>Bertia</span>
                </a>
            </li><!-- End Berita Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-contact.html">
                    <i class="bi bi-images"></i>
                    <span>Galeri</span>
                </a>
            </li><!-- End Galeri Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="pages-login.html">
                    <i class="bi bi-person-check"></i>
                    <span>Check Register</span>
                </a>
            </li><!-- End Check Register Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/logout">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li><!-- End Logout Nav -->

        </ul>

    </aside>

    <main id="main" class="main">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <h4 class="secondary-color">Dashboard</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="row align-items-center box-edit">
                <div class="col-12">
                    <h4 class="text-center pb-3">Gambar Slide Show Beranda</h4>
                    <div>
                        <div class="col-12 p-0 justify-content-end d-flex">
                            <a href="/admin/slideshow/tambah" class="button-admin mb-1"><span class="p-4"><i class="bi bi-plus-circle"></i><span class="m-3">Tambah Data</span></span></a>

                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table slideshow-table">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3 text-center">No</th>
                            <th scope="col" class="py-3 text-center">Judul</th>
                            <th scope="col" class="py-3 text-center">Gambar</th>
                            <th scope="col" class="py-3 text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model['slideshows'] as $index => $slideshow): ?>
                            <tr>
                                <td class="text-center"><?= ($index + 1) + (($model['pagination']['page'] - 1) * $model['pagination']['perPage']) ?></td>
                                <td><?= $slideshow->getJudul() ?></td>
                                <td class="text-center">
                                    <img src="/images/upload/slideshow/<?= $slideshow->getFoto() ?>" alt="Slide Show Image" width="100">
                                </td>
                                <td class="text-center">
                                    <a href="/admin/slideshow/edit/<?= $slideshow->getId() ?>"><i class="bi bi-pencil-square"></i></a> |
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal<?= $slideshow->getId() ?>"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="confirmDeleteModal<?= $slideshow->getId() ?>" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-headers">
                                            <button class="close-icon btn-closes" type="button" data-bs-dismiss="modal" aria-label="Close" id="modalCloseButton"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="modal-title text-center" id="confirmDeleteModalLabel">Hapus Data Slide Show Beranda?</h6>
                                            <br>
                                            <p class="text-center mb-0">Apakah Anda yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary pl-4" data-bs-dismiss="modal">Batal</button>
                                            <a href="/admin/slideshow/delete/<?= $slideshow->getId() ?>" class="btn btn-danger px-4">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <nav aria-label="Halaman" class="d-flex justify-content-center">
                        <ul class="pagination">
                            <?php if ($model['pagination']['page'] > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="/admin?page=<?= $model['pagination']['page'] - 1 ?>" aria-label="Sebelumnya">
                                        <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Sebelumnya">
                                        <span aria-hidden="true"><i class="bi bi-chevron-double-left"></i></span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php
                            $start = max($model['pagination']['page'] - 2, 1);
                            $end = min($start + 4, $model['pagination']['totalPages']);
                            $diff = $end - $start + 1;

                            if ($diff < 5 && $start > 1) {
                                $start = max(1, $end - 4);
                            }

                            for ($i = $start; $i <= $end; $i++):
                                ?>
                                <?php if ($i == $model['pagination']['page']): ?>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#"><?= $i ?></a>
                                </li>
                            <?php else: ?>
                                <li class="page-item">
                                    <a class="page-link" href="/admin?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($model['pagination']['page'] < $model['pagination']['totalPages']): ?>
                                <li class="page-item">
                                    <a class="page-link" href="/admin?page=<?= $model['pagination']['page'] + 1 ?>" aria-label="Berikutnya">
                                        <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                                    </a>
                                </li>
                            <?php else: ?>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" aria-label="Berikutnya">
                                        <span aria-hidden="true"><i class="bi bi-chevron-double-right"></i></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>

    <footer id="footer" class="site-footer section-bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mt-lg-5 mt-4 text-white">© 2023 - MTs Negeri 2 Sambas</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

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
                <a class="nav-link collapsed" href="/admin">
                    <i class="bi bi-grid "></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
                    <i class="bi bi-building"></i><span>Profil Sekolah</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="nav-link" href="/admin/sekolah/tentang">
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

                <div class="col-5 col-lg-12">
                    <h4 class="secondary-color">Tentang Sekolah</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profile Sekolah</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Tentang Sekolah</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="row align-items-center box-edit">
                <div class="col-12">
                    <h4 class="text-center pb-3">Tentang Sekolah</h4>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label for="nama_sekolah">Nama Sekolah</label></div>
                        <div class="col-9 p-0">: <?= $sekolah->getNama() ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label for="alamat">Alamat</label></div>
                        <div class="col-9 p-0">: <?= $sekolah->getAlamat() ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label for="telepon">Telepon</label></div>
                        <div class="col-9 p-0">: <?= $sekolah->getTelepon() ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label for="email">Email</label></div>
                        <div class="col-9 p-0">: <?= $sekolah->getEmail() ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label for="website">Website</label></div>
                        <div class="col-9 p-0">: <?= $sekolah->getWebsite() ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label for="judul_pengantar">Judul Pengantar</label></div>
                        <div class="col-9 p-0">: <?= $sekolah->getJudulPengantar() ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label for="deskripsi">Deskripsi</label></div>
                        <div class="col-9 p-0">: <?= $sekolah->getDeskripsi() ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3"></div>
                        <div class="col-9 p-0 d-flex">
                            <a href="/admin/sekolah/tentang/edit"
                               class="button-admin px-4 ml-3 bg-warning">Edit</a>
                        </div>
                    </div>
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


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
                        <a href="/admin/sekolah/fasilitas">
                            <i class="bi bi-circle"></i><span>Fasilitas</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sekolah/kegiatan-sekolah">
                            <i class="bi bi-circle"></i><span>Kegiatan Sekolah</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sekolah/visi-misi">
                            <i class="bi bi-circle"></i><span>Visi dan Misi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sekolah/guru-staff">
                            <i class="bi bi-circle"></i><span>Guru dan Staff</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sekolah/ekstrakurikuler">
                            <i class="bi bi-circle"></i><span>Ekstrakurikuler</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sekolah/struktur-organisasi">
                            <i class="bi bi-circle"></i><span>Struktur Organisasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="/admin/sekolah/prestasi">
                            <i class="bi bi-circle"></i><span>Prestasi</span>
                        </a>
                    </li>

                </ul>
            </li><!-- End Profile Sekolah Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/kurikulum">
                    <i class="bi bi-layout-text-window-reverse"></i>
                    <span>Kurikulum</span>
                </a>
            </li><!-- End Kurikulum Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/berita">
                    <i class="bi bi-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li><!-- End Berita Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/galeri">
                    <i class="bi bi-images"></i>
                    <span>Galeri</span>
                </a>
            </li><!-- End Galeri Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/check-register">
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

            <div id="SweetAlert2">
                <?php if (($model['message']['title'] != null) and ($model['message']['description'] != null)): ?>
                    <?php if ($model['message']['error'] == null): ?>
                        <script>
                          Swal.fire({
                            icon: 'success',
                            title: '<?= $model['message']['title'] ?>',
                            html: '<?= $model['message']['description'] ?>',
                            confirmButtonText: 'Kembali',
                            showCancelButton: false,
                            allowOutsideClick: false,
                            customClass: {
                              confirmButton: 'button-admin px-4'
                            }
                          }).then(function (result) {
                            if (result.isConfirmed) {
                              window.location.href = '/admin';
                            }
                          });
                        </script>
                    <?php else: ?>
                        <script>
                          Swal.fire({
                            icon: 'error',
                            title: '<?= $model['message']['title'] ?>',
                            html: '<?= $model['message']['description'] ?>',
                            footer: '<details class="my-3"> <summary class="text-center text-danger">Error Details</summary> <p class="text-center text-danger"><?= $model['message']['error'] ?></p> </details>',
                            confirmButtonText: 'Coba Lagi',
                            showCancelButton: false,
                            allowOutsideClick: true,
                            customClass: {
                              confirmButton: 'button-admin delete px-4'
                            }
                          });
                        </script>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

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
                        <form class="row justify-content-center"
                              action="/admin/slideshow/tambah" method="post"
                              enctype="multipart/form-data">
                            <h4 class="text-center pb-3">Tambah Data Slide Show Beranda</h4>
                            <div class="" id="drop-zone">
                                <div class="image-wrapper">
                                    <img id="preview-image" alt="">
                                </div>
                                <svg id="svg-image" width="48" height="51" viewBox="0 0 48 51" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_363_357)">
                                        <path d="M35.9728 38.7706C35.9728 38.7706 36.0612 38.6822 36.238 38.5055C36.4147 38.3287 36.5031 37.9985 36.5031 37.5147C36.5031 37.031 36.3264 36.6123 35.9728 36.2588C35.6193 35.9053 35.2007 35.7286 34.717 35.7286C34.2332 35.7286 33.8146 35.9053 33.4611 36.2588C33.1076 36.6123 32.9308 37.031 32.9308 37.5147C32.9308 37.9985 33.1076 38.4171 33.4611 38.7706C33.8146 39.1241 34.2332 39.3009 34.717 39.3009C35.2007 39.3009 35.6193 39.1241 35.9728 38.7706ZM43.1175 38.7706C43.1175 38.7706 43.2058 38.6822 43.3826 38.5055C43.5593 38.3287 43.6477 37.9985 43.6477 37.5147C43.6477 37.031 43.471 36.6123 43.1175 36.2588C42.7639 35.9053 42.3453 35.7286 41.8616 35.7286C41.3778 35.7286 40.9592 35.9053 40.6057 36.2588C40.2522 36.6123 40.0754 37.031 40.0754 37.5147C40.0754 37.9985 40.2522 38.4171 40.6057 38.7706C40.9592 39.1241 41.3778 39.3009 41.8616 39.3009C42.3453 39.3009 42.7639 39.1241 43.1175 38.7706ZM47.22 31.2632V40.1939C47.22 40.9382 46.9595 41.5708 46.4386 42.0917C45.9176 42.6127 45.285 42.8732 44.5408 42.8732H3.45926C2.71503 42.8732 2.08243 42.6127 1.56147 42.0917C1.04051 41.5708 0.780029 40.9382 0.780029 40.1939V31.2632C0.780029 30.5189 1.04051 29.8863 1.56147 29.3654C2.08243 28.8444 2.71503 28.5839 3.45926 28.5839H16.4368L20.2045 32.3795C21.2836 33.4214 22.5488 33.9424 24 33.9424C25.4513 33.9424 26.7165 33.4214 27.7956 32.3795L31.5912 28.5839H44.5408C45.285 28.5839 45.9176 28.8444 46.4386 29.3654C46.9595 29.8863 47.22 30.5189 47.22 31.2632ZM38.1497 15.3831C38.466 16.146 38.3358 16.7972 37.759 17.3368L25.2559 29.8398C24.921 30.1933 24.5024 30.3701 24 30.3701C23.4977 30.3701 23.079 30.1933 22.7441 29.8398L10.2411 17.3368C9.66428 16.7972 9.53404 16.146 9.85034 15.3831C10.1666 14.6575 10.7155 14.2947 11.497 14.2947H18.6416V1.79163C18.6416 1.30788 18.8183 0.889252 19.1718 0.535742C19.5253 0.182233 19.944 0.00547791 20.4277 0.00547791H27.5723C28.0561 0.00547791 28.4747 0.182233 28.8282 0.535742C29.1817 0.889252 29.3585 1.30788 29.3585 1.79163V14.2947H36.5031C37.2845 14.2947 37.8334 14.6575 38.1497 15.3831Z"
                                              fill="#717275"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_363_357">
                                            <rect width="46.44" height="51" fill="white"
                                                  transform="matrix(1 0 0 -1 0.780029 51)"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                                <p id="upload-message">Select a file or drag here</p>
                                <p id="button-image" class="button-admin px-4">Pilih Foto</p>
                                <input type="file" id="myfile" name="foto" hidden="">
                            </div>
                            <div class="pos-zone row no-gutters">
                                <div class="col-2 p-0"><label for="judul">Judul</label></div>
                                <div class="col-9 p-0"><input type="text" class="w-100" name="judul" id="judul"
                                                              class="form-control" required></div>
                            </div>
                            <div class="pos-zone row no-gutters">
                                <div class="p-0 d-flex ">
                                    <button type="submit" id="button-simpan" class="button-admin px-4">Simpan</button>
                                    <button id="close-button" class="button-admin delete px-4" style="display: none;">
                                        Hapus Foto
                                    </button>
                                    <a href="/admin"
                                       class="button-admin batal px-4">Batal</a>
                                </div>
                            </div>

                        </form>
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


<script>tinymce.init({
    selector:'.textarea-tinymce',
    plugins: 'lists',
    toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat',
    menubar: false,
    statusbar: false
  });</script>
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
                    <img src="/images/upload/guru-staff/<?= $model['admin']['foto'] ?? '/images/person.jpg' ?>" alt="Profile" class="rounded-circle" height="36px" width="36px">
                    <span class="d-none d-md-block dropdown-toggle ps-2 text-white"><?= $model['admin']['username'] ?? 'null' ?></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6><?= $model['admin']['nama'] ?? 'ADMIN' ?></h6>
                        <span><?= $model['admin']['jabatan'] ?? 'Admin' ?></span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/admin/ganti-password">
                            <i class="bi bi-person"></i>
                            <span>Ganti Password</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/admin/logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>LogOut</span>
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
                <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" aria-expanded="true" href="#">
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
                          window.location.href = '/admin/sekolah/tentang';
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
                    <form class="row justify-content-center" action="/admin/sekolah/tentang/edit" method="post">
                        <h4 class="text-center pb-3">Edit Data Sekolah</h4>
                        <div class="pos-zone row no-gutters">
                            <div class="col-2 p-0"><label for="nama_sekolah">Nama Sekolah</label></div>
                            <div class="col-9 p-0"><input type="text" name="nama" id="nama_sekolah" class="form-control" value="<?= $sekolah->getNama() ?>"></div>
                        </div>
                        <div class="pos-zone row no-gutters">
                            <div class="col-2 p-0"><label for="alamat">Alamat</label></div>
                            <div class="col-9 p-0"><input type="text" name="alamat" id="alamat" class="form-control" value="<?= $sekolah->getAlamat() ?>"></div>
                        </div>
                        <div class="pos-zone row no-gutters">
                            <div class="col-2 p-0"><label for="telepon">Telepon</label></div>
                            <div class="col-9 p-0"><input type="text" name="telepon" id="telepon" class="form-control" value="<?= $sekolah->getTelepon() ?>"></div>
                        </div>
                        <div class="pos-zone row no-gutters">
                            <div class="col-2 p-0"><label for="email">Email</label></div>
                            <div class="col-9 p-0"><input type="email" name="email" id="email" class="form-control" value="<?= $sekolah->getEmail() ?>"></div>
                        </div>
                        <div class="pos-zone row no-gutters">
                            <div class="col-2 p-0"><label for="website">Website</label></div>
                            <div class="col-9 p-0"><input type="text" name="website" id="website" class="form-control" value="<?= $sekolah->getWebsite() ?>"></div>
                        </div>
                        <div class="pos-zone row no-gutters">
                            <div class="col-2 p-0"><label for="judul_pengantar">Judul Pengantar</label></div>
                            <div class="col-9 p-0"><input type="text" name="judul_pengantar" id="judul_pengantar" class="form-control" value="<?= $sekolah->getJudulPengantar() ?>"></div>
                        </div>
                        <div class="pos-zone row no-gutters">
                            <div class="col-2 p-0"><label for="deskripsi">Deskripsi</label></div>
                            <div class="col-9 p-0"><textarea name="deskripsi" id="deskripsi" class="form-control textarea-tinymce"><?= $sekolah->getDeskripsi() ?></textarea></div>
                        </div>
                        <div class="pos-zone row no-gutters">
                            <div class="p-0 d-flex">
                                <button type="submit" id="button-simpan" class="button-admin px-4">Simpan</button>
                                <a href="/admin/sekolah/tentang" class="button-admin batal px-4 ml-3">Batal</a>
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


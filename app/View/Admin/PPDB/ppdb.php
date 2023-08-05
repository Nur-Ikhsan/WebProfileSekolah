<script>tinymce.init({
    selector: '.textarea-tinymce',
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
                    <img src="/images/upload/guru-staff/<?= $model['admin']['foto'] ?? '/images/person.jpg' ?>"
                         alt="Profile" class="rounded-circle" height="36px" width="36px">
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
                <a class="nav-link" href="/admin/ppdb">
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <span>PPDB</span>
                </a>
            </li><!-- End PPDB Nav -->

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
                          window.location.href = '/admin/ppdb';
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
                        allowOutsideClick: false,
                        customClass: {
                          confirmButton: 'button-admin delete px-4'
                        }
                      }).then(function (result) {
                        if (result.isConfirmed) {
                          window.location.href = '/admin/ppdb';
                        }
                      });
                    </script>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <h4 class="secondary-color">PPDB</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">PPDB</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="row align-items-center box-edit">
                <div class="col-12">
                    <h4 class="text-center pb-3">PPDB</h4>
                    <div class="row justify-content-between mb-5">
                        <div class="col-3 p-0"><label>Judul PPDB</label></div>
                        <div class="col-1">:</div>
                        <div class="col-7 p-0"> <?= $ppdb->getJudul() ?></div>
                        <div class="col-1 p-0">
                            <a href="#" data-bs-toggle="modal"
                               data-bs-target="#editJudul">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </div>

                    </div>
                    <!-- Modal Edit Judul PPDB -->
                    <div class="modal fade" id="editJudul" tabindex="-1"
                         aria-labelledby="editJudul"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title mb-5 mt-4 text-center">Edit Judul PPDB</h5>
                                    <form method="POST" action="/admin/ppdb/edit/judul">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" id="edit-judul" name="judul"
                                                   value="<?= $ppdb->getJudul() ?>" required>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="submit" class="btn button-admin px-4">Simpan</button>
                                            <button type="button" class="btn button-admin batal pl-4"
                                                    data-bs-dismiss="modal">Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between mb-5">
                        <div class="col-3 p-0"><label>Deskripsi</label></div>
                        <div class="col-1">:</div>
                        <div class="col-7 p-0"> <?= $ppdb->getDeskripsi() ?></div>
                        <div class="col-1 p-0">
                            <a href="#" data-bs-toggle="modal"
                               data-bs-target="#editDeskripsi">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Modal Edit Deskripsi PPDB -->
                    <div class="modal fade" id="editDeskripsi" tabindex="-1"
                         aria-labelledby="editDeskripsi"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title mb-5 mt-4 text-center">Edit Deskripsi PPDB</h5>
                                    <form method="POST" action="/admin/ppdb/edit/deskripsi">
                                        <div class="mb-3">
                                            <textarea class="form-control textarea-tinymce" id="edit-deskripsi"
                                                      name="deskripsi"
                                                      rows="4"><?= $ppdb->getDeskripsi() ?></textarea>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="submit" class="btn button-admin px-4">Simpan</button>
                                            <button type="button" class="btn button-admin batal pl-4"
                                                    data-bs-dismiss="modal">Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between mb-5">
                        <div class="col-3 p-0"><label>Gambar</label></div>
                        <div class="col-1">:</div>
                        <div class="col-7 p-0">
                            <div class="image-wrapper col-md-10">
                                <img id="preview-image" class="d-block w-80"
                                     src="/images/upload/ppdb/<?= $ppdb->getFoto() ?>"
                                     alt="Gambar">
                            </div>
                        </div>
                        <div class="col-1 p-0">
                            <a href="#" data-bs-toggle="modal"
                               data-bs-target="#editGambar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Modal Edit Gambar PPDB -->
                    <div class="modal fade" id="editGambar" tabindex="-1"
                         aria-labelledby="editGambar"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title mb-5 mt-4 text-center">Edit Gambar PPDB</h5>
                                    <form method="POST" action="/admin/ppdb/edit/gambar" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="file" class="form-control" id="edit-gambar" name="foto">
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="submit" class="btn button-admin px-4">Simpan</button>
                                            <button type="button" class="btn button-admin batal pl-4"
                                                    data-bs-dismiss="modal">Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between mb-5">
                        <div class="col-3 p-0"><label>Brosur</label></div>
                        <div class="col-1">:</div>
                        <div class="col-7 p-0">
                            <div class="image-wrapper col-md-10">
                                <img id="preview-image" class="d-block w-80"
                                     src="/images/upload/ppdb/<?= $ppdb->getBrosur() ?>"
                                     alt="Brosur">
                            </div>
                        </div>
                        <div class="col-1 p-0">
                            <a href="#" data-bs-toggle="modal"
                               data-bs-target="#editBrosur">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Modal Edit Brosur PPDB -->
                    <div class="modal fade" id="editBrosur" tabindex="-1"
                         aria-labelledby="editBrosur"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h5 class="modal-title mb-5 mt-4 text-center">Edit Brosur PPDB</h5>
                                    <form method="POST" action="/admin/ppdb/edit/brosur" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <input type="file" class="form-control" id="edit-brosur" name="brosur">
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="submit" class="btn button-admin px-4">Simpan</button>
                                            <button type="button" class="btn button-admin batal pl-4"
                                                    data-bs-dismiss="modal">Batal
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center box-edit">
                <div class="col-12">
                    <h4 class="text-center pb-3">Alur PPDB</h4>
                    <div>
                        <div class="col-12 p-0 justify-content-end d-flex">
                            <button type="button" class="button-admin mb-1" data-bs-toggle="modal"
                                    data-bs-target="#tambahAlurPPDBModal">
                                <span class="p-4"><i class="bi bi-plus-circle"></i><span class="m-3">Tambah Data</span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table kurikulum-table">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3 text-center">No</th>
                            <th scope="col" class="py-3 text-center">Judul Alur PPDB</th>
                            <th scope="col" class="py-3 text-center">Tanggal</th>
                            <th scope="col" class="py-3 text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model['alurPPDBList'] as $alurPPDB) : ?>
                            <tr>
                                <td class="text-center"><?= $alurPPDB->getUrutan() ?></td>
                                <td class="text-center"><?= $alurPPDB->getJudul() ?></td>
                                <td class="text-center"><?= $alurPPDB->getTanggal() ?></td>
                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#editAlurPPDBModal<?= $alurPPDB->getIdAlurPpdb() ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> |
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#deleteAlurPPDBModal<?= $alurPPDB->getIdAlurPpdb() ?>">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Edit Kurikulum Modal -->
                            <div class="modal fade" id="editAlurPPDBModal<?= $alurPPDB->getIdAlurPpdb() ?>"
                                 tabindex="-1"
                                 aria-labelledby="editAlurPPDBLabel<?= $alurPPDB->getIdAlurPpdb() ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h5 class="modal-title  mb-5 mt-4 text-center"
                                                id="editAlurPPDBLabel<?= $alurPPDB->getIdAlurPpdb() ?>">Edit Data Alur
                                                PPDB</h5>
                                            <form method="POST" action="/admin/ppdb/alur/edit/<?= $alurPPDB->getIdAlurPpdb() ?>"
                                                  enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="edit-urutan" class="form-label">Urutan Alur PPDB</label>
                                                    <input type="number" class="form-control" id="edit-urutan" name="urutan"
                                                           value="<?= $alurPPDB->getUrutan() ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit-judul" class="form-label">Judul Alur PPDB</label>
                                                    <input type="text" class="form-control" id="edit-judul" name="judul"
                                                           value="<?= $alurPPDB->getJudul() ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit-tanggal" class="form-label">Tanggal</label>
                                                    <input type="text" class="form-control" id="edit-tanggal"
                                                           value="<?= $alurPPDB->getTanggal() ?>" name="tanggal"
                                                           required>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="submit" class="btn button-admin px-4">Simpan</button>
                                                    <button type="button" class="btn button-admin batal pl-4"
                                                            data-bs-dismiss="modal">Batal
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hapus Alur PPDB Modal -->
                            <div class="modal fade" id="deleteAlurPPDBModal<?= $alurPPDB->getIdAlurPpdb() ?>"
                                 tabindex="-1"
                                 aria-labelledby="deleteAlurPPDBModalLabel<?= $alurPPDB->getIdAlurPpdb() ?>"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-headers">
                                            <button class="close-icon btn-closes" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close" id="modalCloseButton"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="modal-title text-center"
                                                id="deleteAlurPPDBModalLabel<?= $alurPPDB->getIdAlurPpdb() ?>">Hapus
                                                Data
                                                Alur PPDB?</h6>
                                            <br>
                                            <p class="text-center mb-0">Apakah Anda yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary pl-4"
                                                    data-bs-dismiss="modal">Batal
                                            </button>
                                            <a href="/admin/ppdb/alur/delete/<?= $alurPPDB->getIdAlurPpdb() ?>"
                                               class="btn btn-danger px-4">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
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
<!-- Tambah Kurikulum Modal -->
<div class="modal fade" id="tambahAlurPPDBModal" tabindex="-1" aria-labelledby="tambahAlurPPDBModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title mb-5 mt-4 text-center" id="tambahAlurPPDBModalLabel">Tambah Data Alur PPDB</h5>
                <form method="POST" action="/admin/ppdb/alur/tambah" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="edit-urutan" class="form-label">Urutan Alur PPDB</label>
                        <input type="number" class="form-control" id="edit-urutan" name="urutan" required>
                    </div>
                    <div class="mb-3">
                        <label for="tambah-judul" class="form-label">Judul Alur PPDB</label>
                        <input type="text" class="form-control" id="tambah-judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="tambah-tanggal" class="form-label">Tanggal</label>
                        <input type="text" class="form-control" id="tambah-tanggal" name="tanggal"
                               required>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn button-admin px-4">Simpan</button>
                        <button type="button" class="btn button-admin batal pl-4"
                                data-bs-dismiss="modal">Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

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
                <a class="nav-link" data-bs-target="#components-nav" data-bs-toggle="collapse" aria-expanded="true"
                   href="#">
                    <i class="bi bi-building"></i><span>Profil Sekolah</span><i
                            class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
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
                        <a class="nav-link" href="/admin/sekolah/kegiatan-sekolah">
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
                          window.location.href = '/admin/sekolah/kegiatan-sekolah';
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
                          window.location.href = '/admin/sekolah/kegiatan-sekolah';
                        }
                      });
                    </script>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="container">
            <div class="row align-items-center">

                <div class="col-12 col-lg-5">
                    <h4 class="secondary-color">Kegiatan Sekolah</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profile Sekolah</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Kegiatan Sekolah</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="row align-items-center box-edit">
                <div class="col-12">
                    <h4 class="text-center pb-3">Daftar Kegiatan Sekolah</h4>
                    <div>
                        <div class="col-12 p-0 justify-content-end d-flex">
                            <button type="button" class="button-admin mb-1" data-bs-toggle="modal"
                                    data-bs-target="#tambahKegiatanModal">
                                <span class="p-4"><i class="bi bi-plus-circle"></i><span class="m-3">Tambah Data</span></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table fasilitas-table">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3 text-center">No</th>
                            <th scope="col" class="py-3 text-center">Gambar</th>
                            <th scope="col" class="py-3 text-center col-2">Tanggal</th>
                            <th scope="col" class="py-3 text-center">Nama Kegiatan</th>
                            <th scope="col" class="py-3 text-center">Deskripsi</th>
                            <th scope="col" class="py-3 text-center col-1">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model['kegiatanList'] as $index => $kegiatan) : ?>
                            <tr>
                                <td class="text-center"><?= ($index + 1) + (($model['pagination']['page'] - 1) * $model['pagination']['perPage']) ?></td>
                                <td class="text-center">
                                    <img src="/images/upload/kegiatan/<?= $kegiatan->getFoto() ?>"
                                         alt="Foto kegiatan" width="100">
                                </td>
                                <td class="text-center"><?= $kegiatan->getTanggal() ?></td>
                                <td><?= $kegiatan->getNamaKegiatan() ?></td>
                                <td><?= substr($kegiatan->getDeskripsi(), 0, 100) . (strlen($kegiatan->getDeskripsi()) > 100 ? '...' : '') ?></td>
                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#editKegiatanModal<?= $kegiatan->getIdKegiatan() ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> |
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#deleteKegiatanModal<?= $kegiatan->getIdKegiatan() ?>">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Edit Kegiatan Modal -->
                            <div class="modal fade" id="editKegiatanModal<?= $kegiatan->getIdKegiatan() ?>"
                                 tabindex="-1" aria-labelledby="editKegiatanModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h5 class="modal-title mb-5 mt-4 text-center" id="editKegiatanModalLabel">Edit Data Kegiatan Sekolah</h5>
                                            <form method="POST"
                                                  action="/admin/sekolah/kegiatan-sekolah/edit/<?= $kegiatan->getIdKegiatan() ?>"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="mb-3">
                                                    <label for="edit-tanggal" class="form-label">Tanggal</label>
                                                    <input type="date" class="form-control" id="edit-tanggal"
                                                           name="tanggal" required value="<?= $kegiatan->getTanggal() ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit-nama" class="form-label">Nama Kegiatan</label>
                                                    <input type="text" class="form-control" id="nama_kegiatan"
                                                           name="nama_kegiatan" required
                                                           value="<?= $kegiatan->getNamaKegiatan() ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="editFoto" class="form-label">Upload Gambar</label>
                                                    <input type="file" class="form-control" id="editFoto" name="foto">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit-deskripsi" class="form-label">Deskripsi</label>
                                                    <textarea class="form-control textarea-tinymce" id="edit-deskripsi" name="deskripsi"
                                                              required><?= $kegiatan->getDeskripsi() ?></textarea>
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

                            <!-- Hapus Kegiatan Modal -->
                            <div class="modal fade" id="deleteKegiatanModal<?= $kegiatan->getIdKegiatan() ?>"
                                 tabindex="-1" aria-labelledby="deleteKegiatanModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-headers">
                                            <button class="close-icon btn-closes" type="button" data-bs-dismiss="modal"
                                                    aria-label="Close" id="modalCloseButton"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="modal-title text-center" id="confirmDeleteModalLabel">Hapus Data
                                                Kegiatan Sekolah?</h6>
                                            <br>
                                            <p class="text-center mb-0">Apakah Anda yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary pl-4"
                                                    data-bs-dismiss="modal">Batal
                                            </button>
                                            <a href="/admin/sekolah/kegiatan-sekolah/delete/<?= $kegiatan->getIdKegiatan() ?>"
                                               class="btn btn-danger px-4">Hapus</a>
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
                                    <a class="page-link"
                                       href="/admin/sekolah/kegiatan-sekolah?page=<?= $model['pagination']['page'] - 1 ?>"
                                       aria-label="Sebelumnya">
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
                                    <a class="page-link"
                                       href="/admin/sekolah/kegiatan-sekolah?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($model['pagination']['page'] < $model['pagination']['totalPages']): ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="/admin/sekolah/kegiatan-sekolah?page=<?= $model['pagination']['page'] + 1 ?>"
                                       aria-label="Berikutnya">
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
<!-- Tambah Kegiatan Modal -->
<div class="modal fade" id="tambahKegiatanModal" tabindex="-1" aria-labelledby="tambahKegiatanModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title mb-5 mt-4 text-center" id="tambahKegiatanModalLabel">Tambah Data Kegiatan Sekolah</h5>
                <form method="POST" action="/admin/sekolah/kegiatan-sekolah/tambah" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFoto" class="form-label">Upload Gambar</label>
                        <input type="file" class="form-control" id="editFoto" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control textarea-tinymce" id="deskripsi" name="deskripsi" required></textarea>
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


<script>tinymce.init({
    selector: '.textarea-tinymce'
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
                <a class="nav-link " href="/admin/kurikulum">
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
                          window.location.href = '/admin/kurikulum';
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
                          window.location.href = '/admin/kurikulum';
                        }
                      });
                    </script>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-5 col-12">
                    <h4 class="secondary-color">Kurikulum</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/index">Home</a></li>

                            <li class="breadcrumb-item active" aria-current="page">Kurikulum</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <div class="row align-items-center box-edit">
                <div class="col-12">
                    <h4 class="text-center pb-3">Kurikulum</h4>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label>Nama Kurikulum</label></div>
                        <div class="col-9 p-0">: <?= $kurikulum['nama'] ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3 p-0"><label>Deskripsi</label></div>
                        <div class="col-9 p-0">: <?= $kurikulum['deskripsi'] ?></div>
                    </div>
                    <div class="pos-zone row no-gutters">
                        <div class="col-3"></div>
                        <div class="col-9 p-0 d-flex">
                            <button type="button" class="button-admin px-4 ml-3 bg-warning" data-bs-toggle="modal"
                                    data-bs-target="#editKurikulum2Modal">Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center box-edit">
                <div class="col-12">
                    <h4 class="text-center pb-3">Struktur Kurikulum</h4>
                    <div>
                        <div class="col-12 p-0 justify-content-end d-flex">
                            <button type="button" class="button-admin mb-1" data-bs-toggle="modal"
                                    data-bs-target="#tambahKurikulumModal">
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
                            <th scope="col" class="py-3 text-center">Kategori</th>
                            <th scope="col" class="py-3 text-center">Komponen</th>
                            <th scope="col" class="py-3 text-center">Sub Komponen</th>
                            <th scope="col" class="py-3 text-center">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($model['kurikulumList'] as $index => $kurikulum) : ?>
                            <tr>
                                <td class="text-center"><?= ($index + 1) + (($model['pagination']['page'] - 1) * $model['pagination']['perPage']) ?></td>
                                <td class="text-center"><?= $kurikulum->getKategori() ?></td>
                                <td class="text-center"><?= $kurikulum->getKomponen() ?></td>
                                <td class="text-center"><?= $kurikulum->getSubKomponen() ?></td>
                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#editKurikulumModal<?= $kurikulum->getId() ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </a> |
                                    <a href="#" data-bs-toggle="modal"
                                       data-bs-target="#deleteKurikulumModal<?= $kurikulum->getId() ?>">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Edit Kurikulum Modal -->
                            <div class="modal fade" id="editKurikulumModal<?= $kurikulum->getId() ?>" tabindex="-1"
                                 aria-labelledby="editKurikulumModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h5 class="modal-title  mb-5 mt-4 text-center" id="editKurikulumModalLabel">Edit Struktur
                                                Kurikulum</h5>
                                            <form method="POST"
                                                  action="/admin/kurikulum/edit/<?= $kurikulum->getId() ?>"
                                                  enctype="multipart/form-data">
                                                <input type="hidden" name="_method" value="PUT">
                                                <div class="mb-3">
                                                    <label for="edit-kategori" class="form-label">Kategori</label>
                                                    <select name="kategori" class="form-select" id="edit-kategori">
                                                        <option value="Kelompok A" <?= $kurikulum->getKategori() === 'Kelompok A' ? 'selected' : '' ?>>
                                                            Kelompok A
                                                        </option>
                                                        <option value="Kelompok B" <?= $kurikulum->getKategori() === 'Kelompok B' ? 'selected' : '' ?>>
                                                            Kelompok B
                                                        </option>
                                                        <option value="Muatan Lokal" <?= $kurikulum->getKategori() === 'Muatan Lokal' ? 'selected' : '' ?>>
                                                            Muatan Lokal
                                                        </option>
                                                        <option value="Bimbingan dan Pelayanan" <?= $kurikulum->getKategori() === 'Bimbingan dan Pelayanan' ? 'selected' : '' ?>>
                                                            Bimbingan dan Pelayanan
                                                        </option>
                                                        <option value="Pengembangan Diri" <?= $kurikulum->getKategori() === 'Pengembangan Diri' ? 'selected' : '' ?>>
                                                            Pengembangan Diri
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit-komponen" class="form-label">Komponen</label>
                                                    <input type="text" class="form-control" id="edit-komponen"
                                                           name="komponen" value="<?= $kurikulum->getKomponen() ?>"
                                                           required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit-sub-komponen" class="form-label">Sub
                                                        Komponen</label>
                                                    <input type="text" class="form-control" id="edit-sub-komponen"
                                                           name="subKomponen"
                                                           value="<?= $kurikulum->getSubKomponen() ?>" required>
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

                            <!-- Hapus Kurikulum Modal -->
                            <div class="modal fade" id="deleteKurikulumModal<?= $kurikulum->getId() ?>" tabindex="-1"
                                 aria-labelledby="deleteKurikulumModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-headers">
                                            <button class="close-icon btn-closes" type="button" data-bs-dismiss="modal" aria-label="Close" id="modalCloseButton"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6 class="modal-title text-center" id="confirmDeleteModalLabel">Hapus Data Struktur Kurikulum?</h6>
                                            <br>
                                            <p class="text-center mb-0">Apakah Anda yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary pl-4"
                                                    data-bs-dismiss="modal">Batal
                                            </button>
                                            <a href="/admin/kurikulum/delete/<?= $kurikulum->getId() ?>"
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
                                       href="/admin/kurikulum?page=<?= $model['pagination']['page'] - 1 ?>"
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
                                    <a class="page-link" href="/admin/kurikulum?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($model['pagination']['page'] < $model['pagination']['totalPages']): ?>
                                <li class="page-item">
                                    <a class="page-link"
                                       href="/admin/kurikulum?page=<?= $model['pagination']['page'] + 1 ?>"
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
<!-- Tambah Kurikulum Modal -->
<div class="modal fade" id="tambahKurikulumModal" tabindex="-1" aria-labelledby="tambahKurikulumModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5 class="modal-title mb-5 mt-4 text-center" id="tambahKurikulumModalLabel">Tambah Data Struktur Kurikulum</h5>
                <form method="POST" action="/admin/kurikulum/tambah" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="tambah-kategori" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" id="tambah-kategori">
                            <option value="Kelompok A">Kelompok A</option>
                            <option value="Kelompok B">Kelompok B</option>
                            <option value="Muatan Lokal">Muatan Lokal</option>
                            <option value="Bimbingan dan Pelayanan">Bimbingan dan Pelayanan</option>
                            <option value="Pengembangan Diri">Pengembangan Diri</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tambah-komponen" class="form-label">Komponen</label>
                        <input type="text" class="form-control" id="tambah-komponen" name="komponen" required>
                    </div>
                    <div class="mb-3">
                        <label for="tambah-sub-komponen" class="form-label">Sub Komponen</label>
                        <input type="text" class="form-control" id="tambah-sub-komponen" value="-" name="subKomponen"
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
<!-- Edit Kurikulum 2 Modal -->
<div class="modal fade" id="editKurikulum2Modal" tabindex="-1" aria-labelledby="editKurikulum2ModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <h5 class="modal-title mb-5 mt-4 text-center" id="editKurikulum2ModalLabel">Edit Data Kurikulum</h5>
                <form method="POST" action="/admin/kurikulum/edit">
                    <div class="mb-3">
                        <label for="edit-nama" class="form-label">Nama Kurikulum</label>
                        <input type="text" class="form-control" id="edit-nama" name="nama"
                               value="<?= $model['kurikulum']['nama'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit-deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control textarea-tinymce" id="edit-deskripsi" name="deskripsi" rows="4"><?= $model['kurikulum']['deskripsi'] ?></textarea>
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

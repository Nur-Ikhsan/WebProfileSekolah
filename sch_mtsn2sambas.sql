-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2023 pada 15.22
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sch_mtsn2sambas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_guru_staff` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `id_guru_staff`) VALUES
('', '2000018392', '$2y$10$NG7VxSBNOPGS/j/MQCWEOuRqNNcpc0haHy9qcdKEsuXKmZOOyYTCO', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` varchar(255) NOT NULL,
  `nama_fasilitas` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` varchar(255) NOT NULL,
  `judul_galeri` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_staff`
--

CREATE TABLE `guru_staff` (
  `id_guru_staff` varchar(255) NOT NULL,
  `nama_guru` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` varchar(255) NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_sekolah`
--

CREATE TABLE `ket_sekolah` (
  `id` int(11) NOT NULL,
  `struktur_organisasi` varchar(255) DEFAULT NULL,
  `nama_kurikulum` varchar(255) DEFAULT NULL,
  `deskripsi_kurikulum` varchar(255) DEFAULT NULL,
  `visi` varchar(255) DEFAULT NULL,
  `misi` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `nama_prestasi` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` varchar(255) NOT NULL,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `judul_pengantar` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `nama_sekolah`, `alamat`, `telepon`, `email`, `website`, `judul_pengantar`, `deskripsi`) VALUES
('mtsn2sambas', 'MTs NEGERI 2 SAMBAS', 'Jalan Pertasi Kencana Semparuk', '( 0562 ) 371457', 'fuad.adhik@gmail.com', 'mtsn2sambas.com', 'Selayang Pandang', 'MTs Negeri 2 Sambas merupakan lembaga pendidikan menengah tingkat pertama yang berada dibawah naungan Kementrian Agama yang berciri Khas pelajar Agama Islam. Kurikulum yang digunakan di MTs Negeri 2 Sambas terdiri dari Kurikulum 2013 (K13) untuk 5 pelajaran Agama Islam (Aqidah Akhlak, Fiqih, Quran Hadits, Sejarah Kebudayaan Islam dan Bahasa Arab). Tenaga pengajar/guru yang dimiliki berjumlah 34 orang dengan 80%, sudah bersertifikat guru professional.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `admin_id`) VALUES
('64a402de9bd4f', ''),
('64a6e57aa672f', ''),
('64a75fa7540bb', ''),
('64a8105905c15', ''),
('64a810f078a4f', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slideshow`
--

CREATE TABLE `slideshow` (
  `id_slideshow` varchar(255) NOT NULL,
  `judul_slideshow` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `slideshow`
--

INSERT INTO `slideshow` (`id_slideshow`, `judul_slideshow`, `foto`) VALUES
('21f3d0fa-a11c-4651-b4b3-01267ec6b402', '5', '64a933f1768f0_slideshow1.jpg'),
('43bca86d-cf90-454c-948b-875c18f29ca7', '3', '64a934204a46f_slideshow2.jpg'),
('5fca48f3-7da3-4f8c-bc6e-deba6842e9e8', '2', '64a934069715b_slideshow3.jpg'),
('97d7b887-7b94-4048-bb54-ca1287372d09', '4', '64a934148891a_slideshow5.jpg'),
('d27303a9-cc59-4338-9b4c-39fd0501a677', '1', '64a933fc88126_slideshow4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_admin_guru_staff` (`id_guru_staff`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_berita_sekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `fk_fasilitas_sekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `fk_galeri_sekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `guru_staff`
--
ALTER TABLE `guru_staff`
  ADD PRIMARY KEY (`id_guru_staff`),
  ADD KEY `fk_gurustaff_sekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `fk_kegiatan_sekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `ket_sekolah`
--
ALTER TABLE `ket_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sekolah_ket_sekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `fk_sekolah_prestasi` (`id_sekolah`);

--
-- Indeks untuk tabel `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_sessions_admin_id` (`admin_id`);

--
-- Indeks untuk tabel `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id_slideshow`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_guru_staff` FOREIGN KEY (`id_guru_staff`) REFERENCES `guru_staff` (`id_guru_staff`);

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_berita_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fk_fasilitas_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `fk_galeri_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `guru_staff`
--
ALTER TABLE `guru_staff`
  ADD CONSTRAINT `fk_gurustaff_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `ket_sekolah`
--
ALTER TABLE `ket_sekolah`
  ADD CONSTRAINT `fk_sekolah_ket_sekolah` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `fk_sekolah_prestasi` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

--
-- Ketidakleluasaan untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `fk_sessions_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

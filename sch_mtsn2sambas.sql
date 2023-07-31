-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2023 pada 15.30
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
  `status` enum('ACTIVE','NON-ACTIVE') NOT NULL DEFAULT 'NON-ACTIVE',
  `id_guru_staff` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `id_guru_staff`) VALUES
('614a6614-7631-4eb4-8682-8363c86e024d', 'is', '$2y$10$2dcy/scB0PzSuGhSq1i0Iegm4NPfWChR6lhdkj2tAb3XPQYv4xd9C', 'NON-ACTIVE', '16fac101-bf57-4c75-b197-4ef7956f61a3'),
('a5160ecb-440e-4e1c-bb82-b491bbdb4ccb', 'aku', '$2y$10$HNWu86MF8d04OG8vXabo2.pohAr1qSsPOH/YpttwmgN6HAa5ycaNS', 'ACTIVE', '9aaad1f5-f56b-4e9d-bb41-f8e9d6df8cb4'),
('b90fb6be-0834-469b-bcb9-3355946e00e2', '2000018392', '$2y$10$vWgF4l3mXst/OoGWzhOkjORAnDmBCRiG7jWNL1Rjf0dV5sb2y7KmO', 'ACTIVE', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `judul_berita` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `tanggal`, `judul_berita`, `foto`, `isi_berita`, `id_sekolah`) VALUES
('c3306332-5099-4e2a-bed2-ecacbc78f680', '2023-07-17', 'Tiga Peserta Didik MTs Negeri 1 Kota Semarang Maju Ke Tingkat Provinsi dalam KSM Tahun 2023', '64b5983209783_berita.png', '<p>Kompetisi Sains Madrasah (KSM) Tingkat Kota Semarang Tahun 2023 telah dilaksanakan 8-10 Juli 2023.&nbsp; Sabtu (15/7/2023) akhirnya pengumuman KSM tersebut dirilis oleh Kemenag. Berdasarkan hasil pengumuman tersebut, tiga peserta didik MTs Negeri 1 Kota Semarang berhasil meraih juara. Adapun yang mendapat juara, yaitu Evan Raoul Rahman Juara 1 Mapel IPS, Nur Aini Syarifah Juara 2 Mapel IPS dan Achmad Nauval Juara 4 mapel IPA.</p>\r\n<p>Juara 1, 2, 3, 4 dan 5 dalam Kompetisi Sains Madrasah (KSM) Tingkat Kota Semarang Tahun 2023 berhak maju ke tingkat provinsi yang akan dilaksanakan tanggal 5-6 Agustus 2023. Sedangkan kartu peserta dan petunjuk pelaksanaan KSM tingkat provinsi baru bisa diunduh pada 1 Agustus 2023.</p>\r\n<p>Adapun peserta KSM Tingkat Kota Semarang Tahun 2023 mencapai 593 peserta dengan rincian tingkat MA/SMA ada 213 peserta, tingkat MTs/SMP 169 peserta, dan tingkat MI/SD 211 peserta dengan diikuti dari madrasah (MA/MTs/MI) dan&nbsp; sekolah (SMASMP/SD) baik negeri maupun swasta yang ada di Kota Semarang.</p>\r\n<p>Mata pelajaran yang dilombakan dalam Kompetisi Sains Madrasah (KSM) Tingkat Kota Semarang Tahun 2023 jenjang MI/SD mata pelajaran matematika terintegrasi dan IPA terintegrasi. Jenjang MTs/SMP mata pelajaran matematika terintegrasi, IPA terintegrasi, dan IPS terintegrasi. Sedangkan jenjang MA/SMA mata pelajaran matematika terintegrasi, biologi terintegrasi, fisika terintegrasi, kimia terintegrasi, geografi terintegrasi, dan ekonomi terintegrasi.</p>\r\n<p>Ani Suma&rsquo;iyah dan Indra Setyowati merupakan guru pembimbing mata pelajaran IPS mengaku bangga atas prestasi yang diraih anak didiknya. &ldquo;Bimbingan yang telah dilakukan sekitar dua minggu ini ternyata membuahkan hasil yang menggembirakan. Semangat dan rasa haus akan pengetahuan sudah terlihat sewaktu membimbing mereka,&rdquo; ujar Ani Suma&rsquo;iyah.</p>\r\n<p>Evan Raoul Rahman bersyukur atas prestasi yang diraihnya dalam KSM 2023 dengan menjadi juara 1 mapel IPS . Evan juga merasa senang dan bahagia karena kerja kerasnya membuahkan hasil. Selama bimbingan dia merasakan suasana yang menyenangkan sehingga materi dan latihan soal yang diberikan terasa ringan dan dapat dipahami. Evan juga tidak cepat puas akan hasil yang diraihnya saat ini karena masih ada tahapan yang harus dilaluinya supaya dapat lolos kembali dan meraih hasil yang memuaskan di KSM tingkat provinsi mendatang. Oleh karena itu, dia meminta doa dan dukungan dari orang tua, guru serta teman-temannya agar dapat membanggakan madrasah di tingkat provinsi bahkan nasional.</p>\r\n<p>Kasturi selaku Kepala MTs Negeri 1 Kota Semarang mengucapkan selamat dan terima kasih kepada peserta didik dan guru pembimbing yang menghantarkan madrasah meraih juara di KSM tahun 2023. &ldquo;Kami berharap selaku tuan rumah kegiatan KSM Tingkat Kota Semarang tahun 2023, peserta didik MTs Negeri 1 Kota Semarang mampu tampil menjadi yang terbaik serta menjadi kebanggaan dan dapat menjadi bagian dari kesuksesan madrasah di Kota Semarang untuk menuju ke tahap selanjutnya yaitu provinsi dan nasional. Semoga peserta didik MTs Negeri 1 Kota Semarang yang lolos ke tahap provinsi mampu menyumbangkan prestasi dan lanjut ke tingkat nasional&rdquo; kata Kasturi. Tetap semangat dan terus berusaha untuk mencapai hasil yang diinginkan. (Humas Emtessa)</p>', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id_ekstrakurikuler` varchar(255) NOT NULL,
  `nama_ekstrakurikuler` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ekstrakurikuler`
--

INSERT INTO `ekstrakurikuler` (`id_ekstrakurikuler`, `nama_ekstrakurikuler`, `deskripsi`, `icon`, `id_sekolah`) VALUES
('052c440d-72d8-4dc8-8421-1dfaab8bb091', 'Olahraga', 'Melibatkan siswa dalam berbagai jenis olahraga yakni futsal, voli ball, tenis meja, bulu tangkis, dan bela diri.', '64ae8732344b0_olahraga.png', NULL),
('2e7b7ba2-d3cc-49e7-9f1f-593be42b6fe1', 'Seni', 'Kegiatan di sekolah yang berfokus pada pengembangan bakat seni dan pemahaman terhadap budaya serta keagamaan yakni Seni Tari dan Tilawah', '64ae874742fe6_seni.png', NULL),
('70ebc4ff-8dc4-42e1-bb64-61319fd0ab8f', 'Pramuka', 'Melatih peserta didik untuk terampil dan mandiri dan melatih untuk berorganisasi dan kepemimpinan Memiliki jiwa sosial dan peduli kepada orang lain.', '64ae834372432_pramuka.png', NULL),
('8bad9921-2932-4056-b124-861c8fe11406', 'PMR', 'Palang Merah Remaja (PMR) adalah organisasi kepanduan dan kemanusiaan yang bergerak di bidang sosial dan kesehatan.', '64ae870bde995_pmr.png', NULL),
('a7f7c070-8ecb-4556-af60-b7c8de05fcea', 'Bahasa', 'Memberikan kesempatan kepada siswa untuk memperdalam pemahaman dan penggunaan Bahasa Inggris dan Arab di luar jam pelajaran reguler.', '64ae875cf2242_bahasa.png', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` varchar(255) NOT NULL,
  `nama_fasilitas` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `deskripsi`, `foto`, `id_sekolah`) VALUES
('63828ca1-9814-4a50-83a3-42ab7a4a9f87', 'msjdkfj', 'juipsao', '64bae9677c38b_slideshow1.jpg', NULL),
('afe2f031-9cdd-4ded-b776-bffb769930f2', 'jsfijdsio', 'jidjsoiajfsio', '64bae95da191c_logo.jpg', NULL),
('b4b7680e-a21f-49ff-8d24-39cd10521a61', 'Ruang UKS', 'Ruang UKS', '64aa7bcaecf81_UKS.jpg', NULL),
('e9622e38-559a-49b9-8f6b-92bc3e857dc3', 'kosdjfi', 'jidsjoajo', '64bae97351235_slideshow3.jpg', NULL);

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

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `judul_galeri`, `deskripsi`, `foto`, `id_sekolah`) VALUES
('ac8d42b3-2131-4182-a3a8-4301f73e290c', 'Wisuda A', 'Wisuda', '64b59d4d581b5_slideshow1.jpg', NULL);

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

--
-- Dumping data untuk tabel `guru_staff`
--

INSERT INTO `guru_staff` (`id_guru_staff`, `nama_guru`, `jabatan`, `foto`, `id_sekolah`) VALUES
('0', 'ADMIN', 'ADMIN', 'admin.jpg', 'mtsn2sambas'),
('16fac101-bf57-4c75-b197-4ef7956f61a3', 'ISKANDAR, S.Pd.I', 'Kepala Madrasah', '64b0119faca34_01 ISKANDAR MTs2.jpg', NULL),
('29794aac-8fed-41af-b490-8268d5708e20', 'NAIM, S.Pd.', 'Waka Sar-Pras', '64b59bde13a7f_04 NAIM, S. Pd.jpg', NULL),
('4849119d-e2bf-4ab1-becc-89cbb884df5c', 'SUGIHARTO, S.Pd, Jas', 'Waka Humas', '64b59c4e93059_05 SUGIHARTO.jpg', NULL),
('4a0504e5-0a63-485a-a9c2-d10b4df71607', 'MUHATADIN, S.HI.', 'Kepala Tata Usaha', '64b59a577eece_40 MUHTADIN, S. HI.jpg', NULL),
('51347c62-cc27-4f61-b404-1ce4cf28a210', 'DEDE SAMSUDIN, SH.', 'Bendahara', '64b59a954f08d_formal-person.png', NULL),
('57dbe536-b2b7-4075-9558-6b7d1dd0623b', 'PARMIN, S.Ag.', 'Waka Kurikulum', '64b59b8f33cce_02 PARMIN, S. Ag.jpg', NULL),
('60e63d62-f332-4639-9955-f33fc90a85d3', 'SRI YANI, S.Ag.', 'Waka Kesiswaan', '64b59bb1b0191_03 SRI YANI, S. Ag.jpg', NULL),
('869e8410-6416-4ecf-a2e5-b8329cf3f972', 'JULIDA, S.H.', 'Staff Administrasi', '64b59b48a2369_39 Julida HTM.jpg', NULL),
('9aaad1f5-f56b-4e9d-bb41-f8e9d6df8cb4', 'ARIEF ALAMSYAH, S.Kom.', 'Staff Adminstrasi', '64b59acd5be51_35 ARIF.jpg', NULL),
('a0134ae7-9b73-4953-bbfd-6798b938a695', 'ADENDRA, S.Pd.', 'Staff Administrasi', '64b59b29aa582_34 ADENDRA, S.Pd.jpeg', NULL),
('b092ee26-eac1-4d66-9cba-3478fdfc4bb5', 'SUKIRMAN', 'Komite Sekolah', '64b599ff6658a_formal-person.png', NULL);

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
  `id` varchar(255) NOT NULL,
  `struktur_organisasi` varchar(255) DEFAULT NULL,
  `nama_kurikulum` varchar(255) DEFAULT NULL,
  `deskripsi_kurikulum` text DEFAULT NULL,
  `visi` text DEFAULT NULL,
  `misi` text DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ket_sekolah`
--

INSERT INTO `ket_sekolah` (`id`, `struktur_organisasi`, `nama_kurikulum`, `deskripsi_kurikulum`, `visi`, `misi`, `id_sekolah`) VALUES
('94b845ad-6d28-4b7b-9054-6b9526570b08', '64ae1cdb31d87_struktur_organisasi.jpg', 'Kurikulum (K13)', '<p style=\"text-align: justify;\">Kurikulum 2013 merupakan kurikulum yang lebih mengutamakan pemahaman, skill, dan pendidikan yang berkarakter, siswa dituntut untuk lebih aktif dalam proses pembelajaran, siswa dituntut untuk paham atas materi serta siswa harus aktif berdikusi dan mampu berpresentasi serta memiliki sopan santu dan disiplin yang tinggi.</p>', '<p style=\"text-align: justify;\">&ldquo;Mewujudkan kualitas pendidikan yang mampu mengantarkan peserta didik ke jenjang pendidikan yang lebih tinggi serta mampu menata diri hidup bermasyarakat yang islami &ldquo;&nbsp;dengan indikator:</p>\r\n<ol>\r\n<li style=\"text-align: justify;\">Terbentuk sikap dan perilaku yang baik antar warga madrasah</li>\r\n<li style=\"text-align: justify;\">Terlaksananya interaksi sosial antar warga madrasah dan masyarakat sekitar</li>\r\n<li style=\"text-align: justify;\">Terlaksananya pengembangan Standar Isi/Kurikulum</li>\r\n<li style=\"text-align: justify;\">Terpenuhinya standar pendidik dan tenaga kependidikan yang memiliki kualitas sesuai Standar Nasional Pendidikan (SNP)</li>\r\n<li style=\"text-align: justify;\">Terlaksananya standar proses pembelajaran secara optimal dan profesional</li>\r\n<li style=\"text-align: justify;\">Tersedianya fasilitas pendidikan yang memadai sesuai standar pelayanan minimal (SPM)</li>\r\n<li style=\"text-align: justify;\">Menciptakan generasi muda yang mampu bersaing dalam bidang akademik maupun non akademik.</li>\r\n</ol>', '<p style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Untuk mencapai visi madrasah, misi dari penyelenggaran pendidikan dan pembelajaran di Madrasah Tsanawiyah Negeri 2 Sambas sebagai berikut:</span></p>\r\n<ol>\r\n<li style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Melaksanakan proses belajar mengajar secara profesional.</span></li>\r\n<li style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Mendorong peserta didik untuk mampu bersaing dalam kebaikan. </span></li>\r\n<li style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Memberdayakan umat dalam lingkungan pendidikan.</span></li>\r\n<li style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Mengembangkan budaya Islami dalam kehidupan sehari-hari.</span></li>\r\n</ol>', 'mtsn2sambas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id_kurikulum` varchar(255) NOT NULL,
  `komponen` varchar(255) DEFAULT NULL,
  `sub_komponen` varchar(255) DEFAULT NULL,
  `kategori` enum('Kelompok A','Kelompok B','Muatan Lokal','Bimbingan dan Pelayanan','Pengembangan Diri') DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kurikulum`
--

INSERT INTO `kurikulum` (`id_kurikulum`, `komponen`, `sub_komponen`, `kategori`, `id_sekolah`) VALUES
('0a53031d-6585-43cb-8db1-e0e1f4050605', 'Pendidikan Agama', '-', 'Kelompok A', NULL),
('c008e205-ed88-443f-920b-edd5bf275be7', '3234', '-', 'Kelompok A', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori` enum('Prestasi Siswa','Prestasi Guru','Prestasi Sekolah') DEFAULT NULL,
  `nama_prestasi` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `tanggal`, `kategori`, `nama_prestasi`, `id_sekolah`) VALUES
('026464ee-ff03-451f-a3cd-b8fe5bd991fa', '2023-07-12', 'Prestasi Siswa', 'Juara Satu Sari Tilawah Tingkat Kabupaten', NULL),
('0db8a123-73b9-48fd-bde2-1caa8e95b442', '2023-07-06', 'Prestasi Siswa', 'Juara Lomba .....', NULL),
('2bc2ef9c-fcf9-4191-a9b6-7ee2371d6f50', '2023-06-26', 'Prestasi Sekolah', 'Juara Satu Umum Pawai Tujuhbelasan Semparuk', NULL),
('45a3d910-e4cd-4f9e-a18a-c10788a1e9ed', '2023-07-18', 'Prestasi Guru', 'AKA', NULL),
('f781d8fd-4f18-44e9-a30d-7fd0e7964c67', '2023-07-27', 'Prestasi Guru', 'BBBBBBB', NULL);

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
('mtsn2sambas', 'MTs NEGERI 2 SAMBAS', 'Jalan Pertasi Kencana Semparuk', '( 0562 ) 371457', 'fuad.adhik@gmail.com', 'mtsn2sambas.com', 'Selayang Pandang', '<p style=\"text-align: justify;\">MTs Negeri 2 Sambas merupakan lembaga pendidikan menengah tingkat pertama yang berada dibawah naungan Kementrian Agama yang berciri Khas pelajar Agama Islam. Kurikulum yang digunakan di MTs Negeri 2 Sambas terdiri dari Kurikulum 2013 (K13) untuk 5 pelajaran Agama Islam (Aqidah Akhlak, Fiqih, Quran Hadits, Sejarah Kebudayaan Islam dan Bahasa Arab). Tenaga pengajar/guru yang dimiliki berjumlah 34 orang dengan 80%, sudah bersertifikat guru professional.</p>');

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
('64aaa99966b07', 'b90fb6be-0834-469b-bcb9-3355946e00e2'),
('64b0cce0164ed', 'b90fb6be-0834-469b-bcb9-3355946e00e2'),
('64b5f7c423b63', 'b90fb6be-0834-469b-bcb9-3355946e00e2'),
('64baf28d3f5f1', 'b90fb6be-0834-469b-bcb9-3355946e00e2'),
('64c2714c1c2ed', 'b90fb6be-0834-469b-bcb9-3355946e00e2');

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
('43bca86d-cf90-454c-948b-875c18f29ca7', '3', '64a934204a46f_slideshow2.jpg'),
('5fca48f3-7da3-4f8c-bc6e-deba6842e9e8', '2', '64a934069715b_slideshow3.jpg'),
('97d7b887-7b94-4048-bb54-ca1287372d09', '4', '64a934148891a_slideshow5.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id_guru_staff` (`id_guru_staff`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_berita_sekolah` (`id_sekolah`);

--
-- Indeks untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id_ekstrakurikuler`),
  ADD KEY `id_sekolah` (`id_sekolah`);

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
-- Indeks untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id_kurikulum`),
  ADD KEY `id_sekolah` (`id_sekolah`);

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
-- Ketidakleluasaan untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD CONSTRAINT `ekstrakurikuler_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

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
-- Ketidakleluasaan untuk tabel `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD CONSTRAINT `kurikulum_ibfk_1` FOREIGN KEY (`id_sekolah`) REFERENCES `sekolah` (`id_sekolah`);

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

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2023 pada 07.50
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
('b90fb6be-0834-469b-bcb9-3355946e00e2', 'ADMIN', '$2y$10$KO5uD2wiEdokHmhLWjSdse9bm7FWyDf6r15/zLAcb4hiquv/LowOC', 'ACTIVE', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `judul_berita` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `isi_berita` text DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `tanggal`, `judul_berita`, `slug`, `foto`, `isi_berita`, `id_sekolah`) VALUES
('474ac3cd-cc41-4604-aad3-ff9d629f4d7d', '2023-08-01', 'Kemendikbud Beri 5 Rekomendasi ke Pemda akibat PPDB Zonasi Bermasalah', '2023-08-01/kemendikbud-beri-5-rekomendasi-ke-pemda-akibat-ppdb-zonasi-bermasalah', '64cb53d42391d_kemendikbud.jpg', '<p style=\"text-align: justify;\">Masih ada beberapa daerah yang mengalami persoalan Penerimaan Peserta Didik Baru (PPDB) 2023 pada jalur zonasi.</p>\r\n<p style=\"text-align: justify;\">Seperti yang terjadi di Kota Bogor, ada pemalsuan Kartu Keluarga (KK) hingga intervensi pejabat agar lolos PPDB jalur Zonasi.&nbsp;</p>\r\n<p style=\"text-align: justify;\">Adanya kejadian itu, Dirjen PAUD Dikdasmen Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi (Kemendikbud Ristek) Iwan Syahril memberikan lima rekomendasi kepada pemerintah daerah (Pemda), agar PPDB khususnya jalur Zonasi dapat berjalan transparan, akuntabel, dan objektif.</p>\r\n<p style=\"text-align: justify;\">Pertama, pemda dapat berkomunikasi dengan Dinas Dukcapil dan BPS dalam menganalisis calon peserta didik yang akan lulus dari domisili dan ketersediaan daya tampung.</p>\r\n<p style=\"text-align: justify;\">Tak lupa, pemda pun bisa melakukan validasi, verifikasi, dan keabsahan KK.</p>\r\n<p style=\"text-align: justify;\">\"Permasalahan ini merupakan peluang untuk melakukan perbaikan sistem integrasi data dari Dukcapil dengan data lainnya sehingga sekolah bisa mendapat data yang terverifikasi dan tervalidasi,\" kata Iwan saat melakukan RDP dengan Komisi X DPR RI seperti mengutip laman YouTube DPR, Kamis (13/7/2023).</p>\r\n<p style=\"text-align: justify;\">Kedua, pemda bisa merangkul inspektorat daerah dalam menindak terkait pemalsuan KK yang dilakukan masyarakat.</p>\r\n<p style=\"text-align: justify;\">Ketiga, pemda dapat membuat komitmen bersama antar semua pemimpin musyawarah daerah, LSM, dan tokoh masyarakat.</p>\r\n<p style=\"text-align: justify;\">\"Itu bertujuan agar melaksanakan PPDB tanpa tekanan, bebas dari KKN, pungli melalui sebuah kesepakatan pakta integritas bersama,\" jelas dia.</p>\r\n<p style=\"text-align: justify;\">Keempat, pemda dalam menetapkan PPDB zona bisa memperhitungkan sebaran sekolah, domisili, peserta didik maupun daya tampung yang tersedia lebih detail dan jelas.</p>\r\n<p style=\"text-align: justify;\">Kelima, pemda bisa memberikan bantuan kepada keluarga tidak mampu agar bisa memasukkan sekolah swasta.</p>\r\n<p style=\"text-align: justify;\">\"Itu bila ada keluarga yang tak lolos PPDB, pemda bisa bantu dengan pembiayaan agar anak itu tetap sekolah, meski di sekolah swasta,\" ungkap dia. Baca juga: 30 Kampus Swasta dengan Status Akreditasi Unggul dari BAN-PT</p>\r\n<p style=\"text-align: justify;\">Iwan menegaskan, beberapa daerah sudah menerapkan langkah ini dalam membantu siswa dari keluarga yang tidak mampu agar bisa tetap mengenyam pendidikan di sekolah swasta.</p>\r\n<p style=\"text-align: justify;\">Inspektur Jenderal (Irjen) Kemendikbud Ristek, Chatarina Muliana Girsang telah mengakui bahwa masih lemahnya pengawasan PPDB di tingkat daerah.</p>\r\n<p style=\"text-align: justify;\">Oleh karena itu, Chatarina mengimbau dinas pendidikan untuk melakukan sosialisasi dan pengawasan secara masif, khususnya untuk memastikan prinsip pelaksanaan PPDB berjalan dengan baik.</p>\r\n<p style=\"text-align: justify;\">\"Kami meminta sebelum penyelenggaraan PPDB tingkat SMP, SD harus memberikan sosialisasi kepada orangtua murid kelas 6. Lalu, sebelum penyelenggaraan PPDB SMA, ada sosialisasi yang diberikan SMP untuk orangtua murid dan peserta didik kelas 9 di sekolah sebelumnya (SMP) sehingga mereka dapat pencerahan. Kami meminta disdik untuk menjalankan fungsi ini,\" jelas dia.</p>', NULL),
('a0c4d17b-c504-4dc9-b2ed-860255bc5658', '2023-07-30', 'Nadiem: PPDB Sistem Zonasi Mampu Perhatikan Kebutuhan Siswa', '2023-07-30/nadiem-ppdb-sistem-zonasi-mampu-perhatikan-kebutuhan-siswa', '64c7b0afa6b14_nadim.jpg', '<p style=\"text-align: justify;\">Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi (Mendikbud Ristek), Nadiem Makarim mengapresiasi program Penerimaan Peserta Didik Baru (PPDB) sistem zonasi.</p>\r\n<p style=\"text-align: justify;\">Program itu merupakan inisiasi dari Menteri Koordinator Bidang Pembangunan Manusia dan Kebudayaan (Menko PMK), Muhadjir Effendy yang sebelumnya pernah menjabat sebagai Menteri Pendidikan dan Kebudayaan (Mendikbud).&nbsp;</p>\r\n<p style=\"text-align: justify;\">Menteri Nadiem menuturkan, PPDB sistem zonasi ini memperhatikan kebutuhan peserta didik untuk dapat bersekolah di dekat rumahnya.</p>\r\n<p style=\"text-align: justify;\">Dengan begitu, bisa menciptakan gerakan gotong royong dalam membangun sekolah bersama-sama dengan tenaga kependidikan, komite sekolah, dan seluruh warga sekolah.</p>\r\n<p style=\"text-align: justify;\">\"Segala daya dorong yang selama ini telah Bapak (Menko PMK) lakukan untuk pendidikan Indonesia akan selalu tercatat dalam sejarah untuk kebaikan anak-anak Indonesia,\" ucap Nadiem di Jakarta, Minggu (30/7/2023).</p>\r\n<p style=\"text-align: justify;\">Di acara Belajar Raya 2023 di Posbloc, Jakarta, pada Sabtu (29/7/2023), Nadiem berdiskusi dengan Inisiator Semua Murid Semua Guru dan Najelaa Shihab tentang program PPDB sistem zonasi.</p>\r\n<p style=\"text-align: justify;\">Dia mengatakan kebijakan PPDB menggunakan sistem zonasi harus tetap dilanjutkan karena mampu mengatasi kesenjangan antarpeserta didik.</p>\r\n<p style=\"text-align: justify;\">Meski akhirnya akan merepotkan dirinya sendiri, karena program ini sangat penting.</p>\r\n<p style=\"text-align: justify;\">Menurut Menteri Nadiem, dahulu banyak orangtua peserta didik yang mendaftarkan anaknya masuk les agar bisa masuk ke sekolah favorit.</p>\r\n<p style=\"text-align: justify;\">Belum lagi, kata Menteri Nadiem, ada juga peserta didik yang secara ekonomi tidak mampu, harus membayar sekolah swasta karena tidak lolos masuk sekolah negeri.</p>', NULL),
('c3306332-5099-4e2a-bed2-ecacbc78f680', '2023-07-17', 'Tiga Peserta Didik MTs Negeri 1 Kota Semarang Maju Ke Tingkat Provinsi dalam KSM Tahun 2023', '2023-07-17/tiga-peserta-didik-mts-negeri-1-kota-semarang-maju-ke-tingkat-provinsi-dalam-ksm-tahun-2023', '64b5983209783_berita.png', '<p style=\"text-align: justify;\">Kompetisi Sains Madrasah (KSM) Tingkat Kota Semarang Tahun 2023 telah dilaksanakan 8-10 Juli 2023.&nbsp; Sabtu (15/7/2023) akhirnya pengumuman KSM tersebut dirilis oleh Kemenag. Berdasarkan hasil pengumuman tersebut, tiga peserta didik MTs Negeri 1 Kota Semarang berhasil meraih juara. Adapun yang mendapat juara, yaitu Evan Raoul Rahman Juara 1 Mapel IPS, Nur Aini Syarifah Juara 2 Mapel IPS dan Achmad Nauval Juara 4 mapel IPA.</p>\r\n<p style=\"text-align: justify;\">Juara 1, 2, 3, 4 dan 5 dalam Kompetisi Sains Madrasah (KSM) Tingkat Kota Semarang Tahun 2023 berhak maju ke tingkat provinsi yang akan dilaksanakan tanggal 5-6 Agustus 2023. Sedangkan kartu peserta dan petunjuk pelaksanaan KSM tingkat provinsi baru bisa diunduh pada 1 Agustus 2023.</p>\r\n<p style=\"text-align: justify;\">Adapun peserta KSM Tingkat Kota Semarang Tahun 2023 mencapai 593 peserta dengan rincian tingkat MA/SMA ada 213 peserta, tingkat MTs/SMP 169 peserta, dan tingkat MI/SD 211 peserta dengan diikuti dari madrasah (MA/MTs/MI) dan&nbsp; sekolah (SMASMP/SD) baik negeri maupun swasta yang ada di Kota Semarang.</p>\r\n<p style=\"text-align: justify;\">Mata pelajaran yang dilombakan dalam Kompetisi Sains Madrasah (KSM) Tingkat Kota Semarang Tahun 2023 jenjang MI/SD mata pelajaran matematika terintegrasi dan IPA terintegrasi. Jenjang MTs/SMP mata pelajaran matematika terintegrasi, IPA terintegrasi, dan IPS terintegrasi. Sedangkan jenjang MA/SMA mata pelajaran matematika terintegrasi, biologi terintegrasi, fisika terintegrasi, kimia terintegrasi, geografi terintegrasi, dan ekonomi terintegrasi.</p>\r\n<p style=\"text-align: justify;\">Ani Suma&rsquo;iyah dan Indra Setyowati merupakan guru pembimbing mata pelajaran IPS mengaku bangga atas prestasi yang diraih anak didiknya. &ldquo;Bimbingan yang telah dilakukan sekitar dua minggu ini ternyata membuahkan hasil yang menggembirakan. Semangat dan rasa haus akan pengetahuan sudah terlihat sewaktu membimbing mereka,&rdquo; ujar Ani Suma&rsquo;iyah.</p>\r\n<p style=\"text-align: justify;\">Evan Raoul Rahman bersyukur atas prestasi yang diraihnya dalam KSM 2023 dengan menjadi juara 1 mapel IPS . Evan juga merasa senang dan bahagia karena kerja kerasnya membuahkan hasil. Selama bimbingan dia merasakan suasana yang menyenangkan sehingga materi dan latihan soal yang diberikan terasa ringan dan dapat dipahami. Evan juga tidak cepat puas akan hasil yang diraihnya saat ini karena masih ada tahapan yang harus dilaluinya supaya dapat lolos kembali dan meraih hasil yang memuaskan di KSM tingkat provinsi mendatang. Oleh karena itu, dia meminta doa dan dukungan dari orang tua, guru serta teman-temannya agar dapat membanggakan madrasah di tingkat provinsi bahkan nasional.</p>\r\n<p style=\"text-align: justify;\">Kasturi selaku Kepala MTs Negeri 1 Kota Semarang mengucapkan selamat dan terima kasih kepada peserta didik dan guru pembimbing yang menghantarkan madrasah meraih juara di KSM tahun 2023. &ldquo;Kami berharap selaku tuan rumah kegiatan KSM Tingkat Kota Semarang tahun 2023, peserta didik MTs Negeri 1 Kota Semarang mampu tampil menjadi yang terbaik serta menjadi kebanggaan dan dapat menjadi bagian dari kesuksesan madrasah di Kota Semarang untuk menuju ke tahap selanjutnya yaitu provinsi dan nasional. Semoga peserta didik MTs Negeri 1 Kota Semarang yang lolos ke tahap provinsi mampu menyumbangkan prestasi dan lanjut ke tingkat nasional&rdquo; kata Kasturi. Tetap semangat dan terus berusaha untuk mencapai hasil yang diinginkan. (Humas Emtessa)</p>', NULL),
('fa87d354-240c-4766-835c-5d5d1da3576c', '2023-07-31', 'Hope Academy Milik YPPH Didik Siswa dalam Membentuk Masa Depan', '2023-07-31/hope-academy-milik-ypph-didik-siswa-dalam-membentuk-masa-depan', '64c7afb7e2804_hope.jpg', '<p style=\"text-align: justify;\">Sekolah yang menerrapkan International Baccalaureate (IB) kurikulum dengan bahasa pengantar Bahasa Inggris, Hope Academy menggelar acara \"Visit the School Day\" pada Jumat (28/7/2023).<br><br>Hope Academy telah beroperasi sejak 2019 di bawah naungan Yayasan Pendidikan Pelita Harapan (YPPH). Sekolah ini terletak di dalam kawasan St. Moritz, Jakarta Barat.</p>\r\n<p style=\"text-align: justify;\">Acara itu diikuti oleh 500 siswa dan orangtua ini bertujuan untuk membangun semangat belajar yang menyenangkan dalam menyambut tahun ajaran yang baru.</p>\r\n<p style=\"text-align: justify;\">Anak-anak berusia mulai dari 2 hingga 11 tahun yang merupakan murid-murid Hope Academy tampak ceria dan gembira menikmati beragam wahana permainan yang disediakan, seperti giant slides, choo-choo train, dan mengumpulkan stamp dari berbagai macam booth games menarik.</p>\r\n<p style=\"text-align: justify;\">Di mana di setiap boothnya para murid akan ditantang untuk melakukan aktivitas-aktivitas yang mengasah pola pikir serta gerak motorik mereka.</p>\r\n<p style=\"text-align: justify;\">School System Coordinator Hope Academy, Wiginy Kusliawan menyampaikan Hope Academy percaya bahwa proses pembelajaran dan pengembangan diri anak-anak bisa dilakukan secara menyenangkan.</p>\r\n<p style=\"text-align: justify;\">Proses untuk menyenangkan itu bisa didapatkan juga di luar kelas.</p>\r\n<p style=\"text-align: justify;\">\"Melalui acara visit the school day, kami harap anak-anak akan lebih semangat memulai tahun ajaran baru dan menjadi pembelajar sepanjang hayat, karena melihat belajar itu adalah hal yang menyenangkan dan bukan membosankan,\" ucap dia dalam keterangannya yang diperoleh Kompas.com, Senin (31/7/2023).</p>\r\n<p style=\"text-align: justify;\">Wiginy menambahkan seiring dengan pembukaan tahun ajaran baru, Hope Academy secara resmi mengumumkan pembukaan ekspansi</p>\r\n<p style=\"text-align: justify;\">Ekspansi itu, kata dia, dengan lantai baru yang berisikan kelas-kelas dan fasilitas-fasilitas baru yang modern untuk mendidik anak.</p>', NULL);

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
  `slug` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_sekolah` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `nama_kegiatan`, `slug`, `deskripsi`, `foto`, `id_sekolah`, `tanggal`) VALUES
('0ea07efa-01e0-4e9c-bbc5-b8feb3f697e3', 'CAUN', '2023-08-01/caun', 'lorem ipsum', '64c7935365703_SSD.jpg', NULL, '2023-08-01'),
('d1b3055a-d726-44de-adaa-45407f7edea9', 'Kegiatan Bulan Bahasa', '2023-08-09/kegiatan-bulan-bahasa', 'Bulan Bahasa merupakan bagian kegiatan dari program kerja di SMPN 6 Lembang. Dengan melibatkan wakasek kesiswaan, dewan guru dan OSIS. Kegiatan ini diselenggarakan pada hari Rabu 26 Oktober 2022 sebagai salah satu bentuk memperingati hari lahirnya Sumpah Pemuda yaitu setiap tanggal 28 Oktober dalam mengimplementasikan nilai Sumpah Pemuda pada poin ke-3 yang berbunyi “Kami putra dan putri Indonesia menjunjung bahasa persatuan, bahasa Indonesia”.\r\n\r\nKegiatan Bulan Bahasa diisi dengan berbagai perlombaan diantaranya ; Lomba membuat cerpen, membaca pusi, musikalisasi puisi, pementasan tari dan drama serta Karya Tulis Ilmiah. Selain itu untuk memeriahkan kegiatan bulan bahasa di SMPN 6 Lembang di adakan bazar makanan yang dikelola oleh masing-masing kelas. Tema yang diusung pada event ini adalah “Melalui Bulan Bahasa Kita Tingkatkan Kebanggaan Terhadap Penggunan Bahasa Indonesia” dengan tujuan menumbuhkan rasa cinta dan bangga generasi muda terhadap bahasa persatuan “Bahasa Indonesia” serta mengembangkan minat serta bakat siswa SMPN 6 Lembang pada bidang sastra dan bahasa.', '64cb21e931cb2_kegiatan.png', NULL, '2023-08-09'),
('ff8d65ac-1df0-409a-bebc-05015b1ae33e', 'Aku', '2023-08-16/aku', 'jkafjkdsfhksn dsafjdla fdasjflkds adjsfkdaiu fdhsakjfhdsai efdhsafkdsa dsjakfiu dsuahiuw hudsahif  ehwuhefdsa dushafisa ', '64ca27f96cf2c_slideshow3.jpg', NULL, '2023-08-16');

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
('94b845ad-6d28-4b7b-9054-6b9526570b08', '64ae1cdb31d87_struktur_organisasi.jpg', 'Kurikulum (K13)', '<p>Kurikulum 2013 merupakan kurikulum yang lebih mengutamakan pemahaman, skill, dan pendidikan yang berkarakter, siswa dituntut untuk lebih aktif dalam proses pembelajaran, siswa dituntut untuk paham atas materi serta siswa harus aktif berdikusi dan mampu berpresentasi serta memiliki sopan santu dan disiplin yang tinggi.</p>', '<p style=\"text-align: justify;\">Mewujudkan kualitas pendidikan yang mampu mengantarkan peserta didik ke jenjang pendidikan yang lebih tinggi serta mampu menata diri hidup bermasyarakat yang islami &ldquo; dengan indikator:</p>\r\n<ol>\r\n<li style=\"text-align: justify;\">Terbentuk sikap dan perilaku yang baik antar warga madrasah</li>\r\n<li style=\"text-align: justify;\">Terlaksananya interaksi sosial antar warga madrasah dan masyarakat sekitar</li>\r\n<li style=\"text-align: justify;\">Terlaksananya pengembangan Standar Isi/Kurikulum</li>\r\n<li style=\"text-align: justify;\">Terpenuhinya standar pendidik dan tenaga kependidikan yang memiliki kualitas sesuai Standar Nasional Pendidikan (SNP)</li>\r\n<li style=\"text-align: justify;\">Terlaksananya standar proses pembelajaran secara optimal dan profesional</li>\r\n<li style=\"text-align: justify;\">Tersedianya fasilitas pendidikan yang memadai sesuai standar pelayanan minimal (SPM)</li>\r\n<li style=\"text-align: justify;\">Menciptakan generasi muda yang mampu bersaing dalam bidang akademik maupun non akademik.</li>\r\n</ol>', '<p style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Untuk mencapai visi madrasah, misi dari penyelenggaran pendidikan dan pembelajaran di Madrasah Tsanawiyah Negeri 2 Sambas sebagai berikut:</span></p>\r\n<ol>\r\n<li style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Melaksanakan proses belajar mengajar secara profesional.</span></li>\r\n<li style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Mendorong peserta didik untuk mampu bersaing dalam kebaikan. </span></li>\r\n<li style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Memberdayakan umat dalam lingkungan pendidikan.</span></li>\r\n<li style=\"text-align: justify;\"><span style=\"background-color: rgb(255, 255, 255);\">Mengembangkan budaya Islami dalam kehidupan sehari-hari.</span></li>\r\n</ol>', 'mtsn2sambas');

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
('08e954e7-e61f-4b7b-bb05-f5e7edb1397a', 'BP/Bk', '-', 'Bimbingan dan Pelayanan', NULL),
('0a53031d-6585-43cb-8db1-e0e1f4050605', 'Pendidikan Agama', '-', 'Kelompok A', NULL),
('1c9b2470-dc7c-4455-80bf-0a3ab0b2335e', 'Bahasa Indonesia', '-', 'Kelompok A', NULL),
('27c1233d-7ed8-4c47-be52-0340d82f58ad', 'PRAMUKA dan PMR', '-', 'Pengembangan Diri', NULL),
('3eb4119f-9b2c-4f93-b5ae-ec580a00f458', 'Ilmu Pengetahuan Alam', '-', 'Kelompok A', NULL),
('45a586f6-3993-4379-a6f4-d4cfbdcaeb9d', 'Matematika', '-', 'Kelompok A', NULL),
('698529b9-4040-43b7-be42-88f904290d0a', 'Seni Budaya', '-', 'Kelompok B', NULL),
('6c575128-3568-4c2f-9908-3d756c81d937', 'Pendidikan Jasmani', '-', 'Kelompok B', NULL),
('6e3f7cdb-d0f0-4a09-9415-af95fb7d7ca2', 'Olahraga dan Kesehatan', '-', 'Kelompok B', NULL),
('6e4f4d06-e95b-4d66-ad65-7f733fb1e4d5', 'TIK', '-', 'Kelompok A', NULL),
('70f8e1fc-c5af-4e49-acf5-f4805eac6f84', 'Seni (Drum Band, Tilawah)', '-', 'Kelompok A', NULL),
('89b497da-d3a6-4ff4-88fc-f2292e153d36', 'Bahasa Inggris', '-', 'Kelompok A', NULL),
('92807965-5c93-49a8-95ba-23a267d7f6f9', 'Prakarya dan / atau Informatika*)', '-', 'Kelompok B', NULL),
('a042691d-8310-47db-b662-29ba0a74f90d', 'Praktek Ibadah', '-', 'Muatan Lokal', NULL),
('bad2ddad-1c2d-4288-bdf1-222186193e86', 'BTQ', '-', 'Bimbingan dan Pelayanan', NULL),
('bcb73c6d-8c63-470c-8c7a-dbe3d952af80', 'Bahasa Arab', '-', 'Kelompok A', NULL),
('c008e205-ed88-443f-920b-edd5bf275be7', 'Pendidikan Pancasila dan Kewarganegaraan', '-', 'Kelompok A', NULL),
('c4277403-3df5-4143-8a3a-e7bb7b4d2c36', 'KIR (MTK, IPA)', '-', 'Pengembangan Diri', NULL),
('d485f304-d55d-483e-a4db-3e9d435109c6', 'Olahraga (Futsal, Volly Ball, Tenis Meja, Bulu Tangkis, Bela Diri)', '-', 'Pengembangan Diri', NULL),
('dce4821b-f115-47fb-b47f-165103cf1e69', 'Ilmu Pengetahuan Sosial', '-', 'Kelompok A', NULL);

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
('64c2714c1c2ed', 'b90fb6be-0834-469b-bcb9-3355946e00e2'),
('64c37ee496456', 'b90fb6be-0834-469b-bcb9-3355946e00e2'),
('64c79606efded', 'b90fb6be-0834-469b-bcb9-3355946e00e2');

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
('2f840daf-a157-4020-9bf6-2355eea7cdd1', 'Slideshow5', '64c79c3390545_slideshow5.jpg'),
('87f0167e-d522-40b8-a93c-bc5032311846', 'ds', '64c98b957593e_slideshow2.jpg');

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
  ADD UNIQUE KEY `slug` (`slug`) USING BTREE,
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
  ADD UNIQUE KEY `slug` (`slug`),
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

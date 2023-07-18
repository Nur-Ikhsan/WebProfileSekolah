<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <link href="/images/logo1.png" rel="icon">

    <title><?= $model['title'] ?? 'MTs Negeri 2 Sambas' ?></title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/owl.carousel.min.css" rel="stylesheet">

    <link href="/css/bootstrap-icons.css" rel="stylesheet">

    <link href="/css/sch_mtsn2sambas.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--

    TemplateMo 590 topic listing

    https://templatemo.com/tm-590-topic-listing

    -->
</head>



<body id="top">



    <nav class="navbar navbar-expand-sm">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img src="images/logo.png" alt="logo" class="logo-img" />
            </a>

            <!--            <div class="d-lg-none ms-auto me-4">-->
            <!--                <a href="#top" class="navbar-icon bi-person smoothscroll"></a>-->
            <!--            </div>-->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li>
                        <a class="nav-link " href="/index">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <input type="checkbox" id="profile-toggle" class="d-none">
                        <label class=" text-info nav-link dropdown-toggle" for="profile-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">Profil</label>
                        <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="profile-toggle">
                            <li><a class="dropdown-item" href="/struktur_organisasi">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="/visi-misi">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="/tujuan">Tujuan</a></li>
                            <li><a class="dropdown-item" href="/fasilitas_sekolah">Fasilitas Sekolah</a></li>
                            <li><a class="dropdown-item" href="/kegiatan_sekolah">Kegiatan Sekolah</a></li>
                            <li><a class="dropdown-item" href="/guru_staff">Guru & Staff</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kurikulum">Kurikulum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/berita">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/galeri">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/login">Login</a>
                    </li>
                </ul>
            </div>



    </nav>
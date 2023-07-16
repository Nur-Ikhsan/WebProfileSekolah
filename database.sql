CREATE DATABASE sch_mtsn2sambas;

CREATE DATABASE sch_mtsn2sambas_test;


drop database sch_mtsn2sambas;

CREATE TABLE admin
(
    id       VARCHAR(255) NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    status  ENUM('ACTIVE','NON-ACTIVE') NOT NULL DEFAULT 'NON-ACTIVE',
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE sessions
(
    id       VARCHAR(255) NOT NULL UNIQUE,
    admin_id VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

ALTER TABLE sessions
    ADD CONSTRAINT fk_sessions_admin_id
        FOREIGN KEY (admin_id)
            REFERENCES admin (id);

ALTER TABLE sessions
    MODIFY id VARCHAR(255) NOT NULL;


CREATE TABLE sekolah
(
    id_sekolah      VARCHAR(255) PRIMARY KEY,
    nama_sekolah    VARCHAR(255),
    alamat          VARCHAR(255),
    telepon         VARCHAR(20),
    email           VARCHAR(255),
    website         VARCHAR(255),
    judul_pengantar VARCHAR(255),
    deskripsi       TEXT
);



CREATE TABLE fasilitas
(
    id_fasilitas   VARCHAR(255) PRIMARY KEY,
    nama_fasilitas VARCHAR(255),
    deskripsi      TEXT,
    foto           VARCHAR(255)
);

CREATE TABLE kegiatan
(
    id_kegiatan   VARCHAR(255) PRIMARY KEY,
    nama_kegiatan VARCHAR(255),
    deskripsi     TEXT
);

CREATE TABLE guru_staff
(
    id_guru_staff VARCHAR(255) PRIMARY KEY,
    nama_guru     VARCHAR(255),
    jabatan       VARCHAR(255),
    foto          VARCHAR(255)
);


CREATE TABLE galeri
(
    id_galeri    VARCHAR(255) PRIMARY KEY,
    judul_galeri VARCHAR(255),
    deskripsi    TEXT,
    foto         VARCHAR(255)
);

CREATE TABLE slideshow
(
    id_slideshow    VARCHAR(255) PRIMARY KEY,
    judul_slideshow VARCHAR(255),
    foto            VARCHAR(255)
);

drop table berita;

CREATE TABLE berita
(
    id_berita    VARCHAR(255) PRIMARY KEY,
    tanggal       DATE,
    judul_berita VARCHAR(255),
    foto         VARCHAR(255),
    isi_berita    TEXT
);

CREATE TABLE Prestasi
(
    id_prestasi   VARCHAR(255) PRIMARY KEY,
    tanggal       DATE,
    kategori      VARCHAR(255),
    nama_prestasi VARCHAR(255)
);

CREATE TABLE `ket_sekolah`
(
    id                  VARCHAR(255) PRIMARY KEY,
    struktur_organisasi VARCHAR(255),
    nama_kurikulum      VARCHAR(255),
    deskripsi_kurikulum VARCHAR(255),
    visi                VARCHAR(255),
    misi                VARCHAR(255)
);

CREATE TABLE Kurikulum
(
    id_kurikulum  VARCHAR(255) PRIMARY KEY,
    komponen      VARCHAR(255),
    sub_komponen  VARCHAR(255),
    kategori      VARCHAR(255),
    alokasi_waktu INT,
    kelas         VARCHAR(255),
    id_sekolah    VARCHAR(255),
    FOREIGN KEY (id_sekolah) REFERENCES Sekolah (id_sekolah)
);

CREATE TABLE ekstrakurikuler
(
    id_ekstrakurikuler    VARCHAR(255) PRIMARY KEY,
    nama_ekstrakurikuler VARCHAR(255),
    deskripsi             TEXT,
    icon                  VARCHAR(255),
    id_sekolah            VARCHAR(255),
    FOREIGN KEY (id_sekolah) REFERENCES Sekolah (id_sekolah)
);

ALTER TABLE fasilitas
    ADD COLUMN id_sekolah VARCHAR(255);
ALTER TABLE fasilitas
    ADD CONSTRAINT fk_fasilitas_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE kegiatan
    ADD COLUMN id_sekolah VARCHAR(255);
ALTER TABLE kegiatan
    ADD CONSTRAINT fk_kegiatan_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE guru_staff
    ADD COLUMN id_sekolah VARCHAR(255);
ALTER TABLE guru_staff
    ADD CONSTRAINT fk_gurustaff_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE galeri
    ADD COLUMN id_sekolah VARCHAR(255);
ALTER TABLE galeri
    ADD CONSTRAINT fk_galeri_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE berita
    ADD COLUMN id_sekolah VARCHAR(255);
ALTER TABLE berita
    ADD CONSTRAINT fk_berita_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE prestasi
    ADD COLUMN id_sekolah VARCHAR(255);
ALTER TABLE prestasi
    ADD CONSTRAINT fk_sekolah_prestasi FOREIGN KEY (id_sekolah) REFERENCES Sekolah (id_sekolah);

ALTER TABLE ket_sekolah
    ADD COLUMN id_sekolah VARCHAR(255);
ALTER TABLE ket_sekolah
    ADD CONSTRAINT fk_sekolah_ket_sekolah FOREIGN KEY (id_sekolah) REFERENCES Sekolah (id_sekolah);


ALTER TABLE admin
    ADD COLUMN id_guru_staff VARCHAR(255);
ALTER TABLE admin
    ADD CONSTRAINT fk_admin_guru_staff FOREIGN KEY (id_guru_staff) REFERENCES guru_staff (id_guru_staff);



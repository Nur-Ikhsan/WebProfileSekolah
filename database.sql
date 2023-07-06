CREATE DATABASE sch_mtsn2sambas;

CREATE DATABASE sch_mtsn2sambas_test;


drop database sch_mtsn2sambas;

CREATE TABLE admin
(
    id       VARCHAR(255)      NOT NULL,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE sessions
(
    id VARCHAR(255) NOT NULL UNIQUE,
    admin_id  VARCHAR(255)  NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

ALTER TABLE sessions
    ADD CONSTRAINT fk_sessions_admin_id
        FOREIGN KEY (admin_id)
            REFERENCES admin (id);

ALTER TABLE sessions MODIFY id VARCHAR(255) NOT NULL;


CREATE TABLE sekolah (
                         id_sekolah VARCHAR(255) PRIMARY KEY,
                         nama_sekolah VARCHAR(255),
                         alamat VARCHAR(255),
                         telepon VARCHAR(20),
                         email VARCHAR(255),
                         website VARCHAR(255),
                         visi TEXT,
                         misi TEXT,
                         struktur_organisasi VARCHAR(255)
);



CREATE TABLE fasilitas (
                           id_fasilitas VARCHAR(255) PRIMARY KEY,
                           nama_fasilitas VARCHAR(255),
                           deskripsi TEXT
);

CREATE TABLE kegiatan (
                          id_kegiatan VARCHAR(255) PRIMARY KEY,
                          nama_kegiatan VARCHAR(255),
                          deskripsi TEXT
);

CREATE TABLE guru_staff (
                                id_guru_staff VARCHAR(255) PRIMARY KEY,
                                nama_guru VARCHAR(255),
                                jabatan VARCHAR(255),
                                foto VARCHAR(255)
);


CREATE TABLE galeri (
                        id_galeri VARCHAR(255) PRIMARY KEY,
                        judul_galeri VARCHAR(255),
                        deskripsi TEXT,
                        foto VARCHAR(255)
);

CREATE TABLE slideshow (
                           id_slideshow VARCHAR(255) PRIMARY KEY,
                           judul_slideshow VARCHAR(255),
                           foto VARCHAR(255)
);

CREATE TABLE berita (
                        id_berita VARCHAR(255) PRIMARY KEY,
                        judul_berita VARCHAR(255),
                        deskripsi TEXT,
                        foto VARCHAR(255)
);

ALTER TABLE fasilitas ADD COLUMN id_sekolah INT;
ALTER TABLE fasilitas ADD CONSTRAINT fk_fasilitas_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah(id_sekolah);

ALTER TABLE kegiatan ADD COLUMN id_sekolah INT;
ALTER TABLE kegiatan ADD CONSTRAINT fk_kegiatan_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE guru_staff ADD COLUMN id_sekolah INT;
ALTER TABLE guru_staff ADD CONSTRAINT fk_gurustaff_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE galeri ADD COLUMN id_sekolah INT;
ALTER TABLE galeri ADD CONSTRAINT fk_galeri_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE berita ADD COLUMN id_sekolah INT;
ALTER TABLE berita ADD CONSTRAINT fk_berita_sekolah FOREIGN KEY (id_sekolah) REFERENCES sekolah (id_sekolah);

ALTER TABLE admin ADD COLUMN id_guru INT;
ALTER TABLE admin ADD CONSTRAINT fk_admin_guru_staff FOREIGN KEY (id_guru_staff) REFERENCES guru_staff (id_guru_staff);



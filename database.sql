CREATE DATABASE sch_mtsn2sambas;

CREATE DATABASE sch_mtsn2sambas_test;


CREATE TABLE admin
(
    id       INT(11)      NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE sessions
(
    id VARCHAR(255) NOT NULL UNIQUE,
    admin_id INT(11) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

ALTER TABLE sessions
    ADD CONSTRAINT fk_sessions_admin_id
        FOREIGN KEY (admin_id)
            REFERENCES admin (id);

ALTER TABLE sessions MODIFY id VARCHAR(255) NOT NULL;


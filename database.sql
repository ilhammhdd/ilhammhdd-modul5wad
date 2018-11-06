CREATE DATABASE IF NOT EXISTS laboratorium_si;

CREATE USER IF NOT EXISTS 'ilhammhdd'@'localhost' IDENTIFIED BY 'modul5';

GRANT ALL PRIVILEGES ON laboratorium_si.* TO 'ilhammhdd'@'localhost' WITH GRANT OPTION;

USE laboratorium_si;

CREATE TABLE IF NOT EXISTS laboratorium(
  `id` INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` VARCHAR(50),
  `visi` VARCHAR(1000)
);

CREATE TABLE IF NOT EXISTS praktikum(
  `id` INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `kode` VARCHAR(10) UNIQUE,
  `nama` VARCHAR(30),
  `laboratorium_id` INT(11) UNSIGNED NOT NULL,

  FOREIGN KEY(laboratorium_id)
  REFERENCES laboratorium(id)
  ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS modul(
  `id` INT(11) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nama` VARCHAR(30),
  `nomor` TINYINT(1),
  `praktikum_id` INT(11) UNSIGNED NOT NULL,

  FOREIGN KEY(praktikum_id)
  REFERENCES praktikum(id)
  ON DELETE CASCADE
);

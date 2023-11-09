-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `information`;
CREATE TABLE `information` (
  `id_information` int(2) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id_information`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `lastsolved`;
CREATE TABLE `lastsolved` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `id_soal` int(20) NOT NULL,
  `nama_soal` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `mission`;
CREATE TABLE `mission` (
  `id_soal` int(20) NOT NULL AUTO_INCREMENT,
  `nama_soal` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `hint` varchar(500) NOT NULL,
  `flag` varchar(250) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `poin` int(20) NOT NULL,
  `display` int(1) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_soal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `player`;
CREATE TABLE `player` (
  `id_player` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `team` varchar(50) NOT NULL,
  `nama_lengkap` varchar(250) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `status` int(1) NOT NULL,
  `solved` varchar(500) NOT NULL DEFAULT '0',
  `poin` bigint(50) NOT NULL DEFAULT 0,
  `waktu` datetime DEFAULT NULL,
  `last_login` varchar(40) DEFAULT NULL,
  `log` text DEFAULT NULL,
  PRIMARY KEY (`id_player`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `player` (`id_player`, `username`, `team`, `nama_lengkap`, `email`, `password`, `status`, `solved`, `poin`, `waktu`, `last_login`, `log`) VALUES
(1,	'admin',	'-',	'admin',	'admin@tenesys.com',	'202cb962ac59075b964b07152d234b70',	2,	'0',	0,	'2021-02-20 18:08:24',	'',	' ');

DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- 2021-12-01 09:36:34

-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `msmsreal`;

CREATE TABLE `meseci` (
  `id` int(11) NOT NULL,
  `naziv` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `meseci` (`id`, `naziv`) VALUES
(201803,	'Mart 2018.'),
(201804,	'April 2018.'),
(201805,	'Maj 2018.'),
(201806,	'Jun 2018.'),
(201807,	'Jul 2018.'),
(201808,	'Avgust 2018.'),
(201809,	'Septembar 2018.'),
(201810,	'Oktobar 2018.'),
(201811,	'Novembar 2018.'),
(201812,	'Decembar 2018.'),
(201901,	'Januar 2019.'),
(201902,	'Februar 2019.'),
(201903,	'Mart 2019.'),
(201904,	'April 2019.'),
(201905,	'Maj 2019.'),
(201906,	'Jun 2019.');

CREATE TABLE `naplata` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mesec_id` int(10) unsigned NOT NULL,
  `lok_fakturisano_postpaid` float NOT NULL,
  `lok_naplaceno_m4` float NOT NULL,
  `lok_naplaceno_m3` float NOT NULL,
  `lok_naplaceno_m2` float NOT NULL,
  `lok_naplaceno_m1` float NOT NULL,
  `lok_baza` float DEFAULT NULL,
  `lipb_fakturisano_postpaid` float NOT NULL,
  `lipb_naplaceno_m4` float NOT NULL,
  `lipb_naplaceno_m3` float NOT NULL,
  `lipb_naplaceno_m2` float NOT NULL,
  `lipb_naplaceno_m1` float NOT NULL,
  `lipb_baza` float DEFAULT NULL,
  `vip_lok_pop_sum` float NOT NULL,
  `vip_lok_prp_sum` float NOT NULL,
  `vip_lok_baza` float DEFAULT NULL,
  `vip_lipb_pop_sum` float NOT NULL,
  `vip_lipb_prp_sum` float NOT NULL,
  `vip_lipb_baza` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mesec_id` (`mesec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `naplata` (`id`, `mesec_id`, `lok_fakturisano_postpaid`, `lok_naplaceno_m4`, `lok_naplaceno_m3`, `lok_naplaceno_m2`, `lok_naplaceno_m1`, `lok_baza`, `lipb_fakturisano_postpaid`, `lipb_naplaceno_m4`, `lipb_naplaceno_m3`, `lipb_naplaceno_m2`, `lipb_naplaceno_m1`, `lipb_baza`, `vip_lok_pop_sum`, `vip_lok_prp_sum`, `vip_lok_baza`, `vip_lipb_pop_sum`, `vip_lipb_prp_sum`, `vip_lipb_baza`) VALUES
(1,	201803,	199880,	0,	4232.08,	43244.9,	162753,	2660.63,	0,	0,	0,	0,	0,	152.533,	0,	0,	2315.35,	4593,	0,	76.5333),
(2,	201804,	113810,	0,	5994.12,	43674.9,	65171.3,	1930.62,	441.01,	0,	0,	0,	0,	37.5667,	71747,	0,	1208.37,	113,	0,	1.9),
(3,	201805,	117672,	0,	2086.04,	41670.8,	50107,	1901.1,	0,	0,	0,	0,	0,	59.7167,	70581,	0,	1191.02,	21,	0,	0),
(5,	201806,	97578,	0,	3732.07,	51501,	49745,	1774.57,	33.6,	0,	0,	441.01,	0,	11.5333,	109260,	0,	1826.38,	0,	0,	0),
(6,	201807,	118630,	0,	4364.09,	48497,	43068.9,	1827.82,	901.63,	0,	0,	0,	0,	3.4333,	91450,	0,	1304.6,	6784,	0,	0),
(7,	201808,	119434,	0,	14050.3,	44086.9,	57101.1,	2233.4,	130.2,	0,	0,	0,	327.61,	3.5833,	60559,	0,	1010.9,	34,	0,	0.55),
(8,	201809,	106140,	0,	2632.05,	51781,	52487.1,	1485.73,	36.4,	0,	0,	0,	130.2,	5.5833,	119530,	0,	1996.97,	2434,	0,	40.6667),
(9,	201810,	113480,	0,	4212.08,	46986.9,	48015,	1811.47,	5717.76,	0,	0,	0,	36.4,	130.483,	41919,	10601,	875.033,	3157,	2958,	102.267),
(10,	201811,	68161.4,	0,	10510.2,	45258.9,	49011,	1170.52,	14473.6,	0,	0,	0,	1101.83,	391.183,	36832,	15282,	879.383,	15924,	27108,	737.633),
(11,	201812,	51675,	406.01,	4926.1,	46258.9,	30712.6,	1033.37,	16541.5,	0,	0,	2611.07,	8134.23,	704.167,	45176,	9338,	920.517,	25709,	27253,	884.717),
(12,	201901,	99192,	0,	7440.15,	25058.5,	18902.4,	1315.18,	26616.2,	0,	0,	6041.17,	5468.55,	530.933,	31344,	14742,	767.683,	17370,	16853,	571.633),
(13,	201902,	74651.5,	0,	5078.1,	25036.5,	38752.8,	1033.08,	44654.3,	0,	106.4,	6280.58,	13418,	781.833,	30688,	20931,	872.817,	14121,	17907,	539.317),
(14,	201903,	68145.4,	0,	3444.07,	37372.8,	33188.7,	1117.83,	41295.6,	0,	0,	9846.48,	35786.4,	904.267,	31676,	17939,	831.117,	18774,	7881,	446.233);

CREATE TABLE `partneri` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ime` varchar(50) NOT NULL,
  `racun` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `zarada` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mesec_id` int(10) unsigned NOT NULL,
  `partner_id` int(10) unsigned NOT NULL,
  `sms` float NOT NULL,
  `lokali` float NOT NULL,
  `lipb` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `partner_id` (`partner_id`),
  CONSTRAINT `zarada_ibfk_1` FOREIGN KEY (`partner_id`) REFERENCES `partneri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2019-07-06 22:46:36

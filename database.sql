/*
 Navicat Premium Data Transfer

 Source Server         : local - MariaDB
 Source Server Type    : MariaDB
 Source Server Version : 100412
 Source Host           : 127.0.0.1:3306
 Source Schema         : erental

 Target Server Type    : MariaDB
 Target Server Version : 100412
 File Encoding         : 65001

 Date: 15/07/2020 20:50:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ref_kendaraan
-- ----------------------------
DROP TABLE IF EXISTS `ref_kendaraan`;
CREATE TABLE `ref_kendaraan` (
  `id` int(11) NOT NULL,
  `nm_kendaraan` varchar(255) DEFAULT NULL,
  `tipe_kendaraan` varchar(255) DEFAULT NULL,
  `pabrikan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `harga` bigint(64) DEFAULT NULL,
  `total_penumpang` varchar(255) DEFAULT NULL,
  `status` tinyint(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_kendaraan
-- ----------------------------
BEGIN;
INSERT INTO `ref_kendaraan` VALUES (1, 'Hilux', 'Pickup', 'Toyota', 'ok_ Exterior 1.jpg', 450000, '4', 0);
INSERT INTO `ref_kendaraan` VALUES (2, 'Toyota 86', 'Sedan', 'Toyota', 'ok_ Toyota 86.jpg', 500000, '2', 1);
INSERT INTO `ref_kendaraan` VALUES (3, 'Toyota C-HR', 'SUV', 'Toyota', 'Thumbnail C-HR.jpg', 600000, '4', 1);
INSERT INTO `ref_kendaraan` VALUES (4, 'Eclipse Cross', 'SUV', 'Mitsubishi', 'OK_ eclipse cross-thumbnail_ncs.jpg', 550000, '4', 1);
INSERT INTO `ref_kendaraan` VALUES (5, 'Mini Clubman', 'SUV', 'MINI', 'Clubman-1-thumb_ncs.jpg', 800000, '5', 0);
INSERT INTO `ref_kendaraan` VALUES (6, 'APV Arena', 'Mini Bus', 'Suzuki', 'Thumbnail APV.jpg', 450000, '6', 1);
COMMIT;

-- ----------------------------
-- Table structure for ref_tempat
-- ----------------------------
DROP TABLE IF EXISTS `ref_tempat`;
CREATE TABLE `ref_tempat` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ref_tempat
-- ----------------------------
BEGIN;
INSERT INTO `ref_tempat` VALUES (1, 'Berastagi');
INSERT INTO `ref_tempat` VALUES (2, 'Dwi Warna');
INSERT INTO `ref_tempat` VALUES (3, 'Landak River');
INSERT INTO `ref_tempat` VALUES (4, 'Sipolha');
COMMIT;

-- ----------------------------
-- Table structure for ta_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `ta_pembayaran`;
CREATE TABLE `ta_pembayaran` (
  `id` int(32) NOT NULL,
  `id_reservasi` int(32) NOT NULL,
  `nama_pengirim` varchar(255) DEFAULT NULL,
  `total_pembayaran` bigint(255) DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_reservasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ta_pembayaran
-- ----------------------------
BEGIN;
INSERT INTO `ta_pembayaran` VALUES (1, 1, 'Anggia', 1600000, '22-223941_transparent-avatar-png-male-avatar-icon-transparent-png.png');
COMMIT;

-- ----------------------------
-- Table structure for ta_reservasi
-- ----------------------------
DROP TABLE IF EXISTS `ta_reservasi`;
CREATE TABLE `ta_reservasi` (
  `id` int(32) NOT NULL,
  `id_kendaraan` int(32) NOT NULL,
  `id_tempat` int(32) NOT NULL,
  `id_user` int(32) NOT NULL,
  `lama_pergi` varchar(255) DEFAULT NULL,
  `total` bigint(64) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`id_kendaraan`,`id_tempat`,`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ta_reservasi
-- ----------------------------
BEGIN;
INSERT INTO `ta_reservasi` VALUES (1, 1, 1, 1, '2', 900000, '1');
COMMIT;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `no_ktp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
BEGIN;
INSERT INTO `user` VALUES (1, 'admin', 'admin', 'admin@mail.com', 'admin', 'Anggia', 'Nikita', NULL);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

CREATE DATABASE  IF NOT EXISTS `smart_ehealth_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `smart_ehealth_db`;
-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: smart_ehealth_db
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.12.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anamnesa`
--

DROP TABLE IF EXISTS `anamnesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `anamnesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `registrasi_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `keluhan` varchar(50) DEFAULT NULL,
  `keluhan_rincian` varchar(50) DEFAULT NULL,
  `keluhan_lokasi` varchar(50) DEFAULT NULL,
  `keluhan_lokasi_umum` varchar(50) DEFAULT NULL,
  `keluhan_sub_lokasi` varchar(50) DEFAULT NULL,
  `keluhan_berlangsung_nil` tinyint(2) DEFAULT NULL,
  `keluhan_berlangsung_lama` enum('detik','menit','jam','hari','minggu','bulan','tahun') DEFAULT NULL,
  `keluhan_faktor_pencetus` varchar(200) DEFAULT NULL,
  `keluhan_durasi_nil` tinyint(2) DEFAULT NULL,
  `keluhan_durasi_lama` enum('menit','jam','hari','minggu','bulan','tahun') DEFAULT NULL,
  `keluhan_durasi_jenis` varchar(50) DEFAULT NULL,
  `keluhan_durasi_pereda` varchar(50) DEFAULT NULL,
  `keluhan_durasi_pemberat` varchar(50) DEFAULT NULL,
  `keluhan_menjalar_pil` tinyint(1) DEFAULT NULL,
  `keljalar_kepala_pil` tinyint(1) DEFAULT NULL,
  `keljalar_kepala` varchar(100) DEFAULT NULL,
  `keljalar_wajah_pil` tinyint(1) DEFAULT NULL,
  `keljalar_wajah` varchar(100) DEFAULT NULL,
  `keljalar_mata_pil` tinyint(1) DEFAULT NULL,
  `keljalar_mata` varchar(100) DEFAULT NULL,
  `keljalar_hidung_pil` tinyint(1) DEFAULT NULL,
  `keljalar_mulut_pil` tinyint(1) DEFAULT NULL,
  `keljalar_mulut` varchar(100) DEFAULT NULL,
  `keljalar_telinga_pil` tinyint(1) DEFAULT NULL,
  `keljalar_telinga` varchar(100) DEFAULT NULL,
  `keljalar_leher_pil` tinyint(1) DEFAULT NULL,
  `keljalar_leher` varchar(100) DEFAULT NULL,
  `keljalar_tenggorokan_pil` tinyint(1) DEFAULT NULL,
  `keljalar_bahu_pil` tinyint(1) DEFAULT NULL,
  `keljalar_bahu` varchar(100) DEFAULT NULL,
  `keljalar_tangan_pil` tinyint(1) DEFAULT NULL,
  `keljalar_tangan` varchar(100) DEFAULT NULL,
  `keljalar_dada_pil` tinyint(1) DEFAULT NULL,
  `keljalar_dada` varchar(100) DEFAULT NULL,
  `keljalar_perut_pil` tinyint(1) DEFAULT NULL,
  `keljalar_perut` varchar(100) DEFAULT NULL,
  `keljalar_pinggang_pil` tinyint(4) DEFAULT NULL,
  `keljalar_punggung_pil` tinyint(1) DEFAULT NULL,
  `keljalar_punggung` varchar(100) DEFAULT NULL,
  `keljalar_kelamin_pil` tinyint(1) DEFAULT NULL,
  `keljalar_kelamin` varchar(100) DEFAULT NULL,
  `keljalar_kaki_pil` tinyint(1) DEFAULT NULL,
  `keljalar_kaki` varchar(100) DEFAULT NULL,
  `keljalar_seltub_pil` tinyint(1) DEFAULT NULL,
  `kel_tembus_pil` tinyint(1) DEFAULT NULL,
  `kel_punkel_nil` tinyint(2) DEFAULT NULL,
  `kel_punkel_lama` enum('menit','jam','hari','minggu','bulan','tahun') DEFAULT NULL,
  `kel_kemunculan` enum('Perlahan','Berulang','Spontan/tiba-tiba') DEFAULT NULL,
  `kel_kemunculan_saat` varchar(100) DEFAULT NULL,
  `kel_penjelasan_awal` varchar(100) DEFAULT NULL,
  `kel_penjelasan_kemudian` varchar(100) DEFAULT NULL,
  `kel_penjelasan_saat` varchar(100) DEFAULT NULL,
  `riwayat_penyakit_pil` tinyint(1) DEFAULT NULL,
  `riwayatsakit_icdx_id` int(11) DEFAULT NULL,
  `riwayat_penyakit_nil` tinyint(2) DEFAULT NULL,
  `riwayat_penyakit_lama` enum('hari','minggu','bulan','tahun') DEFAULT NULL,
  `riwayat_perawatan_pil` tinyint(1) DEFAULT NULL,
  `riwayat_perawatan_waktu` date DEFAULT NULL,
  `riwayat_perawatan_tempat` enum('Rumah Sakit','Puskesmas','Rumah') DEFAULT NULL,
  `riwayat_perawatan_nil` tinyint(2) DEFAULT NULL,
  `riwayat_perawatan_lama` enum('hari','minggu','bulan','tahun') DEFAULT NULL,
  `riwayat_pengobatan_pil` tinyint(1) DEFAULT NULL,
  `riwayat_keluarga_pil` tinyint(1) DEFAULT NULL,
  `riwayatkel_icdx_id` int(11) DEFAULT NULL,
  `riwayat_lainnya_pil` tinyint(1) DEFAULT NULL,
  `riwayat_alergi_pil` tinyint(1) DEFAULT NULL,
  `alergi_obat_pil` tinyint(1) DEFAULT NULL,
  `alergi_obat_jenis` varchar(100) DEFAULT NULL,
  `alergi_makanan_pil` tinyint(1) DEFAULT NULL,
  `alergi_makanan` varchar(100) DEFAULT NULL,
  `alergi_sabun_pil` tinyint(1) DEFAULT NULL,
  `alergi_sabun` varchar(100) DEFAULT NULL,
  `alergi_udara_pil` tinyint(1) DEFAULT NULL,
  `alergi_udara` varchar(100) DEFAULT NULL,
  `alergi_debu_pil` tinyint(1) DEFAULT NULL,
  `alergi_lainnya_pil` tinyint(1) DEFAULT NULL,
  `alergi_lainnya` varchar(100) DEFAULT NULL,
  `riwayat_transfusi_pil` tinyint(1) DEFAULT NULL,
  `transfusi_wb_pil` tinyint(1) DEFAULT NULL,
  `transfusi_wb_waktu` date NOT NULL,
  `transfusi_wb_jumlah` tinyint(2) DEFAULT NULL,
  `transfusi_wb_ukuran` enum('kantong','mL/cc') DEFAULT NULL,
  `transfusi_trombosit_pil` tinyint(1) DEFAULT NULL,
  `transfusi_trombosit_waktu` date DEFAULT NULL,
  `transfusi_trombosit_jumlah` tinyint(2) DEFAULT NULL,
  `transfusi_trombosit_ukuran` enum('kantong','mL/cc') DEFAULT NULL,
  `transfusi_eritrosit_pil` tinyint(1) DEFAULT NULL,
  `transfusi_eritrosit_waktu` date DEFAULT NULL,
  `transfusi_eritrosit_jumlah` tinyint(2) DEFAULT NULL,
  `transfusi_eritrosit_ukuran` enum('kantong','mL/cc') DEFAULT NULL,
  `riwayat_imunisasi_pil` tinyint(1) DEFAULT NULL,
  `riwayat_imunisasi` varchar(100) DEFAULT NULL,
  `kebiasaan_obat_pil` tinyint(1) DEFAULT NULL,
  `kebiasaan_rokok_pil` tinyint(1) DEFAULT NULL,
  `kebiasaan_rokok_jmlh` tinyint(2) DEFAULT NULL,
  `kebiasaan_rokok_satuan` enum('batang','bungkus') DEFAULT NULL,
  `kebiasaan_rokok_nil` tinyint(2) DEFAULT NULL,
  `kebiasaan_rokok_lama` enum('hari','minggu','bulan','tahun') DEFAULT NULL,
  `kebiasaan_rokok_awal` enum('Usia < 10 tahun','Usia 10 – 20 tahun','Usia 20 – 30 tahun','Usia > 30 tahun') DEFAULT NULL,
  `kebiasaan_rokok_berhenti` enum('Usia < 10 tahun','Usia 10 – 20 tahun','Usia 20 – 30 tahun','Usia > 30 tahun') DEFAULT NULL,
  `kebiasaan_rokok_jenis` varchar(30) DEFAULT NULL,
  `kebiasaan_alkohol_pil` tinyint(1) DEFAULT NULL,
  `kebiasaan_alkohol_nil` tinyint(2) DEFAULT NULL,
  `kebiasaan_alkohol_lama` enum('hari','minggu','bulan','tahun') DEFAULT NULL,
  `kebiasaan_alkohol_awal` enum('Usia < 10 tahun','Usia 10 – 20 tahun','Usia 20 – 30 tahun','Usia > 30 tahun') DEFAULT NULL,
  `kebiasaan_alkohol_berhenti` enum('Usia < 10 tahun','Usia 10 – 20 tahun','Usia 20 – 30 tahun','Usia > 30 tahun') DEFAULT NULL,
  `kebiasaan_alkohol_jenis` varchar(30) DEFAULT NULL,
  `kebiasaan_perawatan_pil` varchar(30) DEFAULT NULL,
  `perawatan_mandi_pil` tinyint(1) DEFAULT NULL,
  `perawatan_mandi_jmlh` tinyint(2) DEFAULT NULL,
  `perawatan_mandi_lama` enum('sehari','seminggu','sebulan','setahun') DEFAULT NULL,
  `perawatan_mandi_oleh` enum('Sendiri','Dibantu') DEFAULT NULL,
  `perawatan_rambut_pil` tinyint(1) DEFAULT NULL,
  `perawatan_rambut_jmlh` tinyint(2) DEFAULT NULL,
  `perawatan_rambut_lama` enum('sehari','seminggu','sebulan','setahun') DEFAULT NULL,
  `perawatan_rambut_oleh` enum('Sendiri','Dibantu') DEFAULT NULL,
  `perawatan_kuku_pil` tinyint(1) DEFAULT NULL,
  `perawatan_kuku_jmlh` tinyint(2) DEFAULT NULL,
  `perawatan_kuku_lama` enum('sehari','seminggu','sebulan','setahun') DEFAULT NULL,
  `perawatan_kuku_oleh` enum('Sendiri','Dibantu') DEFAULT NULL,
  `perawatan_tidur_pil` tinyint(1) DEFAULT NULL,
  `perawatan_tidur_jmlh` tinyint(2) DEFAULT NULL,
  `perawatan_tidur_lama` enum('sehari','seminggu','sebulan','setahun') DEFAULT NULL,
  `perawatan_tidur_oleh` enum('Sendiri','Dibantu') DEFAULT NULL,
  `kebiasaan_nutrisi_pil` tinyint(1) DEFAULT NULL,
  `nutrisi_selera_pil` tinyint(1) DEFAULT NULL,
  `nutrisi_selera_makan` enum('Baik','Meningkat','Menurun') DEFAULT NULL,
  `makan_frekuensi_pil` tinyint(1) DEFAULT NULL,
  `makan_frekuensi` enum('3 kali sehari','< 3 kali sehari','> 3 kali sehari') DEFAULT NULL,
  `makan_pembatasan_pil` tinyint(1) DEFAULT NULL,
  `makan_pembatasan_asupan` varchar(100) DEFAULT NULL,
  `makan_menu_pil` tinyint(1) DEFAULT NULL,
  `makan_menu_pokok` varchar(50) DEFAULT NULL,
  `makan_menu_lauk` varchar(50) DEFAULT NULL,
  `makan_menu_sayur` varchar(50) DEFAULT NULL,
  `makan_menu_buah` varchar(50) DEFAULT NULL,
  `minum_jenis_pil` tinyint(1) DEFAULT NULL,
  `minum_jenis` enum('Air mineral','Air bersoda','Teh','Kopi','Jus') DEFAULT NULL,
  `minum_frekuensi_pil` tinyint(1) DEFAULT NULL,
  `minum_frekuensi` enum('8 gelas per hari','< 8 gelas per hari','> 8 gelas per hari') DEFAULT NULL,
  `minum_cara_pil` tinyint(1) DEFAULT NULL,
  `minum_cara_pemenuhan` varchar(50) DEFAULT NULL,
  `kebiasan_olahraga_pil` tinyint(1) DEFAULT NULL,
  `olahraga_jenis` varchar(100) DEFAULT NULL,
  `olahraga_frekuensi_kali` tinyint(2) DEFAULT NULL,
  `olahraga_frekuensi_lama` enum('sehari','seminggu','sebulan','setahun') DEFAULT NULL,
  `kebiasaan_kegiatan_pil` tinyint(1) DEFAULT NULL,
  `kegiatan_jenis` varchar(30) DEFAULT NULL,
  `kegiatan_frekuensi_kali` tinyint(2) DEFAULT NULL,
  `kegiatan_frekuensi_lama` enum('sehari','seminggu','sebulan','setahun') DEFAULT NULL,
  `faktor_resiko_riwayat` varchar(100) DEFAULT NULL,
  `faktor_resiko_kebiasaan` varchar(100) DEFAULT NULL,
  `psikososial_hubkel_pil` tinyint(1) DEFAULT NULL,
  `psikososial_hubkel` enum('Baik/harmonis','Cukup baik','Kurang baik','Renggang','Berjauhan','Tidak memiliki keluarga') DEFAULT NULL,
  `psikososial_temting_pil` tinyint(1) DEFAULT NULL,
  `psikososial_temting` enum('Rumah sendiri','Rumah orang tua/keluarga','Rumah kontrak','Kos-kosan') DEFAULT NULL,
  `psikososial_tingber_pil` tinyint(1) DEFAULT NULL,
  `psikososial_tingber` varchar(50) DEFAULT NULL,
  `makan_pokok_lainnya` varchar(50) DEFAULT NULL,
  `makan_lauk_lainnya` varchar(50) DEFAULT NULL,
  `makan_sayuran_lainnya` varchar(50) DEFAULT NULL,
  `makan_buah_lainnya` varchar(50) DEFAULT NULL,
  `makan_pokok_lainnya_pil` tinyint(1) DEFAULT NULL,
  `makan_lauk_lainnya_pil` tinyint(1) DEFAULT NULL,
  `makan_sayuran_lainnya_pil` tinyint(1) DEFAULT NULL,
  `makan_buah_lainnya_pil` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pasien_id` (`registrasi_id`),
  KEY `user_id` (`user_id`),
  KEY `parent_id` (`parent_id`),
  KEY `riwayatkel_icdx_id` (`riwayatkel_icdx_id`),
  KEY `FK_anamnesa_kode_icdx` (`riwayatsakit_icdx_id`),
  CONSTRAINT `FK_anamnesa_kode_icdx` FOREIGN KEY (`riwayatsakit_icdx_id`) REFERENCES `icdx` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_anamnesa_kode_icdx_2` FOREIGN KEY (`riwayatkel_icdx_id`) REFERENCES `icdx` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_anamnesa_registrasi` FOREIGN KEY (`registrasi_id`) REFERENCES `registrasi_lama` (`id`),
  CONSTRAINT `FK_anamnesa_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anamnesa`
--

LOCK TABLES `anamnesa` WRITE;
/*!40000 ALTER TABLE `anamnesa` DISABLE KEYS */;
INSERT INTO `anamnesa` VALUES (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `anamnesa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-29 10:09:34

-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: keuangan
-- ------------------------------------------------------
-- Server version	5.5.50-0+deb7u2

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `uid` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nama` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `status` char(1) COLLATE latin1_general_ci DEFAULT '0',
  `online` char(1) COLLATE latin1_general_ci DEFAULT '0',
  `lastaktif` datetime DEFAULT NULL,
  `ipaddr` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `sesino` int(11) DEFAULT NULL,
  `jenis_user` text COLLATE latin1_general_ci,
  `hak_akses` text COLLATE latin1_general_ci,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `angsuran_pinjaman`
--

DROP TABLE IF EXISTS `angsuran_pinjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `angsuran_pinjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  `nomor_bukti` text COLLATE latin1_general_ci NOT NULL,
  `uraian` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `buku_umum`
--

DROP TABLE IF EXISTS `buku_umum`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buku_umum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kas` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kredit` decimal(18,2) NOT NULL,
  `debit` decimal(18,2) NOT NULL,
  `jenis_transaksi` text COLLATE latin1_general_ci NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cashbon`
--

DROP TABLE IF EXISTS `cashbon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cashbon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` text COLLATE latin1_general_ci NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jenis_akun` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `status` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `debit`
--

DROP TABLE IF EXISTS `debit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `debit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jenis_akun` text COLLATE latin1_general_ci NOT NULL,
  `id_akun` text COLLATE latin1_general_ci NOT NULL,
  `dokumen` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_transaksi` (`id_transaksi`),
  CONSTRAINT `debit_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `detail_spj`
--

DROP TABLE IF EXISTS `detail_spj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_spj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_spj` int(11) NOT NULL,
  `item` text COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` text COLLATE latin1_general_ci NOT NULL,
  `harga` decimal(18,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `username` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `kredit`
--

DROP TABLE IF EXISTS `kredit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kredit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `jenis_akun` text COLLATE latin1_general_ci NOT NULL,
  `id_akun` int(11) NOT NULL,
  `dokumen` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mutasi`
--

DROP TABLE IF EXISTS `mutasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mutasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` text COLLATE latin1_general_ci NOT NULL,
  `jenis_mutasi` text COLLATE latin1_general_ci NOT NULL,
  `asal` int(11) NOT NULL,
  `tujuan` int(11) NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  `username` text COLLATE latin1_general_ci NOT NULL,
  `nomor_bukti` text COLLATE latin1_general_ci NOT NULL,
  `metode_transaksi` text COLLATE latin1_general_ci NOT NULL,
  `uraian` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pembayaran_pinjaman`
--

DROP TABLE IF EXISTS `pembayaran_pinjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pembayaran_pinjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_pinjaman` int(11) NOT NULL,
  `jenis_pinjaman` int(11) NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  `dokumen` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `penerimaan`
--

DROP TABLE IF EXISTS `penerimaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_kas` int(11) NOT NULL,
  `jenis_penerimaan` text COLLATE latin1_general_ci NOT NULL,
  `id_projek` int(11) NOT NULL,
  `id_pihak_luar` int(11) NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  `nomor_bukti` text COLLATE latin1_general_ci NOT NULL,
  `uraian` text COLLATE latin1_general_ci NOT NULL,
  `metode_transaksi` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_1` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_2` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_3` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_4` text COLLATE latin1_general_ci NOT NULL,
  `username` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pengeluaran`
--

DROP TABLE IF EXISTS `pengeluaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_kas` int(11) NOT NULL,
  `jenis_pengeluaran` text COLLATE latin1_general_ci NOT NULL,
  `id_projek` int(11) NOT NULL,
  `id_pihak_luar` int(11) NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  `nomor_bukti` text COLLATE latin1_general_ci NOT NULL,
  `metode_transaksi` text COLLATE latin1_general_ci NOT NULL,
  `uraian` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_1` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_2` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_3` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_4` text COLLATE latin1_general_ci NOT NULL,
  `username` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pengeluaran_spj`
--

DROP TABLE IF EXISTS `pengeluaran_spj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengeluaran_spj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_spj` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_kas` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `kode_rekening_1` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_2` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_3` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_4` text COLLATE latin1_general_ci NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  `uraian` text COLLATE latin1_general_ci NOT NULL,
  `nomor_bukti` text COLLATE latin1_general_ci NOT NULL,
  `metode_transaksi` text COLLATE latin1_general_ci NOT NULL,
  `username` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pertanggung_jawaban_spj`
--

DROP TABLE IF EXISTS `pertanggung_jawaban_spj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pertanggung_jawaban_spj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_spj` int(11) NOT NULL,
  `rincian` text COLLATE latin1_general_ci NOT NULL,
  `harga` decimal(18,2) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pinjaman`
--

DROP TABLE IF EXISTS `pinjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pinjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_pinjaman` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_kas` int(11) NOT NULL,
  `jenis_pinjaman` text COLLATE latin1_general_ci NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `id_pihak_luar` int(11) NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  `nomor_bukti` text COLLATE latin1_general_ci NOT NULL,
  `metode_transaksi` text COLLATE latin1_general_ci NOT NULL,
  `uraian` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_1` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_2` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_3` text COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_4` text COLLATE latin1_general_ci NOT NULL,
  `username` text COLLATE latin1_general_ci NOT NULL,
  `status` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pinjaman_karyawan`
--

DROP TABLE IF EXISTS `pinjaman_karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pinjaman_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` text COLLATE latin1_general_ci NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jenis_akun` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `dokumen` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pinjaman_pihak_luar`
--

DROP TABLE IF EXISTS `pinjaman_pihak_luar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pinjaman_pihak_luar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pinjaman` int(11) NOT NULL,
  `id_pihak_luar` int(11) NOT NULL,
  `jenis_akun` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `dokumen` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_bank`
--

DROP TABLE IF EXISTS `ref_bank`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_rekening` text COLLATE latin1_general_ci NOT NULL,
  `nama_bank` text COLLATE latin1_general_ci NOT NULL,
  `cabang` text COLLATE latin1_general_ci NOT NULL,
  `atas_nama` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_kas`
--

DROP TABLE IF EXISTS `ref_kas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_kas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kas` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_pegawai`
--

DROP TABLE IF EXISTS `ref_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_pegawai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` text COLLATE latin1_general_ci NOT NULL,
  `nama` text COLLATE latin1_general_ci NOT NULL,
  `kelamin` text COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `nomor_hp` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_pemda`
--

DROP TABLE IF EXISTS `ref_pemda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_pemda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemda` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_pihak_luar`
--

DROP TABLE IF EXISTS `ref_pihak_luar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_pihak_luar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_projek`
--

DROP TABLE IF EXISTS `ref_projek`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_projek` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun` text COLLATE latin1_general_ci NOT NULL,
  `nama_projek` text COLLATE latin1_general_ci NOT NULL,
  `nama_pemda` text COLLATE latin1_general_ci NOT NULL,
  `status` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_rekening`
--

DROP TABLE IF EXISTS `ref_rekening`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_rekening` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_rekening_1` char(1) COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_2` char(1) COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_3` char(2) COLLATE latin1_general_ci NOT NULL,
  `kode_rekening_4` char(3) COLLATE latin1_general_ci NOT NULL,
  `nama_rekening` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ref_tahun_anggaran`
--

DROP TABLE IF EXISTS `ref_tahun_anggaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_tahun_anggaran` (
  `tahun` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_saldo_awal` date NOT NULL,
  `status` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`tahun`)
) ENGINE=InnoDB AUTO_INCREMENT=2021 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `saldo_awal`
--

DROP TABLE IF EXISTS `saldo_awal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `saldo_awal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `id_kas` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_anggaran` int(11) NOT NULL,
  `tanggal_saldo_awal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `spj`
--

DROP TABLE IF EXISTS `spj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `jenis_akun` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_spj` text COLLATE latin1_general_ci NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tanggung_jawab_spj`
--

DROP TABLE IF EXISTS `tanggung_jawab_spj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tanggung_jawab_spj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_spj` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_terpakai` decimal(18,2) NOT NULL,
  `total_sisa` decimal(18,2) NOT NULL,
  `total_kekurangan` decimal(18,2) NOT NULL,
  `username` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `temp_detail_spj`
--

DROP TABLE IF EXISTS `temp_detail_spj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_detail_spj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_spj` int(11) NOT NULL,
  `item` text COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` text COLLATE latin1_general_ci NOT NULL,
  `harga` decimal(18,2) NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `username` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `temp_hak_akses`
--

DROP TABLE IF EXISTS `temp_hak_akses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` text COLLATE latin1_general_ci NOT NULL,
  `id_kas_bank` int(11) NOT NULL,
  `status` text COLLATE latin1_general_ci NOT NULL,
  `username` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `kategori` text COLLATE latin1_general_ci NOT NULL,
  `jenis_transaksi` text COLLATE latin1_general_ci NOT NULL,
  `jumlah` decimal(18,2) NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-14 19:32:50

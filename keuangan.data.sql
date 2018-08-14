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
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`uid`, `nama`, `password`, `status`, `online`, `lastaktif`, `ipaddr`, `sesino`, `jenis_user`, `hak_akses`) VALUES ('gobag','Gobag','827ccb0eea8a706c4c34a16891f84e7b','1','0',NULL,NULL,NULL,'operator','[{\"jenis\":\"bank\",\"id\":\"2\"},{\"jenis\":\"kas\",\"id\":\"1\"},{\"jenis\":\"kas\",\"id\":\"2\"}]'),('kszxpo','VulnWalker','a3bf5a28aef3c4d7d3d3417d7b41f023','1','1','2018-08-06 21:50:14','36.71.233.184',884364345,'admin','[{\"jenis\":\"bank\",\"id\":\"1\"},{\"jenis\":\"bank\",\"id\":\"3\"},{\"jenis\":\"bank\",\"id\":\"2\"},{\"jenis\":\"kas\",\"id\":\"1\"},{\"jenis\":\"kas\",\"id\":\"2\"},{\"jenis\":\"bank\",\"id\":\"4\"}]'),('NADIA','NADIA','827ccb0eea8a706c4c34a16891f84e7b','1','0',NULL,NULL,NULL,'operator','[{\"jenis\":\"kas\",\"id\":\"1\"}]'),('SA','Iwan Hardiwan','e10adc3949ba59abbe56e057f20f883e','1','1','2018-07-17 23:49:56','36.71.233.211',375478655,'operator','[{\"jenis\":\"bank\",\"id\":\"1\"},{\"jenis\":\"bank\",\"id\":\"3\"},{\"jenis\":\"bank\",\"id\":\"2\"},{\"jenis\":\"kas\",\"id\":\"1\"},{\"jenis\":\"kas\",\"id\":\"2\"},{\"jenis\":\"bank\",\"id\":\"4\"}]');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `angsuran_pinjaman`
--

LOCK TABLES `angsuran_pinjaman` WRITE;
/*!40000 ALTER TABLE `angsuran_pinjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `angsuran_pinjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `buku_umum`
--

LOCK TABLES `buku_umum` WRITE;
/*!40000 ALTER TABLE `buku_umum` DISABLE KEYS */;
INSERT INTO `buku_umum` (`id`, `id_kas`, `id_bank`, `tanggal`, `kredit`, `debit`, `jenis_transaksi`, `id_transaksi`) VALUES (46,0,1,'2018-01-02',500000000.00,0.00,'SALDO AWAL',18),(47,0,3,'2018-01-02',500000000.00,0.00,'SALDO AWAL',19),(48,0,2,'2018-01-02',500000000.00,0.00,'SALDO AWAL',20),(49,1,0,'2018-01-02',5000000.00,0.00,'SALDO AWAL',21),(50,2,0,'2018-01-02',0.00,0.00,'SALDO AWAL',22),(51,0,4,'2018-01-02',10000000.00,0.00,'SALDO AWAL',23),(52,1,0,'2018-07-12',0.00,1000000.00,'PENGELUARAN KAS',4),(53,1,0,'2018-07-12',0.00,1000000.00,'PENGELUARAN KAS',5),(56,0,1,'2018-07-12',0.00,500000.00,'MUTASI BANK KE KAS',5),(57,1,0,'2018-07-12',500000.00,0.00,'MUTASI BANK KE KAS',5),(58,0,2,'2018-07-12',2300000.00,0.00,'PENERIMAAN BANK',3),(59,0,1,'2018-07-16',2000000.00,0.00,'PENERIMAAN BANK',4),(60,1,0,'2018-07-16',0.00,200000.00,'MUTASI KAS KE BANK',6),(61,0,1,'2018-07-16',200000.00,0.00,'MUTASI KAS KE BANK',6),(62,0,1,'2018-07-16',0.00,200000.00,'MUTASI BANK KE KAS',7),(63,1,0,'2018-07-16',200000.00,0.00,'MUTASI BANK KE KAS',7),(64,0,1,'2018-07-16',0.00,800000.00,'PENGELUARAN BANK',6);
/*!40000 ALTER TABLE `buku_umum` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cashbon`
--

LOCK TABLES `cashbon` WRITE;
/*!40000 ALTER TABLE `cashbon` DISABLE KEYS */;
/*!40000 ALTER TABLE `cashbon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `debit`
--

LOCK TABLES `debit` WRITE;
/*!40000 ALTER TABLE `debit` DISABLE KEYS */;
/*!40000 ALTER TABLE `debit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `detail_spj`
--

LOCK TABLES `detail_spj` WRITE;
/*!40000 ALTER TABLE `detail_spj` DISABLE KEYS */;
/*!40000 ALTER TABLE `detail_spj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `kredit`
--

LOCK TABLES `kredit` WRITE;
/*!40000 ALTER TABLE `kredit` DISABLE KEYS */;
/*!40000 ALTER TABLE `kredit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `mutasi`
--

LOCK TABLES `mutasi` WRITE;
/*!40000 ALTER TABLE `mutasi` DISABLE KEYS */;
INSERT INTO `mutasi` (`id`, `tanggal`, `jenis_mutasi`, `asal`, `tujuan`, `jumlah`, `username`, `nomor_bukti`, `metode_transaksi`, `uraian`) VALUES (5,'2018-07-12','2',1,1,500000.00,'kszxpo','22323','1','23'),(6,'2018-07-16','4',1,1,200000.00,'kszxpo','99123821321','1','test'),(7,'2018-07-16','2',1,1,200000.00,'kszxpo','-','1','balik lagi');
/*!40000 ALTER TABLE `mutasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pembayaran_pinjaman`
--

LOCK TABLES `pembayaran_pinjaman` WRITE;
/*!40000 ALTER TABLE `pembayaran_pinjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `pembayaran_pinjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `penerimaan`
--

LOCK TABLES `penerimaan` WRITE;
/*!40000 ALTER TABLE `penerimaan` DISABLE KEYS */;
INSERT INTO `penerimaan` (`id`, `tanggal`, `id_bank`, `id_kas`, `jenis_penerimaan`, `id_projek`, `id_pihak_luar`, `jumlah`, `nomor_bukti`, `uraian`, `metode_transaksi`, `kode_rekening_1`, `kode_rekening_2`, `kode_rekening_3`, `kode_rekening_4`, `username`) VALUES (3,'2018-07-12',2,0,'2',1,0,2300000.00,'66','666','1','4','1','2','03','kszxpo'),(4,'2018-07-16',1,0,'2',1,0,2000000.00,'1','Biaya narasumber bimtek','1','4','1','2','01','kszxpo');
/*!40000 ALTER TABLE `penerimaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pengeluaran`
--

LOCK TABLES `pengeluaran` WRITE;
/*!40000 ALTER TABLE `pengeluaran` DISABLE KEYS */;
INSERT INTO `pengeluaran` (`id`, `tanggal`, `id_bank`, `id_kas`, `jenis_pengeluaran`, `id_projek`, `id_pihak_luar`, `jumlah`, `nomor_bukti`, `metode_transaksi`, `uraian`, `kode_rekening_1`, `kode_rekening_2`, `kode_rekening_3`, `kode_rekening_4`, `username`) VALUES (4,'2018-07-12',0,1,'1',0,0,1000000.00,'01','1','Bayar Listrik Bulan Jan','5','1','2','01','SA'),(5,'2018-07-12',0,1,'2',1,0,1000000.00,'02','1','Penagihan','5','3','2','01','SA'),(6,'2018-07-16',1,0,'2',1,0,800000.00,'-','1','Ilang','5','2','1','04','kszxpo');
/*!40000 ALTER TABLE `pengeluaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pengeluaran_spj`
--

LOCK TABLES `pengeluaran_spj` WRITE;
/*!40000 ALTER TABLE `pengeluaran_spj` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengeluaran_spj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pertanggung_jawaban_spj`
--

LOCK TABLES `pertanggung_jawaban_spj` WRITE;
/*!40000 ALTER TABLE `pertanggung_jawaban_spj` DISABLE KEYS */;
/*!40000 ALTER TABLE `pertanggung_jawaban_spj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pinjaman`
--

LOCK TABLES `pinjaman` WRITE;
/*!40000 ALTER TABLE `pinjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `pinjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pinjaman_karyawan`
--

LOCK TABLES `pinjaman_karyawan` WRITE;
/*!40000 ALTER TABLE `pinjaman_karyawan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pinjaman_karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pinjaman_pihak_luar`
--

LOCK TABLES `pinjaman_pihak_luar` WRITE;
/*!40000 ALTER TABLE `pinjaman_pihak_luar` DISABLE KEYS */;
/*!40000 ALTER TABLE `pinjaman_pihak_luar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ref_bank`
--

LOCK TABLES `ref_bank` WRITE;
/*!40000 ALTER TABLE `ref_bank` DISABLE KEYS */;
INSERT INTO `ref_bank` (`id`, `nomor_rekening`, `nama_bank`, `cabang`, `atas_nama`) VALUES (1,'01','BJB CAB SARIJADI','SARIJADI','PT PILAR WAHANA ARTHA'),(2,'02','BJB CAB EQUITAS','EQUITAS','PT PILAR WAHANA ARTHA'),(3,'03','BJB CAB SUCI','SUCI','CV EXACON GUNA BANGSA'),(4,'04','BRI CAB CITAMIANG','CITAMIANG','HARDIWAN');
/*!40000 ALTER TABLE `ref_bank` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ref_kas`
--

LOCK TABLES `ref_kas` WRITE;
/*!40000 ALTER TABLE `ref_kas` DISABLE KEYS */;
INSERT INTO `ref_kas` (`id`, `nama_kas`) VALUES (1,'KAS KANTOR BANDUNG');
/*!40000 ALTER TABLE `ref_kas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ref_pegawai`
--

LOCK TABLES `ref_pegawai` WRITE;
/*!40000 ALTER TABLE `ref_pegawai` DISABLE KEYS */;
INSERT INTO `ref_pegawai` (`id`, `nik`, `nama`, `kelamin`, `alamat`, `nomor_hp`) VALUES (1,'001','Dzakir Harist Abdullah','1','Kp. Cibeber Hilir RT 02/02, Batujajar, Bandung Barat','081223744803');
/*!40000 ALTER TABLE `ref_pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ref_pemda`
--

LOCK TABLES `ref_pemda` WRITE;
/*!40000 ALTER TABLE `ref_pemda` DISABLE KEYS */;
INSERT INTO `ref_pemda` (`id`, `nama_pemda`) VALUES (1,'Bandung Barat'),(2,'Kota Bandung'),(3,'Kabupaten Serang'),(4,'Kota Serang'),(5,'Kabupaten Pandeglang'),(6,'Karawang'),(8,'Tasik Malaya'),(9,'Jawa Barat'),(10,'Garut'),(11,'Bogor'),(12,'Cirebon'),(13,'Subang'),(14,'Sukabumi');
/*!40000 ALTER TABLE `ref_pemda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ref_pihak_luar`
--

LOCK TABLES `ref_pihak_luar` WRITE;
/*!40000 ALTER TABLE `ref_pihak_luar` DISABLE KEYS */;
INSERT INTO `ref_pihak_luar` (`id`, `nama`) VALUES (1,'Dealer Honda'),(2,'Tukang Galon'),(3,'Tukang Koran');
/*!40000 ALTER TABLE `ref_pihak_luar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ref_projek`
--

LOCK TABLES `ref_projek` WRITE;
/*!40000 ALTER TABLE `ref_projek` DISABLE KEYS */;
INSERT INTO `ref_projek` (`id`, `tahun`, `nama_projek`, `nama_pemda`, `status`) VALUES (1,'2018','Pengembangan Atisisbada','1','1');
/*!40000 ALTER TABLE `ref_projek` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ref_rekening`
--

LOCK TABLES `ref_rekening` WRITE;
/*!40000 ALTER TABLE `ref_rekening` DISABLE KEYS */;
INSERT INTO `ref_rekening` (`id`, `kode_rekening_1`, `kode_rekening_2`, `kode_rekening_3`, `kode_rekening_4`, `nama_rekening`) VALUES (1,'4','0','0','00','Penerimaan'),(2,'4','1','0','00','Penerimaan Rutin'),(3,'4','1','1','00','Penerimaan Bulanan'),(4,'4','1','1','01','Penerimaan Jasa Sewa Penyimpanan Server'),(5,'4','1','2','00','Penerimaan Sewaktu'),(6,'4','1','2','01','Penerimaan Honor Narasumber Bimtek'),(7,'4','1','2','02','Penerimaan Pendaftaran Peserta Bimtek'),(8,'4','1','2','03','Penerimaan Jasa Intallasi Server'),(9,'4','1','2','04','Penerimaan Jasa Migrasi Database'),(10,'4','2','0','00','Penerimaan Projek'),(11,'4','2','1','00','Penerimaan Projek Pengembangan aplikasi'),(12,'4','2','1','01','Penerimaan Projek Pengembangan aplikasi ATISISBADA'),(13,'4','2','1','02','Penerimaan Projek Pengembangan aplikasi SIAP'),(14,'4','2','1','03','Penerimaan Projek Pengembangan aplikasi SPD'),(15,'4','2','1','04','Penerimaan Projek Pengembangan aplikasi Keuangan'),(16,'4','2','1','05','Penerimaan Projek Pengembangan aplikasi Lainnya'),(17,'4','2','2','00','Penerimaan Projek Pengadaan Barang'),(18,'4','2','2','01','Penerimaan Projek Pengadaan Barang Server'),(19,'4','2','2','02','Penerimaan Projek Pengadaan Barang Printer Barcode'),(20,'4','2','2','03','Penerimaan Projek Pengadaan Barang Scaner Barcode'),(21,'4','2','2','04','Penerimaan Projek Pengadaan Barang Lainnya'),(22,'4','2','3','00','Penerimaan Projek Pengadaan Label'),(23,'4','2','3','01','Penerimaan Projek Pengadaan Label Barcode Barang'),(24,'4','2','3','02','Penerimaan Projek Pengadaan Label dan Print Barcode Barang'),(25,'4','3','0','00','Penerimaan Lain-lain'),(26,'4','3','1','00','Penerimaan Fee Bendera'),(27,'4','3','1','01','Penerimaan Fee Bendera PT. PILAR'),(28,'4','3','1','02','Penerimaan Fee Bendera CV. EXACON'),(29,'5','0','0','00','Pengeluaran'),(30,'5','1','0','00','Pengeluaran Rutin'),(31,'5','1','1','00','Pengeluaran Gaji'),(32,'5','1','1','01','Biaya Gaji Tenaga Kerja'),(33,'5','1','1','02','Biaya Gaji Tenaga Kerja Tidak Tetap'),(34,'5','1','2','00','Pengeluaran Operasional Kantor '),(35,'5','1','2','01','Biaya Listrik'),(36,'5','1','2','02','Biaya Telp/Indihome'),(37,'5','1','2','03','Biaya Air/PDAM'),(38,'5','1','2','04','Biaya Makan dan Minum'),(39,'5','1','2','05','Biaya Kebersihan Kantor'),(40,'5','2','0','00','Pengeluaran Sewaktu'),(41,'5','2','1','00','Pengeluaran Pemeliharaan'),(42,'5','2','1','01','Biaya Pemeliharaan Kantor'),(43,'5','2','1','02','Biaya Pemeliharaan Peralatan Kantor'),(44,'5','2','1','03','Biaya Pembelian Tinta/Toner Printer'),(45,'5','2','1','04','Biaya Pemeliharaan Lainnya'),(46,'5','2','2','00','Pengeluaran Pengadaan Peralatan'),(47,'5','2','2','01','Biaya Pengadaan Komputer/Printer'),(48,'5','2','2','02','Biaya Pengadaan Peralatan Jaringan/Internet'),(49,'5','2','2','03','Biaya Pengadaan Meubelair'),(50,'5','3','0','00','Pengeluaran Projek'),(51,'5','3','1','00','Pengeluaran Operasional'),(52,'5','3','1','01','Biaya Bensin/Parkir'),(53,'5','3','1','02','Honor Tenaga Lepas'),(54,'5','3','2','00','Pengeluaran Administrasi'),(55,'5','3','2','01','Biaya Berkas Penagihan'),(56,'5','3','2','02','Biaya Pelaporan Projek'),(57,'5','3','3','00','Pengeluaran Marketing'),(58,'5','3','3','01','Biaya Operasional Marketing'),(59,'5','3','3','02','Biaya Fee Marketing');
/*!40000 ALTER TABLE `ref_rekening` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `ref_tahun_anggaran`
--

LOCK TABLES `ref_tahun_anggaran` WRITE;
/*!40000 ALTER TABLE `ref_tahun_anggaran` DISABLE KEYS */;
INSERT INTO `ref_tahun_anggaran` (`tahun`, `tanggal_saldo_awal`, `status`) VALUES (2018,'2018-01-02','AKTIF'),(2019,'2019-01-02',''),(2020,'2020-01-02','');
/*!40000 ALTER TABLE `ref_tahun_anggaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `saldo_awal`
--

LOCK TABLES `saldo_awal` WRITE;
/*!40000 ALTER TABLE `saldo_awal` DISABLE KEYS */;
INSERT INTO `saldo_awal` (`id`, `tanggal`, `id_kas`, `id_bank`, `jumlah`) VALUES (18,'2018-01-02',0,1,500000000.00),(19,'2018-01-02',0,3,500000000.00),(20,'2018-01-02',0,2,500000000.00),(21,'2018-01-02',1,0,5000000.00),(22,'2018-01-02',2,0,0.00),(23,'2018-01-02',0,4,10000000.00);
/*!40000 ALTER TABLE `saldo_awal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` (`id`, `tahun_anggaran`, `tanggal_saldo_awal`) VALUES (1,2018,'2018-01-02');
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `spj`
--

LOCK TABLES `spj` WRITE;
/*!40000 ALTER TABLE `spj` DISABLE KEYS */;
/*!40000 ALTER TABLE `spj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tanggung_jawab_spj`
--

LOCK TABLES `tanggung_jawab_spj` WRITE;
/*!40000 ALTER TABLE `tanggung_jawab_spj` DISABLE KEYS */;
/*!40000 ALTER TABLE `tanggung_jawab_spj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `temp_detail_spj`
--

LOCK TABLES `temp_detail_spj` WRITE;
/*!40000 ALTER TABLE `temp_detail_spj` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_detail_spj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `temp_hak_akses`
--

LOCK TABLES `temp_hak_akses` WRITE;
/*!40000 ALTER TABLE `temp_hak_akses` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_hak_akses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-14 19:32:49

-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 06:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kanwil`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `idAgenda` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Isi` text NOT NULL,
  `Status` varchar(30) NOT NULL,
  `Cover` varchar(255) NOT NULL,
  `tgl_kegiatan` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `Penulis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`idAgenda`, `Judul`, `Isi`, `Status`, `Cover`, `tgl_kegiatan`, `created_at`, `updated_at`, `Penulis`) VALUES
(1, 'Halal bi halal', '<p>setelah menyambut hari raya idul fitri, ada baiknya kita melakukan halal bi halal di kantor</p>', 'Diarsipkan', '1653468964_8968dbfd938ed2cb9507.png', '2022-05-30 00:00:00', '2022-05-25 03:00:01', '2022-05-26 05:03:30', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `Isi` text NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `Judul`, `Kategori`, `Isi`, `Penulis`, `Gambar`, `Status`, `created_at`, `updated_at`) VALUES
(30, 'Sasuke Uchiha sudah update', 'artikel', '<div>\r\n<div>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas amet a</div>\r\n<div>ssumenda sint dicta odit reprehenderit vero quidem nemo rem eos nobis velit aspe</div>\r\n<div>&nbsp;</div>\r\n<div>riores animi esse delectus illo sapiente aut maxime</div>\r\n<div>, laudantium consequatur placeat deserunt? Commodi animi minima fugiat iure autem.</div>\r\n<div>&nbsp;</div>\r\n<div>\r\n<div>riores animi esse delectus illo sapiente aut maxime</div>\r\n<div>, laudantium consequatur placeat deserunt? Commodi animi minima fugiat iure autem.</div>\r\n</div>\r\n</div>', 'Erda Ulhaq Dani', '1649661941_15ddffce4147cdeccfa2.jpg', 'Publik', '2022-04-07', '2022-04-14'),
(31, 'Naruto 2 Update Update', 'berita', '<p>awdhadhoawdoajdiojwaod dnwdaiodaiowdiwdiao dijawidjaidjwiajdwai&nbsp;</p>\r\n<p>dwadawdad dwaidjaiojdiowadadbehfbefiufeff hwahdawhdahdahwdwa</p>\r\n<p>dwadawdad dwaidjaiojdiowadadbehfbefiufeff hwahdawhdahdahwdwa</p>\r\n<p>dwadawdad dwaidjaiojdiowadadbehfbefiufeff hwahdawhdahdahwdwa</p>', 'Erda dani', '1649986633_036ecc2f388ebc14577f.jpg', 'Publik', '2022-04-07', '2022-04-14'),
(32, 'Naruto 3', 'artikel', '<p>jdowjdoahdowh dwhdhaohdwhadodhaw hdwahdoahwdohaodha</p>', 'Erda', '1649392839_956d7d052b75ce4a039d.jpg', 'Publik', '2022-04-07', '2022-04-08'),
(33, 'Naruto 4', 'artikel', '<p>wbdaudwha dawuihdiuahdawh jhhohadwhaneegagwar ar</p>', 'Erda', '1649648707_0e64ca58170b9ecfa7b5.jpg', 'Publik', '2022-04-07', '2022-04-10'),
(34, 'hahahaha', 'berita', '<p>ndwadiahdoihaoih dawdwadada idawhdiahiowhoai awhdaihdahdawihdah</p>\r\n<p>diawhdiahdiahdha iwdiahdiahdiawhiwh dwihadiahdihaihiadhwadiadhwahdd&nbsp;</p>\r\n<p>&nbsp;</p>', 'Erda', '1649648045_e5ea1493975a10d1f37e.jpg', 'Publik', '2022-04-08', '2022-04-10'),
(35, 'Narutoooooo', 'artikel', '<p>dwmdawidai jdjwiajdioajdiowjaio djwiajdoaijdiowajd</p>', 'Erda', '1649470810_b766778d8f6aff9671ef.jpg', 'Publik', '2022-04-08', '2022-04-08'),
(54, 'Naruto Artikel edit', 'artikel', '<p>dwmdawidai jdjwiajdioajdiowjaio djwiajdoaijdiowajd</p>', 'Erda Ulhaq dani', '1649457061_acaa26f2b194c039917b.jpg', 'Diarsipkan', '2022-04-08', '2022-04-08'),
(56, 'Coba gambar icon', 'artikel', '<p>erda aduwhaawpa dwiadadawhdoa dwdhadhahdwao&nbsp;</p>\r\n<p>dwidahdwhadoahwd dwidhaohdwa&nbsp;</p>\r\n<p>dwndandwnan ndwnada&nbsp;</p>\r\n<p>wduaduahwdhadhadhawh dwhadhadhwadwadaw</p>', 'Erda Ulhaq Dani', '1649471762_23e0017416e116d151d3.png', 'Publik', '2022-04-08', '2022-04-08'),
(57, 'Berita Naruto', 'berita', '<p>bdawiwdgaiudaiuhdwa dawhiudhwiahdiah wahdhaidhwaud</p>', 'Erda Ulhaq Dani', '1649649492_d141a54d9a4914debaf2.jpg', 'Publik', '2022-04-10', '2022-04-10'),
(58, 'Peristiwa 1', 'peristiwa', '<p>Peristiwa 1</p>', 'reggi', '1649650886_2cbed5f84e9909cf7077.jpg', 'Publik', '2022-04-10', '2022-04-10'),
(59, 'Peristiwa 2', 'peristiwa', '<p>Peristiwa 2</p>', 'reggi', '1649650930_917a8681b7050e91e2a9.jpg', 'Publik', '2022-04-10', '2022-04-10'),
(60, 'Peristiwa 3', 'peristiwa', '<p>Peristiwa 3</p>', 'Adit ', '1649650983_8c06fb6e75d8fa42e681.jpg', 'Publik', '2022-04-10', '2022-04-10'),
(61, 'Peristiwa 4', 'peristiwa', '<p>Ini adalah isi dari Peristiwa 4</p>', 'Alif Muhsin', '1649652672_9a497ff816ebb71b3936.jpg', 'Publik', '2022-04-10', '2022-04-10'),
(62, 'Peristiwa 5', 'peristiwa', '<p>Ini adalah isi dari Kilas Peristiwa 5</p>', 'Alif Muhsin 2', '1649652779_beeea091a9004512c216.jpg', 'Publik', '2022-04-10', '2022-04-10'),
(63, 'Contoh Berita', 'berita', '<p>ini adalah isi dari Contoh Berita</p>', 'Erda Ulhaq', '1649661400_7750391ee6407fac6790.jpg', 'Publik', '2022-04-11', '2022-04-11'),
(64, 'Contoh Berita', 'Berita', '<p>Ini Isi COntoh BErita</p>', 'Erda', '1649917540_aa3bd13dba5c15b8cd0c.jpg', 'Publik', '2022-04-14', '2022-04-14');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `tglLahir` date NOT NULL,
  `Email` varchar(255) NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `Pekerjaan` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `idLevel` int(11) NOT NULL DEFAULT 5,
  `StatusAkun` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `NIK`, `Nama`, `Username`, `tglLahir`, `Email`, `noHP`, `jenisKelamin`, `Pekerjaan`, `Password`, `created_at`, `updated_at`, `idLevel`, `StatusAkun`) VALUES
(1, '6402060106010021', 'Navi', 'Navi', '0000-00-00', 'navi@gmail.com', '085794214986', '', 'Karyawan', '$2y$10$CYIE4lgLOsqxcBYgdujDLuza13tMAyX4gL7e8HY3qselFzT8MI7ji', '2022-03-26 02:40:02', '2022-06-07 00:41:50', 5, 'Aktif'),
(6, '1122334455', 'putri nur', '', '0000-00-00', 'erda@gmail.com', '', 'laki-laki', 'mahasiswa', '$2y$10$W0u3pcs1BuDtqLQtLk5Q7ekRoA0PynP4hsC/8/rl.Ik6yvj0H6sYK', '2022-04-10 14:03:36', '2022-04-10 14:03:36', 5, ''),
(7, '6701191011', 'Erda', '', '0000-00-00', 'erdaulhaqdani@gmail.com', '', '', 'mahasiswa', '$2y$10$2/O2RemAlMO6DPHUfU/8yOh8f9BynrJunfiXZLIj0tFx25SgaA3QG', '2022-04-13 21:46:32', '2022-04-13 21:46:32', 5, ''),
(8, '6701191122', 'Aditia Dika', '', '0000-00-00', 'adit@gmail.com', '', '', 'mahasiswa', '$2y$10$qE0uKYrWfpz6bEI.zjfw6eSbTzQXwT.v5K.5Db6ic2wQBLMCVhEoO', '2022-04-14 01:32:32', '2022-04-14 01:32:32', 5, ''),
(9, '670119123', 'Nadila Rahmatika', '', '0000-00-00', 'nadila@gmail.com', '', '', 'Mahasiswa', '$2y$10$3w/7bypYLyowceSnTyQnVeTYVJrgghVNJyztC9sJrqRud2tZoO8ma', '2022-04-14 20:44:49', '2022-04-14 20:44:49', 5, ''),
(10, '6402060106010007', 'Reggi Fachri ', '', '0000-00-00', 'rfachri.exe@gmail.com', '085794214986', 'Laki-laki', 'Mahasiswa', '$2y$10$6B/dEKkjPHavACPv9PdpKOlB8tTDRdaA.yYJOL8/oKMLUS0y7GCRK', '2022-05-24 19:31:19', '2022-05-24 19:33:50', 5, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idJabatan` int(11) NOT NULL,
  `posisiJabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`) VALUES
(1, 'Pelayanan Lelang'),
(2, 'Pengelolaan Kekayaan Negara'),
(3, 'Pelayanan Penilaian'),
(4, 'Piutang Negara'),
(5, 'Umum');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `idLaporan` int(11) NOT NULL,
  `file_laporan` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `idTugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`idLaporan`, `file_laporan`, `deskripsi`, `created_at`, `updated_at`, `idTugas`) VALUES
(1, '1652980044_f035d6cc225d4035f349.png', 'tes', '2022-05-19 12:07:24', '2022-05-19 12:07:24', 3);

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `idLevel` int(11) NOT NULL,
  `Level` varchar(30) NOT NULL,
  `Kelompok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`idLevel`, `Level`, `Kelompok`) VALUES
(1, 'Admin LP', 'LP'),
(2, 'Admin JKasi', 'APT'),
(3, 'Kepala Kantor', 'APT'),
(4, 'Petugas KI', 'APT'),
(5, 'Customer', 'Customer'),
(6, 'Supervisor', 'APT'),
(7, 'PetugasLoket', 'APT');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_request`
--

CREATE TABLE `meeting_request` (
  `idMeeting` int(11) NOT NULL,
  `Tanggal_kunjungan` date NOT NULL,
  `Waktu_kunjungan` varchar(255) NOT NULL,
  `Kantor` varchar(255) NOT NULL,
  `Bentuk_layanan` varchar(50) NOT NULL,
  `Perihal` text NOT NULL,
  `Telepon` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `idCustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting_request`
--

INSERT INTO `meeting_request` (`idMeeting`, `Tanggal_kunjungan`, `Waktu_kunjungan`, `Kantor`, `Bentuk_layanan`, `Perihal`, `Telepon`, `Status`, `idKategori`, `created_at`, `updated_at`, `idCustomer`) VALUES
(29, '2022-04-14', '08:00', 'KPKNL Bandung', 'Daring', 'Lelang', 2147483647, 'Selesai diproses', 1, '2022-04-14 01:11:17', '2022-06-01 00:02:17', 1),
(31, '2022-04-14', '08:30', 'KPKNL Bandung', 'Daring', 'Pengelolaan Kekayaan Negara', 2147483647, 'Sedang diproses', 2, '2022-04-14 01:37:08', '2022-04-14 01:39:33', 8),
(32, '2022-04-15', '09:30', 'DJKN Jabar', 'Daring', 'Pengelolaan Kekayaan Negara', 2147483647, 'Belum diproses', 2, '2022-04-14 20:46:19', '2022-04-14 20:48:21', 9),
(33, '2022-04-15', '08:15', 'KPKNL Bandung', 'Luring', 'lelang', 2147483647, 'Belum diproses', 1, '2022-04-14 20:48:59', '2022-04-14 20:48:59', 9),
(34, '2022-04-15', '08:00', 'KPKNL Bandung', 'Daring', 'Pengelolaan Kekayaan Negara', 2147483647, 'Belum diproses', 2, '2022-04-14 20:50:06', '2022-04-14 20:50:06', 9),
(35, '2022-06-02', '09:00', 'DJKN Jabar', 'Luring', 'Penilaian aset properti', 2147483647, 'Belum diproses', 3, '2022-05-31 23:51:08', '2022-05-31 23:51:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menginput`
--

CREATE TABLE `menginput` (
  `idInput` int(11) NOT NULL,
  `tglInput` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idCustomer` int(11) NOT NULL,
  `idTiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menjabat`
--

CREATE TABLE `menjabat` (
  `idMenjabat` int(11) NOT NULL,
  `tglMulai` date NOT NULL,
  `tglSelesai` date NOT NULL,
  `idJabatan` int(11) NOT NULL,
  `NIP` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `idOperator` int(11) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `jenisOperator` varchar(30) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noTelp` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `tglLahir` date NOT NULL,
  `password` varchar(50) NOT NULL,
  `idMenjabat` int(11) NOT NULL,
  `idUnit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `nip`, `nama`, `email`, `noTelp`, `alamat`, `jenisKelamin`, `tglLahir`, `password`, `idMenjabat`, `idUnit`) VALUES
(4, '6701193101', 'Aditia', 'aditia@gmail.com', '08221778912', 'bdg', 'Laki-laki', '2022-04-20', '123', 1, 6),
(5, '6701194134', 'Reggi', 'reggi@gmail.com', '1231415123', 'bdg', 'Laki-laki', '2022-04-20', '123', 2, 5),
(6, '6701191011', 'Erda', 'erda@gmail.com', '0812301823', 'bdg', 'Lak-laki', '2022-04-21', '123', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan_online`
--

CREATE TABLE `pengaduan_online` (
  `idPengaduan` int(11) NOT NULL,
  `Judul` varchar(30) NOT NULL,
  `Isi` text NOT NULL,
  `idKategori` int(11) NOT NULL,
  `Lampiran` varchar(255) NOT NULL,
  `Status` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `Rating` int(11) NOT NULL,
  `Ulasan` varchar(255) NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan_online`
--

INSERT INTO `pengaduan_online` (`idPengaduan`, `Judul`, `Isi`, `idKategori`, `Lampiran`, `Status`, `created_at`, `updated_at`, `Rating`, `Ulasan`, `idCustomer`, `idPetugas`) VALUES
(1, 'Properti Navi', 'Permohonan untuk menilai properti milik Navi', 3, '1654580641_cf1b72c66959914c978b.jpeg', 'Eskalasi', '2022-06-07 00:44:01', '2022-06-07 01:25:42', 0, '', 1, 16),
(2, 'test1', 'test1', 2, 'user.png', 'Belum diproses', '2022-06-07 21:05:36', '2022-06-07 21:05:36', 0, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `idTugas` int(11) NOT NULL,
  `noPenugasan` varchar(255) NOT NULL,
  `namaTugas` varchar(255) NOT NULL,
  `detailTugas` varchar(255) NOT NULL,
  `tenggatWaktu` datetime NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `idPegawai` int(11) NOT NULL,
  `pic` int(11) NOT NULL,
  `idTim` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penugasan`
--

INSERT INTO `penugasan` (`idTugas`, `noPenugasan`, `namaTugas`, `detailTugas`, `tenggatWaktu`, `lampiran`, `status`, `catatan`, `created_at`, `updated_at`, `idPegawai`, `pic`, `idTim`) VALUES
(3, 'test1', 'tes', 'tes', '2022-05-21 00:00:00', '-', 'Selesai', '', '2022-05-19 11:47:17', '2022-05-19 12:07:24', 4, 6, 0),
(4, 'test2', 'tes', 'tes', '2022-05-20 00:00:00', '-', 'Dibatalkan', '', '2022-05-19 11:56:16', '2022-05-19 11:57:07', 4, 5, 0),
(5, 'test3', 'tes', 'tes', '2022-05-21 00:00:00', '-', 'Menunggu', '', '2022-05-19 11:56:41', '2022-05-19 11:56:41', 4, 6, 0),
(6, 'test4', 'tes', 'tes', '2022-05-20 00:00:00', '-', 'Menunggu', '', '2022-05-19 11:57:00', '2022-05-19 11:57:00', 4, 0, 0),
(7, 'test5', 'tes', 'tes', '2022-05-21 00:00:00', '-', 'Proses', '', '2022-05-20 03:08:09', '2022-05-20 03:08:32', 4, 6, 0),
(8, 'test7', 'tes2', 's', '2022-05-23 00:00:00', '-', 'Proses', '', '2022-05-22 13:02:02', '2022-05-31 07:55:40', 4, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_info`
--

CREATE TABLE `permohonan_info` (
  `idPermohonan` int(11) NOT NULL,
  `Isi` text NOT NULL,
  `Lampiran` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permohonan_info`
--

INSERT INTO `permohonan_info` (`idPermohonan`, `Isi`, `Lampiran`, `updated_at`) VALUES
(1, '<p>&nbsp;</p>\r\n<ul>\r\n<li>\r\n<p>1. Pemohon menyampaikan permintaan Informasi Publik kepada Perangkat PPID DJKN melalui:</p>\r\n<ul>\r\n<li><strong>Surat</strong>&nbsp;: Sesuai alamat Perangkat PPID DJKN</li>\r\n<li>PPID Tk. I Direktur Hukum dan Humas, Kantor Pusat DJKN</li>\r\n<li>PPID Tk. II Kepala Kanwil DJKN seluruh Indonesia dan BLU Lembaga Manajemen Aset Negara (LMAN)</li>\r\n<li>PPID Tk. III Kepala KPKNL seluruh Indonesia</li>\r\n<li><strong>Surat Elektronik (email)&nbsp;</strong>: ppid.djkn@kemenkeu.go.id</li>\r\n<li><strong>Datang Langsung&nbsp;</strong>: melalui walk-in Area Pelayanan Terpadu (APT) Perangkat PPID DJKN</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p>2. Dalam mengajukan permintaan Informasi Publik, Pemohon diwajibkan mengisi Formulir Registrasi Permintaan Informasi Publik dan melengkapi identitas yang sah. Dalam hal Pemohon adalah perseorangan diwajibkan untuk menyertakan fotokopi Kartu Tanda Penduduk (KTP) yang dapat membuktikan sebagai Warga Negara Indonesia (WNI). Apabila Pemohon adalah Badan Hukum diwajibkan menyertakan fotokopi Anggaran Dasar/Akta Pendirian yang telah disahkan oleh Kementerian Hukum dan HAM;</p>\r\n</li>\r\n<li>\r\n<p>3. Petugas Informasi pada Perangkat PPID DJKN melakukan verifikasi atas berkas kelengkapan permintaan Informasi Publik. Setelah dinyatakan lengkap, Petugas Informasi pada Perangkat PPID DJKN memberikan Nomor Registrasi Pendaftaran Informasi Publik dan memberikan fotokopi berkas kelengkapan permohonan Informasi Publik kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>4. Atas permintaan Informasi Publik yang diterima dan dinyatakan lengkap, Perangkat PPID memproses permintaan Informasi Publik dengan memberikan tanggapan tertulis kepada Pemohon dalam waktu 10 (sepuluh) hari kerja. Dalam hal Perangkat PPID DJKN membutuhkan tambahan waktu dalam memberikan tanggapan permintaan Informasi Publik, Perangkat PPID DJKN dapat melakukan perpanjangan waktu hingga 7 (tujuh) hari kerja dengan menyampaikan surat pemberitahuan perpanjangan tanggapan permintaan Informasi Publik kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>5. Pemohon Informasi Publik menerima pemberitahuan tertulis dan tanggapan dari Perangkat PPID DJKN paling lambat 10 (sepuluh) hari kerja sejak diterimanya permohonan dan dapat diperpanjang 7 (tujuh) hari kerja.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">Prosedur Permohonan Keberatan dan Sengketa Informasi Publik</h1>\r\n<ul>\r\n<li>\r\n<p>1. Pemohon menerima penjelasan tertulis atas permintaan Informasi Publik yang dimohonkan. Pemohon dapat mengajukan permohonan Keberatan Informasi Publik selambatnya 30 (tiga puluh) hari kerja setelah tanggapan tertulis Perangakat PPID;</p>\r\n</li>\r\n<li>\r\n<p>2. Pemohon dalam mengajukan permohonan Keberatan Informasi Publik diwajibkan mengisi Formulir Keberatan Informasi Publik dan memenuhi persyaratan (fotokopi KTP/Surat Kuasa/Bukti Pengesahan Badan Hukum) yang ditujukan kepada Atasan PPID Tk. I dalam hal ini adalah Direktur Jenderal Kekayaan Negara pada Kantor Pusat DJKN;</p>\r\n</li>\r\n<li>\r\n<p>3. Pemohon menyampaikan permohonan Keberatan Informasi Publik kepada Perangkat PPID DJKN melalui:</p>\r\n<ul>\r\n<li><strong>Surat</strong>&nbsp;: Sesuai alamat Perangkat PPID DJKN</li>\r\n<li>PPID Tk. I Direktur Hukum dan Humas, Kantor Pusat DJKN</li>\r\n<li>PPID Tk. II Kepala Kanwil DJKN seluruh Indonesia dan BLU Lembaga Manajemen Aset Negara (LMAN)</li>\r\n<li>PPID Tk. III Kepala KPKNL seluruh Indonesia</li>\r\n<li><strong>Surat Elektronik (email)&nbsp;</strong>: ppid.djkn@kemenkeu.go.id</li>\r\n<li><strong>Datang Langsung&nbsp;</strong>: melalui walk-in Area Pelayanan Terpadu (APT) Perangkat PPID DJKN</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p>4. Petugas Informasi pada Perangkat PPID DJKN melakukan verifikasi atas berkas kelengkapan permohonan Keberatan Informasi Publik. Setelah dinyatakan lengkap, Petugas Informasi pada Perangkat PPID DJKN memberikan Nomor Registrasi Pendaftaran Keberatan Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>5. Atasan PPID Tk. I DJKN cq. Direktur Jenderal Kekayaan Negara dalam waktu 30 (tiga puluh) hari kerja sejak permohonan Keberatan InformasiPublik diterima oleh petugas informasi, memiliki kewajiban untuk memberikan tanggapan tertulis kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>6. Dalam hal Pemohon tidak puas atas tanggapan Keberatan Informasi Publik yang diterbitkan oleh Atasan PPID Tk. I, Pemohon dapat mengajukan Sengketa Informasi Publik kepada Komisi Informasi Pusat.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">Prosedur Permohonan Penyelesaian Sengketa Informasi Publik<br />(Sesuai Pasal 37 dan Pasal 38 UU Nomor 14 Tahun)</h1>\r\n<ul>\r\n<li>\r\n<p>1. Upaya penyelesaian Sengketa Informasi Publik diajukan kepada Komisi Informasi apabila tanggapan Atasan PPID Tingkat I DJKN dalam proses Keberatan Informasi Publik tidak memuaskan Pemohon Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>2. Upaya penyelesaian Sengketa Informasi Publik diajukan dalam kurun waktu paling lambat 14 (empat belas) hari kerja setelah diterimanya tanggapan tertulis dari Atasan PPID Tingkat I DJKN;</p>\r\n</li>\r\n<li>\r\n<p>3. Komisi Informasi harus memulai mengupayakan penyelesaian Sengketa Informasi Publik melalui Mediasi dan/atau Ajudikasi Nonlitigasi paling lambat 14 (empat belas) hari kerja setelah menerima permohonan penyelesaian Sengketa Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>4. Proses penyelesaian Sengketa Informasi Publik paling lambat dapat diselesaikan dalam waktu 100 (seratus) hari kerja.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">WAKTU LAYANAN</h1>\r\n<p>Jam Layanan Informasi Publik pada Perangkat PPID DJKN<br />Senin s.d. Jumat - 08.00 s.d. 15.00 WIB<br /><br />Waktu Istirahat Layanan Informasi Publik pada Perangkat PPID DJKN<br />Senin s.d. Kamis - 12.15 s.d. 13.00 WIB<br />Jumat - 11.30 s.d. 13.15 WIB</p>\r\n<h1 class=\"title\">BIAYA DAN TARIF LAYANAN</h1>\r\n<p>Layanan Informasi Publik di lingkungan Direktorat Jenderal Kekayaan Negara (DJKN) Kementerian Keuangan tidak dipungut biaya, kecuali untuk informasi yang telah ditentukan biayanya sesuai dengan peraturan mengenai Penerimaan Negara Bukan Pajak (PNBP).<br />Adapun untuk biaya penggandaan atau perekeman yang timbul dari Permintaan Informasi Publik ditanggung dan menjadi tanggung jawab Pemohon Informasi Publik.</p>\r\n<h1 class=\"title\">Formulir Permohonan Informasi Publik Pada Perangkat PPID DJKN</h1>\r\n<h1 class=\"title\">Formulir Keberatan Informasi Publik Pada Perangkat PPID DJKN</h1>', 'lampiran', '2022-04-14 20:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `petugas_apt`
--

CREATE TABLE `petugas_apt` (
  `idPetugas` int(11) NOT NULL,
  `NIP` varchar(30) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Kantor` varchar(255) NOT NULL,
  `idLevel` int(11) NOT NULL,
  `Unit` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas_apt`
--

INSERT INTO `petugas_apt` (`idPetugas`, `NIP`, `Nama`, `Email`, `Kantor`, `idLevel`, `Unit`, `Password`, `created_at`, `updated_at`) VALUES
(1, '010101', 'Dummy', 'dummy', 'dummy', 1, 5, 'dummy', '2022-06-07 12:06:03', '2022-06-07 12:06:03'),
(5, '6701191011', 'Dani Hipya', 'dani@gmail.com', 'KPKNL Bandung', 1, 1, '$2y$10$CkFd7P2G3x/pmH6tG//dKeK5/SXAUJOsEewmZReFxplmmHtos96.m', '2022-04-14 06:15:08', '2022-04-13 23:56:49'),
(15, '6701194134', 'Admin', 'admin@kemenkeu.go.id', 'DJKN Jabar', 1, 5, '$2y$10$5buxNwUfqVQbCp3ZvFlZK.NmYQIpjoNhQPZKHDc7CSB9R1MTXU1uW', '2022-05-18 08:57:59', '2022-05-19 07:01:53'),
(16, '6701194130', 'Budi', 'budi@gmail.com', 'KPKNL Bandung', 2, 5, '$2y$10$DkV21a7xfMdMqnZiqsuz5Oi57SRc/o9H3JQLaHPbX2.0Wq52lTJ76', '2022-05-27 03:15:16', '2022-05-27 03:15:40'),
(18, '6703194120', 'Mawar', 'mawar@kemenkeu.go.id', 'KPKNL Bandung', 4, 3, '$2y$10$KvYWjEJ8oYQrS8ChTXD9OuLUNRIChiUsPGpjlHTiJ8IQIHqQgG1j6', '2022-06-07 00:49:53', '2022-06-07 00:50:55');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan_mr`
--

CREATE TABLE `tanggapan_mr` (
  `idTanggapan_MR` int(11) NOT NULL,
  `Isi` text NOT NULL,
  `Lampiran` varchar(255) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `idMeeting` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan_mr`
--

INSERT INTO `tanggapan_mr` (`idTanggapan_MR`, `Isi`, `Lampiran`, `tgl_mulai`, `tgl_selesai`, `idMeeting`) VALUES
(8, 'MR selesai diproses', '1649916813_24322bbf14ab859d6f85.jpg', '2022-04-14 01:13:33', '2022-04-14 01:13:33', 29),
(9, 'ini tanggapan untuk meeting request', 'default.png', '2022-04-14 01:39:33', '2022-04-14 01:39:33', 31),
(10, 'Pengajuan meeting request sedang diproses', 'default.png', '2022-04-14 20:56:15', '2022-04-14 20:56:15', 29),
(11, 'berikut link meeting yang akan digunakan meet.google.con/frm-yrxy-ptw', 'default.png', '2022-06-01 00:02:17', '2022-06-01 00:02:17', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan_po`
--

CREATE TABLE `tanggapan_po` (
  `idTanggapan_PO` int(11) NOT NULL,
  `Isi` text NOT NULL,
  `Lampiran` varchar(255) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `Rating` int(11) NOT NULL,
  `Ulasan` varchar(255) NOT NULL,
  `NIP` int(11) NOT NULL,
  `idPengaduan` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tanggapan_po`
--

INSERT INTO `tanggapan_po` (`idTanggapan_PO`, `Isi`, `Lampiran`, `tgl_mulai`, `tgl_selesai`, `Rating`, `Ulasan`, `NIP`, `idPengaduan`, `idPetugas`) VALUES
(1, 'Pengaduan ini akan diteruskan kepada Admin JKasi', 'user.png', '2022-06-07 01:25:42', '2022-06-07 01:25:42', 0, '', 0, 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `idTim` int(11) NOT NULL,
  `idPegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `idLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Email`, `Password`, `idLevel`) VALUES
('adit@gmail.com', '$2y$10$qE0uKYrWfpz6bEI.zjfw6eSbTzQXwT.v5K.5Db6ic2wQBLMCVhEoO', 5),
('admin@kemenkeu.go.id', '$2y$10$5buxNwUfqVQbCp3ZvFlZK.NmYQIpjoNhQPZKHDc7CSB9R1MTXU1uW', 1),
('budi@gmail.com', '$2y$10$DkV21a7xfMdMqnZiqsuz5Oi57SRc/o9H3JQLaHPbX2.0Wq52lTJ76', 4),
('dani@gmail.com', '$2y$10$CkFd7P2G3x/pmH6tG//dKeK5/SXAUJOsEewmZReFxplmmHtos96.m', 1),
('erdaulhaqdani@gmail.com', '$2y$10$2/O2RemAlMO6DPHUfU/8yOh8f9BynrJunfiXZLIj0tFx25SgaA3QG', 5),
('mawar@kemenkeu.go.id', '$2y$10$KvYWjEJ8oYQrS8ChTXD9OuLUNRIChiUsPGpjlHTiJ8IQIHqQgG1j6', 4),
('nadila@gmail.com', '$2y$10$3w/7bypYLyowceSnTyQnVeTYVJrgghVNJyztC9sJrqRud2tZoO8ma', 5),
('navi@gmail.com', '$2y$10$10HtaqYEqohaEpgpTuC.cenEZaCvA/KThnxBUMWeTStIuQtrxZ/ca', 5),
('rfachri.exe@gmail.com', '$2y$10$6B/dEKkjPHavACPv9PdpKOlB8tTDRdaA.yYJOL8/oKMLUS0y7GCRK', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idAgenda`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`idLevel`);

--
-- Indexes for table `meeting_request`
--
ALTER TABLE `meeting_request`
  ADD PRIMARY KEY (`idMeeting`),
  ADD KEY `idKategori` (`idKategori`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  ADD PRIMARY KEY (`idPengaduan`),
  ADD KEY `pengaduan_kategori` (`idKategori`),
  ADD KEY `pengaduan_customer` (`idCustomer`),
  ADD KEY `pengaduan_petugas` (`idPetugas`);

--
-- Indexes for table `permohonan_info`
--
ALTER TABLE `permohonan_info`
  ADD PRIMARY KEY (`idPermohonan`);

--
-- Indexes for table `petugas_apt`
--
ALTER TABLE `petugas_apt`
  ADD PRIMARY KEY (`idPetugas`),
  ADD KEY `petugas-level` (`idLevel`),
  ADD KEY `Unit` (`Unit`);

--
-- Indexes for table `tanggapan_mr`
--
ALTER TABLE `tanggapan_mr`
  ADD PRIMARY KEY (`idTanggapan_MR`),
  ADD KEY `idMeeting` (`idMeeting`);

--
-- Indexes for table `tanggapan_po`
--
ALTER TABLE `tanggapan_po`
  ADD PRIMARY KEY (`idTanggapan_PO`),
  ADD KEY `tanggapan-pengaduan` (`idPengaduan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idAgenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `idLevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meeting_request`
--
ALTER TABLE `meeting_request`
  MODIFY `idMeeting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  MODIFY `idPengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas_apt`
--
ALTER TABLE `petugas_apt`
  MODIFY `idPetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tanggapan_mr`
--
ALTER TABLE `tanggapan_mr`
  MODIFY `idTanggapan_MR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tanggapan_po`
--
ALTER TABLE `tanggapan_po`
  MODIFY `idTanggapan_PO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meeting_request`
--
ALTER TABLE `meeting_request`
  ADD CONSTRAINT `meeting_request_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  ADD CONSTRAINT `pengaduan_customer` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`),
  ADD CONSTRAINT `pengaduan_kategori` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`),
  ADD CONSTRAINT `pengaduan_petugas` FOREIGN KEY (`idPetugas`) REFERENCES `petugas_apt` (`idPetugas`);

--
-- Constraints for table `petugas_apt`
--
ALTER TABLE `petugas_apt`
  ADD CONSTRAINT `petugas-kategori_unit` FOREIGN KEY (`Unit`) REFERENCES `kategori` (`idKategori`),
  ADD CONSTRAINT `petugas-level` FOREIGN KEY (`idLevel`) REFERENCES `level_user` (`idLevel`);

--
-- Constraints for table `tanggapan_po`
--
ALTER TABLE `tanggapan_po`
  ADD CONSTRAINT `tanggapan-pengaduan` FOREIGN KEY (`idPengaduan`) REFERENCES `pengaduan_online` (`idPengaduan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

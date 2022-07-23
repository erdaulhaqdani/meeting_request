-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jul 2022 pada 12.13
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL,
  `id_uploads` int(11) DEFAULT NULL,
  `Judul` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL,
  `Isi` text NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `tgl_kegiatan` date DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `idPetugas`, `id_uploads`, `Judul`, `Kategori`, `Isi`, `Penulis`, `Gambar`, `Status`, `tgl_kegiatan`, `created_at`, `updated_at`) VALUES
(1, 20, 407, 'Judul Berita 1', 'Berita', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquet nibh faucibus semper bibendum. Maecenas dignissim dolor augue, sit amet faucibus sem sollicitudin in. Cras enim magna, accumsan quis nisl ac, aliquet mollis ante. In hac habitasse platea dictumst. Donec luctus condimentum massa auctor laoreet. Donec posuere velit molestie sapien iaculis, et convallis ipsum molestie. Cras vitae efficitur nisi, quis sollicitudin neque. Nulla molestie nec turpis in bibendum. Curabitur dolor ex, sodales vitae sodales eget, tincidunt sit amet lacus. Nam quis arcu finibus, egestas libero vel, viverra nisi. Integer eu venenatis nulla. Etiam id lacinia sapien. Duis nec placerat enim. Sed laoreet, odio ultricies tristique fringilla, enim sapien varius urna, eu volutpat sapien ante sed tellus. Proin lacinia velit dolor.</p>\r\n<p>Vivamus consequat tortor a sapien luctus fringilla. Integer gravida mauris velit, at placerat nulla tempus id. Quisque viverra vitae elit quis volutpat. Cras ut erat commodo, euismod tortor eu, mattis eros. Sed molestie eros consectetur libero mattis, sed ornare felis pulvinar. Duis posuere quam ligula, sit amet consequat erat finibus vel. Vestibulum et orci vel eros lacinia mattis non at metus. Fusce vitae neque ut magna bibendum pretium sed sit amet nunc. Ut vestibulum arcu at mi malesuada pharetra eu vel diam. Mauris nec felis at enim eleifend mollis. Aenean commodo non orci sed semper. Quisque interdum a arcu sed hendrerit.</p>', 'Penulis Berita', '1656875757_d52e97f29f3f187f83e8.jpg', 'Publik', NULL, '2022-07-01 03:51:15', '2022-07-03 14:15:57'),
(2, 20, 828, 'Judul Berita 2', 'Berita', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquet nibh faucibus semper bibendum. Maecenas dignissim dolor augue, sit amet faucibus sem sollicitudin in. Cras enim magna, accumsan quis nisl ac, aliquet mollis ante. In hac habitasse platea dictumst. Donec luctus condimentum massa auctor laoreet. Donec posuere velit molestie sapien iaculis, et convallis ipsum molestie. Cras vitae efficitur nisi, quis sollicitudin neque. Nulla molestie nec turpis in bibendum. Curabitur dolor ex, sodales vitae sodales eget, tincidunt sit amet lacus. Nam quis arcu finibus, egestas libero vel, viverra nisi. Integer eu venenatis nulla. Etiam id lacinia sapien. Duis nec placerat enim. Sed laoreet, odio ultricies tristique fringilla, enim sapien varius urna, eu volutpat sapien ante sed tellus. Proin lacinia velit dolor.</p>\r\n<p>Vivamus consequat tortor a sapien luctus fringilla. Integer gravida mauris velit, at placerat nulla tempus id. Quisque viverra vitae elit quis volutpat. Cras ut erat commodo, euismod tortor eu, mattis eros. Sed molestie eros consectetur libero mattis, sed ornare felis pulvinar. Duis posuere quam ligula, sit amet consequat erat finibus vel. Vestibulum et orci vel eros lacinia mattis non at metus. Fusce vitae neque ut magna bibendum pretium sed sit amet nunc. Ut vestibulum arcu at mi malesuada pharetra eu vel diam. Mauris nec felis at enim eleifend mollis. Aenean commodo non orci sed semper. Quisque interdum a arcu sed hendrerit.</p>', 'Penulis Berita ', '1656665632_258e21428ed48b0c38c3.jpg', 'Publik', NULL, '2022-07-01 03:53:52', '2022-07-01 04:00:18'),
(6, 20, 0, 'Judul Berita 3', 'Berita', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquet nibh faucibus semper bibendum. Maecenas dignissim dolor augue, sit amet faucibus sem sollicitudin in. Cras enim magna, accumsan quis nisl ac, aliquet mollis ante. In hac habitasse platea dictumst. Donec luctus condimentum massa auctor laoreet. Donec posuere velit molestie sapien iaculis, et convallis ipsum molestie. Cras vitae efficitur nisi, quis sollicitudin neque. Nulla molestie nec turpis in bibendum. Curabitur dolor ex, sodales vitae sodales eget, tincidunt sit amet lacus. Nam quis arcu finibus, egestas libero vel, viverra nisi. Integer eu venenatis nulla. Etiam id lacinia sapien. Duis nec placerat enim. Sed laoreet, odio ultricies tristique fringilla, enim sapien varius urna, eu volutpat sapien ante sed tellus. Proin lacinia velit dolor.</p>\r\n<p>Vivamus consequat tortor a sapien luctus fringilla. Integer gravida mauris velit, at placerat nulla tempus id. Quisque viverra vitae elit quis volutpat. Cras ut erat commodo, euismod tortor eu, mattis eros. Sed molestie eros consectetur libero mattis, sed ornare felis pulvinar. Duis posuere quam ligula, sit amet consequat erat finibus vel. Vestibulum et orci vel eros lacinia mattis non at metus. Fusce vitae neque ut magna bibendum pretium sed sit amet nunc. Ut vestibulum arcu at mi malesuada pharetra eu vel diam. Mauris nec felis at enim eleifend mollis. Aenean commodo non orci sed semper. Quisque interdum a arcu sed hendrerit.</p>', 'Penulis Berita', '1656666004_ca5c0e8e453545354931.jpg', 'Publik', NULL, '2022-07-01 04:00:04', '2022-07-01 04:00:13'),
(7, 20, 519, 'Judul Berita 4', 'Berita', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquet nibh faucibus semper bibendum. Maecenas dignissim dolor augue, sit amet faucibus sem sollicitudin in. Cras enim magna, accumsan quis nisl ac, aliquet mollis ante. In hac habitasse platea dictumst. Donec luctus condimentum massa auctor laoreet. Donec posuere velit molestie sapien iaculis, et convallis ipsum molestie. Cras vitae efficitur nisi, quis sollicitudin neque. Nulla molestie nec turpis in bibendum. Curabitur dolor ex, sodales vitae sodales eget, tincidunt sit amet lacus. Nam quis arcu finibus, egestas libero vel, viverra nisi. Integer eu venenatis nulla. Etiam id lacinia sapien. Duis nec placerat enim. Sed laoreet, odio ultricies tristique fringilla, enim sapien varius urna, eu volutpat sapien ante sed tellus. Proin lacinia velit dolor.</p>\r\n<p>Vivamus consequat tortor a sapien luctus fringilla. Integer gravida mauris velit, at placerat nulla tempus id. Quisque viverra vitae elit quis volutpat. Cras ut erat commodo, euismod tortor eu, mattis eros. Sed molestie eros consectetur libero mattis, sed ornare felis pulvinar. Duis posuere quam ligula, sit amet consequat erat finibus vel. Vestibulum et orci vel eros lacinia mattis non at metus. Fusce vitae neque ut magna bibendum pretium sed sit amet nunc. Ut vestibulum arcu at mi malesuada pharetra eu vel diam. Mauris nec felis at enim eleifend mollis. Aenean commodo non orci sed semper. Quisque interdum a arcu sed hendrerit.</p>\r\n<p>Phasellus a urna sed magna lobortis eleifend. Aenean nec dolor vitae elit pretium lobortis quis eu nulla. Aenean et libero et leo hendrerit maximus sit amet in velit. Sed id tellus at mauris ullamcorper porta id vitae urna. Phasellus et feugiat dolor. Nunc volutpat iaculis tortor id congue. Phasellus dapibus, arcu at aliquet posuere, massa sapien lobortis nulla, vel ultrices felis urna eu tellus. Nam neque leo, mollis a massa eget, eleifend euismod odio. Morbi blandit auctor est, vitae finibus justo porttitor non.</p>', 'Penulis Berita', '1656666070_a5b3849d7f3bec7655ea.jpg', 'Publik', NULL, '2022-07-01 04:01:10', '2022-07-01 04:01:18'),
(8, 20, 0, 'Judul Pengumuman 1 dengan Jumlah Karakter Judul yang Panjang untuk Mencoba Tampilan', 'Pengumuman', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquet nibh faucibus semper bibendum. Maecenas dignissim dolor augue, sit amet faucibus sem sollicitudin in. Cras enim magna, accumsan quis nisl ac, aliquet mollis ante. In hac habitasse platea dictumst. Donec luctus condimentum massa auctor laoreet. Donec posuere velit molestie sapien iaculis, et convallis ipsum molestie. Cras vitae efficitur nisi, quis sollicitudin neque. Nulla molestie nec turpis in bibendum. Curabitur dolor ex, sodales vitae sodales eget, tincidunt sit amet lacus. Nam quis arcu finibus, egestas libero vel, viverra nisi. Integer eu venenatis nulla. Etiam id lacinia sapien. Duis nec placerat enim. Sed laoreet, odio ultricies tristique fringilla, enim sapien varius urna, eu volutpat sapien ante sed tellus. Proin lacinia velit dolor.</p>\r\n<p>Vivamus consequat tortor a sapien luctus fringilla. Integer gravida mauris velit, at placerat nulla tempus id. Quisque viverra vitae elit quis volutpat. Cras ut erat commodo, euismod tortor eu, mattis eros. Sed molestie eros consectetur libero mattis, sed ornare felis pulvinar. Duis posuere quam ligula, sit amet consequat erat finibus vel. Vestibulum et orci vel eros lacinia mattis non at metus. Fusce vitae neque ut magna bibendum pretium sed sit amet nunc. Ut vestibulum arcu at mi malesuada pharetra eu vel diam. Mauris nec felis at enim eleifend mollis. Aenean commodo non orci sed semper. Quisque interdum a arcu sed hendrerit.</p>\r\n<p>Phasellus a urna sed magna lobortis eleifend. Aenean nec dolor vitae elit pretium lobortis quis eu nulla. Aenean et libero et leo hendrerit maximus sit amet in velit. Sed id tellus at mauris ullamcorper porta id vitae urna. Phasellus et feugiat dolor. Nunc volutpat iaculis tortor id congue. Phasellus dapibus, arcu at aliquet posuere, massa sapien lobortis nulla, vel ultrices felis urna eu tellus. Nam neque leo, mollis a massa eget, eleifend euismod odio. Morbi blandit auctor est, vitae finibus justo porttitor non.</p>', 'Penulis Pengumuman', '1656666160_64217cecfd5e173d8510.jpg', 'Publik', NULL, '2022-07-01 04:02:40', '2022-07-01 04:04:42'),
(9, 20, 0, 'Judul Pengumuman 2 dengan Jumlah Karakter yang Banyak dan Panjang untuk Mencoba Cut Judul', 'Pengumuman', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquet nibh faucibus semper bibendum. Maecenas dignissim dolor augue, sit amet faucibus sem sollicitudin in. Cras enim magna, accumsan quis nisl ac, aliquet mollis ante. In hac habitasse platea dictumst. Donec luctus condimentum massa auctor laoreet. Donec posuere velit molestie sapien iaculis, et convallis ipsum molestie. Cras vitae efficitur nisi, quis sollicitudin neque. Nulla molestie nec turpis in bibendum. Curabitur dolor ex, sodales vitae sodales eget, tincidunt sit amet lacus. Nam quis arcu finibus, egestas libero vel, viverra nisi. Integer eu venenatis nulla. Etiam id lacinia sapien. Duis nec placerat enim. Sed laoreet, odio ultricies tristique fringilla, enim sapien varius urna, eu volutpat sapien ante sed tellus. Proin lacinia velit dolor.</p>\r\n<p>Vivamus consequat tortor a sapien luctus fringilla. Integer gravida mauris velit, at placerat nulla tempus id. Quisque viverra vitae elit quis volutpat. Cras ut erat commodo, euismod tortor eu, mattis eros. Sed molestie eros consectetur libero mattis, sed ornare felis pulvinar. Duis posuere quam ligula, sit amet consequat erat finibus vel. Vestibulum et orci vel eros lacinia mattis non at metus. Fusce vitae neque ut magna bibendum pretium sed sit amet nunc. Ut vestibulum arcu at mi malesuada pharetra eu vel diam. Mauris nec felis at enim eleifend mollis. Aenean commodo non orci sed semper. Quisque interdum a arcu sed hendrerit.</p>\r\n<p>&nbsp;</p>', 'Penulis Pengumuman', '1656666199_2519920872b3696dcbd6.jpg', 'Publik', NULL, '2022-07-01 04:03:19', '2022-07-01 04:04:35'),
(10, 20, 0, 'Judul Pengumuman 3 ', 'Pengumuman', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed aliquet nibh faucibus semper bibendum. Maecenas dignissim dolor augue, sit amet faucibus sem sollicitudin in. Cras enim magna, accumsan quis nisl ac, aliquet mollis ante. In hac habitasse platea dictumst. Donec luctus condimentum massa auctor laoreet. Donec posuere velit molestie sapien iaculis, et convallis ipsum molestie. Cras vitae efficitur nisi, quis sollicitudin neque. Nulla molestie nec turpis in bibendum. Curabitur dolor ex, sodales vitae sodales eget, tincidunt sit amet lacus. Nam quis arcu finibus, egestas libero vel, viverra nisi. Integer eu venenatis nulla. Etiam id lacinia sapien. Duis nec placerat enim. Sed laoreet, odio ultricies tristique fringilla, enim sapien varius urna, eu volutpat sapien ante sed tellus. Proin lacinia velit dolor.</p>\r\n<p>Vivamus consequat tortor a sapien luctus fringilla. Integer gravida mauris velit, at placerat nulla tempus id. Quisque viverra vitae elit quis volutpat. Cras ut erat commodo, euismod tortor eu, mattis eros. Sed molestie eros consectetur libero mattis, sed ornare felis pulvinar. Duis posuere quam ligula, sit amet consequat erat finibus vel. Vestibulum et orci vel eros lacinia mattis non at metus. Fusce vitae neque ut magna bibendum pretium sed sit amet nunc. Ut vestibulum arcu at mi malesuada pharetra eu vel diam. Mauris nec felis at enim eleifend mollis. Aenean commodo non orci sed semper. Quisque interdum a arcu sed hendrerit.</p>\r\n<p>&nbsp;</p>', 'Penulis Pengumuman', '1656666239_1e82735f9ddfe922f404.jpg', 'Publik', NULL, '2022-07-01 04:03:59', '2022-07-01 04:04:29'),
(11, 20, 55, 'Judul Berita 5', 'Berita', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue dignissim porta. Suspendisse et sapien placerat lorem ultricies aliquet. Morbi orci est, fermentum id hendrerit in, volutpat a justo. Duis eu mattis felis, sed sagittis lacus. Sed elit justo, consequat vitae ultricies non, dictum sit amet sapien. Maecenas eros purus, luctus non fringilla eget, commodo eu augue. Aliquam aliquet mollis sagittis. Quisque justo dolor, porta eget metus vitae, finibus efficitur diam. Pellentesque efficitur nisi at fringilla porttitor. Etiam sodales enim in eros faucibus, quis rutrum libero mattis. Cras ut purus sem. Duis erat diam, tincidunt et nisl eget, suscipit sollicitudin metus. Mauris risus tortor, consequat in aliquam quis, ultrices at est. Phasellus at efficitur neque, in molestie mauris. Suspendisse gravida scelerisque ipsum, non ullamcorper quam eleifend quis.</p>\r\n<p>Mauris justo diam, sollicitudin et lectus eget, volutpat aliquet dolor. Morbi quis sem malesuada, bibendum turpis quis, placerat odio. Etiam aliquet lorem dolor, id lobortis quam vestibulum vitae. Proin blandit tortor sed aliquam dictum. Sed sed fringilla nulla, mattis pretium ipsum. Morbi ut rutrum elit. Fusce vel nibh vitae nibh lacinia ornare. Integer euismod a turpis non condimentum. Integer aliquam nibh quam, id malesuada felis venenatis a. Aliquam eleifend eros tellus, eu varius ex faucibus et. In imperdiet neque eu turpis pretium, ut viverra turpis gravida. Donec bibendum bibendum libero. Mauris ut cursus augue. Curabitur at metus eu diam consequat interdum. Donec dignissim, libero vitae varius eleifend, ligula sapien interdum ante, sed porta felis sem vel felis. Nunc id accumsan tellus.</p>', 'Penulis Berita', '1656879012_2588c655f874abc7ebee.jpg', 'Publik', NULL, '2022-07-01 04:24:50', '2022-07-03 15:10:12'),
(13, 20, 0, 'Judul Pengumuman 4 ', 'Pengumuman', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et metus sed dolor scelerisque pharetra vel eu leo. Vestibulum scelerisque ante nec ipsum vehicula, id tristique odio placerat. Integer eu sem turpis. Phasellus augue dolor, semper a nisi sit amet, pretium congue felis. Sed eu hendrerit risus. Duis eget orci rutrum, elementum nibh in, tristique tellus. Ut pellentesque rutrum lectus sit amet pulvinar. In hac habitasse platea dictumst.</p>\r\n<p>Proin non semper ligula. Nulla facilisi. Phasellus aliquet massa id consequat rutrum. Pellentesque sodales elit vestibulum nisl egestas, vel feugiat massa ultrices. Curabitur quam nibh, condimentum eu nisl vel, euismod venenatis erat. Aliquam erat volutpat. Duis feugiat sit amet ex sed sagittis. Praesent felis arcu, congue in imperdiet nec, sollicitudin sed turpis. Vivamus gravida vulputate est ut tincidunt. Praesent in diam quis urna dictum tristique vel vitae neque. Aenean vestibulum orci eu eros mollis luctus. Phasellus nec justo tempus, vulputate quam id, egestas ex. Donec pellentesque ut enim quis rhoncus. Nullam tincidunt at mi eget auctor.</p>', 'Penulis Pengumuman', '1656703512_e9fa8cf7022f83e930f6.jpg', 'Publik', NULL, '2022-07-01 14:25:12', '2022-07-01 14:25:24'),
(14, 20, 0, 'Judul Pengumuman 7', 'Pengumuman', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et metus sed dolor scelerisque pharetra vel eu leo. Vestibulum scelerisque ante nec ipsum vehicula, id tristique odio placerat. Integer eu sem turpis. Phasellus augue dolor, semper a nisi sit amet, pretium congue felis. Sed eu hendrerit risus. Duis eget orci rutrum, elementum nibh in, tristique tellus. Ut pellentesque rutrum lectus sit amet pulvinar. In hac habitasse platea dictumst.</p>\r\n<p>Proin non semper ligula. Nulla facilisi. Phasellus aliquet massa id consequat rutrum. Pellentesque sodales elit vestibulum nisl egestas, vel feugiat massa ultrices. Curabitur quam nibh, condimentum eu nisl vel, euismod venenatis erat. Aliquam erat volutpat. Duis feugiat sit amet ex sed sagittis. Praesent felis arcu, congue in imperdiet nec, sollicitudin sed turpis. Vivamus gravida vulputate est ut tincidunt. Praesent in diam quis urna dictum tristique vel vitae neque. Aenean vestibulum orci eu eros mollis luctus. Phasellus nec justo tempus, vulputate quam id, egestas ex. Donec pellentesque ut enim quis rhoncus. Nullam tincidunt at mi eget auctor.</p>', 'Penulis Pengumuman', '1656703824_fe3f36ba5213fb402b8a.jpg', 'Publik', NULL, '2022-07-01 14:30:24', '2022-07-01 14:44:57'),
(15, 20, 0, 'Judul Pengumuman 6', 'Pengumuman', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et metus sed dolor scelerisque pharetra vel eu leo. Vestibulum scelerisque ante nec ipsum vehicula, id tristique odio placerat. Integer eu sem turpis. Phasellus augue dolor, semper a nisi sit amet, pretium congue felis. Sed eu hendrerit risus. Duis eget orci rutrum, elementum nibh in, tristique tellus. Ut pellentesque rutrum lectus sit amet pulvinar. In hac habitasse platea dictumst.</p>\r\n<p>Proin non semper ligula. Nulla facilisi. Phasellus aliquet massa id consequat rutrum. Pellentesque sodales elit vestibulum nisl egestas, vel feugiat massa ultrices. Curabitur quam nibh, condimentum eu nisl vel, euismod venenatis erat. Aliquam erat volutpat. Duis feugiat sit amet ex sed sagittis. Praesent felis arcu, congue in imperdiet nec, sollicitudin sed turpis. Vivamus gravida vulputate est ut tincidunt. Praesent in diam quis urna dictum tristique vel vitae neque. Aenean vestibulum orci eu eros mollis luctus. Phasellus nec justo tempus, vulputate quam id, egestas ex. Donec pellentesque ut enim quis rhoncus. Nullam tincidunt at mi eget auctor.</p>', 'Penulis Pengumuman', '1656703874_9463f01519c853b8c870.jpg', 'Publik', NULL, '2022-07-01 14:31:14', '2022-07-03 13:48:07'),
(17, 20, 0, 'Judul Agenda', 'Agenda', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis interdum accumsan elementum. Sed rutrum urna nisl, nec vestibulum ante sollicitudin ut. Etiam consectetur, erat eu malesuada condimentum, metus neque pharetra odio, ut interdum velit enim auctor lectus. Fusce lobortis est id urna commodo dapibus. Duis placerat dignissim enim sit amet porta. Proin sed ligula in tortor pretium viverra. Nulla lobortis erat eu est scelerisque mattis. Suspendisse potenti. Curabitur nec nunc a nisl sollicitudin malesuada ac a lacus. Proin volutpat tempor arcu rutrum rutrum. Fusce in posuere metus, a auctor magna. Aliquam eget urna tincidunt, rhoncus lectus in, dictum tellus. Phasellus eleifend ex eu malesuada pellentesque.</p>\r\n<p>Proin et tortor sed quam hendrerit mollis ac sed lacus. Aenean nulla urna, interdum ac pharetra interdum, tincidunt ut massa. Nunc non ultrices ex. Vestibulum aliquet dignissim convallis. Suspendisse vitae consectetur lacus. Curabitur sollicitudin venenatis tortor, sit amet consequat leo ullamcorper ac. Maecenas molestie non mauris et ornare. Suspendisse rhoncus, orci ut sodales porta, urna est gravida diam, vitae condimentum nibh tortor quis eros. Quisque id molestie erat, non bibendum lectus. Vestibulum et leo laoreet, ultrices purus venenatis, venenatis tellus. Fusce lobortis, erat in suscipit eleifend, mi erat ullamcorper ex, non vestibulum nunc dolor eu augue. Maecenas ligula leo, tincidunt non rhoncus non, elementum non ipsum.</p>', 'Penulis Agenda', '1656763242_8b828fbefd8e45b99f18.jpg', 'Publik', '2022-07-03', '2022-07-02 07:00:42', '2022-07-02 07:02:42'),
(18, 20, 0, 'Judul Agenda 2', 'Agenda', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis interdum accumsan elementum. Sed rutrum urna nisl, nec vestibulum ante sollicitudin ut. Etiam consectetur, erat eu malesuada condimentum, metus neque pharetra odio, ut interdum velit enim auctor lectus. Fusce lobortis est id urna commodo dapibus. Duis placerat dignissim enim sit amet porta. Proin sed ligula in tortor pretium viverra. Nulla lobortis erat eu est scelerisque mattis. Suspendisse potenti. Curabitur nec nunc a nisl sollicitudin malesuada ac a lacus. Proin volutpat tempor arcu rutrum rutrum. Fusce in posuere metus, a auctor magna. Aliquam eget urna tincidunt, rhoncus lectus in, dictum tellus. Phasellus eleifend ex eu malesuada pellentesque.</p>\r\n<p>Proin et tortor sed quam hendrerit mollis ac sed lacus. Aenean nulla urna, interdum ac pharetra interdum, tincidunt ut massa. Nunc non ultrices ex. Vestibulum aliquet dignissim convallis. Suspendisse vitae consectetur lacus. Curabitur sollicitudin venenatis tortor, sit amet consequat leo ullamcorper ac. Maecenas molestie non mauris et ornare. Suspendisse rhoncus, orci ut sodales porta, urna est gravida diam, vitae condimentum nibh tortor quis eros. Quisque id molestie erat, non bibendum lectus. Vestibulum et leo laoreet, ultrices purus venenatis, venenatis tellus. Fusce lobortis, erat in suscipit eleifend, mi erat ullamcorper ex, non vestibulum nunc dolor eu augue. Maecenas ligula leo, tincidunt non rhoncus non, elementum non ipsum.</p>', 'Penulis Agenda', '1656763302_76744f4e4d2611736703.jpg', 'Publik', '2022-07-04', '2022-07-02 07:01:42', '2022-07-02 07:02:36'),
(20, 20, 0, 'Judul Kilas Peristiwa 1', 'Kilas Peristiwa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean laoreet, purus vel luctus blandit, quam metus rhoncus dui, in condimentum dolor massa id lorem. Nunc id nulla vel ex tempor viverra sed at enim. Donec elit urna, ultricies ac hendrerit eget, varius at felis. Sed sagittis est a dolor venenatis efficitur. Donec vestibulum pellentesque turpis blandit malesuada. Phasellus egestas tortor felis, sit amet maximus tellus venenatis in. Aliquam aliquet neque urna, vel cursus mauris porta sit amet. Nulla eu neque non odio gravida condimentum sed sit amet ligula. Vestibulum condimentum lectus sed lacus malesuada, ac viverra lorem finibus.</p>\r\n<p>Suspendisse semper commodo lectus, et auctor diam accumsan ac. Aliquam maximus, odio sit amet fringilla vehicula, nisl nunc faucibus lectus, a convallis ipsum lorem vitae dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tristique urna sit amet sem lacinia ultrices. Maecenas elementum tortor ligula. Curabitur vel vestibulum justo. Phasellus feugiat sem sed malesuada suscipit. Phasellus ullamcorper et massa sit amet rutrum. Proin ut rutrum metus. Donec facilisis, lacus at scelerisque iaculis, nisi magna feugiat nunc, non mollis felis tortor non sem. Etiam tincidunt felis ligula. Curabitur ac libero sit amet erat elementum ullamcorper et ut quam. Etiam orci nisl, sollicitudin et lorem a, hendrerit luctus odio.</p>', 'Penulis Peristiwa', '1656869131_c89a31030ae1e1708b35.jpg', 'Publik', NULL, '2022-07-03 12:25:31', '2022-07-03 12:32:16'),
(21, 20, 0, 'Judul Kilas Peristiwa 2', 'Kilas Peristiwa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean laoreet, purus vel luctus blandit, quam metus rhoncus dui, in condimentum dolor massa id lorem. Nunc id nulla vel ex tempor viverra sed at enim. Donec elit urna, ultricies ac hendrerit eget, varius at felis. Sed sagittis est a dolor venenatis efficitur. Donec vestibulum pellentesque turpis blandit malesuada. Phasellus egestas tortor felis, sit amet maximus tellus venenatis in. Aliquam aliquet neque urna, vel cursus mauris porta sit amet. Nulla eu neque non odio gravida condimentum sed sit amet ligula. Vestibulum condimentum lectus sed lacus malesuada, ac viverra lorem finibus.</p>\r\n<p>Suspendisse semper commodo lectus, et auctor diam accumsan ac. Aliquam maximus, odio sit amet fringilla vehicula, nisl nunc faucibus lectus, a convallis ipsum lorem vitae dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tristique urna sit amet sem lacinia ultrices. Maecenas elementum tortor ligula. Curabitur vel vestibulum justo. Phasellus feugiat sem sed malesuada suscipit. Phasellus ullamcorper et massa sit amet rutrum. Proin ut rutrum metus. Donec facilisis, lacus at scelerisque iaculis, nisi magna feugiat nunc, non mollis felis tortor non sem. Etiam tincidunt felis ligula. Curabitur ac libero sit amet erat elementum ullamcorper et ut quam. Etiam orci nisl, sollicitudin et lorem a, hendrerit luctus odio.</p>', 'Penulis Peristiwa', '1656869526_438abbfcf9afac2e4c6d.jpg', 'Publik', NULL, '2022-07-03 12:32:06', '2022-07-03 12:32:12'),
(22, 20, 0, 'Judul Kilas Peristiwa 3', 'Kilas Peristiwa', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean laoreet, purus vel luctus blandit, quam metus rhoncus dui, in condimentum dolor massa id lorem. Nunc id nulla vel ex tempor viverra sed at enim. Donec elit urna, ultricies ac hendrerit eget, varius at felis. Sed sagittis est a dolor venenatis efficitur. Donec vestibulum pellentesque turpis blandit malesuada. Phasellus egestas tortor felis, sit amet maximus tellus venenatis in. Aliquam aliquet neque urna, vel cursus mauris porta sit amet. Nulla eu neque non odio gravida condimentum sed sit amet ligula. Vestibulum condimentum lectus sed lacus malesuada, ac viverra lorem finibus.</p>\r\n<p>Suspendisse semper commodo lectus, et auctor diam accumsan ac. Aliquam maximus, odio sit amet fringilla vehicula, nisl nunc faucibus lectus, a convallis ipsum lorem vitae dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tristique urna sit amet sem lacinia ultrices. Maecenas elementum tortor ligula. Curabitur vel vestibulum justo. Phasellus feugiat sem sed malesuada suscipit. Phasellus ullamcorper et massa sit amet rutrum. Proin ut rutrum metus. Donec facilisis, lacus at scelerisque iaculis, nisi magna feugiat nunc, non mollis felis tortor non sem. Etiam tincidunt felis ligula. Curabitur ac libero sit amet erat elementum ullamcorper et ut quam. Etiam orci nisl, sollicitudin et lorem a, hendrerit luctus odio.</p>', 'Penulis Peristiwa', '1656869596_3f0d7c92fca8adf0de65.jpg', 'Publik', NULL, '2022-07-03 12:33:16', '2022-07-03 12:33:21'),
(23, 20, 0, 'Judul Artikel 2', 'Artikel', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean laoreet, purus vel luctus blandit, quam metus rhoncus dui, in condimentum dolor massa id lorem. Nunc id nulla vel ex tempor viverra sed at enim. Donec elit urna, ultricies ac hendrerit eget, varius at felis. Sed sagittis est a dolor venenatis efficitur. Donec vestibulum pellentesque turpis blandit malesuada. Phasellus egestas tortor felis, sit amet maximus tellus venenatis in. Aliquam aliquet neque urna, vel cursus mauris porta sit amet. Nulla eu neque non odio gravida condimentum sed sit amet ligula. Vestibulum condimentum lectus sed lacus malesuada, ac viverra lorem finibus.</p>\r\n<p>Suspendisse semper commodo lectus, et auctor diam accumsan ac. Aliquam maximus, odio sit amet fringilla vehicula, nisl nunc faucibus lectus, a convallis ipsum lorem vitae dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tristique urna sit amet sem lacinia ultrices. Maecenas elementum tortor ligula. Curabitur vel vestibulum justo. Phasellus feugiat sem sed malesuada suscipit. Phasellus ullamcorper et massa sit amet rutrum. Proin ut rutrum metus. Donec facilisis, lacus at scelerisque iaculis, nisi magna feugiat nunc, non mollis felis tortor non sem. Etiam tincidunt felis ligula. Curabitur ac libero sit amet erat elementum ullamcorper et ut quam. Etiam orci nisl, sollicitudin et lorem a, hendrerit luctus odio.</p>', 'Penulis Artikel', '1656869643_4f51e053829bddd44b2b.jpg', 'Publik', NULL, '2022-07-03 12:34:03', '2022-07-03 13:48:02'),
(27, 20, 0, 'Judul Artikel 3', 'Artikel', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean laoreet, purus vel luctus blandit, quam metus rhoncus dui, in condimentum dolor massa id lorem. Nunc id nulla vel ex tempor viverra sed at enim. Donec elit urna, ultricies ac hendrerit eget, varius at felis. Sed sagittis est a dolor venenatis efficitur. Donec vestibulum pellentesque turpis blandit malesuada. Phasellus egestas tortor felis, sit amet maximus tellus venenatis in. Aliquam aliquet neque urna, vel cursus mauris porta sit amet. Nulla eu neque non odio gravida condimentum sed sit amet ligula. Vestibulum condimentum lectus sed lacus malesuada, ac viverra lorem finibus.</p>\r\n<p>Suspendisse semper commodo lectus, et auctor diam accumsan ac. Aliquam maximus, odio sit amet fringilla vehicula, nisl nunc faucibus lectus, a convallis ipsum lorem vitae dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tristique urna sit amet sem lacinia ultrices. Maecenas elementum tortor ligula. Curabitur vel vestibulum justo. Phasellus feugiat sem sed malesuada suscipit. Phasellus ullamcorper et massa sit amet rutrum. Proin ut rutrum metus. Donec facilisis, lacus at scelerisque iaculis, nisi magna feugiat nunc, non mollis felis tortor non sem. Etiam tincidunt felis ligula. Curabitur ac libero sit amet erat elementum ullamcorper et ut quam. Etiam orci nisl, sollicitudin et lorem a, hendrerit luctus odio.</p>', 'Penulis Artikel', '1656879496_191bf5598aac915d1fcb.jpg', 'Publik', NULL, '2022-07-03 15:18:16', '2022-07-03 15:18:22'),
(28, 20, 0, 'Judul Agenda 3', 'Agenda', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean laoreet, purus vel luctus blandit, quam metus rhoncus dui, in condimentum dolor massa id lorem. Nunc id nulla vel ex tempor viverra sed at enim. Donec elit urna, ultricies ac hendrerit eget, varius at felis. Sed sagittis est a dolor venenatis efficitur. Donec vestibulum pellentesque turpis blandit malesuada. Phasellus egestas tortor felis, sit amet maximus tellus venenatis in. Aliquam aliquet neque urna, vel cursus mauris porta sit amet. Nulla eu neque non odio gravida condimentum sed sit amet ligula. Vestibulum condimentum lectus sed lacus malesuada, ac viverra lorem finibus.</p>\r\n<p>Suspendisse semper commodo lectus, et auctor diam accumsan ac. Aliquam maximus, odio sit amet fringilla vehicula, nisl nunc faucibus lectus, a convallis ipsum lorem vitae dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tristique urna sit amet sem lacinia ultrices. Maecenas elementum tortor ligula. Curabitur vel vestibulum justo. Phasellus feugiat sem sed malesuada suscipit. Phasellus ullamcorper et massa sit amet rutrum. Proin ut rutrum metus. Donec facilisis, lacus at scelerisque iaculis, nisi magna feugiat nunc, non mollis felis tortor non sem. Etiam tincidunt felis ligula. Curabitur ac libero sit amet erat elementum ullamcorper et ut quam. Etiam orci nisl, sollicitudin et lorem a, hendrerit luctus odio.</p>', 'Penulis Agenda', '1656879849_c4c4c4a9b22b014f0666.jpg', 'Publik', '2022-07-05', '2022-07-03 15:24:09', '2022-07-03 15:24:19'),
(29, 20, 0, 'Judul Agenda 4', 'Agenda', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean laoreet, purus vel luctus blandit, quam metus rhoncus dui, in condimentum dolor massa id lorem. Nunc id nulla vel ex tempor viverra sed at enim. Donec elit urna, ultricies ac hendrerit eget, varius at felis. Sed sagittis est a dolor venenatis efficitur. Donec vestibulum pellentesque turpis blandit malesuada. Phasellus egestas tortor felis, sit amet maximus tellus venenatis in. Aliquam aliquet neque urna, vel cursus mauris porta sit amet. Nulla eu neque non odio gravida condimentum sed sit amet ligula. Vestibulum condimentum lectus sed lacus malesuada, ac viverra lorem finibus.</p>\r\n<p>Suspendisse semper commodo lectus, et auctor diam accumsan ac. Aliquam maximus, odio sit amet fringilla vehicula, nisl nunc faucibus lectus, a convallis ipsum lorem vitae dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam tristique urna sit amet sem lacinia ultrices. Maecenas elementum tortor ligula. Curabitur vel vestibulum justo. Phasellus feugiat sem sed malesuada suscipit. Phasellus ullamcorper et massa sit amet rutrum. Proin ut rutrum metus. Donec facilisis, lacus at scelerisque iaculis, nisi magna feugiat nunc, non mollis felis tortor non sem. Etiam tincidunt felis ligula. Curabitur ac libero sit amet erat elementum ullamcorper et ut quam. Etiam orci nisl, sollicitudin et lorem a, hendrerit luctus odio.</p>', 'Penulis Agenda', '1656879897_b682a15117789e325e9a.jpg', 'Diarsipkan', '2022-07-05', '2022-07-03 15:24:57', '2022-07-03 15:24:57'),
(31, 20, 674, 'Judul Berita Terbaru Tanggal 22 Juli', 'Berita', '<p>Isi Berita terbaru yang diupload pada tanggal 22 Juli 2022</p>', 'Erda Ulhaq', '1658433914_b96b67c777e875c95e32.jpg', 'Publik', NULL, '2022-07-22 03:05:14', '2022-07-22 03:07:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `StatusAkun` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `noHP` int(11) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `tglLahir` date DEFAULT NULL,
  `Pekerjaan` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `idLevel` int(11) NOT NULL DEFAULT 5,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`idCustomer`, `NIK`, `Nama`, `Username`, `StatusAkun`, `Email`, `noHP`, `jenisKelamin`, `tglLahir`, `Pekerjaan`, `Password`, `created_at`, `updated_at`, `idLevel`, `idUser`) VALUES
(37, '6701191011231231', 'Erda Ulhaq Dani Hipya', 'erdaulhaqdani', 'Aktif', 'erdaulhaqdani@gmail.com', 2147483647, 'Laki-laki', NULL, 'Mahasiswa', '$2y$10$aCYlaKdnfjL4SW3suKlgMuHa1LNxrI9vywuWt1z7ZHNHzthQwrMZ6', '2022-05-25 03:57:52', '2022-07-03 12:08:01', 5, 2),
(44, '1122334455', 'Mikazuki', 'mika', 'Aktif', 'zmika360@gmail.com', 2147483647, 'Perempuan', NULL, 'Mahasiswa ', '$2y$10$SM9mii0s9K3xQdVdFAaw6OKk6hN8lIOzngvqo21lBioScwD8o.cXG', '2022-06-19 17:15:06', '2022-06-19 17:15:27', 5, 7),
(45, '1234567891011234', 'Putri Nur', 'putri', 'NonAktif', 'danihipya@student.telkomuniversity.ac.id', 2147483647, 'Perempuan', NULL, 'Mahasiswa', '$2y$10$K0PgBMwKl57as1ySG.vgOOCKfoqsE7eMSl0EyvZIwP17Hhb4YCWMa', '2022-07-03 21:23:14', '2022-07-03 21:23:14', 5, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_uploads` int(11) NOT NULL,
  `File` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `id_uploads`, `File`) VALUES
(1, 407, '1656665474_a570cc09b8171098a5c9.jpg'),
(2, 407, '1656665474_3bf6f16de891e310b6b2.jpg'),
(3, 407, '1656665474_4ffbabafa0ccc077f0ff.jpg'),
(4, 828, '1656665632_d826b3c033b4b13827dd.jpg'),
(5, 828, '1656665632_02da81aa82dad6d2b75a.jpg'),
(6, 828, '1656665632_b7c8a38f7f265025e381.jpg'),
(7, 519, '1656666070_9f6e8bf346242ca02f22.jpg'),
(8, 519, '1656666070_6d3df4783553c37fe541.jpg'),
(9, 519, '1656666070_8a1850803bb2c1de2679.jpg'),
(10, 972, '1656667608_0f9d597462a567082ccd.png'),
(11, 907, '1656870870_b5a0ae098d57b3eec06d.docx'),
(12, 299, '1656870989_35b5770918fb5fd6a7c0.docx'),
(13, 23, '1656871114_4613ed4da3ab69b92741.docx'),
(14, 55, '1656875813_89dd25dc08375ec0d158.jpg'),
(15, 55, '1656875813_abe4da3b28797964963f.jpg'),
(16, 859, '1656907544_81700eb15cbb841a50e4.jpg'),
(17, 859, '1656907544_b49a81f0c10d9f59a12e.jpg'),
(18, 859, '1656907544_0e1c3d1a03509ee39110.jpg'),
(19, 674, '1658433914_781f60d15e0b55c56e46.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `idJabatan` int(11) NOT NULL,
  `posisiJabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`idJabatan`, `posisiJabatan`) VALUES
(1, 'Kepala Kantor'),
(2, 'Kepala Seksi'),
(3, 'Staf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idKategori` int(11) NOT NULL,
  `namaKategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`idKategori`, `namaKategori`) VALUES
(1, 'Pelayanan Lelang'),
(2, 'Pengelolaan Kekayaan Negara'),
(3, 'Pelayanan Penilaian'),
(4, 'Piutang Negara'),
(5, 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level_user`
--

CREATE TABLE `level_user` (
  `idLevel` int(11) NOT NULL,
  `Level` varchar(30) NOT NULL,
  `Kelompok` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level_user`
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
-- Struktur dari tabel `meeting_request`
--

CREATE TABLE `meeting_request` (
  `idMeeting` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL DEFAULT 1,
  `Tanggal_kunjungan` varchar(50) NOT NULL,
  `Waktu_kunjungan` varchar(255) NOT NULL,
  `Kantor` varchar(255) NOT NULL,
  `Bentuk_layanan` varchar(50) NOT NULL,
  `Perihal` text NOT NULL,
  `File_lampiran` varchar(255) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `idCustomer` int(11) NOT NULL,
  `Rating` int(11) NOT NULL DEFAULT 0,
  `Ulasan` varchar(255) DEFAULT NULL,
  `notifCustomer` int(1) NOT NULL DEFAULT 0,
  `notifPetugas` int(11) NOT NULL DEFAULT 0,
  `Tiket` varchar(5) NOT NULL DEFAULT 'MR'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `meeting_request`
--

INSERT INTO `meeting_request` (`idMeeting`, `idPetugas`, `Tanggal_kunjungan`, `Waktu_kunjungan`, `Kantor`, `Bentuk_layanan`, `Perihal`, `File_lampiran`, `Status`, `idKategori`, `created_at`, `updated_at`, `idCustomer`, `Rating`, `Ulasan`, `notifCustomer`, `notifPetugas`, `Tiket`) VALUES
(65, 30, '13-07-2022', '08:00', 'Kanwil DJKN Jawa Barat', 'Luring', 'Pengelolaan Kekayaan Negara', 'default.png', 'Sedang diproses', 2, '2022-07-12 05:08:50', '2022-07-19 13:28:36', 37, 0, NULL, 0, 1, 'MR'),
(66, 21, '13-07-2022', '08:05', 'Kanwil DJKN Jawa Barat', 'Luring', 'Lelang', 'default.png', 'Selesai diproses', 1, '2022-05-01 12:29:51', '2022-07-22 02:57:21', 37, 5, 'ini isi ulasan meeting request', 1, 1, 'MR'),
(67, 21, '21-07-2022', '08:00', 'KPKNL Bandung', 'Luring', 'Lelang', 'default.png', 'Eskalasi', 1, '2022-07-18 23:52:29', '2022-07-19 13:26:36', 37, 0, NULL, 0, 0, 'MR'),
(69, 30, '21-07-2022', '08:20', 'KPKNL Bandung', 'Luring', 'Pelayanan penilaian', 'default.png', 'Selesai diproses', 3, '2022-07-19 13:21:00', '2022-07-19 13:28:30', 37, 0, NULL, 0, 1, 'MR'),
(73, 1, '21-07-2022', '08:30', 'KPKNL Bandung', 'Luring', 'Lelang', 'default.png', 'Belum diproses', 1, '2022-07-20 22:32:08', '2022-07-20 22:32:08', 37, 0, NULL, 0, 0, 'MR'),
(74, 1, '22-07-2022', '10:25', 'Kanwil DJKN Jawa Barat', 'Daring', 'Pengelolaan Kekayaan Negara', 'default.png', 'Belum diproses', 1, '2022-07-20 22:34:38', '2022-07-21 14:22:58', 37, 0, NULL, 0, 0, 'MR'),
(76, 1, '21-07-2022', '09:25', 'Kanwil DJKN Jawa Barat', 'Luring', 'Pengelolaan Kekayaan Negara', 'default.png', 'Belum diproses', 2, '2022-07-21 02:02:56', '2022-07-21 14:32:51', 37, 0, NULL, 0, 0, 'MR'),
(77, 30, '25-07-2022', '08:10', 'Kanwil DJKN Jawa Barat', 'Luring', 'Lelang', '1658433264_e9a65940e8fd3204f8cd.png', 'Selesai diproses', 1, '2022-07-22 02:54:24', '2022-07-22 03:01:50', 37, 0, NULL, 0, 1, 'MR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
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
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idPegawai` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `idJabatan` int(11) NOT NULL,
  `idUnit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `nip`, `nama`, `email`, `jenisKelamin`, `password`, `status`, `created_at`, `updated_at`, `idJabatan`, `idUnit`) VALUES
(1, '6701193101', 'Aditia Dika', 'aditiadika04@gmail.com', 'Pria', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 1, 1),
(2, '6701193102', 'Putra', 'putra@gmail.com', 'Pria', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 2, 2),
(3, '6701193103', 'Sadie Sink', 'sink@gmail.com', 'Wanita', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 2, 3),
(4, '6701193104', 'Simon', 'simon@gmail.com', 'Wanita', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 3, 3),
(5, '6701194134', 'Reggi', 'reggi@gmail.com', 'Laki-laki', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 2, 5),
(6, '6701191011', 'Erda', 'erda@gmail.com', 'Laki-laki', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 3, 5),
(7, '6701191090', 'Kepala Kantor KPKNL', 'kepala@gmail.com', 'pria', '870f669e4bbbfa8a6fde65549826d1c4', 'Aktif', '2022-06-19 06:16:26', '2022-06-19 06:16:26', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_online`
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
  `idCustomer` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL DEFAULT 1,
  `Rating` int(11) NOT NULL DEFAULT 0,
  `Ulasan` varchar(255) DEFAULT NULL,
  `notifCustomer` int(1) NOT NULL DEFAULT 0,
  `notifPetugas` int(11) NOT NULL DEFAULT 0,
  `Tiket` varchar(5) NOT NULL DEFAULT 'PO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan_online`
--

INSERT INTO `pengaduan_online` (`idPengaduan`, `Judul`, `Isi`, `idKategori`, `Lampiran`, `Status`, `created_at`, `updated_at`, `idCustomer`, `idPetugas`, `Rating`, `Ulasan`, `notifCustomer`, `notifPetugas`, `Tiket`) VALUES
(11, 'Judul Pengaduan 1', 'Ini adalah isi dari Judul Pengaduan 1', 4, '1656347767_66058072dce4f69a2ffe.docx', 'Belum diproses', '2022-07-04 11:36:07', '2022-07-12 17:33:26', 37, 1, 0, NULL, 1, 0, 'PO');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penugasan`
--

CREATE TABLE `penugasan` (
  `noPenugasan` varchar(255) NOT NULL,
  `namaTugas` varchar(255) NOT NULL,
  `detailTugas` text NOT NULL,
  `tglPenugasan` datetime NOT NULL,
  `tenggatWaktu` datetime NOT NULL,
  `Lampiran` varchar(255) NOT NULL,
  `Laporan` varchar(255) NOT NULL,
  `NIP` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan_info`
--

CREATE TABLE `permohonan_info` (
  `idPermohonan` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL,
  `Isi` text NOT NULL,
  `Gambar` varchar(255) NOT NULL,
  `Form1` varchar(255) NOT NULL,
  `Form2` varchar(255) NOT NULL,
  `Form3` varchar(255) NOT NULL,
  `Form4` varchar(255) NOT NULL,
  `Form5` varchar(255) NOT NULL,
  `Form6` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `permohonan_info`
--

INSERT INTO `permohonan_info` (`idPermohonan`, `idPetugas`, `Isi`, `Gambar`, `Form1`, `Form2`, `Form3`, `Form4`, `Form5`, `Form6`, `updated_at`) VALUES
(1, 20, '<p>&nbsp;</p>\r\n<p><span style=\"font-size: 24pt;\"><strong><span style=\"color: #000000;\">Prosedur </span><span style=\"color: #000000;\">Permintaan Informasi Publik Pada Perangkat PPID DJKN</span></strong></span></p>\r\n<ul>\r\n<li>\r\n<p>1. Pemohon menyampaikan permintaan Informasi Publik kepada Perangkat PPID DJKN melalui:</p>\r\n<ul>\r\n<li><strong>Surat</strong>&nbsp;: Sesuai alamat Perangkat PPID DJKN</li>\r\n<li>PPID Tk. I Direktur Hukum dan Humas, Kantor Pusat DJKN</li>\r\n<li>PPID Tk. II Kepala Kanwil DJKN seluruh Indonesia dan BLU Lembaga Manajemen Aset Negara (LMAN)</li>\r\n<li>PPID Tk. III Kepala KPKNL seluruh Indonesia</li>\r\n<li><strong>Surat Elektronik (email)&nbsp;</strong>: ppid.djkn@kemenkeu.go.id</li>\r\n<li><strong>Datang Langsung&nbsp;</strong>: melalui walk-in Area Pelayanan Terpadu (APT) Perangkat PPID DJKN</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p>2. Dalam mengajukan permintaan Informasi Publik, Pemohon diwajibkan mengisi Formulir Registrasi Permintaan Informasi Publik dan melengkapi identitas yang sah. Dalam hal Pemohon adalah perseorangan diwajibkan untuk menyertakan fotokopi Kartu Tanda Penduduk (KTP) yang dapat membuktikan sebagai Warga Negara Indonesia (WNI). Apabila Pemohon adalah Badan Hukum diwajibkan menyertakan fotokopi Anggaran Dasar/Akta Pendirian yang telah disahkan oleh Kementerian Hukum dan HAM;</p>\r\n</li>\r\n<li>\r\n<p>3. Petugas Informasi pada Perangkat PPID DJKN melakukan verifikasi atas berkas kelengkapan permintaan Informasi Publik. Setelah dinyatakan lengkap, Petugas Informasi pada Perangkat PPID DJKN memberikan Nomor Registrasi Pendaftaran Informasi Publik dan memberikan fotokopi berkas kelengkapan permohonan Informasi Publik kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>4. Atas permintaan Informasi Publik yang diterima dan dinyatakan lengkap, Perangkat PPID memproses permintaan Informasi Publik dengan memberikan tanggapan tertulis kepada Pemohon dalam waktu 10 (sepuluh) hari kerja. Dalam hal Perangkat PPID DJKN membutuhkan tambahan waktu dalam memberikan tanggapan permintaan Informasi Publik, Perangkat PPID DJKN dapat melakukan perpanjangan waktu hingga 7 (tujuh) hari kerja dengan menyampaikan surat pemberitahuan perpanjangan tanggapan permintaan Informasi Publik kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>5. Pemohon Informasi Publik menerima pemberitahuan tertulis dan tanggapan dari Perangkat PPID DJKN paling lambat 10 (sepuluh) hari kerja sejak diterimanya permohonan dan dapat diperpanjang 7 (tujuh) hari kerja.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">Prosedur Permohonan Keberatan dan Sengketa Informasi Publik</h1>\r\n<ul>\r\n<li>\r\n<p>1. Pemohon menerima penjelasan tertulis atas permintaan Informasi Publik yang dimohonkan. Pemohon dapat mengajukan permohonan Keberatan Informasi Publik selambatnya 30 (tiga puluh) hari kerja setelah tanggapan tertulis Perangakat PPID;</p>\r\n</li>\r\n<li>\r\n<p>2. Pemohon dalam mengajukan permohonan Keberatan Informasi Publik diwajibkan mengisi Formulir Keberatan Informasi Publik dan memenuhi persyaratan (fotokopi KTP/Surat Kuasa/Bukti Pengesahan Badan Hukum) yang ditujukan kepada Atasan PPID Tk. I dalam hal ini adalah Direktur Jenderal Kekayaan Negara pada Kantor Pusat DJKN;</p>\r\n</li>\r\n<li>\r\n<p>3. Pemohon menyampaikan permohonan Keberatan Informasi Publik kepada Perangkat PPID DJKN melalui:</p>\r\n<ul>\r\n<li><strong>Surat</strong>&nbsp;: Sesuai alamat Perangkat PPID DJKN</li>\r\n<li>PPID Tk. I Direktur Hukum dan Humas, Kantor Pusat DJKN</li>\r\n<li>PPID Tk. II Kepala Kanwil DJKN seluruh Indonesia dan BLU Lembaga Manajemen Aset Negara (LMAN)</li>\r\n<li>PPID Tk. III Kepala KPKNL seluruh Indonesia</li>\r\n<li><strong>Surat Elektronik (email)&nbsp;</strong>: ppid.djkn@kemenkeu.go.id</li>\r\n<li><strong>Datang Langsung&nbsp;</strong>: melalui walk-in Area Pelayanan Terpadu (APT) Perangkat PPID DJKN</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p>4. Petugas Informasi pada Perangkat PPID DJKN melakukan verifikasi atas berkas kelengkapan permohonan Keberatan Informasi Publik. Setelah dinyatakan lengkap, Petugas Informasi pada Perangkat PPID DJKN memberikan Nomor Registrasi Pendaftaran Keberatan Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>5. Atasan PPID Tk. I DJKN cq. Direktur Jenderal Kekayaan Negara dalam waktu 30 (tiga puluh) hari kerja sejak permohonan Keberatan InformasiPublik diterima oleh petugas informasi, memiliki kewajiban untuk memberikan tanggapan tertulis kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>6. Dalam hal Pemohon tidak puas atas tanggapan Keberatan Informasi Publik yang diterbitkan oleh Atasan PPID Tk. I, Pemohon dapat mengajukan Sengketa Informasi Publik kepada Komisi Informasi Pusat.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">Prosedur Permohonan Penyelesaian Sengketa Informasi Publik<br />(Sesuai Pasal 37 dan Pasal 38 UU Nomor 14 Tahun)</h1>\r\n<ul>\r\n<li>\r\n<p>1. Upaya penyelesaian Sengketa Informasi Publik diajukan kepada Komisi Informasi apabila tanggapan Atasan PPID Tingkat I DJKN dalam proses Keberatan Informasi Publik tidak memuaskan Pemohon Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>2. Upaya penyelesaian Sengketa Informasi Publik diajukan dalam kurun waktu paling lambat 14 (empat belas) hari kerja setelah diterimanya tanggapan tertulis dari Atasan PPID Tingkat I DJKN;</p>\r\n</li>\r\n<li>\r\n<p>3. Komisi Informasi harus memulai mengupayakan penyelesaian Sengketa Informasi Publik melalui Mediasi dan/atau Ajudikasi Nonlitigasi paling lambat 14 (empat belas) hari kerja setelah menerima permohonan penyelesaian Sengketa Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>4. Proses penyelesaian Sengketa Informasi Publik paling lambat dapat diselesaikan dalam waktu 100 (seratus) hari kerja.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">WAKTU LAYANAN</h1>\r\n<p>Jam Layanan Informasi Publik pada Perangkat PPID DJKN<br />Senin s.d. Jumat - 08.00 s.d. 15.00 WIB<br /><br />Waktu Istirahat Layanan Informasi Publik pada Perangkat PPID DJKN<br />Senin s.d. Kamis - 12.15 s.d. 13.00 WIB<br />Jumat - 11.30 s.d. 13.15 WIB</p>\r\n<h1 class=\"title\">BIAYA DAN TARIF LAYANAN</h1>\r\n<p>Layanan Informasi Publik di lingkungan Direktorat Jenderal Kekayaan Negara (DJKN) Kementerian Keuangan tidak dipungut biaya, kecuali untuk informasi yang telah ditentukan biayanya sesuai dengan peraturan mengenai Penerimaan Negara Bukan Pajak (PNBP).<br />Adapun untuk biaya penggandaan atau perekeman yang timbul dari Permintaan Informasi Publik ditanggung dan menjadi tanggung jawab Pemohon Informasi Publik.</p>', '', 'lampiran', '', '', '', '', '', '2022-06-30 04:52:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas_apt`
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
-- Dumping data untuk tabel `petugas_apt`
--

INSERT INTO `petugas_apt` (`idPetugas`, `NIP`, `Nama`, `Email`, `Kantor`, `idLevel`, `Unit`, `Password`, `created_at`, `updated_at`) VALUES
(20, '112233445566', 'Dani Hipya', 'petugas@gmail.com', 'DJKN Jabar', 1, 5, '$2y$10$SNy2qu6COIcK8fqchwJ7Me6Q0mwDbSdNeMbBWR9jIhpwHYy8jJXWy', '2022-05-23 10:48:31', '2022-05-27 03:19:21'),
(21, '6701191112', 'Reggi Fachri', 'navi@gmail.com', 'KPKNL Bandung', 6, 5, '$2y$10$Wcm9ztV2.aQLph0QW.YZRuUKdJIHM2SPDVk6FOC5ozQ20F51DzaDK', '2022-05-25 02:16:56', '2022-06-19 14:09:29'),
(22, '6701191110', 'Erda Ulhaq', 'kepala@gmail.com', 'DJKN Jabar', 3, 5, '$2y$10$vRrnzmug.rC5zo3XJboPteW/dw.iuJOIrx/bLTKuCYcgEboyeA8J.', '2022-05-25 02:24:39', '2022-06-19 13:59:54'),
(24, '2233445566', 'Admin LP2', 'admin2@gmail.com', 'DJKN Jabar', 1, 5, '$2y$10$7PFLcDU4Q/zeVQ5SFC0IcukgTCAzNyTOcoyGx541wcCRJeYVt3U8m', '2022-06-07 16:43:32', '2022-06-19 14:08:07'),
(30, '12345678910', 'Petugas Loket', 'loket@gmail.com', 'KPKNL Bandung', 7, 5, '$2y$10$z5enATSyfuEHBudTddPXbucxBoDH4KLtl7ZU9aoVCzEP6OoXvoqqe', '2022-06-19 14:55:09', '2022-06-19 14:57:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanda_terima`
--

CREATE TABLE `tanda_terima` (
  `id_tt` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL,
  `Pengirim` varchar(255) NOT NULL,
  `No_surat` int(11) NOT NULL,
  `Tanggal` date NOT NULL,
  `Perihal` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanda_terima`
--

INSERT INTO `tanda_terima` (`id_tt`, `idPetugas`, `Pengirim`, `No_surat`, `Tanggal`, `Perihal`, `created_at`, `updated_at`) VALUES
(7, 21, 'Dani Hipya', 22445566, '2022-06-20', 'Pengelolaan Kekayaan Negara', '2022-06-19 13:15:38', '2022-06-19 13:15:38'),
(8, 21, 'Erda Dani Edit 2 kali', 112233, '2022-06-22', 'Pengelolaan Kekayaan Negara', '2022-06-19 13:18:14', '2022-06-19 13:24:26'),
(9, 21, 'erda', 65868767, '2022-06-21', 'penilaian', '2022-06-19 13:24:54', '2022-06-19 13:24:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan_mr`
--

CREATE TABLE `tanggapan_mr` (
  `idTanggapan_MR` int(11) NOT NULL,
  `Isi` text NOT NULL,
  `Lampiran` varchar(255) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `idMeeting` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan_mr`
--

INSERT INTO `tanggapan_mr` (`idTanggapan_MR`, `Isi`, `Lampiran`, `tgl_mulai`, `tgl_selesai`, `idMeeting`, `idPetugas`) VALUES
(12, 'ini contoh uraian tanggapan meeting request', '1654667366_66b70550ab28d7d77991.png', '2022-06-08 00:49:26', '2022-06-08 00:49:26', 41, 21),
(13, 'contoh tanggapan ', '1654667432_7aef78bb4c5af212d8e5.png', '2022-06-08 00:50:32', '2022-06-08 00:50:32', 42, 21),
(14, 'contoh tanggapan ygy', 'default.png', '2022-06-08 01:15:35', '2022-06-08 01:15:35', 41, 21),
(15, 'selesai diproses', 'default.png', '2022-06-08 01:16:48', '2022-06-08 01:16:48', 42, 21),
(16, 'COntoh uraian tanggapan', 'default.png', '2022-06-08 01:19:46', '2022-06-08 01:19:46', 41, 21),
(17, 'dadwadwdadwadwadwa', 'default.png', '2022-06-08 01:20:55', '2022-06-08 01:20:55', 43, 21),
(18, 'Ini contoh tanggapan selesai diproses oleh Reggi Fachri', 'default.png', '2022-06-09 13:12:35', '2022-06-09 13:12:35', 41, 21),
(19, 'Tanggapan untuk pelayanan penilaian', 'default.png', '2022-06-09 13:14:05', '2022-06-09 13:14:05', 43, 21),
(20, 'TIdak Sanggup lagi ', 'default.png', '2022-06-09 13:15:44', '2022-06-09 13:15:44', 44, 22),
(21, 'Contoh Tanggapan eskalasi', 'default.png', '2022-06-09 20:50:32', '2022-06-09 20:50:32', 45, 22),
(22, 'Tanggapan reggi fachri hasil supervisor', 'default.png', '2022-06-09 20:52:29', '2022-06-09 20:52:29', 45, 21),
(23, 'Dieskalasi ke supervisor Reggi', 'default.png', '2022-06-09 20:58:53', '2022-06-09 20:58:53', 46, 24),
(24, 'tanggapan di eskalasi ke reggi fachri', 'default.png', '2022-06-09 21:21:43', '2022-06-09 21:21:43', 47, 24),
(25, 'Ini conoh tanggapan untuk mencoba fitur tracking meeting request', 'default.png', '2022-06-16 02:43:00', '2022-06-16 02:43:00', 48, 24),
(26, 'Ini contoh tanggapan di level petugas lokett', '1655376366_f3555277fcfed2113ccf.png', '2022-06-16 05:46:06', '2022-06-16 05:46:06', 49, 24),
(27, 'tidak kuat masszeeeh', 'default.png', '2022-06-16 05:47:25', '2022-06-16 05:47:25', 49, 24),
(28, 'Ini tanggapan dari supervisor', 'default.png', '2022-06-16 05:49:02', '2022-06-16 05:49:02', 44, 21),
(29, 'Ini tanggapan sedang diproses', 'default.png', '2022-06-17 15:07:19', '2022-06-17 15:07:19', 50, 24),
(30, 'Petugas loket tidak kuasa menghadapi customer ini', 'default.png', '2022-06-17 15:19:15', '2022-06-17 15:19:15', 50, 24),
(31, 'Ini tanggapan ketiga setelah eskalasi ke supervisor', 'default.png', '2022-06-17 15:23:22', '2022-06-17 15:23:22', 50, 21),
(32, 'Meeting request selesai diproses oleh supervisor', 'default.png', '2022-06-17 15:31:08', '2022-06-17 15:31:08', 50, 21),
(33, 'contoh tanggapan tidak disetujui', 'default.png', '2022-06-19 15:55:14', '2022-06-19 15:55:14', 53, 30),
(34, 'isi eskalasi', 'default.png', '2022-07-02 06:54:58', '2022-07-02 06:54:58', 58, 30),
(35, 'isi tanggapan', 'default.png', '2022-07-02 08:16:31', '2022-07-02 08:16:31', 59, 30),
(36, 'meeting request selesai diproses', 'default.png', '2022-07-03 20:52:52', '2022-07-03 20:52:52', 58, 21),
(37, 'contoh eskkalasi ke supervisor', 'default.png', '2022-07-03 22:38:18', '2022-07-03 22:38:18', 62, 30),
(38, 'proses selesai', 'default.png', '2022-07-03 22:46:05', '2022-07-03 22:46:05', 62, 21),
(39, 'Contoh uraian tanggapan untuk meeting request dari petugas loket', 'default.png', '2022-07-12 13:09:15', '2022-07-12 13:09:15', 66, 30),
(40, 'tanggapan selesai diproses dari supervisor', 'default.png', '2022-07-12 13:11:07', '2022-07-12 13:11:07', 66, 21),
(41, 'Ini contoh tanggapan dengan status sedang diproses', 'default.png', '2022-07-19 13:25:12', '2022-07-19 13:25:12', 69, 30),
(42, 'Contoh tanggapan untuk meeting request sedang diproses', 'default.png', '2022-07-19 13:26:02', '2022-07-19 13:26:02', 65, 30),
(43, 'Contoh tanggapan yang langsung dieskalasi ke supervisor', 'default.png', '2022-07-19 13:26:36', '2022-07-19 13:26:36', 67, 30),
(44, 'contoh pelayanan selesai diproses', 'default.png', '2022-07-19 13:28:23', '2022-07-19 13:28:23', 69, 30),
(45, 'ini contoh tanggapan meeting request', 'default.png', '2022-07-22 03:01:35', '2022-07-22 03:01:35', 77, 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan_po`
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
  `idPengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `idUnit` int(11) NOT NULL,
  `namaUnit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`idUnit`, `namaUnit`) VALUES
(1, 'KPKNL'),
(2, 'Sub Bagian Umum'),
(3, 'Seksi Piutang Negara'),
(4, 'Seksi Pengelolaan Kekayaan Negara'),
(5, 'Seksi Hukum dan Informasi'),
(6, 'Seksi Kepatuhan Internal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uploads`
--

CREATE TABLE `uploads` (
  `id_uploads` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `uploads`
--

INSERT INTO `uploads` (`id_uploads`, `Judul`, `Kategori`) VALUES
(23, 'Judul Berita', 'Gambar Lampiran Informasi'),
(55, 'Judul Berita 5', 'Gambar Lampiran Informasi'),
(299, 'Judul Pengumuman entah keberapa', 'Gambar Lampiran Informasi'),
(407, 'Judul Berita 1', 'Gambar Lampiran Informasi'),
(519, 'Judul Berita 4', 'Gambar Lampiran Informasi'),
(674, 'Judul Berita', 'Gambar Lampiran Informasi'),
(828, 'Judul Berita 2', 'Gambar Lampiran Informasi'),
(859, 'Judul Berita Terbaru', 'Gambar Lampiran Informasi'),
(907, 'Judul Artikel 3', 'Gambar Lampiran Informasi'),
(972, 'Judul Pengumuman 4 dengan Gambar Lampiran', 'Gambar Lampiran Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `idLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `Email`, `Password`, `idLevel`) VALUES
(1, 'admin2@gmail.com', '$2y$10$7PFLcDU4Q/zeVQ5SFC0IcukgTCAzNyTOcoyGx541wcCRJeYVt3U8m', 1),
(2, 'erdaulhaqdani@gmail.com', '$2y$10$aCYlaKdnfjL4SW3suKlgMuHa1LNxrI9vywuWt1z7ZHNHzthQwrMZ6', 5),
(3, 'kepala@gmail.com', '$2y$10$vRrnzmug.rC5zo3XJboPteW/dw.iuJOIrx/bLTKuCYcgEboyeA8J.', 3),
(4, 'loket@gmail.com', '$2y$10$z5enATSyfuEHBudTddPXbucxBoDH4KLtl7ZU9aoVCzEP6OoXvoqqe', 7),
(5, 'navi@gmail.com', '$2y$10$Wcm9ztV2.aQLph0QW.YZRuUKdJIHM2SPDVk6FOC5ozQ20F51DzaDK', 6),
(6, 'petugas@gmail.com', '$2y$10$SNy2qu6COIcK8fqchwJ7Me6Q0mwDbSdNeMbBWR9jIhpwHYy8jJXWy', 1),
(7, 'zmika360@gmail.com', '$2y$10$SM9mii0s9K3xQdVdFAaw6OKk6hN8lIOzngvqo21lBioScwD8o.cXG', 5),
(15, 'danihipya@student.telkomuniversity.ac.id', '$2y$10$K0PgBMwKl57as1ySG.vgOOCKfoqsE7eMSl0EyvZIwP17Hhb4YCWMa', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `idPetugas` (`idPetugas`),
  ADD KEY `id_uploads` (`id_uploads`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`),
  ADD KEY `customer-user` (`Email`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_uploads` (`id_uploads`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indeks untuk tabel `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`idLevel`);

--
-- Indeks untuk tabel `meeting_request`
--
ALTER TABLE `meeting_request`
  ADD PRIMARY KEY (`idMeeting`),
  ADD KEY `idKategori` (`idKategori`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`),
  ADD KEY `idJabatan` (`idJabatan`),
  ADD KEY `idUnit` (`idUnit`);

--
-- Indeks untuk tabel `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  ADD PRIMARY KEY (`idPengaduan`),
  ADD KEY `pengaduan_kategori` (`idKategori`),
  ADD KEY `pengaduan_customer` (`idCustomer`);

--
-- Indeks untuk tabel `permohonan_info`
--
ALTER TABLE `permohonan_info`
  ADD PRIMARY KEY (`idPermohonan`);

--
-- Indeks untuk tabel `petugas_apt`
--
ALTER TABLE `petugas_apt`
  ADD PRIMARY KEY (`idPetugas`),
  ADD KEY `petugas-level` (`idLevel`),
  ADD KEY `Unit` (`Unit`),
  ADD KEY `petugas-email` (`Email`);

--
-- Indeks untuk tabel `tanda_terima`
--
ALTER TABLE `tanda_terima`
  ADD PRIMARY KEY (`id_tt`);

--
-- Indeks untuk tabel `tanggapan_mr`
--
ALTER TABLE `tanggapan_mr`
  ADD PRIMARY KEY (`idTanggapan_MR`),
  ADD KEY `idMeeting` (`idMeeting`),
  ADD KEY `index_idPetugas` (`idPetugas`);

--
-- Indeks untuk tabel `tanggapan_po`
--
ALTER TABLE `tanggapan_po`
  ADD PRIMARY KEY (`idTanggapan_PO`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`idUnit`);

--
-- Indeks untuk tabel `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id_uploads`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idJabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `level_user`
--
ALTER TABLE `level_user`
  MODIFY `idLevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `meeting_request`
--
ALTER TABLE `meeting_request`
  MODIFY `idMeeting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idPegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  MODIFY `idPengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `petugas_apt`
--
ALTER TABLE `petugas_apt`
  MODIFY `idPetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tanda_terima`
--
ALTER TABLE `tanda_terima`
  MODIFY `id_tt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tanggapan_mr`
--
ALTER TABLE `tanggapan_mr`
  MODIFY `idTanggapan_MR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tanggapan_po`
--
ALTER TABLE `tanggapan_po`
  MODIFY `idTanggapan_PO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `unit`
--
ALTER TABLE `unit`
  MODIFY `idUnit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_fk_1` FOREIGN KEY (`idPetugas`) REFERENCES `petugas_apt` (`idPetugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer-levelUser` FOREIGN KEY (`idLevel`) REFERENCES `level_user` (`idLevel`),
  ADD CONSTRAINT `customer-user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Ketidakleluasaan untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_fk_1` FOREIGN KEY (`id_uploads`) REFERENCES `uploads` (`id_uploads`);

--
-- Ketidakleluasaan untuk tabel `meeting_request`
--
ALTER TABLE `meeting_request`
  ADD CONSTRAINT `meeting_request_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`idJabatan`) REFERENCES `jabatan` (`idJabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`idUnit`) REFERENCES `unit` (`idUnit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  ADD CONSTRAINT `pengaduan_customer` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_kategori` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`);

--
-- Ketidakleluasaan untuk tabel `petugas_apt`
--
ALTER TABLE `petugas_apt`
  ADD CONSTRAINT `petugas-kategori_unit` FOREIGN KEY (`Unit`) REFERENCES `kategori` (`idKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `petugas-level` FOREIGN KEY (`idLevel`) REFERENCES `level_user` (`idLevel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan_mr`
--
ALTER TABLE `tanggapan_mr`
  ADD CONSTRAINT `Tanggapan_fk` FOREIGN KEY (`idPetugas`) REFERENCES `petugas_apt` (`idPetugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

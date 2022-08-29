-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2022 at 06:43 PM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u1582902_kanwil`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
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
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `idPetugas`, `id_uploads`, `Judul`, `Kategori`, `Isi`, `Penulis`, `Gambar`, `Status`, `tgl_kegiatan`, `created_at`, `updated_at`) VALUES
(32, 20, 31, 'Judul Berita 1', 'Berita', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin mi et dapibus suscipit. Vivamus risus enim, ullamcorper ac sollicitudin sed, porta ac mi. Mauris at velit at augue porttitor vestibulum ac vel turpis. Maecenas ut sagittis magna. Nunc venenatis leo et accumsan auctor. Cras cursus pharetra eros, ut elementum dui rhoncus vel. Quisque tincidunt nibh in mi tincidunt dapibus. Aenean quis scelerisque odio, ut consectetur urna. Vivamus quis ultricies nisl. Sed vitae ipsum dolor. Nam et arcu diam. Vivamus odio mauris, porttitor et mollis non, eleifend eget ex. Aenean mattis felis eget pellentesque cursus. Duis turpis nisl, venenatis id malesuada id, finibus at risus.</p>\r\n<p>Etiam malesuada, magna vel molestie tempor, quam risus laoreet nibh, nec varius neque quam at nisl. Praesent egestas diam eget tellus mattis, sed facilisis enim mattis. Nunc vel elit gravida, vestibulum nisi ac, aliquam velit. Fusce vitae finibus leo. Etiam in semper ante, non rutrum leo. Morbi tellus augue, iaculis ut purus vitae, facilisis luctus nunc. Ut sed faucibus velit. Suspendisse pulvinar risus a viverra lacinia. Praesent nec vulputate lorem. Cras diam lacus, ultrices vitae varius vel, pharetra quis nisi. Suspendisse ac rhoncus lorem, vitae tristique elit. Nam vel pellentesque nisi. Maecenas eu feugiat mi. Morbi iaculis nulla eu velit ullamcorper, sit amet hendrerit risus ornare. Donec faucibus ligula leo, at eleifend nibh aliquet sed.</p>', 'Penulis Berita', '1658805562_b338293af950ae551ca2.jpg', 'Publik', NULL, '2022-07-26 10:19:22', '2022-07-26 10:42:13'),
(33, 20, 0, 'Judul Berita 2', 'Berita', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin mi et dapibus suscipit. Vivamus risus enim, ullamcorper ac sollicitudin sed, porta ac mi. Mauris at velit at augue porttitor vestibulum ac vel turpis. Maecenas ut sagittis magna. Nunc venenatis leo et accumsan auctor. Cras cursus pharetra eros, ut elementum dui rhoncus vel. Quisque tincidunt nibh in mi tincidunt dapibus. Aenean quis scelerisque odio, ut consectetur urna. Vivamus quis ultricies nisl. Sed vitae ipsum dolor. Nam et arcu diam. Vivamus odio mauris, porttitor et mollis non, eleifend eget ex. Aenean mattis felis eget pellentesque cursus. Duis turpis nisl, venenatis id malesuada id, finibus at risus.</p>\r\n<p>Etiam malesuada, magna vel molestie tempor, quam risus laoreet nibh, nec varius neque quam at nisl. Praesent egestas diam eget tellus mattis, sed facilisis enim mattis. Nunc vel elit gravida, vestibulum nisi ac, aliquam velit. Fusce vitae finibus leo. Etiam in semper ante, non rutrum leo. Morbi tellus augue, iaculis ut purus vitae, facilisis luctus nunc. Ut sed faucibus velit. Suspendisse pulvinar risus a viverra lacinia. Praesent nec vulputate lorem. Cras diam lacus, ultrices vitae varius vel, pharetra quis nisi. Suspendisse ac rhoncus lorem, vitae tristique elit. Nam vel pellentesque nisi. Maecenas eu feugiat mi. Morbi iaculis nulla eu velit ullamcorper, sit amet hendrerit risus ornare. Donec faucibus ligula leo, at eleifend nibh aliquet sed.</p>', 'Penulis Berita', '1658805594_234ee1dfe8977b4685ff.jpg', 'Publik', NULL, '2022-07-26 10:19:54', '2022-07-26 10:22:45'),
(34, 20, 0, 'Judul Berita 3', 'Berita', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin mi et dapibus suscipit. Vivamus risus enim, ullamcorper ac sollicitudin sed, porta ac mi. Mauris at velit at augue porttitor vestibulum ac vel turpis. Maecenas ut sagittis magna. Nunc venenatis leo et accumsan auctor. Cras cursus pharetra eros, ut elementum dui rhoncus vel. Quisque tincidunt nibh in mi tincidunt dapibus. Aenean quis scelerisque odio, ut consectetur urna. Vivamus quis ultricies nisl. Sed vitae ipsum dolor. Nam et arcu diam. Vivamus odio mauris, porttitor et mollis non, eleifend eget ex. Aenean mattis felis eget pellentesque cursus. Duis turpis nisl, venenatis id malesuada id, finibus at risus.</p>\r\n<p>Etiam malesuada, magna vel molestie tempor, quam risus laoreet nibh, nec varius neque quam at nisl. Praesent egestas diam eget tellus mattis, sed facilisis enim mattis. Nunc vel elit gravida, vestibulum nisi ac, aliquam velit. Fusce vitae finibus leo. Etiam in semper ante, non rutrum leo. Morbi tellus augue, iaculis ut purus vitae, facilisis luctus nunc. Ut sed faucibus velit. Suspendisse pulvinar risus a viverra lacinia. Praesent nec vulputate lorem. Cras diam lacus, ultrices vitae varius vel, pharetra quis nisi. Suspendisse ac rhoncus lorem, vitae tristique elit. Nam vel pellentesque nisi. Maecenas eu feugiat mi. Morbi iaculis nulla eu velit ullamcorper, sit amet hendrerit risus ornare. Donec faucibus ligula leo, at eleifend nibh aliquet sed.</p>', 'Penulis Berita', '1658805624_abbfc89e69d461056b84.jpg', 'Publik', NULL, '2022-07-26 10:20:24', '2022-07-26 10:22:42'),
(35, 20, 0, 'Judul Pengumuman 1', 'Pengumuman', '<p>Sed non eros neque. Cras at nisl at tellus interdum venenatis. Etiam quis ante quis augue dapibus blandit eget quis ante. Maecenas urna augue, vulputate non urna non, condimentum vehicula purus. Duis in felis feugiat, commodo neque in, scelerisque ante. Nullam semper ut diam nec tincidunt. Nulla iaculis nibh tempus, aliquam enim et, ornare felis.</p>\r\n<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>\r\n<p>Suspendisse nec dui semper mi tristique tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque id mattis enim. Phasellus ultricies vitae quam ac blandit. In sit amet mattis ante. Praesent id egestas ligula, malesuada facilisis dolor. Curabitur at gravida est, nec posuere est. Morbi commodo, eros vel mattis semper, orci felis cursus turpis, at tristique erat lorem vel nisi. Fusce nec arcu vitae tortor ultrices auctor. Pellentesque ut risus rutrum, tempus mauris id, feugiat ipsum. Nam molestie congue dolor ut mollis. Fusce et nisi et nunc convallis faucibus.</p>', 'Penulis Pengumuman', '1658805661_1c7eed9a33cfdafacf69.jpg', 'Publik', NULL, '2022-07-26 10:21:01', '2022-07-26 10:22:38'),
(36, 20, 0, 'Judul Pengumuman 2', 'Pengumuman', '<p>Sed non eros neque. Cras at nisl at tellus interdum venenatis. Etiam quis ante quis augue dapibus blandit eget quis ante. Maecenas urna augue, vulputate non urna non, condimentum vehicula purus. Duis in felis feugiat, commodo neque in, scelerisque ante. Nullam semper ut diam nec tincidunt. Nulla iaculis nibh tempus, aliquam enim et, ornare felis.</p>\r\n<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>\r\n<p>Suspendisse nec dui semper mi tristique tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque id mattis enim. Phasellus ultricies vitae quam ac blandit. In sit amet mattis ante. Praesent id egestas ligula, malesuada facilisis dolor. Curabitur at gravida est, nec posuere est. Morbi commodo, eros vel mattis semper, orci felis cursus turpis, at tristique erat lorem vel nisi. Fusce nec arcu vitae tortor ultrices auctor. Pellentesque ut risus rutrum, tempus mauris id, feugiat ipsum. Nam molestie congue dolor ut mollis. Fusce et nisi et nunc convallis faucibus.</p>', 'Penulis Pengumuman', '1658805698_6dcc7ac1ec29189ef366.jpg', 'Publik', NULL, '2022-07-26 10:21:38', '2022-07-26 10:22:35'),
(37, 20, 4, 'Judul Pengumuman 3', 'Pengumuman', '<p>Sed non eros neque. Cras at nisl at tellus interdum venenatis. Etiam quis ante quis augue dapibus blandit eget quis ante. Maecenas urna augue, vulputate non urna non, condimentum vehicula purus. Duis in felis feugiat, commodo neque in, scelerisque ante. Nullam semper ut diam nec tincidunt. Nulla iaculis nibh tempus, aliquam enim et, ornare felis.</p>\r\n<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>\r\n<p>Suspendisse nec dui semper mi tristique tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque id mattis enim. Phasellus ultricies vitae quam ac blandit. In sit amet mattis ante. Praesent id egestas ligula, malesuada facilisis dolor. Curabitur at gravida est, nec posuere est. Morbi commodo, eros vel mattis semper, orci felis cursus turpis, at tristique erat lorem vel nisi. Fusce nec arcu vitae tortor ultrices auctor. Pellentesque ut risus rutrum, tempus mauris id, feugiat ipsum. Nam molestie congue dolor ut mollis. Fusce et nisi et nunc convallis faucibus.</p>', 'Penulis Pengumuman', '1658805819_9fc95e9c86526796b6ff.jpg', 'Publik', NULL, '2022-07-26 10:23:39', '2022-07-26 10:41:21'),
(38, 20, 0, 'Judul Artikel 1', 'Artikel', '<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>\r\n<p>Suspendisse nec dui semper mi tristique tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque id mattis enim. Phasellus ultricies vitae quam ac blandit. In sit amet mattis ante. Praesent id egestas ligula, malesuada facilisis dolor. Curabitur at gravida est, nec posuere est. Morbi commodo, eros vel mattis semper, orci felis cursus turpis, at tristique erat lorem vel nisi. Fusce nec arcu vitae tortor ultrices auctor. Pellentesque ut risus rutrum, tempus mauris id, feugiat ipsum. Nam molestie congue dolor ut mollis. Fusce et nisi et nunc convallis faucibus.</p>', 'Penulis Artikel', '1658807046_efecd723dc4ef8915b22.jpg', 'Publik', NULL, '2022-07-26 10:44:06', '2022-07-26 10:44:49'),
(39, 20, 0, 'Judul Artikel 2', 'Artikel', '<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>\r\n<p>Suspendisse nec dui semper mi tristique tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque id mattis enim. Phasellus ultricies vitae quam ac blandit. In sit amet mattis ante. Praesent id egestas ligula, malesuada facilisis dolor. Curabitur at gravida est, nec posuere est. Morbi commodo, eros vel mattis semper, orci felis cursus turpis, at tristique erat lorem vel nisi. Fusce nec arcu vitae tortor ultrices auctor. Pellentesque ut risus rutrum, tempus mauris id, feugiat ipsum. Nam molestie congue dolor ut mollis. Fusce et nisi et nunc convallis faucibus.</p>', 'Penulis Artikel', '1658807076_9de1ea992105a3c7ccbd.jpg', 'Publik', NULL, '2022-07-26 10:44:36', '2022-07-26 10:44:46'),
(40, 20, 0, 'Judul Artikel 3', 'Artikel', '<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>\r\n<p>Suspendisse nec dui semper mi tristique tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Quisque id mattis enim. Phasellus ultricies vitae quam ac blandit. In sit amet mattis ante. Praesent id egestas ligula, malesuada facilisis dolor. Curabitur at gravida est, nec posuere est. Morbi commodo, eros vel mattis semper, orci felis cursus turpis, at tristique erat lorem vel nisi. Fusce nec arcu vitae tortor ultrices auctor. Pellentesque ut risus rutrum, tempus mauris id, feugiat ipsum. Nam molestie congue dolor ut mollis. Fusce et nisi et nunc convallis faucibus.</p>', 'Penulis Artikel', '1658808991_5d6e34427d3ea9cb1c73.jpg', 'Publik', NULL, '2022-07-26 11:16:31', '2022-07-26 11:18:45'),
(41, 20, 0, 'Judul Kilas Peristiwa 1', 'Kilas Peristiwa', '<p style=\"text-align: justify;\">Etiam malesuada, magna vel molestie tempor, quam risus laoreet nibh, nec varius neque quam at nisl. Praesent egestas diam eget tellus mattis, sed facilisis enim mattis. Nunc vel elit gravida, vestibulum nisi ac, aliquam velit. Fusce vitae finibus leo. Etiam in semper ante, non rutrum leo. Morbi tellus augue, iaculis ut purus vitae, facilisis luctus nunc. Ut sed faucibus velit. Suspendisse pulvinar risus a viverra lacinia. Praesent nec vulputate lorem. Cras diam lacus, ultrices vitae varius vel, pharetra quis nisi. Suspendisse ac rhoncus lorem, vitae tristique elit. Nam vel pellentesque nisi. Maecenas eu feugiat mi. Morbi iaculis nulla eu velit ullamcorper, sit amet hendrerit risus ornare. Donec faucibus ligula leo, at eleifend nibh aliquet sed.</p>\r\n<p style=\"text-align: justify;\">Sed non eros neque. Cras at nisl at tellus interdum venenatis. Etiam quis ante quis augue dapibus blandit eget quis ante. Maecenas urna augue, vulputate non urna non, condimentum vehicula purus. Duis in felis feugiat, commodo neque in, scelerisque ante. Nullam semper ut diam nec tincidunt. Nulla iaculis nibh tempus, aliquam enim et, ornare felis.</p>\r\n<p style=\"text-align: justify;\">Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>', 'Penulis Peristiwa', '1658809035_8baf8e49e8e81d7efff3.jpg', 'Publik', NULL, '2022-07-26 11:17:15', '2022-07-26 11:18:43'),
(42, 20, 0, 'Judul Kilas Peristiwa 2', 'Kilas Peristiwa', '<p>Etiam malesuada, magna vel molestie tempor, quam risus laoreet nibh, nec varius neque quam at nisl. Praesent egestas diam eget tellus mattis, sed facilisis enim mattis. Nunc vel elit gravida, vestibulum nisi ac, aliquam velit. Fusce vitae finibus leo. Etiam in semper ante, non rutrum leo. Morbi tellus augue, iaculis ut purus vitae, facilisis luctus nunc. Ut sed faucibus velit. Suspendisse pulvinar risus a viverra lacinia. Praesent nec vulputate lorem. Cras diam lacus, ultrices vitae varius vel, pharetra quis nisi. Suspendisse ac rhoncus lorem, vitae tristique elit. Nam vel pellentesque nisi. Maecenas eu feugiat mi. Morbi iaculis nulla eu velit ullamcorper, sit amet hendrerit risus ornare. Donec faucibus ligula leo, at eleifend nibh aliquet sed.</p>\r\n<p>Sed non eros neque. Cras at nisl at tellus interdum venenatis. Etiam quis ante quis augue dapibus blandit eget quis ante. Maecenas urna augue, vulputate non urna non, condimentum vehicula purus. Duis in felis feugiat, commodo neque in, scelerisque ante. Nullam semper ut diam nec tincidunt. Nulla iaculis nibh tempus, aliquam enim et, ornare felis.</p>\r\n<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>', 'Penulis Peristiwa', '1658809064_f6e7d8594ac374bec05a.jpg', 'Publik', NULL, '2022-07-26 11:17:44', '2022-07-26 11:18:40'),
(43, 20, 0, 'Judul Kilas Peristiwa 3', 'Kilas Peristiwa', '<p>Etiam malesuada, magna vel molestie tempor, quam risus laoreet nibh, nec varius neque quam at nisl. Praesent egestas diam eget tellus mattis, sed facilisis enim mattis. Nunc vel elit gravida, vestibulum nisi ac, aliquam velit. Fusce vitae finibus leo. Etiam in semper ante, non rutrum leo. Morbi tellus augue, iaculis ut purus vitae, facilisis luctus nunc. Ut sed faucibus velit. Suspendisse pulvinar risus a viverra lacinia. Praesent nec vulputate lorem. Cras diam lacus, ultrices vitae varius vel, pharetra quis nisi. Suspendisse ac rhoncus lorem, vitae tristique elit. Nam vel pellentesque nisi. Maecenas eu feugiat mi. Morbi iaculis nulla eu velit ullamcorper, sit amet hendrerit risus ornare. Donec faucibus ligula leo, at eleifend nibh aliquet sed.</p>\r\n<p>Sed non eros neque. Cras at nisl at tellus interdum venenatis. Etiam quis ante quis augue dapibus blandit eget quis ante. Maecenas urna augue, vulputate non urna non, condimentum vehicula purus. Duis in felis feugiat, commodo neque in, scelerisque ante. Nullam semper ut diam nec tincidunt. Nulla iaculis nibh tempus, aliquam enim et, ornare felis.</p>\r\n<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>', 'Penulis Peristiwa', '1658809111_a0610096f94d310092c1.jpg', 'Publik', NULL, '2022-07-26 11:18:31', '2022-07-26 11:18:37'),
(44, 20, 0, 'Judul Agenda 1', 'Agenda', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin mi et dapibus suscipit. Vivamus risus enim, ullamcorper ac sollicitudin sed, porta ac mi. Mauris at velit at augue porttitor vestibulum ac vel turpis. Maecenas ut sagittis magna. Nunc venenatis leo et accumsan auctor. Cras cursus pharetra eros, ut elementum dui rhoncus vel. Quisque tincidunt nibh in mi tincidunt dapibus. Aenean quis scelerisque odio, ut consectetur urna. Vivamus quis ultricies nisl. Sed vitae ipsum dolor. Nam et arcu diam. Vivamus odio mauris, porttitor et mollis non, eleifend eget ex. Aenean mattis felis eget pellentesque cursus. Duis turpis nisl, venenatis id malesuada id, finibus at risus.</p>\r\n<p>Etiam malesuada, magna vel molestie tempor, quam risus laoreet nibh, nec varius neque quam at nisl. Praesent egestas diam eget tellus mattis, sed facilisis enim mattis. Nunc vel elit gravida, vestibulum nisi ac, aliquam velit. Fusce vitae finibus leo. Etiam in semper ante, non rutrum leo. Morbi tellus augue, iaculis ut purus vitae, facilisis luctus nunc. Ut sed faucibus velit. Suspendisse pulvinar risus a viverra lacinia. Praesent nec vulputate lorem. Cras diam lacus, ultrices vitae varius vel, pharetra quis nisi. Suspendisse ac rhoncus lorem, vitae tristique elit. Nam vel pellentesque nisi. Maecenas eu feugiat mi. Morbi iaculis nulla eu velit ullamcorper, sit amet hendrerit risus ornare. Donec faucibus ligula leo, at eleifend nibh aliquet sed.</p>\r\n<p>Sed non eros neque. Cras at nisl at tellus interdum venenatis. Etiam quis ante quis augue dapibus blandit eget quis ante. Maecenas urna augue, vulputate non urna non, condimentum vehicula purus. Duis in felis feugiat, commodo neque in, scelerisque ante. Nullam semper ut diam nec tincidunt. Nulla iaculis nibh tempus, aliquam enim et, ornare felis.</p>\r\n<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>', 'Penulis Agenda', '1658818092_1d1e7abd05bd43a8cc72.jpg', 'Diarsipkan', '2022-07-30', '2022-07-26 13:48:12', '2022-07-26 13:48:12'),
(45, 20, 0, 'Judul Agenda 2', 'Agenda', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sollicitudin mi et dapibus suscipit. Vivamus risus enim, ullamcorper ac sollicitudin sed, porta ac mi. Mauris at velit at augue porttitor vestibulum ac vel turpis. Maecenas ut sagittis magna. Nunc venenatis leo et accumsan auctor. Cras cursus pharetra eros, ut elementum dui rhoncus vel. Quisque tincidunt nibh in mi tincidunt dapibus. Aenean quis scelerisque odio, ut consectetur urna. Vivamus quis ultricies nisl. Sed vitae ipsum dolor. Nam et arcu diam. Vivamus odio mauris, porttitor et mollis non, eleifend eget ex. Aenean mattis felis eget pellentesque cursus. Duis turpis nisl, venenatis id malesuada id, finibus at risus.</p>\r\n<p>Etiam malesuada, magna vel molestie tempor, quam risus laoreet nibh, nec varius neque quam at nisl. Praesent egestas diam eget tellus mattis, sed facilisis enim mattis. Nunc vel elit gravida, vestibulum nisi ac, aliquam velit. Fusce vitae finibus leo. Etiam in semper ante, non rutrum leo. Morbi tellus augue, iaculis ut purus vitae, facilisis luctus nunc. Ut sed faucibus velit. Suspendisse pulvinar risus a viverra lacinia. Praesent nec vulputate lorem. Cras diam lacus, ultrices vitae varius vel, pharetra quis nisi. Suspendisse ac rhoncus lorem, vitae tristique elit. Nam vel pellentesque nisi. Maecenas eu feugiat mi. Morbi iaculis nulla eu velit ullamcorper, sit amet hendrerit risus ornare. Donec faucibus ligula leo, at eleifend nibh aliquet sed.</p>\r\n<p>Sed non eros neque. Cras at nisl at tellus interdum venenatis. Etiam quis ante quis augue dapibus blandit eget quis ante. Maecenas urna augue, vulputate non urna non, condimentum vehicula purus. Duis in felis feugiat, commodo neque in, scelerisque ante. Nullam semper ut diam nec tincidunt. Nulla iaculis nibh tempus, aliquam enim et, ornare felis.</p>\r\n<p>Curabitur arcu ligula, convallis cursus tellus sed, ultrices vestibulum urna. Proin congue a urna in rhoncus. Donec nec venenatis libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc ac euismod ante. Nulla facilisi. Integer sit amet convallis sem, ut egestas augue. Aenean sit amet tortor sit amet lectus ultricies consectetur in sed urna.</p>', 'Penulis Agenda', '1658818127_67dcb3cce53af6f1a948.jpg', 'Publik', '2022-07-29', '2022-07-26 13:48:48', '2022-07-26 13:48:51'),
(46, 20, 0, 'Judul Agenda 3', 'Agenda', '<p>Pellentesque commodo iaculis felis non ultrices. In magna nisi, luctus et aliquet nec, pharetra vel lectus. Vivamus a ex lobortis velit porta gravida. Mauris lobortis eleifend risus sit amet eleifend. In maximus ex nibh, at aliquet quam sagittis non. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras congue nisi non ultrices sollicitudin. Pellentesque fermentum tellus felis, at pretium risus viverra eu. Donec venenatis est vitae turpis feugiat venenatis. Ut id ligula turpis. Donec iaculis tempus risus, vel interdum dui ultrices quis. Vestibulum non tristique metus. Curabitur id elit aliquam, posuere arcu id, placerat risus. Praesent nec euismod lectus, eu tempus lacus. Donec ullamcorper ligula velit, ac ultrices quam sagittis ac. Nullam hendrerit erat id sapien convallis posuere.</p>\r\n<p>Proin maximus sapien ut vulputate iaculis. Proin bibendum porta libero, vitae maximus felis dapibus non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam suscipit felis ex. Etiam nec erat mauris. In iaculis, justo at lacinia ullamcorper, nibh sapien consequat justo, vel dictum sem nunc id ex. Duis turpis nisi, ultrices blandit maximus nec, suscipit non nunc. Morbi ullamcorper sollicitudin felis et tincidunt. Nam imperdiet commodo metus ut finibus. Nulla quis enim a felis commodo mollis non sit amet velit. Maecenas pulvinar odio vulputate risus mollis tincidunt. Duis sed augue sit amet libero scelerisque tincidunt vel consectetur urna. Quisque mollis finibus hendrerit. Curabitur malesuada lacus a dignissim rutrum. Nulla gravida diam mi, non pellentesque augue tempus vitae. Morbi in lorem ut urna bibendum laoreet non id justo.</p>', 'Penulis Agenda', '1658822584_f357602abf2680b280cf.jpg', 'Publik', '2022-07-30', '2022-07-26 15:03:04', '2022-07-26 15:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idCustomer` int(11) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `StatusAkun` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `noHP` varchar(20) NOT NULL,
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
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idCustomer`, `NIK`, `Nama`, `Username`, `StatusAkun`, `Email`, `noHP`, `jenisKelamin`, `tglLahir`, `Pekerjaan`, `Password`, `created_at`, `updated_at`, `idLevel`, `idUser`) VALUES
(37, '6701191011231231', 'Erda Ulhaq Dani Hipya', 'erdaulhaqdani', 'Terverifikasi', 'erdaulhaqdani@gmail.com', '2147483647', 'Laki-laki', NULL, 'Mahasiswa', '$2y$10$sVIjV/g834wpc78UPH11muWse406HHImD5YRAr0nAD7BdMw.UQhPC', '2022-05-25 03:57:52', '2022-07-26 09:05:18', 5, 2),
(44, '1122334455', 'Mikazuki', 'mika', 'Aktif', 'zmika360@gmail.com', '2147483647', 'Perempuan', NULL, 'Mahasiswa ', '$2y$10$SM9mii0s9K3xQdVdFAaw6OKk6hN8lIOzngvqo21lBioScwD8o.cXG', '2022-06-19 17:15:06', '2022-06-19 17:15:27', 5, 7),
(45, '1234567891011234', 'Putri Nur', 'putri', 'NonAktif', 'danihipya@student.telkomuniversity.ac.id', '2147483647', 'Perempuan', NULL, 'Mahasiswa', '$2y$10$K0PgBMwKl57as1ySG.vgOOCKfoqsE7eMSl0EyvZIwP17Hhb4YCWMa', '2022-07-03 21:23:14', '2022-07-03 21:23:14', 5, NULL),
(46, '6402060106010007', 'Reggi Fachri', 'reggi', 'Terverifikasi', 'rfachri.exe@gmail.com', '085794214986', 'Laki-laki', NULL, 'Mahasiswa', '$2y$10$X6P.USoSZQKXSIDdTZQYAep.f8g4ebCY/uYEpP5iTn9dMMEDq5Zqa', '2022-07-26 09:49:28', '2022-08-29 17:14:34', 5, NULL),
(47, '1234567890123456', 'Qwerty', 'Qwerty', 'NonAktif', 'hfhfuskbdj@gmail.com', '08123456789', 'Laki-laki', NULL, 'Qwerty', '$2y$10$pFSz32kt2nWMW1yBR.DJvuQJFkj.rzzQq6b/yXbTLdQzHr0A62nZa', '2022-08-11 04:53:29', '2022-08-11 04:53:29', 5, NULL),
(48, '3273231803740003', 'R. Ahmad Iman Abdurahman', 'imandjkn', 'Terverifikasi', 'imancolat@gmail.com', '081903975686', 'Laki-laki', NULL, 'PNS Kemenkeu', '$2y$10$bSrnLD3RfyGrdGASCR6ZfOcAxWHHu4YeQQPxm3CMyaEbYtgYQU.C2', '2022-08-16 08:31:10', '2022-08-16 10:56:23', 5, NULL),
(49, '3318052704920001', 'NUR JAMUNASIR', 'ultramenrangers', 'Terverifikasi', 'gugeltok@gmail.com', '089672854687', 'Laki-laki', NULL, 'ASN Kemenkeu', '$2y$10$ULsKQL8C9ARsiL/03QRfKuRVWdnUyQAGQhM5bjCmLCuuU7qVA.Ys.', '2022-08-16 08:53:16', '2022-08-16 15:46:10', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `id_uploads` int(11) NOT NULL,
  `File` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id_file`, `id_uploads`, `File`) VALUES
(1, 655, '1656667781_eea1d9e45b090bbcb537.png'),
(2, 848, '1656901542_fdee6e2c71ab16a7bfec.xlsx'),
(3, 971, '1656901808_529ce7abd1d8455d2e81.xlsx'),
(4, 699, '1656902673_3b83729a7a8b32174202.pdf'),
(5, 699, '1656902673_f0524c53f317b2d9a1a2.docx'),
(6, 350, '1658139559_3b65c8f4cdc6e5e1a506.jpeg'),
(7, 885, '1658139745_e3f4fa98ead277a820af.docx'),
(8, 77, '1658220520_795c126d15349ee5eeb2.png'),
(9, 293, '1658416216_fd8896876a4ee3ac97e0.pdf'),
(10, 293, '1658416216_227a71101eb520dab52b.pdf'),
(11, 597, '1658810799_4652c69118b509a034dd.pdf'),
(12, 814, '1661747712_9563ffe4c92acc2e04e1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_uploads` int(11) NOT NULL,
  `File` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
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
(19, 674, '1658433914_781f60d15e0b55c56e46.png'),
(20, 512, '1658805562_32300240c2f3962648f4.jpg'),
(21, 454, '1658805819_993390e100a5ca38f82b.png'),
(22, 454, '1658805819_ecb2ec48e42a01c1031a.png'),
(23, 608, '1658806578_3fe28afd47d89c2c0927.jpg'),
(24, 4, '1658806881_0dd62b06bdf8be5b0b98.jpg'),
(25, 31, '1658806933_ad1e700f725ce96dfa60.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idJabatan` int(11) NOT NULL,
  `posisiJabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idJabatan`, `posisiJabatan`) VALUES
(1, 'Kepala Kantor'),
(2, 'Kepala Seksi'),
(3, 'Staf');

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
  `idUploadLaporan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`idLaporan`, `file_laporan`, `idUploadLaporan`) VALUES
(1, '1655649567_b36f2f604cc338a89d11.jpg', 345),
(2, '1655894880_9973b55f53f7cbb100da.png', 507),
(3, '1655902872_74bb335b34fc1aa7b68f.png', 623),
(4, '1655904758_c9288943473462b98a8f.jpg', 208),
(5, '1656571583_a3aa662571b88fbbe950.jpg', 727),
(6, '1656667879_955c6003c4e74e1c1313.png', 98),
(7, '1656772511_4f857f4c2d0127d5a4ef.png', 447),
(8, '1656902020_5b5f9207797aefa81992.webp', 39),
(9, '1657250950_cc332b5736b3b0f5b2bd.png', 199),
(10, '1657251231_4da5ab8580dd22f81531.png', 610),
(11, '1658140207_1cb18a6ae76d2d4e3c19.xlsx', 275),
(12, '1658140207_f0c413669b6217bdd0dc.png', 275),
(13, '1658205235_52f51a899113e64da44f.png', 781),
(14, '1658205252_4e0a51c15c13bc68942e', 706),
(15, '1658205326_f4cffb1767ba9c0d9c00', 212),
(16, '1658205370_15ddce23a20c72d86db0', 508),
(17, '1658205420_433c4742c372dab119e1.pdf', 258),
(18, '1658205420_05b83f5cf7d2ffc4bc5d.png', 258),
(19, '1658210486_45abaffd8a6ca41fe5c9.png', 485),
(20, '1658210544_d05eab341f441abc20f4.xlsx', 611),
(21, '1658210544_2dac6afb38bcf860ac4e.png', 611),
(22, '1658341942_ec4707fc52cf425d7991.pdf', 821),
(23, '1658416336_0b5e850eb32769720e0f.pdf', 180),
(24, '1658811416_2e8ffaca09de86c580ad.pdf', 205),
(25, '1661764041_ea02b7cab2c3e12dfc54.png', 52);

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
-- Dumping data for table `meeting_request`
--

INSERT INTO `meeting_request` (`idMeeting`, `idPetugas`, `Tanggal_kunjungan`, `Waktu_kunjungan`, `Kantor`, `Bentuk_layanan`, `Perihal`, `File_lampiran`, `Status`, `idKategori`, `created_at`, `updated_at`, `idCustomer`, `Rating`, `Ulasan`, `notifCustomer`, `notifPetugas`, `Tiket`) VALUES
(65, 30, '13-07-2022', '08:00', 'Kanwil DJKN Jawa Barat', 'Luring', 'Pengelolaan Kekayaan Negara', 'default.png', 'Sedang diproses', 2, '2022-07-12 05:08:50', '2022-07-19 13:28:36', 37, 0, NULL, 0, 1, 'MR'),
(66, 21, '13-07-2022', '08:05', 'Kanwil DJKN Jawa Barat', 'Luring', 'Lelang', 'default.png', 'Selesai diproses', 1, '2022-05-01 12:29:51', '2022-07-22 02:57:21', 37, 5, 'ini isi ulasan meeting request', 1, 1, 'MR'),
(67, 21, '21-07-2022', '08:00', 'KPKNL Bandung', 'Luring', 'Lelang', 'default.png', 'Eskalasi', 1, '2022-07-18 23:52:29', '2022-07-19 13:26:36', 37, 0, NULL, 0, 0, 'MR'),
(69, 30, '21-07-2022', '08:20', 'KPKNL Bandung', 'Luring', 'Pelayanan penilaian', 'default.png', 'Selesai diproses', 3, '2022-07-19 13:21:00', '2022-07-19 13:28:30', 37, 0, NULL, 0, 1, 'MR'),
(73, 1, '26-07-2022', '09:50', 'KPKNL Bandung', 'Luring', 'Lelang', 'default.png', 'Belum diproses', 1, '2022-07-20 22:32:08', '2022-07-26 08:13:24', 37, 0, NULL, 0, 0, 'MR'),
(74, 1, '26-07-2022', '08:10', 'Kanwil DJKN Jawa Barat', 'Daring', 'Pengelolaan Kekayaan Negara', 'default.png', 'Belum diproses', 1, '2022-07-20 22:34:38', '2022-08-01 12:47:35', 37, 0, NULL, 0, 1, 'MR'),
(76, 1, '26-07-2022', '08:30', 'Kanwil DJKN Jawa Barat', 'Luring', 'Pengelolaan Kekayaan Negara', 'default.png', 'Belum diproses', 2, '2022-07-21 02:02:56', '2022-07-30 23:03:02', 37, 0, NULL, 1, 0, 'MR'),
(77, 30, '25-07-2022', '08:10', 'Kanwil DJKN Jawa Barat', 'Luring', 'Lelang', '1658433264_e9a65940e8fd3204f8cd.png', 'Selesai diproses', 1, '2022-07-22 02:54:24', '2022-08-29 16:11:18', 37, 5, 'sudah bagus', 1, 1, 'MR'),
(78, 1, '12-08-2022', '08:25', 'KPKNL Bandung', 'Luring', 'Penilaian aset properti', 'default.png', 'Belum diproses', 3, '2022-08-06 11:16:15', '2022-08-06 11:16:15', 46, 0, NULL, 0, 0, 'MR'),
(79, 1, '16-08-2022', '09:10', 'KPKNL Bandung', 'Luring', 'Saya mau ikutan crashprogram', 'default.png', 'Belum diproses', 4, '2022-08-16 08:33:54', '2022-08-16 08:33:54', 48, 0, NULL, 0, 0, 'MR'),
(80, 1, '16-08-2022', '15:45', 'KPKNL Bandung', 'Luring', 'Konsultasi Crash Program', 'default.png', 'Belum diproses', 4, '2022-08-16 08:55:04', '2022-08-16 08:55:09', 49, 0, NULL, 1, 0, 'MR');

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
-- Table structure for table `pegawai`
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
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idPegawai`, `nip`, `nama`, `email`, `jenisKelamin`, `password`, `status`, `created_at`, `updated_at`, `idJabatan`, `idUnit`) VALUES
(1, '6701193101', 'Aditia Dika', 'aditiadika04@gmail.com', 'Pria', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 1, 1),
(2, '6701193102', 'Putra', 'putra@gmail.com', 'Pria', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 2, 2),
(3, '6701193103', 'Sadie Sink', 'sink@gmail.com', 'Wanita', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 2, 3),
(4, '6701193104', 'Simon', 'simon@gmail.com', 'Wanita', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 3, 3),
(5, '6701194134', 'Reggi', 'reggi@gmail.com', 'Laki-laki', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 2, 5),
(6, '6701191011', 'Erda', 'erda@gmail.com', 'Laki-laki', '202cb962ac59075b964b07152d234b70', 'Aktif', '2022-06-13 10:57:17', '2022-06-13 10:57:17', 3, 5),
(7, '6701191090', 'Kepala Kantor KPKNL', 'kepala@gmail.com', 'pria', '870f669e4bbbfa8a6fde65549826d1c4', 'Aktif', '2022-06-19 06:16:26', '2022-06-19 06:16:26', 1, 1),
(8, '6701194131', 'Gunawan', 'gunawan@gmail.com', 'pria', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '2022-08-09 14:32:51', '2022-08-09 14:32:51', 3, 5);

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
  `idCustomer` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL DEFAULT 1,
  `Rating` int(11) NOT NULL DEFAULT 0,
  `Ulasan` varchar(255) DEFAULT NULL,
  `notifCustomer` int(1) NOT NULL DEFAULT 0,
  `notifPetugas` int(11) NOT NULL DEFAULT 0,
  `Tiket` varchar(5) NOT NULL DEFAULT 'PO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaduan_online`
--

INSERT INTO `pengaduan_online` (`idPengaduan`, `Judul`, `Isi`, `idKategori`, `Lampiran`, `Status`, `created_at`, `updated_at`, `idCustomer`, `idPetugas`, `Rating`, `Ulasan`, `notifCustomer`, `notifPetugas`, `Tiket`) VALUES
(11, 'Judul Pengaduan 1', 'Ini adalah isi dari Judul Pengaduan 1', 4, '1656347767_66058072dce4f69a2ffe.docx', 'Belum diproses', '2022-07-04 11:36:07', '2022-07-12 17:33:26', 37, 1, 0, NULL, 1, 0, 'PO'),
(12, 'Penilaian tidak sesuai', 'Penilaian barang yang akan saya lelang tidak sesuai', 3, 'user.png', 'Belum diproses', '2022-07-26 09:07:05', '2022-07-26 09:07:05', 37, 1, 0, NULL, 0, 0, 'PO'),
(14, 'Mengapa harus test', 'Kan begini', 1, '1660639482_a54dc086c730b556a61a.jpeg', 'Belum diproses', '2022-08-16 15:44:42', '2022-08-16 15:44:42', 48, 1, 0, NULL, 0, 0, 'PO'),
(15, 'Judul', 'Tes Umum', 5, 'user.png', 'Sedang diproses', '2022-08-29 17:12:32', '2022-08-29 17:16:36', 46, 30, 0, NULL, 0, 1, 'PO');

-- --------------------------------------------------------

--
-- Table structure for table `penugasan`
--

CREATE TABLE `penugasan` (
  `idTugas` int(11) NOT NULL,
  `noPenugasan` varchar(255) NOT NULL,
  `namaTugas` varchar(255) NOT NULL,
  `detailTugas` varchar(255) DEFAULT NULL,
  `tenggatWaktu` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `catatan` varchar(255) NOT NULL DEFAULT '-',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `idPegawai` int(11) NOT NULL,
  `pic` int(11) NOT NULL,
  `idUnit` int(11) NOT NULL,
  `id_uploads` int(11) NOT NULL DEFAULT 0,
  `idUploadLaporan` int(11) NOT NULL DEFAULT 0,
  `notifikasi` int(11) NOT NULL DEFAULT 0,
  `notifikasiPic` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penugasan`
--

INSERT INTO `penugasan` (`idTugas`, `noPenugasan`, `namaTugas`, `detailTugas`, `tenggatWaktu`, `status`, `catatan`, `created_at`, `updated_at`, `idPegawai`, `pic`, `idUnit`, `id_uploads`, `idUploadLaporan`, `notifikasi`, `notifikasiPic`) VALUES
(1, '001/KK.KPKNL/TP/2022', 'Testing Project KK->KU', '', '2022-06-24', 'Disetujui', '-', '2022-06-22 07:42:20', '2022-06-22 08:01:59', 1, 2, 2, 0, 623, 1, 0),
(2, '002/KK.KPKNL/TP/2022', 'Tugas Kepada Kepala Unit Hukum dan informasi', 'Tugas Kepada Kepala Unit Hukum dan informasi', '2022-06-30', 'Disetujui', '-', '2022-02-22 08:03:20', '2022-07-20 13:30:32', 1, 5, 5, 0, 727, 1, 0),
(3, '003/KK.KPKNL/TP/2022', 'Tugas Kepada Kepala Unit Piutang Negara', '', '2022-07-02', 'Proses', 'coba lagi', '2022-06-22 08:24:51', '2022-07-03 09:06:58', 1, 3, 3, 0, 208, 1, 0),
(4, '021/KASUBAG.KPKNL/TP/2022', 'Tugas Percobaan KASUBAG #1', '', '2022-07-07', 'Proses', '-', '2021-02-22 08:36:08', '2022-03-03 20:26:41', 2, 6, 5, 0, 0, 1, 0),
(5, '004/KK.KPKNL/TP/2022', 'Testing Tugas Seluruh Pegawai', '', '2022-06-24', 'Proses', '-', '2022-01-23 00:15:08', '2022-02-01 04:25:25', 1, 3, 3, 0, 0, 1, 0),
(6, 'test2', 'p', '', '2022-06-25', 'Selesai', '-', '2022-01-24 05:06:31', '2022-07-20 13:32:22', 5, 6, 5, 0, 821, 1, 0),
(7, '0X/01-07/KK-KU/2022', 'Penugasan Baru ', '', '2022-07-07', 'Disetujui', '-', '2022-07-01 04:29:41', '2022-07-01 04:31:46', 1, 3, 3, 655, 98, 1, 0),
(8, '00X/TP-TEST/2022', 'Testing Tugas', 'Keperluan Presentasi', '2022-07-13', 'Disetujui', '-', '2022-07-02 09:33:49', '2022-07-02 09:36:57', 1, 5, 5, 0, 447, 1, 0),
(9, 'XX/ST-KK/2022', 'Uji coba pembuatan tugas', '', '2022-07-04', 'Menunggu', '-', '2022-07-03 21:25:42', '2022-07-03 21:25:42', 1, 2, 2, 848, 0, 1, 0),
(10, 'X2/ST-KK/2022', 'Kunjungan Kantor DJKN Jawa Barat', 'Kunjungan Kantor DJKN Jawa Barat', '2022-07-06', 'Selesai', 'Laporan tidak sesuai', '2022-07-03 21:30:08', '2022-07-18 05:30:07', 1, 2, 2, 699, 275, 1, 0),
(12, '18/TUGASBARU/2022', 'Percobaan lampiran aplikasi', 'Percobaan lampiran aplikasi', '2022-07-21', 'Proses', '-', '2022-07-18 05:19:19', '2022-08-17 19:19:46', 1, 2, 2, 885, 0, 1, 0),
(13, 'test3', 'test3', '', '2022-07-30', 'Proses', '-', '2022-07-19 03:48:40', '2022-07-19 03:48:53', 1, 6, 5, 77, 0, 1, 0),
(14, '21/07/ND/2022', 'Contoh pembuatan surat tugas', '', '2022-07-23', 'Disetujui', '-', '2022-07-21 10:10:16', '2022-07-21 10:13:51', 1, 2, 2, 293, 180, 1, 0),
(15, 'testHosting1', 'testHosting1', '', '2022-07-28', 'Selesai', '-', '2022-07-25 23:46:39', '2022-07-25 23:56:56', 1, 2, 2, 597, 205, 1, 0),
(16, 'testHosting2', 'testHosting2', 'testHosting2', '2022-09-08', 'Menunggu', '-', '2022-08-26 00:51:39', '2022-08-26 00:51:39', 1, 6, 5, 0, 0, 1, 0),
(17, 'testNotifReggi', 'testNotifReggi', 'testNotifReggi', '2022-09-01', 'Selesai', '-', '2022-08-28 23:35:12', '2022-08-29 04:10:13', 1, 5, 5, 814, 52, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan_info`
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
-- Dumping data for table `permohonan_info`
--

INSERT INTO `permohonan_info` (`idPermohonan`, `idPetugas`, `Isi`, `Gambar`, `Form1`, `Form2`, `Form3`, `Form4`, `Form5`, `Form6`, `updated_at`) VALUES
(1, 20, '<p>&nbsp;</p>\r\n<p><span style=\"font-size: 24pt;\"><strong><span style=\"color: #000000;\">Prosedur </span><span style=\"color: #000000;\">Permintaan Informasi Publik Pada Perangkat PPID DJKN</span></strong></span></p>\r\n<ul>\r\n<li>\r\n<p>1. Pemohon menyampaikan permintaan Informasi Publik kepada Perangkat PPID DJKN melalui:</p>\r\n<ul>\r\n<li><strong>Surat</strong>&nbsp;: Sesuai alamat Perangkat PPID DJKN</li>\r\n<li>PPID Tk. I Direktur Hukum dan Humas, Kantor Pusat DJKN</li>\r\n<li>PPID Tk. II Kepala Kanwil DJKN seluruh Indonesia dan BLU Lembaga Manajemen Aset Negara (LMAN)</li>\r\n<li>PPID Tk. III Kepala KPKNL seluruh Indonesia</li>\r\n<li><strong>Surat Elektronik (email)&nbsp;</strong>: ppid.djkn@kemenkeu.go.id</li>\r\n<li><strong>Datang Langsung&nbsp;</strong>: melalui walk-in Area Pelayanan Terpadu (APT) Perangkat PPID DJKN</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p>2. Dalam mengajukan permintaan Informasi Publik, Pemohon diwajibkan mengisi Formulir Registrasi Permintaan Informasi Publik dan melengkapi identitas yang sah. Dalam hal Pemohon adalah perseorangan diwajibkan untuk menyertakan fotokopi Kartu Tanda Penduduk (KTP) yang dapat membuktikan sebagai Warga Negara Indonesia (WNI). Apabila Pemohon adalah Badan Hukum diwajibkan menyertakan fotokopi Anggaran Dasar/Akta Pendirian yang telah disahkan oleh Kementerian Hukum dan HAM;</p>\r\n</li>\r\n<li>\r\n<p>3. Petugas Informasi pada Perangkat PPID DJKN melakukan verifikasi atas berkas kelengkapan permintaan Informasi Publik. Setelah dinyatakan lengkap, Petugas Informasi pada Perangkat PPID DJKN memberikan Nomor Registrasi Pendaftaran Informasi Publik dan memberikan fotokopi berkas kelengkapan permohonan Informasi Publik kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>4. Atas permintaan Informasi Publik yang diterima dan dinyatakan lengkap, Perangkat PPID memproses permintaan Informasi Publik dengan memberikan tanggapan tertulis kepada Pemohon dalam waktu 10 (sepuluh) hari kerja. Dalam hal Perangkat PPID DJKN membutuhkan tambahan waktu dalam memberikan tanggapan permintaan Informasi Publik, Perangkat PPID DJKN dapat melakukan perpanjangan waktu hingga 7 (tujuh) hari kerja dengan menyampaikan surat pemberitahuan perpanjangan tanggapan permintaan Informasi Publik kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>5. Pemohon Informasi Publik menerima pemberitahuan tertulis dan tanggapan dari Perangkat PPID DJKN paling lambat 10 (sepuluh) hari kerja sejak diterimanya permohonan dan dapat diperpanjang 7 (tujuh) hari kerja.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">Prosedur Permohonan Keberatan dan Sengketa Informasi Publik</h1>\r\n<ul>\r\n<li>\r\n<p>1. Pemohon menerima penjelasan tertulis atas permintaan Informasi Publik yang dimohonkan. Pemohon dapat mengajukan permohonan Keberatan Informasi Publik selambatnya 30 (tiga puluh) hari kerja setelah tanggapan tertulis Perangakat PPID;</p>\r\n</li>\r\n<li>\r\n<p>2. Pemohon dalam mengajukan permohonan Keberatan Informasi Publik diwajibkan mengisi Formulir Keberatan Informasi Publik dan memenuhi persyaratan (fotokopi KTP/Surat Kuasa/Bukti Pengesahan Badan Hukum) yang ditujukan kepada Atasan PPID Tk. I dalam hal ini adalah Direktur Jenderal Kekayaan Negara pada Kantor Pusat DJKN;</p>\r\n</li>\r\n<li>\r\n<p>3. Pemohon menyampaikan permohonan Keberatan Informasi Publik kepada Perangkat PPID DJKN melalui:</p>\r\n<ul>\r\n<li><strong>Surat</strong>&nbsp;: Sesuai alamat Perangkat PPID DJKN</li>\r\n<li>PPID Tk. I Direktur Hukum dan Humas, Kantor Pusat DJKN</li>\r\n<li>PPID Tk. II Kepala Kanwil DJKN seluruh Indonesia dan BLU Lembaga Manajemen Aset Negara (LMAN)</li>\r\n<li>PPID Tk. III Kepala KPKNL seluruh Indonesia</li>\r\n<li><strong>Surat Elektronik (email)&nbsp;</strong>: ppid.djkn@kemenkeu.go.id</li>\r\n<li><strong>Datang Langsung&nbsp;</strong>: melalui walk-in Area Pelayanan Terpadu (APT) Perangkat PPID DJKN</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</li>\r\n<li>\r\n<p>4. Petugas Informasi pada Perangkat PPID DJKN melakukan verifikasi atas berkas kelengkapan permohonan Keberatan Informasi Publik. Setelah dinyatakan lengkap, Petugas Informasi pada Perangkat PPID DJKN memberikan Nomor Registrasi Pendaftaran Keberatan Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>5. Atasan PPID Tk. I DJKN cq. Direktur Jenderal Kekayaan Negara dalam waktu 30 (tiga puluh) hari kerja sejak permohonan Keberatan InformasiPublik diterima oleh petugas informasi, memiliki kewajiban untuk memberikan tanggapan tertulis kepada Pemohon;</p>\r\n</li>\r\n<li>\r\n<p>6. Dalam hal Pemohon tidak puas atas tanggapan Keberatan Informasi Publik yang diterbitkan oleh Atasan PPID Tk. I, Pemohon dapat mengajukan Sengketa Informasi Publik kepada Komisi Informasi Pusat.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">Prosedur Permohonan Penyelesaian Sengketa Informasi Publik<br />(Sesuai Pasal 37 dan Pasal 38 UU Nomor 14 Tahun)</h1>\r\n<ul>\r\n<li>\r\n<p>1. Upaya penyelesaian Sengketa Informasi Publik diajukan kepada Komisi Informasi apabila tanggapan Atasan PPID Tingkat I DJKN dalam proses Keberatan Informasi Publik tidak memuaskan Pemohon Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>2. Upaya penyelesaian Sengketa Informasi Publik diajukan dalam kurun waktu paling lambat 14 (empat belas) hari kerja setelah diterimanya tanggapan tertulis dari Atasan PPID Tingkat I DJKN;</p>\r\n</li>\r\n<li>\r\n<p>3. Komisi Informasi harus memulai mengupayakan penyelesaian Sengketa Informasi Publik melalui Mediasi dan/atau Ajudikasi Nonlitigasi paling lambat 14 (empat belas) hari kerja setelah menerima permohonan penyelesaian Sengketa Informasi Publik;</p>\r\n</li>\r\n<li>\r\n<p>4. Proses penyelesaian Sengketa Informasi Publik paling lambat dapat diselesaikan dalam waktu 100 (seratus) hari kerja.</p>\r\n</li>\r\n</ul>\r\n<h1 class=\"title\">WAKTU LAYANAN</h1>\r\n<p>Jam Layanan Informasi Publik pada Perangkat PPID DJKN<br />Senin s.d. Jumat - 08.00 s.d. 15.00 WIB<br /><br />Waktu Istirahat Layanan Informasi Publik pada Perangkat PPID DJKN<br />Senin s.d. Kamis - 12.15 s.d. 13.00 WIB<br />Jumat - 11.30 s.d. 13.15 WIB</p>\r\n<h1 class=\"title\">BIAYA DAN TARIF LAYANAN</h1>\r\n<p>Layanan Informasi Publik di lingkungan Direktorat Jenderal Kekayaan Negara (DJKN) Kementerian Keuangan tidak dipungut biaya, kecuali untuk informasi yang telah ditentukan biayanya sesuai dengan peraturan mengenai Penerimaan Negara Bukan Pajak (PNBP).<br />Adapun untuk biaya penggandaan atau perekeman yang timbul dari Permintaan Informasi Publik ditanggung dan menjadi tanggung jawab Pemohon Informasi Publik.</p>', '', 'lampiran', '', '', '', '', '', '2022-06-30 04:52:31');

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
(20, '112233445566', 'Dani Hipya', 'petugas@gmail.com', 'DJKN Jabar', 1, 5, '$2y$10$SNy2qu6COIcK8fqchwJ7Me6Q0mwDbSdNeMbBWR9jIhpwHYy8jJXWy', '2022-05-23 10:48:31', '2022-05-27 03:19:21'),
(21, '6701191112', 'Reggi Fachri', 'navi@gmail.com', 'KPKNL Bandung', 6, 5, '$2y$10$Wcm9ztV2.aQLph0QW.YZRuUKdJIHM2SPDVk6FOC5ozQ20F51DzaDK', '2022-05-25 02:16:56', '2022-06-19 14:09:29'),
(22, '6701191110', 'Erda Ulhaq', 'kepala@gmail.com', 'DJKN Jabar', 3, 5, '$2y$10$vRrnzmug.rC5zo3XJboPteW/dw.iuJOIrx/bLTKuCYcgEboyeA8J.', '2022-05-25 02:24:39', '2022-06-19 13:59:54'),
(24, '2233445566', 'Admin LP2', 'admin2@gmail.com', 'DJKN Jabar', 1, 5, '$2y$10$7PFLcDU4Q/zeVQ5SFC0IcukgTCAzNyTOcoyGx541wcCRJeYVt3U8m', '2022-06-07 16:43:32', '2022-06-19 14:08:07'),
(30, '12345678910', 'Aditia Dika', 'loket@gmail.com', 'KPKNL Bandung', 7, 5, '$2y$10$z5enATSyfuEHBudTddPXbucxBoDH4KLtl7ZU9aoVCzEP6OoXvoqqe', '2022-06-19 14:55:09', '2022-07-26 08:14:34');

-- --------------------------------------------------------

--
-- Table structure for table `tanda_terima`
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
-- Dumping data for table `tanda_terima`
--

INSERT INTO `tanda_terima` (`id_tt`, `idPetugas`, `Pengirim`, `No_surat`, `Tanggal`, `Perihal`, `created_at`, `updated_at`) VALUES
(7, 21, 'Dani Hipya', 22445566, '2022-06-20', 'Pengelolaan Kekayaan Negara', '2022-06-19 13:15:38', '2022-06-19 13:15:38'),
(8, 21, 'Erda Dani Edit 2 kali', 112233, '2022-06-22', 'Pengelolaan Kekayaan Negara', '2022-06-19 13:18:14', '2022-06-19 13:24:26'),
(9, 21, 'erda', 65868767, '2022-06-21', 'penilaian', '2022-06-19 13:24:54', '2022-06-19 13:24:54');

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
  `idMeeting` int(11) NOT NULL,
  `idPetugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan_mr`
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
  `idPengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `idTim` int(11) NOT NULL,
  `idAnggota` int(11) NOT NULL,
  `idTugasFK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`idTim`, `idAnggota`, `idTugasFK`) VALUES
(1, 4, 2),
(2, 6, 2),
(3, 2, 3),
(4, 4, 3),
(5, 6, 3),
(6, 4, 4),
(7, 2, 5),
(8, 4, 5),
(9, 5, 5),
(10, 6, 5),
(11, 4, 7),
(12, 6, 7),
(13, 6, 8),
(14, 4, 8),
(15, 4, 9),
(16, 6, 9),
(17, 5, 10),
(18, 6, 10),
(19, 4, 14),
(20, 6, 14),
(21, 8, 16),
(22, 4, 17);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `idUnit` int(11) NOT NULL,
  `namaUnit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
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
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id_uploads` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id_uploads`, `Judul`, `Kategori`) VALUES
(4, 'Judul Pengumuman 3', 'Gambar Lampiran Informasi'),
(23, 'Judul Berita', 'Gambar Lampiran Informasi'),
(31, 'Judul Berita 1', 'Gambar Lampiran Informasi'),
(55, 'Judul Berita 5', 'Gambar Lampiran Informasi'),
(299, 'Judul Pengumuman entah keberapa', 'Gambar Lampiran Informasi'),
(407, 'Judul Berita 1', 'Gambar Lampiran Informasi'),
(454, 'Judul Pengumuman 3', 'Gambar Lampiran Informasi'),
(512, 'Judul Berita 1', 'Gambar Lampiran Informasi'),
(519, 'Judul Berita 4', 'Gambar Lampiran Informasi'),
(597, 'testHosting1', 'Lampiran Penugasan'),
(608, 'Judul Pengumuman 3', 'Gambar Lampiran Informasi'),
(674, 'Judul Berita', 'Gambar Lampiran Informasi'),
(814, 'testNotifReggi', 'Lampiran Penugasan'),
(828, 'Judul Berita 2', 'Gambar Lampiran Informasi'),
(859, 'Judul Berita Terbaru', 'Gambar Lampiran Informasi'),
(907, 'Judul Artikel 3', 'Gambar Lampiran Informasi'),
(972, 'Judul Pengumuman 4 dengan Gambar Lampiran', 'Gambar Lampiran Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `uploadsLaporan`
--

CREATE TABLE `uploadsLaporan` (
  `idUploadLaporan` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `tanggalUploadLaporan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uploadsLaporan`
--

INSERT INTO `uploadsLaporan` (`idUploadLaporan`, `deskripsi`, `tanggalUploadLaporan`) VALUES
(39, 'Laporan kunjungan DJKN Jawa Barat', NULL),
(52, 'Testing input laporan reggi 1', NULL),
(98, 'penyelesaian tugas', NULL),
(180, 'test input laporan', NULL),
(199, 'Laporan kunjungan DJKN Jawa Barat 2', NULL),
(205, 'test', NULL),
(208, 'Penyelesaian tugas unit PN', NULL),
(212, 'Laporan test 2 p', NULL),
(258, 'Laporan test 2 p', NULL),
(275, 'Laporan kunjungan DJKN Jawa Barat 2 2', NULL),
(345, 'testLaporan', NULL),
(447, 'testing input laporan', NULL),
(485, 'Laporan test 2 p', NULL),
(507, 'test', NULL),
(508, 'Laporan test 2 p', NULL),
(610, 'Laporan kunjungan DJKN Jawa Barat 2', NULL),
(611, 'Laporan test 2 p', NULL),
(623, 'Laporan pertama putra KU-KASUBAG', NULL),
(706, 'Laporan test 2 p', NULL),
(727, 'test', NULL),
(781, 'Laporan test 2 p', NULL),
(821, 'Laporan test 2 perubahan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `idLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `Email`, `Password`, `idLevel`) VALUES
(1, 'admin2@gmail.com', '$2y$10$7PFLcDU4Q/zeVQ5SFC0IcukgTCAzNyTOcoyGx541wcCRJeYVt3U8m', 1),
(2, 'erdaulhaqdani@gmail.com', '$2y$10$sVIjV/g834wpc78UPH11muWse406HHImD5YRAr0nAD7BdMw.UQhPC', 5),
(3, 'kepala@gmail.com', '$2y$10$vRrnzmug.rC5zo3XJboPteW/dw.iuJOIrx/bLTKuCYcgEboyeA8J.', 3),
(4, 'loket@gmail.com', '$2y$10$z5enATSyfuEHBudTddPXbucxBoDH4KLtl7ZU9aoVCzEP6OoXvoqqe', 7),
(5, 'navi@gmail.com', '$2y$10$Wcm9ztV2.aQLph0QW.YZRuUKdJIHM2SPDVk6FOC5ozQ20F51DzaDK', 6),
(6, 'petugas@gmail.com', '$2y$10$SNy2qu6COIcK8fqchwJ7Me6Q0mwDbSdNeMbBWR9jIhpwHYy8jJXWy', 1),
(7, 'zmika360@gmail.com', '$2y$10$SM9mii0s9K3xQdVdFAaw6OKk6hN8lIOzngvqo21lBioScwD8o.cXG', 5),
(15, 'danihipya@student.telkomuniversity.ac.id', '$2y$10$K0PgBMwKl57as1ySG.vgOOCKfoqsE7eMSl0EyvZIwP17Hhb4YCWMa', 5),
(16, 'rfachri.exe@gmail.com', '$2y$10$X6P.USoSZQKXSIDdTZQYAep.f8g4ebCY/uYEpP5iTn9dMMEDq5Zqa', 5),
(17, 'hfhfuskbdj@gmail.com', '$2y$10$pFSz32kt2nWMW1yBR.DJvuQJFkj.rzzQq6b/yXbTLdQzHr0A62nZa', 5),
(18, 'imancolat@gmail.com', '$2y$10$bSrnLD3RfyGrdGASCR6ZfOcAxWHHu4YeQQPxm3CMyaEbYtgYQU.C2', 5),
(19, 'gugeltok@gmail.com', '$2y$10$ULsKQL8C9ARsiL/03QRfKuRVWdnUyQAGQhM5bjCmLCuuU7qVA.Ys.', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `idPetugas` (`idPetugas`),
  ADD KEY `id_uploads` (`id_uploads`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idCustomer`),
  ADD KEY `customer-user` (`Email`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idLevel` (`idLevel`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_uploads` (`id_uploads`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`),
  ADD KEY `id_uploads` (`id_uploads`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idJabatan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`idLaporan`),
  ADD KEY `idTugas` (`idUploadLaporan`);

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
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idPegawai`),
  ADD KEY `idJabatan` (`idJabatan`),
  ADD KEY `idUnit` (`idUnit`);

--
-- Indexes for table `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  ADD PRIMARY KEY (`idPengaduan`),
  ADD KEY `pengaduan_kategori` (`idKategori`),
  ADD KEY `pengaduan_customer` (`idCustomer`);

--
-- Indexes for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD PRIMARY KEY (`idTugas`),
  ADD KEY `idPegawai` (`idPegawai`),
  ADD KEY `pic` (`pic`),
  ADD KEY `idUnit` (`idUnit`),
  ADD KEY `id_uploads` (`id_uploads`),
  ADD KEY `idUploadLaporan` (`idUploadLaporan`);

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
  ADD KEY `Unit` (`Unit`),
  ADD KEY `petugas-email` (`Email`);

--
-- Indexes for table `tanda_terima`
--
ALTER TABLE `tanda_terima`
  ADD PRIMARY KEY (`id_tt`);

--
-- Indexes for table `tanggapan_mr`
--
ALTER TABLE `tanggapan_mr`
  ADD PRIMARY KEY (`idTanggapan_MR`),
  ADD KEY `idMeeting` (`idMeeting`),
  ADD KEY `index_idPetugas` (`idPetugas`);

--
-- Indexes for table `tanggapan_po`
--
ALTER TABLE `tanggapan_po`
  ADD PRIMARY KEY (`idTanggapan_PO`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`idTim`),
  ADD KEY `idTugas` (`idTugasFK`),
  ADD KEY `idPegawai` (`idAnggota`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`idUnit`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id_uploads`);

--
-- Indexes for table `uploadsLaporan`
--
ALTER TABLE `uploadsLaporan`
  ADD PRIMARY KEY (`idUploadLaporan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idJabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `idLaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `idLevel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `meeting_request`
--
ALTER TABLE `meeting_request`
  MODIFY `idMeeting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idPegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  MODIFY `idPengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `penugasan`
--
ALTER TABLE `penugasan`
  MODIFY `idTugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `petugas_apt`
--
ALTER TABLE `petugas_apt`
  MODIFY `idPetugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tanda_terima`
--
ALTER TABLE `tanda_terima`
  MODIFY `id_tt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tanggapan_mr`
--
ALTER TABLE `tanggapan_mr`
  MODIFY `idTanggapan_MR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tanggapan_po`
--
ALTER TABLE `tanggapan_po`
  MODIFY `idTanggapan_PO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `idTim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `idUnit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_fk_1` FOREIGN KEY (`idPetugas`) REFERENCES `petugas_apt` (`idPetugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer-levelUser` FOREIGN KEY (`idLevel`) REFERENCES `level_user` (`idLevel`),
  ADD CONSTRAINT `customer-user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_fk_1` FOREIGN KEY (`id_uploads`) REFERENCES `uploads` (`id_uploads`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`idUploadLaporan`) REFERENCES `uploadsLaporan` (`idUploadLaporan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meeting_request`
--
ALTER TABLE `meeting_request`
  ADD CONSTRAINT `meeting_request_ibfk_1` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`idJabatan`) REFERENCES `jabatan` (`idJabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_ibfk_2` FOREIGN KEY (`idUnit`) REFERENCES `unit` (`idUnit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan_online`
--
ALTER TABLE `pengaduan_online`
  ADD CONSTRAINT `pengaduan_customer` FOREIGN KEY (`idCustomer`) REFERENCES `customer` (`idCustomer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengaduan_kategori` FOREIGN KEY (`idKategori`) REFERENCES `kategori` (`idKategori`);

--
-- Constraints for table `penugasan`
--
ALTER TABLE `penugasan`
  ADD CONSTRAINT `penugasan_ibfk_1` FOREIGN KEY (`idUnit`) REFERENCES `unit` (`idUnit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penugasan_ibfk_2` FOREIGN KEY (`idPegawai`) REFERENCES `pegawai` (`idPegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `petugas_apt`
--
ALTER TABLE `petugas_apt`
  ADD CONSTRAINT `petugas-kategori_unit` FOREIGN KEY (`Unit`) REFERENCES `kategori` (`idKategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `petugas-level` FOREIGN KEY (`idLevel`) REFERENCES `level_user` (`idLevel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tanggapan_mr`
--
ALTER TABLE `tanggapan_mr`
  ADD CONSTRAINT `Tanggapan_fk` FOREIGN KEY (`idPetugas`) REFERENCES `petugas_apt` (`idPetugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

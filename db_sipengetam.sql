-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Agu 2023 pada 14.31
-- Versi server: 10.6.14-MariaDB-cll-lve
-- Versi PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u2955525_db_sig`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id_about` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `kontak` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_about`
--

INSERT INTO `tbl_about` (`id_about`, `judul`, `keterangan`, `kontak`, `email`, `website`, `gambar`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 'Aplikasi SI Pengetam', 'SI Pengetam adalah Sistem Informasi Pengelolaan Hutan Mangrove di Kabupaten Ketapang. Tujuan dari sistem ini dibuat untuk memberikan informasi kepada masyarakat mengenai beranekaragam hutan mangrove di ketapang.', '081256125612', 'sipengetam@myproject094.online', 'sipengetam.myproject094.online', 'c4157fed97bc866c53ab75f221066e1547845689.jpg', 2, '2023-06-22 09:39:30', 2, '2023-08-15 14:50:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_edukasi`
--

CREATE TABLE `tbl_edukasi` (
  `id_edukasi` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_edukasi`
--

INSERT INTO `tbl_edukasi` (`id_edukasi`, `judul`, `keterangan`, `created_date`, `created_user`, `updated_date`, `updated_user`) VALUES
(1, 'Definisi Hutan Mangrove', '<p style=\"text-align: justify; \">Secara&nbsp;pengertian<a class=\"XqQF9c rXJpyf\">,</a>&nbsp;beberapa ahli \r\nmendefiniskan \"mangrove\" secara berbeda-beda. Namun pada dasarnya \r\nmerujuk pada hal yang sama. Pada tahun 1983, Saenger, dkk. \r\nmendefinisikan mangrove&nbsp;sebagai formasi tumbuhan daerah litoral yang \r\nkhas di pantai daerah tropis dan sub tropis yang terlindung. Sedangkan \r\nmenurut&nbsp;Soerianegara (1987) mendefinisikan hutan mangrove sebagai hutan \r\nyang terutama tumbuh pada tanah lumpur aluvial di daerah pantai dan \r\nmuara sungai yang dipengaruhi pasang surut air laut, dan terdiri \r\natas&nbsp;jenis-jenis&nbsp;pohon Avicennia, Sonneratia, Rhizophora, Bruguiera, \r\nCeriops, Lumnitzera, Excoecaria, Xylocarpus, Aegiceras, Scyphyphora dan \r\nNypa.</p><p style=\"text-align: justify;\">Adapun landasan hukum internasional terkait pengelolaan ekosistem mangrove diantaranya sebagai berikut:&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"https://www.google.com/url?q=https%3A%2F%2Fwww.un.org%2Fen%2Fconferences%2Fenvironment%2Frio1992&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNGu0_QyfVQHHzKWbGu24QleP1ooMw\" target=\"_blank\">1)&nbsp;</a><a class=\"XqQF9c rXJpyf\" href=\"https://www.google.com/url?q=https%3A%2F%2Fwww.un.org%2Fen%2Fconferences%2Fenvironment%2Frio1992&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNGu0_QyfVQHHzKWbGu24QleP1ooMw\" target=\"_blank\">UNCED</a>&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"https://translate.google.co.id/translate?hl=id&amp;sl=en&amp;tl=id&amp;u=https%3A%2F%2Fwww.un.org%2Fen%2Fconferences%2Fenvironment%2Frio1992&amp;prev=search&amp;sandbox=1\" target=\"_blank\">(Rio de Janeiro 3-14 Juni 1992)</a>,&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"https://translate.google.com/translate?hl=id&amp;sl=en&amp;u=https://en.wikipedia.org/wiki/World_Heritage_Site&amp;prev=search\" target=\"_blank\">2)&nbsp;</a><a class=\"XqQF9c rXJpyf\" href=\"https://translate.google.com/translate?hl=id&amp;sl=en&amp;u=https://en.wikipedia.org/wiki/World_Heritage_Site&amp;prev=search\" target=\"_blank\">World Heritage Convention,</a>&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"https://translate.google.com/translate?hl=id&amp;sl=en&amp;u=https://en.wikipedia.org/wiki/Ramsar_Convention&amp;prev=search\" target=\"_blank\">3)&nbsp;</a><a class=\"XqQF9c rXJpyf\" href=\"https://translate.google.com/translate?hl=id&amp;sl=en&amp;u=https://en.wikipedia.org/wiki/Ramsar_Convention&amp;prev=search\" target=\"_blank\">The International Convention on Wetlands (Ramsar)</a>,&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"https://translate.google.co.id/translate?hl=id&amp;sl=en&amp;u=https://en.wikipedia.org/wiki/Convention_on_Biological_Diversity&amp;prev=search\" target=\"_blank\">4)</a><a class=\"XqQF9c rXJpyf\" href=\"https://translate.google.co.id/translate?hl=id&amp;sl=en&amp;u=https://en.wikipedia.org/wiki/Convention_on_Biological_Diversity&amp;prev=search\" target=\"_blank\">&nbsp;</a><a class=\"XqQF9c rXJpyf\" href=\"https://translate.google.co.id/translate?hl=id&amp;sl=en&amp;u=https://en.wikipedia.org/wiki/Convention_on_Biological_Diversity&amp;prev=search\" target=\"_blank\">The Convention on Biological Diversity</a>.&nbsp;Sedangkan\r\n dalam pengelolaan ekosistem mangrove nasional telah diatur dalam \r\nperaturan perundang-undangan yang berlaku, yaitu sebagai berikut: 1)&nbsp;UU \r\nNo. 5 Tahun 1994,&nbsp;2)&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"https://www.google.com/url?q=https%3A%2F%2Fperaturan.bkpm.go.id%2Fjdih%2Fuserfiles%2Fbatang%2FKepres_48_1991.pdf&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNGwzE87prm3wYV1thXK_K_hbH_Fhw\" target=\"_blank\">Kepres No. 48 Tahun 1991</a>, 3)&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"http://www.google.com/url?q=http%3A%2F%2Fjdih.kkp.go.id%2Fperaturan%2Fperpres-121-2012-ttg-rehab-wil-pesisir-n-pulau2-kecil.pdf&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNHeh3weeGaZqXopiJYxVVZQ1t-thg\" target=\"_blank\">Perpres No. 121 Tahun 2012</a>, 4)&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"https://www.google.com/url?q=https%3A%2F%2Fperaturan.go.id%2Fcommon%2Fdokumen%2Fln%2F2012%2Fps73-2012.pdf&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNH_JEwOiyepubLpNOgO-k4RsJGa0Q\" target=\"_blank\">Perpres No. 73 Tahun 2012</a><span class=\" aw5Odc\"><a class=\"XqQF9c\" href=\"https://www.google.com/url?q=https%3A%2F%2Fperaturan.go.id%2Fcommon%2Fdokumen%2Fln%2F2012%2Fps73-2012.pdf&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNH_JEwOiyepubLpNOgO-k4RsJGa0Q\" target=\"_blank\">,</a></span>&nbsp;5)&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"http://www.google.com/url?q=http%3A%2F%2Fjdih.kkp.go.id%2Fperaturan%2F24%2520PERMEN-KP%25202016.pdf&amp;sa=D&amp;sntz=1&amp;usg=AFQjCNFZvAi3QrfDsI-MLPZfh0BXJq_OgA\" target=\"_blank\">Permen KP No. 24 Tahun 2013</a>, 6)&nbsp;<a class=\"XqQF9c rXJpyf\" href=\"https://drive.google.com/file/d/1UZLS4EEqp2qjPf5ag48pmhPLL91aGidn/view\" target=\"_blank\">Permenko Perekonomian No. 4 Tahun 2017</a>.</p>', '2023-08-08 03:56:15', 1, '2023-08-17 07:39:03', 0),
(2, 'Jenis Mangrove', '<p class=\"CDt4Ke zfr3Q\" dir=\"ltr\" style=\"text-align: justify;\">ï»¿Pada \r\nekosistem mangrove dikenal jenis-jenis tumbuhan yang dinamakan dengan \r\nmangrove sejati utama (mayor), mangrove sejati tambahan (minor), dan \r\nmangrove ikutan. Mangrove sejati utama (mayor) adalah tumbuhan yang \r\ntumbuh pada wilayah pasang surut dan membentuk tegakan murni. Mangrove \r\njenis ini jarang bergabung dengan tanaman darat. Mangrove sejati minor \r\n(tambahan) adalah bukan komponen penting dari mangrove dan biasanya \r\nditemukan di daerah tepi dan jarang membentuk tegakan, sedangkan \r\nmangrove ikutan adalah tumbuhan yang tidak pernah tumbuh di komunitas \r\nmangrove sejati dan biasanya tumbuh bergabung dengan tumbuhan daratan. \r\nPengenalan sederhana untuk dapat mengenal jenis-jenis mangrove sejati \r\nuntuk tujuan rehabilitasi difokuskan pada jenis-jenis yang membentuk \r\ntegakan murni.<br><br>Jenis mangrove dapat dibedakan dari struktur \r\nperakarannya, bentuk daun serta bentuk buahnya. Berikut merupakan \r\npengenalan jenis mangrove yaitu: Lumnitzera, Excoaria, Xylocarpus, \r\nAegiceras, Scyphiphora dan Nypa.&nbsp;Dan yang biasa ditemukan di Indonesia, \r\nyaitu: Avicennia, Bruguiera, Ceriops, Rhizhopora, Sonneratia.</p>\r\n<p class=\"CDt4Ke zfr3Q\" dir=\"ltr\" style=\"text-align: justify;\">&nbsp;Jumlah \r\njenis mengrove Indonesia tercatat sebanyak 202 jenis, dimana 89 jenis \r\npohon, 5 jenis pemanjat, 44 jenis herba tanah, 44 jenis epifit, dan 1 \r\njenis paku. Dari 202 jenis 43 jenis dikategorikan sebagai mangrove \r\nsejati (true mangrove) sementara sisanya dikategorikan sebagai magnrove \r\nikutan (asociate). Sebaran jenis sesuai dengan pulau di Indonesia, di \r\nJawa dijumpai 166 jenis, 157 jenis di Sumatera, 150 jenis di Kalimantan,\r\n 142 jenis di Irian, 135 jenis di Sulawesi, 133 jenis di Maluku, 120 \r\njenis di Lesser Sunda</p><h4><b>1. Lumnitzera</b></h4><p style=\"text-align: justify; \">&nbsp;Lumnitzera adalah genus tanaman mangrove yang termasuk dalam keluarga Combretaceae. Genus ini mencakup beberapa spesies pohon dan semak yang tumbuh di lingkungan pesisir tropis dan subtropis di berbagai wilayah dunia. Lumnitzera salah satu jenis mangrove sejati yang hanya dapat tumbuh di daerah pinggiran zona mangrove yakni daerah yang berbatasan dengan daerah daratan, sehingga tumbuhan ini juga merupakan salah satu penanda wilayah peralihan antara hutan mangrove dengan hutan daratan.</p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_1.jpg\"><br></p><h4><b>2.&nbsp;Excoecaria agallocha </b></h4><p style=\"text-align: justify;\"><span style=\"font-weight: 600;\">Excoecaria</span>&nbsp;agallochaadalah salah satu spesies tanaman mangrove yang tergolong dalam genus Excoecaria dan keluarga Euphorbiaceae. Tanaman ini dikenal dengan sejumlah nama umum seperti \"Blinding Tree\" atau \"Milky Mangrove.\"&nbsp;spesies bakau, termasuk dalam genus Excoecaria dari famili Euphorbiaceae. Spesies ini memiliki banyak nama umum, termasuk bakau yang membutakan mata Anda, pohon yang membutakan, pohon buta buta, bakau susu, pohon ikan beracun, dan pohon racun sungai.</p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_2.jpg\"><br></p><h4 style=\"text-align: justify; \"><b>3. Xylocarpus granatum</b></h4><p style=\"text-align: justify; \">Xylocarpus granatum adalah salah satu spesies tanaman mangrove yang tergolong dalam genus Xylocarpus dan keluarga Meliaceae. Tanaman ini dikenal juga dengan nama umum \"Cannonball Mangrove\" atau \"Sesal Tree.\"</p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_3.jpg\"><br></p><h4><b>4. Eegiceras</b></h4><p style=\"text-align: justify;\">Eegiceras adalah salah satu jenis tanaman mangrove yang termasuk dalam keluarga Rhizophoraceae. Tanaman ini dikenal juga dengan nama umum \"Yellow Mangrove\" atau \"Gelam Jepara\" dalam bahasa Indonesia. Eegiceras umumnya tumbuh di daerah hutan mangrove dan memiliki beberapa adaptasi khusus untuk hidup di lingkungan berlumpur dan air payau.</p><p style=\"text-align: justify;\"><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_4.jpg\"><br></p><h4><b>5. Scyphiphora hydrophyllacea</b></h4><p style=\"text-align: justify; \">Scyphiphora hydrophyllacea yang juga dikenal sebagai \"Camel\'s Foot\" atau \"Camel\'s Hoof,\" adalah salah satu jenis tanaman mangrove yang dapat ditemukan di berbagai daerah tropis dan subtropis, termasuk di wilayah Asia Tenggara. Tanaman ini termasuk dalam keluarga Rubiaceae.</p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_5.jpg\"><br></p><h4>6. <b>Nipah (Nypa fruticans)&nbsp;</b></h4><p style=\"text-align: justify;\">Nipah (Nypa fruticans) adalah sejenis pohon yang tumbuh khusus di lingkungan hutan mangrove di daerah tropis dan subtropis, terutama di wilayah Asia Tenggara dan Oseania. </p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_6.jpg\"><br></p><h4>7. <b>Avicennia marina</b></h4><p style=\"text-align: justify;\">Avicennia marina yang umumnya dikenal sebagai \"Grey Mangrove,\" adalah salah satu jenis tanaman mangrove yang penting dan tersebar luas di berbagai wilayah tropis dan subtropis di seluruh dunia. </p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_7.jpg\"><br></p><h4>8.&nbsp; <b>Bruguiera&nbsp;</b></h4><p style=\"text-align: justify; \">Bruguiera adalah salah satu genus tanaman mangrove yang termasuk dalam keluarga Rhizophoraceae. Genus ini mencakup beberapa spesies pohon mangrove yang penting dalam ekosistem pesisir di berbagai wilayah tropis dan subtropis.</p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_8.jpg\"><br></p><h4>9. <b>Ceriops&nbsp;</b></h4><p style=\"text-align: justify;\">Ceriops adalah salah satu genus tanaman mangrove yang penting dan tersebar luas di wilayah pesisir tropis dan subtropis di seluruh dunia. Genus ini termasuk dalam keluarga Rhizophoraceae.</p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_9.jpg\"><br></p><h4><b>10. Rhizophora&nbsp;</b></h4><p style=\"text-align: justify;\">Rhizophora adalah salah satu genus tanaman mangrove yang paling terkenal dan umum ditemukan di berbagai wilayah pesisir tropis dan subtropis di seluruh dunia. Genus ini termasuk dalam keluarga Rhizophoraceae.</p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_10.jpg\"><br></p><h4><b>11. Sonneratia</b></h4><p style=\"text-align: justify; \"> Sonneratia adalah salah satu genus tanaman mangrove yang termasuk dalam keluarga Lythraceae. Genus ini mencakup beberapa spesies pohon mangrove yang tersebar di daerah tropis dan subtropis di seluruh dunia.</p><p><img style=\"width: 50%;\" src=\"https://sipengetam.myproject094.online/administrator/assets/img/jenis_11.jpg\"><br></p>', '2023-08-08 03:58:51', 1, '2023-08-17 07:38:13', 0),
(3, 'Fungsi Hutan Mangrove', '<p><span style=\"font-weight: 400;\">Hutan mangrove memiliki banyak fungsi\r\n yang penting bagi lingkungan dan masyarakat. Berikut adalah beberapa \r\nfungsi hutan mangrove:</span></p><p style=\"text-align: justify; \"><strong>1. Melindungi garis pantai</strong>\r\n -Hutan mangrove berfungsi sebagai penghalang alami terhadap badai dan \r\nbanjir, melindungi garis pantai dari erosi dan membantu mengurangi \r\ndampak bencana alam.</p><p style=\"text-align: justify; \">2.&nbsp;<strong>Habitat bagi tumbuhan dan hewan</strong>\r\n -Hutan mangrove menyediakan habitat bagi berbagai jenis tumbuhan dan \r\nhewan, termasuk ikan, burung, dan krustasea. Hutan mangrove juga \r\nmerupakan tempat yang penting bagi migrasi dan reproduksi hewan.</p><p style=\"text-align: justify; \">3.&nbsp;<strong>Penyimpanan karbon</strong>\r\n -Hutan mangrove menyerap dan menyimpan banyak karbon dioksida dari \r\natmosfer, sehingga memiliki peran penting dalam penyimpanan karbon \r\nglobal.</p><p style=\"text-align: justify; \">4.&nbsp;<strong>Sumber makanan dan bahan bakar</strong> -Hutan mangrove merupakan sumber makanan dan bahan bakar bagi masyarakat setempat, termasuk ikan, kerang, dan kayu bakar.</p><p style=\"text-align: justify; \">5.<strong>Penyerap polutan</strong>\r\n -Hutan mangrove juga dapat menyerap polutan dari air laut, seperti \r\nlogam berat dan bahan kimia lainnya, sehingga membantu menjaga kualitas \r\nair laut.</p><p style=\"text-align: justify; \">6.&nbsp;<strong>Penghasilan ekonomi</strong>\r\n -Hutan mangrove juga dapat menghasilkan pendapatan ekonomi bagi \r\nmasyarakat setempat, seperti melalui pariwisata, penangkapan ikan, dan \r\npemanfaatan kayu.</p><p></p>', '2023-08-08 04:00:09', 1, '2023-08-17 07:35:40', 0),
(4, 'Ciri â€“ Ciri Pohon Mangrove', '<p>Hutan Mangrove memiliki ciri - ciri sebagai berikut:</p><p>1. mampu berada pada keadaan salin dan tawar, tidak terpengaruhi iklim</p><p>2. Memiliki jenis pohon yang relatif sedikit. Mempunyai akar yang tidak beraturan (pneumatofora).</p><p style=\"text-align: justify; \">3. Mempunyai biji (propagul) yang bersifat vivipar (dapat berkecambah di pohonnya), utamanya pada Rhizophora.; Memiliki banyak lentisel pada bagian kulit pohon.</p><p>4. tumbuhan pada daerah intertidal yang jenis tanahnya berlumpur, berlempung, atau berpasir, daerah atau lahannya tergenang air laut.</p><p style=\"text-align: justify; \">5. pohon mangrove teradaptasi untuk tumbuh di lingkungan asin dan pasang surut, sehingga hutan mangrove biasanya ditemukan di daerah dengan air laut yang asin.</p><p>6. Pohon mangrove memiliki sistem radikal yang unik yang memungkinkannya untuk tumbuh di dasar laut yang lembab dan asin.</p><p>7. Hutan mangrove ditumbuhi oleh pohon mangrove, yang dapat dikenali dengan batang yang berbulu dan daun yang berwarna hijau kehijauan.</p><p>8. Hutan mangrove biasanya memiliki lapisan tanah yang lembab dan berlumpur, karena terus menerus terkena air pasang surut.</p><p>Hutan mangrove biasanya dikelilingi oleh air laut, yang membantu menjaga kelembaban di dalam hutan.</p><p></p><p></p>', '2023-08-08 04:01:17', 1, '2023-08-17 07:34:23', 0),
(5, 'Manfaat Hutan Mangrove', '<p>Hutan mangrove memiliki manfaat yang sangat penting. Berikut adalah beberapa manfaat hutan mangrove:</p><p><b>1. Perlindungan pesisir</b></p><p style=\"text-align: justify; \">Hutan mangrove berfungsi sebagai benteng alami yang melindungi pesisir dari erosi dan serangan gelombang besar. Akar-akar mangrove yang kuat membantu menjaga stabilitas tanah di sekitar garis pantai.</p><p><b>2. Pengendalian banjir</b></p><p>Hutan mangrove berperan dalam menyerap air dan memperlambat aliran air pasang, sehingga dapat membantu mengurangi risiko banjir di daerah pesisir.</p><p><b>3. Penyaringan air</b></p><p style=\"text-align: justify; \">Akar dan tumbuhan mangrove berfungsi sebagai penyaring alami, membantu menyaring limbah dan polutan dari air yang mengalir melalui ekosistem hutan mangrove sebelum mencapai lautan.</p><p><b>4. Penyimpanan karbon</b></p><p style=\"text-align: justify; \">Hutan mangrove merupakan salah satu ekosistem yang sangat efisien dalam menyimpan karbon. Tanaman mangrove dapat menyerap dan menyimpan jumlah karbon yang besar, membantu mengurangi konsentrasi gas rumah kaca di atmosfer dan berperan dalam mitigasi perubahan iklim.</p><p><b>5. Keanekaragaman hayati</b></p><p style=\"text-align: justify; \">Hutan mangrove adalah rumah bagi berbagai spesies tumbuhan dan hewan yang khas. Ekosistem mangrove menyediakan habitat yang penting bagi berbagai jenis burung, ikan, kepiting, dan organisme lainnya. Ini juga berkontribusi pada keanekaragaman hayati global.</p><p style=\"text-align: justify; \"><b>6. Pemberian mata pencaharian</b></p><p style=\"text-align: justify; \">Hutan mangrove memberikan sumber mata pencaharian bagi komunitas lokal, seperti nelayan, petani garam, dan pengumpul kerang. Mangrove juga memiliki potensi untuk pengembangan ekowisata, yang dapat memberikan peluang ekonomi bagi masyarakat setempat.</p><p><b>7. Penyediaan kayu dan bahan bakar</b></p><p style=\"text-align: justify;\"><span style=\"color: inherit; font-size: 0.9125rem;\">Kayu mangrove yang kuat dan tahan air sering digunakan sebagai bahan konstruksi, pembuatan perabot, dan bahan bakar kayu oleh masyarakat di sekitarnya.</span></p><p></p>', '2023-08-08 04:01:56', 1, '2023-08-17 07:33:12', 0),
(6, 'Event Hutan Mangrove', '<h4 class=\"post-title\"><br></h4>\r\n<img class=\"u-max-full-width responsive\" src=\"https://img.antaranews.com/cache/1200x800/2022/02/18/IMG-20220217-WA0124.jpg\" srcset=\"https://img.antaranews.com/cache/360x240/2022/02/18/IMG-20220217-WA0124.jpg.webp 360w,https://img.antaranews.com/cache/800x533/2022/02/18/IMG-20220217-WA0124.jpg.webp 800w,https://img.antaranews.com/cache/1200x800/2022/02/18/IMG-20220217-WA0124.jpg.webp 1200w\" alt=\"Bupati resmikan Wisata Hutan Mangrove Pantai Celincing Ketapang\" style=\"width: 100%;\"><br><br>\r\n<p style=\"text-align: justify; \">Ketapang (ANTARA) - Bupati Ketapang Martin Rantan menghadiri kegiatan Ketapangku Hijau berupa penanaman 10.000 bibit mangrove sekaligus meresmikan Wisata Hutan Mangrove Pantai Celincing di Dusun Tanjung Basah Desa Sukabaru Kecamatan Benua Kayong Kabupaten Ketapang, Kalimantan Barat.</p><p><a href=\"https://kalbar.antaranews.com/berita/505029/bupati-resmikan-wisata-hutan-mangrove-pantai-celincing-ketapang\" target=\"_blank\">Selengkapnya</a></p><div class=\"tribun-mark\"><h4>Hutan Wisata Mangrove Pantai Celincing Diresmikan, Tanam 10.000 Mangrove</h4></div>\r\n<img style=\"float: none; width: 100%;\" class=\"imgfull\" src=\"https://asset-2.tstatic.net/pontianak/foto/bank/images/bupati-ketapang-martin-rantan-meresmikan-sdf-sd.jpg\" alt=\"Hutan Wisata Mangrove Pantai Celincing Diresmikan, Tanam 10.000 Mangrove\"><br><br>\r\n<p style=\"text-align: justify; \">TRIBUNPONTIANAK.CO.ID, KETAPANG - Bupati Ketapang Martin Rantan meresmikan kawasan wisata hutan mangrove Pantai Celincing dan acara puncak Ketapangku Hijau penanaman 10.000 mangrove di Desa Suka Baru, Kecamatan Benua Kayong, Kabupaten Ketapang, Kamis 17 Februari 2022.</p><p style=\"text-align: justify;\"><a href=\"https://pontianak.tribunnews.com/2022/02/18/hutan-wisata-mangrove-pantai-celincing-diresmikan-tanam-10000-mangrove\" target=\"_blank\">Selengkapnya</a></p><h4 class=\"tdb-title-text\">English Club MAN 1 Ketapang,Dalam Rangka Pemulihan Lingkungan Dan Mitigasi Iklim Di Wisata Hutan Mangrove Pantai Celincing</h4><p></p>\r\n<img class=\"entry-thumb td-animation-stack-type0-2\" src=\"https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405-696x522.jpg\" srcset=\"https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405-696x522.jpg 696w, https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405-300x225.jpg 300w, https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405-1024x768.jpg 1024w, https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405-768x576.jpg 768w, https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405-1536x1152.jpg 1536w, https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405-150x113.jpg 150w, https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405-1068x801.jpg 1068w, https://alealetvnews.com/wp-content/uploads/2022/10/IMG-20221015-WA0405.jpg 1600w\" alt=\"\" title=\"IMG-20221015-WA0405\" style=\"width: 100%;\"><br><br>\r\n\r\n<p>Ale Ale TV News â€“ KETAPANG, KALBAR,- Sabtu 15 Oktober 2022, English Club MAN 1 Ketapang adakan kegiatan bersih â€“ bersih sampah dan penanaman 100 bibit Mangrove di Wisata Hutan Mangrove Pantai Celincing Desa Suka Baru Ketapang.</p><p><a href=\"https://alealetvnews.com/english-club-man-1-ketapangdalam-rangka-pemulihan-lingkungan-dan-mitigasi-iklim-di-wisata-hutan-mangrove-pantai-celincing/\" target=\"_blank\">Selengkapnya</a></p><p>&nbsp;</p>\r\n', '2023-08-16 11:53:43', 1, '2023-08-17 07:30:41', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `id_galeri` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`id_galeri`, `id_tempat`, `foto`, `keterangan`, `created_date`, `created_user`, `updated_date`, `updated_user`) VALUES
(1, 1, '5a0704895e71138f7183ac03eb59e8dc94e1390f.png', 'Hutan Mangrove', '2023-07-27 14:41:24', 2, '2023-08-09 15:51:47', 0),
(2, 1, '4b89e5aac3879bea34c2afe8cbd226ae4e495075.png', 'Hutan&nbsp; Mangrove Pantai Celincing', '2023-07-27 14:41:37', 2, '2023-08-09 15:51:28', 0),
(3, 1, 'e7214185430b8bcb74d609d6a4996af012908374.jpg', '', '2023-08-11 13:24:07', 4, '0000-00-00 00:00:00', 0),
(4, 1, 'b7c25a5d901b3ebe1ec80caffae13aa5603023d0.jpg', '', '2023-08-11 13:24:35', 4, '0000-00-00 00:00:00', 0),
(5, 4, '2566edbbfbdfd638501e79659e25528deb9522fd.jpeg', '', '2023-08-14 13:13:44', 8, '0000-00-00 00:00:00', 0),
(6, 1, 'e3544eb3c1a500422d3eee2d519662eca2e77849.jpeg', '', '2023-08-14 13:17:54', 4, '0000-00-00 00:00:00', 0),
(7, 1, '94dcc91c7f18b51c253bd4f6e516e33456239cdb.jpeg', '', '2023-08-14 13:18:10', 4, '0000-00-00 00:00:00', 0),
(8, 1, '2b3c93578ce34b8185fe112a3cd23694d035471c.jpeg', '', '2023-08-14 13:18:22', 4, '0000-00-00 00:00:00', 0),
(9, 1, 'd9fc031770541d1d8eb52d4d96c31f56e74b2e2e.jpeg', '', '2023-08-14 13:18:44', 4, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lapor`
--

CREATE TABLE `tbl_lapor` (
  `id_lapor` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `email` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_lapor`
--

INSERT INTO `tbl_lapor` (`id_lapor`, `id_tempat`, `nama`, `keterangan`, `email`, `created_date`) VALUES
(1, 1, 'Joko Tingkir', '<p>ada kebakaran di pantai celincing</p>', 'jokotingkir@gmail.com', '2023-06-24 04:55:15'),
(3, 1, 'Joko Tingkir', '<p>dfsfsdf</p>', 'jokotingkir@gmail.com', '2023-06-24 05:33:30'),
(4, 2, 'Joko Tingkir', '<p>dsfdsfdsf</p>', 'jokotingkir@gmail.com', '2023-06-24 05:58:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_pohon`
--

CREATE TABLE `tbl_log_pohon` (
  `id_log` int(11) NOT NULL,
  `tgl_monitor` date NOT NULL,
  `tgl_berikutnya` int(11) NOT NULL,
  `tinggi` float NOT NULL,
  `diameter` float NOT NULL,
  `persentase_tumbuh` varchar(20) NOT NULL,
  `foto_log` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_pohon` int(11) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_log_pohon`
--

INSERT INTO `tbl_log_pohon` (`id_log`, `tgl_monitor`, `tgl_berikutnya`, `tinggi`, `diameter`, `persentase_tumbuh`, `foto_log`, `keterangan`, `id_pohon`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, '2021-08-10', 0, 150, 8, '80', '8723da7aac0f0bb549fa4f74083aad7e4f69b8e4.jpg', '<p>Pengukuran berdasarkan sampel dari bibit mangrove<br></p>', 1, 1, '2023-08-10 12:32:09', 0, '2023-08-15 13:19:42'),
(2, '2022-08-12', 0, 220, 10, '100', '2e6b66006200d23d58eb235916f8666ca3e8ef4b.jpeg', '', 1, 1, '2023-08-12 06:28:28', 0, '2023-08-15 13:19:50'),
(3, '2023-08-12', 0, 270, 15, '100', '04471154beca8aed5aedc0cd1b46c660b654ae86.jpeg', '', 1, 1, '2023-08-12 06:47:42', 0, '2023-08-15 13:19:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pohon`
--

CREATE TABLE `tbl_pohon` (
  `id_pohon` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `tgl_tanam` date NOT NULL,
  `usia_tanam` int(11) NOT NULL,
  `jumlah_bibit` int(11) NOT NULL,
  `foto` text NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_pohon`
--

INSERT INTO `tbl_pohon` (`id_pohon`, `jenis`, `tgl_tanam`, `usia_tanam`, `jumlah_bibit`, `foto`, `id_tempat`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 'Lumnitzera', '2020-09-30', 5, 100, 'c4a0150220c131743ff9788b75ff5b773faa22e9.jpg', 1, 1, '2023-08-10 04:24:16', 0, '2023-08-12 06:23:06'),
(2, 'Lumnitzera', '2023-08-10', 5, 150, '8c97de6b4931bc15f999db0e9121bcdd0aa3c535.png', 2, 1, '2023-08-10 07:23:33', 0, '2023-08-10 07:23:33'),
(3, 'Lumnitzera', '2023-08-10', 6, 200, 'f4cd4b77d25d45c75a0f37904444a868da4e07bf.jpg', 3, 1, '2023-08-10 12:21:49', 0, '2023-08-10 13:31:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id_riwayat`, `id_tempat`, `gambar`, `tanggal`, `status`, `keterangan`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 1, 'cac8ef33adad82b281881f982be7c9c3181fc2c0.png', '2023-06-18', 1, '<p>Sekretaris Daerah Provinsi Provinsi Kalimantan Barat AL Leysandri \r\nmengatakan pemerintah setempat mendukung penuh penetapan Pusat \r\nMangrove&nbsp;Dunia di provinsi itu untuk menjaga kelestarian hutan mangrove</p>', 2, '2023-06-18 11:41:42', 0, '2023-06-22 02:34:53'),
(2, 1, '27fb42edf7b10824752bd02e5b826618bca1b268.jpeg', '2022-06-21', 2, '<p><strong style=\"color: #999;\"></strong>Perusakan mangrove Pantai Celincing terus terjadi. Koalisi PeduliÂ  Pantai Celincing kembali \r\nmelaporkan kerusakan hutan bakau (mangrove) diÂ  Pantai Celincing.<br></p>', 2, '2023-06-22 02:25:15', 0, '2023-06-22 02:26:12'),
(3, 1, 'a3462db40a3df78add320e6ffde4cd4c59a73f68.jpg', '2022-07-04', 3, 'Perbaikan hutan mangrove menjadi salah satu perhatian pemerintah. Karena\r\n itu, pemerintah mengeluarkan regulasi Â Peraturan Menteri Koordinator \r\nBidang Perekonomian (Permenko) No. 4 Tahun 2017 yang mengatur Kebijakan,\r\n Strategi, Program, dan Indikator Kinerja Pengelolaan Ekosistem Mangrove\r\n Nasional (Stranas Mangrove)', 2, '2023-06-22 02:31:12', 0, '2023-07-14 09:37:41'),
(4, 4, 'eb7ae5656ba2feb285ff8d0b3be759ff08f056b2.jpeg', '2023-08-14', 1, '', 8, '2023-08-14 13:12:51', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tempat`
--

CREATE TABLE `tbl_tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_tempat`
--

INSERT INTO `tbl_tempat` (`id_tempat`, `nama_tempat`, `gambar`, `lat`, `lng`, `lokasi`, `keterangan`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 'Wisata Hutan Mangrove Pantai Celincing', '8eb188cf2a02dfeef3a11062f0228220cec87618.jpg', -1.825598140852918, 109.90717916681359, 'Jl. Tanjung Matan, Suka Baru, Benua Kayong, Ketapang Regency, West Kalimantan 78822', 'Pantai Celincing sekarang Sudah berubah nama menjadi Wisata Hutan \r\nMangrove Pantai Celincing diresmikan Oleh Bupati Ketapang Bapak Martin \r\nRantan pada 20 Februari 2022 dan sekarang dikelola oleh Kelompok Sadar \r\nWisata (Pokdarwis) Celincing Bersatu.', 2, '2023-06-18 11:38:15', 0, '2023-08-15 07:40:00'),
(2, 'Wisata Hutan Mangrove, Kuala Satong', 'f3bf4b35e3cb4797e69b1a83e98188d681f6f0a4.png', -1.4026381347602808, 110.07829396515154, 'Kuala Satong, Kec. Matan Hilir Utara, Kabupaten Ketapang, Kalimantan Barat', 'WISATA HUTAN MANGROVE, KUALA SATONG', 2, '2023-06-18 14:51:49', 0, '2023-08-15 07:40:13'),
(3, 'Pantai Pecal Ketapang (Kinjil Pesisir)', '3d79411238a3ce29483300df7481c5695534a684.png', -1.8717217335864547, 109.95821073663353, 'Sungai Kinjil, Kec. Benua Kayong, Kabupaten Ketapang, Kalimantan Barat 78822', 'Pantai Pecal memiliki nama Pantai Kinjil Pesisir. Dahulu, pantai ini terkenal sebagai kawasan hijau karena terdapat sederet pohon nyiur melambai di sepanjang tepiannya serta hamparan pasir putih di sana', 2, '2023-07-26 16:00:00', 0, '2023-08-15 07:40:27'),
(4, 'Desa Sungai Besar', 'b765441804064cf46e64f93ce557cccfd293a7a1.jpeg', -1.9566759714627437, 110.08982687190195, 'Desa Sungai Besar, Kec. Matan Hilir Sel. Kabupaten Ketapang Kalimantan Barat', 'Sungai Besar adalah salah satu desa yang berada di kecamatan Matan Hilir Selatan, Kabupaten Ketapang, Kalimantan Barat, Indonesia. Desa ini terletak di pinggiran Selat Karimata. Disepanjang pesisir pantai banyak terdapat jenis pohon mangrove.', 1, '2023-08-14 13:06:56', 0, '2023-08-15 07:39:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ulasan`
--

CREATE TABLE `tbl_ulasan` (
  `id_ulasan` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_ulasan`
--

INSERT INTO `tbl_ulasan` (`id_ulasan`, `id_tempat`, `nama`, `rating`, `review`, `created_date`) VALUES
(2, 1, 'Joko Tingkir', 5, 'Tempat ini sangat menarik dan menjadi salah satu tempat favorit saya', '2023-07-22 03:08:03'),
(3, 1, 'Wiliam', 5, 'Pemandangannya sangat indah', '2023-07-22 03:42:34'),
(4, 1, 'Zaenal Abidin', 4, 'Suasana khas pantai di muara sungai.. Hutan bakau lebat. Anginnya juga sejuk. Airnya cukup keruh krn endapan lumpur sungai pawan. Bagus untuk foto selvie. Akan lebih bagu lagi jika ada wahana naik perahu ke tengah laut.', '2023-07-22 04:08:28'),
(5, 1, 'Obj Temp', 5, 'Pantai ini tidak terlalu ramai pengunjung wisata mungkin karena disini lebih banyak lumpur dari pada pasir. Namun ketika musim kemarau pantai ini sangat menarik untuk fotografi. Tempat ini lebih banyak digunakan oleh nelayan setempat sebagai pelabuhan dan tempat menangkap ikan.', '2023-07-22 06:49:06'),
(6, 1, 'Stevanus Christian', 5, 'Pantai yg tidak berombak cocok untuk membawa anak2 disini. Ada hutan mangrove yang bisa digunakan untuk menjelajah atau berfoto. Saat sore banyak anak anak kesini bersama orang tua untuk bermain di pantai mandi sedangkan orang tua dapat bersantai menikmati suasana', '2023-07-22 06:53:21'),
(7, 3, 'jones', 5, 'Pantai yang mayoritas jual pecal', '2023-07-30 10:11:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_tempat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `hak_akses`, `password`, `id_tempat`) VALUES
(1, 'Super Admin', 'super', 'Super Admin', '$2y$12$z31cFVTX5yIsqrTeZO9mvuq0X3IYxCWsS/.yvAvbgnujZ/MsBNcCO', 0),
(4, 'Admin', 'admin', 'Administrator', '$2y$12$cRMt5BkyV/u93MPTFy4H5emR2st/1zop6b5HAOX.U1AZWpX1SEIny', 1),
(6, 'Admin 1', 'admin1', 'Administrator', '$2y$12$KykCKfbpP3A3VORnB.V4WurtREejUls4Wz3aa0i8oqaaKcS0uvsDi', 2),
(8, 'kikitriani', 'admin2', 'Administrator', '$2y$12$F6eSgH4huV27mERZeX8KBOAMZFrCMu4yiUV4ix3ChojIQLePUhR3q', 4);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `tbl_edukasi`
--
ALTER TABLE `tbl_edukasi`
  ADD PRIMARY KEY (`id_edukasi`);

--
-- Indeks untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `tbl_lapor`
--
ALTER TABLE `tbl_lapor`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indeks untuk tabel `tbl_log_pohon`
--
ALTER TABLE `tbl_log_pohon`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `tbl_pohon`
--
ALTER TABLE `tbl_pohon`
  ADD PRIMARY KEY (`id_pohon`);

--
-- Indeks untuk tabel `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_tempat` (`id_tempat`);

--
-- Indeks untuk tabel `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indeks untuk tabel `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_edukasi`
--
ALTER TABLE `tbl_edukasi`
  MODIFY `id_edukasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_lapor`
--
ALTER TABLE `tbl_lapor`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_pohon`
--
ALTER TABLE `tbl_log_pohon`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pohon`
--
ALTER TABLE `tbl_pohon`
  MODIFY `id_pohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_tempat`
--
ALTER TABLE `tbl_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_ulasan`
--
ALTER TABLE `tbl_ulasan`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

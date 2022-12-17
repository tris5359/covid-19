-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2020 at 06:56 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_covid19`
--

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `sitename` varchar(40) NOT NULL,
  `tagline` text NOT NULL,
  `email` varchar(35) NOT NULL,
  `addressStore` text NOT NULL,
  `noTlp` varchar(14) NOT NULL,
  `tentangToko` text NOT NULL,
  `fotoToko` varchar(50) NOT NULL,
  `fotoLogo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `sitename`, `tagline`, `email`, `addressStore`, `noTlp`, `tentangToko`, `fotoToko`, `fotoLogo`) VALUES
(1, 'Ryan Jeans', 'Your Best Adventure Partner edit', 'hyugadventure@gmail.comdit', '<p>Desa Surabayan Rt 03 Rw 02 Kec wonopringgo Kab Pekallongan Kota Pekalongan edit</p>', '085773222616', '', 'fotoToko.jpg', 'logoSite.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `kdBerita` int(11) NOT NULL,
  `judulBerita` varchar(65) DEFAULT NULL,
  `isiBerita` text,
  `tglPablish` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `view` int(5) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `kdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_headerfaq`
--

CREATE TABLE `tb_headerfaq` (
  `kdHeader` int(11) NOT NULL,
  `judul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_headerfaq`
--

INSERT INTO `tb_headerfaq` (`kdHeader`, `judul`) VALUES
(1, 'Informasi Dasar COVID-19'),
(2, 'Penularan COVID-19'),
(3, 'Mencegah Penularan COVID-19'),
(4, 'Kasus COVID-19'),
(10, 'Protokol dalam pelaksanaan sekolah tatap muka');

-- --------------------------------------------------------

--
-- Table structure for table `tb_informasi`
--

CREATE TABLE `tb_informasi` (
  `kdIinformasi` int(11) NOT NULL,
  `judul` varchar(45) DEFAULT NULL,
  `content` text,
  `foto` varchar(45) DEFAULT NULL,
  `kdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_isifaq`
--

CREATE TABLE `tb_isifaq` (
  `kdIsi` int(10) NOT NULL,
  `judulisi` text NOT NULL,
  `isi` text NOT NULL,
  `kdHeader` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_isifaq`
--

INSERT INTO `tb_isifaq` (`kdIsi`, `judulisi`, `isi`, `kdHeader`) VALUES
(2, 'Apakah Coronavirus dan COVID-19?', 'Coronavirus merupakan keluarga besar virus yang menyebabkan penyakit pada manusia dan hewan. Pada manusia biasanya menyebabkan penyakit infeksi saluran pernapasan, mulai flu biasa hingga penyakit yang serius seperti Middle East Respiratory Syndrome (MERS) dan Sindrom Pernapasan Akut Berat/Severe Acute Respiratory Syndrome (SARS). Coronavirus jenis baru yang ditemukan pada manusia sejak kejadian luar biasa muncul di Wuhan, Tiongkok, pada Desember 2019, kemudian diberi nama Severe Acute Respiratory Syndrome Coronavirus 2 (SARS-COV2), dan menyebabkan penyakit Coronavirus Disease-2019 (COVID-19).', 1),
(3, 'Apakah gejala COVID-19?', 'Gejala COVID-19 sebagai berikut:<ol><li>Demam ≥ 38°C</li><li>Batuk kering</li><li>Sesak napas</li><li>Nyeri tenggorok/menelan</li></ol>Jika ada orang yang dalam 14 hari sebelum muncul gejala tersebut pernah melakukan perjalanan ke negara terjangkit atau pernah merawat/kontak erat dengan penderita COVID-19, maka orang tersebut akan diperiksa melalui pemeriksaan laboratorium lebih lanjut untuk memastikan diagnosisnya.Jika ada gejala di atas DAN ada riwayat perjalanan dari negara terjangkit COVID-19 atau Anda terpapar dengan pasien positif COVID-19, hubungi Bengkulu Tanggap COVID-19 Dinas Kesehatan Provinsi Bengkulu di nomor 085283798600 untuk mendapat arahan lebih lanjut.', 1),
(4, 'Siapa yang termasuk Orang Dalam Pemantauan (ODP)?', 'Orang Dalam Pemantauan (ODP) adalah seseorang yang mengalami demam (≥38°C) atau riwayat demam; atau ISPA <strong>TANPA </strong>pneumonia <strong>DAN</strong> pada 14 hari terakhir sebelum timbul gejala, memenuhi salah satu kriteria: memiliki riwayat perjalanan atau tinggal di negara/wilayah yang melaporkan transmisi lokal” atau “memiliki riwayat perjalanan atau tinggal di area transmisi lokal di Indonesia”.', 1),
(5, 'Apa saja persyaratan yang diperlukan untuk membuat SIKM?', 'Persyaratan Surat Izin Keluar-Masuk bagi <strong>warga berdomisili Bengkulu</strong>:\r\n                                <br><ol><li>Surat pengantar dari Ketua RT yang diketahui Ketua RW tempat tigngalnya\r\n                                </li><li>Surat pernyataan sehat bermeterai\r\n                                </li><li>Surat keterangan:<br>\r\n                                - perjalanan dinas keluar bengkulu (untuk perjalanan sekali); \r\n                                <br>- surat keterangan bekerja bagi pekerja yang tempat kerjanya berada di luar bengkulu (untuk perjalanan berulang); atau \r\n                                <br>- surat keterangan memiliki usaha di luar bengkulu yang diketahui oleh pejabat berwenang (untuk perjalanan berulang)&nbsp;</li><li>Pas foto berwarna\r\n                                </li><li>Pindaian KTP\r\n                                </li></ol>\r\n                                <br>Persyaratan Surat Izin Keluar-Masuk bagi <strong>warga berdomisili Non-bengkulu</strong>:\r\n                                <br><ol><li>Surat keterangan dari kelurahan/desa asal\r\n                                </li><li>Surat pernyataan sehat bermeterai\r\n                                </li><li>Surat Keterangan Bekerja di Provinsi Bengkulu dari tempat kerja (untuk perjalanan berulang)\r\n                                </li><li>Surat Tugas/Undangan dari instansi/perusahaan tempat bekerja di Bengkulu\r\n                                </li><li>Surat jaminan bermeterai dari keluarga atau tempat kerja yang berada di Provinsi  Bengkulu yang diketahui oleh Ketua RT setempat (untuk perjalanan sekali)\r\n                                </li><li>Surat keterangan domisili tempat tinggal dari kelurahan di Bengkulu untuk pemohon dengan alasan darurat\r\n                                </li><li>Pas foto berwarna\r\n                                </li><li>Pindaian KTP</li></ol>', 1),
(6, 'Siapa yang termasuk Pasien Dalam Pengawasan?', 'Pasien Dalam Pengawasan adalah seseorang dengan Infeksi Saluran Pernapasan Akut (ISPA) yaitu demam (≥38°C) atau riwayat demam; disertai salah satu gejala/tanda penyakit pernapasan seperti: batuk/sesak nafas/sakit tenggorokan/pilek/pneumonia ringan hingga berat DAN tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan DAN pada 14 hari terakhir sebelum timbul gejala, memenuhi salah satu kriteria: \"memiliki riwayat perjalanan atau tinggal di luar negeri yang melaporkan transmisi lokal\" atau \"memiliki riwayat perjalanan atau tinggal di area transmisi lokal di Indonesia\";<strong>atau</strong>Seseorang dengan demam (≥38°C) atau riwayat demam atau ISPA DAN pada 14 hari terakhir sebelum timbul gejala memiliki riwayat kontak dengan kasus konfirmasi atau probabel COVID-19;<strong>atau</strong>Seseorang dengan ISPA berat/pneumonia berat di area transmisi lokal di Indonesia yang membutuhkan perawatan di rumah sakit DAN tidak ada penyebab lain berdasarkan gambaran klinis yang meyakinkan.', 1),
(7, 'Apa yang dimaksud dengan Kontak Erat?', 'Kontak Erat adalah seseorang yang melakukan kontak fisik atau berada dalam ruangan atau berkunjung (dalam radius 1 meter dengan kasus Pasien Dalam Pengawasan, probabel, atau konfirmasi) dalam 2 hari sebelum kasus timbul gejala hingga 14 hari setelah kasus timbul gejala. Dikategorikan menjadi kontak erat risiko rendah apabila kontak dengan kasus Pasien Dalam Pengawasan dan kontak erat risiko tinggi apabila kontak dengan kasus konfirmasi atau probable.', 1),
(8, 'Seberapa bahaya COVID-19 ini?', 'Seperti penyakit pernapasan lainnya, COVID-19 dapat menyebabkan gejala ringan termasuk pilek sakit tenggorokan, batuk, dan demam. Sekitar 80% kasus dapat pulih tanpa perlu perawatan khusus. Sekitar 1 dari setiap 6 orang mungkin akan menderita sakit yang parah, seperti disertai pneumonia atau kesulitan bernafas, yang biasanya muncul secara bertahap. Walaupun angka kematian penyakit ini masih jarang, namun bagi orang yang berusia lanjut, dan orang-orang dengan kondisi medis yang sudah ada sebelumnya (seperti diabetes, tekanan darah tinggi dan penyakit jantung), mereka biasanya lebih rentan untuk gejala yang lebih parah. Orang yang mengalami demam, batuk, dan sulit bernapas harus segera mendapatkan pertolongan medis.', 1),
(9, 'Berapa lama virus ini bertahan di permukaan benda?', 'Sampai saat ini belum diketahui dengan pasti berapa lama COVID-19 mampu bertahan di permukaan suatu benda, meskipun studi awal menunjukkan bahwa COVID-19 dapat bertahan hingga beberapa jam, tergantung jenis permukaan, suhu, atau kelembaban lingkungan.Namun desinfektan sederhana dapat membunuh virus tersebut sehingga tidak mungkin menginfeksi orang lagi. Dan membiasakan cuci tangan dengan air dan sabun, atau handrub berbasis alkohol, serta hindari menyentuh mata, mulut atau hidung (segitiga wajah) lebih efektif melindungi diri Anda.', 1),
(10, 'Apakah COVID-19 seperti SARS?', 'SARS adalah coronavirus yang diidentifikasi pada tahun 2003 dan termasuk dalam keluarga besar virus yang sama dengan COVID-19, namun berbeda jenis virusnya. Gejalanya mirip dengan COVID-19, namun SARS lebih berat. SARS lebih mematikan tetapi tidak lebih infeksius (menular) dibanding COVID-19.', 1),
(11, 'Bagaimana manusia bisa terinfeksi COVID-19?', 'Seseorang dapat terinfeksi dari penderita COVID-19. Penyakit ini dapat menyebar melalui tetesan kecil (droplet) dari hidung atau mulut pada saat batuk atau bersin. Droplet tersebut kemudian jatuh pada benda di sekitarnya. Kemudian jika ada orang lain menyentuh benda yang sudah terkontaminasi dengan droplet tersebut, lalu orang itu menyentuh mata, hidung atau mulut (segitiga wajah), maka orang itu dapat terinfeksi COVID-19. Atau bisa juga seseorang terinfeksi COVID-19 ketika tanpa sengaja menghirup droplet dari penderita. Inilah sebabnya penting untuk memakai masker dan menjaga jarak dengan orang lain.Sampai saat ini, para ahli masih terus melakukan penyelidikan untuk menentukan sumber virus, jenis paparan, dan cara penularannya. Tetap pantau sumber informasi yang akurat dan resmi mengenai perkembangan penyakit ini.', 2),
(12, 'Siapa saja yang berisiko terinfeksi COVID-19?', 'Orang yang tinggal atau bepergian di daerah di mana virus COVID-19 bersirkulasi sangat mungkin berisiko terinfeksi. Mereka yang terinfeksi adalah orang-orang yang dalam 14 hari sebelum muncul gejala melakukan perjalanan dari negara terjangkit, atau yang kontak erat, seperti anggota keluarga, rekan kerja atau tenaga medis yang merawat pasien sebelum mereka tahu pasien tersebut terinfeksi COVID-19.Petugas kesehatan yang merawat pasien yang terinfeksi COVID-19 berisiko lebih tinggi dan harus konsisten melindungi diri mereka sendiri dengan prosedur pencegahan dan pengendalian infeksi yang tepat.', 2),
(13, 'Manakah yang lebih rentan terinfeksi coronavirus: orang yang lebih tua atau orang yang lebih muda?', 'Tidak ada batasan usia orang-orang dapat terinfeksi oleh coronavirus ini (COVID-19). Namun orang yang lebih tua dan orang-orang dengan kondisi medis yang sudah ada sebelumnya (seperti asma, diabetes, penyakit jantung, atau tekanan darah tinggi) tampaknya lebih rentan mengalami gejala yang lebih parah.', 2),
(14, 'Apakah COVID-19 dapat ditularkan dari orang yang tidak bergejala sakit?', 'Cara penularan utama penyakit ini adalah melalui tetesan kecil (droplet) yang dikeluarkan pada saat seseorang batuk atau bersin. Saat ini WHO menilai bahwa risiko penularan dari seseorang yang tidak bergejala COVID-19 sama sekali sangat kecil kemungkinannya.Namun, banyak orang yang teridentifikasi COVID-19 hanya mengalami gejala ringan seperti batuk ringan, atau tidak mengeluh sakit, yang mungkin terjadi pada tahap awal penyakit. Sampai saat ini, para ahli masih terus melakukan penyelidikan untuk menentukan periode penularan atau masa inkubasi COVID-19. Tetap pantau sumber informasi yang akurat dan resmi mengenai perkembangan penyakit ini.', 2),
(15, 'Apakah COVID-19 dapat menular melalui udara?', 'Tidak. Hingga saat ini penelitian menyebutkan bahwa virus penyebab COVID-19 ditularkan melalui kontak dengan tetesan kecil (droplet) dan saluran pernapasan.', 2),
(16, 'Bisakah manusia terinfeksi COVID-19 dari hewan?', 'Saat ini, belum ditemukan bukti bahwa hewan peliharaan seperti anjing atau kucing dapat terinfeksi virus COVID-19. Namun, akan jauh lebih baik untuk selalu mencuci tangan dengan sabun dan air setelah kontak dengan hewan peliharaan. Kebiasaan ini dapat melindungi Anda terhadap berbagai bakteri umum seperti E.coli dan Salmonella yang dapat berpindah antara hewan peliharaan dan manusia.', 2),
(17, 'Apakah sudah ada vaksin atau obat untuk COVID-19?', 'Vaksin untuk mencegah infeksi COVID-19 sedang dalam tahap pengembangan/uji coba.', 2),
(18, 'Sepertinya saya berinteraksi dengan orang terjangkit COVID-19, apa yang harus saya lakukan?', 'Segera hubungi Bengkulu Tanggap COVID-19 Dinas Kesehatan Provinsi Bengkulu di nomor 085283798600 untuk mendapat arahan lebih lanjut.', 2),
(19, 'Teman kantor/sekolah/kuliah atau tetangga saya baru pulang dari Tiongkok atau luar negeri, apa yang harus saya lakukan?', 'Anda tidak disarankan untuk berkegiatan di luar rumah. Pastikan teman atau tetangga Anda melakukan isolasi mandiri atau menghubungi Bengkulu Tanggap COVID-19 Dinas Kesehatan Provinsi Bengkulu di nomor 085283798600 untuk mendapat arahan lebih lanjut.', 2),
(20, 'Bisakah saya terjangkit COVID-19 dari surat atau paket kiriman dari Tiongkok atau luar negeri?', 'rang yang menerima paket tidak berisiko tertular virus COVID-19. Dari pengalaman dengan coronavirus lain, kita tahu bahwa jenis virus ini tidak bertahan lama pada benda mati, seperti surat atau paket.', 2),
(21, 'Bisakah saya terjangkit COVID-19 dari makanan atau makanan yang dikirim?', 'Saat ini tidak ada bukti bahwa penularan  coronavirus penyebab COVID-19 dari makanan. Virus seperti coronavirus tidak bisa hidup lama di luar tubuh.', 2),
(22, 'Berapa lama waktu yang diperlukan sejak tertular/terinfeksi hingga muncul gejala penyakit infeksi COVID-19?', 'Waktu yang diperlukan sejak tertular/terinfeksi hingga muncul gejala disebut masa inkubasi. Saat ini masa inkubasi COVID-19 diperkirakan antara 1-14 hari, dan perkiraan ini dapat berubah sewaktu-waktu sesuai perkembangan kasus.', 2),
(23, 'Bisakah saya dites jika saya merasa saya terjangkit COVID-19?', 'Tes untuk coronavirus hanya dilakukan jika ada kemungkinan besar Anda memiliki penyakit tersebut.Misalnya jika:<ol><li>Anda melakukan kontak dekat dengan seseorang dengan orang yang positif COVID-19</li><li>Anda bepergian ke negara atau daerah dengan risiko COVID-19 tinggi dalam 14 hari terakhir</li></ol>Dalam kasus ini, Anda dapat hubungi Bengkulu Tanggap COVID-19 Dinas Kesehatan Provinsi Bengkulu di nomor 085283798600 untuk mendapat arahan lebih lanjut.', 2),
(24, 'Apa yang harus saya lakukan ketika saya mengalami gejala COVID-19 saat sedang di luar rumah?', 'Anda tidak disarankan untuk melakukan kegiatan di luar rumah kecuali untuk kegiatan yang penting atau mendesak. Jika Anda mengalami gejala demam/batuk/pilek/nyeri tenggorok atau sesak napas, segera kembali ke rumah, lakukan isolasi diri dan Segera hubungi Bengkulu Tanggap COVID-19 Dinas Kesehatan Provinsi Bengkulu di nomor 085283798600 untuk mendapat arahan lebih lanjut.', 2),
(25, 'Apa yang akan terjadi jika tenaga medis profesional menyatakan saya mungkin terjangkit COVID-19?', 'Jika Anda diduga terjangkit COVID-19, Tim Tanggap COVID-19 akan mengambil beberapa sampel untuk diuji, misalnya:<ol><li>Lendir dari hidung, tenggorokan, atau paru-paru, dan/atau</li><li>darah</li></ol>Dan, anda akan diisolasi dari orang lain sampai dikonfirmasi apakah Anda negatif  terinfeksi coronavirus.', 2),
(26, 'Bagaimana mengantisipasi penularan COVID-19?', 'Hingga saat ini, belum ada vaksin untuk mencegah penularan COVID-19 tetapi Anda dapat melakukan tindakan pencegahan agar tidak tertular. Diantaranya dengan:<ol><li>Menjaga kesehatan dan kebugaran agar sistem imunitas/kekebalan tubuh meningkat.</li><li>Mencuci tangan menggunakan sabun dan air mengalir atau menggunakan alkohol 70-80% handrub sesuai langkah-langkah mencuci tangan yang benar. Mencuci tangan sampai bersih merupakan salah satu tindakan yang mudah dan murah. Dan, sebagian besar penyebaran penyakit akibat virus dan bakteri bersumber dari tangan. Karena itu, menjaga kebersihan tangan adalah hal yang sangat penting.</li><li>Ketika batuk dan bersin, upayakan menjaga agar lingkungan Anda tidak tertular. Tutup hidung dan mulut Anda dengan tisu atau dengan lipatan siku tangan bagian dalam (bukan dengan telapak tangan) dan gunakan masker.</li><li>Hindari kontak dengan orang lain atau bepergian ke tempat umum.</li><li>Hindari menyentuh mata, hidung dan mulut (segitiga wajah). Tangan menyentuh banyak hal yang dapat terkontaminasi virus. Jika kita menyentuh mata, hidung dan mulut dengan tangan yang terkontaminasi, maka virus dapat dengan mudah masuk ke tubuh kita.<br></li><li>Gunakan masker penutup mulut dan hidung ketika Anda berada di luar rumah.</li><li>Buang tisu dan masker yang sudah digunakan ke tempat sampah dengan benar, lalu cucilah tangan Anda.</li><li>Menunda perjalanan ke daerah/ negara dimana virus ini ditemukan.</li><li>Hindari bepergian ke luar rumah kecuali untuk kegiatan mendesak atau saat Anda merasa kurang sehat, terutama jika Anda merasa demam, batuk, dan sulit bernapas. Segera hubungi petugas kesehatan terdekat, dan mintalah bantuan mereka. Sampaikan pada petugas jika dalam 14 hari sebelumnya Anda pernah melakukan perjalanan terutama ke negara terjangkit, atau pernah kontak erat dengan orang yang memiliki gejala yang sama. Ikuti arahan dari petugas kesehatan setempat.</li><li>Selalu pantau perkembangan penyakit COVID-19 dari sumber resmi dan akurat. Ikuti arahan dan informasi dari petugas kesehatan dan Dinas Kesehatan setempat. Informasi dari sumber yang tepat dapat membantu Anda melindungi dari Anda dari penularan dan penyebaran penyakit ini.', 3),
(27, 'Apakah masker kesehatan dapat mencegah COVID-19?', 'Iya. Namun, Anda dapat menggunakan masker kain (berlapis 3) karena masker kesehatan dibutuhkan oleh petugas medis.', 3),
(28, 'Apakah saya harus selalu menggunakan masker?', 'Iya. Anda wajib untuk selalu menggunakan masker saat berkegiatan di luar rumah. Masker yang digunakan dapat berupa masker kain (berlapis 3).', 3),
(29, 'Haruskah saya khawatir terhadap penyakit COVID-19 ini?', 'Anda diminta untuk selalu waspada dan mengikuti imbauan pemerintah. Tetap berada di rumah dan berkegiatan dari rumah dan tetap tenang. Carilah informasi yang benar dan akurat tentang perkembangan COVID-19 agar Anda mengetahui situasi wilayah Anda dan Anda dapat mengambil tindakan pencegahan yang tepat.', 3),
(30, 'Apakah antibiotik efektif dalam mencegah atau mengobati COVID-19?', 'Tidak. Antibiotik hanya bekerja untuk melawan bakteri, bukan virus. Karena COVID-19 disebabkan oleh virus, maka antibiotik tidak bisa digunakan sebagai sarana pencegahan atau pengobatan. Namun, jika Anda dirawat di rumah sakit dan didiagnosis COVID-19, Anda mungkin akan diberikan antibiotik, karena seringkali terjadi infeksi sekunder yang disebabkan bakteri.', 3),
(31, 'Seberapa efektif pemindai suhu badan dalam mendeteksi orang yang terjangkit COVID-19?', 'Pemindai suhu tubuh dinilai efektif dalam mendeteksi orang dengan suhu tinggi yang dapat disebabkan oleh coronavirus. Tetapi, alat ini tidak dapat mendeteksi orang yang terjangkit COVID-19 dengan gejala suhu tinggi yang tidak ditemukan.', 3),
(32, 'Bagaimana membedakan antara sakit akibat infeksi COVID-19, dengan influenza biasa?', 'Orang yang terinfeksi COVID-19 dan influenza akan mengalami gejala infeksi saluran pernafasan yang sama, seperti demam, batuk dan pilek. Walaupun gejalanya sama, tapi penyebab virusnya berbeda-beda, sehingga kita sulit mengidentifikasi masing-masing penyakit tersebut.Pemeriksaan medis yang akurat disertai rujukan pemeriksaan laboratorium sangat diperlukan untuk mengonfirmasi apakah seseorang terinfeksi COVID-19. Bagi setiap orang yang menderita demam, batuk, dan sulit bernapas sangat direkomendasikan untuk segera mencari pengobatan, dan memberitahukan petugas kesehatan jika mereka telah melakukan perjalanan dari wilayah terjangkit dalam 14 hari sebelum muncul gejala, atau jika mereka telah melakukan kontak erat dengan seseorang yang sedang menderita gejala infeksi saluran pernafasan.', 3),
(33, 'Berapa banyak orang yang telah terinfeksi oleh COVID-19 dan negara mana saja yang sudah ada kasusnya?', 'WHO secara ketat memantau situasi terkini dan secara teratur menerbitkan informasi tentang penyakit ini. Informasi lebih lanjut mengenai penyakit ini dapat dilihat melalui: https://www.who.int/emergencies/diseases/novel-coronavirus-2019 atau https://infeksiemerging.kemkes.go.id/category/situasi-infeksi-emerging/info-corona-virus', 4),
(34, 'Apakah di Indonesia sudah ditemukan kasus yang terinfeksi?', 'Anda dapat melihat informasi mengenai ODP dan PDP sekaligus orang positif COVID-19 pada portal Kementerian Kesehatan Republik Indonesia di https://infeksiemerging.kemkes.go.id atau pada menu Data di https://https://covid19.bengkuluprov.go.id/ untuk data kasus di Provinsi Bengkulu.', 4),
(35, 'Bagaimana situasi terkini di Indonesia? Apakah sudah ada kasus konfirmasi COVID-19?', 'Situasi perkembangan penyakit COVID-19 di Indonesia dapat dipantau melalui laman website https://infeksiemerging.kemkes.go.id atau melalui https://covid19.bengkuluprov.go.id/data untuk memantau perkembangan kasus di Bengkulu.', 4),
(36, 'Saya akan bepergian ke luar negeri untuk sesuatu yang mendesak, apakah saya dapat memperoleh Surat Keterangan Bebas COVID-19? Di mana?', 'kondisi saat ini, seseorang belum bisa diberikan surat keterangan bebas COVID-19, karena kita tidak pernah tahu apakah dia pernah kontak dengan orang yang sakit COVID-19.', 4),
(37, 'Apakah sudah ada pembatasan untuk bepergian ke Tiongkok dan negara terjangkit lainnya?', 'Sejak 5 Februari 2020, Indonesia telah memberlakukan pembatasan perjalanan ke Tiongkok berupa penghentian sementara penerbangan dari dan ke Tiongkok.\r\n                                <br>Pada tanggal 5 Maret 2020, Indonesia juga memberlakukan pelarangan transit atau masuk ke Indonesia bagi pelaku perjalanan yang dalam 14 hari sebelumnya datang dari wilayah berikut:<ol><li>Iran: Tehran, Qom, Gilan</li><li>Italia: Wilayah Lombardi, Veneto, Emilia Romagna, Marche dan Piedmont</li><li>Korea Selatan: Kota Daegu dan Provinsi Gyeongsangbuk-do.</li></ol>', 4),
(38, 'Di manakah saya bisa mendapatkan media edukasi dan informasi serta situasi perkembangan COVID-19?', 'Informasi tentang media KIE atau situasi perkembangan COVID-19, dapat diakses melalui:Halo Kemenkes: 1500567\r\n                                <br>Hotline Emergency Operation Center (EOC): 119 atau (021) 521 0411 atau 0812 1212 3119Twitter: @KemenkesRI  \r\n                                <br>Facebook: @KementerianKesehatanRI  \r\n                                <br>Instagram: @kemenkes_ri  \r\n                                <br>Website: www.who.int, www.infeksiemerging.kemkes.go.id, www.sehatnegeriku.kemkes.go.id', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabkot`
--

CREATE TABLE `tb_kabkot` (
  `kdDaerah` int(3) NOT NULL,
  `namaDaerah` varchar(45) DEFAULT NULL,
  `provinsi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kabkot`
--

INSERT INTO `tb_kabkot` (`kdDaerah`, `namaDaerah`, `provinsi`) VALUES
(1, 'Kota Bengkulu', 'Bengkulu'),
(2, 'Bengkulu Tengah', 'Bengkulu'),
(4, 'Bengkulu Selatan', 'Bengkulu'),
(5, 'Bengkulu Utara', 'Bengkulu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasus`
--

CREATE TABLE `tb_kasus` (
  `kdKasus` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `terkonfirmasi` int(6) DEFAULT NULL,
  `sembuh` int(6) DEFAULT NULL,
  `meninggal` int(6) DEFAULT NULL,
  `dirawat` int(6) DEFAULT NULL,
  `ODP` int(5) NOT NULL,
  `PDP` int(5) NOT NULL,
  `kdDaerah` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kasus`
--

INSERT INTO `tb_kasus` (`kdKasus`, `tgl`, `terkonfirmasi`, `sembuh`, `meninggal`, `dirawat`, `ODP`, `PDP`, `kdDaerah`) VALUES
(1, '2020-03-02', 0, 0, 0, 0, 0, 0, ''),
(2, '2020-03-03', 0, 0, 0, 0, 0, 0, ''),
(3, '2020-03-04', 0, 0, 0, 0, 0, 0, ''),
(4, '2020-03-05', 0, 0, 0, 0, 0, 0, ''),
(5, '2020-03-06', 0, 0, 0, 0, 0, 0, ''),
(6, '2020-03-07', 0, 0, 0, 0, 0, 0, ''),
(7, '2020-03-08', 0, 0, 0, 0, 0, 0, ''),
(8, '2020-03-09', 0, 0, 0, 0, 0, 0, ''),
(9, '2020-03-10', 0, 0, 0, 0, 0, 0, ''),
(10, '2020-03-11', 0, 0, 0, 0, 0, 0, ''),
(11, '2020-03-12', 0, 0, 0, 0, 0, 0, ''),
(12, '2020-03-13', 0, 0, 0, 0, 0, 0, ''),
(13, '2020-03-14', 0, 0, 0, 0, 0, 0, ''),
(14, '2020-03-15', 0, 0, 0, 0, 0, 0, ''),
(15, '2020-03-16', 0, 0, 0, 0, 0, 0, ''),
(16, '2020-03-17', 0, 0, 0, 0, 0, 0, ''),
(17, '2020-03-18', 0, 0, 0, 0, 0, 0, ''),
(18, '2020-03-19', 0, 0, 0, 0, 0, 0, ''),
(19, '2020-03-20', 0, 0, 0, 0, 0, 0, ''),
(20, '2020-03-21', 0, 0, 0, 0, 0, 0, ''),
(21, '2020-03-22', 0, 0, 0, 0, 0, 0, ''),
(22, '2020-03-23', 0, 0, 0, 0, 0, 0, ''),
(23, '2020-03-24', 0, 0, 0, 0, 0, 0, ''),
(24, '2020-03-25', 0, 0, 0, 0, 0, 0, ''),
(25, '2020-03-26', 0, 0, 0, 0, 0, 0, ''),
(26, '2020-03-27', 0, 0, 0, 0, 0, 0, ''),
(27, '2020-03-28', 0, 0, 0, 0, 0, 0, ''),
(28, '2020-03-29', 0, 0, 0, 0, 0, 0, ''),
(29, '2020-03-30', 0, 0, 0, 0, 0, 0, ''),
(30, '2020-03-31', 1, 0, 1, 0, 0, 0, ''),
(31, '2020-04-01', 0, 0, 0, 0, 0, 0, ''),
(32, '2020-04-02', 0, 0, 0, 0, 0, 0, ''),
(33, '2020-04-03', 1, 0, 0, 0, 0, 0, ''),
(34, '2020-04-04', 0, 0, 0, 0, 0, 0, ''),
(35, '2020-04-05', 0, 0, 0, 0, 0, 0, ''),
(36, '2020-04-06', 0, 0, 0, 0, 0, 0, ''),
(37, '2020-04-07', 0, 0, 0, 0, 0, 0, ''),
(38, '2020-04-08', 0, 0, 0, 0, 0, 0, ''),
(39, '2020-04-09', 2, 0, 0, 0, 0, 0, ''),
(40, '2020-04-10', 0, 0, 0, 0, 0, 0, ''),
(41, '2020-04-11', 0, 0, 0, 0, 0, 0, ''),
(42, '2020-04-12', 0, 0, 0, 0, 0, 0, ''),
(43, '2020-04-13', 0, 0, 0, 0, 0, 0, ''),
(44, '2020-04-14', 0, 0, 0, 0, 0, 0, ''),
(45, '2020-04-15', 0, 0, 0, 0, 0, 0, ''),
(46, '2020-04-16', 0, 0, 0, 0, 0, 0, ''),
(47, '2020-04-17', 0, 0, 0, 0, 0, 0, ''),
(48, '2020-04-18', 0, 0, 0, 0, 0, 0, ''),
(49, '2020-04-19', 0, 0, 0, 0, 0, 0, ''),
(50, '2020-04-20', 0, 0, 0, 0, 0, 0, ''),
(51, '2020-04-21', 4, 1, 0, 0, 0, 0, ''),
(52, '2020-04-22', 0, 0, 0, 0, 0, 0, ''),
(53, '2020-04-23', 0, 0, 0, 0, 0, 0, ''),
(54, '2020-04-24', 0, 0, 0, 0, 0, 0, ''),
(55, '2020-04-25', 0, 0, 0, 0, 0, 0, ''),
(56, '2020-04-26', 0, 0, 0, 0, 0, 0, ''),
(57, '2020-04-27', 0, 0, 0, 0, 0, 0, ''),
(58, '2020-04-28', 0, 0, 0, 0, 0, 0, ''),
(59, '2020-04-29', 4, 0, 0, 0, 0, 0, ''),
(60, '2020-04-30', 0, 0, 0, 0, 0, 0, ''),
(61, '2020-05-01', 0, 0, 0, 0, 0, 0, ''),
(62, '2020-05-02', 0, 0, 0, 0, 0, 0, ''),
(63, '2020-05-03', 0, 0, 0, 0, 0, 0, ''),
(64, '2020-05-04', 0, 0, 0, 0, 0, 0, ''),
(65, '2020-05-05', 0, 0, 0, 0, 0, 0, ''),
(66, '2020-05-06', 2, 0, 0, 0, 0, 0, ''),
(67, '2020-05-07', 0, 0, 0, 0, 0, 0, ''),
(68, '2020-05-08', 0, 0, 0, 0, 0, 0, ''),
(69, '2020-05-09', 23, 0, 0, 0, 0, 0, ''),
(70, '2020-05-10', 0, 0, 0, 0, 0, 0, ''),
(71, '2020-05-11', 0, 0, 0, 0, 0, 0, ''),
(72, '2020-05-12', 3, 0, 0, 0, 0, 0, ''),
(73, '2020-05-13', 0, 0, 0, 0, 0, 0, ''),
(74, '2020-05-14', 2, 0, 1, 0, 0, 0, ''),
(75, '2020-05-15', 11, 0, 0, 0, 0, 0, ''),
(76, '2020-05-16', 3, 0, 0, 0, 0, 0, ''),
(77, '2020-05-17', 9, 0, 0, 0, 0, 0, ''),
(78, '2020-05-18', 1, 0, 0, 0, 0, 0, ''),
(79, '2020-05-19', 1, 0, 0, 0, 0, 0, ''),
(80, '2020-05-20', 0, 0, 0, 0, 0, 0, ''),
(81, '2020-05-21', 2, 2, 0, 0, 0, 0, ''),
(82, '2020-05-22', 0, 6, 0, 0, 0, 0, ''),
(83, '2020-05-23', 0, 0, 0, 0, 0, 0, ''),
(84, '2020-05-24', 0, 0, 0, 0, 0, 0, ''),
(85, '2020-05-25', 0, 0, 0, 0, 0, 0, ''),
(86, '2020-05-26', 0, 0, 0, 0, 0, 0, ''),
(87, '2020-05-27', 0, 5, 0, 0, 0, 0, ''),
(88, '2020-05-28', 2, 0, 0, 0, 0, 0, ''),
(89, '2020-05-29', 1, 6, 0, 0, 0, 0, ''),
(90, '2020-05-30', 14, 2, 0, 0, 0, 0, ''),
(91, '2020-05-31', 5, 0, 0, 0, 0, 0, ''),
(92, '2020-06-01', 0, 0, 0, 0, 0, 0, ''),
(93, '2020-06-02', 1, 3, 0, 0, 0, 0, ''),
(94, '2020-06-03', 0, 0, 0, 0, 0, 0, ''),
(95, '2020-06-04', 0, 0, 0, 0, 0, 0, ''),
(96, '2020-06-05', 0, 0, 1, 0, 0, 0, ''),
(97, '2020-06-06', 0, 12, 1, 0, 0, 0, ''),
(98, '2020-06-07', 0, 3, 0, 0, 0, 0, ''),
(99, '2020-06-08', 0, 0, 0, 0, 0, 0, ''),
(100, '2020-06-09', 0, 6, 0, 0, 0, 0, ''),
(101, '2020-06-10', 0, 1, 0, 0, 0, 0, ''),
(102, '2020-06-11', 0, 1, 0, 0, 0, 0, ''),
(103, '2020-06-12', 3, 1, 0, 0, 0, 0, ''),
(104, '2020-06-13', 3, 9, 1, 0, 0, 0, ''),
(105, '2020-06-14', 3, 0, 1, 0, 0, 0, ''),
(106, '2020-06-15', 0, 4, 0, 0, 0, 0, ''),
(107, '2020-06-16', 3, 1, 0, 0, 0, 0, ''),
(108, '2020-06-17', 1, 2, 0, 0, 0, 0, ''),
(109, '2020-06-18', 0, 0, 0, 0, 0, 0, ''),
(110, '2020-06-19', 2, 3, 2, 0, 0, 0, ''),
(111, '2020-06-20', 9, 3, 0, 0, 0, 0, ''),
(112, '2020-06-21', 0, 1, 0, 0, 0, 0, ''),
(113, '2020-06-22', 0, 0, 0, 0, 0, 0, ''),
(114, '2020-06-23', 2, 0, 1, 0, 0, 0, ''),
(115, '2020-06-24', 0, 1, 1, 0, 0, 0, ''),
(116, '2020-06-25', 2, 5, 0, 0, 0, 0, ''),
(117, '2020-06-26', 4, 10, 0, 0, 0, 0, ''),
(118, '2020-06-27', 1, 1, 0, 0, 0, 0, ''),
(119, '2020-06-28', 0, 0, 0, 0, 0, 0, ''),
(120, '2020-06-29', 0, 0, 1, 0, 0, 0, ''),
(121, '2020-06-30', 0, 0, 1, 0, 0, 0, ''),
(122, '2020-07-01', 4, 1, 0, 0, 0, 0, ''),
(123, '2020-07-02', 1, 1, 0, 0, 0, 0, ''),
(124, '2020-07-03', 6, 3, 0, 0, 0, 0, ''),
(125, '2020-07-04', 1, 0, 1, 0, 0, 0, ''),
(126, '2020-07-05', 4, 1, 0, 0, 0, 0, ''),
(127, '2020-07-06', 0, 0, 0, 0, 0, 0, ''),
(128, '2020-07-07', 3, 1, 0, 0, 0, 0, ''),
(129, '2020-07-08', 7, 2, 0, 0, 0, 0, ''),
(130, '2020-07-09', 4, 1, 1, 0, 0, 0, ''),
(131, '2020-07-10', 3, 2, 0, 0, 0, 0, ''),
(132, '2020-07-11', 4, 1, 0, 0, 0, 0, ''),
(133, '2020-07-12', 1, 0, 0, 0, 0, 0, ''),
(134, '2020-07-13', 0, 1, 0, 0, 0, 0, ''),
(135, '2020-07-14', 5, 1, 0, 0, 0, 0, ''),
(136, '2020-07-15', 2, 1, 0, 0, 0, 0, ''),
(137, '2020-07-16', 1, 1, 0, 0, 0, 0, ''),
(138, '2020-07-17', 2, 1, 0, 0, 0, 0, ''),
(139, '2020-07-18', 6, 0, 0, 0, 0, 0, ''),
(140, '2020-07-19', 2, 3, 0, 0, 0, 0, ''),
(141, '2020-07-20', 0, 0, 1, 0, 0, 0, ''),
(142, '2020-07-21', 0, 0, 1, 0, 0, 0, ''),
(143, '2020-07-22', 0, 0, 0, 0, 0, 0, ''),
(144, '2020-07-23', 0, 0, 0, 0, 0, 0, ''),
(145, '2020-07-24', 0, 0, 0, 0, 0, 0, ''),
(146, '2020-07-25', 0, 0, 0, 0, 40, 49, ''),
(147, '2020-07-26', 0, 0, 0, 0, 0, 0, ''),
(148, '2020-07-27', 0, 0, 0, 0, 0, 0, ''),
(149, '2020-07-28', 0, 0, 0, 0, 0, 0, ''),
(150, '2020-07-29', 0, 0, 0, 0, 0, 0, ''),
(151, '2020-07-30', 0, 0, 0, 0, 0, 0, ''),
(152, '2020-07-31', 0, 0, 0, 0, 0, 0, ''),
(153, '2020-08-01', 0, 0, 0, 0, 0, 0, ''),
(154, '2020-08-02', 0, 0, 0, 0, 0, 0, ''),
(155, '2020-08-03', 0, 0, 0, 0, 0, 0, ''),
(156, '2020-08-04', 0, 0, 0, 0, 0, 0, ''),
(157, '2020-08-05', 0, 0, 0, 0, 0, 0, ''),
(158, '2020-08-06', 0, 0, 0, 0, 0, 0, ''),
(159, '2020-08-07', 0, 0, 0, 0, 0, 0, ''),
(160, '2020-08-08', 0, 0, 0, 0, 0, 0, ''),
(161, '2020-08-09', 0, 0, 0, 0, 0, 0, ''),
(162, '2020-08-10', 0, 0, 0, 0, 0, 0, ''),
(163, '2020-08-11', 0, 0, 0, 0, 0, 0, ''),
(164, '2020-08-12', 0, 0, 0, 0, 0, 0, ''),
(165, '2020-08-13', 0, 0, 0, 0, 0, 0, ''),
(166, '2020-08-14', 0, 0, 0, 0, 0, 0, ''),
(167, '2020-08-15', 0, 0, 0, 0, 0, 0, ''),
(168, '2020-08-16', 0, 0, 0, 0, 0, 0, ''),
(169, '2020-08-17', 0, 0, 0, 0, 0, 0, ''),
(170, '2020-08-18', 0, 0, 0, 0, 0, 0, ''),
(171, '2020-08-19', 0, 0, 0, 0, 0, 0, ''),
(172, '2020-08-20', 0, 0, 0, 0, 0, 0, ''),
(173, '2020-08-21', 0, 0, 0, 0, 0, 0, ''),
(174, '2020-08-22', 0, 0, 0, 0, 0, 0, ''),
(175, '2020-08-23', 0, 0, 0, 0, 0, 0, ''),
(176, '2020-08-24', 0, 0, 0, 0, 0, 0, ''),
(177, '2020-08-25', 0, 0, 0, 0, 0, 0, ''),
(178, '2020-08-26', 0, 0, 0, 0, 0, 0, ''),
(179, '2020-08-27', 0, 0, 0, 0, 0, 0, ''),
(180, '2020-08-28', 0, 0, 0, 0, 0, 0, ''),
(181, '2020-08-29', 0, 0, 0, 0, 0, 0, ''),
(182, '2020-08-30', 0, 0, 0, 0, 0, 0, ''),
(183, '2020-08-31', 0, 0, 0, 0, 0, 0, ''),
(184, '2020-09-01', 0, 0, 0, 0, 0, 0, ''),
(185, '2020-09-02', 0, 0, 0, 0, 0, 0, ''),
(186, '2020-09-03', 0, 0, 0, 0, 0, 0, ''),
(187, '2020-09-04', 0, 0, 0, 0, 0, 0, ''),
(188, '2020-09-05', 0, 0, 0, 0, 0, 0, ''),
(189, '2020-09-06', 0, 0, 0, 0, 0, 0, ''),
(190, '2020-09-07', 0, 0, 0, 0, 0, 0, ''),
(191, '2020-09-08', 0, 0, 0, 0, 0, 0, ''),
(192, '2020-09-09', 0, 0, 0, 0, 0, 0, ''),
(193, '2020-09-10', 0, 0, 0, 0, 0, 0, ''),
(194, '2020-09-11', 0, 0, 0, 0, 0, 0, ''),
(195, '2020-09-12', 0, 0, 0, 0, 0, 0, ''),
(196, '2020-09-13', 0, 0, 0, 0, 0, 0, ''),
(197, '2020-09-14', 0, 0, 0, 0, 0, 0, ''),
(198, '2020-09-15', 0, 0, 0, 0, 0, 0, ''),
(199, '2020-09-16', 0, 0, 0, 0, 0, 0, ''),
(200, '2020-09-17', 0, 0, 0, 0, 0, 0, ''),
(201, '2020-09-18', 0, 0, 0, 0, 0, 0, ''),
(202, '2020-09-19', 0, 0, 0, 0, 0, 0, ''),
(203, '2020-09-20', 0, 0, 0, 0, 0, 0, ''),
(204, '2020-09-21', 0, 0, 0, 0, 0, 0, ''),
(205, '2020-09-22', 0, 0, 0, 0, 0, 0, ''),
(206, '2020-09-23', 0, 0, 0, 0, 0, 0, ''),
(207, '2020-09-24', 0, 0, 0, 0, 0, 0, ''),
(208, '2020-09-25', 0, 0, 0, 0, 0, 0, ''),
(209, '2020-09-26', 0, 0, 0, 0, 0, 0, ''),
(210, '2020-09-27', 0, 0, 0, 0, 0, 0, ''),
(211, '2020-09-28', 0, 0, 0, 0, 0, 0, ''),
(212, '2020-09-29', 0, 0, 0, 0, 0, 0, ''),
(213, '2020-09-30', 0, 0, 0, 0, 0, 0, ''),
(214, '2020-10-01', 0, 0, 0, 0, 0, 0, ''),
(215, '2020-10-02', 0, 0, 0, 0, 0, 0, ''),
(216, '2020-10-03', 0, 0, 0, 0, 0, 0, ''),
(217, '2020-10-04', 0, 0, 0, 0, 0, 0, ''),
(218, '2020-10-05', 0, 0, 0, 0, 0, 0, ''),
(219, '2020-10-06', 0, 0, 0, 0, 0, 0, ''),
(220, '2020-10-07', 0, 0, 0, 0, 0, 0, ''),
(221, '2020-10-08', 0, 0, 0, 0, 0, 0, ''),
(222, '2020-10-09', 0, 0, 0, 0, 0, 0, ''),
(223, '2020-10-10', 0, 0, 0, 0, 0, 0, ''),
(224, '2020-10-11', 0, 0, 0, 0, 0, 0, ''),
(225, '2020-10-12', 0, 0, 0, 0, 0, 0, ''),
(226, '2020-10-13', 0, 0, 0, 0, 0, 0, ''),
(227, '2020-10-14', 0, 0, 0, 0, 0, 0, ''),
(228, '2020-10-15', 0, 0, 0, 0, 0, 0, ''),
(229, '2020-10-16', 0, 0, 0, 0, 0, 0, ''),
(230, '2020-10-17', 0, 0, 0, 0, 0, 0, ''),
(231, '2020-10-18', 0, 0, 0, 0, 0, 0, ''),
(232, '2020-10-19', 0, 0, 0, 0, 0, 0, ''),
(233, '2020-10-20', 0, 0, 0, 0, 0, 0, ''),
(234, '2020-10-21', 0, 0, 0, 0, 0, 0, ''),
(235, '2020-10-22', 0, 0, 0, 0, 0, 0, ''),
(236, '2020-10-23', 0, 0, 0, 0, 0, 0, ''),
(237, '2020-10-24', 0, 0, 0, 0, 0, 0, ''),
(238, '2020-10-25', 0, 0, 0, 0, 0, 0, ''),
(239, '2020-10-26', 0, 0, 0, 0, 0, 0, ''),
(240, '2020-10-27', 0, 0, 0, 0, 0, 0, ''),
(241, '2020-10-28', 0, 0, 0, 0, 0, 0, ''),
(242, '2020-10-29', 0, 0, 0, 0, 0, 0, ''),
(243, '2020-10-30', 0, 0, 0, 0, 0, 0, ''),
(244, '2020-10-31', 0, 0, 0, 0, 0, 0, ''),
(245, '2020-11-01', 0, 0, 0, 0, 0, 0, ''),
(246, '2020-11-02', 0, 0, 0, 0, 0, 0, ''),
(247, '2020-11-03', 0, 0, 0, 0, 0, 0, ''),
(248, '2020-11-04', 0, 0, 0, 0, 0, 0, ''),
(249, '2020-11-05', 0, 0, 0, 0, 0, 0, ''),
(250, '2020-11-06', 0, 0, 0, 0, 0, 0, ''),
(251, '2020-11-07', 0, 0, 0, 0, 0, 0, ''),
(252, '2020-11-08', 0, 0, 0, 0, 0, 0, ''),
(253, '2020-11-09', 0, 0, 0, 0, 0, 0, ''),
(254, '2020-11-10', 0, 0, 0, 0, 0, 0, ''),
(255, '2020-11-11', 0, 0, 0, 0, 0, 0, ''),
(256, '2020-11-12', 0, 0, 0, 0, 0, 0, ''),
(257, '2020-11-13', 0, 0, 0, 0, 0, 0, ''),
(258, '2020-11-14', 0, 0, 0, 0, 0, 0, ''),
(259, '2020-11-15', 0, 0, 0, 0, 0, 0, ''),
(260, '2020-11-16', 0, 0, 0, 0, 0, 0, ''),
(261, '2020-11-17', 0, 0, 0, 0, 0, 0, ''),
(262, '2020-11-18', 0, 0, 0, 0, 0, 0, ''),
(263, '2020-11-19', 0, 0, 0, 0, 0, 0, ''),
(264, '2020-11-20', 0, 0, 0, 0, 0, 0, ''),
(265, '2020-11-21', 0, 0, 0, 0, 0, 0, ''),
(266, '2020-11-22', 0, 0, 0, 0, 0, 0, ''),
(267, '2020-11-23', 0, 0, 0, 0, 0, 0, ''),
(268, '2020-11-24', 0, 0, 0, 0, 0, 0, ''),
(269, '2020-11-25', 0, 0, 0, 0, 0, 0, ''),
(270, '2020-11-26', 0, 0, 0, 0, 0, 0, ''),
(271, '2020-11-27', 0, 0, 0, 0, 0, 0, ''),
(272, '2020-11-28', 0, 0, 0, 0, 0, 0, ''),
(273, '2020-11-29', 0, 0, 0, 0, 0, 0, ''),
(274, '2020-11-30', 0, 0, 0, 0, 0, 0, ''),
(275, '2020-12-01', 0, 0, 0, 0, 0, 0, ''),
(276, '2020-12-02', 0, 0, 0, 0, 0, 0, ''),
(277, '2020-12-03', 0, 0, 0, 0, 0, 0, ''),
(278, '2020-12-04', 0, 0, 0, 0, 0, 0, ''),
(279, '2020-12-05', 0, 0, 0, 0, 0, 0, ''),
(280, '2020-12-06', 0, 0, 0, 0, 0, 0, ''),
(281, '2020-12-07', 0, 0, 0, 0, 0, 0, ''),
(282, '2020-12-08', 0, 0, 0, 0, 0, 0, ''),
(283, '2020-12-09', 0, 0, 0, 0, 0, 0, ''),
(284, '2020-12-10', 0, 0, 0, 0, 0, 0, ''),
(285, '2020-12-11', 0, 0, 0, 0, 0, 0, ''),
(286, '2020-12-12', 0, 0, 0, 0, 0, 0, ''),
(287, '2020-12-13', 0, 0, 0, 0, 0, 0, ''),
(288, '2020-12-14', 0, 0, 0, 0, 0, 0, ''),
(289, '2020-12-15', 0, 0, 0, 0, 0, 0, ''),
(290, '2020-12-16', 0, 0, 0, 0, 0, 0, ''),
(291, '2020-12-17', 0, 0, 0, 0, 0, 0, ''),
(292, '2020-12-18', 0, 0, 0, 0, 0, 0, ''),
(293, '2020-12-19', 0, 0, 0, 0, 0, 0, ''),
(294, '2020-12-20', 0, 0, 0, 0, 0, 0, ''),
(295, '2020-12-21', 0, 0, 0, 0, 0, 0, ''),
(296, '2020-12-22', 0, 0, 0, 0, 0, 0, ''),
(297, '2020-12-23', 0, 0, 0, 0, 0, 0, ''),
(298, '2020-12-24', 0, 0, 0, 0, 0, 0, ''),
(299, '2020-12-25', 0, 0, 0, 0, 0, 0, ''),
(300, '2020-12-26', 0, 0, 0, 0, 0, 0, ''),
(301, '2020-12-27', 0, 0, 0, 0, 0, 0, ''),
(302, '2020-12-28', 0, 0, 0, 0, 0, 0, ''),
(303, '2020-12-29', 0, 0, 0, 0, 0, 0, ''),
(304, '2020-12-30', 0, 0, 0, 0, 0, 0, ''),
(305, '2020-12-31', 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `kdKecamatan` int(5) NOT NULL,
  `namaKecamatan` varchar(30) NOT NULL,
  `kdDaerah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`kdKecamatan`, `namaKecamatan`, `kdDaerah`) VALUES
(1, 'Selebar', 1),
(4, 'Gading Cempaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelurahan`
--

CREATE TABLE `tb_kelurahan` (
  `kdKelurahan` int(9) NOT NULL,
  `namaKelurahan` varchar(60) NOT NULL,
  `kdKecamatan` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_kelurahan`
--

INSERT INTO `tb_kelurahan` (`kdKelurahan`, `namaKelurahan`, `kdKecamatan`) VALUES
(1, 'Sumur Dewa', 1),
(3, 'Pagar Dewa', 1),
(4, 'atest', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `kdLayanan` int(11) NOT NULL,
  `kdUser` int(11) NOT NULL,
  `hasil` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `kdPasien` int(11) NOT NULL,
  `namaPasien` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `kdUser` int(11) NOT NULL,
  `kdDaerah` int(11) NOT NULL,
  `kdRS` int(11) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kota` varchar(45) DEFAULT NULL,
  `kecamatan` varchar(45) DEFAULT NULL,
  `petaKoordinat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rumahsakit`
--

CREATE TABLE `tb_rumahsakit` (
  `kdRS` int(11) NOT NULL,
  `namaRS` varchar(45) DEFAULT NULL,
  `alamaRS` text,
  `noTlp` varchar(14) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `petaKoordinat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_rumahsakit`
--

INSERT INTO `tb_rumahsakit` (`kdRS`, `namaRS`, `alamaRS`, `noTlp`, `email`, `petaKoordinat`) VALUES
(1, 'RSUD Dr. M. Yunus Bengkulu', 'Jl. Bhayangkara Kel. Sidomulyo Kec. Gading Cempaka Kota Bengkulu 38229', '073652004', 'rsudmyunus@gmail.com', 'https://www.google.com/maps/place/RSUD+Dr.+M.+Yunus+Bengkulu/@-3.8337477,102.312505,18z/data=!4m13!1m7!3m6!1s0x2e36ba5c3b71410d:0x63c79585f8ca46da!2sJl.+Bhayangkara,+Sido+Mulyo,+Kec.+Gading+Cemp.,+Kota+Bengkulu,+Bengkulu+38229!3b1!8m2!3d-3.8337183!4d102.3134116!3m4!1s0x2e36ba6859f019a5:0x7eb170b29d50ebdb!8m2!3d-3.8343432!4d102.3140699'),
(2, 'RS Kota Bengkulu', 'Padang Jati, Kec. Ratu Samban, Kota Bengkulu, Bengkulu 38222', '+62 (111) 1111', 'rskotabengkulu@gmail.com', 'https://www.google.com/maps/place/Rumah+Sakit+Umum+Kota+Bengkulu/@-3.7969293,102.265943,18.25z/data=!4m5!3m4!1s0x2e36b03d51b26fb5:0x4c109c4e93a78174!8m2!3d-3.7969953!4d102.266688'),
(3, 'RSUD Arga Makmur', 'Jl. Siti Khadijah No. 08 Arga Makmur Kabupaten Bengkulu Utara', '(0737-521118)', 'perenc.rs@gmail.com', 'https://www.google.com/maps/place/RSUD+Arga+Makmur/@-3.4421887,102.188916,17z/data=!3m1!4b1!4m5!3m4!1s0x2e315bbe11e0303f:0x4ef21c4b72c960ab!8m2!3d-3.4421941!4d102.1911047'),
(4, 'RSUD Hasanuddin Damrah Manna', 'Jl. Raya Padang Panjang Manna Kabupaten Bengkulu Selatan', '085381637684', 'rsudmanna@gmail.com', 'https://www.google.com/maps/place/RSUD+Hasanuddin+Damrah+Manna/@-4.442176,102.8941292,17z/data=!3m1!4b1!4m5!3m4!1s0x2e37ade5c5b3183f:0x96a324d6b7175750!8m2!3d-4.4421814!4d102.8963179');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tanyakami`
--

CREATE TABLE `tb_tanyakami` (
  `kdtanya` int(11) NOT NULL,
  `namaLengkap` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `isi` text,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `tanggapan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tanyakami`
--

INSERT INTO `tb_tanyakami` (`kdtanya`, `namaLengkap`, `email`, `isi`, `tgl`, `waktu`, `tanggapan`) VALUES
(1, 'triska mardiansyah', 'triska619@gmail.com', 'apa sekolah tatap muka masih diberlakukan disaat pidemi covid19?', '2020-07-06', '21:24:58', 'ssss'),
(2, 'triska mardiansyah', 'triska619@gmail.com', 'assalamualaikum', '2020-07-06', '21:24:58', '<p>waalaikumsalam</p>'),
(3, 'triska mardiansyah', 'triska619@gmail.com', 'cara bernafas yang baik dan benar', '2020-07-19', '12:08:07', ''),
(4, 'test', 'triska619@gmail.com', 'test', '2020-07-22', '22:52:17', ''),
(5, 'tesfjvnhj', 'triska619@gmail.com', 'AFHKA', '2020-08-19', '15:04:43', 'fhdsijfk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kdUser` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `instansi` varchar(30) NOT NULL,
  `alamatInstansi` varchar(200) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `noTlp` varchar(20) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `foto` varchar(45) NOT NULL,
  `hakAkses` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kdUser`, `username`, `password`, `nama`, `instansi`, `alamatInstansi`, `email`, `noTlp`, `alamat`, `foto`, `hakAkses`, `status`) VALUES
(1, 'admin', 'admin', 'Administration', 'PROVINSI BENGKULU', 'dirumahAjah', 'triskamardiansyah@gmail.com', '+62 (896) 2483-0138', '<p>alamatRumahSaya</p>', 'Fto-1-IT1.jpg', 1, 1),
(5, '123', '123', 'eaaaaa', 'eaaaaaaaaaaaaaaa', 'almtaaaaaaa', 'as@da.daaaaaaaaaaaaaaaaaaaaaaa', '+62 (333) 3333', '<p>ddaaaaaaaaaa</p>', '', 2, 1),
(6, 'SyntaxError', '123', 'Triska Mardiansyah', 'IT UNIB  ', '', '', '+62 (896) 2483', '', '1.jpg', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`kdBerita`);

--
-- Indexes for table `tb_headerfaq`
--
ALTER TABLE `tb_headerfaq`
  ADD PRIMARY KEY (`kdHeader`);

--
-- Indexes for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  ADD PRIMARY KEY (`kdIinformasi`);

--
-- Indexes for table `tb_isifaq`
--
ALTER TABLE `tb_isifaq`
  ADD PRIMARY KEY (`kdIsi`);

--
-- Indexes for table `tb_kabkot`
--
ALTER TABLE `tb_kabkot`
  ADD PRIMARY KEY (`kdDaerah`);

--
-- Indexes for table `tb_kasus`
--
ALTER TABLE `tb_kasus`
  ADD PRIMARY KEY (`kdKasus`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`kdKecamatan`);

--
-- Indexes for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  ADD PRIMARY KEY (`kdKelurahan`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`kdLayanan`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`kdPasien`,`kdRS`);

--
-- Indexes for table `tb_rumahsakit`
--
ALTER TABLE `tb_rumahsakit`
  ADD PRIMARY KEY (`kdRS`);

--
-- Indexes for table `tb_tanyakami`
--
ALTER TABLE `tb_tanyakami`
  ADD PRIMARY KEY (`kdtanya`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kdUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `kdBerita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_headerfaq`
--
ALTER TABLE `tb_headerfaq`
  MODIFY `kdHeader` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_informasi`
--
ALTER TABLE `tb_informasi`
  MODIFY `kdIinformasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_isifaq`
--
ALTER TABLE `tb_isifaq`
  MODIFY `kdIsi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tb_kabkot`
--
ALTER TABLE `tb_kabkot`
  MODIFY `kdDaerah` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kasus`
--
ALTER TABLE `tb_kasus`
  MODIFY `kdKasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `kdKecamatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kelurahan`
--
ALTER TABLE `tb_kelurahan`
  MODIFY `kdKelurahan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `kdLayanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  MODIFY `kdPasien` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rumahsakit`
--
ALTER TABLE `tb_rumahsakit`
  MODIFY `kdRS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_tanyakami`
--
ALTER TABLE `tb_tanyakami`
  MODIFY `kdtanya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `kdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2021 pada 13.22
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `votedb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$3S/PKotOIdl/HCv/dHxM3uJXUfPuDAK63XIM0jfHxtSq0qehqTFgu'),
(4, 'admin123', '$2y$10$pZqfq.mwwbt6te.yyYVAxetG5UUFhPY9QOQagEd4gjygR31B.NEqC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id_kandidat` int(11) NOT NULL,
  `nama_kandidat` varchar(50) NOT NULL,
  `foto_kandidat` text NOT NULL,
  `fakultas_kandidat` varchar(100) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `proker` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id_kandidat`, `nama_kandidat`, `foto_kandidat`, `fakultas_kandidat`, `visi`, `misi`, `proker`) VALUES
(1, 'Budi Prastyo', 'b.jpeg', 'Ilmu Komputer', '<p>Mewujudkan BEM Universitas &nbsp;sebagai wadah mahasiswa untuk berkolaborasi secara inklusif dan apresiatif demi memaksimalkan potensi mahasiswa dan meningkatkan kinerja organisasi dengan pemanfaatan Teknologi Informasi.</p>', '<ol><li>Membangun tata kelola internal yang apresiatif dan harmonis melalui pelaksanaan peran dan peningkatan kualitas sumber daya yang proporsionala</li><li>Mewujudkan relasi sinergis dengan beragam elemen yang berorientasi pada kebermanfaatan karya dan kontribusi bagi ui dan indonesia</li><li>Menghadirkan gerakan sosial, politik, dan lingkungan hidup yang strategis secara partisipatif</li><li>Meningkatkan kualitas advokasi terhadap kesejahteraan dan pemberdayaan mahasiswa universitas indonesia</li><li>Meningkatkan iklim pengembangan minat dan bakat secara suportif dan apresiatif</li></ol>', '<ol><li>Database jaringan</li><li>Pejuang hijau itu pasti</li><li>Uniss festifal</li></ol>'),
(2, 'Abdurohman Wibisono', 'r.jpeg', 'Ilmu Hukum', '<p>&nbsp;</p>', '<p>&nbsp;</p>', '<p>&nbsp;</p>'),
(3, 'Lulut Ismoyowati', '30.jpeg', 'Psikologi', '<p>&nbsp;</p>', '<p>&nbsp;</p>', '<p>&nbsp;</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panduan`
--

CREATE TABLE `panduan` (
  `id_panduan` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `panduan`
--

INSERT INTO `panduan` (`id_panduan`, `judul`, `isi`) VALUES
(1, 'Panduan E-Voting BEM UNISS', '<ol><li>Pemilih diharapkan secepatnya mengganti password akun dengan cara meng-klik nama profil yang berada pada pojok kanan atas</li><li>Pemilihan dilaksanakan pada hari senin tanggal 30 Agustus 2021 jam 10:00-22:00</li><li>Pemilih hanya dapat melakukan voting kandidat satu kali</li><li>Pemilih hanya bisa melakukan voting ketika sisa waktu masih berjalan atau sudah dibuka</li><li>Pemilih bisa menyaksikan real time proses perhitungan suara yang berada di menu hasil pemilihan</li><li>Ketika waktu pemilihan habis secara otomatis jumlah perolehan suara terbanyaklah yang akan menang</li></ol>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `nama_pemilih` varchar(200) NOT NULL,
  `nim` text NOT NULL,
  `password` text NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `nama_pemilih`, `nim`, `password`, `status`) VALUES
(15, 'Budi Prastyo', '20117012', '$2y$10$04DvZsE4gVEyKKCzi.pWTejdaRjZSwpCi95qQo1JADmNPeAI9rTvO', '1'),
(32, 'Abdurohman Wibisono', '20117001', '$2y$10$am.JfF7id0iAoRi633ngIuYbw9TJM4wXJo17GMGm09n/adT5BkZPW', '1'),
(34, 'Andre Kurniawan', '20117003', '$2y$10$Gm4z9wur8TIPi6lDk6RKReqB7pCvowciCX6yaZkvBq6sf3.ywMhzW', '0'),
(35, 'Muhammad Ainun Najib', '20117071', '$2y$10$M6fqbmspL3OJL1ldfE3vguPSehqHriZ8oBorpr6eTb2vPSomTNtRy', '0'),
(36, 'Muhammad Imron', '20117045', '$2y$10$6Kt.z3rZJ5tZF8haKVpzi.IJb2GvA28TFm4NLwfqrvH.UBYAW51L6', '0'),
(37, 'M. Saefullah', '20117080', '$2y$10$8zmeRrwb5u2RvYIOTR5AeO24Vdt0PBdND4qYf9FhIXcXX7Oaaam4m', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id_vote` int(11) NOT NULL,
  `kandidat_id` int(11) NOT NULL,
  `pemilih_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vote`
--

INSERT INTO `vote` (`id_vote`, `kandidat_id`, `pemilih_id`, `tanggal`) VALUES
(10, 1, 32, '2021-08-25 14:55:22'),
(11, 1, 15, '2021-08-25 14:57:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` int(11) NOT NULL,
  `waktu_selesai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indeks untuk tabel `panduan`
--
ALTER TABLE `panduan`
  ADD PRIMARY KEY (`id_panduan`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id_vote`);

--
-- Indeks untuk tabel `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id_kandidat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `panduan`
--
ALTER TABLE `panduan`
  MODIFY `id_panduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id_vote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

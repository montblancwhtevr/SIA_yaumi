-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Des 2016 pada 07.02
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mawi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekskul`
--

CREATE TABLE IF NOT EXISTS `ekskul` (
`id_ekskul` int(3) NOT NULL,
  `kode_ekskul` varchar(5) NOT NULL,
  `nama_ekskul` varchar(20) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
`id_guru` int(2) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `gender`, `lahir`, `agama`, `alamat`, `telepon`, `jabatan`, `status`) VALUES
(1, '197504062006041006', 'Ahmad Akbar', 'L', '2015-11-09', 'Islam', 'Sleman', '081022333444', 'PNS', 'aktif'),
(7, '197904062009041007', 'Abdulloh', 'L', '2016-06-08', 'Islam', 'Jogja', '087882900300', 'Guru Honorer', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id_kelas` int(2) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL,
  `jenis_kelas` enum('Aliyah','Takhasus') NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `jenis_kelas`, `status`) VALUES
(3, 'K11', 'Kelas X-A', 'Aliyah', 'Aktif'),
(4, 'K12', 'Kelas X-B', 'Aliyah', 'Aktif'),
(5, 'K13', 'Kelas X-C', 'Aliyah', 'Aktif'),
(6, 'K14', 'Kelas X-D', 'Aliyah', 'Aktif'),
(7, 'K15', 'Kelas I Takhasus A', 'Aliyah', 'Aktif'),
(8, 'K16', 'Kelas I Takhasus B', 'Aliyah', 'Aktif'),
(9, 'K21', 'Kelas XII-A IPA', 'Aliyah', 'Aktif'),
(10, 'K22', 'Kelas XII-B IPA', 'Aliyah', 'Aktif'),
(11, 'K23', 'Kelas XII-C IPS', 'Aliyah', 'Aktif'),
(12, 'K24', 'Kelas XII-D IPS', 'Aliyah', 'Aktif'),
(13, 'K25', 'Kelas II Takhasus IPA', 'Aliyah', 'Aktif'),
(14, 'K26', 'Kelas II Takhasus IPS', 'Aliyah', 'Aktif'),
(15, 'K31', 'Kelas XIII-A IPA', 'Aliyah', 'Aktif'),
(16, 'K32', 'Kelas XIII-B IPA', 'Aliyah', 'Aktif'),
(17, 'K33', 'Kelas XIII-C IPS', 'Aliyah', 'Aktif'),
(18, 'K34', 'Kelas XIII-D IPS', 'Aliyah', 'Aktif'),
(19, 'K35', 'Kelas III Takhasus IPA', 'Aliyah', 'Aktif'),
(20, 'K36', 'Kelas III Takhasus IPS', 'Aliyah', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id_login` int(2) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `nama`, `username`, `password`, `foto`) VALUES
(2, 'Yaumi Hashiful Insi', 'admin', 'mimin', 'foto/pp.jpg'),
(4, 'OMi', 'Omi', 'omi', 'foto/pp.jpg'),
(5, 'Hashiful Insi', 'Administrator', 'admin', 'foto/Foto Almamater.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
`id_mapel` int(2) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `jenis_mapel` enum('Pesantren','Negara') NOT NULL,
  `nama_mapel` varchar(20) NOT NULL,
  `kkm` int(3) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `nip` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `kode_mapel`, `jenis_mapel`, `nama_mapel`, `kkm`, `kode_kelas`, `nip`) VALUES
(1, 'MTK001', 'Negara', 'Matematika', 70, 'K11', '197904062009041007');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`id_nilai` int(10) NOT NULL,
  `kode_mapel` varchar(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `kkm` int(3) NOT NULL,
  `absen` int(3) NOT NULL,
  `tugas` int(3) NOT NULL,
  `uts` int(3) NOT NULL,
  `uas` int(3) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `rata` int(3) NOT NULL,
  `status` enum('LULUS','TIDAK LULUS') NOT NULL,
  `kode_ta` varchar(5) NOT NULL,
  `kode_sem` varchar(5) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `kode_mapel`, `nip`, `nis`, `kkm`, `absen`, `tugas`, `uts`, `uas`, `jumlah`, `rata`, `status`, `kode_ta`, `kode_sem`, `kode_kelas`) VALUES
(1, 'MTK001', '197504062006041006', '123456', 70, 80, 80, 80, 80, 320, 80, 'LULUS', '2015', 'S1', 'K11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE IF NOT EXISTS `presensi` (
  `id_presensi` int(100) NOT NULL,
  `kode_ta` varchar(5) NOT NULL,
  `kode_sem` varchar(5) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`id_sem` int(2) NOT NULL,
  `kode_sem` varchar(5) NOT NULL,
  `nama_sem` varchar(10) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `semester`
--

INSERT INTO `semester` (`id_sem`, `kode_sem`, `nama_sem`, `status`) VALUES
(1, 'S1', 'GASAL', 'nonaktif'),
(2, 'S2', 'GENAP', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
`id_siswa` int(5) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Protestan','Hindu','Budha') NOT NULL,
  `alamat` text NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `foto_siswa` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `username`, `password`, `gender`, `lahir`, `agama`, `alamat`, `kode_kelas`, `status`, `foto_siswa`) VALUES
(1, '123456', 'Soekarno', '123456', 'soekarno', 'L', '2016-10-31', 'Islam', 'Banyumas', 'K11', 'aktif', ''),
(2, '123001', 'Abdul', '123001', '123001', 'L', '2016-08-10', 'Islam', 'Sleman', 'K12', 'aktif', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`id_staff` int(2) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Protestan','Hindu','Budha') NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `staff`
--

INSERT INTO `staff` (`id_staff`, `nip`, `nama`, `gender`, `lahir`, `agama`, `alamat`, `telepon`, `jabatan`, `status`) VALUES
(1, '198507141978042004', 'Sujiwo ejo', 'L', '1986-06-02', 'Islam', 'Banyumas, Tambak', '085773663749', 'Bendahara', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE IF NOT EXISTS `tahun` (
`id_ta` int(2) NOT NULL,
  `kode_ta` varchar(5) NOT NULL,
  `nama_ta` varchar(10) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id_ta`, `kode_ta`, `nama_ta`, `status`) VALUES
(1, '2015', '2015/2016', 'aktif'),
(2, '2016', '2016/2017', 'nonaktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `wali_kelas`
--

CREATE TABLE IF NOT EXISTS `wali_kelas` (
`id_walikelas` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `kode_ta` varchar(5) NOT NULL,
  `kode_sem` varchar(5) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
 ADD PRIMARY KEY (`id_ekskul`), ADD UNIQUE KEY `kode_ekskul` (`kode_ekskul`), ADD KEY `nip` (`nip`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`id_guru`), ADD UNIQUE KEY `guru_nip_uq` (`nip`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id_kelas`), ADD UNIQUE KEY `kelas_kode_uq` (`kode_kelas`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
 ADD PRIMARY KEY (`id_mapel`), ADD UNIQUE KEY `mapel_kode_uq` (`kode_mapel`), ADD KEY `nip` (`nip`), ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`id_nilai`), ADD KEY `kode_ta` (`kode_ta`), ADD KEY `kode_sem` (`kode_sem`), ADD KEY `kode_kelas` (`kode_kelas`), ADD KEY `nis` (`nis`), ADD KEY `kode_mapel` (`kode_mapel`), ADD KEY `nip` (`nip`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
 ADD PRIMARY KEY (`id_presensi`), ADD KEY `kode_ta` (`kode_ta`,`kode_sem`,`kode_kelas`,`nis`), ADD KEY `kode_sem` (`kode_sem`), ADD KEY `kode_kelas` (`kode_kelas`), ADD KEY `nis` (`nis`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`id_sem`), ADD UNIQUE KEY `kode_sem_uq` (`kode_sem`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`id_siswa`), ADD UNIQUE KEY `siswa_nis_uq` (`nis`), ADD KEY `kode_kelas` (`kode_kelas`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`id_staff`), ADD UNIQUE KEY `staff_nip_uq` (`nip`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
 ADD PRIMARY KEY (`id_ta`), ADD UNIQUE KEY `kode_ta_uq` (`kode_ta`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
 ADD PRIMARY KEY (`id_walikelas`), ADD KEY `nip` (`nip`,`kode_ta`,`kode_sem`,`kode_kelas`), ADD KEY `kode_kelas` (`kode_kelas`), ADD KEY `kode_sem` (`kode_sem`), ADD KEY `kode_ta` (`kode_ta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
MODIFY `id_ekskul` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
MODIFY `id_guru` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id_kelas` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `id_login` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
MODIFY `id_mapel` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `id_sem` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
MODIFY `id_siswa` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `id_staff` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
MODIFY `id_ta` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
MODIFY `id_walikelas` int(10) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ekskul`
--
ALTER TABLE `ekskul`
ADD CONSTRAINT `ekskul_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `mapel_ibfk_2` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_ta`) REFERENCES `tahun` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`kode_sem`) REFERENCES `semester` (`kode_sem`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_5` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_6` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_7` FOREIGN KEY (`kode_mapel`) REFERENCES `mapel` (`kode_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `nilai_ibfk_8` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `presensi`
--
ALTER TABLE `presensi`
ADD CONSTRAINT `presensi_ibfk_1` FOREIGN KEY (`kode_ta`) REFERENCES `tahun` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `presensi_ibfk_2` FOREIGN KEY (`kode_sem`) REFERENCES `semester` (`kode_sem`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `presensi_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `presensi_ibfk_4` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
ADD CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `wali_kelas`
--
ALTER TABLE `wali_kelas`
ADD CONSTRAINT `wali_kelas_ibfk_1` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `wali_kelas_ibfk_2` FOREIGN KEY (`kode_sem`) REFERENCES `semester` (`kode_sem`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `wali_kelas_ibfk_3` FOREIGN KEY (`kode_ta`) REFERENCES `tahun` (`kode_ta`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `wali_kelas_ibfk_4` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

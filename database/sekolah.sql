-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 14, 2020 at 04:03 AM
-- Server version: 10.1.45-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ti17159_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis_pembayaran` int(30) NOT NULL,
  `jenis_pembayaran` varchar(70) NOT NULL,
  `nominal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis_pembayaran`, `jenis_pembayaran`, `nominal`) VALUES
(1, 'Dana Kegiatan', '600000'),
(2, 'PSG', '500000'),
(3, 'Ujian UAS', '60000'),
(4, 'UKK', '50000'),
(8, 'Dana Akhir Kelas 12', '200000'),
(9, 'Ujian UTS', '40000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datasiswa`
--

CREATE TABLE `tb_datasiswa` (
  `id_siswa` int(30) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nama_siswa` varchar(80) NOT NULL,
  `tempat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(20) NOT NULL,
  `jurusan` char(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `tingkat` text NOT NULL,
  `tahun_ajaran` char(20) NOT NULL,
  `nama_walimurid` varchar(50) NOT NULL,
  `no_telepon_walimurid` varchar(20) NOT NULL,
  `agama` char(20) NOT NULL,
  `alamat` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datasiswa`
--

INSERT INTO `tb_datasiswa` (`id_siswa`, `nisn`, `nama_siswa`, `tempat`, `tanggal_lahir`, `jenis_kelamin`, `jurusan`, `kelas`, `tingkat`, `tahun_ajaran`, `nama_walimurid`, `no_telepon_walimurid`, `agama`, `alamat`, `status`) VALUES
(13, '1170/788.111', 'Agung Wahyu Saputra', 'Banyuwangi', '2020-02-23', 'L', 'Akuntansi', 'XII AK 1', 'XII', '2018 -2019', 'Abdul Hamid', '085230203910', 'Islam', 'Dsn. Tegalrejo RT 3 RW 1 Ds. Bayu Kec. Songgon', 'Yatim'),
(14, '1172/790.111', 'Agustina Tri Wulandari', 'Banyuwangi', '2002-08-12', 'P', 'Akuntansi', 'XII AK 1', 'XII', '2018 -2019', 'Gunawan', '081234839706', 'Islam', 'Dsn.Pertapan Ds.Sragi Kec.Songgon', ''),
(15, '1173/791.111', 'Ainiyah', 'Banyuwangi', '2003-05-02', 'P', 'Akuntansi', 'XI AK 1', 'XI', '2018 -2019', 'Sanuri', '082310070818', 'Islam', 'Dsn. Blumbang Ds. Singolatren Kec. Singojuruh Rt/Rw 01/01', ''),
(16, '814/090.041', 'Abdul Nasir', 'Jembrana', '2002-12-19', 'L', 'Teknik Sepeda Motor', 'XII TSM', 'XII', '2018 -2019', 'Imam Safi\'i', '085230203910', 'Islam', 'Lingkungan Bilukpoh Ds. Tegal Cangkring', 'Yatim');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gaji`
--

CREATE TABLE `tb_gaji` (
  `id_gaji` int(30) NOT NULL,
  `bulan` char(20) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_karyawan` varchar(80) NOT NULL,
  `tanggal_pembayaran_gaji` date NOT NULL,
  `gaji_pokok` int(50) NOT NULL,
  `tunjangan_yayasan` int(50) NOT NULL,
  `potongan_bpjs` int(50) NOT NULL,
  `potongan_simpanansejahtera` int(50) NOT NULL,
  `potongan_rumahinfaq` int(50) NOT NULL,
  `potongan_lainlain` int(50) NOT NULL,
  `total_gaji` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gaji`
--

INSERT INTO `tb_gaji` (`id_gaji`, `bulan`, `nip`, `nama_karyawan`, `tanggal_pembayaran_gaji`, `gaji_pokok`, `tunjangan_yayasan`, `potongan_bpjs`, `potongan_simpanansejahtera`, `potongan_rumahinfaq`, `potongan_lainlain`, `total_gaji`) VALUES
(2, '09', '198607092015031003', 'Mustaqim S.Pd', '2020-09-13', 2000000, 0, 0, 0, 0, 0, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_history`
--

CREATE TABLE `tb_history` (
  `nisn` varchar(50) NOT NULL,
  `tahun_ajaran` char(50) NOT NULL,
  `id_kelas` varchar(30) NOT NULL,
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(30) NOT NULL,
  `jurusan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `jurusan`) VALUES
(1, 'Akuntansi'),
(2, 'Teknik Komputer Jaringan'),
(3, 'Teknik Kendaraan Ringan'),
(4, 'Teknik Sepeda Motor');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama_karyawan` varchar(80) NOT NULL,
  `jabatan` char(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_rekening` varchar(200) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `id_user` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nip`, `nama_karyawan`, `jabatan`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_rekening`, `no_telepon`, `id_user`) VALUES
(1, '197508082000062001', 'Puji Astuti,SE', 'Kepala Sekolah', 'Banyuwangi', '1975-08-08', 'Dusun.Sumberarum pasar,Rt.04 Rw.02 Ds.Sumberarum,kec.Songgon,Kab.BWI', '98779798', '085230203910', 2),
(16, '198708212011052001', 'Dyah Primasari S.Pd', 'Bendahara', 'Banyuwangi', '1987-08-21', 'Dsn.Lugonto . RT.03/RW.01,  Ds.Rogojampi-Kec.Rogojampi - Kab. Banyuwangi', '657657', '081217673244', 4),
(18, '199008132015122003', 'Lailatul Maftuhah, S.Pd', 'Karyawan', 'Banyuwangi', '1990-08-13', 'Dsn. Cangkring. RT.03/RW.01,Ds.Pengatigan  - Kec.Rogojampi - Kab. Banyuwangi ', '1762681865', '085230203910', 0),
(24, '198607092015031003', 'Mustaqim S.Pd', 'Karyawan', 'Banyuwangi', '1986-07-09', 'Dsn.Patoman Timur,Rt.03/Rw.02, Ds.Patoman, Kec.Rogojampi, Kab.Banyuwangi', '0812806463251234', '081280646325', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kaskeluar`
--

CREATE TABLE `tb_kaskeluar` (
  `id_kaskeluar` int(30) NOT NULL,
  `kode_pengeluaran` text NOT NULL,
  `id_gaji_karyawan` int(30) NOT NULL,
  `gaji_karyawan` int(50) NOT NULL,
  `nama_karyawan` text NOT NULL,
  `tanggal_kaskeluar` date NOT NULL,
  `pembelian_peralatanpraktik` int(50) NOT NULL,
  `pembayaran_wifi` int(50) NOT NULL,
  `pembayaran_telepon` int(50) NOT NULL,
  `pembayaran_listrik` int(50) NOT NULL,
  `belanja_atk` int(50) NOT NULL,
  `ket_keluar` text NOT NULL,
  `total` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kaskeluar`
--

INSERT INTO `tb_kaskeluar` (`id_kaskeluar`, `kode_pengeluaran`, `id_gaji_karyawan`, `gaji_karyawan`, `nama_karyawan`, `tanggal_kaskeluar`, `pembelian_peralatanpraktik`, `pembayaran_wifi`, `pembayaran_telepon`, `pembayaran_listrik`, `belanja_atk`, `ket_keluar`, `total`) VALUES
(1, 'SMK-KAS-KELUAR-20-09-07-06', 0, 0, '-', '2020-09-10', 0, 0, 0, 100000, 0, 'Pembayaran listrik bulan september', 100000),
(7, 'SMK-KAS-KELUAR-20-09-13-04', 2, 200000, 'Mustaqim S.Pd', '2020-09-13', 0, 0, 0, 0, 0, 'Pembayaran Gaji Mustaqim S.Pd', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kasmasuk`
--

CREATE TABLE `tb_kasmasuk` (
  `id_kasmasuk` int(30) NOT NULL,
  `id_pembayaran` int(30) NOT NULL,
  `kode_penerimaan` varchar(30) NOT NULL,
  `tanggal_kasmasuk` date NOT NULL,
  `semester` varchar(20) NOT NULL,
  `th_ajaran` varchar(20) NOT NULL,
  `dana_kegiatan` int(50) NOT NULL,
  `psg` int(50) NOT NULL,
  `ukk` int(50) NOT NULL,
  `ujian_uts` int(50) NOT NULL,
  `ujian_uas` int(50) NOT NULL,
  `dana_akhirkls12` int(50) NOT NULL,
  `jumlah_kasmasuk` int(80) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kasmasuk`
--

INSERT INTO `tb_kasmasuk` (`id_kasmasuk`, `id_pembayaran`, `kode_penerimaan`, `tanggal_kasmasuk`, `semester`, `th_ajaran`, `dana_kegiatan`, `psg`, `ukk`, `ujian_uts`, `ujian_uas`, `dana_akhirkls12`, `jumlah_kasmasuk`, `keterangan`) VALUES
(30, 1, 'SMK-20-09-06-27', '2020-09-06', 'Genap', '2020', 600000, 0, 0, 0, 0, 0, 600000, 'Pembayaran Dana Kegiatan Lunas, '),
(31, 2, 'SMK-20-09-07-19', '2020-06-11', 'Ganjil', '2019', 0, 0, 0, 40000, 0, 200000, 240000, 'Pembayaran Dana Ujian UTS Semester Ganjil Lunas, Dana Akhir Kelas 12 Cicilan, '),
(32, 3, 'SMK-20-09-07-05', '2020-06-12', 'Genap', '2019', 600000, 0, 0, 40000, 0, 787500, 1427500, 'Pembayaran Dana Kegiatan Lunas, Dana Ujian UTS Semester Genap Lunas, Dana Akhir Kelas 12 Lunas, '),
(33, 4, 'SMK-20-09-13-05', '2020-02-12', 'Genap', '2019', 0, 0, 0, 0, 60000, 0, 60000, 'Pembayaran Dana Ujian UAS Semester Genap Lunas, ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(30) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `jurusan` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `jurusan`) VALUES
(5, 'X AK 1', 'Akuntansi'),
(6, 'X AK 2', 'Akuntansi'),
(7, 'X AK 3', 'Akuntansi'),
(8, 'X AK 4', 'Akuntansi'),
(9, 'X TSM', 'Teknik Sepeda Motor'),
(10, 'X TKR 1', 'Teknik Kendaraan Ringan'),
(11, 'X TKR 2', 'Teknik Kendaraan Ringan'),
(12, 'X TKJ 1', 'Teknik Komputer Jaringan'),
(13, 'X TKJ 2', 'Teknik Komputer Jaringan'),
(14, 'X TKJ 3', 'Teknik Komputer Jaringan'),
(15, 'XII AK 1', 'Akuntansi'),
(16, 'XII AK 1', 'Akuntansi'),
(17, 'XII AK 3', 'Akuntansi'),
(18, 'XII AK 4', 'Akuntansi'),
(19, 'XI TSM', 'Teknik Sepeda Motor'),
(20, 'XI TKR 1', 'Teknik Kendaraan Ringan'),
(21, 'XI TKR 2', 'Teknik Kendaraan Ringan'),
(22, 'XI TKJ 1', 'Teknik Komputer Jaringan'),
(23, 'XI TKJ 2', 'Teknik Komputer Jaringan'),
(24, 'XI TKJ 3', 'Teknik Komputer Jaringan'),
(25, 'XII AK 1', 'Akuntansi'),
(26, 'XII AK 1', 'Akuntansi'),
(27, 'XII AK 1', 'Akuntansi'),
(28, 'XII AK 2', 'Akuntansi'),
(29, 'XII TSM', 'Teknik Sepeda Motor'),
(30, 'XII TKR', 'Teknik Kendaraan Ringan'),
(31, 'XII TKJ 1', 'Teknik Komputer Jaringan'),
(32, 'XII TKJ 2', 'Teknik Komputer Jaringan'),
(33, 'XII TKJ 3', 'Teknik Komputer Jaringan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(30) NOT NULL,
  `id_siswa` int(30) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nama_siswa` varchar(80) NOT NULL,
  `kelas` char(50) NOT NULL,
  `jurusan` char(50) NOT NULL,
  `th_ajaran` varchar(20) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `semester` varchar(20) NOT NULL,
  `dana_kegiatan` varchar(50) NOT NULL,
  `psg` varchar(50) NOT NULL,
  `ukk` varchar(50) NOT NULL,
  `ujian_uts` varchar(50) NOT NULL,
  `ujian_uas` varchar(50) NOT NULL,
  `dana_akhir12` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_siswa`, `nisn`, `nama_siswa`, `kelas`, `jurusan`, `th_ajaran`, `tanggal_pembayaran`, `semester`, `dana_kegiatan`, `psg`, `ukk`, `ujian_uts`, `ujian_uas`, `dana_akhir12`, `jumlah`, `keterangan`) VALUES
(1, 15, '1173/791.111', 'Ainiyah', 'XI AK 1', 'Akuntansi', '2020', '2020-09-06', 'Genap', '600000', '0', '0', '0', '0', '0', 600000, 'Pembayaran Dana Kegiatan Lunas, '),
(2, 14, '1172/790.111', 'Agustina Tri Wulandari', 'XII AK 1', 'Akuntansi', '2019', '2020-06-11', 'Ganjil', '0', '0', '0', '40000', '0', '200000', 240000, 'Pembayaran Dana Ujian UTS Semester Ganjil Lunas, Dana Akhir Kelas 12 Cicilan, '),
(3, 13, '1170/788.111', 'Agung Wahyu Saputra', 'XII AK 1', 'Akuntansi', '2019', '2020-06-12', 'Genap', '600000', '0', '0', '40000', '0', '787500', 1427500, 'Pembayaran Dana Kegiatan Lunas, Dana Ujian UTS Semester Genap Lunas, Dana Akhir Kelas 12 Lunas, '),
(4, 13, '1170/788.111', 'Agung Wahyu Saputra', 'XII AK 1', 'Akuntansi', '2019', '2020-02-12', 'Genap', '0', '0', '0', '0', '60000', '0', 60000, 'Pembayaran Dana Ujian UAS Semester Genap Lunas, ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekapitulasi`
--

CREATE TABLE `tb_rekapitulasi` (
  `kode` varchar(50) NOT NULL,
  `keterangan` char(80) NOT NULL,
  `masuk` int(50) NOT NULL,
  `keluar` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekapitulasi`
--

INSERT INTO `tb_rekapitulasi` (`kode`, `keterangan`, `masuk`, `keluar`) VALUES
('SMK-REKAP-20-09-06-27', '2020-09-06', 600000, 0),
('SMK-REKAP-20-09-07-05', '2020-06-12', 1427500, 0),
('SMK-REKAP-20-09-07-06', '2020-09-10', 0, 100000),
('SMK-REKAP-20-09-07-19', '2020-06-11', 240000, 0),
('SMK-REKAP-20-09-07-20', '2020-06-10', 0, 1930000),
('SMK-REKAP-20-09-13-04', '2020-09-13', 0, 200000),
('SMK-REKAP-20-09-13-05', '2020-02-12', 60000, 0),
('SMK-REKAP-20-09-13-18', '2020-09-13', 0, 200000),
('SMK-REKAP-20-09-13-21', '2020-09-08', 0, 200000),
('SMK-REKAP-20-09-13-28', '2020-08-12', 0, 200000),
('SMK-REKAP-20-09-13-29', '2020-09-08', 20000, 0),
('SMK-REKAP-20-09-13-30', '2020-09-13', 600000, 0),
('SMK-REKAP-20-09-13-30-30', '2020-07-08', 0, 990000),
('SMK-REKAP-20-09-13-37', '2020-06-16', 0, 500000),
('SMK-REKAP-20-09-13-50', '2020-09-13', 600000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `level` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(2, 'kepsek', '8561863b55faf85b9ad67c52b3b851ac', '2'),
(4, 'bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis_pembayaran`);

--
-- Indexes for table `tb_datasiswa`
--
ALTER TABLE `tb_datasiswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nisn` (`nisn`);

--
-- Indexes for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tb_history`
--
ALTER TABLE `tb_history`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `kelas` (`id_kelas`),
  ADD KEY `tahun_ajaran` (`tahun_ajaran`),
  ADD KEY `tahun_ajaran_2` (`tahun_ajaran`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `nip` (`nip`);

--
-- Indexes for table `tb_kaskeluar`
--
ALTER TABLE `tb_kaskeluar`
  ADD PRIMARY KEY (`id_kaskeluar`);

--
-- Indexes for table `tb_kasmasuk`
--
ALTER TABLE `tb_kasmasuk`
  ADD PRIMARY KEY (`id_kasmasuk`),
  ADD UNIQUE KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `tb_rekapitulasi`
--
ALTER TABLE `tb_rekapitulasi`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `masuk` (`masuk`),
  ADD KEY `keluar` (`keluar`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id_jenis_pembayaran` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_datasiswa`
--
ALTER TABLE `tb_datasiswa`
  MODIFY `id_siswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_gaji`
--
ALTER TABLE `tb_gaji`
  MODIFY `id_gaji` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_kaskeluar`
--
ALTER TABLE `tb_kaskeluar`
  MODIFY `id_kaskeluar` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kasmasuk`
--
ALTER TABLE `tb_kasmasuk`
  MODIFY `id_kasmasuk` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_kasmasuk`
--
ALTER TABLE `tb_kasmasuk`
  ADD CONSTRAINT `tb_kasmasuk_ibfk_1` FOREIGN KEY (`id_pembayaran`) REFERENCES `tb_pembayaran` (`id_pembayaran`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

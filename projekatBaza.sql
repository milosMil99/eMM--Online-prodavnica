-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 05:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `userID` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`userID`, `ime`, `username`, `password`, `admin`) VALUES
(1, 'Milos', 'misa', 'admin', 1),
(33, 'Milos', 'milos2318', 'asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kupljeniuredjaji`
--

CREATE TABLE `kupljeniuredjaji` (
  `id` int(11) NOT NULL,
  `idUredjaja` int(11) NOT NULL,
  `markaUredjaja` varchar(20) NOT NULL,
  `idRacuna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupljeniuredjaji`
--

INSERT INTO `kupljeniuredjaji` (`id`, `idUredjaja`, `markaUredjaja`, `idRacuna`) VALUES
(4, 2, 'Galaxy S21 Ultra', 34),
(5, 6, 'Note 10+', 34),
(6, 1, 'Galaxy S21', 34),
(7, 5, 'Note 20', 35),
(8, 1, 'Galaxy S21', 35),
(9, 1, 'Galaxy S21', 36),
(10, 1, 'Galaxy S21', 37);

-- --------------------------------------------------------

--
-- Table structure for table `poruke`
--

CREATE TABLE `poruke` (
  `porukaID` int(11) NOT NULL,
  `ImePrezime` varchar(30) NOT NULL,
  `eMail` varchar(20) NOT NULL,
  `telBr` varchar(15) NOT NULL,
  `naslovPoruke` varchar(20) NOT NULL,
  `poruka` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poruke`
--

INSERT INTO `poruke` (`porukaID`, `ImePrezime`, `eMail`, `telBr`, `naslovPoruke`, `poruka`) VALUES
(1, 'Jovana', 'asd@gmail.com', '123', 'asd', 'asdasdas'),
(2, 'Jovana', 'astormilos@gmail.com', '123', 'asd', 'asdasdas'),
(3, 'Jovana', 'astormilos@gmail.com', '123', 'asd', 'asdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `racun`
--

CREATE TABLE `racun` (
  `racunID` int(11) NOT NULL,
  `ImePrezime` varchar(50) NOT NULL,
  `eMail` varchar(50) NOT NULL,
  `brTelefona` varchar(15) NOT NULL,
  `adresa` varchar(30) NOT NULL,
  `napomena` varchar(100) NOT NULL,
  `ukupnaCena` varchar(15) NOT NULL,
  `datumKupovine` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `racun`
--

INSERT INTO `racun` (`racunID`, `ImePrezime`, `eMail`, `brTelefona`, `adresa`, `napomena`, `ukupnaCena`, `datumKupovine`) VALUES
(1, 'Milos M', 'astormilos@gmail.com', '123', 'asdasd', 'asd', '2000', '0000-00-00'),
(26, 'Milos M', 'astormilos@gmail.com', '123', 'asdasd', 'asdasdas', '170.999', '2021-02-25'),
(27, 'Milos M', 'astormilos@gmail.com', '123', 'asdasd', 'asdasdas', '170.999', '2021-02-25'),
(28, 'Milos M', 'astormilos@gmail.com', '123', 'asdasd', 'asdasdas', '170.999', '2021-02-25'),
(29, 'Milos', 'astormilos@gmail.com', '123', 'asdasd', 'asdasd', '623.996', '2021-02-25'),
(30, 'Joja', 'astormilos@gmail.com', '123', 'asdasd', 'asdasd', '877.994', '2021-02-25'),
(31, 'Joja', 'astormilos@gmail.com', '123', 'asdasd', 'asdasd', '877.994', '2021-02-25'),
(32, 'Joja', 'astormilos@gmail.com', '123', 'asdasd', 'asdasd', '877.994', '2021-02-25'),
(33, 'Joja', 'astormilos@gmail.com', '123', 'asdasd', 'asdasd', '877.994', '2021-02-25'),
(34, 'Joja', 'astormilos@gmail.com', '123', 'asdasd', 'asdasd', '877.994', '2021-02-25'),
(35, 'Joja', 'astormilos@gmail.com', '123', 'asdasd', 'asdasd', '260.998', '2021-02-25'),
(36, '', '', '', '', '', '126.999', '2021-02-25'),
(37, '', '', '', '', '', '126.999', '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `reklamacije`
--

CREATE TABLE `reklamacije` (
  `idReklamacije` int(11) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reklamacije`
--

INSERT INTO `reklamacije` (`idReklamacije`, `datum`) VALUES
(1, '2021-02-25'),
(2, '2021-02-25'),
(3, '2021-02-25'),
(4, '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `uredjaji`
--

CREATE TABLE `uredjaji` (
  `uredjajID` int(11) NOT NULL,
  `marka` varchar(20) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `slikaNapred` varchar(100) NOT NULL,
  `slikaPozadi` varchar(100) NOT NULL,
  `slikaThumb` varchar(100) NOT NULL,
  `sistem` varchar(20) NOT NULL,
  `procesor` varchar(100) NOT NULL,
  `dijagonalaEkrana` double NOT NULL,
  `ram` varchar(10) NOT NULL,
  `kameraZadnja` varchar(100) NOT NULL,
  `baterija` varchar(50) NOT NULL,
  `dimenzije` varchar(100) NOT NULL,
  `tezina` varchar(20) NOT NULL,
  `rezolucija` varchar(20) NOT NULL,
  `tipEkrana` varchar(30) NOT NULL,
  `internaMemorija` varchar(20) NOT NULL,
  `kameraPrednja` int(11) NOT NULL,
  `dualSim` tinyint(1) NOT NULL,
  `cena` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uredjaji`
--

INSERT INTO `uredjaji` (`uredjajID`, `marka`, `naziv`, `slikaNapred`, `slikaPozadi`, `slikaThumb`, `sistem`, `procesor`, `dijagonalaEkrana`, `ram`, `kameraZadnja`, `baterija`, `dimenzije`, `tezina`, `rezolucija`, `tipEkrana`, `internaMemorija`, `kameraPrednja`, `dualSim`, `cena`) VALUES
(1, 'Samsung', 'Galaxy S21', 'images\\Uredjaji\\Samsung\\Galaxy-S21\\napred.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-S21\\pozadi.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-S21\\napredThumb.svg', 'Android', 'Octa-core 1 x 2.9GHz + 3 x 2.8GHz + 4 x 2.2GHz', 6.2, '8', '64 + 12 + 12', '4000', '151.7 x 71.2 x 7.9', '169', '1080 x 2400', 'Dynamic AMOLED 2X', '128', 10, 1, '126.999'),
(2, 'Samsung', 'Galaxy S21 Ultra', 'images/Uredjaji/Samsung/Galaxy-S21-Ultra/napred.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-S21-Ultra\\pozadi.jpg', 'images/Uredjaji/Samsung/Galaxy-S21-Ultra/napredThumb.svg', 'Android', 'Octa-core 1 x 2.9GHz + 3 x 2.8GHz + 4 x 2.2GHz', 6.8, '12', '108 + 12 + 10 + 10', '5000', '165.1 x 75.6 x 8.9', '227', '1440 x 3200', 'Dynamic AMOLED 2X', '128', 40, 1, '170.999'),
(3, 'Samsung', 'Galaxy S21+', 'images\\Uredjaji\\Samsung\\Galaxy-S21-Plus\\napred.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-S21-Plus\\pozadi.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-S21-Plus\\napredThumb.svg', 'Android', 'Octa-core 1 x 2.9GHz + 3 x 2.8GHz + 4 x 2.2GHz', 6.7, '8', '64 + 12 + 12', '4800 ', '161.5 x 75.6 x 7.8', '200', '1080 x 2400', 'Dynamic AMOLED 2X', '128', 10, 1, '142.999'),
(4, 'Samsung', 'Note 20 Ultra', 'images\\Uredjaji\\Samsung\\Galaxy-Note-20-Ultra\\napred.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-Note-20-Ultra\\pozadi.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-Note-20-Ultra\\napredThumb.svg', 'Android', 'Octa-core 2x 2.73 GHz + 2x 2.5 GHz + 4x 2.0 GHz', 6.9, '8 ', '108 + 12 + 12', '4500', '164.8 x 77.2 x 8.1', '208', '1440 x 3088', 'Dynamic AMOLED 2X', '256', 10, 1, '160.000'),
(5, 'Samsung', 'Note 20', 'images\\Uredjaji\\Samsung\\Galaxy-Note-20\\napred.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-Note-20\\pozadi.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-Note-20\\napredThumb.svg', 'Android', 'Octa-core 2x 2.73 GHz + 2x 2.5 GHz + 4x 2.0 GHz', 6.7, '8', '12 + 12 + 64', '4300', '161.6 x 75.2 x 8.3', '192', '1080 x 2400', 'Super AMOLED Plus', '128', 10, 1, '133.999'),
(6, 'Samsung', 'Note 10+', 'images\\Uredjaji\\Samsung\\Galaxy-Note-10-Plus\\napred.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-Note-10-Plus\\pozadi.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-Note-10-Plus\\napredThumb.svg', 'Android', 'Octa-core 2x 2.7GHz + 2x 2.4GHz + 4x 1.9 GHz', 6.8, '12', '16 + 12 + 12 MP + VGA', '4300', '77.2 x 162.3 x 7.9', '196', '1440 x 3040', 'Dynamic AMOLED', '256', 10, 1, '140.999'),
(7, 'Samsung', 'Galaxy A71', 'images\\Uredjaji\\Samsung\\Galaxy-A71\\napred.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-A71\\pozadi.jpg', 'images\\Uredjaji\\Samsung\\Galaxy-A71\\napredThumb.svg', 'Android', 'Octa-core 2 x 2.2 GHz + 6 x 1.8 GHz', 6.7, '6', '64 + 12 + 5 + 5 ', '4500', '76 x 163.6 x 7.7', '179', '1080 x 2400', 'Super AMOLED', '128', 32, 1, '65.999'),
(8, 'Apple', 'iPhone XS MAX 64GB', 'images\\Uredjaji\\iPhone\\XS-max-64\\napred.jpg', 'images\\Uredjaji\\iPhone\\XS-max-64\\pozadi.jpg', 'images\\Uredjaji\\iPhone\\XS-max-64\\napredThumb.svg', 'iOS', 'A12 Bionic chip', 6.5, '4', 'Dual 12 MP', '3174', '77.4 x 157.5 x 7.7', '208', '1242 x 2688', 'Super Retina OLED', '64', 7, 0, '159.459'),
(9, 'Apple', 'iPhone 12 Pro 256GB', 'images\\Uredjaji\\iPhone\\12-pro-256\\napred.jpg', 'images\\Uredjaji\\iPhone\\12-pro-256\\pozadi.jpg', 'images\\Uredjaji\\iPhone\\12-pro-256\\napredThumb.svg', 'iOS', 'A14 Bionic chip', 6.1, '6', 'Triple 12 MP', '2815', '71.5 x 146.7 x 7.4', '189', '1170 x 2532', 'Super Retina XDR', '256', 12, 0, '172.999'),
(10, 'Apple', 'iPhone 12 Mini 64GB', 'images\\Uredjaji\\iPhone\\12-mini\\napred.jpg', 'images\\Uredjaji\\iPhone\\12-mini\\pozadi.jpg', 'images\\Uredjaji\\iPhone\\12-mini\\napredThumb.svg', 'iOS', 'A14 Bionic chip', 5.4, '4', 'Dual 12 MP\r\n', '2227 ', '131.5 x 64.2 x 7.4', '135', '1180 x 2340', 'Super Retina XDR', '64', 12, 0, '116.999'),
(11, 'Apple', 'iPhone 12 128GB', 'images\\Uredjaji\\iPhone\\12-128\\napred.jpg', 'images\\Uredjaji\\iPhone\\12-128\\pozadi.jpg', 'images\\Uredjaji\\iPhone\\12-128\\napredThumb.svg', 'iOS', 'A14 Bionic chip', 6.1, '4', 'Dual 12 MP', '2815 ', '75.7 x 150.9 x 8.3', '164', '1170 x 2532', 'Super Retina XDR', '128 ', 12, 0, '133.999'),
(12, 'Apple', 'iPhone 11 PRO MAX', 'images\\Uredjaji\\iPhone\\11-pro-max-256\\napred.jpg', 'images\\Uredjaji\\iPhone\\11-pro-max-256\\pozadi.jpg', 'images\\Uredjaji\\iPhone\\11-pro-max-256\\napredThumb.svg', 'iOS', 'A13 Bionic chip', 6.5, '4', 'Triple 12 MP', '3969 ', '77.8 x 158 x 8.1', '226', '1242 x 2688', 'Super Retina XDR', '256', 12, 0, '180.999'),
(13, 'Apple', 'iPhone 11 PRO 256GB', 'images\\Uredjaji\\iPhone\\11-pro-256\\napred.jpg', 'images\\Uredjaji\\iPhone\\11-pro-256\\pozadi.jpg', 'images\\Uredjaji\\iPhone\\11-pro-256\\napredThumb.svg', 'iOS', 'A13 Bionic chip', 5.8, '4', 'Triple 12 MP', '3190', '71.4 x 144 x 8.1', '188', '1125 x 2436', 'Super Retina XDR', '256', 12, 0, '169.999'),
(14, 'Huawei', 'Mate 40 Pro', 'images\\Uredjaji\\Huawei\\Mate-40-pro\\napred.jpg', 'images\\Uredjaji\\Huawei\\Mate-40-pro\\pozadi.jpg', 'images\\Uredjaji\\Huawei\\Mate-40-pro\\napredThumb.svg', 'Android', 'Octa-core 1x 3.13 GHz + 3x 2.54 GHz + 4x 2.05 GHz', 6.76, '8', '50 + 12 + 20', '4400 ', '162.9 x 75.5 x 9.1', '212', '1344 x 2772', 'OLED', '256', 13, 1, '141.999'),
(15, 'Huawei', 'P30 Lite', 'images\\Uredjaji\\Huawei\\P30-lite\\napred.jpg', 'images\\Uredjaji\\Huawei\\P30-lite\\pozadi.jpg', 'images\\Uredjaji\\Huawei\\P30-lite\\napredThumb.svg', 'Android', 'Octa-Core 4 x 2.2GHz + 4 x 1.7GHz', 6.15, '4', '48 + 8 + 2', '3340', '152.9 x 72.7 x 7.4', '159', '1080 x 2312', 'IPS', '128 ', 24, 1, '43.999'),
(16, 'Huawei', 'P40', 'images\\Uredjaji\\Huawei\\P40\\napred.jpg', 'images\\Uredjaji\\Huawei\\P40\\pozadi.jpg', 'images\\Uredjaji\\Huawei\\P40\\napredThumb.svg', 'Android', 'Octa-core 2x 2.86GHz + 2x 2.36GHz + 4x 1.95GHz', 6.1, '8', '50 + 16 + 8 ', '3800', '71.06 x 148.9 x 8.5', '175', '1080 x 2340', 'OLED', '128', 32, 1, '100.999'),
(17, 'Huawei', 'P40 Lite', 'images\\Uredjaji\\Huawei\\P40-lite\\napred.jpg', 'images\\Uredjaji\\Huawei\\P40-lite\\pozadi.jpg', 'images\\Uredjaji\\Huawei\\P40-lite\\napredThumb.svg', 'Android', 'Octa-core 2 x 2.27 GHz + 6 x 1.88 GHz', 6.4, '6', '48 + 8 + 2 + 2', '4200', '76.3 x 159.2 x 8.7', '183', '1080 x 2310', 'LTPS IPS LCD', '129', 16, 1, '42.999'),
(18, 'Huawei', 'P40 Pro', 'images\\Uredjaji\\Huawei\\P40-pro\\napred.jpg', 'images\\Uredjaji\\Huawei\\P40-pro\\pozadi.jpg', 'images\\Uredjaji\\Huawei\\P40-pro\\napredThumb.svg', 'Android', 'Octa-core 2 x 2.86GHz + 2 x 2.36GHz + 4 x 1.95GHz', 6.58, '8', '50 + 40 + 12 MP + 3D Depth sensing', '4200', '72.6 x 158.2 x 8.95', '209', '1200 x 2640', 'OLED', '256', 32, 1, '123.999'),
(19, 'Huawei', 'P40 Pro+', 'images\\Uredjaji\\Huawei\\P40-pro-plus\\napred.jpg', 'images\\Uredjaji\\Huawei\\P40-pro-plus\\pozadi.jpg', 'images\\Uredjaji\\Huawei\\P40-pro-plus\\napredThumb.svg', 'Android', 'Octa-core 2 x 2.86GHz + 2 x 2.36GHz + 4 x 1.95GHz', 6.58, '8', '50 + 40 + 12 MP + 3D Depth sensing', '4200', '72.6 x 158.2 x 8.95', '209', '1200 x 2640', 'OLED', '512', 32, 1, '149.999'),
(20, 'Huawei', 'P Smart Z', 'images\\Uredjaji\\Huawei\\P-Smart-Z\\napred.jpg', 'images\\Uredjaji\\Huawei\\P-Smart-Z\\pozadi.jpg', 'images\\Uredjaji\\Huawei\\P-Smart-Z\\napredThumb.svg', 'Android', 'Octa-core 4 x 2.2 GHz + 4 x 1.7 GHz', 6.59, '4', '16 + 2', '4000', '77.3 x 163.5 x 8.8', '196.8 ', '1080 x 2340', 'LTPS IPS LCD', ' 64', 16, 1, '39.999'),
(21, 'Xiaomi', 'MI 10', 'images\\Uredjaji\\Xiaomi\\MI-10\\napred.jpg', 'images\\Uredjaji\\Xiaomi\\MI-10\\pozadi.jpg', 'images\\Uredjaji\\Xiaomi\\MI-10\\napredThumb.svg', 'Android', 'Octa-core 1 x 2.84 GHz + 3 x 2.42 GHz + 4 x 1.80 GHz', 6.67, '8', '108 + 13 + 2 + 2 ', '4780 ', '74.8 x 162.5 x 8.96', '208', '1080 x 2340', 'Super AMOLED', '256', 20, 0, '114.999'),
(22, 'Xiaomi', 'MI 10T', 'images\\Uredjaji\\Xiaomi\\MI-10T\\napred.jpg', 'images\\Uredjaji\\Xiaomi\\MI-10T\\pozadi.jpg', 'images\\Uredjaji\\Xiaomi\\MI-10T\\napredThumb.svg', 'Android', 'Octa-core 1x 2.84 GHz + 3x 2.42 GHz + 4x 1.80 GHz', 6.67, '6', '64 + 13 + 5 ', '5000', '76.4 x 165.1 x 9.33', '216', '1080 x 2400', 'IPS LCD', '128', 20, 1, '78.999'),
(23, 'Xiaomi', 'MI 10T Pro 5G', 'images\\Uredjaji\\Xiaomi\\MI-10T-Pro\\napred.jpg', 'images\\Uredjaji\\Xiaomi\\MI-10T-Pro\\pozadi.jpg', 'images\\Uredjaji\\Xiaomi\\MI-10T-Pro\\napredThumb.svg', 'Android', 'Octa-core 1x 2.84 GHz +3x 2.42 GHz + 4x 1.80 GHz', 6.67, '8 ', '108 + 13 + 5 ', '5000', '76.4 x 165.1 x 9.33', '218', '1080 x 2400', 'IPS LCD', '256', 20, 1, '90.999'),
(24, 'Xiaomi', 'MI A3', 'images\\Uredjaji\\Xiaomi\\MI-A3\\napred.jpg', 'images\\Uredjaji\\Xiaomi\\MI-A3\\pozadi.jpg', 'images\\Uredjaji\\Xiaomi\\MI-A3\\napredThumb.svg', 'Android', 'Octa-core 4 x 2.0 GHz + 4 x 1.8 GHz', 6.09, '4', '48 + 8 + 2 ', '4030', '153.5 x 71.9 x 8.5', '173.8', '720 x 1560', 'Super AMOLED', '64 ', 32, 1, '39.999'),
(25, 'Xiaomi', 'Redmi Note 9 Pro', 'images\\Uredjaji\\Xiaomi\\Predmi-Note-9-Pro\\napred.jpg', 'images\\Uredjaji\\Xiaomi\\Predmi-Note-9-Pro\\pozadi.jpg', 'images\\Uredjaji\\Xiaomi\\Predmi-Note-9-Pro\\napredThumb.svg', 'Android', 'Octa-core 2 x 2.3 GHz + 6 x 1.8 GHz', 6.67, '6', '64 + 8 + 5 + 2', '5020', '76.68 x 165.75 x 8.8', '209', '1080 x 2400', 'IPS LCD', '128', 16, 1, '51.999'),
(26, 'Xiaomi', 'Redmi 9', 'images\\Uredjaji\\Xiaomi\\Redmi-9\\napred.jpg', 'images\\Uredjaji\\Xiaomi\\Redmi-9\\pozadi.jpg', 'images\\Uredjaji\\Xiaomi\\Redmi-9\\napredThumb.svg', 'Android', 'Octa-core 2 x 2.0 GHz + 6 x 1.8 GHz', 6.53, '4', '13 + 8 + 5 + 2 ', '5020', '77.01 x 163.32 x 9.1', '198', '1080 x 2340', 'IPS LCD', '64', 8, 1, '34.999'),
(27, 'Xiaomi', 'Redmi Note 9', 'images\\Uredjaji\\Xiaomi\\Redmi-Note-9\\napred.jpg', 'images\\Uredjaji\\Xiaomi\\Redmi-Note-9\\pozadi.jpg', 'images\\Uredjaji\\Xiaomi\\Redmi-Note-9\\napredThumb.svg', 'Android', 'Octa-core: 2 x 2.0 GHz + 6 x 1.8 GHz', 6.53, '4', '48 + 8 + 2 + 2', '5020 ', '77.2 x 162.3 x 8.9', '199', '1080 x 2340', 'IPS LCD', '128', 13, 1, '40.999'),
(30, 'Samsung', 'Milos', 'images/Uredjaji/Samsung/Milos/napred.jpg', 'images/Uredjaji/Samsung/Milos/pozadi.jpg', 'images/Uredjaji/Samsung/Milos/napredThumb.svg', 'Android', '2GHZ', 6.5, '12', '24', '2000', '123', '123', '123', ' amoled', ' 123', 123, 1, '123.000'),
(47, 'Samsung', 'Najnoviji', 'images/Uredjaji/Samsung/Najnoviji/napred.jpg', 'images/Uredjaji/Samsung/Najnoviji/pozadi.jpg', 'images/Uredjaji/Samsung/Najnoviji/napredThumb.svg', 'Android', 'Octa-core 1 x 2.9GHz + 3 x 2.8GHz + 4 x 2.2GHz', 6.2, '8', '64 + 12 + 12', '4000', '151.7 x 71.2 x 7.9', '169', '1080 x 2400', ' Dynamic AMOLED 2X', ' 128', 10, 1, '126.999');

-- --------------------------------------------------------

--
-- Table structure for table `uredjajireklamacija`
--

CREATE TABLE `uredjajireklamacija` (
  `id` int(11) NOT NULL,
  `uredjajID` int(11) NOT NULL,
  `idReklamacije` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `uredjajireklamacija`
--

INSERT INTO `uredjajireklamacija` (`id`, `uredjajID`, `idReklamacije`) VALUES
(1, 6, 1),
(2, 5, 2),
(3, 1, 3),
(4, 5, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `kupljeniuredjaji`
--
ALTER TABLE `kupljeniuredjaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poruke`
--
ALTER TABLE `poruke`
  ADD PRIMARY KEY (`porukaID`);

--
-- Indexes for table `racun`
--
ALTER TABLE `racun`
  ADD PRIMARY KEY (`racunID`);

--
-- Indexes for table `reklamacije`
--
ALTER TABLE `reklamacije`
  ADD PRIMARY KEY (`idReklamacije`);

--
-- Indexes for table `uredjaji`
--
ALTER TABLE `uredjaji`
  ADD PRIMARY KEY (`uredjajID`);

--
-- Indexes for table `uredjajireklamacija`
--
ALTER TABLE `uredjajireklamacija`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kupljeniuredjaji`
--
ALTER TABLE `kupljeniuredjaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `poruke`
--
ALTER TABLE `poruke`
  MODIFY `porukaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `racun`
--
ALTER TABLE `racun`
  MODIFY `racunID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `reklamacije`
--
ALTER TABLE `reklamacije`
  MODIFY `idReklamacije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uredjaji`
--
ALTER TABLE `uredjaji`
  MODIFY `uredjajID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `uredjajireklamacija`
--
ALTER TABLE `uredjajireklamacija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 17, 2021 at 11:38 PM
-- Server version: 8.0.22
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `categoria`, `descripcion`) VALUES
(2, 'Tarjetas de video', 'tarjetas de video de tomas las marcas u otros'),
(3, 'Auriculares', 'audifonos gamer, auriculares y otros'),
(5, 'Procesadores', 'procesadores de todas las marcas'),
(6, 'Tarjetas madre', 'tarjetas de todas las marcas'),
(7, 'Memorias RAM', 'memorias de todas la marcas'),
(8, 'Monitores ', 'monitores de todas las marcas , y mgamin'),
(9, 'Gabinetes', 'torres o cajas de pcs'),
(10, 'Almacenamiento', 'discos duros, discos solidos, hibridos'),
(11, 'Fuentes de poder', 'fuentes de poder de todas las marcas'),
(12, 'Teclados', 'periferico'),
(13, 'Mouses', 'periferico '),
(14, 'Altavoces', 'parlantes de todas las marcas'),
(15, 'Coolers', 'ventiladores o discipadores pc'),
(16, 'Laptops', 'equipos portÃ¡tiles');

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `Departamento` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `ciudad`, `Departamento`) VALUES
(1, 'La Paz', 'La Paz'),
(2, 'El Alto', 'La Paz');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int NOT NULL,
  `nombre_cliente` varchar(50) NOT NULL,
  `apellido_cliente` varchar(50) NOT NULL,
  `nit` varchar(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fecha_registro` date NOT NULL,
  `telefono` varchar(14) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `id_ciudad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre_cliente`, `apellido_cliente`, `nit`, `correo`, `password`, `fecha_registro`, `telefono`, `direccion`, `id_ciudad`) VALUES
(1, 'willy', 'chana', '7038707', 'casd@awdaw.com', '$2y$12$vXgfQigQoPZqGHwC46liGuyzPZllKHknNjxTyc2PEToymOTSLyfDW', '2019-10-13', '1112222', 'avenida Sucre 1 #2244', 2),
(2, 'willy', 'chana', '', '', '$2y$12$rbBVED0DfbrGHGpgfYu.1evp.m8zoMVOdWnI3Xlw0UkulwscEEHlG', '2019-10-13', '', 'avenida Sucre 1', 2),
(3, 'Juan Carlos', 'Laruta Choque', '100299923', 'asd@has.com', '$2y$12$5UPO2aWvcjWXu8cUmjSZ7uFHCehhOqGmMT.qSCtUvUXpdRrqCZHPm', '2019-10-13', '71171717', 'avenida Sucre 1', 2),
(4, 'Pedro', 'Choque', '111111111', 'pedro@gmail.com', '$2y$12$SJba0konf1VoY31TBH9Dcuwl4F5TSKBrUpVWq6icuA8yrQPIDDxvm', '2019-10-13', '71223354', 'Av. circunvalacion #111', 2),
(5, 'willy', 'chana', '123123123', 'wil@gmail.com', '$2y$12$EYxkYxJn5e7INPK.a1cOXe27ag3iNefAcAWBSYMMDdUqaqrFRE2le', '2019-10-13', '123456', 'avenida Sucre 1', 2),
(6, 'willy', 'chana', '7038707', 'admin@gmail.com', '', '2019-11-03', '1234567', 'avenida Sucre 1', 2),
(7, 'willy', 'chana', '7038707', 'juan@gmail.com', '$2y$12$8QAhE7vEIj66yT3SAatIuO8bBp9QMaIyTX2xlAR1D4LI5aQGIOB5C', '2019-11-03', '1234567', 'avenida Sucre 1', 2),
(8, 'willy', 'chana', '7038707', 'armando@hotmail.com', '$2y$12$QzuSsWCtQIgLFHUaW0HYVeAh2MIf7iTFzlxU8hE/yzXA3dbHcVKIu', '2019-11-03', '1234567', 'avenida Sucre 1', 2),
(9, 'willy', 'chana', '7038707', 'zzz@hotmail.com', '', '2019-11-03', '1234567', 'avenida Sucre 1', 2),
(10, 'willy', 'chana', '7038707', 'kkkk@hotmail.com', '$2y$12$ZMS0RZJx6roe6Oud2KUvlenYN7eJ5m.frdoPmBS4PUSgDCaGr8Y66', '2019-11-03', '1234567', 'avenida Sucre 1', 2),
(11, 'juan', 'Chura', '123123', 'aaaaaaa@hotmail.com', '$2y$12$mlJaBl.lEqkJ0vwSFUILTeEqh0bf6tdUc6jWZ1NzJfyWrEi3rt3cO', '2019-11-03', '11111111', 'avenida rosas', 1),
(12, 'Pedro', 'cccc', '234542', 'aaaaaazza@hotmail.com', '', '2019-11-03', '2222222', 'avenida rosas panpa', 1),
(13, 'willy', 'chana', '1111', 'alv@gmail.com', '$2y$12$G1Gn5gaJTCl9lPtaoYca.u3s0HH5VJwltexInoP8RRcMlKiMMRs3a', '2019-11-03', '123456', 'avenida Sucre 1', 2),
(14, 'marco', 'chambi', '11111111', 'marco.chambi20@gmail.com', '$2y$12$1BvGvE7hslCzTHN2vAOgGeofZbPDP8t.FPBS5CzpdhCL4qA61PWJK', '2019-11-03', '79515350', 'Av. larecaja #4556', 1),
(15, 'willy', 'chana', '7038707', 'marcoss.chambi@gmail.com', '', '2019-11-03', '73270538', 'avenida Sucre 1', 1),
(16, 'willy', 'chana', '7038707', 'marcoss.chambi20@gmail.com', '', '2019-11-03', '73270538', 'avenida Sucre 1', 2),
(17, 'Jacinto', 'Chura', '7038707', 'pcbolivia@gmail.com', '$2y$12$0/iQkT/BVt.TglNrkdeXhufCYbNhC9e3S28RsKAa5PrHNCdhhRE4q', '2019-11-03', '1234567', 'Av buenos Aires #518', 1),
(18, 'marco', 'chambi', '79515350', 'marco.chambi@gmail.com', '$2y$12$/vn/2/6A11JOwN4uH7Hl0OBD.fZQlifaqeUK0bwhUa6f1kgmusMie', '2019-11-03', '79515350', 'Av. larecaja #4556', 1),
(19, 'willy', 'chana', '11111', 'marcos.chambi@gmail.com', '', '2019-11-03', '11111', 'avenida Sucre 1', 2),
(20, 'Willy', 'Chana tito', '7038707', 'marcos.chambi20@gmail.com', '$2y$12$RZ9hV6W7wJgAnRiOclfWMOHh7wFZ/6Kett/7NA9.8KHAnnzYMD3VK', '2019-11-03', '7951530', 'villa adela', 2),
(21, 'Gilda', 'Alcon', '12312312', 'gil@gmail.com', '', '2019-11-24', '1234567', 'avenida Sucre 1', 2),
(22, 'Mario', 'Chura', '7777777', 'mario@gmail.com', '', '2019-11-24', '88888888', 'Av. america', 1),
(23, 'Waldo', 'Colque', '777777', 'waldo@gmail.com', '', '2019-11-24', '87878787', 'Av. circunvalacion #333', 2),
(24, 'Manuel', 'Lopez', '1231232', 'manuel@gmial.com', '', '2019-11-24', '12312312', 'Av. Julian', 1),
(25, 'Lucio', 'Quispe', '1231234', 'lucio@gmail.com', '', '2019-11-24', '12312312', 'Av buenos Aires #518', 1),
(26, 'Laura', 'Perez Chura', '1231234', 'laura@gmail.com', '', '2019-11-24', '12312345', 'Av buenos Aires #5184', 1),
(27, 'Mauricio', 'Callizaya', '123123213', 'mauro@gmail.com', '', '2019-11-24', '11212121', 'Calle Sebastian mendoza #446', 1),
(28, 'Paulino', 'Tincuta', '7038707', 'paul@gmail.com', '', '2019-11-24', '12312312', 'C. ayacucho #657', 1),
(29, 'Ana', 'Paco', '1231233', 'ana@gmail.com', '', '2019-11-24', '12345672', 'C. Guatemala #6789', 1),
(30, 'Maria', 'Calle', '456454544', 'mar@gmial.com', '$2y$12$7kvTWbgSwHyo8Nr7HvCIp.cTrlz7iJPN4cSqs.mnPGLDicfTwFxku', '2019-11-24', '12312312', 'C. Severino #333', 1),
(33, 'Lucas', 'Lopez', '7038707', 'lucas@gmail.com', '$2y$12$g4lN4EuA/QdbS0FWl3beHutQR3jwovY3oeBHtSmw.2/BRxBot7XmG', '2019-11-24', '12312312', 'Av buenos Aires #222', 2),
(34, 'Carlos', 'Paredes', '12221112554', 'carlo@gmial.com', '', '2019-11-24', '12312312', 'Av. 16 de julio  # 6777', 2),
(35, 'Felipe', 'Cruz', '12312123', 'felip@gmail.com', '$2y$12$VZQuszxtiTd3ot9Wjm/Wmua3pEv96V7FSuVq3Fs1kOlLig2Ewa5sa', '2019-11-24', '12312312', 'C. Machicado #567', 1),
(36, 'Silvia', 'Paraya', '12312312', 'silvia@gmail.com', '$2y$12$y3xRGFnaaW7VAiFlLxZKb.tDahI62qRvIXny88Q08EtNE5Wpm3dpe', '2019-11-24', '12312312', 'C. Juan de la Riva #777', 1),
(37, 'willy', 'chana', '11111111', 'marcosss.chambi20@gmail.com', '$2y$12$hPWwmsY.JEqRX7pzgkeoluAuG2b3iQlfrRqZ.UfM/.C9947IXc7aC', '2021-01-17', '123123123', 'avenida Sucre 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int NOT NULL,
  `nombre_contacto` varchar(200) NOT NULL,
  `email_contacto` varchar(200) NOT NULL,
  `telefono_contacto` varchar(15) NOT NULL,
  `mensaje_contacto` text NOT NULL,
  `fecha_contacto` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre_contacto`, `email_contacto`, `telefono_contacto`, `mensaje_contacto`, `fecha_contacto`) VALUES
(1, 'willy', 'marcggmarc.20@gmail.com', '1234567', 'mensaje', '2019-11-12 15:52:00'),
(2, 'Juan', 'marco.chambi20@gmail.com', '1234567', 'mensaje', '2019-11-12 15:52:00'),
(3, 'Pedro', 'marcos.chambi20@gmail.com', '1234567', 'mensaje', '2019-11-12 15:52:00'),
(4, 'Luis Camacho', 'marcos.chambi20@gmail.com', '1234567', 'como estan, quisiera saber si mi pedido esta fue recibido', '2019-11-12 15:52:00'),
(5, 'Jaime', 'marcgg_20@hotmail.com', '1234567', 'hola probandoo...', '2019-11-12 15:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `imagenes`
--

CREATE TABLE `imagenes` (
  `id_producto` int NOT NULL,
  `imagen1` varchar(100) NOT NULL,
  `imagen2` varchar(100) NOT NULL,
  `imagen3` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagenes`
--

INSERT INTO `imagenes` (`id_producto`, `imagen1`, `imagen2`, `imagen3`) VALUES
(4, 'intel-core-i5-9600k-370-ghz-socket-1151-boxed-procesador-002_200x200.jpg', 'intel-core-i5-9600k-370-ghz-socket-1151-boxed-procesador-003_200x200.jpg', 'intel-core-i5-9600k-370-ghz-socket-1151-boxed-procesador-001.jpg'),
(1, 'rizen7-3700x.jpg', 'amd-ryzen-7-3700x-wraith-prism-44ghz-socket-am4-boxed-procesador-001.jpg', 'rizen7-3700x.jpg'),
(3, 'corsair-vengeance-rgb-pro-black-16gb-2x8gb-3200mhz-pc4-25600-cl16-memoria-ddr4-002_200x200.jpg', 'corsair-vengeance-rgb-pro-black-16gb-2x8gb-3200mhz-pc4-25600-cl16-memoria-ddr4-003_200x200.jpg', 'corsair-vengeance-rgb-pro-black-16gb-2x8gb-3200mhz-pc4-25600-cl16-memoria-ddr4-002_200x200.jpg'),
(6, 'msi-vigor-gk30-gaming-combo-es-combo-002_200x200.jpg', 'msi-vigor-gk30-gaming-combo-es-combo-003_200x200.jpg', 'msi-vigor-gk30-gaming-combo-es-combo-004_200x200.jpg'),
(7, 'gigabyte-aorus-ad27qd-27-led-quadhd-gaming-reac (1).jpg', 'gigabyte-aorus-ad27qd-27-led-quadhd-gaming-reac (2).jpg', 'gigabyte-aorus-ad27qd-27-led-quadhd-gaming-reac (3).jpg'),
(8, 'gigabyte-geforce-rtx-2080-super-gaming-oc-8gb-gddr6-tarjeta-grfica-002_200x200.jpg', 'gigabyte-geforce-rtx-2080-super-gaming-oc-8gb-gddr6-tarjeta-grfica-003_200x200.jpg', 'gigabyte-geforce-rtx-2080-super-gaming-oc-8gb-gddr6-tarjeta-grfica-004_200x200.jpg'),
(9, 'asus-rog-strix-carry-gaming-inalambrico-7200-dpi-raton-002_200x200.jpg', 'asus-rog-strix-carry-gaming-inalambrico-7200-dpi-raton-003_200x200.jpg', 'asus-rog-strix-carry-gaming-inalambrico-7200-dpi-raton-004_200x200.jpg'),
(10, 'portatil-asus-a543ma-gq529-intel-celeron-n4000-4gb-ram-128gb-ssd (1).jpg', 'portatil-asus-a543ma-gq529-intel-celeron-n4000-4gb-ram-128gb-ssd (2).jpg', 'portatil-asus-a543ma-gq529-intel-celeron-n4000-4gb-ram-128gb-ssd (3).jpg'),
(11, 'cooler-master-masterkeys-lite-l-cherry-mx-teclado-001(1).jpg', 'cooler-master-masterkeys-lite-l-cherry-mx-teclado-001(2).jpg', 'cooler-master-masterkeys-lite-l-cherry-mx-teclado-001(3).jpg'),
(12, 'msi-optix-mpg27cq-27-144-hz-2k-curvo-monitor-001(1).jpg', 'msi-optix-mpg27cq-27-144-hz-2k-curvo-monitor-001(2).jpg', 'msi-optix-mpg27cq-27-144-hz-2k-curvo-monitor-001(3).jpg'),
(13, 'kfa2-geforce-rtx-2060-super-1-click-oc-8gb-gddr6-tarjeta-grafica(1).jpg', 'kfa2-geforce-rtx-2060-super-1-click-oc-8gb-gddr6-tarjeta-grafica(1).jpg', 'kfa2-geforce-rtx-2060-super-1-click-oc-8gb-gddr6-tarjeta-grafica(2).jpg'),
(14, 'hp-250-g6-i5-7200u-hd520-8gb-256gb-ssd-156-freedos-portatil-002.jpg', 'hp-250-g6-i5-7200u-hd520-8gb-256gb-ssd-156-freedos-portatil-003.jpg', 'hp-250-g6-i5-7200u-hd520-8gb-256gb-ssd-156-freedos-portatil-004.jpg'),
(15, 'asus-tuf-fx505dv-al014-ryzen-7-3750h-rtx-2060-16gb-512gb-ssd-freedos-156-portatil-002.jpg', 'asus-tuf-fx505dv-al014-ryzen-7-3750h-rtx-2060-16gb-512gb-ssd-freedos-156-portatil-003.jpg', 'asus-tuf-fx505dv-al014-ryzen-7-3750h-rtx-2060-16gb-512gb-ssd-freedos-156-portatil-004.jpg'),
(16, 'lenovo-v155-amd-ryzen-5-3500u-radeon-vega-8-8gb-256gb-ssd-156-portatil-002_200x200.jpg', 'lenovo-v155-amd-ryzen-5-3500u-radeon-vega-8-8gb-256gb-ssd-156-portatil-003_200x200.jpg', 'lenovo-v155-amd-ryzen-5-3500u-radeon-vega-8-8gb-256gb-ssd-156-portatil-004_200x200.jpg'),
(17, 'corsair-void-elite-wireless-gaming-71-blanco-auriculares-002_200x200.jpg', 'corsair-void-elite-wireless-gaming-71-blanco-auriculares-003_200x200.jpg', 'corsair-void-elite-wireless-gaming-71-blanco-auriculares-004_200x200.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `marca`
--

CREATE TABLE `marca` (
  `id_marca` int NOT NULL,
  `marca` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marca`
--

INSERT INTO `marca` (`id_marca`, `marca`) VALUES
(1, 'Logitec'),
(2, 'Ballistic'),
(4, 'Intel'),
(6, 'Asrock'),
(7, 'MSI'),
(9, 'Kingston'),
(15, 'Crucial'),
(16, 'Nvidia'),
(19, 'Alienware'),
(20, 'Samsung'),
(23, 'Amd'),
(24, 'Adata'),
(28, 'Corsair'),
(29, 'Wester Digital'),
(30, 'Sandisk'),
(31, 'Thermaltake'),
(32, 'Cooler Master'),
(33, 'Hp'),
(34, 'Lenovo'),
(35, 'Asus'),
(36, 'Gigabyte');

-- --------------------------------------------------------

--
-- Table structure for table `participa`
--

CREATE TABLE `participa` (
  `id_venta` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad_pro` int NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participa`
--

INSERT INTO `participa` (`id_venta`, `id_producto`, `cantidad_pro`, `precio`) VALUES
(27, 6, 1, 59.99),
(31, 6, 1, 59.99),
(31, 3, 1, 98.50),
(31, 1, 1, 174.99),
(32, 3, 5, 98.50),
(32, 7, 2, 455.00),
(32, 8, 1, 980.00),
(33, 4, 1, 185.59),
(34, 3, 3, 98.50),
(34, 4, 2, 185.59),
(34, 9, 1, 89.00),
(35, 4, 2, 185.59),
(35, 6, 1, 59.99);

-- --------------------------------------------------------

--
-- Table structure for table `participa_pedido`
--

CREATE TABLE `participa_pedido` (
  `id_pedido` int NOT NULL,
  `id_producto` int NOT NULL,
  `cantidad_producto` int NOT NULL,
  `precio` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `participa_pedido`
--

INSERT INTO `participa_pedido` (`id_pedido`, `id_producto`, `cantidad_producto`, `precio`) VALUES
(59, 4, 1, 185.59),
(60, 4, 1, 185.59),
(61, 6, 1, 59.99),
(62, 3, 5, 0.00),
(62, 7, 2, 0.00),
(62, 8, 1, 980.00),
(63, 6, 1, 59.99),
(63, 3, 1, 0.00),
(63, 1, 1, 0.00),
(64, 3, 3, 0.00),
(64, 4, 2, 185.59),
(64, 9, 1, 0.00),
(65, 4, 2, 185.59),
(65, 6, 1, 59.99),
(66, 4, 1, 185.59),
(67, 7, 1, 455.00),
(68, 3, 1, 98.50),
(69, 6, 1, 59.99),
(70, 1, 1, 174.99),
(70, 4, 1, 185.59),
(71, 3, 1, 98.50),
(71, 6, 1, 59.99),
(71, 7, 1, 455.00),
(72, 6, 1, 59.99),
(72, 3, 1, 98.50),
(72, 1, 1, 174.99),
(73, 6, 1, 59.99),
(74, 4, 1, 185.59),
(75, 6, 1, 59.99),
(76, 3, 1, 98.50),
(77, 6, 2, 59.99),
(77, 7, 1, 455.00),
(77, 3, 1, 98.50),
(78, 4, 1, 185.59);

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL,
  `tipo_pago` varchar(40) NOT NULL,
  `productos` text NOT NULL,
  `total_pago` float(10,2) NOT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado_pedido` int NOT NULL,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `tipo_pago`, `productos`, `total_pago`, `fecha_pedido`, `estado_pedido`, `id_cliente`) VALUES
(59, 'Deposito', 'Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed', 185.59, '2019-11-02 04:00:00', 0, 20),
(60, 'Deposito', 'Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed', 185.59, '2019-11-05 04:00:00', 0, 20),
(61, 'Contra-entrega', 'MSI Vigor GK30 Gaming ES + Clutch GM11', 59.99, '2019-11-06 04:00:00', 0, 20),
(62, 'Deposito', 'Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16, GIGABYTE AORUS AD27QD 27&#34; LED QuadHD GAMING, Gigabyte GeForceÂ® RTX 2080 SUPER Gaming OC 8GB GDDR6', 2382.50, '2019-11-21 19:39:38', 2, 20),
(63, 'Contra-entrega', 'MSI Vigor GK30 Gaming ES + Clutch GM11, Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16, AMD Ryzen 7 3700X (Wraith Prism) 4.4Ghz Socket AM4 Boxed', 333.48, '2019-11-21 19:39:31', 2, 20),
(64, 'Deposito', 'Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16, Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed, Asus ROG Strix Carry Gaming InalÃ¡mbrico 7200 Dpi', 755.68, '2019-11-21 19:39:26', 2, 14),
(65, 'Contra-entrega', 'Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed, MSI Vigor GK30 Gaming ES + Clutch GM11', 431.17, '2019-11-21 19:39:23', 2, 20),
(66, 'Contra-entrega', 'Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed', 185.59, '2019-11-28 19:29:13', 0, 5),
(67, 'Deposito', 'GIGABYTE AORUS AD27QD 27&#34; LED QuadHD GAMING', 455.00, '2019-11-28 19:29:13', 0, 21),
(68, 'Deposito', 'Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16', 98.50, '2019-11-28 19:29:13', 0, 22),
(69, 'Otro', 'MSI Vigor GK30 Gaming ES + Clutch GM11', 59.99, '2019-11-28 19:29:13', 0, 23),
(70, 'Deposito', 'AMD Ryzen 7 3700X (Wraith Prism) 4.4Ghz Socket AM4 Boxed, Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed', 360.58, '2019-11-28 19:29:13', 0, 24),
(71, 'Contra-entrega', 'Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16, MSI Vigor GK30 Gaming ES + Clutch GM11, GIGABYTE AORUS AD27QD 27&#34; LED QuadHD GAMING', 613.49, '2019-11-28 19:29:13', 0, 25),
(72, 'Otro', 'MSI Vigor GK30 Gaming ES + Clutch GM11, Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16, AMD Ryzen 7 3700X (Wraith Prism) 4.4Ghz Socket AM4 Boxed', 333.48, '2019-11-28 19:29:13', 0, 26),
(73, 'Contra-entrega', 'MSI Vigor GK30 Gaming ES + Clutch GM11', 59.99, '2019-11-28 19:29:13', 0, 27),
(74, 'Contra-entrega', 'Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed', 185.59, '2019-11-28 19:29:13', 0, 28),
(75, 'Contra-entrega', 'MSI Vigor GK30 Gaming ES + Clutch GM11', 59.99, '2019-11-28 19:29:13', 0, 5),
(76, 'Contra-entrega', 'Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16', 98.50, '2019-11-28 19:29:13', 0, 29),
(77, 'Otro', 'MSI Vigor GK30 Gaming ES + Clutch GM11, GIGABYTE AORUS AD27QD 27&#34; LED QuadHD GAMING, Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16', 673.48, '2019-11-28 19:29:13', 0, 30),
(78, 'Contra-entrega', 'Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed', 185.59, '2019-11-28 19:29:13', 0, 34);

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id_producto` int NOT NULL,
  `producto` varchar(100) NOT NULL,
  `imagen` varchar(300) NOT NULL,
  `descripcion_prod` text NOT NULL,
  `caracteristicas_prod` text NOT NULL,
  `stock` int NOT NULL,
  `stock_minimo` int NOT NULL,
  `precio_venta` float(6,2) NOT NULL,
  `garantia` varchar(10) NOT NULL,
  `id_marca` int NOT NULL,
  `id_categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id_producto`, `producto`, `imagen`, `descripcion_prod`, `caracteristicas_prod`, `stock`, `stock_minimo`, `precio_venta`, `garantia`, `id_marca`, `id_categoria`) VALUES
(1, 'AMD Ryzen 7 3700X (Wraith Prism) 4.4Ghz Socket AM4 Boxed', 'amd-ryzen-7-3700x-wraith-prism-44ghz-socket-am4-boxed-procesador-001.jpg', ' Para aquellos que buscan actualizar sus PC con un nuevo procesador, los fabricantes de placas base tienen implementadas actualizaciones de BIOS. Visite el sitio web del proveedor de su placa base para obtener una lista de los procesadores compatibles para que pueda identificar fÃ¡cilmente quÃ© placa base serÃ¡ compatible con el procesador Ryzen de su elecciÃ³n.', '# de nÃºcleos de CPU: 8,\r\n# de hilos: 16,\r\nReloj base: 3.6GHz,\r\nReloj de aumento mÃ¡x.: 4.4GHz,\r\nCachÃ© L2 total:  4MB,\r\nCachÃ© L3 total:  32MB,\r\nDesbloqueados:  SÃ­,\r\nCMOS:  TSMC 7nm FinFET,\r\nPackage:  AM4,\r\nVersiÃ³n de PCI Express:  PCIe 4.0 x16,\r\nSoluciÃ³n tÃ©rmica :  Wraith Prism with RGB LED TDP/TDP predeterminado  65W', 8, 2, 1274.99, '3 meses', 23, 5),
(3, 'Corsair Vengeance RGB Pro Black 16GB (2x8GB) 3200MHz (PC4-25600) CL16', 'corsair-vengeance-rgb-pro-black-16gb-2x8gb-3200mhz-pc4-25600-cl16-memoria-ddr4-001.jpg', ' VENGEANCE RGB PRO La memoria overclockeada de la serie DDR4 ilumina su PC con una fascinante iluminaciÃ³n RGB dinÃ¡mica de mÃºltiples zonas, mientras brinda lo mejor en rendimiento DDR4.', 'Ventilador incluido:  No,\r\nSerie de memoria:  VENGEANCE RGB PRO,\r\nTipo de memoria:  DDR4,\r\nTamaÃ±o de la memoria:  Kit de 16GB (2 x 8GB),\r\nLatencia probada:  16-18-18-36,\r\nVoltaje probado:  1.35V,\r\nVelocidad probada:  3200MHz,\r\nColor de memoria:  NEGRO,\r\nIluminaciÃ³n LED:  RGB', 4, 3, 698.50, '3 meses', 28, 7),
(4, 'Intel Core i5-9600K 4.60 GHz Socket 1151 Boxed', 'intel-core-i5-9600k-370-ghz-socket-1151-boxed-procesador-001.jpg', ' SÃ³lo compatible con sus placas base basadas en chipset de la serie 300, el procesador Intel Core i5-9600K 3.7 GHz Six-Core LGA 1151 estÃ¡ diseÃ±ado para juegos, creaciÃ³n y productividad.', ' Tipo / Factor de forma :	Intel Core i5 9600K,\r\nNÃºmero de nÃºcleos:	6 nÃºcleos,\r\nNÃºmero de hilos:	6 hilos,\r\nCachÃ©:	9 MB,\r\nDetalles de memoria cachÃ©:	12 MB,\r\nCantidad de procesadores:	1,\r\nVelocidad reloj:	3.7 GHz,\r\nVelocidad turbo mÃ¡x:	4.6 GHz,\r\nZÃ³calo de procesador compatible:  	LGA1151 Socket,\r\nProceso de fabricaciÃ³n:	14 nm,\r\nPotencia de diseÃ±o tÃ©rmico:	95 W,\r\nCaracterÃ­sticas arquitectura:	Intel Turbo Boost Technology 2.0,', 11, 3, 1385.59, '3 meses', 4, 5),
(6, 'MSI Vigor GK30 Gaming ES + Clutch GM11', 'msi-vigor-gk30-gaming-combo-es-combo-001.jpg', ' Hemos combinado nuestro VIGOR GK30 y nuestro CLUTCH GM11 en un pack para casual gamers. Estos 2 prodcutos son una gran combinaciÃ³n en diseÃ±o y funcionabilidad. Los efectos RGB pueden ser sicronizados a travÃ©s de Dragon Center. Vigor GK30 Gaming Combo proporciona una base sÃ³lida para tu setup Gaming a un precio bajÃ­simo. Â¡PrepÃ¡rate para jugar con estilo!a base sÃ³lida para tu setup Gaming a un precio bajÃ­simo. Â¡PrepÃ¡rate para jugar con estilo!', 'Model Name:	TECLADO VIGOR GK30 GAMING,\r\nSwitches teclas:	Plunger Switches,\r\nInterfaz:	USB 2.0,\r\nTeclas:	104/105/108 keys (varies per language),\r\nIlumunaciÃ³n:	RGB (6-zone),\r\nOperating System:	  Windows 10 / 8.1 / 8 / 7,\r\nCables: 	1.8m with gold-plated connector\r\nNÃºmero Pulsaciones:	12+ Million,\r\nN-Key :  Rollover	6-Keys Rollover 20 Keys Anti-Ghosting', 3, 4, 359.99, 'ninguna', 7, 12),
(7, 'GIGABYTE AORUS AD27QD 27&#34; LED QuadHD GAMING', 'gigabyte-aorus-ad27qd-27-led-quadhd-gaming-reac.jpg', ' Monitor gigabyte aorus ad27qd 27&#39;&#39; led quadhd 144hz freesync hdmi dp negro.', 'Marca:	   Gigabyte Technology, Series:  AD27QD, Peso del producto:  	8 Kg, Dimensiones del producto:    23,7 x 61,5 x 48,5 cm, NÃºmero de modelo del producto:    20VM0-AAD27QDSA-1EKR, DimensiÃ³n de la pantalla:  27 pulgadas, ResoluciÃ³n de pantalla: 2560 x 1440 Pixeles, MÃ¡xima resoluciÃ³n de pantalla:   1080p Full HD pÃ­xeles, Detalles de audio:   3,5 mm, NÃºmero de puertos USB 2.0:	2, NÃºmero de puertos HDMI:	2', 5, 2, 3455.00, '3 meses', 36, 8),
(8, 'Gigabyte GeForceÂ® RTX 2080 SUPER Gaming OC 8GB GDDR6', 'gigabyte-geforce-rtx-2080-super-gaming-oc-8gb-gddr6-tarjeta-grfica-001.jpg', ' El sistema de enfriamiento WINDFORCE 3X cuenta con 3 ventiladores de paletas Ãºnicos de 82 mm, ventilador giratorio alternativo, 6 tubos de calor de cobre compuesto, toque directo de tubo de calor y funcionalidad de ventilador activo 3D, que entregan una capacidad efectiva de disipaciÃ³n de calor para un mayor rendimiento a temperaturas mÃ¡s bajas.', 'Graphics Processing:  GeForceÂ® RTX 2080 SUPERâ„¢,\r\nCore Clock:  1845 MHz (Reference Card: 1815 MHz) Rev.2.0,\r\nRTX-OPS:   64,\r\nCUDAÂ® Cores:  3072,\r\nMemory Clock:  15500 MHz,\r\nMemory Size:  8 GB,\r\nMemory Type:  GDDR6,\r\nMemory Bus:  256 bit', 3, 1, 6980.00, '1 mes', 36, 2),
(9, 'Asus ROG Strix Carry Gaming InalÃ¡mbrico 7200 Dpi', 'asus-rog-strix-carry-gaming-inalambrico-7200-dpi-raton-001.jpg', ' El ROG Strix Carry es un ratÃ³n inalÃ¡mbrico portÃ¡til de gaming equipado de conectividad inalÃ¡mbrica RF 2,4 GHz (1 ms) y Bluetooth, y un sensor Ã³ptico PMW3330 7200 DPI para jugar con precisiÃ³n. El Strix Carry es extremadamente eficiente: conectado a travÃ©s de Bluetooth ofrece una gran autonomÃ­a y por 2,4 GHz permite jugar sin retardo. El ROG Strix Carry siempre estÃ¡ listo para jugar y trabajar; en casa, la oficina o mientras estÃ¡s de viaje', 'Conectividad:  InalÃ¡mbrico, TecnologÃ­a inalÃ¡mbrica:  RF 2.4GHz + Bluetooth, Seguimiento:  Ã“ptico,\r\nSO compatibles:  Windows 10  Windows 7,\r\nDimensiones:  101 x 62 x 36 mm,\r\nPeso:  72.9 g / 0.20 lbs (Excluding batteries)', 4, 2, 589.00, '3 meses', 35, 13),
(10, 'PortÃ¡til ASUS A543MA-GQ529 - Intel Celeron N4000 4GB RAM 128GB SSD', 'portatil-asus-a543ma-gq529-intel-celeron-n4000-4gb-ram-128gb-ssd.jpg', 'Â¡No te pierdas este precio increÃ­ble! El portÃ¡til Asus A543MA-GQ529 es un portÃ¡til bÃ¡sico que te permitirÃ¡ hacer tareas de todo tipo como navegar por internet, excel, word, ver vÃ­deos, etc. Que no te engaÃ±e su precio, este portÃ¡til es completo y totalmente eficiente para un uso domÃ©stico. Con procesador Intel Celeron N4000, 4GB de memoria RAM y 128GB SSD ofrece una experiencia rÃ¡pida. Si miramos su diseÃ±o, vemos que estÃ¡ hecho con un estilo moderno y destaca por su pantalla de 15.6&#34; y mÃºltiples opciones de conectividad (USB 3.0, HDMI, WiFi dual, Bluetooth...) Â¡Ya en Red Computer!', 'Procesador: Intel Celeron N4000 (2 NÃºcleos, 4MB CachÃ©, 1.10 hasta 2.60GHz, 64-bit),\r\nMemoria RAM: 4GB [EN PLACA] LPDDR4 2400MHz,\r\nGrÃ¡fica: Intel HD 600,\r\nAlmacenamiento: 128GB SSD SATA3,\r\nUnidad Ã³ptica: no,\r\nPantalla de 15.6&#34; HD, antirreflejos, 1366 x 768,\r\nWebcam,\r\nAudio: altavoces integrados, micrÃ³fono,\r\nBaterÃ­a de 3 celdas,\r\n381 x 251 x 27,2 mm,\r\n1.9 kg. aprox.', 5, 1, 1750.00, '3 meses', 35, 16),
(11, 'Cooler Master Masterkeys Lite L Cherry MX', 'cooler-master-masterkeys-lite-l-cherry-mx-teclado-001.jpg', 'Este teclado darÃ¡ la sensaciÃ³n continua de estar utilizando un teclado mecÃ¡nico y es compatible con teclas personalizadas para los switches Cherry MX.\r\n\r\nEstÃ¡ compuesto por hasta 26 teclas Anti-Ghosting, para aquellos que durante un juego frenÃ©tico presionan varias teclas al mismo tiempo, iluminaciÃ³n RGB personalizable con 16.7 millones de colores y es resistente a la caÃ­da de lÃ­quidos.', 'Tipo de interruptor: Cooler Master Mem-chanical, \r\nColor: Negro, \r\nColor del LED: RGB, \r\nTasa de repeticiÃ³n: Normal 1x / Turbo 8x, \r\nOn-the-fly System: Control de iluminaciÃ³n, Multimedia, Win Lk, Full Keys LK,\r\nCable:  Cable de goma no desmontable, \r\nCable conector: USB 2.0,\r\nLongitud del cable: 1.8m,\r\nDimensiones (L x W x H): 439 x 129 x 41 mm / 17.28 x 5.12 x 1.61 pulgadas,\r\nPeso: 967g', 8, 3, 380.50, '3 meses', 32, 12),
(12, 'MSI OPTIX MPG27CQ 27&#34; 144Hz 2K Curvo', 'msi-optix-mpg27cq-27-144-hz-2k-curvo-monitor-001.jpg', 'Siempre vigila tu estado de juego y nunca pierdas de vista a tu enemigo. Con la nueva serie MSI Optix MPG, monitores, querÃ­amos asegurarnos de que siempre tenga la informaciÃ³n correcta a tiempo para desafiar a sus oponentes. Con luces LED RGB integradas en la parte frontal y soporte de SteelSeries GameSense, puedes controlar tus estadÃ­sticas de municiÃ³n, salud o potencia en tu monitor. Tiene una jugabilidad sÃºper suave con frecuencia de actualizaciÃ³n de 144Hz y tiempo de respuesta de 1 ms. SiÃ©ntase como si estuviera en el juego con nuestra pantalla curva para darle mÃ¡s inmersiÃ³n en el juego. Y evita la fatiga visual para sesiones de juego mÃ¡s largas con Less Blue Light y Anti-Flicker. Experimenta la inmersiÃ³n total del juego y nunca pierdas de vista a tu enemigo.', 'TamaÃ±o:	27&#34; (69 cm), \r\nResoluciÃ³n:	2560 x 1440 (WQHD), \r\nTipo Panel:	VA, \r\nCurvatura:	1800R, \r\nFormato:	16:9, \r\nBrightness (nits):	400, \r\nRatio Constraste:	3000:1, \r\nDCR (Dynamic Contrast Ratio):	100000000:1, \r\nTasa Refresco:	144Hz, \r\nTiempo Respuesta:	1ms(MPRT), \r\nVideo interface:	DP(1.2) 2560 x 1440 (Up to 144Hz), \r\nPuertos:  2x USB 3.0 Type A 2x HDMI (2.0) 2560 x 1440 (Up to 120Hz) 1x USB 3.0 Type B (PC to Monitor), \r\nInterface Audio:	1x Earphone, \r\n1x Audio combo: jack(Mic in and Line out to Monitor), \r\nAngulo VisiÃ³n:	178Â°(H)/178Â°(V)', 5, 1, 3450.00, '1 mes', 7, 8),
(13, 'KFA2 GeForceÂ® RTX 2060 SUPER 1-Click OC 8GB GDDR6', 'kfa2-geforce-rtx-2060-super-1-click-oc-8gb-gddr6-tarjeta-grafica.jpg', 'La GeForceÂ® RTX 2060 SUPERâ„¢ cuenta con la galardonada arquitectura NVIDIA Turingâ„¢, de forma que ofrece un rendimiento e imÃ¡genes generales superrÃ¡pidas para todos los jugadores y creadores. Ha llegado el momento de equiparse y obtener superpoderes.', 'GPU Engine Specs: CUDA Cores 2176, \r\nBoost Clock (MHz) 1665, \r\n1-Click OC Clock (MHz) 1680 (by installing Xtreme Tuner Plus Software and using 1-Click OC),\r\nVelocidad memoria 14Gbps, \r\nMemoria Standard Config 8GB, \r\nMemory Interface Width 256-bit GDDR6, \r\nMemory Bandwidth (GB/sec) 448, \r\nPCI-E 3.0, \r\nWindows 7 64-bit, Windows 10 64-bit, \r\nDisplayPort 1.4, HDMI 2.0b, DVI-D, \r\nDimensiones(with Bracket): 245*134*41 mm, \r\nDimensiones(without Bracket): 230*119*38 mm', 5, 1, 2770.00, '1 mes', 16, 2),
(14, 'HP 250 G6 i5-7200U/HD620/8GB/256GB SSD/15.6&#34;/FreeDOS', 'hp-250-g6-i5-7200u-hd520-8gb-256gb-ssd-156-freedos-portatil-001.jpg', 'MantÃ©ngase conectado con este PC Notebook HP 250 de precio econÃ³mico. Complete las tareas profesionales con la tecnologÃ­a IntelÂ®, herramientas esenciales de colaboraciÃ³n y Windows 10 Pro1 cargado en el HP 250. El chasis duradero ayuda a proteger el ordenador portÃ¡til contra los rigores del dÃ­a.\r\n\r\nDiseÃ±o mÃ³vil resistente\r\n\r\nTenga por seguro que el HP 250 puede mantenerse al dÃ­a con las asignaciones sobre la marcha. El chasis duradero protege el portÃ¡til, por lo que se ve tan profesional como usted.\r\nComplementos que perfeccionan la experiencia\r\nHP, lÃ­der mundial en PC, le ayuda a equiparse con un ordenador portÃ¡til totalmente funcional, listo para conectarse a todos sus perifÃ©ricos3 y diseÃ±ado para adaptarse a las necesidades del negocio con un puerto RJ-45 y un puerto VGA.', 'Procesador IntelÂ® Coreâ„¢ i5-7200U (2 NÃºcleos, 3M Cache, 2.5GHz hasta 3.1GHz),\r\nMemoria RAM SDRAM DDR4-2133 de 8 GB, \r\nDisco duro 256 GB SSD Sata, \r\nAlmacenamiento Ã³ptico Grabadora de DVD SuperMulti, \r\nDisplay Pantalla fina de 39,6 cm (15,6&#34;) HD SVA eDP antirreflejo WLED (1366 x 768);, \r\nControlador grÃ¡fico Intel HD 620, \r\nConectividad, \r\n10/100/1000 Gigabit, \r\nCombo de 802.11ac (1x1) y BluetoothÂ® 4.2 (compatible con Miracast), \r\nCÃ¡mara de portÃ¡til CÃ¡mara HD HP TrueVision con micrÃ³fono digital integrado, \r\nMicrÃ³fono SÃ­, \r\nBaterÃ­a BaterÃ­a de ion-litio de 3 celdas 31 Wh, \r\nConexiones:\r\n1 x USB 2.0, \r\n2 x USB 3.1, \r\n1x HDMI, \r\n1x RJ-45, \r\n1 x VGA, \r\nCombo de salida de auriculares / micrÃ³fono del puerto, \r\nLector de tarjetas SD multiformato HP, \r\nSistema operativo FREEDOS, \r\nDimensiones 38 x 25,8 x 23.8 cm, \r\nPeso 1.86 kg, \r\nColor Plata, ', 3, 1, 3490.00, '1 mes', 33, 16),
(15, 'Asus TUF FX505DV Ryzen 7 3750H / RTX 2060 / 16GB / 512GB NVMe / FreeDOS / 15.6&#34; 120Hz', 'asus-tuf-fx505dv-al014-ryzen-7-3750h-rtx-2060-16gb-512gb-ssd-freedos-156-portatil-001.jpg', 'El nuevo ASUS TUF Gaming FX505 combina el Ãºltimo procesador AMD Ryzenâ„¢ con grÃ¡ficos NVIDIAÂ® GeForceÂ® RTXâ„¢ 2060 y una pantalla NanoEdge de hasta 120 Hz IPS que produce una experiencia inmersiva de alta calidad a un precio muy atractivo. EstÃ¡ probado y certificado para cumplir con las normas MIL-STD-810G de grado militar, garantizando la dureza y durabilidad necesaria para resistir los rigores del trabajo y el juego cotidianos.', 'Procesador, \r\nAMDÂ® Ryzenâ„¢ 7 3750H APU (4 NÃºcleos, 8 Subprocesos, CachÃ©: 6MB Level 2&3, 2.3GHz hasta 4.0GHz, 64-bit), \r\nSistema Operativo, \r\nFreeDOS, \r\nMemoria,\r\n16GB (8GB*2) DDR4 2666MHz, Slot de memoria 2, ampliable hasta 32GB., \r\nAlmacenamiento, \r\n512GB SSD M.2 PCIeÂ® Gen3 NVMe, \r\nGrÃ¡fica, \r\nNVIDIAÂ® GeForceÂ® RTXâ„¢ 2060, \r\nAMDÂ® Radeonâ„¢ RX Vega 10 Graphics, \r\nMemoria de Video 6GB GDDR6 VRAM, \r\nRed InalÃ¡mbrica, \r\nWi-Fi 5 (802.11ac) 2x2, \r\nBluetoothÂ® 4.2, \r\nRed 10/100/1000 Mbps, \r\nCÃ¡mara, \r\nHD (720p), \r\nInterfaz, \r\n1 x USB 2.0, \r\n2 x USB-Câ„¢ 3.2 (GEN1), \r\n1 x Salida Auriculares/Entrada MicrÃ³fono 3.5mm (combo), \r\n1 x Conector RJ45 LAN, \r\n1 x HDMI 2.0, \r\n1 x Bloqueo Kensington, \r\n1 x Entrada de Corriente, \r\nLector de Tarjetas: No, \r\nDisplay, \r\n15.6&#34; (16:9) LED-backlit FHD (1920x1080) 120Hz Anti-Glare Panel with 45% NTSC,IPS-leve, \r\nTeclado, \r\nTeclado tipo chicle, teclado numÃ©rico aislado, iluminaciÃ³n RGB, EspaÃ±ol, \r\nDimensiones, \r\n360.4 x 262.0 x 25.8 ~26.8 mm (WxDxH), \r\nPeso, \r\n2,2 Kg (con baterÃ­a de 3 celdas), \r\nGaming Series, \r\nFX Series', 3, 1, 6779.99, '1 aÃ±o', 35, 16),
(16, 'Lenovo V155 AMD Ryzen 5-3500U / Radeon Vega 8 / 8GB / 256GB SSD / 15.6&#34;', 'lenovo-v155-amd-ryzen-5-3500u-radeon-vega-8-8gb-256gb-ssd-156-portatil-001.jpg', 'Conoce el V155 de 38,1 cm (15&#34;) diseÃ±ado para satisfacer las necesidades cotidianas de tu negocio. Aumenta la productividad y eficiencia con un procesador AMD y una tarjeta grÃ¡fica sÃ³lidos, protege tus datos con la encriptaciÃ³n de categorÃ­a profesional y ofrece a tus empleados la comodidad de sus caracterÃ­sticas ergonÃ³micas; todo integrado un chasis con un aspecto limpio, claro y profesional.\r\n\r\nEl departamento de IT te lo agradecerÃ¡\r\nLa productividad, seguridad y fiabilidad del portÃ¡til V155 son todo un regalo para tu departamento de IT. El impresionante rendimiento de AMD y los numerosos puertos satisfarÃ¡n a tus empleados y reducirÃ¡n las quejas al departamento de IT. AdemÃ¡s, el departamento de IT podrÃ¡ confiar en la encriptaciÃ³n de datos y contraseÃ±as, ademÃ¡s de ofrecerle una gran fiabilidad y durabilidad.', 'Sistema Operativo - Microsoft Windows 10 Home 64-bits, \r\nCPU - AMD Ryzen 5 3500U, \r\n- NÃºmero de nÃºcleos: 4, \r\n- Velocidad del procesador: 2.1/3.7 GHz, \r\nMemoria - Memoria interna: 8GB, \r\n- Tipo de memoria interna: DIMM DDR4-2400, \r\nDisco Duro - Capacidad de almacenamiento: 256GB, \r\n- Tipo de almacenamiento: SSD M.2 2242 PCIe NVMe, \r\nPantalla - TamaÃ±o de pantalla: 15.6&#34;, \r\n- ResoluciÃ³n: 1920x1080 FHD, \r\n- TecnologÃ­a de pantalla: LED, \r\nGrÃ¡fica - Integrada AMD Radeon Vega 8, \r\nConectividad, \r\n- Velocidad Ethernet: 100/1000M, \r\n- Tipo de Wireless LAN: 802.11ac, \r\n- Bluetooth: 4.1, \r\nUnidad Ã³ptica - 9.0mm DVDÂ±RW, \r\nPuertos E/S, \r\n- 2 x USB 3.1 Gen 1, \r\n- 1 x HDMI, \r\n- 1 x RJ-45, \r\n- Toma combinada de auriculares/micrÃ³fono: SÃ­, \r\nOtras caracterÃ­sticas Audio, \r\n- Altavoces incorporados: SÃ­, \r\n- MicrÃ³fono incorporado: SÃ­, \r\nCÃ¡mara, \r\n- CÃ¡mara incorporada: SÃ­, \r\n- ResoluciÃ³n de cÃ¡mara: HD 720p, \r\nTeclado EspaÃ±ol, \r\n- Trackpad, \r\n- Teclado numÃ©rico, \r\nBaterÃ­a, \r\n- Potencia: 36 Wh, \r\nPeso y dimensiones, \r\n- Ancho: 363 mm, \r\n- Profundidad: 254.6 mm, \r\n- Altura: 22.9 mm, \r\n- Peso: 2.2 Kg, ', 2, 1, 3100.00, '1 aÃ±o', 34, 16),
(17, 'Corsair Void ELITE Wireless Gaming 7.1 Blanco', 'corsair-void-elite-wireless-gaming-71-blanco-auriculares-001.jpg', 'SumÃ©rjase en la acciÃ³n con los CORSAIR VOID RGB ELITE inalÃ¡mbricos, con transductores de audio de neodimio de 50 mm de ajuste personalizado que ofrecen un sonido envolvente 7.1 en PC. Tela con rejilla de microfibra y las almohadillas de espuma con memoria ofrecen una comodidad duradera. ConÃ©ctelos a su PC o PS4 con una conexiÃ³n inalÃ¡mbrica de baja latencia de 2,4GHz, con un alcance de hasta 12 metros y una baterÃ­a con la que podrÃ¡s jugar hasta 16 horas. Un micrÃ³fono omnidireccional con indicador LED de silencio garantiza que los demÃ¡s jugadores le oirÃ¡n con una claridad de voz excepcional. El distintivo diseÃ±o de los VOID RGB ELITE y una construcciÃ³n duradera se completan con una iluminaciÃ³n RGB completamente personalizable en cada auricular. El potente software CORSAIR iCUEune todo, brindando un control absoluto sobre los ajustes del ecualizador, el sonido envolvente 7.1, la iluminaciÃ³n RGB y mucho mÃ¡s.', 'Auriculares, \r\nRespuesta de frecuencia: 20 Hz -30 kHz, \r\nImpedancia: 32 ohmios a 1 kHz, \r\nSensibilidad: 116 dB (Â± 3 dB), \r\nTransductores: Neodimio personalizado de 50 mm, \r\nMicrÃ³fono, \r\nTipo: Omnidirecciona, \r\nImpedancia: 2000 ohmios, \r\nRespuesta de frecuencia: 100 Hz â€“10 kHz, \r\nSensibilidad: -42 dB (Â± 3 dB) , \r\nInalÃ¡mbrico, \r\nTipo: 2,4 Ghz, \r\nConector: USB tipo A, \r\nRango: Hasta 12 m, \r\nDuraciÃ³n de la baterÃ­a: Hasta 16 horas, \r\nCable de carga USB: 1,5 m, \r\nDimensiones: 200 mm x 95 mm x 200 mm, \r\nPeso del producto (sin cables ni accesorios): 400 g, ', 5, 2, 770.00, '3 meses', 28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `resenia`
--

CREATE TABLE `resenia` (
  `id_reseña` int NOT NULL,
  `nombre_res` varchar(50) NOT NULL,
  `email_res` varchar(200) NOT NULL,
  `resenia` text NOT NULL,
  `calificacion` int NOT NULL,
  `fecha_resenia` date NOT NULL,
  `id_producto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resenia`
--

INSERT INTO `resenia` (`id_reseña`, `nombre_res`, `email_res`, `resenia`, `calificacion`, `fecha_resenia`, `id_producto`) VALUES
(1, 'willy', 'marco.chambi20@gmail.com', 'bueno', 4, '2019-10-26', 4),
(2, 'marco', 'marco.chambi20@gmail.com', 'bexellente!!', 5, '2019-10-26', 4),
(3, 'Juan', 'marcggm.20@gmail.com', 'No lo recomiento', 1, '2019-10-26', 4),
(4, 'Pedro', 'marcos.chambi20@gmail.com', 'Regular', 3, '2019-10-26', 4),
(5, 'willy', 'marcggmarc.20@gmail.com', 'bueno', 4, '2019-10-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `ultima_conexion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `nombre`, `password`, `estado`, `ultima_conexion`) VALUES
(1, 'marcos123', 'marcos', 'marcos123', 0, '2019-11-21 19:44:55'),
(2, 'marc', 'juan', '1234', 0, '2019-11-21 19:44:58'),
(3, 'Willy123', 'Willy Marcos', '$2y$12$BJpoxRFcvkEY5QAkFGukKO9Bz465NoYCppMVLUucVFB0sh1cjz.UO', 1, '0000-00-00 00:00:00'),
(5, 'Juan', 'Juan', '$2y$12$1LybQh14ugcvw38//fNtuufl253UniIvUvOh3x.pXrWRrM0MPrVn.', 1, '2020-11-15 20:05:01'),
(7, 'Joselito', 'Jose', '$2y$12$Ag6/8jjG8.TeU.t8/pqO.OADHSYzuIddH9ToRq2H6UBzi3yVBR6UW', 0, '2019-11-21 19:41:42'),
(8, 'admin', 'willy', '$2y$12$up.7ZsUK0PWmc5IWmo1VKO3KdclpaJKUg9wyGPBQ05yFrellSGtb2', 1, '2019-12-06 03:35:31'),
(14, 'Erika123', 'Erika', '$2y$12$4EzusPU3M7nfIdp1IeGHp.OzzmdsJKJ1JT8aMvzNPriUa.PCrtfiS', 1, '2019-11-21 19:41:30'),
(15, 'matha123', 'Martha', '$2y$12$D/OgOF6gMA.uRn6scC.clu/yvX8QICTXV96U3DuVjFmAgRcuK..3.', 1, '2019-11-21 19:44:40'),
(18, 'Jonas1234', 'willy', '$2y$12$NqM0PRrgipuXMMsz028z4.zRka3muXfG.X.pocDunevQ7MWvRoJVa', 1, '2019-11-21 19:53:02'),
(19, 'Alfonso5632', 'Alfonso Mamani', '$2y$12$SUITCgD88w4Mc2woBitjV.2tSrbdfjL2j1iDqzKFO2/13jhHSTd/2', 0, NULL),
(20, 'willy1412', 'willy chana', '$2y$12$lUWmBzPDv5GbUg/LrfM3feBe4BxmP6QGfj5X6GnRsa2PXVmMzr46G', 1, '2020-11-15 20:07:23');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `id_venta` int NOT NULL,
  `tipo_pago` varchar(30) NOT NULL,
  `total_pago` float(10,2) NOT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_cliente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`id_venta`, `tipo_pago`, `total_pago`, `fecha_venta`, `id_cliente`) VALUES
(27, 'Contra-entrega', 59.99, '2019-04-10 04:00:00', 20),
(31, 'Contra-entrega', 333.48, '2019-05-09 04:00:00', 20),
(32, 'Deposito', 2382.50, '2019-06-08 04:00:00', 20),
(33, 'Deposito', 185.59, '2019-11-08 04:00:00', 20),
(34, 'Deposito', 755.68, '2019-11-09 04:00:00', 14),
(35, 'Contra-entrega', 431.17, '2019-11-11 04:00:00', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_cuidad` (`id_ciudad`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indexes for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indexes for table `participa`
--
ALTER TABLE `participa`
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `participa_pedido`
--
ALTER TABLE `participa_pedido`
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `resenia`
--
ALTER TABLE `resenia`
  ADD PRIMARY KEY (`id_reseña`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `resenia`
--
ALTER TABLE `resenia`
  MODIFY `id_reseña` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id_ciudad`) ON UPDATE CASCADE;

--
-- Constraints for table `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participa`
--
ALTER TABLE `participa`
  ADD CONSTRAINT `participa_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participa_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participa_pedido`
--
ALTER TABLE `participa_pedido`
  ADD CONSTRAINT `participa_pedido_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participa_pedido_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resenia`
--
ALTER TABLE `resenia`
  ADD CONSTRAINT `resenia_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 22, 2021 at 06:38 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heladeria`
--
CREATE DATABASE IF NOT EXISTS `heladeria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `heladeria`;

-- --------------------------------------------------------

--
-- Table structure for table `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `usuarioId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orden`
--

INSERT INTO `orden` (`id`, `fecha`, `direccion`, `usuarioId`) VALUES
(1, '2021-08-22', 'San José', 3),
(2, '2021-08-22', 'San José', 3),
(3, '2021-08-22', 'San José', 3),
(4, '2021-08-22', 'Tibas', 23);

-- --------------------------------------------------------

--
-- Table structure for table `orden_x_producto`
--

CREATE TABLE `orden_x_producto` (
  `id` int(11) NOT NULL,
  `ordenId` int(11) NOT NULL,
  `productoId` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orden_x_producto`
--

INSERT INTO `orden_x_producto` (`id`, `ordenId`, `productoId`, `cantidad`) VALUES
(1, 1, 10, 6),
(2, 1, 6, 4),
(3, 2, 9, 4),
(4, 2, 10, 6),
(5, 3, 10, 8),
(6, 4, 5, 4),
(7, 4, 9, 3);

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `name`, `description`, `stock`, `price`) VALUES
(1, 'Coco Berry Shake', 'Deliciosa combinación de helado de fresa con helado de coco.', 0, 2),
(3, 'Piña Colada', 'Majestuosa Piña Colada, realmente irresistible.', 3, 3),
(5, 'Vaca Negra', 'Majestuosa Vaca Negra, realmente irresistible.', 4, 3),
(6, 'Mint Cappuccino', 'Majestuosa Mint Cappuccino, realmente irresistible.', 7, 4),
(9, 'Fresa', 'Fresa description', 5, 2),
(10, 'Guanabana', 'Guanabana desc', 10, 2),
(11, 'Chocolate Cookie', 'Chocolate Cookie desc', 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleId` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleId`, `nombre`) VALUES
(1, 'admin'),
(2, 'editor'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarioId` int(11) NOT NULL,
  `usuarioNombre` varchar(255) NOT NULL,
  `usuarioPassword` varchar(255) NOT NULL,
  `usuarioEdad` int(11) NOT NULL,
  `usuarioCorreo` varchar(100) NOT NULL,
  `usuarioDireccion` varchar(255) NOT NULL,
  `usuarioTelefono` varchar(20) NOT NULL,
  `usuarioRoleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuarioId`, `usuarioNombre`, `usuarioPassword`, `usuarioEdad`, `usuarioCorreo`, `usuarioDireccion`, `usuarioTelefono`, `usuarioRoleId`) VALUES
(1, 'userAdmin', '202cb962ac59075b964b07152d234b70', 27, 'admin@test.com', 'Guanacaste', '85407030', 1),
(2, 'userEditor', '202cb962ac59075b964b07152d234b70', 20, 'editor@test.com', 'Heredia', '85489090', 2),
(3, 'userCliente', '202cb962ac59075b964b07152d234b70', 20, 'cliente@test.com', 'San José', '85407032', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Factura_Usuario` (`usuarioId`);

--
-- Indexes for table `orden_x_producto`
--
ALTER TABLE `orden_x_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_OXP_OID` (`ordenId`),
  ADD KEY `FK_OXP_PID` (`productoId`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarioId`),
  ADD KEY `Usuario_Role` (`usuarioRoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orden_x_producto`
--
ALTER TABLE `orden_x_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orden_x_producto`
--
ALTER TABLE `orden_x_producto`
  ADD CONSTRAINT `FK_OXP_OID` FOREIGN KEY (`ordenId`) REFERENCES `orden` (`id`),
  ADD CONSTRAINT `FK_OXP_PID` FOREIGN KEY (`productoId`) REFERENCES `productos` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `Usuario_Role` FOREIGN KEY (`usuarioRoleId`) REFERENCES `roles` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

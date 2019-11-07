-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-11-2019 a las 18:37:49
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `products`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `brands`
--

INSERT INTO `brands` (`id_brand`, `description`) VALUES
(1, 'Topper'),
(2, 'Adidas'),
(3, 'Nike'),
(4, 'Puma'),
(5, 'Timberland'),
(6, 'Merrel'),
(7, 'Converse'),
(8, 'Fila'),
(9, 'Lacoste'),
(10, 'New Balance'),
(11, 'Otra'),
(12, 'Ombu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id_color` int(11) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id_color`, `description`) VALUES
(1, 'Rojo'),
(2, 'Negro'),
(3, 'Verde'),
(4, 'Amarillo'),
(5, 'Azul'),
(6, 'Violeta'),
(7, 'Blanco'),
(8, 'Naranja'),
(9, 'Rosa'),
(10, 'Gris'),
(11, 'Marron');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sneakers`
--

CREATE TABLE `sneakers` (
  `id_sneakers` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `price` decimal(7,2) DEFAULT NULL,
  `id_colors` int(11) NOT NULL,
  `id_brands` int(11) NOT NULL,
  `initial_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL,
  `observation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sneakers`
--

INSERT INTO `sneakers` (`id_sneakers`, `model`, `price`, `id_colors`, `id_brands`, `initial_date`, `image`, `observation`) VALUES
(1, 'Nike MD Runner 2', '4500.00', 2, 3, '2019-09-12 22:21:51', '../img/Nike_Md_Runner_2.jpg', NULL),
(2, 'prueba', '10.00', 3, 1, '2019-09-27 00:04:14', '../img/prueba.jpg', 'prueba'),
(7, 'Bananita Dolca', '2500.00', 4, 2, '2019-10-01 23:33:16', '../img/zapalongas.jpg', 'Si'),
(9, 'Peronista', '5200.00', 11, 12, '2019-10-03 22:01:07', '../img/zapas_peron.jpg', ''),
(11, 'Looney Tunes', '2500.00', 7, 7, '2019-10-08 22:58:09', '../img/converse.jpg', 'Probando'),
(12, 'Adidas 10K', '3200.00', 10, 2, '2019-10-08 23:03:24', '../img/Adidas_10K.jpg', ''),
(18, 'Banana', '2.00', 4, 11, '2019-10-09 00:07:26', '../img/banana.jpg', ''),
(22, 'proboletes', '52.00', 9, 4, '2019-10-22 21:33:35', '', '																					proboleta												');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`id_sneakers`),
  ADD KEY `colors_sneakers` (`id_colors`),
  ADD KEY `brands_sneakers` (`id_brands`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `id_sneakers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sneakers`
--
ALTER TABLE `sneakers`
  ADD CONSTRAINT `brands_sneakers` FOREIGN KEY (`id_brands`) REFERENCES `brands` (`id_brand`),
  ADD CONSTRAINT `colors_sneakers` FOREIGN KEY (`id_colors`) REFERENCES `colors` (`id_color`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

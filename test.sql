-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-09-2021 a las 21:48:18
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

CREATE TABLE `prueba` (
  `id` int(11) NOT NULL,
  `uno` int(11) NOT NULL,
  `dos` int(11) NOT NULL,
  `tres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba`
--

INSERT INTO `prueba` (`id`, `uno`, `dos`, `tres`) VALUES
(2, 1234, 1234, 1548),
(42, 3, 1, 0),
(43, 3, 1, 0),
(44, 3, 1, 0),
(45, 11, 2, 1499888),
(46, 3, 1, 0),
(47, 3, 1, 0),
(48, 3, 1, 0),
(49, 3, 1, 0),
(50, 1, 2, 3),
(51, 1, 2, 3),
(52, 1, 2, 3),
(53, 1, 2, 3),
(54, 1, 2, 3),
(55, 1, 2, 3),
(56, 1, 2, 3),
(57, 1, 2, 3),
(58, 1, 2, 3),
(59, 1, 2, 3),
(60, 1, 2, 3),
(61, 1, 2, 3),
(62, 1, 2, 3),
(63, 1, 2, 3),
(64, 1, 2, 3),
(65, 1, 2, 3),
(66, 1, 2, 3),
(67, 1, 2, 3),
(68, 1, 2, 3),
(69, 1, 2, 3),
(70, 1, 2, 3),
(71, 1, 2, 3),
(72, 1, 2, 3),
(73, 1, 2, 3),
(74, 1, 2, 3),
(75, 1, 2, 3),
(76, 1, 2, 3),
(77, 1, 2, 3),
(78, 1, 2, 3),
(79, 1, 2, 3),
(80, 1, 2, 3),
(81, 1, 2, 3),
(82, 1, 2, 3),
(83, 1, 2, 3),
(84, 1, 2, 3),
(85, 1, 2, 3),
(86, 1, 2, 3),
(87, 1, 2, 3),
(88, 1, 2, 3),
(89, 1, 2, 3),
(90, 1, 2, 3),
(91, 1, 2, 3),
(92, 1, 2, 3),
(93, 1, 2, 3),
(94, 1, 2, 3),
(95, 1, 2, 3),
(96, 1, 2, 3),
(97, 1, 2, 3),
(98, 1, 2, 3),
(99, 1, 2, 3),
(100, 1, 2, 3),
(101, 1, 2, 3),
(102, 1, 2, 3),
(103, 1, 2, 3),
(104, 1, 2, 3),
(105, 1, 2, 3),
(106, 1, 2, 3),
(107, 1, 2, 3),
(108, 1, 2, 3),
(109, 1, 2, 3),
(110, 1, 2, 3),
(111, 1, 2, 3),
(112, 1, 2, 3),
(113, 1, 2, 3),
(114, 1, 2, 3),
(115, 1, 2, 3),
(116, 1, 2, 3),
(117, 1, 2, 3),
(118, 1, 2, 3),
(119, 1, 2, 3),
(120, 1, 2, 3),
(121, 1, 2, 3),
(122, 1, 2, 3),
(123, 1, 2, 3),
(124, 1, 2, 3),
(125, 1, 2, 3),
(126, 1, 2, 3),
(127, 1, 2, 3),
(128, 1, 2, 3),
(129, 1, 2, 3),
(130, 1, 2, 3),
(131, 1, 2, 3),
(132, 1, 2, 3),
(133, 1, 2, 3),
(134, 1, 2, 3),
(135, 1, 2, 3),
(136, 1, 2, 3),
(137, 1, 2, 3),
(138, 1, 2, 3),
(139, 1, 2, 3),
(140, 1, 2, 3),
(141, 1, 2, 3),
(142, 1, 2, 3),
(143, 1, 2, 3),
(144, 1, 2, 3),
(145, 1, 2, 3),
(146, 1, 2, 3),
(147, 1, 2, 3),
(148, 1, 2, 3),
(149, 1, 2, 3),
(150, 1, 2, 3),
(151, 1, 2, 3),
(152, 1, 2, 3),
(153, 1, 2, 3),
(154, 1, 2, 3),
(155, 1, 2, 3),
(156, 1, 2, 3),
(157, 1, 2, 3),
(158, 1, 2, 3),
(159, 1, 2, 3),
(160, 1, 2, 3),
(161, 1, 2, 3),
(162, 1, 2, 3),
(163, 1, 2, 3),
(164, 1, 2, 3),
(165, 1, 2, 3),
(166, 1, 2, 3),
(167, 1, 2, 3),
(168, 1, 2, 3),
(169, 1, 2, 3),
(170, 1, 2, 3),
(171, 1, 2, 3),
(172, 1, 2, 3),
(173, 1, 2, 3),
(174, 1, 2, 3),
(175, 1, 2, 3),
(176, 1, 2, 3),
(177, 1, 2, 3),
(178, 1, 2, 3),
(179, 1, 2, 3),
(180, 1, 2, 3),
(181, 1, 2, 3),
(182, 1, 2, 3),
(183, 1, 2, 3),
(184, 1, 2, 3),
(185, 1, 2, 3),
(186, 1, 2, 3),
(187, 1, 2, 3),
(188, 1234, 1234, 1548),
(189, 1234, 1234, 1548),
(190, 1234, 1234, 1548),
(191, 1234, 1234, 1548),
(192, 1234, 1234, 1548),
(193, 1234, 1234, 1548),
(194, 1234, 1234, 1548),
(195, 1234, 1234, 1548),
(196, 1234, 1234, 1548),
(197, 1234, 1234, 1548),
(198, 1, 2, 3),
(199, 1, 2, 3),
(200, 1, 2, 3),
(201, 1, 2, 3),
(202, 1, 2, 3),
(203, 1, 2, 3),
(204, 1, 2, 3),
(205, 1, 2, 3),
(206, 1, 2, 3),
(207, 1, 2, 3),
(208, 1, 2, 3),
(209, 1, 2, 3),
(210, 1, 2, 3),
(211, 1, 2, 3),
(212, 1, 2, 3),
(213, 1, 2, 3),
(214, 1, 2, 3),
(215, 1, 2, 3),
(216, 1, 2, 3),
(217, 1, 2, 3),
(218, 1, 2, 3),
(219, 1, 2, 3),
(220, 1, 2, 3),
(221, 1, 2, 3),
(222, 1, 2, 3),
(223, 1, 2, 3),
(224, 1, 2, 3),
(225, 1, 2, 3),
(226, 1, 2, 3),
(227, 1, 2, 3),
(228, 1, 2, 3),
(229, 1, 2, 3),
(230, 1, 2, 3),
(231, 1, 2, 3),
(232, 1, 2, 3),
(233, 1, 2, 3),
(234, 1, 2, 3),
(235, 1, 2, 3),
(236, 1, 2, 3),
(237, 1, 2, 3),
(238, 1, 2, 3),
(239, 1, 2, 3),
(240, 1, 2, 3),
(241, 1, 2, 3),
(242, 1, 2, 3),
(243, 1, 2, 3),
(244, 1, 2, 3),
(245, 1, 2, 3),
(246, 1, 2, 3),
(247, 1, 2, 3),
(248, 1, 2, 3),
(249, 1, 2, 3),
(250, 1, 2, 3),
(251, 1, 2, 3),
(252, 1, 2, 3),
(253, 1, 2, 3),
(254, 1, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba2`
--

CREATE TABLE `prueba2` (
  `id` int(11) NOT NULL,
  `uno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba2`
--

INSERT INTO `prueba2` (`id`, `uno`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba3`
--

CREATE TABLE `prueba3` (
  `id` int(11) NOT NULL,
  `dos` int(11) NOT NULL,
  `cuatro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba3`
--

INSERT INTO `prueba3` (`id`, `dos`, `cuatro`) VALUES
(1, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba4`
--

CREATE TABLE `prueba4` (
  `id` int(11) NOT NULL,
  `cuatro` int(11) NOT NULL,
  `cinco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba4`
--

INSERT INTO `prueba4` (`id`, `cuatro`, `cinco`) VALUES
(1, 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba5`
--

CREATE TABLE `prueba5` (
  `id` int(11) NOT NULL,
  `cinco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba5`
--

INSERT INTO `prueba5` (`id`, `cinco`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba6`
--

CREATE TABLE `prueba6` (
  `id` int(11) NOT NULL,
  `seis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prueba2`
--
ALTER TABLE `prueba2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uno` (`uno`);

--
-- Indices de la tabla `prueba3`
--
ALTER TABLE `prueba3`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prueba4`
--
ALTER TABLE `prueba4`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prueba5`
--
ALTER TABLE `prueba5`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prueba6`
--
ALTER TABLE `prueba6`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT de la tabla `prueba2`
--
ALTER TABLE `prueba2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prueba3`
--
ALTER TABLE `prueba3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prueba4`
--
ALTER TABLE `prueba4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prueba5`
--
ALTER TABLE `prueba5`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prueba6`
--
ALTER TABLE `prueba6`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

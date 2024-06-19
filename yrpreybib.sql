-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2024 a las 17:31:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yrpreybib`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `number_code` text NOT NULL,
  `titulo` text NOT NULL,
  `classified` text NOT NULL,
  `cutter` text NOT NULL,
  `author` text NOT NULL,
  `summary` text NOT NULL,
  `rating` int(5) NOT NULL,
  `qtde` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `books`
--

INSERT INTO `books` (`id`, `number_code`, `titulo`, `classified`, `cutter`, `author`, `summary`, `rating`, `qtde`) VALUES
(15, '1', 'titulo1', 'class1', 'cutter1', 'author1', 'summary1', 2, 1),
(24, '2', 'titulo2', 'class2', 'cutter2', 'author2', 'summary2', 2, 1),
(26, '3', 'titulo3', 'class3', 'cutter3', 'author3', 'summary3', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrowbook`
--

CREATE TABLE `borrowbook` (
  `id` int(255) NOT NULL,
  `id_student` int(255) NOT NULL,
  `number_code` int(255) NOT NULL,
  `aluno` text NOT NULL,
  `titulo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operators`
--

CREATE TABLE `operators` (
  `id` int(255) NOT NULL,
  `username` text NOT NULL,
  `nick` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `addres` text NOT NULL,
  `idioma` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `professional` text NOT NULL,
  `pass` text NOT NULL,
  `permission` text NOT NULL,
  `actived` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operators`
--

INSERT INTO `operators` (`id`, `username`, `nick`, `email`, `tel`, `addres`, `idioma`, `city`, `country`, `professional`, `pass`, `permission`, `actived`) VALUES
(1, 'John', 'admin', 'john.doe@example.com', 'tel', 'add', 'Inglês', '1', '2', '3', 'admin', 'admin', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `number`, `nome`) VALUES
(1, 2, 'Jacke'),
(2, 2, 'Jhon'),
(3, 3, 'Andrew');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `borrowbook`
--
ALTER TABLE `borrowbook`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operators`
--
ALTER TABLE `operators`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `borrowbook`
--
ALTER TABLE `borrowbook`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `operators`
--
ALTER TABLE `operators`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

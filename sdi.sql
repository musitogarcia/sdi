-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2021 a las 14:09:34
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sdi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `body` text DEFAULT NULL,
  `published` tinyint(1) DEFAULT 0,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `slug`, `body`, `published`, `created`, `modified`) VALUES
(1, 1, 'First Post', 'first-post', 'This is the first post.', 1, '2021-03-10 20:00:32', '2021-03-10 20:00:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles_tags`
--

CREATE TABLE `articles_tags` (
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(2) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `fecha_modificacion`) VALUES
(1, 'Electrónica', '2021-03-12 13:00:13'),
(2, 'Línea Blanca', '2021-03-12 13:00:31'),
(3, 'Deportes', '2021-03-12 13:00:42'),
(4, 'Alimentos', '2021-03-12 13:00:52'),
(5, 'Jardín', '2021-03-12 13:01:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(1) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `descripcion`, `fecha_modificacion`) VALUES
(1, 'abierto', NULL),
(2, 'cerrado', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `precio` double NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `comentarios` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_registro` datetime DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL,
  `id_categoria` int(2) NOT NULL,
  `id_sucursal` int(2) NOT NULL,
  `id_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `nombre`, `descripcion`, `precio`, `fecha_compra`, `comentarios`, `fecha_registro`, `fecha_modificacion`, `id_categoria`, `id_sucursal`, `id_estado`) VALUES
(3, 'Playstation 5 pro', 'Playstation 5 blanco no digital', 14000, '2021-03-12 19:21:33', 'comentario', '2021-03-12 19:21:35', '2021-03-13 13:53:00', 1, 4, 1);

--
-- Disparadores `registros`
--
DELIMITER $$
CREATE TRIGGER `tg_registros_insert` BEFORE INSERT ON `registros` FOR EACH ROW SET NEW.fecha_registro = NOW(), NEW.id_estado = 1
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tg_registros_update` BEFORE UPDATE ON `registros` FOR EACH ROW SET NEW.fecha_modificacion = NOW()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(1) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `descripcion`, `fecha_modificacion`) VALUES
(1, 'administrador', '2021-03-12 09:57:59'),
(2, 'gestor', '2021-03-12 09:58:12'),
(3, 'capturista', '2021-03-12 09:58:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(2) NOT NULL,
  `ubicacion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `ubicacion`, `fecha_modificacion`) VALUES
(1, 'Cuernavaca', '2021-03-12 13:06:40'),
(2, 'Yautepec', '2021-03-12 13:06:50'),
(3, 'Cuautla', '2021-03-12 13:06:59'),
(4, 'Acapulco', '2021-03-12 13:07:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `maiden_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(1) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `last_name`, `maiden_name`, `email`, `password`, `access`, `created`, `modified`, `role`) VALUES
(1, 'admin', 'manuel', 'fernandez', 'sanchez', 'manuel@example.com', '$2y$10$3WrJ1RIr1w.MKS7ZMLJzAeg1hYG7IW3wZze.hpRd5z83pIQmx5AEO', 1, '2021-03-10 20:00:31', '2021-03-13 13:39:50', 1),
(4, 'capturista', 'miguel', 'hernandez', 'garcia', 'miguel@cakephp.com', '$2y$10$5b3dlI.DUHsnmua8nFJyQudn88EfcehnzkK3lTsT9P/c71ctfdm3e', 1, '2021-03-13 13:31:52', '2021-03-13 13:39:12', 3),
(5, 'gestor', 'luis', 'ramirez', 'galicia', 'luis@cakephp.com', '$2y$10$6BvWm/QLm6pq2pZJ4lbgZ.LQ6BsTo3ofY7b3En6YJPMSPIoSPoiLi', 1, '2021-03-13 13:32:55', '2021-03-13 13:39:20', 2),
(6, 'cakephp', 'cake', 'php', 'a', 'cakephp@cakephp.com', '$2y$10$7zz9tZtap5PYiac6Ub8jfOqoErh/txbibikVKCONwJlrNErySduCK', 0, '2021-03-13 14:05:57', '2021-03-13 14:05:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitas`
--

CREATE TABLE `visitas` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `visitas`
--

INSERT INTO `visitas` (`id`, `fecha`, `user_id`) VALUES
(11, '2021-03-12 03:49:37', 1),
(12, '2021-03-12 03:50:07', 1),
(13, '2021-03-12 05:30:39', 1),
(14, '2021-03-12 06:08:13', 1),
(15, '2021-03-12 07:40:45', 1),
(16, '2021-03-12 08:15:50', 1),
(17, '2021-03-12 16:25:35', 1),
(18, '2021-03-12 16:48:14', 1),
(19, '2021-03-12 16:52:58', 1),
(20, '2021-03-12 16:55:21', 1),
(21, '2021-03-12 16:59:07', 1),
(22, '2021-03-12 17:01:10', 1),
(23, '2021-03-12 18:03:43', 1),
(24, '2021-03-12 18:49:34', 1),
(25, '2021-03-12 20:07:00', 1),
(26, '2021-03-12 23:47:02', 1),
(27, '2021-03-12 23:50:54', 1),
(28, '2021-03-12 18:01:04', 1),
(29, '2021-03-12 19:34:22', 1),
(30, '2021-03-13 03:04:15', 1),
(31, '2021-03-13 04:28:11', 1),
(32, '2021-03-13 04:32:18', 1),
(33, '2021-03-13 09:38:47', 1),
(34, '2021-03-13 12:29:04', 1),
(35, '2021-03-13 13:08:51', 1),
(36, '2021-03-13 13:19:49', 1),
(37, '2021-03-13 13:20:48', 1),
(38, '2021-03-13 13:22:21', 1),
(39, '2021-03-13 13:40:37', 1),
(40, '2021-03-13 13:48:13', 4),
(41, '2021-03-13 13:49:24', 1),
(42, '2021-03-13 13:51:41', 5),
(43, '2021-03-13 13:53:33', 1),
(44, '2021-03-13 13:53:49', 4),
(45, '2021-03-13 13:54:39', 5),
(46, '2021-03-13 13:55:40', 1),
(47, '2021-03-13 14:08:17', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_key` (`user_id`);

--
-- Indices de la tabla `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_key` (`tag_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_registros_categorias` (`id_categoria`),
  ADD KEY `fk_registros_sucursales` (`id_sucursal`),
  ADD KEY `fk_registros_estados` (`id_estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_roles` (`role`);

--
-- Indices de la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_visitas_usuarios` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `visitas`
--
ALTER TABLE `visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `user_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD CONSTRAINT `article_key` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `tag_key` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `fk_registros_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_registros_estados` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `fk_registros_sucursales` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursales` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_usuarios_roles` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `fk_visitas_usuarios` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

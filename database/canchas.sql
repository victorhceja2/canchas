-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 03-06-2024 a las 17:38:03
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `canchas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `court_list`
--

CREATE TABLE `court_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `court_list`
--

INSERT INTO `court_list` (`id`, `name`, `price`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Mesa 1', 20000.00, 1, 0, '2022-05-06 09:29:02', '2022-11-30 21:33:46'),
(2, 'Mesa 5', 20000.00, 1, 0, '2022-05-06 09:30:05', '2022-11-30 21:34:21'),
(3, 'Mesa 2', 25000.00, 1, 0, '2022-05-06 09:30:11', '2022-11-30 21:33:53'),
(4, 'Mesa 4', 25000.00, 1, 0, '2022-05-06 09:30:17', '2022-11-30 21:34:11'),
(5, 'Mesa 3', 30000.00, 1, 0, '2022-05-06 09:30:25', '2022-11-30 21:34:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `court_rentals`
--

CREATE TABLE `court_rentals` (
  `id` int(30) NOT NULL,
  `client_name` text NOT NULL,
  `contact` text NOT NULL,
  `court_id` int(30) NOT NULL,
  `court_price` float(12,2) NOT NULL,
  `datetime_start` datetime NOT NULL,
  `datetime_end` datetime NOT NULL,
  `hours` float(12,2) NOT NULL DEFAULT 0.00,
  `total` float(12,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = on-going,\r\n1 = Done',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `court_rentals`
--

INSERT INTO `court_rentals` (`id`, `client_name`, `contact`, `court_id`, `court_price`, `datetime_start`, `datetime_end`, `hours`, `total`, `status`, `date_created`, `date_updated`) VALUES
(2, 'Mark Cooper', '09123456789', 1, 200.00, '2022-05-06 13:55:00', '2022-05-06 16:55:00', 3.00, 600.00, 1, '2022-05-06 14:00:29', '2022-05-06 16:11:28'),
(3, 'Andres Mejia', '3103113123', 1, 20000.00, '2022-10-03 16:27:00', '2022-10-03 18:27:00', 2.00, 40000.00, 1, '2022-10-03 21:28:32', '2022-10-03 21:34:35'),
(6, 'Gabriel J.', '5001', 1, 20000.00, '2024-05-09 02:15:00', '2024-05-09 06:15:00', 4.00, 80000.00, 1, '2024-05-09 20:09:36', '2024-05-28 19:21:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `price`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Alquiler de Camisetas', 7000.00, 1, 0, '2022-05-06 09:57:45', '2022-09-30 21:55:28'),
(2, 'Alquiler de Balon', 5000.00, 1, 0, '2022-05-06 09:58:02', '2022-09-30 21:54:41'),
(3, 'Galletas', 800.00, 1, 0, '2022-05-06 09:58:14', '2022-09-30 21:54:26'),
(4, 'Gatorade', 45.00, 1, 0, '2022-05-06 09:58:51', '2022-05-06 09:58:51'),
(5, 'Coca Cola', 2500.00, 1, 0, '2022-05-06 10:01:39', '2022-09-30 21:54:13'),
(6, 'Alquiler de Racketa', 7000.00, 1, 0, '2022-05-06 10:02:41', '2022-09-30 21:54:55'),
(7, 'Paquetes de papas de 10 gr.', 2000.00, 1, 0, '2022-10-03 21:32:42', '2022-10-03 21:32:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_transaction`
--

CREATE TABLE `sales_transaction` (
  `id` int(30) NOT NULL,
  `client_name` text NOT NULL,
  `contact` text NOT NULL,
  `total` float(12,2) NOT NULL DEFAULT 0.00,
  `court_rental_id` int(30) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sales_transaction`
--

INSERT INTO `sales_transaction` (`id`, `client_name`, `contact`, `total`, `court_rental_id`, `date_created`, `date_updated`) VALUES
(2, 'Mark Cooper', '09123456789', 1350.00, 2, '2022-05-06 14:00:29', '2022-05-06 14:00:29'),
(5, 'Mike Williams', '09123456789', 1200.00, NULL, '2022-05-06 15:22:12', '2022-05-06 15:22:12'),
(6, 'Samantha Jane', '09789456123', 2100.00, NULL, '2022-05-06 15:22:39', '2022-05-06 15:22:39'),
(8, 'Andres Mejia', '3103113123', 6600.00, 3, '2022-10-03 21:28:32', '2022-10-03 21:29:45'),
(10, 'Gabriel J.', '5001', 7000.00, 6, '2024-05-09 20:09:36', '2024-05-09 20:09:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_transaction_items`
--

CREATE TABLE `sales_transaction_items` (
  `sales_transaction_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sales_transaction_items`
--

INSERT INTO `sales_transaction_items` (`sales_transaction_id`, `product_id`, `price`, `quantity`) VALUES
(5, 1, 100.00, 12),
(6, 1, 100.00, 12),
(6, 2, 300.00, 3),
(2, 5, 150.00, 1),
(2, 1, 100.00, 12),
(8, 5, 2500.00, 2),
(8, 3, 800.00, 2),
(10, 6, 7000.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_list`
--

CREATE TABLE `service_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `service_list`
--

INSERT INTO `service_list` (`id`, `name`, `price`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Tensado de Cuerdas', 350.00, 1, 0, '2022-05-06 10:09:22', '2022-09-30 21:57:06'),
(2, 'Instalación y tensado de cuerdas', 500.00, 1, 0, '2022-05-06 10:09:45', '2022-09-30 21:56:33'),
(3, 'Agarre de raqueta', 150.00, 1, 0, '2022-05-06 10:10:00', '2022-09-30 21:56:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_transaction`
--

CREATE TABLE `service_transaction` (
  `id` int(30) NOT NULL,
  `client_name` text NOT NULL,
  `contact` text NOT NULL,
  `total` float(12,2) NOT NULL DEFAULT 0.00,
  `court_rental_id` int(30) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Pending,\r\n1 = Done',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `service_transaction`
--

INSERT INTO `service_transaction` (`id`, `client_name`, `contact`, `total`, `court_rental_id`, `status`, `date_created`, `date_updated`) VALUES
(2, 'Mark Cooper', '09123456789', 700.00, 2, 1, '2022-05-06 14:00:29', '2022-05-06 15:47:26'),
(6, 'Mark Cooper', '09123456789', 1000.00, NULL, 1, '2022-05-06 15:36:43', '2022-05-06 15:46:56'),
(9, 'Gabriel J.', '5001', 150.00, 6, 0, '2024-05-09 20:09:36', '2024-05-09 20:09:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service_transaction_items`
--

CREATE TABLE `service_transaction_items` (
  `service_transaction_id` int(30) NOT NULL,
  `service_id` int(30) NOT NULL,
  `price` float(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `service_transaction_items`
--

INSERT INTO `service_transaction_items` (`service_transaction_id`, `service_id`, `price`, `quantity`) VALUES
(6, 1, 350.00, 1),
(6, 3, 150.00, 1),
(6, 2, 500.00, 1),
(2, 1, 350.00, 2),
(9, 3, 150.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Sistema de Alquiler de Mesas de Billar'),
(6, 'short_name', 'Deporte Full - Billares'),
(11, 'logo', 'uploads/logo.png?v=1664576314'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1664576322');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Claudia', 'Stella', 'Delgadillo', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/5.png?v=1664584789', NULL, 1, '2022-10-01 00:38:59', '2023-11-29 18:06:20'),
(2, 'Sara', 'Ines', 'Suarez', 'staff', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/avatars/2.png?v=1664642682', NULL, 2, '2022-10-01 16:44:42', '2022-11-13 17:51:02'),
(3, 'prueba', 'prueba', 'prueba', 'prueba', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/avatars/3.png?v=1664832811', NULL, 2, '2022-10-03 21:33:31', '2022-10-03 21:33:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `court_list`
--
ALTER TABLE `court_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `court_rentals`
--
ALTER TABLE `court_rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `court_id` (`court_id`);

--
-- Indices de la tabla `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales_transaction`
--
ALTER TABLE `sales_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `court_rental_id_fk_st` (`court_rental_id`);

--
-- Indices de la tabla `sales_transaction_items`
--
ALTER TABLE `sales_transaction_items`
  ADD KEY `service_transaction_id` (`sales_transaction_id`),
  ADD KEY `service_id` (`product_id`);

--
-- Indices de la tabla `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `service_transaction`
--
ALTER TABLE `service_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `court_rental_id` (`court_rental_id`);

--
-- Indices de la tabla `service_transaction_items`
--
ALTER TABLE `service_transaction_items`
  ADD KEY `service_transaction_id` (`service_transaction_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indices de la tabla `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `court_list`
--
ALTER TABLE `court_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `court_rentals`
--
ALTER TABLE `court_rentals`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sales_transaction`
--
ALTER TABLE `sales_transaction`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `service_list`
--
ALTER TABLE `service_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `service_transaction`
--
ALTER TABLE `service_transaction`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sales_transaction`
--
ALTER TABLE `sales_transaction`
  ADD CONSTRAINT `court_rental_id_fk_st` FOREIGN KEY (`court_rental_id`) REFERENCES `court_rentals` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sales_transaction_items`
--
ALTER TABLE `sales_transaction_items`
  ADD CONSTRAINT `product_id_fk_st` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `sales_transaction_id_fk_st` FOREIGN KEY (`sales_transaction_id`) REFERENCES `sales_transaction` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `service_transaction`
--
ALTER TABLE `service_transaction`
  ADD CONSTRAINT `court_rental_id_fk_st2` FOREIGN KEY (`court_rental_id`) REFERENCES `court_rentals` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `service_transaction_items`
--
ALTER TABLE `service_transaction_items`
  ADD CONSTRAINT `service_id_fk_st` FOREIGN KEY (`service_id`) REFERENCES `service_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `service_transaction_id_fk_st` FOREIGN KEY (`service_transaction_id`) REFERENCES `service_transaction` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

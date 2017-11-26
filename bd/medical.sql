-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2017 a las 17:52:50
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medical`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones_medicamentos`
--

CREATE TABLE `aplicaciones_medicamentos` (
  `id_aplicacion` int(11) NOT NULL,
  `id_dosis_aplicada` int(11) NOT NULL,
  `tiempo_aplicacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aplicaciones_medicamentos`
--

INSERT INTO `aplicaciones_medicamentos` (`id_aplicacion`, `id_dosis_aplicada`, `tiempo_aplicacion`) VALUES
(1, 1, '2017-11-26 03:00:00'),
(2, 1, '2017-11-26 12:51:29'),
(3, 2, '2017-11-26 02:00:00'),
(4, 3, '2017-11-26 13:36:53'),
(5, 4, '2017-11-26 13:45:08'),
(6, 2, '2017-11-26 13:45:57'),
(11, 1, '2017-11-26 14:47:52'),
(12, 1, '2017-11-26 14:47:59'),
(13, 1, '2017-11-26 14:49:35'),
(14, 1, '2017-11-26 14:49:55'),
(15, 1, '2017-11-26 14:51:17'),
(16, 1, '2017-11-26 14:52:41'),
(17, 4, '2017-11-26 14:56:55'),
(18, 1, '2017-11-26 14:57:45'),
(19, 1, '2017-11-26 14:58:00'),
(20, 1, '2017-11-26 15:00:18'),
(21, 3, '2017-11-26 15:00:38'),
(22, 3, '2017-11-26 15:01:19'),
(23, 1, '2017-11-26 15:01:26'),
(24, 2, '2017-11-26 15:02:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosis_medicamentos`
--

CREATE TABLE `dosis_medicamentos` (
  `id_dosis_medicamento` int(10) NOT NULL,
  `id_medicamento` int(10) DEFAULT NULL,
  `id_registro_evolucion` int(10) DEFAULT NULL,
  `cantidad_medicamento` varchar(100) DEFAULT NULL,
  `periodo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dosis_medicamentos`
--

INSERT INTO `dosis_medicamentos` (`id_dosis_medicamento`, `id_medicamento`, `id_registro_evolucion`, `cantidad_medicamento`, `periodo`) VALUES
(1, 1, 1, '1', '8'),
(2, 2, 1, '1', '8'),
(3, 3, 1, '1', '8'),
(4, 4, 1, '1', '8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermedades`
--

CREATE TABLE `enfermedades` (
  `id_enfermedad` int(10) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id_expediente` int(10) NOT NULL,
  `id_hospital` int(10) DEFAULT NULL,
  `id_paciente` int(10) DEFAULT NULL,
  `id` int(10) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id_expediente`, `id_hospital`, `id_paciente`, `id`, `fecha_creacion`) VALUES
(1, 1, 1, 2, '2017-11-26 02:56:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_evolucion`
--

CREATE TABLE `hoja_evolucion` (
  `id_hoja_evolucion` int(10) NOT NULL,
  `id_hospital` int(10) DEFAULT NULL,
  `id_expediente` int(10) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_cama` int(10) DEFAULT NULL,
  `sala` int(10) DEFAULT NULL,
  `activo` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hoja_evolucion`
--

INSERT INTO `hoja_evolucion` (`id_hoja_evolucion`, `id_hospital`, `id_expediente`, `fecha_creacion`, `num_cama`, `sala`, `activo`) VALUES
(1, 1, 1, '2017-11-26 02:57:41', 12, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_medicacion`
--

CREATE TABLE `hoja_medicacion` (
  `id_hoja_medicacion` int(10) NOT NULL,
  `id_hospital` int(10) DEFAULT NULL,
  `id_expediente` int(10) DEFAULT NULL,
  `id` int(10) DEFAULT NULL,
  `fech_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_cama` int(10) DEFAULT NULL,
  `sala` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas_registro_medicacion`
--

CREATE TABLE `horas_registro_medicacion` (
  `id_hora_registro_medicacion` int(10) NOT NULL,
  `id_registro_medicacion` int(10) DEFAULT NULL,
  `hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospital`
--

CREATE TABLE `hospital` (
  `id_hospital` int(10) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hospital`
--

INSERT INTO `hospital` (`id_hospital`, `nombre`, `direccion`) VALUES
(1, 'Hospital Militar Nuevo', 'Direccion xyz'),
(2, 'Hospital Vivian Pellas', 'Direccion abc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `id_kardex` int(10) NOT NULL,
  `id` int(10) DEFAULT NULL,
  `id_dosis_medicamento` int(10) DEFAULT NULL,
  `id_hospital` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamento`
--

CREATE TABLE `medicamento` (
  `id_medicamento` int(10) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `presentacion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medicamento`
--

INSERT INTO `medicamento` (`id_medicamento`, `nombre`, `presentacion`) VALUES
(1, ' Clorhidrato de loperamida', 'Pastilla'),
(2, 'Paracetamol', 'Pastilla'),
(3, 'Pastilla 1', '500 mg'),
(4, 'Pastilla 2', '1000 mg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(10) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `edad` int(10) DEFAULT NULL,
  `sexo` varchar(100) DEFAULT NULL,
  `cedula` varchar(100) DEFAULT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombres`, `apellidos`, `edad`, `sexo`, `cedula`, `fecha_ingreso`) VALUES
(1, 'alvaro', 'chavez', 22, 'M', '001-120795-0052E', '2017-11-26 01:19:44'),
(2, 'Gerald', 'Sandoval', 23, 'M', '005-211212-455E', '2017-11-26 01:19:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_evolucion`
--

CREATE TABLE `registro_evolucion` (
  `id_registro_evolucion` int(10) NOT NULL,
  `id_hoja_evolucion` int(10) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(10) DEFAULT NULL,
  `estancia_hospitalaria` int(10) DEFAULT NULL,
  `sintomas` varchar(100) DEFAULT NULL,
  `descripcion_fisica` varchar(100) DEFAULT NULL,
  `resumen` varchar(100) DEFAULT NULL,
  `plan_alimentacion` varchar(100) DEFAULT NULL,
  `reportar_evento` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_evolucion`
--

INSERT INTO `registro_evolucion` (`id_registro_evolucion`, `id_hoja_evolucion`, `fecha_hora`, `id`, `estancia_hospitalaria`, `sintomas`, `descripcion_fisica`, `resumen`, `plan_alimentacion`, `reportar_evento`) VALUES
(1, 1, '2017-11-26 02:59:42', 2, 3, 'Dolor de estómago, palidez.', 'El paciente se ve débil, tiene color pálido y se queja de malestar estomacal', 'El paciente puede presentar un cuadro de diarrea severa por lo tanto hay que ponerle pañal', 'Dieta estricta', 1),
(2, 1, '2017-11-26 06:24:29', 1, 2, 'Dolor de estomago, dolor intestinal.', 'Se siente debil, se ve de color palido.', 'El paciente presenta un cuadro de dolor de estomago e instestinal, por lo tanto puede ser diarrea.', 'Dieta estricta', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_medicacion`
--

CREATE TABLE `registro_medicacion` (
  `id_registro_medicacion` int(10) NOT NULL,
  `id_dosis_medicacion` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_enfermedad_registro`
--

CREATE TABLE `rel_enfermedad_registro` (
  `id_diagnotisto_enfermedad` int(10) NOT NULL,
  `id_registro_evolucion` int(10) DEFAULT NULL,
  `id_enfermedad` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_hospital_user`
--

CREATE TABLE `rel_hospital_user` (
  `id_rel_hospital_user` int(10) NOT NULL,
  `id_hospital` int(10) DEFAULT NULL,
  `id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `nombres`, `apellidos`, `cedula`, `fecha_registro`, `email`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adal', 'Adal', 'Garcia', '2411904960005s', '2017-11-01 00:00:00', 'adal@gmail.com', '$2y$10$PM/k9mwZe2Dc3gql6mZGr.jnbe5XgKayoofiPNACqM4Gd6p3uQVVC', 0, NULL, NULL, NULL),
(2, 'alvaro', 'Alvaro', 'Chavez', '2411904960005s', '2017-11-01 00:00:00', 'alvaro@gmail.com', '$2y$10$V0mxQ17pzIiWI4vD4RpeK.lrewaZ2GwszAcp3JsYQ6QI9nlaEDqNW', 3, 'mz06pGFIuTZJNMc9GHmKjE8Z8E0f2RjMyWf3mPQfNwpuHD8woDpMeCvRX1Vh', NULL, NULL),
(3, 'mason', 'Mason', 'Urbina', '2411904960005s', '2017-11-01 00:00:00', 'mason@gmail.com', '$2y$10$yaWoH/w2dz7PmcumOV/9Auxd7ie4VcjkHYDq5246GqwS2xPu7W8LW', 0, NULL, NULL, NULL),
(4, 'gerald', 'Gerald', 'Sandoval', '2411904960005s', '2017-11-01 00:00:00', 'gerald@gmail.com', '$2y$10$L4J8DQAZHoHOz5gdn41q6u46wa8fq63Y7Dm9Tf2rYDabCVzKEb9fa', 0, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aplicaciones_medicamentos`
--
ALTER TABLE `aplicaciones_medicamentos`
  ADD PRIMARY KEY (`id_aplicacion`),
  ADD KEY `id_dosis_aplicada` (`id_dosis_aplicada`);

--
-- Indices de la tabla `dosis_medicamentos`
--
ALTER TABLE `dosis_medicamentos`
  ADD PRIMARY KEY (`id_dosis_medicamento`),
  ADD KEY `id_medicamento` (`id_medicamento`),
  ADD KEY `id_registro_evolucion` (`id_registro_evolucion`);

--
-- Indices de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  ADD PRIMARY KEY (`id_enfermedad`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `id_hospital` (`id_hospital`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `hoja_evolucion`
--
ALTER TABLE `hoja_evolucion`
  ADD PRIMARY KEY (`id_hoja_evolucion`);

--
-- Indices de la tabla `hoja_medicacion`
--
ALTER TABLE `hoja_medicacion`
  ADD PRIMARY KEY (`id_hoja_medicacion`),
  ADD KEY `id_hospital` (`id_hospital`),
  ADD KEY `id_expediente` (`id_expediente`);

--
-- Indices de la tabla `horas_registro_medicacion`
--
ALTER TABLE `horas_registro_medicacion`
  ADD PRIMARY KEY (`id_hora_registro_medicacion`),
  ADD KEY `id_registro_medicacion` (`id_registro_medicacion`);

--
-- Indices de la tabla `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id_hospital`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`id_kardex`),
  ADD KEY `id_hospital` (`id_hospital`);

--
-- Indices de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  ADD PRIMARY KEY (`id_medicamento`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `registro_evolucion`
--
ALTER TABLE `registro_evolucion`
  ADD PRIMARY KEY (`id_registro_evolucion`),
  ADD KEY `id_hoja_evolucion` (`id_hoja_evolucion`);

--
-- Indices de la tabla `registro_medicacion`
--
ALTER TABLE `registro_medicacion`
  ADD PRIMARY KEY (`id_registro_medicacion`);

--
-- Indices de la tabla `rel_enfermedad_registro`
--
ALTER TABLE `rel_enfermedad_registro`
  ADD PRIMARY KEY (`id_diagnotisto_enfermedad`),
  ADD KEY `id_registro_evolucion` (`id_registro_evolucion`),
  ADD KEY `id_enfermedad` (`id_enfermedad`);

--
-- Indices de la tabla `rel_hospital_user`
--
ALTER TABLE `rel_hospital_user`
  ADD PRIMARY KEY (`id_rel_hospital_user`),
  ADD KEY `id_hospital` (`id_hospital`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aplicaciones_medicamentos`
--
ALTER TABLE `aplicaciones_medicamentos`
  MODIFY `id_aplicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `dosis_medicamentos`
--
ALTER TABLE `dosis_medicamentos`
  MODIFY `id_dosis_medicamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `enfermedades`
--
ALTER TABLE `enfermedades`
  MODIFY `id_enfermedad` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id_expediente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `hoja_evolucion`
--
ALTER TABLE `hoja_evolucion`
  MODIFY `id_hoja_evolucion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `hoja_medicacion`
--
ALTER TABLE `hoja_medicacion`
  MODIFY `id_hoja_medicacion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horas_registro_medicacion`
--
ALTER TABLE `horas_registro_medicacion`
  MODIFY `id_hora_registro_medicacion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id_hospital` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id_kardex` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `medicamento`
--
ALTER TABLE `medicamento`
  MODIFY `id_medicamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `registro_evolucion`
--
ALTER TABLE `registro_evolucion`
  MODIFY `id_registro_evolucion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `registro_medicacion`
--
ALTER TABLE `registro_medicacion`
  MODIFY `id_registro_medicacion` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rel_enfermedad_registro`
--
ALTER TABLE `rel_enfermedad_registro`
  MODIFY `id_diagnotisto_enfermedad` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rel_hospital_user`
--
ALTER TABLE `rel_hospital_user`
  MODIFY `id_rel_hospital_user` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aplicaciones_medicamentos`
--
ALTER TABLE `aplicaciones_medicamentos`
  ADD CONSTRAINT `aplicaciones_medicamentos_ibfk_1` FOREIGN KEY (`id_dosis_aplicada`) REFERENCES `dosis_medicamentos` (`id_dosis_medicamento`);

--
-- Filtros para la tabla `dosis_medicamentos`
--
ALTER TABLE `dosis_medicamentos`
  ADD CONSTRAINT `dosis_medicamentos_ibfk_1` FOREIGN KEY (`id_medicamento`) REFERENCES `medicamento` (`id_medicamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosis_medicamentos_ibfk_2` FOREIGN KEY (`id_registro_evolucion`) REFERENCES `registro_evolucion` (`id_registro_evolucion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expediente_ibfk_2` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hoja_medicacion`
--
ALTER TABLE `hoja_medicacion`
  ADD CONSTRAINT `hoja_medicacion_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hoja_medicacion_ibfk_2` FOREIGN KEY (`id_expediente`) REFERENCES `expediente` (`id_expediente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horas_registro_medicacion`
--
ALTER TABLE `horas_registro_medicacion`
  ADD CONSTRAINT `horas_registro_medicacion_ibfk_1` FOREIGN KEY (`id_registro_medicacion`) REFERENCES `registro_medicacion` (`id_registro_medicacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `kardex_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_evolucion`
--
ALTER TABLE `registro_evolucion`
  ADD CONSTRAINT `registro_evolucion_ibfk_1` FOREIGN KEY (`id_hoja_evolucion`) REFERENCES `hoja_evolucion` (`id_hoja_evolucion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_enfermedad_registro`
--
ALTER TABLE `rel_enfermedad_registro`
  ADD CONSTRAINT `rel_enfermedad_registro_ibfk_1` FOREIGN KEY (`id_registro_evolucion`) REFERENCES `registro_evolucion` (`id_registro_evolucion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel_enfermedad_registro_ibfk_2` FOREIGN KEY (`id_enfermedad`) REFERENCES `enfermedades` (`id_enfermedad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_hospital_user`
--
ALTER TABLE `rel_hospital_user`
  ADD CONSTRAINT `rel_hospital_user_ibfk_1` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

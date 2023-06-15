-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 12, 2023 at 08:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_Franco_Zini`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabecera_compra`
--

CREATE TABLE `cabecera_compra` (
  `id` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `metodo_pago` varchar(255) DEFAULT NULL,
  `numero_tarjeta` varchar(255) DEFAULT NULL,
  `cuotas` int(11) DEFAULT 1,
  `envio` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `fecha_alta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabecera_compra`
--

INSERT INTO `cabecera_compra` (`id`, `total`, `id_usuario`, `metodo_pago`, `numero_tarjeta`, `cuotas`, `envio`, `direccion`, `fecha_alta`) VALUES
(75, 140000.00, 17, 'efectivo', NULL, 1, NULL, NULL, '2023-06-12'),
(76, 50000.00, 17, 'tDebito', '4444555566668888', 1, NULL, NULL, '2023-06-12'),
(77, 130000.00, 18, 'efectivo', NULL, 1, NULL, NULL, '2023-06-12'),
(78, 505000.00, 17, 'mPago', NULL, 1, NULL, NULL, '2023-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `cabecera_detalle`
--

CREATE TABLE `cabecera_detalle` (
  `id_compra` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `importe_unitario` decimal(10,2) DEFAULT NULL,
  `importe_total` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabecera_detalle`
--

INSERT INTO `cabecera_detalle` (`id_compra`, `id_producto`, `nombre`, `cantidad`, `importe_unitario`, `importe_total`, `fecha`) VALUES
(75, 40, ' Alexa Echo Dot - Generación 4', 1, 75000.00, 75000.00, '2023-06-12'),
(75, 42, 'Alexa Echo Dot - Generación 3', 1, 65000.00, 65000.00, '2023-06-12'),
(76, 41, 'Amazon Tablet Echo Show 8 2nd Gen', 1, 50000.00, 50000.00, '2023-06-12'),
(77, 45, 'Google Nest Hub 2nd Gen con asistente virtual Goog', 2, 55000.00, 110000.00, '2023-06-12'),
(77, 44, 'Soporte Rus-t1 Para DOT Alexa Homepod', 1, 20000.00, 20000.00, '2023-06-12'),
(78, 45, 'Google Nest Hub 2nd Gen con asistente virtual Goog', 1, 55000.00, 55000.00, '2023-06-12'),
(78, 48, 'Aspiradora Robot Barredora Wifi App', 1, 150000.00, 150000.00, '2023-06-12'),
(78, 50, 'Hyiear Foco Inteligente Wifi Con Siri Alexa Google', 1, 25000.00, 25000.00, '2023-06-12'),
(78, 53, 'Termostato inteligente WiFi controlador de tempera', 1, 150000.00, 150000.00, '2023-06-12'),
(78, 52, 'Controlador de temperatura smart para agua/calefac', 1, 90000.00, 90000.00, '2023-06-12'),
(78, 51, 'Cámara De Seguridad Exterior Wifi Hd 1080p Con 38 ', 1, 35000.00, 35000.00, '2023-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `formulario`
--

CREATE TABLE `formulario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `mensaje` text NOT NULL,
  `usuario` enum('si','no') NOT NULL DEFAULT 'no',
  `leido` enum('si','no') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formulario`
--

INSERT INTO `formulario` (`id`, `nombre`, `email`, `telefono`, `mensaje`, `usuario`, `leido`) VALUES
(15, 'Juan Sin', 'francojzini@gmail.com', '37941233213', 'Buenas preciso conocer si cuentan con dispositivos de control de temperatura de manera remota. Saludos y Muchas gracias', 'si', 'no'),
(16, 'Pepe', 'test2@mail.com', '6666666', 'Quiero conocer si existe promociones de descuentos en algunos de los productos. Saludos y Muchas Gracias', 'no', 'no'),
(17, 'Juan', 'juancito@mail.com', '33333', 'Buenas quisiera saber si para todos los dispositivos se precisa de conexion a internet. Saludos', 'no', 'si');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `baja` enum('no','si') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `stock`, `baja`) VALUES
(40, ' Alexa Echo Dot - Generación 4', 'Pídele a Alexa que reproduzca música, conteste preguntas, ponga las noticias, revise el pronóstico del clima, configure alarmas o incluso que te cuente un chiste.\r\nUsa tu voz para encender luces, ajustar termostatos, y cerrar puertas con dispositivos compatibles.', 75000.00, '1686545006_84c39d99d296ff64dd39.png', 9, 'no'),
(41, 'Amazon Tablet Echo Show 8 2nd Gen', 'Control inteligente de tu hogar\r\nPrender y apagar luces, abrir puertas, controlar la calefacción o encender la TV, son algunas de las tantas tareas que podrás automatizar con este único producto. Solo deberás conectar la bocina a cualquier dispositivo compatible para disfrutar de una nueva forma de interactuar con los espacios.', 50000.00, '1686545457_1a62d503b2d31fc0f548.webp', 9, 'no'),
(42, 'Alexa Echo Dot - Generación 3', 'Control inteligente de tu hogar\r\nPrender y apagar luces, abrir puertas, controlar la calefacción o encender la TV, son algunas de las tantas tareas que podrás automatizar con este único producto. Solo deberás conectar la bocina a cualquier dispositivo compatible para disfrutar de una nueva forma de interactuar con los espacios.', 65000.00, '1686546060_a7383e197972eefb425e.jpg', 9, 'no'),
(43, 'Alexa Echo Dot - Generación 5', 'Nuestro asistente virtual de ultima generación te hará disfrutar de un sonido vibrante en cualquier lugar de tu casa, puedes mantenerte al día con Alexa y controlar dispositivos compatibles de Smart Home cuando detecten movimiento. Perfecto para tu buró de noche - Mira la hora, alarmas y timers en el display LED. Toca la parte superior del dispositivo para retrasar la alarma.', 100000.00, '1686547296_d4243c8c1cb5cf9375ad.webp', 5, 'no'),
(44, 'Soporte Rus-t1 Para DOT Alexa Homepod', 'Un soporte para todos. Un accesorio para cualquier estilo de vida, en la cocina, en tu recamara, en la oficina, no se daña con el sol y el agua así que utilizalo en exteriores también. \r\nProtegerá a tu dispositivo de caídas, derrames de agua, superficies que tiendan a calentarse o dañar tu dispositivo. Da personalidad a tu asistente, perderas la sensacion de hablar a una simple bocina', 5000.00, '1686547822_a8bbcf59c2263c8f63d1.jpg', 100, 'no'),
(45, 'Google Nest Hub 2nd Gen con asistente virtual Goog', 'Control inteligente de tu hogar\r\nPrender y apagar luces, abrir puertas, controlar la calefacción o encender la TV, son algunas de las tantas tareas que podrás automatizar con este único producto. Solo deberás conectar la bocina a cualquier dispositivo compatible para disfrutar de una nueva forma de interactuar con los espacios.', 55000.00, '1686548216_9c9af9aa19be2ef654a6.jpg', 7, 'no'),
(46, 'Parlante Inteligente Bose Home 500', 'Control inteligente de tu hogar\r\nPrender y apagar luces, abrir puertas, controlar la calefacción o encender la TV, son algunas de las tantas tareas que podrás automatizar con este único producto. Solo deberás conectar la bocina a cualquier dispositivo compatible para disfrutar de una nueva forma de interactuar con los espacios.', 40000.00, '1686549264_71d5ddc4a27afafaea83.jpg', 5, 'no'),
(47, 'Aspiradora Trapeadora Robot S8 Blanco', 'El 360 S8 Robot Aspirador y fregasuelos pueden aspirar, fregar o hacer ambas cosas al mismo tiempo. La batería de alta capacidad de 3200mAh alcanza hasta 140 minutos de tiempo de ejecución. Regresa automáticamente a la base de carga cuando la batería está por debajo del 20%, y luego continúa donde lo dejó. ', 250000.00, '1686550271_894baf35e022f410dffe.jpg', 5, 'no'),
(48, 'Aspiradora Robot Barredora Wifi App', 'Robot limpieza aspirador inalambrica inteligente MT-720A, Navegación con giroscopio, Control Remoto y Conexión 2.4Ghz WiFi App(Smart Life),Compatible con Control por voz de APP, 1800Pa, 120 minutos de duración, Filtro ultrafino y silencioso para suelos duros y Alfombra de pelo corto.', 150000.00, '1686550906_4139b37739fe46e24b5d.webp', 4, 'no'),
(49, 'Consola para control de iluminación Touch LightMan', 'Consola para control de iluminación Touch LightManager Advance, en acabado color grafito y perteneciente a la serie Simon Scena. Funciona por programación y por uso y admite un número máximo de canales de 512. Esta consola permite programar y controlar todos los elementos del sistema y es una versión compatible con la app Simon Scena.', 350000.00, '1686551270_473e05b681e00b55d60b.jpg', 8, 'no'),
(50, 'Hyiear Foco Inteligente Wifi Con Siri Alexa Google', 'Incluso no estás en casa, puedes controlar tu bombilla inteligente encendido/apagado con tu teléfono a través de la aplicación Smart Life. Configura fácilmente la agenda para tu bombilla inteligente. Personaliza tu sistema de luz del hogar, como ajustar las luces para encenderse al anochecer o apagarse al amanecer. Puedes sincronizar varios focos Smart', 25000.00, '1686551508_145477a1664c91d50142.webp', 49, 'no'),
(51, 'Cámara De Seguridad Exterior Wifi Hd 1080p Con 38 ', 'Cámara WiFi doméstica con resolución 1920 * 1080P. Visión nocturna mejorada de luces LED IR de 18 piezas y 20 iluminación led de color blanco, visión nocturna de hasta 33 pies en un entorno oscuro,Ya sea de día o de noche, puedes encender o apagar 20 luces led para iluminación manualmente en la aplicación.', 35000.00, '1686551685_f70cc6b6660d2e6504cb.webp', 19, 'no'),
(52, 'Controlador de temperatura smart para agua/calefac', 'Dispositivo revolucionario diseñado para controlar de manera inteligente la temperatura de su sistema de calefacción por suelo radiante, ya sea que funcione con agua o electricidad. Este controlador termostático utiliza tecnología WiFi para brindarle un control completo y conveniente sobre la temperatura de su suelo radiante desde cualquier lugar y en cualquier momento.', 90000.00, '1686551950_dec11918889b9187b7db.png', 9, 'no'),
(53, 'Termostato inteligente WiFi controlador de tempera', 'El Smart Thermostat Temperature Controller for Water/Electric floor WiFi Heating es una solución inteligente y conveniente que le brinda un control total sobre la temperatura de su suelo radiante, brindando confort, eficiencia y ahorro energético a su hogar u oficina.', 150000.00, '1686552080_755452f0cd1cd2760894.jpg', 4, 'no'),
(54, 'Controlador Unificado BOSH', 'El controlador Bosch Smart Home II es la central inteligente que te permite gestionar y monitorear de manera eficiente tus dispositivos para el hogar inteligente. Actúa como la interfaz entre tus dispositivos Bosch Smart Home, los dispositivos de socios y la aplicación Bosch Smart Home, con la cual puedes controlar tu hogar inteligente.', 250000.00, '1686552525_e61e4c273798104e6293.jpg', 5, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `direccion`, `email`, `telefono`, `usuario`, `pass`, `perfil_id`, `baja`) VALUES
(16, 'Juan Sin ', 'Nombre', 'NO REGISTRADO', 'mail@mail.com', 'NO REGISTRADO', 'admin', '$2y$10$uQS0Jb1.t.fq1F31P9X56eboAwLP7fyW7FBuisj/PbGapvsY.Quju', 1, 'no'),
(17, 'Juan Sin', 'Nombre 2', 'calle sims 1', 'francojzini@gmail.com', '3794142544', 'usuario', '$2y$10$.qUMvr85sxThmv9z7h77bOdU2y1BuZjASEXiMBOM6DUeKy0XzCZDS', 2, 'no'),
(18, 'fasfasdsa', 'htghtgrd', '1', 'aa@aa.com', '1234124123', 'asd', '$2y$10$ExpsdBEOk75fwYY5nZNxEOz1oBy98OVzhZnIVKiOp4Od8QUVe3Uui', 2, 'si');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabecera_compra`
--
ALTER TABLE `cabecera_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cabecera_compra_usuario` (`id_usuario`);

--
-- Indexes for table `cabecera_detalle`
--
ALTER TABLE `cabecera_detalle`
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabecera_compra`
--
ALTER TABLE `cabecera_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cabecera_compra`
--
ALTER TABLE `cabecera_compra`
  ADD CONSTRAINT `fk_cabecera_compra_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `cabecera_detalle`
--
ALTER TABLE `cabecera_detalle`
  ADD CONSTRAINT `cabecera_detalle_ibfk_1` FOREIGN KEY (`id_compra`) REFERENCES `cabecera_compra` (`id`),
  ADD CONSTRAINT `cabecera_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

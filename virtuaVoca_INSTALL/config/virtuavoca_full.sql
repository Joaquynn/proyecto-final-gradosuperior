-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-05-2022 a las 15:19:22
-- Versión del servidor: 8.0.28
-- Versión de PHP: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `virtuavoca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `author` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `post_id` int NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`author`, `text`, `post_id`, `creationDate`) VALUES
('Javi12', 'Gracias, muchas gracias', 22, '2022-05-13 16:52:13'),
('CangQiong', 'ES PRECIOSA LA CANCIÓN, YA QUIERO OIR MÁS DE TI', 30, '2022-05-29 14:58:34'),
('Evelynn', 'Felicitaciones, el instrumental es muy calmado, me ha enamorado', 30, '2022-05-29 14:58:34'),
('Javi12', '?VIVIR ASÍ ES MORIR DE AMOOOOORRR?\r\n\r\nMe encantaba esta canción, siempre la ponía en el coche y la cantaba a pleno pulmón', 29, '2022-05-29 15:01:32'),
('MarshalLee', 'Se le entiende muy bien el español a Maki, enséñame por favor', 29, '2022-05-29 15:01:32'),
('Yoim1ya_', 'Karin suena muy dulce, y Solaria suena muy gitana jajajajajajaja que guay', 28, '2022-05-29 15:01:32'),
('CangQiong', 'Cuando al final cada una dice una cosa distinta, osea dicen disco duro, pantalla y ratón cada una me ha enamorado ✨✨\r\n\r\nSigue así', 28, '2022-05-29 15:01:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `author` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`title`, `text`, `media`, `author`, `date`, `type`) VALUES
('¡Hola!', '## Bienvenidos a VirtuaVoca\r\n\r\nAquí podrás:\r\n1. Discutir sobre tus canciones sintetizadas favoritas\r\n2. ¡Hacerlas!\r\n\r\nNo dejes de visitar el apartado [OpenUTAU](openUTAU.php)', NULL, 'Evelynn', '2022-05-12 16:07:33', 2),
('Bienvenidos a la comunidad', 'Estamos **muy** contentos de que hayas escogido VirtuaVoca para publicar y darte a conocer al mundo de los sintetizadores, aquí una lista de cosas que deberías mirar :D\n\n1. Los covers de la comunidad en la sección de [covers](covers.php)\n2. La increíble creatividad de todos a la hora de crear [canciones originales](originales.php)\n3. Las voces disponibles para descarga gratuíta y uso comercial en [OpenUTAU](openutau.php)\n\n### ¡Gracias y que te lo pases genial!', NULL, 'Evelynn', '2022-05-29 12:46:06', 2),
('Eres un enfermo - Solaria, Karin y Maki', 'Hice un cover de esta canción porque me encanta, es muy vieja y pegadiza jajajaja\n\nLas voces son en japonés pero con un poco de toqueteo, suenan muy bien en español\n\n---\n#### Letra:\nUn fin de semana en el Corte Inglés\nTu me convenciste para comprarte el Internet\nMaldito momento, fue mi perdición\nPues desde ese dia ya no hacemos el amor.\n\nTú ya no me miras, ya no te importo\nY si me insinuo tu me dices que pa qué\nCon esos cuerpos y lo que gastan\nTe salen mas baratas las mujeres del pc.\n\nY tu que prefieres quedarte todo el dia pegado a la pantalla\n\nEres un enfermo, eres un enfermo\nEres un enfermo del cibersexo\nMe pones los cuernos, me pones los cuernos\nUve doble uve doble tias buenas punto com.\n\nMira vida, esto es un infierno\nMira vida mía, quiero la separación\nEres un enfermo, eres un enfermo\nEres un enfermo del cibersexo\nMe pones los cuernos, me pones los cuernos\nCon el disco duro, la pantalla y el raton.\n\nMira vida esto es un infierno\nMira vida mía quiero la separación\n\nUna noche de estas que no pude dormir\nEscuche unos ruidos muy extranos para mí\nEra mi marido haciendo el amor\nA una Pamela dentro del ordenador.\n\nTu ya no me quieres, yo ya no te hago falta\nQue el amor internauta es un venenno sin igual\nY si me pongo sexy me dices a la cara\nQue la tarifa plana me compensa mucho más.\n\nPero un día de estos que me pilles de malas\nTe tragas la pantalla\n\nEres un enfermo, eres un enfermo\nEres un enfermo del cibersexo\nMe pones los cuernos, me pones los cuernos\nUve doble uve doble tias buenas punto com.\n\nMira vida esto es un infierno\nMira vida mía quiero la separación\n\nEres un enfermo, eres un enfermo\nEres un enfermo del cibersexo\nMe pones los cuernos, me pones los cuernos\nCon el disco duro, la pantalla y el raton\n\nMira vida esto es un infierno\nMira vida mía quiero la separación.', '(Miku39)-eres un enfermo.mp3', 'Miku39', '2022-05-29 12:50:30', 0),
('Vivir así es morir de amor - Tsurumaki Maki AI ENG', 'Me encanta esta canción, la cantaba mi padre cuando seguía vivo 😔\n\nY como ha salido una versión nueva, pues quise hacerla con Maki porque me encanta su voz\n\nEspero que os guste', '(Kebin)-vivir asi es morir de amor.mp3', 'Kebin', '2022-05-29 12:52:52', 0),
('Caminar', 'Hice una canción con Yamine Renri, corté con mi última pareja y necesitaba plasmarlo en una canción, gracias por escuchar\n\n#### Letra\n¿Dónde quedaste tú?\n\nNo sé como llegar a ti\n\nTal vez pueda buscar un medio para finalmente yo volver\n\nLo sé, es irreal\n\nPensar en tu andar\n\nSi bien, tu ya no vas a mirarme vas, por ti voy a caminar\n\nHuyendo\n\nOyendo\n\nEl agua sobre el suelo\n\nEn medio de la lluvia\n\nNo, no, yo no sé por qué, como nuestro ayer, no va a suceder\n\nPero al caminar nuestro pulso vive en soledad\n\nBusco las palabras,\n\nCalmar la tempestad\n\nReconstruyendo tu amor, que se apagó sin ritardando dejar\n\nUn tierno tiempo de más\n\nYa no tendré notas de ti\n\nLa coda ya comenzó, pero el viento solo habla por mi\n\nDisuenen acordes en un contratiempo marcando nuestro adios\n\nNo, no, yo no sé por qué, como nuestro ayer, no va a suceder\n\nPero al caminar nuestro pulso vive en soledad ', '(MegurineLuka)-caminar.mp3', 'MegurineLuka', '2022-05-29 12:55:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '0',
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`username`, `password`, `creationDate`, `status`, `role`) VALUES
('CangQiong', '$2y$10$P2CL09TG4qIiAggenfo.E.PuNpRIPRIbDdmgkYPQqSSksdS0wVhUq', '2022-05-29 12:34:02', 1, 0),
('Evelynn', '$2y$10$QhlNQg0tEGeQEcKyM8xMMOBTD1d6Rl.OMK8Nfii1HJ7lFAhZ62nwi', '2022-05-09 11:46:38', 1, 1),
('Javi12', '$2y$10$j3Z.kuXLtEtt2GK67YOi6utdD4IRcBkrxW1fie41JGub5j0G8l0AS', '2022-05-13 14:46:50', 1, 0),
('Kebin', '$2y$10$6vwwVDYEWSoIptyue70lze/R.R/SeQyexhMqolSagZcMS.EBZYInG', '2022-05-11 12:52:02', 1, 0),
('MarshalLee', '$2y$10$1yEttnjbjXPROsD3pNATVOkzl7jHpWWzaZmSXrgaWLXH6OxvQZhTa', '2022-05-29 12:34:16', 1, 0),
('MegurineLuka', '$2y$10$TSGkIgNa1pwGxSMB2HRhNO57L3HD/qFFqEwIzMXJIzRbq/JWWKoYO', '2022-05-29 12:33:38', 1, 0),
('Miku39', '$2y$10$dN7Vl2T7pT5WqHSsPY2CIO9KVL3Oi74704mLbOITnROpeewLVXVe2', '2022-05-29 12:33:15', 1, 0),
('Yoim1ya_', '$2y$10$dTTBkgFFGRarvErkPVb7yeH2Lsj.bb4pM5lhEKbuGj24Q4hxxYI8O', '2022-05-29 12:35:26', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `voicebanks`
--

CREATE TABLE `voicebanks` (
  `id` int NOT NULL,
  `codename` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `lang` varchar(10) NOT NULL,
  `widget` varchar(200) NOT NULL,
  `link` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `voicebanks`
--

INSERT INTO `voicebanks` (`id`, `codename`, `name`, `description`, `lang`, `widget`, `link`, `date`) VALUES
(1, 'solaria', 'Solaria', 'SOLARIA is an English vocal developed and distributed by Eclipsed Sounds, LLC, and released as an AI voice database for Synthesizer V Studio in January 2022.', 'english', 'PLACEHOLDER_WIDGET', 'PLACEHOLDER_LINK', '2022-05-29 01:59:55'),
(2, 'tsurumakimakiaieng', 'Tsurumaki Maki AI ENG', 'Tsurumaki Maki (弦巻マキ) is a Japanese and English vocal developed and distributed by AH-Software Co. Ltd., and was released as Standard and AI voice databases for Synthesizer V Studio in June 2021. She is also capable of speaking in both languages through CeVIO AI, but originally debuted as a Japanese-only VOICEROID+ speech voicebank in November 2010, and later received an update for VOICEROID+ EX in October 2014.', 'english', 'PLACEHOLDER_WIDGET', 'PLACEHOLDER_LINK', '2022-05-29 02:01:06'),
(3, 'kevin', 'Kevin', 'Kevin is an English vocal developed and distributed by Dreamtonics Co., Ltd., and released as an AI voice database for Synthesizer V Studio in February 2022.\r\n\r\nHis voice provider has not been officially revealed, but Kevin was confirmed to have an American accent. ', 'english', 'PLACEHOLDER_WIDGET', 'PLACEHOLDER_LINK', '2022-05-29 03:27:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`,`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `voicebanks`
--
ALTER TABLE `voicebanks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `voicebanks`
--
ALTER TABLE `voicebanks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

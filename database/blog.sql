-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-01-2022 a las 20:18:37
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'HTML'),
(5, 'JavaScript'),
(6, 'PHP'),
(9, 'Python'),
(10, 'Node Js');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_name` varchar(255) DEFAULT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_content` text DEFAULT NULL,
  `comment_post` int(11) NOT NULL,
  `comment_created_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_brief` varchar(511) DEFAULT NULL,
  `post_body` text DEFAULT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_created_at` varchar(50) DEFAULT NULL,
  `post_status` int(11) DEFAULT 1,
  `post_user` int(11) NOT NULL,
  `post_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_brief`, `post_body`, `post_image`, `post_created_at`, `post_status`, `post_user`, `post_category`) VALUES
(5, 'Post about PHP', 'Post about PHP and its mysteries', '<h1 style=\"text-align:center\"><span style=\"font-size:24px\"><u><strong><span style=\"font-family:Arial,Helvetica,sans-serif\">&iquest;Qu&eacute; es PHP?</span></strong></u></span></h1>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">PHP (acr&oacute;nimo recursivo de PHP: <strong>Hypertext Preprocessor</strong>) es un lenguaje de c&oacute;digo abierto muy popular especialmente adecuado para el desarrollo web y que puede ser incrustado en HTML.</span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Bien, pero &iquest;qu&eacute; significa realmente? Un ejemplo nos aclarar&aacute; las cosas:</span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\"><strong>Ejemplo #1 Un ejemplo introductorio</strong></span></span></p>\r\n\r\n<p><img src=\"data:image/png;base64,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\" style=\"height:150px; width:244px\" /></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">En lugar de usar muchos comandos para mostrar HTML (como en C o en Perl), las p&aacute;ginas de PHP contienen HTML con c&oacute;digo incrustado que hace &quot;algo&quot; (en este caso, mostrar &quot;&iexcl;Hola, soy un script de PHP!). El c&oacute;digo de PHP est&aacute; encerrado entre las etiquetas especiales de comienzo y final <!--?php y ?--> que permiten entrar y salir del &quot;modo PHP&quot;.</span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Lo que distingue a PHP de algo del lado del cliente como Javascript es que el c&oacute;digo es ejecutado en el servidor, generando HTML y envi&aacute;ndolo al cliente. El cliente recibir&aacute; el resultado de ejecutar el script, aunque no se sabr&aacute; el c&oacute;digo subyacente que era. El servidor web puede ser configurado incluso para que procese todos los ficheros HTML con PHP, por lo que no hay manera de que los usuarios puedan saber qu&eacute; se tiene debajo de la manga.</span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Lo mejor de utilizar PHP es su extrema simplicidad para el principiante, pero a su vez ofrece muchas caracter&iacute;sticas avanzadas para los programadores profesionales. No sienta miedo de leer la larga lista de caracter&iacute;sticas de PHP. En unas pocas horas podr&aacute; empezar a escribir sus primeros scripts.</span></span></p>\r\n\r\n<p><span style=\"font-size:12px\"><span style=\"font-family:Arial,Helvetica,sans-serif\">Aunque el desarrollo de PHP est&aacute; centrado en la programaci&oacute;n de scripts del lado del servidor, se puede utilizar para muchas otras cosas. Siga leyendo y descubra m&aacute;s en la secci&oacute;n &iquest;Qu&eacute; puede hacer PHP?, o vaya directo al tutorial introductorio si solamente est&aacute; interesado en programaci&oacute;n web.</span></span></p>\r\n', 'php.png', 'January 02,2022\n', 1, 13, 6),
(6, 'post about python', 'post about python  ', '<p>post about python</p>\r\n', 'python.png', 'January 02,2022', 1, 13, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(60) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_status` int(11) DEFAULT 1,
  `user_created_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_image`, `user_status`, `user_created_at`) VALUES
(13, 'Administrador', 'admin@admin.com', 'admin', 'ico-user.png', 1, '2022-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indices de la tabla `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `comment_post` (`comment_post`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_user` (`post_user`),
  ADD KEY `post_category` (`post_category`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`comment_post`) REFERENCES `post` (`post_id`);

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`post_user`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`post_category`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

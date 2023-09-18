-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-09-2023 a las 18:01:12
-- Versión del servidor: 10.5.19-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u895534236_inscripciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_admin`
--

CREATE TABLE `app_admin` (
  `idAdmin` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `change_password` smallint(1) NOT NULL DEFAULT 0,
  `attempts` int(1) NOT NULL DEFAULT 0,
  `status_admin` smallint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_articles`
--

CREATE TABLE `app_articles` (
  `idArticles` int(11) NOT NULL,
  `name_article` text NOT NULL,
  `Section_idSections` int(11) DEFAULT NULL,
  `Chapter_idChapters` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_chapter`
--

CREATE TABLE `app_chapter` (
  `idChapters` int(11) NOT NULL,
  `name_Chapter` text NOT NULL,
  `Title_idTitles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_favorites_titles`
--

CREATE TABLE `app_favorites_titles` (
  `Title_idTitle` int(11) NOT NULL,
  `User_idUsers` int(11) NOT NULL,
  `favorites_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_paragraph`
--

CREATE TABLE `app_paragraph` (
  `idParagraph` int(11) NOT NULL,
  `paragraph` text NOT NULL,
  `position` int(11) NOT NULL,
  `articles_idArticles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_paragraph_user_comments`
--

CREATE TABLE `app_paragraph_user_comments` (
  `Paragraph_idParagraph` int(11) NOT NULL,
  `User_idUsers` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_paragraph_user_viewed`
--

CREATE TABLE `app_paragraph_user_viewed` (
  `Paragraph_idParagraph` int(11) NOT NULL,
  `User_idUsers` int(11) NOT NULL,
  `viewed_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_sections`
--

CREATE TABLE `app_sections` (
  `idSections` int(11) NOT NULL,
  `name_section` text NOT NULL,
  `Chapter_idChapters` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_subscription`
--

CREATE TABLE `app_subscription` (
  `idSubscription` int(11) NOT NULL,
  `User_idUsers` int(11) NOT NULL,
  `subscription_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_subscription` int(2) NOT NULL,
  `status_subscription` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_titles`
--

CREATE TABLE `app_titles` (
  `idTitles` int(11) NOT NULL,
  `name_title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_title` int(1) NOT NULL DEFAULT 0,
  `type_title` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Admin_idAdmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPRESSED;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_user`
--

CREATE TABLE `app_user` (
  `idUsers` int(11) NOT NULL,
  `name` varchar(65) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `birthday` date NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `phone` varchar(16) NOT NULL,
  `status_user` tinyint(1) NOT NULL DEFAULT 1,
  `attempts` tinyint(1) NOT NULL DEFAULT 0,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `app_admin`
--
ALTER TABLE `app_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `app_articles`
--
ALTER TABLE `app_articles`
  ADD PRIMARY KEY (`idArticles`),
  ADD KEY `Section_idSections` (`Section_idSections`),
  ADD KEY `Chapter_idChapters` (`Chapter_idChapters`);

--
-- Indices de la tabla `app_chapter`
--
ALTER TABLE `app_chapter`
  ADD PRIMARY KEY (`idChapters`),
  ADD KEY `Title_idTitles` (`Title_idTitles`);

--
-- Indices de la tabla `app_favorites_titles`
--
ALTER TABLE `app_favorites_titles`
  ADD KEY `Title_idTitle` (`Title_idTitle`),
  ADD KEY `User_idUsers` (`User_idUsers`);

--
-- Indices de la tabla `app_paragraph`
--
ALTER TABLE `app_paragraph`
  ADD PRIMARY KEY (`idParagraph`),
  ADD KEY `articles_idArticles` (`articles_idArticles`);

--
-- Indices de la tabla `app_paragraph_user_comments`
--
ALTER TABLE `app_paragraph_user_comments`
  ADD UNIQUE KEY `Users_idUsers` (`User_idUsers`),
  ADD KEY `Paragraph_idParagraph` (`Paragraph_idParagraph`);

--
-- Indices de la tabla `app_paragraph_user_viewed`
--
ALTER TABLE `app_paragraph_user_viewed`
  ADD KEY `Paragraph_idParagraph` (`Paragraph_idParagraph`),
  ADD KEY `User_idUsers` (`User_idUsers`);

--
-- Indices de la tabla `app_sections`
--
ALTER TABLE `app_sections`
  ADD PRIMARY KEY (`idSections`),
  ADD KEY `Chapter_idChapters` (`Chapter_idChapters`);

--
-- Indices de la tabla `app_subscription`
--
ALTER TABLE `app_subscription`
  ADD PRIMARY KEY (`idSubscription`),
  ADD KEY `User_idUsers` (`User_idUsers`);

--
-- Indices de la tabla `app_titles`
--
ALTER TABLE `app_titles`
  ADD PRIMARY KEY (`idTitles`),
  ADD KEY `Admin_idAdmin` (`Admin_idAdmin`);

--
-- Indices de la tabla `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`idUsers`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `app_admin`
--
ALTER TABLE `app_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `app_articles`
--
ALTER TABLE `app_articles`
  MODIFY `idArticles` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `app_chapter`
--
ALTER TABLE `app_chapter`
  MODIFY `idChapters` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `app_paragraph`
--
ALTER TABLE `app_paragraph`
  MODIFY `idParagraph` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `app_sections`
--
ALTER TABLE `app_sections`
  MODIFY `idSections` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `app_subscription`
--
ALTER TABLE `app_subscription`
  MODIFY `idSubscription` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `app_titles`
--
ALTER TABLE `app_titles`
  MODIFY `idTitles` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `app_user`
--
ALTER TABLE `app_user`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `app_articles`
--
ALTER TABLE `app_articles`
  ADD CONSTRAINT `Articles_idChapters` FOREIGN KEY (`Chapter_idChapters`) REFERENCES `app_chapter` (`idChapters`),
  ADD CONSTRAINT `Section_idSections` FOREIGN KEY (`Section_idSections`) REFERENCES `app_sections` (`idSections`);

--
-- Filtros para la tabla `app_chapter`
--
ALTER TABLE `app_chapter`
  ADD CONSTRAINT `Title_idTitles` FOREIGN KEY (`Title_idTitles`) REFERENCES `app_titles` (`idTitles`);

--
-- Filtros para la tabla `app_favorites_titles`
--
ALTER TABLE `app_favorites_titles`
  ADD CONSTRAINT `Favorites_idTitles` FOREIGN KEY (`Title_idTitle`) REFERENCES `app_titles` (`idTitles`),
  ADD CONSTRAINT `Favorites_idUsers` FOREIGN KEY (`User_idUsers`) REFERENCES `app_user` (`idUsers`);

--
-- Filtros para la tabla `app_paragraph`
--
ALTER TABLE `app_paragraph`
  ADD CONSTRAINT `articles_idArticles` FOREIGN KEY (`articles_idArticles`) REFERENCES `app_articles` (`idArticles`);

--
-- Filtros para la tabla `app_paragraph_user_comments`
--
ALTER TABLE `app_paragraph_user_comments`
  ADD CONSTRAINT `Paragraph_idParagraph` FOREIGN KEY (`Paragraph_idParagraph`) REFERENCES `app_paragraph` (`idParagraph`),
  ADD CONSTRAINT `User_idUsers` FOREIGN KEY (`User_idUsers`) REFERENCES `app_user` (`idUsers`);

--
-- Filtros para la tabla `app_paragraph_user_viewed`
--
ALTER TABLE `app_paragraph_user_viewed`
  ADD CONSTRAINT `Paragraph_idParagraph_viewed` FOREIGN KEY (`Paragraph_idParagraph`) REFERENCES `app_paragraph` (`idParagraph`),
  ADD CONSTRAINT `User_idUsers_viewed` FOREIGN KEY (`User_idUsers`) REFERENCES `app_user` (`idUsers`);

--
-- Filtros para la tabla `app_sections`
--
ALTER TABLE `app_sections`
  ADD CONSTRAINT `Chapter_idChapters` FOREIGN KEY (`Chapter_idChapters`) REFERENCES `app_chapter` (`idChapters`);

--
-- Filtros para la tabla `app_subscription`
--
ALTER TABLE `app_subscription`
  ADD CONSTRAINT `Subscription_idUsers` FOREIGN KEY (`User_idUsers`) REFERENCES `app_user` (`idUsers`);

--
-- Filtros para la tabla `app_titles`
--
ALTER TABLE `app_titles`
  ADD CONSTRAINT `Admin_idAdmin` FOREIGN KEY (`Admin_idAdmin`) REFERENCES `app_admin` (`idAdmin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

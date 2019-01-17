-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 15/06/2018 às 00:41
-- Versão do servidor: 10.2.15-MariaDB
-- Versão do PHP: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u963241935_temp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `Temperatura`
--

CREATE TABLE `Temperatura` (
  `wea_id` int(11) NOT NULL,
  `wea_date` datetime NOT NULL,
  `wea_temp` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Temperaturas registrada a cada 30 segundos';

--
-- Fazendo dump de dados para tabela `Temperatura`
--

INSERT INTO `Temperatura` (`wea_id`, `wea_date`, `wea_temp`) VALUES
(1, '2018-06-14 21:27:41', '28.35'),
(2, '2018-06-14 21:27:52', '28.35'),
(3, '2018-06-14 21:28:02', '27.86'),
(4, '2018-06-14 21:28:13', '28.35');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `Temperatura`
--
ALTER TABLE `Temperatura`
  ADD KEY `wea_id` (`wea_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `Temperatura`
--
ALTER TABLE `Temperatura`
  MODIFY `wea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

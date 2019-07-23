-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 01/02/2019 às 11:23
-- Versão do servidor: 5.6.41
-- Versão do PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `buscasys_logotipos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `LOGOTIPOS`
--

CREATE TABLE `LOGOTIPOS` (
  `NRO_PROCESSO` varchar(9) NOT NULL,
  `IMAGEM` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `LOGOTIPOS_PA`
--

CREATE TABLE `LOGOTIPOS_PA` (
  `NRO_PROCESSO` varchar(25) NOT NULL,
  `IMAGEM` longblob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `LOGOTIPOS`
--
ALTER TABLE `LOGOTIPOS`
  ADD PRIMARY KEY (`NRO_PROCESSO`);

--
-- Índices de tabela `LOGOTIPOS_PA`
--
ALTER TABLE `LOGOTIPOS_PA`
  ADD PRIMARY KEY (`NRO_PROCESSO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

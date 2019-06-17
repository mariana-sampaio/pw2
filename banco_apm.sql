-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 17-Jun-2019 às 23:04
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `banco_apm`
--
CREATE DATABASE IF NOT EXISTS `banco_apm` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `banco_apm`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_aluno`
--

CREATE TABLE IF NOT EXISTS `tabela_aluno` (
  `matricula` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `telefone` varchar(15) COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tabela_aluno`
--

INSERT INTO `tabela_aluno` (`matricula`, `nome`, `email`, `telefone`, `data`, `valor`) VALUES
(4520, 'Ricardo Estoir Alves', 'riri_alves@gmail.com', '19977224562', '2019-04-08', '50.00'),
(41250, 'Maria JosÃ© da Silva', 'marimaria@gmail.com', '19984521422', '2019-04-08', '42.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_professor`
--

CREATE TABLE IF NOT EXISTS `tabela_professor` (
  `matricula` int(5) NOT NULL DEFAULT '0',
  `nome` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `telefone` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `celular` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `data` date DEFAULT NULL,
  `valor` decimal(5,2) DEFAULT NULL,
  `foto` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tabela_professor`
--

INSERT INTO `tabela_professor` (`matricula`, `nome`, `email`, `telefone`, `celular`, `data`, `valor`, `foto`) VALUES
(543543534, 'Adriano MÃ¡ximo', 'wqeqwe', 'qweqwe', 'wqewq', '2019-04-30', '25.00', '11d79dccbf287263848215c34e968b1a.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_usuarios`
--

CREATE TABLE IF NOT EXISTS `tabela_usuarios` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `senha` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `tipo` char(1) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tabela_usuarios`
--

INSERT INTO `tabela_usuarios` (`id`, `login`, `senha`, `nome`, `tipo`) VALUES
(1, 'adriano', '202cb962ac59075b964b07152d234b70', 'Adriano MÃ¡ximo', 'm');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

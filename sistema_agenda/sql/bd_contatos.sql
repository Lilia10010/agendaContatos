-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Ago-2017 às 03:10
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bd_contatos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginagenda`
--

CREATE TABLE IF NOT EXISTS `loginagenda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `loginagenda`
--

INSERT INTO `loginagenda` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'lolo', 'lolo@lolo', 'lolo'),
(2, 'li', 'li@li', 'lili'),
(3, 'Lilia', 'lilia@paula.com', '3148e174df1e6261571e8d53a319d1a8'),
(4, 'Lp', 'lp@lp', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contatos`
--

CREATE TABLE IF NOT EXISTS `tb_contatos` (
  `email` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nascimento` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `imagem` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`email`),
  FULLTEXT KEY `buscador` (`email`,`nome`,`telefone`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_contatos`
--

INSERT INTO `tb_contatos` (`email`, `id`, `nome`, `nascimento`, `telefone`, `imagem`) VALUES
('llllllll@22222222', 1, 'Cleidiane', '01/02/2017', '45345453', 'llllllll@22222222.jpg'),
('tt@tt', 2, 'ttttt', '01/03/2017', '45345453', ''),
('fdsfh@fwerf', 1, 'fsdfsd', '01/03/2017', '45345453', ''),
('silva_clei@hotmail.xn--comll-1ra', 1, 'Cleidiane Silva Nascimento', '03/01/2017', '546546546545646', ''),
('lilia_paula_92@hotmail.com', 4, '', '', '45345453', ''),
('l@e', 4, 'lili', '01/03/2017', '45345453', ''),
('lilia.-.@saalp', 3, 'dfef', '01/03/2017', '45345453', 'lilia.-.@saalp.jpg'),
('lp@swp', 1, 'Lopo', '01/03/2017', '45345453', 'lp@swp.png'),
('silva_clei@hotmail.comf', 3, 'Cleidiane', '', '12312156516', 'silva_clei@hotmail.comf.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

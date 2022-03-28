-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 28-Mar-2022 às 18:34
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `concessionaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cel` varchar(20) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

DROP TABLE IF EXISTS `funcionarios`;
CREATE TABLE IF NOT EXISTS `funcionarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(15) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cargo` varchar(25) DEFAULT NULL,
  `senha` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idUsuario`, `nomeUsuario`, `nome`, `cargo`, `senha`) VALUES
(1, 'pedro', 'Pedro henrique', 'vendedor', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE IF NOT EXISTS `veiculos` (
  `codVeiculo` varchar(5) NOT NULL,
  `marca` varchar(25) DEFAULT NULL,
  `modelo` varchar(14) DEFAULT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `qtdEstoque` int(11) DEFAULT NULL,
  `preco` double DEFAULT NULL,
  PRIMARY KEY (`codVeiculo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

DROP TABLE IF EXISTS `venda`;
CREATE TABLE IF NOT EXISTS `venda` (
  `nomeFunc` varchar(50) DEFAULT NULL,
  `cpfCliente` varchar(11) DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `codVeiculo` varchar(5) DEFAULT NULL,
  `dataVenda` date DEFAULT NULL,
  `modoPagamento` varchar(15) DEFAULT NULL,
  `qtdParcelas` int(11) DEFAULT NULL,
  `valorTotal` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `visita`
--

DROP TABLE IF EXISTS `visita`;
CREATE TABLE IF NOT EXISTS `visita` (
  `idVisita` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFunc` varchar(50) DEFAULT NULL,
  `nomeCliente` varchar(50) DEFAULT NULL,
  `dataVisita` date DEFAULT NULL,
  `horaVisita` time DEFAULT NULL,
  PRIMARY KEY (`idVisita`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

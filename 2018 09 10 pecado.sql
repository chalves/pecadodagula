-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 10-Set-2018 às 20:40
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pecado`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

DROP TABLE IF EXISTS `cargos`;
CREATE TABLE IF NOT EXISTS `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cep`
--

DROP TABLE IF EXISTS `cep`;
CREATE TABLE IF NOT EXISTS `cep` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cep` varchar(10) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `cidade` varchar(150) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `ibge` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomefantasia` varchar(255) NOT NULL,
  `razaosocial` varchar(255) NOT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `telefone` varchar(15) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` char(2) NOT NULL,
  `cep` char(8) NOT NULL,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

DROP TABLE IF EXISTS `empresas`;
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeFantasia` varchar(50) NOT NULL,
  `razaoSocial` varchar(150) NOT NULL,
  `cgc` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `endereco` varchar(250) NOT NULL,
  `contato` varchar(60) DEFAULT NULL,
  `telContato` varchar(15) DEFAULT NULL,
  `celContato` varchar(15) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `site` varchar(250) DEFAULT NULL,
  `taxaServico` float DEFAULT '0',
  `cobraFrete` tinyint(1) DEFAULT '0',
  `totalTicket` float DEFAULT '0',
  `ticketMedio` float DEFAULT '0',
  `qtdeTicket` decimal(10,0) DEFAULT '0',
  `logo` varchar(250) DEFAULT NULL,
  `idLoja` int(2) NOT NULL DEFAULT '0',
  `aberto` int(1) NOT NULL DEFAULT '0',
  `abre` time DEFAULT NULL,
  `fecha` time DEFAULT NULL,
  `cep` varchar(8) NOT NULL,
  `uf` varchar(2) NOT NULL DEFAULT 'RJ',
  `tipo` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresas`
--

INSERT INTO `empresas` (`id`, `nomeFantasia`, `razaoSocial`, `cgc`, `status`, `endereco`, `contato`, `telContato`, `celContato`, `email`, `site`, `taxaServico`, `cobraFrete`, `totalTicket`, `ticketMedio`, `qtdeTicket`, `logo`, `idLoja`, `aberto`, `abre`, `fecha`, `cep`, `uf`, `tipo`) VALUES
(1, 'Bar Mont Alegre', 'Bar e Lanchonete Mont Alegre Ltda', '01.123.456/0001-00', 1, 'Rua uruguai 194 Galeria - Tijuca - Riode janeiro ', 'Affonso Ceruzo', '21999991122', '21999991122', 'montalegre@gmail.com', NULL, 3, 1, 0, 0, '0', NULL, 1, 1, '08:30:00', '23:00:00', '20510060', 'RJ', 1),
(2, 'Bar Britânia', 'Bar e Restaurante Britânia', '09001987000188', 1, 'Rua Desembargador Izidro, 10 Praça Saens Pena Tijuca Rio de janeiro', 'João ou Manoel', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, '18:00:00', '23:00:00', '20510060', 'RJ', 1),
(3, 'Bar Pinguso', 'Bar e Restaurante Pinguso', '09211987000188', 0, 'Rua Desembargador Izidro, 18 Praça Saens Pena Tijuca Rio de janeiro', 'Mária Português', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '20510061', 'RJ', 1),
(4, 'testando', 'testando', '', 1, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', '', 1),
(5, 'Carlos Henrique\'\' R Alves', 'restaurante sobe e desce', '', 1, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(6, 'Bar Santo Cristo', 'Bar e Lanchonete Santo Cristo Ltda', '', 1, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(7, 'Bar Santo Cristo', 'Bar e Lanchonete Santo Cristo Ltda', '', 1, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(8, 'Bar Santo Cristo', 'Bar e Lanchonete Santo Cristo Ltda', '', 1, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(9, 'testando', 'testando restaurante', '', 1, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(10, 'testando', 'testando restaurante', '', 1, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(11, 'testando', 'testando restaurante', '', 1, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupo`
--

DROP TABLE IF EXISTS `grupo`;
CREATE TABLE IF NOT EXISTS `grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `descricao` varchar(360) NOT NULL,
  `foto` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `grupo`
--

INSERT INTO `grupo` (`id`, `nome`, `descricao`, `foto`) VALUES
(1, 'Congelados', 'Congelados', ''),
(2, 'Batidas do Primo', 'Batidas do Primo', ''),
(3, 'Batidas do Primo', 'Batidas do Primo', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mural`
--

DROP TABLE IF EXISTS `mural`;
CREATE TABLE IF NOT EXISTS `mural` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPara` int(11) NOT NULL,
  `recado` text NOT NULL,
  `idDE` int(11) NOT NULL,
  `assunto` varchar(150) NOT NULL,
  `criado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `lido` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mural`
--

INSERT INTO `mural` (`id`, `idPara`, `recado`, `idDE`, `assunto`, `criado`, `nome`, `lido`) VALUES
(1, 2, 'Tem comprar o material para obra do kitinete', 3, 'Compra de Material', '2018-09-10 15:44:30', 'Raimundo Nonato', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `pedidoid` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioid` int(11) NOT NULL,
  `clienteid` int(11) NOT NULL,
  `codigopedido` varchar(20) NOT NULL,
  `valorbruto` varchar(20) NOT NULL,
  `valorliquido` varchar(20) NOT NULL,
  PRIMARY KEY (`pedidoid`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidoitens`
--

DROP TABLE IF EXISTS `pedidoitens`;
CREATE TABLE IF NOT EXISTS `pedidoitens` (
  `pedidoitemid` int(11) NOT NULL AUTO_INCREMENT,
  `pedidoid` int(11) NOT NULL,
  `clienteid` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `produtoid` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valormercadoria` decimal(10,2) NOT NULL,
  `valorvenda` decimal(10,2) NOT NULL,
  `desconto` decimal(10,2) NOT NULL,
  PRIMARY KEY (`pedidoitemid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `perfilid` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`perfilid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`perfilid`, `descricao`, `status`) VALUES
(1, 'SUPER ADMINISTRADOR', 1),
(2, 'ADMINISTRADOR (EMPRESA)', 1),
(3, 'DIRETOR', 1),
(4, 'GERENTE', 1),
(5, 'SUPERVISOR', 1),
(6, 'REPRESENTANTE (VENDEDOR)', 1),
(7, 'CLIENTE', 1),
(8, 'VISITANTE', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfilpreco`
--

DROP TABLE IF EXISTS `perfilpreco`;
CREATE TABLE IF NOT EXISTS `perfilpreco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descrico` varchar(80) NOT NULL,
  `peso` decimal(10,0) NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricaoproduto` varchar(100) NOT NULL,
  `unidade` int(11) NOT NULL,
  `custo` float NOT NULL,
  `valorvenda` float NOT NULL,
  `qtdeestoque` int(11) NOT NULL,
  `descontopermitido` int(11) NOT NULL,
  `alertaestoque` int(11) NOT NULL,
  `qtdevendaminima` int(11) NOT NULL,
  `qtdevalorminimo` float NOT NULL,
  `codigoean` varchar(25) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `datacadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grupo` int(11) NOT NULL,
  `valorpromocao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `descricaoproduto`, `unidade`, `custo`, `valorvenda`, `qtdeestoque`, `descontopermitido`, `alertaestoque`, `qtdevendaminima`, `qtdevalorminimo`, `codigoean`, `foto`, `datacadastro`, `grupo`, `valorpromocao`) VALUES
(12, 'Pacote Bolinho de Bacalhau tipo Lanche', 2, 8, 11, 56, 8, 0, 2, 0, '33333333', '', '2018-08-09 17:49:49', 1, 0),
(13, 'Pacote Bolinho de Bacalhau tipo Bolão', 2, 8, 11, 56, 8, 0, 2, 0, '33333333', '', '2018-08-09 17:51:10', 1, 0),
(14, 'Pacote Camarão Empanado tipo Lanche', 2, 8, 11, 56, 8, 0, 2, 0, '1111111', '', '2018-08-09 17:54:55', 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

DROP TABLE IF EXISTS `tarefas`;
CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `criado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `previsao` datetime NOT NULL,
  `fechamento` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefones`
--

DROP TABLE IF EXISTS `telefones`;
CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(20) NOT NULL,
  `contato` varchar(80) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoculinaria`
--

DROP TABLE IF EXISTS `tipoculinaria`;
CREATE TABLE IF NOT EXISTS `tipoculinaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoempresa`
--

DROP TABLE IF EXISTS `tipoempresa`;
CREATE TABLE IF NOT EXISTS `tipoempresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

DROP TABLE IF EXISTS `uf`;
CREATE TABLE IF NOT EXISTS `uf` (
  `id` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL DEFAULT 'RJ',
  `descricao` varchar(80) NOT NULL,
  `liberado` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

DROP TABLE IF EXISTS `unidade`;
CREATE TABLE IF NOT EXISTS `unidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(4) NOT NULL,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `sigla`, `nome`) VALUES
(1, 'UN', 'unidade'),
(2, 'PCT', 'pacote');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `login` varchar(15) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `datacadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dataultimoacesso` datetime DEFAULT NULL,
  `perfilid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `superAdmin` int(1) NOT NULL DEFAULT '0',
  `dataalteracao` datetime DEFAULT NULL,
  `dateLogin` datetime DEFAULT NULL,
  `dateLogout` datetime DEFAULT NULL,
  `cargo` varchar(80) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `ultimoLogin` datetime DEFAULT NULL,
  `dateBloqueio` datetime DEFAULT NULL,
  `dateDesbloqueio` datetime DEFAULT NULL,
  `logado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `email`, `senha`, `datacadastro`, `dataultimoacesso`, `perfilid`, `status`, `foto`, `celular`, `superAdmin`, `dataalteracao`, `dateLogin`, `dateLogout`, `cargo`, `nickname`, `ultimoLogin`, `dateBloqueio`, `dateDesbloqueio`, `logado`) VALUES
(1, 'Administrador', 'admin', 'vraalimentos@gmail.com', '123456', '2017-03-14 15:45:00', '2017-03-14 15:45:00', 1, 1, 'Foto-USR-0001.jpg', '(21) 99928-3958', 0, NULL, '2018-09-10 20:06:19', NULL, 'Administrador', 'Carlos Henrique', NULL, NULL, NULL, 1),
(2, 'Super Administrador', 'spAdmin', 'vrawebhosting@gmail.com', '123456', '2018-09-10 15:25:25', NULL, 1, 1, 'Foto-USR-0001.jpg', NULL, 1, NULL, '2018-09-10 20:11:14', '2018-09-10 16:19:26', 'Super Administrador', 'Faustão', '2018-09-10 18:34:59', NULL, NULL, 1),
(3, 'Raimundo Nonato', 'rnonato', 'vraservicos@gmail.com', '123456', '2018-09-10 15:43:19', NULL, 2, 1, 'avatar4.png', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 01-Out-2018 às 20:02
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
  `status` int(1) NOT NULL DEFAULT '1',
  `dateAlteracao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `descricao`, `status`, `dateAlteracao`) VALUES
(1, 'Sócio-Gerente', 1, '2018-09-13 01:40:23'),
(2, 'Chef de Cozinha', 1, '2018-09-13 01:40:23'),
(3, 'Auxiliar de Cozinha', 1, '2018-09-13 04:52:26');

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
  `codigo` varchar(8) DEFAULT NULL,
  `nomeFantasia` varchar(50) NOT NULL,
  `razaoSocial` varchar(150) NOT NULL,
  `cgc` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `implantada` int(1) NOT NULL DEFAULT '0',
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

INSERT INTO `empresas` (`id`, `codigo`, `nomeFantasia`, `razaoSocial`, `cgc`, `status`, `implantada`, `endereco`, `contato`, `telContato`, `celContato`, `email`, `site`, `taxaServico`, `cobraFrete`, `totalTicket`, `ticketMedio`, `qtdeTicket`, `logo`, `idLoja`, `aberto`, `abre`, `fecha`, `cep`, `uf`, `tipo`) VALUES
(1, NULL, 'Bar Mont Alegre', 'Bar e Lanchonete Mont Alegre Ltda', '01.123.456/0001-00', 1, 1, 'Rua uruguai 194 Galeria - Tijuca - Riode janeiro ', 'Affonso Ceruzo', '21999991122', '21999991122', 'montalegre@gmail.com', NULL, 3, 1, 0, 0, '0', NULL, 1, 0, '08:30:00', '23:00:00', '20510060', 'RJ', 1),
(2, NULL, 'Bar Britânia', 'Bar e Restaurante Britânia', '09001987000188', 1, 0, 'Rua Desembargador Izidro, 10 Praça Saens Pena Tijuca Rio de janeiro', 'João ou Manoel', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, '18:00:00', '23:00:00', '20510060', 'RJ', 1),
(3, NULL, 'Bar Pinguso', 'Bar e Restaurante Pinguso', '09211987000188', 0, 0, 'Rua Desembargador Izidro, 18 Praça Saens Pena Tijuca Rio de janeiro', 'Mária Português', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '20510061', 'RJ', 1),
(4, NULL, 'testando', 'testando', '', 1, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', '', 1),
(5, NULL, 'Carlos Henrique\'\' R Alves', 'restaurante sobe e desce', '', 1, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(6, NULL, 'Bar Santo Cristo', 'Bar e Lanchonete Santo Cristo Ltda', '', 1, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(7, NULL, 'Bar Santo Cristo', 'Bar e Lanchonete Santo Cristo Ltda', '', 1, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(8, NULL, 'Bar Santo Cristo', 'Bar e Lanchonete Santo Cristo Ltda', '', 1, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(9, NULL, 'testando', 'testando restaurante', '', 1, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(10, NULL, 'testando', 'testando restaurante', '', 1, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1),
(11, NULL, 'testando', 'testando restaurante', '', 1, 0, '', NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, '0', NULL, 0, 0, NULL, NULL, '', 'RJ', 1);

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
  `idEmpresa` int(11) NOT NULL,
  `idPara` int(11) NOT NULL,
  `recado` text NOT NULL,
  `idDE` int(11) NOT NULL,
  `assunto` varchar(150) NOT NULL,
  `criado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nome` varchar(100) NOT NULL,
  `lido` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `prioridade` int(1) NOT NULL DEFAULT '1',
  `resposta` text,
  `dataResposta` datetime DEFAULT NULL,
  `idOrigem` int(11) NOT NULL DEFAULT '-1',
  `dataOrigem` datetime DEFAULT NULL,
  `enviouResposta` int(1) NOT NULL DEFAULT '0',
  `recadoOriginal` text,
  `dataarquivado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mural`
--

INSERT INTO `mural` (`id`, `idEmpresa`, `idPara`, `recado`, `idDE`, `assunto`, `criado`, `nome`, `lido`, `status`, `prioridade`, `resposta`, `dataResposta`, `idOrigem`, `dataOrigem`, `enviouResposta`, `recadoOriginal`, `dataarquivado`) VALUES
(1, 0, 2, 'Tem comprar o material para obra do kitinete  sdsdsda  dsadad  dasda  asdadadad asdasda dasdad adasd asdad addad asdada asdada asdasd asdasd daasd', 1, 'Compra de Material PARA OBRA DO KITINETE EM SANTA CRUZ', '2018-09-10 15:44:30', 'Raimundo Nonato', 0, 1, 3, NULL, NULL, -1, NULL, 0, NULL, NULL),
(2, 1, 2, 'testando recado 2', 3, 'Obra Caixa D\'Água', '2018-09-14 23:00:01', 'Raimundo Nonato', 1, 1, 1, NULL, '2018-09-24 00:23:19', -1, NULL, 0, NULL, NULL),
(3, 1, 2, 'texto do recado 3', 4, 'Testando mural 3', '2018-09-16 16:08:40', 'Maria Aparecida', 1, 3, 2, ' hdgdsajhgjhgf jhdgfjh dgfj hdgjh dgjhdghjg', '2018-09-24 00:12:33', -1, NULL, 1, NULL, NULL),
(4, 1, 2, 'Testando mural 4 mmmmmmmmmmmmmm mmmmm mmmmmmm mmmm mmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmmmmmmmm bbbbbbbbbbbb nnnnnnnnnnnnnnnnnn hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 1, 'testando mural 4', '2018-09-16 16:08:40', 'Raimundo Nonato', 0, 1, 0, NULL, NULL, -1, NULL, 0, NULL, NULL),
(5, 1, 2, 'Testando mural 5 qlkjlkjlkjlkjckljkljjlkjkljlkjlk\r\nnjkljlkkjlkkjjlkjl', 4, 'Testando mural 5', '2018-09-16 16:09:33', 'Maria Aparecida', 1, 1, 2, NULL, NULL, -1, NULL, 0, NULL, NULL),
(6, 1, 2, 'Testando mural 6 mmmmmmmm mmmmmmmmmmmmm mmmmmmmm \r\n mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm bbbbbbbbbbbb nnnnnnnnnn nnnnnnnn hhhhhh hhhhhhhhhhhhh hhhhhhhhhhhh', 3, 'testando mural 6', '2018-09-16 16:09:33', 'Raimundo Nonato', 0, 2, 1, 'Resposta relativo ao recado enviado ao fulano no dia xx/xx/xxxx - Comprar material na casa show e contratar 1 eletricista e mais dois serventes para agilizar a reforma', '2018-09-20 11:15:48', -1, NULL, 1, NULL, '2018-09-25 11:32:12');

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dateAlteracao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `descricao`, `status`, `dateAlteracao`) VALUES
(1, 'SUPER ADMINISTRADOR', 1, NULL),
(2, 'ADMINISTRADOR (EMPRESA)', 1, NULL),
(3, 'DIRETOR', 1, NULL),
(4, 'GERENTE', 1, NULL),
(5, 'SUPERVISOR', 1, NULL),
(6, 'REPRESENTANTE (VENDEDOR)   44', 1, '2018-09-22 16:21:06'),
(7, 'CLIENTE', 1, '2018-09-13 00:47:29'),
(8, 'VISITANTE', 0, '2018-09-13 01:48:23'),
(11, 'testando 33 66 99', 1, '2018-09-15 00:05:44'),
(25, 'incluindo perfil demo', 1, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfilpreco`
--

INSERT INTO `perfilpreco` (`id`, `descrico`, `peso`) VALUES
(1, '$', '1'),
(2, '$$', '3'),
(3, '$$$', '5'),
(4, '$$$$', '7'),
(5, '$$$$$', '10');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `assunto`, `descricao`, `status`, `criado`, `previsao`, `fechamento`) VALUES
(1, 'Consertar erro Panel de mensagem do header', 'Consertar erro Panel de mensagem do header do painel de administração do portal pecado da gula', 1, '2018-09-11 09:38:00', '2018-09-14 09:00:00', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoculinaria`
--

INSERT INTO `tipoculinaria` (`id`, `descricao`) VALUES
(1, 'Japonês'),
(2, 'Brasileira'),
(3, 'Italiana'),
(4, 'Francesa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipoempresa`
--

DROP TABLE IF EXISTS `tipoempresa`;
CREATE TABLE IF NOT EXISTS `tipoempresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipoempresa`
--

INSERT INTO `tipoempresa` (`id`, `descricao`) VALUES
(1, 'Restaurante'),
(2, 'Pizzaria'),
(3, 'Hamburgueria'),
(4, 'Bar e Boteco'),
(5, 'Padaria'),
(6, 'Churrascaria'),
(7, 'Lanchonete');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uf`
--

DROP TABLE IF EXISTS `uf`;
CREATE TABLE IF NOT EXISTS `uf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uf` varchar(2) NOT NULL DEFAULT 'RJ',
  `descricao` varchar(80) NOT NULL,
  `liberado` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `uf`
--

INSERT INTO `uf` (`id`, `uf`, `descricao`, `liberado`) VALUES
(1, 'RJ', 'Rio de Janeiro', 1),
(2, 'SP', 'Sâo Paulo', 0);

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
  `idEmpresa` int(11) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idEmpresa`, `id`, `nome`, `login`, `email`, `senha`, `datacadastro`, `dataultimoacesso`, `perfilid`, `status`, `foto`, `celular`, `superAdmin`, `dataalteracao`, `dateLogin`, `dateLogout`, `cargo`, `nickname`, `ultimoLogin`, `dateBloqueio`, `dateDesbloqueio`, `logado`) VALUES
(1, 1, 'Administrador', 'admin', 'vraalimentos@gmail.com', '123456', '2017-03-14 15:45:00', '2017-03-14 15:45:00', 1, 1, 'Foto-USR-001.jpg', '(21) 99928-3958', 0, NULL, '2018-09-23 00:47:39', '2018-09-22 21:48:48', 'Administrador', 'Carlos Henrique', '2018-09-14 23:30:39', NULL, NULL, 0),
(1, 2, 'Super Administrador', 'spAdmin', 'vrawebhosting@gmail.com', '123456', '2018-09-10 15:25:25', NULL, 1, 1, 'Foto-USR-002.jpg', NULL, 1, NULL, '2018-10-01 17:12:19', '2018-10-01 14:12:00', 'Super Administrador', 'Faustão', '2018-10-01 17:02:20', '2018-09-22 23:48:41', '2018-09-23 02:48:53', 1),
(1, 3, 'Raimundo Nonato', 'rnonato', 'vraservicos@gmail.com', '123456', '2018-09-10 15:43:19', NULL, 2, 1, 'Foto-USR-003.jpg', NULL, 0, NULL, NULL, NULL, 'Serviços Gerais', 'Raimundo', NULL, NULL, NULL, 0),
(1, 4, 'Maria Cida', 'mcida', 'vranonato@gmail.com', '123456', '2018-09-11 07:37:35', NULL, 2, 1, 'Foto-USR-004.jpg', NULL, 0, NULL, NULL, NULL, 'Atendente', 'Cida', NULL, NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

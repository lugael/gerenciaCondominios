-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para admincondominio
CREATE DATABASE IF NOT EXISTS `admincondominio` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `admincondominio`;

-- Copiando estrutura para tabela admincondominio.ac_administradora
CREATE TABLE IF NOT EXISTS `ac_administradora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeAdm` varchar(255) NOT NULL DEFAULT '0',
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cnpj` varchar(14) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela admincondominio.ac_administradora: ~7 rows (aproximadamente)
INSERT INTO `ac_administradora` (`id`, `nomeAdm`, `dataCadastro`, `cnpj`) VALUES
	(1, 'Helena e Caroline Ltda', '2022-04-11 15:56:42', '51026358000125'),
	(10, 'Country House', '2022-04-06 16:01:58', '63687957000178'),
	(11, 'Bella Vista LTDA', '2022-05-09 21:09:30', '63687957000178'),
	(12, 'Fill And WIlosck LTDA', '2022-04-11 13:27:18', '63687957000178'),
	(13, 'Fluquinhas LTDA', '2022-04-11 18:57:46', '1111111000111'),
	(14, 'House World LTDA', '2022-05-09 21:09:10', '63687957000178'),
	(19, 'Franchesco And WIlosck LTDA', '2022-04-13 16:36:11', '63687957000178');

-- Copiando estrutura para tabela admincondominio.ac_bloco
CREATE TABLE IF NOT EXISTS `ac_bloco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeB` varchar(50) NOT NULL,
  `andares` int(11) NOT NULL DEFAULT 0,
  `qtdUnid` int(11) NOT NULL DEFAULT 0,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `from_condominio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ac_bloco_ac_condominio` (`from_condominio`),
  CONSTRAINT `FK_ac_bloco_ac_condominio` FOREIGN KEY (`from_condominio`) REFERENCES `ac_condominio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela admincondominio.ac_bloco: ~14 rows (aproximadamente)
INSERT INTO `ac_bloco` (`id`, `nomeB`, `andares`, `qtdUnid`, `dataCadastro`, `from_condominio`) VALUES
	(1, 'violeta', 2, 20, '2022-04-01 13:57:24', 1),
	(2, 'Tulipa', 13, 24, '2022-05-09 21:16:07', 2),
	(3, 'Orquidia', 12, 24, '2022-05-09 21:16:01', 3),
	(4, 'Lirio', 12, 24, '2022-03-30 17:00:26', 4),
	(5, 'Amarilis', 12, 24, '2022-05-09 21:16:15', 1),
	(6, 'Hortalicia', 12, 24, '2022-05-09 21:15:56', 6),
	(7, 'Portulaca', 12, 24, '2022-05-09 21:15:50', 7),
	(8, 'Grifinóia', 5, 20, '2022-04-14 11:06:05', 8),
	(9, 'Sonserina', 5, 20, '2022-03-30 17:00:37', 9),
	(10, 'Corvinal', 3, 15, '2022-03-30 17:00:41', 10),
	(11, 'Lufa-lufa', 5, 20, '2022-03-30 17:00:44', 11),
	(12, 'Stark', 5, 25, '2022-03-30 16:41:23', 12),
	(13, 'Concordia', 12, 1, '2022-05-09 21:14:12', 13),
	(20, 'Fortland', 1, 1, '2022-05-09 21:07:46', 6);

-- Copiando estrutura para tabela admincondominio.ac_condominio
CREATE TABLE IF NOT EXISTS `ac_condominio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCond` varchar(255) NOT NULL DEFAULT '',
  `qtdBloco` int(11) NOT NULL DEFAULT 0,
  `cep` varchar(8) NOT NULL DEFAULT '',
  `logradouro` varchar(255) NOT NULL DEFAULT '',
  `numero` int(11) NOT NULL DEFAULT 0,
  `bairro` varchar(255) NOT NULL DEFAULT '',
  `cidade` varchar(100) NOT NULL DEFAULT '',
  `estado` varchar(4) NOT NULL DEFAULT '',
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `from_adm` int(11) DEFAULT NULL,
  `from_sindico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ac_condominio_ac_administradora` (`from_adm`),
  KEY `cha_sindico` (`from_sindico`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela admincondominio.ac_condominio: ~13 rows (aproximadamente)
INSERT INTO `ac_condominio` (`id`, `nomeCond`, `qtdBloco`, `cep`, `logradouro`, `numero`, `bairro`, `cidade`, `estado`, `dataCadastro`, `from_adm`, `from_sindico`) VALUES
	(1, 'Bela Vista', 7, '89111090', 'Rua Anfiloquio Nunes Pires', 5471, 'Bela Vista', 'Gaspar', 'SC', '2022-04-01 12:04:54', 1, 1),
	(2, 'Sol Azul', 1, '89032457', 'Rua XV de novembro', 457, 'Centro', 'Blumenau', 'SC', '2022-05-09 21:11:43', 14, 2),
	(3, 'Beira Mares', 8, '89809845', 'Rua Beija-Flor', 541, 'Efapi', 'Chapecó', 'AC', '2022-04-14 11:07:43', 1, 3),
	(4, 'Taparajara', 4, '88161831', 'Rua Teodoro Sampaio', 975, 'Rio Caveiras', 'Biguaçu', 'SC', '2022-04-11 15:03:46', 1, 4),
	(5, 'Teosampaio', 4, '88161028', 'Rua Basilicio Consesso Garcia', 631, 'Universitário', 'Biguaçu', 'SC', '2022-05-09 21:11:50', 11, 5),
	(6, 'Almeida JR', 7, '88104732', 'Rua Tenente Leovegildo Pinheiro', 760, 'Fazenda Santo Antônio', 'São José', 'SC', '2022-05-09 21:09:44', 11, 6),
	(7, 'Velres', 7, '88905544', 'Rodovia SC-447', 586, 'Urussanguinha', 'Araranguá', 'SC', '2022-04-01 12:05:35', 1, 7),
	(8, 'Vitori', 1, '89160058', 'Praça Dias Velho', 905, 'Centro', 'Rio do Sul', 'SC', '2022-05-09 21:12:06', 19, 8),
	(9, 'Backville', 5, '89095450', 'Rua Erich Feldmann', 891, 'Vila Itoupava', 'Blumenau', 'SC', '2022-05-09 21:09:50', 14, 9),
	(10, 'Smalville', 4, '88139290', 'Rua Natalino João Silveira', 466, 'Praia do Meio ', 'Palhoça', 'SC', '2022-04-01 12:05:41', 1, 10),
	(11, 'Borderland', 7, '89806150', 'Rua Sete de Setembro - D', 177, 'Presidente Médici', 'Chapecó', 'SC', '2022-05-09 21:09:54', 12, 11),
	(12, 'ViceCity', 4, '88708651', 'Rua Antônio Rafael Isidoro', 834, 'São Bernardo', 'Tubarão', 'SC', '2022-05-09 21:11:57', 10, 12),
	(13, 'ViceLong ', 2, '89041180', 'Rua Félix Gieseler Sênior', 20, 'Velha', 'Blumenau', 'SC', '2022-05-09 21:15:25', 1, 19);

-- Copiando estrutura para tabela admincondominio.ac_conselho
CREATE TABLE IF NOT EXISTS `ac_conselho` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeCons` varchar(255) NOT NULL DEFAULT '',
  `funcao` enum('Sindico','Subsindico','Conselheiro') NOT NULL DEFAULT 'Sindico',
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `from_condominio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `chaveCondominio` (`from_condominio`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela admincondominio.ac_conselho: ~59 rows (aproximadamente)
INSERT INTO `ac_conselho` (`id`, `nomeCons`, `funcao`, `dataCadastro`, `from_condominio`) VALUES
	(1, 'Mariano', 'Sindico', '2022-04-01 14:18:51', 1),
	(2, 'Julia', 'Sindico', '2022-04-01 12:00:13', 2),
	(3, 'Supi', 'Sindico', '2022-04-01 12:00:14', 3),
	(4, 'Guwin', 'Sindico', '2022-04-01 12:00:16', 4),
	(5, 'Laís Liz da Conceição', 'Sindico', '2022-04-01 12:00:18', 5),
	(6, 'Clarice Emilly Dias', 'Subsindico', '2022-04-11 15:56:00', 6),
	(7, 'Marcos Emanuel Yuri Fernandes', 'Sindico', '2022-04-01 12:00:23', 7),
	(8, 'Filipe Carlos Melo', 'Sindico', '2022-04-01 12:00:24', 8),
	(9, 'Lorena Rebeca Pinto', 'Sindico', '2022-04-01 12:00:27', 9),
	(10, 'Leonardo Cauã Pereira', 'Sindico', '2022-04-01 12:00:28', 10),
	(11, 'Alana Esther ', 'Sindico', '2022-04-14 11:13:19', 11),
	(12, 'Yuri Erick Filipe Campos', 'Sindico', '2022-04-01 12:00:32', 12),
	(13, 'Lucas', 'Subsindico', '2022-04-01 12:00:35', 1),
	(14, 'Cicero', 'Conselheiro', '2022-04-01 12:00:38', 1),
	(15, 'Hoygu', 'Conselheiro', '2022-04-01 12:00:40', 1),
	(16, 'Waoca', 'Conselheiro', '2022-04-01 12:00:42', 1),
	(17, 'Joao', 'Subsindico', '2022-04-01 12:00:49', 2),
	(18, 'Stefani', 'Conselheiro', '2022-04-01 12:00:53', 2),
	(19, 'Zeywa', 'Conselheiro', '2022-04-01 12:00:55', 2),
	(20, 'Zovaki', 'Conselheiro', '2022-04-01 12:00:57', 2),
	(21, 'Isci', 'Subsindico', '2022-04-01 12:01:04', 3),
	(22, 'Sigirel', 'Conselheiro', '2022-04-01 12:01:06', 3),
	(23, 'Xoigi', 'Conselheiro', '2022-04-01 12:01:08', 3),
	(24, 'Wiudieus', 'Conselheiro', '2022-04-01 12:01:11', 3),
	(25, 'Moude', 'Subsindico', '2022-04-01 12:01:13', 4),
	(26, 'Bierxu', 'Conselheiro', '2022-04-01 12:01:15', 4),
	(27, 'Noyer', 'Conselheiro', '2022-04-01 12:01:17', 4),
	(28, 'Roes', 'Conselheiro', '2022-04-01 12:01:19', 4),
	(29, 'Isis Vanessa Aparecida dos Santos', 'Subsindico', '2022-04-01 12:01:22', 5),
	(30, 'Elisa Amanda Camila da Paz', 'Conselheiro', '2022-04-01 12:01:24', 5),
	(31, 'Raimundo Bernardo Carvalho', 'Conselheiro', '2022-04-01 12:01:26', 5),
	(32, 'Clarice Emilly Dias', 'Conselheiro', '2022-04-01 12:01:29', 5),
	(33, 'Rodrigo Geraldo Renan Figueiredo', 'Sindico', '2022-04-11 15:56:08', 6),
	(34, 'Luna Carla Carvalho', 'Conselheiro', '2022-04-01 12:01:34', 6),
	(35, 'Andreia Stefany Novaesa', 'Conselheiro', '2022-04-07 19:21:42', 6),
	(36, 'Marcelo Thales Cavalcanti', 'Conselheiro', '2022-04-01 12:01:38', 6),
	(37, 'Cristiane Elisa Rosângela da Rocha', 'Subsindico', '2022-04-01 12:01:40', 7),
	(38, 'Luzia Bianca Cardoso', 'Conselheiro', '2022-04-01 12:01:42', 7),
	(39, 'Pietro Pedro Henrique Lorenzo Santos', 'Conselheiro', '2022-04-01 12:01:44', 7),
	(40, 'Vicente Miguel Dias', 'Conselheiro', '2022-04-01 12:01:47', 7),
	(41, 'Sophie Catarina Nogueira', 'Subsindico', '2022-04-01 12:01:49', 8),
	(42, 'Luzia Bianca Cardoso', 'Conselheiro', '2022-04-01 12:01:50', 8),
	(43, 'Isabelly Ester Nascimento', 'Conselheiro', '2022-04-01 12:01:52', 8),
	(44, 'Osvaldo Eduardo Carvalho', 'Conselheiro', '2022-04-01 12:01:55', 8),
	(45, 'Julio Bryan Henry Peixoto', 'Subsindico', '2022-04-01 12:01:56', 9),
	(46, 'Kevin Breno Moraes', 'Conselheiro', '2022-04-01 12:01:58', 9),
	(47, 'Lorenzo Manoel Almeida', 'Conselheiro', '2022-04-01 12:02:00', 9),
	(48, 'Caroline Isabel Sarah Ramos', 'Conselheiro', '2022-04-01 12:02:02', 9),
	(49, 'Bárbara Sarah Araújo', 'Subsindico', '2022-04-01 12:02:04', 10),
	(50, 'Raimunda Nicole Tereza Porto', 'Conselheiro', '2022-04-01 12:02:06', 10),
	(51, 'Mário Geraldo Gonçalves', 'Conselheiro', '2022-04-01 12:02:08', 10),
	(52, 'Lorenzo Manoel Almeida', 'Conselheiro', '2022-04-01 12:02:10', 10),
	(53, 'Julio Ian Hugo Sales', 'Subsindico', '2022-04-01 12:02:12', 11),
	(54, 'Nicole Bianca Silva', 'Conselheiro', '2022-04-01 12:02:14', 11),
	(55, 'Vitória Nair da Paz', 'Conselheiro', '2022-04-01 12:02:16', 11),
	(56, 'João Bruno Pinto', 'Conselheiro', '2022-04-01 12:02:18', 11),
	(57, 'Marlene Valentina Nina Castro', 'Subsindico', '2022-04-01 12:02:20', 12),
	(58, 'Elias Raimundo Gonçalves', 'Conselheiro', '2022-04-01 12:02:22', 12),
	(59, 'Marcelo Thales Cavalcanti', 'Conselheiro', '2022-04-01 12:02:24', 12);

-- Copiando estrutura para tabela admincondominio.ac_inquilino
CREATE TABLE IF NOT EXISTS `ac_inquilino` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL DEFAULT '',
  `cpf` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `telefone` varchar(50) NOT NULL DEFAULT '0',
  `senha` varchar(50) NOT NULL DEFAULT '0',
  `datacadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dtnasc` date DEFAULT NULL,
  `from_condominio` int(11) DEFAULT NULL,
  `from_bloco` int(11) DEFAULT NULL,
  `from_unidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ac_inquilino_ac_condominio` (`from_condominio`),
  KEY `FK_ac_inquilino_ac_bloco` (`from_bloco`),
  KEY `FK_ac_inquilino_ac_unidade` (`from_unidade`),
  CONSTRAINT `FK_ac_inquilino_ac_bloco` FOREIGN KEY (`from_bloco`) REFERENCES `ac_bloco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ac_inquilino_ac_condominio` FOREIGN KEY (`from_condominio`) REFERENCES `ac_condominio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ac_inquilino_ac_unidade` FOREIGN KEY (`from_unidade`) REFERENCES `ac_unidade` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela admincondominio.ac_inquilino: ~22 rows (aproximadamente)
INSERT INTO `ac_inquilino` (`id`, `nome`, `cpf`, `email`, `telefone`, `senha`, `datacadastro`, `dtnasc`, `from_condominio`, `from_bloco`, `from_unidade`) VALUES
	(1, 'Gustavo Anderson Julio Rocha', '28994542183', 'gustavo_anderson_rocha@mrv.com.br', '47981342641', 'AZowP3EI28', '2022-05-09 21:19:28', '1996-12-05', 1, 1, 1),
	(2, 'Sebastiana Emilly Beatriz Gomes', '63453008880', 'sebastiana_gomes@chavao.com.b', '4789391347', 'a7yMPF3ngb', '2022-05-09 21:22:57', '1987-06-23', 1, 1, 1),
	(3, 'Juliana Raimunda Rezende', '88665215743', 'juliana_rezende@mtc.eng.br', '47981669489', 'ngwNJWBCCs', '2022-05-09 21:21:28', '2000-03-14', 2, 2, 2),
	(4, 'Danilo Mário Julio dos Santos', '78443624728', 'danilomariodossantos@gruposeteestrelas.com.br', '47992514426', '10nik9QYZr', '2022-05-09 21:18:42', '1988-09-01', 2, 2, 2),
	(5, 'Cristiane Laura Santos', '29153520548', 'cristianelaurasantos@saae.sp.gov.br', '47985849277', 'FOPuiW9dce		', '2022-05-09 21:18:28', '2000-03-03', 3, 3, 3),
	(6, 'Catarina Kamilly Isabela Jesus', '95040837739', 'catarina_kamilly_jesus@fileno.com.br', '47987258736', '0GKqqwSnXYD', '2022-05-09 21:17:55', '1995-02-23', 3, 3, 3),
	(8, 'Isabelly Bruna Ana Viana', '29053427309', 'isabelly_viana@zaniniengenharia.com.br', '47983744887', 'KpiGzJTyJ1', '2022-05-09 21:20:08', '1993-03-01', 4, 4, 4),
	(9, 'Carlos Eduardo Enrico Francisco Silva', '54762933961', 'carloseduardosilva@archosolutions.com.br', '47997163148', '9e9Wl62Cri', '2022-05-09 21:17:30', '1996-08-16', 9, 9, 9),
	(10, 'Rodrigo Ian Drumond', '53450987860', 'rodrigo.ian.drumond@wredenborg.se', '47983353215', 'qkukBTFZwn', '2022-05-09 21:22:42', '1977-01-23', 11, 11, 11),
	(12, 'Leandro Thomas Moreira', '	6438589730', 'leandro.thomas.moreira@royalplas.com.br', '47999089969', 'ZXh5UtitIc', '2022-05-09 21:21:44', '1998-07-23', 6, 6, 6),
	(13, 'Evelyn Alana Caldeira', '86233386349', 'evelyn.alana.caldeira@technicolor.com', '47988168797', 'NzrHFK6qYT', '2022-05-09 21:18:57', '1996-03-16', 7, 7, 7),
	(14, 'João Mário Nunes', '36967673793', 'joao_nunes@bol.com.br', '47988426433', '	sRrFROZ8JC', '2022-05-09 21:21:00', '2003-11-03', 8, 8, 8),
	(15, 'Joana Sabrina Porto', '01103271016', 'joana.sabrina.porto@vivax.com.br', '47985230329', 'zdqlZepkps', '2022-05-09 21:20:20', '2001-02-15', 8, 8, 8),
	(16, 'Antonio Heitor Henry Bernardes', '54497673901', 'antonio.heitor.bernardes@djapan.com.br', '47993260499', '5hxNlUJFXu', '2022-05-09 21:17:02', '2000-01-03', 9, 9, 9),
	(17, 'Giovanni Renan Manuel Freitas', '54497673901', 'giovanni-freitas84@vemarbrasil.com.br', '47986116250', 'pMj0DXXlzz', '2022-05-09 21:19:12', '1986-11-28', 9, 9, 9),
	(18, 'Ian Matheus Gonçalves', '44980865976', 'ian_goncalves@parker.com', '47987641912', '	2H64uQgOpg', '2022-05-09 21:19:55', '1991-01-03', 10, 10, 10),
	(19, 'Manuela Lavínia Pereira', '11584111976', 'manuela.lavinia.pereira@cmfcequipamentos.com.br', '47986341584', 'aq2NqG4yRe', '2022-05-09 21:22:09', '2001-02-03', 10, 10, 10),
	(20, 'André Otávio Osvaldo Monteiro', '64153400939', 'andre_monteiro@novotempo.org.br', '47994902444', 'JWjTtXWW1f', '2022-05-09 21:16:54', '2000-05-20', 11, 11, 11),
	(21, 'César Rafael Oliver Duarte', '13857606991', 'cesar_rafael_duarte@msaengenharia.com.br', '47989067296', 'ql3jehDp63', '2022-05-09 21:18:09', '1997-03-30', 11, 11, 11),
	(22, 'Luciana Silvana Farias', '62612301968', 'lucianasilvanafarias@accardoso.com.br', '47996612659', 'Wl66TlJ500', '2022-05-09 21:21:57', '1987-05-23', 12, 12, 12),
	(23, 'Alana Sophie Emilly Barbosa', '74535414920', 'alana_barbosa@phocus.com.br', '47987916960', 'DaOoLs23KZ', '2022-04-14 11:03:23', '2022-04-06', 13, 13, 13),
	(26, 'Carolina Brenda Andrea Ramos', '51627103422', 'carolina.brenda.ramos@protenisbarra.com.br', '47988273059', 'eCMpGcKPGb', '2022-05-09 21:17:43', '1997-02-03', 13, 13, 13);

-- Copiando estrutura para tabela admincondominio.ac_recados
CREATE TABLE IF NOT EXISTS `ac_recados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `conteudo` text NOT NULL,
  `dtInicio` date NOT NULL,
  `dtFim` date NOT NULL,
  `from_condominio` int(11) NOT NULL DEFAULT 0,
  `from_bloco` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `condominio` (`from_condominio`),
  KEY `bloco` (`from_bloco`),
  CONSTRAINT `bloco` FOREIGN KEY (`from_bloco`) REFERENCES `ac_bloco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `condominio` FOREIGN KEY (`from_condominio`) REFERENCES `ac_condominio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela admincondominio.ac_recados: ~3 rows (aproximadamente)
INSERT INTO `ac_recados` (`id`, `titulo`, `conteudo`, `dtInicio`, `dtFim`, `from_condominio`, `from_bloco`) VALUES
	(1, 'Falta de água', 'Houve um rompimento nos canos, por esse motivo estaremos cortando o fornencimento de água', '2022-05-08', '2022-05-15', 1, 5),
	(2, 'Mudança de morador', 'Chegará um novo morador  durante a parte da manhã.', '2022-05-10', '2022-05-10', 6, 20),
	(3, 'Falta de gás', 'Estamos com manutenção no armazenamento de gás devido a isso iremos corta o fornecimento.', '2022-05-01', '2022-05-11', 6, 6);

-- Copiando estrutura para tabela admincondominio.ac_unidade
CREATE TABLE IF NOT EXISTS `ac_unidade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL DEFAULT 0,
  `metragem` float DEFAULT NULL,
  `qtdVagas` int(11) DEFAULT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `from_bloco` int(11) NOT NULL,
  `from_condominio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ac_unidade_ac_condominio` (`from_condominio`),
  KEY `FK_ac_unidade_ac_bloco` (`from_bloco`),
  CONSTRAINT `FK_ac_unidade_ac_bloco` FOREIGN KEY (`from_bloco`) REFERENCES `ac_bloco` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_ac_unidade_ac_condominio` FOREIGN KEY (`from_condominio`) REFERENCES `ac_condominio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela admincondominio.ac_unidade: ~16 rows (aproximadamente)
INSERT INTO `ac_unidade` (`id`, `numero`, `metragem`, `qtdVagas`, `dataCadastro`, `from_bloco`, `from_condominio`) VALUES
	(1, 107, 30, 1, '2022-04-01 14:02:16', 1, 1),
	(2, 102, 25.8, 2, '2022-03-30 17:01:12', 2, 2),
	(3, 103, 25.8, 2, '2022-03-30 17:01:17', 3, 3),
	(4, 209, 30, 1, '2022-04-07 19:39:57', 4, 4),
	(5, 501, 30, 1, '2022-03-30 17:01:49', 5, 5),
	(6, 101, 30, 1, '2022-03-30 17:01:51', 6, 6),
	(7, 304, 30, 1, '2022-03-30 17:01:52', 7, 7),
	(8, 203, 40, 1, '2022-03-30 17:01:55', 8, 8),
	(9, 101, 70, 1, '2022-04-01 14:14:35', 9, 9),
	(10, 303, 50, 1, '2022-03-30 17:01:59', 10, 10),
	(11, 202, 50, 1, '2022-03-30 17:02:01', 11, 11),
	(12, 204, 50, 1, '2022-03-30 17:02:03', 12, 12),
	(13, 12, 74, 2, '2022-04-13 14:03:19', 13, 13),
	(39, 12, 50.5, 1, '2022-05-09 22:54:03', 20, 6),
	(41, 102, 32.6, 1, '2022-05-09 22:56:17', 1, 1),
	(42, 2, 50, 2, '2022-05-09 22:52:58', 20, 6);

-- Copiando estrutura para tabela admincondominio.ac_usuarios
CREATE TABLE IF NOT EXISTS `ac_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomeUser` varchar(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `dataCadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nivel` int(1) DEFAULT 2,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela admincondominio.ac_usuarios: ~3 rows (aproximadamente)
INSERT INTO `ac_usuarios` (`id`, `nomeUser`, `usuario`, `senha`, `dataCadastro`, `nivel`) VALUES
	(2, 'Luis Gabriel', 'luis', '123', '2022-05-09 21:03:02', 2),
	(6, 'Diego Bracellos', 'diego', '123', '2022-05-09 21:03:04', 2),
	(8, 'Maicon', 'maicon', '123', '2022-05-09 21:03:05', 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 08-Jul-2025 às 02:10
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `filmesbase`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `filme`
--

DROP TABLE IF EXISTS `filme`;
CREATE TABLE IF NOT EXISTS `filme` (
  `id` int(10) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `nota_media` double(3,1) UNSIGNED DEFAULT NULL,
  `poster` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `titulo` (`titulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `filme`
--

INSERT INTO `filme` (`id`, `titulo`, `nota_media`, `poster`) VALUES
(2, 'Ariel', NULL, 'https://image.tmdb.org/t/p/w500/3Bt8Tytl9gCRxShdmup7gN8AWSg.jpg'),
(3, 'Sombras no Paraíso', NULL, 'https://image.tmdb.org/t/p/w500/o2cWCX48flnEgDwSWu0Gpia0i0N.jpg'),
(5, 'Grande Hotel', NULL, 'https://image.tmdb.org/t/p/w500/6lNBW7dohayBDxNZlHnve6UlPSP.jpg'),
(6, 'Uma Jogada do Destino', NULL, 'https://image.tmdb.org/t/p/w500/wAe3y4OO3zGpTSeLciBrnUMgKTE.jpg'),
(8, 'Life in Loops (A Megacities RMX)', NULL, 'https://image.tmdb.org/t/p/w500/7ln81BRnPR2wqxuITZxEciCe1lc.jpg'),
(9, 'Sonntag im August', NULL, ''),
(11, 'Guerra nas Estrelas', NULL, 'https://image.tmdb.org/t/p/w500/dw7X9YPjjAfIxKHW04V64Bb9TB0.jpg'),
(12, 'Procurando Nemo', NULL, 'https://image.tmdb.org/t/p/w500/5jrPMq7IMLTqcuPDlK6jfruEbpq.jpg'),
(13, 'Forrest Gump: O Contador de Histórias', NULL, 'https://image.tmdb.org/t/p/w500/d74WpIsH8379TIL4wUxDneRCYv2.jpg'),
(14, 'Beleza Americana', NULL, 'https://image.tmdb.org/t/p/w500/9PJKsH7Btz2xjYIvLLtJ7qcJlL3.jpg'),
(15, 'Cidadão Kane', NULL, 'https://image.tmdb.org/t/p/w500/7RdvqkBX2gi6kiZ2yySeRqeClur.jpg'),
(16, 'Dançando no Escuro', NULL, 'https://image.tmdb.org/t/p/w500/921m0tWnUNRq7ofp9DPz6c7DsDl.jpg'),
(17, 'Escuridão', NULL, 'https://image.tmdb.org/t/p/w500/h6gCVAzjFLhzkffv2VZO1RgVCBt.jpg'),
(18, 'O Quinto Elemento', NULL, 'https://image.tmdb.org/t/p/w500/yDTfuFwJUl3JRBGEEb5jS6QhCW3.jpg'),
(19, 'Metrópolis', NULL, 'https://image.tmdb.org/t/p/w500/xBx21HvGJCb15PKWkyb7uc435Wx.jpg'),
(20, 'Minha Vida Sem Mim', NULL, 'https://image.tmdb.org/t/p/w500/pgNMDvIYysm0sBLE4omUj0DcrP.jpg'),
(21, 'The Endless Summer', NULL, 'https://image.tmdb.org/t/p/w500/hinHiXl8sOGIz2TLIZNpO5rhjND.jpg'),
(22, 'Piratas do Caribe: A Maldição do Pérola Negra', NULL, 'https://image.tmdb.org/t/p/w500/xsAlxvMCRzyreLxdZL1dOUSbonV.jpg'),
(24, 'Kill Bill: Volume 1', NULL, 'https://image.tmdb.org/t/p/w500/moCulwjwEIWbtU5CG1BegZghP0s.jpg'),
(25, 'Soldado Anônimo', NULL, 'https://image.tmdb.org/t/p/w500/1foTLTFAqI5I4CriXUhaSpUetwm.jpg'),
(26, 'Andando Sobre As Águas', NULL, 'https://image.tmdb.org/t/p/w500/eOR7plxw4sfKZ0uFt4DXHD70heh.jpg'),
(27, 'Nove Canções', NULL, 'https://image.tmdb.org/t/p/w500/91O7z0vo7MiNWd5xD2BoivwbQsb.jpg'),
(28, 'Apocalypse Now', NULL, 'https://image.tmdb.org/t/p/w500/gQB8Y5RCMkv2zwzFHbUJX3kAhvA.jpg'),
(33, 'Os Imperdoáveis', NULL, 'https://image.tmdb.org/t/p/w500/4kKECOE65RoVjrXI1ukAZCutLUO.jpg'),
(35, 'Os Simpsons: O Filme', NULL, 'https://image.tmdb.org/t/p/w500/sMcsZ7BlOf2LDhTlfPlWb3w6lJM.jpg'),
(38, 'Brilho Eterno de uma Mente sem Lembranças', NULL, 'https://image.tmdb.org/t/p/w500/z3k9Y2886Uo6owGxoCteHSngwA6.jpg'),
(55, 'Amores Brutos', NULL, 'https://image.tmdb.org/t/p/w500/uoObXx53SjSLLtAavMSIe02zizs.jpg'),
(58, 'Piratas do Caribe: O Baú da Morte', NULL, 'https://image.tmdb.org/t/p/w500/dCXOveWolVMMbJZQ0cNslpqohPM.jpg'),
(59, 'Marcas da Violência', NULL, 'https://image.tmdb.org/t/p/w500/38Ov2S2Onb77xIA00diPh3R3GrW.jpg'),
(62, '2001: Uma Odisseia no Espaço', NULL, 'https://image.tmdb.org/t/p/w500/pVCmLuATJ0lQs4Vx1zUJUN0if2A.jpg'),
(63, 'Os 12 Macacos', NULL, 'https://image.tmdb.org/t/p/w500/doLd0sdlzpBHi49iXQbFVitGSQW.jpg'),
(64, 'Fale com Ela', NULL, 'https://image.tmdb.org/t/p/w500/yWigIdXSA6X3Iw8HRfnweXjETf.jpg'),
(65, '8 Mile: Rua das Ilusões', NULL, 'https://image.tmdb.org/t/p/w500/86CyysIw6WvboRPN8qrjCP0M0nS.jpg'),
(66, 'Poder Absoluto', NULL, 'https://image.tmdb.org/t/p/w500/qxh8ri5txxJLi6Izw6430sa3DYf.jpg'),
(67, 'Paradise Now', NULL, 'https://image.tmdb.org/t/p/w500/lg0qTUpsriveH6bbHYQwKzzTwaZ.jpg'),
(68, 'Brazil: O Filme', NULL, 'https://image.tmdb.org/t/p/w500/rsVIiNuCzWYZCyadMiBDFq6IuwH.jpg'),
(69, 'Johnny & June', NULL, 'https://image.tmdb.org/t/p/w500/hat7O2KoUpPhMRm3RzF8vVSXaft.jpg'),
(70, 'Menina de Ouro', NULL, 'https://image.tmdb.org/t/p/w500/edzbBaAHoJGvmNtY2Qck936AgnI.jpg'),
(71, 'Billy Elliot', NULL, 'https://image.tmdb.org/t/p/w500/nOr5diUZxphmAD3li9aiILyI28F.jpg'),
(73, 'A Outra História Americana', NULL, 'https://image.tmdb.org/t/p/w500/nFou7IjLzU0cGC3iVwm2vYWZtGx.jpg'),
(74, 'Guerra dos Mundos', NULL, 'https://image.tmdb.org/t/p/w500/aU42RNFpLgXsg0Tsgo8g8RPji0N.jpg'),
(75, 'Marte Ataca!', NULL, 'https://image.tmdb.org/t/p/w500/koIxmF4RUofBWYhcpekQCbjefXY.jpg'),
(76, 'Antes do Amanhecer', NULL, 'https://image.tmdb.org/t/p/w500/o7778ruavZqENUIJQAeOvuPBN63.jpg'),
(77, 'Amnésia', NULL, 'https://image.tmdb.org/t/p/w500/7leBWM27Q0TUnvmhw6WnFNgGn4G.jpg'),
(78, 'Blade Runner: O Caçador de Andróides', NULL, 'https://image.tmdb.org/t/p/w500/iMlqdLeNYI2I63q7Fd2nvRbTCG9.jpg'),
(79, 'Herói', NULL, 'https://image.tmdb.org/t/p/w500/bCxoK5adJ4bf8lQBTYoyiGQSw9u.jpg'),
(80, 'Antes do Pôr do Sol', NULL, 'https://image.tmdb.org/t/p/w500/f9JnLBgaX9Wx665vb8PJWgvW3Tw.jpg'),
(81, 'Nausicaä do Vale do Vento', NULL, 'https://image.tmdb.org/t/p/w500/UkCcG94fX1fKIu6DWzwEfpbxL9.jpg'),
(82, 'Miami Vice', NULL, 'https://image.tmdb.org/t/p/w500/1KGD2g0wOc7WBfHc5G19reLHQxk.jpg'),
(83, 'Mar Aberto', NULL, 'https://image.tmdb.org/t/p/w500/vNnDq7CdDzVLu9hjdqjcvgJHaAJ.jpg'),
(85, 'Indiana Jones e os Caçadores da Arca Perdida', NULL, 'https://image.tmdb.org/t/p/w500/vPDnnfUAgLz7yWQVCK4gJAKFy0m.jpg'),
(86, 'Elementarteilchen', NULL, 'https://image.tmdb.org/t/p/w500/qgeTc72dXrLSIMZn5tCc9kiy1sV.jpg'),
(87, 'Indiana Jones e o Templo da Perdição', NULL, 'https://image.tmdb.org/t/p/w500/k0zOx7m7oI6tYWXkvpJj2YQll1r.jpg'),
(88, 'Dirty Dancing: Ritmo Quente', NULL, 'https://image.tmdb.org/t/p/w500/mUVIRUpqKQa8uKDgyYrQHs6rlbz.jpg'),
(89, 'Indiana Jones e a Última Cruzada', NULL, 'https://image.tmdb.org/t/p/w500/9H79Cq97WwiY7FB51jPH65sX3hp.jpg'),
(90, 'Um Tira da Pesada', NULL, 'https://image.tmdb.org/t/p/w500/wjcOukmiJKp4oMrIXOa3hlvODph.jpg'),
(91, 'Terra sem Pão', NULL, 'https://image.tmdb.org/t/p/w500/3SbSd2vqXwIaS1ihh1OE2AShQ0k.jpg'),
(92, 'Megacities', NULL, 'https://image.tmdb.org/t/p/w500/qO48XLCG58cICOgAR57ao0PrJ6A.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resenha`
--

DROP TABLE IF EXISTS `resenha`;
CREATE TABLE IF NOT EXISTS `resenha` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idfilme` int(10) NOT NULL,
  `idusuario` int(10) NOT NULL,
  `conteudo` varchar(2000) NOT NULL,
  `nota` double(3,1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idfilme` (`idfilme`),
  KEY `idusuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `administra` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `sobre` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nickname` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `resenha`
--
ALTER TABLE `resenha`
  ADD CONSTRAINT `resenha_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resenha_ibfk_3` FOREIGN KEY (`idfilme`) REFERENCES `filme` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

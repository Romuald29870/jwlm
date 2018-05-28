-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 28 mai 2018 à 10:02
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `id4254718_jwlm`
--
CREATE DATABASE IF NOT EXISTS `id4254718_jwlm` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `id4254718_jwlm`;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(10) DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `interphone` varchar(5) DEFAULT NULL,
  `apt` varchar(10) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `rmq` varchar(50) DEFAULT NULL,
  `lat` varchar(50) DEFAULT NULL,
  `longi` varchar(50) DEFAULT NULL,
  `langue` varchar(50) DEFAULT NULL,
  `id_congreg` int(11) NOT NULL,
  `id_territoire` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `numero`, `rue`, `interphone`, `apt`, `cp`, `ville`, `rmq`, `lat`, `longi`, `langue`, `id_congreg`, `id_territoire`) VALUES
(3, 7, 'Rue vedrines', '', '', '29200', 'Brest', '', '48.3860666', '-4.5060435', 'Arabe', 2, 29),
(4, 4, 'Place de strasbourg', '', '', '29200', 'BREST', '', '48.4026028', '-4.4662523', 'Arabe', 2, 29),
(7, 9, 'Rue vedrines', '', 'B12', '209200', 'Brest', '', '48.386112', '-4.5059279', 'Arabe', 2, 29),
(8, 5, 'Richepin', '', '', '29200', 'Brest', '', '48.4165343', '-4.4911927', 'Mahorais', 2, 29),
(9, 6, 'Richepin', '', '', '29200', 'Brest', '', '48.4168973', '-4.4905676', 'Arabe', 2, 29),
(10, 5, 'rue Richepin', 'A1', '9', '29200', 'Brest', 'jst', '48.416748', '-4.491198', '', 2, 29),
(11, 5, 'rue Richepin', 'B1', '10', '29200', 'Brest', 'gff', '48.416748', '-4.491198', '', 2, 29),
(12, 5, 'rue Richepin', 'A2', '7', '29200', 'Brest', 'hck', '48.416748', '-4.491198', '', 2, 29),
(13, 5, 'rue Richepin', 'B2', '8', '29200', 'Brest', 'nrs', '48.416748', '-4.491198', '', 2, 29),
(14, 5, 'rue Richepin', 'A3', '5', '29200', 'Brest', 'dmb', '48.416748', '-4.491198', 'Arabe', 2, 29),
(15, 5, 'rue Richepin', 'B3', '6', '29200', 'Brest', 'blg', '48.416748', '-4.491198', 'Arabe', 2, 29),
(16, 5, 'rue Richepin', 'A4', '3', '29200', 'Brest', 'hlr', '48.416748', '-4.491198', '', 2, 29),
(17, 5, 'rue Richepin', 'B4', '4', '29200', 'Brest', 'dlp', '48.416748', '-4.491198', '', 2, 29),
(18, 5, 'rue Richepin', 'A5', '1', '29200', 'Brest', 'mhm', '48.416748', '-4.491198', '', 2, 29),
(19, 5, 'rue Richepin', 'B5', '2', '29200', 'Brest', 'vlm', '48.416748', '-4.491198', '', 2, 29),
(20, 3, 'rue Richepin', 'A1', '9', '29200', 'Brest', 'plq', '48.416927', '-4.491240', '', 2, 29),
(21, 3, 'rue Richepin', 'B1', '10', '29200', 'Brest', 'dm', '48.416927', '-4.491240', '', 2, 29),
(22, 3, 'rue Richepin', 'A2', '7', '29200', 'Brest', 'lrr', '48.416927', '-4.491240', 'Mahorais', 2, 29),
(23, 3, 'rue Richepin', 'B2', '8', '29200', 'Brest', 'bsq', '48.416927', '-4.491240', '', 2, 29),
(24, 3, 'rue Richepin', 'A3', '5', '29200', 'Brest', 'pr', '48.416927', '-4.491240', '', 2, 29),
(25, 3, 'rue Richepin', 'B3', '6', '29200', 'Brest', 'lcn', '48.416927', '-4.491240', '', 2, 29),
(26, 3, 'rue Richepin', 'A4', '3', '29200', 'Brest', 'vss', '48.416927', '-4.491240', 'Arabe', 2, 29),
(27, 3, 'rue Richepin', 'B4', '4', '29200', 'Brest', 'vgr', '48.416927', '-4.491240', '', 2, 29),
(28, 3, 'rue Richepin', 'A5', '1', '29200', 'Brest', 'sdl', '48.416927', '-4.491240', '', 2, 29),
(29, 3, 'rue Richepin', 'B5', '2', '29200', 'Brest', 'psc', '48.416927', '-4.491240', '', 2, 29),
(30, 1, 'rue Richepin', '', '1', '29200', 'Brest', 'byj', '48.417079', '-4.491240', 'Arabe', 2, 29),
(31, 1, 'rue Richepin', '', '2', '29200', 'Brest', 'mhm', '48.417079', '-4.491141', 'Mahorais', 2, 29),
(32, 1, 'rue Richepin', '', '3', '29200', 'Brest', 'prh', '48.417079', '-4.491141', '', 2, 29),
(33, 1, 'rue Richepin', '', '4', '29200', 'Brest', 'chl', '48.417079', '-4.491141', '', 2, 29),
(34, 1, 'rue Richepin', '', '5', '29200', 'Brest', 'lsc', '48.417079', '-4.491141', 'Mahorais', 2, 29),
(35, 1, 'rue Richepin', '', '6', '29200', 'Brest', 'trn', '48.417079', '-4.491141', '', 2, 29),
(36, 1, 'rue Richepin', '', '7', '29200', 'Brest', 'ttr', '48.417079', '-4.491141', 'Espagnol', 2, 29),
(37, 1, 'rue Richepin', '', '8', '29200', 'Brest', 'prc', '48.417079', '-4.491141', '', 2, 29),
(38, 1, 'rue Richepin', '', '9', '29200', 'Brest', 'mng', '48.417079', '-4.491141', 'Russe', 2, 29),
(39, 1, 'rue Richepin', '', '10', '29200', 'Brest', '', '48.417079', '-4.491141', '', 2, 29),
(40, 8, 'rue Richepin', 'A1', '17', '29200', 'Brest', 'htr', '48.417140', '-4.490852', '', 2, 29),
(41, 8, 'rue Richepin', 'B1', '18', '29200', 'Brest', 'mbl', '48.417140', '-4.490852', '', 2, 29),
(42, 8, 'rue Richepin', 'A2', '15', '29200', 'Brest', 'mss', '48.417140', '-4.490852', '', 2, 29),
(43, 8, 'rue Richepin', 'B2', '16', '29200', 'Brest', 'vl', '48.417140', '-4.490852', '', 2, 29),
(44, 8, 'rue Richepin', 'A3', '13', '29200', 'Brest', 'cnt', '48.417140', '-4.490852', '', 2, 29),
(45, 8, 'rue Richepin', 'B3', '14', '29200', 'Brest', 'grg', '48.417140', '-4.490852', '', 2, 29),
(46, 8, 'rue Richepin', 'A4', '11', '29200', 'Brest', 'mrt', '48.417140', '-4.490852', '', 2, 29),
(47, 8, 'rue Richepin', 'B4', '12', '29200', 'Brest', 'brh', '48.417140', '-4.490852', '', 2, 29),
(48, 8, 'rue Richepin', 'A5', '9', '29200', 'Brest', 'mll', '48.417140', '-4.490852', '', 2, 29),
(49, 8, 'rue Richepin', 'B5', '10', '29200', 'Brest', 'lhm', '48.417140', '-4.490852', '', 2, 29),
(50, 8, 'rue Richepin', 'A6', '7', '29200', 'Brest', 'sl', '48.417140', '-4.490852', '', 2, 29),
(51, 8, 'rue Richepin', 'B6', '8', '29200', 'Brest', 'lt', '48.417140', '-4.490852', '', 2, 29),
(52, 8, 'rue Richepin', 'A7', '5', '29200', 'Brest', 'cvn', '48.417140', '-4.490852', '', 2, 29),
(53, 8, 'rue Richepin', 'B7', '6', '29200', 'Brest', 'hmd', '48.417140', '-4.490852', '', 2, 29),
(54, 8, 'rue Richepin', 'A8', '3', '29200', 'Brest', 'slh', '48.417140', '-4.490852', '', 2, 29),
(55, 8, 'rue Richepin', 'B8', '4', '29200', 'Brest', 'bzr', '48.417140', '-4.490852', '', 2, 29),
(56, 8, 'rue Richepin', 'A9', '1', '29200', 'Brest', 'prr', '48.417140', '-4.490852', '', 2, 29),
(57, 8, 'rue Richepin', 'B9', '2', '29200', 'Brest', 'ljh', '48.417140', '-4.490852', '', 2, 29),
(58, 6, 'rue Richepin', '1', '1', '29200', 'Brest', 'dss', '48.417118', '-4.490471', '', 2, 29),
(59, 6, 'rue Richepin', '2', '2', '29200', 'Brest', 'trn', '48.417118', '-4.490471', '', 2, 29),
(60, 6, 'rue Richepin', '3', '3', '29200', 'Brest', 'kdd', '48.417118', '-4.490471', '', 2, 29),
(61, 6, 'rue Richepin', '4', '4', '29200', 'Brest', 'blc', '48.417118', '-4.490471', 'Mahorais', 2, 29),
(62, 6, 'rue Richepin', '5', '5', '29200', 'Brest', 'bdl', '48.417118', '-4.490471', '', 2, 29),
(63, 6, 'rue Richepin', '6', '6', '29200', 'Brest', 'slm', '48.417118', '-4.490471', '', 2, 29),
(64, 6, 'rue Richepin', '7', '7', '29200', 'Brest', 'cst', '48.417118', '-4.490471', '', 2, 29),
(65, 6, 'rue Richepin', '8', '8', '29200', 'Brest', 'bd', '48.417118', '-4.490471', '', 2, 29),
(66, 6, 'rue Richepin', '9', '9', '29200', 'Brest', 'jsp', '48.417118', '-4.490471', '', 2, 29),
(67, 6, 'rue Richepin', '10', '10', '29200', 'Brest', 'drl', '48.417118', '-4.490471', 'Arabe', 2, 29),
(68, 6, 'rue Richepin', '11', '11', '29200', 'Brest', 'brs', '48.417118', '-4.490471', '', 2, 29),
(69, 6, 'rue Richepin', '12', '12', '29200', 'Brest', 'mrt', '48.417118', '-4.490471', '', 2, 29),
(70, 6, 'rue Richepin', '13', '13', '29200', 'Brest', 'dcz', '48.417118', '-4.490471', '', 2, 29),
(71, 6, 'rue Richepin', '14', '14', '29200', 'Brest', 'szn', '48.417118', '-4.490471', '', 2, 29),
(72, 6, 'rue Richepin', '15', '15', '29200', 'Brest', 'llt', '48.417118', '-4.490471', '', 2, 29),
(73, 6, 'rue Richepin', '16', '16', '29200', 'Brest', 'ppr', '48.417118', '-4.490471', 'Russe', 2, 29),
(74, 6, 'rue Richepin', '17', '17', '29200', 'Brest', 'lcl', '48.417118', '-4.490471', '', 2, 29),
(75, 6, 'rue Richepin', '18', '18', '29200', 'Brest', 'ftm', '48.417126', '-4.490471', '', 2, 29),
(76, 4, 'rue Richepin', 'A1', '17', '29200', 'Brest', 'tch', '48.417126', '-4.490306', 'Arabe', 2, 29),
(77, 4, 'rue Richepin', 'B1', '18', '29200', 'Brest', 'cnt', '48.417126', '-4.490306', '', 2, 29),
(78, 4, 'rue Richepin', 'A2', '15', '29200', 'Brest', 'dls', '48.417126', '-4.490306', '', 2, 29),
(79, 4, 'rue Richepin', 'B2', '16', '29200', 'Brest', 'brt', '48.417126', '-4.490306', '', 2, 29),
(80, 4, 'rue Richepin', 'A3', '13', '29200', 'Brest', 'jzq', '48.417126', '-4.490306', '', 2, 29),
(81, 4, 'rue Richepin', 'B3', '14', '29200', 'Brest', 'ri', '48.417126', '-4.490306', '', 2, 29),
(82, 4, 'rue Richepin', 'A4', '11', '29200', 'Brest', 'chb', '48.417126', '-4.490306', '', 2, 29),
(83, 4, 'rue Richepin', 'B4', '12', '29200', 'Brest', 'brn', '48.417126', '-4.490306', '', 2, 29),
(84, 4, 'rue Richepin', 'A5', '9', '29200', 'Brest', 'dnt', '48.417126', '-4.490306', '', 2, 29),
(85, 4, 'rue Richepin', 'B5', '10', '29200', 'Brest', 'cdt mc', '48.417126', '-4.490306', '', 2, 29),
(86, 4, 'rue Richepin', 'A6', '7', '29200', 'Brest', 'cdt', '48.417126', '-4.490306', '', 2, 29),
(87, 4, 'rue Richepin', 'B6', '8', '29200', 'Brest', 'pll', '48.417126', '-4.490306', '', 2, 29),
(88, 4, 'rue Richepin', 'A7', '5', '29200', 'Brest', 'brg', '48.417126', '-4.490306', '', 2, 29),
(89, 4, 'rue Richepin', 'B7', '6', '29200', 'Brest', 'clt', '48.417126', '-4.490306', '', 2, 29),
(90, 4, 'rue Richepin', 'A8', '3', '29200', 'Brest', 'npp', '48.417126', '-4.490306', '', 2, 29),
(91, 4, 'rue Richepin', 'B8', '4', '29200', 'Brest', 'kht', '48.417126', '-4.490306', '', 2, 29),
(92, 4, 'rue Richepin', 'A9', '1', '29200', 'Brest', 'pg', '48.417113', '-4.490306', '', 2, 29),
(93, 4, 'rue Richepin', 'B9', '2', '29200', 'Brest', 'hml', '48.417113', '-4.490306', '', 2, 29),
(94, 2, 'rue Richepin', 'A1', '17', '29200', 'Brest', 'brn', '48.417113', '-4.489965', '', 2, 29),
(95, 2, 'rue Richepin', 'B1', '18', '29200', 'Brest', 'mdn', '48.417113', '-4.489965', '', 2, 29),
(96, 2, 'rue Richepin', 'A2', '15', '29200', 'Brest', 'hmd', '48.417113', '-4.489965', '', 2, 29),
(97, 2, 'rue Richepin', 'B2', '16', '29200', 'Brest', 'zdn', '48.417113', '-4.489965', '', 2, 29),
(98, 2, 'rue Richepin', 'A3', '13', '29200', 'Brest', 'grd', '48.417113', '-4.489965', '', 2, 29),
(99, 2, 'rue Richepin', 'B3', '14', '29200', 'Brest', 'gbn', '48.417113', '-4.489965', '', 2, 29),
(100, 2, 'rue Richepin', 'A4', '11', '29200', 'Brest', 'st', '48.417113', '-4.489965', '', 2, 29),
(101, 2, 'rue Richepin', 'B4', '12', '29200', 'Brest', 'lmb', '48.417113', '-4.489965', '', 2, 29),
(102, 2, 'rue Richepin', 'A5', '9', '29200', 'Brest', 'bd', '48.417113', '-4.489965', '', 2, 29),
(103, 2, 'rue Richepin', 'B5', '10', '29200', 'Brest', 'mdt', '48.417113', '-4.489965', '', 2, 29),
(104, 2, 'rue Richepin', 'A6', '7', '29200', 'Brest', 'bgv', '48.417113', '-4.489965', '', 2, 29),
(105, 2, 'rue Richepin', 'B6', '8', '29200', 'Brest', 'gn', '48.417113', '-4.489965', '', 2, 29),
(106, 2, 'rue Richepin', 'A7', '5', '29200', 'Brest', 'lln', '48.417113', '-4.489965', '', 2, 29),
(107, 2, 'rue Richepin', 'B7', '6', '29200', 'Brest', 'mn', '48.417113', '-4.489965', '', 2, 29),
(108, 2, 'rue Richepin', 'A8', '3', '29200', 'Brest', 'trh', '48.417113', '-4.489965', '', 2, 29),
(109, 2, 'rue Richepin', 'B8', '4', '29200', 'Brest', 'nms', '48.417113', '-4.489965', '', 2, 29),
(110, 2, 'rue Richepin', 'A9', '1', '29200', 'Brest', 'mrc', '48.417113', '-4.489965', '', 2, 29),
(111, 2, 'rue Richepin', 'B9', '2', '29200', 'Brest', 'lgn', '48.417113', '-4.489965', '', 2, 29),
(112, 2, 'cité Chanoine Chapalin', 'A1', '9', '29200', 'Brest', 'pss', '48.415964', '-4.489652', '', 2, 29),
(113, 2, 'cité Chanoine Chapalin', 'B1', '10', '29200', 'Brest', 'mrr', '48.415964', '-4.489652', '', 2, 29),
(114, 2, 'cité Chanoine Chapalin', 'A2', '7', '29200', 'Brest', 'flr', '48.415964', '-4.489652', '', 2, 29),
(115, 2, 'cité Chanoine Chapalin', 'B2', '8', '29200', 'Brest', 'gn', '48.415964', '-4.489652', '', 2, 29),
(116, 2, 'cité Chanoine Chapalin', 'A3', '5', '29200', 'Brest', 'krb', '48.415964', '-4.489652', '', 2, 29),
(117, 2, 'cité Chanoine Chapalin', 'B3', '6', '29200', 'Brest', 'gll', '48.415964', '-4.489652', '', 2, 29),
(118, 2, 'cité Chanoine Chapalin', 'A4', '3', '29200', 'Brest', 'cd', '48.415964', '-4.489652', '', 2, 29),
(119, 2, 'cité Chanoine Chapalin', 'B4', '4', '29200', 'Brest', 'crr', '48.415964', '-4.489652', '', 2, 29),
(120, 2, 'cité Chanoine Chapalin', 'A5', '1', '29200', 'Brest', 'bgc', '48.415964', '-4.489652', '', 2, 29),
(121, 2, 'cité Chanoine Chapalin', 'B5', '2', '29200', 'Brest', 'hmd', '48.415964', '-4.489652', '', 2, 29),
(122, 4, 'cité Chanoine Chapalin', 'A1', '9', '29200', 'Brest', 'll', '48.415964', '-4.489785', '', 2, 29),
(123, 4, 'cité Chanoine Chapalin', 'B1', '10', '29200', 'Brest', 'vll', '48.415964', '-4.489785', '', 2, 29),
(124, 4, 'cité Chanoine Chapalin', 'A2', '7', '29200', 'Brest', 'flr', '48.415964', '-4.489785', '', 2, 29),
(125, 4, 'cité Chanoine Chapalin', 'B2', '8', '29200', 'Brest', 'krb', '48.415964', '-4.489785', '', 2, 29),
(126, 4, 'cité Chanoine Chapalin', 'A3', '5', '29200', 'Brest', 'thm', '48.415964', '-4.489785', '', 2, 29),
(127, 4, 'cité Chanoine Chapalin', 'B3', '6', '29200', 'Brest', 'prr', '48.415964', '-4.489785', '', 2, 29),
(128, 4, 'cité Chanoine Chapalin', 'A4', '3', '29200', 'Brest', 'brh', '48.415964', '-4.489785', '', 2, 29),
(129, 4, 'cité Chanoine Chapalin', 'B4', '4', '29200', 'Brest', 'smn', '48.415964', '-4.489785', '', 2, 29),
(130, 4, 'cité Chanoine Chapalin', 'A5', '1', '29200', 'Brest', 'rsc', '48.415964', '-4.489785', '', 2, 29),
(131, 4, 'cité Chanoine Chapalin', 'B5', '2', '29200', 'Brest', 'ln', '48.415964', '-4.489785', '', 2, 29),
(132, 6, 'cité Chanoine Chapalin', 'A1', '9', '29200', 'Brest', 'krl', '48.415980', ' -4.490075', '', 2, 29),
(133, 6, 'cité Chanoine Chapalin', 'B1', '10', '29200', 'Brest', 'you', '48.415980', ' -4.490075', '', 2, 29),
(134, 6, 'cité Chanoine Chapalin', 'A2', '7', '29200', 'Brest', 'chb', '48.415980', ' -4.490075', '', 2, 29),
(135, 6, 'cité Chanoine Chapalin', 'B2', '8', '29200', 'Brest', 'ghn', '48.415980', ' -4.490075', '', 2, 29),
(136, 6, 'cité Chanoine Chapalin', 'A3', '5', '29200', 'Brest', 'nld', '48.415980', ' -4.490075', '', 2, 29),
(137, 6, 'cité Chanoine Chapalin', 'B3', '6', '29200', 'Brest', 'lms', '48.415980', ' -4.490075', '', 2, 29),
(138, 6, 'cité Chanoine Chapalin', 'A4', '3', '29200', 'Brest', 'bll', '48.415980', ' -4.490075', '', 2, 29),
(139, 6, 'cité Chanoine Chapalin', 'B4', '4', '29200', 'Brest', 'brb', '48.415980', ' -4.490075', '', 2, 29),
(140, 6, 'cité Chanoine Chapalin', 'A5', '1', '29200', 'Brest', 'crg', '48.415980', ' -4.490075', '', 2, 29),
(141, 6, 'cité Chanoine Chapalin', 'B5', '2', '29200', 'Brest', 'mlh', '48.415980', ' -4.490075', '', 2, 29),
(142, 8, 'cité Chanoine Chapalin', 'A1', '9', '29200', 'Brest', 'lhs', '48.416020', '-4.490120', '', 2, 29),
(143, 8, 'cité Chanoine Chapalin', 'B1', '10', '29200', 'Brest', 'sd', '48.416020', '-4.490120', '', 2, 29),
(144, 8, 'cité Chanoine Chapalin', 'A2', '7', '29200', 'Brest', 'lbr', '48.416020', '-4.490120', '', 2, 29),
(145, 8, 'cité Chanoine Chapalin', 'B2', '8', '29200', 'Brest', 'krr', '48.416020', '-4.490120', '', 2, 29),
(146, 8, 'cité Chanoine Chapalin', 'A3', '5', '29200', 'Brest', 'srr', '48.416020', '-4.490120', '', 2, 29),
(147, 8, 'cité Chanoine Chapalin', 'B3', '6', '29200', 'Brest', 'bkl', '48.416020', '-4.490120', '', 2, 29),
(148, 8, 'cité Chanoine Chapalin', 'A4', '3', '29200', 'Brest', 'trl', '48.416020', '-4.490120', '', 2, 29),
(149, 8, 'cité Chanoine Chapalin', 'B4', '4', '29200', 'Brest', 'mls', '48.416020', '-4.490120', '', 2, 29),
(150, 8, 'cité Chanoine Chapalin', 'A5', '1', '29200', 'Brest', 'lcs', '48.416020', '-4.490120', '', 2, 29),
(151, 8, 'cité Chanoine Chapalin', 'B5', '2', '29200', 'Brest', 'vll', '48.416020', '-4.490120', '', 2, 29),
(152, 10, 'cité Chanoine Chapalin', 'A1', '9', '29200', 'Brest', 'lgr', '48.416221', '-4.490123', '', 2, 29),
(153, 10, 'cité Chanoine Chapalin', 'B1', '10', '29200', 'Brest', 'dgr', '48.416221', '-4.490123', '', 2, 29),
(154, 10, 'cité Chanoine Chapalin', 'A2', '7', '29200', 'Brest', 'ltl', '48.416221', '-4.490123', '', 2, 29),
(155, 10, 'cité Chanoine Chapalin', 'B2', '8', '29200', 'Brest', 'trg', '48.416221', '-4.490123', '', 2, 29),
(156, 10, 'cité Chanoine Chapalin', 'A3', '5', '29200', 'Brest', 'jcb', '48.416221', '-4.490123', '', 2, 29),
(157, 10, 'cité Chanoine Chapalin', 'B3', '6', '29200', 'Brest', 'blm', '48.416221', '-4.490123', '', 2, 29),
(158, 10, 'cité Chanoine Chapalin', 'A4', '3', '29200', 'Brest', 'crr', '48.416221', '-4.490123', '', 2, 29),
(159, 10, 'cité Chanoine Chapalin', 'B4', '4', '29200', 'Brest', 'mks', '48.416221', '-4.490123', '', 2, 29),
(160, 10, 'cité Chanoine Chapalin', 'A5', '1', '29200', 'Brest', 'lcc', '48.416221', '-4.490123', '', 2, 29),
(161, 10, 'cité Chanoine Chapalin', 'B5', '2', '29200', 'Brest', 'gvr', '48.416221', '-4.490123', '', 2, 29),
(162, 10, 'rue des Ajoncs d\'or', '1', '1', '29200', 'Brest', 'lcr', '48.417420', '-4.484236', '', 2, 29),
(163, 10, 'rue des Ajoncs d\'or', '2', '2', '29200', 'Brest', 'lhr', '48.417420', '-4.484236', '', 2, 29),
(164, 10, 'rue des Ajoncs d\'or', '3', '3', '29200', 'Brest', 'brb', '48.417420', '-4.484236', '', 2, 29),
(165, 10, 'rue des Ajoncs d\'or', '4', '4', '29200', 'Brest', 'rff', '48.417420', '-4.484236', '', 2, 29),
(166, 10, 'rue des Ajoncs d\'or', '5', '5', '29200', 'Brest', 'tum', '48.417420', '-4.484236', '', 2, 29),
(167, 10, 'rue des Ajoncs d\'or', '6', '6', '29200', 'Brest', 'slr', '48.417420', '-4.484236', '', 2, 29),
(168, 10, 'rue des Ajoncs d\'or', '7', '7', '29200', 'Brest', 'ghr', '48.417420', '-4.484236', '', 2, 29),
(169, 10, 'rue des Ajoncs d\'or', '8', '8', '29200', 'Brest', 'lmb', '48.417420', '-4.484236', '', 2, 29),
(170, 10, 'rue des Ajoncs d\'or', '9', '9', '29200', 'Brest', 'lbr', '48.417420', '-4.484236', '', 2, 29),
(171, 10, 'rue des Ajoncs d\'or', '10', '10', '29200', 'Brest', 'jvm', '48.417420', '-4.484236', '', 2, 29),
(172, 10, 'rue des Ajoncs d\'or', '11', '11', '29200', 'Brest', 'lgl', '48.417420', '-4.484236', '', 2, 29),
(173, 10, 'rue des Ajoncs d\'or', '12', '12', '29200', 'Brest', 'dsd', '48.417420', '-4.484236', '', 2, 29),
(174, 10, 'rue des Ajoncs d\'or', '13', '13', '29200', 'Brest', 'hyr', '48.417420', '-4.484236', '', 2, 29),
(175, 10, 'rue des Ajoncs d\'or', '14', '14', '29200', 'Brest', 'crg', '48.417420', '-4.484236', '', 2, 29),
(176, 10, 'rue des Ajoncs d\'or', '15', '15', '29200', 'Brest', 'llv', '48.417420', '-4.484236', '', 2, 29),
(177, 10, 'rue des Ajoncs d\'or', '16', '16', '29200', 'Brest', 'ars', '48.417420', '-4.484236', '', 2, 29),
(178, 10, 'rue des Ajoncs d\'or', '17', '17', '29200', 'Brest', 'mrz', '48.417420', '-4.484236', '', 2, 29),
(179, 10, 'rue des Ajoncs d\'or', '18', '18', '29200', 'Brest', 'bnn', '48.417420', '-4.484236', '', 2, 29),
(180, 10, 'rue des Ajoncs d\'or', '19', '19', '29200', 'Brest', 'bpt', '48.417420', '-4.484236', '', 2, 29),
(181, 10, 'rue des Ajoncs d\'or', '20', '20', '29200', 'Brest', 'grr', '48.417420', '-4.484236', '', 2, 29),
(182, 10, 'rue des Ajoncs d\'or', '21', '21', '29200', 'Brest', 'bbc', '48.417420', '-4.484236', '', 2, 29),
(183, 10, 'rue des Ajoncs d\'or', '22', '22', '29200', 'Brest', 'clr', '48.417420', '-4.484236', '', 2, 29),
(184, 10, 'rue des Ajoncs d\'or', '23', '23', '29200', 'Brest', 'lbr', '48.417420', '-4.484236', '', 2, 29),
(185, 10, 'rue des Ajoncs d\'or', '24', '24', '29200', 'Brest', 'llc', '48.417420', '-4.484236', 'Arabe', 2, 29),
(186, 10, 'rue des Ajoncs d\'or', '25', '25', '29200', 'Brest', 'mrd', '48.417420', '-4.484236', '', 2, 29),
(187, 10, 'rue des Ajoncs d\'or', '26', '26', '29200', 'Brest', 'dkh', '48.417420', '-4.484236', '', 2, 29),
(188, 10, 'rue des Ajoncs d\'or', '27', '27', '29200', 'Brest', 'glt', '48.417420', '-4.484236', '', 2, 29),
(189, 10, 'rue des Ajoncs d\'or', '28', '28', '29200', 'Brest', 'lbr', '48.417420', '-4.484236', '', 2, 29),
(190, 10, 'rue des Ajoncs d\'or', '29', '29', '29200', 'Brest', 'brg', '48.417420', '-4.484236', 'Mahorais', 2, 29),
(191, 10, 'rue des Ajoncs d\'or', '30', '30', '29200', 'Brest', 'gss', '48.417420', '-4.484236', '', 2, 29),
(192, 8, 'rue des Ajoncs d\'or', 'A1', '8', '29200', 'Brest', 'hmm', '48.417564', '-4.484106', '', 2, 29),
(193, 8, 'rue des Ajoncs d\'or', 'B1', '7', '29200', 'Brest', 'lgd', '48.417564', '-4.484106', '', 2, 29),
(194, 8, 'rue des Ajoncs d\'or', 'A2', '5', '29200', 'Brest', 'mnz', '48.417564', '-4.484106', '', 2, 29),
(195, 8, 'rue des Ajoncs d\'or', 'B2', '6', '29200', 'Brest', 'brc', '48.417564', '-4.484106', '', 2, 29),
(196, 8, 'rue des Ajoncs d\'or', 'A3', '4', '29200', 'Brest', 'bln', '48.417564', '-4.484106', '', 2, 29),
(197, 8, 'rue des Ajoncs d\'or', 'B3', '3', '29200', 'Brest', 'dbr', '48.417564', '-4.484106', '', 2, 29),
(198, 8, 'rue des Ajoncs d\'or', 'A4', '2', '29200', 'Brest', 'dmt', '48.417564', '-4.484106', '', 2, 29),
(199, 8, 'rue des Ajoncs d\'or', 'B4', '1', '29200', 'Brest', 'mnc', '48.417564', '-4.484106', '', 2, 29),
(200, 6, 'rue des Ajoncs d\'or', 'A1', '7', '29200', 'Brest', 'mrg', '48.417666', '-4.484162', '', 2, 29),
(201, 6, 'rue des Ajoncs d\'or', 'B1', '6', '29200', 'Brest', 'kdk', '48.417666', '-4.484162', '', 2, 29),
(202, 6, 'rue des Ajoncs d\'or', 'A2', '5', '29200', 'Brest', 'mrt', '48.417666', '-4.484162', '', 2, 29),
(203, 6, 'rue des Ajoncs d\'or', 'B2', '4', '29200', 'Brest', 'rio', '48.417666', '-4.484162', '', 2, 29),
(204, 6, 'rue des Ajoncs d\'or', 'A3', '3', '29200', 'Brest', 'dbt', '48.417666', '-4.484162', '', 2, 29),
(205, 6, 'rue des Ajoncs d\'or', 'B3', '?', '29200', 'Brest', 'zrk?', '48.417666', '-4.484162', '', 2, 29),
(206, 6, 'rue des Ajoncs d\'or', 'A4', '1', '29200', 'Brest', 'lft', '48.417666', '-4.484162', '', 2, 29),
(207, 6, 'rue des Ajoncs d\'or', 'B4', '2', '29200', 'Brest', 'dhr?', '48.417666', '-4.484162', 'Mahorais', 2, 29),
(208, 4, 'rue des Ajoncs d\'or', '', '1', '29200', 'Brest', 'maa', '48.417789', '-4.484281', '', 2, 29),
(209, 4, 'rue des Ajoncs d\'or', '', '2', '29200', 'Brest', 'krb', '48.417789', '-4.484281', '', 2, 29),
(210, 4, 'rue des Ajoncs d\'or', '', '3', '29200', 'Brest', 'slh', '48.417789', '-4.484281', '', 2, 29),
(211, 4, 'rue des Ajoncs d\'or', '', '4', '29200', 'Brest', 'hfd', '48.417789', '-4.484281', '', 2, 29),
(212, 4, 'rue des Ajoncs d\'or', '', '5', '29200', 'Brest', 'mdc', '48.417789', '-4.484281', '', 2, 29),
(213, 4, 'rue des Ajoncs d\'or', '', '6', '29200', 'Brest', 'bzn', '48.417789', '-4.484281', '', 2, 29),
(214, 4, 'rue des Ajoncs d\'or', '', '7', '29200', 'Brest', 'crs', '48.417789', '-4.484281', '', 2, 29),
(215, 4, 'rue des Ajoncs d\'or', '', '8', '29200', 'Brest', '?', '48.417789', '-4.484281', '', 2, 29),
(216, 2, 'rue des Ajoncs d\'or', '', '1', '29200', 'Brest', 'lgr', '48.417813', '-4.484490', '', 2, 29),
(217, 2, 'rue des Ajoncs d\'or', '', '2', '29200', 'Brest', 'dmr', '48.417813', '-4.484490', '', 2, 29),
(218, 2, 'rue des Ajoncs d\'or', '', '3', '29200', 'Brest', 'chr', '48.417813', '-4.484490', 'Arabe', 2, 29),
(219, 2, 'rue des Ajoncs d\'or', '', '4', '29200', 'Brest', 'st', '48.417813', '-4.484490', '', 2, 29),
(220, 2, 'rue des Ajoncs d\'or', '', '5', '29200', 'Brest', 'bns', '48.417813', '-4.484490', '', 2, 29),
(221, 2, 'rue des Ajoncs d\'or', '', '6', '29200', 'Brest', 'lmg', '48.417813', '-4.484490', '', 2, 29),
(222, 2, 'rue des Ajoncs d\'or', '', '7', '29200', 'Brest', 'prg', '48.417813', '-4.484490', '', 2, 29),
(223, 2, 'rue des Ajoncs d\'or', '', '8', '29200', 'Brest', '?', '48.417813', '-4.484490', '', 2, 29),
(224, 2, 'rue richepin', '', '2e Gauche', '29200', 'brest', '', '48.4168975', '-4.4900184', 'Mahorais', 2, 29),
(225, 3, 'RUE TARTU', 'A2', '234', '29200', 'BREST', '', '48.3836159', '-4.5242413', 'Arabe', 2, 29),
(226, 3, 'TARTU', 'A2', '234', '29200', 'BREST', '', '48.3836159', '-4.5242413', 'Arabe', 2, 29),
(227, 4, 'Rue Vedrines', '', '', '29200', 'Brest', '29200', '48.3860726', '-4.5063638', 'Arabe', 2, 29),
(228, 4, 'Rue Vedrines', '', '', '29200', 'Brest', '29200', '48.3860726', '-4.5063638', 'Arabe', 2, 29),
(229, 4, 'Rue Vedrines', '', '', '29200', 'Brest', '29200', '48.3860726', '-4.5063638', 'Arabe', 2, 29),
(230, 4, 'Rue Vedrines', '', '', '29200', 'Brest', '29200', '48.3860726', '-4.5063638', 'Arabe', 2, 29),
(231, 4, 'Rue Vedrines', '', '', '29200', 'Brest', '29200', '48.3860726', '-4.5063638', 'Arabe', 2, 29),
(232, 96, 'Rue Vedrines', '', '', '29200', 'Brest', '29200', '48.3868912', '-4.5046005', 'Arabe', 2, 29);

-- --------------------------------------------------------

--
-- Structure de la table `congregation`
--

DROP TABLE IF EXISTS `congregation`;
CREATE TABLE IF NOT EXISTS `congregation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `congregation`
--

INSERT INTO `congregation` (`id`, `nom`) VALUES
(1, 'Elorn'),
(2, 'Europe'),
(3, 'Iroise'),
(4, 'Université');

-- --------------------------------------------------------

--
-- Structure de la table `langue`
--

DROP TABLE IF EXISTS `langue`;
CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `langue`
--

INSERT INTO `langue` (`id`, `nom`) VALUES
(1, 'Arabe'),
(2, 'Mahorais'),
(3, 'Russe'),
(4, 'Malgache'),
(5, 'Espagnol'),
(6, 'NPV.fr');

-- --------------------------------------------------------

--
-- Structure de la table `territoire`
--

DROP TABLE IF EXISTS `territoire`;
CREATE TABLE IF NOT EXISTS `territoire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(20) DEFAULT NULL,
  `id_congreg` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_congreg` (`id_congreg`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `territoire`
--

INSERT INTO `territoire` (`id`, `numero`, `id_congreg`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 1, 2),
(30, 2, 2),
(31, 3, 2),
(32, 4, 2),
(33, 5, 2),
(34, 6, 2),
(35, 7, 2),
(36, 8, 2),
(37, 9, 2),
(38, 10, 2),
(39, 11, 2),
(40, 12, 2),
(41, 13, 2),
(42, 14, 2),
(43, 15, 2),
(44, 16, 2),
(45, 17, 2),
(46, 18, 2),
(47, 19, 2),
(48, 20, 2),
(49, 21, 2),
(50, 22, 2),
(51, 23, 2),
(52, 24, 2),
(53, 25, 2),
(54, 26, 2),
(55, 27, 2),
(56, 28, 2),
(57, 1, 3),
(58, 2, 3),
(59, 3, 3),
(60, 4, 3),
(61, 5, 3),
(62, 6, 3),
(63, 7, 3),
(64, 8, 3),
(65, 9, 3),
(66, 10, 3),
(67, 11, 3),
(68, 12, 3),
(69, 13, 3),
(70, 14, 3),
(71, 15, 3),
(72, 16, 3),
(73, 17, 3),
(74, 18, 3),
(75, 19, 3),
(76, 20, 3),
(77, 21, 3),
(78, 22, 3),
(79, 23, 3),
(80, 24, 3),
(81, 25, 3),
(82, 26, 3),
(83, 27, 3),
(84, 28, 3),
(85, 1, 4),
(86, 2, 4),
(87, 3, 4),
(88, 4, 4),
(89, 5, 4),
(90, 6, 4),
(91, 7, 4),
(92, 8, 4),
(93, 9, 4),
(94, 10, 4),
(95, 11, 4),
(96, 12, 4),
(97, 13, 4),
(98, 14, 4),
(99, 15, 4),
(100, 16, 4),
(101, 17, 4),
(102, 18, 4),
(103, 19, 4),
(104, 20, 4),
(105, 21, 4),
(106, 22, 4),
(107, 23, 4),
(108, 24, 4),
(109, 25, 4),
(110, 26, 4),
(111, 27, 4),
(112, 28, 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`) VALUES
(1, 'romu', '295613cf96b984a89f0818fec1909fdee3a6f929', 'romuald.raye@gmail.com'),
(2, 'khouya', 'b86667cd55d95cbb6d1ea1cf8528ce9f85e2d53d', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `territoire`
--
ALTER TABLE `territoire`
  ADD CONSTRAINT `territoire_ibfk_1` FOREIGN KEY (`id_congreg`) REFERENCES `congregation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

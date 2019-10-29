-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Out-2019 às 03:05
-- Versão do servidor: 10.4.6-MariaDB
-- versão do PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sgestoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(700) DEFAULT NULL,
  `isvalid` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `password`, `isvalid`, `updated_at`, `created_at`) VALUES
(5, 'Mateus', 'Ferreira', 'mreisf.geral@gmail.com', '$2y$10$vIESbLR7dxQO3hAIgkcT4Oe5TcEc5jsxyKbnqCLLsB1z7NFZ/413y', 1, '2019-10-20 04:25:06', '2019-09-25 06:28:35');

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `AdmLogin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `isadmin` int(11) DEFAULT NULL,
  `isvalid` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `firstname`, `lastname`, `email`, `cliente_id`, `password`, `isadmin`, `isvalid`, `updated_at`, `created_at`) VALUES
(28, 'Mateus', 'Reis', 'm@g.com', 28, '$2y$10$xkhRlyaNH3ASvSNhPxsXCOIjqhbNCF.swZ6cV0T10hbXo45EnHmBK', 1, 1, '2019-10-19 17:37:44', '2019-10-15 02:33:47'),
(31, 'Marcos', 'Carlos', 'mc@g.com', NULL, '$2y$10$w.Fcyo9p.oa4Wgo4P7xn6ug8xqNrJFuF/eKVy1KjZBlYJnCScCNNe', 1, 1, '2019-10-29 04:17:28', '2019-10-29 04:17:28'),
(32, 'Mariana', 'Pires', 'mp@g.com', NULL, '$2y$10$twZFbrk4nAZoWlNtv37S8eE1v6mGS1XvvWLgX7AACHwR/XAPDDsxW', 1, 1, '2019-10-29 04:17:53', '2019-10-29 04:17:53'),
(33, 'Ricardo', 'Ribeiro', 'rr@g.com', NULL, '$2y$10$paOBxyGPQTLT41OUWxgqmuuVqLdRrh6OQZ7EblCYbe.sY0R0DKwSu', 1, 1, '2019-10-29 04:18:11', '2019-10-29 04:18:11'),
(34, 'Mario', 'Armando', 'ma@g.com', NULL, '$2y$10$HImkA0gmABa6E/4Y5Qhqr.tcK91iL2Hxr0wBz9mC0rvPwxKEDQwfy', 1, 1, '2019-10-29 04:26:26', '2019-10-29 04:18:32'),
(35, 'Carlos', 'Vieira', 'cv@g.com', NULL, '$2y$10$VQtR8SuJZEWVL/m3QzyBrOpEtLMKQubst6ui2PhqumhMdtCG/M7Hy', 1, 1, '2019-10-29 04:18:52', '2019-10-29 04:18:52'),
(36, 'Carolina', 'Marques', 'cm@g.com', NULL, '$2y$10$61emaegL.qFMVzrPp7qvPeTSOoLOTLRGwU4AR67px6RB3oYElnXLK', 1, 1, '2019-10-29 04:19:08', '2019-10-29 04:19:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_password_resets`
--

CREATE TABLE `cliente_password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `motivo` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `entradas`
--

INSERT INTO `entradas` (`id`, `cliente_id`, `produto_id`, `quantidade`, `motivo`, `created_at`, `updated_at`) VALUES
(13, 28, 14, 100, 'Chegou', '2019-10-20 15:30:34', '2019-10-20 15:30:34'),
(14, 28, 14, 12, 'Chegou', '2019-12-20 17:20:43', '2019-10-25 23:14:50'),
(15, 28, 15, 12, 'Chegou', '2019-11-20 17:20:52', '2019-10-25 23:15:05'),
(16, 28, 16, 20, 'Chegou', '2019-10-20 17:21:11', '2019-10-20 17:21:11'),
(17, 28, 17, 14, 'Chegou', '2019-09-20 17:21:19', '2019-10-25 23:15:11'),
(18, 28, 18, 15, 'Chegou', '2019-10-20 17:21:42', '2019-10-20 17:21:42'),
(19, 28, 19, 10, 'Chegou', '2019-07-21 00:35:58', '2019-10-25 23:15:19'),
(20, 28, 15, 20, 'Chegou', '2019-01-22 02:07:28', '2019-10-25 23:15:26');

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_24_031714_create_admin_password_resets_table', 2),
(5, '2019_09_24_031737_create_cliente_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `precocompra` varchar(100) DEFAULT NULL,
  `precovenda` varchar(100) DEFAULT NULL,
  `datavencimento` varchar(15) DEFAULT NULL,
  `qtdmin` int(11) DEFAULT NULL,
  `qtdmax` int(11) DEFAULT NULL,
  `qtdatual` int(11) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `isactive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `cliente_id`, `nome`, `precocompra`, `precovenda`, `datavencimento`, `qtdmin`, `qtdmax`, `qtdatual`, `descricao`, `updated_at`, `created_at`, `isactive`) VALUES
(14, 28, 'Vectra Tubarão1', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 102, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(15, 28, 'Vectra Tubarão2', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 12, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(16, 28, 'Vectra Tubarão3', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 20, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(17, 28, 'Vectra Tubarão4', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 14, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(18, 28, 'Vectra Tubarão5', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 15, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(19, 28, 'Vectra Tubarão6', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 10, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(20, 28, 'Vectra Tubarão7', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(21, 28, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(22, 31, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(23, 31, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(24, 31, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(25, 31, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(26, 31, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(27, 32, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(28, 32, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(29, 32, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(30, 32, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(31, 32, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(32, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(33, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(34, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(35, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(36, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(37, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(38, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(39, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(40, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(41, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(42, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(43, 33, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(44, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(45, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(46, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(47, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(48, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(49, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(50, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(51, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(52, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(53, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(54, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(55, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(56, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(57, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(58, 34, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(59, 35, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(60, 36, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(61, 36, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(62, 36, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(63, 36, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(64, 36, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(65, 36, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(66, 36, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0),
(67, 36, 'Vectra Tubarão8', '22.000,00', '25.000,00', '15/04/2050', 13, 15, 0, 'Carro de macho', '2019-10-21 00:38:19', '2019-10-20 15:30:14', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `saidas`
--

CREATE TABLE `saidas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `motivo` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `saidas`
--

INSERT INTO `saidas` (`id`, `cliente_id`, `produto_id`, `quantidade`, `motivo`, `created_at`, `updated_at`) VALUES
(7, 28, 14, 10, 'Vendeu', '2019-10-20 15:30:43', '2019-10-20 15:30:43'),
(8, 28, 15, 5, 'Vendeu', '2019-10-22 03:07:06', '2019-10-22 03:07:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Índices para tabela `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_admlogin_index` (`AdmLogin`);

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Índices para tabela `cliente_password_resets`
--
ALTER TABLE `cliente_password_resets`
  ADD KEY `cliente_password_resets_email_index` (`email`);

--
-- Índices para tabela `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Índices para tabela `saidas`
--
ALTER TABLE `saidas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de tabela `saidas`
--
ALTER TABLE `saidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jul-2021 às 18:40
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `perfectpay`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `email`, `cpf`) VALUES
(6, 'Erika Ribeiro Marques', 'erika@b2sdigital.com.br', '5689784213');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `descontoPercentual` float DEFAULT NULL,
  `descontoValor` float NOT NULL,
  `valorTotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `descricao`, `preco`, `descontoPercentual`, `descontoValor`, `valorTotal`) VALUES
(1, 'Teclado gamer Evolut', 'Este teclado Evolut de alto desempenho permite que você desfrute de horas ilimitadas de jogos. Foi especialmente desenvolvido para que você possa expressar suas habilidades e seu estilo. Melhore a sua experiência de jogo, seja você só um amador ou todo um especialista, e faça que suas jogadas atingam outro nível.', 98.98, 0, 0, 0),
(3, 'Mouse sem fio', 'Com uma trajetória de mais de 30 anos no mercado brasileiro, a Multilaser é uma das maiores representantes do segmento de eletrônicos e informáticos. Os mouses da Multilaser têm uma capacidade de resposta rápida e podem ser transportados sem danificar a sua estrutura. Eles são caracterizados por uma textura macia, que favorece os movimentos tornando-os mais leves e proporcionando mais agilidade.', 29.89, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `idVenda` int(11) NOT NULL,
  `idProduto` int(11) DEFAULT NULL,
  `produto` varchar(50) DEFAULT NULL,
  `dataCompra` varchar(11) DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `descontoPercentual` float DEFAULT NULL,
  `descontoValor` float DEFAULT NULL,
  `valorTotal` float DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`idVenda`, `idProduto`, `produto`, `dataCompra`, `preco`, `descontoPercentual`, `descontoValor`, `valorTotal`, `status`, `idCliente`, `nome`, `email`, `cpf`) VALUES
(2, 1, 'Teclado gamer Evolut', '15/07/2021', 98.98, 50, 0, 49.49, 'Vendido', 7, 'Bruno Santana', 'bruno@b2sdigital.com.br', '31849983801'),
(3, 3, 'Mouse sem fio', '15/07/2021', 29.89, 10, 0, 26.9, 'Vendido', 7, 'Bruno Santana', 'bruno@b2sdigital.com.br', '31849983801'),
(4, 1, 'Teclado gamer Evolut', '15/07/2021', 98.98, 5, 0, 94.03, 'Vendido', 6, 'Erika Ribeiro Marques', 'erika@b2sdigital.com.br', '5689784213'),
(5, 3, 'Mouse sem fio', '15/07/2021', 29.89, 0, 5, 24.89, 'Vendido', 6, 'Erika Ribeiro Marques', 'erika@b2sdigital.com.br', '5689784213');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idVenda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

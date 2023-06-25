-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 25/06/2023 às 20:26
-- Versão do servidor: 10.5.20-MariaDB
-- Versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id20002774_sistemadeencomendas`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `codigocliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(320) NOT NULL,
  `senha` varchar(64) DEFAULT NULL,
  `telefone` varchar(19) NOT NULL,
  `endereco` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbcliente`
--

INSERT INTO `tbcliente` (`codigocliente`, `nome`, `cpf`, `email`, `senha`, `telefone`, `endereco`) VALUES
(1, 'Otávio', '147.445.506-90', 'otaviobigogno37@gmail.com', '123', '+55 (32) 99999-2383', 'Nacasadele');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbencomenda`
--

CREATE TABLE `tbencomenda` (
  `codigoencomenda` int(11) NOT NULL,
  `codigocliente` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbencomenda`
--

INSERT INTO `tbencomenda` (`codigoencomenda`, `codigocliente`, `data`, `status`) VALUES
(1, 1, '2023-05-16 17:26:21', 'Enviado'),
(4, 1, '2023-05-18 17:02:21', 'Preparando'),
(6, 1, '2023-06-15 18:31:34', 'Preparando');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbitens`
--

CREATE TABLE `tbitens` (
  `codigoitem` int(11) NOT NULL,
  `codigoencomenda` int(11) NOT NULL,
  `codigoproduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbitens`
--

INSERT INTO `tbitens` (`codigoitem`, `codigoencomenda`, `codigoproduto`, `quantidade`) VALUES
(1, 1, 1, 3),
(4, 4, 1, 5),
(5, 6, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbproduto`
--

CREATE TABLE `tbproduto` (
  `codigoproduto` int(11) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `preco` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tbproduto`
--

INSERT INTO `tbproduto` (`codigoproduto`, `categoria`, `descricao`, `preco`) VALUES
(1, 'Hamburguer', 'Hamburguer X-man', 9.90),
(4, 'Sobremesas', 'Torta de Sorvete', 12.90),
(5, 'Bebidas', 'Coca Cola', 6.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`codigocliente`);

--
-- Índices de tabela `tbencomenda`
--
ALTER TABLE `tbencomenda`
  ADD PRIMARY KEY (`codigoencomenda`),
  ADD KEY `fk_codclient` (`codigocliente`);

--
-- Índices de tabela `tbitens`
--
ALTER TABLE `tbitens`
  ADD PRIMARY KEY (`codigoitem`),
  ADD KEY `fk_codcodproduto` (`codigoproduto`),
  ADD KEY `fk_codencomenda` (`codigoencomenda`);

--
-- Índices de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  ADD PRIMARY KEY (`codigoproduto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `codigocliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tbencomenda`
--
ALTER TABLE `tbencomenda`
  MODIFY `codigoencomenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbitens`
--
ALTER TABLE `tbitens`
  MODIFY `codigoitem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tbproduto`
--
ALTER TABLE `tbproduto`
  MODIFY `codigoproduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbencomenda`
--
ALTER TABLE `tbencomenda`
  ADD CONSTRAINT `fk_codclient` FOREIGN KEY (`codigocliente`) REFERENCES `tbcliente` (`codigocliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbitens`
--
ALTER TABLE `tbitens`
  ADD CONSTRAINT `fk_codcodproduto` FOREIGN KEY (`codigoproduto`) REFERENCES `tbproduto` (`codigoproduto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_codencomenda` FOREIGN KEY (`codigoencomenda`) REFERENCES `tbencomenda` (`codigoencomenda`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

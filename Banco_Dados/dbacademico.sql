-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Jun-2023 às 03:16
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbacademico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `senha` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `matricula`, `senha`) VALUES
(1, 'Beatriz', '2024009', 'Jorge@love'),
(2, 'Alice', '2023008', 'Teste@123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `idAluno` int(11) NOT NULL,
  `nomeAluno` varchar(60) NOT NULL,
  `turno` varchar(60) NOT NULL,
  `curso` varchar(60) NOT NULL,
  `tipoCurso` varchar(60) NOT NULL,
  `usuarioAluno` varchar(15) DEFAULT NULL,
  `senhaAluno` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`idAluno`, `nomeAluno`, `turno`, `curso`, `tipoCurso`, `usuarioAluno`, `senhaAluno`) VALUES
(1, 'Alice Lima Soares', 'vespertino', 'Sistemas para Intern', 'Superior de Tecnolog', 'alsoares086', 'Comida@123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE `curso` (
  `idCurso` int(11) NOT NULL,
  `nomeCurso` varchar(60) NOT NULL,
  `cargaHorariaCurso` float NOT NULL,
  `tipoCurso` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`idCurso`, `nomeCurso`, `cargaHorariaCurso`, `tipoCurso`) VALUES
(1, 'Meio Ambiente', 2000, 'Médio Integrado'),
(2, 'Agropecuaria', 2000, 'Médio Integrado'),
(3, 'Edificacoes', 2000, 'Médio Integrado'),
(4, 'Redes de Computadores', 2000, 'Médio Integrado'),
(5, 'Informatica', 2000, 'Médio Integrado'),
(6, 'Administracao', 2000, 'Médio Integrado'),
(7, 'Florestas', 2000, 'Médio Integrado'),
(8, 'Financas', 2000, 'Médio Integrado'),
(9, 'Agricultura', 2000, 'Médio Integrado'),
(10, 'Alimentos', 2000, 'Médio Integrado'),
(11, 'Biotecnologia', 2000, 'Médio Integrado'),
(12, 'Recursos Pesqueiros', 2000, 'Médio Integrado'),
(13, 'Agroecologia', 2000, 'Técnico Subsequente'),
(14, 'Agronegocio', 2000, 'Técnico Subsequente'),
(15, 'Agroindustria', 2000, 'Técnico Subsequente'),
(16, 'Gestao Ambiental', 2000, 'Técnico Subsequente'),
(17, 'Logistica', 2000, 'Técnico Subsequente'),
(18, 'Processos Escolares', 2000, 'Técnico Subsequente'),
(19, 'Agronegocio', 3000, 'Superior de Tecnologia'),
(20, 'Agroindustria', 3000, 'Superior de Tecnologia'),
(21, 'Gestao Ambiental', 3000, 'Superior de Tecnologia'),
(22, 'Logistica', 3000, 'Superior de Tecnologia'),
(23, 'Sistemas para internet', 3000, 'Superior de Tecnologia'),
(24, 'Processos Escolares', 3000, 'Superior de Tecnologia'),
(25, 'Administracao', 4000, 'Bacharelado'),
(26, 'Zootecnia', 4000, 'Bacharelado'),
(27, 'Ciencias Biologicas', 4000, 'Licenciatura'),
(28, 'Fisica', 4000, 'Licenciatura'),
(29, 'Matematica', 4000, 'Licenciatura'),
(30, 'Quimica', 4000, 'Licenciatura'),
(31, 'Logistica Empresarial', 4000, 'Especialização'),
(32, 'Educacao Profissional - EPT', 4000, 'Especialização'),
(33, 'Projeto Agricultor Familiar', 4000, 'Especialização'),
(34, 'Mestrado em EPT', 2000, 'Mestrado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `nomeDisciplina` varchar(60) NOT NULL,
  `cargaHorariaDisciplina` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `idProfessor` int(11) NOT NULL,
  `nomeProfessor` varchar(60) NOT NULL,
  `escolaridade` varchar(60) NOT NULL,
  `especializacao` varchar(60) NOT NULL,
  `usuarioProfessor` varchar(15) DEFAULT NULL,
  `senhaProfessor` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`idProfessor`, `nomeProfessor`, `escolaridade`, `especializacao`, `usuarioProfessor`, `senhaProfessor`) VALUES
(1, 'Breno', 'Doutor', 'Java', 'Breninho', 'Breno@123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`idAluno`);

--
-- Índices para tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`idCurso`);

--
-- Índices para tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`idProfessor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `idAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `idCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `idProfessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
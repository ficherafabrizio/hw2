-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 12:41 AM
-- Server version: 8.0.27
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hw2`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `user_id` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `track` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`user_id`, `track`) VALUES
('utente1', '0cfTmOAORo6FhOkHW2sG86'),
('utente1', '0RZUN6TaQUGLOqqDfrRPQU'),
('utente1', '1EsuHeJcVUl8JF0MlU7mjj'),
('utente1', '2RAeer1ojirtcXdcagTCDg'),
('utente1', '2YByIMqNtTb0T072UDfTo9'),
('utente1', '38mQZ5tZ6IylQaJCCF90ox'),
('utente1', '3Fzlg5r1IjhLk2qRw667od'),
('utente1', '4AR83bEn1c1MlykwTfxcwX'),
('utente2', '4pqLUtJaFUsbLTjYaCM0sC'),
('utente1', '6Agc6F2std10P7rwKOwhrg'),
('utente1', '6KuHjfXHkfnIjdmcIvt9r0'),
('utente1', '7Ddq6LRk5FaqPHSphrV1ls');

-- --------------------------------------------------------

--
-- Table structure for table `canzone`
--

CREATE TABLE `canzone` (
  `track` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nome` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `canzone`
--

INSERT INTO `canzone` (`track`, `nome`) VALUES
('0cfTmOAORo6FhOkHW2sG86', 'Synthwave Is Dead'),
('0RZUN6TaQUGLOqqDfrRPQU', 'La guerra dei pastelli a cera'),
('1EsuHeJcVUl8JF0MlU7mjj', 'Snooze'),
('2RAeer1ojirtcXdcagTCDg', 'Sayonara'),
('2YByIMqNtTb0T072UDfTo9', 'The Top - Extended'),
('38mQZ5tZ6IylQaJCCF90ox', 'The Top'),
('3Fzlg5r1IjhLk2qRw667od', 'Dancing in the Moonlight'),
('4AR83bEn1c1MlykwTfxcwX', 'Walking All Day'),
('4pqLUtJaFUsbLTjYaCM0sC', 'Canzone'),
('6Agc6F2std10P7rwKOwhrg', 'Wake Up, Ciri'),
('6KuHjfXHkfnIjdmcIvt9r0', 'On Top Of The World'),
('7Ddq6LRk5FaqPHSphrV1ls', 'Keep On Running');

-- --------------------------------------------------------

--
-- Table structure for table `pagina`
--

CREATE TABLE `pagina` (
  `data` date NOT NULL,
  `contenuto` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pagina`
--

INSERT INTO `pagina` (`data`, `contenuto`, `user`, `id`) VALUES
('2022-05-22', 'wwwwwwwww', 'utente6', 1),
('2022-05-28', 'Prova di pagina lalalalal', 'utente1', 2),
('2022-05-28', 'fffffffffffff', 'utente6', 3),
('2022-05-29', 'Una pagina di diario scritta da utente1 lalalala', 'utente1', 4),
('2022-05-29', 'prova prova prova', 'utente3', 5),
('2022-05-29', 'ddffdfdfd', 'utente6', 6),
('2022-06-19', 'adsfasdasdasd', 'utente1', 7),
('2022-06-20', 'asdfsadfsadfdas', 'utente1', 8),
('2022-06-21', 'Speriamo vada bene......', 'utente1', 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('dfdffdfd', 'sdfF4'),
('sddsdsds', 'Secret1'),
('sddsdsdsw', 'Secret1'),
('utente1', 'Secret1'),
('utente1sds', 'sadasF4'),
('utente2', 'Secret2'),
('utente3', 'Secret3'),
('utente4', 'Secret4'),
('utente5', 'Secret5'),
('utente6', 'Secret5'),
('utenteA', 'Secret1'),
('utentehjhj', 'bvjhhKK343'),
('utenteS', 'dsdsdsDD22'),
('utenteX', 'Password1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`user_id`,`track`),
  ADD KEY `track_ibfk_1` (`track`);

--
-- Indexes for table `canzone`
--
ALTER TABLE `canzone`
  ADD PRIMARY KEY (`track`);

--
-- Indexes for table `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagina_ibfk_1` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `track_ibfk_1` FOREIGN KEY (`track`) REFERENCES `canzone` (`track`) ON DELETE CASCADE,
  ADD CONSTRAINT `userid_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`username`) ON DELETE CASCADE;

--
-- Constraints for table `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `pagina_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`username`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

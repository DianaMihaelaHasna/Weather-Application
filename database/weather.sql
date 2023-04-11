-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: apr. 11, 2023 la 09:44 PM
-- Versiune server: 10.4.24-MariaDB
-- Versiune PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `weather`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `favorites`
--

CREATE TABLE `favorites` (
  `id_user` varchar(100) NOT NULL,
  `oras` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id_user` varchar(100) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `parola` varchar(100) NOT NULL,
  `tara` varchar(100) NOT NULL,
  `oras` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`id_user`, `nume`, `prenume`, `email`, `parola`, `tara`, `oras`) VALUES
('1', 'Ion', 'Vasile', 'vasile.ion99@yahoo.com', '1234', 'Romania', 'Sannicolau Mare'),
('2', 'Alexandra', 'Popescu', 'pop.alex99@gmail.com', 'parola', 'Romania', 'Timisoara'),
('3', 'Gaga', 'Marian', 'marian.gaga@yahoo.com', 'nustiu', 'Romania', 'Timisoara'),
('4', 'Florin', 'Mara', 'mara_florin2@yahoo.com', 'parola', 'Romania', 'Timisoara');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `favorites`
--
ALTER TABLE `favorites`
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

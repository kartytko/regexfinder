-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 16 Sty 2018, 11:40
-- Wersja serwera: 10.1.28-MariaDB
-- Wersja PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `regex`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES
(1, 'XYZ', '$2y$10$V.182BYXnji/C37twOklzO1bdqFD9FhD7xzvg./WAk0RvKBhrJDFW', 'xyz@gmail.com'),
(4, 'Adam', 'aaa', ''),
(5, 'alaaa', '$2y$10$DWX6jQ6NlGP9s1gglHCoVOvkzTgO6YIBsxBQKD7Cy4kkn4fhsHYHS', 'ola@ala.com'),
(6, 'jak', '$2y$10$JcVLlxMinx0qalewx5jrV.4EpLpppLTNTuMGMJ4yDNFh6EeoUuUl2', 'jak@op.pl'),
(7, 'werkapozerka', '$2y$10$ONHRiduPPjdeR2fp/K5wleODl/eAtIPYf.avdBDaIZzrBu7Fd6PMq', 'tytkowe@op.pl'),
(8, 'ala', '$2y$10$wuOYb3Th0PQSyUHW25ZjXONrJ1XNJKgcbL8p0t2i/PozrU4gP1q56', 'ala@op.pl'),
(9, 'karolina', '$2y$10$Q9/dihtnSoeLxGXoNY4WiOOl17OQkY4CjHomLjYJ.EsQtt9QOLwla', 'karilina@op.pl');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

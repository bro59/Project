-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2026 at 12:16 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectsoccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Content` varchar(70) NOT NULL,
  `CommentID` int(11) NOT NULL,
  `playerID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Content`, `CommentID`, `playerID`, `UserID`) VALUES
('uh', 1, 2, 1),
('jhmgfncb ', 2, 2, 1),
('PEDRI THE GOAT', 3, 14, 1),
('lkyjgcnv ', 4, 1, 1),
('hlyifhkouhjk', 5, 1, 1),
('hkmv noukhjgvbuoihykjgvngikjnbcoyituydgfxghcfdfsxvjfhcvbkygjhfcbv', 6, 1, 1),
('hkmv noukhjgvbuoihykjgvngikjnbcoyituydgfxghcfdfsxvjfhcvbkygjhfcbv', 7, 1, 1),
('ryfhvnm', 8, 1, 1),
('ryfhvnm', 9, 1, 1),
('ihjvn ', 10, 1, 1),
('youyigj', 11, 1, 1),
('youyigj', 12, 1, 1),
('youyigj', 13, 1, 1),
('youyigj', 14, 1, 1),
('ytyit', 15, 1, 1),
('ytyit', 16, 1, 1),
('gnv', 17, 1, 1),
('gnv', 18, 1, 1),
('uyftdhbn', 19, 1, 1),
('uyjfgj', 20, 1, 1),
('uyjfgj', 21, 1, 1),
('knjl,n', 22, 1, 1),
('iyuthb', 23, 14, 1),
('7oyikgj', 24, 14, 1),
('7oyikgj', 25, 14, 1),
('7oyikgj', 26, 14, 1),
('yigjv bbm', 27, 14, 1),
('yigjv bbm', 28, 14, 1),
('jfkgm', 29, 1, 1),
('jfkgm', 30, 1, 1),
('jfkgm', 31, 1, 1),
('jfkgm', 32, 1, 1),
('jfkgm', 33, 1, 1),
('jfkgm', 34, 1, 1),
('jfkgm', 35, 1, 1),
('jfkgm', 36, 1, 1),
('i am barca', 37, 14, 1),
('i am barca', 38, 14, 1),
('i am barca', 39, 14, 1),
('i am barca', 40, 14, 1),
('i am barca', 41, 14, 1),
('i am barca', 42, 14, 1),
('nAVIDAD', 43, 14, 1),
('FIRST COMMENT', 44, 23, 1),
('FIRST COMMENT', 45, 23, 1),
('benpiukjn', 46, 1, 2),
('jhgfnjfhvn', 47, 1, 2),
('hi', 48, 14, 2),
('LKNB ', 49, 14, 2),
('YLTUKGHM', 50, 14, 2),
('KJH,BM BIULH,', 51, 14, 2),
('uyktnc ', 52, 14, 2),
('Hi, First Comment.', 53, 7, 2),
('SUPERMAN JOAN GARCIA.', 54, 2, 2),
('THE BEST', 55, 2, 2),
('Third User', 56, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `playerName` varchar(25) NOT NULL,
  `squadNum` int(11) NOT NULL,
  `Position` varchar(25) NOT NULL,
  `detailedPos` varchar(25) NOT NULL,
  `Age` int(11) NOT NULL,
  `Nationality` varchar(25) NOT NULL,
  `playerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`playerName`, `squadNum`, `Position`, `detailedPos`, `Age`, `Nationality`, `playerID`) VALUES
('Marc-André ter Stegen', 1, 'Goalkeeper', 'GK', 33, 'Germany', 1),
('Joan García', 13, 'Goalkeeper', 'GK', 24, 'Spain', 2),
('Wojciech Szczęsny', 25, 'Goalkeeper', 'GK', 35, 'Poland', 3),
('Diego Kochen', 31, 'Goalkeeper', 'GK', 19, 'USA', 4),
('Alejandro Balde', 3, 'Defender', 'Left Back (LB)', 22, 'Spain', 5),
('Ronald Araújo', 4, 'Defender', 'Center Back (CB)', 26, 'Uruguay', 6),
('Pau Cubarsí', 5, 'Defender', 'Center Back (CB)', 18, 'Spain', 7),
('Andreas Christensen', 15, 'Defender', 'Center Back (CB)', 29, 'Denmark', 8),
('Gerard Martín', 18, 'Defender', 'Left Back (LB)', 23, 'Spain', 9),
('Jules Koundé', 23, 'Defender', 'Right Back (RB)', 27, 'France', 10),
('Eric García', 24, 'Defender', 'Center Back (CB) / RB', 24, 'Spain', 11),
('Jofre Torrents', 26, 'Defender', 'Center Back (CB)', 18, 'Spain', 12),
('Gavi', 6, 'Midfielder', 'Central Midfielder (CM)', 21, 'Spain', 13),
('Pedri', 8, 'Midfielder', 'Central Midfielder (CM)', 23, 'Spain', 14),
('Fermín López', 16, 'Midfielder', 'Attacking Midfielder (AM)', 22, 'Spain', 15),
('Marc Casadó', 17, 'Midfielder', 'Central Midfielder (CM)', 22, 'Spain', 16),
('Dani Olmo', 20, 'Midfielder', 'Attacking Midfielder (AM)', 27, 'Spain', 17),
('Frenkie de Jong', 21, 'Midfielder', 'Central Midfielder (CM)', 28, 'Netherlands', 18),
('Marc Bernal', 22, 'Midfielder', 'Central Midfielder (CM)', 18, 'Spain', 19),
('Lamine Yamal', 10, 'Forward', 'Right Winger (RW)', 18, 'Spain', 20),
('Roony Bardghji', 19, 'Forward', 'Right Winger (RW)', 20, 'Sweden', 21),
('Raphinha', 11, 'Forward', 'Left Winger (LW)', 29, 'Brazil', 22),
('Marcus Rashford', 14, 'Forward', 'Left Winger (LW)', 28, 'England', 23),
('Ferran Torres', 7, 'Forward', 'Striker (ST)', 25, 'Spain', 24),
('Robert Lewandowski', 9, 'Forward', 'Striker (ST)', 37, 'Poland', 25),
('arc-André ter Stagen', 190, 'Goalkeeper', 'GK', 93, 'Zimbabwe', 37);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserName`, `password`, `UserID`) VALUES
('beni', '$2y$10$/RIHmyqa4pt1Mxrx.4GNKe7CPEBHNE9wjRmylIv95bQ1xQ2qHdBrC', 1),
('Daniel', '$2y$10$54/GwENGnlYqcSNV8SmEJuC7jL8GWpb0lIe7vkpt37Tcu8z4j/ejG', 2),
('Daniel90', '$2y$10$kRJbBGQ1LU0MFX48C3p6COlADIckcr8YLRUInCghW8EH4Mena.yqm', 3),
('Lionel', '$2y$10$56uK6ZpHikLCDcetzLOFT..sJKlYNUjv2LcNGCM5xNlVl96jxSjVG', 4),
('Messi', '$2y$10$SEpG8AOYrTRG.n/t8UyuUumh2rrWcwpfZ2zVZvaRAVSwPc/vglZIq', 5),
('Admin13', '$2y$10$DdXd.TzUu7ZptAjHltlBm.jRnt/v2eWLSMMBdbPyCJY4fFTsPdbTm', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `fk_comment_player` (`playerID`),
  ADD KEY `fk_comment_user` (`UserID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`playerID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `playerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comment_player` FOREIGN KEY (`playerID`) REFERENCES `player` (`playerID`),
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

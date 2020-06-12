-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 12, 2020 at 06:39 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `archSlate`
--

-- --------------------------------------------------------

--
-- Table structure for table `hobby`
--

CREATE TABLE `hobby` (
                         `id` int(11) NOT NULL,
                         `hobby` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subhobby`
--

CREATE TABLE `subhobby` (
                            `id` int(11) NOT NULL,
                            `subhobby` varchar(100) DEFAULT NULL,
                            `hobbyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `username` varchar(30) DEFAULT NULL,
                        `password` varchar(100) DEFAULT NULL,
                        `role` enum('Admin','Editor','Author') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(4, 'aaa@email.com', '$2y$10$9r45MG//SbTRNo4Zj7PRzOez9yazLCz5VkKa56KfTPB', NULL),
(5, 'aaabbb@email.com', '$2y$10$ys4I6ReMyMwqCLj07aj6BOyqWgKz7v4199PnincdwYE', NULL),
(6, 'qqqaaa@email.com', '$2y$10$KeLlP1puiUQ6gM0bYz/dQeio3hnu2AT5Dtm28dNTd8.6sGd6if8Ei', NULL),
(7, 'qqqaa2a@email.com', '$2y$10$8GLeNYYFfiA/S1aDSQtXtOFDXTe9zdTtbsTBFaYDf91xCbfqAmMKG', NULL),
(8, 'www@gmail.com', '$2y$10$uEI/OcOl563zfE9EqyxM1uXI9TEYx0eud4cK1W09odqrAzAwqp94m', NULL),
(9, 'pratik@gmail.com', '$2y$10$JPTaidKR73iFjxkox5eVHOB0pSoSaGp1H3OKu/7/DWmSvXiJSrFTG', 'Admin'),
(10, 'bels@gmi.com', '$2y$10$zqmWZT3VwsOJ2g0m52bjF.tp0TozlGkh85ZaRuhek051UMN8JhpKC', NULL),
(11, 'aa@a.com', '$2y$10$keY5WkgJ659gMNCUgYDVieAf8iVXiMkIw5XyofD4oX6p7s7bDElVK', NULL),
(12, 'aaa@aaa.com', '$2y$10$ZNuYuzEfzTnK9qkneRr.9.K8McUIdUVm3gdij8tMDm2KjDxcZcDLu', NULL),
(13, 'ddd@dd.com', '$2y$10$9LBPzcIm7ip8Bc/a8MnxO.Zx1v75ZH1NJtv.CGEY/kpGfjae7onwm', NULL),
(14, 'eee@ee.com', '$2y$10$bVrqVAKABOQ9YnqhlH70Sudizh/ldr1OyuoxFEtZb9VDUD9pW3B4W', NULL),
(15, 'mmmm@mm.com', '$2y$10$H6Jk8FfIOs6dFtmpB.JVnOmf6XhQ/75bUtkQ9JGAjRvKaF24aD1fm', NULL),
(16, 'pratik1@gmail.com', '$2y$10$8pEGtCn/LQ3u4jHXahv8j.JBV1oXltAI1iBsWw9TOryjjfwKj7JdC', NULL),
(17, 'pratik2@gmail.com', '$2y$10$/fIY1XZJD2WoH5c0cvJW3.u4uFuE9Drlrnc3fkOSDx7bXJt71TrPi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userHobby`
--

CREATE TABLE `userHobby` (
                             `userid` int(11) DEFAULT NULL,
                             `hid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hobby`
--
ALTER TABLE `hobby`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subhobby`
--
ALTER TABLE `subhobby`
    ADD PRIMARY KEY (`id`),
    ADD KEY `fk_hobbyid` (`hobbyid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userHobby`
--
ALTER TABLE `userHobby`
    ADD KEY `fk_hid` (`hid`),
    ADD KEY `fk_uid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hobby`
--
ALTER TABLE `hobby`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `subhobby`
--
ALTER TABLE `subhobby`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--
--
-- Constraints for table `subhobby`
--
ALTER TABLE `subhobby`
    ADD CONSTRAINT `fk_hobbyid` FOREIGN KEY (`hobbyid`) REFERENCES `hobby` (`id`) ON DELETE CASCADE,
    ADD CONSTRAINT `subhobby_ibfk_1` FOREIGN KEY (`hobbyid`) REFERENCES `hobby` (`id`);

--
-- Constraints for table `userHobby`
--
ALTER TABLE `userHobby`
    ADD CONSTRAINT `fk_hid` FOREIGN KEY (`hid`) REFERENCES `hobby` (`id`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_uid` FOREIGN KEY (`userid`) REFERENCES `user` (`id`) ON DELETE CASCADE,
    ADD CONSTRAINT `userhobby_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`),
    ADD CONSTRAINT `userhobby_ibfk_2` FOREIGN KEY (`hid`) REFERENCES `hobby` (`id`);

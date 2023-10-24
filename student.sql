-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12 أكتوبر 2023 الساعة 19:01
-- إصدار الخادم: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

DELIMITER $$
--
-- الإجراءات
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `show` ()  SELECT students.namestu ,subjects.namesub,grades.gradeis,specia.namespe FROM students INNER JOIN grades ON students.id = grades.stu_id
INNER JOIN subjects ON grades.sub_id = subjects.id INNER JOIN specia ON students.spe_id = specia.id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `showstu` (IN `nn` INT, IN `mm` INT)  SELECT * FROM students WHERE un_number=nn AND password = mm$$

DELIMITER ;

-- --------------------------------------------------------

--
-- بنية الجدول `college`
--

CREATE TABLE `college` (
  `id` int(11) NOT NULL,
  `namecol` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `college`
--

INSERT INTO `college` (`id`, `namecol`) VALUES
(3, 'الحاسبات'),
(4, 'الطب'),
(5, 'الاداب'),
(6, 'التربية');

-- --------------------------------------------------------

--
-- بنية الجدول `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `sub_id` int(11) DEFAULT NULL,
  `gradeis` int(11) DEFAULT NULL,
  `spe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `grades`
--

INSERT INTO `grades` (`id`, `stu_id`, `sub_id`, `gradeis`, `spe_id`) VALUES
(695, 94, 7, 100, 5),
(696, 94, 6, 100, 5),
(697, 95, 6, 100, 5),
(698, 95, 6, 100, 5),
(699, 95, 6, 100, 5),
(700, 94, 6, 99, 5),
(701, 94, 6, 99, 5);

-- --------------------------------------------------------

--
-- بنية الجدول `specia`
--

CREATE TABLE `specia` (
  `id` int(11) NOT NULL,
  `namespe` varchar(50) DEFAULT NULL,
  `col_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `specia`
--

INSERT INTO `specia` (`id`, `namespe`, `col_id`) VALUES
(5, 'تقنية المعلومات', 3),
(6, 'علوم الحاسوب', 3),
(7, 'طب بشري', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `namestu` varchar(50) NOT NULL,
  `password` varchar(11) NOT NULL,
  `spe_id` int(11) NOT NULL,
  `un_number` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `un_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `students`
--

INSERT INTO `students` (`id`, `namestu`, `password`, `spe_id`, `un_number`, `level`, `un_id`) VALUES
(94, 'NAHARI', '12', 5, 1, 1, 3),
(95, 'NAHARI', '12', 7, 2, 1, 4);

-- --------------------------------------------------------

--
-- بنية الجدول `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `namesub` varchar(50) DEFAULT NULL,
  `spe_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `subjects`
--

INSERT INTO `subjects` (`id`, `namesub`, `spe_id`) VALUES
(6, 'جراحة', 5),
(7, 'jjj', 7),
(8, 'تطوير الويب', 6),
(9, 'gggg', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_ibfk_1` (`stu_id`),
  ADD KEY `grades_ibfk_2` (`sub_id`),
  ADD KEY `grades_ibfk_3` (`spe_id`);

--
-- Indexes for table `specia`
--
ALTER TABLE `specia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specia_ibfk_1` (`col_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `un_number` (`un_number`),
  ADD KEY `students_ibfk_1` (`spe_id`),
  ADD KEY `students_ibfk_2` (`un_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_ibfk_1` (`spe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=706;

--
-- AUTO_INCREMENT for table `specia`
--
ALTER TABLE `specia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`sub_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_3` FOREIGN KEY (`spe_id`) REFERENCES `specia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `specia`
--
ALTER TABLE `specia`
  ADD CONSTRAINT `specia_ibfk_1` FOREIGN KEY (`col_id`) REFERENCES `college` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`spe_id`) REFERENCES `specia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`un_id`) REFERENCES `college` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- القيود للجدول `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`spe_id`) REFERENCES `specia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

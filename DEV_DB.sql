-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.35-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for fpmt_07
CREATE DATABASE IF NOT EXISTS `fpmt_07` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fpmt_07`;

-- Dumping structure for table fpmt_07.activities
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.activities: ~3 rows (approximately)
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
REPLACE INTO `activities` (`id`, `faculty_id`, `name`) VALUES
	(1, 1, 'Chair of Dental Informatics WG in IMIA (International Medical Informatics Association) 		          2000- 2006'),
	(8, 97, 'Activity'),
	(9, 97, 'test 6 final');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.awards
CREATE TABLE IF NOT EXISTS `awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.awards: ~1 rows (approximately)
/*!40000 ALTER TABLE `awards` DISABLE KEYS */;
REPLACE INTO `awards` (`id`, `faculty_id`, `name`, `organization`, `year`, `description`) VALUES
	(9, 97, 'honor name', 'organization name', 'year', 'description');
/*!40000 ALTER TABLE `awards` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.certification
CREATE TABLE IF NOT EXISTS `certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.certification: ~2 rows (approximately)
/*!40000 ALTER TABLE `certification` DISABLE KEYS */;
REPLACE INTO `certification` (`id`, `faculty_id`, `name`, `organization`, `date`) VALUES
	(8, 89, 'Certificate Name', 'Certificate Organization', 'Date'),
	(10, 97, 'name ', 'organixation', 'date'),
	(11, 1, 'Test Award', 'MU', '2019');
/*!40000 ALTER TABLE `certification` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Departments for tying staff to the relevant bodies';

-- Dumping data for table fpmt_07.departments: ~6 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
REPLACE INTO `departments` (`id`, `name`) VALUES
	(1, 'Dean\'s Office'),
	(2, 'Computer Science'),
	(3, 'Applied Science'),
	(4, 'Engineering'),
	(6, 'Research Engineer');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.description
CREATE TABLE IF NOT EXISTS `description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.description: ~8 rows (approximately)
/*!40000 ALTER TABLE `description` DISABLE KEYS */;
REPLACE INTO `description` (`id`, `faculty_id`, `description`) VALUES
	(4, 65, 'This is an description for teaching interest...'),
	(6, 89, 'I have 2+ years teaching experience in Computer Science and Software Engineering programs at Texas Tech University and Marshall University. The average of teaching effectiveness for the last 2+ years (Summer II 2014 - Fall 2016) in terms of Lecture Rating, Instructor Rating and Subject Rating at Texas Tech University is (4.64/5.00), (4.57/5.00) and (4.48/5.00), respectively. I was awarded 2015 Helen Devitt Jones Excellence in Graduate Teaching Award at Texas Tech University.'),
	(7, 89, 'I have 2+ years teaching experience in Computer Science and Software Engineering programs at Texas Tech University and Marshall University. The average of teaching effectiveness for the last 2+ years (Summer II 2014 - Fall 2016) in terms of Lecture Rating, Instructor Rating and Subject Rating at Texas Tech University is (4.64/5.00), (4.57/5.00) and (4.48/5.00), respectively. I was awarded 2015 Helen Devitt Jones Excellence in Graduate Teaching Award at Texas Tech University.'),
	(9, 91, 'Dr. Paulus Wahjudi has been appointed to the Educational Testing Service National Advisory Committee for Computer Science.The Educational Testing Service National Advisory Committee plays an importantdw_s role in providing expert input into the development process for the Praxis tests. ETS selects a group of approximately 12 â€“ 15 educators from the nominees provided by the states to form a committee that is diverse with respect to gender, race and ethnicity, geography, instructional setting, and experience. The NAC will work closely with ETS assessment specialists to develop test specifications and test designs. NAC members may also be invited to write and/or review questions at a later date.'),
	(10, 92, 'Interesting to teach system-related courses at both graduate and undergraduate levels including Distributed Systems, Cloud Computing, and Database Systems. Besides the system-related courses, I have special interest in teaching Networking Fundamentals, Network Management, and Wireless and Mobile Networking. I also enjoyed taught OOP, Data Structure, and Algorithm.'),
	(26, 1, 'More than 20 year of teach experience in computer science, software engineering, and various informatics courses. Special interest in teaching Capstone project course.'),
	(27, 97, 'This is a test'),
	(29, 100, 'this is just test. the information will be added soon');
/*!40000 ALTER TABLE `description` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.division
CREATE TABLE IF NOT EXISTS `division` (
  `divisionId` int(5) NOT NULL AUTO_INCREMENT,
  `divisionName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`divisionId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.division: ~2 rows (approximately)
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
REPLACE INTO `division` (`divisionId`, `divisionName`) VALUES
	(1, 'Computer Science'),
	(2, 'Civil Engineering');
/*!40000 ALTER TABLE `division` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.education_records
CREATE TABLE IF NOT EXISTS `education_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `school` varchar(150) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `record` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Education records for staff and faculty';

-- Dumping data for table fpmt_07.education_records: ~3 rows (approximately)
/*!40000 ALTER TABLE `education_records` DISABLE KEYS */;
REPLACE INTO `education_records` (`id`, `faculty_id`, `staff_id`, `name`, `school`, `year`, `record`) VALUES
	(2, NULL, 46, 'schoo1', 'medina valley', '1990', 1),
	(3, NULL, 46, 'school2', 'Sedina Hills', '1980', 2),
	(4, NULL, 46, '', '', '0000', 3);
/*!40000 ALTER TABLE `education_records` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.faculty_member
CREATE TABLE IF NOT EXISTS `faculty_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `l_name` varchar(250) NOT NULL,
  `division` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `image` text,
  `phone` varchar(40) DEFAULT NULL,
  `office_address` varchar(140) DEFAULT NULL,
  `designation` text,
  `overview` text,
  `degree1` varchar(250) DEFAULT NULL,
  `degree1_year` int(100) DEFAULT NULL,
  `degree1_school` varchar(250) DEFAULT NULL,
  `degree2` varchar(100) DEFAULT NULL,
  `degree2_year` int(100) DEFAULT NULL,
  `degree2_school` varchar(250) DEFAULT NULL,
  `degree3` text,
  `degree3_year` int(50) DEFAULT NULL,
  `degree3_school` text,
  `status` enum('0','1') NOT NULL,
  `permissions` int(11) NOT NULL DEFAULT '0',
  `title` varchar(20) DEFAULT NULL COMMENT 'Ph.D.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.faculty_member: ~14 rows (approximately)
/*!40000 ALTER TABLE `faculty_member` DISABLE KEYS */;
REPLACE INTO `faculty_member` (`id`, `email`, `name`, `l_name`, `division`, `password`, `image`, `phone`, `office_address`, `designation`, `overview`, `degree1`, `degree1_year`, `degree1_school`, `degree2`, `degree2_year`, `degree2_school`, `degree3`, `degree3_year`, `degree3_school`, `status`, `permissions`, `title`) VALUES
	(1, 'yoow@marshall.edu', 'Wook-Sung', 'Yoo', 'Computer Science', '$2y$10$ZN3vBY6Hu1zApyrpAqWqXOz0r6nTFu5kSu/b43Jcv8/.D7ZM6RC7q', '../images/professor.jpg', '304-696-5452', 'WAEC 3101A', 'Chair & Professor', 'Dr. Wook-Sung Yoo joined the Marshall University in 2016 as a chair and professor. Prior to joining Marshall University, he was a chair of Computer Science and Software Engineering Program at Fairfield University in 2008-16 and an associate professor at computer and information science program, a director or bioinformatics program, and a director of GE/Gannon information Management Graduate Program at Gannon University. Erie, PA in 1998-2016. He also taught computer science in the Department of Computer science at Utah State University and worked at the Oral Health Services and informatics Department at the State University of New York at Buffalo as an assistant professor. He was a chair of the IMIA (International Medical Informatics Association) Dental Informatics working group 2000 â€“ 2006 and involved in various national wide commercial web and Informatics projects.', 'Ph.D', 1995, 'Florida Institute of Technology', 'M.S', 1988, 'Florida Institute of Technology', 'D.D.S', 1982, 'Seoul Natinal University', '1', 3, 'Ph. D.'),
	(89, 'cong@marshall.edu', 'Dr.Cong', 'Pu', '', '$2y$10$ZN3vBY6Hu1zApyrpAqWqXOz0r6nTFu5kSu/b43Jcv8/.D7ZM6RC7q', '../images/cpu.jpg', '304-696-6204', 'WAEC 3109-A', 'Assistant Professor', 'I am an Assistant Professor in the Division of Computer Science at Marshall University. I received the M.S. degree and Ph.D. degree in Computer Science from Texas Tech University, in 2013 and 2016, respectively. Before joining Marshall University, I was an Instructor in the Department of Computer Science at Texas Tech University. I was awarded 2015 Helen Devitt Jones Excellence in Graduate Teaching Award at Texas Tech University.', 'P.h.D', 2016, 'Texas Tech University', 'M.S', 2013, 'Texas Tech University', 'B.S', 2009, 'Zhengzhou University', '0', 0, NULL),
	(91, 'wahjudi123@marshall.edu', ' Wahjudi', 'Paulus', '', '$2y$10$9KfqaQbWlThwNdw5fhDHf.UqpqlDFE93KaSQMeiZRXTHPrNxWTX/S', '../images/wahjudi.jpg', '304-696-5443', 'WAEC 3113', 'Associate Professor ', 'Dr. Paulus Wahjudi has been appointed to the Educational Testing Service National Advisory Committee for Computer Science.The Educational Testing Service National Advisory Committee plays an importantdw_s role in providing expert input into the development process for the Praxis tests. ETS selects a group of approximately 12 â€“ 15 educators from the nominees provided by the states to form a committee that is diverse with respect to gender, race and ethnicity, geography, instructional setting, and experience. The NAC will work closely with ETS assessment specialists to develop test specifications and test designs. NAC members may also be invited to write and/or review questions at a later date.', 'PhD ', 2007, 'University of Southern Mississippi', '', 0, '', '', 0, '', '1', 0, NULL),
	(92, 'narman@marshall.edu', 'Husnu ', 'Narman', '', '$2y$10$CdjfooeBFxdU.lE69.j5SeLoeSnGJ1dl9Jjuv1AaLEqdq3Lk8olnq', '../images/husnu.png', '304-696-5829', 'WAEC 3107', 'Instructor', 'I am one of seven billion persons waiting to pass the door of eternal life in the world. While waiting, I married a wonderful woman, Fatma, have a son, Esat and a daughter, Elif. I am also pursuing my life as a instructor at Marshall University. I worked as a postdoc under supervisor, Dr. Haiying (Helen) Shen, at College of Engineering and Science, Clemson University. I completed my Bachelor of Science in Mathematics at Abant Izzet Baysal University in Turkey, Master of Computer Science at The University of Texas at San Antonio and PhD in Computer Science at University of Oklahoma. My PhD adviser is Dr. Mohammed Atiquzzaman. I worked with Dr. Turgay Korkmaz during my master.', 'PhD', 0, 'Computer Science at The University of Oklahoma (OU)', 'MS', 0, 'Computer Science at The University of Texas at San Antonio (UTSA)', 'BS', 0, 'Mathematics at Abant Izzet Baysal University (AIBU)', '1', 0, NULL),
	(97, 'cong123@marshall.com', 'Cong', 'Pu', '', '$2y$10$WDdrFEi3uh8TTjc86MNXl.tqAXTZb74jzP1KNhr18hTSpvd4Eh57i', '../images/cpu.jpg', '304-696-5443', 'WAEC 3101A', 'Associat Professor', 'testing............', 'degree one', 0, 'school', 'test', 0, 'test', 'test', 0, 'test', '1', 0, NULL),
	(98, 'malik123@marshall.edu', 'Haroon', 'Malik', '', '$2y$10$egObw6YlXUxYONKSKb5wi.3Xto5hMziapGxDZJqPDpLW7WRh/wome', NULL, '111-111-1111', 'WAEC 3101A', 'Assistant Professor ', '', '', 0, '', '', 0, '', '', 0, '', '1', 0, NULL),
	(99, 'meaghan123@marshall.edu', 'Meaghan ', 'Buckland', '', '$2y$10$ByjlWeAk4U5JZolqovAJhOwW63EusxqlzalOdBAZLroyL8Xds8pRu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, NULL),
	(100, 'jamil123@marshall.edu', 'Jamil', 'Chaudri', '', '$2y$10$1I41ZxtIiC8OzfpmzrBxFeoHbQ7RrHkH7JkZc6XBVsZZ7zxiOZDF2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL),
	(101, 'john123@marshall.edu', 'John', 'Biros', '', '$2y$10$K5DjEZGBtDgxyUIqv.mvSOBrJSFoABErgQuEwitJfrdI7N1bGXsBm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL),
	(102, 'pierson123@marshall.edu', 'Bill', 'Pierson', 'Civil Engineering', '$2y$10$NFPU2fu449qz4cqzZD13UuxhpFTAf0N4LXmKHwqg0xDwnuPywCJj.', '', '2109999999', 'WAEC 2303', 'Associate Professor', 'I like cake', 'BS Engineering', 2000, 'Lindale College', 'MS Engineering', 2002, 'University of Chicago', '', 0, '', '1', 0, NULL),
	(103, 'majdalani123@marshall.edu', 'Elias', 'Majdalani', '', '$2y$10$FCgbBmjkC/On75KtNFztUuk81S9yrz7Plj9kIKH.pm4mA2w7BuJky', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL),
	(104, 'fuller123@marshall.edu', 'James', 'Fuller', '', '$2y$10$.y6QNoxuhVrw9x.Uf60J/.7I2pf.YIHue.sCUpLRAR7GXf6iAT4Cq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0, NULL),
	(105, 'test1@mail.com', 'test', 'test', 'Civil Engineering', '$2y$10$rzUKjbZY5y0qBF3MiC7fOudcHN0bw1XqmaFGy.Tqzu3L2BJPGdooK', NULL, '2109999999', 'WAGG 123', '', 't', 't', 2000, 't', 't', 2004, 't', '', 0, '', '0', 0, NULL),
	(106, 'brinson6@live.marshall.edu', 'Dakota', 'Brinson', 'Computer Science', '$2y$10$ZN3vBY6Hu1zApyrpAqWqXOz0r6nTFu5kSu/b43Jcv8/.D7ZM6RC7q', '/cite/admin/assets/uploads/3c8601f.jpg', '2108469111', 'WAEC 2111', 'Assistant', 'A student who loves __sugar__, __PHP Code__, and other stuff...\r\n\r\nHere\'s a sample\r\n`<?php\r\necho \'Hello World\';\r\n?>`\r\n\r\n[My Site](https://deerbut.tk/)', 't', 2016, 't', 't', 2016, 't', 'tEllo', 2017, 'tarquin', '1', 1, NULL);
/*!40000 ALTER TABLE `faculty_member` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.funds
CREATE TABLE IF NOT EXISTS `funds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facult_id` int(11) NOT NULL,
  `project_name` varchar(250) NOT NULL,
  `fund_type` varchar(250) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `end_date` varchar(25) NOT NULL,
  `fund_sponsor` varchar(250) NOT NULL,
  `fund_amount` varchar(250) NOT NULL,
  `fund_des` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fpmt_07.funds: ~10 rows (approximately)
/*!40000 ALTER TABLE `funds` DISABLE KEYS */;
REPLACE INTO `funds` (`id`, `facult_id`, `project_name`, `fund_type`, `start_date`, `end_date`, `fund_sponsor`, `fund_amount`, `fund_des`) VALUES
	(63, 91, 'Collaborative Research: Implementing and Assessing Strategies for Environments for Fostering Effective Critical Thinking (EFFECTs) Development and Implementation', 'Research project', '2010', '2013', 'National Science Foundation', '', ''),
	(64, 91, 'Landslide Hazard Management System in West Virginia â€“ Phase I', 'Research Project', '2011', '2013', 'West Virginia Department of Transportation Division of Highways', '', ''),
	(65, 91, 'Development of Digital Inventory and GIS Web-Based Applications for West Virginiaâ€™s Outdoor Advertising Program', 'Research Project', '2011', '2012', 'West Virginia Department of Transportation Division of Highways', '', ''),
	(67, 89, 'Project Name', 'Fund Type', 'Start Date', 'End Date', 'Sponsor Name', 'Amount', 'Description'),
	(68, 92, 'Data Center Management', 'Research', 'June, 2017', 'August, 2017', 'Marshall University', '$2000.00', 'The aim of this project is to correctly provide desired services to users in reasonable time by using the minimum amount of resources.'),
	(69, 1, 'Prototype of Extended XDB with Wiki', 'Government', '2010', '2011', 'National Space (NASA) Grant Foundation', '$ 4,500', 'Develop a prototype of non-traditional of Extended XDB.'),
	(70, 1, 'Computing Education Academy', 'Government', '2011', '2012', 'Connecticut Space Grant College Consortium', '$7,500', 'Curriculum Development Grant '),
	(71, 1, 'Graduate Research Internship Program (GRIP) ', 'Industry', '1998', '2016', 'General Electrics and other industries', 'Approximately $1,200,000', 'Grant for Graduate Professional Track program'),
	(72, 97, 'test', 'test', 'test', 'test', 'test', 'test', 'test'),
	(73, 97, 'name', 'type', 'start date', 'end date', 'sponsor', 'amount', 'description');
/*!40000 ALTER TABLE `funds` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.industrial
CREATE TABLE IF NOT EXISTS `industrial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `organization` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `sdate` varchar(255) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.industrial: ~2 rows (approximately)
/*!40000 ALTER TABLE `industrial` DISABLE KEYS */;
REPLACE INTO `industrial` (`id`, `faculty_id`, `organization`, `city`, `state`, `country`, `job_title`, `sdate`, `edate`, `description`) VALUES
	(2, 1, 'General Electrics Transportation System', 'Erie', 'PA', 'USA', 'Consultant', '1998', '2015', 'Software Consultant and Director of Graduate Research Internship Program. '),
	(9, 97, 'organization', 'test', 'test', 'test', 'test', 'test', 'test', 'test');
/*!40000 ALTER TABLE `industrial` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.membership
CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.membership: ~2 rows (approximately)
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
REPLACE INTO `membership` (`id`, `faculty_id`, `name`) VALUES
	(1, 1, 'IEEE Computer Society'),
	(7, 97, 'IEEE');
/*!40000 ALTER TABLE `membership` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.news
CREATE TABLE IF NOT EXISTS `news` (
  `newsId` int(5) NOT NULL AUTO_INCREMENT,
  `title` text,
  `status` varchar(10) DEFAULT NULL,
  `dateAndTime` varchar(50) DEFAULT NULL,
  `professorName` varchar(100) DEFAULT NULL,
  `facultyId` int(5) DEFAULT NULL,
  `imageName` text,
  `description` text,
  `timeOfNews` varchar(20) DEFAULT NULL,
  `priority` tinyint(1) NOT NULL,
  `division_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`newsId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.news: ~3 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
REPLACE INTO `news` (`newsId`, `title`, `status`, `dateAndTime`, `professorName`, `facultyId`, `imageName`, `description`, `timeOfNews`, `priority`, `division_id`) VALUES
	(14, 'Test news', 'ACCEPTED', '21-09-2018-1537544359', NULL, NULL, 'NULL', 'Testing testing testing', NULL, 1, NULL),
	(15, 'ts2 news', 'ACCEPTED', '21-09-2018', 'Wook-Sung Yoo', 1, '../images/21-09-2018-1537544599.gif', 'testingtesting123', '1537544599', 0, NULL),
	(16, 'Testing News 2', 'ACCEPTED', '24-09-2018-1537798627', 'John Biros', 101, '../images/24-09-2018-1537798610.gif', 'Testing news 2', '1537798610', 0, NULL),
	(17, 'Testing Division', 'ACCEPTED', '24-09-2018', 'Wook-Sung Yoo', 1, NULL, 'Testing', '1537801902', 0, 1);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.research
CREATE TABLE IF NOT EXISTS `research` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facult_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fpmt_07.research: ~5 rows (approximately)
/*!40000 ALTER TABLE `research` DISABLE KEYS */;
REPLACE INTO `research` (`id`, `facult_id`, `title`, `summary`) VALUES
	(42, 89, '', 'Cybersecurity, Wireless Networks and Mobile Computing, Energy Harvesting Motivated Networks, Mobile Ad Hoc Networks and Evacuation Assisting Vehicular Networks.\r\n\r\n'),
	(43, 91, '', 'Secure software engineering and intrusion detection to provide secure cyber infrastructure along with development of custom algorithms, tools and software that can enhance the capabilities of existing cyber infrastructure.'),
	(44, 92, '', 'Network, Cloud Computing'),
	(48, 1, '', 'Mobile/Web Technology, Software Engineering, Health/Dental Informatics, Bioinformatics, Artificial Intelligence, Scheduling, K-12 Computing Education'),
	(58, 98, '', 'this is test 5 for research');
/*!40000 ALTER TABLE `research` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.selected_publications
CREATE TABLE IF NOT EXISTS `selected_publications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publication_title` varchar(400) NOT NULL,
  `publication_author` varchar(200) NOT NULL,
  `genre_type` varchar(200) DEFAULT NULL,
  `faculty_id` int(11) NOT NULL,
  `data` text NOT NULL,
  `publication_year` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.selected_publications: ~17 rows (approximately)
/*!40000 ALTER TABLE `selected_publications` DISABLE KEYS */;
REPLACE INTO `selected_publications` (`id`, `publication_title`, `publication_author`, `genre_type`, `faculty_id`, `data`, `publication_year`) VALUES
	(62, 'Validity Region Sensitive Query Processing Strategies in Mobile Ad Hoc Networks,', 'Byungkwan Jung, Sunho Lim, Jinseok Chae and Cong Pu,', 'IEEE Military Communications Conference (MILCOM).', 89, '            ', NULL),
	(63, 'A Light-Weight Countermeasure to Forwarding Misbehavior in Wireless Sensor Networks: Design, Analysis, and Evaluation,', 'Cong Pu and Sunho Lim,', 'IEEE Systems Journal (IF: 2.11).', 89, '												 ', NULL),
	(64, 'Spy vs. Spy: Camouflage-based Active Detection in Energy Harvesting Motivated Networks,', 'Cong Pu and Sunho Lim,', 'IEEE Military Communications Conference (MILCOM).', 89, '												 ', NULL),
	(65, 'Light-Weight Forwarding Protocols in Energy Harvesting Wireless Sensor Networks,', 'Cong Pu, Tejaswi Gade, Sunho Lim, Manki Min, and Wei Wang,', 'IEEE Military Communications Conference (MILCOM).', 89, '												 ', NULL),
	(67, 'Evacuation Assisting Strategies in Vehicular Ad Hoc Networks. TTU Wireless Mobile Networking Laboratory,', 'Cong Pu, Sunho Lim and Manki Min,', 'Technical Report, TR-10-2013.', 89, '												 ', NULL),
	(68, 'PinPoint: Wi-Fi Based Indoor Positioning System', 'D. Davis, K. Patel and P. Wahjudi', 'Journal of Management and Engineering Integration, Volume 7 No.2', 91, '												 ', NULL),
	(69, 'Dynamic Free Text Keystroke Biometrics System for Simultaneous Authentication and Adaptation to Userâ€™s Typing Pattern', 'A. King and P. Wahjudi', 'Journal of Management and Engineering Integration, Volume 6 No.2', 91, '												 ', NULL),
	(70, 'Intelligent Framework for Software Analysis, Reuse and Fabrication,â€ ', 'P. Wahjudi', 'Journal of Management and Engineering Integration, Volume 3 No.2', 91, '												 ', NULL),
	(71, 'Smart Server: Concepts and Applications', 'J. Gourd, M. Cobb, P. Wahjudi, D. Ali', 'International Journal of Intelligent Systems', 91, '												 ', NULL),
	(72, 'CCRP: Customized Cooperative Resource Provisioning for High Resource Utilization in Clouds', 'Jinwei Liu, Haiying Shen, and Husnu S. Narman ', 'IEEE International Conference on Big Data, 2016, Washington, DC', 92, '												 ', NULL),
	(73, 'Joint and Selective Component Carrier Assignment in LTE-A', 'Husnu S. Narman, Mohammed Atiquzzaman, Mehdi Rahmani-andebili, and Haiying Shen ', 'Computer Networks (September 2016)', 92, '												 ', NULL),
	(76, 'Mobile Web Application with Shortest Path Finder: Travelerâ€™ s Sidekick', 'Wook-Sung Yoo and Lina Kloub', 'July 13-15, 2016', 1, 'Proceedings of SAI IEEE Computing Conference ', NULL),
	(77, 'Development of Home Management System Using Arduino and AppInventor ', 'Wook-Sung Yoo and Sameer Ahamed Shaik ', 'June 10-14, 2016', 1, 'Proceedings of COMPSAC 2016, the 40th IEEE Computer Society International Conference on Computers, Software &amp; Applications, Atlanta, Georgia, USA  ', NULL),
	(79, 'Online Group Embedded Figures Test and Studentâ€™s Success in Online Course', 'Wook-Sung Yoo', '2015', 1, 'Proceeding of The Future of Education, Edition 5, ISBN (978-88-6292-620-1)												 ', NULL),
	(80, 'Validation of Periodontitis Screening Model Using Sociodemographic, Systemic, and Molecular Information in a Korean Population', 'Hyun-Duck Kim, Munkhzaya Sukhbaatar, Myungseop Shin, Yoo-Been Ahn and Wook-Sung Yoo', 'December 2014', 1, 'Journal of Periodontology, Vol. 85, No. 12: 1676-1683												 ', NULL),
	(81, 'Software Engineering Service Learning Capstone Project: Implementation and Measuring Its Impact', 'Wook-Sung Yoo', 'Spring 2013', 1, 'The Journal for Civic Commitment, Vol. 20												 ', NULL),
	(89, 'dsa', 'dsa', 'dsa', 98, '												 dsa', NULL);
/*!40000 ALTER TABLE `selected_publications` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.services
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `industrial_date` varchar(25) NOT NULL,
  `industrial_position` varchar(250) NOT NULL,
  `industrial_organization` varchar(250) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `industrial_edate` varchar(30) NOT NULL,
  `industrial_des` varchar(500) NOT NULL,
  `certificates_date` varchar(250) NOT NULL,
  `certificate_role` varchar(250) NOT NULL,
  `certificate_organization` varchar(250) NOT NULL,
  `certificate_des` varchar(250) NOT NULL,
  `potentials` text NOT NULL,
  `membership_and_activities` text NOT NULL,
  `honors_award_date` varchar(25) NOT NULL,
  `honors_award_role` varchar(250) NOT NULL,
  `honors_award_organization` varchar(250) NOT NULL,
  `honors_award_des` text NOT NULL,
  `others` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.services: ~5 rows (approximately)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
REPLACE INTO `services` (`id`, `faculty_id`, `industrial_date`, `industrial_position`, `industrial_organization`, `city`, `state`, `country`, `industrial_edate`, `industrial_des`, `certificates_date`, `certificate_role`, `certificate_organization`, `certificate_des`, `potentials`, `membership_and_activities`, `honors_award_date`, `honors_award_role`, `honors_award_organization`, `honors_award_des`, `others`) VALUES
	(62, 1, '2017-04-06', 'Job Title', 'Organization', 'City', 'State', 'Country', '2017-04-19', 'Description.....', '2007', 'Certification Name', 'Organization', 'Dr. Wook-Sung YooDr. Wook-Sung YooDr. Wook-Sung YooDr. Wook-Sung YooDr. Wook-Sung YooDr. Wook-Sung YooDr. Wook-Sung YooDr. Wook-Sung YooDr. Wook-Sung Yoo', 'Professional Memberships', '', '2001-2009', 'Honor Name ', 'Organization', 'Description.........', 'Activities'),
	(69, 65, '2001-2004', 'Marshall University', 'Marshall University', '', '', '', '', 'Marshall UniversityMarshall UniversityMarshall Uni', '2001-2007', 'Marshall University', 'Marshall University', 'Marshall UniversityMarshall UniversityMarshall Uni', 'Marshall UniversityMarshall UniversityMarshall UniversityMarshall University', '', '2001-2009', 'Marshall University', 'Marshall University', 'Marshall UniversityMarshall UniversityMarshall UniversityMarshall UniversityMarshall UniversityMarshall University', 'Marshall UniversityMarshall UniversityMarshall UniversityMarshall University'),
	(70, 66, '2001-2004', 'shahshah', 'shahshah', '', '', '', '', 'shahshahshahshahshahshahshahshahshahshahshahshahshah', '2001-2007', 'shahshahshah', 'shahshahshahshah', 'shahshahshah', 'shahshahshah', '', '2001-2009', 'shahshahshah', 'shahshahshah', 'shahshahshah', 'shahshahshah'),
	(75, 1, '2016-01-04', 'Professor', 'Xyz University', 'sdasfdf', 'WV', 'USA', '2018-04-04', 'Description will be added soon........', '2017', 'Xyz Certified', 'Xyz Organization', '', 'fdgergergr', '', '2001-2009', 'Xyz Award', 'Xyz org', 'Description will be added soon..........', 'qfqwevgqegv'),
	(76, 89, '2011-01-26', 'Job Title', 'Organization', 'City', 'State', 'Country', '2014-03-28', 'Description...........', '2007-2009', 'Certification Name', 'Organization', '', 'Professional Memberships', '', '2015', 'Honor Name ', 'Organization', 'Description.........', 'Activities');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.staff
CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `l_name` varchar(150) NOT NULL,
  `email` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(25) DEFAULT NULL,
  `office` varchar(25) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `permissions` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.staff: ~3 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
REPLACE INTO `staff` (`id`, `name`, `l_name`, `email`, `image`, `department_id`, `division_id`, `password`, `role`, `phone`, `office`, `status`, `permissions`) VALUES
	(1, 'Cynthia', 'Nixon', 'kingsbury7@marshall.edu', '/cite/admin/assets/uploads/2ba19577.jpg', 1, 1, '$2y$10$zIyh9SNrfcJ2sOEcvoIj9.w83AsCClCqUKoTQmuMmGFT6gmgGkBo.', 2, '', '', 1, 0),
	(46, 'Debbie', 'Downer', 'downer77@marshall.edu', '', 1, 1, '$2y$10$duAkf4wleiXLOqgwI7VaXObbzAF/IHC4qBL4wVs8l5eu5itxG5VWO', 2, '', '', 1, 0),
	(47, 'Dolan', 'Downerino', 'downerino@marshall.edu', '', 4, 1, '$2y$10$lxvlbcocYstCYdRlg93RbuyubzMoG3W9rO27KUKSUNMP7Lus9rEKG', 1, '', '', 0, 0);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.staff_roles
CREATE TABLE IF NOT EXISTS `staff_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '<undefined role>',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='A table containing all possible staff roles';

-- Dumping data for table fpmt_07.staff_roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `staff_roles` DISABLE KEYS */;
REPLACE INTO `staff_roles` (`id`, `name`) VALUES
	(1, 'Technician'),
	(2, 'Secretary'),
	(3, 'System Administrator'),
	(4, 'Research Engineer');
/*!40000 ALTER TABLE `staff_roles` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.teaching
CREATE TABLE IF NOT EXISTS `teaching` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `subjectname` text NOT NULL,
  `date` varchar(25) NOT NULL,
  `subjectnumber` text NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=204 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.teaching: ~18 rows (approximately)
/*!40000 ALTER TABLE `teaching` DISABLE KEYS */;
REPLACE INTO `teaching` (`id`, `faculty_id`, `subjectname`, `date`, `subjectnumber`, `description`, `link`) VALUES
	(134, 79, 'Algorithm and Data Structures For computer science', '2016', 'cs606  ', 'This is an test description for my test..', ''),
	(135, 79, 'architectural concepts for computer science', '2017', 'cs607 ', 'This is an test description for my test..', ''),
	(136, 65, 'Applied Physics', '2017', 'CS606 ', '', ''),
	(137, 65, 'Data Structure And Algorithms', '2016', 'CS607', '', ''),
	(141, 89, 'Programming Languages', '2017', 'CS300', '', ''),
	(142, 89, 'Applied Algorithms', '2017', 'CS620', '', ''),
	(145, 91, 'Software Engineering-II', '2017', 'CS310', '', ''),
	(146, 91, 'Cyber Security', '2017', 'CS430', '', ''),
	(147, 91, 'Thesis', '2017', 'CS681', '', ''),
	(148, 92, 'Data Structures and Algorithms', '2017-Spring', 'CS210 ', '', ''),
	(149, 92, 'Adv Data Struct and Algorithms', '2017-Spring', 'CS215 ', '', ''),
	(150, 92, 'Database Engineering', '2017-Spring', 'CS410 ', '', ''),
	(151, 92, 'Database Systems', '2017-Spring', 'CS510 ', '', ''),
	(191, 1, 'Computer Science I', '2016', 'CS110 ', '', 'https://mubert.marshall.edu/coursedescript.PHP?width=400&height=200&subj=CS&crse=110&height=250&width=400'),
	(193, 1, 'comprehensive Project', '2017', 'CS690/IS691', '', ''),
	(203, 92, 'Database Management ', '2017-Spring', 'IS623  ', '', '');
/*!40000 ALTER TABLE `teaching` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

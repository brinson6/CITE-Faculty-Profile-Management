-- --------------------------------------------------------
-- Host:                         50.62.209.72
-- Server version:               5.5.43-37.2-log - Percona Server (GPL), Release rel30.2, Revision 38.2
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for fpmt_07
CREATE DATABASE IF NOT EXISTS `fpmt_07` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `fpmt_07`;

-- Dumping structure for table fpmt_07.activities
CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.activities: ~14 rows (approximately)
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
REPLACE INTO `activities` (`id`, `faculty_id`, `name`) VALUES
	(1, 1, 'Chair of Dental Informatics WG in IMIA (International Medical Informatics Association) 		          2000- 2006'),
	(10, 91, 'Commitee Member, Federated Conference on Computer Science and Information Systems (FedCSIS), 2010 - present.'),
	(11, 91, 'Editorial Member, Journal of Management and Engineering Integration, 2010 - present.'),
	(12, 91, 'Academic Advisor, Marshall University ACM Student Chapter, 2009 - presesnt.'),
	(13, 100, 'InSITE Annual Conference Reviewer from 2006 to present'),
	(14, 100, 'Editor of International Journal of Doctoral Studies since 2006 to present'),
	(15, 100, 'Fulbright Reviewer for Fulbright Scholar Program, a program of the United States Department of State Bureau of Educational and Cultural Affairs'),
	(19, 1, 'West Virginia, Computer Science Workgroup, member'),
	(20, 100, 'Invited PHD Thesis Examinator at University of Cape Town - PHD in Informations Systems Program'),
	(22, 92, 'Editorial Board: Elsevier Journal of Network and Computer Applications'),
	(23, 92, 'Publicity Co-Chairs: ICCCN 2017, NAS 2017.'),
	(24, 92, 'TPC: GLOBECOMâ€™16, 17, 18; ICC\'16, 17, 18, 19; WF-5G\'18; IoTaIS 2018; COMNETSAT\'18; UNet\'17; TENCON\'17; WINCOMâ€™16, 17'),
	(25, 92, 'Marshall University Computer Science Summer Camp for K-12 (Computer Science Adventure Zone) Link: http://mupfc.marshall.edu/~narman/summercamp/CSA-Z/'),
	(26, 197, 'Reviewer of Stroke (IF=6) in 2018; Reviewer of Experimental Neurology (IF=4.6) in 2013-2017; Reviewer, Int. Journal of Mol. Sci. (IF=3.2); Reviewer, Journal of Clinical Medicine (IF=5.583) and several other journals');
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.awards: ~12 rows (approximately)
/*!40000 ALTER TABLE `awards` DISABLE KEYS */;
REPLACE INTO `awards` (`id`, `faculty_id`, `name`, `organization`, `year`, `description`) VALUES
	(10, 91, ' President\'s List', 'Marshall University', '2001-2003, 2005-2007', 'President\'s List, 2001-2003, 2005-2007'),
	(11, 91, 'Dean\'s List', 'Marshall University', '1999-2000, 2004-2005', 'Deans;s List, 1999-2000, 2004-2005'),
	(12, 91, 'National Dean\'s List', 'MarShall University', '2001', 'National Dean\'s List, 2001'),
	(18, 100, 'Fulbright Scholar Program', 'United States Department of State Bureau of Educational and Cultural Affairs', '2008-2009', 'Fulbright Fellowship'),
	(19, 100, 'Summer Fellowship', 'White Sands', '1992', 'Summer Fellowship for work at the White Sands Missile Testing site of the US Army in New Mexico'),
	(20, 100, 'Russia sabbatical', 'Russia', '1993-1994', 'I spent one year teaching in Russia in 1993 as an invited professor'),
	(21, 197, 'Travel Award', 'American Heart Association', '2016', 'ATVB Council Award for the Abstract Selected for Oral Presentation at AHA Annual Conference '),
	(24, 197, 'Certificate of Achievement', 'Institute for Basic Science', '2016', 'In recognition of outstanding performance in ORAL PRESENTATION during Yonsei-IBS Symposium New England held at Harvard University, Cambridge MA (Dec. 2016)'),
	(25, 197, 'Mentored Young Investigator Award', 'The Hydrocephalus Association', '2009-2011', 'Inaugural award in recognition of the novel proposal on hydrocephalus focusing on clinical and basic science research ($110,000)'),
	(27, 92, 'Turkish Ministry of National Education Fellowship ', 'Turkish Ministry of National Education', '2007-2016', 'Sponsored for ELS, MS, and PhD, Spring 2007 &ndash; 2016'),
	(28, 92, 'Outstanding PhD Student in Computer Science', 'University of Oklahoma', '2016', 'Because of high achievements during PhD. '),
	(29, 197, 'Travel Award', 'NASA', '2018', 'NASA REA travel award (through Marshall University); $1000 for Society for Neuroscience 2018 annual conference');
/*!40000 ALTER TABLE `awards` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.certification
CREATE TABLE IF NOT EXISTS `certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.certification: ~6 rows (approximately)
/*!40000 ALTER TABLE `certification` DISABLE KEYS */;
REPLACE INTO `certification` (`id`, `faculty_id`, `name`, `organization`, `date`) VALUES
	(8, 89, 'Certificate Name', 'Certificate Organization', 'Date'),
	(17, 200, 'Certified Professional Ergonomist ', 'Board of Certification in Professional Ergonomics', '2014'),
	(18, 197, 'Introduction to Clinical Research', 'Children\'s Hospital Boston and the Harvard Medical School', 'March 22, 2007'),
	(20, 92, 'Online Course Development', 'Quality Matters', 'May 2017'),
	(21, 92, 'Java SE 7', 'Robert Half Technology', 'September 2016'),
	(22, 92, 'Responsible Conduct of Research/Behavioral & Social Science Research', 'Collaborative Institutional Training Initiative', 'July 2018');
/*!40000 ALTER TABLE `certification` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Departments for tying staff to the relevant bodies';

-- Dumping data for table fpmt_07.departments: ~2 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
REPLACE INTO `departments` (`id`, `name`) VALUES
	(6, 'Computer Science'),
	(5, 'Dean\'s Office');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.description
CREATE TABLE IF NOT EXISTS `description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.description: ~12 rows (approximately)
/*!40000 ALTER TABLE `description` DISABLE KEYS */;
REPLACE INTO `description` (`id`, `faculty_id`, `description`) VALUES
	(4, 65, 'This is an description for teaching interest...'),
	(6, 89, 'Dr. Pu has 3+ years teaching experience in Computer Science and Software Engineering programs at Marshall University and Texas Tech University. The average rating of all course evaluations (Spring 2017 - Spring 2018) is 4.43/5.00 (Undergraduate) and 4.70/5.00 (Graduate), respectively. The average of teaching effectiveness (Summer II 2014 - Fall 2016) in terms of Lecture Rating, Instructor Rating and Subject Rating at Texas Tech University is (4.64/5.00), (4.57/5.00) and (4.48/5.00), respectively. '),
	(7, 89, 'I have 2+ years teaching experience in Computer Science and Software Engineering programs at Texas Tech University and Marshall University. The average of teaching effectiveness for the last 2+ years (Summer II 2014 - Fall 2016) in terms of Lecture Rating, Instructor Rating and Subject Rating at Texas Tech University is (4.64/5.00), (4.57/5.00) and (4.48/5.00), respectively. I was awarded 2015 Helen Devitt Jones Excellence in Graduate Teaching Award at Texas Tech University.'),
	(9, 91, '- Data Structures \r\n- Cyber Security\r\n- Penetration and Testing\r\n- System Hardening\r\n- Secure Software Engineering'),
	(10, 92, 'Interesting to teach system-related courses at both graduate and undergraduate levels including Distributed Systems, Cloud Computing, and Database Systems. Besides the system-related courses, I have special interest in teaching Networking Fundamentals, Network Management, and Wireless and Mobile Networking. I also enjoy teaching OOP, Data Structure, and Algorithms.'),
	(26, 1, 'More than 20 year of teach experience in computer science, software engineering, and various informatics courses. Special interest in teaching Capstone project course.'),
	(29, 100, 'I enjoy teaching and some students may think I\'m a nail professor. I want students to learn and is willing to help students.'),
	(31, 197, 'Recent teaching experience in biomedical engineering, biomolecular engineering, and biomedical technology courses. Special interest in teaching Capstone project course.'),
	(32, 224, ''),
	(33, 126, ''),
	(34, 219, 'I teach courses related to control systems, system modeling, and computer programming. Please find a list of these courses below.  '),
	(35, 223, 'Databases, PHP, and Javascript');
/*!40000 ALTER TABLE `description` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.division
CREATE TABLE IF NOT EXISTS `division` (
  `divisionId` int(5) NOT NULL AUTO_INCREMENT,
  `divisionName` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`divisionId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Dumping data for table fpmt_07.division: 3 rows
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
REPLACE INTO `division` (`divisionId`, `divisionName`) VALUES
	(1, 'Computer Science'),
	(2, 'Engineering'),
	(3, 'Applied Science and Technology');
/*!40000 ALTER TABLE `division` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.education_records
CREATE TABLE IF NOT EXISTS `education_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `school` varchar(150) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Education records for staff and faculty';

-- Dumping data for table fpmt_07.education_records: ~0 rows (approximately)
/*!40000 ALTER TABLE `education_records` DISABLE KEYS */;
/*!40000 ALTER TABLE `education_records` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.faculty_member
CREATE TABLE IF NOT EXISTS `faculty_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `l_name` varchar(250) NOT NULL,
  `title` varchar(20) DEFAULT NULL COMMENT 'Ph.D.',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.faculty_member: ~17 rows (approximately)
/*!40000 ALTER TABLE `faculty_member` DISABLE KEYS */;
REPLACE INTO `faculty_member` (`id`, `email`, `name`, `l_name`, `title`, `division`, `password`, `image`, `phone`, `office_address`, `designation`, `overview`, `degree1`, `degree1_year`, `degree1_school`, `degree2`, `degree2_year`, `degree2_school`, `degree3`, `degree3_year`, `degree3_school`, `status`, `permissions`) VALUES
	(1, 'yoow@marshall.edu', 'Wook-Sung', 'Yoo', 'Ph.D.', 'Computer Science', 'eW9vd0AxMjM=', '../images/professor.jpg', '304-696-5452', 'WAEC 3101A', 'Chair & Professor', 'Dr. Wook-Sung Yoo joined the Marshall University in 2016 as a chair and professor. Prior to joining Marshall University, he was a chair of Computer Science and Software Engineering Program at Fairfield University in 2008-16 and an associate professor at computer and information science program, a director or bioinformatics program, and a director of GE/Gannon information Management Graduate Program at Gannon University. Erie, PA in 1998-2016. He also taught computer science in the Department of Computer science at Utah State University and worked at the Oral Health Services and informatics Department at the State University of New York at Buffalo as an assistant professor. He was a chair of the IMIA (International Medical Informatics Association) Dental Informatics working group 2000 â€“ 2006 and involved in various national wide commercial web and Informatics projects.', 'Ph.D', 1995, 'Florida Institute of Technology', 'M.S', 1988, 'Florida Institute of Technology', 'D.D.S', 1982, 'Seoul Natinal University', '1', 3),
	(89, 'puc@marshall.edu', 'Cong', 'Pu', 'Ph.D.', 'Computer Science', 'Y29uZ0AxMjM=', '../images/cpu.jpg', '304-696-6204', 'WAEC 3109', 'Assistant Professor', 'Dr. Pu received his B.S. degree in Computer Science and Technology from Zhengzhou University (China) in 2009. Dr. Pu earned his M.S. and Ph.D. degrees in Computer Science from Texas Tech University in 2013 and 2016, respectively. Currently, Dr. Pu is an Assistant Professor in the Weisberg Division of Computer Science, Marshall University (MU). Before joining MU, Dr. Pu was an Instructor in the Dept. of Computer Science at Texas Tech University from 2014 and 2016 when he worked towards Ph.D. degree. ', 'P.h.D', 2016, 'Texas Tech University', 'M.S', 2013, 'Texas Tech University', 'B.S', 2009, 'Zhengzhou University', '1', 0),
	(91, 'wahjudi123@marshall.edu', 'Paulus ', 'Wahjudi', 'Ph.D.', 'Computer Science', 'd2FoanVkaUAxMjM=', '../images/wahjudi.jpg', '304-696-5443', 'WAEC 3113', 'Associate Professor ', 'Dr. Paulus Wahjudi is part of the Educational Testing Service National Advisory Committee for Computer Science.  The Educational Testing Service National Advisory Committee plays an important role in providing expert input into the development process for the Praxis tests. ETS selects a group of approximately 12 â€“ 15 educators from the nominees provided by the states to form a committee that is diverse with respect to gender, race and ethnicity, geography, instructional setting, and experience. The NAC will work closely with ETS assessment specialists to develop test specifications and test designs. \r\n\r\nDr. Wahjudi is also member of the Computer Science workgroup for the West Virginia Department of Education to increase and strengthen Computer Science education in West Virginia', 'PhD ', 2007, 'University of Southern Mississippi', 'MS', 2003, 'University of Southern Mississippi', 'BS', 2001, 'University of Southern Mississippi', '1', 0),
	(92, 'narman@marshall.edu', 'Husnu ', 'Narman', 'Ph.D.', 'Computer Science', 'bmFybWFuQDEyMw==', '../images/30-08-2018-1535651118.jpeg', '304-696-5829', 'WAEC 3107', 'Assistant Professor', 'I am one of seven billion persons waiting to pass the door of eternal life in the world. While waiting, I married a wonderful woman, Fatma, have a son, Esat and a daughter, Elif. I am also pursuing my life as an assistant professor at Marshall University. I worked as a postdoc under the supervisor, Dr. Haiying (Helen) Shen, at College of Engineering and Science, Clemson University. I completed my Bachelor of Science in Mathematics at Abant Izzet Baysal University in Turkey, Master of Computer Science at The University of Texas at San Antonio and Ph.D. in Computer Science at the University of Oklahoma. My Ph.D. adviser is Dr. Mohammed Atiquzzaman. I worked with Dr. Turgay Korkmaz during my master. Link to personal page:  http://mupfc.marshall.edu/~narman/ ', 'PhD', 2016, 'Computer Science at The University of Oklahoma (OU)', 'MS', 2011, 'Computer Science at The University of Texas at San Antonio (UTSA)', 'BS', 2006, 'Mathematics at Abant Izzet Baysal University (AIBU)', '1', 0),
	(98, 'malikh@marshall.edu', 'Haroon', 'Malik', 'Ph.D.', 'Computer Science', 'YWJjMTIz', '../images/17-09-2018-1537192190.png', '304-696-5655', 'WAEC 33103', 'Assistant Professor ', 'I am an Assistant Professor in Weisberg Division of Computer Science, Marshall University, since fall 2015. My research interests lie at the intersection of systems and software engineering. In particular, I am interested in performance testing of Ultra-large-scale systems (ULSS), wireless sensor networks and green computing.\r\n\r\nWebsite: http://haroonmalik1.wixsite.com/haroon-malik\r\n', 'PhD', 2013, 'Queenâ€™s University, Canada', 'Msc', 2007, 'Acadia University, Canada', 'Bsc', 1996, 'Hamdard  University, Pakistan', '1', 0),
	(100, 'chaudri@marshall.edu', 'Jamil', 'Chaudri', 'Ph.D.', 'Computer Science', 'amFtaWxAMTIz', '../images/09-07-2018-1531109061.jpeg', '304-696-2694', 'WAEC 3003', 'Professor', 'I am a Professor of Computer Science (teaching Information Systems) in the College of Information Technology and Engineering at Marshall University, Huntington, West Virginia. \r\n\r\nI am a product of the British education system: I received my BSc (Honours) degree in Mathematics and Physics from the University of Salford, in 1967, MSc in Computer Science from the University of Nottingham, in 1970, and PhD in Information Systems from the Durham University Business School, in 1982. Durham University ranked 61st in the QS World University Rankings 2015-16. \r\n\r\nBefore joining Marshall University, I worked for more than 12 years in Industry: in 1969 I joined the Swiss Chemical-Pharmaceutical firm J R Geigy in its Wissenschaftliche Rechenzentrum as Programmer-Analyst. After the Ciba-Geigy merger (the company then was changed its name to Novartis), I moved to the Pharma Division, which was responsible for conducting Clinical Trials in the course of developing new Medicines. My last position title was that of Project Manager. Later, I became the European Software Manager for Commodore, one of the earliest vendors of Personal Computers. Still later, I worked as a Systems Engineer for Prime Computers, in its day a reputable vendor of mid-size computers, with Headquarters at Natick, Massachusetts. In Switzerland I also established my own limited liability management consultancy firm von Jutt AG. \r\n\r\nI have travelled extensively in Africa, Asia, Europe, and North America. In 1984 I joined Marshall University as Associate Professor and moved to the USA. In 1991 I was granted Tenure and Promoted to Full Professorship. In 1992 I won a Summer Fellowship for work at the White Sands Missile Testing site of the US Army in New Mexico. For the academic year 1993-94, I was on sabbatical - I spent one semester in Russia and the second semester in Pakistan. For the year 2008-09, I was awarded the Fullbright Fellowship for Pakistan. \r\n\r\nTeaching is my passion and I have taught students at Marshall for more than 30 years. \r\n\r\nFor more information, please check my personal website at:\r\nhttp://mupfc.marshall.edu/~chaudri/', 'PhD in Information Systems', 1982, 'Durham University, England', 'MSc in Computer Science', 1970, 'University of Nottingham, England', 'BSc (Honors) in Mathematics and Physics', 1967, 'University of Salford, England', '1', 0),
	(102, 'pierson123@marshall.edu', 'Bill', 'Pierson', NULL, '', 'MTIzNDU=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0),
	(126, 'salary@marshall.edu', 'Roozbeh Ross ', 'Salary', 'Ph.D.', 'Engineering', 'UnIkMDYzM01V', '../images/30-08-2018-1535655633.jpeg', '(304)696-5678', 'WAEC 1211', 'Assistant Professor of Mechanical Engineering', 'Dr. Salary is an Assistant Professor of Mechanical Engineering. His research interests include: Advanced Manufacturing; BioMedical Fabrication; Physics-based Modeling and Simulation; System Dynamics and Control; Machine Learning; Artificial Intelligence; and Computer Vision. For further information, please visit the Laboratory for Advanced Manufacturing Engineering &amp; Systems (LAMES).', 'Ph.D', 2018, '- State University of New York at Binghamton', 'M.S', 2014, '- Syracuse University', 'M.S', 2008, '- K.N.T. University of Technology', '1', 0),
	(196, 'nas@marshall.edu', 'Suk Joon', 'Na', 'Ph.D.', 'Engineering', 'U2t0anJ3bnM3OCEh', '../images/16-09-2018-1537128086.jpeg', '3046965679', 'WAEC 1215', 'Assistant Professor', 'Dr. Na joined Marshall University in 2018 as an Assistant Professor of Geotechnical Engineering. Prior to joining Marshall, he was an Instructor of Civil and Environmental Engineering at Rowan University, NJ, in 2016-2018, and a postdoctoral researcher at Drexel University, PA, in 2016-2018. Dr. Na received his Ph.D. degree in Civil Engineering from Drexel University in 2016, M.S. degree in Civil Engineering from the University of Texas at Austin in 2009, and B.E. degree in Civil Engineering from Chung-Ang University, Seoul, South Korea in 2005.', 'Ph.D.', 2016, 'Drexel University, Philadelphia, PA', 'M.S.', 2009, 'The University of Texas at Austin, Austin, TX', 'B.E.', 2005, 'Chung-Ang University, Seoul, Korea', '1', 0),
	(197, 'shim@marshall.edu', 'Joon W. \'Simon\'', 'Shim', 'Ph.D.', 'Engineering', 'c2hpbTEyMw==', '../images/20-09-2018-1537474861.jpeg', '(304) 696-5677', 'WAEC 3005', 'Assistant Professor', 'Dr. Shim joined Marshall University as assistant professor in biomedical engineering starting in Fall 2018. Prior to beginning this academic career, he has been trained at Boston University School of Medicine with NIH T32 postdoctoral fellowship focusing on the robotic stereotactic murine neurosurgery and cardiovascular sciences. Previously, he received the postdoctoral research fellowship on hydrocephalus in the Neurodynamics laboratory at Harvard Medical School and Boston Childrenâ€™s Hospital. He has contributed to identification of the pleiotropic phenotype in a transgenic rat model with a transmembrane protein 67 mutation at Indiana University, Indianapolis. Dr. Shim is interested in biomechanics, cellular and animal physiology with emphasis on neurovascular interactions. His recent research has centered on pathophysiology of vascular stiffening in the aorta using transgenic mice. Dr. Shim is dedicated to an understanding of vascular compliance regulation and the development of novel pharmacological therapies. ', 'Ph.D. in Biomedical Engineering', 2006, 'Mississippi state University', 'M.S. in Biomedical Engineering', 2003, 'Rensselaer Polytechnic Institute', 'B.S. in Mechanical Engineering', 1994, 'Soongsil University', '1', 0),
	(198, 'szwilski@marshall.edu', 'Anthony', 'Szwilski', 'Ph.D.', 'Applied Science and Technology', 'U3p3aWxza2kxMjM=', '../images/11-10-2018-1539280663.jpeg', '8592697157', 'WAEC 3201A', 'Chair, Professor', 'Currently Director of the Center for Environmental, Geotechnical and Applied Sciences, at Marshall University and Professor of Engineering.\r\nResearch: Has been engaged in well funded engineering and environmental research projects and received research and grants as a project Principal or Co-principal Investigator of over $19 million.\r\n\r\nProfessional experience includes: University of Kentucky; University of Alberta, Canada; Division of Water Resources, Kentucky Environmental Cabinet; consulting on long-term / short-term projects in Indonesia, Peru, China and Africa.  \r\n\r\nDr. Szwilski is a registered Professional Engineer in Kentucky; a Chartered Engineer in the United Kingdom; and registered as a European Engineer.\r\n\r\n', 'Ph.D. Geomechanics', 1975, 'University of Nottingham, United Kingdom', 'B.Sc. (Hons)', 1972, 'University of Nottingham, United Kingdom', 'M.B.A.', 1986, 'Xavier University, Ohio, USA', '1', 1),
	(199, 'christofero@marshall.edu', 'Tracy', 'Christofero', NULL, 'Applied Science and Technology', 'Q2hyaXN0b2Zlcm8xMjM=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(200, 'liuji@marshall.edu', 'Jian ', 'Liu', 'Ph.D.', 'Applied Science and Technology', 'dGh3b3JkMDI=', '../images/03-09-2018-1535986736.jpeg', '304-696-3067', 'WAEC 3207', 'Associate Professor', 'My research interests lie in the general field of physical ergonomics. More specifically, my research work is devoted to developing innovative fall prevention technology through perturbation-training paradigm and virtual reality technology.', 'PhD in Industrial&Systems Engineering', 2008, 'Virginia Tech', 'MS in Industrial&Systems Engineering', 2004, 'Virginia Tech', 'BS in Industrial Engineering', 2002, 'Shanghai Jiao Tong University', '1', 0),
	(201, 'mcintoshj@marshall.edu', 'Jim ', 'McIntosh', NULL, 'Applied Science and Technology', 'TWNJbnRvc2gxMjM=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(202, 'roudebush@marshall.edu', 'Clair L', 'Roudebush', NULL, 'Applied Science and Technology', 'Um91ZGVidXNoMTIz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(203, 'simonton@marshall.edu', 'Scott ', 'Simonton', NULL, 'Applied Science and Technology', 'U2ltb250b24xMjM=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(204, 'asad.salem@marshall.edu', 'Asad', 'Salem', 'Ph.D.', 'Engineering', 'U2FsZW0xMjM=', NULL, '3046963207', 'WAEC 2201', 'Chairman of the Weisberg Division of Engineering', 'Areas of Expertise: Thermal Science, Computational and Experimental Fluid Mechanics, Renewable and Alternative Energy Sources, LNG, and Sustainability.\r\n\r\n1.	Asad Salem, â€œIsothermal Simulations of gas â€“Turbine Swirl Injector Flowâ€, Proceedings of the 9th International Conference on Energy and Development, published on the Recent Advances on Environmental and life Sciences, Energy Environmental and structural Engineering Series, 2015 P.17-21, ISBN: 978-1-61804-332-0 \r\n2.	Salem, A. â€œAnalysis of Isothermal and Reacting Flow in an Aircraft Gas Turbine Combustorâ€ 3rd ASME-International on Thermal Engineering ICTEA 2007, May 2007.\r\n3.	Mohammadien, A.A., Modather, M.; Salem, A. and Gorla, R., 2001,â€ Mixed Convection Flow of a   Micropolar Fluid on a Moving Heated Horizontal Plateâ€, ZAMM 81(2001) 8, 549-557\r\n4.	Cassidy D.C.,  A.B. Ebiana, A.A. Salem and M. Rashidi "Numerical Analysis of a Radiant Driven Oven for Web Applicationsâ€, IJAMT (2006) 28.\r\n5.	Salem, A., T. Nayfeh and C. M. Fox, 2003,â€ Non-Destructive Quality Assurance Testing of Chemically Processed Woodâ€, The Int. J. of Adv. Manufacturing Technology.\r\n6.	Salem, A.â€ Numerical Simulation of Fluid Flow and Heat Transfer in a Plasma Cutting Torch: WSEAS Journal, Vol. 11, 2006\r\n7.	Salem, A. and R. Gorlaâ€ Probabilistic Finite Element Thermal Analysis Applied to a Pressure Vessel,â€ Int. J. Fluid Mechanics Research. Vol. 31, 2004\r\n8.	Reed, W.R., Klima, S., Salem, A. Shahan, M., Ross, G., Bailey, A., Cross, R., Grounds, T., and Singh, K., [2017] â€œA Field Study of a Re-designed Roof Bolter Canopy Air Curtain (2nd Generation) for Respirable Coal Mine Dust Control.â€ 2018 Society of Mining Engineers Annual Meeting and Exhibit (accepted).\r\n9.	Salem, A. â€œComputer Modeling of Forced Convection in a Channel Saturated with a Non-Newtonian Fluid, 22nd ISCA- CATA-2007, Honolulu, USA,  2007\r\n10.	M A Faruqi, S. Roy, and A. Salem â€œElevated Temperature Deflection Behavior of Concrete Members Reinforced with FRP Barsâ€, J. of Fire Protection Engineering, Vol. 22(3) Aug 2012. \r\n11.	Salem, A,â€ Heat Transfer in an Axisymmetric Stagnation Flow on an Infinite Circular Cylinderâ€™, Proceedings of the 5th WSEAS International Conference on Heat and Mass Transfer, Acapulco, Mexico, January 25-27, 2008.\r\n12.	Salem, A. â€œThe effect of a Non-Newtonian fluid on Variable-Area and Target Flow-metersâ€, WSEAS/IASME International Conference on Fluid Mechanics, published in IASME Transactions, Issue 4, Volume10, October 2004\r\n\r\nSYNERGISTIC ACTIVITIES\r\nâ€¢	Energy audit and conservation in residential, commercial, and industrial facilities (US-DOE Funded Grants)\r\nâ€¢	CFD modeling and simulation of Coal Mines to Control Respirable Coal Dust (CDC Funded Grants) \r\nâ€¢	Sustainable and Renewable Energy Sources and Applications\r\nâ€¢	Energy recovery and co-generation from LNG\r\nâ€¢	Developed many sustainable and renewable energy options and engineering programs. \r\n\r\n		\r\n\r\n\r\n', 'Ph.D. -Mechanical Engineering ', 1996, 'The University of Akron', 'MS.- Mechanical  Engineering  ', 1988, 'Tennessee State University ', 'BS.- Mechanical  Engineering ', 1983, 'University of Mississippi', '1', 2),
	(205, 'fullerj@marshall.edu', 'James', 'Fuller', NULL, 'Computer Science', 'RnVsbGVyMTIz', NULL, NULL, NULL, 'Adjunct Faculty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(206, 'Majdalan@marshall.edu', 'Elias', 'Majdalani', NULL, 'Computer Science', 'TWFqZGFsYW5pMTIz', NULL, NULL, NULL, 'Adjunct Faculty', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(207, 'begley@marshall.edu', 'Richard', 'Begley', 'Ph.D.', 'Engineering', 'QmVnbGV5MTIz', '../images/19-09-2018-1537375665.jpeg', '3046963438', 'WAEC 3221', 'Professor in Engineering', '1. Technical and research expertise includes: GIS/GPS/LIDAR, Remote Sensing Instrumentation,Hydrology and Flood Analyses, Transportation, Geo-technical Engineering, Numerical Modeling, Machine Controls, Explosives Engineering, Dust Physics, Safety and Environmental, \r\n2. Co-inventor for 4 US and 1 Canadian Patents\r\n3. Significant experience working with elected officials and federal authorization and appropriations.\r\n4. Certified WV Underground Mine Foreman, MSHA Safety Instructor. \r\n\r\n', 'PhD Mining Engineering', 1990, 'West Virginia University', 'MS Mining Engineering', 1984, 'West Virginia Uiversity', 'BS Mining Engineering Technology', 1980, 'West Virginia Institute of Technology', '1', 0),
	(208, 'bieniek@marshall.edu', 'Ronald ', 'Bieniek', NULL, 'Engineering', 'QmllbmllazEyMw==', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(210, 'bryce@marshall.edu', 'James', 'Bryce', 'Ph.D.', 'Engineering', 'QnJ5Y2UxMjM=', '../images/18-09-2018-1537294381.jpeg', '3046965653', 'WAEC 2301A', 'Assistant Professor', 'Dr. Bryce joined the faculty of Marshall University in the Fall of 2018 as an Assistant Professor in Civil Engineering with an emphasis on Transportation Engineering. Prior to joining Marshall, Dr. Bryce was a Senior Consultant with Amec Foster Wheeler, where he worked on research research projects funded by the US Federal Highway Administration, Transportation Research Board and many other entities. Much of the research conducted by Dr. Bryce has been published in various venues and presented at various conferences - including the 2017 World Conference on Pavement and Asset Management where Dr. Bryce was presented with the Best Paper Award for his technical work. Dr. Bryce completed a M.S. and Ph.D. at Virginia Tech where he studied at the Virginia Tech Transportation Institute. Additionally, Dr. Bryce was selected as a Marie Curie Post-Doctoral researcher and studied for one year at the University of Nottingham. Currently, Dr. Bryce\'s research relates to developing tools for local municipalities to better manage infrastructure, data driven decisions and policy analysis in transportation engineering, specifically pertaining to pavement and asset management.', 'B.S. Civil Engineering', 2008, 'University of Missouri', 'M.S. Civil Engineering', 2012, 'Virginia Tech', 'Ph.D. Civil Engineering', 2014, 'Virginia Tech', '1', 0),
	(211, 'chenga@marshall.edu', 'Gang ', 'Chen', NULL, 'Engineering', 'Q2hlbjEyMw==', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(212, 'hajjar@marshall.edu', 'Salam ', 'Hajjar', NULL, 'Engineering', 'SGFqamFyMTIz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(213, 'hijazii@marshall.edu', 'Iyad ', 'Hijazi', NULL, 'Engineering', 'SGlqYXppMTIz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(214, 'esmaeilpour@marshall.edu', 'Mehdi ', 'Esmaeilpour', 'Ph.D.', 'Engineering', 'MTk4MDIwMjBkb25l', '../images/01-10-2018-1538366112.jpeg', '(304) 696-5826', 'WAEC 1213', 'Assistant Professor', 'I am currently an Assistant Professor in Department of Mechanical Engineering at Marshall  University. My undergraduate studies were in Mechanical Engineering at Mazandaran University, Iran. In 2006, I received my Mechanical Engineering M.Sc. from the Ferdowsi University in Iran and my Ph.D. in 2017 from the University of Iowa. My graduate research focused on computational modeling with applications in Naval Hydrodynamics, and the development and implementation of stratification of sea and ocean to the CFD code for study of deadwater phenomenon. Starting as an Assistant Professor at Marshall in August of 2017, I am continuing to pursue my research interest  in multi-physics problems in fluid mechanics and heat transfer through both numerical and experimental studies.', 'Ph.D. in Mechanical Engineering', 2017, 'The University of Iowa', 'M.Sc. in Mechanical Engineering', 2006, 'Ferdowsi University', 'B.Sc. in Mechanical Engineering', 2003, 'Mazandaran University', '1', 0),
	(215, 'larsene@marshall.edu', 'Eldon R. ', 'Larsen', NULL, 'Engineering', 'TGFyc2VuMTIz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(216, 'masaud@marshall.edu', 'Tarek ', 'Masaud', NULL, 'Engineering', 'TWFzYXVkMTIz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(217, 'michaelson@marshall.edu', 'Gregory K. ', 'Michaelson', NULL, 'Engineering', 'TWljaGFlbHNvbjEyMw==', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(218, 'penaalvareza@marshall.edu', 'Ana ', 'Pena Alvarez', NULL, 'Engineering', 'cGVuYWFsdmFyZXoxMjM=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(219, 'sardahi@marshall.edu', 'Yousef ', 'Sardahi', 'Ph.D.', 'Engineering', 'TWFuYXIyNDUyMDE0QA==', '../images/14-10-2018-1539523798.jpeg', '304-696-6485', 'WAEC 2225', 'Mechanical Engineering', 'Yousef Sardahi received his Ph.D. degree in Mechanical Engineering from the University of California, Merced, with a focus on Multi-Objective Optimal Design of Linear and Nonlinear Control Systems. He has an M.S. and a B.S. in Mechatronics Engineering. His research focuses on Multi-Objective Optimal Design of Linear and Nonlinear Control Systems. During his graduate studies, Dr. Yousef has developed with his researchmates under the supervision of Professor. Jian-Qiao Sun two algorithms: A multi-objective simple cell mapping algorithm and a hybrid algorithm of a genetic algorithm and simple cell mapping for multi-objective optimization.', 'Ph.D., Mechanical Engineering', 2016, ' University of California, Merced', 'M.S., Mechanical Engineering (Mechatronics)', 2011, ', Jordan University of Science and Technology, Jordan', 'B.S., Mechatronics Engineering', 2007, ' University of Jordan, Jordan', '1', 0),
	(220, 'wait@marshall.edu', 'Isaac ', 'Wait', NULL, 'Engineering', 'V2FpdDEyMw==', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(221, 'youns@marshall.edu', 'Sungmin ', 'Youn', 'Ph.D.', 'Engineering', 'eW91bjEyMw==', '../images/06-09-2018-1536277715.jpeg', '3046966475', 'WAEC 2207', 'Assistant Professor', 'I have fundamental training in water and colloidal chemistry and physiochemical water treatment. I particularly enjoy collaborating with researchers from different disciplines to evaluate potential pollution sources in water and to identify their impacts on the surrounding environment. One of the most important aspects of environmental engineering practice is protecting the health of individuals and the welfare of our society. Recognizing this responsibility as an environmental engineer, I think that my first calling is to share my cutting-edge engineering education and research experience to promote cross-disciplinary solutions to emerging environmental challenges. My strong passion for sharing engineering knowledge with others has motivated me to pursue a career in academia.', 'Ph.D.', 2017, 'The University of Texas at Austin', 'M.S.', 2013, 'The University of Texas at Austin', 'B.S.', 2011, 'Calvin College', '1', 0),
	(222, 'bokera@marshall.edu', 'Almuatazbellah ', 'Boker', NULL, 'Engineering', 'Qm9rZXIxMjM=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(223, 'riffle11@marshall.edu', 'Michael', 'Riffle', NULL, 'Computer Science', 'MTIzNDU2', '../images/17-02-2019-1550440505.png', '3046383861', '123', 'Assistant', 'Testing Account Creation', 'Integrated Science & Technology', 2005, 'Marshall University', 'Information Systems', 2019, 'Marshall University', '', 0, '', '1', 0),
	(224, 'kamdar2@marshall.edu', 'Mitul', 'Kamdar', NULL, 'Engineering', 'bWl0dWwxMjM=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 0),
	(225, 'li129@marshall.edu', 'Xiaohui', 'Li', NULL, 'Engineering', 'bGkxMjM=', '', '5343567676', 'WAEG 094t', 'Example', 'Good', 'Master', 2019, 'Marshall University', 'Bechalor', 2017, 'Marshall University', '', 0, '', '1', 0),
	(226, 'zhao40@marshall.edu', 'Haonan', 'Zhao', NULL, 'Applied Science and Technology', 'emhhbzEyMw==', '', '3041234567', '123456789', 'ASSISTANT', 'ABC-TESTING 123', 'ABC', 1993, 'ABD', 'DEF', 1995, 'DEF', 'GHI', 2001, 'GHI', '1', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fpmt_07.funds: ~15 rows (approximately)
/*!40000 ALTER TABLE `funds` DISABLE KEYS */;
REPLACE INTO `funds` (`id`, `facult_id`, `project_name`, `fund_type`, `start_date`, `end_date`, `fund_sponsor`, `fund_amount`, `fund_des`) VALUES
	(68, 92, 'Data Center Management', 'Marshall Funding', 'June, 2017', 'August, 2017', 'Marshall University', '$2000.00', 'The aim of this project is to provide desired services to users in reasonable time by using the minimum amount of resources in a datacenter.'),
	(69, 1, 'Prototype of Extended XDB with Wiki', 'Government', '2010', '2011', 'National Space (NASA) Grant Foundation', '$ 4,500', 'Develop a prototype of non-traditional of Extended XDB.'),
	(70, 1, 'Computing Education Academy', 'Government', '2011', '2012', 'Connecticut Space Grant College Consortium', '$7,500', 'Curriculum Development Grant '),
	(71, 1, 'Graduate Research Internship Program (GRIP) ', 'Industry', '1998', '2016', 'General Electrics and other industries', 'Approximately $1,200,000', 'Grant for Graduate Professional Track program'),
	(80, 1, 'Faculty Mentored Internship Program (FMIP)  ', 'Government', '2017', '2018', 'West Virginia Department of Education', '$80,000', ''),
	(81, 1, 'WV Internship Program', 'Government', '2018', '2019', 'West Virginia Department of Education', '$66,300', ''),
	(82, 1, 'Smart and Connected Community (SCC)', 'Government', '2018', '', 'NSF', '$2,242,618', '(Pending)'),
	(83, 1, 'Project-based Work Studio (PWS)', 'Government', '2019', '2024', 'NSF S-STEM', '$998,996', '(pending)'),
	(84, 1, 'Computer Science for West Virginia (CS4WV) ', 'Government', '2019', '2012', 'Partnerships for Opportunity and Workforce and Economic Revitalization (POWER)', '$691,771', '(pending)'),
	(85, 89, 'ENERGY DEPLETION ATTACK AGAINST ROUTING PROTOCOL IN THE INTERNET OF THINGS', 'Government', 'June 30, 2018', 'April 09, 2019', 'NASA West Virginia Space Grant Consortium', '9,200', ''),
	(86, 89, 'Suppression Attack Against Routing in the Internet of Things', 'Marshall Funding', 'May 15, 2018', 'August 15, 2018', 'Office of the Vice President for Research', '6,500', ''),
	(87, 200, 'Perturbation Training in Virtual Reality on Human Extravehicular Walking Stability ', 'Government', '2016', '2017', 'NASA-WV Space Grant Consortium', '', ''),
	(88, 224, '', 'Foundation', '', '', 'Sp', '', ''),
	(90, 197, 'Ruth L. Kirschstein National Research Service Award', 'Government', 'June 30, 2015', 'June 30, 2018', 'NIH/NHLBI', '$185,000', 'Interdisciplinary Training in Cardiovascular Science (Postdoctoral Fellowship)'),
	(91, 92, 'Wireless Charging Section Placement', 'Marshall Funding', 'June 2018', 'August 2018', 'Marshall University', '2000.00', 'The objective of the project is to identify the parameters which affect the wireless charging. ');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.industrial: ~6 rows (approximately)
/*!40000 ALTER TABLE `industrial` DISABLE KEYS */;
REPLACE INTO `industrial` (`id`, `faculty_id`, `organization`, `city`, `state`, `country`, `job_title`, `sdate`, `edate`, `description`) VALUES
	(2, 1, 'General Electrics Transportation System', 'Erie', 'PA', 'USA', 'Consultant', '1998', '2015', 'Software Consultant and Director of Graduate Research Internship Program. '),
	(14, 100, 'Prime Computer', 'Zurich', 'NA', 'Switzerland', 'System Engineer', '1882', '1984', 'Prime Computers, in its day a reputable vendor of mid-size computers, with Headquarters at Natick, Massachusetts'),
	(15, 100, 'Commodore', 'Zurich', 'NA', 'Switzerland', 'European Software Manager', '1980', '1982', 'Commodore, one of the earliest vendors of Personal Computers'),
	(16, 100, 'Novartis', 'Basel', 'NA', 'Switzerland', 'Project Manager', '1969', '1980', 'in 1969 I joined the Swiss Chemical-Pharmaceutical firm J R Geigy in its Wissenschaftliche Rechenzentrum as Programmer-Analyst. After the Ciba-Geigy merger and become Novartis, I moved to the Pharma Division, which was responsible for conducting Clinical Trials in the course of developing new Medicines. My last position title was that of Project Manager.'),
	(17, 197, 'SAMSUNG (now KAI)', 'Daejon and Sachon', 'Chungnam and Kyungnam', 'KOREA', 'Engineer', 'Feb 1996', 'Jul 2000', 'Wind Tunnel Test &amp; Scaled Model Design (Aircraft)'),
	(19, 92, 'Institutional Shareholder Services', 'Norman', 'OK', 'USA', 'Intern', 'May 2015', 'Auguts 2015', 'Automation by using Selenium');
/*!40000 ALTER TABLE `industrial` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.membership
CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.membership: ~12 rows (approximately)
/*!40000 ALTER TABLE `membership` DISABLE KEYS */;
REPLACE INTO `membership` (`id`, `faculty_id`, `name`) VALUES
	(1, 1, 'IEEE Computer Society'),
	(8, 100, 'British Computer Society'),
	(9, 100, 'Information Science Institute (InSITE)'),
	(13, 200, 'Senior Member of Institute of Industrial and Systems Engineers'),
	(14, 200, 'Member of Human Factors and Ergonomics Society'),
	(15, 200, 'Professional Member of American Society of Safety Engineers'),
	(16, 224, 'aa'),
	(17, 197, 'Member, American Heart Association 2018'),
	(18, 197, 'Member, American Physiological Society 2018'),
	(19, 197, 'Member, Society for Neuroscience 2018'),
	(20, 197, 'Member, Hydrocephalus Association Network for Discovery Science (HANDS)'),
	(21, 92, 'IEEE Communication Society');
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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Dumping data for table fpmt_07.news: 15 rows
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
REPLACE INTO `news` (`newsId`, `title`, `status`, `dateAndTime`, `professorName`, `facultyId`, `imageName`, `description`, `timeOfNews`, `priority`, `division_id`) VALUES
	(1, 'Dr. Paulus Wahjudi to serve on the Educational Testing Service National Advisory Committee', 'ACCEPTED', '01-09-2018', 'Wook-Sung Yoo', 1, '../images/01-09-2018-1535840581.jpeg', 'Posted on November 2, 2016\r\nThe Educational Testing Service National Advisory Committee plays an importantdw_s role in providing expert input into the development process for the Praxis tests. ETS selects a group of approximately 12 &ndash; 15 educators from the nominees provided by the states to form a committee that is diverse with respect to gender, race and ethnicity, geography, instructional setting, and experience. The NAC will work closely with ETS assessment specialists to develop test specifications and test designs. NAC members may also be invited to write and/or review questions at a later date.\r\n\r\nMore information about Praxis testing:', '1535840581', 0, 1),
	(2, 'Zatar named chair of Precast/Prestressed Concrete Institute Student Education Committee', 'ACCEPTED', '28-08-2018', 'Wook-Sung Yoo', 1, '../images/28-08-2018-1535469439.jpeg', 'Dr. Wael Zatar, dean of the College of Information Technology and Engineering at Marshall University, has been named the chair of the Student Education Committee of the Precast/Prestressed Concrete Institute.\r\n\r\nZatar has been a member of the institute for 15 years and received the Distinguished Award of Fellow for outstanding contributions to the organization. Zatar was previously named the Precast/Prestressed Concrete Institute Distinguished Educator for 2016 and received the Precast/Prestressed Concrete Institute Educator Award in 2009.\r\n\r\nFounded in 1954, the Precast/Prestressed Concrete Institute is the technical institute and trade association for the precast/prestressed concrete structures industry. The institute develops, maintains and disseminates knowledge for the design, fabrication and erection of precast concrete structures and systems.\r\n\r\nAs chair of the Student Education Committee, Zatar will oversee efforts to communicate with and provide resources to faculty and students, as well as organizing educational and training sessions, workshops and competitions for students in the field. The committee also provides continuing education opportunities and resources for professors in the field.', '1535469439', 0, 1),
	(3, 'Marshall student receives SMART Scholarship', 'ACCEPTED', '28-08-2018', 'Wook-Sung Yoo', 1, '../images/28-08-2018-1535469382.jpeg', 'Alex Canfield, a Marshall University sophomore, has received a National Defense Education Program SMART Scholarship. As part of the program, he will participate in a summer internship at a Department of Defense facility and receive civilian job placement after graduation with the Department of Defense.\r\n\r\nA computer science major and Yeager Scholar, Canfield is active in research, community service and leadership.  Last summer, he worked with a research team and Dr. Paulus Wahjudi, associate professor of computer science, on the MonitOR Project&mdash;a partnership with Cabell Huntington Hospital and Marshall University that created an operating room door monitoring system.\r\n\r\n&ldquo;Alex is a great student not only in the classroom but outside of the classroom as well,&rdquo; Wahjudi said. &ldquo;It is great to have the second SMART scholar at Marshall to be another computer science student. We have always known that our students are very competitive and this is another proof of it. The computer science faculty always aim to provide the best well-rounded education and constantly push students to strive for excellence.&rdquo;\r\n\r\nCanfield is a member of the Rotaract Club at Marshall and is an Eagle Scout.\r\n\r\n&ldquo;Long before I was interested in computers, I was interested in building things,&rdquo; Canfield said. &ldquo;The Department of Defense will give me a great opportunity to explore, learn and apply computer science while working with experienced professionals in my field and some of the best resources available.&rdquo;\r\n\r\nThe chair of Marshall&rsquo;s computer science department, Dr. Wook-Sung Yoo, said he is excited about the opportunities this presents for Canfield.\r\n\r\n&ldquo;The SMART Program is a very prestigious scholarship from the DoD,&rdquo; he explained. &ldquo;Alex competed with other excellent students to be selected and this is a testament to both the quality of our students and the strength of our program in the Weisberg Division of Computer Science with its dedicated faculty.&rdquo;\r\n\r\nThe SMART Scholarship is awarded to students in science, technology, engineering and mathematics disciplines who demonstrate an interest in working for the federal government. Awardees must be eligible to receive and maintain a security clearance and must be U.S. citizens. The program has an overall award rate of 14% and accepted around 350 scholars this year. For more information on the SMART Scholarship, contact smart@lmi.org or Mallory Carpenter with Marshall University&rsquo;s Office of National Scholarships by e-mail at Mallory.carpenter@marshall.edu or by phone at 304-696-2475.\r\n\r\nSaveShare', '1535469382', 0, 1),
	(4, 'Marshall computer science students guide St. Joseph Catholic Schools students to world championships in VEX Robotics', 'ACCEPTED', '28-08-2018', 'Wook-Sung Yoo', 1, '../images/28-08-2018-1535469418.jpeg', 'Students in the Weisberg Division of Computer Science the College of Information Technology and Engineering teamed up with students at St. Joseph Catholic Schools to participate in the VEX Robotics Competition. The first year was so successful that students at the grade school and middle-school levels advanced to the World Championship earlier this month.\r\n\r\nUnder the leadership of Dr. Wook-Sung Yoo, chair of the Weisberg Division of Computer Science; Dr. Paulus Wahjudi, an associate professor of computer science; and St. Joe Principal Carol Templeton, the program was brought to life by St. Joe teachers Erika Maynard and Holly Moore and computer science students from Marshall.\r\n\r\nThe aim was to foster collaboration between the school and Marshall to inspire and expose children at a younger age to computer science, Templeton said. VEX Robotics is a robust computer programming and coding challenge. Through this game-based challenge, students learn more than engineering and problem-solving skills, they learn teamwork. About 35 St. Joe students began last fall meeting weekly for two hours with Marshall faculty and about six Marshall undergraduate students. There was so much interest that St. Joe had to cap participation.\r\n\r\nRegional and state tournaments were held, culminating with the VEX Robotics World Championship in the spring. All six teams that were formed at St. Joe advanced to the state competition, and two teams won a state championship and advanced to the world competition earlier this month in Louisville. About 1,500 teams from 60 countries competed in the world championships.\r\n\r\n&ldquo;We didn&rsquo;t come back with trophies, but we did come back with an amazing experience,&rdquo; Templeton said. &ldquo;We will continue with VEX Robotics next year. We have students eager to participate and we have summer workshops already planned with Marshall&rsquo;s help. They&rsquo;re super excited about next year because now they know what they need to do to enhance their robots. They have an idea of what they&rsquo;re really up against now.\r\n\r\n&ldquo;I&rsquo;m proud of our students, our teachers and the collaboration between St. Joe and Marshall,&rdquo; Templeton said. &ldquo;It shows that when you pull collaboratively what you can achieve. If it was not for Marshall University&rsquo;s help, we would not be where we are.&rdquo;\r\n\r\nDr. Wael Zatar, dean of the College of Information Technology and Engineering, said he is very supportive of this effort.\r\n\r\n&ldquo;It is an excellent way for us to collaborate to advance the student knowledge in robotics,&rdquo; he said.\r\n\r\nMarshall will host a &ldquo;Computer Science Adventure Zone: Coding Robots&rdquo; for fifth- through 12th graders from 9 a.m. to 3 p.m. June 18-22 in Room 2119 of the Weisberg Family Applied Engineering Complex.  Cost is $99 per student, with need-based financial assistance available.\r\n\r\nRegister at http://mupfc.marshall.edu/~narman/summercamp/CSA-Z/ or contact Dr. Husnu Narman, narman@marshall.edu, or Meaghan Buckland, bucklandm@marshall.edu, by e-mail for more information.\r\n\r\nFor details of VEX competition, visit https://www.vexrobotics.com/vexiq.\r\n\r\n&mdash;&mdash;&mdash;&ndash;\r\n\r\nPhoto: Students and teachers from St. Joseph Catholic School attended the VEX Robotics World Championship May 1 in Louisville, Ky. From left to right: Principal Carol Templeton, Izzy Styer, teacher Erika Maynard, Dana Marlowe, Will Day, Josh Nichols, Ajay Neginhal, Riley Moran, Aiden Hale, Heidi Short, teacher Holly Moore and Sophie Murphy. They were assisted in preparing their entries by Marshall students in computer science.', '1535469418', 0, 1),
	(15, 'Weisberg complex awarded LEED&reg; Gold level of certification', 'ACCEPTED', '21-09-2018-1537545095', NULL, NULL, '../images/28-08-2018-1535469585.jpeg', 'Marshall&rsquo;s Arthur Weisberg Family Applied Engineering Complex has been awarded LEED&reg; Gold level of certification.\r\n\r\nThe LEED (Leadership in Energy and Environmental Design) rating system, developed by the U.S. Green Building Council (USGBC), is the foremost program for buildings, homes and communities that are desined, constructed, maintained and operated for improved environmental and human health performance.\r\n\r\nThe Weisberg facility opened last year. It is just the seventh building in West Virginia to achieve Gold status, and the first at Marshall University.\r\n\r\n&ldquo;The original goal was to accomplish LEED Silver,&rdquo; said Ron May, director of facilities planning and management at Marshall.  &ldquo;But, I am pleased to say that the project team exceeded the original goal.&rsquo;&rsquo;\r\n\r\nThe project was awarded 60 points which is LEED Gold status and there are four levels of LEED certification &ndash; Certified, Silver, Gold and Platinum.\r\n\r\nThe Weisberg project achieved LEED Gold certification for implementing practical and measurable strategies and solutions aimed at achieving high performance in: sustainable site development, water savings, energy efficiency, materials selection and indoor environmental quality. LEED is the foremost program for the design, construction and operation of green buildings.\r\n\r\n&ldquo;Marshall University&rsquo;s LEED certification demonstrates tremendous green building leadership,&rdquo; said Rick Fedrizzi, CEO and founding chair of USGBC. &ldquo;The urgency of USGBC&rsquo;s mission has challenged the industry to move faster and reach further than ever before, and Marshall serves as a prime example of just how much we can accomplish.&rdquo;\r\n\r\n&ldquo;Building operations are nearly 40 percent of the solution to the global climate change challenge,&rdquo; Fedrizzi said. &ldquo;While climate change is a global problem, innovative universities like Marshall are addressing it through local solutions.&rdquo;\r\n\r\nHere are some of the sustainable building features of the Arthur Weisberg Family Applied Engineering Complex:\r\n\r\nMore than 95% of stormwater runoff generated from the average annual rainfall is captured, treated and slowly released.\r\nA large underground structure along the front of the building retains the first inch of rainfall across the entire site and allows the stormwater to percolate into the existing soils to recharge the ground water.\r\n100% of the site&rsquo;s hardscape surfaces have a reflectant, decreasing the solar heat island effect.\r\nA portion of the roof area over the Advanced Materials Testing Lab includes a live roof, which also provides for an outdoor instruction and lounge space for building occupants.\r\nRainwater is collected individually from various areas in the live roof and connected to the environmental lab, where quantity, as well as quality, measurements can be made and compared with untreated roof areas.\r\nPotable water usage was reduced by 40% over the baseline average of similar buildings.\r\nPortions of the water for the toilets are supplied by harvesting rainwater collected on roof areas.\r\nBuilding energy cost savings is 25% over the baseline average of similar buildings.\r\n60% of waste generated by the construction was diverted from the landfill. When including site clearing, removal of existing asphalt paving and existing soil, 91% of on-site generated waste was diverted from the landfill.\r\n31% of the total building material value was manufactured using recycled materials.\r\n55% of the total building material value includes materials and products manufactured and extracted within 500 miles of the project.\r\n77% of the total wood-based materials are certified in accordance with the Forest Stewardship Council&rsquo;s principles and criteria, which encourage environmentally responsible forest management.\r\nAll adhesives, sealants, flooring materials and paints used on the building&rsquo;s interior contain low volatile organic compound (VOC) amounts.\r\nLighting controls were provided for 95% of the building occupants and 100% of shared multi-occupant spaces.\r\nThermal controls were provided for 74% of the building occupants and 100% of shared multi-occupant spaces.\r\n', NULL, 1, NULL),
	(9, 'Computer Science Adventure Zone Summer Camp', 'ACCEPTED', '17-09-2018', NULL, NULL, '../images/16-09-2018-1537075601.jpeg', 'Computer Science Adventure Zone Summer Camp successfully completed. 30 K-4 - K-12 Students attend VEX IQ Robot Camp.  ', '1537213231', 0, 1),
	(8, 'Summer Research for Undergraduate', 'ACCEPTED', '17-09-2018', 'Wook-Sung Yoo', 1, '../images/17-09-2018-1537213074.jpeg', 'Computer Science student Anh Nguyen conducted research and development of a Deployable Remote Online Network Evaluator (DRONE) under the supervision of Dr. Paulus Wahjudi as a SURE fellow this summer. The project is conducted in collaboration with the State of West Virginia Office of Technology Cyber Security division. The DRONE project focuses on the development of a multi task single board computer capable of providing remote network evaluation and monitoring to detect and mitigate threats to cyber infrastructures.  The SURE project is funded through the West Virginia Research Challenge Fund, administered by the West Virginia Higher Education Policy Commission, Division of Science and Research. ', '1537213074', 0, 1),
	(10, 'Cyber Patriot Camp', 'ACCEPTED', '17-09-2018', 'Wook-Sung Yoo', 1, '../images/17-09-2018-1537213433.jpeg', 'Marshall University Weisberg Division of Computer Science hosted CyberPatriot Camp for students in seventh through 12th grades Monday through Friday, July 23-27. Students will have the opportunity to learn important skills in cyber safety and cybersecurity and participate in a mini-competition on Friday, July 27. No previous experience is necessary, other than an interest in cybersecurity. The camp is the first and only one of its kind to be offered in West Virginia. \r\n\r\nDr. Wael Zatar, dean of the College of Information Technology and Engineering, said he believes this camp will be an excellent opportunity for students interested in the cybersecurity field to gain meaningful knowledge and learn important skills in cyber safety and cybersecurity.\r\n', '1537213433', 0, 1),
	(11, 'Dr. Cong Pu presented his research paper at the IEEE CSCloud 2018 in Shanghai, China. ', 'ACCEPTED', '17-09-2018', 'Wook-Sung Yoo', 1, '../images/17-09-2018-1537213849.jpeg', 'Dr. Cong Pu presented his research paper &ldquo;Hatchetman Attack: A Denial of Service Attack Against Routing in Low Power and Lossy Networks&rdquo; at the 5th IEEE International Conference on Cyber Security and Cloud Computing (IEEE CSCloud 2018) in Shanghai, China. The paper presents a new type of DoS attack, called hatchetman attack, in promptly emerging RPL-based Low Power and Lossy Networks. For details, click here: http://mupfc.marshall.edu/~puc/html/papers/cscloud_18.pdf', '1537213849', 0, 1),
	(16, 'Dr. Haroon Malik to server as program chair of the International Conference on Emerging Data and Industry 4.0 (EDi40)', 'ACCEPTED', '25-09-2018', 'Wook-Sung Yoo', 1, '../images/25-09-2018-1537890081.png', 'Dr. Haroon Malik serves as the Program-Chair of the International Conference on Emerging Data and Industry 4.0 (EDi40), a leading international conference for academia, industry and government to share their new ideas, original research results and practical development experiences interested in enhancing their digital strategies. Digitalization, or the next Industrial Revolution 4.0, is already impacting each facet of life and existing business models. It permits organizations to transform their product ideas into reality in a very new approach by drawing on technological trends such as smart data analytics, industrial processes automation and developing intelligent models. \r\nThis conference bridges the gap between industry, data engineers, and data scientists. It is centered on the new frontiers of applied data science, providing presentations and hands-on workshops from the best data scientists. The main topic areas of the conference include big data analytics, cyber-physical systems, fog and edge computing, internet of everything, and more. \r\nEDI40 2019 will be held in Leuven, Belgium. \r\nhttp://cs-conferences.acadiau.ca/EDI40-19/', '1537890081', 0, 1),
	(17, 'A Survey of Mobile Crowd-sensing Techniques: A Critical Component for The Internet of Things is published in ACM Transactions on Cyber-Physical Systems', 'ACCEPTED', '28-09-2018', 'Wook-Sung Yoo', 1, '../images/28-09-2018-1538143839.png', 'Dr. Narman&rsquo;s co-authored survey paper with Drs. Jinwei Liu, Haiying Shen, Wingyan Chung, and Zongfang Lin has been published in ACM Transactions on Cyber-Physical Systems. In this paper, our objectives in reviewing the literature are threefold: 1) to learn what are the problems existing in Mobile Crowdsensing Techniques (MCS) and how the proposed techniques have helped to develop solutions in the past; 2) to learn the strengths and limitations of different MCS techniques for smartly managing the resource to achieve low cost and good QoS, and how can we use those techniques to better solve similar problems in the future in different paradigms such as the IoT; 3) to provide guidance on the future research directions of MCS for IoT.Visit https://dl.acm.org/citation.cfm?id=3185504 to read the paper. ', '1538143839', 0, 1),
	(18, 'Popularity-aware Multi-failure Resilient and Cost-effective Replication for High Data Durability in Cloud Storage research paper has been accepted to IEEE Transaction on Parallel and Distributed Systems. ', 'ACCEPTED', '28-09-2018', 'Wook-Sung Yoo', 1, '../images/28-09-2018-1538143955.png', 'Dr. Narman&rsquo;s co-authored research paper with Drs. Jinwei Liu, Haiying Shen,  Zongfang Lin, and Zhuozhao Li has been accepted to  IEEE Transaction on Parallel and Distributed Systems. In this research paper, we aim to design a cost-effective replication scheme that can achieve high data\r\ndurability and availability while reducing storage cost and bandwidth cost caused by replication. To achieve our goal, we propose a popularity-aware multi-failure resilient and cost-effective replication scheme (PMCR), which has advantages over the previous proposed replication schemes because it concurrently owns the following distinguishing features: First, it can handle both correlated and non-correlated machine failures. Second, it compresses rarely used replicas of unpopular data to reduce storage cost and bandwidth cost without compromising the data durability, data availability, and data request delay greatly. \r\n', '1538143955', 0, 1),
	(33, '', 'ACCEPTED', '02-04-2019', 'Wook-Sung Yoo', 1, NULL, '', '1554238841', 0, 1),
	(34, '', 'ACCEPTED', '02-04-2019', 'Wook-Sung Yoo', 1, NULL, '', '1554238949', 0, 1),
	(35, 'Test', 'ACCEPTED', '02-04-2019', 'Wook-Sung Yoo', 1, NULL, 'Test', '1554239036', 0, 2);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.research
CREATE TABLE IF NOT EXISTS `research` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facult_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table fpmt_07.research: ~13 rows (approximately)
/*!40000 ALTER TABLE `research` DISABLE KEYS */;
REPLACE INTO `research` (`id`, `facult_id`, `title`, `summary`) VALUES
	(42, 89, '', 'Cybersecurity, Wireless Networks and Mobile Computing, Energy Harvesting Motivated Networks, Mobile Ad Hoc Networks, Low Power and Lossy Networks, and Evacuation Assisting Vehicular Networks'),
	(43, 91, '', 'Secure software engineering and intrusion detection to provide secure cyber infrastructure along with development of custom algorithms, tools and software that can enhance the capabilities of existing cyber infrastructure.'),
	(44, 92, '', 'Resource Allocation, Network, Cloud Computing,  K-12 Education'),
	(48, 1, '', 'Mobile/Web Technology, Software Engineering, Health/Dental Informatics, Bioinformatics, Artificial Intelligence, Scheduling, K-12 Computing Education.'),
	(58, 98, '', '1. Mining Social Repositories\r\n2. WSN &amp; IoT\r\n3. Performance Testing\r\n4. Green Software\r\n'),
	(62, 100, 'null', 'My research interest is in informations systems, job design, management theory, clinical trial study, computer science (software engineering, artificial intelligence, medical engineering, algorithm, and data analysis).'),
	(63, 200, 'null', 'My research interests lie in the general field of physical ergonomics. More specifically, my research work is devoted to developing innovative fall prevention technology through perturbation-training paradigm and virtual reality technology.'),
	(64, 224, 'null', 'XYZ '),
	(65, 197, 'null', 'Neurovascular interactions in hydrocephalus, neural control of blood pressure in hypertension, vascular stiffness regulation, pathophysiology of neurodegeneration, and skeletal biomechanics.'),
	(66, 126, 'null', '- Advanced Manufacturing\r\n- BioMedical Fabrication\r\n- Physics-based Modeling and Simulation\r\n- System Dynamics and Control\r\n- Machine Learning and Artificial Intelligence\r\n- Computer Vision'),
	(67, 196, 'null', 'Geosynthetics, Life Cycle Assessment (LCA) of polymeric construction materials, Evaluation of fracture properties using multi-scale modeling including Finite Element Method\r\n(FEM) and Molecular Dynamic (MD) Simulation, Failure analysis of construction materials manufactured by 3-D printing technique, UV degradation of polymeric infrastructures'),
	(68, 198, 'null', 'Research interests include geotechnical engineering and geophysics applications; high performance computing and visualization applications; water resource modelling; mine safety technology.       '),
	(69, 219, 'null', 'My research focuses on Multi-Objective Optimal Design of Linear and Nonlinear Control Systems.');
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
) ENGINE=InnoDB AUTO_INCREMENT=181 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.selected_publications: ~45 rows (approximately)
/*!40000 ALTER TABLE `selected_publications` DISABLE KEYS */;
REPLACE INTO `selected_publications` (`id`, `publication_title`, `publication_author`, `genre_type`, `faculty_id`, `data`, `publication_year`) VALUES
	(68, 'PinPoint: Wi-Fi Based Indoor Positioning System', 'D. Davis, K. Patel and P. Wahjudi', 'Journal of Management and Engineering Integration, Volume 7 No.2', 91, '												 ', NULL),
	(69, 'Dynamic Free Text Keystroke Biometrics System for Simultaneous Authentication and Adaptation to Userâ€™s Typing Pattern', 'A. King and P. Wahjudi', 'Journal of Management and Engineering Integration, Volume 6 No.2', 91, '												 ', NULL),
	(70, 'Intelligent Framework for Software Analysis, Reuse and Fabrication,â€ ', 'P. Wahjudi', 'Journal of Management and Engineering Integration, Volume 3 No.2', 91, '												 ', NULL),
	(71, 'Smart Server: Concepts and Applications', 'J. Gourd, M. Cobb, P. Wahjudi, D. Ali', 'International Journal of Intelligent Systems', 91, '												 ', NULL),
	(72, 'CCRP: Customized Cooperative Resource Provisioning for High Resource Utilization in Clouds', 'Jinwei Liu, Haiying Shen, and Husnu S. Narman ', 'IEEE International Conference on Big Data,', 92, '												 ', '2016'),
	(73, 'Joint and Selective Component Carrier Assignment in LTE-A', 'Husnu S. Narman, Mohammed Atiquzzaman, Mehdi Rahmani-andebili, and Haiying Shen ', 'Elsevier Computer Networks', 92, '												 ', '2016'),
	(77, 'Development of Home Management System Using Arduino and AppInventor ', 'Wook-Sung Yoo and Sameer Ahamed Shaik ', 'The 40th IEEE Computer Society International Conference on Computers, Software &amp; Applications, Atlanta, Georgia, USA  ', 1, 'Proceedings of COMPSAC 2016, June 10-14', '2016'),
	(79, 'Online Group Embedded Figures Test and Student&rsquo;s Success in Online Course', 'Wook-Sung Yoo', 'Edition 5, ISBN (978-88-6292-620-1)	', 1, 'Proceeding of The Future of Education									 ', '2015'),
	(80, 'Validation of Periodontitis Screening Model Using Sociodemographic, Systemic, and Molecular Information in a Korean Population', 'Hyun-Duck Kim, Munkhzaya Sukhbaatar, Myungseop Shin, Yoo-Been Ahn and Wook-Sung Yoo', 'Journal of Periodontology', 1, 'Vol. 85, No. 12: 1676-1683												 ', '2014'),
	(81, 'Software Engineering Service Learning Capstone Project: Implementation and Measuring Its Impact', 'Wook-Sung Yoo', 'The Journal for Civic Commitment', 1, 'Vol. 20', '2013'),
	(90, 'Analysis and Synthesis of Managerial Jobs: Job Design', 'Chaudri, Mohamed Jamil', ' Doctoral thesis', 100, 'Durham University', '1982'),
	(96, 'Painless Tennis Ball Tracking System', 'Zach Jones, Henok Atsbaha, David Wingfield, Wook-Sung Yoo', 'Proceedings of IEEE 42nd Annual Computer Software and Applications Conference (COMPSAC)', 1, 'pp.783 &ndash; 784', '2018'),
	(97, 'PPHA-Popularity Prediction based High Data Availability for Datacenter', 'Kuo-chi Fang, Husnu S. Narman, Ibrahim Hussein Mwinyi, and Wook-Sung Yoo', 'Wireless Telecommunications Symposium (WTS)', 1, 'International Journal of Interdisciplinary telecommunications &amp; Networking (IJITN)', '2018'),
	(98, 'Comparing mobile apps by identifying â€˜Hotâ€™ features', 'Haroon Malik , Elhadi M. Shakshuki, WookSung Yoo ', 'Future Generation Computer Systems ', 1, 'https://doi.org/10.1016/j.future.2018.02.008', '2018'),
	(99, 'Comparing mobile apps by identifying â€˜Hotâ€™ features', 'Haroon Malik , Elhadi M. Shakshuki, WookSung Yoo ', 'Future Generation Computer Systems ', 1, 'https://doi.org/10.1016/j.future.2018.02.008', '2018'),
	(102, 'Light-Weight Forwarding Protocols in Energy Harvesting Wireless Sensor Networks', 'Cong Pu, Tejaswi Gade, Sunho Lim, Manki Min, and Wei Wang', 'IEEE Military Communications Conference (MILCOM)', 89, '', '2014'),
	(103, 'Spy vs. Spy: Camouflage-based Active Detection in Energy Harvesting Motivated Networks', 'Cong Pu and Sunho Lim', 'IEEE Military Communications Conference (MILCOM)', 89, '', '2015'),
	(104, 'A Light-Weight Countermeasure to Forwarding Misbehavior in Wireless Sensor Networks: Design, Analysis, and Evaluation', 'Cong Pu and Sunho Lim', 'IEEE Systems Journal (IF: 4.337)', 89, '', '2016'),
	(105, 'Validity Region Sensitive Query Processing Strategies in Mobile Ad Hoc Networks', 'Byungkwan Jung, Sunho Lim, Jinseok Chae and Cong Pu', 'IEEE Military Communications Conference (MILCOM)', 89, '', '2016'),
	(106, 'Mitigating Stealthy Collision Attack in Energy Harvesting Motivated Networks', 'Cong Pu, Sunho Lim, Byungkwan Jung, and Manki Min', 'IEEE Military Communications Conference (MILCOM)', 89, '', '2017'),
	(107, 'Active Detection in Mitigating Routing Misbehavior for MANETs', 'Cong Pu, Sunho Lim, Jinseok Chae, and Byungkwan Jung', 'Wireless Networks, Springer (IF: 1.981)', 89, '', '2017'),
	(108, 'VRSense: Validity Region Sensitive Query Processing Strategies for Static and Mobile Point-of-Interests in MANETs', 'Computer Communications, Elsevier (IF: 3.338)', 'Byungkwan Jung, Sunho Lim, Jinseok Chae, and Cong Pu', 89, '', '2017'),
	(109, 'Mitigating Forwarding Misbehaviors in RPL-based Low Power and Lossy Networks', 'Cong Pu and Salam Hajjar', 'IEEE Consumer Communications & Networking Conference (CCNC)', 89, '', '2018'),
	(110, 'Mitigating DAO Inconsistency Attack in RPL-based Low Power and Lossy Networks', 'Cong Pu', 'IEEE Computing and Communication Workshop and Conference (CCWC)', 89, '', '2018'),
	(111, 'EYES: Mitigating Forwarding Misbehavior in Energy Harvesting Motivated Networks', 'Cong Pu, Sunho Lim, Byungkwan Jung, and Jinseok Chae', 'Computer Communications, Elsevier (IF: 3.338)', 89, '', '2018'),
	(112, 'Personalized Prediction of Asthma Severity and Asthma Attack for a Personalized Treatment Regimen', 'Quan Do, Son Tran, Jamil Chaudri', '40th Annual International Conference of the IEEE Engineering in Medicine and Biology Society  (EMBC 18)', 100, '', '2018'),
	(113, 'Analysis of managerial heuristics through the last few decades', 'Junaid Mohammed, Priyadarshini, Jamil Chaudri', 'The XXXth Annual Occupational Ergonomics and Safety Conference, Pittsburgh, PA, USA (Jun 7-8)', 100, '', '2018'),
	(114, 'Classification of Asthma Severity and Medication Using TensorFlow and Multilevel Databases', 'Quan Do, Son Tran, Jamil Chaudri', 'The 7th International Conference on Current and Future Trends of Information and Communication Technologies in Healthcare (ICTH 2017) ', 100, '', '2017'),
	(115, 'Classification of Daily Activities for the Elderly using Wearable Sensors', 'Liu, J., Sohn, J.H., & Kim, S.', 'Journal of Healthcare Engineering', 200, 'Vol. 2017, Article ID 8934816, 7pages', '2017'),
	(116, 'Current prevalence rate of latex allergy: Why it remains a problem?', 'Wu, M., McIntosh, J.D., & Liu, J. ', 'Journal of Occupational Health', 200, '58(2): 138-144', '2016'),
	(117, 'Effects of Perturbation-Based Slip Training using a Virtual Reality Environment on Slip-induced Falls', 'Parijat, P., Lockhart, T. E., and Liu, J.', 'Annals of Biomedical Engineering', 200, '43(4), 958-967', '2015'),
	(118, 'EMG and Kinematic Responses to Unexpected Slips after Slip Training in Virtual Reality', 'Parijat, P., Lockhart, T. E., and Liu, J.', 'IEEE Transactions on Biomedical Engineering', 200, '62(2), 593-599', '2015'),
	(119, 'Trunk angular kinematics during slip-induced backward falls and activities of daily living', 'Liu, J.*, & Lockhart, T. E.', 'Journal of Biomechanical Engineering', 200, '136(10), 101005', '2014'),
	(120, 'A', 'AB', 'ABC', 224, '', '1991'),
	(121, 'VEGF signaling in neurological disorders', 'Shim JW, Madsen JR', 'Int J Mol Sci', 197, '19(1). pii: E275', '2018'),
	(122, 'HB-EGF, which promotes VEGF signaling, leads to hydrocephalus', 'Shim JW, Sandlund J, Hameed MQ, Blazer-Yost B, Klagsbrun M, Madsen JR', 'Sci Rep', 197, '6:26794', '2016'),
	(123, 'Norepinephrine-evoked salt-sensitive hypertension requires impaired renal sodium chloride cotransporter (NCC) activity in Sprague-Dawley rats', 'Walsh KR, Kuwabara JT, Shim JW, Wainford RD', 'Am J Physiol Regul Integr Comp Physiol.', 197, 'Nov 25:ajpregu.00514', '2015'),
	(126, 'Physical Weight Loading Induces Expression of Tryptophan Hydroxylase 2 in the Brain Stem', 'Shim JW*, Dodge TR, Hammond MA, Wallace JM, Zhou FC, Yokota H', 'PLoS ONE', 197, '9(1): e85095', '2014'),
	(127, 'VEGF, which is elevated in the CSF of patients with hydrocephalus, causes ventriculomegaly and ependymal changes in rats', 'Shim, JW, Sandlund J, Han CH, Hameed MQ, Connors S, Klagsbrun M, Madsen JR, Irwin N', 'Exp Neurol.', 197, '247:703-709', '2013'),
	(129, 'AAV-driven expression of functional PLA2g6(L) in Parkinson&rsquo;s disease', 'Yen A, Shim JW, Nipa F, Bachschmid MM, Pirot S, Mannoury-la-Cour C, Milan MJ, Bolotina V', 'Society for Neuroscience Annual Conference', 197, 'Washington D.C., November 11-15', '2017'),
	(130, 'Roles Of Central &alpha;2 And AT1 Signal Transduction Via G&alpha;i2 Proteins In Blood Pressure Regulation In Response To An Acute Sodium Challenge', 'Shim JW, Wainford RD, Carmichael CY', 'The FASEB Journal/Experimental Biology Annual Conference', 197, 'Abstract Number:1006.12', '2016'),
	(131, 'SMC-specific Impairment of PLA2g6-dependent SOCE as a New Mechanism of Protection Against Arterial Stiffening', 'Shim JW, Seta F, Bolotina VM', 'Circulation/AHA Annual Conference', 197, '8 June/136:A15530', '2018'),
	(133, 'A Computational Fluid Dynamics (CFD) Study of Material Transport and Deposition in Aerosol Jet Printing (AJP) Process', 'R. Salary, J.P. Lombardi, D.L. Weerawarne, P.K. Rao, and M.D. Poliks', 'ASME International Mechanical Engineering Congress& Exposition (IMECE 2018), David L. Lawrence Convention Center, Pittsburgh, PA, USA, November 9-15, 2018.', 126, '', '2018'),
	(134, 'In Situ Functional Monitoring of Aerosol Jet Printed Electronic Devices Using a Combined Sparse Classification Approach', 'R. Salary, J.P. Lombardi, D.L. Weerawarne, M.S. Tootooni, P.K. Rao, and M.D. Poliks', 'ASME 13th Manufacturing Science and Engineering Conference (MSEC 2018), Paper No. 6586, 12 pages, Texas A&M University, College Station, TX, USA, June 18-22, 2018.', 126, '', '2018'),
	(135, 'In Situ Image-Based Monitoring and Closed-Loop Control of Aerosol Jet Printing', 'J.P. Lombardi, R. Salary, D.L. Weerawarne, P.K. Rao, and M.D. Poliks', 'ASME 13th Manufacturing Science and Engineering Conference (MSEC 2018), Paper No. 6487, 10 pages, Texas A&M University, College Station, TX, USA, June 18-22, 2018.', 126, '', '2018'),
	(136, 'Physics-based Functional Monitoring of Aerosol Jet-Printed, Electronic Devices', 'R. Salary, J.P. Lombardi, D.L. Weerawarne, M.S. Tootooni, P.K. Rao, and M.D. Poliks', 'IISE Annual Conference and Expo, Loews Royal Pacific Resort, Orlando, FL, USA, May 19-22, 2018.', 126, '(Doctoral Colloquium Award - 1st Place)', '2018'),
	(137, 'In Situ Mapping of Displacement and Strain Fields Using Digital Image Correlation and FEA', 'R. Salary, D.L. Weerawarne, J.P. Lombardi, and M.D. Poliks', 'IISE Annual Conference and Expo, Loews Royal Pacific Resort, Orlando, FL, USA, May 19-22, 2018.', 126, '', '2018'),
	(138, 'Online Monitoring of Functional Electrical Properties in Aerosol Jet Printing (AJP) Additive Manufacturing (AM) Process Using Shape-from-Shading (SfS) Image Analysis', 'R. Salary, J.P. Lombardi, P.K. Rao, and M.D. Poliks', 'ASME Transactions, Journal of Manufacturing Science and Engineering, 139(10): 101010-101010-13, 2017. doi: 10.1115/1.4036660.', 126, '', '2017'),
	(139, 'Additive Manufacturing (AM) of Flexible Electronic Devices: Online Monitoring of 3D Line Morphology in Aerosol Jet Printing Process using Shape-from-Shading Image Analysis', 'R. Salary, J.P. Lombardi, P.K. Rao, and M.D. Poliks', 'ASME 12th Manufacturing Science and Engineering Conference (MSEC 2017), Paper No. 2947, 9 pages, University of Southern California, Los Angeles, CA, USA, June 4 - 8, 2017.', 126, '', '2017'),
	(140, 'Computational Fluid Dynamics (CFD) Modeling and Online Monitoring of Aerosol Jet Printing Process', 'R. Salary, J.P. Lombardi, M.S. Tootooni, R. Donovan, P.K. Rao, P. Borgesen, and M.D. Poliks', 'ASME Transactions, Journal of Manufacturing Science and Engineering, 139(2), pp. 021015-021036, 2016. doi: 10.1115/1.4034591.', 126, '', '2016'),
	(141, 'In-situ Sensor-based Monitoring and Computational Fluid Dynamics (CFD) Modeling of Aerosol Jet Printing (AJP) Process', 'R. Salary, J.P. Lombardi, M.S. Tootooni, R. Donovan, P.K. Rao, P. Borgesen, and M.D. Poliks', 'ASME 11th Manufacturing Science and Engineering Conference (MSEC 2016), Paper No. 8535, Vol. 2, pp. V002T04A049; 13 pages, Virginia Tech, Blacksburg, VA, USA, June 27 â€“ July 1, 2016. doi: 10.1115/MS', 126, '', '2016'),
	(142, 'An Examination of the Intrinsic Activity and Stability of Various Solid Acids During the Catalytic Decarboxylation of Î³-Valerolactone', 'A.B. Kellicutt, R. Salary, O.A. Abdelrahman, and J.Q. Bond', 'Royal Society of Chemistry Journal of Catalysis Science & Technology, 4, 2267-2279, 2014. doi: 10.1039/C4CY00307A.', 126, '', '2014'),
	(143, 'Popularity-aware Multi-failure Resilient and Cost-effective Replication for High Data Durability in Cloud Storage', 'Jinwei Liu, Haiying Shen, and Husnu Saner Narman, and Wingyan Chung', 'IEEE Transactions on Parallel and Distributed Systems', 92, '', '2018'),
	(144, 'Predictive Self-Learning Content Recommendation System for Multimedia Contents', 'Ibrahim Hussein Mwinyi, Husnu Saner Narman, Kuo-Chi Fang, and Wook-Sung Yoo', 'Wireless Telecommunications Symposium', 92, '', '2018'),
	(145, 'A Survey of Mobile Crowdsensing Techniques: A Critical Component for The Internet of Things', 'Jinwei Liu, Haiying Shen, and Husnu Saner Narman, Wingyan Chung, and Zongfang Lin', 'ACM Transactions on Cyber-Physical Systems', 92, '', '2018'),
	(146, 'Characterizing Data Deliverability of Greedy Routing in Wireless Sensor Networks', 'Jinwei Liu, Haiying Shen, Lei Yu, Husnu Saner Narman, Jiannan Zhai, Jason O. Hallstrom, and Yangyang He', 'IEEE Transactions on Mobile Computing', 92, '', '2017'),
	(147, 'PPHA-Popularity Prediction based High Data Availability for Multimedia Data Center', 'Kuo-Chi Fang, Husnu Saner Narman, Ibrahim Hussein Mwinyi, and Wook-Sung Yoo', 'International Journal of Interdisciplinary Telecommunications and Networking', 92, '', '2018'),
	(148, 'Fracture Characterization of Recycled HDPE/Nanoclay Composites for pipe materials', 'S. Na and Y.G. Hsuan', 'UKC 2018, New York, NY, 2018', 196, '', '2018'),
	(149, 'A new approach to correlate slow crack growth of HDPE nanocomposites with fracture toughness', 'S. Na, L. Nguyen, S. Spatari and Y.G. Hsuan', '11th International Conference on Geosynthetics, Seoul, Korea, 2018', 196, '', '2018'),
	(150, 'Sunlight degradation of polymeric detectable warning surface (DWS) products', 'S. Na, S. Vahidi, H. Nguyen, A. ElSafety and Y.G. Hsuan', 'Transportation Research Record (TRR)', 196, '', '2018'),
	(151, 'Effects of recycled HDPE and nanoclay on stress cracking of HDPE by correlating Jc with slow crack growth', 'S. Na, L. Nguyen, S. Spatari, Y.G. Hsuan', 'Polymer Engineering and Science', 196, 'doi:10.1002/pen.24691', '2017'),
	(152, 'Evaluating the effect of nanoclay and recycled HDPE on stress cracking in HDPE using J-integral approach', 'S. Na, L. Nguyen, S. Spatari, and Y.G. Hsuan', 'ANTEC 2016', 196, 'Best Paper Award', '2016'),
	(153, 'Fracture characterization of recycled high density polyethylene/nanoclay composites using the essential work of fracture concept', 'S. Na, S. Spatari, and Y.G. Hsuan', 'Polymer Engineering and Science', 196, '56:222-232', '2016'),
	(154, 'Fracture characterization of Pristine/Post-consumer HDPE blends using the essential work of fracture (EWF) concept and extended finite element method(XFEM)', 'S. Na, S. Spatari, and Y.G. Hsuan', 'Engineering Fracture Mechanics', 196, '139:1-27', '2015'),
	(155, 'Application of extended finite element method to determine the plane-strain essential work of fracture of polyethylene', 'S. Na, A.C.W. Lau, S. Spatari, and Y.G. Hsuan', 'ANTEC 2013', 196, 'Best Paper Award', '2013'),
	(156, 'Performance evaluation of counter selection techniques to detect discontinuity in large-scale-systems.', 'Haroon Malik, Elhadi M. Shakshuki', ' J. Ambient Intelligence and Humanized Computing, Springer', 98, '9(1): 43-59 (2018)', '2018'),
	(157, 'Detecting performance anomalies in large-scale software systems using entropy', 'Haroon Malik, Elhadi M. Shakshuki', 'Personal and Ubiquitous Computing, Springer', 98, '21(6): 1127-1137 (2017)', '2017'),
	(158, 'Exploring the Relationship Between Version Updates and Downloads of Asthma Mobile Apps.', 'Haroon Malik, Elhadi M. Shakshuki, Soujanya Katuku', 'ANT, Elsevier', 98, '', '2007'),
	(159, 'Connecting the Dots: Anomaly and Discontinuity Detection in Large-Scale Systems', 'Haroon Malik, Ian J Davis, Michael W. Godfrey, Douglas Neuse, Serge Mankovskii', 'Future Generation Computer Systems, Elsevier', 98, '', '2016'),
	(160, 'Recommending Posts Concerning API Issues in Developer Q&amp;A Sites&quot;, The 12th Working Conference on Mining Software Repositories ', 'Wei Wang, Haroon Malik and Mike Godfrey', 'MSR', 98, '', '2015'),
	(161, 'An Exploratory Analysis of Energy Related Questions', 'Haroon Malik, Peng Zhao and Michael Godfrey,', 'MSR 2015', 98, '', '2015'),
	(162, 'Automatic Detection of Performance Deviations during Load Testing of Large Scale Systems', 'Haroon Malik, Hadi Hemmati, Ahmed E. Hassan', 'ICSE-SEIP', 98, '', '2013'),
	(163, 'Cyberinfrastructure Supporting Watershed Health Monitoring and Management', 'Szwilski, A.B., Smith, J.,  Chapman, J., Lewis, M.', 'WIT Transactions on Ecology and the Environment', 198, 'Vol. 228, ISSN 174-3541.', '2018'),
	(164, 'Monitoring Water Quality Using Hierarchal Routing Protocol for Wireless Sensor Networks', 'Malik, H., Szwilski, A.B.', 'The 7th International Conference on Emerging Ubiquitous Systems and Pervasive Networks (EUSPN 2016),', 198, ' United Kingdom (August)  Elsevier', '2016'),
	(165, 'Developing an Interactive, Collaborative Virtual Underground Mine to Support Mine Emergency Response Exercisesâ€™â€™ ', 'Szwilski, A.B., Smith, J.,  Chapman, J., Lewis, M.', 'World Mining Congress', 198, 'Montreal, August', '2013'),
	(166, 'Renewables Energy and Property Re-use on Surface Mined Lands', 'Carico, G., Wolfe, J., Szwilski, A.B., ', 'World Mining Congress', 198, 'Montreal', '2013'),
	(167, 'Internet-based Virtual Environments to Support Mine Safety Training and Simulations', 'Szwilski, A. B., Smith, J. et al ', 'SWEMP Conference,', 198, 'Prague, June', '2010'),
	(168, ' Mine Safety Training: Advantage of Collaborative and Interactive Web-based Virtual Technology', 'Szwilski, A.B, Smith, J. et al', 'Seventeenth International Symposium on Mine Planning and Equipment Selection (MPES) ', 198, 'Beijing, China (October) ', '2008'),
	(169, ' Mine Safety Training: Advantage of Collaborative and Interactive Web-based Virtual Technology', 'Szwilski, A.B, Smith, J. et al', 'Seventeenth International Symposium on Mine Planning and Equipment Selection (MPES) ', 198, 'Beijing, China (October) ', '2008'),
	(170, 'Employing High Accuracy DGPS to Monitor Track Shift', 'Szwilski, A.B., Lees Jr, H.M., et al ', '7th  World Congress on Railway Research,', 198, ' Montreal, Canada (June)', '2006'),
	(171, 'Stability enhancement of a high-speed train bogie using active mass inertial actuators', 'Yuan Yao , Guang Li, Yousef Sardahi, Jian-Qiao Sun', 'Vehicle System Dynamics', 219, '', '2018'),
	(172, 'Study on Frame Lateral Vibration Control to Improve Hunting Stability of High-Speed Train Bogie', 'Yuan Yao, Kailin Zhang, Yousef Sardahi, J. Q. Sun', 'First International Conference on Rail Transportation 2017', 219, '', '2018'),
	(173, 'Hunting stability analysis of high-speed train bogie under the frame lateral vibration active control', 'Yuan Yao ,Guosong Wu, Yousef Sardahi, Jian-Qiao Sun', 'Vehicle System Dynamics', 219, '', '2017'),
	(174, 'Multi-Objective Optimal Control of Under-Actuated Bogie System of High Speed Trains', 'Yousef Sardahi, Yuan Yao , Jian-Qiao Sun', 'Conference: DSCC - Dynamic Systems and Control Conference, Minneapolis', 219, '', '2016'),
	(175, 'Many-objective Optimal and Robust Design of PID Controls with a State Observer', 'Yousef Sardahi, Jian-Qiao Sun, Carlos HernÃ¡ndez , Oliver Schuetze', 'Journal of Dynamic Systems Measurement and Control ', 219, '', '2016'),
	(176, 'Many-Objective Optimal Design of Sliding Mode Controls', ' Yousef Sardahi, Jian-Qiao Sun', 'Journal of Dynamic Systems Measurement and Control ', 219, '', '2016'),
	(177, ' Multi-Objective Optimization of Time-Delayed Fractional-Order Damping for Better Step Response', ' Yousef Sardahi, Yousef Naranjani, YangQuan Chen, Jian-Qiao Sun', ' Proceedings of the ASME 2015 International Mechanical Engineering Congress and Exposition IMECE2015At: November 13-19, 2015, Houston, Texas', 219, '', '2015'),
	(178, 'Multi-Objective Optimization of Distributed-Order Fractional Damping', ' Yousef Naranjani, Yousef Sardahi,YangQuan Chen,  Jian-Qiao Sun', 'Communications in Nonlinear Science and Numerical Simulation', 219, '', '2015'),
	(180, 'Test2', 'Test', 'Test', 223, 'Test', '2019');
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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.staff: ~1 rows (approximately)
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
REPLACE INTO `staff` (`id`, `name`, `l_name`, `email`, `image`, `department_id`, `division_id`, `password`, `role`, `phone`, `office`, `status`, `permissions`) VALUES
	(49, 'Elizabeth', 'Hanahan', 'hanrahan@marshall.edu', '', 6, 1, '', 5, '', '', 0, 0);
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.staff_roles
CREATE TABLE IF NOT EXISTS `staff_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '<undefined role>',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='A table containing all possible staff roles';

-- Dumping data for table fpmt_07.staff_roles: ~2 rows (approximately)
/*!40000 ALTER TABLE `staff_roles` DISABLE KEYS */;
REPLACE INTO `staff_roles` (`id`, `name`) VALUES
	(5, 'Secretary'),
	(6, 'Research Engineer');
/*!40000 ALTER TABLE `staff_roles` ENABLE KEYS */;

-- Dumping structure for table fpmt_07.teaching
CREATE TABLE IF NOT EXISTS `teaching` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL,
  `subjectname` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `subjectnumber` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=256 DEFAULT CHARSET=latin1;

-- Dumping data for table fpmt_07.teaching: ~50 rows (approximately)
/*!40000 ALTER TABLE `teaching` DISABLE KEYS */;
REPLACE INTO `teaching` (`id`, `faculty_id`, `subjectname`, `date`, `subjectnumber`, `description`) VALUES
	(134, 79, 'Algorithm and Data Structures For computer science', '2016', 'cs606  ', 'This is an test description for my test..'),
	(135, 79, 'architectural concepts for computer science', '2017', 'cs607 ', 'This is an test description for my test..'),
	(136, 65, 'Applied Physics', '2017', 'CS606 ', ''),
	(137, 65, 'Data Structure And Algorithms', '2016', 'CS607', ''),
	(141, 89, 'Programming Languages', '2017', 'CS300', ''),
	(142, 89, 'Applied Algorithms', '2017', 'CS620', ''),
	(145, 91, 'Software Engineering-II', '2017', 'CS310', ''),
	(146, 91, 'Cyber Security', '2017', 'CS430', ''),
	(147, 91, 'Thesis', '2017', 'CS681', ''),
	(148, 92, 'Data Structures and Algorithms', '', 'CS210    ', ''),
	(149, 92, 'Adv Data Struct and Algorithms', '', 'CS215   ', ''),
	(150, 92, 'SpTp: Cloud Computing ', '', 'CS651', ''),
	(151, 92, 'Database Engineering / Systems', '', 'CS410/CS510    ', ''),
	(191, 1, 'Computer Science I', '2016', 'CS110 ', ''),
	(193, 1, 'comprehensive Project', '2017', 'CS690/IS691', ''),
	(203, 92, 'Database Management ', '', 'IS623    ', ''),
	(210, 100, 'Management Information Systems', 'Fall 2015-2016', 'IS 600-101, CRN 2772', 'null'),
	(211, 100, 'Management Information Systems', 'Fall 2015-2016', 'IS 600-131, CRN 2773', 'null'),
	(212, 100, 'Information Structures 1', 'Fall 2015-2016', 'IS 621-101, CRN 2775', 'null'),
	(213, 100, 'Information Security', 'Fall 2015-2016', 'IS 631-101, CRN 2779', 'null'),
	(214, 100, 'Comprehensive Project', 'Spring 2015-2016', 'TE- 699-201', 'null'),
	(224, 1, 'Operating Systems', '2016, 2018', 'CS 330', 'null'),
	(225, 1, 'Senior Project', '2016-2019', 'CS 490', 'null'),
	(226, 89, 'Applied Algorithms', '2017', 'CS620', 'null'),
	(227, 89, 'Database Systems / Database Management', '2017', 'CS510 / IS623', 'null'),
	(228, 89, 'Strategies for Academic Success', '2017', 'UNI102', 'null'),
	(229, 89, 'Expl World with Computing (CT)', '2018', 'CS105', 'null'),
	(230, 89, 'Programming Languages', '2018', 'CS300', 'null'),
	(231, 89, 'Database Engineering', '2018', 'CS410', 'null'),
	(232, 89, 'Computer Science II', '2018', 'CS120', 'null'),
	(233, 89, 'Applied Cryptography', '2018', 'CS482/582', 'null'),
	(237, 197, 'Introduction to BME', '2018', 'BME 101', 'null'),
	(238, 197, 'BME Seminar', '2018', 'BME 201', 'null'),
	(239, 197, 'The Engineering Profession', '2018', 'ENGR104', 'null'),
	(240, 200, 'Introduction to Occupational Safety', '2013-present', 'SFT235', 'null'),
	(241, 200, 'First Year Seminar in Critical Thinking', '2013-present', 'FYS100', 'null'),
	(242, 200, 'Human Factors and Ergonomics', '2014-present', 'SFT373&L', 'null'),
	(243, 200, 'Safety Measurement and Evaluation', '2013-present', 'SFT378', 'null'),
	(244, 200, 'Safety Training Methods', '2013-present', 'SFT460', 'null'),
	(245, 214, 'Finite Element Method', 'Fall 2018', 'ENGR570      ', 'null'),
	(246, 214, 'Design of Thermal Systems', 'Fall 2018', 'ME430', 'null'),
	(247, 214, 'Thermodynmics II', 'Fall 2018', 'ME310', 'null'),
	(248, 126, 'Fluid Mechanics', 'Fall 2018', 'ENGR 318', 'null'),
	(249, 126, 'Fluid Mechanics Lab', 'Fall 2018', 'ENGR 319', 'null'),
	(250, 126, 'Comprehensive Project', 'Fall 2018', 'ENGR 699', 'null'),
	(251, 92, 'Automata and Formal Languages', '', 'CS360 ', 'null'),
	(252, 98, 'Computer Science Honors', '2018,2017,2016', 'CS 110H', 'null'),
	(253, 98, 'Computer Science 1', '2018, 2017, 2016', 'CS 110', 'null'),
	(254, 98, 'Data Mining', '2018', 'CS 415', 'null'),
	(255, 98, 'Big Data Systems', '2018, 2017, 2016', 'CS 660', 'null');
/*!40000 ALTER TABLE `teaching` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

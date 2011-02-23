-- MySQL dump 10.11
--
-- Host: localhost    Database: phpdallas
-- ------------------------------------------------------
-- Server version	5.0.45

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `meetings`
--

DROP TABLE IF EXISTS `meetings`;
CREATE TABLE `meetings` (
  `title` varchar(100) default NULL,
  `detail` text,
  `meeting_date` int(11) default NULL,
  `ID` int(11) NOT NULL auto_increment,
  `speaker` varchar(50) default NULL,
  `meetup_link` varchar(200) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetings`
--

LOCK TABLES `meetings` WRITE;
/*!40000 ALTER TABLE `meetings` DISABLE KEYS */;
INSERT INTO `meetings` VALUES ('AutoScaling to Ensure Survivability on the Internet',' This month Matthew Puccerella will be presenting some of his experiences with Amazon\'s AWS and web site scalability. SUMMARY: In today\'s world of access on demand, ensuring survivability is a top priority. This presentation covers an end to end solution based on Amazon\'s AWS. With Amazon AWS you can scale your environment to fit the need of your current situation. The demonstration will cover how to automatically leverage the on demand computing power of Amazon EC2 to only pay for the resources you need, when you need them.',1297213200,9,'Matthew Puccerella','http://www.meetup.com/dallasphp/events/16105151/'),('Kohana v3 MVC + Facebook','Frameworks are still one of the most popular topics in the PHP ecosystem right now, and it seems like you can\'t make a move without stepping in one.\r\n\r\nIn this month\'s meeting, Chris Benard will be demonstrating how to use the Kohana v3 MVC Framework (originally based on CodeIgniter) to make dynamic sites easily using PHP. A brief overview of MVC will be given, explaining how this design pattern will clean up your code and make it easier to reuse your own code. Kohana is a small framework (2.8 MB) packed with a ton of interesting features. A high level overview will be given by creating a blog site in real time, using features such as routing, url generation, ORM database access, and form helpers.\r\n\r\nAfter creating the blog using Kohana, the site will be enabled with Facebook features such as Facebook Connect/Login (for admin areas of the site) and Facebook Comments on the blog entries.',1294794000,10,'Chris Benard','http://www.meetup.com/dallasphp/events/15914959/'),('Upcoming','Upcoming meetup, no topic defined yet',1299632400,11,'<none>',''),('Doing More with LESS','It\'s the end of the year and there\'s no better time to pick up something new to add to your skillset for 2011. PHP developers can\'t just restrict themselves to solely the backend anymore - hybrid positions with frontend skills are more and more in demand. Jake Smith will be presenting this month about a CSS framework - the LESS framework - that lets you make more powerful CSS for your sites simpler than doing it by hand.\r\n\r\n------------- \r\n\"Doing More with LESS\" \r\nLESS is a flexible and dynamic way to develop CSS. A developer can quickly utilize CSS3 features, including browser specific implementations, with little effort. LESS is what everyone dreamed CSS could be. With such things as variables, mixins, nested rules and operations. He will show you how to use LESS to make your development process faster and more efficient. \r\n-------------\r\n\r\nMake your plans to attend now and learn about this handy, powerful tool.',1292374800,12,'Jake Smith','http://www.meetup.com/dallasphp/events/15684178/');
/*!40000 ALTER TABLE `meetings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `response`
--

DROP TABLE IF EXISTS `response`;
CREATE TABLE `response` (
  `email_address` varchar(100) default NULL,
  `full_name` varchar(200) default NULL,
  `date_submitted` int(11) default NULL,
  `ID` int(11) NOT NULL auto_increment,
  `involve` varchar(200) default NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `response`
--

LOCK TABLES `response` WRITE;
/*!40000 ALTER TABLE `response` DISABLE KEYS */;
INSERT INTO `response` VALUES ('me@me.com','me',1298399845,16,'speak,volunteer');
/*!40000 ALTER TABLE `response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(50) default NULL,
  `password` varchar(40) default NULL,
  `email` varchar(100) default NULL,
  `full_name` varchar(100) default NULL,
  `ID` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('test','here','me@me.com','full name',1),('enygma','865095ff50518222e70b9a1335daca80','enygma@phpdeveloper.org','chris',11);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-02-23 18:43:00

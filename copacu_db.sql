
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 23, 2015 at 04:20 AM
-- Server version: 10.0.12-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `copacu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contactid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `friendid` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`contactid`),
  KEY `contactid` (`contactid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `copy`
--

CREATE TABLE IF NOT EXISTS `copy` (
  `copyid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `usercountryid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`copyid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `copy`
--


-- --------------------------------------------------------

--
-- Table structure for table `cut`
--

CREATE TABLE IF NOT EXISTS `cut` (
  `cutid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `reason` int(11) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`cutid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cut`
--


-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE IF NOT EXISTS `link` (
  `linkid` int(11) NOT NULL AUTO_INCREMENT,
  `link` int(11) NOT NULL,
  `linkfile` int(11) NOT NULL,
  `linktype` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `keyword` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  PRIMARY KEY (`linkid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `locationid` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `areacode` varchar(50) NOT NULL,
  `countrycode` varchar(50) NOT NULL,
  `countryname` varchar(50) NOT NULL,
  `continentcode` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `regioncode` varchar(50) NOT NULL,
  `regionname` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`locationid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=274 ;

--
-- Dumping data for table `location`
--
INSERT INTO `location` (`locationid`, `ip`, `city`, `region`, `areacode`, `countrycode`, `countryname`, `continentcode`, `latitude`, `longitude`, `regioncode`, `regionname`, `status`, `time`) VALUES
(12, '127.0.0.1', 'Trivandrum', 'Kerala', '1', 'IN', 'India', '', '11', '12', '07', 'Kerala', 1, '2015-01-23 04:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `messageid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `mto` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `visitid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`messageid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paste`
--

CREATE TABLE IF NOT EXISTS `paste` (
  `pasteid` int(11) NOT NULL AUTO_INCREMENT,
  `fromid` int(11) NOT NULL,
  `toid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`pasteid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `visitid` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `countryid` int(11) NOT NULL,
  `posttype` int(11) NOT NULL,
  `posttext` varchar(5000) NOT NULL,
  `postfileid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'posting time',
  PRIMARY KEY (`postid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `userid`, `to`, `visitid`, `country`, `state`, `countryid`, `posttype`, `posttext`, `postfileid`, `status`, `time`) VALUES
(1, 1, 0, 342, 'India', 'Kerala', 0, 0, 'Reduce Internet Charge<br />\r\n<br />\r\n&quot;The most simple way to reduce Internet charge is to stop using it&quot;.<br />\r\n<br />\r\nI know you may be laughing after reading that, I am not kidding.After reading what I have written here, you will understand why I said like that.Here I will provide you a few steps and the core idea is that what I said at the top.<br />\r\n<br />\r\n1: Uninstall all unwanted applications<br />\r\n<br />\r\nIt is a tendency of people to keep maximum application possible in their Mobile,Tablet or Computer without knowing How much data is using by each applications.Some applications use advertisements,some auto update some refresh .if you really want to reduce Internet I strongly recommend to uninstall all the applications first .Most of the applications are available in web version so keep only daily using applications.<br />\r\n<br />\r\n2: Check each and every applications settings<br />\r\n<br />\r\nOpen each of applications ,you can find Options or Preference or Settings. Read and understand what is written their and set according to your Data Plan .Most of the application will show settings for update,upload and refresh.Set it according to your wish,never trust any developers of application or default settings they want their application work perfectly and updated and they set default settings according to that only.<br />\r\n<br />\r\n &nbsp; &nbsp; &nbsp; &quot;This may take some time, but take maximum time, read and read again upto you understand that or ask what is written their to experts&quot;<br />\r\n<br />\r\n &nbsp; &nbsp; &nbsp;If you do that you have almost done and your device now in standard configuration to use internet.<br />\r\n', 0, 1, '2014-12-08 06:04:36'),
(2, 1, 0, 385, 'India', 'Kerala', 0, 0, '&lt;b&gt;Reduce Internet Usage:Android&lt;/b&gt;<br />\r\n<br />\r\nI will provide you some other idea to reduce Internet Data usage in Android Mobiles.This is a simple and common idea most of you people may be knowing about this.<br />\r\n<br />\r\n&quot;Settings/Data Usage&quot;<br />\r\n<br />\r\nGo to the settings of your android mobile and select Data usage,You can see all the applications using internet listed their with how many data used by each application.Select one of the application and go down you can see an option to restrict background usage enable it.This will surely reduce your data usage if you enable it for each application those doesn&#039;t required work in background.<br />\r\n<br />\r\nPoints to remember:<br />\r\n<br />\r\n1:If you enable it, That application use data only when the application open in foreground.I donot recommend it for voice calling applications.<br />\r\n2:Don&#039;t do this for some critical applications by phone and playstore.', 0, 1, '2014-12-08 08:23:49'),
(3, 2, 0, 405, 'India', 'Kerala', 0, 0, 'Hi friends', 0, 1, '2014-12-09 08:38:33'),
(5, 4, 0, 1130, 'Saudi Arabia', 'Riyadh', 0, 0, 'Reduce Internet Usage:Android<br />\r\n<br />\r\nI will provide you some other idea to reduce Internet Data usage in Android Mobiles.This is a simple and common idea most of you people may be knowing about this.<br />\r\n<br />\r\n&quot;Settings/Data Usage&quot;<br />\r\n<br />\r\nGo to the settings of your android mobile and select Data usage,You can see all the applications using internet listed their with how many data used by each application.Select one of the application and go down you can see an option to restrict background usage enable it.This will surely reduce your data usage if you enable it for each application those doesn&#039;t required work in background.<br />\r\n<br />\r\nPoints to remember:<br />\r\n<br />\r\n1:If you enable it, That application use data only when the application open in foreground.I donot recommend it for voice calling applications.<br />\r\n2:Don&#039;t do this for some critical applications by phone and playstore.', 0, 1, '2014-12-27 07:38:51'),
(6, 4, 0, 1161, 'India', 'Kerala', 0, 0, 'Biomedical Engineer<br />\r\n<br />\r\nMeditrina Hospital Kollam<br />\r\n<br />\r\nBiomedical Engineer required for new Hospital in Kollam Dist Kerala,India<br />\r\n<br />\r\nExperience: 2 to 5 Years<br />\r\nContact Email: hr@meditrinahospital.com<br />\r\nContact Phone Number: 0471-3063000<br />\r\nLast Date:25 March 2015<br />\r\nNo of vacancies :Not Specified<br />\r\nSalary Not specified<br />\r\nQualification: B Tech in Electronics/Diploma in Biomedical Engineering<br />\r\n<br />\r\nKeep on visiting copacu.com to get latest vacancies.<br />\r\nDo register to copy this vacancy to view any time.<br />\r\nAll information here are from Internet only.Copacu.com is not responsible for &nbsp;any wrong information.<br />\r\nAny one can visit the below link to know more information about this and to know about other available vacancies in Meditrina Hospital Kollam,<br />\r\n<br />\r\nReference: http://www.meditrinahospital.com/index.php?option=com_content&amp;view=article&amp;id=70&amp;Itemid=2#.VJ-cgsDzA<br />\r\n', 0, 1, '2014-12-28 06:57:20'),
(7, 4, 0, 1264, 'India', 'Kerala', 0, 0, 'PSC Biomedical Engineer 556/2014<br />\r\n<br />\r\n<br />\r\nCategory No: 556/2014<br />\r\nBio Medical Engineer<br />\r\n<br />\r\nMedical Education<br />\r\n<br />\r\nScale of Pay Rs. 11070-18450<br />\r\nNumber of vacancies 1 (One)<br />\r\nMethod of appointment Direct Recruitment<br />\r\nAge limit 18 ,only candidates born between 02/01/1978 and 01/01/1996 (both dates included) are eligible to apply for the post<br />\r\nQualifications 1) B.Tech/B.E. in Bio Medical Engineering<br />\r\nIn the absence of candidates with the above qualification B.Tech in Electronics and CommunicationElectrical and Electronics/Electronics and Instrumentation/Applied Electronics<br />\r\nNote: KS&amp;SSR Part ll Rule 10(a)ii is applicable<br />\r\n2) Experience 2 years experience in repair maintenance and procurement of Biomedical equipments in Medical Colleges or a major hospital with 500 beds or more. Experience should be acquired after acquiring the<br />\r\neducational qualification.Experience Certificate-The Certificate to be pro-<br />\r\nduced in proof of experience shall be in the form given below and should contain name with Registration Number, Date of Registration of the firm<br />\r\nThe employer should specify the Name of post, or nature or assignment<br />\r\nheld or holding by the employee to whom the experience certificate is<br />\r\nissued.<br />\r\nPlease do visit PSC website to get details.<br />\r\nKeep on visiting copacu.com to get latest posts.<br />\r\nDo register to copy for future reading.<br />\r\ncopacu.com is not responsible for the genuinity of the content here.Please do check more sources to confirm.<br />\r\n', 0, 1, '2014-12-29 06:09:58'),
(8, 4, 0, 1387, 'India', 'Kerala', 0, 0, 'Biomedical Engineer Required for NS co-operative Hospital in Kollam,Walk in Interview scheduled on January 2 Friday, 2 pm Onwards..<br />\r\n<br />\r\nN.S &nbsp;(co-operative) Hospital, Palathara, Kollam 20<br />\r\nPhone 0474 2723199<br />\r\nwebsite:www.nshospital.org<br />\r\nEmail:nsmimskollam@gmail.com<br />\r\n<br />\r\nVacancy:<br />\r\nBiomedical Engineer<br />\r\nQualification : Degree in Biomedical Engineering<br />\r\nExperience: Minimum 3 Years<br />\r\nSalary: Not Specified<br />\r\nAge: According to Co-operative Rules<br />\r\nDate of Interview January 2 ,2015 Friday 2PM onwards.<br />\r\n<br />\r\nCandidates should keep Original and Copy of Certificates on the time of Interview<br />\r\n<br />\r\nPlease do confirm the correctness of the above information, this post is based on the Newspaper information.Copacu is not responsible for any problem with the above informations..<br />\r\n', 0, 1, '2014-12-30 06:25:02'),
(9, 13, 0, 1575, 'india', 'kerala', 0, 0, 'Reduce Internet Usage:Android<br />\r\n<br />\r\nI will provide you some other idea to reduce Internet Data usage in Android Mobiles.This is a simple and common idea most of you people may be knowing about this.<br />\r\n<br />\r\n&quot;Settings/Data Usage&quot;<br />\r\n<br />\r\nGo to the settings of your android mobile and select Data usage,You can see all the applications using internet listed their with how many data used by each application.Select one of the application and go down you can see an option to restrict background usage enable it.This will surely reduce your data usage if you enable it for each application those doesn&#039;t required work in background.<br />\r\n<br />\r\nPoints to remember:<br />\r\n<br />\r\n1:If you enable it, That application use data only when the application open in foreground.I donot recommend it for voice calling applications.<br />\r\n2:Don&#039;t do this for some critical applications by phone and playstore.', 0, 1, '2015-01-03 08:39:01'),
(10, 4, 0, 1934, 'India', 'Kerala', 0, 0, 'IMO Security<br />\r\n<br />\r\nThis is one of the best application everyone now using for Video Calling .<br />\r\n<br />\r\nWhy IMO is good?<br />\r\n IMO provides video for the users with slow internet connection. This application is easy to use.<br />\r\n<br />\r\nWhat all things should be noticed??<br />\r\n<br />\r\n1:When we install IMO our contact will be uploaded to IMO and this is normal but what strange is that? &nbsp;those who are IMO users with our contact will get a notification without our concent that this number joined to IMO.we can&#039;t able to block this .<br />\r\n2:Even if we are online or not the green dot will appear for long time.<br />\r\n3:In some mobiles video calls are available even if the screen is off or not.This may lead to use IMO as a SPY application .<br />\r\n4:No options to block users contacting other users .Only available opinion is to delete, any one can add the user again<br />\r\n5:The most strange thing is that if a user added to our contact we can find number of IMO users in their contact and we can see four or five users with their photo.<br />\r\n6: The search option provides to find any users with their name <br />\r\n7: Now think and Find the Tips: by combining the above 5 and 6 we can contact any users in IMO or if we get a contacts of the user with photo we can contact them by searching for that name easily...<br />\r\n<br />\r\nThis post is just for sharing information only it is not for making any type of problems.If any want to block this information register copacu and cut it with proper reason. If anyone find anything wrong please don&#039;t share it and inform the COPACU team.<br />\r\n<br />\r\n', 0, 1, '2015-01-16 08:49:26'),
(11, 4, 0, 1969, 'India', 'Kerala', 0, 0, 'LARGE VACANCY FOR BIOMEDICAL ENGINEERS &amp; TECHNICIANS FOR SAUDI<br />\r\n <br />\r\n<br />\r\n– Qualification:   Bio-Medical Engineer / Bio-Medical Technician<br />\r\n– Experience:   Min 3 Year<br />\r\n- Gender:   MALE / FEMALE<br />\r\n– Salary:  Engineer: Min 4000 – 5500 SR<br />\r\n- Technician: 2500 – 3500 SR<br />\r\n<br />\r\n– Facilities: Free Food + Free Accommodation + Free Travel + Yearly Holidays + Other Benefits<br />\r\n– Venue &amp; Date: BANGALORE &amp; COCHIN, JAN 2015<br />\r\n <br />\r\nEmail Us: jj4job.tec@gmail.com     <br />\r\nEmail Subject: “Bio-Med”<br />\r\nCall Us@ +91 – 9995572292 / +91 – 9605555277<br />\r\n[Kindly find the list of certificates required.]<br />\r\n<br />\r\n·         1- Passport size photo  (Must)<br />\r\n·         Detailed CV or BIODATA  (Must)<br />\r\n·         SSLC / 10th  (Must)<br />\r\n·         PDC (HSC) / 12th / STD XII  (Must)<br />\r\n·         Diploma / Degree / Master Degree Certificate  (Must)<br />\r\n·         Registration Certificate  (If)<br />\r\n·         Semester wise Mark statements  (Must)<br />\r\n·         Transcript (If)<br />\r\n·         Experience Certificates &amp; Reference Letter-till Date  (Must)<br />\r\n·         Passport Copy (Main Page and Address Page)  (Must)<br />\r\n<br />\r\nThis website is not responsible for any incorrectness of above information and the above details is only to pass information.', 0, 1, '2015-01-19 08:36:02'),
(12, 16, 0, 2181, 'INDIA', 'KERALA', 0, 0, 'Biomedical<br />\r\n', 0, 1, '2015-01-20 17:52:55');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE IF NOT EXISTS `userdetails` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `countrycode` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `password` varchar(15) NOT NULL,
  `visitid` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `selectedcountry` int(11) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `userdetails`

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locationid` int(11) NOT NULL,
  `link` varchar(250) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `devicetype` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastvisitid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2293 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

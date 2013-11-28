-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2013 at 10:29 AM
-- Server version: 5.5.34-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `samaras`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `agentID` varchar(6) DEFAULT NULL,
  `uniqueID` varchar(50) NOT NULL DEFAULT '',
  `exclusivity` enum('exclusive','open') DEFAULT 'open',
  `commercialListingType` enum('sale') NOT NULL DEFAULT 'sale',
  `underOffer` enum('yes','no') NOT NULL,
  `listingAgent` text,
  `franchise` enum('yes','no') DEFAULT 'no',
  `price` decimal(12,2) NOT NULL,
  `priceView` varchar(64) DEFAULT NULL,
  `businessLease` decimal(12,2) NOT NULL,
  `takings` decimal(12,2) DEFAULT NULL,
  `return` decimal(12,2) DEFAULT NULL,
  `currentLeaseEndDate` varchar(30) DEFAULT NULL,
  `furtherOptions` text,
  `address` text NOT NULL,
  `state` varchar(32) NOT NULL,
  `suburb` varchar(32) DEFAULT NULL,
  `municipality` varchar(32) DEFAULT NULL,
  `streetDirectory` tinytext,
  `businessCategory` varchar(32) NOT NULL,
  `businessSubCategory` tinytext NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `terms` varchar(300) DEFAULT NULL,
  `soldDetails` tinytext,
  `buildingDetails` tinytext,
  `vendorDetails` tinytext,
  `externalLink` text COMMENT 'business listings can have 3 externalLink elements. ',
  `images` text NOT NULL,
  `objects` text,
  `miniweb` text COMMENT ' can have 3 urls.',
  `purchaseOrder` varchar(20) DEFAULT NULL,
  `status` enum('current','withdrawn','offmarket','sold') DEFAULT NULL,
  `modTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commercial`
--

CREATE TABLE IF NOT EXISTS `commercial` (
  `agentID` varchar(6) DEFAULT NULL,
  `uniqueID` varchar(50) NOT NULL DEFAULT '',
  `commercialAuthority` enum('auction','eoi','forsale','offers','sale','tender') DEFAULT NULL,
  `exclusivity` enum('exclusive','open') DEFAULT 'open',
  `commercialListingType` enum('sale','lease','both') DEFAULT NULL,
  `underOffer` enum('yes','no') NOT NULL,
  `listingAgent` text,
  `price` decimal(12,2) NOT NULL,
  `priceView` varchar(64) DEFAULT NULL,
  `commercialRent` decimal(12,2) NOT NULL,
  `outgoings` decimal(12,2) DEFAULT NULL,
  `return` decimal(12,2) DEFAULT NULL,
  `currentLeaseEndDate` varchar(30) DEFAULT NULL,
  `tenancy` enum('unknown','vacant','tenanted') DEFAULT 'unknown',
  `furtherOptions` text,
  `isMultiple` enum('no','yes') DEFAULT NULL,
  `address` text NOT NULL,
  `state` varchar(32) NOT NULL,
  `suburb` varchar(32) DEFAULT NULL,
  `municipality` varchar(32) DEFAULT NULL,
  `streetDirectory` tinytext,
  `commercialCategory` enum('Commercial Farming','Land/Development','Hotel/Leisure','Industrial/Warehouse','Medical/Consulting','Offices','Retail','Showrooms/Bulky Goods') DEFAULT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `highlight` varchar(128) DEFAULT NULL,
  `soldDetails` tinytext,
  `landDetails` varchar(128) DEFAULT NULL,
  `area_min` decimal(12,2) DEFAULT NULL,
  `area_max` decimal(12,2) DEFAULT NULL,
  `buildingDetails` tinytext,
  `energyRating` decimal(12,2) NOT NULL,
  `propertyExtent` enum('whole','part') DEFAULT NULL,
  `carSpaces` varchar(6) DEFAULT NULL,
  `parkingComments` varchar(255) DEFAULT NULL,
  `auction` varchar(32) DEFAULT NULL,
  `vendorDetails` tinytext,
  `zone` varchar(150) DEFAULT NULL,
  `externalLink` text COMMENT 'commercial listings can have 3 externalLink elements.',
  `videoLink` tinytext,
  `images` text NOT NULL,
  `objects` text,
  `miniweb` tinytext,
  `purchaseOrder` varchar(20) DEFAULT NULL,
  `status` enum('current','withdrawn','offmarket','sold') DEFAULT NULL,
  `modTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commercialLand`
--

CREATE TABLE IF NOT EXISTS `commercialLand` (
  `agentID` varchar(6) DEFAULT NULL,
  `uniqueID` varchar(50) NOT NULL DEFAULT '',
  `authority` enum('auction','exclusive','multilist','conjunctional','open','sale','setsale') NOT NULL,
  `commercialListingType` enum('sale','lease','both') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL,
  `listingAgent` text,
  `price` decimal(12,2) NOT NULL,
  `priceView` varchar(50) DEFAULT NULL,
  `commercialRent` tinytext NOT NULL,
  `outgoings` tinytext,
  `return` decimal(12,2) DEFAULT NULL,
  `currentLeaseEndDate` varchar(30) DEFAULT NULL,
  `address` text NOT NULL,
  `state` varchar(32) NOT NULL,
  `suburb` varchar(32) DEFAULT NULL,
  `municipality` varchar(32) DEFAULT NULL,
  `estate` tinytext,
  `streetDirectory` text,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `highlight` varchar(128) DEFAULT NULL,
  `soldDetails` tinytext,
  `landDetails` varchar(128) DEFAULT NULL,
  `area` decimal(12,2) DEFAULT NULL,
  `auction` varchar(30) DEFAULT NULL,
  `vendorDetails` tinytext,
  `externalLink` text,
  `videoLink` tinytext,
  `images` text,
  `objects` text,
  `miniweb` tinytext,
  `purchaseOrder` varchar(20) DEFAULT NULL,
  `status` enum('current','withdrawn','offmarket','sold') DEFAULT NULL,
  `modTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holidayRental`
--

CREATE TABLE IF NOT EXISTS `holidayRental` (
  `agentID` varchar(6) DEFAULT NULL,
  `uniqueID` varchar(50) NOT NULL DEFAULT '',
  `listingAgent` text,
  `dateAvailable` varchar(30) NOT NULL,
  `rent` decimal(12,2) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `priceView` varchar(64) DEFAULT NULL,
  `bond` decimal(12,2) DEFAULT NULL,
  `address` text NOT NULL,
  `state` varchar(32) NOT NULL,
  `suburb` varchar(32) DEFAULT NULL,
  `municipality` varchar(32) DEFAULT NULL,
  `streetDirectory` tinytext,
  `holidayCategory` enum('House','Alpine','Apartment','Backpacker-Hostel','BedAndBreakfast','Campground','Caravan-HolidayPark','DuplexSemi-detached','ExecutiveRental','FarmStay','Flat','Hotel','House','HouseBoat','Lodge','Motel','Resort','Retreat','SelfContainedCottage','ServicedApartment','Studio','Terrace','Townhouse','Unit','Villa','Other') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `landDetails` tinytext,
  `area` decimal(12,2) DEFAULT NULL,
  `buildingDetails` tinytext,
  `inspectionTimes` tinytext,
  `externalLink` text,
  `availabilityLink` tinytext,
  `images` text NOT NULL,
  `objects` text,
  `bedrooms` varchar(6) DEFAULT NULL,
  `bathrooms` varchar(6) NOT NULL,
  `garages` varchar(6) DEFAULT NULL,
  `carports` varchar(6) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` datetime DEFAULT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `agentID` varchar(6) DEFAULT NULL,
  `uniqueID` varchar(50) NOT NULL DEFAULT '',
  `authority` enum('auction','exclusive','multilist','conjunctional','open','sale','setsale') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL DEFAULT 'no',
  `listingAgent` text,
  `price` decimal(12,2) NOT NULL,
  `priceView` varchar(64) DEFAULT NULL,
  `address` text NOT NULL,
  `state` varchar(32) NOT NULL,
  `suburb` varchar(32) DEFAULT NULL,
  `municipality` varchar(32) DEFAULT NULL,
  `estate` varchar(6) DEFAULT NULL,
  `streetDirectory` text,
  `landCategory` enum('Commercial','Residential') DEFAULT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` text,
  `soldDetails` tinytext,
  `landDetails` varchar(128) DEFAULT NULL,
  `area` decimal(12,2) DEFAULT NULL,
  `auction` varchar(30) DEFAULT NULL,
  `vendorDetails` tinytext,
  `externalLink` text,
  `videoLink` tinytext,
  `images` text NOT NULL,
  `views` varchar(6) DEFAULT NULL,
  `objects` text,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `agentID` varchar(6) DEFAULT NULL,
  `uniqueID` varchar(50) NOT NULL DEFAULT '0',
  `listingAgent` text,
  `dateAvailable` varchar(30) NOT NULL,
  `rent` decimal(12,2) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `priceView` varchar(64) DEFAULT NULL,
  `bond` decimal(12,2) DEFAULT NULL,
  `address` text NOT NULL,
  `state` varchar(32) NOT NULL,
  `suburb` varchar(32) DEFAULT NULL,
  `municipality` varchar(32) DEFAULT NULL,
  `streetDirectory` tinytext,
  `category` enum('House','Unit','Townhouse','Villa','Apartment','Flat','Studio','Warehouse','DuplexSemi-detached','Alpine','AcreageSemi-rural','BlockOfUnits','Terrace','Retirement','ServicedApartment','Other') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `holiday` varchar(5) DEFAULT NULL,
  `landDetails` tinytext,
  `area` decimal(12,2) DEFAULT NULL,
  `buildingDetails` tinytext,
  `inspectionTimes` tinytext,
  `externalLink` text,
  `videoLink` tinytext,
  `images` text NOT NULL,
  `newConstruction` enum('','0','1','false','true','no','yes') DEFAULT NULL,
  `ecoFriendly` tinytext,
  `views` varchar(6) DEFAULT NULL,
  `objects` text,
  `allowances` varchar(100) DEFAULT NULL,
  `bedrooms` varchar(6) DEFAULT NULL,
  `bathrooms` varchar(6) NOT NULL,
  `garages` varchar(6) DEFAULT NULL,
  `carports` varchar(6) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residential`
--

CREATE TABLE IF NOT EXISTS `residential` (
  `agentID` varchar(6) DEFAULT NULL,
  `uniqueID` varchar(50) NOT NULL DEFAULT '',
  `exclusivity` enum('exclusive','open') DEFAULT NULL,
  `authority` enum('auction','exclusive','multilist','conjunctional','open','sale','setsale') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL DEFAULT 'no',
  `isHomeLandPackage` enum('yes','no') NOT NULL,
  `listingAgent` text,
  `price` decimal(12,2) NOT NULL,
  `priceView` varchar(64) DEFAULT NULL,
  `address` text NOT NULL,
  `state` varchar(32) NOT NULL,
  `suburb` varchar(32) DEFAULT NULL,
  `municipality` varchar(32) DEFAULT NULL,
  `streetDirectory` text,
  `category` enum('House','Unit','Townhouse','Villa','Apartment','Flat','Studio','Warehouse','DuplexSemi-detached','Alpine','AcreageSemi-rural','BlockOfUnits','Terrace','Retirement','ServicedApartment','Other') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `soldDetails` tinytext,
  `landDetails` varchar(128) DEFAULT NULL,
  `area` decimal(12,2) DEFAULT NULL,
  `buildingDetails` tinytext,
  `inspectionTimes` tinytext,
  `auction` varchar(30) DEFAULT NULL,
  `vendorDetails` tinytext,
  `externalLink` text,
  `videoLink` tinytext,
  `images` text NOT NULL,
  `newConstruction` enum('','0','1','false','true','no','yes') DEFAULT NULL,
  `ecoFriendly` tinytext,
  `idealFor` varchar(6) DEFAULT NULL,
  `views` varchar(50) DEFAULT NULL,
  `objects` text,
  `bedrooms` varchar(6) DEFAULT NULL,
  `bathrooms` varchar(6) NOT NULL,
  `garages` varchar(6) DEFAULT NULL,
  `carports` varchar(6) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') DEFAULT NULL,
  `modTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rural`
--

CREATE TABLE IF NOT EXISTS `rural` (
  `agentID` varchar(6) DEFAULT NULL,
  `uniqueID` varchar(50) NOT NULL DEFAULT '',
  `authority` enum('auction','exclusive','multilist','conjunctional','open','sale','setsale') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL DEFAULT 'no',
  `listingAgent` text,
  `price` decimal(12,2) NOT NULL,
  `priceView` decimal(12,2) DEFAULT NULL,
  `address` text NOT NULL,
  `state` varchar(32) NOT NULL,
  `suburb` varchar(32) DEFAULT NULL,
  `municipality` varchar(32) DEFAULT NULL,
  `streetDirectory` tinytext,
  `ruralCategory` enum('Cropping','Dairy','Farmlet','Horticulture','Lifestyle','Livestock','Viticulture','MixedFarming','Othe') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` text,
  `ruralFeatures` text,
  `soldDetails` tinytext,
  `landDetails` varchar(128) DEFAULT NULL,
  `area` decimal(12,2) DEFAULT NULL,
  `buildingDetails` tinytext,
  `inspectionTimes` tinytext,
  `auction` varchar(30) DEFAULT NULL,
  `vendorDetails` tinytext,
  `externalLink` text,
  `videoLink` tinytext,
  `images` text NOT NULL,
  `ecoFriendly` tinytext,
  `idealFor` varchar(6) DEFAULT NULL,
  `views` varchar(50) DEFAULT NULL,
  `objects` text,
  `bedrooms` varchar(6) DEFAULT NULL,
  `bathrooms` varchar(6) NOT NULL,
  `garages` varchar(6) DEFAULT NULL,
  `carports` varchar(6) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL DEFAULT '0',
  `forget` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `active`, `forget`, `created_on`) VALUES
(1, '$2a$10$b182c0dc7cf2834609834e0F8.Ud7PRgoVdTknEI.DH77B.yeIXDy', 'manikandan@digitalchakra.in', '1', '', '2013-11-28 04:15:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

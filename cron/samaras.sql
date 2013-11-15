-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 12, 2013 at 06:27 PM
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
  `agentID` varchar(6) NOT NULL,
  `uniqueID` varchar(50) NOT NULL,
  `exclusivity` enum('exclusive','open') NOT NULL,
  `commercialListingType` enum('sale','lease','both') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL,
  `listingAgent` text NOT NULL,
  `franchise` enum('0','1') NOT NULL DEFAULT '0',
  `price` decimal(11,2) NOT NULL,
  `priceView` varchar(50) NOT NULL,
  `businessLease` decimal(11,2) NOT NULL,
  `takings` text NOT NULL,
  `return` decimal(11,2) NOT NULL,
  `currentLeaseEndDate` varchar(30) NOT NULL,
  `furtherOptions` text NOT NULL,
  `address` text NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `streetDirectory` text NOT NULL,
  `businessCategory` varchar(300) NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `terms` varchar(300) NOT NULL,
  `soldDetails` varchar(200) NOT NULL,
  `buildingDetails` varchar(300) NOT NULL,
  `vendorDetails` varchar(300) NOT NULL,
  `externalLink` varchar(200) NOT NULL,
  `extraFields` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `objects` int(11) NOT NULL,
  `miniweb` varchar(300) NOT NULL,
  `purchaseOrder` varchar(20) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) NOT NULL,
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
  `agentID` varchar(6) NOT NULL,
  `uniqueID` varchar(50) NOT NULL,
  `commercialAuthority` enum('auction','eoi','forsale','offers','sale','tender') NOT NULL,
  `exclusivity` enum('exclusive','open') NOT NULL DEFAULT 'open',
  `commercialListingType` enum('sale','lease','both') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL,
  `listingAgent` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `priceView` varchar(50) NOT NULL,
  `commercialRent` varchar(300) NOT NULL,
  `outgoings` decimal(11,2) NOT NULL,
  `return` decimal(11,2) NOT NULL,
  `currentLeaseEndDate` varchar(30) NOT NULL,
  `tenancy` enum('unknown','vacant','tenanted') NOT NULL DEFAULT 'unknown',
  `furtherOptions` text NOT NULL,
  `isMultiple` enum('0','1') NOT NULL,
  `address` text NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `streetDirectory` text NOT NULL,
  `commercialCategory` enum('Commercial Farming','Land/Development','Hotel/Leisure','Industrial/Warehouse','Medical/Consulting','Offices','Retail','Showrooms/Bulky Goods') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `highlight` varchar(300) NOT NULL,
  `soldDetails` varchar(200) NOT NULL,
  `landDetails` varchar(200) NOT NULL,
  `buildingDetails` text NOT NULL,
  `propertyExtent` enum('whole','part') NOT NULL,
  `carSpaces` int(11) NOT NULL,
  `parkingComments` varchar(255) NOT NULL,
  `auction` varchar(30) NOT NULL,
  `vendorDetails` varchar(300) NOT NULL,
  `zone` varchar(150) NOT NULL,
  `externalLink` varchar(200) NOT NULL,
  `videoLink` varchar(200) NOT NULL,
  `extraFields` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `objects` int(11) NOT NULL,
  `miniweb` varchar(300) NOT NULL,
  `purchaseOrder` varchar(20) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) NOT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commercialLand`
--

CREATE TABLE IF NOT EXISTS `commercialLand` (
  `agentID` varchar(6) NOT NULL,
  `uniqueID` varchar(50) NOT NULL,
  `authority` enum('auction','exclusive','multilist','conjunctional','open','sale','setsale') NOT NULL,
  `commercialListingType` enum('sale','lease','both') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL,
  `listingAgent` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `priceView` varchar(50) NOT NULL,
  `commercialRent` varchar(300) NOT NULL,
  `outgoings` decimal(11,2) NOT NULL,
  `return` decimal(11,2) NOT NULL,
  `currentLeaseEndDate` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `estate` enum('0','1') NOT NULL,
  `streetDirectory` text NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `highlight` varchar(300) NOT NULL,
  `soldDetails` varchar(200) NOT NULL,
  `landDetails` varchar(200) NOT NULL,
  `auction` varchar(30) NOT NULL,
  `vendorDetails` varchar(300) NOT NULL,
  `externalLink` varchar(200) NOT NULL,
  `videoLink` varchar(200) NOT NULL,
  `extraFields` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `objects` int(11) NOT NULL,
  `miniweb` varchar(300) NOT NULL,
  `purchaseOrder` varchar(20) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) NOT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `holidayRental`
--

CREATE TABLE IF NOT EXISTS `holidayRental` (
  `agentID` varchar(6) NOT NULL,
  `uniqueID` varchar(50) NOT NULL,
  `listingAgent` text NOT NULL,
  `dateAvailable` varchar(30) NOT NULL,
  `rent` decimal(11,2) NOT NULL,
  `priceView` varchar(50) NOT NULL,
  `bond` decimal(11,2) NOT NULL,
  `address` text NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `streetDirectory` text NOT NULL,
  `holidayCategory` enum('House','Alpine','Apartment','Backpacker-Hostel','BedAndBreakfast','Campground','Caravan-HolidayPark','DuplexSemi-detached','ExecutiveRental','FarmStay','Flat','Hotel','House','HouseBoat','Lodge','Motel','Resort','Retreat','SelfContainedCottage','ServicedApartment','Studio','Terrace','Townhouse','Unit','Villa','Other') DEFAULT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` int(11) NOT NULL,
  `landDetails` varchar(200) NOT NULL,
  `buildingDetails` text NOT NULL,
  `inspectionTimes` text NOT NULL,
  `externalLink` varchar(300) DEFAULT NULL,
  `availabilityLink` varchar(100) DEFAULT NULL,
  `extraFields` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `objects` int(11) NOT NULL,
  `bedrooms` varchar(6) NOT NULL,
  `garages` varchar(3) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` datetime NOT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `agentID` varchar(6) NOT NULL,
  `uniqueID` varchar(50) NOT NULL,
  `authority` enum('auction','exclusive','multilist','conjunctional','open','sale','setsale') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL,
  `listingAgent` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `priceView` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `estate` varchar(100) NOT NULL,
  `streetDirectory` text NOT NULL,
  `landCategory` enum('Commercial','Residential') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` int(11) NOT NULL,
  `soldDetails` varchar(200) NOT NULL,
  `landDetails` varchar(200) NOT NULL,
  `auction` varchar(30) NOT NULL,
  `vendorDetails` varchar(300) NOT NULL,
  `externalLink` varchar(200) NOT NULL,
  `videoLink` varchar(200) NOT NULL,
  `extraFields` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `views` varchar(50) NOT NULL,
  `objects` int(11) NOT NULL,
  `bedrooms` varchar(6) NOT NULL,
  `garages` varchar(3) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) NOT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `agentID` varchar(6) NOT NULL,
  `uniqueID` varchar(50) NOT NULL,
  `listingAgent` text NOT NULL,
  `dateAvailable` varchar(30) NOT NULL,
  `rent` decimal(11,2) NOT NULL,
  `priceView` varchar(50) NOT NULL,
  `bond` decimal(11,2) NOT NULL,
  `address` text NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `streetDirectory` text NOT NULL,
  `category` enum('House','Unit','Townhouse','Villa','Apartment','Flat','Studio','Warehouse','DuplexSemi-detached','Alpine','AcreageSemi-rural','BlockOfUnits','Terrace','Retirement','ServicedApartment','Other') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` int(11) NOT NULL,
  `holiday` enum('current','withdrawn','offmarket','leased') NOT NULL,
  `landDetails` varchar(200) NOT NULL,
  `buildingDetails` text NOT NULL,
  `inspectionTimes` text NOT NULL,
  `externalLink` varchar(300) NOT NULL,
  `videoLink` varchar(200) NOT NULL,
  `extraFields` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `newConstruction` enum('','0','1','false','true','no','yes') NOT NULL,
  `ecoFriendly` varchar(200) NOT NULL,
  `views` varchar(50) NOT NULL,
  `objects` int(11) NOT NULL,
  `allowances` varchar(100) NOT NULL,
  `bedrooms` varchar(6) NOT NULL,
  `garages` varchar(3) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) NOT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `residential`
--

CREATE TABLE IF NOT EXISTS `residential` (
  `agentID` varchar(6) NOT NULL,
  `uniqueID` varchar(50) NOT NULL,
  `authority` enum('auction','exclusive','multilist','conjunctional','open','sale','setsale') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL,
  `isHomeLandPackage` enum('yes','no') NOT NULL,
  `listingAgent` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `priceView` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `streetDirectory` text NOT NULL,
  `category` enum('House','Unit','Townhouse','Villa','Apartment','Flat','Studio','Warehouse','DuplexSemi-detached','Alpine','AcreageSemi-rural','BlockOfUnits','Terrace','Retirement','ServicedApartment','Other') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` int(11) NOT NULL,
  `soldDetails` varchar(200) NOT NULL,
  `landDetails` varchar(200) NOT NULL,
  `buildingDetails` text NOT NULL,
  `inspectionTimes` text NOT NULL,
  `auction` varchar(30) NOT NULL,
  `vendorDetails` varchar(300) NOT NULL,
  `externalLink` varchar(200) NOT NULL,
  `videoLink` varchar(200) NOT NULL,
  `extraFields` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `newConstruction` enum('','0','1','false','true','no','yes') NOT NULL,
  `ecoFriendly` varchar(200) NOT NULL,
  `idealFor` varchar(200) NOT NULL,
  `views` varchar(50) NOT NULL,
  `objects` int(11) NOT NULL,
  `bedrooms` varchar(6) NOT NULL,
  `garages` varchar(3) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) NOT NULL,
  PRIMARY KEY (`uniqueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rural`
--

CREATE TABLE IF NOT EXISTS `rural` (
  `agentID` varchar(6) NOT NULL,
  `uniqueID` varchar(50) NOT NULL,
  `authority` enum('auction','exclusive','multilist','conjunctional','open','sale','setsale') NOT NULL,
  `underOffer` enum('yes','no') NOT NULL,
  `listingAgent` text NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `priceView` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `streetDirectory` text NOT NULL,
  `ruralCategory` enum('Cropping','Dairy','Farmlet','Horticulture','Lifestyle','Livestock','Viticulture','MixedFarming','Othe') NOT NULL,
  `headline` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `features` int(11) NOT NULL,
  `ruralFeatures` text NOT NULL,
  `soldDetails` varchar(200) NOT NULL,
  `landDetails` varchar(200) NOT NULL,
  `buildingDetails` text NOT NULL,
  `inspectionTimes` text NOT NULL,
  `auction` varchar(30) NOT NULL,
  `vendorDetails` varchar(300) NOT NULL,
  `externalLink` varchar(200) NOT NULL,
  `videoLink` varchar(200) NOT NULL,
  `extraFields` varchar(100) NOT NULL,
  `images` text NOT NULL,
  `ecoFriendly` varchar(200) NOT NULL,
  `idealFor` varchar(200) NOT NULL,
  `views` varchar(50) NOT NULL,
  `objects` int(11) NOT NULL,
  `bedrooms` varchar(6) NOT NULL,
  `garages` varchar(3) NOT NULL,
  `status` enum('current','withdrawn','offmarket','sold') NOT NULL,
  `modTime` varchar(30) NOT NULL,
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
  `id_encrypt` varchar(100) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`email`),
  UNIQUE KEY `id_encrypt` (`id_encrypt`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE IF NOT EXISTS `user_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `role` enum('user','member','admin') NOT NULL,
  `designation` varchar(50) NOT NULL,
  `secondary_email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

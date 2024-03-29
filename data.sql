-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2013 at 07:59 PM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(256) NOT NULL,
  `url` varchar(1024) DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `price` varchar(23) DEFAULT NULL,
  `board` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE `ga_bin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filetitle` varchar(100) NOT NULL,
  `filedir` varchar(100) NOT NULL,
  `filesize` bigint(100) DEFAULT NULL,
  `infolderid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

		CREATE TABLE `ga_table` (
		  `id` bigint(20) NOT NULL auto_increment,
		  `VersionId` tinyint(4) NOT NULL,
		  `SequenceId` bigint(11) NOT NULL,
		  `PlcNetworkId` mediumint(6) NOT NULL,
		  `WebsiteId` bigint(11) NOT NULL,
		  `PlacementId` bigint(11) NOT NULL,
		  `CmgnNetworkId` mediumint(6) NOT NULL,
		  `CampaignId` bigint(11) NOT NULL,
		  `MasterCampaignId` bigint(11) NOT NULL,
		  `BannerId` mediumint(4) NOT NULL,
		  `BannerNumber` smallint(4) NOT NULL,
		  `PaymentId` tinyint(4) NOT NULL,
		  `StateId` smallint(4) NOT NULL,
		  `AreaCodeId` smallint(4) NOT NULL,
		  `IpAddress` varchar(30) NOT NULL,
		  `UserId` char(16) NOT NULL,
		  `OsId` tinyint(4) NOT NULL,
		  `TagType` tinyint(4) NOT NULL,
		  `BrowserId` tinyint(4) NOT NULL,
		  `BrowserLanguage` tinyint(4) NOT NULL,
		  `TLDId` smallint(4) NOT NULL,
		  `MediaTypeId` tinyint(4) NOT NULL,
		  `DateEntered` int(11) NOT NULL,
		  `Hour` tinyint(4) NOT NULL,
		  `Minute` tinyint(4) NOT NULL,
		  `Second` tinyint(4) NOT NULL,
		  `AdServerIp` tinyint(4) NOT NULL,
		  `AdServerFarmId` tinyint(4) NOT NULL,
		  `DMAId` tinyint(4) NOT NULL,
		  `CountryId` smallint(4) NOT NULL,
		  `ZipCodeId` int(4) NOT NULL,
		  `CityId` int(4) NOT NULL,
		  `IspId` smallint(4) NOT NULL,
		  `CountTypeId` tinyint(4) NOT NULL,
		  `ConnectionTypeId` tinyint(4) NOT NULL,
		  `in_bin` bigint(20) NOT NULL,
		  PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

CREATE TABLE IF NOT EXISTS `ga_folder` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `infolder` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/* GA end */

/* CF start */
CREATE TABLE cf_table (
			  id bigint(20) NOT NULL auto_increment,
			  VersionId tinyint(4) NOT NULL,	  
			  SequenceId bigint(11) NOT NULL,		  
			  PlcNetworkId smallint(6) NOT NULL,
			  PlcSubNetworkId tinyint(4) NOT NULL,
			  WebsiteId int(4) NOT NULL,
			  PlacementId int(4) NOT NULL,
			  PageId int(4) NOT NULL,
			  CmgnNetworkId smallint(6) NOT NULL,
			  CmgnSubNetworkId tinyint(4) NOT NULL,
			  CampaignId int(4) NOT NULL,
			  MasterCampaignId int(4) NOT NULL,
			  BannerId smallint(4) NOT NULL,
			  BannerNumber int(4) NOT NULL,
			  PaymentId int(4) NOT NULL,
			  StateId smallint(4) NOT NULL,
			  CountTypeId smallint(4) NOT NULL,
			  IpAddress varchar(30) NOT NULL,
			  UserId char(16) NOT NULL,
			  OsId tinyint(4) NOT NULL,
			  TagType tinyint(4) NOT NULL,
			  BrowserId smallint(4) NOT NULL,
			  BrowserLanguage tinyint(4) NOT NULL,
			  IpRangeId int(4) NOT NULL,
			  DateEntered int(4) NOT NULL,	
			  Hour tinyint(4) NOT NULL,
			  Minute tinyint(4) NOT NULL,	
			  Second tinyint(4) NOT NULL, 
			  AdServerIp tinyint(4) NOT NULL,
			  AdServerFarmId tinyint(4) NOT NULL,
			  DMAId tinyint(4) NOT NULL,
			  CountryId smallint(4) NOT NULL,
			  ZipCodeId int(4) NOT NULL,
			  CityId int(4) NOT NULL,
			  IspId smallint(4) NOT NULL,
			  ConnectionTypeId smallint(4) NOT NULL,
			  RecordSize smallint(4) NOT NULL,
			  sizeStringBuffer smallint(4) NOT NULL,
			  Referer varchar(1024) NOT NULL,
			  QueryString varchar(1024) NOT NULL,
			  LinkUrl varchar(1024) NOT NULL,
			  UserAgent varchar(924) NOT NULL,
			  in_bin int(4) NOT NULL,
			  PRIMARY KEY  (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE cf_bin (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  filetitle varchar(100) NOT NULL,
  filedir varchar(100) NOT NULL,
  filesize bigint(100) DEFAULT NULL,
  infolderid int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE cf_folder (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  edited_at datetime NOT NULL,
  name varchar(100) NOT NULL,
  infolder int(11) NOT NULL,
  depth int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/* CF end */

/* GL start */
CREATE TABLE gl_table (
			  id bigint(20) NOT NULL auto_increment,
			  VersionId tinyint(4) NOT NULL,	  
			  SequenceId bigint(11) NOT NULL,		  
			  PlcNetworkId mediumint(6) NOT NULL,
			  PlcSubNetworkId smallint(4) NOT NULL,
			  WebsiteId bigint(11) NOT NULL,
			  PlacementId bigint(11) NOT NULL,
			  PageId smallint(4) NOT NULL,
			  CmgnNetworkId smallint(4) NOT NULL,
			  CmgnSubNetworkId smallint(4) NOT NULL,
			  CampaignId bigint(11) NOT NULL,
			  MasterCampaignId bigint(11) NOT NULL,
			  BannerId mediumint(4) NOT NULL,
			  BannerNumber smallint(4) NOT NULL,
			  PaymentId tinyint(4) NOT NULL,
			  StateId smallint(4) NOT NULL,
			  AreaCodeId smallint(4) NOT NULL,
			  IpAddress BINARY(16) NOT NULL,
			  UserId char(16) NOT NULL,
			  OsId tinyint(4) NOT NULL,
			  TagType tinyint(4) NOT NULL,
			  BrowserId tinyint(4) NOT NULL,
			  BrowserLanguage tinyint(4) NOT NULL,
			  TLDId smallint(4) NOT NULL,
			  MediaTypeId tinyint(4) NOT NULL,
			  PlcContentTypeId tinyint(4) NOT NULL,
			  Reserved2 smallint(4) NOT NULL,
			  DateEntered int(4) NOT NULL,	
			  Hour tinyint(4) NOT NULL,
			  Minute tinyint(4) NOT NULL,	
			  Second tinyint(4) NOT NULL, 
			  AdServerIp tinyint(4) NOT NULL,
			  AdServerFarmId tinyint(4) NOT NULL,
			  DMAId tinyint(4) NOT NULL,
			  CountryId smallint(4) NOT NULL,
			  ZipCodeId int(4) NOT NULL,
			  CityId int(4) NOT NULL,
			  IspId smallint(4) NOT NULL,
			  CountTypeId tinyint(4) NOT NULL,
			  ConnectionTypeId tinyint(4) NOT NULL,
			  in_bin int(4) NOT NULL,
			  PRIMARY KEY  (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE gl_bin (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  filetitle varchar(100) NOT NULL,
  filedir varchar(100) NOT NULL,
  filesize bigint(100) DEFAULT NULL,
  infolderid int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE gl_folder (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  edited_at datetime NOT NULL,
  name varchar(100) NOT NULL,
  infolder int(11) NOT NULL,
  depth int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/* GL end */

/* IR start */
CREATE TABLE ir_table (
			  id bigint(20) NOT NULL auto_increment,
			  VersionId tinyint(4) NOT NULL,	  
			  NetworkId smallint(4) NOT NULL,		  
			  SubNetworkId tinyint(4) NOT NULL,
			  PlacementId int(4) NOT NULL,
			  CampaignId bigint(11) NOT NULL,
			  IpAddress BINARY(16) NOT NULL,
			  UserId char(16) NOT NULL,
			  OsId tinyint(4) NOT NULL,
			  BrowserId smallint(4) NOT NULL,
			  TagType smallint(4) NOT NULL,
			  RequestType tinyint(4) NOT NULL,
			  DateEntered int(4) NOT NULL,	
			  Hour tinyint(4) NOT NULL,
			  Minute tinyint(4) NOT NULL,	
			  Second tinyint(4) NOT NULL, 
			  AdServerIp tinyint(4) NOT NULL,
			  AdServerFarmId tinyint(4) NOT NULL,
			  Url char(40) NOT NULL,
			  Referer char(40) NOT NULL,
			  in_bin int(4) NOT NULL,
			  PRIMARY KEY  (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

CREATE TABLE ir_bin (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  filetitle varchar(100) NOT NULL,
  filedir varchar(100) NOT NULL,
  filesize bigint(100) DEFAULT NULL,
  infolderid int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE ir_folder (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  edited_at datetime NOT NULL,
  name varchar(100) NOT NULL,
  infolder int(11) NOT NULL,
  depth int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/* IR end */

/* KV start */
CREATE TABLE kv_table (
			  id bigint(20) NOT NULL auto_increment,
			  VersionId tinyint(4) NOT NULL,
			  RecordSize smallint(6) NOT NULL,	  
			  SequenceId bigint(11) NOT NULL,		  
			  PlcNetworkId smallint(6) NOT NULL,
			  PlcSubNetworkId tinyint(4) NOT NULL,
			  WebsiteId int(4) NOT NULL,
			  PlacementId int(4) NOT NULL,
			  CmgnNetworkId smallint(6) NOT NULL,
			  CmgnSubNetworkId tinyint(4) NOT NULL,
			  CampaignId int(4) NOT NULL,
			  ExtensionType tinyint(4) NOT NULL,
			  PhraseId int(4) NOT NULL,
			  NoKeywordEntries smallint(4) NOT NULL,
			  in_bin int(4) NOT NULL,
			  PRIMARY KEY  (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ;

CREATE TABLE kv_bin (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  filetitle varchar(100) NOT NULL,
  filedir varchar(100) NOT NULL,
  filesize bigint(100) DEFAULT NULL,
  infolderid int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE kv_folder (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  edited_at datetime NOT NULL,
  name varchar(100) NOT NULL,
  infolder int(11) NOT NULL,
  depth int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/* KV end */

/* KW start */
CREATE TABLE kw_table (
			  id bigint(20) NOT NULL auto_increment,
			  VersionId tinyint(4) NOT NULL,
			  SequenceId bigint(11) NOT NULL,		  
			  PlcNetworkId smallint(6) NOT NULL,
			  PlcSubNetworkId tinyint(4) NOT NULL,
			  WebsiteId int(4) NOT NULL,
			  PlacementId int(4) NOT NULL,
			  PageId int(4) NOT NULL,
			  CmgnNetworkId smallint(6) NOT NULL,
			  CmgnSubNetworkId tinyint(4) NOT NULL,
			  CampaignId int(4) NOT NULL,
			  MasterCampaignId int(4) NOT NULL,
			  ExtensionType tinyint(4) NOT NULL,
			  TimeStamp int(4) NOT NULL,
			  KeywordText char(40) NOT NULL,
			  KeywordTextLength smallint(4) NOT NULL,
			  in_bin int(4) NOT NULL,
			  PRIMARY KEY  (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE kw_bin (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  filetitle varchar(100) NOT NULL,
  filedir varchar(100) NOT NULL,
  filesize bigint(100) DEFAULT NULL,
  infolderid int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE kw_folder (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  edited_at datetime NOT NULL,
  name varchar(100) NOT NULL,
  infolder int(11) NOT NULL,
  depth int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/* kw end */

/* tc start */
CREATE TABLE tc_table (
			  id bigint(20) NOT NULL auto_increment,
			  VersionId tinyint(4) NOT NULL,	  
			  SequenceId bigint(11) NOT NULL,		  
			  PlcNetworkId mediumint(6) NOT NULL,
			  PlcSubNetworkId smallint(4) NOT NULL,
			  WebsiteId bigint(11) NOT NULL,
			  PlacementId bigint(11) NOT NULL,
			  PageId smallint(4) NOT NULL,
			  CmgnNetworkId smallint(4) NOT NULL,
			  CmgnSubNetworkId smallint(4) NOT NULL,
			  CampaignId bigint(11) NOT NULL,
			  MasterCampaignId bigint(11) NOT NULL,
			  BannerId mediumint(4) NOT NULL,
			  BannerNumber smallint(4) NOT NULL,
			  PaymentId tinyint(4) NOT NULL,
			  StateId smallint(4) NOT NULL,
			  AreaCodeId smallint(4) NOT NULL,
			  IpAddress BINARY(16) NOT NULL,
			  UserId char(16) NOT NULL,
			  OsId tinyint(4) NOT NULL,
			  TagType tinyint(4) NOT NULL,
			  BrowserId tinyint(4) NOT NULL,
			  BrowserLanguage tinyint(4) NOT NULL,
			  TLDId smallint(4) NOT NULL,
			  MediaTypeId tinyint(4) NOT NULL,
			  PlcContentTypeId tinyint(4) NOT NULL,
			  Reserved2 smallint(4) NOT NULL,
			  DateEntered int(4) NOT NULL,	
			  Hour tinyint(4) NOT NULL,
			  Minute tinyint(4) NOT NULL,	
			  Second tinyint(4) NOT NULL, 
			  AdServerIp tinyint(4) NOT NULL,
			  AdServerFarmId tinyint(4) NOT NULL,
			  DMAId tinyint(4) NOT NULL,
			  CountryId smallint(4) NOT NULL,
			  ZipCodeId int(4) NOT NULL,
			  CityId int(4) NOT NULL,
			  IspId smallint(4) NOT NULL,
			  CountTypeId tinyint(4) NOT NULL,
			  ConnectionTypeId tinyint(4) NOT NULL,
			  in_bin int(4) NOT NULL,
			  PRIMARY KEY  (id)
		) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE tc_bin (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  filetitle varchar(100) NOT NULL,
  filedir varchar(100) NOT NULL,
  filesize bigint(100) DEFAULT NULL,
  infolderid int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ;

CREATE TABLE tc_folder (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  edited_at datetime NOT NULL,
  name varchar(100) NOT NULL,
  infolder int(11) NOT NULL,
  depth int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
/* tc end */

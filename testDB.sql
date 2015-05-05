-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 07:44 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `cf_bin`
--

CREATE TABLE IF NOT EXISTS `cf_bin` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filetitle` varchar(100) NOT NULL,
  `filedir` varchar(100) NOT NULL,
  `filesize` bigint(100) DEFAULT NULL,
  `infolderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cf_folder`
--

CREATE TABLE IF NOT EXISTS `cf_folder` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `infolder` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cf_table`
--

CREATE TABLE IF NOT EXISTS `cf_table` (
`id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` smallint(6) NOT NULL,
  `PlcSubNetworkId` tinyint(4) NOT NULL,
  `WebsiteId` int(4) NOT NULL,
  `PlacementId` int(4) NOT NULL,
  `PageId` int(4) NOT NULL,
  `CmgnNetworkId` smallint(6) NOT NULL,
  `CmgnSubNetworkId` tinyint(4) NOT NULL,
  `CampaignId` int(4) NOT NULL,
  `MasterCampaignId` int(4) NOT NULL,
  `BannerId` smallint(4) NOT NULL,
  `BannerNumber` int(4) NOT NULL,
  `PaymentId` int(4) NOT NULL,
  `StateId` smallint(4) NOT NULL,
  `CountTypeId` smallint(4) NOT NULL,
  `IpAddress` varchar(30) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `TagType` tinyint(4) NOT NULL,
  `BrowserId` smallint(4) NOT NULL,
  `BrowserLanguage` tinyint(4) NOT NULL,
  `IpRangeId` int(4) NOT NULL,
  `DateEntered` int(4) NOT NULL,
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
  `ConnectionTypeId` smallint(4) NOT NULL,
  `RecordSize` smallint(4) NOT NULL,
  `sizeStringBuffer` smallint(4) NOT NULL,
  `Referer` varchar(1024) NOT NULL,
  `QueryString` varchar(1024) NOT NULL,
  `LinkUrl` varchar(1024) NOT NULL,
  `UserAgent` varchar(924) NOT NULL,
  `in_bin` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ga_bin`
--

CREATE TABLE IF NOT EXISTS `ga_bin` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filetitle` varchar(100) NOT NULL,
  `filedir` varchar(100) NOT NULL,
  `filesize` bigint(100) DEFAULT NULL,
  `infolderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ga_folder`
--

CREATE TABLE IF NOT EXISTS `ga_folder` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `infolder` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ga_table`
--

CREATE TABLE IF NOT EXISTS `ga_table` (
`id` bigint(20) NOT NULL,
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
  `in_bin` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gl_bin`
--

CREATE TABLE IF NOT EXISTS `gl_bin` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filetitle` varchar(100) NOT NULL,
  `filedir` varchar(100) NOT NULL,
  `filesize` bigint(100) DEFAULT NULL,
  `infolderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gl_folder`
--

CREATE TABLE IF NOT EXISTS `gl_folder` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `infolder` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gl_table`
--

CREATE TABLE IF NOT EXISTS `gl_table` (
`id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` mediumint(6) NOT NULL,
  `PlcSubNetworkId` smallint(4) NOT NULL,
  `WebsiteId` bigint(11) NOT NULL,
  `PlacementId` bigint(11) NOT NULL,
  `PageId` smallint(4) NOT NULL,
  `CmgnNetworkId` smallint(4) NOT NULL,
  `CmgnSubNetworkId` smallint(4) NOT NULL,
  `CampaignId` bigint(11) NOT NULL,
  `MasterCampaignId` bigint(11) NOT NULL,
  `BannerId` mediumint(4) NOT NULL,
  `BannerNumber` smallint(4) NOT NULL,
  `PaymentId` tinyint(4) NOT NULL,
  `StateId` smallint(4) NOT NULL,
  `AreaCodeId` smallint(4) NOT NULL,
  `IpAddress` binary(16) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `TagType` tinyint(4) NOT NULL,
  `BrowserId` tinyint(4) NOT NULL,
  `BrowserLanguage` tinyint(4) NOT NULL,
  `TLDId` smallint(4) NOT NULL,
  `MediaTypeId` tinyint(4) NOT NULL,
  `PlcContentTypeId` tinyint(4) NOT NULL,
  `Reserved2` smallint(4) NOT NULL,
  `DateEntered` int(4) NOT NULL,
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
  `in_bin` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ir_bin`
--

CREATE TABLE IF NOT EXISTS `ir_bin` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filetitle` varchar(100) NOT NULL,
  `filedir` varchar(100) NOT NULL,
  `filesize` bigint(100) DEFAULT NULL,
  `infolderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ir_folder`
--

CREATE TABLE IF NOT EXISTS `ir_folder` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `infolder` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ir_table`
--

CREATE TABLE IF NOT EXISTS `ir_table` (
`id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `NetworkId` smallint(4) NOT NULL,
  `SubNetworkId` tinyint(4) NOT NULL,
  `PlacementId` int(4) NOT NULL,
  `CampaignId` bigint(11) NOT NULL,
  `IpAddress` binary(16) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `BrowserId` smallint(4) NOT NULL,
  `TagType` smallint(4) NOT NULL,
  `RequestType` tinyint(4) NOT NULL,
  `DateEntered` int(4) NOT NULL,
  `Hour` tinyint(4) NOT NULL,
  `Minute` tinyint(4) NOT NULL,
  `Second` tinyint(4) NOT NULL,
  `AdServerIp` tinyint(4) NOT NULL,
  `AdServerFarmId` tinyint(4) NOT NULL,
  `Url` char(40) NOT NULL,
  `Referer` char(40) NOT NULL,
  `in_bin` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kv_bin`
--

CREATE TABLE IF NOT EXISTS `kv_bin` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filetitle` varchar(100) NOT NULL,
  `filedir` varchar(100) NOT NULL,
  `filesize` bigint(100) DEFAULT NULL,
  `infolderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kv_folder`
--

CREATE TABLE IF NOT EXISTS `kv_folder` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `infolder` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kv_table`
--

CREATE TABLE IF NOT EXISTS `kv_table` (
`id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `RecordSize` smallint(6) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` smallint(6) NOT NULL,
  `PlcSubNetworkId` tinyint(4) NOT NULL,
  `WebsiteId` int(4) NOT NULL,
  `PlacementId` int(4) NOT NULL,
  `CmgnNetworkId` smallint(6) NOT NULL,
  `CmgnSubNetworkId` tinyint(4) NOT NULL,
  `CampaignId` int(4) NOT NULL,
  `ExtensionType` tinyint(4) NOT NULL,
  `PhraseId` int(4) NOT NULL,
  `NoKeywordEntries` smallint(4) NOT NULL,
  `in_bin` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kw_bin`
--

CREATE TABLE IF NOT EXISTS `kw_bin` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filetitle` varchar(100) NOT NULL,
  `filedir` varchar(100) NOT NULL,
  `filesize` bigint(100) DEFAULT NULL,
  `infolderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kw_folder`
--

CREATE TABLE IF NOT EXISTS `kw_folder` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `infolder` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `kw_table`
--

CREATE TABLE IF NOT EXISTS `kw_table` (
`id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` smallint(6) NOT NULL,
  `PlcSubNetworkId` tinyint(4) NOT NULL,
  `WebsiteId` int(4) NOT NULL,
  `PlacementId` int(4) NOT NULL,
  `PageId` int(4) NOT NULL,
  `CmgnNetworkId` smallint(6) NOT NULL,
  `CmgnSubNetworkId` tinyint(4) NOT NULL,
  `CampaignId` int(4) NOT NULL,
  `MasterCampaignId` int(4) NOT NULL,
  `ExtensionType` tinyint(4) NOT NULL,
  `TimeStamp` int(4) NOT NULL,
  `KeywordText` char(40) NOT NULL,
  `KeywordTextLength` smallint(4) NOT NULL,
  `in_bin` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tc_bin`
--

CREATE TABLE IF NOT EXISTS `tc_bin` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `filetitle` varchar(100) NOT NULL,
  `filedir` varchar(100) NOT NULL,
  `filesize` bigint(100) DEFAULT NULL,
  `infolderid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tc_folder`
--

CREATE TABLE IF NOT EXISTS `tc_folder` (
`id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited_at` datetime NOT NULL,
  `name` varchar(100) NOT NULL,
  `infolder` int(11) NOT NULL,
  `depth` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tc_table`
--

CREATE TABLE IF NOT EXISTS `tc_table` (
`id` bigint(20) NOT NULL,
  `VersionId` tinyint(4) NOT NULL,
  `SequenceId` bigint(11) NOT NULL,
  `PlcNetworkId` mediumint(6) NOT NULL,
  `PlcSubNetworkId` smallint(4) NOT NULL,
  `WebsiteId` bigint(11) NOT NULL,
  `PlacementId` bigint(11) NOT NULL,
  `PageId` smallint(4) NOT NULL,
  `CmgnNetworkId` smallint(4) NOT NULL,
  `CmgnSubNetworkId` smallint(4) NOT NULL,
  `CampaignId` bigint(11) NOT NULL,
  `MasterCampaignId` bigint(11) NOT NULL,
  `BannerId` mediumint(4) NOT NULL,
  `BannerNumber` smallint(4) NOT NULL,
  `PaymentId` tinyint(4) NOT NULL,
  `StateId` smallint(4) NOT NULL,
  `AreaCodeId` smallint(4) NOT NULL,
  `IpAddress` binary(16) NOT NULL,
  `UserId` char(16) NOT NULL,
  `OsId` tinyint(4) NOT NULL,
  `TagType` tinyint(4) NOT NULL,
  `BrowserId` tinyint(4) NOT NULL,
  `BrowserLanguage` tinyint(4) NOT NULL,
  `TLDId` smallint(4) NOT NULL,
  `MediaTypeId` tinyint(4) NOT NULL,
  `PlcContentTypeId` tinyint(4) NOT NULL,
  `Reserved2` smallint(4) NOT NULL,
  `DateEntered` int(4) NOT NULL,
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
  `in_bin` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cf_bin`
--
ALTER TABLE `cf_bin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cf_folder`
--
ALTER TABLE `cf_folder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cf_table`
--
ALTER TABLE `cf_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ga_bin`
--
ALTER TABLE `ga_bin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ga_folder`
--
ALTER TABLE `ga_folder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ga_table`
--
ALTER TABLE `ga_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gl_bin`
--
ALTER TABLE `gl_bin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gl_folder`
--
ALTER TABLE `gl_folder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gl_table`
--
ALTER TABLE `gl_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir_bin`
--
ALTER TABLE `ir_bin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir_folder`
--
ALTER TABLE `ir_folder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ir_table`
--
ALTER TABLE `ir_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kv_bin`
--
ALTER TABLE `kv_bin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kv_folder`
--
ALTER TABLE `kv_folder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kv_table`
--
ALTER TABLE `kv_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kw_bin`
--
ALTER TABLE `kw_bin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kw_folder`
--
ALTER TABLE `kw_folder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kw_table`
--
ALTER TABLE `kw_table`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_bin`
--
ALTER TABLE `tc_bin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_folder`
--
ALTER TABLE `tc_folder`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tc_table`
--
ALTER TABLE `tc_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cf_bin`
--
ALTER TABLE `cf_bin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cf_folder`
--
ALTER TABLE `cf_folder`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cf_table`
--
ALTER TABLE `cf_table`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ga_bin`
--
ALTER TABLE `ga_bin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ga_folder`
--
ALTER TABLE `ga_folder`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ga_table`
--
ALTER TABLE `ga_table`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gl_bin`
--
ALTER TABLE `gl_bin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gl_folder`
--
ALTER TABLE `gl_folder`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gl_table`
--
ALTER TABLE `gl_table`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ir_bin`
--
ALTER TABLE `ir_bin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ir_folder`
--
ALTER TABLE `ir_folder`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ir_table`
--
ALTER TABLE `ir_table`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kv_bin`
--
ALTER TABLE `kv_bin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kv_folder`
--
ALTER TABLE `kv_folder`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kv_table`
--
ALTER TABLE `kv_table`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kw_bin`
--
ALTER TABLE `kw_bin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kw_folder`
--
ALTER TABLE `kw_folder`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kw_table`
--
ALTER TABLE `kw_table`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tc_bin`
--
ALTER TABLE `tc_bin`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tc_folder`
--
ALTER TABLE `tc_folder`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tc_table`
--
ALTER TABLE `tc_table`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

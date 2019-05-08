# phpMyAdmin MySQL-Dump
# version 2.2.6
# http://phpwizard.net/phpMyAdmin/
# http://www.phpmyadmin.net/ (download page)
#
# Host: localhost
# Generation Time: Jun 28, 2004 at 03:08 PM
# Server version: 3.23.51
# PHP Version: 4.2.1
# Database : `phpdbadmin`
# --------------------------------------------------------

#
# Table structure for table `admin`
#

CREATE TABLE admin (
  username varchar(255) NOT NULL default '',
  password varchar(255) NOT NULL default ''
) TYPE=MyISAM;

#
# Dumping data for table `admin`
#

INSERT INTO admin VALUES ('admin', 'admin');
# --------------------------------------------------------

#
# Table structure for table `categories`
#

CREATE TABLE categories (
  catid int(4) NOT NULL auto_increment,
  catname varchar(255) NOT NULL default '',
  catdesc varchar(255) NOT NULL default '',
  PRIMARY KEY  (catid)
) TYPE=MyISAM;

#
# Dumping data for table `categories`
#



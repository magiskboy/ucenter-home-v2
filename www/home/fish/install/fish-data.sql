DROP TABLE IF EXISTS `uchome_fish_ui` ;
CREATE TABLE `uchome_fish_ui` (                
`uid` int(11) NOT NULL default '0',
`username` varchar(50) NOT NULL default '',
`exp` int(11) NOT NULL default '0',
`money` int(11) NOT NULL default '0',
`yb` int(11) NOT NULL default '0',
`bstatus` text NOT NULL,
`reclaim` int(2) default '6',
`decorative` text NOT NULL,
`fruit` text NOT NULL,
`package` text NOT NULL,
`tools` text NOT NULL,
`repertory` text NOT NULL,
`lucktime` int(11) NOT NULL default '0',
`dog` text NOT NULL,
`fr` text NOT NULL,
`putk` text NOT NULL,
`putr` text NOT NULL,
`tips` text NOT NULL,
`randtime` int(11) NOT NULL default '0',
`visittime` int(11) NOT NULL default '0',
PRIMARY KEY  (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `uchome_fish_logs`;
CREATE TABLE `uchome_fish_logs` (
`id` int(11) NOT NULL auto_increment,
`uid` int(11) NOT NULL,
`type` tinyint(4) NOT NULL,
`count` int(11) NOT NULL,
`fromid` int(11) NOT NULL,
`time` int(11) NOT NULL,
`cropid` int(11) NOT NULL,
`isread` int(11) NOT NULL, 
`counts` text NOT NULL,
`money` text NOT NULL,
PRIMARY KEY  (`id`) 
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

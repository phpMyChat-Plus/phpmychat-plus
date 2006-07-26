CREATE TABLE bot_bot (
  id int(11) NOT NULL auto_increment,
  bot tinyint(4) NOT NULL default '0',
  name varchar(255) NOT NULL default '',
  value text NOT NULL,
  PRIMARY KEY  (id),
  KEY botname (bot,name)
) TYPE=MyISAM AUTO_INCREMENT=53 ;

CREATE TABLE bot_bots (
  id tinyint(3) unsigned NOT NULL auto_increment,
  botname varchar(255) NOT NULL default '',
  PRIMARY KEY  (botname),
  KEY id (id)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

CREATE TABLE bot_conversationlog (
  bot tinyint(3) unsigned NOT NULL default '0',
  id int(11) NOT NULL auto_increment,
  input text,
  response text,
  uid varchar(255) default NULL,
  enteredtime timestamp(14) NOT NULL,
  PRIMARY KEY  (id),
  KEY botid (bot)
) TYPE=MyISAM AUTO_INCREMENT=54 ;

CREATE TABLE bot_dstore (
  uid varchar(255) default NULL,
  name text,
  value text,
  enteredtime timestamp(14) NOT NULL,
  id int(11) NOT NULL auto_increment,
  PRIMARY KEY  (id),
  KEY nameidx (name(40))
) TYPE=MyISAM AUTO_INCREMENT=212 ;

CREATE TABLE bot_gmcache (
  id int(11) NOT NULL auto_increment,
  bot tinyint(3) unsigned NOT NULL default '0',
  template int(11) NOT NULL default '0',
  inputstarvals text,
  thatstarvals text,
  topicstarvals text,
  patternmatched text,
  inputmatched text,
  combined text NOT NULL,
  PRIMARY KEY  (id),
  KEY combined (bot,combined(255))
) TYPE=MyISAM AUTO_INCREMENT=1 ;

CREATE TABLE bot_gossip (
  bot tinyint(3) unsigned NOT NULL default '0',
  gossip text,
  id int(11) NOT NULL auto_increment,
  PRIMARY KEY  (id),
  KEY botidx (bot)
) TYPE=MyISAM AUTO_INCREMENT=9 ;

CREATE TABLE bot_patterns (
  bot tinyint(3) unsigned NOT NULL default '0',
  id int(11) NOT NULL auto_increment,
  word varchar(255) default NULL,
  ordera tinyint(4) NOT NULL default '0',
  parent int(11) NOT NULL default '0',
  isend tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY wordparent (parent,word),
  KEY botid (bot)
) TYPE=MyISAM AUTO_INCREMENT=193873 ;

CREATE TABLE bot_templates (
  bot tinyint(3) unsigned NOT NULL default '0',
  id int(11) NOT NULL default '0',
  template text NOT NULL,
  pattern varchar(255) default NULL,
  that varchar(255) default NULL,
  topic varchar(255) default NULL,
  KEY bot (id)
) TYPE=MyISAM;

CREATE TABLE bot_thatindex (
  uid varchar(255) default NULL,
  enteredtime timestamp(14) NOT NULL,
  id int(11) NOT NULL auto_increment,
  PRIMARY KEY  (id)
) TYPE=MyISAM AUTO_INCREMENT=54 ;

CREATE TABLE bot_thatstack (
  thatid int(11) NOT NULL default '0',
  id int(11) NOT NULL auto_increment,
  value varchar(255) default NULL,
  enteredtime timestamp(14) NOT NULL,
  PRIMARY KEY  (id)
) TYPE=MyISAM AUTO_INCREMENT=63 ;

CREATE TABLE c_ban_users (
  username varchar(30) NOT NULL default '',
  latin1 tinyint(1) NOT NULL default '0',
  ip varchar(16) NOT NULL default '',
  rooms varchar(100) NOT NULL default '',
  ban_until int(11) NOT NULL default '0'
) TYPE=MyISAM;

CREATE TABLE c_config (
  ID tinyint(1) NOT NULL default '0',
  MSG_DEL tinyint(1) NOT NULL default '0',
  USR_DEL tinyint(1) NOT NULL default '0',
  REG_DEL tinyint(1) NOT NULL default '0',
  LANGUAGE varchar(20) NOT NULL default '',
  MULTI_LANG enum('0','1') NOT NULL default '0',
  REQUIRE_REGISTER enum('0','1') NOT NULL default '0',
  REQUIRE_NAMES enum('0','1') NOT NULL default '0',
  EMAIL_PASWD enum('0','1') NOT NULL default '0',
  PASS_LENGTH tinyint(1) NOT NULL default '6',
  ADMIN_NOTIFY enum('0','1') NOT NULL default '0',
  ADMIN_NAME varchar(35) NOT NULL default '',
  ADMIN_EMAIL varchar(35) NOT NULL default '',
  CHAT_URL varchar(50) NOT NULL default '',
  SHOW_ADMIN enum('0','1') NOT NULL default '0',
  SHOW_DEL_PROF enum('0','1') NOT NULL default '0',
  VERSION enum('0','1','2') NOT NULL default '0',
  BANISH tinyint(1) NOT NULL default '0',
  NO_SWEAR enum('0','1') NOT NULL default '0',
  SWEAR_EXPR varchar(5) NOT NULL default '',
  SAVE varchar(5) NOT NULL default '',
  USE_SMILIES enum('0','1') NOT NULL default '0',
  HTML_TAGS_KEEP enum('none','simple') NOT NULL default 'none',
  HTML_TAGS_SHOW enum('0','1') NOT NULL default '0',
  TMZ_OFFSET tinyint(1) NOT NULL default '0',
  MSG_ORDER enum('0','1') NOT NULL default '0',
  MSG_NB tinyint(1) NOT NULL default '0',
  MSG_REFRESH tinyint(1) NOT NULL default '0',
  SHOW_TIMESTAMP enum('0','1') NOT NULL default '0',
  NOTIFY enum('0','1') NOT NULL default '0',
  WELCOME enum('0','1') NOT NULL default '0',
  SMILEY_COLS tinyint(1) NOT NULL default '0',
  SMILEY_COLS_POP tinyint(1) NOT NULL default '0',
  ALLOW_ENTRANCE_SOUND enum('0','1') NOT NULL default '0',
  ENTRANCE_SOUND varchar(255) NOT NULL default '',
  ALLOW_BUZZ_SOUND enum('0','1') NOT NULL default '0',
  BUZZ_SOUND varchar(255) NOT NULL default '',
  TOPIC_DIFF enum('0','1') NOT NULL default '0',
  SHOW_TUT enum('0','1') NOT NULL default '0',
  SHOW_INFO enum('0','1') NOT NULL default '0',
  SET_CMDS enum('0','1') NOT NULL default '0',
  CMDS varchar(255) NOT NULL default '',
  SET_MODS enum('0','1') NOT NULL default '0',
  MODS varchar(255) NOT NULL default '',
  SET_BOT enum('0','1') NOT NULL default '0',
  ROOM_SAYS varchar(25) NOT NULL default '',
  DEMOTE_MOD enum('0','1') NOT NULL default '0',
  PRIV_POPUP enum('0','1') NOT NULL default '0',
  SHOW_ETIQ_IN_HELP enum('0','1') NOT NULL default '0',
  SHOW_LOGO enum('0','1') NOT NULL default '0',
  LOGO_IMG varchar(255) NOT NULL default '',
  LOGO_OPEN varchar(255) NOT NULL default '',
  LOGO_ALT varchar(255) NOT NULL default '',
  SHOW_OWNER enum('0','1') NOT NULL default '0',
  SHOW_PRIV enum('0','1') NOT NULL default '0',
  SHOW_PRIV_MOD enum('0','1') NOT NULL default '0',
  SHOW_PRIV_USR enum('0','1') NOT NULL default '0',
  SHOW_COUNTER enum('0','1') NOT NULL default '0',
  INSTALL_DATE varchar(10) NOT NULL default '0',
  USE_SKIN enum('0','1') NOT NULL default '0',
  ROOM1 varchar(25) NOT NULL default '',
  ROOM2 varchar(25) NOT NULL default '',
  ROOM3 varchar(25) NOT NULL default '',
  ROOM4 varchar(25) NOT NULL default '',
  ROOM5 varchar(25) NOT NULL default '',
  ROOM6 varchar(25) NOT NULL default '',
  ROOM7 varchar(25) NOT NULL default '',
  ROOM8 varchar(25) NOT NULL default '',
  ROOM9 varchar(25) NOT NULL default '',
  SWEAR1 varchar(25) NOT NULL default '',
  SWEAR2 varchar(25) NOT NULL default '',
  SWEAR3 varchar(25) NOT NULL default '',
  SWEAR4 varchar(25) NOT NULL default '',
  COLOR_FILTERS enum('0','1') NOT NULL default '0',
  COLOR_ALLOW_GUESTS enum('0','1') NOT NULL default '0',
  COLOR_CD1 varchar(25) NOT NULL default '',
  COLOR_CD2 varchar(25) NOT NULL default '',
  COLOR_CD3 varchar(25) NOT NULL default '',
  COLOR_CD4 varchar(25) NOT NULL default '',
  COLOR_CD5 varchar(25) NOT NULL default '',
  COLOR_CD6 varchar(25) NOT NULL default '',
  COLOR_CD7 varchar(25) NOT NULL default '',
  COLOR_CDC1 varchar(6) NOT NULL default '',
  COLOR_CDC2 varchar(6) NOT NULL default '',
  COLOR_CDC3 varchar(6) NOT NULL default '',
  COLOR_CDC4 varchar(6) NOT NULL default '',
  COLOR_CDC5 varchar(6) NOT NULL default '',
  COLOR_CDC6 varchar(6) NOT NULL default '',
  COLOR_CDC7 varchar(6) NOT NULL default '',
  QUICKA longtext NOT NULL,
  QUICKM longtext NOT NULL,
  QUICKU longtext NOT NULL,
  COLOR_NAMES enum('0','1') NOT NULL default '0',
  USE_AVATARS enum('0','1') NOT NULL default '0',
  NUM_AVATARS smallint(1) NOT NULL default '0',
  AVA_RELPATH varchar(255) NOT NULL default '',
  DEF_AVATAR varchar(255) NOT NULL default '',
  AVA_WIDTH tinyint(1) NOT NULL default '0',
  AVA_HEIGHT tinyint(1) NOT NULL default '0',
  AVA_PROFBUTTON enum('0','1') NOT NULL default '0',
  MAX_DICES tinyint(1) NOT NULL default '0',
  MAX_ROLLS tinyint(1) NOT NULL default '0',
  BOT_CONTROL enum('0','1') NOT NULL default '0',
  MAX_PIC_SIZE smallint(1) NOT NULL default '0',
  USERS_SORT_ORD enum('0','1') NOT NULL default '1',
  CHAT_LOGS enum('0','1') NOT NULL default '1',
  LOG_DIR varchar(25) NOT NULL default '',
  SHOW_LOGS_USR enum('0','1') NOT NULL default '1',
  CHAT_LURKING enum('0','1') NOT NULL default '0',
  SHOW_LURK_USR enum('0','1') NOT NULL default '1',
  BAN_IP enum('0','1') NOT NULL default '0',
  REG_CHARS_ALLOWED varchar(50) NOT NULL default '',
  EXIT_LINK_TYPE enum('0','1') NOT NULL default '0',
  CHAT_EXTRAS enum('0','1') NOT NULL default '1',
  EMAIL_USER enum('0','1') NOT NULL default '1',
  PRIMARY KEY  (ID)
) TYPE=MyISAM;

INSERT INTO c_config VALUES (0, 48, 10, 0, 'english', '1', '0', '1', '0', 6, '1', 'Your name/chat name here', 'Your email address here', 'Your server/chat URL here', '1', '1', '2', 1, '1', '@#$*!', '*', '1', '', '1', 0, '1', 20, 10, '1', '1', '1', 10, 5, '1', 'sounds/beep.wav', '1', 'sounds/chimedwn.wav', '1', '1', '1', '1', '<br>/away /buzz /demote /dice /dice2 /high /img /mr /room /sort /topic /wisp', '1', '<br>Advanced Admin, Avatars, Smilies Popup, Color Input Box,<br>Private Popup, Quick Menu, Logs Archive, Lurking, Color names', '1', 'Attention Room:', '0', '1', '1', '1', '''./images/icon.gif''', '''./''', '''MyChat based on phpMyChat plus''', '1', '1', '1', '1', '1', '25-11-2005', '1', 'Public Room 1', 'Public Room 2', 'Public Room 3', 'Public Room 4', 'Public Room 5', 'Private Room 1', 'Private Room 2', 'Staff Only', 'Support Room', 'Public Room 5', 'Staff Only', 'Support Room', '', '1', '1', 'black', 'orange', 'brown', 'violet', 'green', 'maroon', 'navy', '000000', 'FFA500', 'A52A2A', 'EE82EE', '008000', '800000', '000080', 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/announce I have to go now!|\r\n/away be right back...|\r\n/away ...I''m back!|\r\n/bot start|\r\n/bot stop|\r\n/me is busy right now!|\r\n/mr is watching TV|\r\n/bye See you around!|\r\n/high user|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/demote %s|\r\n/demote * %s|\r\n/room Please follow the topic|\r\n/topic |\r\n/topic top reset|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s', 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/away be right back...|\r\n/away ...I''m back!|\r\n/me is busy right now!|\r\n/mr is reading|\r\n/bye cyall!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/room Please follow the topic|\r\n/topic |\r\n/topic top reset|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s', 'Hello everyone|\r\nlol|\r\n:rofl|\r\n/away brb...|\r\n/away ...back!|\r\n/me is busy!|\r\n/mr is lurking|\r\n/bye ttyl!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s', '1', '1', 55, './images/avatars/', 'def_avatar.gif', 25, 25, '1', 20, 6, '1', 350, '0', '1', 'logsadmin', '1', '1', '1', '0', 'a-zA-Z0-9_.-@#$%^&*()=<>?~|`:', '1', '1', '1');

CREATE TABLE c_lurkers (
  time int(15) NOT NULL default '0',
  ip varchar(15) NOT NULL default '',
  browser varchar(255) NOT NULL default '',
  file varchar(50) NOT NULL default '',
  PRIMARY KEY  (time),
  KEY ip (ip),
  KEY file (file)
) TYPE=MyISAM;

CREATE TABLE c_messages (
  type tinyint(1) NOT NULL default '0',
  room varchar(30) NOT NULL default '',
  username varchar(30) NOT NULL default '',
  latin1 tinyint(1) NOT NULL default '0',
  m_time int(11) NOT NULL default '0',
  address varchar(30) NOT NULL default '',
  message text NOT NULL,
  pm_read varchar(10) NOT NULL default ''
) TYPE=MyISAM;

CREATE TABLE c_reg_users (
  username varchar(30) NOT NULL default '',
  latin1 tinyint(1) NOT NULL default '0',
  password varchar(32) NOT NULL default '',
  firstname varchar(64) NOT NULL default '',
  lastname varchar(64) NOT NULL default '',
  country varchar(64) NOT NULL default '',
  website varchar(64) NOT NULL default '',
  email varchar(64) NOT NULL default '',
  showemail tinyint(1) NOT NULL default '0',
  perms varchar(9) NOT NULL default '',
  rooms varchar(128) NOT NULL default '',
  reg_time int(11) NOT NULL default '0',
  ip varchar(16) NOT NULL default '',
  gender tinyint(1) NOT NULL default '0',
  allowpopup tinyint(1) NOT NULL default '1',
  picture varchar(255) NOT NULL default '',
  description text NOT NULL,
  favlink varchar(255) NOT NULL default '',
  favlink1 varchar(255) NOT NULL default '',
  slang varchar(255) NOT NULL default '',
  colorname varchar(25) NOT NULL default '',
  avatar varchar(255) NOT NULL default ''
) TYPE=MyISAM;

INSERT INTO c_reg_users VALUES ('admin', '', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', 0, 'admin', '', '', '', 0, 1, '', '', '', '', '', 'red', './images/avatars/def_avatar.gif');
INSERT INTO c_reg_users VALUES('plusbot', '', '47e014ee34869ded7e5236541246319d', 'Bot', 'phpMyChat - Plus', 'WorldWideWeb', '', 'bot@bot.bot.com', '0', 'admin', '', 1130763311, '', '1', '0', './images/alice.gif', 'I am a Robot originally called Alice; I am proud to be the first Artificial Intelligence on the net! Please test my capabilities as you wish! To start a conversation with me, just type "/hello PlusBot" in the room I am active in, to stop the conversation type "/bye PlusBot". Ohhh... I wish to express my gratitude to Roy, Popeye and Ciprian for making me available for chatting in here. :)', 'http://ciprianmp.com/plus', 'http://plus/gamedogs.com', 'English only', 'olive', './images/avatars/avatar52.gif');

CREATE TABLE c_users (
  room varchar(30) NOT NULL default '',
  username varchar(30) NOT NULL default '',
  latin1 tinyint(1) NOT NULL default '0',
  u_time int(11) NOT NULL default '0',
  status char(1) NOT NULL default '',
  ip varchar(16) NOT NULL default '',
  awaystat char(1) NOT NULL default '0',
  r_time int(11) NOT NULL default '0',
  UNIQUE KEY room (room,username)
) TYPE=MyISAM;
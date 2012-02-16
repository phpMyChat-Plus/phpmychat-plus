Note: if you’ve already modded your own files, please compare and edit the changes from those included in this log to identify the changes made for the fix. If not, just replace all the files in the according folders.
This log includes all the previously released fixes.
Client browsers - tested with:
	- IE < 5.5 = M;
	- IE > 6.0SP2 (including > 7.0 & > 8.0 & > 9.0) = H;
	- Mozilla Firefox > 1.6.0.0 (including < 10.0) = H;
	- Mozilla Firebird 0.7 = L;
	- Netscape > 8.1 = M;
	- Opera 9.0 build 8502 = H;
	- AvantBrowser 10.2 build 52 = H;
	- Flock 1.2.1 = H;
	- Apple Safari > 4.0.3 = H;
	- Google Chrome > 17.x.x.x.x = M.
Server environment - tested env:
	- Apache < 2.2.21 (Unix and Windows 2k/XP<SP3 & Vista);
	- php < 5.3.5 (non-safe-mode, but also a safe mode server has been tested and worked fine);
	- MySQL < 5.4;
	- MySQL >= 5.4 - just a calendar response from bot is bogus (still working on it);
	- exif support enabled (gif/jpeg processing);
	- GD2 support enabled (gif/jpeg processing);
	- mail function support (optional but recommended).

Known issues (read also the FAQ):
- php 5.1.6 will not allow joining chat or/and changing settings or saving data into database (due to several bugs in 5.1.6 release);
- php 4.4.4 has an issue of not posting the messages ($M value is null);
- configurations cannot be saved from admin panel on servers having magic_quotes set "on"; this also happens if the c_config table structure has been altered somehow and it doesn’t exactly follow the admin5.php field definitions; another identified reason would be the use of single quote ’ in field values (like Room’s Names or such) - never use single quotes - use the utf-8 ’ instead (you can copy it from here when you need it);
- when a username uses utf-8 chars like ă î â , php cannot recognize a name with small caps as being similar with caps (Îrban is different than îrban) so please make sure you use the name in PMs and commands exacly as the one of the desired username (this is working fine on php > 5 servers, due to the added mb_* functions support);
- on IE7, registered users don’t always actually leave the chat after clicking the Exit door or Exit link - the loader frame doesn’t actually close but keep showing that user to the users’ lists until the user closes that specific browser window.

Important: everytime you upgrade/reinstall a phpmychat server or change sensitive data in Admin panel (like default room names), the old cookies must be deleted from the clients’ machines - so let your users know! (also cache clearing might be a good idea)
When you install Firefox2 and/or QuickTime (RealPlayer), a QuickTime plugin will break the WMP plugin in IE, necesary for playing .wav sounds, therefore, you won’t get sounds in IE anymore. I fixed it by playing with enabling WMP/disabling QuickTime plugins in IE; re-associating the "wav" files in Media Player/Tools/Options/File Types also fixes this.
On some pcs a restart might be necessary.
We also added a small IE fixing script (reg file) as a link in Extra Options in chat.

Fixes History:
01.02.2012 - 1.94-beta8:
- changed the MthJax plugin to use a secure connection; (security related)
- more deprecated functions updated (eg set_magic_quotes_runtime); (compatibility related)
- Extra Options section has moved on bottom of the users' list, as a colapsible menu; (functionality related)
- fixed the color drop box in input.php when var COLOR_TB is not defined in skin file; (functionality related)
- major improvements to popup openers in usersH&L files - all the functions moved to the parent container index.lib.php; (functionality related)
- added the birthday popup page which shows a list of current month or entire year celebrated users, to include some profile data, as per user profile setting, to assure desired privacy (avatar, username, date of birth, age, first name, last name, gender); (functionality extension)
- fixed a logs.lib.php bug on exporting /me commands; (functionality related)
- fixed the closing browser notify message; (functionality related)
- upgraded the installer to support MySQL 5 engine MyISAM type; (compatibility related)
- email list fix in send email tab/admin panel to separate banned users from the reg_users list; (functionality related)
- added some more reductions for AliceBot as well as fixing some date/time & calendar features; (functionality extension)
- finished upgrading to php5.3.0 compatibility by changing all ereg functions to the according preg/strpos/strstr functions; (compatibility related)
01.12.2011 - 1.94-beta7:
- several code/bugs fixes (e.g. closing browser notice); (functionality related)
- added the MatJax plugin support for posting equations/formula on scientific chatrooms; (functionality extension)
- started the schedule mode, so the admin can set when to automatically close the chat entirely or by rooms, according to a daily/weekday based schedule; (functionality extension)
20.02.2011 - 1.94-beta6:
- added an option (checkbox) to send emails as Bcc not To (from admin panel); (privacy & functionality related)
- fixed some color names codes; (functionality related)
- updated Calendar class to v3.56; (functionality related)
- fixed some colorname/colortext selections to avoid the frame background match; (functionality related)
- updated Calendar class to v3.4; (functionality related)
- banish fix; (security/functionality related)
- language selection added to the remote login box; (functionality related)
- important sound fix - users can not set sound on/off for notifications in chat (except for buzzes sent by power users); (functionality related)
- Catalan translation started; (localization project) - Thanks to Jordi Babot <jordibabot@gmail.com> - suspended
- important BOT fix for Windows servers, when answering with date formated string (locale stays in English now); (functionality related)
- Help popup - admin email link (mailto) fix; (functionality related)
- several ereg/eregi_replace functions replaced by str_replace - steps for php5.3 compatibility; (compatibility related)
02.06.2010 - 1.94-beta5:
- download link updated in all occurences in chat; (functionality related)
- updated Calendar class to v3.3; (functionality related)
- Czech translation started; (localization project) - Thanks to Chenzee <chenzee@email.cz> - suspended
- Yoruba (Nigeria) translation started; (localization project) - Thanks to Samson Ameh <philanthropist4eva@gmail.com> - suspended
- uploader class updated to version 0.30; (functionality related)
- important installer fixes - the skip button and ftp process were broken in 1.93; (functionality related)
- addressess called bye "username>" will now stay in the input box for the entire addressed conversation, until removed by user; (functionality extension)
- Ukrainian translation started; (localization project) - suspended
- Russian translation added; (localization project)
- updated Calendar class to v3.2 and fixed a few small js bugs; (functionality related)
- separated banished users from the reg ones in the send email tab in admin panel, so they don’t get selected by mistake to receive unwanted emails from admins; (functionality extention)
- fixed a bug that caused page titles with space at the end to break the popups/openers; (functionality related)
- posted smilies can now be reused by clicking on them; (functionality extension)
- decription field in profiles is now right aligned and will display the according line breaks; (functionality related)
- fixed the profile description field input where single quotes couldn’t be used; (functionality related)
- updated Calendar class to v.3.1; (functionality extension)
- fixed some Birthday email related localized output; the wishes will be received in the user specific language or default language of the chat (functionality related)
- changed "Spoken languages" profile field to "Language", selectable from the available chat languages; the purpose is to support localized emails from chat; (functionality related)
- added the MediaPlayer plugin mod for video/audio stream embeding; admins can set the streaming source in Admin panel; (functionality extension)
08.05.2010 - 1.94-beta4:
- fixed a bot entrance issue; (functionality related)
- enabled sending of html formatted emails from admin panel; (functionality extension)
- Birthday mod added - for profiles; (functionality extension)
25.04.2010 - 1.94-beta3:
- upload class updated to latest 0.29 version; (functionality related)
- added the Remember me checkbox to remember login data; (privacy & login related)
19.04.2010 - 1.94-beta2:
- provided Privacy policy updated; (privacy related)
- some important changes in the video posting approach; (functionality extension)
- changed the /mr command approach to allow the title position to be displayed correctly in any language - after/before names; (formating related)
- changed the /topic command to accept "one word" topics, due to the Japanese requirements; also the reset was changed to "/topic reset" or "/topic * reset" only (before it needed 2 words "/topic top reset") - (functionality related)
10.03.2010 - 1.94-beta1:
- some code changed to improve the Japanese text format to display correctly - (formating related)
- Japanese translation added; (localization project) - Thanks to Dendeke <konchakka211@yahoo.co.jp>
- fixed a small glitch that made /join command to fail; (bug related)
- changed Chrome, Opera and Safari browsers to H type detection, in order to eliminate the flickering/page reloading in these browsers; (browser compatibility)
- some log exporter fixes to display the smilies and other images in the log files correctly; (functionality related)
- added the /video command which let an user post a video file from more than 200 video&audio hosting sites (including several audio/radio broadcasting sources) - works only on php5 servers - thanks to Paul Comanici for his Embevi class; (functionality extension)
- added the /youtube command which let an user post a video file from youtube - works on both php4&5 servers - thanks to Nemanja Avramovic for his YouTube class; (functionality extension)

07.03.2010 - 1.93:
- the new php versions deprecated too many functions in the old pmc+ versions therefore it calls for a decision for a Final Release; (version release)

23.08.2009 - 1.93-RC6:
- two minor changes in the registration and edit_profile pages; (functionality related)
- Registration link added to the Remote login box; (functionality related)
- Nepali translation started; (localization project) - Thanks to Niroj Manandhar <mailnirose@yahoo.com>
- changed the stats mod to disabled by default; (functionality related)
- email domains for registration (register.php & edituser.php) and for domain check-up - updated to the latest top-level list: asia, travel, name, aso; (functionality related)
- new stats mod translation added to admin panel; (localization project)
- translation of words (private) and (whisper) added to all pages; (localization project)
- updated the class.upload to v0.28; (functionality related)
- Indonesian translation added; (localization project) - Thanks to Hendriyo Kustrianjaya <hendriyo@gmail.com>
- fixed recalling previous commands in the input box, not only the previous posts; (functionality extension)
- more rtl/ltr orientation fixes; (display related)
- all the commands have been changed to support translations - optional though; (functionality & translation extension)
- changed and improved the dice commands; (functionality related)

10.06.2009 - 1.93-RC5:
- fixed a small bug in private popups replies; (functionality related)
- small change in stylesheets to format the rtl quotes
- dir comands added (/rtl and /ltr) - changes the posts text direction when needed ;(functionality extension)
- admin.php and invite command fixes; (functionality related)
- Hebrew translation added; (localization project) - Thanks to Shula
- added statistics table for admin analyses purposes; (c_stats table added and lots of testings and fine-tunings); (functionality extension)

27.08.2008 - 1.93-RC4:
- logs header include paths fixed to avoid safe mode restrictions (access to relative paths to localization files); (functionality related)
- fixed the away command notifications; (functionality related)
- PHP_SELF instances replaced with SCRIPT_NAME; (security related)
- logs.lib.php - it will now set chmod back to 0755 for previous month/year; (security & functionality related)
- added the "background-color: transparent" property for the img class in css styles; (display related)
- updated the donation buttons according to the latest PayPal release; (support related)
- turned the plusbot and RandomQuote into "topmod" perms so no acces to the admin panel using those virtual accounts (having "admin" perms could become a security threat); (security related)
- fixed the installer to handle files on Windows-based servers; (functionality related)
- replaced some avatar images to avoid copyright infringement (copyright related)
- added 15 more avatars; (display related)
- fixed the Logs pages for servers in SAFE MODE; (functionality related)
- several minor warnings dismissed when the server sessions is disabled; (functionality related)
- FAQ and Instructions updated with more solutions/explanations; (functionality extension)
- more styling changes: (functionality extension)
	- added Skin name, author, date and copyright in the chatrooms and style preview page;
	- normalized the css/php codes for easier skinning;
	- added the skins/images folder for images backgrounds in skins;
- Restricted rooms mod added: (functionality extension)
	- admin can choose now to set any or all of the default public rooms to have restricted access, then he can set as per registered user settings (which user should have access to which room);
	- admins, topmoders and moderators (for their moderated rooms) still have access to all the restricted rooms accordingly;
	- if moderator status is demoted or accessible room becomes restricted, appropriate notifications are sent to the room/rooms and to the respective user, being rejected from the restricted room;
- translation updates for all included languages; (localization related)

11.08.2008 - 1.93-RC3:
- kick command fix; (functionality related)
- Multi local avatars & sounds/buzes upload by admins; (functionality extension) - work started
- Local avatars upload by users in profile; (functionality extension)
- translation updates for all included languages; (localization related)

10.06.2008 - 1.93-RC2:
- small installer pagination fixes; (localization related)
- banner.php filename is changed now to topic.php as well as all it’s old references; the AdBlock and AdBlock Plus plugins in Firefox were blocking it because the previous filename (banner.php) stands for advertisments; (functionality related)
- the bot will not dissapear anymore from userlists when clean.lib or logs.lib are in action; (functionality related)
- phpMyChat-Plus becomes the First Gravatarized LiveChat system in the world!!! (functionality extension)
	- added option to display Gravatars as users’ avatars in chat (more details on gravatar.com);
- added image preview for all the images fields/options in registration/edit user and admin panel; (functionality extension)
- fixed the option for registered users to hide/undisclose their gender; (functionality related)
- some archive improvements - all the off-line/unread pms will be kept in the database for a period of time set in admin panel -before, any pm would have been deleted together with the regular messages deletion; (functionality related)
- added PM popup manager - each user can see all his received PMs and, if allowed from Admin panel, can delete the ones he chooses - to avoid saving to logs; (functionality extension)
- translation updates for all included languages; (localization related)

20.05.2008 - 1.93-RC1:
- improved the installer;
- send mail improvements for registration/edit profiles, as well as in Admin Panel:
	- utf-8 compatibility;
	- added Cc (sender admin) and Bcc (chat owner) for email sent from Send email sheet (it helps when there are more than 1 admins of a chat);
- stripped more redundant codes from several files;
- added users visits counter to profiles;

15.04.2008 - 1.93-beta8:
- connected ip logs page improved; (functionality related)
- removed the config.lib.php inclusion from exported logs; (security related)
- worldtime improvements and fixes: (functionality extension)
	- the time is now correctly displayed for servers on negative meridians;
	- the meridians/cities are now editable (the number is restricted to 6, although 5 is the best number of cities to be displayed, due to status bar size limit); (instructions included in both admin panel and lib/worldtime.lib.php)
	- UTC is always displayed (to let the users from other meridians figure out the offset);
	- added a clock box into the Input frame; (useful for users with hidden status bar in their browsers, so they can see the current server time)
- user related links (edit profile, delete profile, administration and other) - moved from Input frame into the Extra Options menu in the right frame in chatrooms; (functionality related)
- added power colors to usernames in users_popup lists (only if italicized is enabled); (functionality extension)
- Expand/Colapse rooms fix; (functionality related)
- Cc and Bcc added for sending emails from admin panel - for more spam control (if someone is accessing Admin panel and start using the send email sheet, the Owner will get copies so he can take counter-measures); (security & functionality extensions)
- translation updates for all included languages; (localization related)

30.03.2008 - 1.93-beta7:
- several tutorial fixes - thanks to Peter’s suggestions; (translation related)
- registration control have been added, so an admin can now review and approve who gets registered and who gets to chat; - there is a hint added in admin panel with usage instructions - (functionality extension)
- sending mail functions have been improved to completely support utf-8 encoded emails. - (functionality related)
- Bulgarian has been added - thanks to Peter; (localization related)

19.03.2008 - 1.93-beta6:
- lots of bot adaptations to phpmychat: (bot functionality extensions)
	- ProgramE fix for date/time formats handling (this bug was fixed by Ciprian and posted to the alicebot.org as well);
	- bot aimls updated to the latest set edition (1.0.1) from alicebot.org;
	- bot knows now each user name he is talking to;
	- links changed to clickable in bot posts;
	- several loader improvements;
	- added math, jokes, history, religion (Protestant), author knowledge and an excellent calendar made by SquarBear in 2002 and improved by Ciprian in 2008 (this will display a month/year layout calendar for any year between 18th-23rd centuries);
	- added phpmychat help, commands, etiquette and tutorial answers, so bot can provide help for chat now!!!;
	- added some general info about phpMyChat-Plus project, documentation & download pages, developer and others, so bot can provide answers about phpmychat project now;
- aiml bot set upgraded to version aaa 1.0.1 from alicebot.org; (functionality related)
- added option in Admin panel to choose your own greeting in emails sent from Send mail sheet; (functionality extension)
- more improvements for php5/windows systems compatibility; (functionality related)

05.03.2008 - 1.93-beta4:
- added option in Admin panel to show/hide italicized names and power colors for admins and moderators; (functionality extension)
- several improvements of IP logging (acounter.php); (functionality related)
- different finetunes of language specific expressions, order, singular/plural, gender, etc; (localization & functionality related)
- lots of utf-8 extensions, mostly for php5 full compatibility (multibyte functions added); (functionality extension)
- important fixes for php servers which have "short_open_tag = Off" - all short tags have been converted to long tags; (functionality related)
- chat has been changed to fully working on windows servers; (functionality extension)

18.02.2008 - 1.93-beta2:
- Admin panel and profile forms (edit and register) are displaying now the images of the picture selections (flags, flag types, genders, doorroll, aso); (display related)
- several logs exporting/handling changes/improvements; (functionality related)
- windows utf-8 encoding fixes - date names are now correctly decoded on Windows enviroments; (localization & functionality related)
- chat booting, clean.lib and superghost mode improvements; (functionality related)
- lurking page also displays the status of the connected users (in Admin panel/Connected users, it also shows ghosts and superghosts status); (functionality related)
- Hungarian has been added - thanks to Zsuzsi; (localization related)
- Serbian - Latin has been added (localization project) - Thanks to Vedran;

01.02.2008 - 1.93-beta1:
- pagination improvement in Admin panel/Registered users and Baned users, and Styles preview, respectivey - added a page selector for easier navigation through pages; (functionality extension)
- Admin panel/Search tab improvement: the results of a search can now directly be banned/deleted from the same sheet, without having to look for the user in the Registered users sheet; (functionality extension)
- added option in Admin panel to display a color filled and/or an image background index (login) page; (functionality extension)
- added option in Admin panel to enable/disable Links popup - some users requested the old links behavior in chat; (functionality extension)
- clickable links can now be posted in topics banner; (functionality extension)
- important skin mod changes: (functionality extension)
	- all the config/styleX.css.php files have been changed - if you edited/created your own skin, this should be backed up and upgraded;
	- the database fields which used to store the filter colors for each style are now changed to specify the style  for each room;
	- skins are now easily selectable in Admin panel/Configuration, under each room name;
	- there is also a Skin Preview page available (opening from Admin panel);
	- Note: to add new skins, read explanations in install/Instructions.txt;
- important Ghost Mode changes: (functionality extension)
	- new approach to hiding users;
	- added a new field in Admin panel to enter user names you want to be hiden (Admins and TopModers in this hiden mode are called Special Ghosts due to their Extra abilities to watch all the activities in chat rooms - very useful for parental control);
- Several language improvements to help with the new translations; (localization & functionality related)
- French and Swedish translations have been updated and added - thanks to Pierre and Anon; (localization related)
- Danish has been added - thanks to Dit; (localization related)
- Some dice usage improvements; (functionality related)
- Banner/topic improvement - the default topic stays now in the file called "localization/_owner/owner.php" - which replaces localized.owner.php; (functionality related)
- config/config.lib.php changed (replaced "localized.owner" with "owner"); (functionality related)
- buzz_popup fix, to hide the .txt files in the sounds folder (some user also uploaded the redme.txt provided in the extrasounds archive); (functionality related)
- ghost mode fix - the conected_users number was still showing the hiden users; (functionality related)
- counter fix - counter won’t increase for one hour per each visitator - before, it was counting each time the user loaded/reloaded the login page; (functionality related)
- new gender added (couple); (functionality extension)
- added an option to display both avatars and gender icons, only one of them or neither one; (functionality extension)
- one more field added to the c_config table in the database.

After 1.92 release fixes (f means the released fix):
02.01.2008 - f7:
- sorting users fix in all the lists;
- admin5.php - download folder for fixes added in the Admin Panel drop menu;
- bot/respond.php, util.php and lib/clean.lib.php - some relative paths fixed for servers running on safe mode;

16.12.2007 - f6:
- lib/logs.lib.php - Private logs fix;

24.11.2007 - f5:
- deluser.php - added the header of the email notification on user deletion to show the right originator data;
- admin5.php - backup update link check up fix;
- loader.php - small fix;
- users_popupH.php, users_popupL.php - sounds path fixed;
- lib/logs.lib.php + logsadmin/header.html - a relative path fix for servers running on SAFE MODE ON;
- each localized.chat.php file - some extra blanks removed;
- mysql manual upgrade files fix - not needed for already installed/working chats;
- install/install.php - important fix (plus directory could remain chmod 777 after installer was run) - not needed for already installed/working chats;
- admin/admin5.php + installer files - extended the CHAT_URL box to 100 chars;
- config/style1-10.css.php - default text color fix for pictures posted and other system messages;
- lurking.php - small picture posted text fix;
- links.php - small security fix;

19.11.2007 - f4:
- admin/admin5.php - added a new minor format "-fn" to help admins get the new fixes right from the panel;
- lib/logs.php - important fix for posted links;

12.11.2007 - f3:
- install/install.php - important fix (installer should work fine now);

09.11.2007 - f2:
- lib/logs.lib.php - a small fix for messages storage;

06.11.2007 - f1:
- input.php - a small fix for Top administrators Quick menu;
- lib/logs.lib.php - a small fix for smilies;
- localization/italian/localized.admin.php;
- localization/romanian/localized.admin.php;
- config/style...css.php - added a header row into each css file, to get rid of several Mozilla warnings;

03.11.2007 - 1.92:
- 1.92 final release get announced and available for download; (release)
- Admin Config panel Menu is fully working now; also several explanations/hints adjusted; (functionality & administration related)
- Random Quote mod settings improvements in Admin panel; (administration related)
- lot of file changes and several database updates as per each 1.91-beta stage, but it isn’t worth to be mentioned here.

26.10.2007 - 1.91-beta9:
- added links and email addresses to topics!; (functionality related)
- fixed urls and email parsing by /away command and logging; (functionality related)
- IP logs fix for creating  new log after deleting it from Admin panel; actually, IP logs don’t get deleted but backed up into the acounter/pages/bak folder; (functionality related)
- several logging improvements; (functionality related)
- new PMs & whispers will not get cleaned up/archived until they get read; (functionality related)
- Added multilangual PayPal buttons for desirable donations; (support & localization related)

20.10.2007 - 1.91-beta8:
- fixed url/email parsing in private messaging popups; (functionality related)
- Firefox select boxes color fixed - in both input frame and Config tab; (functionality related)
- added a new option: to allow/suspend registrations; (based on GazB’s idea) (functionality related)
- added localized Google Adsearch on index. (support & localization related)

10.10.2007 - 1.91-beta7:
- some tutorial fixes/changes; (localization related)
- Firefox center issue fixed - to align center tables/content in admin pages, exit frame and link frame; (functionality related)
- added a new power to the chat users: "Top Moderator"; this has all the admin’s powers, except Admin panel access; (based on Luke’s idea & Cissy’s request) (functionality related)
- language changes/updates to include the Turkish grammar needs for different order of words in sentences; (localization related)

01.10.2007 - 1.91-beta6:
- Send emails tab in Admin panel improvements: can include a signature in emails and extra emails can be added to the existing list; (functionality extension)
- improvements and fixes of pm popup feature; (functionality related)
- most of the untranslated/English expressions (e.g. status bar messages and links/images titles) have been finally translated; (localization related)
- Chat Name added in admin panel, so the owner can choose now a name for his chat, without having to edit the APP_NAME in lib/release.lib.php (which has to remain "phpMyChat - Plus"); (functionality extension)
- small /invite command fix; (functionality related)
- specific language date&time formats added, for all translations, to include English UK and Engish US - also configurable from admin panel (localization & functionality related)
- language names translated in each lang; (localization related)
- 2D/3D flags (including UK/US flags now) displaying option in admin panel; (display related)
- utf-8 compatibility added for usernames and roomnames - specific language chars can now be used in user and room names - wow! (localization related)
- Turkish language added (localization project) - Thanks to Volkan Övün <vovun@hotmail.com>.
- The best phpMyChat Installer script finally added (also ftp chmod operations are done directly from the setup page); (installation related)

Known issues (as of 1.91-beta6):
- /img won’t work on php5 due to some deprecated image resizing function in this php version - still working on fixing this (it might be just a specific setting on the tested server - needs to be tested on a different php5 server too);
- installer won’t work for 1.91-beta versions of phpMyChat-Plus - as a support: export the current database structure to a file and send it to Ciprian at ciprianmp@yahoo.com, in order to get your specific db upgrade script; (note: the reason is I lost the track of how many beta minor versions of the database have been distributed in the last months, so the db structures differ now, even for the same beta version - sorry!)

28.08.2007 - 1.91-beta5:
- Beta downloads available on ciprianmp.com/atm for testing purposes; (release candidates)
- Worldtime fixes in the status bar (this feature should work fine without changes until 2012 - from the DST point of view - it also includes the latest changes for USA DST schedules); (functionality related)
- Login/logout sessions start/destroy fixed now - no more error logs; (functionality related)
- Language personalizations shouldn’t be carried out by changing the default language files included, but adding the desired definitions in the plus/localization/_owner/localized.owner.php file provided. Read FAQ for usage hints. (functionality extension)
- /dice command is now configurable to show images and numbers, only numbers or just totals (this can be changed in lib/commands/dice.cmd.php file); (functionality extension)
- /img links can now contain spaces; (functionality related)
- Ghost Control mod added - Admin can set in Config panel to hide admins or/and moderators in chat; (functionality extension)
- improved the logs sections in both Public Archive and Admin Archive - years and months are sorted now descending, to show the latest first; (display related)
- utf-8 compatibility added (not full yet - it cannot be used for usernames/roomnames) - first time in ages! (localization related)
- Reset password function added (below the password field in login pages); (functionality extension)
- Some Admin panel/Configuration adjustments; (usability related)
- Improved/fixed the update check in Config/Admin panel. Also inserted the first option in panel to enable/disable this feature, useful for sites with remote file access disabled; (administration & functionality related)
- Download link on index page moved in Credits area and redirected to the SourceForge page; (link update)
20.05.2007 - 1.91-beta4:
- Link frame updated to send the sourceforge; (link update)
- Cleaned up the bot folder, removing unnecessary files and folders; (size related)
- Fixed a Color cookie issue for power users switching to normal users on login - now deleting the cookie color of a power user when exits chat, to avoid the filter error alert if he logs in back as a lowered power user; (functionality related)
- Admin/user email notifications improvements; (email display related)
- Added Admin notification on user deletion; (administration related)
- Changed the Entrance sound feature to include an optional Welcome sound heard only by the user.
	- there are 4 types of settings for this:
			- 0 - Disabled - no sounds on entrance;
			- 1 - Notify the whole room - every user in the chat (including the new comer) will hear an entrance sound;
			- 2 - Welcome only the user - Only the new comer will get an Welcome sound;
			- 3 - Notify & Welcome (1&2) - Newcomer will hear only the Welcome sound and all the others will be notified with an Entrance sound;
			Note: to make sense, I suggest the two sounds to be different from each other, otherwise, setting to only 1 or 2 would be enough.
- Changed the /kick command to display a reason of kicking (optional)
	Usage:
	- old format/behavior:
			/kick user - displays: "You have been kicked out of the room by a moderator of this room" to the kicked user and
												"user has successfully been kicked away."
	- new format/behavior:
			/kick user [for spamming] - displays: "You have been kicked out of the room by a moderator of this room.<br />(Reason: for spamming)" to the kicked user and
												"user has successfully been kicked away. (Reason: for spamming)" - ["for spamming" can be any text string]
- Changed the /ban command and Admin Panel/Banish tab to display a reason of baning (optional)
	Usage:
	- old format/behavior (there is also an optional * /ban * user to ban forever - read the chat for more details):
			/ban user - displays: "You have been banished from this room or from the chat." to the banished user and
												"user has successfully been banished." to the room
	- new format/behavior:
			/ban user [for spamming] - displays: "You have been banished from this room or from the chat.<br />(Reason: for spamming)" to the banished user and
												"user has successfully been banished. (Reason: for spamming)" to the room - ["for spamming" can be any text string]
		The Reason field added in both Admin panels ("Registered Users" and "Banished Users") to add/edit the reason of banishment (the reson will be displayed to the banished user everytime he tries to login)
- Changed the Help link image from ? to Help text. (functionality related)
- Fixed the Archive/Log feature to display the right formated system messages: entrances/exits from chat, topic changes, announcements, aso. It is also multi-langual, according to the reader language (functionality related)
- Fixed the /invite command to remove sender’s name from the invitation list (based on Matias Oliveira feedback, a user could have invited himself, in the same room, of course) (functionality related)
- /topic command improvements: (functionality related)
		- Topic subject now stored in a file in botfb (keep it shown in banners even after messages clean-up);
		- There are two types of topics now: global (for all rooms) and specific (for each room);
		- /topic * and /topic * top reset are used to post global topics;
		- Priority of topics (if multi-topics allowed in admin panel):
			- 1. specific topics set with /topic command;
			- 2. global topics set with /topic * command (if specific doesn’t exist);
			- 3. local topics stored in banner.php (these will be moved to Admin panel as well soon)
- Several security fixes and other mods by and thanks to Alexander Eisele <xaex@xeax.de>
		- Links clean-up/popup mod; (security related)
		- Input message Wordwrap (40 chars) fix; (display related)
		- Color selector in input bar, register/edituser pages and admin panel; (replaces the color picker) (functionality related)
		- Color sniffer scripting safe mode filter; (security related)
		- Messages displayed in tables in messages frame (text alignment fix by cells); (display related)
- Argentinian spanish language updated and included (localization related) - Thanks to Matias Olivera <matiolivera@yahoo.com>.
- Dutch language updated and included (localization project) - Thanks to Danny & Berb.
- French language updated and included (localization project) - Thanks to Leloup <leloup@le-loup.info>.
- German language updated and included (localization project) - Thanks to Alexander Eisele <xaex@xeax.de>.
- Italian language updated and included (localization project) - Thanks to Mike Mikius <mikiusss@yahoo.com>.
- Spanish language updated and included (localization project) - Thanks to Roxana Castaneda <roxminu@yahoo.com>.
- Swedish language updated and included (localization project) - Thanks to Heikki <heikki@yttervik.be>.
- Vetnamese language included - new for phpmychat (localization project) - Thanks to Marshall <hellomarshal_lookatme@netzero.net>.
- Romanian language changed to include the special chars of the Central European encoding (with diactritics) (display related)
- In all the languages, the single quote eventually used in phrases (not codes) changed to unicode &#39; in order to eliminate any script error (functionality related)
- Changed the icon.gif background to transparency in order to pick and fit the chat room skin background color; (display related)
- Added ten more smilies;
- Added Buzz Gallery popup link in input bar (like smilies) - to automatically add a different sound from the sounds folder; (functionality extension)
- Added Randome Quote mod - to automatically send a public message containing a quote from a .txt file - configurable in Admin panel/Configuration; (functionality extension)
- Enlarged the users frame (for long names); (display related)
- POST, GET, COOKIE and SERVER methods updated to php5 - thanks to Alexander Eisele (php5 compatibility related)
- Fixed the private messages function in users list, when pm popup is disabled but pm enabled; (functionality related)
- Switched the pm links on names (when pm enabled): messages frame names will return /to while users list names will return name> in the same room or /wisp in the other rooms
- Changed the active links look and feel in the chat to overcome the scrolling bug when clicking a name/avatar in messages frame (functionality related)
SQL updates:
- Added five more fields in table c_config:
		- [COLOR_CM2 VARCHAR(25) NOT NULL default ’’ AFTER COLOR_CM1];
		- [CHAT_BOOT enum(’0’,’1’) NOT NULL default ’1’], [WELCOME_SOUND varchar(255) NOT NULL default ’’], [WORLDTIME enum(’0’,’1’,’2’) NOT NULL default ’2’] and [UPD_CHECK enum(’0’,’1’) NOT NULL default ’1’] at the end of table;
- Added two more fields in table c_reg_users at the beginning of the table: [id int(11) NOT NULL default ’0’] and [cid int(11) NOT NULL auto_increment] - for further implementation of integrations with other cms (ModX, forums, etc.);
- Changed the ALLOW_ENTRANCE_SOUND field type from enum(’0’,’1’) to enum(’0’,’1’,’2’,’3’) in c_config table;
- Changed the COLOR_CDC1 field name and type to COLOR_CD8 VARCHAR(25) in c_config table;
- Changed the COLOR_CDC2 field name and type to COLOR_CD9 VARCHAR(25) in c_config table;
- Changed the COLOR_CDC3 field name and type to COLOR_CA VARCHAR(25) in c_config table;
- Changed the COLOR_CDC4 field name and type to COLOR_CA1 VARCHAR(25) in c_config table;
- Changed the COLOR_CDC5 field name and type to COLOR_CA2 VARCHAR(25) in c_config table;
- Changed the COLOR_CDC6 field name and type to COLOR_CM VARCHAR(25) in c_config table;
- Changed the COLOR_CDC7 field name and type to COLOR_CM1 VARCHAR(25) in c_config table;
- Changed the values of the following fields in c_config table as follows: ENTRANCE_SOUND to ’sounds/beep.wav’, COLOR_CD2 to ’tomato’, COLOR_CD3 to ’dimgray’, COLOR_CD4 to ’indigo’, COLOR_CD7 to ’white’, COLOR_CD8 to ’magenta’, COLOR_CD9 to ’blueviolet’;
- Changed the value of language field in c_reg_users table for bot: language = ’English, German’;
Files edited: too many to be listed
Files removed:
- plus/config/color.lib.php;
- plus/lib/update.lib.php;
- plus/extra/.htaccess; - should be removed when upgrading - very important (fixes.zip link won’t work)!
Files moved:
- plus/images/nums(1-6).gif to plus/images/dice/nums(1-6).gif;
Files added:
- plus/config/style(8-10).css.php; (Black&White, Pink and DarkViolet skins)
- plus/install/database/mysql_upgrade_plus_1.90.txt; (all the old ones updated accordingly)
- plus/lib/update.txt;
- plus/localization/argentinian_spanish folder;
- plus/localization/dutch folder;
- plus/localization/french folder;
- plus/localization/german folder;
- plus/localization/italian folder;
- plus/localization/spanish folder;
- plus/localization/swedish folder;
- plus/localization/vietnamese folder;
Files updated:
- plus/images/helpOn.gif;
- plus/images/helpOff.gif;

06.08.2006 - 1.90:
- /size command added (changes the font size of the messages’ text in the rooms) (functionality extension)
- Help file udated to include the demote and size commands usage (support related)
- Tutorial updated to include the demote and room command usage (on Promote and Announce sections) (support related)
- Romanian language updated and included (localization related)
- Some English language corrections - bugs discovered while I was translating to Romanian (make some strings to have more sense). (localization related)
- Extra commands and mods lists displayed on Info Section at login page have been updated in mysql (info update)
- Bot Hello and Bye messages posted to the room on start/stop can be customized now in Admin Panel (functionality related)
- Bot can be enabled now in more than one room (before, it could talk only in the single room he was running; now, he can talk public to people in each room he is enabled in - at this point, the bot will have the same name in everyroom he is enabled - should we change that so he might have more names? umm...) (functionality extension)
- Fixed the bot responses by removing some trailing expressions from the user input (like /to , /to Re: , Re: , and others) - that made bot answer very strange before on replies (Ummm... and non-senses) (functionality related)
		- I have to admit, this was caused by my own mistakes (priv popup mod) not checking what is actually the user input to the bot in bot_conversationlog
- Extra setting for bot: disable/enable public conversations - the bot can be running in chat but won’t talk to the public, only private (functionality related)
- Room says command improved (roleplaying useful): a narator can say something to all the rooms using the [/room * message to display] command (functionality extension)
- Welcome messages moved to localization/[lang]/localized.chat.php - no need for lib/welcome.lib.php anymore (localization/optimization related)
- Number of default rooms and which to be used/shown can now also be defined/configured in Admin Panel (no more file editting needed for that) (support related)
- Removed the strikethrough for hyperlinks in styles (only underline left) (display related)
- Changed the version format from vX.X to X.XX (v1.9 is called now 1.90)
SQL updates:
- CMDS, MODS, QUICKA, QUICKM and QUICKU fields of the c_config table have been updated to include the latest commands/mods (for the login page and Quick menu in the chat); //this step is not compulsory for upgrades from 1.7 or 1.8
- Added two more fields [BOT_HELLO varchar(100) NOT NULL default ’’] and [BOT_BYE varchar(100) NOT NULL default ’’] at the end of table c_messages;
- IP and description fields values for the bot in c_reg_users have been updated to make more sense about how to use the bot;
Files edited:
- plus/avatar.php;
- plus/banner.php;
- plus/exit.php;
- plus/edituser.php;
- plus/handle_inputH.php;
- plus/help_popup.php;
- plus/input.php;
- plus/loader.php;
- plus/lurking.php;
- plus/messagesL.php;
- plus/register.php;
- plus/useronline.php;
- plus/usersH.php;
- plus/usersL.php;
- plus/admin/admin5.php;
- plus/admin/admin8.php;
- plus/bot/respond.php;
- plus/config/config.lib.php;
- plus/config/style.css.php;
- plus/config/style2.css.php;
- plus/config/style3.css.php;
- plus/config/style4.css.php;
- plus/config/style5.css.php;
- plus/config/style6.css.php;
- plus/config/style7.css.php;
- plus/install/Instructions.txt;
- plus/install/database/mysql_newinstall.txt;
- plus/install/database/mysql_upgrade_plus_1.7.txt;
- plus/install/database/mysql_upgrade_plus_until_1.6.txt;
- plus/install/database/mysql_std_0.12.txt;
- plus/install/database/mysql_std_0.13.txt;
- plus/install/database/mysql_std_0.14-0.15.txt;
- plus/lib/bot.lib.php;
- plus/lib/bot_priv.lib.php;
- plus/lib/clean.lib.php;
- plus/lib/commands.lib.php;
- plus/lib/index.lib.php;
- plus/lib/logs.lib.php;
- plus/lib/release.lib.php;
- plus/lib/update.lib.php;
- plus/lib/commands/bot.cmd.php;
- plus/lib/commands/buzz.cmd.php;
- plus/lib/commands/high.cmd.php;
- plus/lib/commands/kick.cmd.php;
- plus/lib/commands/priv_msg.cmd.php;
- plus/lib/commands/room.cmd.php;
- plus/lib/commands/sort.cmd.php;
- plus/localization/english/localized.admin.php;
- plus/localization/english/localized.chat.php;
- plus/localization/english/localized.tutorial.php;
Files added:
- plus/lib/commands/size.cmd.php;
- plus/install/database/mysql_upgrade_plus_1.8.txt;
- plus/localization/romanian folder:
	- plus/localization/romanian/index.html;
	- plus/localization/romanian/flag.gif;
	- plus/localization/romanian/localized.admin.php;
	- plus/localization/romanian/localized.chat.php;
	- plus/localization/romanian/localized.tutorial.php;
	- plus/localization/romanian/regex.txt;
Files removed:
- plus/lib/welcome.lib.php; (welcome messages included now in each language file)
To do (other then To do Cip.txt):
- database installer/upgrade for mysql;
- put back the old color picker with an option for which one to use in admin panel;
- extend the bannishment feature to be able to ban an ip either by using the command or from admin panel;

31.07.2006 - v1.8:
- The bot has been enhanced (thanks to Sally Linus for her ideas)! It acts now just like any other human user in the chat. It can be invoked privately and it’ll answer privately. Bot can talk from different rooms. (functionality extension)
- private messaging have been improved (mostly because of the bot improvements); it shows an user’s whisper also to him (in his room), not just to the receiver (in the destination room). It can extend the functionality in the future. (functionality related)
- the code was cleaned up a bit in several files. (size related)
- some more details in Installation/Instructions.txt for editing the config database details. (support related)
- created mysql database upgrade files for different versions of phpmychat. (installation related)
- added the docs/plus docs/Plus FAQ.txt. (support related)
- NEW&COOL: the admin panel/configuration tab now checks the official website for new versions released and alert the admin of a new version published, then the admin can directly open the download page! (support related)
SQL updates:
- Added one more field [room_from varchar(’30’) NOT NULL default ’’] at the end of table c_messages
Files edited = 41 - too many to mention here (most of the files because of the c_messages fields’ number modification);
Files moved:
- Instructions.txt - from plus/docs/plus docs to plus/install/;
Files added:
- plus/lib/bot_priv.lib.php; //used for bot to talk privately.
- plus/install/database/mysql_newinstall.txt;
- plus/install/database/mysql_upgrade_plus_1.7.txt;
- plus/install/database/mysql_upgrade_plus_until_1.6.txt;
- plus/install/database/mysql_std_0.12.txt;		//I really hope no one use such an old version
- plus/install/database/mysql_std_0.13.txt;		//I really hope no one use such an old version
- plus/install/database/mysql_std_0.14-0.15.txt;
- 111 aiml files for bot to be loaded (distributed as optional before) - you can remove the ones you don’t want, before loading them into the database (these are the most interesting I found over the internet 1 year ago. if anyone has time to check them out and optimize them, it would be appreciated)

05.07.2006: - v1.7 - The Plus version is called now v1.7 and it’s mature enough to become a final release (New name: phpMyChat-Plus v1.7 - not "based on 0.15.4" anymore - this is not alpha nor beta, it is not preview nor starter edition - it is the mature version of phpMyChat - I hope Nick Hozey will agree with me, as well as the other contributors who might have tried the Plus version so far)
- Main reason of this release: Firefox is now treated as an "H" browser due to Popeye’s flickering fix, so I wanted to improve its behavior a little bit.
- /buzz command improvements: (functionality related)
 - able to choose different sounds to be sent;
 - the buzz messages get deleted after 60 secs if they were sent like "/buzz" (if there is any text sent like "/buzz hello there", those messages remain in the database to be seen by the users in chat);
 - all the sounds embedded by the buzz command get removed after 10 seconds:
  - only admins and moderators can use it by default (reg users could use it before) - this can be changed in the buzz.cmd.php file
  - the sound is only played once - this makes it usable in Firefox as well;
  - users logged into chat after buzz commands have been sent, won’t hear any old sounds;
 - Usage (read the help for more details):
  - old usage: "/buzz" or "/buzz message to be shown" - this plays the default sound for buzz defined in Admin panel;
  - extended usage: "/buzz ~newsound" or "/buzz ~newsound message to be shown" - this plays the newsound.wav file from the plus/sounds folder; please note the sign "~" to be used at the beginning of the second word, which is the name of the sound file without the extension .wav (no other extensions can be used by default).
- Copyright notes have now the years updated automatically (e.g. "2000-2006 The phpHeaven Team" - 2006 will be automatically replaced by the current year in the future) (cosmetic & functionality related)
- All the links available in chat include now "titles" (small hints) and mouseover statuses for the Status bar; this hides the addresses where the link would send the user if he clicks on it (security improvement), as well as helps users understand how to use the features (like sending a pm or editing the profile) - use /timestamp to see how it works. (cosmetic, functionality & security related)
- Fixed the center alignment for the index page elements in Firefox (display related)
- Fixed the mouse over for the Help and Profile images in input frame (the washout effect) (display and functionality related)
- Increased the users frame width form 150 to 180 in frameset_def.lib.php (to fit the longer usernames) (display related)
- Added the .htaccess file by default in the config folder, to deny the config.lib.php access from all (security related)
- Improved the lurking feature to use the lib/connected_users.lib.php. Also fixed the chat_activity.php file to display the current status of the chat in remote pages. (it hasn’t been working properly before: no correct output) (functionality related)
- Fixed the login handling (previously, admins couldn’t change the username or password for other accounts he might had - it as my bad, I misunderstood the role of $LIMIT variable in login.lib.php) (functionality related)
- Fixed the edit avatar feature (added variable LIMIT in the url to and from avatar.php). An user could change his name or password even though he was logged in the chat because the avatar.php was losing the LIMIT value. (functionality related)
- Fixed some display issues for the private/whisper messages (sender couldn’t see hiw own whispers - at this point, unfortunately, sender will see his whispers massages in all the rooms - note that whispers are called the private messages sent by command /wisp or /whisp, not by /msg or /to) (functionality related)
- Fixed the botname display: The Bot’s name will not be displayed as link anymore in users lists nor messages frame - no more PM’s to bot (he ignored private messaging anyway) (functionality related)
- Added new feature: "Send email to the new registered user" (enabled by default in admin panel: EMAIL_USER value) containing the account data, including the password, for further references; It is based on Bob Dickow hack (Send an email to admin on new user registration) (functionality extended)
- Extended feature: "Send email to the user & admin after the user changed his name/password by editing the profile" (enabled by default in admin panel: EMAIL_USER value) containing the account data, including the password, for further references; It is based on Bob Dickow hack (Send an email to admin on new user registration) (functionality extended)
SQL updates:
- Added one field [EMAIL_USER enum(’0’,’1’) NOT NULL default ’1’] at the end of table c_config
Files edited = 53 - too many to mention here:
Files added (61 optional extra sounds) - available as a separate pack (thanks to bluntdog):
- plus/sounds/name.wav; //please be aware that some of the provided sounds contain bad language - listen to them in Media Player and remove the inappropriate ones.

09.05.2006 - v1.6a:
- FireFox flickering fix (by Popeye). It made Firefox not being treated as an "L" browser anymore. (functionality related)
Files edited:
- plus/lib/index.lib.php;

10.02.2006: - v1.6
- index page (MySQL error on setting RoomAccessType to 1) fixed. (functionality related)
Files edited:
- plus/lib/index.lib.php.

09.12.2005 - d.15:
- Mass email subject (Send emails admin panel) changed. (functionality related)
Files edited:
- plus/admin/admin4.php;

08.12.2005:
- Bot avatar and font color couldn’t be changed from the admin panel (functionality related).
Files edited:
- plus/admin/admin5.php;

07.12.2005:
- plus/images/dice added for dice3 command (I’m very sorry, I forgot that folder).
Files added:
- plus/images/dice/1-100.gif;
- plus/images/dice/index.html.

06.12.2005:
- Autoboot feature improved/fixed:
	- SYS dice should have been SYS dice1 in plus/lib/clean.lib.php (to count time from the last dice thrown, if the user has done noother activities) (functionality related);
	- Normal users couldn’t login if the welcome message has been disabled. (very important - functionality related);
- plus/chat folder contains now two files called index.php and index.php3 to redirect the users who are trying to login using the old bookmarks. Users will automatically be redirected to the new chatpath, whatever the name of the folder will be (plus, chat, etc.). You can safely delete the old index.html in that folder. (functionality related)
- topic and skin fix for rooms called like this: Dan’s room (containing quotes) - I strongly suggest you don’t use special chars in your chat rooms names. At this point, posting in those rooms is not possible. (functionality related)
- non-wanted slashes (05.12.2005 fix related) removed in lurking and archive as well.
Files edited:
- plus/admin/admin8.php;
- plus/config/config.lib.php - replace line 290 in yours;
- plus/lib/clean.lib.php;
- plus/lib/logs.lib.php;
- plus/config/config.lib.php;
- plus/banner.php;
- plus/lurking.php.
Files added:
- plus/chat/index.php;
- plus/chat/index.php3;
Files deleted:
- plus/chat/index.html;

05.12.2005:
- messages sent when bot is active have no slashes anymore (functionality related).
Files edited:
- plus/loader.php;
- plus/messagesL.php;

03.12.2005:
- admin panel connection sheet updated to follow the headers of the other sheets (display related);
- description field in profiles could display html entities, which could let scripts to be run on display profiles (very important - security related!);
- the bot replies will not look like private anymore, but addressed to (Username > response, not > [Username] response) (display related);
- private popup fixed in IE due to a question mark forgotten before into open(priv_popup?,...) (functionality related);
- removed some unneeded comments (size related).
Files edited:
- plus/admin/admin8.php;
- plus/lib/bot.lib.php;
- plus/edituser.php;
- plus/register.php;
- plus/whois_popup.php;
- plus/handle_inputH.php;
- plus/input.php;

29.11.2005:
- banner.php (which shows the topics) for some reasons was not returning the right room name, as well as the room style (only on some servers) (display & functionality related);
- lurking.php and admin8.php chat text couldn’t be read on dark backgrounds (black text on black background).
Files edited:
- plus/admin/admin8.php;
- plus/admin/admin9.php;
- plus/banner.php;
- plus/lurking.php.
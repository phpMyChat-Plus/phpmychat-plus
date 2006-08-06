Note: if you've already modded your own files, please compare and edit the changes from those included in this archive to identify the changes done for the fix. If not, just replace them in the according folders.
This archive includes all the previously released fixes.
Tested with: IE 6.0 SP2, Mozilla Firefox 1.5.0.4, Mozilla Firebird 0.7, Netscape 8.1, Opera 9.0 build 8502, AvantBrowser 10.2 build 52.
Connection troubles with IE 7.0 beta. (reported on different sites)

Fixes History:
06.08.2006 - v1.90:
- /size command added (changes the font size of the messages' text in the rooms) (functionality extension)
- Help file udated to include the demote and size commands usage (support related)
- Tutorial updated to include the demote and room command usage (on Promote and Announce sections) (support related)
- Romanian language updated and included (localization related)
- Some English language corrections - bugs discovered while I was translating to Romanian (make some strings to have more sense). (localization related)
- Extra commands and mods lists displayed on Info Section at login page have been updated in mysql (info update)
- Bot Hello and Bye messages posted to the room on start/stop can be customized now in Admin Panel (functionality related)
- Bot can be enabled now in more than one room (before, it could talk only in the single room he was running; now, he can talk public to people in each room he is enabled in - at this point, the bot will have the same name in everyroom he is enabled - should we change that so he might have more names? umm...) (functionality extension)
- Fixed the bot responses by removing some trailing expressions from the user input (like /to , /to  Re: , Re: , and others) - that made bot answer very strange before on replies (Ummm... and non-senses) (functionality related)
		- I have to admit, this was caused by my own mistakes (priv popup mod) not checking what is actually the user input to the bot in bot_conversationlog
- Extra setting for bot: disable/enable public conversations - the bot can be running in chat but won't talk to the public, only private (functionality related)
- Room says command improved (roleplaying useful): a narator can say something to all the rooms using the [/room * message to display] command (functionality extension)
- Welcome messages moved to localization/[lang]/localized.chat.php - no need for lib/welcome.lib.php anymore (localization/optimization related)
- Number of default rooms and which to be used/shown can now also be defined/configured in Admin Panel (no more file editting needed for that) (support related)
- Removed the strikethrough for hyperlinks in styles (only underline left) (display related)
- Changed the version format from vX.X to X.XX (v1.9 is called now 1.90)
SQL updates:
- CMDS, MODS, QUICKA, QUICKM and QUICKU fields of the c_config table have been updated to include the latest commands/mods (for the login page and Quick menu in the chat); //this step is not compulsory for upgrades from 1.7 or 1.8
- Added two more fields [BOT_HELLO varchar(100) NOT NULL default ''] and [BOT_BYE varchar(100) NOT NULL default ''] at the end of table c_messages;
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
- The bot has been enhanced (thanks to Sally Linus for her ideas)! It acts now just like any other human user in the chat. It can be invoked private and he answers private. He can talk from different rooms (functionality extension)
- private messaging have been improved (mostly because of the bot improvements); it shows an user's whisper also to him (in his room), not just to the receiver (in the destination room). It can extend the functionality in the future. (functionality related)
- the code was cleaned up a bit in several files. (size related)
- some more details in Installation/Instructions.txt for editing the config database details. (support related)
- created mysql database upgrade files for different versions of phpmychat. (installation related)
- added the docs/plus docs/Plus FAQ.txt. (support related)
- NEW&COOL: the admin panel/configuration tab now checks the official website for new versions released and alert the admin of a new version published, then the admin can directly open the download page! (support related)
SQL updates:
- Added one more field [room_from varchar('30') NOT NULL default ''] at the end of table c_messages
Files edited = 41 - too many to mention here (most of the files because of the c_messages fields' number modification);
Files moved:
- Instructions.txt - from plus/docs/plus docs to plus/installation/;
Files added:
- plus/lib/bot_priv.lib.php;  //used for bot to talk privately.
- plus/install/database/mysql_newinstall.txt;
- plus/install/database/mysql_upgrade_plus_1.7.txt;
- plus/install/database/mysql_upgrade_plus_until_1.6.txt;
- plus/install/database/mysql_std_0.12.txt;		//I really hope no one use such an old version
- plus/install/database/mysql_std_0.13.txt;		//I really hope no one use such an old version
- plus/install/database/mysql_std_0.14-0.15.txt;
- 111 aiml files for bot to be loaded (distributed as optional before) - you can remove the ones you don't want, before loading them into the database (these are the most interesting I found over the internet 1 year ago. if anyone has time to check them out and optimize them, it would be appreciated)

05.07.2006: - v1.7 - The Plus version is called now v1.7 and it's mature enough to become a final release (New name: phpMyChat-Plus v1.7 - not "based on 0.15.4" anymore - this is not alpha nor beta, it is not preview nor starter edition - it is the mature version of phpMyChat - I hope Nick Hozey will agree with me, as well as the other contributors who might have tried the Plus version so far)
- Main reason of this release: Firefox is now treated as an "H" browser due to Popeye's flickering fix, so I wanted to improve its behavior a little bit.
- /buzz command improvements: (functionality related)
  - able to choose different sounds to be sent;
  - the buzz messages get deleted after 60 secs if they were sent like "/buzz" (if there is any text sent like "/buzz hello there", those messages remain in the database to be seen by the users in chat);
  - all the sounds embedded by the buzz command get removed after 10 seconds:
    - only admins and moderators can use it by default (reg users could use it before) - this can be changed in the buzz.cmd.php file
    - the sound is only played once - this makes it usable in Firefox as well;
    - users logged into chat after buzz commands have been sent, won't hear any old sounds;
  - Usage (read the help for more details):
    - old usage: "/buzz" or "/buzz message to be shown" - this plays the default sound for buzz defined in Admin panel;
    - extended usage: "/buzz ~newsound" or "/buzz ~newsound message to be shown" - this plays the newsound.wav file from the plus/sounds folder; please note the sign "~" to be used at the beginning of the second word, which is the name of the sound file without the extension .wav (no other extensions can be used by default).
- Copyright notes have now the years updated automatically (e.g. "2000-2006 The phpHeaven Team" - 2006 will be automatically replaced by the current year in the future) (cosmetic & functionality related)
- All the links available in chat include now "titles" (small hints) and mouseover statuses for the Status bar; this hides the addresses where the link would send the user if he clicks on it (security improvement), as well as helps users understand how to use the features (like sending a pm or editing the profile) - use /timestamp to see how it works. (cosmetic, functionality & security related)
- Fixed the center alignment for the index page elements in Firefox (display related)
- Fixed the mouse over for the Help and Profile images in input frame (the washout effect) (display and functionality related)
- Increased the users frame width form 150 to 180 in frameset_def.lib.php (to fit the longer usernames) (display related)
- Added the .htaccess file by default in the config folder, to deny the config.lib.php access from all (security related)
- Improved the lurking feature to use the lib/connected_users.lib.php. Also fixed the chat_activity.php file to display the current status of the chat in remote pages. (it hasn't been working properly before: no correct output) (functionality related)
- Fixed the login handling (previously, admins couldn't change the username or password for other accounts he might had - it as my bad, I misunderstood the role of $LIMIT variable in login.lib.php) (functionality related)
- Fixed the edit avatar feature (added variable LIMIT in the url to and from avatar.php). An user could change his name or password even though he was logged in the chat because the avatar.php was losing the LIMIT value. (functionality related)
- Fixed some display issues for the private/whisper messages (sender couldn't see hiw own whispers - at this point, unfortunately, sender will see his whispers massages in all the rooms - note that whispers are called the private messages sent by command /wisp or /whisp, not by /msg or /to) (functionality related)
- Fixed the botname display: The Bot's name will not be displayed as link anymore in users lists nor messages frame - no more PM's to bot (he ignored private messaging anyway) (functionality related)
- Added new feature: "Send email to the new registered user" (enabled by default in admin panel: EMAIL_USER value) containing the account data, including the password, for further references; It is based on Bob Dickow hack (Send an email to admin on new user registration) (functionality extended)
- Extended feature: "Send email to the user & admin after the user changed his name/password by editing the profile" (enabled by default in admin panel: EMAIL_USER value) containing the account data, including the password, for further references; It is based on Bob Dickow hack (Send an email to admin on new user registration) (functionality extended)
SQL updates:
- Added one field [EMAIL_USER enum('0','1') NOT NULL default '1'] at the end of table c_config
Files edited = 53 - too many to mention here:
Files added (61 optional extra sounds) - available as a separate pack (thanks to bluntdog):
- plus/sounds/name.wav;  //please be aware that some of the provided sounds contain bad language - listen to them in Media Player and remove the inappropriate ones.

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
- Bot avatar and font color couldn't be changed from the admin panel (functionality related).
Files edited:
- plus/admin/admin5.php;

07.12.2005:
- plus/images/dice added for dice3 command (I'm very sorry, I forgot that folder).
Files added:
- plus/images/dice/1-100.gif;
- plus/images/dice/index.html.

06.12.2005:
- Autoboot feature improved/fixed:
	- SYS dice should have been SYS dice1 in plus/lib/clean.lib.php (to count time from the last dice thrown, if the user has done noother activities) (functionality related);
	- Normal users couldn't login if the welcome message has been disabled. (very important - functionality related);
- plus/chat folder contains now two files called index.php and index.php3 to redirect the users who are trying to login using the old bookmarks. Users will automatically be redirected to the new chatpath, whatever the name of the folder will be (plus, chat, etc.). You can safely delete the old index.html in that folder. (functionality related)
- topic and skin fix for rooms called like this: Dan's room (containing quotes) - I strongly suggest you don't use special chars in your chat rooms names. At this point, posting in those rooms is not possible. (functionality related)
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
- messages sent when bot is active have no slashes anymore  (functionality related).
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
- lurking.php and admin8.php chat text couldn't be read on dark backgrounds (black text on black background).
Files edited:
- plus/admin/admin8.php;
- plus/admin/admin9.php;
- plus/banner.php;
- plus/lurking.php.
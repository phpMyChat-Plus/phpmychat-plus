Note: if you've already modded your own files, please compare and edit the changes from those included in this archive to identify the changes done for the fix. If not, just replace them in the according folders.
This archive includes all the previously released fixes.

Fixes History:
05.07.2006: - The Plus version is called now v1.7 and it's mature enough to become a final release (New name: phpMyChat-Plus v1.7 - not "based on 0.15.4" anymore - this is not alpha nor beta, it is not preview nor starter edition - it is the mature version of phpMyChat - I hope Nick Hozey will agree with me, as well as the other contributors who might have tried the Plus version so far)
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
Tested with: IE 6.0 SP2, Mozilla Firefox 1.5.0.4, Mozilla Firebird 0.7, Netscape 8.1, Opera 9.0 build 8502, AvantBrowser 10.2 build 52.

09.05.2006:
- FireFox flickering fix (by Popeye). It made Firefox not being treated as an "L" browser anymore. (functionality related)
Files edited:
- plus/lib/index.lib.php;

10.02.2006:
- index page (MySQL error on setting RoomAccessType to 1) fixed. (functionality related)
Files edited:
- plus/lib/index.lib.php.

09.12.2005:
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
<html>
<title>Instructions</title>
<body>
Instructions for a NEW installation (or an UPGRADE) of the Plus version you just downloaded.<br />
Note: This version comes with a fully automated wizard to help you install phpMyChat Plus on your site.<br />
Alternatively there is a manual install folder which contains more instructions for a manual install.<br />
If you fail to successfully run the automated install or if you choose the manual installation, please read the step 6 then go to manual install folder and follow those instructions (step 2a below).
<br />
1. Extract plus.zip<br /><br />

2a. Important: if you want to upgrade (or encounter troubles with this installer), read the file <a href="manual installation/Manual Instructions.txt" target=blank>manual installation/Manual Instructions.txt</a> for things you need to keep into account before next step!<br />
2b. Upload the plus directory into your public_html folder.<br />
Note: index.php must be in the plus folder, not plus/chat/ as for the previous versions.<br /><br />

3. Optionally, rename plus folder to whatever you'd like (chat, mychat).<br /><br />

4. Open http://yoursiteurl.com/plus  (plus is the name you used in step 3.). The setup will load automatically.<br /><br />

5. Pick up an available language and go through the installer (thanks to Thomas Pschernig and <a href=http://www.ciprianmp.com/plus/ target=_blank>Ciprian</a>).<br /><br />

6. Make sure the file install/install.php is deleted from your chat, otherwise you won't be able to open the chat login page.<br /><br />

7. Test your site functionality by opening http://yoursiteurl.com/plus (plus is the name you used in step 3.) in your browser. Note that there is only one admin right now: the one defines suring setup.<br /><br />

8. Open the Administration menu/link (Admin Panel) and customize your chat (do not rename your bot yet).<br /><br />

That's it! It should fly!<br /><br /><br />


After install Support<br /><br />

A: If you don't intend to use the bot, edit the quick menu in admin config panel to eliminate the bot commands from the quick list.<br />
If bot answers you (posts any content) then you can change it's name in Admin Panel now - it's safe.<br />
This version comes only with the English and German bot files.<br /><br />

B: If you get into troubles with bot, you need to uninstall and reinstall it to make it work again:<br />
B1. Stop the bot in chat rooms it is started in, using the "/bot stop" command (if it doesn't work, just delete the bot records in c_users table - with phpmyadmin - and botfb folder).<br />
B2. Rename the bot to "plusbot" in Admin panel.<br />
B3. Use phpmyadmin to "empty" the following tables: bot_bot, bot_bots, bot_patterns and bot_templates.<br />
B4. Reupload back (restore) the file called botloader.php (or botloadrinc.php, if first frozes).<br />
B5. Make sure all the original distributed files are in the aiml folder (startup.xml and *.aiml files).<br />
B6. Make sure the plus/bot/subs.inc file is chmoded to 777 (step 5 in this tutorial).<br />
B7. Reinstall the bot following the steps described in paragraph A. (A1-A8)<br /><br />

C: To add other chat languages by yourself, download and edit the existing language files from the standard pack and add the new folder into /localization/ Plus folder. (well, the best way is to contact me and get the latest templates in a Word format...)<br />
Please note that there is a new approach to Plus, each language folder including an /images/ folder with it's own images (flag.gif - 3D, flag0.gif - 2D, exitdoor.gif, exitdoorRoll.gif, helpOn.gif and helpOff.gif). Required are only the correspondent flag images for your language (2D could be also copied from the standard version and just renamed to flag0.gif). If not added, the help and door images will be automatically be shown from english.<br />
Insert, modify and translate according to the modified/new lines added in the english Plus version (use a Text Compare software). To be compatible with Plus, the new files should be encoded into "UTF8 without BOM" (just a few text editors can convert and keep this format - I personally preffer Notepad++ (free and powerful!) - never use the Windows Notepad or Wordpad). If everything goes fine, you can make your translation available to other users by contacting me at my email address (last line in this document).<br /><br />

D. This chat comes with 10 different skins (skins/style1-10.css.php).<br />
You can build your own styles (do not modify the provided ones!).<br />
One single style is composed of two files: style1.css.php (main style) and style1.php (skin settings). Copy these two files and rename them by increasing the overall number (e.g. style11.css.php and style11.php) then start customize them to match your needs. Don't forget to give it a name in style11.php and test it. The new skin will become available in the Admin Panel/Configuration/Menu/Rooms & Colors.<br /><br />

For more instructions (e.g. how to upgrade the c_reg_users table) read the Plus FAQ.txt in the "docs/plus docs" folder. Actually, read also the Fixes readme.txt which might give you some more hints about new features/fixes and other stuff.<br />
That's all for now! Have a nice one and let me know how it goes!<br /><br />

Do you need some more tries of different configurations before applying to your chat server? Don't hesitate to use the Demo/Try me server at <a href="http://ciprianmp.com/latest/" target=_blank>http://ciprianmp.com/latest/</a> (use admin/admin or moderator/moderator as login for different powers - no registration required)<br /><br />

My best regards,<br />
Ciprian Murariu<br />
<a href="mailto:ciprianmp@yahoo.com?subject=phpMyChat%20installer%20Feedback">ciprianmp at yahoo dot com<br />
<p align="center"><input type="button" value="Close" onClick="window.open('','_parent','');window.close();" name="Close"></p>
</body>
</html>
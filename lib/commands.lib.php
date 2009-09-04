<?php
if (eregi("^\/(show|last".(L_CMD_SHOW != "" && L_CMD_SHOW != "L_CMD_SHOW" ? "|".str_replace(",","|",L_CMD_SHOW) : "").")([[:space:]]([[:digit:]]+))?$", $M, $Cmd))
{
	include("./lib/commands/show.cmd.php");
}
elseif (eregi("^\/(bot".(L_CMD_BOT != "" && L_CMD_BOT != "L_CMD_BOT" ? "|".str_replace(",","|",L_CMD_BOT) : "").")[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/bot.cmd.php");
}
elseif ((eregi("^\/(buzz".(L_CMD_BUZZ != "" && L_CMD_BUZZ != "L_CMD_BUZZ" ? "|".str_replace(",","|",L_CMD_BUZZ) : "").")([[:space:]](.+))?$", $M, $Cmd) && !eregi("~",$Cmd[2])) || eregi("^\/(buzz".(L_CMD_BUZZ != "" && L_CMD_BUZZ != "L_CMD_BUZZ" ? "|".str_replace(",","|",L_CMD_BUZZ) : "").")[[:space:]]([^[:space:]]{1,30})([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/buzz.cmd.php");
}
elseif (eregi("^\/(refresh|reload".(L_CMD_REFRESH != "" && L_CMD_REFRESH != "L_CMD_REFRESH" ? "|".str_replace(",","|",L_CMD_REFRESH) : "").")([[:space:]]([[:digit:]]*))?$", $M, $Cmd))
{
	include("./lib/commands/refresh.cmd.php");
}
elseif (eregi("^\/(order".(L_CMD_ORDER != "" && L_CMD_ORDER != "L_CMD_BUZZ" ? "|".str_replace(",","|",L_CMD_ORDER) : "").")$", $M))
{
	include("./lib/commands/order.cmd.php");
}
elseif (eregi("^\/(sort".(L_CMD_SORT != "" && L_CMD_SORT != "L_CMD_SORT" ? "|".str_replace(",","|",L_CMD_SORT) : "").")$", $M))
{
	include("./lib/commands/sort.cmd.php");
}
elseif (eregi("^\/(timestamp".(L_CMD_TIMESTAMP != "" && L_CMD_TIMESTAMP != "L_CMD_TIMESTAMP" ? "|".str_replace(",","|",L_CMD_TIMESTAMP) : "").")$", $M))
{
	include("./lib/commands/timestamp.cmd.php");
}
elseif (C_VERSION > 0 && eregi("^\/(join".(L_CMD_JOIN != "" && L_CMD_JOIN != "L_CMD_JOIN" ? "|".str_replace(",","|",L_CMD_JOIN) : "").")[[:space:]](0|1[[:space:]])?#(.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/join.cmd.php");
}
elseif (eregi("^\/(quit|exit|bye".(L_CMD_QUIT != "" && L_CMD_QUIT != "L_CMD_QUIT" ? "|".str_replace(",","|",L_CMD_QUIT) : "").")([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/quit.cmd.php");
}
elseif (eregi("^\/(ignore".(L_CMD_IGNORE != "" && L_CMD_IGNORE != "L_CMD_IGNORE" ? "|".str_replace(",","|",L_CMD_IGNORE) : "").")([[:space:]]\\-)?([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/ignore.cmd.php");
}
elseif (eregi("^\/(!|recall".(L_CMD_RECALL != "" && L_CMD_RECALL != "L_CMD_RECALL" ? "|".str_replace(",","|",L_CMD_RECALL) : "").")$", $M, $Cmd) && (isset ($M0) && $M0 != ""))
{
	include("./lib/commands/history.cmd.php");
}
elseif (eregi("^\/(kick|boot".(L_CMD_KICK != "" && L_CMD_KICK != "L_CMD_KICK" ? "|".str_replace(",","|",L_CMD_KICK) : "").")[[:space:]]([^[:space:]]{1,30})([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/kick.cmd.php");
}
elseif (eregi("^\/(msg|to".(L_CMD_MSG != "" && L_CMD_MSG != "L_CMD_MSG" ? "|".str_replace(",","|",L_CMD_MSG) : "").")[[:space:]]([^[:space:]]{1,30})[[:space:]](.+)$", $M, $Cmd))
{
	include("./lib/commands/priv_msg.cmd.php");
}
elseif (eregi("^\/(whois|about".(L_CMD_WHOIS != "" && L_CMD_WHOIS != "L_CMD_WHOIS" ? "|".str_replace(",","|",L_CMD_WHOIS) : "").")[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/whois.cmd.php");
}
elseif (eregi("^\/(profile".(L_CMD_PROFILE != "" && L_CMD_PROFILE != "L_CMD_PROFILE" ? "|".str_replace(",","|",L_CMD_PROFILE) : "").")$", $M))
{
	include("./lib/commands/profile.cmd.php");
}
elseif (eregi("^\/(notify".(L_CMD_NOTIFY != "" && L_CMD_NOTIFY != "L_CMD_NOTIFY" ? "|".str_replace(",","|",L_CMD_NOTIFY) : "").")$", $M))
{
	include("./lib/commands/notify.cmd.php");
}
elseif (eregi("^\/(promote".(L_CMD_PROMOTE != "" && L_CMD_PROMOTE != "L_CMD_PROMOTE" ? "|".str_replace(",","|",L_CMD_PROMOTE) : "").")[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/promote.cmd.php");
}
elseif (eregi("^\/(help|\?".(L_CMD_HELP != "" && L_CMD_HELP != "L_CMD_HELP" ? "|".str_replace(",","|",L_CMD_HELP) : "").")$", $M, $Cmd))
{
	include("./lib/commands/help.cmd.php");
}
elseif (eregi("^\/(clear".(L_CMD_CLEAR != "" && L_CMD_CLEAR != "L_CMD_CLEAR" ? "|".str_replace(",","|",L_CMD_CLEAR) : "").")$", $M, $Cmd))
{
	include("./lib/commands/clear.cmd.php");
}
elseif (eregi("^\/(dice".(L_CMD_DICE != "" && L_CMD_DICE != "L_CMD_DICE" ? "|".str_replace(",","|",L_CMD_DICE) : "").")([[:space:]].*)?$", $M, $Cmd))
{
	include("./lib/commands/dice.cmd.php");
}
elseif (eregi("^\/([1-9][0-9]?)([d])([1-9][0-9]?)$", $M, $Cmd) || eregi("^\/([1-9][0-9]?)([d])$", $M, $Cmd))
{
	include("./lib/commands/dice2.cmd.php");
}
elseif (eregi("^\/d([1-9][0-9]?[0-9]?)([t])([1-9][0-9]?)$", $M, $Cmd) || eregi("^\/d([1-9][0-9]?[0-9]?)$", $M, $Cmd))
{
	include("./lib/commands/dice3.cmd.php");
}
elseif (C_SAVE != "0" && eregi("^\/(save|export".(L_CMD_SAVE != "" && L_CMD_SAVE != "L_CMD_SAVE" ? "|".str_replace(",","|",L_CMD_SAVE) : "").")([[:space:]]([[:digit:]]*))?$", $M, $Cmd) && ($Cmd[3] == "" OR $Cmd[3] > 0))
{
	include("./lib/commands/save.cmd.php");
}
elseif (eregi("^\/(size".(L_CMD_SIZE != "" && L_CMD_SIZE != "L_CMD_SIZE" ? "|".str_replace(",","|",L_CMD_SIZE) : "").")([[:space:]]([[:digit:]]+))?$", $M, $Cmd))
{
	include("./lib/commands/size.cmd.php");
}
elseif (eregi("^\/(announce".(L_CMD_ANNOUNCE != "" && L_CMD_ANNOUNCE != "L_CMD_ANNOUNCE" ? "|".str_replace(",","|",L_CMD_ANNOUNCE) : "").")[[:space:]](.+)?$", $M, $Cmd))
{
	include("./lib/commands/announce.cmd.php");
}
elseif (eregi("^\/(invite".(L_CMD_INVITE != "" && L_CMD_INVITE != "L_CMD_INVITE" ? "|".str_replace(",","|",L_CMD_INVITE) : "").")([[:space:]](.+))+$", $M, $Cmd))
{
	include("./lib/commands/invite.cmd.php");
}
elseif (C_BANISH != "0" && eregi("^\/(ban".(L_CMD_BAN != "" && L_CMD_BAN != "L_CMD_BAN" ? "|".str_replace(",","|",L_CMD_BAN) : "").")[[:space:]](\*[[:space:]])?([^[:space:]]{1,30})([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/banish.cmd.php");
}
elseif (eregi("^\/(me".(L_CMD_ME != "" && L_CMD_ME != "L_CMD_ME" ? "|".str_replace(",","|",L_CMD_ME) : "").")[[:space:]](.+)?$", $M, $Cmd) || eregi("^(:)[[:space:]](.+)?$", $M, $Cmd))
{
	include("./lib/commands/me.cmd.php");
}
elseif (eregi("^\/(mr".(L_CMD_MR != "" && L_CMD_MR != "L_CMD_MR" ? "|".str_replace(",","|",L_CMD_MR) : "").")[[:space:]](.+)?$", $M, $Cmd))
{
	include("./lib/commands/mr.cmd.php");
}
// elseif (eregi("^\/(away".(L_CMD_AWAY != "" && L_CMD_AWAY != "L_CMD_AWAY" ? "|".str_replace(",","|",L_CMD_AWAY) : "").")$", $M)) // if no reason string desired.
elseif (eregi("^\/(away".(L_CMD_AWAY != "" && L_CMD_AWAY != "L_CMD_AWAY" ? "|".str_replace(",","|",L_CMD_AWAY) : "").")([[:space:]](.+))?$", $M, $Cmd))
{
  include("./lib/commands/away.cmd.php");
}
elseif (eregi("^\/(demote".(L_CMD_DEMOTE != "" && L_CMD_DEMOTE != "L_CMD_DEMOTE" ? "|".str_replace(",","|",L_CMD_DEMOTE) : "").")[[:space:]](\*[[:space:]])?(.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/demote.cmd.php");
}
elseif (eregi("^\/(high".(L_CMD_HIGH != "" && L_CMD_HIGH != "L_CMD_HIGH" ? "|".str_replace(",","|",L_CMD_HIGH) : "").")[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/high.cmd.php");
}
elseif (eregi("^\/(img".(L_CMD_IMG != "" && L_CMD_IMG != "L_CMD_IMG" ? "|".str_replace(",","|",L_CMD_IMG) : "").")[[:space:]](.+)?$", $M, $Cmd))
{
	include("./lib/commands/img.cmd.php");
}
elseif (eregi("^\/(room".(L_CMD_ROOM != "" && L_CMD_ROOM != "L_CMD_ROOM" ? "|".str_replace(",","|",L_CMD_ROOM) : "").")([[:space:]]\*)?([[:space:]].+)$", $M, $Cmd))
{
	include("./lib/commands/room.cmd.php");
}
elseif (eregi("^\/(topic".(L_CMD_TOPIC != "" && L_CMD_TOPIC != "L_CMD_TOPIC" ? "|".str_replace(",","|",L_CMD_TOPIC) : "").")[[:space:]](\*)?([^[:space:]]{1,30})[[:space:]](.+)$", $M, $Cmd))
{
	include("./lib/commands/topic.cmd.php");
}
elseif (eregi("^\/(wisp|whisp".(L_CMD_WISP != "" && L_CMD_WISP != "L_CMD_WISP" ? "|".str_replace(",","|",L_CMD_WISP) : "").")[[:space:]]([^[:space:]]{1,30})[[:space:]](.+)$", $M, $Cmd))
{
	include("./lib/commands/wisp.cmd.php");
}
elseif (eregi("^\/(ltr|rtl".(L_CMD_LTR != "" && L_CMD_LTR != "L_CMD_LTR" ? "|".str_replace(",","|",L_CMD_LTR) : "").(L_CMD_RTL != "" && L_CMD_RTL != "L_CMD_RTL" ? "|".str_replace(",","|",L_CMD_RTL) : "").")[[:space:]](.+)?$", $M, $Cmd))
{
	include("./lib/commands/dir.cmd.php");
};
?>
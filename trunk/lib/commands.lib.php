<?php
if (preg_match("/^\/(show|last".(L_CMD_SHOW != "" && L_CMD_SHOW != "L_CMD_SHOW" ? "|".str_replace(",","|",L_CMD_SHOW) : "").")([[:space:]]([[:digit:]]+))?$/i", $M, $Cmd))
{
	include("./lib/commands/show.cmd.php");
}
elseif (preg_match("/^\/(bot".(L_CMD_BOT != "" && L_CMD_BOT != "L_CMD_BOT" ? "|".str_replace(",","|",L_CMD_BOT) : "").")[[:space:]](.{1,30})$/i", $M, $Cmd))
{
	include("./lib/commands/bot.cmd.php");
}
elseif ((preg_match("/^\/(buzz".(L_CMD_BUZZ != "" && L_CMD_BUZZ != "L_CMD_BUZZ" ? "|".str_replace(",","|",L_CMD_BUZZ) : "").")([[:space:]](.+))?$/i", rtrim($M), $Cmd) && strpos($Cmd[2], "~") === false) || preg_match("/^\/(buzz".(L_CMD_BUZZ != "" && L_CMD_BUZZ != "L_CMD_BUZZ" ? "|".str_replace(",","|",L_CMD_BUZZ) : "").")[[:space:]]([^[:space:]]{1,30})([[:space:]](.+))?$/i", rtrim($M), $Cmd))
{
	include("./lib/commands/buzz.cmd.php");
}
elseif (preg_match("/^\/(refresh|reload".(L_CMD_REFRESH != "" && L_CMD_REFRESH != "L_CMD_REFRESH" ? "|".str_replace(",","|",L_CMD_REFRESH) : "").")([[:space:]]([[:digit:]]*))?$/i", $M, $Cmd))
{
	include("./lib/commands/refresh.cmd.php");
}
elseif (preg_match("/^\/(order".(L_CMD_ORDER != "" && L_CMD_ORDER != "L_CMD_BUZZ" ? "|".str_replace(",","|",L_CMD_ORDER) : "").")$/i", $M))
{
	include("./lib/commands/order.cmd.php");
}
elseif (preg_match("/^\/(sort".(L_CMD_SORT != "" && L_CMD_SORT != "L_CMD_SORT" ? "|".str_replace(",","|",L_CMD_SORT) : "").")$/i", $M))
{
	include("./lib/commands/sort.cmd.php");
}
elseif (preg_match("/^\/(timestamp".(L_CMD_TIMESTAMP != "" && L_CMD_TIMESTAMP != "L_CMD_TIMESTAMP" ? "|".str_replace(",","|",L_CMD_TIMESTAMP) : "").")$/i", $M))
{
	include("./lib/commands/timestamp.cmd.php");
}
elseif (C_VERSION > 0 && preg_match("/^\/(join".(L_CMD_JOIN != "" && L_CMD_JOIN != "L_CMD_JOIN" ? "|".str_replace(",","|",L_CMD_JOIN) : "").")[[:space:]]((0|1)[[:space:]])?#(.{1,30})$/i", $M, $Cmd))
{
	include("./lib/commands/join.cmd.php");
}
elseif (preg_match("/^\/(quit|exit|bye".(L_CMD_QUIT != "" && L_CMD_QUIT != "L_CMD_QUIT" ? "|".str_replace(",","|",L_CMD_QUIT) : "").")([[:space:]](.+))?$/i", $M, $Cmd))
{
	include("./lib/commands/quit.cmd.php");
}
elseif (preg_match("/^\/(ignore".(L_CMD_IGNORE != "" && L_CMD_IGNORE != "L_CMD_IGNORE" ? "|".str_replace(",","|",L_CMD_IGNORE) : "").")([[:space:]]\\-)?([[:space:]](.+))?$/i", $M, $Cmd))
{
	include("./lib/commands/ignore.cmd.php");
}
elseif (preg_match("/^\/(!|recall".(L_CMD_RECALL != "" && L_CMD_RECALL != "L_CMD_RECALL" ? "|".str_replace(",","|",L_CMD_RECALL) : "").")$/i", $M, $Cmd) && (isset ($M0) && $M0 != ""))
{
	include("./lib/commands/history.cmd.php");
}
elseif (preg_match("/^\/(kick|boot".(L_CMD_KICK != "" && L_CMD_KICK != "L_CMD_KICK" ? "|".str_replace(",","|",L_CMD_KICK) : "").")[[:space:]]([^[:space:]]{1,30})([[:space:]](.+))?$/i", $M, $Cmd))
{
	include("./lib/commands/kick.cmd.php");
}
elseif (preg_match("/^\/(msg|to".(L_CMD_MSG != "" && L_CMD_MSG != "L_CMD_MSG" ? "|".str_replace(",","|",L_CMD_MSG) : "").")[[:space:]]([^[:space:]]{1,30})[[:space:]](.+)$/i", $M, $Cmd))
{
	include("./lib/commands/priv_msg.cmd.php");
}
elseif (preg_match("/^\/(whois|about".(L_CMD_WHOIS != "" && L_CMD_WHOIS != "L_CMD_WHOIS" ? "|".str_replace(",","|",L_CMD_WHOIS) : "").")[[:space:]](.{1,30})$/i", $M, $Cmd))
{
	include("./lib/commands/whois.cmd.php");
}
elseif (preg_match("/^\/(profile".(L_CMD_PROFILE != "" && L_CMD_PROFILE != "L_CMD_PROFILE" ? "|".str_replace(",","|",L_CMD_PROFILE) : "").")$/i", $M))
{
	include("./lib/commands/profile.cmd.php");
}
elseif (preg_match("/^\/(notify".(L_CMD_NOTIFY != "" && L_CMD_NOTIFY != "L_CMD_NOTIFY" ? "|".str_replace(",","|",L_CMD_NOTIFY) : "").")$/i", $M))
{
	include("./lib/commands/notify.cmd.php");
}
elseif (preg_match("/^\/(promote".(L_CMD_PROMOTE != "" && L_CMD_PROMOTE != "L_CMD_PROMOTE" ? "|".str_replace(",","|",L_CMD_PROMOTE) : "").")[[:space:]](.{1,30})$/i", $M, $Cmd))
{
	include("./lib/commands/promote.cmd.php");
}
elseif (preg_match("/^\/(help|\?".(L_CMD_HELP != "" && L_CMD_HELP != "L_CMD_HELP" ? "|".str_replace(",","|",L_CMD_HELP) : "").")$/i", $M, $Cmd))
{
	include("./lib/commands/help.cmd.php");
}
elseif (preg_match("/^\/(clear".(L_CMD_CLEAR != "" && L_CMD_CLEAR != "L_CMD_CLEAR" ? "|".str_replace(",","|",L_CMD_CLEAR) : "").")$/i", $M, $Cmd))
{
	include("./lib/commands/clear.cmd.php");
}
elseif (preg_match("/^\/(dice".(L_CMD_DICE != "" && L_CMD_DICE != "L_CMD_DICE" ? "|".str_replace(",","|",L_CMD_DICE) : "").")([[:space:]].*)?$/i", $M, $Cmd))
{
	include("./lib/commands/dice.cmd.php");
}
elseif (preg_match("/^\/([1-9][0-9]?)([d])([1-9][0-9]?)$/i", $M, $Cmd) || preg_match("/^\/([1-9][0-9]?)([d])$/i", $M, $Cmd))
{
	include("./lib/commands/dice2.cmd.php");
}
elseif (preg_match("/^\/d([1-9][0-9]?[0-9]?)([t])([1-9][0-9]?)$/i", $M, $Cmd) || preg_match("/^\/d([1-9][0-9]?[0-9]?)$/i", $M, $Cmd))
{
	include("./lib/commands/dice3.cmd.php");
}
elseif (C_SAVE != "0" && preg_match("/^\/(save|export".(L_CMD_SAVE != "" && L_CMD_SAVE != "L_CMD_SAVE" ? "|".str_replace(",","|",L_CMD_SAVE) : "").")([[:space:]]([[:digit:]]*))?$/i", $M, $Cmd) && ($Cmd[3] == "" OR $Cmd[3] > 0))
{
	include("./lib/commands/save.cmd.php");
}
elseif (preg_match("/^\/(size".(L_CMD_SIZE != "" && L_CMD_SIZE != "L_CMD_SIZE" ? "|".str_replace(",","|",L_CMD_SIZE) : "").")([[:space:]]([[:digit:]]+))?$/i", $M, $Cmd))
{
	include("./lib/commands/size.cmd.php");
}
elseif (preg_match("/^\/(announce".(L_CMD_ANNOUNCE != "" && L_CMD_ANNOUNCE != "L_CMD_ANNOUNCE" ? "|".str_replace(",","|",L_CMD_ANNOUNCE) : "").")[[:space:]](.+)?$/i", $M, $Cmd))
{
	include("./lib/commands/announce.cmd.php");
}
elseif (preg_match("/^\/(invite".(L_CMD_INVITE != "" && L_CMD_INVITE != "L_CMD_INVITE" ? "|".str_replace(",","|",L_CMD_INVITE) : "").")([[:space:]](.+))+$/i", $M, $Cmd))
{
	include("./lib/commands/invite.cmd.php");
}
elseif (C_BANISH != "0" && preg_match("/^\/(ban".(L_CMD_BAN != "" && L_CMD_BAN != "L_CMD_BAN" ? "|".str_replace(",","|",L_CMD_BAN) : "").")[[:space:]](\*[[:space:]])?([^[:space:]]{1,30})([[:space:]](.+))?$/i", $M, $Cmd))
{
	include("./lib/commands/banish.cmd.php");
}
elseif (preg_match("/^\/(me".(L_CMD_ME != "" && L_CMD_ME != "L_CMD_ME" ? "|".str_replace(",","|",L_CMD_ME) : "").")[[:space:]](.+)?$/i", $M, $Cmd) || preg_match("/^(:)[[:space:]](.+)?$/i", $M, $Cmd) || preg_match("/^\/(mr".(L_CMD_MR != "" && L_CMD_MR != "L_CMD_MR" ? "|".str_replace(",","|",L_CMD_MR) : "").")[[:space:]](.+)?$/i", $M, $Cmd))
{
	include("./lib/commands/me.cmd.php");
}
// elseif (preg_match("/^\/(away".(L_CMD_AWAY != "" && L_CMD_AWAY != "L_CMD_AWAY" ? "|".str_replace(",","|",L_CMD_AWAY) : "").")$/i", $M)) // if no reason string desired.
elseif (preg_match("/^\/(away".(L_CMD_AWAY != "" && L_CMD_AWAY != "L_CMD_AWAY" ? "|".str_replace(",","|",L_CMD_AWAY) : "").")([[:space:]](.+))?$/i", $M, $Cmd))
{
  include("./lib/commands/away.cmd.php");
}
elseif (preg_match("/^\/(demote".(L_CMD_DEMOTE != "" && L_CMD_DEMOTE != "L_CMD_DEMOTE" ? "|".str_replace(",","|",L_CMD_DEMOTE) : "").")[[:space:]](\*[[:space:]])?(.{1,30})$/i", $M, $Cmd))
{
	include("./lib/commands/demote.cmd.php");
}
elseif (preg_match("/^\/(high".(L_CMD_HIGH != "" && L_CMD_HIGH != "L_CMD_HIGH" ? "|".str_replace(",","|",L_CMD_HIGH) : "").")[[:space:]](.{1,30})$/i", $M, $Cmd))
{
	include("./lib/commands/high.cmd.php");
}
elseif (preg_match("/^\/(img".(L_CMD_IMG != "" && L_CMD_IMG != "L_CMD_IMG" ? "|".str_replace(",","|",L_CMD_IMG) : "").")[[:space:]](.+)?$/i", $M, $Cmd))
{
	include("./lib/commands/img.cmd.php");
}
elseif (preg_match("/^\/(room".(L_CMD_ROOM != "" && L_CMD_ROOM != "L_CMD_ROOM" ? "|".str_replace(",","|",L_CMD_ROOM) : "").")([[:space:]]\*)?([[:space:]].+)$/i", $M, $Cmd))
{
	include("./lib/commands/room.cmd.php");
}
elseif (preg_match("/^\/(topic".(L_CMD_TOPIC != "" && L_CMD_TOPIC != "L_CMD_TOPIC" ? "|".str_replace(",","|",L_CMD_TOPIC) : "").")([[:space:]]\*)?([[:space:]].+)$/i", $M, $Cmd))
{
	include("./lib/commands/topic.cmd.php");
}
elseif (preg_match("/^\/(wisp|whisp".(L_CMD_WISP != "" && L_CMD_WISP != "L_CMD_WISP" ? "|".str_replace(",","|",L_CMD_WISP) : "").")[[:space:]]([^[:space:]]{1,30})[[:space:]](.+)$/i", $M, $Cmd))
{
	include("./lib/commands/wisp.cmd.php");
}
elseif (preg_match("/^\/(ltr|rtl".(L_CMD_LTR != "" && L_CMD_LTR != "L_CMD_LTR" ? "|".str_replace(",","|",L_CMD_LTR) : "").(L_CMD_RTL != "" && L_CMD_RTL != "L_CMD_RTL" ? "|".str_replace(",","|",L_CMD_RTL) : "").")[[:space:]](.+)?$/i", $M, $Cmd))
{
	include("./lib/commands/dir.cmd.php");
}
elseif (preg_match("/^\/(vid|video|play".(L_CMD_VIDEO != "" && L_CMD_VIDEO != "L_CMD_VIDEO" ? "|".str_replace(",","|",L_CMD_VIDEO) : "").")[[:space:]](.+)?$/i", $M, $Cmd))
{
	include("./lib/commands/video.cmd.php");
}
elseif (preg_match("/^\/(tube|youtube|utube".(L_CMD_UTUBE != "" && L_CMD_UTUBE != "L_CMD_UTUBE" ? "|".str_replace(",","|",L_CMD_UTUBE) : "").")[[:space:]](.+)?$/i", $M, $Cmd))
{
	include("./lib/commands/youtube.cmd.php");
}
elseif (preg_match("/^\/(math".(L_CMD_MATH != "" && L_CMD_MATH != "L_CMD_MATH" ? "|".str_replace(",","|",L_CMD_MATH) : "").")[[:space:]](.+)?$/i", $M, $Cmd))
{
	include("./lib/commands/math.cmd.php");
};
?>
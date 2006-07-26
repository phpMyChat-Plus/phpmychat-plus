<?php
if (eregi("^\/(show|last)([[:space:]]([[:digit:]]+))?$", $M, $Cmd))
{
	include("./lib/commands/show.cmd.php");
}
elseif (eregi("^\/bot[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/bot.cmd.php");
}
elseif ((eregi("^\/buzz([[:space:]](.+))?$", $M, $Cmd) && !eregi("~",$Cmd[2])) || eregi("^\/buzz[[:space:]]([^[:space:]]{1,30})([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/buzz.cmd.php");
}
elseif (eregi("^\/refresh([[:space:]]([[:digit:]]*))?$", $M, $Cmd))
{
	include("./lib/commands/refresh.cmd.php");
}
elseif (eregi("^\/order$", $M))
{
	include("./lib/commands/order.cmd.php");
}
elseif (eregi("^\/sort$", $M))
{
	include("./lib/commands/sort.cmd.php");
}
elseif (eregi("^\/timestamp$", $M))
{
	include("./lib/commands/timestamp.cmd.php");
}
elseif (C_VERSION > 0 && eregi("^\/join[[:space:]]((0|1)[[:space:]])?#(.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/join.cmd.php");
}
elseif (eregi("^\/(quit|exit|bye)([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/quit.cmd.php");
}
elseif (eregi("^\/ignore([[:space:]]\\-)?([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/ignore.cmd.php");
}
elseif (eregi("^\/!$", $M, $Cmd) && (isset ($M0) && $M0 != ""))
{
	include("./lib/commands/history.cmd.php");
}
elseif (eregi("^\/kick[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/kick.cmd.php");
}
elseif (eregi("^\/(msg|to)[[:space:]]([^[:space:]]{1,30})[[:space:]](.+)$", $M, $Cmd))
{
	include("./lib/commands/priv_msg.cmd.php");
}
elseif (eregi("^\/whois[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/whois.cmd.php");
}
elseif (eregi("^\/profile$", $M))
{
	include("./lib/commands/profile.cmd.php");
}
elseif (eregi("^\/notify$", $M))
{
	include("./lib/commands/notify.cmd.php");
}
elseif (eregi("^\/promote[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/promote.cmd.php");
}
elseif (eregi("^\/(help|\?)$", $M, $Cmd))
{
	include("./lib/commands/help.cmd.php");
}
elseif (eregi("^\/clear$", $M, $Cmd))
{
	include("./lib/commands/clear.cmd.php");
}
elseif (eregi("^\/dice([[:space:]](.+))?$", $M, $Cmd) || eregi("^\/dice$", $M, $Cmd))
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
elseif (C_SAVE != "0" && eregi("^\/save([[:space:]]([[:digit:]]*))?$", $M, $Cmd) && ($Cmd[2] == "" OR $Cmd[2] > 0))
{
	include("./lib/commands/save.cmd.php");
}
elseif (eregi("^\/announce[[:space:]](.*)?$", $M, $Cmd))
{
	include("./lib/commands/announce.cmd.php");
}
elseif (eregi("^\/invite([[:space:]](.+))+$", $M, $Cmd))
{
	include("./lib/commands/invite.cmd.php");
}
elseif (C_BANISH != "0" && eregi("^\/ban[[:space:]](\*[[:space:]])?(.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/banish.cmd.php");
}
elseif (eregi("^\/me[[:space:]](.*)?$", $M, $Cmd))
{
	include("./lib/commands/me.cmd.php");
}
elseif (eregi("^\/mr[[:space:]](.*)?$", $M, $Cmd))
{
	include("./lib/commands/mr.cmd.php");
}
// elseif (eregi("^\/away$", $M)) // if no reason string desired.
elseif (eregi("^\/away([[:space:]](.+))?$", $M, $Cmd))
{
  include("./lib/commands/away.cmd.php");
}
elseif (eregi("^\/demote[[:space:]](\*[[:space:]])?(.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/demote.cmd.php");
}
elseif (eregi("^\/high[[:space:]](.{1,30})$", $M, $Cmd))
{
	include("./lib/commands/high.cmd.php");
}
elseif (eregi("^\/img[[:space:]](.+)?$", $M, $Cmd))
{
  include("./lib/commands/img.cmd.php");
}
elseif (eregi("^\/room([[:space:]](.+))?$", $M, $Cmd))
{
	include("./lib/commands/room.cmd.php");
}
elseif (eregi("^\/(topic)[[:space:]]([^[:space:]]{1,30})[[:space:]](.+)$", $M, $Cmd))
{
	include("./lib/commands/topic.cmd.php");
}
elseif (eregi("^\/(wisp|whisp)[[:space:]]([^[:space:]]{1,30})[[:space:]](.+)$", $M, $Cmd))
{
	include("./lib/commands/wisp.cmd.php");
};
?>
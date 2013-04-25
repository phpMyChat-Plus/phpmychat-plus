<?php
// File : brazilian_portuguese/localized.tutorial.php - plus version (09.11.2012 - rev.11)
// Original file by Marco Gelli Marchese <mvmcgm@gmail.com>
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

require("./lib/index.lib.php");
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>

<HEAD>
<TITLE>Tutorial em Português para <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?></TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo(${Charset}); ?>">
<STYLE>
A.topLink
{
	text-decoration: underline;
	color: #0000C0;
}

A.topLink:hover, A.topLink:active
{
	color: #FF9900;
	text-decoration: none;
	font-weight: 800;
}

.redText
{
	font-weight: 800;
	color: #FF0000;
}
</STYLE>
</HEAD>

<BODY BGCOLOR="#CCCCFF">

<P></P>
<TABLE BORDER="5" CELLPADDING="5" ALIGN="center">
<TR>
	<TD ALIGN="center"><FONT SIZE="+2" COLOR="GREEN"><B>- Tutorial em português para <?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?> -</FONT><br /><I>&copy; 2012<?php echo((date('Y')>"2012") ? "-".date('Y') : ""); ?> - Traduzido por <a href="mailto: mvmcgm@gmail.com?subject=phpMyChat%20Plus%20translation" onMouseOver="window.status='<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>.'; return true;" title="<?php echo (sprintf(L_CLICKS,L_LINKS_6,L_TRANSLATOR)); ?>" target=_blank>Marco Gelli Marchese</a> - Rio de Janeiro, Brasil.</I></B></TD>
</TR>
</TABLE><br /><br />
<P><A NAME="top"></P>
<TABLE BORDER="3" CELLPADDING="3">
<TR>
	<TD><FONT SIZE="+2">Conteúdos deste tutorial</FONT></TD>
</TR>
</TABLE><br />

<?php
if (C_MULTI_LANG)
{
	?>
	<A HREF="#language" CLASS="topLink">Escolhendo um idioma</A><br />
	<?php
}
?>
<A HREF="#login" CLASS="topLink">Entrando em um Chat</A><br />
<A HREF="#register" CLASS="topLink">Registrando</A><br />
<A HREF="#modProfile" CLASS="topLink">Modificando<?php if (C_SHOW_DEL_PROF) echo("/apagando"); ?> seu perfil</A><br />
<?php
if (C_VERSION == "2")
{
	?>
	<A HREF="#create_room" CLASS="topLink">Criando uma sala</A><br />
	<?php
};
if ($Ver == "H")
{
	?>
	<A HREF="#connection_state" CLASS="topLink">Entendendo o estado de conexão</A><br />
	<?php
};
?>
<A HREF="#sending" CLASS="topLink">Enviando uma mensagem</A><br />
<A HREF="#users_list" CLASS="topLink">Entendendo a lista de usuários</A><br />
<A HREF="#exit" CLASS="topLink">Saindo da sala de Chat</A><br />
<A HREF="#users_popup" CLASS="topLink">Descobrindo quem está no Chat sem estar registrado</A><br />
<P>
<A HREF="#customize" CLASS="topLink">Customizando a visualização do Chat</A><br />
<P>
<A HREF="#commands" CLASS="topLink">Comando e características:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#help" CLASS="topLink">Comando de ajuda</A><br />
<!-- Avatar System Start. -->
<?php
if (C_USE_AVATARS) {
?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#avatars" CLASS="topLink">Avatars</A><br />
<?php
}
?>
<!-- Avatar System End. -->
<?php
if (C_USE_SMILIES)
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#smilies" CLASS="topLink">Emoticons</A><br />
	<?php
};
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#text" CLASS="topLink">Formatando texto</A><br />
	<?php
};
?>
<!-- Color Input Box mod by Ciprian start -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#colors" CLASS="topLink"><?php echo(L_COL_TUT); ?></A><br />
<!-- Color Input Box mod by Ciprian end -->
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#invite" CLASS="topLink">convidando um usuário para se juntar a sua sala</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeroom" CLASS="topLink">Alterando o chat que se encontra</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#changeprofile" CLASS="topLink">Modificando o seu perfil de dentro do Chat</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#recall" CLASS="topLink">Recuperando a última mensagem ou comando que foi feito</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#respond" CLASS="topLink">Respondendo a um usuário específico</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#private" CLASS="topLink">Mensagens privadas</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#actions" CLASS="topLink">Ações</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#ignore" CLASS="topLink">Ignorando outros usuários</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#whois" CLASS="topLink">Obtendo informações públicas de outros usuários</A><br />
<?php
if (C_SAVE != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#save" CLASS="topLink">Salvar mensagens</A><br />
	<?php
};
?>
<P>
<A HREF="#moderator" CLASS="topLink">Comandos especiais de moderadores e/ou administradores:</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#announce" CLASS="topLink">Enviar um anúncio</A><br />
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#kick" CLASS="topLink">Chutando um usuário</A><br />
<?php
if (C_BANISH != "0")
{
	?>
	&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#banish" CLASS="topLink">Banindo um usuário</A><br />
	<?php
};
?>
&nbsp;&nbsp;&nbsp;&nbsp;<A HREF="#promote" CLASS="topLink">Promovendo/Rebaixando um usuário de/para moderador</A><br />
<P>
<hr />
<hr />

<?php
if (C_MULTI_LANG)
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="language"><B>Escolhendo um idioma:</B></A></FONT>
	<P>
	Você pode escolher um idioma dentre os quais <?php echo(APP_NAME); ?> foram traduzidos, clicando em uma das bandeiras na página inicial. No exemplo abaixo, o usuário selecionou o Françês:
	<P ALIGN="center">
	<IMG SRC="images/tutorials/flags.gif" HEIGHT="44" WIDTH="424" ALT="Bandeiras para seleção de idioma" TITLE="Bandeiras para seleção de idioma">
	<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<!-- Hint: Use a Ctrl+H and find/replace "Voltar ao topo" with your expression in this entire document -->
	<hr />
	<?php
}
?>

<P>
<FONT SIZE="+1"><A NAME="login"><B>Login:</B></A></FONT>
<P>
Se você já está registrado, apenas escreva seu nome de usuário e senha, escolha o Chat que deseja entrar e aperte o botão: ’<?php echo(L_SET_14); ?>’ .<br />
<?php
if (C_REQUIRE_REGISTER)
{
	?>
<P>
	Caso contrário, você pode se <A HREF="#register">registrar</A> primeiro.
	<?php
}
else
{
	?>
<P>
	Caso contrário você pode se <A HREF="#register">registrar</A> ou simplesmente escolher a sala a que deseja entrar, porém se apelido não será reservado(outro usuário poderá utilizar seu apelido assim que você sair do Chat).
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="register"><B>Para registrar:</B></A></FONT>
<P>
Se você ainda não estiver registrado<?php if (!C_REQUIRE_REGISTER) echo("e gostaria de"); ?>, por favor escolha a opção "registrar". Uma pequena janela aparecerá em sua tela.
<P>
<UL>
	<LI>Primeiro crie um nome de usuário <?php if (!C_EMAIL_PASWD) echo(" e uma senha"); ?> e digite nos espaços apropriados. O nome de usuário é o nome que automaticamente aparecerá em uma sala de Chat. Não pode conter espaços, vírgulas ou contra barras(\).
<?php if (C_NO_SWEAR) echo(" Não pode conter \"xingamentos\" ou palavras obscenas."); ?>
	<LI>Segundo, por favor informe o seu primeiro nome, último nome e seu endereço de e-mail. Para se registrar, todas essas informações são necessárias. A informação de sexo é opcional.
	<LI>Se você possuir uma página na web, poderá inserir no campo de URL.
	<LI>O campo de idioma, ajuda outros usuários a saber qual(is) idioma(s) você consegue entender.
	<LI>Por último, se você deseja liberar seu endereço de e-mail para todos visualizarem, por favor marque a caixa perto do "<?php echo(L_REG_33); ?>". Caso contrario, simplesmente deixe desmarcado.
<LI>Então aperte o botão <?php echo(L_REG_3); ?> e sua conta será criada. Dependendo das preferências do administrador, você talvez tenha que esperar a aprovação dele. De qualquer forma, você receberá um e-mail com novas instruções. Se deseja parar (a qualquer momento) de registrar, apenas aperte o botão <?php echo(L_REG_25); ?>.
</UL>
<P>
<A NAME="modProfile"></A>Lembre-se que, usuários registrados poderão modificar <?php if (C_SHOW_DEL_PROF) echo("/apagar"); ?> os seus perfis clicando no <?php echo((!C_SHOW_DEL_PROF ? "link apropriado" : "links apropriados")); ?>.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<?php
if (C_VERSION == "2")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="create_room"><B>Para criar uma sala:</B></A></FONT>
	<P>
	Usuários registrados podem criar salas, sendo que, salas privadas, só poderão ser acessadas por usuários que saibam o seu nome e nunca tenham exibido exceto para usuários que estão dentro.<br />
	<P>
	Os nomes de sala, não podem conter vírgula ou contra barra(\).<?php if (C_NO_SWEAR) echo(" Não pode conter \"xingamentos\"."); ?>
	<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
	<P>
	<hr />
	<?php
};
if ($Ver == "H")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="connection_state"><B>Compreendendo o estado de conexão:</B></A></FONT>
	<P>
	Um aviso representando o seu estado de conexão é mostrado no canto superior direito de sua tela, ele pode estar em três estados:
	<P>
	<UL>
		<LI><IMG SRC="images/connectOff.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Sem conexão" TITLE="Sem conexão"> quando nenhuma conexão é necessária ;
		<LI><IMG SRC="images/connectOn.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Conectando" TITLE="Conectando">quando está sendo feita uma conexão;
		<LI><IMG SRC="images/connectError.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="Falha de conexão" TITLE="Falha de conexão"> quando falhou ao fazer uma conexão.
	</UL>
	<P>
	No terceiro caso, clicar no "botão" vermelho, efetuará uma nova tentativa de conexão.
	<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="sending"><B>Enviando mensagens:</B></A></FONT>
<P>
Para escrever uma mensagem em uma sala de Chat, digite na caixa de texto localizada na esquerda inferior da página, e pressione "Enter/Return" para enviá-la.. Mensagens de todos os usuários aparecem na caixa de Chat.<br />
<?php if (C_NO_SWEAR) echo("Note que \"xingamentos\" são apagados das mensagens."); ?>
<P>
Você pode alterar a cor do texto de suas mensagens, escolhendo uma cor nova na lista de opções a direita da caixa de texto.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_list"><B>Compreendendo a lista de usuários (não para usuários de janelas pop-up):</B></A></FONT>
<P>
Duas regras básicas foram definidas para a lista de usuários:
<UL>
	<LI>um pequeno ícone que mostra o sexo se encontra a esquerda do nome de uma pessoa registrada (clicando nele inicia o <A HREF="#whois">pop-up Quem é</A> para aquele usuário), se não for registrado, o usuário não terá nada alem de um espaço em branco;<br />
	<LI>os nomes de administradores ou moderadores, está sempre em itálico.
</UL>
<P><I>Por exemplo</I>, na foto abaixo, você pode concluir que:
<TABLE BORDER=0 CELLSPACING=10>
<TR>
	<TD>
		<IMG SRC="images/tutorials/usersList.gif" WIDTH=128 HEIGHT=145 BORDER=0 ALT="Lista de usuários" TITLE="Lista de usuários">
	</TD>
	<TD>
	<UL>
		<LI>Nicolas é o administrador ou um dos moderadores da sala phpMyChat;<br /><br />
		<LI>alien (que não sabemos o sexo), Jezek2 e Caridad são usuários registrados sem nenhuma "poder" extra na sala phpMyChat ;<br /><br />
		<LI>lolo é um simples usuário não registrado.
	</UL>
	</TD>
</TR>
</TABLE>
<P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="exit"><B>Saindo de uma sala de Chat:</B></A></FONT>
<P>
Para sair de uma sala de Chat, simplesmente clique uma vez na <?php echo (EXIT_LINK_TYPE) ? "<img src='localization/$L/images/exitdoor.gif' border=0 alt='".L_EXIT."' title='".L_EXIT."'> imagem" : '"'.L_EXIT.'" link'; ?>, no canto superior direito da sala. Alternativamente, você pode escrever o seguinte comando em sua caixa de texto:<br />
/exit<br />
/bye<br />
/quit<br />
Estes comandos podem ser completados como uma mensagem que você deseja enviar ao sair da sala de Chat.
<I>Por Exemplo:</I> /quit Te vejo em breve!
<P>
vai ser enviado a mensagem "Te vejo em breve!" no quadro principal e então sair.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="users_popup"><B>Sabendo quem está no chat, sem estar conectado:</B></A></FONT>
<P>
Você pode clicar no link que mostra o número de usuários conectados, na página inicial, ou se você estiver em uma conversa de Chat, clique na imagem <IMG SRC="images/popup.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo (L_DETACH); ?>" TITLE="<?php echo (L_DETACH); ?>"> no canto superior direito da tela para abrir uma janela independente, que irá mostrar a lista de usuários conectados e suas respectivas salas, praticamente em tempo real.<br />
O título desta janela possui os nomes de usuário, se forem menos de três, os números de usuários e as salas abertas.
<P>
Clicando no ícone <IMG SRC="images/sound.gif" WIDTH=13 HEIGHT=13 BORDER=0 ALT="<?php echo(L_BEEP); ?>" TITLE="<?php echo(L_BEEP); ?>"> no topo desta janela pop-up, vai ligar/desligar os sons de aviso.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />
<hr />

<P>
<FONT SIZE="+1"><A NAME="customize"><B>Personalizar a aparência do Chat:</B></A></FONT>
<P>
Existem várias formas diferentes de personalizar a aparência do Chat. Para alterar as opções, simplesmente digite o comando apropriado na caixa de texto, e pressione Enter/Return.
<P>
<UL>
	<?php
	if ($Ver == "H")
	{
		?>
		<LI>O <B>comando Clear</B> permite que você limpe todo a tela principal de chat e mostre as últimas 5 mensagens enviadas apenas.<br />Digite "/clear" sem aspas.
		<P>
		<?php
	}
	else
	{
		?>
		<LI>O <B>Comando Order</B> permite que você altere a posição de novas mensagens no chat (novas em cima, ou novas embaixo) .<br />Digite "/order" sem aspas.
		<P>
		<?php
	};
	?>
	<LI>O <B>Comando Notify</B> permite que você ligue/desligue a opção de visualizar caso algum usuário entre ou saia da sala de Chat. Por padrão, esta opção está <?php echo(C_NOTIFY ? "ligada" : "desligada"); ?> e os avisos<?php echo(C_NOTIFY ? "irão" : "não irão"); ?> ser vistos.<br />Digite"/notify" sem aspas.
	<P>
	<LI>O <B>Comando Timestamp</B> permite que você ligue/desligue a opção de aparecer a hora de envio da mensagem no começo de cada mensagem, e a hora do servidor na barra de Status. Por padrão, a opção está <?php echo(C_SHOW_TIMESTAMP ? "ligada" : "desligada"); ?>.<br />Digite "/timestamp" sem aspas.
	<P>
	<LI>O <B>Comando Refresh</B> permite que você ajuste a velocidade com que cada mensagem postada é atualizada na tela. O padrão atual é de <?php echo(C_MSG_REFRESH); ?> segundos. Para alterar esta taxa de atualização use "/refresh n" sem aspas, onde n é o tempo em segundos da nova taxa.
	<P>
	<I>Por exemplo:</I> /refresh 5
	<P>
	Irá alterar a velocidade para 5 segundos. *Cuidado, se for abaixo de 3segundos, acontece uma pausa de atualização (útil quando você deseja ler muitas mensagens antigas, sem ser interrompido ou perturbado).*
	<P>
	<?php
	if ($Ver == "L")
	{
		?>
 <LI>O <B>Comando Show</B> permite que você ajuste o número de mensagens visualizadas em sua tela. Para alterar o número padrão, digite "/show n" sem aspas, onde n é o número de mensagens.
		<P>
		<I>Por exemplo:</I> /show 50
		<P>
		Fará com que as 50 mensagens mais recentes sejam visualizadas, uma barra de rolagem aparecerá do lado direita da caixa de mensagens.
		<?php
	}
	else
	{
		?>
		<LI>Os <B>Comandos Show e Last</B> permitem que você limpe e mostre apenas as últimas <I>n</I> mensagens postadas. Digite "/show n" ou "/last n" sem aspas, aonde n é o número das mensagens que deseja visualizar.
		<P>
		<I>Por exemplo:</I> /show 50 ou /last 50
		<P>
		Limpará o quadro de mensagem e apenas mostrará as 50 mais novas mensagens recebidas. Se todas as mensagens não puderem ser visualizadas, uma barra de rolagem irá aparecer no cando direito de sua caixa de mensagens.
		<?php
	};
	?>
	</UL>
	<P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
	<P>
<hr />
<hr />
<P>
<FONT SIZE="+2"><A NAME="commands"><B><U>Comandos e Recursos</U></B></A></FONT>
<P>

<FONT SIZE="+1"><A NAME="help"><B>Comando de ajuda:</B></A></FONT>
<P>
Uma vez dentro de uma sala de chat, você pode iniciar uma janela de ajuda ao clicar na imagem <IMG SRC="localization/<?php echo($L); ?>/images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" TITLE="<?php echo(L_HLP); ?>"> que se encontra logo antes da caixa de mensagem. Você também pode digitar o <B>comando "/help" ou "/?"</B>.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<P>
<!-- Avatar System Start. -->
<?php
If (C_USE_AVATARS) {
?>
	<hr />
	<FONT SIZE="+1"><A NAME="avatars"><B>Avatars:</B></A></FONT>
<P>Avatars são ícones de imagens gráficas que representam as pessoas. Apenas usuários registrados pode alterar seus avatars. Usuários registrados podem abrir o seu perfil (veja o comando <A HREF="#changeprofile">/profile</A> ) e clicar em sua foto Avatar para selecionar uma imagem do menu de imagens, ou digitar uma URL para a imagem desejada, disponível em qualquer lugar da internet (apenas imagens publicamente acessíveis). Imagens devem ser do tipo .gif, .jpg, etc e com 32 x 32pixels para serem melhor visualizadas..
<P>Ao clicar em um avatar de uma pessoa, fará com que uma janela pop-up apareça com o perfil desta pessoa (veja o comando <A HREF="#whois">/whois</A>).
Clicando em seu próprio avatar, te direciona ao seu perfil (o mesmo que utilizar /profile) se você for registrado. Se não for registrado, um alerta te encorajando a se cadastrar será mostrado.
<P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<?php
}
?>
<!-- Avatar System End. -->
<hr />

<?php
if (C_USE_SMILIES)
{
	include("./lib/smilies.lib.php");
	$Nb = count($SmiliesTbl);
	$ResultTbl = Array();
	DisplaySmilies($ResultTbl,$SmiliesTbl,$Nb,"tutorial");
	unset($SmiliesTbl);
	?>
	<FONT SIZE="+1"><A NAME="smilies"><B>Emoticons:</B></A></FONT>
	<P>Você pode postar ícones espressivos dentro de suas mensagens. Veja abaixo o código que você deve digitar para obter um destes emoticons.
	<P>
	<I>Por exemplo</I>, enviar um texto "Hi Jack :)" sem aspas, irá mostrar <B>Hi Jack</B> <IMG SRC="images/smilies/smile1.gif" WIDTH=15 HEIGHT=15 ALT=":)" TITLE=":)"> no chat principal.
	<P ALIGN="center">
	<TABLE BORDER=0 CELLPADDING=3 CELLSPACING=5>
	<?php
	$i = "0";
	$Nb = count($ResultTbl);
	while($i < $Nb)
	{
		if ($i > 0) echo("\t");
		echo("<TR VALIGN=\"BOTTOM\">\n");
		echo("$ResultTbl[$i]");
		echo("\t</TR>\n\t<TR>\n");
		$i++;
		echo("$ResultTbl[$i]");
		echo("\t</TR>\n");
		$i++;
	};
	unset($ResultTbl);
	?>
	</TABLE>
	<P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
	<P>
	<hr />
	<?php
};

if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<FONT SIZE="+1"><A NAME="text"><B>Formatação de textos:</B></A></FONT>
	<P>
	Textos podem estar, em negrito, itálico, sublinhados. Basta estar dentro das seguintes tag HTML: &LT;B&GT; &LT;/B&GT, &LT;I&GT; &LT;/I&GT; ou &LT;U&GT; &LT;/U&GT .
	<P>
	<I>Por exemplo</I>, &LT;B&GT;esse texto &LT;/B&GT; irá produzir <B>esse texto</B>.
	<P>
	Para criar um hyperlink para um endereço e-mail ou URL, digite o endereço (sem tags HTML). Os hyperlinks são criados automaticamente.
	<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
	<P>
	<P>
	<hr />
	<?php
};
?>

<!-- Color Input Box mod by Ciprian start -->
<P>
<FONT SIZE="+1"><A NAME="colors"><B><U><?php echo(L_COL_TUT); ?></U></B></A></FONT>
<P>
<b><?php echo(L_COL_HELP_SUB1); ?></b><br /><?php echo(L_COL_HELP_P1); ?><br /><br />
</P>
<P>
<b><?php echo(L_COL_HELP_SUB2); ?></b><br /><?php echo(L_COL_HELP_P2); ?><br /><br /><center><?php echo(COLOR_LIST); ?></center><br /><?php echo(L_COL_HELP_P2a); ?><br /><br />
</P>
<P>
<b><?php echo(L_COL_HELP_SUB3); ?></b><br />
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php if (COLOR_FILTERS) echo("a) COLOR_FILTERS = <b>".(COLOR_FILTERS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".(COLOR_ALLOW_GUESTS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />c) COLOR_NAMES = <b>".(COLOR_NAMES == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<?php if (COLOR_FILTERS) echo("<u>".L_COLOR_HEAD_SETTINGSa."</u> ".L_WHOIS_ADMIN." = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, ".L_WHOIS_MODERS." = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, ".L_WHOIS_OTHERS." = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>."); else echo("<u>".L_COLOR_HEAD_SETTINGSb."</u> <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.") ?><br />
<u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("<font color=".COLOR_CA.">".L_WHOIS_ADMIN); elseif ($CookieStatus == "t") echo("<font color=".COLOR_CA.">".L_WHOIS_TOPMOD); elseif ($CookieStatus == "m") echo("<font color=".COLOR_CM.">".L_WHOIS_MODER); else echo("<font color=".COLOR_CD.">".L_WHOIS_GUEST); echo("</font>");?></b>.<br /><?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?>
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<hr />
<!-- Color Input Box mod by Ciprian end -->
<P>
<FONT SIZE="+1"><A NAME="invite"><B>Convide alguém a se juntar ao sua sala de Chat atual:</B></A></FONT>
<P>
Você pode usar o <B>comando invite</B> para convidar um usuário a se juntar a você na sala de Chat.
<P>
<I>Por exemplo:</I> /invite Jack
<P>
Enviará uma mensagem privada para Jack, sugerindo a ele que se junte a você em sua sala atual. Esta mensagem possui o nome da sala, e seu nome aparece como um link.
<P>
Obs: Você pode escrever mais de um nome de usuário no comando (Ex: "/invite Jack,Helen,Alf"), eles tem que estar separados por vírgula(,) e sem espaços.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeroom"><B>Alternando salas:</B></A></FONT>
<P>
A lista à direita da tela, mostra uma lista de salas e de usuários presentes naquela sala. Para trocar de sala, você só precisa clicar uma vez no nome da sala em questão. Salas vazias não irão aparecer nesta lista. Você pode mover para outra sala digitando o <B>comando "/join #nome da sala"</B> sem aspas.
<P>
<I>Pro exemplo:</I> /join #Sala vermelha<P>
Te moverá para a sala "Sala vermelha".
<?php
if (C_VERSION == "2")
{
	echo(!C_REQUIRE_REGISTER ? "<P>Se você for um usuário cadastrado, você" : "<br /><P>Você");
	?>
	pode também criar uma nova sala com este comando, mas você deve especificar qual o tipo da sala (0 para privada e 1 para pública sendo que 1 é o padrão).
	<P>
	<I>Por exemplo:</I> /join 0 #minha sala
	<P>
	Criará uma nova sala privada (assumindo que uma sala publico com mesmo nome, ainda não exista) chamada "minha sala" e te redirecionado para dentro dela.
	<P>
	Nomes de sala não podem conter vírgulas ou contra barras(\).<?php if (C_NO_SWEAR) echo(" Não pode conter \"xingamentos\"."); ?>
	<?php
}
?>
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="changeprofile"><B>Modificando o seu próprio perfil de dentro do chat:</B></FONT>
<P>
O <B>comando Profile</B> cria uma janela pop-up separada, na qual você pode editar/modificar o seu perfil de usuário, porém não podem ser alterados o nome de usuário e senha (para isto, é necessário utilizar o link da página inicial).<br />Digite /profile
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="recall"><B>Recordando a última mensagem ou comando que você enviou:</B></FONT>
<P>
O <B>comando !</B> retorna a última mensagem ou comado que você enviou.<br />Digite /!
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="respond"><B>Respondendo um usuário específico:</B></FONT>
<P>
Clicando uma vez no nome de outro usuário em sua lista (a direita da tela), fará com que o nome de usuário deles ("usuário>") apareça em sua caixa de texto. Este recurso facilita demonstrar a direção do envio de mensagens, em um chat público, talvez como resposta de algo que ele ou ela tenha enviado recentemente.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="private"><B>Mensagens privadas:</B></A></FONT>
<P>
Para enviar uma mensagem privada para um usuário que divide a mesma sala que você, digite o <B>comando "/msg usuário mensagem" ou "/to usuário mensagem"</B> sem aspas.
<P>
<I>Por exemplo, se Jack é o nome de usuário:</I> /msg Jack Oi, como vai?
<P>
Essa mensagem irá ser mostrada para o Jack e você mesmo, mas não para outros usuários desta sala.
<P>
Quando a funcionalidade PM está ativa, é possível também enviar mensagens particulares para usuários em salas diferentes, utilizando o <B>commandp "/wisp nome de usuário mensagem"</B> sem aspas.
<P>
<?php
if (!C_PRIV_POPUP)
{
?>
Clicando em cima de um nome de usuário, na quadro principal, vai adicionar automaticamente o comando /to ou /wisp no campo de mensagens.
<?php
}
else
{
?>
Clicando em cima de um nome de usuário, na quadro principal, abrirá automaticamente o comando /to ou /wisp em uma janela pop-up privada. Esperando que você digite a sua mensagem e pressione ENTER para enviar. As respostas que você receber serão automaticamente abertas in janelas novas.
<?php
}
?>
<P>
Note que: quando as pop-ups de PM estão ativas (tanto nas opções de chat como em seu perfil), você pode rever todas as mensagens particulares recebidas offline desde a última vez que você estava logado no chat ou enquanto você botou seu estado como "ausente", todas as novas mensagens offline enviadas a você serão abertas em uma janela pop-up. Você pode responder uma por uma, pela mesma janela. Sendo que esta funcionalidade só está disponível para usuários registrados.<br />
<P>
<u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php echo("a) ENABLE_PM = <b>".(C_ENABLE_PM == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) PRIV_POPUP = <b>".(C_PRIV_POPUP == 1 ? L_ENABLED : L_DISABLED)."</b>."); ?>
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="actions"><B>Ações:</B></A></FONT>
<P>
Para descrever o que você está fazendo, use o <B>comando "/me ação"</B> sem espaços.
<P>
<I>Por exemplo:</I> Se Jack enviar a mensagem "/me está bebendo café." a mensagem aparecerá assim: "<B>* Jack</B> está bebendo café".
<P>
Como uma variação deste comando, existe o <B>comando /mr</B> disponível, o que também irá colocar o título do gênero na frente do nome de usuário.
<P>
<I>Por exemplo:</I> Se Jack enviar a mensagem "/mr está vendo TV" na caixa de mensagem mostrará: "<B>* <?php echo(sprintf(L_HELP_MR, "Jack")); ?></B> está vendo TV".
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />
<P>
<FONT SIZE="+1"><A NAME="ignore"><B>Ignorando outros usuários:</B></A></FONT>
<P>
Para ignorar todos as mensagens de um determinado usuário, digite o <B>comando "/ignore nome do usuário"</B> sem aspas.
<P>
<I>Por exemplo:</I> /ignore Jack
<P>
Daquele momento em diante, nenhuma mensagem será recebida em sua tela do usuário Jack.
<P>
Para ver a list dos usuários quer foram ignorados, digite o <B>comando "/ignore"</B> sem aspas.
<P>
Para voltar a receber mensagens de um usuário ignorado, digite o <B>comando "/ignore – nome do usuário"</B> sem aspas, onde"-" é um sinal de menos.<P>
<P>
<I>Por exemplo:</I> /ignore - Jack
<P>
Agora, todas as mensagens enviadas por Jack, serão novamente mostradas em sua tela, incluindo as mensagens enviadas antes de você utilizar este comando.<br />
Se não for especificado um nome de usuário após o sinal de menos, a sua "lista de ignorados" será apagada.
<P>
Obs: Você pode botar mais de um nome de usuário em seu comando ignore (Ex: "/ignore Jack,Helen,Alf" ou "/ignore - Jack,Alf"). Eles devem ser separados por vírgula(,) e sem espaços.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="whois"><B>Conseguindo informações sobre Usuários:</B></A></FONT>
<P>
Para visualizar informações públicas sobre um usuário, digite o <B>comando "/whois nome do usuário"</B> sem aspas.
<P>
<I>Por exemplo:</I> /whois Jack
<P>
Sendo ’Jack’ um nome de usuário. Este comando irá criar uma janela pop-up separada que mostrará todas as informações públicas que estiverem disponíveis sobre este usuário Utilize o seu próprio nome para ver como o seu perfil é mostrado para outros usuários.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<?php
if (C_SAVE != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="save"><B>Salvando mensagens:</B></A></FONT>
	<P>
	Para exportar mensagens (sem contar com notificações) para um arquivo html local, digite o <B>comando "/save n"</B> sem aspas.
	<P>
	<I>Por exemplo:</I> /save 5
	<P>
	Aonde ’5’ é o número de mensagens que deseja salvar, se ’n’ não for especificado, todas as mensagens enviadas para a sala atual serão salvas.
	<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
	<P>
	<hr />
	<?php
};
?>
<hr />


<P>
<FONT SIZE="+2"><A NAME="moderator"><B><U>Comandos de administradores e/ou moderadores:</U></B></A></FONT>
<P>
<FONT SIZE="+1"><A NAME="announce"><B>Enviar um anúncio:</B></A></FONT>
<P>
O administrador pode enviar um anúncio para todas as salas e todos os usuários logados, ao mesmo tempo, com o <B>comando /announce</B>.
<P>
<I>Por exemplo: /announce O sistema de chat vai entrar em manutenção hoje à noite as 20h.</I>
<P>
Existe ou anúncio útil, como o comando para chats role-play; o administrador ou moderador da sala pode enviar um anúncio para todos os usuário em uma determinada sala com o <B>comando /room</B>.
<P>
<I>Por exemplo: /room O encontro começa as 15h.</I> ou <I>/room * O encontro começa as 15h na Sala da administradores.</I>
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<P>
<FONT SIZE="+1"><A NAME="kick"><B>Chutando um usuário:</B></FONT>
<P>
Moderadores podem chutar um usuário e administradores podem chutar usuários e moderadores com o <B>comando /kick</B>. Exceto para o administrador, o usuário chutado deve estar na sala atual.
<P>
<I>Por exemplo</I>, Se Jack é o nome do usuário que será chutado: <I>/kick Jack</I> ou <I>/kick Jack motivo</I>. O "motivo" pode ser qualquer texto, ex: "por spam!".
<P>
Se utilizar um * no lugar do nome, (<I>/kick * <?php echo(L_HELP_REASON); ?></I>), o comando irá chutar todos os usuários sem poder presentes na sala (apenas convidados e usuários registrados. Isso é útil quando a conexão do servidor está tendo problemas e todas as pessoas precisam atualizar a página, No segundo caso, <I><?php echo(L_HELP_REASON); ?></I> é recomendado escrever o motivo dos usuários serem chutados.
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
<hr />

<?php
if (C_BANISH != "0")
{
	?>
	<P>
	<FONT SIZE="+1"><A NAME="banish"><B>Banir um usuário:</B></A></FONT>
	<P>
	Moderadores podem banir usuários e administradores podem banir usuários e moderadores com o <B>comando /ban</B>.<br />
	O administrador pode banir usuários de outras salas, ele pode também banir para sempre e de um chat como um todo, com o ’<B>*</B>’ sendo utilizado na frente do nome do usuário.
	<P>
	<I>Por exemplo</I>, Se Jack é o nome do usuário a ser banido: <I>/ban Jack</I>, <I>/ban * Jack</I>, <I>/ban Jack motivo</I> ou <I>/ban * Jack motivo</I>. O "motivo" pode ser qualquer texto (Ex: "por spam!").
	<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
	<P>
	<hr />
	<?php
};
?>

<P>
<FONT SIZE="+1"><A NAME="promote"><B>Promover e rebaixar um usuário de/para moderador:</B></A></FONT>
<P>
Moderadores e administradores podem promover outro usuário para moderador com o <B>comando /promote</B>.
<P>
<I>Por exemplo</I>, Se Jack é o nome do usuário a ser promovido: <I>/promote Jack</I>
<P>
Apenas administradores tem acesso a opção oposta (reduzir um moderador para um simples usuário) usando o <B>comando /demote</B>.
<P>
<I>Por exemplo:</I>, Se Jack é o nome do moderador a ser rebaixado: <I>/demote Jack</I> ou <I>/demote * Jack</I> (irá rebaixar ele na sala atual ou em todos as salas).
<br /><P ALIGN="right"><A HREF="#top">Voltar ao topo</A></P>
<P>
</BODY>
</HTML>
<?php
?>

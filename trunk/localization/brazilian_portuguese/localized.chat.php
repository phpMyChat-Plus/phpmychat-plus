<?php
// File : brazilian_portuguese/localized.chat.php - plus version (03.02.2013 - rev.47)
// Translation by Marco Gelli Marchese <mvmcgm@gmail.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Mensagens são deletadas após %s %s");	// X hours/hour
define("L_WEL_2", "e usuários inativos após %s %s");	// Y minutes/minute

define("L_CUR_1", "No momento, ");
define("L_CUR_1a", "existem");
define("L_CUR_1b", "existem");
define("L_CUR_2", "no chat");
define("L_CUR_3", "Usuários na sala de chat neste momento");
define("L_CUR_4", "usuários em salas privadas");
define("L_CUR_5", "Usuários visualizando<br />(monitorando esta página):");	// means break (next row)

define("L_SET_1", "Por favor, escolha...");
define("L_SET_2", "Usuário");
define("L_SET_3", "o número de mensagens a serem mostradas");
define("L_SET_4", "o intervalo entre cada atualizaçăo");
define("L_SET_5", "Escolha uma sala de chat ...");
define("L_SET_6", "Salas padrăo");
define("L_SET_7", "Faça sua escolha ...");
define("L_SET_8", "Salas públicas criadas por usuários");
define("L_SET_9", "Crie a sua própria sala");
define("L_SET_10", "pública");
define("L_SET_11", "privada");
define("L_SET_12", ""); //sala
define("L_SET_13", "Agora, é só");
define("L_SET_14", "conversar");
define("L_SET_15", "Salas privadas padrão");
define("L_SET_16", "Salas privadas criadas por usuários");
define("L_SET_17", "Escolha seu avatar");
define("L_SET_18", "Marque esta página como um dos seus Favoritos: aperte \"Ctrl+D\".");
define("L_SET_19", "Lembre-se de mim");

define("L_SRC", "está disponível gratuitamente em");

define("L_SEC", "segundo");
define("L_SECS", "segundos");
define("L_MIN", "minuto");
define("L_MINS", "minutos");
define("L_HOUR", "hora");
define("L_HOURS", "horas");
define("L_DAY", "dia");
define("L_DAYS", "dias");

// registration stuff:
define("L_REG_1", "Senha");
define("L_REG_2", "Gerenciamento de contas");
define("L_REG_3", "Registrar");
define("L_REG_4", "Editar seu perfil");
define("L_REG_5", "Apagar usuário");
define("L_REG_6", "Registro de usuário");
define("L_REG_7", "somente quando for registrado");
define("L_REG_8", "E-mail");
define("L_REG_9", "Você foi registrado com sucesso");
define("L_REG_10", "Voltar");
define("L_REG_11", "Editando");
define("L_REG_12", "Modificando detalhes de usuário");
define("L_REG_13", "Deletando usuário");
define("L_REG_14", "Login");
define("L_REG_15", "Log In");
define("L_REG_16", "Modificar");
define("L_REG_17", "Seus detalhes foram modificados.");
define("L_REG_18", "Você foi chutado da sala pelo moderador.");
define("L_REG_18a", "Você foi chutado da sala pelo moderador.<br />Motivo: %s");	// %s is the actual reason (e.g. "for spamming")
define("L_REG_19", "Você realmente quer ser removido?");
define("L_REG_20", "Sim");
define("L_REG_21", "Você foi removido.");
define("L_REG_22", "Năo");
define("L_REG_25", "Fechar");
define("L_REG_30", "Nome");
define("L_REG_31", "Sobrenome");
define("L_REG_32", "Website");
define("L_REG_33", "mostrar e-mail nas informações públicas de perfil");
define("L_REG_34", "Editando detalhes do usuário");
define("L_REG_35", "Administraçăo");
define("L_REG_36", "Localização/País");
define("L_REG_37", "Os campos com um <span class=\"error\">*</span> precisam ser completados.");
define("L_REG_39", "A sala que você estava, foi removida pelo administrador.");
define("L_REG_43", "confidencial"); // Confidential, Secret, Not telling
define("L_REG_44", "casal"); // refers to gender as a pair "man and woman" (couple, pair, family)
define("L_REG_45", "Sexo");
define("L_REG_46", "masculino");
define("L_REG_47", "feminino");
define("L_REG_48", "não especificado");
define("L_REG_49", "Registro obrigatório!");
define("L_REG_50", "Registro suspenso!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Suas configuraçőes para entrar no chat");
define("L_EMAIL_VAL_2", "Bem-vindo ao nosso servidor de chat.");
define("L_EMAIL_VAL_Err", "Erro interno, por favor avise o administrador: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Sua senha foi enviada para o seu e-mail.<br />Você pode alterar sua senha em sua página de login.\"".L_REG_4."\".");
define("L_EMAIL_VAL_PENDING_Done", "Seus dados registrados foram enviados para análise");
define("L_EMAIL_VAL_PENDING_Done1", "você receberá uma senha, logo após sua conta seja aprovada pelo administrador.");
define("L_EMAIL_VAL_3", "Registro pendente para %s");
define("L_EMAIL_VAL_31", "Parabéns! Seus dados de registro já foram analizados e aprovados!");
define("L_EMAIL_VAL_32", "Este é seu dado de registro para %s em %s:"); //chat name at chaturl
define("L_EMAIL_VAL_4", "Você registrou esta conta para %s em %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "Você acabou de mudar informações importantes para %s em %s (conta afetada: %s)."); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "Sua - %s – detalhes da conta para %s"); //username – chatname
define("L_EMAIL_VAL_5", "Seu - %s – detalhes da conta para %s"); //username - chatname
define("L_EMAIL_VAL_51", "Sua - %s – detalhes da conta atualizados para %s"); //username – chatname
define("L_EMAIL_VAL_51", "Seu - %s - detalhes da conta atualizados para %s"); //username - chatname
define("L_EMAIL_VAL_6", "Registrado em %s");
define("L_EMAIL_VAL_61", "Atualizado em %s");
define("L_EMAIL_VAL_7", "Abaixo é o seu %s informação de detalhes de conta:"); //username
define("L_EMAIL_VAL_8", "Salve este e-mail, para referências futuras.\n Por favor a torne segura e não divida estes os dados.\nObrigado por se juntar a nós! Aproveite!");
define("L_EMAIL_VAL_81", "Você pode alterar a senha em sua página de login \"".L_REG_4."\".");

// admin stuff
define("L_ADM_1", "%s năo é mais moderador desta sala.");
define("L_ADM_2", "Vocę năo é mais um usuário registrado.");

// error messages
define("L_ERR_USR_1", "Este nick já está sendo usado. Por favor escolha outro.");
define("L_ERR_USR_2", "Vocę deve escolher um nick.");
define("L_ERR_USR_3", "Este usuário já está registrado.<br />Por favor, digite a senha correta ou escolha outro.");
define("L_ERR_USR_4", "Vocę digitou a senha errada.");
define("L_ERR_USR_5", "Vocę precisa escolher um usuário.");
define("L_ERR_USR_6", "Vocę precisa fornecer uma senha.");
define("L_ERR_USR_7", "Vocę precisa fornecer um e-mail.");
define("L_ERR_USR_8", "Vocę precisa fornecer um e-mail válido.");
define("L_ERR_USR_9", "Este usuário já está registrado.");
define("L_ERR_USR_10", "Usuário ou senha inválida.");
define("L_ERR_USR_11", "Vocę precisar ser o Administrador.");
define("L_ERR_USR_12", "Vocę é o Administrador entăo năo pode ser removido.");
define("L_ERR_USR_13", "Para poder criar sua própria sala vocę precisa ser registrado.");
define("L_ERR_USR_14", "Vocę precisa ser registrado antes de usar o chat.");
define("L_ERR_USR_15", "Vocę precisa escrever o seu nome completo.");
define("L_ERR_USR_16", "Apenas estes caracteres especiais são permitidos:\\n".$REG_CHARS_ALLOWED."\\nEspaços, vírgulas ou barras invertidas(\\) não são permitidos.\\nAnalíse a sintaxe.");
define("L_ERR_USR_16a", "Apenas estes caracteres especiais são permitidos:<br />".$REG_CHARS_ALLOWED."<br />Espaços, vírgulas ou barras invertidas(\\) não são permitidos.Analíse a sintaxe.");
define("L_ERR_USR_17", "Esta sala năo existe e vocę năo tem autorizaçăo para criar uma.");
define("L_ERR_USR_18", "Palavra proibida encontrada no seu nome de usuário.");
define("L_ERR_USR_19", "Vocę năo pode estar em mais de uma sala ao mesmo tempo.");
define("L_ERR_USR_20", "Vocę foi banido desta sala ou do chat.");
define("L_ERR_USR_20a", "Vocę foi banido desta sala ou do chat.<br />Motivo: %s");
define("L_ERR_USR_21", "Você NÃO está ativo pelos últimos ".C_USR_DEL." minutos,<br />por causa disso, foi retirado da sala.");
define("L_ERR_USR_22", "Este comando não se encontra dísponivel para\\no navegador que você usa (IE engine).");
define("L_ERR_USR_23", "Para entrar em um chat privado, você precisa ser registrado.");
define("L_ERR_USR_24", "Para criar seu próprio chat privado, você precisa ser cadastrado.");
define("L_ERR_USR_25", "Apenas o administrador pode usar a cor ".$COLORNAME."!<br />Não tente usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." ou ".COLOR_CM2.".<br />Estas são reservadas para usuários avançados!");
define("L_ERR_USR_26", " Apenas administradores e moderadores podem usar a cor ".$COLORNAME."!<br />Não tente usar ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." ou ".COLOR_CM2.".<br />Estas são reservadas para usuários avançados!");
define("L_ERR_USR_27", "Você não pode conversar em privado com você mesmo.\\nFaça isso em sua mente por favor...\\nAgora escolha outro nome de usuário.");
define("L_ERR_USR_28", "O seu acesso para %s foi retirado!<br />Por favor escolha uma sala diferente."); // room name
define("L_ERR_ROM_1", "Nome da sala não pode conter vírgulas ou barra invertida (\\).");
define("L_ERR_ROM_2", "Uma palavra banida foi encontrada no nome da sala que você deseja criar.");
define("L_ERR_ROM_3", "Esta sala ja existe como sala pública.");
define("L_ERR_ROM_4", "Nome inválido de sala.");

// users frame or popup
define("L_EXIT", "Sair do chat");
define("L_DETACH", "Destacar lista de usuários");
define("L_EXPCOL_ALL", "Expandir/Minimizar todos");
define("L_CONN_STATE", "Atualizar estado de conexăo");
define("L_CHAT", "Chat");
define("L_USER", "usuário");
define("L_USERS", "usuários");
define("L_LURKER", "visualizador");
define("L_LURKERS", "visualizadores");
define("L_NO_USER", "Nenhum usuário");
define("L_ROOM", "sala");
define("L_ROOMS", "salas");
define("L_EXPCOL", "Expandir/Minimizar sala");
define("L_BEEP", "Liga/Desliga do bipe de aviso de entrada");
define("L_PROFILE", "Mostrar detalhes");
define("L_NO_PROFILE", "No profile");

// input frame
define("L_HLP", "Ajuda");
define("L_MODERATOR", "%s agora é um moderador para esta sala.");
define("L_KICKED", "Usuário %s foi chutado com sucesso.");
define("L_KICKED_REASON", "Usuário %s foi chutado com sucesso.(Motivo: %s)"); 	// username/nickname and reason
define("L_KICKED_ALL", "Todos os usuários foram chutados com sucesso.");
define("L_KICKED_ALL_REASON", "Todos os usuários foram chutados com sucesso. (Motivo: %s)");
define("L_BANISHED", "Usuário %s foi banido com sucesso."); 	// username/nickname
define("L_BANISHED_REASON", "Usuário %s foi banido com sucesso.(Motivo: %s)"); 	// username/nickname and reason
define("L_ANNOUNCE", "ANÚNCIO");
define("L_INVITE", "O usuário %s pede que você se junte á ele na sala <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> ."); 	// username/nickname and room name as invitation link
define("L_INVITE_REG", "Você precisa ser registrado para entrar nessa sala");
define("L_INVITE_DONE", "Seu convite foi enviado para %s."); 	// username/nickname
define("L_OK", "Enviar");
define("L_BUZZ", "Galeria Buzzes");
define("L_BAD_CMD", "Este não é um comando válido!");
define("L_ADMIN", "Usuário %s já é um administrador !"); 	// username/nickname
define("L_IS_MODERATOR", "Usuário %s já é um moderador!"); 	// username/nickname
define("L_NO_MODERATOR", "Apenas um moderador pode usar este comando.");
define("L_NONEXIST_USER", "Usuário %s não está nesta sala."); 	// username/nickname
define("L_NONREG_USER", "Usuário %s não está registrado."); 	// username/nickname
define("L_NONREG_USER_IP", "O IP dele é: %s."); 	// IP address
define("L_NO_KICKED", "Usuário %s é um moderador ou administrador, portanto não pode ser chutado."); // username/nickname
define("L_NO_BANISHED", "Usuário %s é um moderador ou administrador, portanto não pode ser banido."); //username/nickname
define("L_SVR_TIME", "Tempo do servidor: ");
define("L_NO_SAVE", "Nenhuma mensagem para salvar!");
define("L_NO_ADMIN", "Apenas o administrador pode usar este comando.");
define("L_NO_REG_USER", "Você precisa ser registrado neste chat para utilizar este comando.");

// help popup
define("L_HELP_TIT_1", "Emoticons");
define("L_HELP_TIT_2", "Formataçăo de texto para mensagens");
define("L_HELP_FMT_1", "Vocę pode usar texto bold (negrito), itálicos ou sublinhado colocando as tags &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; ou &lt;U&gt; &lt;/U&gt; antes e depois de parte ou de todo o texto.<br />Exemplo: &lt;B&gt;este texto&lt;/B&gt; vai gerar <B>este texto</B>.");
define("L_HELP_FMT_2", "Para criar um link (para e-mail ou URL) na sua mensagem, simplesmente digite o texto sem tag html alguma. O link será gerado automaticamente.");
define("L_HELP_TIT_3", "Comandos");
define("L_HELP_NOTE", "Todos os comandos devem ser usados em Inglês!");
define("L_HELP_MSG", "mensagem");
define("L_HELP_MSGS", "mensagens");
define("L_HELP_ROOM", "sala");
define("L_HELP_BUZZ", "Buzz..."); //one word
define("L_HELP_BUZZ1", "Buzz..."); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "a razão");
define("L_HELP_MR", "Sr. %s");
define("L_HELP_MS", "Sra. %s");
define("L_HELP_CMD_0", "{} representa um ajuste necessário, [] um ajuste ideal.");
define("L_HELP_CMD_1a", "Escolha o número de mensagens que vão aparecer, 5 é o padrão.");
define("L_HELP_CMD_1b", "Atualize o quadro de mensagens e mostre as últimas mensagens, 5 é o mínimo e o padrão.");
define("L_HELP_CMD_2a", "Alterar o tempo de atualização da lista de mensagens (em segundos).<br />Se não for especificado, alterna entre 10 segundos e nenhuma atualização");
define("L_HELP_CMD_2b", "Alterar o tempo de atualização da lista de usuários e mensagens (em segundos).<br />Se não for especificado, alterna entre 10 segundos e nenhuma atualização");
define("L_HELP_CMD_3", "Inverte a ordem de mensagens, (Não disponível em todos os navegadores).");
define("L_HELP_CMD_4", "Entrar em outra sala, criando se for permitido e não existir.<br />n é igual a 0 se for privado e 1 se for público, se não especificado o padrão é 1.");
define("L_HELP_CMD_5", "Sair do chat após mostrar uma mensagem opcional.");
define("L_HELP_CMD_6", "Impede a exibição das mensagens do usuário que possui o apelido especificado.<br />Definir como desligado o ignorar para os usuários com o apelido e \"-\" são especificados. Para todos os usuários, quando \"-\" não seja um apelido.<br />Se não tiver opção, este comando abre uma janela que mostra todos os usuários ignorados.");
define("L_HELP_CMD_7", "Rescreve todos os textos digitados anteriormente (comandos ou mensagens)");
define("L_HELP_CMD_8", "Mostrar/Esconder o tempo, antes das mensagens.");
define("L_HELP_CMD_9", "Tira usuário do chat. Este comando só pode ser usado pelo moderador ou um admin.<br />Opcionalmente, [".L_HELP_REASON."] mostra a razão (qualquer texto desejado).<br />Se * opção é utilizado(a), o comando vai chutar para for a do chat todos os usuários que não possuam poderes (apenas convidados e usuários registrados). Isso é útil quando a conexão do servidor está tendo problemas e todas as pessoas devem reiniciar o chat. Neste segundo caso, [".L_HELP_REASON."] é recomendável para que os usuários fiquem sabendo porque foram chutados.");
define("L_HELP_CMD_10", "Envia uma mensagem privada ao usuário especificado (os outros usuários năo irăo vę-la).");
define("L_HELP_CMD_11", "Mostra as informações sobre um usuário específico.");
define("L_HELP_CMD_12", "Janela pop-up para editar detalhes do usuário.");
define("L_HELP_CMD_13", "Liga/Desliga as notificações de entrada/saída de usuários da sala atual.");
define("L_HELP_CMD_14", "Permite o administrador ou moderador(es) da sala atual a promover a moderador da mesma sala um outro usuário registrado.");
define("L_HELP_CMD_15", "Limpa o frame de mensagens e mostra somente as últimas 5 mensagens.");
define("L_HELP_CMD_16", "Salva as últimas n mensagens (com exceçăo das notificaçőes) para um arquivo HTML. Se n năo for especificado, todas as mensagens disponíveis serăo incluídas.");
define("L_HELP_CMD_17", "Permite ao administrador anunciar (enviar mensagem) ŕ todos os usuários do chat, independente da sala onde eles estejam.");
define("L_HELP_CMD_18", "Sugere a um usuário conversando em outra sala que ele entre na sala que você está.");
define("L_HELP_CMD_19", "Permite ao(s) moderador(es) de uma sala ou ao administrador a \"banir\" um usuário de uma sala pelo tempo definido pelo administrador.<br />Este pode banir um usuário conversando em uma outra sala diferente da que ele está, e usar o parâmetro * para baní-lo \"para sempre\" do servidor de chat.<br />Opcionalmente, [".L_HELP_REASON."] mostra a razão pela qual foi banido (qualquer texte desejado).");
define("L_HELP_CMD_20", "Descreve o que você está fazendo sem se referir a você mesmo.");
define("L_HELP_CMD_21", "Avisa para a sala e para o usuário que está tentando lhe enviar mensagens,<br />Que você está longe do teclado (\"LDT\"). Se você quer voltar para o chat, apenas comece a digitar.");
define("L_HELP_CMD_22", "Envia um alerta de som e opcionalmente mostra uma mensagem na sala atual.<br />- Uso:<br />- antigo uso: \"/buzz\" ou \"/buzz mensagem que será mostrada\" - isso toca o som padrão escolhido no painel do administrador;<br />- Uso extendido: \"/buzz ".L_HELP_BUZZ."\" ou \"/buzz ".L_HELP_BUZZ." mensagem que será mostrada\" - toca um arquivo de som (nomeDoSom.wav) da pasta plus/sounds; por favor note o sinal \"~\" que foi usado no começo da segunda palavra que é o nome do arquivo de som, sem a extensão .wav (apenas extensões .wav são aceitas).<br />Por padrão. este é um comando de moderadores e administradores.");
define("L_HELP_CMD_23", "Envia uma mensagem privada. Esta mensagem chegará ao destino não importando em qual sala o usuário se encontra. Se o usuário não estiver online, ou estiver como LDT(longe do teclado), você será notificado.");
define("L_HELP_CMD_24", "Este comando muda o tópico da sala atual. Tenta não sobrescrever outros tópicos de usuários. Use tópicos importantes.<br />Por padrão, é um comando de moderadores e administradores.<br />Uso: \"/topic top reset\" vai deletar o tópico atual e alterar para o tópico padrão da sala.<br />Opcionalmente, \"/topic * {}\" e \"/topic * top reset\" faz exatamente o mesmo, mas em todos as salas (tópico global e resetar tópico global).");
define("L_HELP_CMD_25", "Um jogo de dados, para randomização de números.<br />Uso: /dice /dice [n];<br />Onde n pode receber qualquer valor <b> entre 1 e %s</b> (n representa o número de dados). Se nenhum número é escrito, o número máximo padrão será utilizado.");
define("L_HELP_CMD_26", "Este é uma versão mais complexa do comando /dice.<br />Uso:/{n1}d[n2] ou /{n1}d;<br />Onde n1 pode receber qualquer valor <b>entre 1 e %s</b> (Ele representa o número de dados por lançamento).<br />n2, pode receber qualquer valor <b> entre 1 e %s</b> (n2 representa o número de lados por dado).");
define("L_HELP_CMD_27", "Ele destaca as mensagens de um usuário específico para uma mais fácil leitura entre as conversas.<br />Uso: /high {usuário} ou pressione o pequeno quadrado <img src=./images/highlightOff.gif> no canto direito do nome de usuário (em lista de sala/usuários)");
define("L_HELP_CMD_28", "Envia <i>uma única imagem</i> como mensagem.<br />Uso: A foto precisa estar na internet e com livre acesso a todos. Não use páginas onde é necessário login.<br />Todo o link da imagem tem que ser digitado!
 Ex.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Extensões permitidas: .jpg .bmp .gif .png. Este link diferencia maiúsculas de minúsculas!<br />Dicas: digite \"/img\", um espaço e a copie e cole a url dentro da caixa para pegar a URL da imagem na página da Web, então aperte o botão direito em cima da imagem, entre em propriedades, e então marque todo o endereço/URL) . Não use imagens diretamente de seu computador: ao fazer isso, vai apenas quebrar a janela de chat!!!");
define("L_HELP_CMD_29", "O seguinte comando vai permitir que o administrador ou moderador da sala atual, diminua o nível de controle dos usuários registrados que foi promovido anteriormente para moderador da mesma sala.<br />A opção * reduz a prioridade do usuário em todas as salas.");
define("L_HELP_CMD_30", "O seguinte comando faz o mesmo que /me, só que vai mostrar o respectivamente o seu título, de acordo com seu tipo de perfil<br />Ex * ".sprintf(L_HELP_MR, "Ciprian")." está vendo TV ou ".sprintf(L_HELP_MS, "Dana")." está feliz.");
define("L_HELP_CMD_31", "Muda a orderm a qual os usuários estão expostos nas listas: por tempo de entrada ou alfabeticamente.");
define("L_HELP_CMD_32", "Essa é uma terceira (estilo RPG) versão de jogo de dados.<br />Uso: /d{n1}[tn2] ou /d{n1};<br />n1 pode receber qualquer valor <b> entre 1 e 100 </b> (Representa o número de lados por dado).<br />n2 pode receber qualquer valor <b> entre 1 e %s</b> (representa o número de dados por jogada).");
define("L_HELP_CMD_33", "Altera o tamanho da fonte das mensagens no chat a escolha do usuário (são permitidos valores entre 7 e 15); O comando /size retorna o tamanho de fonte para o padrão. (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "Permite que o usuário especifique qual será a orientação das mensagens de texto (ltr = esquerda para direita, rtl = direita para esquerda).");
define("L_HELP_CMD_35", "Permite que seja postado <i>um vídeo</i> ou <i> um audio</i> em um pequeno Flash por vez.<br />Uso: Apenas cole a URL da fonte desejada! Ex. <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />É necessário que você tenha o Shockwave Flash Player instalado no seu sistema. O link reconhece maiúsculas e minúsculas<br />Dica: digite /video seguido de espaço e copie a URL dentro da caixa.");
define("L_HELP_CMD_35a", "O seguinte comando só funciona para vídeos do youtube.com.<br />Ex. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "Permite postar <i> um vídeo do youtube</i> em um pequeno Flash por vez.<br />Uso: Apenas cole a URL da fonte desejada! Ex. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />É necessário que você tenha o Shockwave Flash Player instalado no seu sistema. O link reconhece maiúsculas e minúsculas!<br />Dica: digite /tube seguido de espaço e copie a URL dentro da caixa.");
define("L_HELP_CMD_37", "Permite que sejam postadas <i>equações e fórmulas <b>MathJax</b></i> no chat.<br />Uso: Apenas copie o código TeX ou MathML (originall) Ex. <b>/math&nbsp;\sqrt{3x-1}+(1+x)^2</b><br />Para mais exemplos e instruções: <a href=\"http://www.mathjax.org/demos/\" target=\"_blank\">http://www.mathjax.org/demos</a>. Pegue o código clicando com o botão direito na fórmula.<br />Dicas: digite /math seguida de espaço e cole o código na caixa.");
define("L_HELP_CMD_VAR", "Sinônimos (variantes): %s"); // a list of English and/or translated alternatives for each command
define("L_HELP_ETIQ_1", "Etiqueta do Chat");
define("L_HELP_ETIQ_2", "Nosso site gostaria de manter nossa comunidade amigável e divertida, então por favor siga as seguintes regras. Se você falhar em seguí-las, um dos moderadorers pode te desligar do chat.<br /><br />Obrigado,");
define("L_HELP_ETIQ_3", "Regras de etiqueta do Site.");
define("L_HELP_ETIQ_4", "Não polua o chat (\"spam\") digitando letras randômicas ou palavras sem sentido.</li>
<li>Não use caracteres AlTeRnAdOs.</li>
<li>Evite a utilização de CAPSLOCK, é considerado como um grito.</li>
<li>Tenha em mente que nossos usuários são de todos os lugares do mundo, e, provavelmente, você encontrará pessoas com diferentes crenças. Por favor seja bondoso e educado</li>
<li>Não use palavrões.</li>
<li>Não chame outros membros pelo seu nome real, eles podem não apreciar isso, use seus apelidos.</li>");

// messages frame
define("L_NO_MSG", "Năo existe atualmente nenhuma mensagem ...");
define("L_TODAY_DWN", "A mensagem enviada hoje, começa abaixo.");
define("L_TODAY_UP", "A mensagem enviada ontem, começa abaixo");

// message colors
$TextColors = array("Black" => "#000000",
				"Vermelho" => "#FF0000",
				"Verde" => "#009900",
				"Azul" => "#0000FF",
				"Roxo" => "#9900FF",
				"Vermelho Escuro" => "#990000",
				"Verde Escuro" => "#006600",
				"Azul Escuro" => "#000099",
				"Marrom" => "#996633",
				"Azul Claro" => "#006699",
				"Laranja" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignorado");
define("L_IGNOR_NON", "Nenhum usuário ignorado");

// whois popup
define("L_WHOIS_ADMIN", "Administrador");
define("L_WHOIS_OWNER", "Dono");
define("L_WHOIS_TOPMOD", "Mestre Moderador");
define("L_WHOIS_MODER", "Moderador");
define("L_WHOIS_MODERS", "Moderadores");
define("L_WHOIS_OTHERS", "Outros Usuários");
define("L_WHOIS_USER", "Usuário");
define("L_WHOIS_GUEST", "Convidado");
define("L_WHOIS_REG", "Registrado");
define("L_WHOIS_BOT", "Robô"); //Robot

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s entra na sala.");
define("L_EXIT_ROM", "%s sai da sala.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s foi chutado automaticamente do servidor por inatividade.");
define("L_CLOSED_ROM", "%s fechou o navegador.");

// Text for /away command notification string:
define("L_AWAY", "%s está ausente...");
define("L_BACK", "%s voltou!");

// Quick Menu mod
define("L_QUICK", "Menu rápido");

// Topic Banner mod
define("L_TOPIC", "enviou um TOPICO para:");
define("L_TOPIC_RESET", "resetou o TOPICO");
define("L_HELP_TOP", "pelo menos duas palavras no tópico.");
define("L_BANNER_WELCOME", "Bem vindo %s!");
define("L_BANNER_TOPIC", "Tópico:");
define("L_DEFAULT_TOPIC_1", "Este é um tópico padrão. Edite o arquivo localization/_owner/owner.php para alterar!");

// Img cmd mod
define("L_PIC", "Mensagem enviada por");
define("L_PIC_RESIZED", "Tamanho alterado para");
define("L_HELP_IMG", "caminho completo da imagem a ser postada.");
define("L_NO_IMAGE", "Esta não é uma URL válida de um imagem remota pública.\\nTente novamente!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s não é mais um moderador de qualquer sala deste chat.");
define("L_IS_NO_MODERATOR", "%s não é um moderador.");
define("L_ERR_IS_ADMIN", "%s é um administrador!\\nVocê não pode mudar as suas permissões.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Comandos extras habilitados:");
define("INFO_MODS", "Recursos/Mods extras habilitados:");
define("INFO_BOT", "Nosso robô disponível é:");

// Profile mod
define("L_PRO_1", "Línguas faladas");
define("L_PRO_1a", "Linguagem");
define("L_PRO_2", "Link favorito 1");
define("L_PRO_3", "Link favorito 2");
define("L_PRO_4", "Descrição");
define("L_PRO_5", "URL da foto");
define("L_PRO_6", "Nome/Cor de texto");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "URL inválida ou Host não existente.");
define("L_TITLE_AV", "Seu avatar atual: ");
define("L_CHG_AV", "Clique \"".L_REG_16."\" no formulário de perfil<br />para guardar seu Avatar.");
define("L_SEL_NEW_AV", "Escolha um novo Avatar");
define("L_EX_AV", "exemplo");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Escreva uma URL, e então pressione ENTER para vê-la)");
define("L_CANCEL", "Cancelar");
define("L_AVA_REG", "Você tem que ser registrado\\npara alterar seu ícone avatar");
define("L_SEL_NEW_AV_CONFIRM", "Este formulário não foi enviado.\\nIndo agora para a seleção de avatar, fará com que você perca todas as suas alterações até agora!\\n\\nVocê tem certeza disso?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "Dicas: Nosso robô está ativado nesta sala. Para conversar com ele, digite <b>hello ".C_BOT_NAME."</b>. Para terminar a conversa, digite: <b>bye ".C_BOT_NAME."</b>. (privado: /to <b>".C_BOT_NAME."</b> Mensagem)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "Dicas: Nosso robô está ativado na sala %s. Você só pode enviar mensagem privada clicando em seu nome e pelo comando: /wisp <b>".C_BOT_NAME."</b> Mensagem)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "Dicas: Nosso roboô não está ativado publicamente. Você só pode conversar, clicando em seu nome ou pelos comandos : /to <b>".C_BOT_NAME."</b> Mensagem ou /wisp <b>".C_BOT_NAME."</b> Mensagem)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Robô não está rodando nesta sala!");
define("BOT_START_ERROR", "Robô já está ativo nesta sala!");
define("BOT_DISABLED_ERROR", "Robô foi desabilitado pelo painel do Administrador!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "joga os dados, os resultados são:");
define("DICE_WRONG", "Você tem que selecionar quantos dados você deseja jogar\\n(escolha um número entre 1 e ".MAX_ROLLS.").\\nApenas digite /dice para jogar todos os ".MAX_ROLLS." dados.");
define("DICE2_WRONG", "O segundo valor deve ser entre 1 e ".MAX_ROLLS.".\\nDeixe vazio para usar todos os ".MAX_ROLLS." dados\\n(Ex. /".MAX_DICES."d ou /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "O primeiro valor deve ser entre 1 e ".MAX_DICES.".\\n(ex. /".MAX_DICES."d ou /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "O primeiro (d) valor tem que ser entre 1 e 100.\\nO segundo (t) valor tem que ser entre 1 e ".MAX_ROLLS.".\\nDeixe vazio para usar todos os ".MAX_ROLLS." dados\\n(ex. /d50 ou /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Abrir mensagens pop-up em mensagem privada.");
define("L_REG_POPUP_NOTE", "O seu bloqueador de pop-up deve estar desabilitado!");
define("L_PRIV_POST_MSG", "Envie uma mensagem privada!");
define("L_PRIV_MSG", "Nova mensagem privada recebida!");
define("L_PRIV_MSGS", "%s novas mensagems privadas recebidas!");
define("L_PRIV_MSGSa", "Aqui estão as primeiras 10 mensagens!<br />Usar o link abaixo para ver o resto.");
define("L_PRIV_MSG1", "De:");
define("L_PRIV_MSG2", "Sala:");
define("L_PRIV_MSG3", "Para:");
define("L_PRIV_MSG4", "Mensagem:");
define("L_PRIV_MSG5", "Postado:");
define("L_PRIV_REPLY", "Responder");
define("L_PRIV_READ", "Aperte o botão de ’".L_REG_25."’ para marcar todos os POSTs como lidos!");
define("L_PRIV_POPUP", "Você pode desabilitar/re-habilitar a qualquer momento, essa opção de pop-up,<br />alterando o seu");
define("L_PRIV_POPUP1", "Perfil</a> (apenas usuários cadastrados)");
define("L_NOT_ONLINE", "%s não está online no momento.");
define("L_PRIV_NOT_ONLINE", "%s não está online no momento,\\nmas receberá a sua mensagem ao fazer login.");
define("L_PRIV_NOT_INROOM", "%s não está nesta sala.\\nSe você deseja enviar uma mensagem para este usuário,\\nusar o comando: /wisp %s mensagem.");
define("L_PRIV_AWAY", "%s está ausente,\\nmas você pode enviar mensagens\\ne ele visualizará quando voltar.");
define("PM_DISABLED_ERROR", "Mensagens privados foram desabilitadas neste chat.");
define("L_NEXT_PAGE", "Ir para a próxima página");
define("L_NEXT_READ", "Leia a(s) próxima(s) %s"); // message / 10 messages
define("L_ROOM_ALL", "Todas as salas");
define("L_PRIV_NO_MSGS", "Nenhuma mensagem privada foi recebida");
define("L_PRIV_READ_MSG", "1 mensagem privada foi recebida"); //singular
define("L_PRIV_READ_MSGS", "%s mensagens privadas foram recebidas"); //plural
define("L_PRIV_MSGS_NEW", "Novo"); //singular form
define("L_PRIV_MSGS_READ", "Ler"); //singular form
define("L_PRIV_MSG6", "Status:");
define("L_PRIV_RELOAD", "Atualizar página");
define("L_PRIV_MARK_ALL", "Marcar todas como lidas");
define("L_PRIV_MARK_SEL", "Marcas selecionadas como lidas");
define("L_PRIV_REMOVE", "Removers as mensagens marcadas"); // or selected
define("L_PRIV_PM", "(privado)");
define("L_PRIV_WISP", "(cochicar)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Habilitado");
define("L_DISABLED", "Desabilitado");
define("L_COLOR_HEAD_SETTINGS", "Opções atuais neste servidor:");
define("L_COLOR_HEAD_SETTINGSa", "Cores padrão:");
define("L_COLOR_HEAD_SETTINGSb", "Cor padrão:");
define("L_COL_HELP_TITLE", "Apanhador de cores");
define("L_COL_HELP_SUB1", "Uso:");
define("L_COL_HELP_P1", "Você pode selecionar o seu padrão de cores editando o seu perfil (da mesma cor que seu nick). Você ainda poderá usar qualquer outra cor. Para retornar a cor padrão, você deve escolher como cor padrão a cor nula(Null) – é a primeira na lista de seleção de cor.");
define("L_COL_HELP_SUB2", "Dicas:");
define("L_COL_HELP_P2", "<u>Color Range</u><br />Dependendo das capacidades do seu navegador/OS, é possível que algumas cores não sejam renderizadas. Apenas 16 nomes de cores são suportadas pelo padrão W3C HTML 4.0:");
define("L_COL_HELP_P2a", "Se um usuário afirma que não consegue ver a cor que você selecionou, provavelmente ele deve estar usando um navegador mais antigo.");
define("L_COL_HELP_SUB3", "Opções definidas neste chat:");
define("L_COL_HELP_P3", "<u>Níveis de poder de uso de cores</u>:<br />1. Administrador pode usar qualquer cor.<br />A cor padrão do administrador é <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderadores poder usar qualquer cor menos <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> e <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />A cor padrão para moderadores é <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Os usuários podem usar qualquer cor menos <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> e <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "A cor padrão é <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Material técnico</u>: Estas cores foram definidas pelo administrador no painel do administrador.<br />Se algo der errado ou se você não gostou de algo sobre as cores, você deve contactar o <b>administrador</b> primeiro, não os outros usuários da sua sala. :-)");
define("L_COL_HELP_USER_STATUS", "Seu status");
define("L_COL_TUT", "Usando texto colorido no chat");
define("L_NULL", "Nulo");
define("L_NULL_F", "Nula"); // feminine word, if it's the case
define("L_ROOM_COLOR", "cor da sala");
define("L_PRO_COLOR", "cor do perfil");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Apenas o administrador pode usar a cor ".COLOR_CA."!\\n\\nCor do texto retornada para ".COLOR_CM."!\\n\\nPor favor escolha uma cor diferente.");
define("COL_ERROR_BOX_USRA", "Apenas o administrador pode usar a cor ".COLOR_CA."!\\n\\nNão tente usar as cores ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ou ".COLOR_CM1.".\\n\\nEstas são cores reservadas para usuários avançados!\\n\\nCor do texto retornada para ".COLOR_CD."!\\n\\nPor favor escolha uma cor diferente.");
define("COL_ERROR_BOX_USRM", "É preciso ser um moderador para usar a cor ".COLOR_CM."!\\n\\nNão tente usar as cores ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." ou ".COLOR_CM1.".\\n\\nEssas cores são reservadas para usuários avançados!\\n\\nSua cor de texto resetou para ".COLOR_CD."!\\n\\nPor favor escolha outra cor.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Bem vindo ao nosso chat. Por favor obedeça as etiquetas de internet, quando utilizar o chat: <I>Tente ser educado e bondoso</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG . L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG); 

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "As opções desse servidor acabaram de ser alteradas. Para evitar mal funcionamento, por favor atualize a página (aperte F5 ou Sair e entre novamente no chat).");

//Size command error by Ciprian
define("L_ERR_SIZE", "O valor de tamanho da fonte só pode ser\\nnulo(para resetar) ou entre 7 e 15");

// Password reset form by Ciprian
define("L_PASS_0", "Formulário de redefinição de senha");
define("L_PASS_1", "Pergunta secreta");
define("L_PASS_2", "De qual marca foi seu primeiro carro?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "Qual o nome do seu primeiro bixo de estimação?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "Qual sua bebida preferida?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "Qual a data do seu aniversário?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "Resposta secreta");
define("L_PASS_7", "Redefinir senha");
define("L_PASS_8", "Sua senha foi redefinida com sucesso.");
define("L_PASS_9", "Sua nova senha para entrar no chat");
define("L_PASS_10", "Sua nova senha para entrar no chat %s");
define("L_PASS_11", "Bem vindo novamente ao nosso servidor de chat!");
define("L_PASS_12", "Escolha uma pergunta ...");
define("L_ERR_PASS_1", "Usuário inválido. Escolha o seu.");
define("L_ERR_PASS_2", "E-mail errado. Tente novamente!");
define("L_ERR_PASS_3", "Pergunta secreta incorreta.<br />Responda a pergunte abaixo!");
define("L_ERR_PASS_4", "Resposta secreta incorreta. Tente novamente!");
define("L_ERR_PASS_5", "Você não definiu seus dados privados/secretos.");
define("L_ERR_PASS_6", "Você não definiu seus dados privados/secretos ainda.<br />Você não pode usar este formulário. Por favor contate um administrador!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s se tornou um administrador deste chat.");
define("L_ADM_4", "%s não é mais um administrador deste chat.");

// Open Schedule by Ciprian
define("L_DAILY", "Diário");//masculine
define("L_DAILY", "Diária");//feminine
define("L_ALWAYS", "sempre");
define("L_OPEN", "Abrir");
define("L_CLOSED", "Fechado");//masculine
define("L_CLOSED", "Fechada");//feminine
define("L_OPEN_PUB", "ABERTO PARA O PÚBLICO");
define("L_CLOSED_PUB", "FECHADO PARA O PÚBLICO");

// Links popup page by Alex
define("L_LINKS_1", "Links enviados");
define("L_LINKS_2", "Aqui você pode acessar os links enviados");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Clique aqui %s %s");
define("L_CLICK", "Clique aqui %s");
define("L_LINKS_3", "para abrir um link");
define("L_LINKS_4", "para abrir o site do autor");
define("L_LINKS_5", "para inserir esse Emoticon");
define("L_LINKS_6", "para contato");
define("L_LINKS_7", "para visitar a págino oficial do phpMyChat");
define("L_LINKS_8", "para se juntar ao grupo do phpMyChat");
define("L_LINKS_9", "para enviar os seus comentários");
define("L_LINKS_10", "para baixar o phpMyChat-Plus");
define("L_LINKS_11", "para ver quem está no chat");
define("L_LINKS_12", "para abrir a página de login de Chat");
define("L_LINKS_13", "para tocar este som (buzz)"); // can also be translated as "to play this sound"
define("L_LINKS_14", "para usar este comando");
define("L_LINKS_15", "para abrir");
define("L_LINKS_16", "Galeria de Emoticons");
define("L_LINKS_17", "para ordenação ascendente");
define("L_LINKS_18", "para ordenação descente");
define("L_LINKS_19", "para escolher/modificar o seu Gravatar"); // do not translate the word "Gravatar"!
define("L_LINKS_20", "Equações enviadas");
define("L_SWITCH", "Mudar para %s"); // E.g. "Switch to Italian" (Country Flags mouseover / Language switching)
define("L_SELECTED", "selecionado"); // E.g. "French (selected)" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", "selecionada"); // feminine word, if it's the case
define("L_NOT_SELECTED", "não selecionado");
define("L_NOT_SELECTED_F", "não selecionada"); // feminine word, if it's the case
define("L_EMAIL_1", "para enviar um e-mail");
define("L_FULLSIZE_PIC", "para abrir imagem em tamanho real");
define("L_PRIVACY", "para ler a sua política de privacidade"); //Click here to…
define("L_AUTHOR", "o autor"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "o desenvolvedor deste chat"); //same here
define("L_OWNER", "o dono do site"); //same here
define("L_TRANSLATOR", "o tradutor"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... visitantes desde %s");

// Status bar messages
define("L_JOIN_ROOM", "Entre nesta sala");
define("L_USE_NAME", "Use este nome de usuário");
define("L_USE_NAME1", "Dirigir a este usuário");
define("L_WHSP", "sussurro");
define("L_SEND_WHSP", "Enviar um sussurro");
define("L_SEND_PM_1", "Enviar mensagem privada");
define("L_SEND_PM_2", "Enviar uma mensagem privada");
define("L_HIGHLIGHT", "Marcar/Desmarcar");
define("L_HIGHLIGHT_SB", "Marcar/Desmarcar as mensagens deste usuário");

//Lurking frame popup
define("L_LURKING_2", "Visualizando a página");
define("L_LURKING_3", "está visualizando");
define("L_LURKING_4", "entrou em");
define("L_LURKING_5", "Desconhecido");

// Extra options by Ciprian // keep all these lines as short as possible. they have to fit into the Users frame width!
define("L_EXTRA_OPT", "Opções extras");
define("L_ARCHIVE", "Abrir arquivo");
define("L_SOUNDFIX_IE_1", "Reparo de som para IE");
define("L_SOUNDFIX_IE_2", "Baixe uma correção de som para o IE");
define("L_LURKING_1", "Abrir página à espreita");
define("L_REG_BRB", "brb (necessita primeiro que seja registrado)");
define("L_DEL_BYE", "não espere por mim");
define("L_EXTRA_PRIV1", "Ler mensagens privadas"); // means: "Read your PMs" - link to open the pm manager if there are any old/read pms.
define("L_EXTRA_PRIV2", "Ler novas mensagens privadas"); // link to open the pm manager if there are new pms

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Janeiro");
define("L_FEB", "Fevereiro");
define("L_MAR", "Março");
define("L_APR", "Abril");
define("L_MAY", "Maio");
define("L_JUN", "Junho");
define("L_JUL", "Julho");
define("L_AUG", "Agosto");
define("L_SEP", "Setembro");
define("L_OCT", "Outubro");
define("L_NOV", "Novembro");
define("L_DEC", "Dezembro");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Fev");
define("L_S_MAR", "Mar");
define("L_S_APR", "Abr");
define("L_S_MAY", "Mai");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Ago");
define("L_S_SEP", "Set");
define("L_S_OCT", "Out");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dez");
// Week days Long Names
define("L_MON", "Segunda");
define("L_TUE", "Terça");
define("L_WED", "Quarta");
define("L_THU", "Quinta");
define("L_FRI", "Sexta");
define("L_SAT", "Sábado");
define("L_SUN", "Domingo");
// Week days Short Names
define("L_S_MON", "Seg");
define("L_S_TUE", "Ter");
define("L_S_WED", "Qua");
define("L_S_THU", "Qui");
define("L_S_FRI", "Sex");
define("L_S_SAT", "Sáb");
define("L_S_SUN", "Dom");

// Localized date format
// Set the BR specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "pt-BR.UTF-8", "pt-br", "Portuguese");
} else {
setlocale(LC_ALL, "pt_BR.UTF-8", "por.UTF-8", "por_bra.UTF-8", "Portuguese.UTF-8");
}
define("L_LANG", "pt_BR");
define("ISO_DEFAULT", "iso-8859-2");
define("WIN_DEFAULT", "windows-1252");
define("L_SHORT_DATE", "%d %m %Y"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%d %B %Y (%A)"); //Change this to your local desired format (keep the long form)
define("L_SHORT_DATETIME", "%d %m %Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%d %B %Y (%A) %H:%M:%S"); //Change this to your local desired format (keep the long form)
define("L_CAL_FORMAT", "%d %B %Y"); // Calendar format

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN", "usuários são ".LOGIN_LINK."conversando</A> no momento.");
define("USERS_LOGIN", "1 usuário está ".LOGIN_LINK."conversando</A> no momento.");
define("NO_USER", "Ninguém está ".LOGIN_LINK."conversando</A> no momento.");
define("L_PRIV_REPLY_LOGIN", "Entre no chat ".LOGIN_LINK."se desejas responder</A> a qualquer nova mensagem privada acima.");

// Language names
define("L_LANG_AR", "Espanhol - Argentina");
define("L_LANG_BG", "Bulgaro");
define("L_LANG_BR", "Português Brasil");
define("L_LANG_CA", "Catalão");
define("L_LANG_CNS", "Chinês (Simplificado)");
define("L_LANG_CNT", "Chinês(Tradicional)");
define("L_LANG_CZ", "Tcheco");
define("L_LANG_DA", "Dinamarquês");
define("L_LANG_DE", "Alemão");
define("L_LANG_EN", "Inglês"); // for admin panel only
define("L_LANG_ENUK", "Inglês UK"); // for UK formats and flags
define("L_LANG_ENUS", "Inglês US"); // for US formats and flags
define("L_LANG_ES", "Espanhol");
define("L_LANG_FA", "Persa (Farsi)"); //Pakistan language
define("L_LANG_FI", "Finlandês");
define("L_LANG_FR", "Françês");
define("L_LANG_GR", "Grego");
define("L_LANG_HE", "Hebraico");
define("L_LANG_HI", "Hindi");
define("L_LANG_HU", "Húngaro");
define("L_LANG_ID", "Indonésio");
define("L_LANG_IT", "Italiano");
define("L_LANG_JA", "Japonês (Kanji)");
define("L_LANG_KA", "Georgiano");
define("L_LANG_NB", "Norueguês (Bokmål)");
define("L_LANG_NN", "Norueguês (Nynorsk)");
define("L_LANG_NE", "Nepali");
define("L_LANG_NL", "Holandês");
define("L_LANG_PL", "Polonês");
define("L_LANG_PT", "Português");
define("L_LANG_RO", "Romeno");
define("L_LANG_RU", "Russo - Cyrillic");
define("L_LANG_SK", "Eslovaco");
define("L_LANG_SRC", "Sérvio - Cyrillic");
define("L_LANG_SRL", "Sérvio - Latin");
define("L_LANG_SV", "Sueco");
define("L_LANG_TH", "Thai");
define("L_LANG_TR", "Turco");
define("L_LANG_UK", "Ucraniano - Cyrillic");
define("L_LANG_UR", "Urdu"); //Pakistan language
define("L_LANG_VI", "Vietnamita");
define("L_LANG_YO", "Yoruba"); // Nigeria&Congo language

//Skins preview page
define("L_SKINS_TITLE", "Visualização de Skins");
define("L_SKINS_TITLE1", "Visualização de Skins - %s de %s"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Skins disponíveis");
define("L_SKINS_NONAV", "Não existe estilo selecionado na pasta \"skins\"");
define("L_SKINS_COPY", "&copy; %s Skin por %s"); //year - author

// Swap image titles by Ciprian
define("L_GEN_ICON", "Ícone do gênero");

// Ghost mode by Ciprian
define("L_GHOST", "Invisível");
define("L_SUPER_GHOST", "Super invisível");
define("L_NO_GHOST", " visível");

// Sorting options by Ciprian
define("L_ASC", "Ascendente");
define("L_DESC", "Descendente");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Visitas totais");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "usar o Gravatar"); // do not translate the word "Gravatar"!

// Uploader mod by Ciprian
define("L_UPLOAD", "Carregar %s");
define("L_UPLOAD_IMG", "Arquivo de imagem");
define("L_UPLOAD_SND", "Arquivo de som");
define("L_UPLOAD_FLS", "Arquivos");
define("L_UPLOAD_SUCCESS", "%s carregar com sucesso como %s.");
define("L_FILES_TITLE", "Gestão de cargas");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Restrito");
define("L_RESTRICTED_ROM", "%s foi restrito com sucesso nesta sala.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Entrar com uma OpenID");
define("L_OPID_REG", "Importar o seu perfil OpenID");

// Support buttons
define("L_SUPP_WARN", "Você escolheu por contribuir com o desenvolvimente de graça do ".APP_NAME.", ao fazer uma doação para o desenvolvedor.\\nObrigado pelo seu suporte!\\n\\nNota: este recipiente não é o dono deste chat.\\nPor favor entre quanto deseja doar, na próxima página.\\n\\nDeseja continuar?");
define("L_SUPP_ALT", "Suporte, via PayPal, o desenvolvedor de ".APP_NAME." - É rápido, seguro e gratuito!");

// Video & Audio & Youtube cmds (Embevi & YouTube player class) – same approach as in // Img cmd mod section!
define("L_AUDIO", "Arquivo de audio enviado por");
define("L_VIDEO", " Arquivo de video enviado por");
define("L_HELP_VIDEO", "O caminho completo para a fonte de vídeo ou áudio a ser enviado");
define("L_NO_VIDEO", "A URL não pode ser incorporada.\\nEsta não é uma URL fonte pública aceitável de vídeo ou áudio válida.\\nTente novamente!");
define("L_ORIG_VIDEO", "para abrir a fonte do site"); //it sounds like: Click here to open the… // Same approach as in L_HELP_CMD_28

// Birthday mod - by Ciprian
define("L_PRO_7", "Data de nascimento");
define("L_PRO_8", "mostrar data de nascimento nas informações públicas");
define("L_PRO_9", "mostrar idade nas informações públicas");
define("L_PRO_10", "Idade");
define("L_PRO_11", "%3\$d dias, %2\$d meses e %1\$d anos"); //you can also change the order here, but 1 stands for years, 2 for months and 3 for days
define("L_DOB_TIT_1", "Lista de aniversariantes");
$L_DOB_SUBJ = "Parabéns %s!"; // username

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_EQUATION", "Equação");
define("L_MATH", "%s enviada por %s"); //e.g. "Equation posted by username" (defined above); the word "Equation" will render as a url to show popup with the posted formulas
?>
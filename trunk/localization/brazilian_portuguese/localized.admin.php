<?php
// File : brazilian_portuguese/localized.admin.php - plus version (29.04.2012 - rev.17)
// Translation by Marco Gelli Marchese <mvmcgm@gmail.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administração para %s");
define("A_MENU_1", "Usuários registrados");	//plural
define("A_MENU_11", "Usuário registrado");		//singular
define("A_MENU_2", "Usuários banidos");	//plural
define("A_MENU_21", "Usuário banido");		//singular
define("A_MENU_3", "Salas vazias");
define("A_MENU_4", "Enviar mensagens");
define("A_MENU_5", "Configuração");
define("A_MENU_6", "Chat extras");
define("A_MENU_7", "Procurar");
define("A_MENU_8", "Conexão");
define("A_MENU_9", "Arquivo de log");
define("A_MENU_1a", "Perfis");
define("A_MENU_2a", "Estatísticas");
define("A_LOGOUT", "Sair");
define("A_MOD_DEV", "Mod em construção");

// Frame for registered users
define("A_SHEET1_1", "Lista de usuários registrados e suas permissőes");
define("A_SHEET1_2", "Nome do usuário");
define("A_SHEET1_3", "Permissőes");
define("A_SHEET1_4", "Salas moderadas");
define("A_SHEET1_5", "Salas moderadas săo separadas por vírgulas (,) sem espaços.");
define("A_SHEET1_6", "Remover usuários selecionados");
define("A_SHEET1_7", "Modificar");
define("A_SHEET1_8", "Năo existe nenhum usuário registrado com exceçăo de você.");
define("A_SHEET1_9", "Banir usuários selecionados");
define("A_SHEET1_10", "Agora vocę deve ir para ’".A_MENU_2."’ para refinar suas escolhas.");
define("A_SHEET1_11", "Última conexão");
define("A_SHEET1_12", "Motivo de banimento (opcional)");
define("A_SHEET1_13", "Salas permitidas");
define("A_SHEET1_14", "Todos sem restrição");
define("A_SHEET1_15", "Todos restritos");
define("A_SHEET1_16", "As restrições de sala especificadas tambem devem estar ativadas na ’".A_MENU_5."’.");
define("A_USER", "Usuário");
define("A_MODER", "Moderador");
define("A_TOPMOD", "Moderador chefe");
define("A_ADMIN", "Administrador");
define("A_PAGE_CNT", "Página %s de %s");

// Frame for banished users
define("A_SHEET2_1", "Lista de usuário banidos e suas salas");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Salas com preocupação");
define("A_SHEET2_4", "Até");
define("A_SHEET2_5", "sem terminar");
define("A_SHEET2_6", "Salas são separadas por vírgulas e sem espaço (,) se forem menos que 4, senão ’<B>*</B>’ bane de todas as salas.");
define("A_SHEET2_7", "Remover o banimento do(s) usuário(s) selecionado(s)");
define("A_SHEET2_8", "Não existem usuários banidos");
define("A_SHEET2_9", "Motivo (opcional)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista das salas existentes");
define("A_SHEET3_2", "Esvaziar uma sala \"năo-padrăo\" vai remover todos os status de moderador<br />para esta sala.");
define("A_SHEET3_3", "Esvaziar sala selecionada");
define("A_SHEET3_4", "Năo existe nenhuma sala para esvaziar.");
define("A_SHEET3_5", "Você ainda não fez nenhuma seleção. Por favor, selecione pelo menos uma sala da lista abaixo.");

// Frame for sending mails
define("A_SHEET4_0", "Você não configurou o e-mail administrativo no ’".A_MENU_5."’.");
define("A_SHEET4_1", "Enviar e-mails");
define("A_SHEET4_2", "Para:");
define("A_SHEET4_3", "Marcar todos");
define("A_SHEET4_4", "Assunto:");
define("A_SHEET4_5", "Mensagem:");
define("A_SHEET4_6", "Enviar agora!");
define("A_SHEET4_7", "Todos os e-mails foram enviados.");
define("A_SHEET4_8", "Erro interno ao tentar enviar e-mails.");
define("A_SHEET4_9", "Está faltando destinatário, assunto ou mensagem!");
define("A_SHEET4_10", "Adicione e-mails separados por vírgula e sem espaços (,)");
define("A_SHEET4_11", "Assinatura");
define("A_SHEET4_12", "Desmarcar todos");
define("A_SHEET4_13", "Colocar todos os destinatários no campo Cco.");

// Frame for configuration
define("A_SHEET5_0", "A versão instalada no momento é %s");
define("A_SHEET5_1", "Uma nova versão foi lançada (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Chat Extras desabilitados") ;
define("A_REFRESH_MSG", "Atualizar mensagens") ;
define("A_MSG_DEL", "Apagar") ;
define("A_POST_TIME", "Postado em") ;
define("A_FROM_TO", "De › Para") ;
define("A_FROM", "De") ;
define("A_CHTEX_ROOM", "Sala") ;
define("A_CHTEX_MSG", "Mensagem") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Registros de conexão IP para %s");
define("A_CHAT_LOGS_2", "Arquivo de Chat foram desabilitados");
define("A_CHAT_LOGS_3", "Abrir a página de registros de IP");
define("A_CHAT_LOGS_4", "Apagar o arquivo de registros de Chat");
define("A_CHAT_LOGS_5", "Isso vai apagar e arquivar o arquivo de registros do Chat IP!\\n");
define("A_CHAT_LOGS_6", "Arquivo completo de registro de Chat");
define("A_CHAT_LOGS_7", "Mostrar a seção public de arquivo de Chat");
define("A_CHAT_LOGS_8", "Isso vai apagar todos os arquivos de pastas\\nguardados na pasta %s!\\n"); // year
define("A_CHAT_LOGS_9", "Apagar todos os registros do %s"); // year
define("A_CHAT_LOGS_10", "Apagar ano");
define("A_CHAT_LOGS_11", "Isso vai apagar todos os arquivos\\nguardados na pasta %s!\\n"); // month/year
define("A_CHAT_LOGS_12", "(apenas os públicos)");
define("A_CHAT_LOGS_13", "Deletar mês");
define("A_CHAT_LOGS_14", "Isso vai deletar o arquivo %s!\\n"); // day.php file
define("A_CHAT_LOGS_15", "Apagar este registro");
define("A_CHAT_LOGS_16", "Ler registro de %s"); // day month year
define("A_CHAT_LOGS_17", "Arquivo de registros publicos de chat");
define("A_CHAT_LOGS_18", "(apenas os públicos)");
define("A_CHAT_LOGS_19", "\\nIsso não é reversível...\\nVocê tem certeza?");
define("A_CHAT_LOGS_20", "Mostre toda a seção do arquivo de chat");
define("A_CHAT_LOGS_21", "Ir para o topo");
define("A_CHAT_LOGS_22", "Registro de arquivo guardado");
define("A_CHAT_LOGS_23", "Gerado na %s"); // Generated on "date" //Feminine
define("A_CHAT_LOGS_23", "Gerado no %s"); // Generated on "date" //masculine
define("A_CHAT_LOGS_24", "Comprimir todo os registros %s em um arquivo Zip"); // date
define("A_CHAT_LOGS_25", "Isso vai criar um Zip com todos os registros\\nguardados na pasta %s!\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nVocê tem certeza?");
define("A_CHAT_LOGS_27", "Arquivos Zipados");
define("A_CHAT_LOGS_28", "Baixar %s");
define("A_CHAT_LOGS_29", "Apagar este zip");
define("A_CHAT_LOGS_30", "Arquivos IP");
define("A_CHAT_LOGS_31", "Tamanho total %s %s");
define("A_CHAT_LOGS_32", "Arquivo");
define("A_CHAT_LOGS_33", "Pasta");
define("A_CHAT_LOGS_34", "%s apagado com sucesso: %s"); // sample: File (Folder) successfully deleted: bak/blabla.php
define("A_CHAT_LOGS_35", "%s criado com sucesso: %s");
define("A_CHAT_LOGS_36", "%s não existe: %s");
define("A_CHAT_LOGS_37", "%s não pode ter sido deletado: %s");
define("A_CHAT_LOGS_38", "%s não pode ter sido criado: %s");
define("A_CHAT_LOGS_39", "%s é protegido de escrita: %s");
define("A_CHAT_LOGS_40", "Erros ocorreram ao salvar: %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "Página de procura de salas de Chat");
define("A_SEARCH_2", "Todas as categorias");
define("A_SEARCH_3", "Nomes");
define("A_SEARCH_4", "Endereço IP");
define("A_SEARCH_5", "Permissões");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Gênero");
define("A_SEARCH_8", "Descrição");
define("A_SEARCH_9", "Links");
define("A_SEARCH_10", "Procurar");
define("A_SEARCH_11", "Para categorias de permissão, as opções são: <b>ad</b>, <b>mod</b> ou <b>u</b>.");
define("A_SEARCH_12", "Para categorias de genêro, as opções são: <b>0</b> para Não especificado, <b>1</b> para Homens, <b>2</b> para Mulheres ou <b>3</b> para Casal.");
define("A_SEARCH_13", "Nome de usuário");
define("A_SEARCH_14", "Primeiro nome");
define("A_SEARCH_15", "Último nome");
define("A_SEARCH_16", "País");
define("A_SEARCH_18", "Permissão");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Gênero");
define("A_SEARCH_21", "Termos de pesquisa");
define("A_SEARCH_22", "Pesquisar por");
define("A_SEARCH_23", "Por favor forneça um termo de pesquisa e tente novamente");
define("A_SEARCH_24", "Não existe dados para seus critérios, refine sua pesquisa.");
define("A_SEARCH_25", "Moderar este usuário");
define("A_SEARCH_26", "O usuário optou por esconder está informação em perfis públicos. Não divulgue!");
define("A_SEARCH_27", "Mostrar o mês atual");
define("A_SEARCH_28", "Mostrar todos os aniversários");

// Connected users Page
define("A_LURKING_1", "Usuários e espiadores conectados") ;
define("A_LURKING_2", "Modo Espiar desabilitado") ;

// Statistics Page
define("A_STATS_1", "Página de estatística de Chat");
define("A_STATS_2", "Coleta de dados iniciou em %s"); //date
define("A_STATS_3", "Estatísticas globais (de todos os tempos)");
define("A_STATS_4", "Estatísticas detalhadas (do(s) último(s) %s dia(s) de atividade)"); // no of days
define("A_STATS_5", "Estatísticas desabilitadas");
define("A_STATS_6", "Top %s"); // Top 10 or Top 5
?>
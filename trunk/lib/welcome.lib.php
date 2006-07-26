<?php
// Define the welcome message to be used when the 'C_WELCOME' switch is set
// to 1 inside the 'chat/config/config.lib.php' file

switch ($L)
{
   case 'argentinian_spanish':   // Para usuarios en Espaρol para Argentina
		define('WELCOME_MSG', "Bienvenidos a nuestro chat. El objetivo es conocernos, intercambiar ideas y <I>especialmente, pasar un momento agradable</I>.");
		break;
	case 'danish':	// For danish users
		define('WELCOME_MSG', "Velkommen til chatten. Oprethold venligst en sober tone mens du chatter: <i>forsψg at vζre venlig, rar og imψdekommende</i>.");
		break;
	case 'english':	// For english users
		define('WELCOME_MSG', "Welcome to our chat. Please obey the net etiquette while chatting: <I>try to be pleasant and polite</I>.");
		break;
	case 'french':	// For french users
		define('WELCOME_MSG', "Bienvenu(e) sur notre chat. N\'oubliez pas les <I>rθgles de politesse ιlιmentaire</I> au cours de vos discussions.");
		break;
	case 'greek':	// For greek users
		define('WELCOME_MSG', "Καλώς ήρθατε στη συζήτησή μας. Παρακαλούμε <I>μην ξεχνάτε τους καλούς σας τρόπους</I> κατά την παραμονή σας.");
		break;
	case 'japanese':	// For japan users
		define('WELCOME_MSG', "¥Α¥γ¥Γ¥Θ¤Ψ¤θ¤¦¤³¤½΅ª ΒΎ¤Ξ¥ζ΅Ό¥¶΅Ό¤ΛΜΒΟΗ¤ς¤«¤±¤Ί¤Λ΅Ά³Ϊ¤·¤σ¤Η¤¤¤Γ¤Ζ¤―¤ΐ¤µ¤¤¤Ν΅£");
		break;
	case 'spanish':	// Para usuarios en Espaρol
		define('WELCOME_MSG', "Bienvenidos a nuestro chat. El objetivo es conocernos, intercambiar ideas y <I>especialmente, pasar un momento agradable</I>.");
	case 'portuguese':	// Para utilizadores portugueses
		define('WELCOME_MSG', "Bem vindos ao nosso chat. Agradecemos que cumpra a <I>net etiquette</I> enquanto conversa.");
	case 'romanian':   // Pentru utilizatorii din Romania
		define('WELCOME_MSG', "Bun venit pe chat-ul nostru! Va rugam sa nu folositi expresii nepoliticoase, <I>pentru o utilizare cat mai placuta</I>.");
		break;
	default:		// When there is no translation for the language of the user
		define('WELCOME_MSG', "Welcome to our chat. Please obey the net etiquette while chatting: <I>try to be pleasant and polite</I>.");
		break;
};

?>
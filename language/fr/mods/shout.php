<?php
/** 
*
* Module Breizh Shoutbox [French]
*
* @package language
* @version $Id: shout.php 150 16:15 16/12/2011 Sylver35 Exp $ 
* @copyright (c) 2010, 2011 Breizh Portal  http://breizh-portal.com
* @copyright (c) 2007 Paul Sohier
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'SHOUT_ROBOT'			=> 'Robot',
	'SHOUT_TOUCH'			=> 'The Breizh Touch',
	'MISSING_DIV' 			=> 'La div shoutbox ne peut pas être trouvée.',
	'NO_POST_GUEST'         => 'Les invités peuvent poster.',
	'LOADING' 				=> 'Chargement...',
	'SHOUT_MESSAGE'			=> 'Message',
	'POST_MESSAGE'			=> 'Poster',
	'POST_MESSAGE_ALT'		=> 'Poster un message',
	'SENDING' 				=> 'Envoi du message...',
	'MESSAGE_EMPTY'			=> 'Le message est vide.',
	'XML_ER' 				=> 'Erreur XML, rafraichissez la page...',
	'NO_MESSAGE' 			=> 'Il n’y a aucun message.',
	'NO_AJAX' 				=> 'Non ajax',
	'NO_AJAX_USER' 			=> 'Vous devez activer Javascript pour pouvoir visionner la Shoutbox.',
	'NO_SHOUT_ID'	 		=> 'Pas d’id de message.',
	'JS_ERR' 				=> 'Il y a eu une erreur JavaScript. Erreur: ',
	'LINE' 					=> 'Ligne',
	'FILE' 					=> 'Fichier',
	'FLOOD_ERROR'	 		=> 'Erreur de flood!',
	'POSTED' 				=> 'Message posté...',
	'NO_CODE' 				=> 'Le bbcode suivant: %s n’est pas accepté.',
	'NO_VIDEO' 				=> 'Il n’est pas permis de poster des vidéos dans la shoutbox',
	'NO_SCRIPT' 			=> 'Les scripts ne sont pas tolérés dans cette shoutbox !!  Veuillez noter que cette tentative a été enregistrée avec votre ip.',
	'NO_APPLET' 			=> 'Les applets ne sont pas tolérés dans cette shoutbox !!  Veuillez noter que cette tentative a été enregistrée avec votre ip.',
	'NO_ACTIVEX' 			=> 'Les objets active x ne sont pas tolérés dans cette shoutbox !!  Veuillez noter que cette tentative a été enregistrée avec votre ip.',
	'NO_OBJECTS' 			=> 'Les objets chrome et about ne sont pas tolérés dans cette shoutbox !!  Veuillez noter que cette tentative a été enregistrée avec votre ip.',
	'NO_IFRAME' 			=> 'Les iframes ne sont pas tolérés dans cette shoutbox !!  Veuillez noter que cette tentative a été enregistrée avec votre ip.',
	'SHOUT_AVERT'			=> 'Respectez le travail des développeurs... Laissez les Copyrights en place!',
	'SHOUT_DEL'				=> 'Supprimer le message',
	'DEL_SHOUT' 			=> 'Êtes vous sûr de vouloir supprimer ce message?',
	'MSG_DEL_DONE' 			=> 'Message en cours de suppression...',
	'NO_SHOUT_ID'	 		=> 'Pas de numéro id de message.',
    'SHOUT_PAGE'            => 'Page N° ',
	'CODE'                  => 'code',
	'EDIT'                  => 'Éditer',
	'CANCEL'                => 'Abandonner',
	'COLORS'                => 'Couleurs',
	'SHOUT_IP'              => 'Voir l’ip du posteur',
	'SHOUT_EDIT'            => 'Éditer le message',
    'SENDING_EDIT'          => 'Publication après édition...',
    'EDIT_DONE'             => 'Le message a été édité',
	'ONLY_ONE_OPEN'         => 'Vous ne pouvez avoir qu’une seule boite d’édition ouverte',
	'SHOUT_AVATAR_SHORT'	=> 'Avatar',
	'SHOUT_AVATAR_TITLE'	=> 'Avatar de %s',
	'SHOUT_COPY'			=> '<a href="%1$smod-breizh-shoutbox-f21.html">%2$s</a>',
	'SHOUT_COLOR'			=> 'Coloriser le texte',
	'SHOUT_COLOR_CLOSE'		=> 'Refermer la colorisation du texte',
	'SHOUT_CHARS'			=> 'Ajouter des caractères spéciaux',
	'SHOUT_CHARS_CLOSE'		=> 'Refermer le panneau des caractères spéciaux',
	'SHOUT_BOLD'			=> 'Mettre en gras',
	'SHOUT_ITALIC'			=> 'Mettre en italique',
	'SHOUT_UNDERLINE'		=> 'Souligner le texte',
	'SHOUT_IMAGE'			=> 'inclure une image',
	'SHOUT_URL'				=> 'inclure une adresse web',
	'SMILIES' 				=> 'Inclure des Smileys',
	'SMILIES_CLOSE' 		=> 'Refermer le panneau des Smileys',
	'SHOUT_MORE_SMILIES'	=> 'Plus de smileys',
	'SHOUT_MORE_SMILIES_ALT' => 'Cliquez ici pour voir plus de smileys',
	'SHOUT_POST_IP'			=> 'IP de l’auteur du message:',
	'SHOUTBOX'				=> '<a href="%1$sindex.html">%2$s</a>',
	'SHOUTBOX_VER'			=> 'Breizh Shoutbox v%s',
	'SHOUTBOX_VER_ALT'		=> 'Breizh Shoutbox v%s © 2011',
	'SHOUTBOX_POPUP'		=> 'Popup Breizh Shoutbox',
	'SHOUT_POP'				=> 'Ouvrir la shoutbox dans une popup',
	'SHOUT_RULES'			=> 'Règles d’utilisation de la shoutbox',
	'SHOUT_RULES_PRIV'		=> 'Règles d’utilisation de la shoutbox Privée',
	'SHOUT_RULES_CLOSE'		=> 'Refermer le panneau des règles d’utilisation',
	'SHOUTBOX_SECRET'		=> 'Shoutbox Privée',
	'SHOUT_PRIV'			=> 'Entrer dans la shoutbox privée',
	'SHOUT_PURGE'			=> 'Purger la shout',
	'SHOUT_PURGE_ALT'		=> 'Purger totalement la shoutbox',
	'SHOUT_PURGE_BOX'		=> "Souhaitez vous réellement purger totalement la shoutbox?   Attention, cette action est irréversible...",
	'PURGE_PROCESS'			=> 'Purge de la shoutbox en cours...',
	'SHOUT_PURGE_ROBOT_ALT'	=> 'Purger la shoutbox des infos robot',
	'SHOUT_PURGE_ROBOT_BOX'	=> 'Souhaitez vous réellement purger la shoutbox des infos robot ?',
	'SERVER_ERR'			=> 'Quelque chose s’est mal déroulé après avoir envoyé une requête au serveur, veuillez rafraichir la page...',
	'SHOUT_ERROR' 			=> 'Erreur: ',
	'SHOUT_IMG_POST_ERROR'	=> 'Erreur: pour insérer une image, vous devez cliquer sur l’icône image...',
	'SHOUT_IMG_DIM_ERROR'	=> 'Erreur: l’image envoyée est corrompue ou n’est pas une image...',
	'SHOUT_IMG_FOPEN_ERROR'	=> 'Erreur: impossible de contacter le serveur hébergeant l’image...',
	'SHOUT_PROCESS_IMG'		=> 'Vérifications de l’image en cours...',

	// Panneau de l'utilisateur
	'MINUTES_CHOICE'		=> 'Vous avez choisi un format de date avec les minutes en décompte: “%s”<br />vous pouvez choisir deux options, soit avoir un son à chaque nouveau message, soit choisir la mise à jour des minutes des messages.',
	'DISPLAY_SOUND_CHOICE'	=> 'Vous pouvez choisir d’activer ou désactiver le son lors de l’arrivée de nouveaux messages',
	'SOUND_OR_NOT'			=> 'Choisissez le réglage qui vous convient',
	'CHOOSE_NEW_SOUND'		=> 'Choisissez le son qui sera diffusé lors des nouveaux messages',
	'CHOOSE_ERROR_SOUND'	=> 'Choisissez le son qui sera diffusé lors des erreurs',
	'CHOOSE_DEL_SOUND'		=> 'Choisissez le son qui sera diffusé lors des suppressions de messages',
	'CHOOSE_NEW_YES'		=> 'Le son choisi sera diffusé lors des nouveaux messages',
	'CHOOSE_ERROR_YES'		=> 'Le son choisi sera diffusé lors des erreurs',
	'CHOOSE_DELETE_YES'		=> 'Le son choisi sera diffusé lors des suppressions de messages',
	'CHOOSE_POSITIONS'		=> 'Positions de la shoutbox',
	'CHOOSE_NEW_NO'			=> 'Aucun son ne sera diffusé lors des nouveaux messages',
	'SHOUT_MINUTES_YES'		=> 'La correction des minutes sera effective',
	'SHOUT_SOUND_MINUTES'	=> 'Correction des minutes',
	'SHOUT_SOUND_YES'		=> 'Activation du son',
	'SHOUT_SOUND_NO'		=> 'Désactivation du son',
	'SHOUT_SOUND_ECOUTE'	=> 'Écouter le son',
	'SHOUT_CONFIG_OPEN'		=> 'Ouvrir le panneau des préférences de la shoutbox',
	'SHOUT_PANEL_USER'		=> 'panneau des réglages utilisateur',
	'SHOUT_PREF_UPDATED'	=> 'Vos préférences pour la shoutbox sont sauvegardées',
	'RETURN_SHOUT_PREF'		=> '%s« Retourner au panneau des préférences%s',
	'SHOUT_DEF_VAL'			=> 'Valeurs par défaut',
	'SHOUT_DEF_VAL_EXPLAIN'	=> 'Revenir aux valeurs par défaut du forum',

	// No permission errors
	'NO_ADMIN_PERM'     	=> 'Pas de permission administrateur trouvée...',
	'NO_EDIT_PERM'			=> 'Vous ne pouvez pas éditer ce message...',
	'NO_DELETE_PERM'    	=> 'Vous n’êtes pas autorisé à supprimer des messages...',
	'NO_DELETE_PERM_S'  	=> 'Vous n’êtes pas autorisé à supprimer vos propres messages...',
	'NO_DELETE_PERM_T'  	=> 'Vous n’êtes pas autorisé à supprimer les messages des autres utilisateurs...',
	'NO_POST_PERM'			=> 'Vous n’êtes pas autorisé à poster des messages...',
	'NO_POST_PERM_GUEST'	=> '...Vous devez être enregistré pour poster des messages, se connecter ici...',
	'NO_PURGE_PERM'			=> 'Vous n’êtes pas autorisé à purger la shoutbox...',
	'NO_PURGE_ROBOT_PERM'	=> 'Vous n’êtes pas autorisé à purger les infos de la shoutbox...',
	'NO_SHOUT_BBCODE' 		=> 'Vous n’êtes pas autorisé à utiliser les BBcodes...',
	'NO_SHOUT_CHARS'		=> 'Vous n’êtes pas autorisé à utiliser les caractères spéciaux...',
	'NO_SHOUT_COLOR'		=> 'Vous n’êtes pas autorisé à utiliser la colorisation du texte...',
	'NO_SHOUT_DEL'			=> 'Vous n’êtes pas autorisé à supprimer le message...',
	'NO_SHOUT_EDIT'         => 'Vous n’êtes pas autorisé à éditer le message...',
	'NO_SHOUT_IMG'			=> 'Vous n’êtes pas autorisé à poster des images...',
	'NO_SHOUT_POP'			=> 'Vous n’êtes pas autorisé à utiliser la shoutbox dans une popup...',
	'NO_SHOW_IP_PERM'   	=> 'Vous n’êtes pas autorisé à voir les ip des posteurs...',
	'NO_SMILIES' 			=> 'Vous n’êtes pas autorisé à utiliser les Smileys...',
	'NO_SMILIE_PERM'    	=> 'Vous n’êtes pas autorisé à poster des smileys...',
	'NO_VIEW_PERM'      	=> 'Vous n’êtes pas autorisé à visionner la shoutbox...',
	'NO_VIEW_PRIV_PERM'     => 'Vous n’êtes pas autorisé à visionner la shoutbox privée...',

	// Post infos Robot
	'SHOUT_SELECT_ROBOT'		=> 'Laisser le robot de la shoutbox publier l’info',
	// Messages d'info du robot
	'SHOUT_GLOBAL_ROBOT'		=> '%1$s %2$s vient de publier une annonce globale: %3$s',
	'SHOUT_ANNOU_ROBOT'			=> '%1$s %2$s vient de publier une annonce: %3$s',
	'SHOUT_POST_ROBOT'			=> '%1$s %2$s vient de publier un nouveau sujet: %3$s',
	'SHOUT_REPLY_ROBOT'			=> '%1$s %2$s vient de répondre à un sujet: %3$s',
	'SHOUT_EDIT_ROBOT'			=> '%1$s %2$s vient d’éditer un message: %3$s',
	'SHOUT_TOPIC_ROBOT'			=> '%1$s %2$s vient d’éditer un sujet: %3$s',
	'SHOUT_LAST_ROBOT'			=> '%1$s %2$s vient d’éditer le dernier message du sujet: %3$s',
	'SHOUT_QUOTE_ROBOT'			=> '%1$s %2$s vient de répondre à un sujet en citant: %3$s',
	'SHOUT_PREZ_ROBOT'			=> '%1$s %2$s vient de publier sa présentation: %3$s',
	'SHOUT_PREZ_F_ROBOT'		=> '%1$s %2$s vient d’éditer une présentation: %3$s',
	'SHOUT_PREZ_FS_ROBOT'		=> '%1$s %2$s vient d’éditer sa présentation: %3$s',
	'SHOUT_PREZ_E_ROBOT'		=> '%1$s %2$s vient d’éditer un message dans une présentation: %3$s',
	'SHOUT_PREZ_ES_ROBOT'		=> '%1$s %2$s vient d’éditer un message dans sa présentation: %3$s',
	'SHOUT_PREZ_L_ROBOT'		=> '%1$s %2$s vient d’éditer le dernier message dans une présentation: %3$s',
	'SHOUT_PREZ_LS_ROBOT'		=> '%1$s %2$s vient d’éditer le dernier message dans sa présentation: %3$s',
	'SHOUT_PREZ_Q_ROBOT'		=> '%1$s %2$s vient de répondre dans une présentation en citant: %3$s',
	'SHOUT_PREZ_R_ROBOT'		=> '%1$s %2$s vient de répondre dans une présentation: %3$s',
	'SHOUT_PREZ_RS_ROBOT'		=> '%1$s %2$s vient de répondre dans sa présentation: %3$s',
	'SHOUT_ENTER_PRIV'			=> '%1$s %2$s vient d’entrer dans la shoutbox privée',
	'SHOUT_PURGE_SHOUT'			=> '%s Purge de la shoutbox effectuée...',
	'SHOUT_PURGE_PRIV'			=> '%s Purge de la shoutbox privée effectuée...',
	'SHOUT_PURGE_ROBOT'			=> '%s Purge des infos Robot effectuée...',
	'SHOUT_PURGE_AUTO'			=> '%s Purge automatique de %s messages de la shoutbox effectuée...',
	'SHOUT_PURGE_PRIV_AUTO'		=> '%s Purge automatique de %s messages de la shoutbox privée effectuée...',
	'SHOUT_DELETE_AUTO'			=> '%s Délestage automatique de %s messages de la shoutbox effectué...',
	'SHOUT_DELETE_PRIV_AUTO'	=> '%s Délestage automatique de %s messages de la shoutbox privée effectué...',
	'SHOUT_BIRTHDAY_ROBOT'		=> 'Toute l’équipe de %1$s souhaite un Joyeux anniversaire à %2$s',
	'SHOUT_BIRTHDAY_ROBOT_FULL'	=> 'Toute l’équipe de %1$s souhaite un Joyeux anniversaire à %2$s pour ses %3$s %4$s ans!',
	'SHOUT_HELLO_ROBOT'			=> 'Bonjour, nous sommes le %1$s %2$s',
	'SHOUT_NEWEST_ROBOT'		=> 'Un nouveau membre vient de s’enregistrer: %1$s, toute l’équipe de %2$s lui souhaite la bienvenue...',
	'SHOUT_ROBBERY_ROBOT'		=> '%1$s %2$s vient de réussir un braquage de %3$s contre %4$s',
	'SHOUT_LOTTERY_ROBOT'		=> '%1$s %2$s vient de remporter le jackpot d’un montant de %3$s %4$s',
	'SHOUT_HANGMAN_ROBOT'		=> '%1$s %2$s vient de résoudre un pendu: %3$s',
	'SHOUT_HANGMAN_C_ROBOT'		=> '%1$s %2$s vient de créer un nouveau pendu: %3$s',
	'SHOUT_SESSION_ROBOT'		=> 'Bonjour %s et bienvenue sur le forum...',
	'SHOUT_SESSION_ROBOT_BOT' 	=> '%1$s %2$s vient de se connecter sur le forum...',
	'SHOUT_TRACKER_ADD_ROBOT' 	=> '%1$s %2$s vient de publier un nouveau ticket dans le traqueur: %3$s',
	'SHOUT_TRACKER_REPLY_ROBOT' => '%1$s %2$s vient de répondre à un ticket dans le traqueur: %3$s',
	'SHOUT_TRACKER_EDIT_ROBOT' 	=> '%1$s %2$s vient d’éditer un ticket dans le traqueur: %3$s',
	'SHOUT_TRACKER_EDIT_P_ROBOT'=> '%1$s %2$s vient d’éditer un message dans le traqueur: %3$s',
	'SHOUT_SUDOKU_ALL_ROBOT'	=> '%1$s %2$s vient de terminer toutes les grilles du sudoku !!',
	'SHOUT_SUDOKU_WIN_ROBOT'	=> '%1$s %2$s vient de terminer une grille au Sudoku: “%3$s”, pack “%4$s”, Pack N°%5$s, jeux N°%6$s',
	'SHOUT_VERSION_ROBOT'		=> '%1$s Attention, la version de votre shoutbox est obsolète! Vous avez la version %2$s et la dernière version est la %3$s. visitez %4$s cette annonce de sortie</a> pour les instructions de mise à jour...',

	// Ajouts version 1.4.0
	'SHOUT_PROTECT'				=> '’',
	'SHOUT_START'				=> 'Shoutbox',
	'SHOUT_AVATAR_NONE'			=> '%s n’a pas d’avatar',
	'SHOUT_ANY'					=> 'Aucun son',
	'CHOOSE_ERROR_NO'			=> 'Aucun son ne sera diffusé lors des erreurs',
	'CHOOSE_DELETE_NO'			=> 'Aucun son ne sera diffusé lors des suppressions de messages',
	'SHOUT_USER_CONFIG'			=> 'Permet de choisir la position haut/bas de la barre de post ainsi que les panneaux smileys, couleurs, caractères spéciaux...',
	'SHOUT_USER_PAGIN'			=> 'Permet de choisir la position de la pagination, soit en bas de la shoutbox, soit à droite de la barre de post.',
	
	// Ajouts version 1.5.0
	'SHOUT_SEP'					=> ' ¦ ',
	'SHOUT_CLOSE'				=> 'Refermer',
	'SHOUT_DIV_CLOSE'			=> 'Refermer le panneau',
	'SHOUT_ROBOT_START'			=> 'Info:', // Au début des infos robot
	'SHOUT_ROBOT_DATE'			=> 'l j F Y', // Forme de la date du jour
	'SHOUT_AUTO'				=> 'Entrez un message...',
	'PICK_COLOR'				=> 'Choisir une couleur en cliquant dans la zone',
	'PICK_BUTON'				=> 'Colorer le texte',
	'SHOUT_CLICK_HERE'			=> 'Cliquez ici pour vous connecter',
	'SHOUT_LOG_ME_IN'			=> 'Connexion auto',
	'SHOUT_HIDE_ME'				=> 'Session invisible',
	'SHOUT_CHOICE_COLOR'		=> 'Changer de palette',
	'SHOUT_JSCOLOR'				=> 'Palette jscolor',
	'SHOUT_PHPBBCOLOR'			=> 'Palette phpbb',
	'SHOUT_PHPBB2COLOR'			=> 'Palette phpbb élargie',
	'SHOUT_ONLINE_TITLE'		=> 'Membres connectés en temps réel',
	'SHOUT_ONLINE'				=> 'Ouvrir le panneau des membres connectés',
	'SHOUT_ONLINE_CLOSE'		=> 'Fermer le panneau des membres connectés',
	'SHOUT_EXEMPLE'				=> 'Voici un exemple de texte mis en forme',
	'SHOUT_PERSO'				=> 'Personnaliser la mise en forme des messages',
	'SHOUT_PERSO_GO'			=> 'Mettre en forme',
	'SHOUT_BBCODE_OPEN'			=> 'BBcodes ouverture',
	'SHOUT_BBCODE_CLOSE'		=> 'BBcodes fermeture',
	'SHOUT_BBCODE_SUCCESS'		=> 'Modifications effectuées',
	'SHOUT_BBCODE_SUP'			=> 'Mise en forme supprimée',
	'SHOUT_BBCODE_ERROR'		=> 'Vous devez renseigner les deux champs',
	'SHOUT_BBCODE_ERROR_COUNT'	=> 'Vous devez avoir autant de bbcodes ouvrants que de bbcodes fermants',
	'SHOUT_BBCODE_ERROR_SHAME'	=> 'Aucune modification effectuée',
	'SHOUT_DIV_BBCODE_CLOSE'	=> 'Refermer le panneau de mise en forme des messages',
	'SHOUT_DIV_BBCODE_EXPLAIN'	=> 'Vous pouvez personnaliser la mise en forme de vos messages dans la shoutbox.<br />Entrez des bbcodes simples, les ouvertures dans la première zone, les fermetures dans la seconde.<br />Attention: respectez bien l’imbrication des bbcodes et n’oubliez pas de bien tous les fermer.<br />Exemple: <em>[b][i] et [/i][/b]</em>',
	'SHOUT_ACTION_TITLE'		=> 'Actions pour l’utilisateur:',
	'SHOUT_ACTION_PROFIL'		=> 'Voir le profil',
	'SHOUT_ACTION_CITE'			=> 'Citer l’utilisateur',
	'SHOUT_ACTION_CITE_ON'		=> 'Pour ',
	'SHOUT_ACTION_CITE_EXPLAIN'	=> 'Citer l’utilisateur dans un message de la shoutbox',
	'SHOUT_ACTION_MSG'			=> 'Envoyer un message personnel dans la shoutbox',
	'SHOUT_ACTION_MSG_ROBOT'	=> 'Envoyer un message en tant que Robot',
	'SHOUT_ACTION_DELETE'		=> 'Supprimer mes messages personnels',
	'SHOUT_ACTION_DELETE_EXPLAIN'=> 'Êtes vous sûr de vouloir supprimer tous vos messages personnels?',
	'SHOUT_ACTION_DEL_REP'		=> 'Tous vos messages personnels ont bien été supprimés:',
	'SHOUT_ACTION_DEL_NO'		=> 'Aucun message personnel supprimé',
	'SHOUT_ACTION_MCP'			=> 'Fiche de suivi',
	'SHOUT_ACTION_BAN'			=> 'Bannir du forum',
	'SHOUT_USER_ADMIN'			=> 'Administrer l’utilisateur',
	'SHOUT_USER_POST'			=> '@MP_',
	'SHOUT_TOO_BIG'				=> 'Votre message est trop long, nombre de caractères: ',
	'SHOUT_TOO_BIG2'			=> 'Le maximum autorisé est de: ',
	'SHOUT_CLICK_SOUND_ON'		=> 'Activer les sons',
	'SHOUT_CLICK_SOUND_OFF'		=> 'Désactiver les sons',
	'SHOUT_CHOICE_NAME'			=> 'Choisir un nom d’utilisateur',
	'SHOUT_CHOICE_YES'			=> 'Nom d’utilisateur mis à jour',
	'SHOUT_CHOICE_NAME_RETURN'	=> 'Vous devez au préalable choisir un nom d’utilisateur.',
	'SHOUT_CHOICE_NAME_ERROR'	=> 'Vous devez au préalable choisir un nom d’utilisateur.\nCliquez sur la dernière icône à droite pour cela...',
	'SHOUT_OUT_TIME'			=> 'temps d’inactivité dépassé, mise en veille automatique...',
));

?>
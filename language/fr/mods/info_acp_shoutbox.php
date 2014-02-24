<?php
/**
*
* Module Breizh Shoutbox [French]
*
* @package language
* @version $Id: info_acp_shoutbox.php 150 16:15 16/12/2011 Sylver35 Exp $ 
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

/**
* NOTE: Most of the language items are used in javascript
* If you want to use quotes or other chars that need escaped, be sure you escape them double
*/
$lang = array_merge($lang, array(
	// Main tab
	'ACP_SHOUTBOX'          		=> 'Breizh Shoutbox',
	// General category
	'ACP_SHOUT_GENERAL_CAT'         => 'Généralités',
		'ACP_SHOUT_VERSION'				=> 'Vérificateur de Version',
		'ACP_SHOUT_VERSION_T'			=> 'Vérificateur de Version de Breizh Shoutbox',
		'ACP_SHOUT_VERSION_T_EXPLAIN'	=> 'Ce vérificateur de Version vous permet d’être au courant sur la dernière version publique de la Breizh Shoutbox.
											<br />Si vous n’avez pas la dernière version, vous pouvez trouver ici toutes les informations sur le téléchargement et la manière de procéder pour faire une mise à jour sans aucuns soucis.',
		'ACP_SHOUT_CONFIGS'				=> 'Configuration générale',
		'ACP_SHOUT_CONFIGS_T'			=> 'Configuration générale de Breizh Shoutbox',
		'ACP_SHOUT_CONFIGS_T_EXPLAIN'  	=> 'Sur cette page, vous pouvez régler tous les différents paramètres généraux de la shoutbox.<br />
										Si vous trouvez un bug, ou si vous souhaitez demander une fonctionnalité, veuillez visitez notre <a href="http://breizh-portal.com/tracker.php">traqueur</a>.<br />
										Avant de poster, veuillez vérifier auparavant si le bug n’ait déjà été signalé ou une fonctionnalité déjà demandée. <br />
										Un grand nombre d’informations sur la shoutbox, le développement et plus peuvent également être trouvés sur notre traceur.<br />
										Si cela touche à la sécurité, veuillez indiquer la sécurité dans le traceur, afin de ne pas la divulguer, mais la résoudre.<br />
										Les autorisations pour la shoutbox peuvent être trouvées dans l’onglet Permissions, puis Permissions des utilisateurs ou des groupes.',
		'ACP_SHOUT_RULES'				=> 'Règles d’utilisation',
		'ACP_SHOUT_RULES_T'				=> 'Panneau des Règles d’utilisation de la Shoutbox',
		'ACP_SHOUT_RULES_T_EXPLAIN'		=> 'Cette page vous permet de définir des règles d’utilisation de la shoutbox.<br />Vous pouvez mettre des règles dans les différents langages activés sur ce forum.',
	// Category for main shoutbox
	'ACP_SHOUT_PRINCIPAL_CAT'		=> 'Shoutbox principale',
		'ACP_SHOUT_OVERVIEW'			=> 'Messages et statistiques',
		'ACP_SHOUT_OVERVIEW_T'			=> 'Messages et statistiques de Breizh Shoutbox',
		'ACP_SHOUT_OVERVIEW_T_EXPLAIN'	=> 'Sur cette page, vous pouvez voir les statistiques de la shoutbox principale.
											<br />Vous pouvez également supprimer des messages ou purger totalement la shoutbox.',
		'ACP_SHOUT_CONFIG_GEN'			=> 'Paramètres shoutbox principale',
		'ACP_SHOUT_CONFIG_GEN_T'		=> 'Paramètres de la shoutbox principale du forum',
		'ACP_SHOUT_CONFIG_GEN_T_EXPLAIN'=> 'Sur cette page, vous pouvez régler tous les différents paramètres de la shoutbox Principale de votre forum.',
	// Category for private shoutbox
	'ACP_SHOUT_PRIVATE_CAT'			=> 'Shoutbox Privée',
		'ACP_SHOUT_PRIVATE'				=> 'Messages et statistiques',
		'ACP_SHOUT_PRIVATE_T'			=> 'Panneau des Messages et statistiques de la shoutbox privée',
		'ACP_SHOUT_PRIVATE_T_EXPLAIN'	=> 'Sur cette page, vous pouvez voir les statistiques de la shoutbox privée.
											<br />Vous pouvez également supprimer des messages ou purger totalement la shoutbox.',
		'ACP_SHOUT_CONFIG_PRIV'			=> 'Paramètres Shoutbox Privée',
		'ACP_SHOUT_CONFIG_PRIV_T'		=> 'Panneau de configuration de la Shoutbox Privée',
		'ACP_SHOUT_CONFIG_PRIV_T_EXPLAIN'=> 'Sur cette page, vous pouvez régler tous les différents paramètres de la shoutbox Privée de votre forum.
											<br />Pour bien régler la permission d’utilisation de cette shoutbox privée, rendez-vous dans les permissions, onglet "Breizh Shoutbox": "Peut accéder à la shoutbox privée"',
	// Category for popup shoutbox
	'ACP_SHOUT_POPUP_CAT'			=> 'Shoutbox en popup',
		'ACP_SHOUT_POPUP'				=> 'Paramètres de la popup',
		'ACP_SHOUT_POPUP_T'				=> 'Paramètres de la popup Breizh Shoutbox',
		'ACP_SHOUT_POPUP_T_EXPLAIN'		=> 'Sur cette page, vous pouvez régler tous les différents paramètres de la shoutbox en popup.<br />Ces réglages concernent aussi la shoutbox en panneau latéral rétractable.',
		// Category for retractable lateral panel
		// Ajout dans la version 1.5.0
		'ACP_SHOUT_PANEL'				=> 'Paramètres du panneau latéral',
		'ACP_SHOUT_PANEL_T'				=> 'Paramètres du panneau latéral rétractable',
		'ACP_SHOUT_PANEL_T_EXPLAIN'		=> 'Sur cette page, vous pouvez régler tous les différents paramètres du panneau latéral rétractable.<br />Notez que ce panneau latéral contient la shoutbox en popup.',
	// Category for smilies
	'ACP_SHOUT_SMILIES_CAT'			=> 'Smileys',
		'ACP_SHOUT_SMILIES'				=> 'Paramètres des Smileys',
		'ACP_SHOUT_SMILIES_T'			=> 'Paramètres des smileys pour la shoutbox',
		'ACP_SHOUT_SMILIES_T_EXPLAIN'	=> 'Sur cette page, vous pouvez configurer les smileys devant être affichés dans la shoutbox.<br />
										Sont affichés tous les smileys présents dans la base de données, indifférement de ceux affichés sur la page de rédaction des messages.<br />
										Pour spécifier quels smileys doivent apparaitre ou non, il vous suffit de cliquer sur "Activer l’affichage" ou "Envoyer dans la popup".<br />
										Si vous souhaitez modifier l’ordre d’affichage ou un autre paramètre des smileys, rendez-vous <a href="%s" title="Page de gestion des smileys">sur cette page</a>.',
	// Category for robot
	'ACP_SHOUT_ROBOT_CAT'			=> 'Robot de la shoutbox',
		'ACP_SHOUT_ROBOT'				=> 'Configuration du Robot',
		'ACP_SHOUT_ROBOT_T'				=> 'Configuration du Robot de Breizh Shoutbox',
		'ACP_SHOUT_ROBOT_T_EXPLAIN'		=> 'Sur cette page, vous pouvez régler tous les différents points de configuration du Robot de la shoutbox.
											<br />Certains paramètres sont soit pour la shoutbox principale, soit pour la shoutbox privée.',
		'ACP_SHOUT_ROBOT_MOD'			=> 'Robot des Mods',
		'ACP_SHOUT_ROBOT_MOD_T'			=> 'Paramètres du Robot dans des Mods optionnels',
		'ACP_SHOUT_ROBOT_MOD_T_EXPLAIN'	=> 'Sur cette page, vous pouvez régler tous les différents paramètres du Robot de la shoutbox pour des Mods compatibles avec Breizh Shoutbox.',
	
	// Language for Logs
	'LOG_SHOUT_CONFIGS'				=> '<strong>Mise à jour de la configuration générale de Breizh Shoutbox.</strong>',
	'LOG_SHOUT_CONFIG_GEN'			=> '<strong>Mise à jour des paramètres de la Shoutbox générale.</strong>',
	'LOG_SHOUT_CONFIG_PRIV'			=> '<strong>Mise à jour des paramètres de la Shoutbox privée.</strong>',
	'LOG_SHOUT_RULES'				=> '<strong>Mise à jour des règles de Breizh Shoutbox.</strong>',
	'LOG_SHOUT_POPUP'				=> '<strong>Mise à jour des paramètres de la popup Breizh Shoutbox.</strong>',
	'LOG_SHOUT_ROBOT'				=> '<strong>Mise à jour des paramètres du Robot Breizh Shoutbox.</strong>',
	'LOG_SHOUT_ROBOT_MOD'			=> '<strong>Mise à jour des paramètres du Robot Breizh Shoutbox pour les Mods.</strong>',
	'LOG_PURGE_SHOUTBOX'			=> '<strong>Purge de tous les Messages de la Shoutbox.</strong>',
	'LOG_PURGE_SHOUTBOX_ROBOT'		=> '<strong>Purge de certaines infos de Robot de la Shoutbox.</strong>',
	'LOG_PURGE_SHOUTBOX_PRIV'		=> '<strong>Purge de tous les Messages de la Shoutbox privée.</strong>',
	'LOG_PURGE_SHOUTBOX_PRIV_ROBOT'	=> '<strong>Purge de certaines infos de Robot de la Shoutbox privée.</strong>',
	'LOG_SELECT_SHOUTBOX'			=> '<strong>Suppression de %s Message sélectionné de la Shoutbox.</strong>',
	'LOG_SELECTS_SHOUTBOX'			=> '<strong>Suppression de %s Messages sélectionnés de la Shoutbox.</strong>',
	'LOG_SELECT_SHOUTBOX_PRIV'		=> '<strong>Suppression de %s Message sélectionné de la Shoutbox privée.</strong>',
	'LOG_SELECTS_SHOUTBOX_PRIV'		=> '<strong>Suppression de %s Messages sélectionnés de la Shoutbox privée.</strong>',
	'LOG_LOG_SHOUTBOX'				=> '<strong>Suppression de %s entrée sélectionnée du log utilisateurs (shoutbox).</strong>',
	'LOG_LOGS_SHOUTBOX'				=> '<strong>Suppression de %s entrées sélectionnées du log utilisateurs (shoutbox).</strong>',
	'LOG_LOG_SHOUTBOX_PRIV'			=> '<strong>Suppression de %s entrée sélectionnée du log utilisateurs (shoutbox privée).</strong>',
	'LOG_LOGS_SHOUTBOX_PRIV'		=> '<strong>Suppression de %s entrées sélectionnées du log utilisateurs (shoutbox privée).</strong>',
	'LOG_SHOUT_UPDATED'				=> '<strong>Mise à jour de Breizh Shoutbox version %1$s vers %2$s</strong>',
	'LOG_SHOUT_UPGRADED'			=> '<strong>Révision de Breizh Shoutbox version %1$s vers %2$s</strong>',
	'LOG_SHOUT_INSTALL_DATABASE'	=> '<strong>Création des tables shoutbox et ajouts des données dans la table config<strong>',
	'LOG_SHOUT_UPDATE_DATABASE'		=> '<strong>Mise à jour de la table config pour Breizh Shoutbox<strong>',
	'LOG_SHOUT_PANEL'          		=> '<strong>Mise à jour des paramètres du panneau latéral rétractable</strong>', // Ajout dans la version 1.5.0
	'LOG_SHOUT_PRUNED'          	=> '<strong>Breizh Shoutbox délestée</strong>',
	'LOG_SHOUT_PRIV_PRUNED'         => '<strong>Breizh Shoutbox privée délestée</strong>',
	'LOG_SHOUT_REMOVED'         	=> '<strong>Délestage automatique de %1$s messages de la shoutbox.</strong>',
	'LOG_SHOUT_PRIV_REMOVED'        => '<strong>Délestage automatique de %1$s messages de la shoutbox privée.</strong>',
	'LOG_SHOUT_PURGED'         		=> '<strong>Purge temporelle automatique de %1$s messages de la shoutbox.</strong>',
	'LOG_SHOUT_PRIV_PURGED'         => '<strong>Purge temporelle automatique de %1$s messages de la shoutbox privée.</strong>',
	'LOG_SHOUT_SCRIPT'				=> '<strong>Tentative de post de script dans la shoutbox.</strong>',
	'LOG_SHOUT_APPLET'				=> '<strong>Tentative de post d’applet dans la shoutbox.</strong>',
	'LOG_SHOUT_ACTIVEX'				=> '<strong>Tentative de post d’objet active x dans la shoutbox.</strong>',
	'LOG_SHOUT_OBJECTS'				=> '<strong>Tentative de post d’objet chrome ou about dans la shoutbox.</strong>',
	'LOG_SHOUT_IFRAME'				=> '<strong>Tentative de post d’iframe dans la shoutbox.</strong>',
	'LOG_SHOUT_PRUNED_PRIV'         => '<strong>Breizh Shoutbox privée délestée</strong>',
	'LOG_SHOUT_REMOVED_PRIV'        => '<strong>Suppression automatique de %1$s messages de la shoutbox privée.</strong>',
	'LOG_SHOUT_PURGED_PRIV'         => '<strong>Purge temporelle automatique de %1$s messages de la shoutbox privée.</strong>',
	'LOG_SHOUT_SCRIPT_PRIV'			=> '<strong>Tentative de post de script dans la shoutbox privée.</strong>',
	'LOG_SHOUT_APPLET_PRIV'			=> '<strong>Tentative de post d’applet dans la shoutbox privée.</strong>',
	'LOG_SHOUT_ACTIVEX_PRIV'		=> '<strong>Tentative de post d’objet active x dans la shoutbox privée.</strong>',
	'LOG_SHOUT_OBJECTS_PRIV'		=> '<strong>Tentative de post d’objet chrome ou about dans la shoutbox privée.</strong>',
	'LOG_SHOUT_IFRAME_PRIV'			=> '<strong>Tentative de post d’iframe dans la shoutbox privée.</strong>',
	
	'SHOUT_SMILIES_ON'				=> 'Activer l’affichage',
	'SHOUT_SMILIES_POP'				=> 'Envoyer dans la popup',
	'DISPLAY_ON_SHOUTBOX'			=> 'Préférences d’affichage dans la shoutbox',
	'SHOUT_RULES_ACTIVE'			=> 'Règles de la shoutbox',
	'SHOUT_RULES_ACTIVE_EXPLAIN'	=> 'Activer/Désactiver les règles de la shoutbox.<br /> Devient nul si aucune règle n’est écrite.',
	'SHOUT_RULES_ON'				=> 'Règles en langage “%s”',
	'SHOUT_RULES_ON_EXPLAIN'		=> 'Entrez ici les Règles dans la langue “%s” pour la shoutbox générale.<br />Les bbcodes, les liens et les smileys sont activés.',
	'SHOUT_RULES_ON_PRIV_EXPLAIN'	=> 'Entrez ici les Règles dans la langue “%s” pour la shoutbox privée.<br />Les bbcodes, les liens et les smileys sont activés.',
	'SHOUT_RULES_VIEW'				=> 'Visualisation des Règles shoutbox générale:',
	'SHOUT_RULES_VIEW_PRIV'			=> 'Visualisation des Règles shoutbox privée:',
	'SMILIES_EMOTION'				=> 'émotion du smiley',
	'SMILIES_OVERVIEW'				=> 'Smileys affichés dans la shoutbox',
	'SMILIES_POPUP'					=> 'Smileys affichés dans la popup',
	'SMILIES_DISPLAYED'				=> 'Affichage activé',
	'SMILIES_NO_DISPLAYED'			=> 'Affichage dans la popup',
	'SMILIES_CLIC_NO'				=> 'Cliquez pour afficher ce smiley dans la popup',
	'SMILIES_CLIC_YES'				=> 'Cliquez pour afficher ce smiley',
	'SMILIES_WIDTH'					=> 'Largeur de la popup smileys',
	'SMILIES_WIDTH_EXPLAIN'			=> 'Indiquez la largeur de la popup des smileys supplémentaires en pixels.',
	'SMILIES_HEIGHT'				=> 'Hauteur de la popup smileys',
	'SMILIES_HEIGHT_EXPLAIN'		=> 'Indiquez la hauteur de la popup des smileys supplémentaires en pixels.',
	'ORDER'							=> 'ordre',
	'SHOUT_AVATAR'					=> 'Affichage des avatars',
	'SHOUT_AVATAR_EXPLAIN'			=> 'Indiquez si vous souhaitez activer l’affichage des avatars des utilisateurs.',
	'SHOUT_AVATAR_HEIGHT'			=> 'Dimension des avatars',
	'SHOUT_AVATAR_HEIGHT_EXPLAIN'	=> 'Indiquez ici la hauteur des avatars en pixels, la largeur est calculée automatiquement.',
	'SHOUT_AVATAR_ROBOT'			=> 'Avatar du robot',
	'SHOUT_AVATAR_ROBOT_EXPLAIN'	=> 'Activer/Désactiver l’avatar du robot <em>si les avatars sont activés</em>.',
	'SHOUT_STATS'      				=> 'Messages de la Shoutbox',
	'SHOUT_DATE_LAST_RUN'			=> 'Date du dernier délestage automatique',
	'SHOUT_LOGS'      				=> 'Tentatives de post interdites',
	'SHOUT_LOGS_EXPLAIN'      		=> 'Nombre total de tentatives de post d’éléments interdits dans la shoutbox',
	'NUMBER_LOG_TOTAL' 				=> '<strong>%s</strong> tentative depuis le %s',
	'NUMBER_LOGS_TOTAL' 			=> '<strong>%s</strong> tentatives depuis le %s',
	'NUMBER_SHOUTS' 				=> 'Nombre total de messages',
	'SHOUT_VERSION'    				=> 'Version de la shoutbox',
	'SHOUT_STATISTICS'    			=> 'Statistiques',
	'SHOUT_OPTIONS'    				=> 'Purge de la Shoutbox',
	'PURGE_SHOUT'      				=> 'Supprimer tous les messages',
	'PURGE_SHOUT_MESSAGES'      	=> 'Supprimer les messages',
	'PURGE_SHOUT_ROBOT'      		=> 'Supprimer les infos du Robot',
	'PURGE_SHOUT_ROBOT_EXPLAIN'     => 'Vous pouvez supprimer les infos du Robot en fonction du type d’info...',
	'UNABLE_CONNECT'    			=> 'Impossibilité de se connecter au serveur de la vérification de version, message d’erreur: %s',
	'NEW_VERSION'       			=> 'Votre version de Breizh Shoutbox n’est pas à jour. Votre version est <strong>%1$s</strong>, la version la plus récente est <strong>%2$s</strong>. Lisez la suite pour plus d’informations',
	'NO_MESSAGE' 					=> 'Il n’y a aucun message',
	'NO_SHOUT_LOG' 					=> 'Il n’y a aucune entrée',
	'NUMBER_MESSAGE' 				=> '<strong>%s</strong> message',
	'NUMBER_MESSAGES' 				=> '<strong>%s</strong> messages',
	'NUMBER_LOG' 					=> '<strong>%s</strong> entrée',
	'NUMBER_LOGS' 					=> '<strong>%s</strong> entrées',
	'SHOUT_DEL_MAIN'    			=> 'Messages supprimés',
	'SHOUT_DEL_ACP'    				=> 'Nombre de messages supprimés dans l’acp:',
	'SHOUT_DEL_AUTO'    			=> 'Nombre de messages supprimés automatiquement:',
	'SHOUT_DEL_PURGE'    			=> 'Nombre de messages supprimés lors d’une purge:',
	'SHOUT_DEL_USER'    			=> 'Nombre de messages supprimés par les utilisateurs:',
	'SHOUT_DEL_NR'    				=> '<strong>%s</strong> message supprimé',
	'SHOUT_DEL_NRS'    				=> '<strong>%s</strong> messages supprimés',
	'SHOUT_DEL_TOTAL'    			=> ' au total',
	'SHOUT_MAX_CHARS'				=> 'caractères',
	'SHOUT_MODS_DISPO'				=> 'Liste des Mods compatibles avec Breizh Shoutbox',
	'SHOUT_FILE'    				=> 'Aucune version n’est compatible d’origine, faites les modifications demandées',
	'SHOUT_FILE_OK'    				=> 'la version qui est compatible d’origine avec Breizh Shoutbox est la: ',
	'SHOUT_FILE_LIEN'    			=> 'Pour obtenir les modifications à faire, consultez: ',
	'SHOUT_FILE_GO'    				=> 'Forum des options pour Breizh Shoutbox',
	'SHOUT_ENABLE'					=> 'Activation de la shoutbox',
	'SHOUT_ENABLE_EXPLAIN'			=> 'Activer/Désactiver la shoutbox ainsi que l’ensemble des fonctions qui s’y rapportent.',
	'SHOUT_WIDTH_POST'				=> 'Dimension de la zone de post',
	'SHOUT_WIDTH_POST_PRO_EXPLAIN'	=> 'Choisissez ici la longueur de la zone de saisie des messages de la shoutbox (en pixels) pour tous les styles issus de <strong><em>prosilver</em></strong>',
	'SHOUT_WIDTH_POST_SUB_EXPLAIN'	=> 'Choisissez ici la longueur de la zone de saisie des messages de la shoutbox (en pixels) pour tous les styles issus de <strong><em>subsilver2</em></strong>',
	'SHOUT_CONFIG_TITLE'			=> 'Titre de la shoutbox',
	'SHOUT_CONFIG_TITLE_EXPLAIN'	=> 'Vous pouvez choisir un titre pour votre shoutbox, il se trouve à gauche, notez qu’il sera mis automatiquement en majuscules',
	'SHOUT_PRUNE_TIME'				=> 'Temps de délestage',
	'SHOUT_PRUNE_TIME_EXPLAIN'		=> 'Le temps où les messages sont automatiquement délestés. Si ce paramètre est à 0 ou si le paramètre de nombre maximum de messages dans la BDD est activé, ce paramètre est annulé.',
	'SHOUT_MAX_POSTS'				=> 'Nombre maximum de messages dans la BDD',
	'SHOUT_MAX_POSTS_EXPLAIN'		=> 'Entrez 0 pour désactiver ce paramètre. Si activé, le paramètre de temps de délestage sera <strong>annulé</strong> automatiquement!<br />La différence entre ce paramètre et le nombre maxi à afficher fait office d’archives.',
	'SHOUT_MAX_POSTS_ON'			=> 'Nombre maxi de messages à afficher',
	'SHOUT_MAX_POSTS_ON_EXPLAIN'	=> 'Ceci vous permet de spécifier le nombre maximum de messages devant être affichés dans la shoutbox, indépendamment du nombre maximum.',
	'SHOUT_CORRECT'         		=> 'Correction des minutes',
	'SHOUT_CORRECT_EXPLAIN'         => 'Activer ce paramètre permet de faire corriger automatiquement l’affichage des minutes de l’heure des messages si l’utilisateur utilise un format de date contenant "il y a moins d’une minute" <em>(Auto refresh)</em>. Ceci ne touche que les messages de moins d’une heure.',
	'SHOUT_FLOOD_INTERVAL'         	=> 'Intervale de Flood',
	'SHOUT_FLOOD_INTERVAL_EXPLAIN' 	=> 'Temps minimum entre 2 messages pour les utilisateurs. Régler 0 pour le désactiver. Une permission utilisateur existe pour l’ignorer',
	'SHOUT_IE_NR'					=> 'Nombre de messages par page pour IE &lt; 9 et téléphones mobiles',
	'SHOUT_IE_NR_EXPLAIN'			=> 'Le nombre de messages par page pour Internet Explorer &lt; 9 et téléphones mobiles. Vous devez ne pas le mettre trop haut. (scrool impossible avec ces navigateurs).<br />Ceci détermine aussi la hauteur de la div des messages.',
	'SHOUT_NR_ACP'					=> 'Nombre de messages dans l’acp',
	'SHOUT_NR_ACP_EXPLAIN'			=> 'Choisissez le nombre de messages par page dans l’acp, onglets "Messages et Statistiques".',
	'SHOUT_MAX_POST_CHARS'			=> 'Nombre maximum de caractères',
	'SHOUT_MAX_POST_CHARS_EXPLAIN'	=> 'Choisissez le nombre maximum de caractères qu’il est possible de poster dans un message.<br />Notez qu’il existe une permission pour ignorer cette limite',
	'SHOUT_IE_NR_POP_EXPLAIN'		=> 'Le nombre de messages par page pour Internet Explorer &lt; 9 et téléphones mobiles. (scrool impossible avec ces navigateurs).<br />Ceci détermine aussi la hauteur de la div des messages.',
	'SHOUT_NON_IE_NR'				=> 'Nombre de messages par page',
	'SHOUT_NON_IE_NR_EXPLAIN'		=> 'Le nombre de messages par page pour les navigateurs autres que IE &lt; 9 et téléphones mobiles.',
	'SHOUT_BACKGROUND_COLOR'		=> 'Image de fond de la shoutbox',
	'SHOUT_BACKGROUND_COLOR_EXPLAIN'=> 'Choisissez l’image de fond de la shoutbox pour tous les styles issus de <strong><em>prosilver</em></strong>',
	'SHOUT_BACKGROUND_SUB_COLOR_EXPLAIN'=> 'Choisissez l’image de fond de la shoutbox pour tous les styles issus de <strong><em>subsilver2</em></strong>',
	'SHOUT_BUTTON_BACKGROUND'		=> 'Image de fond sous les boutons',
	'SHOUT_BUTTON_BACKGROUND_EXPLAIN'=> 'Choisissez d’afficher ou non l’image de fond sous les boutons de gauche',
	'SHOUT_HEIGHT'					=> 'Hauteur de la div des messages',
	'SHOUT_HEIGHT_EXPLAIN'			=> 'Pour les navigateurs autres que IE &lt; 9 et téléphones mobiles, déterminez ici la hauteur de la div des messages dans la shoutbox. <em>Défaut: 150</em>',
	'SHOUT_HEIGHT_POP_EXPLAIN'		=> 'Pour les navigateurs autres que IE &lt; 9 et téléphones mobiles, déterminez ici la hauteur de la div des messages dans la shoutbox. <em>Défaut: 460</em>',
	'SHOUT_POSITION_INDEX'			=> 'Position de la shoutbox sur l’index',
	'SHOUT_POSITION_INDEX_EXPLAIN'	=> 'Déterminez quelle position vous souhaitez attribuer à la shoutbox sur la page d’index du forum.',
	'SHOUT_POSITION_FORUM'			=> 'Position de la shoutbox sur viewforum',
	'SHOUT_POSITION_FORUM_EXPLAIN'	=> 'Déterminez quelle position vous souhaitez attribuer à la shoutbox sur les pages de vue des forums (viewforum).',
	'SHOUT_POSITION_TOPIC'			=> 'Position de la shoutbox sur viewtopic',
	'SHOUT_POSITION_TOPIC_EXPLAIN'	=> 'Déterminez quelle position vous souhaitez attribuer à la shoutbox sur les pages de vue des messages (viewtopic).',
	'SHOUT_POSITION_PORTAL'			=> 'Position de la shoutbox sur le portail',
	'SHOUT_POSITION_PORTAL_EXPLAIN'	=> 'Déterminez quelle position vous souhaitez attribuer à la shoutbox sur la page portail du forum.',
	'SHOUT_POSITION_ANOTHER'		=> 'Position de la shoutbox sur les pages supplémentaires',
	'SHOUT_POSITION_ANOTHER_EXPLAIN'=> 'Déterminez quelle position vous souhaitez attribuer à la shoutbox sur les pages supplémentaires du forum.',
	'SHOUT_INDEX_ON'				=> 'Affichage sur la page index',
	'SHOUT_INDEX_ON_EXPLAIN'		=> 'Déterminez si vous souhaitez afficher la shoutbox sur la page index',
	'SHOUT_FORUM_ON'				=> 'Affichage dans la vue des forums',
	'SHOUT_FORUM_ON_EXPLAIN'		=> 'Déterminez si vous souhaitez afficher la shoutbox sur les pages des forums (viewforum)',
	'SHOUT_TOPIC_ON'				=> 'Affichage dans la vue des topics',
	'SHOUT_TOPIC_ON_EXPLAIN'		=> 'Déterminez si vous souhaitez afficher la shoutbox sur les pages des topics (viewtopic)',
	'SHOUT_ANOTHER_ON'				=> 'Affichage dans les pages supplémentaires',
	'SHOUT_ANOTHER_ON_EXPLAIN'		=> 'Déterminez si vous souhaitez afficher la shoutbox sur les pages supplémentaires.<br />(Assurez-vous d’avoir entré les lignes de codes dans les fichiers .php et .html correspondants)',
	'SHOUT_PORTAL_ON'				=> 'Affichage sur le portail',
	'SHOUT_PORTAL_ON_EXPLAIN'		=> 'Déterminez si vous souhaitez afficher la shoutbox sur le portail du forum.<br />(Assurez-vous d’avoir entré les lignes de codes dans portal.php et portal_body.html)',
	'SHOUT_ON_CRON'					=> 'Activation des suppressions et délestages automatiques',
	'SHOUT_ON_CRON_EXPLAIN'			=> 'Déterminez si vous souhaitez activer les suppressions et délestages automatiques des messages.',
	'SHOUT_LOG_CRON'				=> 'Log des suppressions et délestages automatiques',
	'SHOUT_LOG_CRON_EXPLAIN'		=> 'Déterminez si vous souhaitez faire inscrire dans le log admin les suppressions et délestages automatiques des messages.',
	'SHOUT_SEE_BUTTONS'				=> 'Affichage des icônes supérieurs',
	'SHOUT_SEE_BUTTONS_EXPLAIN'		=> 'Déterminez si vous souhaitez faire afficher les icônes supérieurs malgré que l’utilisateur ne possède pas les permissions de les utiliser (vue du cadenas au passage de la souris).',
	'SHOUT_SEE_BUTTONS_LEFT'		=> 'Affichage des icônes gauche',
	'SHOUT_SEE_BUTTONS_LEFT_EXPLAIN'=> 'Déterminez si vous souhaitez faire afficher les icônes situés à gauche des messages malgré que l’utilisateur ne possède pas les permissions de les utiliser (vue du cadenas au passage de la souris).',
	'SHOUT_POP_HEIGHT'				=> 'Hauteur de la popup',
	'SHOUT_POP_HEIGHT_EXPLAIN'		=> 'Déterminez la Hauteur de la popup de la shoutbox',
	'SHOUT_POP_WIDTH'				=> 'Largeur de la popup',
	'SHOUT_POP_WIDTH_EXPLAIN'		=> 'Déterminez la largeur de la popup de la shoutbox',
	'SHOUT_MESSAGES_TOTAL'			=> 'Nombre de messages au total',
	'SHOUT_MESSAGES_TOTAL_EXPLAIN'	=> 'Nombre de messages postés au total depuis l’installation de la Breizh Shoutbox.',
	'SHOUT_MESSAGES_TOTAL_NR'		=> '<strong>%s</strong> messages postés depuis le %s',
	'SHOUT_POSITION_TOP'			=> 'En haut de la page',
	'SHOUT_POSITION_AFTER'			=> 'Après la liste des forums',
	'SHOUT_POSITION_END'			=> 'En bas de la page',
	'SHOUTBOX_VERSION_COPY'			=> '<a href="http://breizh-portal.com/mod-breizh-shoutbox-f21.html">Breizh Shoutbox v%s © 2010, 2011</a>',
	'SHOUT_COPY'					=> '<a href="%1$smod-breizh-shoutbox-f21.html">%2$s</a>',
	'SHOUTBOX'						=> '<a href="%1$sindex.html">%2$s</a>',
	'SHOUTBOX_VERSION_ACP_COPY'		=> '- - - - - - - - - - - - - - - - - - - - - -<br /><a href="http://breizh-portal.com/mod-breizh-shoutbox-f21.html" onclick="this.target=\'_blank\';">Breizh Shoutbox v%s</a> © 2010, 2011 - <a href="http://breizh-portal.com/index.html" onclick="this.target=\'_blank\';">Breizh-Portal</a> - The Breizh Touch',
	'SHOUT_TOUCH_COPY'				=> '<span style="font-size: 11px">Breizh Shoutbox © 2010, 2011 <a href="http://breizh-portal.com/index.html">The Breizh touch</a></span>',
	'SHOUT_VERSION_UP_TO_DATE'		=> 'Votre installation est à jour, aucune mise à jour n’est disponible pour votre version de Breizh Shoutbox: v%s. Vous n’avez pas besoin de mettre à jour votre installation.',
	'SHOUT_NO_VERSION'				=> '<span style="color: red">Echec pour obtenir l’information de la dernière version...</span>',
	'SHOUT_MESSAGES'      			=> 'messages',
	'SHOUT_PAGES'      				=> 'pages',
	'SHOUT_SECONDES'      			=> 'secondes',
	'SHOUT_APERCU'      			=> 'aperçu: ',
	'SHOUT_DATE'      				=> 'date',
	'SHOUT_USER'      				=> 'utilisateur',
	'SHOUT_HOURS'					=> 'Heures',
	'SHOUT_PIXELS'					=> 'Pixels',
	'SHOUT_NEVER'      				=> 'Jamais effectué',
	'SHOUT_LOG_ENTRIE'      		=> 'Type de tentative effectuée',
	'SHOUT_NO_ADMIN'				=> 'Vous ne disposez pas des droits d’administration et ne pouvez pas accéder à ces ressouces...',
	'SHOUT_SERVER_HOUR'				=> 'L’heure actuelle du serveur est: %s heure %s',
	'SHOUT_SERVER_HOURS'			=> 'L’heure actuelle du serveur est: %s heures %s',
	'SHOUT_BAR'						=> 'Position de la barre de post',
	'SHOUT_BAR_EXPLAIN'				=> 'Choisissez si vous souhaitez afficher la barre de post en haut ou en bas de la shoutbox.',
	'SHOUT_PAGIN'					=> 'Position de la pagination',
	'SHOUT_PAGIN_EXPLAIN'			=> 'Choisissez si vous souhaitez afficher la pagination à droite, dans la barre de post ou en bas de la shoutbox.',
	'SHOUT_BAR_TOP'					=> 'En haut de la shoutbox',
	'SHOUT_BAR_BOTTOM'				=> 'En bas de la shoutbox',
	'SHOUT_PAGIN_IN'				=> 'À droite, dans la barre',
	'SHOUT_PAGIN_BOTTOM'			=> 'En bas de la shoutbox',
	'SHOUT_SOUND_NEW'				=> 'Son des nouveaux messages',
	'SHOUT_SOUND_NEW_EXPLAIN'		=> 'Choisissez le son qui sera activé par defaut pour l’arrivée des nouveaux messages.',
	'SHOUT_SOUND_ERROR'				=> 'Son des erreurs',
	'SHOUT_SOUND_ERROR_EXPLAIN'		=> 'Choisissez le son qui sera activé par defaut pour les erreurs.',
	'SHOUT_SOUND_DEL'				=> 'Son des suppressions',
	'SHOUT_SOUND_DEL_EXPLAIN'		=> 'Choisissez le son qui sera activé par defaut pour les suppressions de messages',
	'SHOUT_ALL_MESSAGES'			=> ' tous les messages des shoutbox,',
	'SHOUT_PANEL'					=> 'Panneau latéral rétractable',
	'SHOUT_PANEL_EXPLAIN'			=> 'Activer le panneau latéral rétractable dans toutes les pages du forum ne comportant pas la shoutbox, sauf dans les pages exclues.',
	'SHOUT_PANEL_ALL'				=> 'Panneau latéral rétractable partout',
	'SHOUT_PANEL_ALL_EXPLAIN'		=> 'Activer le panneau latéral rétractable en plus dans les pages comportant déjà la shoutbox.',
	
	// Robot
	'SHOUT_ROBOT_ACTIVATE'			=> 'Activer le Robot',
	'SHOUT_ROBOT_ACTIVATE_EXPLAIN'	=> 'Mettre à non désactive totalement l’ensemble des fonctions Robot dans les shoutbox.<br /><em>Ne désactive pas les infos d’entrées dans la shoutbox privée.</em>',
	'SHOUT_ROBOT_MESSAGE'			=> 'Robot des messages',
	'SHOUT_ROBOT_MESSAGE_EXPLAIN'	=> 'Activer les Infos de nouveaux messages/sujets dans la shoutbox principale.',
	'SHOUT_ROBOT_REP'				=> 'Réponses aux sujets',
	'SHOUT_ROBOT_REP_EXPLAIN'		=> 'Activer les Infos de réponses aux sujets dans la shoutbox principale.',
	'SHOUT_ROBOT_EDIT'				=> 'Édition des messages',
	'SHOUT_ROBOT_EDIT_EXPLAIN'		=> 'Activer les Infos d’édition des messages dans la shoutbox principale.',
	'SHOUT_ROBOT_MES_PRIV'			=> 'Robot des messages shout privée',
	'SHOUT_ROBOT_MES_PRIV_EXPLAIN'	=> 'Activer les Infos de nouveaux messages/sujets dans la shoutbox privée.',
	'SHOUT_ROBOT_REP_PRIV'			=> 'Réponses aux sujets shout privée',
	'SHOUT_ROBOT_REP_PRIV_EXPLAIN'	=> 'Activer les Infos de réponses aux sujets dans la shoutbox privée.',
	'SHOUT_ROBOT_EDIT_PRIV'			=> 'Édition des messages shout privée',
	'SHOUT_ROBOT_EDIT_PRIV_EXPLAIN'	=> 'Activer les Infos d’édition des messages dans la shoutbox privée.',
	'SHOUT_ROBOT_DEL'				=> 'Délestages et purges automatiques',
	'SHOUT_ROBOT_DEL_EXPLAIN'		=> 'Active/désactive les messages de délestages et purges automatiques dans les shoutbox.',
	'SHOUT_ROBOT_PREZ'				=> 'Forum de présentation',
	'SHOUT_ROBOT_PREZ_EXPLAIN'		=> 'Choisissez le forum de présentation des membres si vous en avez un.<br />Le Robot diffusera des infos adaptées.',
	'SHOUT_ROBOT_EXCLU'				=> 'Forums exclus',
	'SHOUT_ROBOT_EXCLU_EXPLAIN'		=> 'sélectionnez les forums pour lesquels vous ne souhaitez pas rendre publique la parution des nouveaux messages.<br />=> Notez que les affichages des infos dépendent des droits de vues des forums.',
	'SHOUT_ROBOT_COLOR'				=> 'Couleur du Robot',
	'SHOUT_ROBOT_COLOR_INFO'		=> 'Couleur des messages/infos:',
	'SHOUT_ROBOT_SESSION'			=> 'Robot des sessions',
	'SHOUT_ROBOT_SESSION_EXPLAIN'	=> 'Active/désactive le message de bienvenue à chaque utilisateurs quand ils se connectent sur le forum.',
	'SHOUT_ROBOT_SESSION_PRIV'		=> 'Robot des sessions dans la shoutbox privée',
	'SHOUT_ROBOT_SESSION_PRIV_EXPLAIN'=> 'Active/désactive le message de bienvenue à chaque utilisateurs quand ils se connectent sur le forum dans la shoutbox privée.',
	'SHOUT_ROBOT_SESSION_R'			=> 'Robot des sessions des robots',
	'SHOUT_ROBOT_SESSION_R_EXPLAIN'	=> 'Active/désactive la notification de connection des robots quand ils se connectent au forum.',
	'SHOUT_ROBOT_SESSION_R_PRIV'	=> 'Robot des sessions des robots shoutbox privée',
	'SHOUT_ROBOT_SESSION_R_PRIV_EXPLAIN'=> 'Active/désactive les notifications dans la shoutbox privée, de connexions des robots quand ils se connectent au forum.',
	'SHOUT_ROBOT_HELLO'				=> 'Robot de la date du jour',
	'SHOUT_ROBOT_HELLO_EXPLAIN'		=> 'Active/désactive la notification de la date du jour.',
	'SHOUT_ROBOT_HELLO_PRIV'		=> 'Robot de la date du jour shoutbox privée',
	'SHOUT_ROBOT_HELLO_PRIV_EXPLAIN'=> 'Active/désactive la notification de la date du jour dans la shoutbox privée',
	'SHOUT_ROBOT_BIRTHDAY'			=> 'Robot des anniversaires',
	'SHOUT_ROBOT_BIRTHDAY_EXPLAIN'	=> 'Active/désactive les notifications des anniversaires.',
	'SHOUT_ROBOT_BIRTHDAY_PRIV'		=> 'Robot des anniversaires shoutbox privée',
	'SHOUT_ROBOT_BIRTHDAY_PRIV_EXPLAIN'	=> 'Active/désactive la notification des anniversaires dans la shoutbox privée soient diffusées.',
	'SHOUT_ROBOT_CRON_H'			=> 'Horaire des infos de date et anniversaires',
	'SHOUT_ROBOT_CRON_H_EXPLAIN'	=> 'Indiquez ici l’heure à laquelle vous souhaitez que les infos de la date du jour et des anniversaires soient diffusées. <em>(format 24 heures)</em>',
	'SHOUT_ROBOT_NEWEST'			=> 'Robot des nouvelles inscriptions',
	'SHOUT_ROBOT_NEWEST_EXPLAIN'	=> 'Active/désactive la notification des nouvelles inscriptions d’utilisateurs sur ce forum, dans la shoutbox générale.',
	'SHOUT_ROBOT_NEWEST_PRIV'		=> 'Robot des nouvelles inscriptions shoutbox privée',
	'SHOUT_ROBOT_NEWEST_PRIV_EXPLAIN'=> 'Active/désactive la notification des nouvelles inscriptions d’utilisateurs sur ce forum, dans la shoutbox privée.',
	'SHOUT_ROBOT_CHOICE'			=> 'Paramètres de la purge Robot en façade',
	'SHOUT_ROBOT_CHOICE_EXPLAIN'	=> 'Choisissez ici toutes les infos Robot que vous souhaitez pouvoir purger en façade.<br />Vous pouvez ajouter autant de choix que désiré.<br />Notez que les infos de purge et délestage seront toujours effacées.',
	'SHOUT_ON_CONNECT'				=> 'Infos de connexions',
	'SHOUT_ON_SUBJET'				=> 'Nouveaux sujets',
	'SHOUT_ON_REPONSE'				=> 'Réponses aux sujets et éditions',
	'SHOUT_ON_BIRTHDAY'				=> 'Anniversaires',
	'SHOUT_ON_DAY'					=> 'Dates du jour',
	'SHOUT_ON_NEWS'					=> 'Nouvelles inscriptions',
	'SHOUT_ON_PRIV'					=> 'Connexions dans la shout privée',
	'SHOUT_ON_MODS'					=> 'Infos des Mods Add-on',
	'SHOUT_PURGE_ON'				=> 'Purger les ',
	'SHOUT_NO_MOD_ROBOT'			=> 'Vous n’avez à l’heure actuelle, aucun mod présent sur votre forum qui soit compatible avec le Robot de Breizh Shoutbox...',
	'SHOUT_MOD_ROBOT'				=> 'Vous pouvez régler ici les options des mods présents sur votre forum, compatibles avec le Robot de Breizh Shoutbox...',
	
	// Add-ons for another Mods
	// Mod Ultimate points system
	'MOD_UPS'						=> 'Mod Ultimate points system',
	'SHOUT_ROBBERY'					=> 'Robot des braquages',
	'SHOUT_ROBBERY_EXPLAIN'			=> 'Active/désactive les notifications des braquages réussis dans Ultimate Points System.',
	'SHOUT_LOTTERY'					=> 'Robot de la loterie',
	'SHOUT_LOTTERY_EXPLAIN'			=> 'Active/désactive les notifications des loteries remportées par des membres.',
	'SHOUT_ROBBERY_PRIV'			=> 'Robot des braquages shoutbox privée',
	'SHOUT_ROBBERY_PRIV_EXPLAIN'	=> 'Active/désactive les notifications des braquages réussis dans Ultimate Points System dans la shoutbox privée.',
	'SHOUT_LOTTERY_PRIV'			=> 'Robot de la loterie shoutbox privée',
	'SHOUT_LOTTERY_PRIV_EXPLAIN'	=> 'Active/désactive les notifications des loteries remportées par des membres dans la shoutbox privée.',
	// Mod Hangman
	'MOD_HANGMAN'					=> 'Mod Pendu (Hangman)',
	'SHOUT_HANGMAN'					=> 'Robot des pendus résolus',
	'SHOUT_HANGMAN_EXPLAIN'			=> 'Active/désactive les notifications des résolutions de pendus par des membres.',
	'SHOUT_HANGMAN_PRIV'			=> 'Robot des pendus résolus shoutbox privée',
	'SHOUT_HANGMAN_PRIV_EXPLAIN'	=> 'Active/désactive les notifications des résolutions de pendus par des membres dans la shoutbox privée.',
	'SHOUT_HANGMAN_CR'				=> 'Robot des créations des pendus',
	'SHOUT_HANGMAN_CR_EXPLAIN'		=> 'Active/désactive les notifications des créations de pendus par des membres.',
	'SHOUT_HANGMAN_CR_PRIV'			=> 'Robot des créations des pendus shoutbox privée',
	'SHOUT_HANGMAN_CR_PRIV_EXPLAIN'	=> 'Active/désactive les notifications des créations de pendus par des membres dans la shoutbox privée.',
	// Mod tracker
	'MOD_TRACKER'					=> 'Mod Traqueur',
	'SHOUT_TRACKER'					=> 'Robot des tickets du traqueur',
	'SHOUT_TRACKER_EXPLAIN'			=> 'Active/désactive les notifications des nouveaux tickets dans le traqueur.',
	'SHOUT_TRACKER_REP'				=> 'Robot des réponses du traqueur',
	'SHOUT_TRACKER_REP_EXPLAIN'		=> 'Active/désactive les notifications de réponses aux tickets dans le traqueur.',
	'SHOUT_TRACKER_EDIT'			=> 'Robot des éditions du traqueur',
	'SHOUT_TRACKER_EDIT_EXPLAIN'	=> 'Active/désactive les notifications d’éditions des tickets et réponses dans le traqueur.',
	'SHOUT_TRACKER_PRIV'			=> 'Robot des tickets du traqueur shoutbox privée',
	'SHOUT_TRACKER_PRIV_EXPLAIN'	=> 'Active/désactive les notifications des nouveaux tickets dans le traqueur dans la shoutbox privée.',
	'SHOUT_TRACKER_REP_PRIV'		=> 'Robot des réponses du traqueur shoutbox privée',
	'SHOUT_TRACKER_REP_PRIV_EXPLAIN'=> 'Active/désactive les notifications de réponses aux tickets dans le traqueur dans la shoutbox privée.',
	'SHOUT_TRACKER_EDIT_PRIV'		=> 'Robot des éditions du traqueur shoutbox privée',
	'SHOUT_TRACKER_EDIT_PRIV_EXPLAIN'=> 'Active/désactive les notifications d’éditions des tickets et réponses dans le traqueur dans la shoutbox privée.',

	// Installation
	'SHOUT_WELCOME'					=> '[color=#008000]Ceci est votre premier message. Bienvenue dans la %s[/color]... [i]de la part de Sylver35[/i] ...', // Will be modified by generate_text_for_storage()
	'SHOUT_WELCOME_INSTALL'			=> '[i][b][color=#ff0000]Installation du Mod %s réussie![/color][/b][/i]', // Will be modified by generate_text_for_storage()
	'SHOUT_USE_NEXT'				=> 'La version 1.0.0 de Breizh Shoutbox est détectée sur votre forum, veuillez lire tout d’abord <a href="http://breizh-portal.com/mod-breizh-shoutbox-version-1-1-0-p1074.html#p1074">ce message</a> et télécharger la mise à jour v1.0.0 vers 1.1.0 avant de poursuivre.',
	'SHOUT_PRIV'					=> 'Shoutbox Privée',
	'SHOUT_NAME_FULL'				=> '© Breizh Shoutbox v%s',
	
	// Update instructions
	'SHOUTBOX_INSTRUCTIONS'			=> '<br /><h1>Utilisation De Breizh Shoutbox v%1$s</h1><br />
										<p>L’équipe de Breizh Portal vous souhaite de bien profiter des fonctionnalités de ce Mod.<br />
										Nous avons tout mis en oeuvre afin que vous puissiez avoir une shoutbox performante et adaptée à vos besoins particuliers en maximisant les choix de personnalisation.<br />
										N’hésitez pas à faire un don afin de péréniser le développement et le support... Rendez-vous <strong><a href="%2$s" title="Traqueur du Mod Breizh Shoutbox">ici</a></strong></p>
										<p>Pour toute demande de support, rendez vous dans le <strong><a href="%3$s" title="forum de support dédié au Mod Breizh Shoutbox">forum de support dédié au Mod Breizh Shoutbox</a></strong></p>
										<p>Visitez également le Traqueur <strong><a href="%4$s" title="Traqueur du Mod Breizh Shoutbox">sur cette page</a></strong>. Tenez vous informés des éventuels bugs, ajouts ou demandes de fonctionnalités, la sécurité...</p>',
	'SHOUTBOX_UPDATE_INSTRUCTIONS'	=> '<br /><br /><h1>Annonce de sortie version %2$s</h1><br /><br />
		<p>Veuillez lire <strong><a href="%1$s" title="%1$s">l’annonce de sortie de la version la plus récente</a></strong> avant de continuer le processus de mise à jour, elle peut contenir des informations utiles. Elle contient également des liens de téléchargement complets ainsi que le journal des modifications.</p>
		<p>Pour toute demande de support, rendez vous dans le <strong><a href="%3$s" title="forum de support dédié au Mod Breizh Shoutbox">forum de support dédié au Mod Breizh Shoutbox</a></strong></p>
		<p>Visitez également le Traqueur <strong><a href="%4$s" title="Traqueur du Mod Breizh Shoutbox">sur cette page</a></strong>. Tenez vous informés des éventuels bugs, ajouts ou demandes de fonctionnalités, la sécurité...</p>',
	
	// Ajouts version 1.4.0
	'SHOUT_USERS_CAN_CHANGE'		=> 'Notez que les utilisateurs peuvent activer/désactiver ce paramètre individuellement',
	'SHOUT_AVATAR_USER'				=> 'Avatars des utilisateurs',
	'SHOUT_AVATAR_USER_EXPLAIN'		=> 'Activer/désactiver l’avatar par défaut pour les utilisateurs n’ayant pas d’avatar.',
	'SHOUT_AVATAR_IMG'				=> 'Image de l’avatar par defaut',
	'SHOUT_AVATAR_IMG_EXPLAIN'		=> 'Spécifiez ici l’image choisie pour l’avatar par défaut pour les utilisateurs n’en ayant pas choisi.<br />Cette image doit se trouver dans le dossier “root/images/shoutbox/” <em>défaut</em>: “no_avatar.gif”',
	'SHOUT_AVATAR_IMG_BOT'			=> 'Image de l’avatar du robot',
	'SHOUT_AVATAR_IMG_BOT_EXPLAIN'	=> 'Spécifiez ici l’image choisie pour l’avatar du robot.<br />Cette image doit se trouver dans le dossier “root/images/shoutbox/”<br /><em>défaut</em>: “avatar_robot.png”',
	'SHOUT_SOUND_EMPTY'				=> 'Aucun son',
	'SHOUT_SOUND_ON'				=> 'Activer les sons',
	'SHOUT_SOUND_ON_EXPLAIN'		=> 'Activer/désactiver tous les sons dans la shoutbox.',
	
	// Ajouts version 1.5.0
	'SHOUT_BBCODE'					=> 'Interdiction de bbcodes',
	'SHOUT_BBCODE_EXPLAIN'			=> 'Entrez ici la liste des bbcodes que vous souhaitez interdire dans la shoutbox.<br />Certains bbcodes risquent de provoquer des bugs, votre expérience vous permettra de les lister ici.<br />Vous devez les saisir sans les crochets, séparés par une virgule et un espace.<br />Ex:&nbsp;&nbsp;<em>list, code, quote</em>',
	'SHOUT_BBCODE_USER_EXPLAIN'		=> 'Entrez ici la liste des bbcodes que vous souhaitez interdire dans la mise en forme des messages des utilisateurs.<br />La liste des bbcodes interdits au dessus est déjà prise en compte, cette liste est donc un complément. Les vidéos sont déjà interdites.<br />Vous devez les saisir sans les crochets, séparés par une virgule et un espace.<br />Ex:&nbsp;&nbsp;<em>list, code, quote</em>',
	'SHOUT_BBCODE_SIZE'				=> 'Taille de la police',
	'SHOUT_BBCODE_SIZE_EXPLAIN'		=> 'Indiquez ici la taille maximale de la police autorisée pour le bbcode size= dans la mise en forme des messages des utilisateurs.<br />Le chiffre 100 correspond à la taille générale de la police, 150 correspond à une fois et demie cette taille.',
	'SHOUT_PANEL_PERMISSIONS'		=> 'Pour voir ce panneau, il faut avoir les permissions: “<em>Peut afficher la shoutbox dans le panneau latéral</em>” et “<em>Peut utiliser la shoutbox en popup</em>” à oui.<br />Non activé pour les téléphones mobiles.',
	'SHOUT_PANEL_KILL'				=> 'Pages exclues',
	'SHOUT_PANEL_KILL_EXPLAIN'		=> 'Vous pouvez choisir les pages ou exclure l’affichage du Panneau latéral rétractable.<br />Entrez le nom de la page php avec les paramètres ainsi que son chemin si différent de root.<br />Exclure une page php sans les paramètres excluera cette page avec des paramètres.<br />Vous pouvez aussi exclure tout un répertoire ex: <em>gallery/</em><br />Une page par ligne. ex: <em>ucp.php?mode=register&nbsp;&nbsp;gallery/index.php</em><br />Pages exclues d’office: erreurs, informations, redirections et connexion.',
	'SHOUT_PANEL_IMG'				=> 'Image d’ouverture',
	'SHOUT_PANEL_IMG_EXPLAIN'		=> 'Choisissez l’image d’ouverture du Panneau latéral rétractable.<br />Images du dossier root/images/shoutbox/panel/',
	'SHOUT_PANEL_EXIT_IMG'			=> 'Image de fermeture',
	'SHOUT_PANEL_EXIT_IMG_EXPLAIN'	=> 'Choisissez l’image de fermeture du Panneau latéral rétractable.<br />Images du dossier root/images/shoutbox/panel/',
	'SHOUT_PANEL_WIDTH'				=> 'Largeur du panneau',
	'SHOUT_PANEL_WIDTH_EXPLAIN'		=> 'Indiquez la largeur du Panneau latéral rétractable.<br />Notez qu’il doit contenir la shoutbox en popup à l’intérieur.',
	'SHOUT_PANEL_HEIGHT'			=> 'Hauteur du panneau',
	'SHOUT_PANEL_HEIGHT_EXPLAIN'	=> 'Indiquez la hauteur du Panneau latéral rétractable.',
	'SHOUT_ROBOT_CHOICE_PRIV'		=> 'Paramètres de la purge Robot en façade shoutbox privée',
	'SHOUT_ROBOT_CHOICE_PRIV_EXPLAIN'=> 'Choisissez ici toutes les infos Robot que vous souhaitez pouvoir purger en façade dans la shoutbox privée.<br />Vous pouvez ajouter autant de choix que désiré.<br />Notez que les infos de purge et délestage seront toujours effacées.',
	'SHOUT_TEMP'					=> 'Temps de réactualisation',
	'SHOUT_TEMP_TITLE'				=> 'réglages du délai de réactualisation de la shoutbox en fonction du statut connecté/non connecté.<br />Trop court, il y a des risques que le serveur ne puisse répondre dans le temps impartit, trop long, vous perdez de la réactivité.<br />modifiez la valeur jusqu’à obtention d’un comportement satisfaisant selon votre serveur.',
	'SHOUT_TEMP_USERS'				=> 'Temps de réactualisation pour les membres',
	'SHOUT_TEMP_USERS_EXPLAIN'		=> 'Choisissez ici le temps de réactualisation de la shoutbox pour les membres connectés.',
	'SHOUT_TEMP_ANONYMOUS'			=> 'Temps de réactualisation pour les invités',
	'SHOUT_TEMP_ANONYMOUS_EXPLAIN'	=> 'Choisissez ici le temps de réactualisation de la shoutbox pour les invités.',
	'SHOUT_TEMP_BOT'				=> 'Temps de réactualisation pour les robots',
	'SHOUT_TEMP_BOT_EXPLAIN'		=> 'Le temps de réactualisation pour les robots n’est pas réglable, il est mis par défaut sur 120 secondes afin de ne pas consommer des ressources inutilement.',
	'SHOUT_BIRTHDAY_EXCLUDE'		=> 'Exclure des groupes',
	'SHOUT_BIRTHDAY_EXCLUDE_EXPLAIN'=> 'Vous pouvez sélectionner un ou des groupes qui seront exclus des anniversaires à souhaiter.<br />Les membres bannis sont exclus d’office.<br /><br />Utilisez ctrl+clic pour sélectionner plus d’un groupe.',
	'SHOUT_INACTIV_A'				=> 'Temps d’inactivité des invités',
	'SHOUT_INACTIV_A_EXPLAIN'		=> 'Déterminez ici le temps d’inactivité des invités, passé ce délai, la shoutbox se mettra automatiquement en veille et ainsi ne fera plus de requêtes.',
	'SHOUT_INACTIV_B'				=> 'Temps d’inactivité des utilisateurs enregistrés',
	'SHOUT_INACTIV_B_EXPLAIN'		=> 'Déterminez ici le temps d’inactivité des utilisateurs enregistrés, passé ce délai, la shoutbox se mettra automatiquement en veille et ainsi ne fera plus de requêtes.<br />Notez qu’il existe une permission pour ignorer ceci.',
));

?>
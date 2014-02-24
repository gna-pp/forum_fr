<?php
/**
*
* mod_thanks [French]
*
* @package language
* @version $Id: info_acp_thanks.php 133 2011-12-02 21:36:00 doktornotor $
* @copyright (c) 2008 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @translator fr (c) darky - http://www.foruminfopc.fr/
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

$lang = array_merge($lang, array(
	'acl_f_thanks' 						=> array('lang' => 'Peut remercier des messages', 'cat' => 'misc'),
	'acl_m_thanks' 						=> array('lang' => 'Peut vider la liste des remerciements', 'cat' => 'misc'),
	'acl_u_viewthanks' 					=> array('lang' => 'Peut voir la liste de tous les remerciements', 'cat' => 'misc'),
	'acl_u_viewtoplist'					=> array('lang' => 'Peut voir la liste des meilleures notes', 'cat' => 'misc'),
	'ACP_DELTHANKS'						=> 'Remerciements supprimés',
	'ACP_DELPOST'						=> 'Aucun message (supprimé)',
	'ACP_DELUPOST'						=> 'Aucun utilisateur (supprimé)',	
	'ACP_POSTS'							=> 'Total des messages',
	'ACP_POSTSEND'						=> 'Messages restants avec des remerciements',
	'ACP_POSTSTHANKS'					=> 'Total des messages avec des remerciements',
	'ACP_THANKS'						=> 'Remerciements des messages',
	'ACP_THANKS_MOD_VER'				=> 'Version du MOD: ',
	'ACP_THANKS_TRUNCATE'				=> 'Vider la liste des remerciements',
	'ACP_ALLTHANKS'						=> 'Remerciements pris en compte',
	'ACP_THANKSEND'						=> 'Il reste des remerciements à prendre en compte',
	'ACP_THANKS_REPUT'					=> 'Options des notes',
	'ACP_THANKS_REPUT_SETTINGS'			=> 'Options des notes',
	'ACP_THANKS_REPUT_SETTINGS_EXPLAIN'	=> 'Vous pouvez définir ici les paramètres par défaut pour le classement des messages, des sujets et des forums, basés sur le système des remerciements.<br />Un sujet (message, sujet ou forum), qui a au total le plus grand nombre de remerciements, a une note de 100%.',
	'ACP_THANKS_SETTINGS'				=> 'Paramètres des remerciements',
	'ACP_THANKS_SETTINGS_EXPLAIN'		=> 'Ici, vous pouvez installer des valeurs personnalisées pour les fonctions « Merci pour les messages ».',
	'ACP_THANKS_REFRESH'				=> 'Mise à jour des compteurs',
	'ACP_USERS'							=> 'Total des utilisateurs (incluant les robots et les invités)',
	'ACP_USERSEND'						=> 'Utilisateurs restants qui ont remercié',
	'ACP_USERSTHANKS'					=> 'Total des utilisateurs qui ont remercié',

	'GRAPHIC_BLOCK_BACK'				=> 'images/rating/reput_block_back.gif',
	'GRAPHIC_BLOCK_RED'					=> 'images/rating/reput_block_red.gif',
	'GRAPHIC_DEFAULT'					=> 'Images',
	'GRAPHIC_OPTIONS'					=> 'Options graphiques',
	'GRAPHIC_STAR_BACK'					=> 'images/rating/reput_star_back.gif',
	'GRAPHIC_STAR_BLUE'					=> 'images/rating/reput_star_blue.gif',
	'GRAPHIC_STAR_GOLD'					=> 'images/rating/reput_star_gold.gif',
	
	'IMG_THANKPOSTS'					=> 'Pour remercier un message',
	'IMG_REMOVETHANKS'					=> 'Remerciements annulés',
	
	'LOG_CONFIG_THANKS'					=> 'Mise à jour de la configuration du MOD Remercier des messages',

	'REFRESH'							=> 'Rafraîchir',
	'REMOVE_THANKS'						=> 'Supprimer des remerciements',
	'REMOVE_THANKS_EXPLAIN'				=> 'Les utilisateurs peuvent retirer leurs remerciements si cette option est activée.',
	
	'STEPR'								=> ' - exécuté, étape %s',
	
	'THANKS_COUNTERS_VIEW'				=> 'Compteurs de remerciements',
	'THANKS_COUNTERS_VIEW_EXPLAIN'		=> 'Si activé, le nombre de remerciements donnés/reçus sera affiché dans le profil de l’auteur du message.',
	'THANKS_FORUM_REPUT_VIEW'			=> 'Afficher la note des forums',
	'THANKS_FORUM_REPUT_VIEW_COLUMN'	=> 'Afficher la note des forums dans une colonne',
	'THANKS_FORUM_REPUT_VIEW_COLUMN_EXPLAIN' => 'Si activé, la note des forums sera affichée dans une colonne de la liste des forums.<br />Remarque : cette option sera valable qu’uniquement pour Prosilver et si elle est activée.',
	'THANKS_FORUM_REPUT_VIEW_EXPLAIN'	=> 'Si activé, la note des forums sera affichée dans la liste des forums.',
	'THANKS_INFO_PAGE'					=> 'Messages d’information',
	'THANKS_INFO_PAGE_EXPLAIN'			=> 'Si activé, après avoir donné ou reçu des remerciements, un message d’information sera affiché.',
	'THANKS_NOTICE_ON'					=> 'Les avis sont disponibles',
	'THANKS_NOTICE_ON_EXPLAIN'			=> 'Si activé, les avis seront disponibles et l’utilisateur pourra configurer les notifications via son profil.',
	'THANKS_NUMBER'						=> 'Nombre de remerciements à afficher dans le profil',
	'THANKS_NUMBER_EXPLAIN'				=> 'Nombre maximum de remerciements affichés lors de la visualisation du profil.<br /><strong>N’oubliez pas que des ralentissements peuvent survenir, si cette valeur est définie sur 250.</strong>',
	'THANKS_NUMBER_DIGITS'				=> 'Nombre de décimales dans la notation',
	'THANKS_NUMBER_DIGITS_EXPLAIN'		=> 'Spécifiez le nombre de décimales à afficher dans la notation.',
	'THANKS_NUMBER_ROW_REPUT'			=> 'Nombre de lignes dans la liste des meilleures notes',
	'THANKS_NUMBER_ROW_REPUT_EXPLAIN'	=> 'Spécifiez le nombre de lignes à afficher dans la liste des meilleures notes.',
	'THANKS_NUMBER_POST'				=> 'Nombre de remerciements dans les messages',
	'THANKS_NUMBER_POST_EXPLAIN'		=> 'Nombre maximum de remerciements affichés quand vous visualisez un message.<br /><strong>N’oubliez pas que des ralentissements peuvent survenir, si cette valeur est définie sur 250.</strong>',
	'THANKS_ONLY_FIRST_POST'			=> 'Seulement remercier le premier message d’un sujet',
	'THANKS_ONLY_FIRST_POST_EXPLAIN'	=> 'Si activé, les utilisateurs peuvent uniquement remercier le premier message d’un sujet.',
	'THANKS_POST_REPUT_VIEW'			=> 'Afficher la note des messages',
	'THANKS_POST_REPUT_VIEW_EXPLAIN'	=> 'Si activé, la note des messages sera affichée lors de la visualisation d’un sujet.',
	'THANKS_POSTLIST_VIEW'				=> 'Liste des remerciements dans les messages',
	'THANKS_POSTLIST_VIEW_EXPLAIN'		=> 'Si activé, la liste des utilisateurs, qui ont remercié l’auteur d’un message, sera affichée.<br/>Notez que cette fonction ne peut fonctionner que si l’administrateur du Forum autorise les utilisateurs à remercier les messages.',
	'THANKS_PROFILELIST_VIEW'			=> 'Liste des remerciements dans le profil',
	'THANKS_PROFILELIST_VIEW_EXPLAIN'	=> 'Si activé, les informations complètes des remerciements, incluant le nombre de remerciements, seront affichées dans le profil.',
	'THANKS_REFRESH'					=> 'Mise à jour des compteurs de remerciements',
	'THANKS_REFRESH_EXPLAIN'			=> 'Vous pouvez mettre à jour ici les remerciements après avoir supprimé des messages/sujets/utilisateurs ou déplacé/fusionné des sujets... Cette action peut prendre un certain temps.<br /><strong>Important : pour fonctionner correctement, cette fonction requiert MySQL 4.1 ou supérieure !</strong>',
	'THANKS_REFRESH_MSG'				=> 'La mise à jour des performances peut prendre quelques minutes. Toutes les entrées incorrectes des remerciements seront supprimées !<br />Cette action n’est pas réversible !',
	'THANKS_REFRESHED_MSG'				=> 'Compteurs mis à jour',
	'THANKS_REPUT_GRAPHIC'				=> 'Affichage graphique des notes',
	'THANKS_REPUT_GRAPHIC_EXPLAIN'		=> 'Si activé, les notes seront représentées graphiquement.',
	'THANKS_REPUT_HEIGHT'				=> 'Hauteur des graphiques',
	'THANKS_REPUT_HEIGHT_EXPLAIN'		=> 'Spécifiez la hauteur du curseur des notes, en pixels.<br /><strong>Attention ! Pour afficher correctement les graphiques, vous devez indiquer la même hauteur que celle de l’image ci-dessous ! </strong>',
	'THANKS_REPUT_IMAGE'				=> 'Image principale du curseur',
	'THANKS_REPUT_IMAGE_DEFAULT'		=> '<strong>Exemples d’images pour les graphiques</strong>',
	'THANKS_REPUT_IMAGE_DEFAULT_EXPLAIN' => 'Vous pouvez voir ici l’image et son chemin pour le style prosilver. La taille des images sont de 15 x 15 pixels.<br />Vous pouvez ajouter vos propres images, au premier et à l’arrière-plan. Vous pouvez utiliser le fichier « reput_star_.psd » dans le répertoire « Contrib ». <strong>La hauteur et la largeur de l’image doivent être les mêmes que celles des graphiques.</strong>',
	'THANKS_REPUT_IMAGE_EXPLAIN'		=> 'Chemin relatif de l’image, à la racine de phpBB, choisie pour les graphiques.',
	'THANKS_REPUT_IMAGE_NOEXIST'		=> 'Le fichier de l’image principale n’existe pas.',
	'THANKS_REPUT_IMAGE_BACK'			=> 'Image de fond du curseur',
	'THANKS_REPUT_IMAGE_BACK_EXPLAIN'	=> 'Chemin relatif de l’image de fond, à la racine de phpBB, choisie pour les graphiques.',
	'THANKS_REPUT_IMAGE_BACK_NOEXIST'	=> 'Le fichier de l’image de fond n’existe pas.',
	'THANKS_REPUT_LEVEL'				=> 'Nombre d’images dans les graphiques',
	'THANKS_REPUT_LEVEL_EXPLAIN'		=> 'Le nombre maximum d’images à utiliser dans les graphiques, pour atteindre une note de 100%.',
	'THANKS_TIME_VIEW'					=> 'Date des remerciements',
	'THANKS_TIME_VIEW_EXPLAIN'			=> 'Si activé, la date des remerciements sera affichée dans les messages.',
	'THANKS_TOP_NUMBER'					=> 'Nombre d’utilisateurs dans la liste des meilleures notes',
	'THANKS_TOP_NUMBER_EXPLAIN'			=> 'Spécifiez le nombre d’utilisateurs à afficher dans la liste des meilleures notes.',
	'THANKS_TOPIC_REPUT_VIEW'			=> 'Note des sujets',
	'THANKS_TOPIC_REPUT_VIEW_COLUMN'	=> 'Afficher la note des sujets dans une colonne',
	'THANKS_TOPIC_REPUT_VIEW_COLUMN_EXPLAIN' => 'Si activé, la note du sujet sera affichée dans une colonne lorsque vous serez dans un forum.<br />Remarque : cette option sera valable uniquement pour Prosilver et si elle est activée.',
	'THANKS_TOPIC_REPUT_VIEW_EXPLAIN'	=> 'Si activé, la note des sujets sera affichée dans les forums.',
	'TRUNCATE'							=> 'Vider',	
	'TRUNCATE_THANKS'					=> 'Vider la liste des remerciements',
	'TRUNCATE_THANKS_EXPLAIN'			=> 'Cette procédure vide complètement les compteurs de remerciements (supprime tous les remerciements donnés).<br />Cette action n’est pas réversible !',
	'TRUNCATE_THANKS_MSG'				=> 'Compteurs de remerciements vidés.',
	'ALLOW_THANKS_PM_ON'				=> 'M’avertir par MP si quelqu’un remercie mes messages',
	'ALLOW_THANKS_EMAIL_ON'				=> 'M’avertir par e-mail si quelqu’un remercie mes messages',
));
?>
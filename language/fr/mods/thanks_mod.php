<?php
/**
*
* thanks_mod[French]
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
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'CLEAR_LIST_THANKS'			=> 'Vider la liste des remerciements',
	'CLEAR_LIST_THANKS_CONFIRM'	=> 'Voulez-vous vraiment vider la liste des remerciements d’un utilisateur ?',
	'CLEAR_LIST_THANKS_GIVE'	=> 'La liste des remerciements donnés par l’utilisateur a été vidée.',
	'CLEAR_LIST_THANKS_POST'	=> 'La liste des remerciements du message a été vidée.',
	'CLEAR_LIST_THANKS_RECEIVE'	=> 'La liste des remerciements reçus par l’utilisateur a été vidée.',

	'DISABLE_REMOVE_THANKS'		=> 'Supprimer les remerciements désactivés par un administrateur',
	
	'GIVEN'						=> 'A remercié',
	'GLOBAL_INCORRECT_THANKS'	=> 'Vous ne pouvez pas remercier dans les Annonces Globales qui n’ont pas de références à ce forum.',
	'GRATITUDES'				=> 'Remerciements',
	
	'INCORRECT_THANKS'			=> 'Remerciement invalide',
	
	'JUMP_TO_FORUM'				=> 'Aller au forum',
	'JUMP_TO_TOPIC'				=> 'Aller au sujet',

	'FOR_MESSAGE'				=> ' pour le message',
	'FURTHER_THANKS'     	    => ' et un autre utilisateur',
	'FURTHER_THANKS_PL'         => ' et %d autres utilisateurs',
	
	'NO_VIEW_USERS_THANKS'		=> 'Vous n’êtes pas autorisé à visualiser la liste des remerciements.',

	'RECEIVED'					=> 'Remercié',
	'REMOVE_THANKS'				=> 'Supprimer le remerciement : ',
	'REMOVE_THANKS_CONFIRM'		=> 'Êtes-vous sûr de vouloir supprimer le remerciement ?',
	'REPUT'						=> 'Note',
	'REPUT_TOPLIST'				=> 'Meilleures Notes',
	'RETING_LOGIN_EXPLAIN'		=> 'Vous n’êtes pas autorisé à visualiser la liste des meilleures notes.',
	'RATING_NO_VIEW_TOPLIST'	=> 'Vous n’êtes pas autorisé à visualiser la liste des meilleures notes.',
	'RATING_VIEW_TOPLIST_NO'	=> 'La liste des meilleures notes est vide ou elle a été désactivée par un administrateur.',
	'RATING_FORUM'				=> 'Forum',
	'RATING_POST'				=> 'Message',
	'RATING_TOP_FORUM'			=> 'Notes des forums',
	'RATING_TOP_POST'			=> 'Notes des messages',
	'RATING_TOP_TOPIC'			=> 'Notes des sujets',	
	'RATING_TOPIC'				=> 'Sujet',
	'RETURN_POST'				=> 'Retour',

	'THANK'						=> 'fois',
	'THANK_FROM'				=> 'de',
	'THANK_TEXT_1'				=> 'L’auteur ',
	'THANK_TEXT_2'				=> ' a été remercié par : ',
	'THANK_TEXT_2PL'			=> ' a été remercié par : %d',
	'THANK_POST'				=> 'Merci ',
	'THANKS'					=> 'fois',
	'THANKS_BACK'				=> 'Retour',
	'THANKS_INFO_GIVE'			=> 'Vous avez remercié le message.',
	'THANKS_INFO_REMOVE'		=> 'Vous avez supprimé votre remerciement.',
	'THANKS_LIST'				=> 'Voir/Fermer la liste',
	'THANKS_PM_MES_GIVE'		=> 'Merci pour le message',
	'THANKS_PM_MES_REMOVE'		=> 'Supprimer le remerciement',
	'THANKS_PM_SUBJECT_GIVE'	=> 'Merci pour le message',
	'THANKS_PM_SUBJECT_REMOVE'	=> 'Supprimer le remerciement',
	'THANKS_USER'				=> 'Liste des remerciements',
// Install block
	'THANKS_INSTALLED'			=> 'Merci pour le message',
	'THANKS_INSTALLED_EXPLAIN'  => '<strong>ATTENTION !<br />Nous vous recommandons vivement d’exécuter cette installation uniquement après avoir suivi les instructions sur les modifications des fichiers (ou effectuer l’installation à l’aide d’AutoMod) !<br />Nous vous recommandons aussi fortement de choisir « Oui » afin d’afficher les résultats de l’installation (ci-dessous) !</strong>',
	'THANKS_CUSTOM_FUNCTION'	=> 'Mise à jour des valeurs de la table _thanks',
));
?>
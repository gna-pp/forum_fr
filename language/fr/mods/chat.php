<?php
/**
* mods chat [Français]
*
* @package Chat
* @version 0.2
* @copyright (c) 2008 phpBB3.PL Group
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

$lang['CHAT'] = 'Chat';

$lang['OAPI']['Chat'] = array(
	'confirmDelete'         => "Etes-vous sûr de vouloir supprimer ce message ?",
	'_Exceptions'           => array(
		'NoMessageSelected' => "Vous n'avez sélectionné aucun message.",
		'MessageNotFound'   => "Message sélectionné est introuvable.",
		'MessagePosted'     => "Message posté avec succès.",
		'MessageDeleted'    => "Message supprimé avec succès.",
		'LoginToPost'       => "Connectez-vous pour poster sur le chat.",
		'PostingNotAllowed' => "Vous ne disposez pas des autorisations nécessaires pour poster sur le chat.",

		'EngineRunning'     => 'Posting engine is already running.',
		'EmptyMessage'      => "Envoi de messages vides ne sont pas autorisés.",
		'ScriptError'       => "Erreur de script est survenue!",
	),
);
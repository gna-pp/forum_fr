<?php
/**
* mods chat [English]
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
	'confirmDelete'         => 'Are you sure you want to delete this message?',
	'_Exceptions'           => array(
		'NoMessageSelected' => 'You haven’t selected any message.',
		'MessageNotFound'   => 'Selected message wasn’t found.',
		'MessagePosted'     => 'Message posted succesfully.',
		'MessageDeleted'    => 'Message deleted succesfully.',
		'LoginToPost'       => 'Log in to post on the chat.',
		'PostingNotAllowed' => 'You don’t have permissions necessary to post on the chat.',

		'EngineRunning'     => 'Posting engine is already running.',
		'EmptyMessage'      => 'Sending empty messages is not allowed.',
		'ScriptError'       => 'Script error occured!',
	),
);
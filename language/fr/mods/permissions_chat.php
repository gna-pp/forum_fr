<?php
/**
* mods permissions_chat (Chat Permission Set) [English]
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

$lang['permission_cat']['chat'] = 'Chat';

// All permissions are global
$lang = array_merge($lang, array(
	// User Permissions
	'acl_u_chat_view'	=> array('lang' => 'Can view chat', 'cat' => 'chat'),
	'acl_u_chat_post'	=> array('lang' => 'Can post messages on the chat', 'cat' => 'chat'),
	'acl_u_chat_delete'	=> array('lang' => 'Can delete own messages', 'cat' => 'chat'),

	// Moderator Permissions
	'acl_m_chat_delete'	=> array('lang' => 'Can delete messages', 'cat' => 'chat'),

/*  Not implemented yet.
	// User Permissions
	'acl_u_chat_edit'	=> array('lang' => 'Can edit own messages', 'cat' => 'chat'),

	// Moderator Permissions
	'acl_m_chat_edit'	=> array('lang' => 'Can edit messages', 'cat' => 'chat'),
	'acl_m_chat_ban'	=> array('lang' => 'Can ban chat users', 'cat' => 'chat'),
	'acl_m_chat_unban'	=> array('lang' => 'Can unban chat users', 'cat' => 'chat'),

	// Administrator Permissions
	'acl_a_chat_admin'	=> array('lang' => 'Can change chat settings', 'cat' => 'chat'),
	'acl_a_chat_prune'	=> array('lang' => 'Can prune the chat', 'cat' => 'chat'),
*/
));

?>
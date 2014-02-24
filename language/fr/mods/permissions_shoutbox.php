<?php
/**
*
* permission Breizh Shoutbox [French]
*
* @package language
* @version $Id: permissions_shoutbox.php 150 16:15 16/12/2011 Sylver35 Exp $ 
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

/**
*	MODDERS PLEASE NOTE
*
*	You are able to put your permission sets into a separate file too by
*	prefixing the new file with permissions_ and putting it into the acp
*	language folder.
*
*	An example of how the file could look like:
*
*	<code>
*
*	if (empty($lang) || !is_array($lang))
*	{
*		$lang = array();
*	}
*
*	// Adding new category
*	$lang['permission_cat']['bugs'] = 'Bugs';
*
*	// Adding new permission set
*	$lang['permission_type']['bug_'] = 'Bug Permissions';
*
*	// Adding the permissions
*	$lang = array_merge($lang, array(
*		'acl_bug_view'		=> array('lang' => 'Can view bug reports', 'cat' => 'bugs'),
*		'acl_bug_post'		=> array('lang' => 'Can post bugs', 'cat' => 'post'), // Using a phpBB category here
*	));
*
*	</code>
*/

// Adding new category
$lang['permission_cat']['shoutbox'] = 'Breizh Shoutbox';

// Adding new permission set
$lang['permission_type']['shout_'] = 'Permissions Breizh Shoutbox';

// Adding the permissions
$lang = array_merge($lang, array(
	// Admin permission
	'acl_a_shout_manage'			=> array('lang' => 'Peut administrer et modifier les paramètres de la shoutbox', 			'cat' => 'misc'),
	'acl_a_shout_priv'				=> array('lang' => 'Peut administrer et modifier les paramètres de la shoutbox privée', 	'cat' => 'misc'),
	
	// User permissions
	'acl_u_shout_bbcode'			=> array('lang' => 'Peut poster des bbcodes dans ses messages', 							'cat' => 'shoutbox'),
	'acl_u_shout_bbcode_change'		=> array('lang' => 'Peut utiliser la mise en forme des messages', 							'cat' => 'shoutbox'),
	'acl_u_shout_chars'				=> array('lang' => 'Peut utiliser les caractères spéciaux', 								'cat' => 'shoutbox'),
	'acl_u_shout_color'				=> array('lang' => 'Peut utiliser les couleurs dans ses messages', 							'cat' => 'shoutbox'),
	'acl_u_shout_delete'			=> array('lang' => 'Peut supprimer les messages des autres utilisateurs', 					'cat' => 'shoutbox'),
	'acl_u_shout_delete_s'			=> array('lang' => 'Peut supprimer ses propres messages', 									'cat' => 'shoutbox'),
	'acl_u_shout_edit'				=> array('lang' => 'Peut éditer ses propres messages', 										'cat' => 'shoutbox'),
	'acl_u_shout_edit_mod'			=> array('lang' => 'Peut éditer les messages des autres utilisateurs', 						'cat' => 'shoutbox'),
	'acl_u_shout_hide'				=> array('lang' => 'Peut annuler les infos postées par le robot', 							'cat' => 'shoutbox'),
	'acl_u_shout_ignore_flood'		=> array('lang' => 'Peut ignorer la limite de flood', 										'cat' => 'shoutbox'),
	'acl_u_shout_image'				=> array('lang' => 'Peut poster des images dans ses messages', 								'cat' => 'shoutbox'),
	'acl_u_shout_inactiv'			=> array('lang' => 'Peut ignorer l’inactivité et la mise en veille de la shoutbox', 		'cat' => 'shoutbox'),
	'acl_u_shout_info'				=> array('lang' => 'Peut voir les IPs de tous les utilisateurs', 							'cat' => 'shoutbox'),
	'acl_u_shout_info_s'			=> array('lang' => 'Peut voir les IPs de ses propres messages', 							'cat' => 'shoutbox'),
	'acl_u_shout_lateral'			=> array('lang' => 'Peut afficher la shoutbox dans le panneau latéral', 					'cat' => 'shoutbox'),
	'acl_u_shout_limit_post'		=> array('lang' => 'Peut ignorer la limite de caractères dans un message',					'cat' => 'shoutbox'),
	'acl_u_shout_popup'				=> array('lang' => 'Peut utiliser la shoutbox en popup', 									'cat' => 'shoutbox'),
	'acl_u_shout_post'				=> array('lang' => 'Peut poster des messages dans la shoutbox', 							'cat' => 'shoutbox'),
	'acl_u_shout_post_inp'			=> array('lang' => 'Peut poster des messages <strong>personnels</strong> dans la shoutbox',	'cat' => 'shoutbox'),
	'acl_u_shout_priv'				=> array('lang' => 'Peut accéder à la shoutbox privée', 									'cat' => 'shoutbox'),
	'acl_u_shout_purge'				=> array('lang' => 'Peut purger la shoutbox en facade', 									'cat' => 'shoutbox'),
	'acl_u_shout_smilies'			=> array('lang' => 'Peut poster des smileys dans ses messages', 							'cat' => 'shoutbox'),
	'acl_u_shout_view'				=> array('lang' => 'Peut <strong>voir</strong> la shoutbox', 								'cat' => 'shoutbox'),
));

?>
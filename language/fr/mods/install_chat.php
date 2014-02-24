<?php
/**
* mods install_chat [English]
*
* @package Chat
* @version 0.1
* @copyright (c) 2008 LEW21
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

$lang = array_merge($lang, array(
	'CHAT_INSTALLATION' => 'phpBB3 Chat MOD installation',

	'TAB_INSTALL_CHAT'	=> 'Install chat!',
	'STAGE_INSTALL'		=> 'Install',

	'CHAT_INSTALL_INTRO'        => 'Welcome to phpBB3 Chat MOD installation',
	'CHAT_INSTALL_INTRO_BODY'   => 'With this option, it is possible to install phpBB3 Chat MOD onto your server. According to server settings, this MOD can be just a simple shoutbox or full chat with AJAX-based autorefresh and instant posting.',

	'CHAT_OBJECTIVEAPI'         => 'ObjectiveAPI',
	'CHAT_OBJECTIVEAPI_BODY'    => 'phpBB3 Chat MOD uses ObjectiveAPI extension of phpBB3, and that extension requires PHP %s or newer.',
	'CHAT_PHP_VERSION'          => 'PHP version on this server',
	'CHAT_PHP_VERSION_TOO_OLD'  => 'Your server is running unsupported PHP version, so you cannot continue. Ask your hosting provider if it is possible to use PHP %s+, and if not, when they will upgrade. If they are not interested in upgrading, change the host. <a href="http://gophp5.org/hosts">Here you can find a list of some webhosts that have PHP 5.2 installed.</a>',

	'CHAT_RECOMMENDED'          => 'Recommended',
	'CHAT_RECOMMENDED_BODY'     => 'Those things are optional, but enable additional features.',
	'CHAT_RECOMMENDED_CLASSES'  => array(
		'XMLWriter' => array( 'XMLWriter class', 'Enables AJAX-based features.'),
	),

	'CHAT_INSTALLED'        => 'Instalation complete.',
	'CHAT_INSTALLED_BODY'   => 'phpBB3 Chat MOD’s instalation was finished. Now, you can <a href="../">return to the board index</a>. Do not forgot to give users permission to use the chat!',
));
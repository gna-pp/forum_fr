<?php
/**
* ObjectiveAPI language file [English]
*
* @package ObjectiveAPI
* @version 0.0.1
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

$lang['OAPI'] = array(
	'_Exceptions'                  => array(
		// Type: Script
		'PropertyNotFound'         => 'Cannot find {thrownByClass}’s property named “{property}”.',
		'MethodNotFound'           => 'Cannot find {thrownByClass}’s method named “{method}”.',
		'ModeNotSupported'         => 'This mode is not supported.',

		// Type: User
		'NotAllowed'               => 'You don’t have permissions necessary to complete this action.',
	),
	'OAPI'                         => array(
		'Lang'                     => array(
			'_Exceptions'          => array(
				'EntryNotFound'    => 'Cannot find language entry named “{entry}”.',
			),
		),
	),
	'Fields'                       => array(
		'Textarea'                 => array(
			'_Exceptions'          => array(
				// Type: Script
				'NoText'           => 'You haven’t filled text field “{thrownBy->name}”.',
				'TextTooShort'     => 'You have filled text field “{thrownBy->name}” with a too short text.',
				'TextTooLong'      => 'You have filled text field “{thrownBy->name}” with a too long text.',

				// Type: User
				'TextNotLoaded'    => '“{thrownBy->name}” field’s content hasn’t been loaded.',
				'OptionsNotLoaded' => '“{thrownBy->name}” field’s options hasn’t been loaded.',
			),
		),
	),
);
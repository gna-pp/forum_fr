<?php
/**
*
* groups [English]
*
* @package language
* @version $Id: $
* @copyright (c) 2007 DualFusion - 2008 ..::Frans::..
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* DO NOT CHANGE
*/
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'ACP_WELCOME_PM'			=> 'MP de bienvenue lors de la première connexion',
	'ACP_WPM_SETTINGS'			=> 'Paramètres du MOD',

	'LOG_WPM_SETTINGS_UPDATED'	=> '<strong>Modification des paramètres du MP de bienvenue</strong>',

	'WPM_ALREADY_INSTALLED'	=> 'LeMOD a déjà été installé sur votre forum!',
	'WPM_BOARD_CONTACT'		=> 'Contacte du forum',
	'WPM_BOARD_EMAIL'		=> 'E-mail du forum',
	'WPM_BOARD_SIG'			=> 'Signature du forum',
	'WPM_CPF_VARS'			=> 'Variables des champs de profil personalisés',
	'WPM_ENABLE'			=> 'Activer leMOD',
	'WPM_ENABLE_EXPLAIN'	=> 'Vous pouvez activer/désactiver le MOD à tout moment.',
	'WPM_ERROR_EMPTY'		=> 'Le champ <strong>%s</strong> ne peut pasêtre vide',
	'WPM_ERROR_USER'		=> 'Nom d\'utilisateur <strong>%s</strong> inconnu dans le champ username',
	'WPM_ERROR_DB'			=> 'Un problème a été rencontré durant la mise à jour de <strong>%s</strong>',
	'WPM_INSTALLED'			=> 'Le MOD a bien été installé!',
	'WPM_NOTIFY'			=> 'Notifier',
	'WPM_NOTIFY_EXPLAIN'	=> 'Pour notifier les utilisateurs qu\'ils ont un nouveau message privé.',
	'WPM_PREDEFINED_VARS'	=> 'Variables prédéfinies',
	'WPM_SENDER'			=> 'Nom de l\'expediteur',
	'WPM_SITE_NAME'			=> 'Nom du site',
	'WPM_SITE_DESC'			=> 'Description du site',
	'WPM_SUBJECT_EXPLAIN'	=> 'Le titre du message que l\'utilisateur recevra.',
	'WPM_TITLE'				=> 'MP de bienvenue lors de la première connexion',
	'WPM_TITLE_EXPLAIN'		=> 'Vous permet de créer un message privé personnalisé. Ce message sera envoyé à tous les utilisateurs lors de leur première connexion.',
	'WPM_UPDATED'			=> 'Cnfiguraton du MOD changés',
	'WPM_USERNAME'			=> 'Nom d\'utilisateur',
	'WPM_USERNAME_EXPLAIN'	=> 'Le nom d\'utilisateur qui "envoie" le message.',
	'WPM_USER_ID'			=> 'User ID',
	'WPM_USER_IP'			=> 'User IP',
	'WPM_USER_EMAIL'		=> 'E-mail de l\'utilisateur',
	'WPM_USER_REGDATE'		=> 'Date d\'enregistrement',
	'WPM_USER_LANG_EN'		=> 'Langue (ENGLISH)',
	'WPM_USER_LANG_LOCAL'	=> 'Langue (LOCAL)',
	'WPM_USER_TZ'			=> 'Timezone',
	'WPM_VAR_NAME'			=> 'Nom',
	'WPM_VAR_VAR'			=> 'Variable',
	'WPM_VAR_EXAMPLE'		=> 'Exemple',
));
?>
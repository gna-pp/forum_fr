<?php
/**
*
* Module Breizh Shoutbox [English]
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
	'ACP_SHOUT_GENERAL_CAT'         => 'Generals',
		'ACP_SHOUT_VERSION'				=> 'Version Checker',
		'ACP_SHOUT_VERSION_T'			=> 'Checker version Breizh Shoutbox',
		'ACP_SHOUT_VERSION_T_EXPLAIN'	=> 'This version checker allows you to be informed on the latest public version of the Breizh Shoutbox.
											<br />If you do not have the latest version, you can find here all information about downloading and how do I make an update without any worries.',
		'ACP_SHOUT_CONFIGS'				=> 'General Setup',
		'ACP_SHOUT_CONFIGS_T'			=> 'General Setup Breizh Shoutbox',
		'ACP_SHOUT_CONFIGS_T_EXPLAIN'  	=> 'On this page, you can adjust all the different settings of the shoutbox.<br />
										If you find a bug, or if you want to request a feature, please visit our <a href="http://breizh-portal.com/tracker.php">tracker</a>.<br />
										Before you post, please check first if the bug has already been reported or functionality already requested. <br />
										A lot of information on the shoutbox, and more development can also be found on our tracker.<br />
										If it affects the security, provide the security in the tracer, so you do not disclose, but resolve.<br />
										The permissions for the shoutbox can be found in the Permissions tab, then Permissions for users or groups.',
		'ACP_SHOUT_RULES'				=> 'Usage Rules',
		'ACP_SHOUT_RULES_T'				=> 'Panel Rules for using the shoutbox',
		'ACP_SHOUT_RULES_T_EXPLAIN'		=> 'This page allows you to define rules for using the shoutbox.<br />You can put rules in different languages enabled in this forum.',
	// Category for main shoutbox
	'ACP_SHOUT_PRINCIPAL_CAT'		=> 'Main Shoutbox',
		'ACP_SHOUT_OVERVIEW'			=> 'Messages and Statistics',
		'ACP_SHOUT_OVERVIEW_T'			=> 'Messages and Statistics Breizh Shoutbox',
		'ACP_SHOUT_OVERVIEW_T_EXPLAIN'	=> 'On this page, you can see the statistics of the main shoutbox.
											<br />You can also delete messages or completely purge the shoutbox.',
		'ACP_SHOUT_CONFIG_GEN'			=> 'Settings Main shoutbox',
		'ACP_SHOUT_CONFIG_GEN_T'		=> 'Settings of shoutbox main forum',
		'ACP_SHOUT_CONFIG_GEN_T_EXPLAIN'=> 'On this page, you can set all settings of the Main shoutbox to your forum.',
	// Category for private shoutbox
	'ACP_SHOUT_PRIVATE_CAT'			=> 'Private Shoutbox',
		'ACP_SHOUT_PRIVATE'				=> 'Messages and Statistics',
		'ACP_SHOUT_PRIVATE_T'			=> 'Panel Messages and statistics shoutbox private',
		'ACP_SHOUT_PRIVATE_T_EXPLAIN'	=> 'On this page you can see the statistics of the private shoutbox.
											<br />You can also delete messages or completely purge the shoutbox.',
		'ACP_SHOUT_CONFIG_PRIV'			=> 'Settings Private Shoutbox',
		'ACP_SHOUT_CONFIG_PRIV_T'		=> 'Panel of Private Shoutbox',
		'ACP_SHOUT_CONFIG_PRIV_T_EXPLAIN'=> 'On this page, you can set all the parameters of the Private shoutbox to your forum.
											<br />To set the permission to use this shoutbox private appointments in the permissions tab “Breizh Shoutbox”: “Can access the private shoutbox”',
	// Category for popup shoutbox
	'ACP_SHOUT_POPUP_CAT'			=> 'Shoutbox in popup',
		'ACP_SHOUT_POPUP'				=> 'Settings popup',
		'ACP_SHOUT_POPUP_T'				=> 'Panel of the popup Breizh Shoutbox',
		'ACP_SHOUT_POPUP_T_EXPLAIN'		=> 'On this page, you can set all the parameters of the shoutbox in popup.<br />These settings also apply in the retractable lateral panel shoutbox.',
		// Category for retractable lateral panel
		// Added in version 1.5.0
		'ACP_SHOUT_PANEL'				=> 'Settings lateral panel',
		'ACP_SHOUT_PANEL_T'				=> 'Settings of the retractable lateral panel',
		'ACP_SHOUT_PANEL_T_EXPLAIN'		=> 'On this page, you can set all parameters of the retractable lateral panel.<br />Note that this panel contains the shoutbox in popup.',
	// Category for smilies
	'ACP_SHOUT_SMILIES_CAT'			=> 'Smilies',
		'ACP_SHOUT_SMILIES'				=> 'Smilies settings',
		'ACP_SHOUT_SMILIES_T'			=> 'Panel of Smilies settings for the shoutbox',
		'ACP_SHOUT_SMILIES_T_EXPLAIN'	=> 'On this page, you can configure the smilies to be displayed in the shoutbox.<br />
										Smilies are displayed all present in the database, indifferently from those displayed on the page of posting messages.<br />
										To specify which smilies should appear or not, just click on “Turn on display” or “Send in the popup”.<br />
										If you want to change the display order or other parameter smilies, go to <a href="%s" title="Settings page of smilies">this page</a>.',
	// Category for robot
	'ACP_SHOUT_ROBOT_CAT'			=> 'Robot shoutbox',
		'ACP_SHOUT_ROBOT'				=> 'Robot configuration',
		'ACP_SHOUT_ROBOT_T'				=> 'Configuration of the robot Breizh Shoutbox',
		'ACP_SHOUT_ROBOT_T_EXPLAIN'		=> 'On this page, you can adjust all the different points of the configuration of the robot shoutbox.
											<br />Some parameters are either the main shoutbox, or for the private shoutbox.',
		'ACP_SHOUT_ROBOT_MOD'			=> 'Mods Robot',
		'ACP_SHOUT_ROBOT_MOD_T'			=> 'Parameters of the robot in the optional mods',
		'ACP_SHOUT_ROBOT_MOD_T_EXPLAIN'	=> 'On this page, you can set all parameters of the robot for the shoutbox mods compatible with Breizh Shoutbox.',
	
	// Language for Logs
	'LOG_SHOUT_CONFIGS'				=> '<strong>Update the general configuration of Breizh Shoutbox.</strong>',
	'LOG_SHOUT_CONFIG_GEN'			=> '<strong>Updated settings of main Shoutbox.</strong>',
	'LOG_SHOUT_CONFIG_PRIV'			=> '<strong>Update the configuration of private Shoutbox.</strong>',
	'LOG_SHOUT_RULES'				=> '<strong>Updated rules Breizh Shoutbox.</strong>',
	'LOG_SHOUT_POPUP'				=> '<strong>Update settings of popup Breizh Shoutbox.</strong>',
	'LOG_SHOUT_ROBOT'				=> '<strong>Update settings of Breizh Shoutbox Robot.</strong>',
	'LOG_SHOUT_ROBOT_MOD'			=> '<strong>Update settings of Breizh Shoutbox Robot for the Mods.</strong>',
	'LOG_PURGE_SHOUTBOX'			=> '<strong>Purge all Messages of Shoutbox.</strong>',
	'LOG_PURGE_SHOUTBOX_ROBOT'		=> '<strong>Purge all Robots infos of Shoutbox.</strong>',
	'LOG_PURGE_SHOUTBOX_PRIV'		=> '<strong>Purge all Messages of private Shoutbox.</strong>',
	'LOG_PURGE_SHOUTBOX_PRIV_ROBOT'	=> '<strong>Purge all Robots infos of private Shoutbox.</strong>',
	'LOG_SELECT_SHOUTBOX'			=> '<strong>Remove %s Selected Message of the Shoutbox.</strong>',
	'LOG_SELECTS_SHOUTBOX'			=> '<strong>Remove %s Selected Messages of the private Shoutbox.</strong>',
	'LOG_SELECT_SHOUTBOX_PRIV'		=> '<strong>Remove %s Selected Message of the private Shoutbox.</strong>',
	'LOG_SELECTS_SHOUTBOX_PRIV'		=> '<strong>Remove %s Selected Messages of the Shoutbox.</strong>',
	'LOG_LOG_SHOUTBOX'				=> '<strong>Remove %s selected entry of users log (shoutbox).</strong>',
	'LOG_LOGS_SHOUTBOX'				=> '<strong>Remove %s selected entries of users log (shoutbox).</strong>',
	'LOG_LOG_SHOUTBOX_PRIV'			=> '<strong>Remove %s selected entry of users log (private shoutbox).</strong>',
	'LOG_LOGS_SHOUTBOX_PRIV'		=> '<strong>Remove %s selected entries of users log (private shoutbox).</strong>',
	'LOG_SHOUT_UPDATED'				=> '<strong>Update Breizh Shoutbox from %1$s to %2$s</strong>',
	'LOG_SHOUT_UPGRADED'			=> '<strong>Upgraded Breizh Shoutbox from 1.0.x to %1$s</strong>',
	'LOG_SHOUT_INSTALL_DATABASE'	=> '<strong>Creating the shoutbox table and add data into the config table<strong>',
	'LOG_SHOUT_UPDATE_DATABASE'		=> '<strong>Update config table for Breizh Shoutbox<strong>',
	'LOG_SHOUT_PANEL'          		=> '<strong>Update settings of retractable lateral panel</strong>', // Ajout dans la version 1.5.0
	'LOG_SHOUT_PRUNED'          	=> '<strong>Pruned Breizh Shoutbox</strong>',
	'LOG_SHOUT_PRIV_PRUNED'         => '<strong>Pruned private Breizh Shoutbox</strong>',
	'LOG_SHOUT_REMOVED'         	=> '<strong>Automatic deletion of %s posts in the shoutbox.</strong>',
	'LOG_SHOUT_REMOVED'         	=> '<strong>Automatic deletion of %s posts in the private shoutbox.</strong>',
	'LOG_SHOUT_PURGED'         		=> '<strong>Purge time automatic %s messages in the shoutbox.</strong>',
	'LOG_SHOUT_PRIV_PURGED'         => '<strong>Purge time automatic %s messages in the private shoutbox.</strong>',
	'LOG_SHOUT_SCRIPT'				=> '<strong>Attempt to post script in the shoutbox.</strong>',
	'LOG_SHOUT_APPLET'				=> '<strong>Attempt to post applet in the shoutbox.</strong>',
	'LOG_SHOUT_ACTIVEX'				=> '<strong>Attempt to post active x object in the shoutbox.</strong>',
	'LOG_SHOUT_OBJECTS'				=> '<strong>Attempt to post chrome or about object in the shoutbox.</strong>',
	'LOG_SHOUT_IFRAME'				=> '<strong>Attempt to post iframe in the shoutbox.</strong>',
	'LOG_SHOUT_PRUNED_PRIV'         => '<strong>Pruned private Breizh Shoutbox</strong>',
	'LOG_SHOUT_REMOVED_PRIV'        => '<strong>Automatic deletion of %s posts in the private shoutbox.</strong>',
	'LOG_SHOUT_PURGED_PRIV'         => '<strong>Purge time automatic %s messages in the private shoutbox.</strong>',
	'LOG_SHOUT_SCRIPT_PRIV'			=> '<strong>Attempt to post script in the private shoutbox.</strong>',
	'LOG_SHOUT_APPLET_PRIV'			=> '<strong>Attempt to post applet in the private shoutbox.</strong>',
	'LOG_SHOUT_ACTIVEX_PRIV'		=> '<strong>Attempt to post active x object in the private shoutbox.</strong>',
	'LOG_SHOUT_OBJECTS_PRIV'		=> '<strong>Attempt to post chrome or about object in the private shoutbox.</strong>',
	'LOG_SHOUT_IFRAME_PRIV'			=> '<strong>Attempt to post iframe in the private shoutbox.</strong>',
	
	'SHOUT_SMILIES_ON'				=> 'Turn on display',
	'SHOUT_SMILIES_POP'				=> 'Send in the popup',
	'DISPLAY_ON_SHOUTBOX'			=> 'Display Preferences in the shoutbox',
	'SHOUT_RULES_ACTIVE'			=> 'Rules of shoutbox',
	'SHOUT_RULES_ACTIVE_EXPLAIN'	=> 'Enable/Disable rules on the shoutbox.<br /> Devient nul si aucune règle n’est écrite.',
	'SHOUT_RULES_ON'				=> 'Rules in language “%s”',
	'SHOUT_RULES_ON_EXPLAIN'		=> 'Please enter the rules in the language “%s” for main shoutbox.<br />Bbcodes, Links and smilies are on.',
	'SHOUT_RULES_ON_PRIV_EXPLAIN'	=> 'Please enter the rules in the language “%s” for private shoutbox.<br />Bbcodes, Links and smilies are on.',
	'SHOUT_RULES_VIEW'				=> 'Visualizing Rules main shoutbox:',
	'SHOUT_RULES_VIEW_PRIV'			=> 'Visualizing Rules private shoutbox:',
	'SMILIES_EMOTION'				=> 'emotion smiley',
	'SMILIES_OVERVIEW'				=> 'Smilies displayed in the shoutbox',
	'SMILIES_POPUP'					=> 'Smilies displayed in the popup',
	'SMILIES_DISPLAYED'				=> 'Send in the popup',
	'SMILIES_NO_DISPLAYED'			=> 'Turn on display',
	'SMILIES_CLIC_NO'				=> 'Click to not show this smiley',
	'SMILIES_CLIC_YES'				=> 'Click to view this smiley',
	'SMILIES_WIDTH'					=> 'Width of the popup Smilies',
	'SMILIES_WIDTH_EXPLAIN'			=> 'Enter the width of the additional smilies popup in pixels.',
	'SMILIES_HEIGHT'				=> 'Height of the popup Smilies',
	'SMILIES_HEIGHT_EXPLAIN'		=> 'Enter the height of the additional smilies popup in pixels.',
	'ORDER'							=> 'order',
	'SHOUT_AVATAR'					=> 'Display Avatars',
	'SHOUT_AVATAR_EXPLAIN'			=> 'Indicate whether you want to enable the display of user avatars.',
	'SHOUT_AVATAR_HEIGHT'			=> 'Dimension avatars',
	'SHOUT_AVATAR_HEIGHT_EXPLAIN'	=> 'Enter here the height avatars in pixels, width is calculated automatically.',
	'SHOUT_AVATAR_ROBOT'			=> 'Robot Avatar',
	'SHOUT_AVATAR_ROBOT_EXPLAIN'	=> 'Enable/Disable robot avatar <em>If avatars are enabled</em>.',
	'SHOUT_STATS'      				=> 'Messages of Shoutbox',
	'SHOUT_DATE_LAST_RUN'			=> 'Date last automatic prune',
	'SHOUT_LOGS'      				=> 'Attempts to post prohibited',
	'SHOUT_LOGS_EXPLAIN'      		=> 'Total number of attempts to post items prohibited in the shoutbox',
	'NUMBER_LOG_TOTAL' 				=> '<strong>%s</strong> attempt since %s',
	'NUMBER_LOGS_TOTAL' 			=> '<strong>%s</strong> attempts since %s',
	'NUMBER_SHOUTS' 				=> 'Total Posts',
	'SHOUT_VERSION'    				=> 'Shoutbox version',
	'SHOUT_STATISTICS'    			=> 'Statistics',
	'SHOUT_OPTIONS'    				=> 'Purge the Shoutbox',
	'PURGE_SHOUT'      				=> 'Delete all messages',
	'PURGE_SHOUT_MESSAGES'      	=> 'Delete the messages',
	'PURGE_SHOUT_ROBOT'      		=> 'Remove info Robot',
	'PURGE_SHOUT_ROBOT_EXPLAIN'     => 'possibility to removes all the info in the shoutbox Robot',
	'UNABLE_CONNECT'    			=> 'Unable to connect to the version check server, I got this error: %s',
	'NEW_VERSION'       			=> 'Your version of Breizh Shoutbox is not up to date. Your version is <strong>%1$s</strong>, the newest version is <strong>%2$s</strong>. Read following for more informations',
	'NO_MESSAGE' 					=> 'There is no message',
	'NO_SHOUT_LOG' 					=> 'There is no entry',
	'NUMBER_MESSAGE' 				=> '<strong>%s</strong> message',
	'NUMBER_MESSAGES' 				=> '<strong>%s</strong> messages',
	'NUMBER_LOG' 					=> '<strong>%s</strong> entry',
	'NUMBER_LOGS' 					=> '<strong>%s</strong> entries',
	'SHOUT_DEL_MAIN'    			=> 'Deleted messages',
	'SHOUT_DEL_ACP'    				=> 'Number of deleted messages in the acp:',
	'SHOUT_DEL_AUTO'    			=> 'Number of messages deleted automatically:',
	'SHOUT_DEL_PURGE'    			=> 'Number of messages deleted during a purge:',
	'SHOUT_DEL_USER'    			=> 'Number of messages deleted by users:',
	'SHOUT_DEL_NR'    				=> '<strong>%s</strong> Deleted message',
	'SHOUT_DEL_NRS'    				=> '<strong>%s</strong> Deleted messages',
	'SHOUT_DEL_TOTAL'    			=> ' total',
	'SHOUT_MAX_CHARS'				=> 'characters',
	'SHOUT_MODS_DISPO'				=> 'List of mods compatible with Breizh Shoutbox',
	'SHOUT_FILE'    				=> 'No version is compatible in this version, make the requested changes',
	'SHOUT_FILE_OK'    				=> 'the version that is compatible in origin with the Breizh Shoutbox is: ',
	'SHOUT_FILE_LIEN'    			=> 'For changes to be made, see: ',
	'SHOUT_FILE_GO'    				=> 'Forum options for Breizh Shoutbox',
	'SHOUT_ENABLE'					=> 'Enable the shoutbox',
	'SHOUT_ENABLE_EXPLAIN'			=> 'Enable/Disable the shoutbox and all functions related.',
	'SHOUT_WIDTH_POST'				=> 'Size of the area post',
	'SHOUT_WIDTH_POST_PRO_EXPLAIN'	=> 'Please select the length of the entry area of the shoutbox messages (in pixels) for all styles derived of <strong><em>prosilver</em></strong>',
	'SHOUT_WIDTH_POST_SUB_EXPLAIN'	=> 'Please select the length of the entry area of the shoutbox messages (in pixels) for all styles derived of <strong><em>subsilver2</em></strong>',
	'SHOUT_CONFIG_TITLE'			=> 'Title of the shoutbox',
	'SHOUT_CONFIG_TITLE_EXPLAIN'	=> 'You can choose a title for your shoutbox',
	'SHOUT_PRUNE_TIME'				=> 'Prune time',
	'SHOUT_PRUNE_TIME_EXPLAIN'		=> 'The time when the messages are pruned automaticcly. When number of messages in the BDD setting is enabled, that will overide this setting. Set this setting to 0 to disable',
	'SHOUT_MAX_POSTS'				=> 'Maximum number of messages in the BDD',
	'SHOUT_MAX_POSTS_EXPLAIN'		=> 'Maximum number of messages in the BDD. Set <strong>0</strong> to disable. If this setting if enabled, it will <strong>overide</strong> the prune setting.',
	'SHOUT_MAX_POSTS_ON'			=> 'Maximum numbers of messages to display',
	'SHOUT_MAX_POSTS_ON_EXPLAIN'	=> 'This allows you to specify the maximum number of messages to be displayed in the shoutbox, regardless of the total.',
	'SHOUT_CORRECT'         		=> 'Correction of minutes',
	'SHOUT_CORRECT_EXPLAIN'         => 'Enabling this setting allows you to automatically correct the display of the minutes of the hour messages if the user uses a date format that contains "less than a minute" <em>(Auto refresh)</em>. This affects only messages less than an hour.',
	'SHOUT_FLOOD_INTERVAL'         	=> 'Flood interval',
	'SHOUT_FLOOD_INTERVAL_EXPLAIN' 	=> 'The time minimum time between 2 posts for users. Set 0 to disable. A user permission is allowed to ignore',
	'SHOUT_IE_NR'					=> 'Number of messages per page for IE &lt; 9 and mobile browsers',
	'SHOUT_IE_NR_EXPLAIN'			=> 'Choose the number of messages for internet explorer &lt; 9 and mobile browsers. (scrool impossible with these browsers).<br />This also determines the height of the div messages.',
	'SHOUT_NR_ACP'					=> 'Number of messages in acp',
	'SHOUT_NR_ACP_EXPLAIN'			=> 'Choose the number of messages per page in the acp, tab overview.',
	'SHOUT_MAX_POST_CHARS'			=> 'Maximum number of characters',
	'SHOUT_MAX_POST_CHARS_EXPLAIN'	=> 'Choose the maximum number of characters it is possible to post in a message.<br />Note that there is a permission to bypass this limit',
	'SHOUT_IE_NR_POP_EXPLAIN'		=> 'Choose the number of messages in Internet Explorer &lt; 9 and mobile browsers. (scrool impossible with these browsers).<br />This also determines the height of the div messages. <em>Default: 20</em>',
	'SHOUT_NON_IE_NR'				=> 'Number of messages per page',
	'SHOUT_NON_IE_NR_EXPLAIN'		=> 'The number of messages in other browser as IE &lt; 9 and mobile browsers.',
	'SHOUT_BACKGROUND_COLOR'		=> 'Background image of the shoutbox',
	'SHOUT_BACKGROUND_COLOR_EXPLAIN'=> 'Select the background image of the shoutbox for all styles derived of <strong><em>prosilver</em></strong>',
	'SHOUT_BACKGROUND_SUB_COLOR_EXPLAIN'=> 'Select the background image of the shoutbox for all styles derived of <strong><em>subsilver2</em></strong>',
	'SHOUT_BUTTON_BACKGROUND'		=> 'Background image under the buttons',
	'SHOUT_BUTTON_BACKGROUND_EXPLAIN'=> 'Choose whether to display the background image under the left buttons',
	'SHOUT_HEIGHT'					=> 'Height of the div messages',
	'SHOUT_HEIGHT_EXPLAIN'			=> 'For browsers other than IE &lt; 9 and mobile browsers, find here the height of the div messages in the shoutbox. <em>Default: 150</em>',
	'SHOUT_HEIGHT_POP_EXPLAIN'		=> 'For browsers other than IE &lt; 9 and mobile browsers, find here the height of the div messages in the shoutbox. <em>Default: 460</em>',
	'SHOUT_POSITION_INDEX'			=> 'Shoutbox Position on the index',
	'SHOUT_POSITION_INDEX_EXPLAIN'	=> 'Decide what position you want to assign to the shoutbox on the index page of the forum.',
	'SHOUT_POSITION_FORUM'			=> 'Shoutbox Position on the viewforum',
	'SHOUT_POSITION_FORUM_EXPLAIN'	=> 'Decide what position you want to assign to the shoutbox on the pages of forums (viewforum).',
	'SHOUT_POSITION_TOPIC'			=> 'Shoutbox Position on the viewtopic',
	'SHOUT_POSITION_TOPIC_EXPLAIN'	=> 'Decide what position you want to assign to the shoutbox on the pages of messages (viewtopic).',
	'SHOUT_POSITION_PORTAL'			=> 'Shoutbox Position on the portal',
	'SHOUT_POSITION_PORTAL_EXPLAIN'	=> 'Decide what position you want to assign to the shoutbox on the forum portal.',
	'SHOUT_POSITION_ANOTHER'		=> 'Shoutbox Position on the additional pages',
	'SHOUT_POSITION_ANOTHER_EXPLAIN' => 'Decide what position you want to assign to the shoutbox on the additional pages on the forum.',
	'SHOUT_INDEX_ON'				=> 'Display on the index page',
	'SHOUT_INDEX_ON_EXPLAIN'		=> 'Decide if you want to display the shoutbox on the index page',
	'SHOUT_FORUM_ON'				=> 'Display on the view forums',
	'SHOUT_FORUM_ON_EXPLAIN'		=> 'Decide if you want to display the shoutbox on forums pages (viewforum)',
	'SHOUT_TOPIC_ON'				=> 'Display on the view topics',
	'SHOUT_TOPIC_ON_EXPLAIN'		=> 'Decide if you want to display the shoutbox on topics pages (viewtopic)',
	'SHOUT_ANOTHER_ON'				=> 'Display on the additional pages',
	'SHOUT_ANOTHER_ON_EXPLAIN'		=> 'Decide if you want to display the shoutbox on additional pages.<br />(Make sure you have entered the code lines in .Php and .Html files corresponding)',
	'SHOUT_PORTAL_ON'				=> 'Display on the portal',
	'SHOUT_PORTAL_ON_EXPLAIN'		=> 'Decide if you want to display the shoutbox on the forum portal.<br />(Make sure you have entered the code lines in portal.php and portal_body.html)',
	'SHOUT_ON_CRON'					=> 'Enabling automatic deletions and prune',
	'SHOUT_ON_CRON_EXPLAIN'			=> 'Decide if you want to enable automatic deletions and automatic prune of messages.',
	'SHOUT_LOG_CRON'				=> 'Log of deletions and automatic prune',
	'SHOUT_LOG_CRON_EXPLAIN'		=> 'Decide if you want to enter in the admin log deletions and automatic prune messages.',
	'SHOUT_SEE_BUTTONS'				=> 'Display icons above',
	'SHOUT_SEE_BUTTONS_EXPLAIN'		=> 'Decide if you want to display icons above although the user does not have permission to use them (see the padlock on mouseover).',
	'SHOUT_SEE_BUTTONS_LEFT'		=> 'Display icons left',
	'SHOUT_SEE_BUTTONS_LEFT_EXPLAIN'=> 'Decide if you want to display icons to the left of the messages although the user does not have permission to use them (see the padlock on mouseover).',
	'SHOUT_POP_HEIGHT'				=> 'Height of the popup',
	'SHOUT_POP_HEIGHT_EXPLAIN'		=> 'Determine the height of the shoutbox popup',
	'SHOUT_POP_WIDTH'				=> 'Width of the popup',
	'SHOUT_POP_WIDTH_EXPLAIN'		=> 'Determine the width of the shoutbox popup',
	'SHOUT_MESSAGES_TOTAL'			=> 'Number of total messages',
	'SHOUT_MESSAGES_TOTAL_EXPLAIN'	=> 'Number of posts in total since the installation of Breizh Shoutbox.',
	'SHOUT_MESSAGES_TOTAL_NR'		=> '<strong>%s</strong> messages since %s',
	'SHOUT_POSITION_TOP'			=> 'At the top of page',
	'SHOUT_POSITION_AFTER'			=> 'After the list of forums',
	'SHOUT_POSITION_END'			=> 'At the bottom of page',
	'SHOUTBOX_VERSION_COPY'			=> '<a href="http://breizh-portal.com/mod-breizh-shoutbox-f21.html">Breizh Shoutbox v%s © 2010, 2011</a>',
	'SHOUT_COPY'					=> '<a href="%1$smod-breizh-shoutbox-f21.html">%2$s</a>',
	'SHOUTBOX'						=> '<a href="%1$sindex.html">%2$s</a>',
	'SHOUTBOX_VERSION_ACP_COPY'		=> '- - - - - - - - - - - - - - - - - - - - - -<br /><a href="http://breizh-portal.com/mod-breizh-shoutbox-f21.html" onclick="this.target=\'_blank\';">Breizh Shoutbox v%s</a> © 2010, 2011 - <a href="http://breizh-portal.com/index.html" onclick="this.target=\'_blank\';">Breizh-Portal</a> - The Breizh Touch',
	'SHOUT_TOUCH_COPY'				=> '<span style="font-size: 11px">Breizh Shoutbox © 2010, 2011 <a href="http://breizh-portal.com/index.html">The Breizh touch</a></span>',
	'SHOUT_VERSION_UP_TO_DATE'		=> 'Your installation is up to date, no update is available for your version of Breizh Shoutbox: v%s. You do not need to update your installation.',
	'SHOUT_NO_VERSION'				=> '<span style="color: red">Failed to obtain latest version information...</span>',
	'SHOUT_MESSAGES'      			=> 'messages',
	'SHOUT_PAGES'      				=> 'pages',
	'SHOUT_SECONDES'      			=> 'seconds',
	'SHOUT_APERCU'      			=> 'overview: ',
	'SHOUT_DATE'      				=> 'date',
	'SHOUT_USER'      				=> 'user',
	'SHOUT_HOURS'					=> 'Hours',
	'SHOUT_PIXELS'					=> 'Pixels',
	'SHOUT_NEVER'      				=> 'Never done',
	'SHOUT_LOG_ENTRIE'      		=> 'Type attempt made',
	'SHOUT_NO_ADMIN'				=> 'You do not have administrative rights and can not access the resource',
	'SHOUT_SERVER_HOUR'				=> 'The current server hour is: %s hour %s',
	'SHOUT_SERVER_HOURS'			=> 'The current server hour is: %s hours %s',
	'SHOUT_BAR'						=> 'Position of the post box',
	'SHOUT_BAR_EXPLAIN'				=> 'Choose whether you want the post box at the top or bottom of the shoutbox.',
	'SHOUT_PAGIN'					=> 'Position of the paging',
	'SHOUT_PAGIN_EXPLAIN'			=> 'Choose whether you want the paging on right in post box or bottom of the shoutbox.',
	'SHOUT_BAR_TOP'					=> 'At the top of the shoutbox',
	'SHOUT_BAR_BOTTOM'				=> 'At the bottom of the shoutbox',
	'SHOUT_PAGIN_IN'				=> 'At right in the bar',
	'SHOUT_PAGIN_BOTTOM'			=> 'At the bottom of the shoutbox',
	'SHOUT_SOUND_NEW'				=> 'Sound of new posts',
	'SHOUT_SOUND_NEW_EXPLAIN'		=> 'Choose the sound to be activated by default for the arrival of new messages.',
	'SHOUT_SOUND_ERROR'				=> 'Sound of errors',
	'SHOUT_SOUND_ERROR_EXPLAIN'		=> 'Choose the sound to be activated by default for the errors.',
	'SHOUT_SOUND_DEL'				=> 'Sound deletions',
	'SHOUT_SOUND_DEL_EXPLAIN'		=> 'Select the sound to be activated by default for deletions of messages',
	'SHOUT_ALL_MESSAGES'			=> ' all messages of the shoutbox,',
	'SHOUT_PANEL'					=> 'Retractable Lateral Panel',
	'SHOUT_PANEL_EXPLAIN'			=> 'Activate the retractable lateral panel on every page of the forum does not include the shoutbox, except in the excluded pages.',
	'SHOUT_PANEL_ALL'				=> 'Retractable lateral panel anywhere',
	'SHOUT_PANEL_ALL_EXPLAIN'		=> 'Activate the retractable lateral panel over the pages that already has the shoutbox.',
	
	// Robot
	'SHOUT_ROBOT_ACTIVATE'			=> 'Enable Robot',
	'SHOUT_ROBOT_ACTIVATE_EXPLAIN'	=> 'Make no completely disables all Robot functions in the shoutbox.<br /><em>Does not disable the enter information in the private shoutbox.</em>',
	'SHOUT_ROBOT_MESSAGE'			=> 'Robot Messages',
	'SHOUT_ROBOT_MESSAGE_EXPLAIN'	=> 'Enable info new posts/topics in the main shoutbox.',
	'SHOUT_ROBOT_REP'				=> 'Replies to topics',
	'SHOUT_ROBOT_REP_EXPLAIN'		=> 'Enable Info replies to topics in the main shoutbox.',
	'SHOUT_ROBOT_EDIT'				=> 'Editing Posts',
	'SHOUT_ROBOT_EDIT_EXPLAIN'		=> 'Enable editing info messages in the main shoutbox.',
	'SHOUT_ROBOT_MES_PRIV'			=> 'Robot Messages in private shoutbox',
	'SHOUT_ROBOT_MES_PRIV_EXPLAIN'	=> 'Enable info new posts/topics in the private shoutbox.',
	'SHOUT_ROBOT_REP_PRIV'			=> 'Replies to topics in private shoutbox',
	'SHOUT_ROBOT_REP_PRIV_EXPLAIN'	=> 'Enable Info replies to topics in the private shoutbox.',
	'SHOUT_ROBOT_EDIT_PRIV'			=> 'Editing Posts n private shoutbox',
	'SHOUT_ROBOT_EDIT_PRIV_EXPLAIN'	=> 'Enable editing info messages in the private shoutbox.',
	'SHOUT_ROBOT_DEL'				=> 'Shedding and automatic purge',
	'SHOUT_ROBOT_DEL_EXPLAIN'		=> 'Enable/disable messages of Shedding and automatic purge in the two shoutbox',
	'SHOUT_ROBOT_PREZ'				=> 'Presentation forum',
	'SHOUT_ROBOT_PREZ_EXPLAIN'		=> 'Enter here the number of presentation forum members if you have one. The robot will broadcast different information.',
	'SHOUT_ROBOT_EXCLU'				=> 'Excluded forums',
	'SHOUT_ROBOT_EXCLU_EXPLAIN'		=> 'Select the forums to which you do not want to publicize the release of new posts.<br />=> Note that the displays of information depends on the Rights of views Forums.',
	'SHOUT_ROBOT_COLOR'				=> 'Color of the Robot',
	'SHOUT_ROBOT_COLOR_INFO'		=> 'Color of the messages/infos:',
	'SHOUT_ROBOT_SESSION'			=> 'Sessions Robot',
	'SHOUT_ROBOT_SESSION_EXPLAIN'	=> 'Enables/disables the welcome message to each user when they log on the forum.',
	'SHOUT_ROBOT_SESSION_PRIV'		=> 'Sessions Robot in private shoutbox',
	'SHOUT_ROBOT_SESSION_PRIV_EXPLAIN'=> 'Enables/disables the welcome message to each user when they log on the forum in the private shoutbox.',
	'SHOUT_ROBOT_SESSION_R'			=> 'Sessions Robot of bots',
	'SHOUT_ROBOT_SESSION_R_EXPLAIN'	=> 'Enable/disable notification of bots connection when they connect to the forum in main shoutbox.',
	'SHOUT_ROBOT_SESSION_R_PRIV'	=> 'Sessions Robot of bots in private shoutbox',
	'SHOUT_ROBOT_SESSION_R_PRIV_EXPLAIN'=> 'Enable/disable lnotification of bots connection when they connect to the forum in private shoutbox.',
	'SHOUT_ROBOT_HELLO'				=> 'Robot’s date of day',
	'SHOUT_ROBOT_HELLO_EXPLAIN'		=> 'Enable/disable notification of the current date.',
	'SHOUT_ROBOT_HELLO_PRIV'		=> 'Robot’s date of day private shoutbox',
	'SHOUT_ROBOT_HELLO_PRIV_EXPLAIN'=> 'Enable/disable notification of the current date in private shoutbox',
	'SHOUT_ROBOT_BIRTHDAY'			=> 'Robot’s birthdays',
	'SHOUT_ROBOT_BIRTHDAY_EXPLAIN'	=> 'Enable/disable Notifications of birthdays.',
	'SHOUT_ROBOT_BIRTHDAY_PRIV'		=> 'Robot’s birthdays private shoutbox',
	'SHOUT_ROBOT_BIRTHDAY_PRIV_EXPLAIN'	=> 'Enable/disable Notifications of birthdays in private shoutbox.',
	'SHOUT_ROBOT_CRON_H'			=> 'Schedule informations date and anniversaries',
	'SHOUT_ROBOT_CRON_H_EXPLAIN'	=> 'Enter here the time at which you want information for the current date and anniversaries are disseminated. <em>(24-hour format)</em>',
	'SHOUT_ROBOT_NEWEST'			=> 'Robot of new registrations',
	'SHOUT_ROBOT_NEWEST_EXPLAIN'	=> 'Enable/disable Notifications of new registrations.',
	'SHOUT_ROBOT_NEWEST_PRIV'		=> 'Robot of new registrations private shoutbox',
	'SHOUT_ROBOT_NEWEST_PRIV_EXPLAIN'=> 'Enable/disable Notifications of new registrations in private shoutbox.',
	'SHOUT_ROBOT_CHOICE'			=> 'Parameters of the purge Robot in front',
	'SHOUT_ROBOT_CHOICE_EXPLAIN'	=> 'Choose here all infos Robot you want to serve on the front.<br />Vou can add as many options as desired.<br />Note that infos for purge and load shedding will always be erased.',
	'SHOUT_ON_CONNECT'				=> 'Connections Infos',
	'SHOUT_ON_SUBJET'				=> 'New forum topics',
	'SHOUT_ON_REPONSE'				=> 'Responses to topics and editions',
	'SHOUT_ON_BIRTHDAY'				=> 'Birthdays',
	'SHOUT_ON_DAY'					=> 'Dates of the Day',
	'SHOUT_ON_NEWS'					=> 'New registrations',
	'SHOUT_ON_PRIV'					=> 'Connections in private shout',
	'SHOUT_ON_MODS'					=> 'Infos of Add-on Mods',
	'SHOUT_PURGE_ON'				=> 'Purge the ',
	'SHOUT_NO_MOD_ROBOT'			=> 'You do not have at this moment, any mod on your forum that is compatible with the robot Breizh Shoutbox...',
	'SHOUT_MOD_ROBOT'				=> 'Here you can set options for mods on your forum, compatible with the robot Breizh Shoutbox...',
	
	// Add-ons for another Mods
	// Mod Ultimate points system
	'MOD_UPS'						=> 'Mod Ultimate points system',
	'SHOUT_ROBBERY'					=> 'Robberies’s Robot',
	'SHOUT_ROBBERY_EXPLAIN'			=> 'Enables/disables notifications of successful robberies in Ultimate Points System.',
	'SHOUT_LOTTERY'					=> 'Lottery’s Robot',
	'SHOUT_LOTTERY_EXPLAIN'			=> 'Enables/disables notifications of lotteries won by members.',
	'SHOUT_ROBBERY_PRIV'			=> 'Robberies’s Robot private shoutbox',
	'SHOUT_ROBBERY_PRIV_EXPLAIN'	=> 'Enables/disables notifications of lotteries won by members in private shoutbox.',
	'SHOUT_LOTTERY_PRIV'			=> 'Lottery’s Robot private shoutbox',
	'SHOUT_LOTTERY_PRIV_EXPLAIN'	=> 'Enables/disables notifications of lotteries won by members in private shoutbox in private shoutbox.',
	// Mod Hangman
	'MOD_HANGMAN'					=> 'Mod Hangman',
	'SHOUT_HANGMAN'					=> 'Robot for Hangman resolved',
	'SHOUT_HANGMAN_EXPLAIN'			=> 'Enables/disables notifications resolutions Hangman by members.',
	'SHOUT_HANGMAN_PRIV'			=> 'Robot for Hangman resolved private shoutbox',
	'SHOUT_HANGMAN_PRIV_EXPLAIN'	=> 'Enables/disables notifications resolutions Hangman by members in private shoutbox.',
	'SHOUT_HANGMAN_CR'				=> 'Robot creations of Hangman',
	'SHOUT_HANGMAN_CR_EXPLAIN'		=> 'Enables/disables notifications of creations Hangman by members.',
	'SHOUT_HANGMAN_CR_PRIV'			=> 'Robot creations of Hangman private shoutbox',
	'SHOUT_HANGMAN_CR_PRIV_EXPLAIN'	=> 'Enables/disables notifications of creations Hangman by members in private shoutbox.',
	// Mod tracker
	'MOD_TRACKER'					=> 'Mod Traqueur',
	'SHOUT_TRACKER'					=> 'Robot Ticket Tracker',
	'SHOUT_TRACKER_EXPLAIN'			=> 'Enables/disables Notifications of new tickets in the tracker.',
	'SHOUT_TRACKER_REP'				=> 'Robot replies Tracker',
	'SHOUT_TRACKER_REP_EXPLAIN'		=> 'Enables/disables notifications of replies to tickets in the tracker.',
	'SHOUT_TRACKER_EDIT'			=> 'Robot editions Tracker',
	'SHOUT_TRACKER_EDIT_EXPLAIN'	=> 'Enables/disables notifications editions tickets and answers in the tracker.',
	'SHOUT_TRACKER_PRIV'			=> 'Robot Ticket Tracker private shoutbox',
	'SHOUT_TRACKER_PRIV_EXPLAIN'	=> 'Enables/disables Notifications of new tickets in the tracker in private shoutbox.',
	'SHOUT_TRACKER_REP_PRIV'		=> 'Robot replies Tracker private shoutbox',
	'SHOUT_TRACKER_REP_PRIV_EXPLAIN'=> 'Enables/disables notifications of replies to tickets in the tracker in private shoutbox.',
	'SHOUT_TRACKER_EDIT_PRIV'		=> 'Robot editions Tracker private shoutbox',
	'SHOUT_TRACKER_EDIT_PRIV_EXPLAIN'=> 'Enables/disables notifications editions tickets and answers in the tracker in private shoutbox.',
	
	// Installation
	'SHOUT_WELCOME'					=> '[color=#008000]This is your first post. Welcome in the %s[/color]... [i]from Sylver35[/i] ...', // Will be modified by generate_text_for_storage()
	'SHOUT_WELCOME_INSTALL'			=> '[i][b][color=#ff0000]Mounting of the Mod %s successful![/color][/b][/i]', // Will be modified by generate_text_for_storage()
	'SHOUT_USE_NEXT'				=> 'The version 1.0.0 of Breizh Shoutbox is detected on your board, please read first <a href="http://breizh-portal.com/mod-breizh-shoutbox-version-1-1-0-p1074.html#p1074">this message</a> and download the update v1.0.0 to 1.1.0 before continuing.',
	'SHOUT_PRIV'					=> 'Private Shoutbox',
	'SHOUT_NAME_FULL'				=> '© Breizh Shoutbox v%s',
	
	// Update instructions
	'SHOUTBOX_INSTRUCTIONS'			=> '<br /><h1>Use Of Breizh Shoutbox v%1$s</h1><br />
										<p>Team Breizh Portal wishes you well enjoy the features of this Mod.<br />
										We have made every effort so that you can have a shoutbox efficient and responsive to your needs maximizing choice of personalization.<br />
										Feel free to donate to perpetuate the development and support... Go <strong><a href="%2$s" title="Mod Breizh Shoutbox Tracker">here</a></strong></p>
										<p>For any support request, go in the <strong><a href="%3$s" title="Support forum dedicated to Breizh Shoutbox Mod">Support forum dedicated to Breizh Shoutbox Mod</a></strong></p>
										<p>Visit the Tracker <strong><a href="%4$s" title="Mod Breizh Shoutbox Tracker">on this page</a></strong>. Keep you informed of any bugs, additions or feature requests, security...</p>',
	'SHOUTBOX_UPDATE_INSTRUCTIONS'	=> '<br /><br /><h1>Release announcement version %2$s</h1><br /><br />
		<p>Please read <strong><a href="%1$s" title="%1$s">the release announcement of the latest version</a></strong> before continuing the process of updating, it may contain useful information. It also contains complete links to download and the change log.</p>
		<p>For any support request, go in the <strong><a href="%3$s" title="Support forum dedicated to Breizh Shoutbox Mod">Support forum dedicated to Breizh Shoutbox Mod</a></strong></p>
		<p>Visit the Tracker <strong><a href="%4$s" title="Mod Breizh Shoutbox Tracker">on this page</a></strong>. Keep you informed of any bugs, additions or feature requests, security...</p>',
	
	// Added in version 1.4.0
	'SHOUT_USERS_CAN_CHANGE'		=> 'Note that users can enable/disable this setting individually',
	'SHOUT_AVATAR_USER'				=> 'User’s avatars',
	'SHOUT_AVATAR_USER_EXPLAIN'		=> 'Enable/disable default avatar for users without an avatar.',
	'SHOUT_AVATAR_IMG'				=> 'Avatar image default',
	'SHOUT_AVATAR_IMG_EXPLAIN'		=> 'Specify here the image chosen for the avatar by default for users who do not choose.<br />This image should be in the folder “images/shoutbox/” <em>defaut</em>: “no_avatar.gif”',
	'SHOUT_AVATAR_IMG_BOT'			=> 'Avatar image of the robot',
	'SHOUT_AVATAR_IMG_BOT_EXPLAIN'	=> 'Specify here the image chosen for the avatar of the robot.<br />This image should be in the folder “images/shoutbox/”<br /><em>defaut</em>: “avatar_robot.png”',
	'SHOUT_SOUND_EMPTY'				=> 'No sound',
	'SHOUT_SOUND_ON'				=> 'Activate the sounds',
	'SHOUT_SOUND_ON_EXPLAIN'		=> 'Enable/disable all sounds in the shoutbox.',
	
	// Added in version 1.5.0
	'SHOUT_BBCODE'					=> 'Prohibition bbcodes',
	'SHOUT_BBCODE_EXPLAIN'			=> 'Enter here the list of bbcodes that you do not want in the shoutbox.<br />Some bbcodes can cause bugs, your experience will allow you to list them here.<br />You must enter them without the brackets, separated by a comma and a space.<br />Ex:&nbsp;&nbsp;<em>list, code, quote</em>',
	'SHOUT_BBCODE_USER_EXPLAIN'		=> 'Enter the list of bbcode that you do not want in the format of messages users.<br />The list of prohibited bbcodes above is already considered, this list is a complement. The videos are already prohibited.<br />You must enter them without the brackets, separated by a comma and a space.<br />Eg:&nbsp;&nbsp;<em>list, code, quote</em>',
	'SHOUT_BBCODE_SIZE'				=> 'Font size',
	'SHOUT_BBCODE_SIZE_EXPLAIN'		=> 'Enter here the maximum font size allowed for the bbcode size= in the formatting user’s messages.<br />The number 100 corresponds to the overall size of the police, 150 corresponds to one and half times that size.',
	'SHOUT_PANEL_PERMISSIONS'		=> 'To see this panel, must have permissions: “<em>A user can view the shoutbox in a lateral panel</em>” and “<em>A user can use the shoutbox in popup</em>” to yes.<br />Not enabled for mobile phones.',
	'SHOUT_PANEL_KILL'				=> 'pages excluded',
	'SHOUT_PANEL_KILL_EXPLAIN'		=> 'You can select or exclude pages displaying the retractable lateral panel.<br />Enter the name of the php page with the settings and the path if different from root.<br />One page per line. Ex: <em>ucp.php?mode=register&nbsp;&nbsp;gallery/index.php</em><br />Pages automatically excluded: errors, informations, redirections and connexion.',
	'SHOUT_PANEL_IMG'				=> 'Opening Image',
	'SHOUT_PANEL_IMG_EXPLAIN'		=> 'Choose the opening image for the retractable lateral panel.<br />Images of directory root/images/shoutbox/panel/',
	'SHOUT_PANEL_EXIT_IMG'			=> 'Closing Image',
	'SHOUT_PANEL_EXIT_IMG_EXPLAIN'	=> 'Choose the closing image for the retractable lateral panel.<br />Images of directory root/images/shoutbox/panel/',
	'SHOUT_PANEL_WIDTH'				=> 'Lateral panel width',
	'SHOUT_PANEL_WIDTH_EXPLAIN'		=> 'Specify the width of the retractable lateral panel.<br />Note that it must contain in the shoutbox in popup.',
	'SHOUT_PANEL_HEIGHT'			=> 'Lateral panel height',
	'SHOUT_PANEL_HEIGHT_EXPLAIN'	=> 'Specify the height of the retractable lateral panel.',
	'SHOUT_ROBOT_CHOICE_PRIV'		=> 'Parameters of the purge Robot in front private shoutbox',
	'SHOUT_ROBOT_CHOICE_PRIV_EXPLAIN'=> 'Choose here all infos Robot you want to serve on the front.<br />You can add as many options as desired in the private shoutbox.<br />You can add as many choices as desired.<br />Note that infos for purge and load shedding will always be erased.',
	'SHOUT_TEMP'					=> 'Refresh time',
	'SHOUT_TEMP_TITLE'				=> 'setting the time of updating for shoutbox depending on the status connected/not connected.<br />Too short, there are risks that the server can not respond within the allotted time, too long, you lose responsiveness.<br />change the value until a satisfactory performance according to your server.',
	'SHOUT_TEMP_USERS'				=> 'Refresh time for members',
	'SHOUT_TEMP_USERS_EXPLAIN'		=> 'Choose here the time to refresh the shoutbox for members online.',
	'SHOUT_TEMP_ANONYMOUS'			=> 'Refresh time for guests',
	'SHOUT_TEMP_ANONYMOUS_EXPLAIN'	=> 'Choose here the time to refresh the shoutbox for guests.',
	'SHOUT_TEMP_BOT'				=> 'Refresh time for bots',
	'SHOUT_TEMP_BOT_EXPLAIN'		=> 'Time to refresh for bots is not adjustable, it is set by default to 120 seconds in order not to unnecessarily consume resources.',
	'SHOUT_BIRTHDAY_EXCLUDE'		=> 'Exclude groups',
	'SHOUT_BIRTHDAY_EXCLUDE_EXPLAIN'=> 'You can select one or more groups will be excluded from birthdays to wish.<br />Banned members are automatically excluded.<br /><br />Use ctrl+click to select more than one group.',
	'SHOUT_INACTIV_A'				=> 'Inactivity time of guests',
	'SHOUT_INACTIV_A_EXPLAIN'		=> 'Here you determine the time of inactivity of the guests, after this period, the shoutbox will automatically standby and so will not do more requests.',
	'SHOUT_INACTIV_B'				=> 'Inactivity time of registered users',
	'SHOUT_INACTIV_B_EXPLAIN'		=> 'Here you determine the time of inactivity of the registered users, after this period, the shoutbox will automatically standby and so will not do more requests.<br />Note that there is a permission to skip this.',
));

?>
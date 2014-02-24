<?php
/** 
*
* Module Breizh Shoutbox [English]
*
* @package language
* @version $Id: shout.php 150 16:15 16/12/2011 Sylver35 Exp $ 
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

$lang = array_merge($lang, array(
	'SHOUT_ROBOT'			=> 'Robot',
	'SHOUT_TOUCH'			=> 'The Breizh Touch',
	'MISSING_DIV' 			=> 'The shoutbox div can’t be found.',
	'NO_POST_GUEST'         => 'Guests can post.',
	'LOADING' 				=> 'Loading...',
	'SHOUT_MESSAGE'			=> 'Message',
	'POST_MESSAGE'			=> 'Post',
	'POST_MESSAGE_ALT'		=> 'Post a message',
	'SENDING' 				=> 'Sending message...',
	'MESSAGE_EMPTY'			=> 'Message is empty.',
	'XML_ER' 				=> 'XML error, refresh page...',
	'NO_MESSAGE' 			=> 'There are no messages.',
	'NO_AJAX' 				=> 'No ajax',
	'NO_AJAX_USER' 			=> 'You must enable Javascript to view the Shoutbox.',
	'NO_SHOUT_ID'	 		=> 'No message id.',
	'JS_ERR' 				=> 'There has been a JavaScript error. Error:',
	'LINE' 					=> 'Line',
	'FILE' 					=> 'File',
	'FLOOD_ERROR'	 		=> 'Flood error',
	'POSTED' 				=> 'Message posted...',
	'NO_CODE' 				=> 'The following bbcode: %s is not accepted.',
	'NO_VIDEO' 				=> 'It is not possible to post videos in the shoutbox',
	'NO_SCRIPT' 			=> 'The scripts are not tolerated in this shoutbox !!  Please note that this attempt has been registered with your ip.',
	'NO_APPLET' 			=> 'The applets are not tolerated in this shoutbox !!  Please note that this attempt has been registered with your ip.',
	'NO_ACTIVEX' 			=> 'The active x objets are not tolerated in this shoutbox !!  Please note that this attempt has been registered with your ip.',
	'NO_OBJECTS' 			=> 'The chrome & about objets are not tolerated in this shoutbox !!  Please note that this attempt has been registered with your ip.',
	'NO_IFRAME' 			=> 'The iframes are not tolerated in this shoutbox !!  Please note that this attempt has been registered with your ip.',
	'SHOUT_AVERT'			=> 'Respect the work of developers ... Leave the Copyright to their site!',
	'SHOUT_DEL'				=> 'delete the message',
	'DEL_SHOUT' 			=> 'Are you sure you want to delete this message?',
	'MSG_DEL_DONE' 			=> 'Message being deleted...',
	'NO_SHOUT_ID'	 		=> 'No message id.',
    'SHOUT_PAGE'            => 'Page N° ',
	'CODE'                  => 'code',
	'EDIT'                  => 'Edit',
	'CANCEL'                => 'discontinue',
	'COLORS'                => 'Colors',
	'SHOUT_IP'              => 'See ip poster',
	'SHOUT_EDIT'            => 'Edit message',
	'SENDING_EDIT'          => 'Publication after edition...',
    'EDIT_DONE'             => 'The message has been edited',
	'ONLY_ONE_OPEN'         => 'You can only have one edit box open',
	'SHOUT_AVATAR_SHORT'	=> 'Avatar',
	'SHOUT_AVATAR_TITLE'	=> 'Avatar of %s',
	'SHOUT_COPY'			=> '<a href="%1$smod-breizh-shoutbox-f21.html">%2$s</a>',
	'SHOUT_COLOR'			=> 'Colorize text',
	'SHOUT_COLOR_CLOSE'		=> 'Collapse colorizing text',
	'SHOUT_CHARS'			=> 'Add special characters',
	'SHOUT_CHARS_CLOSE'		=> 'Close the panel of special characters',
	'SHOUT_BOLD'			=> 'Bold text',
	'SHOUT_ITALIC'			=> 'Italicize',
	'SHOUT_UNDERLINE'		=> 'Underline text',
	'SHOUT_IMAGE'			=> 'Include an image',
	'SHOUT_URL'				=> 'Include a web address',
	'SMILIES' 				=> 'Include Smilies', 
	'SMILIES_CLOSE' 		=> 'Collapse the Smilies panel',
	'SHOUT_MORE_SMILIES'	=> 'More smilies',
	'SHOUT_MORE_SMILIES_ALT' => 'Click here to see more smilies',
	'SHOUT_POST_IP'			=> 'IP of the message author:',
	'SHOUTBOX'				=> '<a href="%1$sindex.html">%2$s</a>',
	'SHOUTBOX_VER'			=> 'Breizh Shoutbox v%s',
	'SHOUTBOX_VER_ALT'		=> 'Breizh Shoutbox v%s © 2011',
	'SHOUTBOX_POPUP'		=> 'Breizh Shoutbox Popup',
	'SHOUT_POP'				=> 'Open shoutbox in a popup',
	'SHOUT_RULES'			=> 'Rules for using the Shoutbox',
	'SHOUT_RULES_PRIV'		=> 'Rules for using the Private Shoutbox',
	'SHOUT_RULES_CLOSE'		=> 'Close the panel usage rules',
	'SHOUTBOX_SECRET'		=> 'Private Shoutbox',
	'SHOUT_PRIV'			=> 'Enter in the private shoutbox',
	'SHOUT_PURGE'			=> 'Purge the shoutbox',
	'SHOUT_PURGE_ALT'		=> 'Clic here to fully purge the shoutbox',
	'SHOUT_PURGE_BOX'		=> "Would you really completely purge the shoutbox? Please note, this action is irreversible...",
	'PURGE_PROCESS'			=> 'Purging the shoutbox in progress...',
	'SHOUT_PURGE_ROBOT_ALT'	=> 'Click here to purge the shoutbox infos robot',
	'SHOUT_PURGE_ROBOT_BOX'	=> 'Would you really purge the shoutbox infos robot ?',
	'SERVER_ERR'			=> 'There was something wrong while doing a request to the server, please refresh the page...',
	'SHOUT_ERROR' 			=> 'Error: ',
	'SHOUT_IMG_POST_ERROR'	=> 'Error: to insert an image, you must click on the icon image...',
	'SHOUT_IMG_DIM_ERROR'	=> 'Error: image sent is corrupt or is not an image...',
	'SHOUT_IMG_FOPEN_ERROR'	=> 'Error: unable to contact the server hosting the image...',
	'SHOUT_PROCESS_IMG'		=> 'Checks image in progress...',

	// User panel
	'MINUTES_CHOICE'		=> 'You’ve chosen a date format with minute countdown: “%s”<br />You can choose from two options, either have a sound to each new message or choose to update the minutes of messages.',
	'DISPLAY_SOUND_CHOICE'	=> 'You can choose to enable or disable the sound when new messages arrives',
	'SOUND_OR_NOT'			=> 'Choose the settings for you',
	'CHOOSE_NEW_SOUND'		=> 'Select the sound to be played at the new messages',
	'CHOOSE_ERROR_SOUND'	=> 'Select the sound to be played at errors',
	'CHOOSE_DEL_SOUND'		=> 'Select the sound to be played when deleting messages',
	'CHOOSE_NEW_YES'		=> 'The selected sound will be played at the new messages',
	'CHOOSE_ERROR_YES'		=> 'The selected sound will be played at errors',
	'CHOOSE_DELETE_YES'		=> 'The selected sound will be played when deleting messages',
	'CHOOSE_POSITIONS'		=> 'Positions of the shoutbox',
	'CHOOSE_NEW_NO'			=> 'No sound will be played at the new messages',
	'SHOUT_MINUTES_YES'		=> 'The correction of the minutes will be effective',
	'SHOUT_SOUND_MINUTES'	=> 'Correction of minutes',
	'SHOUT_SOUND_YES'		=> 'Activation of the sound',
	'SHOUT_SOUND_NO'		=> 'Mute the sound',
	'SHOUT_SOUND_ECOUTE'	=> 'Play sound',
	'SHOUT_CONFIG_OPEN'		=> 'Open the shoutbox preferences panel',
	'SHOUT_PANEL_USER'		=> 'User Settings panel',
	'SHOUT_PREF_UPDATED'	=> 'Your shoutbox preferences are saved',
	'RETURN_SHOUT_PREF'		=> '%s« Back to the preferences panel%s',
	'SHOUT_DEF_VAL'			=> 'Defaut values',
	'SHOUT_DEF_VAL_EXPLAIN'	=> 'Return to the default forum values',

	// No permission errors
	'NO_ADMIN_PERM'     	=> 'No admin permission found...',
	'NO_EDIT_PERM'			=> 'You arent allowed to edit this message...',
	'NO_DELETE_PERM'    	=> 'You arent allowed to delete messages...',
	'NO_DELETE_PERM_S'  	=> 'You arent allowed to delete your own messages...',
	'NO_DELETE_PERM_T'  	=> 'You arent allowed to delete messages from other users...',
	'NO_POST_PERM'			=> 'You arent allowed to post messages...',
	'NO_POST_PERM_GUEST'	=> '...You must be registered to post messages, Log in here...',
	'NO_PURGE_PERM'			=> 'You arent allowed to purge the shoutbox...',
	'NO_PURGE_ROBOT_PERM'	=> 'You arent allowed to purge the shoutbox infos...',
	'NO_SHOUT_BBCODE' 		=> 'You arent allowed to use BBCode...',
	'NO_SHOUT_CHARS'		=> 'You arent allowed to use special characters...',
	'NO_SHOUT_COLOR'		=> 'You arent allowed to use the colorization of text...',
	'NO_SHOUT_DEL'			=> 'You arent allowed to delete the message...',
	'NO_SHOUT_EDIT'         => 'You arent allowed to edit the message...',
	'NO_SHOUT_IMG'			=> 'You arent allowed to post images...',
	'NO_SHOUT_POP'			=> 'You arent allowed to use the shoutbox in a popup...',
	'NO_SHOW_IP_PERM'   	=> 'You arent allowed to see ip posters, but we see your...',
	'NO_SMILIES' 			=> 'You arent allowed to use Smilies...',
	'NO_SMILIE_PERM'    	=> 'You arent allowed to post smilies...',
	'NO_VIEW_PERM'      	=> 'You arent allowed to view the shoutbox...',
	'NO_VIEW_PRIV_PERM'     => 'You arent allowed to view the private shoutbox...',

	// Post infos Robot
	'SHOUT_SELECT_ROBOT'		=> 'leave the shoutbox’s robot publish the info',
	// Info messages of the robot
	'SHOUT_GLOBAL_ROBOT'		=> '%1$s %2$s just create a global announcement: %3$s',
	'SHOUT_ANNOU_ROBOT'			=> '%1$s %2$s just create an announcement: %3$s',
	'SHOUT_POST_ROBOT'			=> '%1$s %2$s just create a new topic: %3$s',
	'SHOUT_REPLY_ROBOT'			=> '%1$s %2$s just replying to a topic: %3$s',
	'SHOUT_EDIT_ROBOT'			=> '%1$s %2$s just edit a message: %3$s',
	'SHOUT_TOPIC_ROBOT'			=> '%1$s %2$s just edit a topic: %3$s',
	'SHOUT_LAST_ROBOT'			=> '%1$s %2$s just edit the last post in the topic: %3$s',
	'SHOUT_QUOTE_ROBOT'			=> '%1$s %2$s just replying a topic quoting: %3$s',
	'SHOUT_PREZ_ROBOT'			=> '%1$s %2$s just create its presentation: %3$s',
	'SHOUT_PREZ_F_ROBOT'		=> '%1$s %2$s just edit a presentation: %3$s',
	'SHOUT_PREZ_FS_ROBOT'		=> '%1$s %2$s just edit its presentation: %3$s',
	'SHOUT_PREZ_E_ROBOT'		=> '%1$s %2$s just edit a message in a presentation: %3$s',
	'SHOUT_PREZ_ES_ROBOT'		=> '%1$s %2$s just edit a message in its presentation: %3$s',
	'SHOUT_PREZ_L_ROBOT'		=> '%1$s %2$s just edit the last message in a presentation: %3$s',
	'SHOUT_PREZ_LS_ROBOT'		=> '%1$s %2$s just edit the last message in its presentation: %3$s',
	'SHOUT_PREZ_Q_ROBOT'		=> '%1$s %2$s just replying a presentation quoting: %3$s',
	'SHOUT_PREZ_R_ROBOT'		=> '%1$s %2$s just replying to a presentation: %3$s',
	'SHOUT_PREZ_RS_ROBOT'		=> '%1$s %2$s just replying to its presentation: %3$s',
	'SHOUT_ENTER_PRIV'			=> '%1$s %2$s just enter in the private shoutbox',
	'SHOUT_PURGE_SHOUT'			=> '%s Purge the shoutbox done...',
	'SHOUT_PURGE_PRIV'			=> '%s Purge the private shoutbox done...',
	'SHOUT_PURGE_ROBOT'			=> '%s Purge of Robot infos done...',
	'SHOUT_PURGE_AUTO'			=> '%s Automatic purge of %s messages in the shoutbox done...',
	'SHOUT_PURGE_PRIV_AUTO'		=> '%s Automatic purge of %s messages in the private shoutbox done...',
	'SHOUT_DELETE_AUTO'			=> '%s Automatic load shedding of %s messages in the shoutbox done...',
	'SHOUT_DELETE_PRIV_AUTO'	=> '%s Automatic load shedding of %s messages in the private shoutbox done...',
	'SHOUT_BIRTHDAY_ROBOT'		=> 'All the team of %1$s wish a Happy Birthday to %2$s',
	'SHOUT_BIRTHDAY_ROBOT_FULL'	=> 'All the team of %1$s wish a Happy Birthday to %2$s for %3$s %4$s years!',
	'SHOUT_HELLO_ROBOT'			=> 'Hello, we are %1$s %2$s',
	'SHOUT_NEWEST_ROBOT'		=> 'A new member just register: %1$s, All the team of %2$s welcome him...',
	'SHOUT_ROBBERY_ROBOT'		=> '%1$s %2$s just carry out a robbery of %3$s against %4$s',
	'SHOUT_LOTTERY_ROBOT'		=> '%1$s %2$s has just won the jackpot in the amount of %3$s %4$s',
	'SHOUT_HANGMAN_ROBOT'		=> '%1$s %2$s has just solved a hangman: %3$s',
	'SHOUT_HANGMAN_C_ROBOT'		=> '%1$s %2$s has just created a new hangman: %3$s',
	'SHOUT_SESSION_ROBOT'		=> 'Hello %s and welcome to the forum...',
	'SHOUT_SESSION_ROBOT_BOT' 	=> '%1$s %2$s just connect to the forum...',
	'SHOUT_TRACKER_ADD_ROBOT' 	=> '%1$s %2$s has just released a new ticket in the tracker: %3$s',
	'SHOUT_TRACKER_REPLY_ROBOT' => '%1$s %2$s just reply to a ticket in the tracker: %3$s',
	'SHOUT_TRACKER_EDIT_ROBOT' 	=> '%1$s %2$s has just edited a ticket in the tracker: %3$s',
	'SHOUT_TRACKER_EDIT_P_ROBOT'=> '%1$s %2$s has just edited a message in the tracker: %3$s',
	'SHOUT_SUDOKU_ALL_ROBOT'	=> '%1$s %2$s just finished all the grids of sudoku !!',
	'SHOUT_SUDOKU_WIN_ROBOT'	=> '%1$s %2$s just finished a Sudoku grid: “%3$s”, pack “%4$s”, Pack N°%5$s, game N°%6$s',
	'SHOUT_VERSION_ROBOT'		=> '%1$s Please note that the version of your shoutbox is obsolete! You have version %2$s and the latest version is %3$s. visit %4$s This release announcement</a> for the instructions for update...',

	// Added in version 1.4.0
	'SHOUT_PROTECT'				=> '’',
	'SHOUT_START'				=> 'Shoutbox',
	'SHOUT_AVATAR_NONE'			=> '%s has no avatar',
	'SHOUT_ANY'					=> 'No sound',
	'CHOOSE_ERROR_NO'			=> 'No sound will be played at errors',
	'CHOOSE_DELETE_NO'			=> 'No sound will be played when deleting messages',
	'SHOUT_USER_CONFIG'			=> 'Selects the position top/bottom for the bar post as panels of smileys, colors and special characters...',
	'SHOUT_USER_PAGIN'			=> 'Selects the position of the paging: at the bottom of the shoutbox, or right of the bar post.',
	
	// Added in version 1.5.0
	'SHOUT_SEP'					=> ' ¦ ',
	'SHOUT_CLOSE'				=> 'Collapse',
	'SHOUT_DIV_CLOSE'			=> 'Collapse the panel',
	'SHOUT_ROBOT_START'			=> 'Info:', // At the beginning of infos robot
	'SHOUT_ROBOT_DATE'			=> 'l F j, Y', // Form of the info date
	'SHOUT_AUTO'				=> 'Enter a message...',
	'PICK_COLOR'				=> 'Choose a color by clicking in the area',
	'PICK_BUTON'				=> 'Color text',
	'SHOUT_CLICK_HERE'			=> 'Click here to login',
	'SHOUT_LOG_ME_IN'			=> 'auto login',
	'SHOUT_HIDE_ME'				=> 'Hide me',
	'SHOUT_CHOICE_COLOR'		=> 'Change pallet',
	'SHOUT_JSCOLOR'				=> 'Jscolor pallet',
	'SHOUT_PHPBBCOLOR'			=> 'Phpbb pallet',
	'SHOUT_PHPBB2COLOR'			=> 'Phpbb extended pallet',
	'SHOUT_ONLINE_TITLE'		=> 'Members connected in real time',
	'SHOUT_ONLINE'				=> 'Open the panel of members connected',
	'SHOUT_ONLINE_CLOSE'		=> 'Close the panel of members connected',
	'SHOUT_EXEMPLE'				=> 'Here an example of formatted text',
	'SHOUT_PERSO'				=> 'Customize the formatting of messages',
	'SHOUT_PERSO_GO'			=> 'Format',
	'SHOUT_BBCODE_OPEN'			=> 'Opening BBcodes',
	'SHOUT_BBCODE_CLOSE'		=> 'Closing BBcodes',
	'SHOUT_BBCODE_SUCCESS'		=> 'changes made',
	'SHOUT_BBCODE_SUP'			=> 'Formatting removed',
	'SHOUT_BBCODE_ERROR'		=> 'You must fill in the two fields',
	'SHOUT_BBCODE_ERROR_COUNT'	=> 'You need to have as many openings bbcodes as closing bbcodes',
	'SHOUT_BBCODE_ERROR_SHAME'	=> 'No changes made',
	'SHOUT_DIV_BBCODE_CLOSE'	=> 'Close the panel formatting messages',
	'SHOUT_DIV_BBCODE_EXPLAIN'	=> 'You can customize the formatting of your messages in the shoutbox.<br />Enter bbcodes simple, openings in the first zone, closings in the second.<br />Caution: Observe the nesting bbcodes well and remember to close all.<br />Exemple: <em>[b][i] and [/i][/b]</em>',
	'SHOUT_ACTION_TITLE'		=> 'Actions for the user:',
	'SHOUT_ACTION_PROFIL'		=> 'See profile',
	'SHOUT_ACTION_CITE'			=> 'Quote the user',
	'SHOUT_ACTION_CITE_ON'		=> 'For ',
	'SHOUT_ACTION_CITE_EXPLAIN'	=> 'Quote the user in a message of shoutbox',
	'SHOUT_ACTION_MSG'			=> 'Send a personal message in the shoutbox',
	'SHOUT_ACTION_MSG_ROBOT'	=> 'Send a message as Robot',
	'SHOUT_ACTION_DELETE'		=> 'Remove my personal messages',
	'SHOUT_ACTION_DELETE_EXPLAIN'=> 'Are you sure you want to delete all your personal messages?',
	'SHOUT_ACTION_DEL_REP'		=> 'All your personal messages were deleted',
	'SHOUT_ACTION_DEL_NO'		=> 'Any personal message deleted',
	'SHOUT_ACTION_MCP'			=> 'User notes',
	'SHOUT_ACTION_BAN'			=> 'Ban of the Forum',
	'SHOUT_USER_ADMIN'			=> 'Administer the user',
	'SHOUT_USER_POST'			=> '@PM_',
	'SHOUT_TOO_BIG'				=> 'Your message is too long, number of characters: ',
	'SHOUT_TOO_BIG2'			=> 'The maximum allowed is: ',
	'SHOUT_CLICK_SOUND_ON'		=> 'Turn on sounds',
	'SHOUT_CLICK_SOUND_OFF'		=> 'Turn off sounds',
	'SHOUT_CHOICE_NAME'			=> 'Choose a username',
	'SHOUT_CHOICE_YES'			=> 'Username updated',
	'SHOUT_CHOICE_NAME_RETURN'	=> 'You must first choose a username.',
	'SHOUT_CHOICE_NAME_ERROR'	=> 'You must first choose a username.\nClick the last icon at the right for that...',
	'SHOUT_OUT_TIME'			=> 'inactivity time exceeded, automatic standby...',
));

?>
<?php
/** 
*
* @package Breizh Shoutbox
* @version $Id: ajax.php 150 16:15 16/12/2011 Sylver35 Exp $ 
* @copyright (c) 2010, 2011 Sylver35    http://breizh-portal.com
* @copyright (c) 2007 Paul Sohier
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);

$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './'; 
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include ($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);
if (!function_exists('add_log'))
{
	include($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
}

error_reporting(0);// Disable error reporting, can be bad for our headers ;)

// Start session management
$user->session_begin(false);
$auth->acl($user->data);
$user->setup();
$user->add_lang(array('posting', 'mods/shout', 'mods/info_acp_shoutbox'));

$mode	= request_var('m', '');
$userid = (int)$user->data['user_id'];
if (!$mode)
{
	redirect(append_sid("{$phpbb_root_path}index.$phpEx"));
}
// To prevent auto refresh when edit a message
if ($mode == 'edit' || $mode == 'edit_priv')
{
	$last = 0;
}
else
{
	$last = request_var('l', 0);
}

// This mod is ok to work with the Members flag mod
$flag_active = isset($config['flags_version']) ? true : false;

$tpl_1 = '<a href="%1$smod-breizh-shoutbox-f21.html">%2$s</a>';
$tpl_2 = '<a href="%1$sindex.html">%2$s</a>';
// We have our own error handling!
$db->sql_return_on_error(true);

if ($mode != 'smilies_popup')
{
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . 'GMT');
	header('Cache-Control: no-cache, must-revalidate');
	header('Pragma: no-cache');
	header('Content-type: text/xml; charset=UTF-8');
}

switch ($mode)
{
	case 'smilies':
	    if (!$auth->acl_get('u_shout_smilies'))
	    {
	        shout_error('NO_SMILIE_PERM');
		}
		if ($user->lang['SHOUT_COPY'] !== $tpl_1 || $user->lang['SHOUTBOX'] !== $tpl_2)
		{
			echo '';
		}
		else
		{
			$sql = 'SELECT code, smiley_url, smiley_width, smiley_height, emotion
				FROM ' . SMILIES_TABLE . ' 
				WHERE display_on_shout = 1
				ORDER BY smiley_order DESC';
			$result = $db->sql_query($sql);
			if (!$result)
			{
				$db->sql_freeresult($result);
				shout_sql_error($sql, __LINE__, __FILE__);
			}
			else
			{
				$last_url = '';
				$sql1 = 'SELECT COUNT(smiley_id) as nr
					FROM ' . SMILIES_TABLE . '
					WHERE display_on_shout = 0';
				$result1 = $db->sql_query($sql1);
				$count = (int)$db->sql_fetchfield('nr');
				$db->sql_freeresult($result1);
				echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?><xml>\n<smilnr>$count</smilnr>\n";
				while ($row = $db->sql_fetchrow($result))
				{
					if ($row['smiley_url'] !== $last_url)
					{
						echo "<smilies><code>" .$row['code']. "</code><img>" .generate_board_url(). '/' .$config['smilies_path']. '/' .$row['smiley_url']. "</img><width>" .$row['smiley_width']. "</width><height>" .$row['smiley_height']. "</height><title>" .$row['emotion']. "</title></smilies>\n";
					}
					$last_url = $row['smiley_url'];
				}
				$db->sql_freeresult($result);
				echo '</xml>';
			}
		}
		exit_handler();
	break;
	
	case 'smilies_popup':
		page_header($user->lang['SMILIES']);
		if ($user->lang['SHOUT_COPY'] !== $tpl_1 || $user->lang['SHOUTBOX'] !== $tpl_2)
		{
			echo '';
			exit_handler();
		}
		$sql = 'SELECT code, smiley_url, smiley_width, smiley_height, emotion
			FROM ' . SMILIES_TABLE . '
			WHERE display_on_shout = 0
			ORDER BY smiley_order';
		$result = $db->sql_query($sql);
		if ($result)
		{
			while ($row = $db->sql_fetchrow($result))
			{
				$template->assign_block_vars('smiley', array(
					'A_SMILEY_CODE'	=> $row['code'],
					'SMILEY_IMG'	=> shout_img($row['smiley_url'], $row['emotion'], $row['smiley_width'], $row['smiley_height'], generate_board_url(). '/' .$config['smilies_path']. '/', $row['code']),
				));
			}
			$template->assign_var('S_IN_SHOUT_TEMP', true);
		}
		else
		{
			shout_sql_error($sql, __LINE__, __FILE__);
		}
		$db->sql_freeresult($result);

		$template->assign_vars(array(
			'S_IN_SHOUT_SMILIES'	=> true,
			'SHOUTBOX_VERSION' 		=> sprintf($user->lang['SHOUTBOX_VERSION_ACP_COPY'], $config['shout_version']),
		));

		$template->set_filenames(array(
			'body' => 'shout_template.html')
		);
		
		page_footer();
	break;
	
	case 'user_bbcode':
		$open = request_var('open', '');
		$close = request_var('close', '');
		$return = parse_shout_bbcodes(str_replace('][', '], [', $open), str_replace('][', '], [', $close));
		switch ($return['sort'])
		{
			case 1:
				$sql = 'UPDATE ' . USERS_TABLE . " SET shout_bbcode = '0' WHERE user_id = $userid";
				$db->sql_query($sql);
				$content = '1||1';
			break;
			case 2:
				$content = '2||2||'.$return['message'];
			break;
			case 3:
				$uid = $bitfield = $options = '';
				$text = $open.'SHOUT_EXEMPLE'.$close;
				generate_text_for_storage($text, $uid, $bitfield, $options, true, false, true);
				$user_bbcode = (string)$open.'||'.(string)$close.'||'.(string)$text.'||'.$uid.'||'.$bitfield.'||'.$options;
				$sql = 'UPDATE ' . USERS_TABLE . " SET shout_bbcode = '" .$db->sql_escape($user_bbcode). "' WHERE user_id = $userid";
				$db->sql_query($sql);
				
				$sql = 'SELECT shout_bbcode FROM ' . USERS_TABLE . " WHERE user_id = $userid";
				$result = $db->sql_query_limit($sql, 1);
				$on_bbcode = $db->sql_fetchfield('shout_bbcode');
				$db->sql_freeresult($result);
				
				$shoutbbcode = explode('||', $on_bbcode);
				$shoutbbcode[2] = str_replace('SHOUT_EXEMPLE', $user->lang['SHOUT_EXEMPLE'], $shoutbbcode[2]);
				$content = (string)$shoutbbcode[0].'||'.(string)$shoutbbcode[1].'||'.generate_text_for_display($shoutbbcode[2], $shoutbbcode[3], $shoutbbcode[4], $shoutbbcode[5]);
			break;
			case 4:
				$content = '3||3||'.$return['message'];
			break;
		}
		echo($content);
		exit_handler();
	break;
	
	case 'online':
		$online_users = obtain_users_online_shout();
		$string = ($user->data['user_type'] != USER_IGNORE) ? obtain_users_online_string($online_users, 0, 'forum', true) : obtain_users_online_string($online_users);
		$l_online_users = $string['l_online_users'];
		$online_userlist = $string['online_userlist'];
		echo($l_online_users.'||'.$online_userlist);
		exit_handler();
	break;
	
	case 'action_sound':
		$sound = explode(', ', $user->data['user_shout']);
		switch ($sound[0])
		{
			case 0:
				$sort = 1;
				$content = '1||button_shout_sound_off button_shout||'.$user->lang['SHOUT_CLICK_SOUND_ON'];
			break;
			case 1:
				$sort = 0;
				$content = '0||button_shout_sound button_shout||'.$user->lang['SHOUT_CLICK_SOUND_OFF'];
			break;
		}
		$config_user_shout = implode(', ', array($sort, $sound[1], $sound[2], $sound[3], $sound[4], $sound[5], $sound[6], $sound[7], $sound[8]));
		$sql = 'UPDATE ' . USERS_TABLE . " SET user_shout = '" .$db->sql_escape($config_user_shout). "' WHERE user_id = $userid";
		$db->sql_query($sql);
		echo($content);
		exit_handler();
	break;
	
	case 'cite':
		$id = request_var('user', 0);
		$sql = 'SELECT user_type, username, user_colour
			FROM ' . USERS_TABLE . "
			WHERE user_id = $id";
		$result = $db->sql_query($sql);
		$row = $db->sql_fetchrow($result);
		// This content must contain bbcodes for compatibility with generate_text_for_storage...
		$content = (!$row || $row['user_type'] == USER_IGNORE) ? '' : '1||[b]' .($row['user_colour'] ? '[color=#' .$row['user_colour']. ']' .$row['username']. '[/color]' : $row['username']). '[/b] ';
		$db->sql_freeresult($result);
		echo($content);
		exit_handler();
	break;
	
	case 'action_user':
		$id = request_var('user', 0);
		if ($user_data['user_id'] == ANONYMOUS || !$id || $user->data['is_bot'])
		{
			$content = '1||1';
		}
		else
		{
			$sql = 'SELECT user_id, user_type, username, user_colour, user_avatar, user_avatar_type, user_avatar_width, user_avatar_height
				FROM ' . USERS_TABLE . "
				WHERE user_id = $id";
			$sql = $flag_active ? str_replace('user_colour', 'user_colour, user_flag', $sql) : $sql;
			$result = $db->sql_query($sql);
			$row = $db->sql_fetchrow($result);
			if (!$row || $row['user_type'] == USER_IGNORE)
			{
				$content = '1||1';
			}
			else
			{
				// Construct urls to be displayed via javascript
				// HTML must be formated here, never in html file because of security issue
				$inp = ($auth->acl_get('u_shout_post_inp') || ($auth->acl_get('a_') || $auth->acl_get('m_'))) ? true : false;
				$adm_path	= (isset($admin_path)) ? $admin_path : $phpbb_root_path. 'adm/';
				$tpl_open 	= '<strong>&#187;</strong><span class="profile-shout">';
				$tpl_close 	= '</a></span>';
				$url 		= generate_board_url().'/memberlist.php?mode=viewprofile';
				$avatar		= shout_user_avatar($row['user_id'], $row['username'], $row['user_avatar'], $row['user_avatar_type'], $row['user_avatar_width'], $row['user_avatar_height'], 36);
				$username 	= $flag_active ? get_username_string_flag('shout', $row['user_id'], $row['username'], $row['user_colour'], $row['user_flag'], false, $url) : get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], false, $url);
				$url_profile = $tpl_open. '<a href="' .append_sid("{$phpbb_root_path}memberlist.$phpEx", "mode=viewprofile&amp;u=$id"). '" onclick="this.target=\'_blank\';" onmouseover="iH(\'onText\',this.title);" onmouseout="iH(\'onText\',\'\');" title="' .$user->lang['SHOUT_ACTION_PROFIL'].' '.$user->lang['FROM'].' '.$row['username']. '">' .$user->lang['SHOUT_ACTION_PROFIL'].$tpl_close;
				$url_cite	= $tpl_open. '<a href="javascript:void(0);" onmouseover="iH(\'onText\',this.title);" onmouseout="iH(\'onText\',\'\');" onclick="citeMsg();return false;" title="' .$user->lang['SHOUT_ACTION_CITE_EXPLAIN']. '">' .$user->lang['SHOUT_ACTION_CITE'].$tpl_close;
				$url_message = $inp ? $tpl_open. '<a href="javascript:void(0);" onmouseover="iH(\'onText\',this.title);" onmouseout="iH(\'onText\',\'\');" onclick="personalMsg();return false;" title="' .$user->lang['SHOUT_ACTION_MSG']. '">' .$user->lang['SHOUT_ACTION_MSG'].$tpl_close : '';
				$url_admin 	= $auth->acl_get('a_user') ? $tpl_open. '<a href="' .append_sid("{$adm_path}index.$phpEx", "i=users&amp;mode=overview&amp;u=$id", true, $user->session_id). '" onclick="this.target=\'_blank\';" onmouseover="iH(\'onText\',this.title);" onmouseout="iH(\'onText\',\'\');" title="' .$user->lang['SHOUT_USER_ADMIN']. '">' .$user->lang['SHOUT_USER_ADMIN'].$tpl_close : '';
				$url_modo 	= $auth->acl_get('m_') ? $tpl_open. '<a href="' .append_sid("{$phpbb_root_path}mcp.$phpEx", "i=notes&amp;mode=user_notes&amp;u=$id", true, $user->session_id). '" onclick="this.target=\'_blank\';" onmouseover="iH(\'onText\',this.title);" onmouseout="iH(\'onText\',\'\');" title="' .$user->lang['SHOUT_ACTION_MCP']. '">' .$user->lang['SHOUT_ACTION_MCP'].$tpl_close : '';
				$url_ban 	= $auth->acl_get('m_ban') ? $tpl_open. '<a href="' .append_sid("{$phpbb_root_path}mcp.$phpEx", "i=ban&amp;mode=user&amp;u=$id", true, $user->session_id). '" onclick="this.target=\'_blank\';" onmouseover="iH(\'onText\',this.title);" onmouseout="iH(\'onText\',\'\');" title="' .$user->lang['SHOUT_ACTION_BAN']. '">' .$user->lang['SHOUT_ACTION_BAN'].$tpl_close : '';
				$url_del 	= ($inp) ? '<br /><hr class="dotted" />'.$tpl_open. '<a href="javascript:void(0);" onclick="if(confirm(\''.$user->lang['SHOUT_ACTION_DELETE_EXPLAIN'].'\'))delReq('.$userid.',document.getElementById(\'user_inp_sort\').value);return false;" onmouseover="iH(\'onText\',this.title);" onmouseout="iH(\'onText\',\'\');" title="' .$user->lang['SHOUT_ACTION_DELETE']. '">' .$user->lang['SHOUT_ACTION_DELETE'].$tpl_close : '';
				$url_robot 	= $auth->acl_get('a_') ? '<br /><br />'.$tpl_open. '<a href="javascript:void(0);" onclick="iH(\'shout_avatar\',\'\');robotMsg();return false;" onmouseover="iH(\'onText\',this.title);" onmouseout="iH(\'onText\',\'\');" title="' .$user->lang['SHOUT_ACTION_MSG_ROBOT']. '">' .$user->lang['SHOUT_ACTION_MSG_ROBOT'].$tpl_close : '';
				$retour 	= ($url_admin || $url_modo || $url_ban) ? '<br /><br />' : '';
				$content 	= $id.'||'.$username.'||'.$url_profile.$url_cite.$url_message.$retour.$url_admin.$url_modo.$url_ban.$url_del.$url_robot.'||'.$avatar;
			}
			$db->sql_freeresult($result);
		}
		echo($content);
		exit_handler();
	break;
	
	case 'action_post':
		$go = false;
		if (!$auth->acl_get('u_shout_post_inp') && (!$auth->acl_get('a_') || !$auth->acl_get('m_')))
		{
			$content = '';
		}
		else
		{
			$id = request_var('user', 0);
			$pr = request_var('pr', 0);
			$message = utf8_normalize_nfc(request_var('message', '', true));
			$_table = ($pr == 1) ? SHOUTBOX_PRIV_TABLE : SHOUTBOX_TABLE;
			$priv = ($pr == 1) ? '_priv' : '';
			if (!$id)
			{
				$content = '';
			}
			else if ($id != 1)
			{
				$sql = 'SELECT user_id, user_type, username, user_colour
					FROM ' . USERS_TABLE . "
					WHERE user_id = $id";
				$sql = $flag_active ? str_replace('user_colour', 'user_colour, user_flag', $sql) : $sql;
				$result = $db->sql_query_limit($sql, 1);
				$row = $db->sql_fetchrow($result);
				if (!$row || $row['user_type'] == USER_IGNORE)
				{
					$go = false;
					$content = '';
				}
				else
				{
					$url = generate_board_url().'/memberlist.php?mode=viewprofile';
					$username = $flag_active ? get_username_string_flag('shout', $row['user_id'], $row['username'], $row['user_colour'], $row['user_flag'], false, $url) : get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], false, $url);
					
					$message = parse_shout_message($message);
					if ($user->data['shout_bbcode'] && $auth->acl_get('u_shout_bbcode_change'))
					{
						$shoutbbcode = explode('||', $user->data['shout_bbcode']);
						$message = (string)$shoutbbcode[0]. ' ' .$message. ' ' .(string)$shoutbbcode[1];
					}
					$personal = true;
					$go = true;
				}
				$db->sql_freeresult($result);
			}
			else if ($id == 1)
			{
				if (!$auth->acl_get('a_'))
				{
					$go = false;
					$content = '';
				}
				else
				{
					$username = get_username_string('no_profile', ROBOT, $user->lang['SHOUT_ROBOT'], $config['shout_color_robot']);
					$personal = false;
					$go = true;
					$id = $userid = 0;
				}
			}
			if ($go)
			{
				$message = parse_shout_message(' ' .$message);
				if (!$message)
				{
					$content = '';
				}
				else
				{
					$message = $personal ? '[color=#' .$config['shout_color_message']. ']SHOUT_USER_POST [/color]' .$username. ': ' .$message : '[color=#'.$config['shout_color_message'].'][i]' .$message. '[/i][/color]';
					$uid = $bitfield = $options = ''; // will be modified by generate_text_for_storage
					$allow_bbcode 	= ($auth->acl_get('u_shout_bbcode')) ? true : false;
					$allow_smilies 	= ($auth->acl_get('u_shout_smilies')) ? true : false;
					generate_text_for_storage($message, $uid, $bitfield, $options, $allow_bbcode, true, $allow_smilies);
					$sql_ary = array(
						'shout_text'				=> $message,
						'shout_bbcode_uid'			=> $uid,
						'shout_bbcode_bitfield'		=> $bitfield,
						'shout_bbcode_flags'		=> $options,
						'shout_time'				=> (int)time(),
						'shout_user_id'				=> $userid,
						'shout_ip'					=> (string)$user->ip,
						'shout_robot'				=> 0,
						'shout_forum'				=> 0,
						'shout_inp'					=> $id,
					);
					$sql = 'INSERT INTO ' .$_table. ' ' .$db->sql_build_array('INSERT', $sql_ary);
					$db->sql_query($sql);
					set_config_count('shout_nr' .$priv, 1, true);
					$content = '1||';
				}
			}
		}
		echo($content);
		exit_handler();
	break;
	
	case 'action_del':
		$id = request_var('user', 0);
		$pr = request_var('pr', 0);
		$_table = ($pr == 1) ? SHOUTBOX_PRIV_TABLE : SHOUTBOX_TABLE;
		$priv = ($pr == 1) ? '_priv' : '';
		if ($id != $userid)
		{
			$content = '1||'.$user->lang['SERVER_ERR'];
		}
		else
		{
			$sql = "DELETE FROM $_table WHERE shout_user_id = $userid AND shout_inp <> 0";
			$db->sql_query($sql);
			$deleted = $db->sql_affectedrows();
			if (!$deleted)
			{
				$content = '1||'.$user->lang['SHOUT_ACTION_DEL_NO'];
			}
			else
			{
				// Update time of the last message from one second to delete the message to the users
				$sql = "SELECT MAX(shout_id) AS shout_end FROM $_table";
				$result = $db->sql_query($sql);
				$max_shout = $db->sql_fetchfield('shout_end');
				$db->sql_freeresult($result);
				
				$sql = "UPDATE $_table SET shout_time = shout_time + 1 WHERE shout_id = $max_shout";
				$db->sql_query($sql);
				
				set_config_count('shout_del_user' .$priv, $deleted, true);
				$content = '1||'.$user->lang['SHOUT_ACTION_DEL_REP'].' '.sprintf($user->lang['NUMBER_MESSAGE'.(($deleted > 1) ? 'S' : '')], $deleted);
			}
		}
		echo($content);
		exit_handler();
	break;

	case 'delete':
	case 'delete_priv':
		$id = request_var('id', 0);
		if (!$id)
		{
			shout_error('NO_SHOUT_ID');
		}
		else if ($userid == ANONYMOUS)
		{
			shout_error('NO_DELETE_PERM');
		}
		else
		{
			switch ($mode)
			{
				case 'delete':
					$_priv = $_Priv = '';
					$_table = SHOUTBOX_TABLE;
				break;
				case 'delete_priv':
					$_priv = '_priv';
					$_Priv = '_PRIV';
					$_table = SHOUTBOX_PRIV_TABLE;
				break;
			}
			// If a user can delete all messages, he can delete it's messages :)
			$can_delete_mod = ($auth->acl_get('u_shout_delete')) ? true : false;
			$can_delete 	= ($can_delete_mod) ? true : $auth->acl_get('u_shout_delete_s');
			$sql = "SELECT shout_user_id FROM $_table WHERE shout_id = $id";
			$result = $db->sql_query_limit($sql, 1);
			$on_id = $db->sql_fetchfield('shout_user_id');
			$db->sql_freeresult($result);
			
			if (!$can_delete && ($userid == $on_id))
			{
				shout_error('NO_DELETE_PERM_S');
			}
			else if (!$can_delete_mod && $can_delete && ($userid != $on_id))
			{
				shout_error('NO_DELETE_PERM_T');
			}
			else if (!$can_delete)
			{
				shout_error('NO_DELETE_PERM');
			}
			else if ($can_delete && ($userid == $on_id) || $can_delete_mod)
			{
				// Lets delete this post :D
				$sql = "DELETE FROM $_table WHERE shout_id = $id";
				$db->sql_query($sql);

				// Update time of the last message from one second to delete the message from everyone
				$sql = "SELECT MAX(shout_id) AS shout_end FROM $_table WHERE shout_id <> $id";
				$result = $db->sql_query($sql);
				$max_shout = (int)$db->sql_fetchfield('shout_end');
				$db->sql_freeresult($result);
				$sql = "UPDATE $_table SET shout_time = shout_time + 1 WHERE shout_id = $max_shout";
				$db->sql_query($sql);
				
				set_config_count('shout_del_user' .$_priv, 1, true);
				echo '<?xml version="1.0" encoding="UTF-8" ?><xml></xml>';
			}
			else
			{
				shout_error('NO_DELETE_PERM');
			}
		}
		exit_handler();
	break;

	case 'purge':
	case 'purge_priv':
		if (!$auth->acl_get('u_shout_purge'))
		{
			shout_error('NO_PURGE_PERM');
		}
		else
		{
			switch ($mode)
			{
				case 'purge':
					$_priv = $_Priv = '';
					$_table = SHOUTBOX_TABLE;
				break;
				case 'purge_priv':
					$_priv = '_priv';
					$_Priv = '_PRIV';
					$_table = SHOUTBOX_PRIV_TABLE;
				break;
			}
			$sql = "DELETE FROM $_table";
			$db->sql_query($sql);
			$deleted = $db->sql_affectedrows();
			
			set_config_count('shout_del_purge' .$_priv, $deleted, true);
			post_robot_shout($userid, $user->ip, (($_priv == '_priv') ? true : false), true, false, false, false);
			
			echo '<?xml version="1.0" encoding="UTF-8" ?><xml><nr>1</nr></xml>';
		}
		exit_handler();
	break;
	
	case 'purge_robot':
	case 'purge_robot_priv':
		if (!$auth->acl_get('u_shout_purge'))
		{
			shout_error('NO_PURGE_ROBOT_PERM');
		}
		else
		{
			switch ($mode)
			{
				case 'purge_robot':
					$_priv = $_Priv = '';
					$_table = SHOUTBOX_TABLE;
				break;
				case 'purge_robot_priv':
					$_priv = '_priv';
					$_Priv = '_PRIV';
					$_table = SHOUTBOX_PRIV_TABLE;
				break;
			}
			$sort = explode(', ', $config['shout_robot_choice'.$_priv]);
			$sql = "DELETE FROM $_table WHERE " .$db->sql_in_set('shout_robot', $sort, false, true);
			$db->sql_query($sql);
			$deleted = $db->sql_affectedrows();
			
			set_config_count('shout_del_purge' .$_priv, $deleted, true);
			post_robot_shout($userid, $user->ip, (($_priv == '_priv') ? true : false), true, true, false, false);
			
			$sql = "SELECT COUNT(shout_id) as nr FROM $_table";
			$result = $db->sql_query($sql);
			$nr = (int)$db->sql_fetchfield('nr');
			$db->sql_freeresult($result);
			echo '<?xml version="1.0" encoding="UTF-8" ?><xml><nr>$nr</nr></xml>';
		}
		exit_handler();
	break;
	
	case 'add':
	case 'post':
	case 'edit':
	case 'add_priv':	
	case 'post_priv':
	case 'edit_priv':
		$shout_id 	= request_var('shout_id', 0);
		$mode 		= ($mode == 'add') ? 'post' : (($mode == 'add_priv') ? 'post_priv' : $mode);
		$mode_s 	= str_replace(array('_priv', '_pop'), '', $mode);
		$post	 	= ($auth->acl_get('u_shout_post')) ? true : false;
		// If a user can edit all messages, he can edit it's messages :) (if errors in permissions)
		$can_edit_mod = ($auth->acl_get('u_shout_edit_mod')) ? true : false;
		$can_edit 	= ($can_edit_mod) ? true : $auth->acl_get('u_shout_edit');

		switch ($mode)
		{
			case 'post':
			case 'edit':
				$perm = '_view';
				$_priv = $_Priv = '';
				$_table = SHOUTBOX_TABLE;
			break;
			case 'post_priv':
			case 'edit_priv':
				$_priv = $perm = '_priv';
				$_Priv = '_PRIV';
				$_table = SHOUTBOX_PRIV_TABLE;
			break;
		}
		// Protect by checking permissions
		if (!$auth->acl_get('u_shout' .$perm))
	    {
	        shout_error('NO_VIEW' .$_Priv. '_PERM');
		}
		else if (!$post)
		{
			shout_error('NO_POST_PERM');
		}
		else if ($mode_s == 'edit' && !$shout_id)
		{
			shout_error('NO_SHOUT_ID');
		}
		else if ($mode_s == 'edit' && !$can_edit || $mode_s == 'edit' && $user_data['user_id'] == ANONYMOUS)
		{
			shout_error('NO_EDIT_PERM');
		}
		else
		{
			// Flood control
			$current_time = time();
			if (!$auth->acl_get('u_shout_ignore_flood') && $mode_s == 'post')
			{
				$sql_where = ($userid == ANONYMOUS) ? "WHERE shout_ip = '" .$db->sql_escape($user->ip). "'" : "WHERE shout_user_id = $userid";
				$sql = "SELECT MAX(shout_time) AS last_post_time
					FROM $_table
					$sql_where";
				if ($result = $db->sql_query($sql))
				{
					if ($row = $db->sql_fetchrow($result))
					{
						$db->sql_freeresult($result);
						if ($row['last_post_time'] > 0 && ($current_time - $row['last_post_time']) < $config['shout_flood_interval'])
						{
							shout_error('FLOOD_ERROR');
						}
					}
					$db->sql_freeresult($result);
				}
				else
				{
					shout_sql_error($sql, __LINE__, __FILE__);
				}
			}
			if ($user->lang['SHOUT_COPY'] !== $tpl_1 || $user->lang['SHOUTBOX'] !== $tpl_2)
			{
				echo '';
				break;
			}
			
			if ($mode_s == 'edit')
			{
				$ok_edit = false;
				if (!$can_edit_mod)  // If not able to edit all messages
				{
					// We need to be sure its this users his shout.
					$sql = "SELECT shout_user_id FROM $_table WHERE shout_id = $shout_id";
					$result = $db->sql_query_limit($sql, 1);
					if (!$result)
					{
						shout_sql_error($sql, __LINE__, __FILE__);
					}
					$on_id = $db->sql_fetchfield('shout_user_id');
					$db->sql_freeresult($result);
					
					// Not his shout, display error
					if (!$on_id || $on_id != $userid)
					{
						shout_error('NO_EDIT_PERM');
					}
					else
					{
						$ok_edit = true;
					}
				}
				else
				{
					$ok_edit = true;
				}
			}
			
			$message = utf8_normalize_nfc(request_var('chat_message', '', true));
			$cite = utf8_normalize_nfc(request_var('cite', '', true));
			
			// First verification of empty message
			if ($message == '' || $message == ' ' || $message == '&nbsp;')
			{
				shout_error('MESSAGE_EMPTY');
				break;
			}
			
			// Multi protections...
			$message = parse_shout_message(shout_url_free_sid($message), (($_priv == '_priv') ? true : false), $mode_s);
			if (!$message)
			{
				break;
			}
			if ($mode_s == 'post' && $user->data['shout_bbcode'] && $auth->acl_get('u_shout_bbcode_change'))
			{
				$shoutbbcode = explode('||', $user->data['shout_bbcode']);
				$message = (string)$shoutbbcode[0]. ' ' .$message. ' ' .(string)$shoutbbcode[1];
			}
			
			// Don't parse img if unautorised and return url img only
			if (strpos($message, '[img]') !== false && strpos($message, '[/img]') !== false && !$auth->acl_get('u_shout_image'))
			{
				$_message = str_replace(array('[img]', '[/img]'), '', $message);
			}
			// If autorised to post images, use the good way only!
			/*else if (strpos($message, '[img]') !== false && strpos($message, '[/img]') !== false && $auth->acl_get('u_shout_image'))
			{
				shout_error('SHOUT_IMG_POST_ERROR');
			}*/
			if ($cite)
			{
				$message = $user->lang['SHOUT_ACTION_CITE_ON'].$cite.$message;
			}
			$uid = $bitfield = $options = ''; // will be modified by generate_text_for_storage
			$allow_urls 	= true;
			$allow_bbcode 	= ($auth->acl_get('u_shout_bbcode')) ? true : false;
			$allow_smilies 	= ($auth->acl_get('u_shout_smilies')) ? true : false;
			generate_text_for_storage($message, $uid, $bitfield, $options, $allow_bbcode, $allow_urls, $allow_smilies);
			// Second verification of empty message (kill hidden caracters)
			if (strpos($message, '[img]') !== false && strpos($message, '[/img]') !== false)
			{
				shout_error('MESSAGE_EMPTY');
				break;
			}
			$message == str_replace(array('  ', '   ', '    '), ' ', $message);
			if ($message == '' || $message == ' ')
			{
				shout_error('MESSAGE_EMPTY');
				break;
			}
			if ($userid == ANONYMOUS)
			{
				$username = $db->sql_escape(str_replace(array("'", '"'), '&#8242;', (string)$_COOKIE[$config['cookie_name'].'_shout-name']));
				if (!$username)
				{
					shout_error('SHOUT_CHOICE_NAME_RETURN');
				}
				$rand = random_ip((string)$user->ip);
				$username = $username.':'.$rand;
				$message = $username.'|||'.$message;
			}
			$sql_ary = array(
				'shout_text'				=> $message,
				'shout_bbcode_uid'			=> $uid,
				'shout_bbcode_bitfield'		=> $bitfield,
				'shout_bbcode_flags'		=> $options,
			);
			if ($mode_s == 'edit')
			{
				if ($ok_edit)
				{
					$sql = 'UPDATE ' .$_table. ' SET ' . $db->sql_build_array('UPDATE', $sql_ary) . " WHERE shout_id = $shout_id";
					$db->sql_query($sql);
					
					// increase the time of the last message to see changements appear for everybody
					$sql = 'SELECT MAX(shout_id) AS shout_end FROM ' .$_table;
					if (!$result = $db->sql_query($sql))
					{
						shout_sql_error($sql, __LINE__, __FILE__);
					}
					$max_shout = $db->sql_fetchfield('shout_end');
					$db->sql_freeresult($result);
					
					$sql = "UPDATE $_table SET shout_time = shout_time + 1 WHERE shout_id = $max_shout";
					$result = $db->sql_query($sql);
				}
				else // Second verification
				{
					shout_error('NO_EDIT_PERM');
				}
			}
			else
			{
				$sql_ary += array(
					'shout_time'		=> (int)time(),
					'shout_user_id'		=> (int)$userid,
					'shout_ip'			=> (string)$user->ip,
					'shout_robot'		=> 0,
					'shout_forum'		=> 0,
				);
				$sql = 'INSERT INTO ' .$_table. ' ' . $db->sql_build_array('INSERT', $sql_ary);
				set_config_count('shout_nr' .$_priv, 1, true);
			}
			
			if (!$db->sql_query($sql)) 
			{
				shout_sql_error($sql, __LINE__, __FILE__);
			}
			if ($config['shout_on_cron' .$_priv])
			{
				if ((int)$config['shout_max_posts' .$_priv] > 0)
				{
					delete_shout_posts(($_priv == '_priv') ? true : false);
				}
			}
			echo '<?xml version="1.0" encoding="UTF-8" ?><xml><msg>' .$user->lang['POSTED']. '</msg></xml>';
		}
		exit_handler();
	break;

	case 'check':
	case 'check_pop':
	case 'check_priv':
		switch ($mode)
		{
			case 'check':
			case 'check_pop':
				$perm = '_view';
				$_priv = $_Priv = '';
				$_table = SHOUTBOX_TABLE;
			break;
			case 'check_priv':
				$_priv = $perm = '_priv';
				$_Priv = '_PRIV';
				$_table = SHOUTBOX_PRIV_TABLE;
			break;
		}
		if (!$auth->acl_get('u_shout' .$perm))
	    {
	        shout_error('NO_VIEW' .$_Priv. '_PERM');
		}

		$sql_where = ($auth->acl_getf_global('f_read')) ? "(" .$db->sql_in_set('shout_forum', array_keys($auth->acl_getf('f_read', true)), false, true). " OR shout_forum = 0)" : "shout_forum = 0";
		$sql_and = ($userid == ANONYMOUS || $user->data['is_bot']) ? "shout_inp = 0" : "shout_inp = 0 OR (shout_inp = $userid OR shout_user_id = $userid)";
		$sql = "SELECT shout_time
			FROM $_table
			WHERE $sql_where
			AND $sql_and
			ORDER BY shout_time DESC";
		$result = $db->sql_query_limit($sql, 1);
		$time = $db->sql_fetchfield('shout_time');
		$db->sql_freeresult($result);
		if (!$result)
		{
			shout_sql_error($sql, __LINE__, __FILE__);
		}
		else
		{
			// Reload the shoutbox to display correct minutes ago
			// Only for users with format date like "a minute ago"
			// And only if user have choose that, not the sound...
			if (!$user->data['is_bot'] && $userid != ANONYMOUS)
			{
				$sort_date = array('|M Y|', '|F Y|', '|F Y|', '|d F Y|', '|d M Y|, H:i', '|F j, Y|, g:i a', '|D d M y|, H:i');
				$correct = explode(', ', $user->data['user_shout']);
				if ($correct[0] == 1 && in_array($user->data['user_dateformat'], $sort_date)) 
				{
					//Do this only for messages < 1 hour
					// + 5 secondes to pass the hour...
					if ($time + 3605 > time())
					{
						$last = 1;
					}
				}
			}
			$time = substr($time, 7, 10);
			if ($user->lang['SHOUT_COPY'] !== $tpl_1 || $user->lang['SHOUTBOX'] !== $tpl_2)
			{
				$last = $time = 0;
			}
			echo '<?xml version="1.0" encoding="UTF-8" ?><xml><last>' .$time. '</last><time>' .(int)($time != $last). '</time></xml>';
		}
		exit_handler();
	break;

	case 'number':
	case 'number_pop':
	case 'number_priv':
		switch ($mode)
		{
			case 'number':
			case 'number_pop':
				$perm = '_view';
				$_priv = $_Priv = '';
				$_table = SHOUTBOX_TABLE;
			break;
			case 'number_priv':
				$_priv = $perm = '_priv';
				$_Priv = '_PRIV';
				$_table = SHOUTBOX_PRIV_TABLE;
			break;
		}
		if (!$auth->acl_get('u_shout' .$perm))
	    {
	        shout_error('NO_VIEW' .$_Priv. '_PERM');
		}
		else
		{
			if ($user->lang['SHOUT_COPY'] !== $tpl_1 || $user->lang['SHOUTBOX'] !== $tpl_2)
			{
				shout_error('NO_MESSAGE');
			}
			
			$sql_where = ($auth->acl_getf_global('f_read')) ? "(" .$db->sql_in_set('shout_forum', array_keys($auth->acl_getf('f_read', true)), false, true). " OR shout_forum = 0)" : "shout_forum = 0";
			$sql_and = ($userid == ANONYMOUS || $user->data['is_bot']) ? "shout_inp = 0" : "shout_inp = 0 OR (shout_inp = $userid OR shout_user_id = $userid)";
			$sql = "SELECT COUNT(shout_id) as nr 
				FROM $_table
				WHERE $sql_where
				AND $sql_and";
			$result = $db->sql_query($sql);
			if (!$result)
			{
				shout_sql_error($sql, __LINE__, __FILE__);
			}
			$row = (int)$db->sql_fetchfield('nr');
			$db->sql_freeresult($result);
			// Limit the number of messages to display
			if (!$row)
			{
				shout_error('NO_MESSAGE');
			}
			else
			{
				$row = ($row > $config['shout_max_posts_on' .$_priv]) ? $config['shout_max_posts_on' .$_priv] : $row;
				echo '<?xml version="1.0" encoding="UTF-8" ?><xml><nr>' .$row. '</nr></xml>';
				exit_handler();
			}
		}
	break;
	
	case 'view':
	case 'view_pop':
	case 'view_priv':
		$shout 	= request_var('s', -1);
		$start 	= request_var('start', 0);
		$avert 	= 'SHOUT_AVERT';
		$see_avatar = ($user->optionget('viewavatars') && $config['shout_avatar'] && $config['allow_avatar']) ? true : false;
		switch ($mode)
		{
			case 'view'; // Normal shoutbox
				$perm = '_view';
				$sort = $_priv = $_Priv = '';
				$_table = SHOUTBOX_TABLE;
			break;
			case 'view_pop'; // Popup shoutbox
				$sort = '_pop';
				$perm = '_view';
				$_priv = $_Priv = '';
				$_table = SHOUTBOX_TABLE;
			break;
			case 'view_priv'; // Private shoutbox
				$sort = $_priv = $perm = '_priv';
				$_Priv = '_PRIV';
				$_table = SHOUTBOX_PRIV_TABLE;
			break;
		}
		
		// See compatibles browsers to change the display
		$compatible = compatibles_browsers();
		// Adjust numbers of posts to display
		if ($compatible)
		{
			$shout_number = $config['shout_non_ie_nr' .$sort];
		}
		else
		{
			$shout_number = $config['shout_ie_nr' .$sort];
		}

		if (!$auth->acl_get('u_shout' .$perm))
	    {
	        shout_error('NO_VIEW' .$_Priv. '_PERM');
		}

		echo '<?xml version="1.0" encoding="UTF-8" ?><xml>';
		$i = 0;
		// Prevent somes errors in permissions
		// If a user can edit all messages, he can edit it's messages :)
		$can_edit_mod 	= ($auth->acl_get('u_shout_edit_mod')) ? true : false;
		$can_edit 		= ($can_edit_mod) ? true : $auth->acl_get('u_shout_edit');
		// If a user can view all ip, he can view it's ip :)
		$can_info_mod 	= ($auth->acl_get('u_shout_info')) ? true : false;
		$can_info 		= ($can_edit_mod) ? true : $auth->acl_get('u_shout_info_s');
		// If a user can delete all messages, he can delete it's messages :)
		$can_delete_mod = ($auth->acl_get('u_shout_delete')) ? true : false;
		$can_delete 	= ($can_delete_mod) ? true : $auth->acl_get('u_shout_delete_s');
		
		if ($user->lang['SHOUT_COPY'] !== $tpl_1 || $user->lang['SHOUTBOX'] !== $tpl_2)
		{
			echo '<error>' . $user->lang[$avert] . '</error></xml>';
			exit_handler();
		}
		
		// Robot can say if the version is up to date
		if (str_replace('.', '', $config['shout_update']) > str_replace('.', '', $config['shout_version']) && time() > $config['shout_version_run']+(60*60*6))
		{
			version_robot_shout();
		}
		
		if ($config['shout_enable_robot'] && date('H') == $config['shout_cron_hour'])
		{
			if ($config['shout_cron_run'] != date('d-m-Y'))
			{
				if ($config['shout_hello'] || $config['shout_hello_priv'])
				{
					hello_robot_shout();
				}
				if ($config['load_birthdays'] && $config['allow_birthdays'] && ($config['shout_birthday'] || $config['shout_birthday_priv']))
				{
					shout_birthday_list();
				}
				set_config('shout_cron_run', date('d-m-Y'), true);
			}
		}
		
		$sql_where = ($auth->acl_getf_global('f_read')) ? "(" .$db->sql_in_set('s.shout_forum', array_keys($auth->acl_getf('f_read', true)), false, true). " OR s.shout_forum = 0)" : "s.shout_forum = 0";
		$sql_and = ($userid == ANONYMOUS || $user->data['is_bot']) ? "s.shout_inp = 0" : "s.shout_inp = 0 OR (s.shout_inp = $userid OR s.shout_user_id = $userid)";
		$sql = "SELECT s.*, u.user_id, u.username, u.user_colour, u.user_avatar, u.user_avatar_type, u.user_avatar_width, u.user_avatar_height
			FROM $_table AS s
			LEFT JOIN " . USERS_TABLE . " AS u ON u.user_id = s.shout_user_id
				WHERE $sql_where
				AND $sql_and
			ORDER BY s.shout_id DESC";
		$sql = $flag_active ? str_replace('u.user_colour', 'u.user_colour, u.user_flag', $sql) : $sql;
		$result = $db->sql_query_limit($sql, $shout_number, $start);
		if (!$result)
		{
			shout_sql_error($sql, __LINE__, __FILE__);
		}
		else
		{
			$row = $db->sql_fetchrow($result);
			if (!$row || !$tpl_1 || !$tpl_2)
			{
				$db->sql_freeresult($result);
				echo "<error>" .$user->lang['NO_MESSAGE']. "</error><nr>0</nr></xml>";
				exit_handler();
			}
			do
			{
				if (preg_match('/\[img\]<!--/i', $row['shout_text']))
				{
					continue;
				}
				if ($row['shout_user_id'] == ANONYMOUS)
				{
					list($row['username'], $row['shout_text']) = explode('|||', $row['shout_text']);
					$row['shout_text'] = str_replace($row['username'].'|||', '', $row['shout_text']);
				}
				$url = generate_board_url().'/memberlist.php?mode=viewprofile';
				$row['username'] 	= ($row['shout_user_id'] == ROBOT) ? $user->lang['SHOUT_ROBOT'] : htmlspecialchars_decode($row['username']);
				$row['user_colour'] = ($row['shout_user_id'] == ROBOT) ? $config['shout_color_robot'] : $row['user_colour'];
				$row['avatar'] 		= shout_user_avatar($row['shout_user_id'], $row['username'], $row['user_avatar'], $row['user_avatar_type'], $row['user_avatar_width'], $row['user_avatar_height']);
				$row['username'] 	= ($flag_active) ? get_username_string_flag('shout', $row['user_id'], $row['username'], $row['user_colour'], $row['user_flag'], false, $url) : get_username_string('full', $row['user_id'], $row['username'], $row['user_colour'], false, $url);
				$row['shout_time']	= $user->format_date($row['shout_time']);
				$row['edit']		= $row['delete'] = $row['show_ip'] = false;  // Important!
				$row['msg_plain']   = $user->lang['NO_MESSAGE']; // It will be replaced if user can edit ;).
				$row['is_ip'] 		= $user->ip; // Replace the ip row if no permission to see it, triple protect
				if ($userid != ANONYMOUS && $row['shout_user_id'] != ANONYMOUS && !$user->data['is_bot'])
				{
					$row['username'] = construct_action_shout($row['username'], $row['shout_user_id']);
					if ($row['shout_inp'])
					{
						$row['shout_text'] = str_replace('SHOUT_USER_POST', $user->lang['SHOUT_USER_POST'], $row['shout_text']);
						$row['shout_text'] = construct_action_shout($row['shout_text'], $row['shout_inp']);
					}
				}
				$row['shout_text'] = shout_url_free_sid($row['shout_text']);
				$row['username'] = ((strpos(strtolower($user->browser), 'msie') !== false) && $flag_active) ? str_replace(' />', ' />' .shout_img('spacer.gif', '', 5, 1), $row['username']) : $row['username']; // Fix a space bug in IE
				$row['username'] = (!$see_avatar) ? shout_img('spacer.gif', '', 1, 20) . $row['username'] : $row['username']; // Adjust heigt with avatar
				// Verifie permissions for delete, show_ip and edit
				if ($userid != ANONYMOUS && !$user->data['is_bot'])
				{
					if ($can_delete_mod || ($row['user_id'] == $userid) && $can_delete)
					{
						$row['delete'] = true;
					}
					if ($can_info_mod || ($row['user_id'] == $userid) && $can_info)
					{
						$row['show_ip'] = true;
					}
					if ($can_edit_mod || ($row['user_id'] == $userid) && $can_edit)
					{
						$row['edit'] = true;
						$row['msg_plain'] = $row['shout_text'];
						if ($row['shout_user_id'] == ANONYMOUS)
						{
							$row['msg_plain'] = $row['username'].'|||'.$row['msg_plain'];
						}
						decode_message($row['msg_plain'], $row['shout_bbcode_uid']);
					}
				}
				// Triple protect this information...
				if (!$row['show_ip'])
				{
					unset($row['shout_ip']);
					$row['shout_ip'] = $row['is_ip'];
				}
				$row['shout_text'] = ($row['shout_info'] > 0) ? display_infos_robot($row['shout_info'], $row['shout_text']) : generate_text_for_display($row['shout_text'], $row['shout_bbcode_uid'], $row['shout_bbcode_bitfield'], $row['shout_bbcode_flags']);
				$row['shout_text'] = (strpos(strtolower($user->browser), 'msie') !== false) ? str_replace(' />', ' />' .shout_img('spacer.gif', '', 5, 1), $row['shout_text']) : $row['shout_text'];
				// Active external links with prime links if installed
				if (defined('INCLUDES_PRIME_LINKS'))
				{
					$row['shout_text'] 	= str_replace(array('class="postlink"', 'class="postlink img_link"'), array('class="postlink" target="_blank"', 'class="postlink img_link" target="_blank"'), $row['shout_text']);
				}
				// Active external links with seo mod if installed
				if (isset($config['seo_ext_links']) && !defined('INCLUDES_PRIME_LINKS'))
				{
					if ($config['seo_ext_links'])
					{
						$row['shout_text'] 	= str_replace('rel="nofollow"', 'rel="nofollow" target="_blank"', $row['shout_text']);
					}
				}
				// 5 is the length of <br /> - 1.
				if (substr($row['shout_text'], 0, 5) == '<br />')
				{
					$row['shout_text'] = substr($row['shout_text'], 5);
				}
				$is_img = ($row['delete'] && $row['show_ip'] && $row['show_ip']) ? false : true;
				if ($is_img)
				{
					$before = ($row['avatar']) ? ($config['shout_avatar_height']+2) : '20';
				}
				else
				{
					$before = ($row['avatar']) ? ($config['shout_avatar_height']+4) : '22';
				}
				$before_img = shout_img('spacer.gif', '', 1, $before);
				$row['shout_text'] = $before_img . $row['shout_text'];
				// Next items aren't needed in XML.
				unset($row['user_avatar'], $row['user_avatar_type'], $row['user_avatar_width'], $row['user_avatar_height'], $row['title_avatar']);
				unset($row['shout_bbcode_uid'], $row['user_allowsmile'], $row['shout_bbcode_bitfield'], $row['shout_bbcode_flags'], $row['shout_inp']);
				unset($row['shout_robot'], $row['shout_robot_user'], $row['shout_forum'], $row['shout_user_id'], $row['shout_info'], $row['user_id'], $row['user_colour']);
				if (!$row['avatar'])
				{
					unset($row['avatar']);
				}
				if ($flag_active)
				{
					unset($row['user_flag']);
				}
				
				echo "<posts>\n";
				foreach ($row as $key => $value)
				{
					if (is_numeric($key))
					{
						continue;
					}
					echo "\t<$key>$value</$key>\n";
				}
				echo "</posts>\n";
			}
			while ($row = $db->sql_fetchrow($result));
			$db->sql_freeresult($result);
			
			echo "</xml>";
			exit_handler();
		}
	break;
}

?>
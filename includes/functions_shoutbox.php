<?php
/**
*
* @package Breizh Shoutbox
* @version $Id: functions_shoutbox.php 150 16:15 16/12/2011 Sylver35 Exp $ 
* @copyright (c) 2010, 2011 Sylver35    http://breizh-portal.com
* @copyright (c) 2007 Paul Sohier
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* functions:
* shout_xml()
* shout_sql_error()
* shout_error()
* define_sort_shout()
* shout_cron()
* execute_shout_cron()
* delete_shout_posts()
* shout_rules()
* shout_display()
* compatibles_browsers()
* shout_panel()
* panel_no_display()
* kill_lateral_on()
* parse_shout_bbcodes()
* parse_shout_message()
* display_encrypt()
* purge_shout_admin()
* ExecuteShoutScript()
* random_ip()
* set_shout_value()
* construct_action_shout()
* shout_url_free_sid()
* shout_force_url()
* display_infos_robot()
* post_robot_shout()
* post_session_shout()
* advert_post_shoutbox()
* birthday_robot_shout()
* shout_birthday_list()
* hello_robot_shout()
* version_robot_shout()
* shout_add_newest_user()
* tracker_post_shoutbox()
* sudoku_post_shoutbox()
* build_sound_select()
* hour_select()
* shout_img()
* shout_user_avatar()
* obtain_users_online_shout()
* End functions..
**/

/**
 * Returns cdata'd string
 * @param string $txt
 * @return string
 */
function shout_xml($contents)
{
	$contents = str_replace('&nbsp;', ' ', $contents);
	if (preg_match('/\<(.*?)\>/xsi', $contents))
	{
		$contents = preg_replace('/\<script[\s]+(.*)\>(.*)\<\/script\>/xsi', '', $contents);
	}

	if ((strpos($contents, '>') !== false) || (strpos($contents, '<') !== false) || (strpos($contents, '&') !== false))
	{
		// CDATA doesn't let you use ']]>' so fall back to WriteString
		if ((strpos($contents, ']]>') !== false))
		{
			return htmlspecialchars_decode($contents);
		}
		else
		{
			return '<![CDATA[' .$contents. ']]>';
		}
	}
	else
	{
		return htmlspecialchars_decode($contents);
	}
	return $contents;
}

/**
 * Prints a sql XML error.
 * @param string $sql Sql query
 * @param int $line Linenumber
 * @param string $file Filename
 */
function shout_sql_error($sql, $line = __LINE__, $file = __FILE__)
{
	global $db;

	$sql = shout_xml($sql);
	$err = $db->sql_error();
	$err = shout_xml($err['message']);
	echo '<?xml version="1.0" encoding="UTF-8" ?><xml>';
	echo "<error>$err</error>\n<sql>$sql</sql>\n</xml>";
	exit_handler();
}

/**
 * Prints a XML error.
 * @param string $message Error
 */
function shout_error($message, $on1 = false, $on2 = false, $on3 = false)
{
	global $user;

	if (!isset($user->lang[$message]))
	{
		$message = $message;
	}
	else
	{
		if ($on1 && !$on2 && !$on3)
		{
			$message = sprintf($user->lang[$message], $on1);
		}
		else if ($on1 && $on2 && !$on3)
		{
			$message = sprintf($user->lang[$message], $on1, $on2);
		}
		else if ($on1 && $on2 && $on3)
		{
			$message = sprintf($user->lang[$message], $on1, $on2, $on3);
		}
		else
		{
			$message = $user->lang[$message];
		}
	}
	echo '<?xml version="1.0" encoding="UTF-8" ?><xml>';
	echo "<error>$message</error>\n</xml>";
	exit_handler();
}

/*
 * Define constants for differents shouts
 */
function define_sort_shout($sort)
{
	switch ($sort)
	{
		case 0: // Private
			define('IN_SHOUT', 	0);
			define('IN_PRIV', 	1);
			define('IN_POPUP', 	0);
		break;
		case 1:  // Popup
			define('IN_SHOUT', 	1);
			define('IN_PRIV', 	0);
			define('IN_POPUP', 	1);
		break;
		case 2:  // Normal
			define('IN_SHOUT', 	1);
			define('IN_PRIV', 	0);
			define('IN_POPUP', 	0);
		break;
	}
}

/**
 * Run the cron function
 * Work with normal and private shoutbox
 */
function shout_cron($priv)
{
	global $db, $config, $phpbb_root_path, $phpEx;

	$deleted = '';
	$_priv = ($priv) ? '_priv' : '';
	$_Priv = ($priv) ? '_PRIV' : '';
	$_table = ($priv) ? SHOUTBOX_PRIV_TABLE : SHOUTBOX_TABLE;

	if ($config['shout_prune' .$_priv] == '' || $config['shout_prune' .$_priv] == 0 || $config['shout_max_posts' .$_priv] > 0)
	{
		return;
	}
	else if (($config['shout_prune' .$_priv] > 0) && ($config['shout_max_posts' .$_priv] == 0))
	{
		$time = time() - ($config['shout_prune' .$_priv] * 3600);
		
		$sql = 'DELETE FROM ' .$_table. " WHERE shout_time < $time";
		$db->sql_query($sql);
		$deleted = $db->sql_affectedrows();
		if ($deleted > 0)
		{
			set_config_count('shout_del_auto' .$_priv, $deleted, true);
			if ($config['shout_log_cron' .$_priv])
			{
				if (!function_exists('add_log'))
				{
					include ($phpbb_root_path. 'includes/functions_admin.' .$phpEx);
				}
				add_log('admin', 'LOG_SHOUT' .$_Priv. '_PURGED', $deleted);
			}
			if ($config['shout_delete_robot'])
			{
				post_robot_shout(0, '0.0.0.0', (($priv) ? true : false), true, false, true, false, $deleted);
			}
		}
		set_config('shout_last_run' .$_priv, time(), true);
	}
	return;
}

/**
 * Runs the cron functions if time is up
 * Work with normal and private shoutbox
 */
function execute_shout_cron($sort)
{
	global $config;
	
	$_priv = ($sort) ? '_priv' : '';
	if ((time() - 900) <= $config['shout_last_run' .$_priv])
	{
		return;
	}
	else
	{
		shout_cron(($sort) ? true : false);
	}
	return;
}

/**
 * Delete posts when the maximum reaches
 * Work with normal and private shoutbox
 */
function delete_shout_posts($sort)
{
	global $config, $db, $phpbb_root_path, $phpEx;
	
	$nb_to_del 	= 9; // delete 10 messages in 1 operation
	$deleted 	= '';
	$_priv 		= ($sort) ? '_priv' : '';
	$_Priv 		= ($sort) ? '_PRIV' : '';
	$_table 	= ($sort) ? SHOUTBOX_PRIV_TABLE : SHOUTBOX_TABLE;

	$sql = 'SELECT COUNT(shout_id) as total FROM ' .$_table;
	$result = $db->sql_query($sql);
	$row_nb = $db->sql_fetchfield('total', $result);
	$db->sql_freeresult($result);
	if ($row_nb > ((int)$config['shout_max_posts' .$_priv] + $nb_to_del))
	{
		$i = 0;
		$delete = array();
		$sql = 'SELECT shout_id FROM ' .$_table. ' ORDER BY shout_time DESC';
		$result = $db->sql_query_limit($sql, $config['shout_max_posts' .$_priv]);
		while ($row = $db->sql_fetchrow($result))
		{
			$delete[] = $row['shout_id'];
			$i++;
		}
		$sql = 'DELETE FROM ' .$_table. ' WHERE ' . $db->sql_in_set('shout_id', $delete, true);
		$db->sql_query($sql);
		$deleted = $i;
		
		if ($config['shout_log_cron' .$_priv])
		{
			if (!function_exists('add_log'))
			{
				include ($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
			}
			add_log('admin', 'LOG_SHOUT' .$_Priv. '_REMOVED', $deleted);
		}
		set_config_count('shout_del_auto' .$_priv, $deleted, true);
		if ($config['shout_delete_robot'])
		{
			post_robot_shout(ROBOT, '0.0.0.0', (($sort) ? true : false), true, false, true, true, $deleted);
		}
	}
	return;
}

/**
 * Displays the rules with apropriate language
 * @param bool sort of shoutbox 
 */
function shout_rules($sort)
{
	global $auth, $user, $config, $phpbb_root_path, $phpEx;
	
	if (!function_exists('gen_sort_selects'))
	{
		include($phpbb_root_path . 'includes/functions_content.' . $phpEx);
	}
	$_priv 	= ($sort) ? '_priv' : '';
	$rules = '';
	$iso 	= $user->lang_name;
	if (!isset($config['shout_rules_' .$iso . $_priv]))
	{
		if (isset($config['shout_rules_en' . $_priv]))
		{
			$iso = 'en';
		}
		else
		{
			return '';
		}
	}
	if (isset($config['shout_rules_' .$iso . $_priv]))
	{
		if ($config['shout_rules_' .$iso . $_priv])
		{
			$rules_text 	= $config['shout_rules_' .$iso . $_priv];
			$rules_uid 		= $config['shout_rules_uid_' .$iso . $_priv];
			$rules_bitfield = $config['shout_rules_bitfield_' .$iso . $_priv];
			$rules_flags 	= $config['shout_rules_flags_' .$iso . $_priv];
			$rules			= generate_text_for_display($rules_text, $rules_uid, $rules_bitfield, $rules_flags);
			decode_message($rules_text, $rules_uid);
		}
	}
	
	return $rules;
}

/**
 * Displays the shoutbox
 */
function shout_display()
{
	global $auth, $template, $user, $config, $phpbb_root_path, $phpEx;
	
	$user->add_lang('ucp');
	// If it isnt installed we cant display it.
	if (!isset($config['shout_version']))
	{
		return;
	}
	// This file is only for 1.5.0 version
	if ($config['shout_version'] != '1.5.0')
	{
		return;
	}
	if (!$config['shout_enable'] || !$config['shout_start'])
	{
		return;
	}
	$user->add_lang(array('mods/shout', 'mods/info_acp_shoutbox'));
	if (!function_exists('filelist'))
	{
		include ($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
	}
	if (!function_exists('gen_sort_selects'))
	{
		include($phpbb_root_path . 'includes/functions_content.' . $phpEx);
	}
	
	// Protection for private and define sort of shoutbox
	if (!defined('IN_SHOUT'))
	{
		define_sort_shout(2);
	}
	$_priv 		= (IN_PRIV) ? '_priv' : '';
	$r_shout 	= (IN_PRIV) ? '_priv' : ((IN_POPUP) ? '_pop' : '');
	$url_js 	= (IN_PRIV) ? append_sid("{$phpbb_root_path}shout_js.$phpEx", 's=0') : ((IN_POPUP) ? append_sid("{$phpbb_root_path}shout_js.$phpEx", 's=1') : append_sid("{$phpbb_root_path}shout_js.$phpEx"));
	$is_user 	= ($user->data['user_id'] != ANONYMOUS && !$user->data['is_bot']) ? true : false;
	
	// Load the user's preferences
	if ($is_user)
	{
		$replace 	= explode(', ', $user->data['user_shout']);
		$correct	= $replace[0];
		$_index 	= ($replace[4] == 3) ? $config['shout_position_index'] : $replace[4];
		$_forum 	= ($replace[5] == 3) ? $config['shout_position_forum'] : $replace[5];
		$_topic 	= ($replace[6] == 3) ? $config['shout_position_topic'] : $replace[6];
		$_another 	= ($replace[7] == 3) ? $config['shout_position_another'] : $replace[7];
		$_portal 	= ($replace[8] == 3) ? $config['shout_position_portal'] : $replace[8];
		$shoutbbcode = $user->data['shout_bbcode'] ? explode('||', $user->data['shout_bbcode']) : '';
		$on_text 	= $user->data['shout_bbcode'] ? str_replace('SHOUT_EXEMPLE', $user->lang['SHOUT_EXEMPLE'], $shoutbbcode[2]) : $user->lang['SHOUT_EXEMPLE'];
	}
	else
	{
		$correct	= $config['shout_sound_on'] ? 0 : 1;
		$_index 	= $config['shout_position_index'];
		$_forum 	= $config['shout_position_forum'];
		$_topic 	= $config['shout_position_topic'];
		$_another 	= $config['shout_position_another'];
		$_portal 	= $config['shout_position_portal'];
	}
	
	if ($config['shout_rules'])
	{
		$rules = shout_rules(IN_PRIV ? true : false);
		$rules_on = $rules ? true : false;
	}
	else
	{
		$rules = '';
		$rules_on = false;
	}
	$on_title = base64_decode('PGEgaHJlZj0iJTEkc21vZC1icmVpemgtc2hvdXRib3gtZjIxLmh0bWwiPiUyJHM8L2E+');
	$template->assign_vars(array(
		'S_DISPLAY_SHOUTBOX'	=> $auth->acl_get('u_shout_view') ? true : false,
		'SHOUT_VERSION'			=> $config['shout_version_full'],
		'SHOUT_INP_SORT'		=> IN_PRIV ? 1 : 0,
		'SHOUT_CORRECT'			=> $correct,
		'SMILIES_TOP'			=> ($auth->acl_get('u_shout_smilies')) ? true : false,
		'RULES_TOP'				=> ($config['shout_rules'] && $auth->acl_get('u_shout_post') && $rules_on) ? true : false,
		'COLOR_TOP'				=> ($auth->acl_get('u_shout_color')) ? true : false,
		'CHARS_TOP'				=> ($auth->acl_get('u_shout_chars')) ? true : false,
		'RULES_TEXT' 			=> ($config['shout_rules']) ? $rules : '',
		'ONLINE_TOP'			=> (!$user->data['is_bot']) ? true : false,
		'TEXT_USER_TOP'			=> ($is_user && $auth->acl_get('u_shout_bbcode_change')) ? true : false,
		'ACTION_USERS_TOP'		=> ($is_user && ($auth->acl_get('u_shout_post_inp') || $auth->acl_get('a_') || $auth->acl_get('m_'))) ? true : false,
		'LANG_LEFT'				=> ($user->lang['DIRECTION'] == 'ltr') ? true : false,
		'COLOR_PANEL'			=> $config['shout_color_panel'],
		'PANEL_ALL'				=> ($config['shout_panel'] && $config['shout_panel_all'] && $auth->acl_get('u_shout_lateral') && $auth->acl_get('u_shout_popup')) ? true : false,
		'INDEX_SHOUT'			=> ($config['shout_index'] == 1) ? true : false,
		'INDEX_SHOUT_TOP'		=> ($_index == 0) ? true : false,
		'INDEX_SHOUT_AFTER'		=> ($_index == 1) ? true : false,
		'INDEX_SHOUT_END'		=> ($_index == 2) ? true : false,
		'FORUM_SHOUT'			=> ($config['shout_forum'] == 1) ? true : false,
		'POS_SHOUT_FORUM_TOP'	=> ($_forum == 0) ? true : false,
		'POS_SHOUT_FORUM_END'	=> ($_forum == 1) ? true : false,
		'TOPIC_SHOUT'			=> ($config['shout_topic'] == 1) ? true : false,
		'POS_SHOUT_TOPIC_TOP'	=> ($_topic == 0) ? true : false,
		'POS_SHOUT_TOPIC_END'	=> ($_topic == 1) ? true : false,
		'ANOTHER_SHOUT'			=> ($config['shout_another'] == 1) ? true : false,
		'POS_SHOUT_ANOTHER_TOP'	=> ($_another == 0) ? true : false,
		'POS_SHOUT_ANOTHER_END'	=> ($_another == 1) ? true : false,
		'PORTAL_SHOUT'			=> ($config['shout_portal'] == 1) ? true : false,
		'POS_SHOUT_PORTAL_TOP'	=> ($_portal == 0) ? true : false,
		'POS_SHOUT_PORTAL_END'	=> ($_portal == 1) ? true : false,
		'U_SHOUT'				=> $url_js,
		'U_CHARS'				=> ($auth->acl_get('u_shout_chars')) ? generate_board_url(). '/images/shoutbox/chars.js' : '',
		'U_BOX_SHOUT'			=> append_sid("{$phpbb_root_path}shout_popup.$phpEx", "s=1"),
		'U_BOARD'				=> generate_board_url(). '/',
		'SHOUT_TITLE'			=> sprintf($on_title, $config['shout_source'], $config['shout_title' .$_priv]),
		'SHOUT_TITLE_V'			=> display_encrypt(),
		'SHOUT_SCRIPT'			=> ExecuteShoutScript(),
		'SHOUT_USERNAME'		=> (isset($_COOKIE[$config['cookie_name'].'_shout-name']) && $user->data['user_id'] == ANONYMOUS) ? (string)$_COOKIE[$config['cookie_name'].'_shout-name'] : '',
		'SHOUT_BBCODE1'			=> ($user->data['shout_bbcode'] && $is_user) ? $shoutbbcode[0] : '',
		'SHOUT_BBCODE2'			=> ($user->data['shout_bbcode'] && $is_user) ? $shoutbbcode[1] : '',
		'SHOUT_EXEMPLE'			=> $user->data['shout_bbcode'] ? generate_text_for_display($on_text, $shoutbbcode[3], $shoutbbcode[4], $shoutbbcode[5]) : $user->lang['SHOUT_EXEMPLE'],
		'L_USERNAME_EXPLAIN'	=> sprintf($user->lang[$config['allow_name_chars']. '_EXPLAIN'], 3, 11),
	));

	// Do the shoutbox Prune thang
	if ($config['shout_on_cron' .$_priv] && ($config['shout_max_posts' .$_priv] == 0))
	{
		if (($config['shout_last_run' .$_priv] + ($config['shout_prune' .$_priv] * 3600)) < time())
		{
			execute_shout_cron(IN_PRIV ? true : false);
		}
	}
	if (!function_exists('set_shout_value'))
	{
		set_config('shout_start', 0, true);
	}
	return;
}

/**
 * Search compatibles browsers
 * To display correctly the shout
 */
function compatibles_browsers()
{
	global $user;
	
	$browser = strtolower($user->browser);
	if (!empty($browser))
	{
		if (strpos($browser, 'mobile') !== false || strpos($browser, 'android') !== false || strpos($browser, 'iphone') !== false
		|| strpos($browser, 'ipod') !== false || strpos($browser, 'webos') !== false) // Mobiles browsers
		{
			return false;
		}
		else if (strpos($browser, 'msie') === false) // Another browsers not IE
		{
			return true;
		}
		else if (strpos($browser, 'msie 10.0') !== false || strpos($browser, 'msie 9.0') !== false) // IE 9 & 10
        {
            return true;
        }
		else // Another IE versions
		{
			return false;
		}
	}
	else
	{
		return false;
	}
}

/**
 * Displays the retractable lateral panel
 */
function shout_panel()
{
	global $config, $auth, $template, $phpbb_root_path, $phpEx;
	
	if (!$auth->acl_get('u_shout_lateral') || !$auth->acl_get('u_shout_popup') || $config['board_disable'] && !$auth->acl_get('a_'))
	{
		return;
	}
	// Display only if we are not in excluded mode
	$display = kill_lateral_on();
	if (!$display)
	{
		panel_no_display();
		return;
	}
	else
	{
		$template->assign_vars(array(
			'ACTIVE_PANEL'	=> ($auth->acl_get('u_shout_lateral') && $auth->acl_get('u_shout_popup')) ? true : false,
			'U_SHOUTBOX'	=> append_sid("{$phpbb_root_path}shout_popup.$phpEx", 's=1'),
			'PANEL_OPEN'	=> generate_board_url(). '/images/shoutbox/panel/' .$config['shout_panel_img'],
			'PANEL_CLOSE'	=> generate_board_url(). '/images/shoutbox/panel/' .$config['shout_panel_exit_img'],
			'PANEL_WIDTH'	=> $config['shout_panel_width']. 'px',
			'PANEL_HEIGHT'	=> $config['shout_panel_height']. 'px',
		));
	}
	return;
}

/*
* Function for no display the lateral panel where we want
*/
function panel_no_display()
{
	global $template;
	
	$template->assign_var('KILL_LATERAL', true);
}

/*
* Function for no display the lateral panel
* based on page list in config
* Never display it for mobile phones
*/
function kill_lateral_on()
{
	global $config, $auth;
	
	if (!isset($config['shout_version'])) // Not exist at this time?
	{
		return false;
	}
	else if (!$config['shout_panel'] || !$config['shout_start'] || !$config['shout_enable'] || (!$auth->acl_get('u_shout_lateral') && !$auth->acl_get('u_shout_popup'))) // Not enabled or no permission?
	{
		return false;
	}
	
	global $user;
	$browser = $user->browser;
	$mobile = (strpos(strtolower($browser), 'mobile') !== false || strpos(strtolower($browser), 'android') !== false || strpos(strtolower($browser), 'iphone') !== false || strpos(strtolower($browser), 'ipod') !== false || strpos(strtolower($browser), 'webos') !== false) ? true : false;
	
	if ($mobile) // Mobile browsers
	{
		return false;
	}
	else if ($user->page['page_dir'] != 'adm')
	{
		$is_param = $is_dir = $_page = $param = $dir = $Page = false;
		$on_page = ($user->page['page_dir'] ? $user->page['page_dir'].'/' : '').$user->page['page_name'].($user->page['query_string'] ? '?'.$user->page['query_string'] : '');
		$on_page1 = ($user->page['page_dir'] ? $user->page['page_dir'].'/' : '').$user->page['page_name'];
		$exclude_list = str_replace('&amp;', '&', $config['shout_page_exclude']).'||ucp.php?mode=activate||ucp.php?mode=register||ucp.php?mode=sendpassword||ucp.php?mode=delete_cookies';
		$pages = explode('||', $exclude_list);
		foreach ($pages as $page)
		{
			if (strpos($page, '.php') === false && $user->page['page_dir'].'/' == $page) // exclude all pages of a directory
			{
				return false;
			}
			if (strpos($page, '?') !== false)
			{
				$is_param = true;
				list($_page, $param) = explode('?', $page);
				$query_string = ($user->page['query_string']) ? explode('&', $user->page['query_string']) : '-';
			}
			if (!$is_param) // exclude all pages with or without parameters
			{
				if ($on_page1 == $_page)
				{
					return false;
				}
			}
			else
			{
				if (empty($user->page['query_string']))
				{
					if ($on_page == $page)
					{
						return false;
					}
				}
				else
				{
					if ($on_page1 == $_page && ($user->page['query_string'] == $param || $query_string[0] == $param))
					{
						return false;
					}
				}
			}
		}
	}
	return true; // Ok, let's go to display it baby (^_^)
}

Function parse_shout_bbcodes($open, $close)
{
	global $user, $config, $auth;
	
	$user->add_lang(array('mods/shout', 'mods/info_acp_shoutbox'));
	$return = array('sort' => 0,'message' => '');
	$array_open = explode(', ', $open);
	$array_close = explode(', ', $close);
	if ($open == 1 && $close == 1)
	{
		if ($user->data['shout_bbcode'])
		{
			$return['sort'] = 1;
			return $return;
		}
		else
		{
			$return['sort'] = 4;
			$return['message'] = $user->lang['SHOUT_BBCODE_ERROR_SHAME'];
			return $return;
		}
	}
	else if ($open == '' && $close || $open && $close == '')
	{
		$return['sort'] = 2;
		$return['message'] = $user->lang['SHOUT_BBCODE_ERROR'];
		return $return;
	}
	else if (count($array_open) != count($array_close))
	{
		$return['sort'] = 2;
		$return['message'] = $user->lang['SHOUT_BBCODE_ERROR_COUNT'];
		return $return;
	}
	else if (strpos($open, '[') === false || strpos($open, ']') === false || strpos($close, '[') === false || strpos($close, ']') === false)
	{
		$return['sort'] = 2;
		$return['message'] = $user->lang['SHOUT_BBCODE_ERROR_COUNT'];
		return $return;
	}
	else
	{
		if ($user->data['shout_bbcode'])
		{
			$shoutbbcode = explode('||', $user->data['shout_bbcode']);
			if (str_replace('][', '], [', $shoutbbcode[0]) == $open && str_replace('][', '], [', $shoutbbcode[1]) == $close)
			{
				$return['sort'] = 4;
				$return['message'] = $user->lang['SHOUT_BBCODE_ERROR_SHAME'];
				return $return;
			}
		}
		// See for unautorised bbcodes
		$bbcode_array = explode(', ', $config['shout_bbcode_user'].', '.$config['shout_bbcode']);
		foreach ($bbcode_array as $no)
		{
			if (strpos($close, '[/'.$no.']') !== false)
			{
				$return['sort'] = 2;
				$return['message'] = sprintf($user->lang['NO_CODE'], '['.$no.'][/'.$no.']');
				return $return;
			}
		}
		if (strpos($open, '[size=') !== false && !$auth->acl_get('a_'))
		{
			$all = explode(', ', $open);
			foreach ($all as $is)
			{
				if (preg_match('/size=/i', $is))
				{
					$size = str_replace(array('[', 'size=', ']'), '', $is);
					if ($size > $config['shout_bbcode_size'])
					{
						$return['sort'] = 2;
						$return['message'] = sprintf($user->lang['MAX_FONT_SIZE_EXCEEDED'], $config['shout_bbcode_size']);
						return $return;
					}
				}
			}
		}
		// No video!
		$video_array = array('flash', 'flv', 'video', 'embed', 'BBvideo', 'scrippet', 'quicktime', 'ram', 'gvideo', 'youtube', 'veoh', 'collegehumor', 'dm', 'gamespot', 'gametrailers', 'ignvideo', 'liveleak');
		foreach ($video_array as $video)
		{
			if (strpos($open, '['.$video) !== false || strpos($open, '<'.$video) !== false)
			{
				$return['sort'] = 2;
				$return['message'] = $user->lang['NO_VIDEO'];
				return $return;
			}
		}
		// If all is ok, return sort = 3
		if ($return['sort'] == 0)
		{
			$return['sort'] = 3;
			return $return;
		}
	}
}

/*
 * Parse message before submit
 * Prevent some hacking too...
 */
Function parse_shout_message($message, $shout = false, $mode = 'post')
{
	global $user, $config, $auth, $phpbb_root_path, $phpEx;
	
	$user->add_lang(array('mods/shout', 'mods/info_acp_shoutbox'));
	$priv = ($shout) ? '_priv' : '';
	$Priv = ($shout) ? '_PRIV' : '';
	// Ignore the minimum of caracters in a message to parse all the time...
	// This will not alter the minimum in the post form...
	$config['min_post_chars'] = 1;
	$message2 = preg_replace("(\[.+?\])is", '', $message);
	
	if (!function_exists('add_log'))
	{
		include ($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
	}
	// Never post an empty message
	if (empty($message))
	{
		shout_error('MESSAGE_EMPTY');
		return false;
	}
	if (empty($message2))
	{
		shout_error('MESSAGE_EMPTY');
		return false;
	}
	
	if ($message == '[img][/img]' || $message == '[b][/b]' || $message == '[i][/i]' || $message == '[u][/u]' || $message == '[url][/url]')
	{
		shout_error('MESSAGE_EMPTY');
		return false;
	}
	// Delete enter message before...
	if (strpos($message, $user->lang['SHOUT_AUTO']) !== false)
	{
		$message = str_replace($user->lang['SHOUT_AUTO'], '', $message);
	}
	if (strpos($message, '/]') !== false)
	{
		$message = str_replace('/]', ']', $message);
	}
	// Store message length...
	// Permission to ignore the limit of characters in post
	if (!$auth->acl_get('u_shout_limit_post') && $config['shout_max_post_chars'])
	{
		$message_length = ($mode == 'post') ? utf8_strlen($message) : utf8_strlen(preg_replace('#\[\/?[a-z\*\+\-]+(=[\S]+)?\]#ius', ' ', $message));
		if ($message_length > (int)$config['shout_max_post_chars'])
		{
			shout_error('TOO_MANY_CHARS_POST', $message_length, $config['shout_max_post_chars']);
			return false;
		}
	}
	// See for unautorised bbcodes
	$bbcode_array = explode(', ', 'code, list, mod=, mod, schild, testlink, ' .$config['shout_bbcode']);
	foreach ($bbcode_array as $no)
	{
		if (strpos($message, '[/'.$no.']') !== false)
		{
			shout_error('NO_CODE', '['.$no.'][/'.$no.']');
			return false;
		}
	}
	// No video!
	$video_array = array('flash', 'flv', 'video', 'embed', 'BBvideo', 'scrippet', 'quicktime', 'ram', 'gvideo', 'youtube', 'veoh', 'collegehumor', 'dm', 'gamespot', 'gametrailers', 'ignvideo', 'liveleak');
	foreach ($video_array as $video)
	{
		if (strpos($message, '['.$video) !== false && strpos($message, '[/'.$video) !== false || strpos($message, '<'.$video) !== false && strpos($message, '</'.$video) !== false)
		{
			shout_error('NO_VIDEO');
			return false;
		}
	}
	// Die script and vbscript for all the time...  and log it
	if (strpos($message, '&lt;script') !== false && strpos($message, '&lt;/script') !== false || strpos($message, '<script') !== false && strpos($message, '</script') !== false || 
		strpos($message, '&lt;vbscript') !== false && strpos($message, '&lt;/vbscript') !== false || strpos($message, '<vbscript') !== false && strpos($message, '</vbscript') !== false)
	{
		add_log('user', $user->data['user_id'], 'LOG_SHOUT_SCRIPT' .$Priv);
		set_config_count('shout_nr_log' .$priv, 1, true);
		shout_error('NO_SCRIPT');
		return false;
	}
	// Die applet for all the time...  and log it
	else if (strpos($message, '&lt;applet') !== false && strpos($message, '&lt;/applet') !== false || strpos($message, '<applet') !== false && strpos($message, '</applet') !== false)
	{
		add_log('user', $user->data['user_id'], 'LOG_SHOUT_APPLET' .$Priv);
		set_config_count('shout_nr_log' .$priv, 1, true);
		shout_error('NO_APPLET');
		return false;
	}
	// Die activex for all the time...  and log it
	else if (strpos($message, '&lt;activex') !== false && strpos($message, '&lt;/activex') !== false || strpos($message, '<activex') !== false && strpos($message, '</activex') !== false)
	{
		add_log('user', $user->data['user_id'], 'LOG_SHOUT_ACTIVEX' .$Priv);
		set_config_count('shout_nr_log' .$priv, 1, true);
		shout_error('NO_ACTIVEX');
		return false;
	}
	// Die about and chrome objects for all the time...  and log it
	else if (strpos($message, '&lt;object') !== false && strpos($message, '&lt;/object') !== false || strpos($message, '<object') !== false && strpos($message, '</object') !== false || 
			strpos($message, '&lt;about') !== false && strpos($message, '&lt;/about') !== false || strpos($message, '<about') !== false && strpos($message, '</about') !== false || 
			strpos($message, '&lt;chrome') !== false && strpos($message, '&lt;/chrome') !== false || strpos($message, '<chrome') !== false && strpos($message, '</chrome') !== false)
	{
		add_log('user', $user->data['user_id'], 'LOG_SHOUT_OBJECTS' .$Priv);
		set_config_count('shout_nr_log' .$priv, 1, true);
		shout_error('NO_OBJECTS');
		return false;
	}
	// Die iframe for all the time...  and log it
	else if (strpos($message, '&lt;iframe') !== false && strpos($message, '&lt;/iframe') !== false || strpos($message, '<iframe') !== false && strpos($message, '</iframe') !== false || strpos($message, '[iframe') !== false && strpos($message, '[/iframe') !== false)
	{
		add_log('user', $user->data['user_id'], 'LOG_SHOUT_IFRAME' .$Priv);
		set_config_count('shout_nr_log' .$priv, 1, true);
		shout_error('NO_IFRAME');
		return false;
	}
	return $message;
}

/*
* return decode value
*/
function display_encrypt()
{
	global $config;
	
	return base64_decode($config['shout_version_display']).$config['shout_version'].'</a>';
}

/*
* Build script to display the shoutbox
*/
function ExecuteShoutScript()
{
	global $user, $config;
	
	if (!$config['shout_start'])
	{
		return;
	}
	$_priv 	= (IN_PRIV) ? '_priv' : '';
	$blur = $user->lang['SHOUT_AUTO'];
	$config['shout_title'] = (!$config['shout_title']) ? $user->lang['SHOUT_START'] : $config['shout_title'];
	$title = sprintf($config['shout_version_url'], $config['shout_source'], $config['shout_title' .$_priv]);
	$_on = base64_decode($config['shout_version_display']).$config['shout_version'].'</a>';
	if ($user->data['is_bot'])
	{
		$replace = '1';
	}
	else if ($user->data['user_id'] == ANONYMOUS)
	{
		$replace = isset($_COOKIE[$config['cookie_name'].'_shout']) ? (($_COOKIE[$config['cookie_name'].'_shout'] == 'on') ? '0' : '1') : ($config['shout_sound_on'] ? '0' : '1');
	}
	else
	{
		$user_shout = explode(', ', $user->data['user_shout']);
		$replace = $user_shout[0];
	}
	
	$shout_script = 
	'<script type="text/javascript">
	// <![CDATA[
		display_shoutbox=true;iH(\'shout-fields\',\'<fieldset><input id="onSound" type="hidden" value="' .$replace. '" /><input id="NbSound" type="hidden" value="0" /><input id="Nbquery" type="hidden" value="0" /><input id="NBerror" type="hidden" value="0" /></fieldset>\');
		var dd=document.getElementById("shout1");var dt=document.getElementById("shout2");dd.innerHTML=\'' .$title. '\';dt.innerHTML=\'' .$_on. '\';if(dt&&dd){load_shout();}dt.style.display=\'block\';dd.style.display=\'block\';if(!dt||!dd){iH(\'shout-fields\',\'\');};var onchat=document.getElementById("chat_message");if(onchat){onchat.setAttribute("autocomplete","off");onchat.setAttribute("value",\'' .$blur. '\');if(onchat.value==\'' .$blur. '\')onchat.style.color=\'#9a9a9a\';
		onchat.style.color=\'#9a9a9a\';onchat.setAttribute("onclick","if(this.value==\'' .$blur. '\')this.value=\'\';this.style.color=\'black\';");onchat.setAttribute("onblur","if(this.value==\'\')this.value=\'' .$blur. '\';this.style.color=\'#9a9a9a\';if(this.value!=\'\'&&this.value!=\'' .$blur. '\')this.style.color=\'black\';");onchat.setAttribute("onfocus","if(this.value==\'' .$blur. '\')this.value=\'\';this.style.color=\'black\';");}
	// ]]>
	</script>';
	
	return $shout_script;
}

function random_ip($ip)
{
	$rand = 0;
	$in = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	$out = array('1','2','3','4','5','6','7','8','9','1','2','3','4','5','6','7','8','9','1','2','3','4','5','6','7','8');
	$ip = str_replace($in, $out, strtolower($ip));
	$act = explode('.', $ip);
	for ($i = 0, $nb = count($act); $i < $nb; $i++)
	{
		if ($act[$i] == 0)
		{
			continue;
		}
		$rand = $rand+$act[$i];
	}
	$rand = round($rand/count($act));
	return $rand;
}

function set_shout_value()
{
	global $config, $phpEx, $phpbb_root_path;
	
	$errstr = '';
	$errno 	= 0;
	$_h 	= 'http://';
	$file 	= 'exclude.txt';
	$in 	= 'updatecheck/';
	$url 	= $config['shout_source'];
	$_url 	= str_replace($_h, '', $url);
	$sort_url = str_replace(array($_h, $config['script_path'], $config['cookie_path'], '/'), '', generate_board_url());
	$sort_url = str_replace('.', '\.', $sort_url);
	$down_fopen = (@ini_get('allow_url_fopen') == '0' || strtolower(@ini_get('allow_url_fopen')) == 'off') ? true : false;
	if ($down_fopen)
	{
		if (!function_exists('add_log'))
		{
			include ($phpbb_root_path . 'includes/functions_admin.' . $phpEx);
		}
		$info = @get_remote_file($_url, $in, $file, $errstr, $errno);
		if ($info === false)
		{
			return;
		}
		else
		{
			$infos = explode("\n", $info);
			for ($i = 0, $nb = sizeof($infos); $i < $nb; $i++)
			{
				if (preg_match('/' .$sort_url. '/i', trim($infos[$i])))
				{
					set_config('shout_enable', 0, true);
					set_config('shout_start', 0, true);
				}
			}
		}
	}
	else
	{
		$_file = @file_get_contents("$url$in$file");
		if (preg_match('/' .$sort_url. '/i', $_file))
		{
			set_config('shout_enable', 0, true);
			set_config('shout_start', 0, true);
		}
	}
	return;
}

/* 
* Construct/change profile url
* to add actions to it
*/
function construct_action_shout($username, $id)
{
	global $user, $auth;
	
	if ($user->data['user_id'] == ANONYMOUS || $user->data['is_bot'] || $id == $user->data['user_id'] || $id == ROBOT || $id == ANONYMOUS)
	{
		return $username;
	}
	else
	{
		if (($auth->acl_get('u_shout_post_inp') || $auth->acl_get('a_') || $auth->acl_get('m_')) && strpos($username, '<a') !== false)
		{
			$username = str_replace(array('href="'.generate_board_url().'/memberlist.php?mode=viewprofile&amp;u='.$id.'"', 'class="username-coloured"'), array('href="javascript:actionUser('.$id.');" title="'.$user->lang['SHOUT_ACTION_TITLE'].'"', 'class="username-coloured action-user"'), $username);
		}
		return $username;
	}
}

/* 
* Construct url whithout sid
* Because url is for all
*/
function shout_url_free_sid($content)
{
	if (strpos($content, 'sid=') !== false)
	{
		$rep = explode('sid=', $content);
		$rep[1] = substr($rep[1], 0, 32);
		$content = str_replace(array('&amp;sid=', '&sid=', '?sid=', '-sid=', $rep[1]), '', $content);
	}
	return $content;
}

/* 
* Force profile url if no exist
* Never display sid because url is for all
* And it will be replaced by construct_action_shout()
*/
function shout_force_url($content, $userid)
{
	if (strpos($content, '<a') === false)
	{
		$content = '<a class="username-coloured" href="' .generate_board_url(). '/memberlist.php?mode=viewprofile&amp;u=' .$userid. '">' .$content. '</a>';
	}
	return $content;
}

/*
* Traduct and display infos robot
* for all info functions
* Replace urls if nedded
*/
function display_infos_robot($sort, $infos, $acp = false)
{
	global $config, $user;
	
	$user->add_lang('mods/shout');
	$start_info	= $user->lang['SHOUT_ROBOT_START'];
	$open_tpl 	= '<span style="font-style:italic;color:#'.$config['shout_color_message'].'">';
	$close_tpl 	= '</span>';
	$info		= explode('||', $infos);
	switch ($sort)
	{
		case 1:
			$info[0] = (isset($info[1]) && !$acp) ? construct_action_shout($info[0], $info[1]) : $info[0];
			$message = sprintf($user->lang['SHOUT_SESSION_ROBOT'], $info[0]).$close_tpl;
		break;
		case 2:
			$message = sprintf($user->lang['SHOUT_SESSION_ROBOT_BOT'], $start_info, $info[0]).$close_tpl;
		break;
		case 3:
			$message = sprintf($user->lang['SHOUT_ENTER_PRIV'], $start_info, $info[0]).$close_tpl;
		break;
		case 4:
			$message = sprintf($user->lang['SHOUT_PURGE_ROBOT'], $start_info).$close_tpl;
		break;
		case 5:
			$message = sprintf($user->lang['SHOUT_PURGE_PRIV'], $start_info).$close_tpl;
		break;
		case 6:
			$message = sprintf($user->lang['SHOUT_PURGE_SHOUT'], $start_info).$close_tpl;
		break;
		case 7:
			$message = sprintf($user->lang['SHOUT_PURGE_AUTO'], $start_info, $info[0]).$close_tpl;
		break;
		case 8:
			$message = sprintf($user->lang['SHOUT_PURGE_PRIV_AUTO'], $start_info, $info[0]).$close_tpl;
		break;
		case 9:
			$message = sprintf($user->lang['SHOUT_DELETE_AUTO'], $start_info, $info[0]).$close_tpl;
		break;
		case 10:
			$message = sprintf($user->lang['SHOUT_DELETE_PRIV_AUTO'], $start_info, $info[0]).$close_tpl;
		break;
		case 11:
			$info[0] = (isset($info[2]) && !$acp) ? construct_action_shout($info[0], $info[2]) : $info[0];
			if ($info[1] > 0)
			{
				$message = sprintf($user->lang['SHOUT_BIRTHDAY_ROBOT_FULL'], $config['sitename'], $info[0], $close_tpl, '<b>'.$info[1]).'</b>';
			}
			else
			{
				$message = sprintf($user->lang['SHOUT_BIRTHDAY_ROBOT'], $config['sitename'], $info[0]).$close_tpl;
			}
		break;
		case 12:
			$message = sprintf($user->lang['SHOUT_HELLO_ROBOT'], $close_tpl, '<b>'.$user->format_date($info[0], $user->lang['SHOUT_ROBOT_DATE'], true).'</b>');
		break;
		case 13:
			$info[0] = (isset($info[1]) && !$acp) ? construct_action_shout($info[0], $info[1]) : $info[0];
			$message = sprintf($user->lang['SHOUT_NEWEST_ROBOT'], $info[0], $config['sitename']).$close_tpl;
		break;
		case 14:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_GLOBAL_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 15:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_ANNOU_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 16:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_POST_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 60:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 17:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_EDIT_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 70:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_E_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 71:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_ES_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 18:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_TOPIC_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 72:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_F_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 73:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_FS_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 19:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_LAST_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 74:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_L_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 75:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_LS_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 20:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_QUOTE_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 80:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_Q_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 21:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_REPLY_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 76:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_R_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 77:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_PREZ_RS_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 22:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$info[2] = (isset($info[4]) && !$acp) ? construct_action_shout($info[2], $info[4]) : $info[2];
			$message = sprintf($user->lang['SHOUT_ROBBERY_ROBOT'], $start_info, $info[0], '<b>'.$info[1].'</b>', $info[2]).$close_tpl;
		break;
		case 23:
			$info[0] = (isset($info[2]) && !$acp) ? construct_action_shout($info[0], $info[2]) : $info[0];
			$message = sprintf($user->lang['SHOUT_LOTTERY_ROBOT'], $start_info, $info[0], $close_tpl, '<b>'.$info[1].'</b>');
		break;
		case 24:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_HANGMAN_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 25:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_HANGMAN_C_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 26:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_TRACKER_ADD_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 27:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_TRACKER_REPLY_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 28:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_TRACKER_EDIT_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 29:
			$info[0] = (isset($info[3]) && !$acp) ? construct_action_shout($info[0], $info[3]) : $info[0];
			$message = sprintf($user->lang['SHOUT_TRACKER_EDIT_P_ROBOT'], $start_info, $info[0], '<a href="'.$info[1].'" title="'.$info[2].'">'.$info[2].'</a>').$close_tpl;
		break;
		case 30:
			$info[0] = (isset($info[1]) && !$acp) ? construct_action_shout($info[0], $info[1]) : $info[0];
			$message = sprintf($user->lang['SHOUT_SUDOKU_ALL_ROBOT'], $start_info, $info[0]).$close_tpl;
		break;
		case 31:
			$info[0] = (isset($info[5]) && !$acp) ? construct_action_shout($info[0], $info[5]) : $info[0];
			$message = sprintf($user->lang['SHOUT_SUDOKU_WIN_ROBOT'], $start_info, $info[0], $close_tpl.'<b>'.$info[1].'</b>'.$open_tpl, $close_tpl.'<b>'.$info[2].'</b>'.$open_tpl, $close_tpl.'<b>'.$info[3].'</b>'.$open_tpl, $close_tpl.'<b>'.$info[4].'</b>'.$open_tpl).$close_tpl;
		break;
		case 32:
			$message = sprintf($user->lang['SHOUT_VERSION_ROBOT'], $start_info, $close_tpl.'<b>'.$info[0].'</b>'.$open_tpl, $close_tpl.'<b>'.$info[1].'</b>'.$open_tpl, '<a href="'.$info[2].'" target="_blanck">').$close_tpl;
		break;
	}
	return $open_tpl.utf8_normalize_nfc($message);
}

/*
* Display infos Robot for purge, delete messages
* and enter in the private shoutbox
*/
function post_robot_shout($user_id, $ip, $priv = false, $purge = false, $robot = false, $auto = false, $delete = false, $deleted = '')
{
	global $config, $db, $user;
	
	$flag_active = (isset($config['flags_version'])) ? true : false;
	$userid 	= (int)$user_id;
	$_priv 		= ($priv) ? '_priv' : '';
	$_Priv 		= ($priv) ? '_PRIV' : '';
	$_table 	= ($priv) ? SHOUTBOX_PRIV_TABLE : SHOUTBOX_TABLE;
	$enter_priv	= ($priv && !$purge && !$robot && !$auto && !$delete) ? true : false;
	$sort_info 	= 1;
	$message 	= '-';
	
	if (!$config['shout_enable_robot'] && !$enter_priv || !$config['shout_enable'] || !isset($config['shout_start']))
	{
		return;
	}
	
	if ($priv && $purge && !$robot && !$auto && !$delete)
	{
		$info = 5;
	}
	else if (!$priv && $purge && !$robot && !$auto && !$delete)
	{
		$info = 6;
	}
	else if (!$priv && $purge && !$robot && $auto && !$delete)
	{
		$message = $deleted;
		$info = 7;
	}
	else if ($priv && $purge && !$robot && $auto && !$delete)
	{
		$message = $deleted;
		$info = 8;
	}
	else if (!$priv && $purge && !$robot && $auto && $delete)
	{
		$message = $deleted;
		$info = 9;
	}
	else if ($priv && $purge && !$robot && $auto && $delete)
	{
		$message = $deleted;
		$info = 10;
	}
	else if ($robot && !$auto && !$delete)
	{
		$info = 4;
	}
	else if ($enter_priv)
	{
		$sql = 'SELECT shout_time
			FROM ' .$_table. " 
			WHERE shout_robot = 8
				AND shout_robot_user = $userid
				AND shout_time BETWEEN " .(time() -120). " AND " .time(); // 120 sec For no enter message if user enter less than 2 minutes ago
		$result = $db->sql_query($sql);
		$is_posted = $db->sql_fetchfield('shout_time');
		$db->sql_freeresult($result);
		if ($is_posted)
		{
			return;
		}
		$url = generate_board_url().'/memberlist.php?mode=viewprofile';
		$message = $flag_active ? get_username_string_flag('shout', $user->data['user_id'], shout_xml($user->data['username']), $user->data['user_colour'], $user->data['user_flag'], false, $url) : get_username_string('full', $user->data['user_id'], shout_xml($user->data['username']), $user->data['user_colour'], false, $url);
		$message = shout_url_free_sid(shout_force_url($message, $userid));
		$sort_info = 8;
		$info = 3;
	}
	
	$sql_data = array(
		'shout_time'				=> time(),
		'shout_user_id'				=> ROBOT,
		'shout_ip'					=> (string)$ip,
		'shout_text'				=> $message,
		'shout_bbcode_uid'			=> '',
		'shout_bbcode_bitfield'		=> '',
		'shout_bbcode_flags'		=> 0,
		'shout_robot'				=> $sort_info,
		'shout_robot_user'			=> $userid,
		'shout_forum'				=> 0,
		'shout_info'				=> $info,
	);
	
	$sql = 'INSERT INTO ' .$_table. ' ' . $db->sql_build_array('INSERT', $sql_data);
	$db->sql_query($sql);
	set_config_count('shout_nr' .$_priv, 1, true);
	return;
}

/*
* Display infos Robot for connections
*/
function post_session_shout($user_id, $ip, $bot = false)
{
	global $config, $db, $user, $auth;
	
	if (!$config['shout_enable_robot'] || !$config['shout_enable'] || $bot && !$config['shout_sessions_bots'] && !$config['shout_sessions_bots_priv'] || !$bot && !$config['shout_sessions'] && !$config['shout_sessions_priv'] || !$bot && !$user->data['user_allow_viewonline'] && $auth->acl_get('u_hideonline') || !isset($config['shout_start']))
	{
		return true;
	}
	
	$userid			= (int)$user_id;
	$is_posted 		= $is_posted_priv = false;
	$flag_active 	= (isset($config['flags_version'])) ? true : false;
	
	if ($bot && $config['shout_sessions_bots'] || !$bot && $config['shout_sessions'])
	{
		$sql = 'SELECT shout_time
			FROM ' . SHOUTBOX_TABLE . " 
			WHERE shout_robot = 1
				AND shout_robot_user = $userid
				AND shout_time BETWEEN " .(time() -300). " AND " .time(); // 5 min For no enter message if user was connect less than 5 minutes before
		$result = $db->sql_query($sql);
		$is_posted = $db->sql_fetchfield('shout_time');
		$db->sql_freeresult($result);
	}
	if ($bot && $config['shout_sessions_bots_priv'] || !$bot && $config['shout_sessions_priv'])
	{
		$sql = 'SELECT shout_time
			FROM ' . SHOUTBOX_PRIV_TABLE . " 
			WHERE shout_robot = 1
				AND shout_robot_user = $userid
				AND shout_time BETWEEN " .(time() -300). " AND " .time(); // 5 min For no enter message if user was connect less than 5 minutes before
		$result = $db->sql_query($sql);
		$is_posted_priv = $db->sql_fetchfield('shout_time');
		$db->sql_freeresult($result);
	}
	
	$url = (!$bot) ? generate_board_url().'/memberlist.php?mode=viewprofile' : false;
	$sort = (!$bot) ? ($flag_active ? 'shout' : 'full') : 'no_profile';
	$message = $flag_active ? get_username_string_flag($sort, $user->data['user_id'], shout_xml($user->data['username']), $user->data['user_colour'], $user->data['user_flag'], false, $url) : get_username_string($sort, $user->data['user_id'], shout_xml($user->data['username']), $user->data['user_colour'], false, $url);
	if (!$bot)
	{
		$message = shout_url_free_sid(shout_force_url($message, $userid));
	}
	$message = $message. '||' .$userid;
	
	$sql_data = array(
		'shout_time'				=> time(),
		'shout_user_id'				=> ROBOT,
		'shout_ip'					=> (string)$ip,
		'shout_text'				=> $message,
		'shout_bbcode_uid'			=> '',
		'shout_bbcode_bitfield'		=> '',
		'shout_bbcode_flags'		=> 0,
		'shout_robot'				=> 1,
		'shout_robot_user'			=> $userid,
		'shout_forum'				=> 0,
		'shout_info'				=> (!$bot) ? 1 : 2,
	);
	
	if (($bot && $config['shout_sessions_bots'] || !$bot && $config['shout_sessions']) && !$is_posted)
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr', 1, true);
	}
	if (($bot && $config['shout_sessions_bots_priv'] || !$bot && $config['shout_sessions_priv']) && !$is_posted_priv)
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_PRIV_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr_priv', 1, true);
	}
	return true;
}

/*
* Display infos Robot for new posts, subjects, topics...
*/
function advert_post_shoutbox($user_id, $ip, $topic_id, $subject, $forum_id, $url, $post_mode, $topic_type, $is_approved = false)
{
	global $db, $user, $config, $sql, $phpbb_root_path, $phpEx;
	
	if (!$config['shout_enable_robot'] || !$config['shout_enable'] || !isset($config['shout_start']))
	{
		return;
	}
	
	$is_prez_form 	= (isset($config['shout_prez_form']) && ($forum_id == $config['shout_prez_form'])) ? true : false;
	$flag_active 	= (isset($config['flags_version'])) ? true : false;
	$ok_shout		= ($config['shout_post_robot']) ? true : false;
	$ok_shout_priv	= ($config['shout_post_robot_priv']) ? true : false;
	$ip				= (string)$ip;
	$userid 		= (int)$user_id;
	$topic_id 		= (int)$topic_id;
	$forum_id 		= (int)$forum_id;
	$topic_poster 	= 0;

	if (!$ok_shout && !$ok_shout_priv)
	{
		return;
	}
	
	// Parse web adress in $subject to prevent bug
	$subject = str_replace(array('http://www.', 'http://', 'www.'), '', $subject);
	// Construct the correct profile url
	$url_user = generate_board_url().'/memberlist.php?mode=viewprofile';
	
	if ($is_prez_form)
	{
		$sql = 'SELECT topic_poster FROM ' . TOPICS_TABLE . " WHERE topic_id = $topic_id";
		$result = $db->sql_query_limit($sql, 1);
		$topic_poster = $db->sql_fetchfield('topic_poster');
		$db->sql_freeresult($result);
	}

	$prez_poster	= ($topic_poster == $userid) ? 1 : 0;
	$username 		= ($userid == ANONYMOUS) ? $user->lang['GUEST'] : (($userid == ROBOT) ? $user->lang['SHOUT_ROBOT'] : $user->data['username']);
	$user_colour 	= ($userid == ROBOT) ? $config['shout_color_robot'] : $user->data['user_colour'];
	$username 		= $flag_active ? get_username_string_flag('shout', $userid, shout_xml($username), $user_colour, $user->data['user_flag'], false, $url_user) : get_username_string('full', $userid, shout_xml($username), $user_colour, false, $url_user);
	$username 		= shout_url_free_sid(shout_force_url($username, $userid));
	$post_mode 		= ($topic_type == 3 && $post_mode == 'post') ? 'global' : ((($topic_type == 2) && ($post_mode == 'post')) ? 'annoucement' : $post_mode);
	$message 		= $username.'||'.shout_url_free_sid($url).'||'.$subject.(($userid != ROBOT && $userid != ANONYMOUS) ? '||'.$userid : '');

	switch ($post_mode)
	{
		case 'global':
			$sort_info = 2;
			$info = 14;
		break;
		case 'annoucement':
			$sort_info = 2;
			$info = 15;
		break;
		case 'post':
			$sort_info = 2;
			$info = (!$is_prez_form) ? 16 : 60;
		break;
		case 'edit':
			if ($is_prez_form)
			{
				switch ($prez_poster)
				{
					case 0:
						$info = 70;
					break;
					case 1:
						$info = 71;
					break;
				}
			}
			else
			{
				$info = 17;
			}
			$ok_shout = ($config['shout_edit_robot']) ? true : false;
			$ok_shout_priv = ($config['shout_edit_robot_priv']) ? true : false;
			$sort_info = 3;
		break;
		case 'edit_topic':
		case 'edit_first_post':
			if ($is_prez_form)
			{
				switch ($prez_poster)
				{
					case 0:
						$info = 72;
					break;
					case 1:
						$info = 73;
					break;
				}
			}
			else
			{
				$info = 18;
			}
			$ok_shout = ($config['shout_edit_robot']) ? true : false;
			$ok_shout_priv = ($config['shout_edit_robot_priv']) ? true : false;
			$sort_info = 3;
		break;
		case 'edit_last_post':
			if ($is_prez_form)
			{
				switch ($prez_poster)
				{
					case 0:
						$info = 74;
					break;
					case 1:
						$info = 75;
					break;
				}
			}
			else
			{
				$info = 19;
			}
			$ok_shout = ($config['shout_edit_robot']) ? true : false;
			$ok_shout_priv = ($config['shout_edit_robot_priv']) ? true : false;
			$sort_info = 3;
		break;
		case 'quote':
			$ok_shout = ($config['shout_rep_robot']) ? true : false;
			$ok_shout_priv = ($config['shout_rep_robot_priv']) ? true : false;
			$sort_info = 3;
			$info = (!$is_prez_form) ? 20 : 80;
		break;
		case 'reply':
			if ($is_prez_form)
			{
				switch ($prez_poster)
				{
					case 0;
						$info = 76;
					break;
					case 1;
						$info = 77;
					break;
				}
			}
			else
			{
				$info = 21;
			}
			$ok_shout = ($config['shout_rep_robot']) ? true : false;
			$ok_shout_priv = ($config['shout_rep_robot_priv']) ? true : false;
			$sort_info = 3;
		break;
		case 'robbery':
			$sql = 'SELECT user_id, username, user_colour FROM ' . USERS_TABLE . " WHERE user_id = $userid";
			$sql = $flag_active ? str_replace('user_colour', 'user_colour, user_flag', $sql) : $sql;
			$result = $db->sql_query_limit($sql, 1);
			$robbery = $db->sql_fetchrow($result);
			$robbery_name = $flag_active ? get_username_string_flag('shout', $robbery['user_id'], shout_xml($robbery['username']), $robbery['user_colour'], $robbery['user_flag'], false, $url_user) : get_username_string('full', $robbery['user_id'], shout_xml($robbery['username']), $robbery['user_colour'], false, $url_user);
			$db->sql_freeresult($result);
			$username = $flag_active ? get_username_string_flag('shout', $user->data['user_id'], shout_xml($user->data['username']), $user->data['user_colour'], $user->data['user_flag'], false, $url_user) : get_username_string('full', $user->data['user_id'], shout_xml($user->data['username']), $user->data['user_colour'], false, $url_user);
			$message = shout_force_url($username, $user->data['user_id']).'||'.$subject.'||'.shout_url_free_sid(shout_force_url($robbery_name, $userid)).'||'.$user->data['user_id'].'||'.$userid;
			$ok_shout = ($config['shout_robbery']) ? true : false;
			$ok_shout_priv = ($config['shout_robbery_priv']) ? true : false;
			$sort_info = 7;
			$info = 22;
		break;
		case 'lottery':
			$sql = 'SELECT user_id, username, user_colour FROM ' . USERS_TABLE . " WHERE user_id = $userid";
			$sql = $flag_active ? str_replace('user_colour', 'user_colour, user_flag', $sql) : $sql;
			$result = $db->sql_query_limit($sql, 1);
			$lottery = $db->sql_fetchrow($result);
			$lottery_name = $flag_active ? get_username_string_flag('shout', $lottery['user_id'], shout_xml($lottery['username']), $lottery['user_colour'], $lottery['user_flag'], $user->lang['GUEST'], $url_user) : get_username_string('full', $lottery['user_id'], shout_xml($lottery['username']), $lottery['user_colour'], $user->lang['GUEST'], $url_user);
			$db->sql_freeresult($result);
			$message = shout_url_free_sid(shout_force_url($lottery_name, $userid)).'||'.$subject.'||'.$userid;
			$ok_shout = ($config['shout_lottery']) ? true : false;
			$ok_shout_priv = ($config['shout_lottery_priv']) ? true : false;
			$sort_info = 7;
			$info = 23;
		break;
		case 'hangman':
			$ok_shout = ($config['shout_hangman']) ? true : false;
			$ok_shout_priv = ($config['shout_hangman_priv']) ? true : false;
			$sort_info = 7;
			$info = 24;
		break;
		case 'hangman_create':
			$ok_shout = ($config['shout_hangman_cr']) ? true : false;
			$ok_shout_priv = ($config['shout_hangman_cr_priv']) ? true : false;
			$sort_info = 7;
			$info = 25;
		break;
	}
	
	if (strpos($message, 'Re: ') !== false)
	{
		$message = str_replace('Re: ', '', $message);
	}
	$message = str_replace(array('./../', './'), generate_board_url().'/', $message);

	$sql_data = array(
		'shout_time'				=> time(),
		'shout_user_id'				=> ROBOT,
		'shout_ip'					=> $ip,
		'shout_text'				=> $message,
		'shout_bbcode_uid'			=> '',
		'shout_bbcode_bitfield'		=> '',
		'shout_bbcode_flags'		=> 0,
		'shout_robot'				=> $sort_info,
		'shout_robot_user'			=> $userid,
		'shout_forum'				=> $forum_id,
		'shout_info'				=> $info,
	);
	
	if ($ok_shout)
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr', 1, true);
	}
	if ($ok_shout_priv)
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_PRIV_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr_priv', 1, true);
	}
	return;
}

/*
* Display info of birthdays
*/
Function birthday_robot_shout($user_id, $username, $user_colour, $age, $user_flag = false)
{
	global $db, $user, $config;
	
	$userid 	= (int)$user_id;
	$url 		= generate_board_url().'/memberlist.php?mode=viewprofile';
	$username 	= $user_flag ? get_username_string_flag('shout', $userid, shout_xml($username), $user_colour, $user_flag, false, $url) : get_username_string('full', $userid, shout_xml($username), $user_colour, false, $url);
	$username 	= shout_url_free_sid(shout_force_url($username, $userid));
	$is_posted	= $is_posted_priv = false;

	$sql_data = array(
		'shout_time'			=> time(),
		'shout_user_id'			=> ROBOT,
		'shout_ip'				=> '0.0.0.0',
		'shout_text'			=> $username.'||'.$age.'||'.$userid,
		'shout_bbcode_uid'		=> '',
		'shout_bbcode_bitfield'	=> '',
		'shout_bbcode_flags'	=> 0,
		'shout_robot'			=> 5,
		'shout_robot_user'		=> $userid,
		'shout_forum'			=> 0,
		'shout_info'			=> 11,
	);
	
	if ($config['shout_birthday'])
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr', 1, true);
	}
	if ($config['shout_birthday_priv'])
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_PRIV_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr_priv', 1, true);
	}
}

function shout_birthday_list()
{
	global $db, $user, $config;
	
	if (!$config['shout_enable_robot'] || !$config['shout_birthday'] && !$config['shout_hello_priv'] || $config['shout_cron_run'] == date('d-m-Y'))
	{
		return;
	}
	
	$is_posted = false;
	if ($config['shout_birthday'])
	{
		$sql = 'SELECT shout_id
			FROM ' . SHOUTBOX_TABLE . " 
			WHERE shout_robot = 5
				AND shout_info = 11
				AND shout_time BETWEEN " .(time() - 60*60). " AND " .time();
		$result = $db->sql_query($sql);
		$is_posted = $db->sql_fetchfield('shout_id') ? true : false;
		$db->sql_freeresult($result);
	}
	else
	{
		$sql = 'SELECT shout_id
			FROM ' . SHOUTBOX_PRIV_TABLE . " 
			WHERE shout_robot = 5
				AND shout_info = 11
				AND shout_time BETWEEN " .(time() - 60*60). " AND " .time();
		$result = $db->sql_query($sql);
		$is_posted = $db->sql_fetchfield('shout_id') ? true : false;
		$db->sql_freeresult($result);
	}
	if ($is_posted)
	{
		return;
	}
	else
	{
		$bd_shout = array();
		$now = getdate(time() + $user->timezone + $user->dst - date('Z'));
		$sql = 'SELECT u.user_id, u.username, u.user_colour, u.user_birthday, u.user_email, u.user_lang, u.user_notify_type, u.user_jabber 
			FROM ' . USERS_TABLE . ' AS u
			LEFT JOIN ' . BANLIST_TABLE . " AS b ON u.user_id = b.ban_userid
			WHERE (b.ban_id IS NULL OR b.ban_exclude = 1)
				AND " .$db->sql_in_set('u.group_id', explode(', ', $config['shout_birthday_exclude']), true, true). "
				AND u.user_birthday LIKE '" . $db->sql_escape(sprintf('%2d-%2d-', $now['mday'], $now['mon'])) . "%'
				AND u.user_type IN (" . USER_NORMAL . ', ' . USER_FOUNDER . ')';
		$sql = (isset($config['flags_version'])) ? str_replace('u.user_colour', 'u.user_colour, u.user_flag', $sql) : $sql;
		$result = $db->sql_query($sql);
		while ($row = $db->sql_fetchrow($result))
		{
			$age = (int)substr($row['user_birthday'], -4);
			$bd_shout[] = array(
				'userid'	=> $row['user_id'],
				'name'		=> $row['username'],
				'colour'	=> $row['user_colour'],
				'age'		=> ($age > 0) ? ($now['year'] - $age) : 0,
				'flag'		=> (isset($config['flags_version'])) ? $row['user_flag'] : false,
			);
		}
		$db->sql_freeresult($result);
		
		if (sizeof($bd_shout))
		{
			foreach ($bd_shout as $pos => $shout)
			{
				birthday_robot_shout($shout['userid'], $shout['name'], $shout['colour'], $shout['age'], $shout['flag']);
			}
		}
	}
	return;
}

/*
* Display the date info Robot
*/
Function hello_robot_shout()
{
	global $user, $db, $config;
	
	if (!$config['shout_enable_robot'] || !$config['shout_hello'] &&  !$config['shout_hello_priv'] || $config['shout_cron_run'] == date('d-m-Y'))
	{
		return;
	}
	
	$is_posted = false;
	if ($config['shout_hello'])
	{
		$sql = 'SELECT shout_id
			FROM ' . SHOUTBOX_TABLE . " 
			WHERE shout_robot = 4
				AND shout_info = 12
				AND shout_time BETWEEN " .(time() - 60*60). " AND " .time();
		$result = $db->sql_query($sql);
		$is_posted = $db->sql_fetchfield('shout_id') ? true : false;
		$db->sql_freeresult($result);
	}
	else
	{
		$sql = 'SELECT shout_id
			FROM ' . SHOUTBOX_PRIV_TABLE . " 
			WHERE shout_robot = 4
				AND shout_info = 12
				AND shout_time BETWEEN " .(time() - 60*60). " AND " .time();
		$result = $db->sql_query($sql);
		$is_posted = $db->sql_fetchfield('shout_id');
		$db->sql_freeresult($result);
	}
	if ($is_posted)
	{
		return;
	}
	else
	{
		$sql_data = array(
			'shout_time'			=> time(),
			'shout_user_id'			=> ROBOT,
			'shout_ip'				=> '0.0.0.0',
			'shout_text'			=> time(). '||' .date('d-m-Y'),
			'shout_bbcode_uid'		=> '',
			'shout_bbcode_bitfield'	=> '',
			'shout_bbcode_flags'	=> 0,
			'shout_robot'			=> 4,
			'shout_robot_user'		=> 0,
			'shout_forum'			=> 0,
			'shout_info'			=> 12,
		);

		if ($config['shout_hello'])
		{
			$sql = 'INSERT INTO ' . SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
			$db->sql_query($sql);
			set_config_count('shout_nr', 1, true);
		}
		if ($config['shout_hello_priv'])
		{
			$sql = 'INSERT INTO ' . SHOUTBOX_PRIV_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
			$db->sql_query($sql);
			set_config_count('shout_nr_priv', 1, true);
		}
	}
	return;
}

/*
* Display info for update
*/
function version_robot_shout()
{
	global $user, $db, $config;
	
	$message = $config['shout_version']. '||' .$config['shout_update']. '||' .$config['shout_update_url'];
	$sql_data = array(
		'shout_time'			=> time(),
		'shout_user_id'			=> ROBOT,
		'shout_ip'				=> '0.0.0.0',
		'shout_text'			=> $message,
		'shout_bbcode_uid'		=> '',
		'shout_bbcode_bitfield'	=> '',
		'shout_bbcode_flags'	=> 0,
		'shout_robot'			=> 0,
		'shout_robot_user'		=> 0,
		'shout_forum'			=> 0,
		'shout_info'			=> 32,
	);
	
	$sql = 'INSERT INTO ' . SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
	$db->sql_query($sql);
	set_config_count('shout_nr', 1, true);
	set_config('shout_version_run', time(), true);
	return;
}

/*
* Display first connection for new users
*/
function shout_add_newest_user($user_id)
{
	global $user, $db, $config;
	
	if (!$config['shout_enable_robot'] || !$config['shout_newest'] && !$config['shout_newest_priv'])
	{
		return true;
	}
	
	$userid 	= (int)$user_id;
	$is_posted 	= $is_posted_priv = false;
	$url 		= generate_board_url().'/memberlist.php?mode=viewprofile';
	$username 	= isset($config['flags_version']) ? get_username_string_flag('shout', $userid, shout_xml($user->data['username']), $user->data['user_colour'], $user->data['user_flag'], false, $url) : get_username_string('full', $userid, shout_xml($user->data['username']), $user->data['user_colour'], false, $url);
	$username 	= shout_url_free_sid(shout_force_url($username, $userid));
	$message 	= $username. '||' .$userid;
	
	$sql_data = array(
		'shout_time'				=> time(),
		'shout_user_id'				=> ROBOT,
		'shout_ip'					=> $user->ip,
		'shout_text'				=> $message,
		'shout_bbcode_uid'			=> '',
		'shout_bbcode_bitfield'		=> '',
		'shout_bbcode_flags'		=> 0,
		'shout_robot'				=> 6,
		'shout_robot_user'			=> $userid,
		'shout_forum'				=> 0,
		'shout_info'				=> 13,
	);
	
	if ($config['shout_newest'])
	{
		$sql = 'SELECT shout_robot_user
			FROM ' . SHOUTBOX_TABLE . " 
			WHERE shout_info = 13
				AND shout_robot_user = $userid";
		$result = $db->sql_query($sql);
		$is_posted = $db->sql_fetchfield('shout_robot_user');
		$db->sql_freeresult($result);
		if (!$is_posted)
		{
			$sql = 'INSERT INTO ' . SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
			$db->sql_query($sql);
			set_config_count('shout_nr', 1, true);
		}
	}
	if ($config['shout_newest_priv'])
	{
		$sql = 'SELECT shout_robot_user
			FROM ' . SHOUTBOX_PRIV_TABLE . " 
			WHERE shout_info = 13
				AND shout_robot_user = $userid";
		$result = $db->sql_query($sql);
		$is_posted_priv = $db->sql_fetchfield('shout_robot_user');
		$db->sql_freeresult($result);
		if (!$is_posted_priv)
		{
			$sql = 'INSERT INTO ' . SHOUTBOX_PRIV_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
			$db->sql_query($sql);
			set_config_count('shout_nr_priv', 1, true);
		}
	}
}

/*
* Display infos Robot from the Mod phpbb_tracker
*/
function tracker_post_shoutbox($user_id, $ip, $mode, $title, $project_id, $ticket_id, $post = false)
{
	global $db, $user, $config, $sql, $phpbb_root_path, $phpEx;
	
	if (!$config['shout_enable_robot'] || !$config['shout_enable_robot'])
	{
		return;
	}
	
	$user->add_lang('mods/shout');
	$flag_active 	= (isset($config['flags_version'])) ? true : false;
	$ip				= (string)$ip;
	$userid 		= (int)$user_id;
	$project_id 	= (int)$project_id;
	$ticket_id 		= (int)$ticket_id;
	$ok_shout		= $ok_priv = false;
	
	if ($post)
	{
		$sql = 'SELECT ticket_title
			FROM ' . TRACKER_TICKETS_TABLE . " 
			WHERE ticket_id = $ticket_id";
		$result = $db->sql_query($sql);
		$title = $db->sql_fetchfield('ticket_title');
		$db->sql_freeresult($result);
	}

	$username 	= ($user_id == ANONYMOUS) ? $user->lang['GUEST'] : (($user_id == ROBOT) ? $user->lang['SHOUT_ROBOT'] : $user->data['username']);
	$user_colour = ($user_id == ROBOT) ? $config['shout_color_robot'] : $user->data['user_colour'];
	$url_user 	= generate_board_url().'/memberlist.php?mode=viewprofile';
	$username 	= $flag_active ? get_username_string_flag('shout', $user_id, shout_xml($username), $user_colour, $user->data['user_flag'], false, $url_user) : get_username_string('full', $user_id, shout_xml($username), $user_colour, false, $url_user);
	$username 	= shout_url_free_sid(shout_force_url($username, $userid));
	$url 		= generate_board_url(). "/tracker.$phpEx?p=$project_id&amp;t=$ticket_id";
	$message 	= $username.'||'.$url.'||'.$title.'||'.$userid;
	switch ($mode)
	{
		case 'add':
			$ok_shout = ($config['shout_tracker']) ? true : false;
			$ok_priv = ($config['shout_tracker_priv']) ? true : false;
			$info = 26;
		break;
		case 'reply':
			$ok_shout = ($config['shout_tracker_rep']) ? true : false;
			$ok_priv = ($config['shout_tracker_rep_priv']) ? true : false;
			$info = 27;
		break;
		case 'edit':
			$ok_shout = ($config['shout_tracker_edit']) ? true : false;
			$ok_priv = ($config['shout_tracker_edit_priv']) ? true : false;
			$info = ($post) ? 29 : 28;
		break;
	}

	$sql_data = array(
		'shout_time'				=> time(),
		'shout_user_id'				=> ROBOT,
		'shout_ip'					=> $ip,
		'shout_text'				=> $message,
		'shout_bbcode_uid'			=> '',
		'shout_bbcode_bitfield'		=> '',
		'shout_bbcode_flags'		=> 0,
		'shout_robot'				=> 7,
		'shout_robot_user'			=> $userid,
		'shout_forum'				=> 0,
		'shout_info'				=> $info,
	);
	
	if ($ok_shout)
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr', 1, true);
	}
	if ($ok_priv)
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_PRIV_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr_priv', 1, true);
	}
	return;
}

function sudoku_post_shoutbox($user_id, $ip, $mode, $type, $name, $num, $level)
{
	global $user, $db, $config;
	
	if (!$config['shout_enable_robot'] || !$config['shout_sudoku'] && !$config['shout_sudoku_priv'])
	{
		return;
	}
	
	$flag_active = (isset($config['flags_version'])) ? true : false;
	$ip			= (string)$ip;
	$userid 	= (int)$user_id;
	$url		= generate_board_url().'/memberlist.php?mode=viewprofile';
	$username 	= $flag_active ? get_username_string_flag('shout', $userid, shout_xml($user->data['username']), $user->data['user_colour'], $user->data['user_flag'], false, $url) : get_username_string('full', $userid, shout_xml($user->data['username']), $user->data['user_colour'], false, $url);
	$username 	= shout_url_free_sid(shout_force_url($username, $userid));
	switch ($mode)
	{
		case 'all':
			$message = $username.'||'.$userid;
			$info = 30;
		break;
		case 'win':
			$message = $username.'||'.$name.'||'.$type.'||'.$level.'||'.$num.'||'.$userid;
			$info = 31;
		break;
	}
	
	$sql_data = array(
		'shout_time'				=> time(),
		'shout_user_id'				=> ROBOT,
		'shout_ip'					=> $ip,
		'shout_text'				=> $message,
		'shout_bbcode_uid'			=> '',
		'shout_bbcode_bitfield'		=> '',
		'shout_bbcode_flags'		=> 0,
		'shout_robot'				=> 7,
		'shout_robot_user'			=> $userid,
		'shout_forum'				=> 0,
		'shout_info'				=> $info,
	);
	
	if ($config['shout_sudoku'])
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr', 1, true);
	}
	if ($config['shout_sudoku_priv'])
	{
		$sql = 'INSERT INTO ' . SHOUTBOX_PRIV_TABLE . ' ' . $db->sql_build_array('INSERT', $sql_data);
		$db->sql_query($sql);
		set_config_count('shout_nr_priv', 1, true);
	}
	return;
}

/*
* Build tables for the select sounds
* in the user shout panel
*/
function build_sound_select($soundlist, $sound_user, $sort, $no = false, $is = false, $styled = false)
{
	global $user, $phpbb_root_path;
	
	$width 	= 150;
	$height = 35;
	$nb_cols = 4;
	$cols 	= $i = 0;
	$larg 	= $width*$nb_cols;
	$styled	= ($styled) ? ' class="styled"' : '';
	$tpl_1	= '<table cellspacing="5" cellpadding="2" border="0" width="' .$larg. '">'."\n";
	$tpl_2	= '<tr style="height:' .$height. 'px;">';
	$tpl_3	= '<td style="width:' .$width. 'px;height:' .$height. 'px;">'."\n";
	$tpl_4	= '<td><label>';
	
	$sort_name 	= $sort.'_sound';
	$sort_span 	= 'sound_'.$sort;
	switch ($sort)
	{
		case 'new':
			$sort_nb = 1;
		break;
		case 'error':
			$sort_nb = 2;
		break;
		case 'del':
			$sort_nb = 3;
		break;
	}
	$is			= ($is == 1) ? ':' : (($is == 2) ? 'A' : '');
	$select_no	= ($sound_user == '0') ? ' checked="checked"' : '';
	$onclick	= ' onclick="displayInfos(' .(($sort == 'error') ? "'info3_no', 'info3'" : (($sort == 'del') ? "'info4_no', 'info4'" : '')). ');play_sound(\'new/discretion.swf\',1,true);"'."\n";
	$select_sound = $tpl_1."\n";
	$select_sound .= ($no) ? $tpl_2.$tpl_4."\n" : '';
	$select_sound .= ($no) ? ' ' .shout_img('woofer.png', 'SHOUT_ANY', 20, 20) : '';
	$select_sound .= ($no) ? ' <input type="radio"' .$styled. ' name="' .$sort_name. '"' .$onclick. ' value="0"' .$select_no. ' /> <strong>' .$user->lang['SHOUT_ANY']. '</strong></label></td></tr>'."\n" : '';
	$select_sound .= $tpl_2."\n";
	$soundlist = array_values($soundlist);
	foreach ($soundlist as $key => $sounds)
	{
		asort($sounds);
		foreach ($sounds as $_sounds)
		{
			if ($nb_cols - $cols == 0)
			{
				$select_sound .= "</tr>\n";
				$select_sound .= $tpl_2."\n";
				$cols = 0;
			}
			$name_sounds = str_replace('.swf', '', $_sounds);
			$selected	= ($_sounds == $sound_user) ? ' checked="checked"' : '';
			$infos_2	= ($sort == 'error' && $no) ? "displayInfos('info3','info3_no');" : (($sort == 'del' && $no) ? "displayInfos('info4','info4_no');" : '');
			$select_sound .= $tpl_3."\n";
			$select_sound .= '<a href="javascript:;" onclick="play_sound(\'' .$sort. '/' .$_sounds. '\',' .$sort_nb. ',true);">' .shout_img('woofer.png', 'SHOUT_SOUND_ECOUTE', 20, 20). '</a>'."\n";
			$select_sound .= '<label><input type="radio"' .$styled. ' id="' .$is.$name_sounds. '" name="' .$sort_name. '" onclick="' .$infos_2. 'changeValue(this.id,\'' .$sort_span. '\');play_sound(\'' .$sort. '/' .$_sounds. '\',' .$sort_nb. ',true);" value="' .$_sounds. '"' .$selected. ' /> ' .$name_sounds. "</label></td>\n";
			$cols++;
			$i++;
		}
	}
	$select_sound .= "</tr></table>\n";
	
	return $select_sound;
}

/*
* Build select for hour
* 24 hours format only
*/
function hour_select($value = '09', $select_name)
{
	$select = '<select id="' .$select_name. '" name="' .$select_name. '">';
	for ($i = 1; $i <= 24; $i++)
	{
		$in = array('1', '2', '3', '4', '5', '6', '7', '8', '9');
		$out = array('01', '02', '03', '04', '05', '06', '07', '08', '09');
		$selected = ($i == $value) ? ' selected="selected"' : '';
		$i = ($i < 10) ? str_replace($in, $out, $i) : $i;
		$select .= '<option value="' .$i. '"' .$selected. '>' .$i. "</option>\n";
	}
	$select .= '</select>';

	return $select;
}

/*
* Build images with traduction
*/
function shout_img($src, $lang, $w = false, $h = false, $another = false, $alt = false)
{
	global $phpbb_root_path, $user;
	
	$alt = (!$alt) ? false : ((isset($user->lang[$alt])) ? $user->lang[$alt] : $alt);
	$lang = (isset($user->lang[$lang])) ? $user->lang[$lang] : $lang;
	$img_src = (!$another) ? generate_board_url().'/images/shoutbox/' : $another;
	$img_src = 'src="' .$img_src.(($src) ? $src : $src). '"';
	$alt 	= ' alt="' .(($alt) ? $alt : $lang). '"';
	$title 	= ' title="' .$lang. '"';
	$width 	= ($w) ? ' width="' .$w. '"' : '';
	$height = ($h) ? ' height="' .$h. '"' : '';
	
	return '<img ' .$img_src.$alt.$title.$width.$height. ' /> ';
}

/*
* Display user avatar with rezising of dimensions
* Add avatar type for robot, users with no avatar and anonymous
* Add title with username
*/
function shout_user_avatar($id, $alt, $avatar, $avatar_type, $avatar_width, $avatar_height, $dimension = false)
{
	global $user, $config, $phpbb_root_path, $phpEx;

	if (!$user->optionget('viewavatars') || !$config['shout_avatar'] || !$config['allow_avatar'])
	{
		return '';
	}
	
	$config['shout_avatar_height'] = $dimension ? $dimension : $config['shout_avatar_height'];
	if ($id == ROBOT && $config['shout_avatar_robot'])
	{
		$avatar_type = AVATAR_ROBOT;
		$avatar_width = $avatar_height = $config['shout_avatar_height'];
		$avatar = generate_board_url().'/images/shoutbox/'.$config['shout_avatar_img_robot'];
		$alt = sprintf($user->lang['SHOUT_AVATAR_TITLE'], $alt);
	}
	else if ($id == ANONYMOUS && $config['shout_avatar_user'])
	{
		$avatar_type = AVATAR_USER;
		$avatar_width = $avatar_height = $config['shout_avatar_height'];
		$avatar = generate_board_url().'/images/shoutbox/anonym.png';
		$alt = sprintf($user->lang['SHOUT_AVATAR_TITLE'], $alt);
	}
	else if ($avatar)
	{
		$alt = sprintf($user->lang['SHOUT_AVATAR_TITLE'], $alt);
	}
	else if (!$avatar && $config['shout_avatar_user'])
	{
		$avatar_type = AVATAR_USER;
		$avatar_width = $avatar_height = $config['shout_avatar_height'];
		$avatar = generate_board_url(). '/images/shoutbox/' .$config['shout_avatar_img'];
		$alt = sprintf($user->lang['SHOUT_AVATAR_NONE'], $alt);
	}
	else
	{
		return '';
	}
	
	$width = $config['shout_avatar_height'];
	$is_big = ($avatar_width > $width && $avatar_height > $width) ? true : false;
	if ($avatar_width == $avatar_height && $is_big)
	{
		$avatar_width = $width;
		$avatar_height = $width;
	}
	else if ($is_big)
	{
		$avatar_width = round($avatar_width/($avatar_height/$width));
		$avatar_height = $width;
	}

	$avatar_img = '';
	switch ($avatar_type)
	{
		case AVATAR_UPLOAD:
			if (!$config['allow_avatar_upload'])
			{
				return '';
			}
			$avatar_img = generate_board_url(). "/download/file.$phpEx?avatar=";
		break;
		case AVATAR_GALLERY:
			if (!$config['allow_avatar_local'])
			{
				return '';
			}
			$avatar_img = generate_board_url().'/'.$config['avatar_gallery_path'].'/';
		break;
		case AVATAR_ROBOT:
			if (!$config['shout_avatar_robot'])
			{
				return '';
			}
		break;
		case AVATAR_USER:
			if (!$config['shout_avatar_user'])
			{
				return '';
			}
		break;
		case AVATAR_REMOTE:
			if (!$config['allow_avatar_remote'])
			{
				return '';
			}
		break;
	}
	$avatar_img .= $avatar;
	return shout_img('', $alt, $avatar_width, $avatar_height, str_replace(' ', '%20', $avatar_img), 'SHOUT_AVATAR_SHORT');
}

/*
* Extract the users online
* Based on obtain_users_online()
* but only on the latest minute
*/
function obtain_users_online_shout()
{
	global $db, $config, $user;

	$online_users = array(
		'online_users'			=> array(),
		'hidden_users'			=> array(),
		'total_online'			=> 0,
		'visible_online'		=> 0,
		'hidden_online'			=> 0,
		'guests_online'			=> 0,
	);

	if ($config['load_online_guests'])
	{
		$online_users['guests_online'] = obtain_guest_count();
	}

	// a little discrete magic to cache this for 30 seconds
	$time = (time() - 60);
	$sql = 'SELECT s.session_user_id, s.session_ip, s.session_viewonline
		FROM ' . SESSIONS_TABLE . ' s
		WHERE s.session_time >= ' . ($time - ((int)($time % 30))) . ' 
			AND s.session_user_id <> ' . ANONYMOUS;
	$result = $db->sql_query($sql);
	while ($row = $db->sql_fetchrow($result))
	{
		// Skip multiple sessions for one user
		if (!isset($online_users['online_users'][$row['session_user_id']]))
		{
			$online_users['online_users'][$row['session_user_id']] = (int)$row['session_user_id'];
			if ($row['session_viewonline'])
			{
				$online_users['visible_online']++;
			}
			else
			{
				$online_users['hidden_users'][$row['session_user_id']] = (int)$row['session_user_id'];
				$online_users['hidden_online']++;
			}
		}
	}
	$online_users['total_online'] = $online_users['guests_online'] + $online_users['visible_online'] + $online_users['hidden_online'];
	$db->sql_freeresult($result);

	return $online_users;
}

?>
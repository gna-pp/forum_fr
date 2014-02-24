<?php
/**
* Database auth plug-in for phpBB3
*
* Authentication plug-ins is largely down to Sergey Kanareykin, our thanks to him.
*
* This is for authentication via the integrated user table
*
* @package login
* @version $Id: auth_db.php 10143 2009-09-15 09:08:37Z Kellanved $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Login function
*/
function login_db_migrate_punbb(&$username, &$password)
{
	global $db, $config;

	// do not allow empty password
	if (!$password)
	{
		return array(
			'status'	=> LOGIN_ERROR_PASSWORD,
			'error_msg'	=> 'NO_PASSWORD_SUPPLIED',
			'user_row'	=> array('user_id' => ANONYMOUS),
		);
	}

	if (!$username)
	{
		return array(
			'status'	=> LOGIN_ERROR_USERNAME,
			'error_msg'	=> 'LOGIN_ERROR_USERNAME',
			'user_row'	=> array('user_id' => ANONYMOUS),
		);
	}

	$sql = 'SELECT user_id, username, user_password, user_passchg, user_pass_convert, user_email, user_type, user_login_attempts
		FROM ' . USERS_TABLE . "
		WHERE username_clean = '" . $db->sql_escape(utf8_clean_string($username)) . "'";
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);

	if (!$row)
	{
		return array(
			'status'	=> LOGIN_ERROR_USERNAME,
			'error_msg'	=> 'LOGIN_ERROR_USERNAME',
			'user_row'	=> array('user_id' => ANONYMOUS),
		);
	}

	// If there are too much login attempts, we need to check for an confirm image
	// Every auth module is able to define what to do by itself...
	if ($config['max_login_attempts'] && $row['user_login_attempts'] >= $config['max_login_attempts'])
	{
		// Visual Confirmation handling

		$captcha =& phpbb_captcha_factory::get_instance($config['captcha_plugin']);
		$captcha->init(CONFIRM_LOGIN);
		$vc_response = $captcha->validate();
		if ($vc_response)
		{
			return array(
				'status'		=> LOGIN_ERROR_ATTEMPTS,
				'error_msg'		=> 'LOGIN_ERROR_ATTEMPTS',
				'user_row'		=> $row,
			);
		}
		
	}

	// If the password convert flag is set we need to convert it
	if ($row['user_pass_convert'])
	{
		$punbb_auth = punbb_check_auth($username, $password);
		
		if ($punbb_auth)
		{
			$hash = phpbb_hash($password);

			// Update the password in the users table to the new format and remove user_pass_convert flag
			$sql = 'UPDATE ' . USERS_TABLE . '
				SET user_password = \'' . $db->sql_escape($hash) . '\',
					user_pass_convert = 0
				WHERE user_id = ' . $row['user_id'];
			$db->sql_query($sql);

			$row['user_pass_convert'] = 0;
			$row['user_password'] = $hash;
		}
		else
		{
			// Punbb authentication failed : we have to
			// increase login attempt count to make sure this cannot be exploited
			$sql = 'UPDATE ' . USERS_TABLE . '
				SET user_login_attempts = user_login_attempts + 1
				WHERE user_id = ' . $row['user_id'];
			$db->sql_query($sql);

			return array(
				'status'		=> LOGIN_ERROR_PASSWORD,
				'error_msg'		=> 'LOGIN_ERROR_PASSWORD',
				'user_row'		=> $row,
			);
		}
	}

	// Check password ...
	if (!$row['user_pass_convert'] && phpbb_check_hash($password, $row['user_password']))
	{
		// Check for old password hash...
		if (strlen($row['user_password']) == 32)
		{
			$hash = phpbb_hash($password);

			// Update the password in the users table to the new format
			$sql = 'UPDATE ' . USERS_TABLE . "
				SET user_password = '" . $db->sql_escape($hash) . "',
					user_pass_convert = 0
				WHERE user_id = {$row['user_id']}";
			$db->sql_query($sql);

			$row['user_password'] = $hash;
		}

		if ($row['user_login_attempts'] != 0)
		{
			// Successful, reset login attempts (the user passed all stages)
			$sql = 'UPDATE ' . USERS_TABLE . '
				SET user_login_attempts = 0
				WHERE user_id = ' . $row['user_id'];
			$db->sql_query($sql);
		}

		// User inactive...
		if ($row['user_type'] == USER_INACTIVE || $row['user_type'] == USER_IGNORE)
		{
			return array(
				'status'		=> LOGIN_ERROR_ACTIVE,
				'error_msg'		=> 'ACTIVE_ERROR',
				'user_row'		=> $row,
			);
		}

		// Successful login... set user_login_attempts to zero...
		return array(
			'status'		=> LOGIN_SUCCESS,
			'error_msg'		=> false,
			'user_row'		=> $row,
		);
	}

	// Password incorrect - increase login attempts
	$sql = 'UPDATE ' . USERS_TABLE . '
		SET user_login_attempts = user_login_attempts + 1
		WHERE user_id = ' . $row['user_id'];
	$db->sql_query($sql);

	// Give status about wrong password...
	return array(
		'status'		=> LOGIN_ERROR_PASSWORD,
		'error_msg'		=> 'LOGIN_ERROR_PASSWORD',
		'user_row'		=> $row,
	);
}

/**
 * PunBB authentication
 * @param string $username
 * @param string $password
 * @return bool True if user is authenticated, false otherwise
 */
function punbb_check_auth($username, $password) {
	global $db;

	// Config
	$punBB_prefix = 'puntemp';
	$punBB_db_type = 'mySql';
	
	$cleanUsername = $db->sql_escape(utf8_clean_string($username));
	
	$username_sql = ($punBB_db_type == 'mysql' || $punBB_db_type == 'mysqli') ? 'username=\''. $cleanUsername . '\'' : 'LOWER(username)=LOWER(\'' . $cleanUsername . '\')';
	
	$sql = 'SELECT id, password FROM ' . $punBB_prefix . 'users WHERE ' . $username_sql;
	
	$result = $db->sql_query($sql);
	$row = $db->sql_fetchrow($result);
	$db->sql_freeresult($result);
	
	$user_id = $row['id'];
	$db_password_hash = $row['password'];
	
	$authorized = false;

	if (!empty($db_password_hash))
	{
		$sha1_in_db = (strlen($db_password_hash) == 40) ? true : false;
		$sha1_available = (function_exists('sha1') || function_exists('mhash')) ? true : false;

		$form_password_hash = pun_hash($password);	// This could result in either an SHA-1 or an MD5 hash (depends on $sha1_available)

		if ($sha1_in_db && $sha1_available && $db_password_hash == $form_password_hash)
		{
			$authorized = true;
		}
		else if (!$sha1_in_db && $db_password_hash == md5($form_password))
		{
			$authorized = true;
		}
	}
	
	return $authorized;
}

/**
 * This function comes from the punBB code source
 * Compute a hash of $str
 * Uses sha1() if available. If not, SHA1 through mhash() if available. If not, fall back on md5().
 */
function pun_hash($str)
{
	if (function_exists('sha1'))	// Only in PHP 4.3.0+
		return sha1($str);
	else if (function_exists('mhash'))	// Only if Mhash library is loaded
		return bin2hex(mhash(MHASH_SHA1, $str));
	else
		return md5($str);
}

?>

<?php
/**
*
* @author Ombre
* @package phpBB3
* @version $Id: functions_docs.php, v0.0.1 2010/01/02 12:10:45 Dakin Quelia Exp $
* @copyright (c) 2010 http://www.partipirate.org
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/functions_display.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup();

page_header($user->lang['PAGE_AG'], false);

if (!$user->data['is_registered'])
{
    if ($user->data['is_bot'])
    {
        redirect(append_sid($phpbb_root_path . "index." . $phpEx));
    }

    login_box('', $user->lang['LOGIN_EXPLAIN_UCP']);
}      

$template->set_filenames(array(
	'body' => 'pageag_body.html')
);

page_footer();

?>

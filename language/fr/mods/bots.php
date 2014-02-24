<?php
/**
*This Is the Language for the 100+ Bot Install Script Mod by T50.
*Version 1.0.0
*
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


$lang = array_merge($lang, array(
    'NO_GROUP_ID'     => 'Erreur, pas de group_id',
    'NO_ADMIN'        => 'La page que vous demandez n\'est pas disponible.',
	'BOTS_ADDED'   	  => '109 robots ont été ajoutés à votre forum',
));

?>
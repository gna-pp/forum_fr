<?php
/**
*
* Static Pages MOD language file
*
* @version $Id$
* @copyright (c) 2009 Vojtěch Vondra
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

$lang = array_merge($lang, array(
	// Front-end keys
	'PAGE_ID_INVALID'			=> "La page sélectionnée n'existe pas.",
	'PAGE_NOT_FOUND'			=> "La page sélectionnée n'a pas été trouvée.",
	
	// ACP keys
	'ACP_MANAGE_PAGES' => "Gérer les pages",
	'ACP_PAGES' => "Pages",
	'ACP_PAGES_EXPLAIN' => "Vous pouvez ajouter et modifier des pages statiques.",
	'ADD_PAGE' => "Ajouter une page",
	'GO_TO_PAGE' => "Voir la page",
	'MUST_SELECT_PAGE' => "Vous devez selectionner une page",
	'NO_PAGE_DESC' => "Vous n'avez pas entré la description de la page.",
	'NO_PAGE_TITLE' => "Vous n'avez pas entré le titre de la page.",
	'NO_PAGE_CONTENT' => "Vous n'avez pas entré le contenu de la page.",
	'PAGE'     => "Page",
	'PAGES'     => "Pages",
	'PAGE_ADDED' => "La page a bien été ajoutée.",
	'PAGE_AUTHOR' => "Auteur de la page",
	'PAGE_CONTENT' => "Contenu de la page",
	'PAGE_DESC' => "Description",
	'PAGE_DESC_EXPLAIN' => "Description succincte du votre page",
	'PAGE_DISPLAY' => "Visibilité",
	'PAGE_DISPLAY_EXPLAIN' => "Si Non, la page ne ​​sera pas accessible au public. Seuls les Admins et modérateurs pourront accéder à la page.",
	'PAGE_DISPLAY_GUESTS' => "Afficher la page pour les visiteurs",
	'PAGE_DISPLAY_GUESTS_EXPLAIN' => "Si la valeur Non, seuls les utilisateurs enregistrés pourront voir la page.",
	'PAGE_HIDDEN' => "Cette page est cachée, seuls les modérateurs et les administrateurs peuvent la voir. Vous pouvez l'activer dans l'ACP.",
	'PAGE_LINK' => "Lien de la page",
	'PAGE_MAKE_HIDDEN' => "Cacher",
	'PAGE_MAKE_VISIBLE' => "Rendre visible",
	'PAGE_NOT_VISIBLE' => "La page sélectionnée est maintenant caché à la vue du public.",
	'PAGE_ORDER' => "Ordre des pages",
	'PAGE_ORDER_EXPLAIN' => "Si une liste de pages est affiché, vous pouvez définir l'ordre des pages en fixant un certain nombre ici, les pages seront triées par ordre croissant.",
	'PAGE_TITLE' => "Titre de la page",
	'PAGE_UPDATED' => "La page a bien été mise à jour.",
	'PAGE_URL' => "Identification de l'URL",
	'PAGE_URL_EXPLAIN' => "URL pour accéder à la page, utiliser des lettres minuscules, des chiffres et des traits d'union. Si non renseigné, le système générera un lien auomatiquement.",
	'PAGE_VISIBLE' => "La page sélectionnée est maintenant visible.",
	'STATIC_PAGES_MOD_UPDATED' => "<strong>Static page MOD updated to version » %s</strong>",
	'STATIC_PAGES_MOD_INSTALLED' => "<strong>Static page MOD was installed - MOD version » %s</strong>",
	
	// Log messages
	'LOG_PAGE_ADDED'	=> "<strong>Page statique ajouté</strong><br />» %s",
	'LOG_PAGE_UPDATED'	=> "<strong>Page statique mise à jour</strong><br />» %s",
	'LOG_PAGE_REMOVED'	=> "<strong>Page statique supprimé</strong><br />» %s",
	
	// Manage pages permission
	'acl_a_manage_pages'			=> array('lang' => "Peut créer, modifier et supprimer des pages statiques", 'cat' => 'misc'),
));
?>

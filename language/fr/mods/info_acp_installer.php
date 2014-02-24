<?php
/**
*
* Install Module ♣ Breizh installer [French]
*
* @package language
* @version $Id: acp_info_installer.php 120 16:15 16/12/2011 Sylver35 Exp $
* @copyright (c) 2010, 2011 Breizh Portal  http://breizh-portal.com
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

$lang = array_merge($lang, array(
	'INSTALL_TITLE'					=> 'Breizh Installer',
	'INSTALL_INSTALLER'				=> 'Breizh Installer v1.2.0 © 2010, 2011', // Titre de l'installeur
	'INSTALL_WELCOME_TEXT'			=> 'Bienvenue dans l’installation de %s',
	'INSTALL_WELCOME_TITLE'			=> '%s&nbsp;&nbsp;Installation du Mod %s', // Permet d'inclure une image
	'INSTALL_PAGE_TITLE'			=> 'Installation du Mod %s',
	'INSTALL_ETAT'					=> 'État de l’installation:',
	'INSTALL_ETAT_INFO'				=> '<strong>Explications</strong>: %s <span style="color:red;">Opérations restant à faire</span>&nbsp;&nbsp;-&nbsp;&nbsp;%s <span style="color:green;">Opérations terminées</span>',
	'INSTALL_NO_EXIST'				=> 'Le mode spécifié n’existe pas',
	'INSTALL_RELOAD'				=> 'Essayer à nouveau',
	'INSTALL_CONTINUE'				=> 'Passer à l’étape suivante',
	'INSTALL_GO_INDEX'				=> 'Aller à l’index',
	'INSTALL_GO_ON'					=> 'Installer le Mod',
	'INSTALL_UPDATE'				=> 'Mettre à jour le Mod',
	'INSTALL_METHOD'				=> 'Méthode d’installation',
	'INSTALL_METHOD_ALL'			=> 'Installation avec tous les détails',
	'INSTALL_METHOD_FAST'			=> 'Installation rapide sans les détails',
	'INSTALL_GO'					=> 'Envoyer',
	'INSTALL_ACCEPT'				=> 'Valider',
	'INSTALL_ERROR' 				=> 'Erreur: ',
	'INSTALL_PROSILVER'				=> 'prosilver',
	'INSTALL_SUBSILVER'				=> 'subsilver2',
	'INSTALL_BUTTON_DEL'			=> 'Supprimer le Mod',
	'INSTALL_LOG_TITLE'				=> 'Détails des actions faites',
	'INSTALL_TERMS_EN'				=> 'Afficher la licence originale en langue Anglaise',
	'INSTALL_TERMS_FR'				=> 'Afficher la licence en langue Française',
	'INSTALL_NO_PATH'				=> 'Le dossier <b>“ %s ”</b> est absent.<br />',
	'INSTALL_NO_FILE'				=> 'Le fichier <b>“ %s ”</b> est absent.<br />',
	'INSTALL_PROGRESS'				=> 'Le script exécute actuellement les actions demandées...',
	'INSTALL_NO_ERRORS'				=> 'Les fichiers additionnels du mod <strong>sont tous</strong> présents: ',
	'INSTALL_IS_ERRORS'				=> 'Les fichiers additionnels du mod <strong>ne sont pas tous</strong> présents: ',
	'INSTALL_ENTER_CONFIG'			=> '» Ajouts dans la table config:&nbsp;&nbsp;',
	'INSTALL_TABLES'				=> '» Ajout de la table %s:&nbsp;&nbsp;',
	'INSTALL_ALTER_TABLES'			=> '» Modifications de la table %s:&nbsp;&nbsp;',
	'INSTALL_MODULES'				=> '» Création et activation des modules %s:&nbsp;&nbsp;',
	'INSTALL_AUTH'					=> '» Ajout et activation des permissions admins et utilisateurs: ',
	'INSTALL_TABLE_UNDEFINED'		=> 'La table “<strong>%s</strong>” n’est pas définie dans le fichier includes/constants.php<br /><br />Veuillez revoir <strong>toutes</strong> les instructions données dans le fichier install.xml<br />',
	'INSTALL_CONSTANT_UNDEFINED'	=> 'La constante “<strong>%s</strong>” n’est pas définie dans le fichier includes/constants.php<br /><br />Veuillez revoir <strong>toutes</strong> les instructions données dans le fichier install.xml<br />',
	'INSTALL_DEL_ERROR'				=> 'Pour pouvoir poursuivre l’installation, vous devez tout d’abord supprimer ces erreurs.',
	'INSTALL_FIRST_UNINSTAL'		=> '<br />» Par contre, %1$s a déjà été supprimé %2$s fois.',
	'INSTALL_FIRST_NONE'			=> 'Vous n’avez pas de version de ce Mod actuellement présente sur ce forum.%s<br /><br />» Le script va procéder au premier montage du Mod.',
	'INSTALL_FIRST_YES'				=> 'Vous avez déjà la version %1$s de ce Mod actuellement présente sur ce forum.%2$s<br /><br />» Vous avez deux possibilités:<br /><br />1). Mettre à jour le Mod. Seules les modifications pour la nouvelle version sont faites, vous conservez les réglages et permissions actuelles.<br />2). Supprimer d’abord le Mod. Vous repartez alors avec les réglages par défaut de la nouvelle version, les permissions sont réécrites.',
	'INSTALL_FIRST_CUR'				=> 'Vous avez la version courante de ce Mod actuellement présente sur ce forum.<br /><br />» Vous pouvez choisir de le supprimer soit définitivement, soit pour refaire l’installation si un problème est survenu dans la base de données.
										<br />Attention, cette action est <strong>irréversible</strong> et supprimera%s les modules ACP, ainsi que les réglages et les permissions actuelles.<br />Les réglages et permissions seront alors ceux par défaut comme à la première Installation du Mod.',
	'INSTALL_INFO_IDENTIQUE'		=> 'Le style que vous utilisez actuellement est celui par défaut.',
	'INSTALL_INFO_DIFFERENT'		=> 'Le style que vous utilisez actuellement n’est pas celui par défaut.<br />Assurez vous d’avoir fait les modifications pour tous les styles actifs avant d’utiliser ce script d’install.',
	'INSTALL_INFO_MESSAGE'			=> '<strong>Infos</strong>: %s',
	'INSTALL_INFO_SUB_XML'			=> ' Voir subsilver2.xml',
	'INSTALL_INFO_STYLE'			=> 'Le style utilisé: <strong>%1$s</strong> est de base <strong>%2$s</strong>. Assurez vous d’avoir bien fait les modifications données pour <strong>%2$s</strong>.%3$s',
	'INSTALL_THEME_ERROR'			=> '<strong>Erreur</strong>: le fichier %1$s a été détecté dans le dossier styles/<strong>%2$s</strong>/theme/ alors que le style est de base subsilver2. Revérifiez la totalité des modifications des fichiers du style <strong>%2$s</strong> dans subsilver2.xml.',
	'INSTALL_CHECK_TITLE'			=> 'Vérification des fichiers',
	'INSTALL_CHECK_TABLES_TITLE'	=> 'Modifications de la base de données',
	'INSTALL_CHECK_MODUL_TITLE'		=> 'Ajout des modules %s',
	'INSTALL_CHECK_AUTH_TITLE'		=> 'Ajout des permissions du Mod',
	'INSTALL_CHECK_END_TITLE'		=> 'Finalisation de l’installation',
	'INSTALL_CHECK_FINISH_TITLE'	=> 'Le Mod %s est installé',
	'INSTALL_CHECK_DELETE_TITLE'	=> 'Désinstallation de %s',
	'INSTALL_CHECK_MESSAGE'			=> 'Le script va maintenant vérifier la présence des fichiers additionnels du Mod.',
	'INSTALL_CHECK_TABLES'			=> 'Le script va maintenant installer la table %s dans la base de données.',
	'INSTALL_CHECK_CONFIG'			=> 'Le script va maintenant ajouter les éléments de configuration dans la table config.',
	'INSTALL_CHECK_USERS'			=> 'Le script va maintenant modifier la table users.',
	'INSTALL_CHECK_MODULES'			=> 'Le script va maintenant ajouter les modules %s du mod dans la base de données.',
	'INSTALL_CHECK_AUTH'			=> 'Le script va maintenant ajouter les permissions administrateurs et utilisateurs dans la base de données.',
	'INSTALL_CHECK_END'				=> 'Le script va maintenant finaliser l’installation du Mod.',
	'INSTALL_CHECK_DELETE_MESSAGE'	=> 'Le script va maintenant supprimer toutes les entrées spéciales au Mod dans la base de données.<br /><strong>Attention</strong>, cette action est irréversible.<br />Êtes vous certain de vouloir faire cela?',
	'INSTALL_CHECK_FINISH'			=> '<strong>Félicitation!</strong><br /><br />Vous avez terminé l’installation de %1$s<br />Vous pouvez vous rendre dans l’ACP, onglet permissions pour régler les permissions des utilisateurs à votre convenance.<br />Rendez vous également dans l’onglet Breizh Shoutbox pour régler tous les différents points de configuration de la shoutbox.',
	'INSTALL_LICENSE'				=> 'Licence GNU GPL',
	'INSTALL_TERMS'					=> 'Vous devez lire la présente licence GNU GPL V2 et en accepter les termes pour pouvoir installer le Mod %s.',
	'INSTALL_ACCEPT_TERMS'			=> 'J’accepte les termes de la licence GNU GPL V2',
	'INSTALL_NO_ACCEPT'				=> 'Je n’accepte pas',
	'INSTALL_NO_ACCEPT_END'			=> 'Vous n’acceptez pas les conditions de la licence GNU GPL V2 pour le Mod %s.<br /><br />Veuillez alors supprimer toutes les modifications apportées aux fichiers d’origine et effacer tous les fichiers additionnels du Mod.',
	'INSTALL_BREIZH'				=> '<em style="font-size:10px;">Installation assurée par Breizh Installer © 2010, 2011</em>',
	'INSTALL_CHECK_NO_TITLE'		=> 'Le Mod %1$s n’est pas installé sur ce forum.',
	'INSTALL_CHECK_INSTALL_TITLE'	=> '► Pour installer le Mod, <a href="%s" title="Pour installer le Mod">cliquez ici</a>',
	'INSTALL_CHECK_UPDATE_TITLE'	=> '► Pour mettre à jour le Mod, <a href="%s" title="Pour mettre à jour le Mod">cliquez ici</a>',
	'INSTALL_NO_ADMIN'				=> '► Vous ne disposez pas des droits d’administration et ne pouvez pas accéder à ces ressources...', // Pour les non admins
	'INSTALL_FINISH_MESSAGE'		=> '► Attention, si vous avez besoin de dépannage ou de renseignements, visitez <a href="http://breizh-portal.com/index.html" title="Breizh Portal - The Breizh Touch">Breizh Portal</a>. Le support ne sera assuré <strong>que</strong> sur ce site.<br />Retrouvez également nos autres Mods exclusifs.
										<br />Pensez à faire un don pour soutenir la continuité du support et du développement, merci.<br /><br />► Pour finaliser l’installation et pour raisons de sécurité, vous <strong>devez</strong> supprimer dès à présent le dossier install/ de votre ftp.<br />',
	'INSTALL_PROGRESS'				=> 'Le script exécute actuellement les actions demandées...',
	'INSTALL_TABLE_UNDEFINED'		=> 'Erreur: La table “<strong>%s</strong>” n’est pas définie dans le fichier includes/constants.php<br /><br />Veuillez revoir <strong>toutes</strong> les instructions données dans le fichier install.xml<br />',
	'UNINSTALL_ERRORS_MOD'			=> 'Vous Pouvez supprimer les entrées du Mod %1$s v%2$s de la base de données <a href="%3$s" title="Pour supprimer le mod %1$s v%2$s">en cliquant ici</a>',
	'INSTALL_MOD_UNINSTALED'		=> 'Le mod %1$s est maintenant supprimé de la base de données...<br /><br />► <a href="%2$s">Retour au fichier d’installation</a><br /><br />► <a href="%3$s">Retour à l’index du forum</a>',
	
	'LOG_INSTALL_AUTH'				=> '<strong>Ajout d’une nouvelle permission</strong> » %s',
	'LOG_INSTALL_AUTH_ADM'			=> '<strong>Ajout d’une nouvelle permission administrateur</strong> » %s',
	'LOG_INSTALL_AUTH_ADDED'		=> '<strong>Installation et activation des permissions pour %s</strong>',
	'LOG_INSTALL_AUTH_DEL'			=> '<strong>Suppression d’une permission</strong><br />» “%s”',
	'LOG_INSTALL_AUTH_DEL_ALL'		=> '<strong>Suppression des permissions d’un mod</strong><br />» “%s” mod “%s”',
	'LOG_INSTALL_TABLE_ADD'			=> '<strong>Ajout d’une table dans la base de données</strong><br />» “%s”',
	'LOG_INSTALL_TABLE_DEL'			=> '<strong>Suppression d’une table dans la base de données</strong><br />» “%s”',
	'LOG_INSTALL_MODULE_ADD'		=> '<strong>Création et activation d’un module %1$s</strong><br />» “%2$s”',
	'LOG_INSTALL_MODULE_EDIT'		=> '<strong>Édition d’un module %1$s</strong><br />» “%2$s”',
	'LOG_INSTALL_MODULE_DEL'		=> '<strong>Suppression d’un module %1$s</strong><br />» “%2$s”',
	'LOG_INSTALL_MOD_ADD'			=> '<strong>Installation d’un nouveau Mod</strong><br />» %s',
	'LOG_INSTALL_MOD_UPDATE'		=> '<strong>Mise à jour d’un Mod</strong><br />» %s',
	'LOG_INSTALL_MOD_DELETE'		=> '<strong>Suppression du Mod %s.</strong>',
	'LOG_INSTALL_CONFIG_ADD'		=> '<strong>Ajout d’un point de configuration</strong><br />» “%s”',
	'LOG_INSTALL_CONFIG_UDP'		=> '<strong>Mise à jour d’un point de configuration</strong><br />» “%s”',
	'LOG_INSTALL_CONFIG_DEL'		=> '<strong>Suppression d’un point de configuration</strong><br />» “%s”',
	'LOG_INSTALL_ALTER_NO'			=> '<strong>Aucune action effectuée dans la base de données.</strong>',
	'LOG_INSTALL_ALTER_CONFIG_NO'	=> '<strong>Aucune action effectuée dans la tables config.</strong>',
	'LOG_INSTALL_ALTER_MOD_NO'		=> '<strong>Aucune action effectuée dans les modules ACP.</strong>',
	'LOG_INSTALL_ALTER_AUTH_NO'		=> '<strong>Aucune action effectuée dans les permissions.</strong>',
	'LOG_INSTALL_COLUMN_ADD'		=> '<strong>Ajout d’une colonne dans une table</strong> » %1$s dans %2$s',
	'LOG_INSTALL_COLUMN_DEL'		=> '<strong>Suppression d’une colonne dans une table</strong> » %1$s dans %2$s',
	'LOG_INSTALL_COLUMN_EDIT'		=> '<strong>Modification d’une colonne dans une table</strong> » %1$s dans %2$s',
	'LOG_INSTALL_CHECK_OK'			=> '<strong>Vérification de la présence des fichiers du Mod %s</strong> » Réussite!',
	'LOG_INSTALL_CHECK_NO'			=> '<strong>Vérification de la présence des fichiers du Mod %s</strong> » Échec...',
	'LOG_INSTALL_ALTER_END_NO'		=> '<strong>Le Mod %s est déjà installé.</strong>',
	'LOG_INSTALL_UPDATE_CONFIG'		=> '<strong>Mise à jour de la table config</strong>',
));

?>
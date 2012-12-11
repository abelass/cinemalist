<?php
/**
 * Plugin Signaler des abus
 * (c) 2012 My Chacra
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Fonction d'installation du plugin et de mise à jour.
 * Vous pouvez :
 * - créer la structure SQL,
 * - insérer du pre-contenu,
 * - installer des valeurs de configuration,
 * - mettre à jour la structure SQL 
**/
function cinemalist_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();


	$maj['create'] = array(array('maj_tables', array('
	   spip_films,
	   spip_realisateurs,
	   spip_acteurs,
	   spip_scenaristes')));
       
     $maj['0.2.7'] = array(
        array('maj_tables', array('spip_films')),
        array('sql_updateq','spip_films',array('statut' => 'publie'))
        );

     $maj['0.2.9'] = array(
       array('sql_alter','TABLE spip_films CHANGE sortie_be sortie_be date NOT NULL'),
       array('sql_alter','TABLE spip_films CHANGE sortie_fr sortie_fr date NOT NULL'),       
        );

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin.
 * Vous devez :
 * - nettoyer toutes les données ajoutées par le plugin et son utilisation
 * - supprimer les tables et les champs créés par le plugin. 
**/
function cinemalist_vider_tables($nom_meta_base_version) {


	sql_drop_table("
	   spip_films,
	   spip_realisateurs,
	   spip_acteurs,
	   spip_scenaristes");

    # Nettoyer les versionnages et forums
    sql_delete("spip_versions",              sql_in("objet", array('film', 'acteur', 'realisateur', 'scenariste')));
    sql_delete("spip_versions_fragments",    sql_in("objet", array('film', 'acteur', 'realisateur', 'scenariste')));
    sql_delete("spip_forum",                 sql_in("objet", array('film', 'acteur', 'realisateur', 'scenariste')));
    
	effacer_meta($nom_meta_base_version);
}

?>

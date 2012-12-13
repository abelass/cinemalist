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


	$maj['create'] = array(array('maj_tables', array('spip_films', 'spip_films_liens', 'spip_acteurs', 'spip_acteurs_liens', 'spip_realisateurs', 'spip_realisateurs_liens', 'spip_scenaristes', 'spip_scenaristes_liens')));
       
     $maj['0.2.7'] = array(
        array('maj_tables', array('spip_films')),
        array('sql_updateq','spip_films',array('statut' => 'publie'))
        );

     $maj['0.2.9'] = array(
       array('sql_alter','TABLE spip_films CHANGE sortie_be sortie_be date NOT NULL'),
       array('sql_alter','TABLE spip_films CHANGE sortie_fr sortie_fr date NOT NULL'),       
        );
        
     $maj['0.3.8'] = array(
        array('sql_alter','TABLE spip_acteurs_movies RENAME TO spip_acteurs_liens'),
        array('sql_alter','TABLE spip_acteurs_liens CHANGE id_film id_objet bigint(21) DEFAULT 0 NOT NULL'),        
        array('maj_tables', array('spip_acteurs_liens')),
        array('sql_updateq','spip_acteurs_liens',array('objet' => 'film')),
        
        array('sql_alter','TABLE spip_realisateurs_movies RENAME TO spip_realisateurs_liens'),
        array('sql_alter','TABLE spip_realisateurs_liens CHANGE id_film id_objet bigint(21) DEFAULT 0 NOT NULL'),        
        array('maj_tables', array('spip_realisateurs_liens')),
        array('sql_updateq','spip_realisateurs_liens',array('objet' => 'film')),
        
        array('sql_alter','TABLE spip_scenaristes_movies RENAME TO spip_scenaristes_liens'),
        array('sql_alter','TABLE spip_scenaristes_liens CHANGE id_film id_objet bigint(21) DEFAULT 0 NOT NULL'),        
        array('maj_tables', array('spip_scenaristes_liens')),
        array('sql_updateq','spip_scenaristes_liens',array('objet' => 'film')),
        
        array('sql_alter','TABLE spip_lien_film_article RENAME TO spip_films_liens'),
        array('sql_alter','TABLE spip_films_liens CHANGE id_article id_objet bigint(21) DEFAULT 0 NOT NULL'),        
        array('maj_tables', array('spip_films_liens')),
        array('sql_updateq','spip_films_liens',array('objet' => 'article')),        
        );
                
     $maj['0.3.15'] = array(
        array('sql_alter','TABLE spip_films_liens DROP COLUMN id_article'),
        array('sql_alter','TABLE spip_films_liens DROP COLUMN id'),
        array('sql_alter','TABLE spip_films_liens ADD PRIMARY KEY  (id_film , id_objet , objet)'), 
        array('sql_alter','TABLE spip_realisateurs_liens DROP PRIMARY KEY'),   
        array('sql_alter','TABLE spip_films_liens ADD INDEX (id_film)'), 
        array('sql_alter','TABLE spip_acteurs_liens DROP PRIMARY KEY'),              
        array('sql_alter','TABLE spip_acteurs_liens ADD PRIMARY KEY  (id_acteur , id_objet , objet )'), 
        array('sql_alter','TABLE spip_realisateurs_liens DROP PRIMARY KEY'),         
        array('sql_alter','TABLE spip_realisateurs_liens ADD PRIMARY KEY  ( id_realisateur , id_objet , objet)'), 
        array('sql_alter','TABLE spip_scenaristes_liens DROP PRIMARY KEY'),        
        array('sql_alter','TABLE spip_scenaristes_liens ADD PRIMARY KEY  (id_scenariste , id_objet , objet )'),                
        );
        
     $maj['0.3.16'] = array(
        array('sql_alter','TABLE spip_acteurs CHANGE date_naissance date_naissance date NOT NULL DEFAULT "0000-00-00"'), 
        array('sql_alter','TABLE spip_acteurs CHANGE date_mort date_mort date NOT NULL DEFAULT "0000-00-00"'),                
        array('sql_alter','TABLE spip_realisateurs CHANGE date_naissance date_naissance date NOT NULL DEFAULT "0000-00-00"'), 
        array('sql_alter','TABLE spip_realisateurs CHANGE date_mort date_mort date NOT NULL DEFAULT "0000-00-00"'),                
        array('sql_alter','TABLE spip_scenaristes CHANGE date_naissance date_naissance date NOT NULL DEFAULT "0000-00-00"'), 
        array('sql_alter','TABLE spip_scenaristes CHANGE date_mort date_mort date NOT NULL DEFAULT "0000-00-00"'),                
        array('sql_alter','TABLE spip_films CHANGE sortie_be sortie_be date NOT NULL DEFAULT "0000-00-00"'),
        array('sql_alter','TABLE spip_films CHANGE sortie_fr sortie_fr date NOT NULL DEFAULT "0000-00-00"'),               
        );
        
      $maj['0.3.17'] = array(               
        array('sql_alter','TABLE spip_films CHANGE maj date_maj TIMESTAMP'),             
        ); 
        
      $maj['0.3.20'] = array(               
        array('maj_tables', array('spip_acteurs','spip_realisateurs','spip_scenaristes','spip_films')),             
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
    # quelques exemples
    # (que vous pouvez supprimer !)
    # sql_drop_table("spip_xx");
    # sql_drop_table("spip_xx_liens");

    sql_drop_table("spip_films");
    sql_drop_table("spip_films_liens");
    sql_drop_table("spip_acteurs");
    sql_drop_table("spip_acteurs_liens");
    sql_drop_table("spip_realisateurs");
    sql_drop_table("spip_realisateurs_liens");
    sql_drop_table("spip_scenaristes");
    sql_drop_table("spip_scenaristes_liens");

    # Nettoyer les versionnages et forums
    sql_delete("spip_versions",              sql_in("objet", array('film', 'acteur', 'realisateur', 'scenariste')));
    sql_delete("spip_versions_fragments",    sql_in("objet", array('film', 'acteur', 'realisateur', 'scenariste')));
    sql_delete("spip_forum",                 sql_in("objet", array('film', 'acteur', 'realisateur', 'scenariste')));

    effacer_meta($nom_meta_base_version);
}


?>

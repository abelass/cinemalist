<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
//
// Formulaires : Structure
//

function cinemalist_declarer_tables_principales($tables_principales){
	
		
	/*$films = array(
		"id_film" 		=> "int(10) NOT NULL",
		"title" 		=> "varchar(150) NOT NULL",		
		"title_VO" 		=> "varchar(150) NOT NULL",
		"annee" 		=> "varchar(10) NOT NULL",
		"sortie_be" 		=> "date NULL",	
		"sortie_fr" 		=> "date NULL",				
		"realisateur" 		=> "varchar(250) NOT NULL",
		"pays" 			=> "varchar(100) NOT NULL",
		"duree" 		=> "varchar(50) NOT NULL",
		"budget" 		=> "varchar(150) NOT NULL",
		"scenes" 		=> "mediumtext NOT NULL",
		"scenariste" 		=> "tinytext NOT NULL",
		"recompenses" 		=> "mediumtext NOT NULL",
		"musique" 		=> "tinytext NOT NULL",		
		"annonce" 		=> "varchar(200) NOT NULL",
		"sortie" 		=> "varchar(200) NOT NULL",
		"genre" 		=> "varchar(100) NOT NULL",	
		"casting" 		=> "mediumtext NOT NULL",
		"synopsis" 		=> "longtext NOT NULL",		
		"logo" 			=> "varchar(250) NOT NULL",
		"url" 		=> "varchar(250) NOT NULL");
	 	 	 	 	 	 	 

	$films_key = array(
		"PRIMARY KEY" 	=> "id_film",);
		
	$films_join = array(
		"id_film"	=> "id_film",);

	$tables_principales['spip_films'] = array(
		'field' => &$films,
		'key' => &$films_key,
		'join' => &$films_join);
						
	$spip_acteurs = array(
		"id_acteur" 		=> "int(20) NOT NULL",
		"nom" 			=> "tinytext NOT NULL",		
		"prenom" 		=> "tinytext NOT NULL",	
		"nationalite" 		=> "varchar(5) NOT NULL",
		"descriptif" 		=> "text NULL",	
		"date_naissance" 	=> "datetime NULL",				
		"date_mort" 		=> "datetime NULL",
		"logo" 			=> "varchar(255) NOT NULL",
		"date" 			=> "datetime NOT NULL",
		"date_maj" 		=> "datetime NOT NULL",
		"statut" 		=> "varchar(10) NOT NULL",
		"url" 		=> "varchar(250) NOT NULL");
 	 	 
	$spip_acteurs_key = array(
		"PRIMARY KEY" 	=> "id_acteur"
		);
		
	$spip_acteurs_join = array(
		"id_acteur"	=> "id_acteur"
		);

	$tables_principales['spip_acteurs'] = array(
		'field' => &$spip_acteurs,
		'key' => &$spip_acteurs_key,
		'join' => &$spip_acteurs_join);	
		
	$spip_scenaristes = array(
		"id_scenariste " 	=> "int(20) NOT NULL",
		"nom" 			=> "tinytext NOT NULL",		
		"prenom" 		=> "tinytext NOT NULL",	
		"nationalite" 		=> "varchar(5) NOT NULL",
		"descriptif" 		=> "text NULL",	
		"date_naissance" 	=> "datetime NULL",				
		"date_mort" 		=> "datetime NULL",
		"logo" 			=> "varchar(255) NOT NULL",
		"date" 			=> "datetime NOT NULL",
		"date_maj" 		=> "datetime NOT NULL",
		"statut" 		=> "varchar(10) NOT NULL",
		"url" 		=> "varchar(250) NOT NULL");
 	 	 
	$spip_scenaristes_key = array(
		"PRIMARY KEY" 	=> "id_scenariste"
		);
		
	$spip_scenaristes_join = array(
		"id_scenariste"	=> "id_scenariste"
		);

	$tables_principales['spip_scenaristes'] = array(
		'field' => &$spip_scenaristes,
		'key' => &$spip_scenaristes_key,
		'join' => &$spip_scenaristes_join);
				
	$spip_realisateurs = array(
		"id_realisateur " 	=> "int(20) NOT NULL",
		"nom" 			=> "tinytext NOT NULL",		
		"prenom" 		=> "tinytext NOT NULL",	
		"nationalite" 		=> "varchar(5) NOT NULL",
		"descriptif" 		=> "text NULL",	
		"date_naissance" 	=> "datetime NULL",				
		"date_mort" 		=> "datetime NULL",
		"logo" 			=> "varchar(255) NOT NULL",
		"date" 			=> "datetime NOT NULL",
		"date_maj" 		=> "datetime NOT NULL",
		"statut" 		=> "varchar(10) NOT NULL",
		"url" 		=> "varchar(250) NOT NULL");
 	 	 
	$spip_realisateurs_key = array(
		"PRIMARY KEY" 	=> "id_realisateur"
		);
		
	$spip_realisateurs_join = array(
		"id_realisateur"	=> "id_realisateur"
		);

	$tables_principales['spip_realisateurs'] = array(
		'field' => &$spip_realisateurs,
		'key' => &$spip_realisateurs_key,
		'join' => &$spip_realisateurs_join);*/
					
	$spip_commentaires_film = array(
		"id_commentaire_film " 	=> "int(20) NOT NULL",
		"titre" 		=> "text NOT NULL",		
		"nom" 			=> "varchar(128) NOT NULL",	
		"email" 		=> "varchar(255) NOT NULL",
		"texte" 		=> "blob NULL",	
		"etoiles" 		=> "int(11) NULL",				
		"daube" 		=> "tinyint(1) NULL",
		"logo" 			=> "varchar(255) NOT NULL",
		"coeur" 		=> "tinyint(1) NOT NULL",
		"id_auteur" 		=> "bigint(20) NOT NULL",
		"id_film" 		=> "bigint(20) NOT NULL",
		"date" 			=> "datetime NOT NULL",
		"statut" 		=> "varchar(10) NOT NULL",			
		);	
 	 	 
	$spip_commentaires_film_key = array(
		"PRIMARY KEY" 	=> "id_commentaire_film"
		);
		
	$spip_commentaires_film_join = array(
		"id_commentaire_film"	=> "id_commentaire_film"
		);

	$tables_principales['spip_commentaires_film'] = array(
		'field' => &$spip_commentaires_film,
		'key' => &$spip_commentaires_film_key,
		'join' => &$spip_commentaires_film_join);					
					
				
	return $tables_principales;
	
	}

/**
 * Déclaration des objets éditoriaux
 */
function cinemalist_declarer_tables_objets_sql($tables) {

    $tables['spip_films'] = array(
        'type' => 'film',
        'principale' => "oui",
        'field'=> array(
            "id_film"            => "bigint(21) NOT NULL",
            "title"              => "varchar(150) NOT NULL",
            "title_vo"           => "varchar(150) NOT NULL",
            "annee"              => "varchar(10) NOT NULL",
            "sortie_be"          => "date NOT NULL DEFAULT '0000-00-00'", 
            "sortie_fr"          => "date NOT NULL DEFAULT '0000-00-00'",
            "realisateur"        => "varchar(250) NOT NULL",
            "pays"               => "varchar(100) NOT NULL",
            "duree"              => "varchar(50) NOT NULL",
            "budget"             => "varchar(150) NOT NULL",
            "scenes"             => "mediumtext NOT NULL",
            "scenariste"         => "tinytext NOT NULL",
            "recompenses"        => "mediumtext NOT NULL",
            "musique"            => "tinytext NOT NULL",
            "annonce"            => "varchar(200) NOT NULL",
            "sortie"             => "varchar(200) NOT NULL",
            "genre"              => "varchar(100) NOT NULL",
            "casting"            => "mediumtext NOT NULL",
            "synopsis"           => "longtext NOT NULL",
            "affichage_special"  => "varchar(3) NOT NULL",            
            "logo"               => "varchar(250) NOT NULL",
            "date"               => "datetime NOT NULL DEFAULT '0000-00-00 00:00:00'", 
            "statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
            "date_maj"           => "TIMESTAMP"
        ),
        'key' => array(
            "PRIMARY KEY"        => "id_film",
            "KEY statut"         => "statut", 
        ),
        'titre' => "title AS titre, '' AS lang",
        'date' => "date",
        'champs_editables'  => array('title', 'title_vo', 'affichage_special', 'annee', 'sortie_be', 'sortie_fr', 'realisateur', 'pays', 'duree', 'budget','scenariste', 'musique', 'annonce', 'sortie', 'genre','casting','synopsis'),
        'champs_versionnes' => array('title', 'title_vo', 'annee', 'sortie_be', 'sortie_fr', 'realisateur', 'pays', 'duree', 'budget', 'musique', 'annonce', 'sortie', 'genre', 'casting','synopsis'),
        'rechercher_champs' => array("title" => 8),
        'tables_jointures'  => array('spip_acteurs_liens'),
             
        'statut_textes_instituer' => array(
            'prepa'    => 'texte_statut_en_cours_redaction',
            'prop'     => 'texte_statut_propose_evaluation',
            'publie'   => 'texte_statut_publie',
            'refuse'   => 'texte_statut_refuse',
            'poubelle' => 'texte_statut_poubelle',
        ),
        'statut'=> array(
            array(
                'champ'     => 'statut',
                'publie'    => 'publie',
                'previsu'   => 'publie,prop,prepa',
                'post_date' => 'date', 
                'exception' => array('statut','tout')
            )
        ),
        'texte_changer_statut' => 'film:texte_changer_statut_film', 
        

    );

    $tables['spip_acteurs'] = array(
        'type' => 'acteur',
        'principale' => "oui",
        'field'=> array(
            "id_acteur"          => "bigint(21) NOT NULL",
            "nom"                => "tinytext NOT NULL",
            "nationalite"        => "varchar(5) NOT NULL",
            "descriptif"         => "text NOT NULL",
            "date_naissance"     => "date NOT NULL DEFAULT '0000-00-00'",
            "date_mort"          => "date NOT NULL DEFAULT '0000-00-00'",
            "logo"               => "varchar(255) NOT NULL",
            "statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
            "date_maj"            => "TIMESTAMP"
        ),
        'key' => array(
            "PRIMARY KEY"        => "id_acteur",
            "KEY statut"         => "statut", 
        ),
        'titre' => "nom AS titre, '' AS lang",
        'date' => "date",
        'champs_editables'  => array('nom', 'nationalite', 'descriptif', 'date_naissance', 'date_mort'),
        'champs_versionnes' => array('nom', 'nationalite', 'descriptif', 'date_naissance', 'date_mort'),
        'rechercher_champs' => array("nom" => 8, "descriptif" => 4),
        'tables_jointures'  => array('spip_acteurs_liens'),
        'statut_textes_instituer' => array(
            'prepa'    => 'texte_statut_en_cours_redaction',
            'prop'     => 'texte_statut_propose_evaluation',
            'publie'   => 'texte_statut_publie',
            'refuse'   => 'texte_statut_refuse',
            'poubelle' => 'texte_statut_poubelle',
        ),
        'statut'=> array(
            array(
                'champ'     => 'statut',
                'publie'    => 'publie',
                'previsu'   => 'publie,prop,prepa',
                'post_date' => 'date', 
                'exception' => array('statut','tout')
            )
        ),
        'texte_changer_statut' => 'acteur:texte_changer_statut_acteur', 
        

    );

    $tables['spip_realisateurs'] = array(
        'type' => 'realisateur',
        'principale' => "oui",
        'field'=> array(
            "id_realisateur"     => "bigint(21) NOT NULL",
            "nom"                => "tinytext NOT NULL",
            "date_naissance"     => "date NOT NULL DEFAULT '0000-00-00'",
            "date_mort"          => "date NOT NULL DEFAULT '0000-00-00'",
            "descriptif"         => "text NOT NULL",
            "logo"               => "varchar(255) NOT NULL",
            "nationalite"        => "varchar(5) NOT NULL",
            "statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
            "date_maj"                => "TIMESTAMP"
        ),
        'key' => array(
            "PRIMARY KEY"        => "id_realisateur",
            "KEY statut"         => "statut", 
        ),
        'titre' => "nom AS titre, '' AS lang",
        'date' => "date",
        'champs_editables'  => array('nom', 'date_naissance', 'date_mort', 'descriptif'),
        'champs_versionnes' => array('nom', 'date_naissance', 'date_mort', 'descriptif'),
        'rechercher_champs' => array("nom" => 8, "descriptif" => 4),
        'tables_jointures'  => array('spip_realisateurs_liens'),
        'statut_textes_instituer' => array(
            'prepa'    => 'texte_statut_en_cours_redaction',
            'prop'     => 'texte_statut_propose_evaluation',
            'publie'   => 'texte_statut_publie',
            'refuse'   => 'texte_statut_refuse',
            'poubelle' => 'texte_statut_poubelle',
        ),
        'statut'=> array(
            array(
                'champ'     => 'statut',
                'publie'    => 'publie',
                'previsu'   => 'publie,prop,prepa',
                'post_date' => 'date', 
                'exception' => array('statut','tout')
            )
        ),
        'texte_changer_statut' => 'realisateur:texte_changer_statut_realisateur', 
        

    );

    $tables['spip_scenaristes'] = array(
        'type' => 'scenariste',
        'principale' => "oui",
        'field'=> array(
            "id_scenariste"      => "bigint(21) NOT NULL",
            "nom"                => "tinytext NOT NULL",
            "nationalite"        => "varchar(5) NOT NULL",
            "descriptif"         => "text NOT NULL",
            "date_naissance"     => "date NOT NULL DEFAULT '0000-00-00'",
            "date_mort"          => "date NOT NULL DEFAULT '0000-00-00'",
            "logo"               => "varchar(255) NOT NULL",
            "statut"             => "varchar(20)  DEFAULT '0' NOT NULL", 
            "date_maj"            => "TIMESTAMP"
        ),
        'key' => array(
            "PRIMARY KEY"        => "id_scenariste",
            "KEY statut"         => "statut", 
        ),
        'titre' => "nom AS titre, '' AS lang",
        'date' => "date",
        'champs_editables'  => array('nom', 'nationalite', 'descriptif', 'date_naissance', 'date_mort'),
        'champs_versionnes' => array('nom', 'descriptif', 'date_naissance', 'date_mort'),
        'rechercher_champs' => array("nom" => 8, "descriptif" => 4),
        'tables_jointures'  => array('spip_scenaristes_liens'),
        'statut_textes_instituer' => array(
            'prepa'    => 'texte_statut_en_cours_redaction',
            'prop'     => 'texte_statut_propose_evaluation',
            'publie'   => 'texte_statut_publie',
            'refuse'   => 'texte_statut_refuse',
            'poubelle' => 'texte_statut_poubelle',
        ),
        'statut'=> array(
            array(
                'champ'     => 'statut',
                'publie'    => 'publie',
                'previsu'   => 'publie,prop,prepa',
                'post_date' => 'date', 
                'exception' => array('statut','tout')
            )
        ),
        'texte_changer_statut' => 'scenariste:texte_changer_statut_scenariste', 
        

    );

    return $tables;
}

function cinemalist_declarer_tables_interfaces($tables_interfaces){

    $tables_interfaces['table_des_tables']['films'] = 'films';  
    $tables_interfaces['table_des_tables']['films_liens'] = 'films_liens';          
    $tables_interfaces['table_des_tables']['acteurs'] = 'acteurs';  
    $tables_interfaces['table_des_tables']['acteurs_liens'] = 'acteurs_liens';      
    $tables_interfaces['table_des_tables']['scenaristes'] = 'scenaristes';  
    $tables_interfaces['table_des_tables']['scenaristes_liens'] = 'scenaristes_liens';             
    $tables_interfaces['table_des_tables']['realisateurs'] = 'realisateurs';    
    $tables_interfaces['table_des_tables']['realisateurs_liens'] = 'realisateurs_liens';             
    $tables_interfaces['table_des_tables']['commentaires_film'] = 'commentaires_film';

    
    $tables_interfaces['tables_jointures']['spip_articles'][] = 'spip_articles_liens';

    
            
    // Titre pour url
    /*$tables_interfaces['table_titre']['films'] = "url as titre, 'title' AS lang";    
    $tables_interfaces['table_titre']['realisateurs'] = "url AS titre, '' AS lang";  
    $tables_interfaces['table_titre']['scenaristes'] = "url  AS titre, '' AS lang"; */

                        
    return $tables_interfaces;
}

function cinemalist_declarer_tables_auxiliaires($tables){
    
   $tables['spip_acteurs_liens'] = array(
        'field' => array(
            "id_acteur"          => "bigint(21) DEFAULT '0' NOT NULL",
            "id_objet"           => "bigint(21) DEFAULT '0' NOT NULL",
            "objet"              => "VARCHAR(25) DEFAULT '' NOT NULL",
            "vu"                 => "VARCHAR(6) DEFAULT 'non' NOT NULL"
        ),
        'key' => array(
            "PRIMARY KEY"        => "id_acteur,id_objet,objet",
            "KEY id_acteur"      => "id_acteur"
        )
    );
    $tables['spip_realisateurs_liens'] = array(
        'field' => array(
            "id_realisateur"     => "bigint(21) DEFAULT '0' NOT NULL",
            "id_objet"           => "bigint(21) DEFAULT '0' NOT NULL",
            "objet"              => "VARCHAR(25) DEFAULT '' NOT NULL",
            "vu"                 => "VARCHAR(6) DEFAULT 'non' NOT NULL"
        ),
        'key' => array(
            "PRIMARY KEY"        => "id_realisateur,id_objet,objet",
            "KEY id_realisateur" => "id_realisateur"
        )
    );
    $tables['spip_scenaristes_liens'] = array(
        'field' => array(
            "id_scenariste"      => "bigint(21) DEFAULT '0' NOT NULL",
            "id_objet"           => "bigint(21) DEFAULT '0' NOT NULL",
            "objet"              => "VARCHAR(25) DEFAULT '' NOT NULL",
            "vu"                 => "VARCHAR(6) DEFAULT 'non' NOT NULL"
        ),
        'key' => array(
            "PRIMARY KEY"        => "id_scenariste,id_objet,objet",
            "KEY id_scenariste"  => "id_scenariste"
        )
    );

    
    $tables['spip_films_liens'] = array(
        'field' => array(
            "id_film"            => "bigint(21) DEFAULT '0' NOT NULL",
            "id_objet"           => "bigint(21) DEFAULT '0' NOT NULL",
            "objet"              => "VARCHAR(25) DEFAULT '' NOT NULL",
            "vu"                 => "VARCHAR(6) DEFAULT 'non' NOT NULL"
        ),
        'key' => array(
            "PRIMARY KEY"        => "id_film,id_objet,objet",
            "KEY id_film"        => "id_film"
        )
    );
return $tables;
};
?>

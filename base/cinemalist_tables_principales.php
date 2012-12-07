<?php
if (!defined("_ECRIRE_INC_VERSION")) return;
//
// Formulaires : Structure
//

function cinemalist_declarer_tables_principales($tables_principales){
	
		
	$films = array(
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
		'join' => &$spip_realisateurs_join);
					
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
?>

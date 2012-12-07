<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function cinemalist_declarer_tables_auxiliaires($tables_auxiliaires){

	$spip_acteurs_movies = array(
		"id_film"		=> "bigint(21) NOT NULL",
		"id_auteur"		=> "bigint(21) NOT NULL",
		);

	$spip_acteurs_movies_key = array(
		"PRIMARY KEY"		=> "id_film,id_auteur",
		);	
			
	
	$tables_auxiliaires['spip_acteurs_movies'] = array(
		'field' => &$spip_acteurs_movies,
		'key' => &$spip_acteurs_movies_key,
	);
			
	$spip_scenaristes_movies = array(
		"id_film"		=> "bigint(21) NOT NULL",
		"id_scenariste"		=> "bigint(21) NOT NULL",
		);

	$spip_scenaristes_movies_key = array(
		"PRIMARY KEY"		=> "id_film,id_scenariste",
		);	
			
	
	$tables_auxiliaires['spip_scenaristes_movies'] = array(
		'field' => &$spip_scenaristes_movies,
		'key' => &$spip_scenaristes_movies_key,
	);			
	
	$spip_realisateurs_movies= array(
		"id_film"		=> "bigint(21) NOT NULL",
		"id_realisateur"		=> "bigint(21) NOT NULL",
		);

	$spip_realisateurs_movies_key = array(
		"PRIMARY KEY"		=> "id_film,id_realisateur",
		);	
			
	
	$tables_auxiliaires['spip_realisateurs_movies'] = array(
		'field' => &$spip_realisateurs_movies,
		'key' => &$spip_realisateurs_movies_key,
	);
	
	$spip_geo_pays= array(
		"id_pays "			=> "bigint(21) NOT NULL",
		);

	$spip_geo_pays_key = array(
		"PRIMARY KEY"		=> "id_pays",
		);	
			
	$tables_auxiliaires['spip_geo_pays'] = array(
		'field' => &$spip_geo_pays,
		'key' => &$spip_geo_pays_key,
	);
		
	$spip_lien_film_article= array(
		"id"			=> "bigint(21) NOT NULL",
		"id_article"		=> "bigint(21) NOT NULL",
		"id_film"		=> "bigint(21) NOT NULL",				
		);

	$spip_lien_film_article_key = array(
		"PRIMARY KEY"		=> "id",
		"KEY id_article"	=> "id_article",
		"KEY id_film"		=> "id_film",	
		);	
			
	$tables_auxiliaires['spip_lien_film_article'] = array(
		'field' => &$spip_lien_film_article,
		'key' => &$spip_lien_film_article_key,
	);		
return $tables_auxiliaires;
};
?>
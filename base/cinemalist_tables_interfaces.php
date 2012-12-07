<?php

function cinemalist_declarer_tables_interfaces($tables_interfaces){

	$tables_interfaces['table_des_tables']['spip_films'] = 'spip_films';
	$tables_interfaces['table_des_tables']['films'] = 'films';	
	$tables_interfaces['table_des_tables']['acteurs'] = 'acteurs';	
	$tables_interfaces['table_des_tables']['acteurs_movies'] = 'acteurs_movies';		
	$tables_interfaces['table_des_tables']['scenaristes'] = 'scenaristes';	
	$tables_interfaces['table_des_tables']['scenaristes_movies'] = 'scenaristes_movies';
	$tables_interfaces['table_des_tables']['realisateurs'] = 'realisateurs';	
	$tables_interfaces['table_des_tables']['realisateurs_movies'] = 'realisateurs_movies';	
	$tables_interfaces['table_des_tables']['geo_pays'] = 'geo_pays';
	$tables_interfaces['table_des_tables']['commentaires_film'] = 'commentaires_film';
	$tables_interfaces['table_des_tables']['lien_film_article'] = 'lien_film_article';
			
	// Titre pour url
  	$tables_interfaces['table_titre']['acteurs']= "url AS titre, '' AS lang"; 	
     	$tables_interfaces['table_titre']['films'] = "url as titre, '' AS lang";	
    	$tables_interfaces['table_titre']['realisateurs'] = "url AS titre, '' AS lang";	 
    	$tables_interfaces['table_titre']['scenaristes'] = "url  AS titre, '' AS lang"; 

    	  	   	   		
	return $tables_interfaces;
}


?>

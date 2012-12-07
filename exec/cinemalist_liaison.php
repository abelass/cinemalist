<?php

function exec_cinemalist_liaison(){
	
	include_spip("public/composer");
	include_spip("public/assembler");
	include_spip("inc/utils");
	include_spip("inc/headers");
	include_spip("inc/presentation");
	
	
	$contexte = array();
	$contexte['id_film'] = _request('id_film');
	$contexte['id_scenariste'] = _request('id_scenariste');
	$contexte['id_acteur'] = _request('id_acteur');
	$contexte['id_realisateur'] = _request('id_realisateur');
		
	if (_request('lier_acteur_movie')){
			$valeurs=array('id_film'=>$contexte['id_film'],'id_acteur'=>$contexte['id_acteur']);
			sql_insertq('spip_acteurs_movies',$valeurs);		
			 redirige_par_entete(generer_url_ecrire('cinemalist_liaison','id_film='.$contexte['id_film'], "&"));
	}
	
	if (_request('delier_acteur_movie')){
			$res_insert = spip_query("DELETE FROM spip_acteurs_movies WHERE id_film = '".$contexte['id_film']."' AND id_acteur = '".$contexte['id_acteur']."';");
			redirige_par_entete(generer_url_ecrire('cinemalist_liaison','id_film='.$contexte['id_film'], "&"));

	}
	
	if (_request('lier_realisateur_movie')){
			$res_insert = spip_query("INSERT INTO spip_realisateurs_movies VALUES ('".$contexte['id_film']."','".$contexte['id_realisateur']."');");
			redirige_par_entete(generer_url_ecrire('cinemalist_liaison','id_film='.$contexte['id_film'], "&"));
	}
	
	if (_request('delier_realisateur_movie')){
			$res_insert = spip_query("DELETE FROM spip_realisateurs_movies WHERE id_film = '".$contexte['id_film']."' AND id_realisateur = '".$contexte['id_realisateur']."';");
			redirige_par_entete(generer_url_ecrire('cinemalist_liaison','id_film='.$contexte['id_film'], "&"));
	}
	
	if (_request('lier_scenariste_movie')){
			$res_insert = spip_query("INSERT INTO spip_scenaristes_movies VALUES ('".$contexte['id_film']."','".$contexte['id_scenariste']."');");
			redirige_par_entete(generer_url_ecrire('cinemalist_liaison','id_film='.$contexte['id_film'], "&"));
	}
	
	if (_request('delier_scenariste_movie')){
			$res_insert = spip_query("DELETE FROM spip_scenaristes_movies WHERE id_film = '".$contexte['id_film']."' AND id_scenariste = '".$contexte['id_scenariste']."';");
			redirige_par_entete(generer_url_ecrire('cinemalist_liaison','id_film='.$contexte['id_film'], "&"));
	}
	
	$commencer_page = charger_fonction('commencer_page', 'inc');


	// titre, partie, sous_partie (pour le menu)
	echo $commencer_page(_T('cinetic'), "editer", "editer");
	echo "<br />";
	echo gros_titre("Cinema List");	
	echo debut_gauche();
	echo debut_boite_info();
		echo '<img src="../plugins/cinetic/img_pack/bobine.png" alt="logo" border="0">
		<p><strong>CinemaList</strong> permet de g&eacute;rer une base de donn&eacute;es de films.</p>';
	echo fin_boite_info();
		include ("menu_cinetic.php");
	echo debut_droite();
	//echo debut_cadre_trait_couleur("../plugins/cinetic/img_pack/bobine.png", false, "", _T(''));	
	
	echo recuperer_fond('prive/cinemalist_liaison', $contexte);
	//echo fin_cadre_couleur();
	echo fin_page();
}
?>

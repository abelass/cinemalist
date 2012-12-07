<?php

function balise_FORMULAIRE_COMMENTAIRE_FILM($p){
    return calculer_balise_dynamique($p, 'FORMULAIRE_COMMENTAIRE_FILM', array('id_film'));
    
    echo serialize($p);
}

function balise_FORMULAIRE_COMMENTAIRE_FILM_stat($args, $filtres) {
    if(!$args[1]) {
        $args[1]='formulaire_commentaire_film';
    }
	    return (array($args[0],$args[1]));
	}
	
function balise_FORMULAIRE_COMMENTAIRE_FILM_dyn($id_film, $formulaire) {

	if (strlen(_request('radar')) < 1){	
		$contexte = array();
		$contexte['titre'] = _request('titre');
		$contexte['nom'] = _request('nom');
		$contexte['email'] = _request('email');
		$contexte['texte'] = _request('texte');
		$contexte['etoiles'] = _request('etoiles');
		$contexte['daube'] = _request('daube');
		$contexte['coeur'] = _request('coeur');
		$contexte['etape'] = _request('etape');
		$contexte['id_film'] = $id_film;
		$contexte['id_auteur'] = $GLOBALS['auteur_session']['id_auteur'];
		$contexte['formulaire'] = "formulaires/commentaire_film";
		$contexte['visualize'] = "non";
		$contexte['statut'] = lire_config('cinemalist/statut_par_defaut_des_commentaires','publie');
		$contexte['texte'] = substr($contexte['texte'], 0, lire_config('cinemalist/taille_maximum_des_commentaires', 500));
		
		if ($contexte['daube'] == 'on') {$contexte['daube'] = 1;}else{$contexte['daube'] = 0;}
		if ($contexte['coeur'] == 'on') {$contexte['coeur'] = 1;}else{$contexte['coeur'] = 0;}
		
		if ($contexte['etape'] == 'visualize'){
			$contexte['visualize'] = "oui";
		}
		
		if (_request('publier')){
			$sql_insert_commentaire = "INSERT INTO spip_commentaires_film VALUES ('','".addslashes($contexte['titre'])."','".addslashes($contexte['nom'])."','".addslashes($contexte['email'])."','".addslashes($contexte['texte'])."','".$contexte['etoiles']."','".$contexte['daube']."','".$contexte['coeur']."','".$contexte['id_auteur']."','".$id_film."','".date('Y-m-d H:m:s')."','".$contexte['statut']."');";
			$res_insert_commentaire = spip_query($sql_insert_commentaire);
			$contexte['visualize'] = "non";
			unset($contexte);
			$contexte = array();
			$contexte['formulaire'] = "formulaires/commentaire_film";
			$contexte['resultat'] = "Votre commentaire &agrave; bien &eacute;t&eacute; enregistr&eacute;";
			$contexte['visualize'] = "non";
		}
	}
	return array($contexte['formulaire'],0,$contexte);
	
}

?>

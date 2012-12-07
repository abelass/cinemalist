<?php

function formulaires_commentaires_film_charger_dist($id_film){

	if(!$id_film)$id_film=_request('id_film');
	
	$valeurs=array(
		'titre'=>'',
		'nom'=>'',
		'email'=>'',
		'texte'=>'',
		'titre'=>'',
		'etoiles'=>'',
		'daube'=>'',
		'coeur'=>'',	
		'id_film'=>$id_film,
		'id_auteur'=>$GLOBALS['auteur_session']['id_auteur'],
		'visualize'=>'non',
		'texte'=>substr($valeurs['texte'], 0, lire_config('cinemalist/taille_maximum_des_commentaires', 500)),
		'extra'=>'',
		'publier'=>'',
		'radar'=>'',							
	);
	$valeurs['_hidden'].='<input type="hidden" name="id_film" value="'.$id_film.'"/>';


return $valeurs;
}
	
function formulaires_commentaires_film_traiter_dist($id_film) {
	$retour = array();
	$retour['message_ok']='prev';
			
	if(!$id_film)$id_film=_request('id_film');
	
	if (strlen(_request('radar')) < 1){	
		
		if ($contexte['daube'] == 'on') {$contexte['daube'] = 1;}else{$contexte['daube'] = 0;}
		if ($contexte['coeur'] == 'on') {$contexte['coeur'] = 1;}else{$contexte['coeur'] = 0;}
		
		if (_request('extra')){
			$retour['message_ok']='prev';
			$retour['editable']='true';	
			$contexte['visualize'] = "oui";					
		}
		
		if (_request('publier')){
			$valeurs=array(
				'titre'=>_request('titre'),
				'nom'=>_request('nom'),
				'email'=>_request('email'),
				'texte'=>_request('texte'),
				'etoiles'=>_request('etoiles'),
				'daube'=>_request('daube'),
				'coeur'=>_request('coeur'),	
				'id_film'=>$id_film,
				'id_auteur'=>$GLOBALS['auteur_session']['id_auteur'],
				'statut'=>lire_config('cinemalist/statut_par_defaut_des_commentaires','publie'),
				'texte'=>_request('titre'),
				'date'=>date('Y-m-d H:m:s'),							
				);
		
			$id_commentaire_film=sql_insertq('spip_commentaires_film',$valeurs);

			$contexte['visualize'] = "non";
			unset($contexte);
			$retour['message_ok']='ok';
		}
	}

	return $retour;
	
}

?>

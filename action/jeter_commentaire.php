<?php

function action_jeter_commentaire(){
	$contexte = array();
	$contexte['id_commentaire'] = _request('id_commentaire');
	$sql_delete = "UPDATE spip_commentaires_film SET statut = 'poubelle' WHERE id_commentaire_film = '".$contexte['id_commentaire']."';";
	$res_delete = spip_query($sql_delete);	
	
	redirige_par_entete(generer_url_ecrire('commentaire_film','','&'));
}

?>

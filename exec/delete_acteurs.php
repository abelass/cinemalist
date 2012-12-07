<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function exec_delete_acteurs(){
	include_spip('inc/headers');
	$id_acteur = _request('id_acteur');
	//var_dump($id_acteur);
	$updt = sql_updateq("spip_acteurs",array("statut"=>"poubelle"),"id_acteur=".sql_quote($id_acteur));
	$url_retour = generer_url_ecrire('acteurs','var_mode=recalcul','&');
	redirige_par_entete($url_retour);

}

?>

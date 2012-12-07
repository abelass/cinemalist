<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function exec_delete_realisateurs(){
	include_spip('inc/headers');
	$id_realisateur = _request('id_realisateur');
	//var_dump($id_realisateur);
	$updt = sql_updateq("spip_realisateurs",array("statut"=>"poubelle"),"id_realisateur=".sql_quote($id_realisateur));
	$url_retour = generer_url_ecrire('realisateurs','var_mode=recalcul','&');
	redirige_par_entete($url_retour);

}

?>

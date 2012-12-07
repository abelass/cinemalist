<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

function exec_delete_scenaristes(){
	include_spip('inc/headers');
	$id_scenariste = _request('id_scenariste');
	//var_dump($id_scenariste);
	$updt = sql_updateq("spip_scenaristes",array("statut"=>"poubelle"),"id_scenariste=".sql_quote($id_scenariste));
	$url_retour = generer_url_ecrire('scenaristes','var_mode=recalcul','&');
	redirige_par_entete($url_retour);

}

?>

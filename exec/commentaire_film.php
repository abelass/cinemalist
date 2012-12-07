<?php

include_spip('inc/commencer_page');
include_spip('inc/abstract_sql');
include_spip('public/assembler');

function exec_commentaire_film(){
	$contexte = array();

	if ($GLOBALS['meta']['version_installee'] <= '1.927'){
		echo debut_page(_T('cinelist:commentaires'), "redacteurs", "commentaire_film");   
	}else{
		echo inc_commencer_page_dist(_T('cinelist:commentaires'), "redacteurs", "commentaire_film");
	}
	  
	echo debut_gauche();
	
	echo creer_colonne_droite();
	
	echo debut_droite(_T('cinemaliste:les_commentaire_sur_les_film'));
	//echo gros_titre($contexte['titre']);
	
	echo recuperer_fond('fonds/commentaire_film',$contexte,array('ajax'=>ajax));
	echo fin_gauche();
	echo fin_page();
}

?>

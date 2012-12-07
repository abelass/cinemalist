<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/commencer_page');
include_spip('inc/abstract_sql');
include_spip('public/assembler');

function exec_realisateurs(){
	
	if ($GLOBALS['meta']['version_installee'] <= '1.927'){
		echo debut_page(_T('cinemalist:cinemalist'), "realisateurs", "cinemalist");	
	}else{
		echo inc_commencer_page_dist(_T('cinemalist:cinemalist'), "realisateurs", "cinemalist");
	}
	
	echo debut_gauche(_T('cinemalist:cinemalist'));
	
	
	echo debut_boite_info();
		echo '<img src="../plugins/cinetic/img_pack/bobine.png" alt="logo" border="0">
		<p><strong>CinemaList</strong> permet de g&eacute;rer une base de donn&eacute;es de films.</p>';
	echo fin_boite_info();
	
	$raccourcis .= icone_horizontale(_T('cinemalist:Ajouter_un_film'), generer_url_ecrire("cinetic","comm=add","&"), find_in_path("img_pack/video-x-generic.png"),"creer.gif", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Consulter_les_films'), generer_url_ecrire("cinetic"), find_in_path("img_pack/video-x-generic.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_acteurs'), generer_url_ecrire("acteurs"), find_in_path("img_pack/system-users.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_realisteurs'), generer_url_ecrire("realisateurs"), find_in_path("img_pack/system-users.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_scenaristes'), generer_url_ecrire("scenaristes"), find_in_path("img_pack/system-users.png"),"", false);
	echo bloc_des_raccourcis($raccourcis);
	
	echo creer_colonne_droite();
	echo debut_droite(_T('cinemalist:les_realisateurs'));
	
	echo recuperer_fond('prive/realisateurs/realisateurs',$contexte,array('ajax'=>true));
	
	echo fin_gauche();
	echo fin_page();
}

?>

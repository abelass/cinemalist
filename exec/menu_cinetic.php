<?php
	$raccourcis .= icone_horizontale(_T('cinemalist:Ajouter_un_film'), generer_url_ecrire("cinetic","comm=add","&"), find_in_path("img_pack/video-x-generic.png"),"creer.gif", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Consulter_les_films'), generer_url_ecrire("cinetic"), find_in_path("img_pack/video-x-generic.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_acteurs'), generer_url_ecrire("acteurs"), find_in_path("img_pack/system-users.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_realisteurs'), generer_url_ecrire("realisateurs"), find_in_path("img_pack/system-users.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_scenaristes'), generer_url_ecrire("scenaristes"), find_in_path("img_pack/system-users.png"),"", false);
	echo bloc_des_raccourcis($raccourcis);
?>

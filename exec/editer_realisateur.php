<?php

if (!defined("_ECRIRE_INC_VERSION")) return;



function exec_editer_realisateur(){
	include_spip('inc/commencer_page');
	include_spip('inc/abstract_sql');
	include_spip('public/assembler');
	$contexte = array();
	
	$contexte["nom"] = _request("nom");
	$contexte["prenom"] = _request("prenom");
	$contexte["nationalite"] = _request("nationalite");
	$contexte["descriptif"] = _request("descriptif");
	$contexte["date_naissance"] = _request("date_naissance");
	$contexte["date_mort"] = _request("date_mort");
	$contexte["logo"] = _request("logo");
	$contexte["id_realisateur"] = _request("id_realisateur");
	$contexte["new"] = _request("new");
	$contexte["statut"] = _request("statut");
	$contexte["submit_formulaire"] = _request("submit_formulaire");
	$contexte["message"] = "";
	$contexte["message_erreur"] = "";
	$contexte["date_maj"] = date("Y-m-d H:i:s");
	
	$valeurs=array(
		'nom'=>$contexte["nom"],
		'prenom'=>$contexte["prenom"],	
		'nationalite'=>$contexte["nationalite"],
		'descriptif'=>$contexte["descriptif"],	
		'date_naissance'=>$contexte["date_naissance"],		
		'date_mort'=>$contexte["date_mort"],		
		'date_maj'=>$contexte["date_maj"],
		'statut'=>$contexte["statut"]	
		);
	
	if ($contexte["submit_formulaire"] == "Enregistrer" ){
		if ($contexte["new"] == "oui") {
			$contexte["id_realisateur"] =sql_insertq('spip_realisateurs',$valeurs);	
			
			$url='realisateur'.$contexte["id_realisateur"].','.$contexte["nom"].'-'.$contexte["prenom"];
				
			sql_updateq('spip_realisateurs',array('url'=>$url),'id_realisateur = '.$contexte['id_realisateur']);
			$contexte["message"] = "R&eacute;alisateur cr&eacute;&eacute; avec succ&eacute;s !";
			$contexte["new"] = "non";
		}else{
			$url='acteur'.$contexte["id_realisateur"].','.$contexte["nom"].'-'.$contexte["prenom"];;
			$valeurs['url']=$url;
			sql_updateq('spip_realisateurs',$valeurs,'id_realisateur = '.$contexte['id_realisateur']);
			$contexte["message"] = "R&eacute;alisateur mis &agrave; jour avec succ&eacute;s !";
		}
	}
	
	
	
	if ($contexte["new"] != "oui" && $contexte["id_realisateur"] > "0"){
		$sql_select = "SELECT * FROM spip_realisateurs WHERE id_realisateur = '".$contexte["id_realisateur"]."';";
		$res_select = spip_query($sql_select);
		$realisateur = spip_fetch_array($res_select);
		if (is_array($realisateur)) $contexte = array_merge($contexte, $realisateur);
		if ($contexte['prenom']){
			$contexte['nom'] = $contexte['prenom'].' '. $contexte['nom'];
		}
	}
	
		$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	// récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
	$extension = strrchr($_FILES['logo']['name'], '.');

	if (isset($_FILES['logo']) && in_array($extension, $extensions)){
		
		$destination = getcwd()."/../IMG/realisateurs/";
		$fichier = basename($_FILES['logo']['name']);
		$target = $destination . $fichier;
		
		while(file_exists($target)){
			$alea = rand(0,99999);
			$target = $destination . $alea . $fichier;
			$contexte["logo"] = "/IMG/realisateurs/".$alea.$fichier;
		}
		
		if(move_uploaded_file($_FILES['logo']['tmp_name'],$target )){
			$contexte["message_erreur"] = $contexte["message_erreur"];
			$sql_update = "UPDATE spip_realisateurs SET logo = '".addslashes($contexte["logo"])."' WHERE id_realisateur = '".$contexte["id_realisateur"]."';";
			spip_query($sql_update);
		}else //Sinon (la fonction renvoie FALSE).
		{
			$contexte["message_erreur"] = 'Echec de l\'upload de la photo !';
		}
		
	}
	
	if ($contexte["supprimer_photo"] == "realisateur-".$contexte["id_realisateur"]){
		$contexte["logo"] = "";
		$sql_update = "UPDATE spip_realisateurs SET logo = '".addslashes($contexte["logo"])."' WHERE id_realisateur = '".$contexte["id_realisateur"]."';";
		spip_query($sql_update);
	}
	
	if ($GLOBALS['meta']['version_installee'] <= '1.927'){
		echo debut_page(_T('cinemalist:cinemalist'), "realisateur", "cinemalist");	
	}else{
		echo inc_commencer_page_dist(_T('cinemalist:cinemalist'), "realisateur", "cinemalist");
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
	echo debut_droite(_T('cinemalist:edition_d_un_realisateur'));
	
	echo recuperer_fond('prive/realisateurs/editer_realisateur',$contexte);
	
	echo fin_gauche();
	echo fin_page();
}

?>

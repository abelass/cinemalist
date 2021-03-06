<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/commencer_page');
include_spip('inc/abstract_sql');
include_spip('public/assembler');

function exec_editer_scenariste(){


	
	$contexte = array();
	
	$contexte["nom"] = _request("nom");
	$contexte["prenom"] = _request("prenom");
	$contexte["nationalite"] = _request("nationalite");
	$contexte["descriptif"] = _request("descriptif");
	$contexte["date_naissance"] = _request("date_naissance");
	$contexte["date_mort"] = _request("date_mort");
	$contexte["logo"] = _request("logo");
	$contexte["id_scenariste"] = _request("id_scenariste");
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
			$contexte["id_scenariste"] =sql_insertq('spip_scenaristes',$valeurs);	
			
			$url='scenariste'.$contexte["id_scenariste"].','.$contexte["nom"].'-'.$contexte["prenom"];
				
			sql_updateq('spip_scenaristes',array('url'=>$url),'id_scenariste = '.$contexte['id_scenariste']);
			
			$contexte["message"] = "scenariste cr&eacute;&eacute; avec succ&eacute;s !";
			$contexte["new"] = "non";
		}else{
			$url='scenariste'.$contexte["id_scenariste"].','.$contexte["nom"].'-'.$contexte["prenom"];
			$valeurs['url']=$url;
			sql_updateq('spip_scenaristes',$valeurs,'id_scenariste = '.$contexte['id_scenariste']);
			$contexte["message"] = "scenariste mis &agrave; jour avec succ&eacute;s !";
		}
	}
	
	if ($contexte["new"] != "oui" && $contexte["id_scenariste"] > "0"){
		$sql_select = "SELECT * FROM spip_scenaristes WHERE id_scenariste = '".$contexte["id_scenariste"]."';";
		$res_select = spip_query($sql_select);
		$scenariste = sql_fetch($res_select);
		if (is_array($scenariste)) $contexte = array_merge($contexte, $scenariste);
		if ($contexte['prenom']){
			$contexte['nom'] = $contexte['prenom'].' '. $contexte['nom'];
		}
	}
	
	$extensions = array('.png', '.gif', '.jpg', '.jpeg');
	// récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
	$extension = strrchr($_FILES['logo']['name'], '.');

	if (isset($_FILES['logo']) && in_array($extension, $extensions)){
		spip_log('Logo scenariste envoyé','cinemalist');
		$destination = getcwd()."/../IMG/scenaristes/";
		$fichier = basename($_FILES['logo']['name']);
		$target = $contexte["logo"] = $destination . $fichier;
		spip_log('destination :'.$target,'cinemalist');
		while(file_exists($target)){
			$alea = rand(0,99999);
			$target = $destination . $alea . $fichier;
			$contexte["logo"] = "/IMG/scenaristes/".$alea.$fichier;
		}
		spip_log('destination ok :'.$target,'cinemalist');
		if(move_uploaded_file($_FILES['logo']['tmp_name'],$target )){
			$contexte["message_erreur"] = $contexte["message_erreur"];
			spip_log('Copie du ficheier logo OK','cinemalist');
			$sql_update = "UPDATE spip_scenaristes SET logo = '".addslashes($contexte["logo"])."' WHERE id_scenariste = '".$contexte["id_scenariste"]."';";
			spip_query($sql_update);
		}else //Sinon (la fonction renvoie FALSE).
		{
			$contexte["message_erreur"] = 'Echec de l\'upload de la photo !';
			spip_log('Echec de l\'upload de la photo !','cinemalist');
		}
		
	}
	
	if ($contexte["supprimer_photo"] == "scenariste-".$contexte["id_scenariste"]){
		$contexte["logo"] = "";
		$sql_update = "UPDATE spip_scenaristes SET logo = '".addslashes($contexte["logo"])."' WHERE id_scenariste = '".$contexte["id_scenariste"]."';";
		spip_query($sql_update);
	}
	
	if ($GLOBALS['meta']['version_installee'] <= '1.927'){
		echo debut_page(_T('cinemalist:cinemalist'), "scenariste", "cinemalist");	
	}else{
		echo inc_commencer_page_dist(_T('cinemalist:cinemalist'), "scenariste", "cinemalist");
	}
	
	echo debut_gauche(_T('cinemalist:cinemalist'));
	
	
	echo debut_boite_info();
		echo '<img src="../plugins/cinetic/img_pack/bobine.png" alt="logo" border="0">
		<p><strong>CinemaList</strong> permet de g&eacute;rer une base de donn&eacute;es de films.</p>';
	echo fin_boite_info();
	
	$raccourcis .= icone_horizontale(_T('cinemalist:Ajouter_un_film'), generer_url_ecrire("cinetic","comm=add","&"), find_in_path("img_pack/video-x-generic.png"),"creer.gif", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Consulter_les_films'), generer_url_ecrire("cinetic"), find_in_path("img_pack/video-x-generic.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_scenaristes'), generer_url_ecrire("scenaristes"), find_in_path("img_pack/system-users.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_realisteurs'), generer_url_ecrire("realisateurs"), find_in_path("img_pack/system-users.png"),"", false);
	$raccourcis .= icone_horizontale(_T('cinemalist:Gerer_les_scenaristes'), generer_url_ecrire("scenaristes"), find_in_path("img_pack/system-users.png"),"", false);
	echo bloc_des_raccourcis($raccourcis);
	
	echo creer_colonne_droite();
	echo debut_droite(_T('cinemalist:edition_d_un_scenariste'));
	
	echo recuperer_fond('prive/scenaristes/editer_scenariste',$contexte);
	
	echo fin_gauche();
	echo fin_page();
}

?>

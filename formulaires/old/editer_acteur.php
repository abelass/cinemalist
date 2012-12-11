<?php

if (!defined("_ECRIRE_INC_VERSION")) return;

include_spip('inc/commencer_page');
include_spip('inc/abstract_sql');
include_spip('public/assembler');



function formulaires_editer_acteur_charger_dist($id_acteur=''){

    $nom = _request("nom");
    $prenom = _request("prenom");
    $nationalite = _request("nationalite");
    $descriptif = _request("descriptif");
    $date_naissance= _request("date_naissance");
    $date_mort = _request("date_mort");
    //$contexte["logo"] = _request("logo");
    $new = _request("new");
    $statut= _request("statut");
    $submit_formulaire = _request("submit_formulaire");
    $date_maj = date("Y-m-d H:i:s");
    $supprimer_photo = _request('supprimer_photo');
    $url='acteur'.$id_acteur.','.$nom.'-'.$prenom;
    
    
    
    $valeurs=array(
        'nom'=>$nom,
        'prenom'=>$prenom,  
        'nationalite'=>$nationalite,
        'descriptif'=>$descriptif,  
        'date_naissance'=>$date_naissance,      
        'date_mort'=>$date_mort,        
        'date_maj'=>$date_maj,
        'statut'=>$statut   
        );

    if ($new != "oui" && $id_acteur > "0"){
        $sql_select = "SELECT * FROM spip_acteurs WHERE id_acteur = '".$id_acteur."';";
        $res_select = spip_query($sql_select);
        $acteur = spip_fetch_array($res_select);
        if (is_array($acteur)) $valeurs = array_merge($valeurs, $acteur);
        
        if ($valeurs['prenom']){
            $valeurs['nom'] = $valeurs['prenom'].' '. $valeurs['nom'];
        }
    }

    return $valeurs;
}


function formulaires_editer_acteur_verifier_dist($id_acteur=''){
    $erreurs=array();
    
    //if(!_request('commentaire'))$erreurs['commentaire']=_T("info_obligatoire");
    
    return $erreurs;
}


function formulaires_editer_acteur_traiter_dist($id_acteur=''){
    $nom = _request("nom");
    $prenom = _request("prenom");
    $nationalite = _request("nationalite");
    $descriptif = _request("descriptif");
    $date_naissance= _request("date_naissance");
    $date_mort = _request("date_mort");
    //$contexte["logo"] = _request("logo");
    $new = _request("new");
    $statut= _request("statut");
    $submit_formulaire = _request("submit_formulaire");
    $date_maj = date("Y-m-d H:i:s");
    $supprimer_photo = _request('supprimer_photo');
    $url='acteur'.$id_acteur.','.$nom.'-'.$prenom;
    
    
    
    $valeurs=array(
        'nom'=>$nom,
        'prenom'=>$prenom,  
        'nationalite'=>$nationalite,
        'descriptif'=>$descriptif,  
        'date_naissance'=>$date_naissance,      
        'date_mort'=>$date_mort,        
        'date_maj'=>$date_maj,
        'statut'=>$statut   
        );
    $extensions = array('.png', '.gif', '.jpg', '.jpeg');
    // récupère la partie de la chaine à partir du dernier . pour connaître l'extension.
    $extension = strrchr($_FILES['logo']['name'], '.');

    if (isset($_FILES['logo']) && in_array($extension, $extensions)){
        
        $destination = getcwd()."/../IMG/acteurs/";
        
        $fichier = basename($_FILES['logo']['name']);
        $target = $valeurs["logo"] = $destination . $fichier;
        
        while(file_exists($target)){
            $alea = rand(0,99999);
            $target = $destination . $alea . $fichier;
            $valeurs["logo"] = "/IMG/acteurs/".$alea.$fichier;
        }
        
        if(move_uploaded_file($_FILES['logo']['tmp_name'],$target )){
            $valeurs["message_erreur"] = $valeurs["message_erreur"];
            $sql_update = "UPDATE spip_acteurs SET logo = '".addslashes($contexte["logo"])."' WHERE id_acteur = '".$contexte["id_acteur"]."';";
            spip_query($sql_update);
        }else //Sinon (la fonction renvoie FALSE).
        {
            $valeurs["message_erreur"] = 'Echec de l\'upload de la photo !';
        }
        
    }
    
    if ($supprimer_photo == "acteur-".$d_acteur){
        $contexte["logo"] = "";
        $sql_update = "UPDATE spip_acteurs SET logo = '".addslashes($valeurs["logo"])."' WHERE id_acteur = '".$id_acteur."';";
        spip_query($sql_update);
    }
    

    if ($submit_formulaire == "Enregistrer" ){
        if ($new == "oui") {
        
            $id_acteur =sql_insertq('spip_acteurs',$valeurs);
            $url='acteur'.$id_acteur.'-'.$nom.'-'.$prenom;
                
            sql_updateq('spip_acteurs',array('url'=>$url),'id_acteur = '.$id_acteur);
            
            $valeurs["message"] = "Acteur cr&eacute;&eacute; avec succ&eacute;s !";
            $valeurs["new"] = "non";
        }else{
            $valeurs['url']=$url;
            sql_updateq('spip_acteurs',$valeurs,'id_acteur = '.$id_acteur);
            $valeurs["message_ok"] = "Acteur mis &agrave; jour avec succ&eacute;s !";
        }
    }
    include_spip('inc/invalideur');
    suivre_invalideur("id='id_acteur/a$id_acteur'");
    return $valeurs;
}

?>
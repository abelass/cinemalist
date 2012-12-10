<?php

if (!defined("_ECRIRE_INC_VERSION")) return;


function formulaires_editer_realisateur_charger_dist($id_realisateur=''){

    $nom = _request("nom");
    $prenom = _request("prenom");
    $nationalite = _request("nationalite");
    $descriptif = _request("descriptif");
    $date_naissance= _request("date_naissance");
    $date_mort = _request("date_mort");
    $contexte["logo"] = _request("logo");
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
        


    if ($new != "oui" && $id_realisateur > "0"){
        $realisateur=sql_fetsel('*','spip_realisateurs','id_realisateur = '.$id_realisateur);
        if (is_array($realisateur)) $valeurs = array_merge($valeurs, $realisateur);
        
        if ($valeurs['prenom']){
            $valeurs['nom'] = $valeurs['prenom'].' '. $valeurs['nom'];
        }
    }

    return $valeurs;
}


function formulaires_editer_realisateur_verifier_dist($id_realisateur=''){
    $erreurs=array();
    
    //if(!_request('commentaire'))$erreurs['commentaire']=_T("info_obligatoire");
    
    return $erreurs;
}


function formulaires_editer_realisateur_traiter_dist($id_realisateur=''){
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
        
if ($submit_formulaire == "Enregistrer" ){
        if ($new == "oui") {
            $id_realisateur =sql_insertq('spip_realisateurs',$valeurs); 
            
            $url='realisateur'.$id_realisateur.','.$nom.'-'.$prenom;
                
            sql_updateq('spip_realisateurs',array('url'=>$url),'id_realisateur = '.$id_realisateur);
            $valeurs["message_ok"] = "R&eacute;alisateur cr&eacute;&eacute; avec succ&eacute;s !";
            $new = "non";
        }else{
            $url='acteur'.$id_realisateur.','.$nom.'-'.$prenom;
            $valeurs['url']=$url;
            sql_updateq('spip_realisateurs',$valeurs,'id_realisateur = '.$id_realisateur);
            $valeurs["message_ok"] = "R&eacute;alisateur mis &agrave; jour avec succ&eacute;s !";
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
            $valeurs["logo"] = "/IMG/realisateurs/".$alea.$fichier;
        }
        
        if(move_uploaded_file($_FILES['logo']['tmp_name'],$target )){
            $valeurs["message_erreur"] = $valeurs["message_erreur"];
            $sql_update = "UPDATE spip_realisateurs SET logo = '".addslashes($valeurs["logo"])."' WHERE id_realisateur = '".$id_realisateur."';";
            spip_query($sql_update);
        }else //Sinon (la fonction renvoie FALSE).
        {
            $valeurs["message_erreur"] = 'Echec de l\'upload de la photo !';
        }
        
    }
    
    if ($supprimer_photo == "realisateur-".$id_realisateur){
        $valeurs["logo"] = "";
        $sql_update = "UPDATE spip_realisateurs SET logo = '".addslashes($valeurs["logo"])."' WHERE id_realisateur = '".$id_realisateur."';";
        spip_query($sql_update);
    }



    include_spip('inc/invalideur');
    suivre_invalideur("id='id_realisateur/a$id_realisateur'");
    return $valeurs;
}

?>
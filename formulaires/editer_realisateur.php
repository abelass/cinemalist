<?php
/**
 * Plugin Cinemalist
 * (c) 2012 Rainer Muller
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

include_spip('inc/actions');
include_spip('inc/editer');

/**
 * Identifier le formulaire en faisant abstraction des parametres qui ne representent pas l'objet edite
 */
function formulaires_editer_realisateur_identifier_dist($id_realisateur='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return serialize(array(intval($id_realisateur)));
}

/**
 * Declarer les champs postes et y integrer les valeurs par defaut
 */
function formulaires_editer_realisateur_charger_dist($id_realisateur='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	$valeurs = formulaires_editer_objet_charger('realisateur',$id_realisateur,'',$lier_trad,$retour,$config_fonc,$row,$hidden);
	return $valeurs;
}

/**
 * Verifier les champs postes et signaler d'eventuelles erreurs
 */
function formulaires_editer_realisateur_verifier_dist($id_realisateur='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return formulaires_editer_objet_verifier('realisateur',$id_realisateur);
}

/**
 * Traiter les champs postes
 */
function formulaires_editer_realisateur_traiter_dist($id_realisateur='new', $retour='', $lier_trad=0, $config_fonc='', $row=array(), $hidden=''){
	return formulaires_editer_objet_traiter('realisateur',$id_realisateur,'',$lier_trad,$retour,$config_fonc,$row,$hidden);
}


?>
<?php
/**
 * Plugin Cinemalist
 * (c) 2012 - 2018 Rainer Müller
 * Licence GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

// declaration vide pour ce pipeline.
function cinemalist_autoriser(){}


// -----------------
// Objet films


// bouton de menu
function autoriser_films_menu_dist($faire, $type, $id, $qui, $opts){
	return true;
}

// bouton d'outils rapides
function autoriser_filmcreer_menu_dist($faire, $type, $id, $qui, $opts){
	return autoriser('creer', 'film', '', $qui, $opts);
}

// creer
function autoriser_film_creer_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

// voir les fiches completes
function autoriser_film_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}

// modifier
function autoriser_film_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

// supprimer
function autoriser_film_supprimer_dist($faire, $type, $id, $qui, $opt) {
	return $qui['statut'] == '0minirezo' AND !$qui['restreint'];
}


// -----------------
// Objet acteurs


// bouton de menu
function autoriser_acteurs_menu_dist($faire, $type, $id, $qui, $opts){
	return true;
}

// bouton d'outils rapides
function autoriser_acteurcreer_menu_dist($faire, $type, $id, $qui, $opts){
	return autoriser('creer', 'acteur', '', $qui, $opts);
}

// creer
function autoriser_acteur_creer_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

// voir les fiches completes
function autoriser_acteur_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}

// modifier
function autoriser_acteur_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

// supprimer
function autoriser_acteur_supprimer_dist($faire, $type, $id, $qui, $opt) {
	return $qui['statut'] == '0minirezo' AND !$qui['restreint'];
}


// -----------------
// Objet realisateurs


// bouton de menu
function autoriser_realisateurs_menu_dist($faire, $type, $id, $qui, $opts){
	return true;
}

// bouton d'outils rapides
function autoriser_realisateurcreer_menu_dist($faire, $type, $id, $qui, $opts){
	return autoriser('creer', 'realisateur', '', $qui, $opts);
}

// creer
function autoriser_realisateur_creer_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

// voir les fiches completes
function autoriser_realisateur_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}

// modifier
function autoriser_realisateur_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

// supprimer
function autoriser_realisateur_supprimer_dist($faire, $type, $id, $qui, $opt) {
	return $qui['statut'] == '0minirezo' AND !$qui['restreint'];
}


// -----------------
// Objet scenaristes


// bouton de menu
function autoriser_scenaristes_menu_dist($faire, $type, $id, $qui, $opts){
	return true;
}

// bouton d'outils rapides
function autoriser_scenaristecreer_menu_dist($faire, $type, $id, $qui, $opts){
	return autoriser('creer', 'scenariste', '', $qui, $opts);
}

// creer
function autoriser_scenariste_creer_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

// voir les fiches completes
function autoriser_scenariste_voir_dist($faire, $type, $id, $qui, $opt) {
	return true;
}

// modifier
function autoriser_scenariste_modifier_dist($faire, $type, $id, $qui, $opt) {
	return in_array($qui['statut'], array('0minirezo', '1comite'));
}

// supprimer
function autoriser_scenariste_supprimer_dist($faire, $type, $id, $qui, $opt) {
	return $qui['statut'] == '0minirezo' AND !$qui['restreint'];
}

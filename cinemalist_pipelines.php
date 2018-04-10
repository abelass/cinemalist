<?php

if (!defined('_ECRIRE_INC_VERSION')) return;



	function cinemalist_affiche_milieu($flux){

				$texte = "";
		$e = trouver_objet_exec($flux['args']['exec']);



		// films sur les acteurs, articles, realisateurs, scenaristes
		if (!$e['edition'] AND in_array($e['type'], array('article'))) {
				$texte .= recuperer_fond('prive/objets/editer/liens', array(
						'table_source' => 'films',
						'objet' => $e['type'],
						'id_objet' => $flux['args'][$e['id_table_objet']]
				));
		}
		// acteurs sur les films
		if (!$e['edition'] AND in_array($e['type'], array('film'))) {
				$texte .= recuperer_fond('prive/objets/editer/liens', array(
						'table_source' => 'acteurs',
						'objet' => $e['type'],
						'id_objet' => $flux['args'][$e['id_table_objet']]
				));
		}
		// realisateurs sur les films
		if (!$e['edition'] AND in_array($e['type'], array('film'))) {
				$texte .= recuperer_fond('prive/objets/editer/liens', array(
						'table_source' => 'realisateurs',
						'objet' => $e['type'],
						'id_objet' => $flux['args'][$e['id_table_objet']]
				));
		}
		// scenaristes sur les films
		if (!$e['edition'] AND in_array($e['type'], array('film'))) {
				$texte .= recuperer_fond('prive/objets/editer/liens', array(
						'table_source' => 'scenaristes',
						'objet' => $e['type'],
						'id_objet' => $flux['args'][$e['id_table_objet']]
				));
		}


		if ($texte) {
				if ($p=strpos($flux['data'],"<!--affiche_milieu-->"))
						$flux['data'] = substr_replace($flux['data'],$texte,$p,0);
				else
						$flux['data'] .= $texte;
		}



		return $flux;
	}

/**
 * Optimiser la base de donnees en supprimant les liens orphelins
 * de l'objet vers quelqu'un et de quelqu'un vers l'objet.
 *
 * @param int $n
 * @return int
 */
function cinemalist_optimiser_base_disparus($flux){
		include_spip('action/editer_liens');
		$flux['data'] += objet_optimiser_liens(array('film'=>'*', 'acteur'=>'*', 'realisateur'=>'*', 'scenariste'=>'*'),'*');
		return $flux;
}

function cinemalist_jqueryui_plugins($scripts){
	$scripts[] = 'jquery.ui.autocomplete';
	return $scripts;
}


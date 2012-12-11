<?php


/*
	function cinemalist_declarer_url_objets($array){
   	 	$array[] = 'acteur|film|scenariste|realisateur';  
  	 	   	 	 	 	
   	 return $array;
	}*/

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

    /*// article sur les films
    if (!$e['edition'] AND in_array($e['type'], array('film'))) {
        $texte .= recuperer_fond('prive/objets/editer/liens', array(
            'table_source' => 'articles',
            'objet' => $e['type'],
            'id_objet' => $flux['args'][$e['id_table_objet']]
        ));
    }*/

    if ($texte) {
        if ($p=strpos($flux['data'],"<!--affiche_milieu-->"))
            $flux['data'] = substr_replace($flux['data'],$texte,$p,0);
        else
            $flux['data'] .= $texte;
    }
        
		/*if ($flux['args']['exec'] == "article"){
			$flux['data'] = 
			$liaison_ok = false;
			$id_film = _request('id_film');
			$todo = _request('cinetic_action');
			if (isset($todo)){
				switch ($todo) {
					case 'lier':
						$query_test = "SELECT id FROM spip_lien_film_article WHERE id_article = '".$flux['args']['id_article']."'";
						$result_test = mysql_query($query_test);
						if (mysql_num_rows($result_test) >= 1) {
							$flux['data'] .= "Le lien existe d&eacute;j&agrave; !";
						}
						else{
							$query_insertion = "INSERT INTO spip_lien_film_article (id, id_article, id_film) VALUES ('', '".$flux['args']['id_article']."','".$id_film."')";
							$result_insertion = mysql_query($query_insertion);
							if (!($result_insertion)){
								$flux['data'] .= "Liaison &eacute;chou&eacute;e..";
							}
						}
						break;
					
					case 'delier':
						$query_test = "DELETE FROM spip_lien_film_article WHERE id_article = '".$flux['args']['id_article']."'";
						$result_test = mysql_query($query_test);
						break;
					
					case 'autre':
						$flux['data'] .= "Autre...";
						break;
				}
			}
			
			$query_lien = "SELECT * FROM spip_lien_film_article WHERE id_article = '".$flux['args']['id_article']."'";
			$result_lien = mysql_query($query_lien);
			if (mysql_num_rows($result_lien) >= 1){
				while ($row_lien = sql_fetch($result_lien)) {
					$query_titre = "SELECT * FROM spip_films WHERE id_film = '".$row_lien['id_film']."' order by title";
					$result_titre = mysql_query($query_titre);
					while ($row_titre = sql_fetch($result_titre))
					{
						$titre_film = $row_lien['id_film']." - ".$row_titre['title'];
					}
				}
				$liaison_ok = true;
			}
			
			$flux['data'] .= debut_cadre_couleur(find_in_path('img_pack/mini_bobine.png'),true,'',_T('cinemalist:cinemalist'),'lien_film_'.$flux['args']['id_article'],'lien_film');
			$flux['data'] .= "<br />";
			if ($liaison_ok){	
				$flux['data'] .= "<b>"._T('cinemalist:cette_critique_est_liee_au_film_suivant')."<br />";
				
				$flux['data'] .= "".$titre_film."</b>";
				$flux['data'] .= '<form action="'.$_PHP_SELF.'" method="post">';
				$flux['data'] .= "<input type='hidden' name='cinetic_action' value='delier' >";
				$flux['data'] .= '<br /><input type="submit" value="Supprimer le lien." />';
				$flux['data'] .= "</form>";
			}
			else{
				$flux['data'] .= "<b>"._T('cinemalist:a_quel_film_voulez-vous_lier_cette_critique')."</b>";
				$flux['data'] .= '<form action="'.$_PHP_SELF.'" method="post" >';
				$flux['data'] .= '<select name="id_film">';
				$sql = 'SELECT * FROM `spip_films` order by title';
				$result_listearticle = mysql_query($sql);
				while ($row = mysql_fetch_array($result_listearticle)) {
					$flux['data'] .= '<option value="'.$row['id_film'].'" label="zorglub">'.$row['id_film'].'&nbsp;-&nbsp;'.$row['title'].'</option>';
				}
				$flux['data'] .= '</select>';
				$flux['data'] .= "<input type='hidden' name='cinetic_action' value='lier' >";
				$flux['data'] .= '<br /><input type="submit" value="Ok" size="10" />';
				$flux['data'] .= '</form>';
			}
			
			$flux['data'] .= fin_cadre_couleur(true);
			$flux['data'] .= "<br />";
		}*/
				
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

?>

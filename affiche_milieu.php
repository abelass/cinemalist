<?php
function cinetic_affichemilieu($flux){
	if ($flux['args']['exec'] == "articles"){
		$flux['data'] = 
		$liaison_ok = false;
		$id_film = _request('id_film');
		$todo = _request('cinetic_action');
		if (isset($todo)){
			switch ($todo) {
				case 'lier':
					$query_test = "SELECT id FROM lien_film_article WHERE id_article = '".$flux['args']['id_article']."'";
					$result_test = mysql_query($query_test);
					if (mysql_num_rows($result_test) >= 1) {
						$flux['data'] .= "Le lien existe d&eacute;j&agrave; !";
					}
					else{
						$query_insertion = "INSERT INTO lien_film_article (id, id_article, id_film) VALUES ('', '".$flux['args']['id_article']."','".$id_film."')";
						$result_insertion = mysql_query($query_insertion);
						if (!($result_insertion)){
							$flux['data'] .= "Liaison &eacute;chou&eacute;e..";
						}
					}
					break;
				
				case 'delier':
					$query_test = "DELETE FROM lien_film_article WHERE id_article = '".$flux['args']['id_article']."'";
					$result_test = mysql_query($query_test);
					break;
				
				case 'autre':
					$flux['data'] .= "Autre...";
					break;
			}
		}
		
		$query_lien = "SELECT * FROM lien_film_article WHERE id_article = '".$flux['args']['id_article']."'";
		$result_lien = mysql_query($query_lien);
		if (mysql_num_rows($result_lien) >= 1){
			while ($row_lien = mysql_fetch_array($result_lien)) {
				$query_titre = "SELECT * FROM spip_films WHERE id_film = '".$row_lien['id_film']."' order by title";
				$result_titre = mysql_query($query_titre);
				while ($row_titre = mysql_fetch_array($result_titre))
				{
					$titre_film = $row_lien['id_film']." - ".$row_titre['title'];
				}
			}
			$liaison_ok = true;
		}
		
		$flux['data'] .= debut_cadre_couleur(find_in_path('img_pack/bobine.png'),'','',_T('cinemalist:a_quel_film_voulez-vous_lier_cette_critique'),'lien_film_'.$flux['args']['id_article'],'lien_film');
		$flux['data'] .= "<br />";
		if ($liaison_ok){	
			$flux['data'] .= "<b>Cette critique est li&eacute;e au film suivant :<br />";
			
			$flux['data'] .= "".utf8_encode ( $titre_film)."</b>";
			$flux['data'] .= '<form action="'.$_PHP_SELF.'" method="post">';
			$flux['data'] .= "<input type='hidden' name='cinetic_action' value='delier' >";
			$flux['data'] .= '<br /><input type="submit" value="Supprimer le lien." />';
			$flux['data'] .= "</form>";
		}
		else{
			$flux['data'] .= "<b>A quel film voulez-vous lier cette critique?</b>";
			$flux['data'] .= '<form action="'.$_PHP_SELF.'" method="post" >';
			$flux['data'] .= '<select name="id_film">';
			$sql = 'SELECT * FROM `spip_films` order by title';
			$result_listearticle = mysql_query($sql);
			while ($row = mysql_fetch_array($result_listearticle)) {
				$flux['data'] .= '<option value="'.$row['id_film'].'" label="zorglub">'.$row['id_film'].'&nbsp;-&nbsp;'.utf8_encode ( $row['title']).'</option>';
			}
			$flux['data'] .= '</select>';
			$flux['data'] .= "<input type='hidden' name='cinetic_action' value='lier' >";
			$flux['data'] .= '<br /><input type="submit" value="Ok" size="10" />';
			$flux['data'] .= '</form>';
		}
		
		$flux['data'] .= fin_cadre_couleur();
		$flux['data'] .= "<br />";
	}
	return $flux;
}
?>

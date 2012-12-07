<?php

	function exec_creer_urls(){
	
	$objet=_request('objet');
	
	$table='spip_'.$objet.'s';
	$id_objet = 'id_'.$objet;
	
	if($objet){
	$sql=sql_select('*',$table);
	
	while($row=sql_fetch($sql)){
	if($objet!='film')$url=$objet.$row[$id_objet].'-'.trim($row["nom"]).'-'.trim($row["prenom"]);
	else $url='film'.$row[$id_objet].'-'.trim($row["title"]);
	sql_updateq($table,array('url'=>trim($url)),$id_objet.' = '.$row[$id_objet]);
		}
	
}

	}

?>
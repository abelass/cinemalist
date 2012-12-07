<?php

// Filtre qui permet de récouper et redimensionner une imag/log

function image_reduire_recadre($img, $largeur, $hauteur, $position='center') {
       include_spip('inc/filtres_images');
       if ($img!='IMG/'){
            list ($ret["hauteur"],$ret["largeur"]) = taille_image($img);
            $ratio_x = $ret["largeur"]/$largeur;
            $ratio_y = $ret["hauteur"]/$hauteur;
            $ratio   = ($ratio_x <= $ratio_y) ? $ratio_x : $ratio_y;
            return image_recadre(image_reduire_par($img, $ratio), $largeur, $hauteur, $position);
            }
}

// filtre transitoire pour intégrer les prenoms dans le nom
function transformer_prenom($prenom='',$nom,$id,$objet){
	if($prenom){
		$set=array('nom'=>$prenom.' '.$nom,'prenom'=>'');
		sql_updateq('spip_'.$objet.'s',$set,'id_'.$objet.'='.$id);
		return $prenom;
	}
}
?>

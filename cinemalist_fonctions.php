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

function unhtmlentities($string)
    {
   // replace numeric entities
   $string = preg_replace('~&#x([0-9a-f]+);~ei', 'chr(hexdec("\\1"))', $string);
   $string = preg_replace('~&#([0-9]+);~e', 'chr(\\1)', $string);
   // replace literal entities
   $trans_tbl = get_html_translation_table(HTML_ENTITIES);
   $trans_tbl = array_flip($trans_tbl);
   return strtr($string, $trans_tbl);
    }
/*Ã© ---> é
Ã´ ---> ô
Ã« ---> ë
Ã¨ ---> è
Ã ----> à
Ãª ----> ê
â€™ ---> '*/
function filtrer_iso($string){
   // replace numeric entities
   $patterns = array(
        '/Ã©/', //remplace le tag
        '/Ã´/',
        '/Ã«/',
        '/Ã¨/',
        '/Ã/',
        '/Ãª/',
        '/â€™/',
        );
   $replace = array(
        'é', //remplace le tag
        'ô',
        'ë',
        'è',
        'à',
        'ê',
        "'",
        );        
   $return = preg_replace($patterns,$replace, $string);

   return $return;
    } 
function JsToDb( $string)
{
    
       $patterns = array(
        '/&Atilde;&copy;/', //remplace le tag
        '/&Atilde;&uml;/',
        '/&Atilde;&ordf;/',
        '/&Atilde;&laquo/',
        '/&Atilde;&nbsp;/',
        '/&Atilde;&curren;/',
        '/&Atilde;&cent;/',
        '/&Atilde;&sup1;/',   
        '/&Atilde;&raquo;/', 
        '/&Atilde;&frac14;/',
        '/&Atilde;&acute;/',  
        '/&Atilde;&para;/', 
        '/&Atilde;&reg;/', 
        '/&Atilde;&macr;/', 
        '/&Atilde;&sect;/',                                                                         
        );
        
    $replace = array(
        '&eacute;', //remplace le tag
        'è',
        '&ecirc;',
        '&euml;',
        '&agrave;',
        '&auml;',
        '&acirc;',
        '&ugrave;', 
        '&ucirc;',  
        '&uuml;',
        '&ocirc;',  
        '&ouml;',  
        '&icirc;', 
        '&iuml;', 
        '&ccedil;',                                                               
        );         



      $string= preg_replace($patterns,$replace, $string);
    return  $string;
}   

function rediriger_ancien_url($url){

    $explode=explode(',',$url);
    $objets=array(realisateur,scenariste,acteur,film);

    foreach($objets AS $objet){
        if(preg_match('*'.$objet.'*',$explode[0])){
            $id_objet=str_replace($objet,'',$explode[0]);
            $url_new=str_replace('.html','', $url);
            sql_insertq('spip_urls',array('type'=>$objet,'id_objet'=>$id_objet,'url'=>$url_new,'date'=>'2007-11-24 16:02:47'));
            $redirect=generer_url_entite($objet,$id_objet);
            header("location:$url");
        }
        
    }
}
?>

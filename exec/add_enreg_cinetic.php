<?php

if(empty($_POST['title'])){
echo 'Le fim n\'a pas &eacute;t&eacute; enregistr&eacute; car aucun titre n\'est renseign&eacute;. ';
}
else{




// ***********************************************************
// **********  FORMAT DE DATES   *****************************
// ***********************************************************

// ***********************************************************
// **********  FORMAT DE DATES   *****************************
// ***********************************************************

function datetoFR($date){
if(!empty($date)){
list($year, $month, $day) = explode("-", $date);
return $lastmodified = "$day/$month/$year";
}
else{
return $date;
}
}

function datetosql($date){


list($day, $month, $year) = explode("/", $date);
if(!empty($date)){

if(strlen($month)!=2){
	$month="0".$month;
	$month=substr($month, 0,2);
}
if(strlen($day)!=2){
	$day="0".$day;
	$day=substr($day, 0,2);
}
if(strlen($year)!=4){
	$year="20".$year;
	$year=substr($year, 0,4);
}
return $lastmodified = "$year-$month-$day";
}
else{
return $date;
}
}


//---------------------------------------------
// DEFINITION DES VARIABLES LIEES AU FICHIER
//---------------------------------------------

$nom_file = $_FILES['logo']['name'];
$taille = $_FILES['logo']['size'];
$tmp = $_FILES['logo']['tmp_name'];

$target = chemin('/IMG/logos_films/'); // Repertoire cible
$extensions = array('.jpg', '.JPG' , 'jpeg', 'JPEG'); // Extension du fichier sans le .
$ext = strtolower(substr($nom_file,'-4'));
$max_size = 100000; // Taille max en octets du fichier
$width_max = 600; // Largeur max de l'image en pixels
$height_max = 900;    // Hauteur max de l'image en pixels

// On v&eacute;rifie si le champ est rempli
    if($nom_file) {
        // On v&eacute;rifie l'extension du fichier
        if (!in_array($ext, $extensions)) {
            echo "L'extension du fichier n'est pas valide&nbsp;!\n";
            exit();
        }
        else {
           // On r&eacute;cup&egrave;re les dimensions du fichier
            $infos_img = getimagesize($tmp );
              
           // On v&eacute;rifie les dimensions et taille de l'image

            if(($infos_img[0] <= $width_max) && ($infos_img[1] <= $height_max) && ($taille  <= $max_size)){
             // Si c'est OK, on teste l'upload
			$rand= rand(1111111111, 9999999999);
			$interdit = array("?",",",";","!",":","�","*","�","�","�","�","�","�","�","$","}","]","@","^","&eacute;", "&egrave;", "�", "�", "�","&","~","#","{","[","|", "`", "\"", " ", "\\", "/");
			
			$nom= md5($_POST['title']).'_'.$rand.'_'.$ext;
			 if(move_uploaded_file($_FILES["logo"]["tmp_name"], $target.$nom)) {
             //if(rename($_FILES['logo']['tmp_name'],$target.$nom)) {
                   // Si upload OK alors on affiche le message de r&eacute;ussite
					$logo = $nom;
                }
                else {
                    // Sinon on affiche une erreur syst&egrave;me
                    echo '<b>Probl&egrave;me lors de l\'upload !</b>';
                    echo '<br><br>';
                }
            }
            else {
                // Sinon on affiche une erreur pour les dimensions et taille de l'image
                echo '<b>Probl&egrave;me dans les dimensions ou taille de l\'image !</b>';
                echo '<br><br>';
            }
        }
    }

$valeurs=array(
	'title'=>_request('title'),
	'title_VO'=>_request('title_VO'),	
	'annee'=>_request('annee'),
	'sortie_be'=>_request('sortie_be'),	
	'sortie_fr'=>_request('sortie_fr'),		
	'pays'=>_request('pays'),		
	'duree'=>_request('duree'),
	'budget'=>_request('budget'),	
	'scenes'=>_request('scenes'),
	'scenariste'=>_request('scenariste'),				
	'realisateur'=>_request('realisateur'),		
	'recompenses'=>_request('recompenses'),			
	'musique'=>_request('musique'),	
	'annonce'=>_request('annonce'),		
	'sortie'=>_request('sortie'),		
	'genre'=>_request('genre'),	
	'casting'=>_request('casting'),		
	'synopsis'=>_request('synopsis'),			
	'logo'=>$logo,	
	'sortie'=>_request('sortie'),		
	'genre'=>_request('genre'),						
	);
	
	$id_film=sql_insertq('spip_films',$valeurs);	
	
	$url='film'.$id_film.'-'._request("title");
	
	sql_updateq('spip_films',array('url'=>$url),'id_film='.$id_film);

echo "Le film a &eacute;t&eacute; ajout&eacute;";
}
?>
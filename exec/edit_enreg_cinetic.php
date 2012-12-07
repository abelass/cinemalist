<?php
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
if(!empty($date)){


list($day, $month, $year) = explode("/", $date);

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


if(empty($_POST['title'])){
echo 'Le fim n\'a pas &eacute;t&eacute; enregistr&eacute; car aucun Titre n\'est renseign&eacute;. ';
}
else{




if(empty($_POST["oldlogo"]) || ($_POST["deleted"]==1)){


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
}else
{
$logo = $_POST["oldlogo"]; 
}
//echo("UPDATE  spip_films SET title='".addslashes($_POST['title'])."' , title_VO='".addslashes($_POST['title_VO'])."' , annee='".addslashes($_POST['annee'])."' , realisateur='".addslashes($_POST['realisateur'])."' , pays='".addslashes($_POST['pays'])."' , dur&eacute;e='".addslashes($_POST['dur&eacute;e'])."' , production='".addslashes($_POST['production'])."' , distribution='".addslashes($_POST['distribution'])."' , scenariste='".addslashes($_POST['scenariste'])."' , photo='".addslashes($_POST['photo'])."' , musique='".addslashes($_POST['musique'])."' , montage='".addslashes($_POST['montage'])."' , sortie='".addslashes($_POST['sortie'])."' , genre='".addslashes($_POST['genre'])."' , casting='".addslashes($_POST['casting'])."' , scenario='".addslashes($_POST['scenario'])."' , logo='".$logo."' where id_film like '".$_GET["id_film"]."';");

$url='film'._request('id_film').'-'._request('title');
				

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
	'url'=>$url,							
	);
	
	
	sql_updateq('spip_films',$valeurs,'id_film='._request('id_film'));
	

echo "<p>Le film \"<strong><a href='?exec=cinetic&comm=edit&id_film=".$_GET["id_film"]."'>".$_POST['title']."</a></strong>\" a correctement &eacute;t&eacute; modifi&eacute;</p><p><a href='?exec=cinetic'>>> Retour &agrave; la liste des films<a/></p>";

    include_spip('inc/invalideur');
    suivre_invalideur("id='id_forum/a$id_article'");
}
?>
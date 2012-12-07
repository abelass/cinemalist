<?php
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
return $lastmodified = "$year-$month-$day";
}
else{
return $date;
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


$sql = "SELECT *  FROM  spip_films WHERE  id_film = '".$_GET["id_film"]."'";
$result = mysql_query($sql);
$row = mysql_fetch_object($result);

echo '<div style="height: 40px;" ><br />
'.definir_puce().'<a href="'.generer_url_ecrire('cinemalist_liaison','id_film='.$_GET["id_film"]).'" >Gérer les acteurs, scénaristes et réalisateur de ce film</a><br />
</div>';

?>


<form action="<?php echo $PHP_SELF; ?>?exec=cinetic&comm=edit_enreg&id_film=<?php echo $_GET["id_film"]; ?>" method="POST" enctype="multipart/form-data" name="from" class="form_cinetic">
<table width=100% border=0 cellpadding='4' cellspacing='2'>
<tr>
	<td class="tbl" >Titre du film</td>
	<td class="tbl" ><input name="title" value="<?php echo $row->title; ?>" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Titre en Vo</td>
	<td class="tbl" ><input name="title_VO" value="<?php echo $row->title_VO; ?>" class="trous" type="text"></td>
</tr>

<tr>
	<td class="tbl" >Ann&eacute;e</td>
	<td class="tbl" ><input name="annee" value="<?php echo $row->annee; ?>" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Sortie belge</td>
	<td class="tbl" ><input name="sortie_be" type="text" value="<?php echo $row->sortie_be; ?>" size="15" maxlength="10">
aaaa-mm-jj</td>
</tr>
<tr>
	<td class="tbl" >Sortie fran&ccedil;aise</td>
	<td class="tbl" ><input name="sortie_fr" type="text" value="<?php echo $row->sortie_fr; ?>" size="15" maxlength="10">
aaaa-mm-jj</td>
</tr>
<tr>
	<td class="tbl" >R&eacute;alisateur</td>
	<td class="tbl" ><input name="realisateur" value="<?php echo $row->realisateur; ?>" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Pays</td>
	<td class="tbl" ><input name="pays" value="<?php echo $row->pays; ?>" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Dur&eacute;e</td>
	<td class="tbl" ><input name="duree" value="<?php echo $row->duree; ?>" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Budget</td>
	<td class="tbl" ><input name="budget" value="<?php echo $row->budget; ?>" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Meilleurs sc&egrave;nes</td>
	<td class="tbl" ><textarea name="scenes" rows="3" cols="25" class="trous"><?php echo $row->scenes; ?></textarea></td>
</tr>
<tr>
	<td class="tbl" >Sc&eacute;nariste</td>
	<td class="tbl" ><textarea name="scenariste" rows="3" cols="25" class="trous"><?php echo $row->scenariste; ?></textarea></td>
</tr>
<tr>
	<td class="tbl" >R&eacute;compenses</td>
	<td class="tbl" ><textarea name="recompenses" rows="3" cols="25" class="trous"><?php echo $row->recompenses; ?></textarea></td>
</tr>
<tr>
	<td class="tbl" >Musique</td>
	<td class="tbl" ><textarea name="musique" rows="3" cols="25" class="trous"><?php echo $row->musique; ?></textarea></td>
</tr>
<tr>
	<td class="tbl" >Bande annonce</td>
	<td class="tbl" ><input name="annonce" value="<?php echo $row->annonce; ?>" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Amazon</td>
	<td class="tbl" ><input name="sortie" value="<?php echo $row->sortie; ?>" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Genre</td>
	<td class="tbl" ><input name="genre" value="<?php echo $row->genre; ?>" class="trous" type="text"></td>
</tr>

<tr>
	<td class="tbl" >Casting</td>
	<td class="tbl" ><textarea name="casting" rows="5" cols="25" class="trous"><?php echo $row->casting; ?></textarea></td>
</tr>
<tr>
	<td class="tbl" >Synopsis</td>
	<td class="tbl" ><textarea name="synopsis" rows="7" cols="25" class="trous"><?php echo unhtmlentities($row->synopsis); ?></textarea></td>
</tr>

<tr>
	<td class="tbl" >Affiche</td>
	<td class="tbl" >
<?php
if(empty($row->logo)){
?>
<input type="file" name="logo" class="trous">
<?php
}
else{
echo '<img src="'.chemin('/IMG/logos_films/').$row->logo.'" alt="" width="150" border="0">';
echo '<input type="hidden" value="'.$row->logo.'" name="oldlogo" class="trous">';
echo '<input type="checkbox" name="deleted" value="1" />Effacer l\'image';
}
?>
</td>
</tr>

<tr>
	<td class="tbl" ></td>
	<td class="tbl" ><input value="Confirmer les modifications" class="bosses" type="submit"></td>
</tr>
</table>



</form>

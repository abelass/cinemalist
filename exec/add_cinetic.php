<form action="<?php echo $PHP_SELF; ?>?exec=cinetic&comm=add_enreg" method="POST" enctype="multipart/form-data" class="form_cinetic">
<table width=100% border=0 cellpadding='4' cellspacing='2'>
<tr>
	<td class="tbl" >Titre du film</td>
	<td class="tbl" ><input name="title" value="" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Titre en Vo</td>
	<td class="tbl" ><input name="title_VO" value="" class="trous" type="text"></td>
</tr>

<tr>
	<td class="tbl" >Ann&eacute;e</td>
	<td class="tbl" ><input name="annee" value="" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Sortie belge</td>
	<td class="tbl" ><input name="sortie_be" type="text" value="" size="15" maxlength="10">
	aaaa-mm-jj</td>
</tr>
<tr>
	<td class="tbl" >Sortie fran&ccedil;aise</td>
	<td class="tbl" ><input name="sortie_fr" type="text" value="" size="15" maxlength="10">
	  aaaa-mm-jj</td>
</tr>
<tr>
	<td class="tbl" >R&eacute;alisateur</td>
	<td class="tbl" ><input name="realisateur" value="" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Pays</td>
	<td class="tbl" ><input name="pays" value="" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Dur&eacute;e</td>
	<td class="tbl" ><input name="duree" value="" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Budget</td>
	<td class="tbl" ><input name="budget" value="" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Meilleurs sc&egrave;nes</td>
	<td class="tbl" ><textarea name="scenes" rows="3" cols="25" class="trous"></textarea></td>
</tr>
<tr>
	<td class="tbl" >Sc&eacute;nariste</td>
	<td class="tbl" ><textarea name="scenariste" rows="3" cols="25" class="trous"></textarea></td>
</tr>
<tr>
	<td class="tbl" >R&eacute;compenses</td>
	<td class="tbl" ><textarea name="recompenses" rows="3" cols="25" class="trous"></textarea></td>
</tr>
<tr>
	<td class="tbl" >Musique</td>
	<td class="tbl" ><textarea name="musique" rows="3" cols="25" class="trous"></textarea></td>
</tr>
<tr>
	<td class="tbl" >Bande Annonce (lien)</td>
	<td class="tbl" ><input name="annonce" value="" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Cinebel</td>
	<td class="tbl" ><input name="sortie" value="" class="trous" type="text"></td>
</tr>
<tr>
	<td class="tbl" >Genre</td>
	<td class="tbl" ><input name="genre" value="" class="trous" type="text"></td>
</tr>

<tr>
	<td class="tbl" >Casting</td>
	<td class="tbl" ><textarea name="casting" rows="5" cols="25" class="trous"></textarea></td>
</tr>
<tr>
	<td class="tbl" >Synopsis</td>
	<td class="tbl" ><textarea name="synopsis" rows="7" cols="25" class="trous"></textarea></td>
</tr>

<tr>
	<td class="tbl" >Affiche</td>
	<td class="tbl" ><input type="file" name="logo" class="trous"></td>
</tr>
<tr>
	<td class="tbl" ></td>
	<td class="tbl" ><input value="Ajouter" class="bosses" type="submit"></td>
</tr>
</table>



</form>

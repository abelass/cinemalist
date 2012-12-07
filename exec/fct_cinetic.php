<?php

// **********************************************
// *******    FONCTION TABLEAU ******************
// **********************************************
// ** Paramètre a passer					   **
// ** width = largeur en % du tableau		   **
// ** Title = la liste des titre a séparer par **
// ** ";" option : "-" ensuite le % de la      **
// ** cellule	                               **
// ** res = reséultat de la requète sql        **
// ** champ = liste des champ a afficher       **
// ** séparer par ";" options (séparér par "-" **
// **  			lien = lien - target		   **
// ** 			Check box = check - nom chex   **
// **           div =        	   			   **
// **  div-texte_a_afficher-lien_a_effectuer   **
// **********************************************





function tab_out($sql, $title,$champ){

$res = mysql_query("$sql");
$arr = explode(";",$title);

?>
<? gros_titre("La base de donn&eacute;es compl&egrave;te :");	?>
<table width=100% border=0 cellpadding='4' cellspacing='2'>
<tr >
		<?php
		// *************************************************************
		// ************  Afficher les entêtes **************************
		// *************************************************************

		foreach ($arr as $elem){
			echo "<th align='center' class='headtbl'>";
			echo "<b>".$elem."</b></center>";
			echo "</th>";
		}
		?>
	</tr>
		<?php
		$arr = explode(";",$champ);
		while ($row  =  mysql_fetch_array($res,MYSQL_ASSOC)) {
		?>
	<tr >
		<?php
		foreach ($arr as $elem) {
    	$elem = explode("-",$elem);
		?>
		<td valign=top class="tbl">
		<?php
		switch($elem[1])
		{
		case "lien":
		echo "<a href=".$row[$elem[0]]." target=".$elem[2].">".$row[$elem[0]]."</a>";
		break;

		case "div":
   		echo "<a href=".str_replace("XXX",$row[$elem[0]],$elem[3])." >".$elem[2]."</a>";
		break;
		
		case "visi":
		if ($row[$elem[0]]=="1"){
   		echo "<img src=\"images/visible.gif\" alt=\"\" border=\"0\">";
		}
		else{ 
		echo "<img src=\"images/invisible.gif\" alt=\"\" border=\"0\">";
		}
		break;

		case "bd":
		$res2 = mysql_query("Select * from $elem[2] where $elem[3] like '".$row[$elem[0]]."'");
		$row2 =  mysql_fetch_array($res2,MYSQL_ASSOC);
   		echo "".$row2[$elem[4]]."</td>";
		break;
		
		default:
   		echo nl2br($row[$elem[0]]);
		break;
		
	}
?>
	</td>
	<?php
	}}

?>
</tr>
</table>

<?php
}
?>
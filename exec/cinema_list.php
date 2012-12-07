<?php

function exec_cinema_list(){
	
	include_spip("public/composer");
	include_spip("public/assembler");
	include_spip("inc/utils");
	include_spip("inc/presentation");
	include_ecrire("inc_presentation");
	
	
	echo debut_page("cinetic");
	echo "<br />";
	echo gros_titre("Cinema List");	
	echo debut_gauche();
	echo debut_boite_info();
		echo '<img src="../plugins/cinetic/img_pack/bobine.png" alt="logo" border="0">
		<p><strong>CinemaList</strong> permet de g&eacute;rer une base de donn&eacute;es de films.</p>';
	echo fin_boite_info();
		include ("menu_cinetic.php");
	echo debut_droite();
	echo debut_cadre_trait_couleur("../plugins/cinetic/img_pack/bobine.png", false, "", _T(''));	
	$contexte = array();
	echo recuperer_fond('prive/cinema_list/cinema_list', $contexte);
	echo fin_cadre_couleur();
	echo fin_page();
}
?>

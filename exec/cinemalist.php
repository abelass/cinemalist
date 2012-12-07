<?php

$p=explode(basename(_DIR_PLUGINS)."/",str_replace('\\','/',realpath(dirname(dirname(__FILE__)))));
define('_DIR_PLUGIN_GESTION_DOCUMENTS',(_DIR_PLUGINS.end($p)));

function exec_cinemalist()
{

	echo '
	<style>
		table {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.headtbl{
	background-color: #8A8A8A;
	font-weight: bold;
	color: White;
}
.tbl{
	background-color: #DDDDDD;
	margin:2px;
}
.form_cinetic INPUT, .form_cinetic TEXTAREA{
	border: 1px solid #5A5A5A;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	background-color: #F5F5F5;
}
.trous{
	width:200px;
	padding:2px;
	margin:2px;
}
.bosses{
	border: 1px solid #F5F5F5;
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 11px;
	background-color: #8A8A8A;
	font-weight: bold;
	padding:2px;
	margin:2px;
}
	</style>';

	include_spip("inc/presentation");
		// entetes
	$commencer_page = charger_fonction('commencer_page', 'inc');


	// titre, partie, sous_partie (pour le menu)
	echo $commencer_page(_T('cinemalist:liste_cinema'), "editer", "editer");
	echo "<br />";
	gros_titre("Cinema List");	
	debut_gauche();
 	
		debut_boite_info();
		echo '<img src="../plugins/cinetic/img_pack/bobine.png" alt="logo" border="0">
		<p><strong>CinemaList</strong> permet de g&eacute;rer une base de donn&eacute;es de films.</p>';
		fin_boite_info();
		
		
			include ("menu_cinetic.php");
		
			
	debut_droite();
	debut_cadre_trait_couleur("../plugins/cinetic/img_pack/bobine.png", false, "", _T(''));	
	echo "<br />";
	echo "<br />";
			if (isset($_GET['comm']))
						{
							switch ($_GET['comm'])
							{
								case "add" : gros_titre("Ajouter un film "); include ("add_cinetic.php");
								break;
								
								case "edit" :gros_titre("Editer un film "); include ("edit_cinetic.php");
								break;
								
								case "add_enreg": include ("add_enreg_cinetic.php");
								break;
								
								case "edit_enreg": include ("edit_enreg_cinetic.php");
								break;
								
								case "del" : include ("del_cinetic.php");
								break;
							}
						}else
						{
						echo recuperer_fond('prive/cinema_list/exec_cinema_list',$context,array('ajax'=>true));
						}
	fin_cadre_couleur();
	fin_page();
}

?>   

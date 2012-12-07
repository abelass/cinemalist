<?php
if (!defined("_ECRIRE_INC_VERSION")) return;


function cinemalist_upgrade($nom_meta_base_version,$version_cible){
        $current_version = 0.0;
        if ((!isset($GLOBALS['meta'][$nom_meta_base_version]))
        || (($current_version = $GLOBALS['meta'][$nom_meta_base_version])!=$version_cible)){
                include_spip('base/cinemalist_tables_principales');
                // cas d'une installation
                if ($version_cible > $GLOBALS['meta'][$nom_meta_base_version]){
                	if($GLOBALS['meta'][$nom_meta_base_version]==''){
				include_spip('base/create');
				creer_base();
				maj_tables('spip_films');
				maj_tables('spip_realisateurs');
				maj_tables('spip_acteurs');
				maj_tables('spip_scenaristes');																
				}
			else{
				include_spip('base/create');
				creer_base();
				maj_tables('spip_films');
				maj_tables('spip_realisateurs');
				maj_tables('spip_acteurs');
				maj_tables('spip_scenaristes');	
				}
               }

        }
	ecrire_meta($nom_meta_base_version, $current_version=$version_cible);   
}

?>
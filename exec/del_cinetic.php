<?php

sql_delete ('spip_films','id_film='._request('id_film'));

echo "<p>Le film a &eacute;t&eacute; correctement effac&eacute;.</p><p><a href='?exec=cinetic'>>> Retour &agrave; la liste des films<a/></p>";
?>

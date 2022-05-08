<?php

include ('../../../controller/demandeC.php');
	$demande_spC = new demande_spC();
    $demande_spC->supprimerdemande_sp($_GET["id_sp"]);
	header('Location:gestion_sponsors.php');
?>
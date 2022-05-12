<?php
    include('../../../controller/evenementC.php');
	$evenementC=new evenementC();
	$evenementC->supprimerEvenement($_GET["id_event"]);
	header('Location:afficher_evenement.php');
?>
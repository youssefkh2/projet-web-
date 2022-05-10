<?php
	include 'C:/xampp/htdocs/Reclamation/controler/reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerrec($_GET["id_reclamation"]);
	header('Location:afficherrec.php');
?>
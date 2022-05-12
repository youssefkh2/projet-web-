<?php
	include 'C:/xampp/htdocs/integration/controller/reclamationC.php';
	$reclamationC=new reclamationC();
	$reclamationC->supprimerrec($_GET["id_reclamation"]);
	header('Location:afficherrec.php');
?>
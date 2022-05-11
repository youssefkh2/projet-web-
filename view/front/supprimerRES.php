<?php
	include_once 'C:/xampp/htdocs/projet_diversify/controllerR/reservationC.php';
	$reservationC=new ReservationC();
	$reservationC->supprimerReservation($_GET["cin_client"]);
	header('Location:afficherRES.php');
?>
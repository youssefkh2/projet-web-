<?php

include '../../../controllerS/sponsorsC.php';
	$sponsorsC = new sponsorsC();
    $sponsorsC->supprimersponsors($_GET["id"]);
	header('Location:gestion_sponsors.php');
?>






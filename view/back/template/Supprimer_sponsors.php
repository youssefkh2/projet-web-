<?php

include '../../../controller/sponsorsC.php';
	$sponsorsC = new sponsorsC();
    $sponsorsC->supprimersponsors($_GET["id"]);
	header('Location:gestion_sponsors.php');
?>






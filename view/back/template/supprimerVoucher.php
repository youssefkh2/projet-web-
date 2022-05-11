<?php
	include_once 'C:/xampp/htdocs/projet_diversify/controller/voucherC.php';
	$voucherC=new VoucherC();
	$voucherC->supprimerVoucher($_GET["code"]);
	header('Location:afficherVoucher.php');
?>
<?php
	include_once 'C:/xampp/htdocs/integration/controller/voucherC.php';
	$voucherC=new VoucherC();
	$voucherC->supprimerVoucher($_GET["code"]);
	header('Location:afficherVoucher.php');
?>
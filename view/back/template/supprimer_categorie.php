<?php
    include('../../../controller/CategorieC.php');
	$CategorieC=new CategorieC();
	$CategorieC->supprimerCategories($_GET["id_cat"]);
	header('Location:afficher_categorie.php');
?>
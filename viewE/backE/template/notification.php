<?php

include_once 'C:/xampp/htdocs/Projet_Web_Diversify/config.php';


if(isset($_GET['view'])){

    $output = (string) "";
    if(!empty($_GET['view'])){
        $DB->insert("UPDATE evenement SET nom_event = ? where nom_event = ?",
        array(1, 0));
    }
    $req = $DB->query("SELECT * evenement")
}


?>
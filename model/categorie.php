<?php


class categorie{

    private $id_cat=null;
    private $Nom=null;
    private $description=null;



    function __construct($Nom ,$description)
    {
        
        $this->Nom=$Nom;
        $this->description=$description;
    }
    function getid_cat(){
        return $this->id_cat;
    }
    function getNom(){
        return $this->Nom;
    }
    function getdescription(){
        return $this->description;
    }



    
    function setNom(string $Nom){
        $this->Nom=$Nom;
    }
    function setdescription(string $description){
        $this->description=$description;
    }

}


?>
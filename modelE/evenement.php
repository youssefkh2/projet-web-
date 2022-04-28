t<?php


class evenement{

    private $id_event=null;
    private $nom_event=null;
    private $date=null;
    private $lieu=null;
    private $heure=null;
    private $id_cat=null;
    private $image=null;
   // public $cmpt=null;



    function __construct($nom_event ,$date ,$lieu ,$heure,$id_cat,$image)
    {
        $this->nom_event=$nom_event;
        $this->date=$date;
        $this->lieu=$lieu;
        $this->heure=$heure;
        $this->id_cat=$id_cat;
        $this->image=$image;
    }

    function getid_event(){
        return $this->id_event;
    }
    function getnom(){
        return $this->nom_event;
    }
    function getdate(){
        return $this->date;
    }
    function getlieu(){
        return $this->lieu;
    }
    function getheure(){
        return $this->heure;
    }
    function getid_cat(){
        return $this->id_cat;
    }
    function getimage(){
        return $this->image;
    }
    function getcmpt(){
        
        return $this->cmpt;
    }
    /*function aff($cmpt){
        
        echo $cmpt++;
    }*/

    
    function setnom(string $nom_event){
        $this->nom_event=$nom_event;
    }
    function setdate(date $date){
        $this->date=$date;
    }
    function setlieu(string $lieu){
        $this->lieu=$lieu;
    }
    function setheure(string $heure){
        $this->heure=$heure;
    }
    function setid_cat(int $id_cat){
        $this->id_cat=$id_cat;
    }
    function setimage(string $image){
        $this->image=$image;
    }

}


?>
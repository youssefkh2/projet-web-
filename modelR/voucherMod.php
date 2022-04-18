<?php
class Reservation
{
    private int $cinClient;
    private int $code;
    private int $avertissement;
    private date $date_limite;
    /*public function __construct()
    {
        $this->cin_client=0;
        $this->date_res='2000-05-10';
        $this->adulte=0;
        $this->enfant=0;
    }*/
    public function __construct(int $cinClient,int $code,int $avertissement,date $date_limite)
    {
        $this->cinClient=$cinClient;
        $this->date_limite=$date_limite;
        $this->code=$code;
        $this->avertissement=$avertissement;
        
    }
    public function getcinclient(){
        return $this->cinClient;
    }
    public function getdatelimite(){
        return $this->date_limite;
    }
    public function getcode(){
        return $this->code;
    }
    public function getavertissement(){
        return $this->avertissement;
    }
   
   
}

?>
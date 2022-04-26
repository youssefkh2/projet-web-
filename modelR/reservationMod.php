<?php
class Reservation
{
    private int $cin_client;
    private  $date_res=null;
    private int $adulte;
    private int $enfant;
    private int $id_event;
    /*public function __construct()
    {
        $this->cin_client=0;
        $this->date_res='2000-05-10';
        $this->adulte=0;
        $this->enfant=0;
    }*/
    
    public function __construct(int $cin_client,$date_res,int $adulte,int $enfant,int $id_event)
    {
        $this->cin_client=$cin_client;
        $this->date_res=$date_res;
        $this->adulte=$adulte;
        $this->enfant=$enfant;
        $this->id_event=$id_event;
    }
    public function getcinClient(){
        return $this->cin_client;
    }
    public function getdateRes(){
        return $this->date_res;
    }
    public function getadulte(){
        return $this->adulte;
    }
    public function getenfant(){
        return $this->enfant;
    }
    public function getidevent(){
        return $this->id_event;
    }
    
   
   
}

?>
<?php
class Voucher
{
    private int $cinClient;
    private int $code;
    private int $avertissement;
    private string $date_limite;
 
    public function __construct(int $cinClient,int $code,int $avertissement,string $date_limite)
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
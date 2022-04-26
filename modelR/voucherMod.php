<?php
class Voucher
{
    private int $cinClient;
    private int $code;
    private int $codeVoucher;
    private int $avertissement;
    private $date_limite;
 
    public function __construct($date_limite,int $avertissement,int $cinClient, int $codeVoucher)
    {
        $this->cinClient=$cinClient;
        $this->date_limite=$date_limite;
        //$this->code=$code;
        $this->codeVoucher = $codeVoucher;
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

    public function getCodeVoucher(){
        return $this->codeVoucher;
    }
    
    public function getavertissement(){
        return $this->avertissement;
    }
   
   
}

?>
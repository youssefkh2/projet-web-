<?php
	class demande_sp{
		private $id_sp=null;
		private $id_event=null;
		private $num_tlf=null;
        private $email=null;
        private $date_debut=null;
        private $date_fin=null;

		
		
		function __construct($id_sp,$id_event,$num_tlf,$email,$date_debut,$date_fin){
            $this->id_sp=$id_sp;
			$this->id_event=$id_event;
			$this->num_tlf=$num_tlf;
			$this->email=$email;
			$this->date_debut=$date_debut;
			$this->date_fin=$date_fin;
			
			
			
		}

		function getid_sp(){
			return $this->id_sp;
		}
		function getid_event(){
			return $this->id_event;
		}
		function getnum_tlf(){
			return $this->num_tlf;
		}
		function getemail(){
			return $this->email;
		}
        function getdate_debut(){
			return $this->date_debut;
		}
        function getdate_fin(){
			return $this->date_fin;
		}
		
		


		function setid_event(int $id_event){
			$this->id_event=$id_event;
		}
		function setnum_tlf(int $num_tlf){
			$this->num_tlf=$num_tlf;
		}
        function setemail(string $email){
			$this->num_tlf=$num_tlf;
		}
        function setdate_debut(date $date_debut){
			$this->date_debut=$date_debut;
		}
        function setdate_fin(date $date_fin){
			$this->date_fin=$date_fin;
		}
		
	}


?>
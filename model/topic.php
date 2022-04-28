<?php
    class topic
    {
        private $idtopic;
        private $titre;
        private $description;
        private $contenu;
        private $id_auteur;
        private $pseudo_auteur;
        private $date_publication;


        function __construct($titre, $description, $contenu){
			$this->titre=$titre;
			$this->description=$description;
			$this->contenu=$contenu;


		}

       
		function settitre(string $titre){
			$this->titre=$titre;
		}
        function setdescription(string $description){
			$this->description=$description;
		}
        function setcontenu(string $contenu){
			$this->contenu=$contenu;
		}

		function gettitre(){
			return $this->titre;
		}
        function getdescription(){
			return $this->description;
		}
        function getcontenu(){
			return $this->contenu;
		}

 
        
    }
    

?>
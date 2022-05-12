<?php

    require_once 'C:/xampp/htdocs/integration/assets/Utils/config.php';
    require_once 'C:/xampp/htdocs/integration/Model/topic.php';


    Class topicC {

    

        function affichertopic()
        {
            $requete = "select * from topic";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        
        function trier()
        {
            $requete = "SELECT * FROM topic ORDER by titre";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function gettopicbyID($id)
        {
            $requete = "select * from Topic where idtopic=:id";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id'=>$id
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function ajoutertopic($Topic)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO Topic 
                (titre,description,contenu)
                VALUES
                (:titre,:description,:contenu)
                ');
                $querry->execute([
                    'titre'=>$Topic->gettitre(),
                    'description'=>$Topic->getdescription(),
                    'contenu'=>$Topic->getcontenu(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
        function modifiertopic($Topic,$idtopic)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE Topic SET
                titre=:titre,description=:description,contenu=:contenu

                where idtopic=:idtopic
                ');
                $querry->execute([
                    'idtopic'=>$idtopic,
                    'titre'=>$Topic->gettitre(),
                    'description'=>$Topic->getdescription(),
                    'contenu'=>$Topic->getcontenu(),


                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

        function supprimertopic($id)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM Topic WHERE idtopic =:id
                ');
                $querry->execute([
                    'id'=>$id
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    }

?>
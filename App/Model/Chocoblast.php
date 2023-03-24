<?php
    namespace App\Model;
    use App\Model\Utilisateur;
    use App\Utils\BddConnect;
    class Chocoblast extends BddConnect{
        private ?int $id_chocoblast;
        private ?string $slogan_chocoblast;
        private ?string $date_chocoblast;
        private ?bool $statut_chocoblast;
        private ?Utilisateur $cible_chocoblast;
        private ?Utilisateur $auteur_chocoblast;    

        public function __construct(){
            $this->cible_chocoblast = new Utilisateur();
            $this->auteur_chocoblast = new Utilisateur();

            $this->statut_chocoblast=true;
        }

        public function getIdChocoblast():?int{
            return $this->id_chocoblast;
        }
        public function getSloganChocoblast():?string{
            return $this->slogan_chocoblast;
        }
        public function getDateChocoblast():?string{
            return $this->date_chocoblast;
        }
        public function getStatutChocoblast():?bool{
            return $this->statut_chocoblast;
        }
        public function getCibleChocoblast():?Utilisateur{
            return $this->cible_chocoblast;
        }
        public function getAuteurChocoblast():?Utilisateur{
            return $this->auteur_chocoblast;
        }

        public function setIdChocoblast(?int $id):void{
            $this->id_chocoblast = $id;
        }
        public function setSloganChocoblast(?string $slogan):void{
            $this->slogan_chocoblast = $slogan;
        }
        public function setDateChocoblast(?string $date):void{
            $this->date_chocoblast = $date;
        }
        public function setStatutChocoblast(?bool $statut):void{
            $this->statut_chocoblast = $statut;
        }
        public function setCibleChocoblast(?Utilisateur $user):void{
            $this->cible_chocoblast = $user;
        }
        public function setAuteurChocoblast(?Utilisateur $user):void{
            $this->auteur_chocoblast = $user;
        }

        public function addChocoblast():void{
            // méthode qui ajoute un chocoblast en bdd
            try{
                // récupérer les valeurs de l'objet 
                $slogan = $this->getSloganChocoblast();
                $date = $this->getDateChocoblast();
                $statut = $this->getStatutChocoblast();
                $cible = $this->getCibleChocoblast();
                $auteur = $this->getAuteurChocoblast();

              
                // préparer la requête
                $req = $this->connexion()->prepare('INSERT INTO chocoblast(slogan_chocoblast, date_chocoblast,statut_chocoblast,cible_chocoblast,auteur_chocoblast) VALUES(?,?,?,?,?)');

                $req->bindParam(1, $slogan, \PDO::PARAM_STR);
                $req->bindParam(2, $date, \PDO::PARAM_STR);
                $req->bindParam(3, $statut, \PDO::PARAM_BOOL);
                $req->bindParam(4, $cible, \PDO::PARAM_INT);
                $req->bindParam(5, $auteur, \PDO::PARAM_INT);

                // exécuter la requête
                $req->execute();
            }
            catch(\Exception $e){
                die ('Erreur : '.$e->getMessage());
            }
        }
         //Méthode toString
         public function __toString():string{
            return $this->slogan_chocoblast;
        }
    }


?>
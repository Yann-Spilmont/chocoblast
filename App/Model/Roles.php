<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    class Roles extends BddConnect{
        /*-----------------------
                Attributs
        ------------------------*/
        private $id_roles;
        private $nom_roles;
        /*-----------------------
                Constructeur
        ------------------------*/
        public function __construct(){
        }
        /*-----------------------
            Getter et Setters
        ------------------------*/
        public function getIdRoles():?int{
            return $this->id_roles;
        }
        public function getNomRoles():?string{
            return $this->nom_roles;
        }
        public function setNomRoles($name):void{
            $this->nom_roles = $name;
        }
        // ----méthodes------
        public function addRoles():void{
            try{
            $nom_roles=$this->nom_roles;
            $req = $this->connexion()->prepare('INSERT INTO roles(nom_roles) VALUES(?)');
                $req->bindParam(1, $nom_roles, \PDO::PARAM_STR);
                $req->execute();
            } 
            catch (\Exception $e) {
                die('Erreur : '.$e->getMessage());
            }
        }
    }
?>
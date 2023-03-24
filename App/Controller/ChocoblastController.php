<?php
    namespace App\Controller;
    use App\Model\Chocoblast;
    use App\Model\Utilisateur;
    use App\Utils\Fonctions;

    class ChocoblastController extends Chocoblast{
        // méthode qui va ajouter un chocoblast
        public function insertChocoblast():void{


            // test si utilisateur est connecté
            if(isset($_SESSION['connected'])){

                // générer la liste déroulante
                $user = new Utilisateur();
                $data = $user->getUserAll();
                

                // variable pour stocker les messages d'erreur
                $msg="";

            
                // tester si le formulaire est submit
                if(isset($_POST['submit'])){
                    // nettoyer les inputs
                    $slogan = Fonctions::cleanInput($_POST['slogan_chocoblast']);
                    $date = Fonctions::cleanInput($_POST['date_chocoblast']);
                    $cible = Fonctions::cleanInput($_POST['cible_chocoblast']);
                    // récupérations des valeurs
                    $auteur = $_SESSION['id'];
                    // test si les champs sont remplis
                    if(!empty($slogan) AND !empty($date) AND !empty($cible) AND !empty($auteur)){
                        // setter les valeurs à l'objet
                        $this->setSloganChocoblast($slogan);
                        $this->setDateChocoblast($date);
                        $this->getCibleChocoblast()->setIdUtilisateur($cible);
                        $this->getAuteurChocoblast()->setIdUtilisateur($auteur);
                        // echo '<pre>';
                        // var_dump($this);
                        // echo '</pre>';
                        $this->addChocoblast();
                        $msg='Le chocoblast : '.$slogan.' a été ajouté en Bdd';
                        
                    }
                    // test sinon les champs sont vides
                }
            }
            // importer la vue chocoblast

            include './App/Vue/viewAddChocoblast.php';
        }
        public function showChocoblastAll():void{
            // Variables pour les messages
            $msg="";
            $chocos = $this->getAllChocoblast();
            if(!chocos){
                $msg = "Il n'y a aucun chocoblast dans la bdd";
            }
            include './App/Vue/showAddChocoblast.php';
        }
       
    }
?>
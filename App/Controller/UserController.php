<?php
    namespace App\Controller;
    use App\Model\Utilisateur;
    use App\Utils\Functions;
    class UserController extends Utilisateur{
        
        //fonction qui va gérer l'ajout d'un utilisateur en BDD
        public function insertUser(){
            $msg = "";
            //variable pour stocker les messages d'erreurs
            
            /*-------------------------------
                        logique 
            --------------------------------*/
            //test si le bouton est cliqué 
            if(isset($_POST['submit'])){
                //récupération et nettoyage des inputs utilisateurs
                $nom = Functions::cleanInput($_POST['nom_utilisateur']);
                $prenom = Functions::cleanInput($_POST['prenom_utilisateur']);
                $mail = Functions::cleanInput($_POST['mail_utilisateur']);
                $password = Functions::cleanInput($_POST['password_utilisateur']);
                //tester si les champs sont remplis
                if(!empty($nom) AND !empty($prenom)AND !empty($mail) AND !empty($password)){
                    //hash du mot de passe
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $user = new UserController();
                    $user->setNomUtilisateur($nom);
                    $user->setPrenomUtilisateur($prenom);
                    $user->setMailUtilisateur($mail);
                    $user->setPasswordUtilisateur($password);
                    //version alternative avec $this
                    /* $this->setNomUtilisateur($nom);
                    $this->setPrenomUtilisateur($prenom);
                    $this->setMailUtilisateur($mail);
                    $this->setpasswordUtilisateur($password); */
                    // var_dump($user);
                    $user->addUser();
                    $msg = "Le compte : ".$mail." a été ajouté à la BDD";
                }
                //sinon si les champs ne sont pas tous remplis
                else{
                    $msg = "Veuillez remplir tous les champs du formulaire";
                }
            }
            //importer la vue
            include './App/Vue/viewAddUser.php';
        }
    }
?>
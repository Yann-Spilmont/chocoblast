<?php
namespace App\Controller;
use App\Utils\Fonctions;
use App\Model\Utilisateur;
use App\Model\Chocoblast;
use App\Model\Commentaire;

    class CommentaireController extends Commentaire{
        public function insertCommentaire(){
            if(isset($_SESSION['connected'])){
                $user = new Utilisateur();
                $data = $user->getUserAll();
                //Variable pour stocker les messages d'erreur
                $msg = "";
                if(isset($_POST['submit'])){
                    $note = Fonctions::cleanInput($_POST['note_chocoblast']);
                    $date = Fonctions::cleanInput($_POST['date_chocoblast']);
                    $text = Fonctions::cleanInput($_POST['text_chocoblast']);

                    $auteur =Fonctions::cleanInput($_SESSION['id']);
                    $choco =Fonctions::cleanInput($_GET['id_chocoblast']);
                    
                    if(!empty($note)AND !empty($date)AND !empty($text)AND !empty($auteur)AND !empty($choco)){
                        $this->setNoteCommentaire($note);
                        $this->setDateCommentaire($date);
                        $this->setTextCommentaire($text);
                        $this->getAuteurCommentaire()->setIdUtilisateur($_SESSION['id']);
                        $this->getChocoblastCommentaire()->setIdChocoblast($_GET['id_chocoblast']);

                        $this->addCommentaire();
                        $msg = "Le commentaire : ".$text." et ".$note." a été ajouté en BDD";
                        echo '<script>
                        setTimeout(()=>{
                            modal.style.display = "block";
                        }, 500);
                    </script>';
                    }
                    else{
                        $msg = "Veuillez remplir les champs de formulaire";
                        echo '<script>
                            setTimeout(()=>{
                                modal.style.display = "block";
                            }, 500);
                        </script>';
                    }
                }  
            }
            include './App/Vue/viewAddCommentaire.php';
        }
    }
?>
<?php
    namespace App\Model;
    use App\Utils\BddConnect;
    use App\Model\Roles;
    class Utilisateur{

        // attributs
        private $id_utilisateur;
        private $nom_utilisateur;
        private $prenom_utilisateur;
        private $mail_utilisateur;
        private $password_utilisateur;
        private $image_utilisateur;
        private $statut_utilisateur;
        private $roles;

         // constructeur
    public function __construct(){
        // instancier un objet rôle quand on crée un utilisateur 
        $this->roles = new Roles('utilisateur');
    }

    // getter et setter
    
    }

   
?>
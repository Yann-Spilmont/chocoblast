<?php
    //démarrage de la session
    session_start();
    //importer les ressources
    use App\Controller\UserController;
    use App\Controller\RolesController;
    use App\Controller\ChocoblastController;
    include './App/Utils/BddConnect.php';
    include './App/Utils/Fonctions.php';
    include './App/Model/Roles.php';
    include './App/Controller/RolesController.php';
    include './App/Model/Utilisateur.php';
    include './App/Controller/UserController.php';
    include './App/Model/Chocoblast.php';
    include './App/Controller/ChocoblastController.php';

    //Analyse de l'URL avec parse_url() et retourne ses composants
    $url = parse_url($_SERVER['REQUEST_URI']);
    //test soit l'url a une route sinon on renvoi à la racine
    $path = isset($url['path']) ? $url['path'] : '/';
    //instance des controllers
    $userController = new UserController();
  
    //instancier le controller roles
    $rolesController = new RolesController();

    // instancier le controller chocoblast
    $chocoblastController = new ChocoblastController();
    //routeur
    switch ($path) {
        case '/chocoblast/':
            include './App/Vue/home.php';
            break;
        case '/chocoblast/userAdd':
            //appel de la fonction insertUser
            $userController->insertUser();
            break;
        case '/chocoblast/rolesAdd':
            //appel de la fonction insertRoles
            $rolesController->insertRoles();
            break;
        case '/chocoblast/chocoblastAdd':
            $chocoblastController->insertChocoblast();
            break;
        case '/chocoblast/connexion':
            $userController->connexionUser();
            break;
        case '/chocoblast/deconnexion':
            $userController->deconnexionUser();  
            break;
        default:
            include './App/Vue/error.php';
            break;
    }
?>
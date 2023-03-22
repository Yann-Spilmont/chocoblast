<?php
    // importer les ressources
    use App\Controller\UserController;
    use App\Controller\RolesController;
    include './App/Utils/BddConnect.php';
    include './App/Utils/functions.php';
    include './App/Model/Utilisateur.php';
    include './App/Model/Roles.php';
    include './App/Controller/UserController.php';
    include './App/Controller/RolesController.php';
    // analyse de l'url avec parse_url() et retourne ses composants
    $url=parse_url($_SERVER['REQUEST_URI']);
    // test soit l'url à une route sinon on renvoi à la racine
    $path=isset($url['path'])?$url['path'] : '/';
    // instance des controllers
    $userController=new UserController();
    $rolesController=new RolesController();
    // routeur
    
    switch ($path){
        case '/php_poo/chocoblast/':
            include './App/Vue/home.php';
            break;
        case '/php_poo/chocoblast/addUser':
            $userController->insertUser();
            break;
        case '/php_poo/chocoblast/addRoles':
            $rolesController->insertRoles();
            break;
        default:
            include './App/Vue/error.php';
            break;
    }
?>
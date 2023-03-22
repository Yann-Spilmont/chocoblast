<?php
    namespace App\Controller;
    use App\Model\Roles;
    use App\Utils\Functions;
    class rolesController extends Roles{

        public function insertRoles(){
            $msg="";
            if(isset($_POST['submit'])){
                $nom_roles= Functions::CleanInput(($_POST['nom_roles']));
            }
            if(!empty($nom_roles)){
            $this->setNomRoles($nom_roles);
            $this->addRoles();
            $msg="Le role : ".$nom_roles." a été ajouté à la BDD";
            }
            else{
                $msg = "Veuillez remplir le champ du formulaire";
            }
            include '.App/Vue/viewAddRoles.php';
        }
     
    }
?>
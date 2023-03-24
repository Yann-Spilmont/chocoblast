<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Ajouter chocoblast</title>
</head>
<body>
    <!-- import du menu -->
    <?php include './App/Vue/viewMenu.php';?>
    <div class="form">
        <form action="" method="post">
            <label for="slogan_chocoblast">Saisir votre slogan :</label>
            <input type="text" name="slogan_chocoblast">
            <label for="date_chocoblast">Saisir la date :</label>
            <input type="date" name="slogan_chocoblast">
            <label for="cible_chocoblast">Choisir votre cible :</label>
            <input type="text" name="slogan_chocoblast">
            <select name="cible_chocoblast">
                <!-- générer la liste des utilisateurs en php -->
                <?php
                    foreach($data as $value){
                        echo '<option value='.$value->id_utilisateur.'>'.$value->nom_utilisateur.'</option>';
                    }
                ?>
            </select>
        </form>
        <div id="error"><?php echo $msg ?></div>
    </div>

</body>
</html>
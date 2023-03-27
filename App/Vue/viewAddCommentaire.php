<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Public/Style/main.css">
    <script src="./Public/Script/script.js" defer></script>
    <title>Add Chocoblast</title>
</head>
<body>
    <!-- Import du menu -->
    <?php include './App/Vue/viewMenu.php'; ?>
    <section class="formContainer">
        <h3>Ajouter un commentaire :</h3>
        <form action="" method="post">
            <label for="note_chocoblast">Saisir une note:</label>
            <input type="text" name="note_chocoblast">
            <label for="text_chocoblast">Saisir le texte:</label>
            <input type="text" name="text_chocoblast">
            <label for="date_chocoblast">Saisir la date :</label>
            <input type="date" name="date_chocoblast">
                <!-- générer la liste des utilisateurs en PHP -->
                <?php
                    foreach($data as $value){
                        echo '<option value='.$value->id_utilisateur.'>'.$value->nom_utilisateur.'</option>';
                    }
                ?>
            </select>
            <input type="submit" value="Ajouter" name="submit">
        </form>
    </section>
    <!-- Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p><?= $msg ?></p>
        </div>
    </div>
</body>
</html>
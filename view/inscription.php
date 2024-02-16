<?php
$dns="mysql:host=localhost;dbname=gestion_pfe";
$bdd=new PDO($dns,'root','');
$sql=$bdd->query( "SELECT * FROM classe");
$classes=$sql->fetchALL(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="post" action="../controller/inscription.php">
        <label for="nom">CIN : </label>
        <input type="text" name="cin" required><br>
        <label for="nom">Nom : </label>
        <input type="text" name="nom" required><br>
        <label for="nom">Prenom : </label>
        <input type="text" name="prenom" required><br>
        <label for="nom">Email : </label>
        <input type="email" name="email" required><br>
        <label for="nom">mot de passe : </label>
        <input type="password" name="mdp" required><br>
        <label for="classe">Choisir une Classe : </label><br>
        <select name="classe" id="">
            <?php foreach($classes as $c): ?>
            <option value="<?=$c['id'];?>">
                <?= $c['nom_classe'];?>
            </option>
            <?php endforeach ?>
        </select><br>
        <button type="submit">s'inscrire</button>
    </form>
</body>
</html> 
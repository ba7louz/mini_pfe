<style>

.retour-button {
    background-color: darkred;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.retour-button:hover {
    background-color: darkred;
}

</style>

<link rel="stylesheet" href="../login.css">

    <h1>Profil de l'étudiant</h1>
    
    <p>ID: <?php echo $etudiantData['id']; ?></p>
    <p>CIN: <?php echo $etudiantData['cin']; ?></p>
    <p>Nom: <?php echo $etudiantData['nom']; ?></p>
    <p>Prénom: <?php echo $etudiantData['prenom']; ?></p>
    <form action="" method="post">
        <label for="nouvel_email">Nouvel email:
        <input type="email" id="nouvel_email" name="nouvel_email" value="<?php echo $etudiantData['email']; ?>" required>
        <input type="submit" value="Modifier"> <br>
        </label>
        <button class="retour-button" onclick="window.history.back()">Retour</button>

    </form>


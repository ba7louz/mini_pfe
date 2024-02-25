<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations sur le binôme</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    color: #333;
}

h2 {
    color: #555;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 10px;
}

li span {
    font-weight: bold;
}

ul.etudiant-info {
    background-color: #fff;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

ul.pfe-info {
    background-color: #f9f9f9;
    border-radius: 5px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Informations sur le binôme</h1>
        
        <h2>Étudiant 1</h2>
        <ul class="etudiant-info">
            <li><span>CIN:</span> <?php echo isset($etudiant1['cin']) ? $etudiant1['cin'] : ''; ?></li>
            <li><span>Nom:</span> <?php echo isset($etudiant1['nom']) ? $etudiant1['nom'] : ''; ?></li>
            <li><span>Prénom:</span> <?php echo isset($etudiant1['prenom']) ? $etudiant1['prenom'] : ''; ?></li>
            <li><span>Email:</span> <?php echo isset($etudiant1['email']) ? $etudiant1['email'] : ''; ?></li>
        </ul>
        
        <h2>Étudiant 2</h2>
        <ul class="etudiant-info">
            <li><span>CIN:</span> <?php echo isset($etudiant2['cin']) ? $etudiant2['cin'] : ''; ?></li>
            <li><span>Nom:</span> <?php echo isset($etudiant2['nom']) ? $etudiant2['nom'] : ''; ?></li>
            <li><span>Prénom:</span> <?php echo isset($etudiant2['prenom']) ? $etudiant2['prenom'] : ''; ?></li>
            <li><span>Email:</span> <?php echo isset($etudiant2['email']) ? $etudiant2['email'] : ''; ?></li>
        </ul>
        
        <h2>Informations sur le PFE</h2>
        <ul class="pfe-info">
            <li><span>Encadrant ISET:</span> <?php echo isset($binome['encadrant_iset']) ? $binome['encadrant_iset'] : ''; ?></li>
            <li><span>Nom de l'entreprise:</span> <?php echo isset($binome['nom_entreprise']) ? $binome['nom_entreprise'] : ''; ?></li>
            <li><span>Encadrant de l'entreprise:</span> <?php echo isset($binome['encadrant_entreprise']) ? $binome['encadrant_entreprise'] : ''; ?></li>
            <li><span>Titre du PFE:</span> <?php echo isset($binome['titre']) ? $binome['titre'] : ''; ?></li>
        </ul>
    </div>
</body>
</html>

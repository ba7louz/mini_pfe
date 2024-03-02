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
            position: relative; /* Ajouté pour positionner le bouton correctement */
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

        .btn-container {
            text-align: center; /* Pour centrer le bouton */
            margin-top: 20px; /* Espacement entre les listes et le bouton */
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .btn-refuser {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background-color: #dc3545; /* Rouge */
        }

        .btn-accepter {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #007bff; /* Bleu */
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
            <li><span>Date demande:</span><?php echo isset($binome['date_demande']) ? $binome['date_demande'] : '' ; ?></li>
            <?php
           
                if($binome['validite']==0){
                    ?>

                    <form method="post" action="">
                     <button type="submit" name="action" value="refuser" class="btn-refuser">Refuser</button>
                          <button type="submit" name="action" value="accepter" class="btn-accepter">Accepter</button>
</form>

                <?php
                }else{?>
                    <li><span>Date reponse:</span><?php echo ($binome['date_reponse']) ? $binome['date_reponse'] : '' ; ?></li>
<?php
                }
            ?>
        </ul>
                
        <div class="btn-container"> 
        <form method="get" action="../controller/afficher_fiche_pfe.php">
        <input type="hidden" name="pfe_id" value="<?php echo $pfe_id; ?>">
        <button type="submit">Afficher fiche PFE</button>
</form>
            
        </div>
    </div>
    
</body>
</html>
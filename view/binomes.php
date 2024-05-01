<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .bin {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        position: relative;
        /* Ajouté pour positionner le bouton correctement */
    }

    .bin h1 {
        color: #333;
    }

    .bin h2 {
        color: #555;
    }

    .bin ul {
        list-style-type: none;
        padding: 0;
    }

    .bin li {
        margin-bottom: 10px;
    }

    .bin li span {
        font-weight: bold;
    }

    .bin ul.etudiant-info {
        background-color: #fff;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .bin ul.pfe-info {
        background-color: #f9f9f9;
        border-radius: 5px;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .btn-container {
        text-align: center;
        /* Pour centrer le bouton */
        margin-top: 20px;
        /* Espacement entre les listes et le bouton */
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
        background-color: #dc3545;
        /* Rouge */
    }

    .btn-accepter {
        position: absolute;
        bottom: 20px;
        right: 20px;
        background-color: #007bff;
        /* Bleu */
    }
</style>


<div class="container bin">
    <h1>Informations sur le binôme</h1>

    <h2>Étudiant 1</h2>
    <ul class="etudiant-info">
        <li><span>CIN:</span> <?php echo isset($etudiant1['cin']) ? $etudiant1['cin'] : ''; ?></li>
        <li><span>Nom:</span> <?php echo isset($etudiant1['nom']) ? $etudiant1['nom'] : ''; ?></li>
        <li><span>Prénom:</span> <?php echo isset($etudiant1['prenom']) ? $etudiant1['prenom'] : ''; ?></li>
        <li><span>classe:</span> <?php echo isset($c1['nom_classe']) ?$c1['nom_classe'] : ''; ?></li>
        <li><span>Email:</span> <?php echo isset($etudiant1['email']) ? $etudiant1['email'] : ''; ?></li>
    </ul>

    <?php if($etudiant2){ ?>
    <h2>Étudiant 2</h2>
    <ul class="etudiant-info">
        <li><span>CIN:</span> <?php echo isset($etudiant2['cin']) ? $etudiant2['cin'] : ''; ?></li>
        <li><span>Nom:</span> <?php echo isset($etudiant2['nom']) ? $etudiant2['nom'] : ''; ?></li>
        <li><span>Prénom:</span> <?php echo isset($etudiant2['prenom']) ? $etudiant2['prenom'] : ''; ?></li>
        <li><span>classe:</span> <?php echo isset($c2['nom_classe']) ?$c2['nom_classe'] : ''; ?></li>
        <li><span>Email:</span> <?php echo isset($etudiant2['email']) ? $etudiant2['email'] : ''; ?></li>
    </ul>
    <?php 
    }
    ?>
    <h2>Informations sur le PFE</h2>
    <ul class="pfe-info">
        <li><span>Encadrant ISET:</span> <?php echo isset($binome['encadrant_iset']) ? $binome['encadrant_iset'] : ''; ?></li>
        <li><span>Nom de l'entreprise:</span> <?php echo isset($binome['nom_entreprise']) ? $binome['nom_entreprise'] : ''; ?></li>
        <li><span>Encadrant de l'entreprise:</span> <?php echo isset($binome['encadrant_entreprise']) ? $binome['encadrant_entreprise'] : ''; ?></li>
        <li><span>Titre du PFE:</span> <?php echo isset($binome['titre']) ? $binome['titre'] : ''; ?></li>
        <li><span>Date demande:</span><?php echo isset($binome['date_demande']) ? $binome['date_demande'] : ''; ?></li>
        <?php

        if (($binome['validite'] == 0) && ($binome['date_reponse'] == NULL)) {
        ?>

            <form method="post" action="">
                <button type="submit" name="action" value="refuser" class="btn-refuser">Refuser</button>
                <button type="submit" name="action" value="accepter" class="btn-accepter">Accepter</button>
            </form>

        <?php
        } else { ?>
            <li><span>Date reponse:</span><?php echo ($binome['date_reponse']) ? $binome['date_reponse'] : ''; ?></li>
        <?php
        }
        ?>
    </ul>

    <div class="btn-container">
        
            <a href="../controller/afficher_fiche_pfe.php?pfe_id=<?= $pfe_id; ?>" target="_blank"> 
                <button type="submit" >Afficher fiche PFE</button>
            </a>
        

    </div>
</div>
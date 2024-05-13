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

        background-color: #dc3545;
        /* Rouge */
    }

    .btn-accepter {

        background-color: #007bff;
        /* Bleu */
    }
    form {
        display: flex;
        justify-content: center;
        gap: 30px;
    }
    :root {
        --text-color: rgba(34, 42, 66, .7);
        --success-text: #0d6832;
        --primary-text: #273e63;
        --warning-text: #73510d;
        --danger-text: #A61001;
        --success-bg: #d6f0e0;
        --primary-bg: #dfe7f6;
        --warning-bg: #fbf0da;
        --danger-bg: #FFEBE9;
        --primary-btn-text: #3b71ca;
    }

    * {
        /* color:var(--text-color); */
        font-family: 'Open Sans', sans-serif;
        font-family: 'Poppins', sans-serif;
    }

    .main {
        background-color: #f5f6f8bb !important;
        height: 100vh;

    }

    .text-primary {
        color: var(--primary-btn-text) !important;
    }

    .fw-bold {
        font-weight: 500 !important;
    }

    h2 {
        font-weight: 400;
        margin-bottom: unset;

    }

    .action-icon {
        font-size: 1.08rem;
    }

    .badge-success {
        color: var(--success-text) !important;
        background-color: var(--success-bg);
        border: 1px solid;
    }

    .badge-primary {
        color: var(--primary-text) !important;
        ;
        background-color: var(--primary-bg);
        border: 1px solid;
    }

    .badge-warning {
        color: var(--warning-text) !important;
        ;
        background-color: var(--warning-bg);
        border: 1px solid;
    }

    .badge-danger {
        color: var(--danger-text) !important;
        ;
        background-color: var(--danger-bg);
        border: 1px solid;
    }

    .time {
        font-size: .75rem;
    }

    .table-container {
        box-shadow: 0px 1px 2px 0px rgb(60 64 67 / 25%), 0px 2px 6px 2px rgb(60 64 67 / 10%);
        padding: 1rem;
        border-radius: 12px;
        background-color: white;
    }

    th {
        padding: 1rem .5rem !important;
        font-size: .875rem;
        margin-bottom: 1rem !important;
        background-color: white !important;
        color: var(--text-color) !important;
        font-weight: 600 !important;
    }

    th:last-child {
        border-top-right-radius: 12px;
    }

    th:first-child {
        border-top-left-radius: 12px;
    }

    tr td:last-child {
        text-align: right;
    }

    .table>:not(:last-child)>:last-child>* {
        border-bottom-color: rgba(128, 128, 128, 0.277) !important;

    }

    ul {
        margin-bottom: 0rem !important;
    }

    .avatar-span {
        width: 40px;
        height: 40px;
        cursor: pointer;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 20px;
        object-fit: fill;
        background-image: url("https://st4.depositphotos.com/14903220/22197/v/450/depositphotos_221970610-stock-illustration-abstract-sign-avatar-icon-profile.jpg");
    }

    .btn-link {
        font-weight: 500;
        color: var(--primary-text);
        /* border:1px solid #2c58a094 !important; */
        border-radius: 8px;
        text-decoration: underline 0.1em rgb(255, 255, 255) !important;
        text-underline-offset: 0.2em !important;
        transition: text-decoration-color 300ms, text-underline-offset 300ms !important;
    }

    .btn-link:hover {
        text-decoration-color: #0d6efd !important;
        text-underline-offset: 0.4em !important;
    }

    .logout-btn {
        text-decoration: none;
        font-size: 1rem;
    }

    .page-link {
        border: unset !important;
        color: var(--primary-btn-text)
    }

    .mb-2.hdd {
        display: grid;
        grid-template-columns: auto auto;
        justify-content: space-between;
        margin: 20px;
    }

    .telecharger {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 20px;
        background: #5b99f5;
        color: white;
        font-size: 16px;
        font-weight: 600;
        border-radius: 5px;
        box-shadow: 0px 1px 2px 0px rgb(60 64 67 / 25%), 0px 2px 6px 2px rgb(60 64 67 / 10%);
        cursor: pointer;
        transition: 0.3s;
    }

    .telecharger:hover {
        background: #2974e4;
        box-shadow: 0px 1px 10px 5px rgb(60 64 67 / 25%), 0px 2px 6px 2px rgb(60 64 67 / 10%);
    }
    .affpde{
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
</style>
<!-- //Bootstrap CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
<!-- //Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" />
<!-- fonts -->
<style>
    @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600&family=Poppins:ital,wght@0,100;0,200;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap");
</style>

<div class="container bin">
    <h1>Informations sur le binôme</h1>
    <br>
    <h2>Étudiant 1</h2>
    <ul class="etudiant-info">
        <li><span>CIN:</span> <?php echo isset($etudiant1['cin']) ? $etudiant1['cin'] : ''; ?></li>
        <li><span>Nom:</span> <?php echo isset($etudiant1['nom']) ? $etudiant1['nom'] : ''; ?></li>
        <li><span>Prénom:</span> <?php echo isset($etudiant1['prenom']) ? $etudiant1['prenom'] : ''; ?></li>
        <li><span>classe:</span> <?php echo isset($c1['nom_classe']) ?$c1['nom_classe'] : ''; ?></li>
        <li><span>Email:</span> <?php echo isset($etudiant1['email']) ? $etudiant1['email'] : ''; ?></li>
    </ul>

    <?php if($etudiant2){ ?>
        <br>
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
        <br>
    <h2>Informations sur le PFE</h2>
    <ul class="pfe-info">
        <li>
            <span>L'etat de demande : </span>
            <?php
                    switch ($binome['validite']) {
                        case 0: {
                                echo "<span class='badge badge-warning rounded-pill d-inline'>Encours</span>";
                                break;
                            }
                        case 1: {
                                echo "<span class='badge badge-success rounded-pill d-inline'>Acceptée</span>";
                                break;
                            }
                        case -1: {
                                echo "<span class='badge badge-danger rounded-pill d-inline'>Refusée</span>";
                                break;
                            }
                    }
                    ?>
        </li>

        <li><span>Encadrant ISET:</span> <?php echo $binome['encadrant_iset'] != "" ? $binome['encadrant_iset'] : "<span class='badge badge-danger rounded-pill d-inline'>pas encore choisi</span>"; ?></li>
        <li><span>Nom de l'entreprise:</span> <?php echo isset( $binome['nom_entreprise'])  ? $binome['nom_entreprise'] : ''; ?></li>
        <li><span>Encadrant de l'entreprise:</span> <?php echo  $binome['encadrant_entreprise'] != "" ? $binome['encadrant_entreprise'] : "<span class='badge badge-danger rounded-pill d-inline'>pas encore choisi</span>"; ?></li>
        <li><span>Titre du PFE:</span> <?php echo isset($binome['titre']) ? $binome['titre'] : ''; ?></li>
        <li><span>Date demande:</span><?php echo isset($binome['date_demande']) ? $binome['date_demande'] : ''; ?></li>
        <li><span>Fiche PFE:</span>
            <a href="../controller/afficher_fiche_pfe.php?pfe_id=<?= $pfe_id; ?>" target="_blank"> 
                <button class="affpde">Afficher fiche PFE</button>
            </a>
        </li>  
           
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
    </div>
</div>

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        h1 {
            margin-bottom: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%; /* Largeur du tableau */
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #dddddd;
        }
        .btn-link {
            display: inline-block;
            background-color: #007bff; /* Couleur de fond */
            color: #ffffff; /* Couleur du texte */
            padding: 8px 16px; /* Espacement interne */
            text-decoration: none; /* Suppression du soulignement */
            border-radius: 4px; /* Coins arrondis */
            transition: background-color 0.3s ease; /* Animation de transition */
        }
        .btn-link:hover {
            background-color: #0056b3; /* Couleur de fond au survol */
        }
    </style>

  
    <h1>Liste des binômes</h1>
    <table>
        <tr>
            <th>Nom Etudiant 1</th>
            <th>Prénom Etudiant 1</th>
            <th>Classe Etudiant 1</th>
            <th>Nom Etudiant 2</th>
            <th>Prénom Etudiant 2</th>
            <th>Classe Etudiant 2</th>
            <th>Action</th>
        </tr>
        <?php foreach ($binomes as $binome) : ?>
        <tr>
            <td><?php echo $binome['nom1']; ?></td>
            <td><?php echo $binome['prenom1']; ?></td>
            <td><?php echo $binome['classe1']; ?></td>
            <td><?php echo $binome['nom2']; ?></td>
            <td><?php echo $binome['prenom2']; ?></td>
            <td><?php echo $binome['classe2']; ?></td>
            <td><a href="binomes.php?pfe_id=<?php echo $binome['pfe_id']; ?>" class="btn-link">Afficher</a></td>
        </tr>
        <?php endforeach; ?>
        
    </table>

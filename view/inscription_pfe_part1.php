<!--style>
    body {
        background: linear-gradient(to bottom, #ffffff, #87ceeb, #3498db);
        margin: 0;
        padding: 0;
        height: 100%;
    }
    .form-container {
        width: 800px; 
        margin: 0 auto;
        border: 5px solid #ccc; 
        padding: 20px; 
        border-radius: 10px; 
        background-color: white; /* Ajout de cette ligne */
    }

    h1 {
        text-align: center;
    }

    form {
        width: 100%;
    }

    label,
    input,
    select,
    textarea {
        display: block;
        width: 100%;
        margin-bottom: 10px;
    }

    textarea {
        height: 100px;
    }

    input[type=submit] {
        background: linear-gradient(to bottom, #ffffff, #87ceeb, #3498db);
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
    }
</style-->
<link rel="stylesheet" href="../login.css">

<div class="form-container">
    
    
    <form action="../controller/inscription_pfe_part1.php" method="post" enctype="multipart/form-data">
        <div>
            <span class="title">INSCRIPTION-PFE <?php 
                $sne=date('Y')-1;
                $amjey=date('Y');
                if(date('m')>=6){
                        $sne++;
                        $amjey++;
                }
                echo $sne . '-' . $amjey;
            ?></span>
        </div>
     
        <div class="divs" id="divs">
            <div id="part1" class="part1 part">
                <div><br><h3>Etudiant 1</h3>
                    <label for="cin1" >
                        <input class="text" disabled type="text" value="<?=$etudiant['cin']?>" id="cin1" >
                        <span class="required">CIN</span>
                    </label>
                </div>
                <div>
                    <label for="fullname1">
                        <input class="text" id="fullname1" disabled type="text" value="<?=$etudiant['nom']?> <?=$etudiant['prenom']?>" >
                        <span class="required">Nom et Prenom</span>
                    </label>
                </div>
                <div>
                    <label for="classe1">
                        <input class="text" id="classe1" disabled type="text" value="<?=(new crudclasse())->getById($etudiant['id_classe'])['nom_classe']?>" >
                        <span class="required">Classe</span>
                    </label>
                </div>
                
                <div><br><h3>Etudiant 2</h3>
                    <label for="cin_ip">
                        <input class="text" type="text" placeholder="Saisir votre CIN" name="cin2" id="cin_ip">
                        <span >CIN</span>
                    </label>
                </div>

                <div>
                    <label for="fullname2">
                        <input class="text" id="fullname2" disabled type="text" name="fullname" placeholder="saisié automatiquement" id='fullname2'>
                        <span >Nom et Prenom </span>
                    </label>
                </div>

                <div>
                    <label for="classe2">
                        <input class="text" id="classe2" disabled type="text" name="classe2" placeholder="saisié automatiquement" id='classe2'>
                        <span >Classe</span>
                    </label>
                </div>

                <input type="button"  value="Suivant" id="next">
            
            </div>

            <div id="part2" class="part2 part">
                <div> <br><!--h3>Sujet PFE</h3-->    
                    <label for="titre">
                        <input id="titre" name="titre" placeholder="Saisir votre titre de projet" required>
                        <span class="required">Titre de Projet</span> 
                    </label>
                </div>

                <div>    
                    <label for="sujet">
                        <textarea id="sujet" name="sujet" id="" rows="6" placeholder="Saisir votre sujet" required></textarea>
                        <span class="required">Sujet de Projet</span> 
                    </label>
                </div>

                <div>
                    <label for="encdrnt">
                        <input id="encdrnt" type="text" name="encadreur_iset" placeholder="Saisir votre encadreur de projet">
                        <span >Encadrant ISET </span> 
                    </label>
                </div>
                <div>
                    <label for="entrpr">
                        <input id="entrpr" type="text" name="nom_entreprise" placeholder="Saisir le nom de l'entreprise" required>
                        <span >Nom entreprise* </span> 
                    </label>
                </div>

                <div>
                    <label for="encdrntentr">
                        <input id="encdrntentr" type="text" name="encadreur_entreprise" placeholder="saisir le nom de l'encadreur de l'entreprise">
                        <span >Encadrant entreprise </span> 
                    </label>
                </div>
                
                <div>
                    <label for="file_pfe">
                        <input id="file_pfe" type="File" name="fiche_pfe" accept=".pdf">
                        <span class="required">Importer fiche PFE </span> 
                    </label>
                </div>
                <input type="submit" value="Enregistrer">
                <input id="prec" type="button" value="Retour">
            </div>

        </div>
    </form>
</div>

<script>

    document.getElementById('next').addEventListener('click', () => {
        document.getElementById('divs').classList.add('next');
    });
    document.getElementById('prec').addEventListener('click', () => {
        document.getElementById('divs').classList.remove('next');
    });



    document.getElementById('cin_ip').addEventListener('keyup', () => {
        let str = document.getElementById('cin_ip').value;
        cin_existence(str);
    })

    function cin_existence(str) {
        if (str.length === 0) {
            document.getElementById("fullname2").value = "";
            document.getElementById("classe2").value = "";
            return;
        }
        fetch("getcinAjax.php?getNameByCin=" + str)
            .then(response => response.text())
            .then(data => {
                document.getElementById("fullname2").value = data;
            })
        fetch("getcinAjax.php?getClassByCin=" + str)
        .then(response => response.text())
        .then(data => {
            document.getElementById("classe2").value = data;
        })
    }

    let errorMessageElement = document.getElementById('err');
    if (errorMessageElement) {
        setTimeout(() => {
            errorMessageElement.remove();
        }, 15000); 
    }
</script>

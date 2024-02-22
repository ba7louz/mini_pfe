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
    
    
    <form action="../controller/inscription_pfe_part1.php" method="post">
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

        

        <div><br><h3>Etudiant 1</h3>
            <label for="cin1" >
                <input disabled type="text" value="<?=$etudiant['cin']?>" id="cin1" >
                <span class="required">CIN</span>
            </label>
        </div>
        <div>
            <label for="fullname1">
                <input id="fullname1" disabled type="text" value="<?=$etudiant['nom']?> <?=$etudiant['prenom']?>" >
                <span class="required">Nom et Prenom</span>
            </label>
        </div>

        
        <div><br><h3>Etudiant 2</h3>
            <label for="cin_ip">
                <input type="text" placeholder="Saisir votre CIN" name="cin2" id="cin_ip">
                <span class="required">CIN</span>
            </label>
        </div>

        <div>
            <label for="fullname2">
                <input id="fullname2" disabled type="text" name="fullname" placeholder="saisié automatiquement" id='fullname2'>
                <span class="required">Nom et Prenom </span>
            </label>
        </div>


        
        
        <div> <br><h3>Sujet PFE</h3>    
            <label for="titre">
                 <input id="titre" type="text" name="titre" placeholder="Saisir votre titre de projet"  >
                <span class="required">Titre Projet</span> 
            </label>
        </div>
        <div>
            <label for="encdrnt">
                 <input id="encdrnt" type="text" name="encadreur_iset" placeholder="Saisir votre encadreur de projet">
                <span class="required">Encadreur ISET </span> 
            </label>
        </div>
        <div>
            <label for="entrpr">
                <input id="entrpr" type="text" name="nom_entreprise" placeholder="Saisir le nom de l'entreprise" required>
                <span class="required">Nom entreprise* </span> 
            </label>
        </div>

        <div>
            <label for="encdrntentr">
                 <input id="encdrntentr" type="text" name="encadreur_entreprise" placeholder="saisir le nom de l'encadreur de l'entreprise">
                <span class="required">Encadreur entreprise </span> 
            </label>
        </div>
        
        <div>
            <label for="file_pfe">
                <input id="file_pfe" type="file" name="fiche_pfe" accept=".pdf">
                <span class="required">Importer fiche PFE </span> 
            </label>
        </div>
        <input type="submit" value="Suivant">
    </form>
</div>

<script>
    document.getElementById('cin_ip').addEventListener('keyup', () => {
        let str = document.getElementById('cin_ip').value;
        cin_existence(str);
    })

    function cin_existence(str) {
        if (str.length === 0) {
            document.getElementById("fullname2").value = "";
            return;
        }
        fetch("getcinAjax.php?getNameByCin=" + str)
            .then(response => response.text())
            .then(data => {
                document.getElementById("fullname2").value = data;
            })
    }

    let errorMessageElement = document.getElementById('err');
    if (errorMessageElement) {
        setTimeout(() => {
            errorMessageElement.remove();
        }, 15000); 
    }
</script>

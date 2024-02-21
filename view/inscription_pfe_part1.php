<style>
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
</style>


<div class="form-container">
    <h1>Inscription pour PFE (années)</h1>
    <form action="../controller/inscription_pfe_part1.php" method="post">
        <h2>Etudiant 1</h2>
        <label for="">
            CIN<input disabled type="text" value="<?=$etudiant['cin']?>" ><br>
        </label>
        <label for="">
            Nom et Prenom <input disabled type="text" value="<?=$etudiant['nom']?> <?=$etudiant['prenom']?>" ><br>
        </label>
        <h2>Etudiant 2</h2>
        <label for="">
            CIN <input type="text" placeholder="Saisir votre CIN" name="cin2" id="cin_ip">
        </label><br>
        <label for="">
            Nom et Prenom <input  disabled type="text" name="fullname" placeholder="saisié automatiquement" id='fullname2'>
        </label>
        <h2>Sujet PFE</h2>
        <label for="">
            Titre Projet* <input type="text" name="titre" placeholder="Saisir votre titre de projet"  >
        </label> <br>
        <label for="">
            Encadreur_ISET <input type="text" name="encadreur_iset" placeholder="Saisir votre encadreur de projet">
        </label><br>
        <label for="">
            Nom_entreprise* <input type="text" name="nom_entreprise" placeholder="Saisir le nom de l'entreprise" required>
        </label><br>
        <label for="">
            Encadreur_entreprise <input type="text" name="encadreur_entreprise" placeholder="saisir le nom de l'encadreur de l'entreprise">
        </label><br>
        <label for="">Importer fiche PFE:
            <input type="file" name="fiche_pfe" accept=".pdf">
        </label><br>
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

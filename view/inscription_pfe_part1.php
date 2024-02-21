<div>
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
        <input type="submit" value="Suivant" >
    </form>
</div>

<script>
    document.getElementById('cin_ip').addEventListener('keyup',()=>{
        let str = document.getElementById('cin_ip').value;
        cin_existence(str);
    })
    function cin_existence(str) {
    if (str.length === 0) {
        document.getElementById("fullname2").value = "" ;
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
        }, 15000); // Remove the element after 15 seconds
    }
</script>
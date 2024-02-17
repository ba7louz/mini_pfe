<h1>Inscription</h1>
<form method="post" action="../controller/inscription.php">
    <label for="nom">CIN : </label>
    <input type="text" name="cin" id="cin_ip" required>
    <small id="cin_err"></small>
    <br>
    <label for="nom">Nom : </label>
    <input type="text" name="nom" required><br>
    <label for="nom">Prenom : </label>
    <input type="text" name="prenom" required><br>
    <label for="nom">Email : </label>
    <input type="email" name="email" required><br>
    <label for="nom">mot de passe : </label>
    <input type="password" name="mdp" required><br>
    <label for="classe">Choisir une Classe : </label><br>
    <select name="classe" id="">
        <?php foreach($classes as $c): ?>
        <option value="<?=$c['id'];?>">
            <?= $c['nom_classe'];?>
        </option>
        <?php endforeach ?>
    </select><br>
    <button type="submit">s'inscrire</button>
    <?php
        if( $errorMessage!="" ){
            ?> 
            <small id="err"><?=$errorMessage?></small>
            <?php
            $errorMessage = "";
        }
        else if( $successMessage!="" ){
            ?> 
            <small id="err"><?=$successMessage?></small>
            <?php
            $successMessage = "";
        }
    ?>
</form>

<script>
    document.getElementById('cin_ip').addEventListener('keyup',()=>{
        let str = document.getElementById('cin_ip').value;
        cin_existence(str);
    })
    function cin_existence(str) {
    if (str.length === 0) {
        document.getElementById("cin_err").innerHTML = "" ;
        return;
    }
    fetch("getcinAjax.php?cin=" + str)
        .then(response => response.text())
        .then(data => {
            document.getElementById("cin_err").innerHTML = data;
        })
    }

    let errorMessageElement = document.getElementById('err');
    if (errorMessageElement) {
        setTimeout(() => {
            errorMessageElement.remove();
        }, 15000); // Remove the element after 15 seconds
    }

</script>
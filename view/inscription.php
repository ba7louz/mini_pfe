<link rel="stylesheet" href="../login.css">

    <form method="post" action="../controller/inscription.php">
        <br>
        <div>
            <span class="title">Inscription <?php ?></span>
        </div>
        <div>
            <label for="cin_ip">
                <input class="text" type="text" name="cin" id="cin_ip" tabindex="1" required>
                <span class="required">CIN</span>
            </label>
            <small id="cin_err" class="error-message"></small>
        </div>
        
        <div>
            <label for="nom1">
                <input class="text" type="text" id="nom1" name="nom" tabindex="2" required>
                <span class="required">Nom</span>
            </label>
        </div>
        
        <div>
            <label for="prenom1">
                <input class="text" type="text" id="prenom1" name="prenom" tabindex="3" required>
                <span class="required">Prenom</span>
            </label>
        </div>
        <div>
            <label for="classe1">
                <select name="classe" id="classe1" tabindex="4">
                    <option value="-1" checked>Choisir votre classe</option>
                    <?php foreach($classes as $c): ?>
                    <option value="<?=$c['id'];?>">
                        <?= $c['nom_classe'];?>
                    </option>
                    <?php endforeach ?>
                </select>
                <span class="required">Choisir une Classe</span>
            </label>
        </div>
        <div>
            <label for="email">
                <input class="text" id="email" type="email" name="email" tabindex="5"   required>
                <span class="required">Email</span>
            </label>
        </div>
        <div>
            <label for="password">
                <input class="text" id="password" type="password" name="mdp" tabindex="6" required>
                <span class="required">mot de passe</span>
            </label>
        </div>

        <div>
            <input type="submit" value="S'incrire" />
        </div>
        
        
        <div>
            <span class="form-footer">
                Vous avez déjà un compte ? <a href="../controller/login.php">Login</a>
            </span>
        </div>
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
            if(data != "" )
                document.getElementById("cin_err").innerHTML = "CIN est déjà existe" ;
            else 
                document.getElementById("cin_err").innerHTML = "" ;
        })
    }

    let errorMessageElement = document.getElementById('cin_err');
    
        <?php
            if( $errorMessage!="" ){
            ?>
                errorMessageElement.innerHTML='<?=$errorMessage?>';
                document.getElementById('cin_ip').focus();
            <?php
                $errorMessage = "";
            }
    ?>

    if (errorMessageElement) {
        setTimeout(() => {
            errorMessageElement.remove();
        }, 15000); // Remove the element after 15 seconds
    }
    
                

</script>
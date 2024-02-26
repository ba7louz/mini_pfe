<link rel="stylesheet" href="../login.css">

    <form method="post" action="../controller/inscription.php">
        <br>
        <div>
        <div>
            <span class="title">Inscription <?php 
                $sne=date('Y')-1;
                $amjey=date('Y');
                if(date('m')>=6){
                        $sne++;
                        $amjey++;
                }
                echo $sne . '-' . $amjey;
            ?></span>
        </div>
        <div>
            <label for="cin_ip">
                <input class="text" type="text" name="cin" id="cin_ip" tabindex="1" required>
                <span class="required">CIN</span>
            </label>
            <small id="cin_err" class="error-message"></small>
        </div>

        <div>
            <label for="password">
                <input class="text" id="password" type="password" name="mdp" tabindex="6" required>
                <span class="required">Mot de passe</span>
            </label>
        </div>
        <div>
            <label for="password2">
                <input class="text" id="password2" type="password2" name="mdp2" tabindex="6" required>
                <span class="required">Confirmer votre mot de passe</span>
            </label>
        </div>

        <div>
            <label for="">
                <input type="submit" value="S'incrire"/>
            </label>
            <small id="ser_err" class="error-message"></small>
        </div>
        
        
        <div>
            <span class="form-footer">
                Vous avez déjà un compte ? <a href="../controller/login.php">Login</a>
            </span>
        </div>
    </form>

<script>
    document.getElementById('cin_ip').addEventListener('blur',()=>{
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
            if(data != "" ){
                document.getElementById("cin_err").innerHTML = "" ;
            }
            else{ 
                document.getElementById("cin_err").innerHTML = "CIN n'existe" ;
                // document.getElementById('cin_ip').focus();
            }
        })
    }

    let errorMessageElement = document.getElementById('ser_err');
    
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
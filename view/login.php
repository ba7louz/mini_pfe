<link rel="stylesheet" href="../login.css">

<form method="post" action="../controller/login.php" id="login-form" class="login-form" >
  <div>
    <span class="title">Login</span>
  </div>

  <div>
    <label class="label-cin">
      <input id="cin_input" type="text" class="text" name="cin" placeholder="CIN" tabindex="1" required />
      <span class="required">CIN</span>
    </label>
    <?php
        if($errmsg!=""){
          ?><small class="err_mssg"><?=$errmsg?></small><?php
      }
      ?>
  </div>
  
  <div>
    <label class="label-password">
      <input type="password" class="text" name="mdp" placeholder="Password" tabindex="2" required/>
      <span class="required">Mot de passe</span>
    </label>
  </div>

  <input type="submit" value="Log In" />
  
  <figure aria-hidden="true">
    <div class="person-body"></div>
    <div class="neck skin"></div>
    <div class="head skin">
      <div class="eyes"></div>
      <div class="mouth"></div>
    </div>
    <div class="hair"></div>
    <div class="ears"></div>
    <div class="shirt-1"></div>
    <div class="shirt-2"></div>
  </figure>

</form>

  <?php
        if($errmsg!=""){
          ?>
          <script>
            document.getElementById('cin_input').focus();
          </script>
          <?php
        }
  ?>

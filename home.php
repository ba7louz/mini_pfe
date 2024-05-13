<?php
// Global includes
require_once "auth/auth.php";
$Logged = (new auth())->check(-1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <!--=============== REMIXICONS ===============-->
      <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

      <!--=============== CSS ===============-->
      <link rel="stylesheet" href="../assets/css/styles.css">
      <style>
         a{
            text-decoration:none !important;
         }
      </style>

    <title>Document</title>
</head>
<body>
<header class="header">
         <nav class="nav container">
            <div class="nav__data">
               <a href="#" class="nav__logo">
                  <i class="ri-planet-line"></i>PFE ISET RADES 
               </a>
               
               <div class="nav__toggle" id="nav-toggle">
                  <i class="ri-menu-line nav__burger"></i>
                  <i class="ri-close-line nav__close"></i>
               </div>
            </div>

            <!--=============== NAV MENU ===============-->
            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
               <?php
                  if((new auth())->check(1)){
                        ?>
                        <li><a href="admin.php" class="nav__link">Liste Pfe</a></li>
                        <?php
                  }
               ?>

               <?php if (!$Logged){
               ?>
                  <li><a href="login.php" class="nav__link">Login</a></li>
                  <li><a href="inscription.php" class="nav__link">Inscription</a></li>
               <?php
               }else{ 
               ?>

                  <li class="dropdown__item">
                     <a href="#" class="nav__link">Profil</a>
                     <ul class="dropdown__menu">
                        <li>
                           <a href="../controller/profil.php?id=<?=$Logged?>" class="dropdown__link">
                              <i class="ri-user-fill"></i> Votre Profil
                           </a>                          
                        </li>
                        <li id="logoutact"> 
                           <a href="#" class="dropdown__link">
                              <i class="ri-logout-box-r-line"></i> déconnexion
                           </a>
                        </li>
                     </ul>
                  </li>
               <?php
               }
               ?>
<!--
                        <li class="dropdown__subitem">
                           <div class="dropdown__link">
                              <i class="ri-bar-chart-line"></i> Reports <i class="ri-add-line dropdown__add"></i>
                           </div>

                           <ul class="dropdown__submenu">
                              <li>
                                 <a href="#" class="dropdown__sublink">
                                    <i class="ri-file-list-line"></i> Documents
                                 </a>
                              </li>
      
                              <li>
                                 <a href="#" class="dropdown__sublink">
                                    <i class="ri-cash-line"></i> Payments
                                 </a>
                              </li>
      
                              <li>
                                 <a href="#" class="dropdown__sublink">
                                    <i class="ri-refund-2-line"></i> Refunds
                                 </a>
                              </li>
                           </ul>
                        </li>
                     </ul>
                  </li>            
                  <li><a href="#" class="nav__link">Products</a></li>
                  <li class="dropdown__item">
                     <div class="nav__link">
                        Users <i class="ri-arrow-down-s-line dropdown__arrow"></i>
                     </div>
                     <ul class="dropdown__menu">
                        <li>
                           <a href="#" class="dropdown__link">
                              <i class="ri-user-line"></i> Profiles
                           </a>                          
                        </li>
                        <li>
                           <a href="#" class="dropdown__link">
                              <i class="ri-lock-line"></i> Accounts
                           </a>
                        </li>
                        <li>
                           <a href="#" class="dropdown__link">
                              <i class="ri-message-3-line"></i> Messages
                           </a>
                        </li>
                     </ul>
                  </li>
                  <li><a href="#" class="nav__link">Contact</a></li> 
                -->
               </ul>
            </div>
         </nav>
      </header>
      <div class="virtual-height"></div>
         
         <?=$contenu?>
         <!--=============== MAIN JS ===============-->
         
         <script src="../assets/js/main.js"></script>
         <script>
               document.getElementById('logoutact').addEventListener('click', () => {
               fetch("logout.php")
               .then(response => {
                  if (!response.ok) {
                        throw new Error('Network response was not ok');
                  }
                  return response.text();
               })
               .then(data => {
                  location.reload();
               })
               });
            </script>
</body>
</html>

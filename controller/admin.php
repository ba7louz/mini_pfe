<?php
session_start();
ob_start();

// import --------------------------
require_once "../config/connexion.php";
require_once "../model/pfecrud.php";
require_once "../model/crudetudiant.php";
require_once "../model/classecrud.php";
require_once "auth/auth.php";

// authentification -----------------
$Logged = (new auth())->check(1);

// PFE FindAll ----------------------
$binomes = ( ( new crud_pfe() )->ListPfe() );


include "../view/admin.php";
$contenu = ob_get_clean();
include "../home.php";

?>
<?php
session_start();
require_once "auth/auth.php";
$auth = (new auth())->logout();

 
?>
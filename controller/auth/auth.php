<?php

// require_once "../../model/crudetudiant.php";
include_once 'php-jwt-main/src/JWT.php';
include_once 'php-jwt-main/src/Key.php';

use Firebase\JWT\Key;
use \Firebase\JWT\JWT;

class auth {
    public $secret_key ;
    public function __construct() {
        $this->secret_key = "Cr7";
    }
    public function login( $payload ) // set the token in new session
    {   
        $jwt = JWT::encode( $payload, $this->secret_key, 'HS256' );
        $_SESSION['token'] = $jwt ;
    }
    public function getUserData() // get data user
    {
        $decoded = JWT::decode($_SESSION['token'], new Key($this->secret_key, "HS256") );
        return $decoded;
    }
    public function check($t) // return true if the token is valid and the user exists -- delete the expired-token or if the user does not exist
    {
        if( isset($_SESSION['token']) ){
            $decoded = JWT::decode($_SESSION['token'], new Key($this->secret_key, "HS256") );
            if ($decoded->type ==0 && ($t == 0 ||$t == -1) ){
                $etudiant = ( new crudetudiant() )->getetudiantById($decoded->user_id);
                return ( $etudiant  ?  true  :  false) ;
            } else if ( $decoded->type == 1 && ($t == 1 || $t == -1) ){
                return true;
            }
        }
        return false;
    }
    public function logout(){
        session_destroy();
        header('location:login.php');
        die();
    }
}
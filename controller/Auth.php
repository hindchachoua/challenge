<?php 

class AuthController
{
    private $auth;

    public function __construct(){
        $this->auth = new userDAO();
    }


    public function showlogin(){
        include_once 'view\sign-in.php';
    }
}

?>
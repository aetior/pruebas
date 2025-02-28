<?php
    namespace app\controllers;
    require_once "./autoload.php";
    use app\models\mainModel;
    
    class userController extends mainModel{

        public function comprobarUsuario(){
                
            if(isset($_POST['login'])){
                $email = $_POST['email'];
                $contraseña =$_POST['pass'];
                $permiso = $this->validarUsuario($email,$contraseña);
                
                if($permiso){
             
                $_SESSION['newSession']="verdad";
                echo"inicio exitoso";
                }else{
                    session_unset();
                    // print_r($permiso);
                echo"inicio fallido";
             
                }
               
            }

        }

    }
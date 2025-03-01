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
                $rol_user=$this->seleccionarUnoPorEmail($email);
                $_SESSION['rol']=$rol_user['rol'];
                echo"inicio exitoso ";
      
                }else{
                    session_unset();
                    // print_r($permiso);
                echo"inicio fallido";
             
                }
               
            }

        }

    }
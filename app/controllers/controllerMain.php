<?php

namespace app\controllers;
use app\models\mainModel;

class controllerMain extends mainModel {

    public function saveUser() {

        if(isset($_POST['nombre']) && isset($_POST['password']) && isset($_POST['email'])){
            $nombre=$_POST['nombre'];
            $pass=$_POST['password'];
            $email=$_POST['email'];
            $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
            $response = $this->guardar($nombre,$hashedPassword,$email);
            return $response;
        }else{
            echo "faltan datos";
        }
    }

    public function getUser(){
       if (isset($_POST['hidden'])) {
            $response = $this->consultar();
            return  $response;           
        }
    }

    public function getOneUser(){
        if(isset($_POST['hidden2'])){
            $id = $_POST['id'];
            $response = $this->seleccionarUno($id);
            return $response;
        }
    }    

    public function actualizarUser(){
        if(isset($_POST['seleccionId'])){
            $id=$_POST['seleccionId'];
            $nombre=$_POST['nombreCambiar'];
            $response= $this->editarUsuario($id,$nombre);
            return $response;
        }
    }
    public function eliminarUser(){
        if(isset($_POST['eliminarUser'])){
            $id = $_POST['userId'];
            return $this->eliminarUsuario($id);
        }
    }

}